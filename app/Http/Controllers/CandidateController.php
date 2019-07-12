<?php

namespace App\Http\Controllers;

use App;
use App\Candidates;
use App\Positions;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has(['student', 'positions'])) {
            $details = \session()->get('student');
            $admin_number = $details->admin_number;
            $name = $details->first_name;
            $validate = App\FailedCandidates::with('details', 'position_details')->where('admin_number', $admin_number)->first();
            if (!is_null($validate)) {
//                dd($validate);
                $pos = $validate->position_details->position_name;
                $reason = strtolower($validate->description);
                $reason = ucfirst($reason);
                $message = "Hi $name, We have some news for you. We processed you previous application to vie for $pos position. The Admin found that you didn't qualify for this seat and gave me a message for you: '$reason'. If you wish to appeal, kindly submit your letter to the Rehema Electoral Committee";
                \session()->put('failed', $message);
                return view('candidate.validate');
            }
            $validate = Candidates::with('position')->where('admin_number', $admin_number)->first();
            if (!is_null($validate)) {
                $pos = $validate->position->position_name;
                $message = "Hi $name, Welcome back! We have some good news. Your application to vie for $pos seat has been approved. You can now start your campaign. All the best";
                \session()->put('passed', $message);
                return view('candidate.validate');
            }
            return view('candidate.register');
        } else
            return view('candidate.validate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'proposer_id' => 'required',
            'position_id' => 'required',

        ], $res = [
            'proposer_id.required' => 'Kindly specify a proposer'
        ]);

        $response = null;
//        admission number of the candidate
        $candidate_admin_number = $request->admin_number;
        //position of the candidate
        $position_id = $request->position_id;
        //get seconders admin number as array
        $seconders_admin_number = $request->get('seconder_id');
        $seconders_admin_number = array_filter($seconders_admin_number);
//        dd(count($seconders_admin_number));
//        return $seconders_admin_number;
        if (count($seconders_admin_number) == 0) {
            return redirect()->back()->with('error', "You've not provided a seconder. Enter at least one seconder. Keep in mind that Rehema Admin requires a minimum of two seconders to be considered");
        }
        //get proposer's admin number from form
        $proposer_admin_number = $request->proposer_id;
        $model = new Candidates;
        //get candidate details
        $candidate_details = $model->student_details($candidate_admin_number);
        if (isset($candidate_details['response']) == '5') {
            $response[] = 5;
        }
        //get proposer details
        $proposer_details = $model->student_details($proposer_admin_number);
        if (isset($proposer_details['response']) == '5') {
            $response[] = 5;
            return redirect()->back()->with('error', "The proposer's admission number you specified is invalid. please check and try again");
        }
        //get seconder[] details
//        $model = new Candidates();
        foreach ($seconders_admin_number as $key => $value) {
            $seconder_details[$key] = $model->student_details($value);
            if (isset($seconder_details[$key]['response']) == '5') {
                $response[] = 5;
            }
        }

        //filtering to have only seconders with the correct details
        $valid_seconders = array_map(function ($seconder_details) {
            unset($seconder_details['response']);
            return $seconder_details;
        }, $seconder_details);
        $valid_seconders = array_filter($valid_seconders);
        if (count($valid_seconders) == 0) {
            return redirect()->back()->with('error', "You've not provided any seconder. Enter at least one seconder. Keep in mind that Rehema Admin requires a minimum of two seconders to be considered");
        }        //check if there's a duplicate data on the on post form
        $input = array_column($valid_seconders, 'admin_number');//make new variable for verification so that it doesn't interfere with the seconder's info
        array_push($input, $candidate_details->admin_number, $proposer_details->admin_number);//add all data to one $input variable
        if (count($input) !== count(array_count_values($input))) {
            $response[] = 6;

        }
        //end of checking duplicates
        //check if candidate is eligible for the seat being vied for
        $vet = new Candidates();
        $result = $vet->vet($candidate_admin_number, $position_id);
        if (isset($result['response']) && $result['response'] !== 2) {
            $response[] = $result['response'];
        } else $response[] = 2;
        //      check if proposer is already taken by another candidate
        $check_existence = new Candidates();
        $result = $check_existence->check_existence($proposer_details->admin_number);
        if (isset($result['response']) && $result['response'] !== 2) {
            $response[] = $result['response'];
        } else $response[] = 2;
        //      check if seconder is already taken by another candidate;
        $vet = new Candidates();
        $seconders_admin_number = array_column($valid_seconders, 'admin_number');
        foreach ($seconders_admin_number as $value) {
            $result = $vet->check_existence($value);
            if (isset($result['response']) && $result['response'] !== 2) {
                $response[] = $result['response'];
            } else $response[] = 2;
        }
        //check if candidate has vied for another seat
        $check_existence = new Candidates();
        $result = $check_existence->check_existence($candidate_details->admin_number);
        if (isset($result['response']) && $result['response'] !== 2) {
            $response[] = $result['response'];
        } else $response[] = 2;
        //sort data for the next validation

        //seconders
//        foreach ($valid_seconders as $valid_seconder){
//            $seconders_admin_number[]=$valid_seconder->admin_number;
//        }
//        check result codes
        foreach ($response as $value) {
            $message[] = $this->check_response_code($value);
        }
        //if all responses are true, then return the filtered data and add it to the database;
        $unique = array_unique($message);//variable uniques should only have one value
        if (count($unique) == 1) {
            //clean things up
            $candidate_admin_number = $candidate_details->admin_number;
            $proposer_admin_number = $proposer_details->admin_number;
            $position_id = $position_id;
            $seconders_admin_number = array_column($valid_seconders, 'admin_number');
            $valid_data = array(
                'admin_number' => $candidate_admin_number,
                'details' => array(
                    'position' => $position_id,
                    'proposer' => $proposer_admin_number,
                    'seconders' => $seconders_admin_number,
                )
            );
            $inp = file_get_contents(public_path('notifications/contestants.json'));
            $tempArray = json_decode($inp, true);
            $tempArray[] = $valid_data;
            $jsonData = json_encode($tempArray);
            if (file_put_contents(public_path('notifications/contestants.json'), $jsonData)) {
                Session::flush();
                return redirect()->route('homepage')->with('message', 'You have successfully been registered. Please wait for admin approval. All the best');
            } else
                return redirect()->back()->withErrors('You have successfully been registered. Please wait for admin approval. All the best');


        } else
            //remove null values
            $message = array_filter($message);
        $message = array_unique($message);
        return redirect()->back()->withErrors($message);
    }

    private function check_response_code($code)
    {
//        foreach ($code as $key=>$value){
        switch ($code) {
            case 0:
                return "You cannot vie for the School level seat. School level seat are limited to the form threes";
                break;
            case 1:
                return "You have applied for a post meant for opposite gender, please check and try again";
                break;
            case 2:
                return null;//passed the school level form test
                break;
            case 3:
                return "The proposer is already associated with the current elections. please choose another proposer";
                break;
            case 4:
                return null;//no duplication/ user not inserted yet
                break;
            case 5:
                return "One of the admission numbers is wrong. Please check and try again";
                break;
            case 6:
                return "Looks like you've inserted a duplicate data. Please check and try again";
                break;
            case 7:
                return "The proposer's admission number is wrong";
                break;
            default:
                false;
        }

//        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'admin_number' => 'required',
            'first_name' => 'required'
        ]);
        $admin_number = $request->admin_number;
        $first_name = $request->first_name;
        $student = Students::where('admin_number', $admin_number)->where('first_name', $first_name)->get();
//        return $student;
        if (is_null($student)) {
            $message = "The information you provided is incorrect. Please check and try again";
            return redirect()->back()->with('error', $message);
        }
        $student_count = $student->count();
        if ($student_count == 1) {
            $position = Positions::all();
            $student = $student->first();
            session()->put([
                'student' => $student,
                'positions' => $position
            ]);
            return redirect()->route('register.index');

        } else
            $message = "The information you provided is incorrect. Please check and try again";
        return redirect()->back()->with('error', $message);

    }
}
