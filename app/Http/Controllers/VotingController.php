<?php

namespace App\Http\Controllers;

use App;
use App\Candidates;
use App\SpoiltVotes;
use App\Students;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    //
    public function index()
    {

        if (session()->has('student')) {
            $positions = $this->fetch_positions();
            return view('front.cast_vote')->with('positions', $positions);
        } else
            return view('voting.index');
    }

    public function fetch_positions()
    {
        $student = session()->get('student');
        $student_class = $student->class_id;
        $student_form = App\Classes::with('form')->find($student_class);
        $student_form = $student_form->form_id;
        $can = new Candidates();
        $all_details = $can->candidate_info();
        $form_captains = array();
        foreach ($all_details as $all_detail) {
            if ($all_detail->info->class->form->form_id == $student_form && $all_detail->position_id == 105) {
                array_push($form_captains, $all_detail);
            }
        }

        $class_prefects = array();
        foreach ($all_details as $all_detail) {
            if ($all_detail->info->class_id == $student_class && $all_detail->position->level_id == 1002) {
                array_push($class_prefects, $all_detail);
            }
        }
        /*100	Head Boy
        101	Head Girl
        102	Dinning Hall Captain
        103	Games Captain
        104	Library Captain
        105	Form Captain
        106	Class Prefect
        */
        $head_boy = $can->level_candidates(100);
        $hg = $can->level_candidates(101);
        $dhc = $can->level_candidates(102);
        $gc = $can->level_candidates(103);
        $lc = $can->level_candidates(104);
        $bind = array(
            'class_prefects' => $class_prefects,
            'form_captains' => $form_captains,
            'head_boys' => $head_boy,
            'head_girls' => $hg,
            'dinning_hall_captains' => $dhc,
            'games_captains' => $gc,
            'library_captains' => $lc
        );
        return json_encode($bind, true);
    }
    public function student_validate(Request $request)
    {
        $request->validate([
            'admin_number' => 'required|min:4',
            'first_name' => 'required|min:2'
        ]);
        $admin_number = $request->admin_number;
        $file = file_get_contents(public_path('notifications/voted.json'));
        $decoded = json_decode($file, TRUE);
        $search = array_search($admin_number, $decoded);
        if ($search !== false) {
            return redirect()->back()->with('error', "It looks like you've already voted. Kindly give other people a chance to practice democracy");
        }
        $first_name = $request->first_name;
        $student = Students::where('admin_number', $admin_number)->where('first_name', $first_name)->get();
//        return $student;
        if (is_null($student)) {
            $message = "The information you provided is incorrect. Please check and try again";
            return redirect()->back()->with('error', $message);
        }
        $student_count = $student->count();
        if ($student_count == 1) {
            $student = $student->first();
            session()->put([
                'student' => $student
            ]);
            return redirect()->route('vote.index');
        } else
            $message = "The information you provided is incorrect. Please check and try again";
        return redirect()->back()->with('error', $message);
    }
    public function cast(Request $request)
    {
        $student_id = $request->student_id;
        $class_id = $request->student_class;
        $head_boys = $request->get('hb_id');
        $head_girls = $request->get('hg_id');
        $dh_captain = $request->get('dhc_id');
        $library_captains = $request->get('lc_id');
        $games_captains = $request->get('gc_id');
        $class_prefect = $request->get('cp_id');
        $form_prefect = $request->get('fc_id');
        //submit the result
        $hb = $this->submit($head_boys, $class_id);
        $hg = $this->submit($head_girls, $class_id);
        $dhc = $this->submit($dh_captain, $class_id);
        $lc = $this->submit($library_captains, $class_id);
        $gc = $this->submit($games_captains, $class_id);
        $fc_id = $this->submit($form_prefect, $class_id);
        $cp_id = $this->submit($class_prefect, $class_id);
        $input = file_get_contents(public_path('notifications/voted.json'));
        $decode = json_decode($input, TRUE);
        $data = array();
        array_push($decode, $student_id);
        if (file_put_contents(public_path('notifications/voted.json'), json_encode($decode))) {
            session()->flush();
            return redirect()->route('homepage')->with('message', 'You vote has been cast. All the best');

        };
        redirect()->route('homepage');

    }

    public function submit($ids, $class_id)
    {
        if (is_null($ids) || is_null($class_id)) {
//            dump("isnull");
        } else {

            $details = array();
            //fetch details from detabase
            //@param $pid : position_id
            foreach ($ids as $id) {
                $d = $this->info($id);
                $pid = $d->position_id;
                array_push($details, $d);

            }
//            dump('value not null');
            if (count($details) >= 2) {
                $dump = $this->spoilt_votes($class_id, $pid);
//                dump("spoilt votes called");

            } else {
                foreach ($details as $detail) {
                    $detail->increment('votes');
                    $d = Candidates::find($detail->candidate_id);
                    $d->votes = $detail->votes;
                    $d->save();
//                dump('votes updated');
                }
            }
        }
    }

    public function info($id)
    {
        $details = Candidates::find($id);
        return $details;
    }

    public function spoilt_votes($class_id, $pid)
    {

        $nosp = 'number_of_votes_spoilt';
        $result = $this->check_record_in_spoilt_votes($class_id, $pid);
        if (is_null($result)) {
            $insert = new SpoiltVotes();
            $insert->class_id = $class_id;
            $insert->position_id = $pid;
            $insert->$nosp = 1;
            $insert->save();
        } else {
            $votes = $result->increment($nosp);
            $id = $result->id;
            $update = SpoiltVotes::find($id);
            $update->$nosp = $result->$nosp;
            $update->save();
//            dump("sv updated");

        }

    }

    public function check_record_in_spoilt_votes($cid, $pid)
    {
        $res = SpoiltVotes::where('class_id', '=', $cid)->where('position_id', '=', $pid)->first();
//        dump("check rec exec");
        return $res;
    }
}
