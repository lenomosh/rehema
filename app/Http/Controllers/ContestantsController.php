<?php

namespace App\Http\Controllers;

use App\Candidates;
use App\FailedCandidates;
use App\Positions;
use App\Proposers;
use App\Seconders;
use App\Students;
use Illuminate\Http\Request;

class ContestantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_contestants = array();

        $data_path = public_path('notifications/contestants.json');
        $data = file_get_contents($data_path);
        $contestants = json_decode($data, FALSE);
        foreach ($contestants as $contestant) {
            $candidate_details = Students::with('class')->find($contestant->admin_number);
            $proposer_details = Students::with('class')->find($contestant->details->proposer);
            $position_details = Positions::with('level')->find($contestant->details->position);
            $seconder_details = array();
            $seconders = $contestant->details->seconders;
            foreach ($seconders as $key => $value) {
                $seconder_details[$value] = Students::with('class')->find($value);
            }
            $details = array(
                'contestant_details' => $candidate_details,
                'position' => $position_details,
                'proposer_details' => $proposer_details,
                'seconders' => $seconder_details
            );
            array_push($all_contestants, $details);
        }
        $all_contestants = json_encode($all_contestants, TRUE);
        $all_contestants = json_decode($all_contestants, FALSE);
//        return json_encode($all_contestants);
        return view('candidate.view')->with('contestants', $all_contestants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'proposer_id' => 'required',
            'candidate_id' => 'required',
            'position_id' => 'required'
        ]);
        $candidate_admin_number = $request->contestant_id;
        $position_id = $request->position_id;
        $proposer_admin_number = $request->proposer_id;
        $seconders = $request->get('seconders');
        //add to the database
        $candidate = new Candidates();
        $candidate->admin_number = $candidate_admin_number;
        $candidate->position_id = $position_id;
        $candidate->save();
        $candidate_id = $candidate->candidate_id;
        //add proposers
        $proposer = new Proposers();
        $proposer->admin_number = $proposer_admin_number;
        $proposer->candidate_id = $candidate_id;
        $proposer->save();
        //add seconders
        foreach ($seconders as $seconder_id) {
            $seconder = new Seconders();
            $seconder->admin_number = $seconder_id;
            $seconder->candidate_id = $candidate_id;
            $seconder->save();
        }
        $this->remove_from_pending($candidate_admin_number);
        return redirect()->back()->with('message', 'The candidate was approved successfully');

        //
    }

    public function remove_from_pending($id)
    {
        $data_path = public_path('notifications/contestants.json');
        $data = file_get_contents($data_path);
        $value = array();
        $data = json_decode($data, true);
        foreach ($data as $key => $value) {
            if ($data[$key]['admin_number'] == $id) {
                unset($data[$key]);
            }
        }
        $data = json_encode($data);
        file_put_contents($data_path, $data);
    }

    public function reject(Request $request)
    {
        $admin_number = $request->candidate_id;
        $reason = $request->reason;
        $position = $request->position_id;
        $rejected = new FailedCandidates;
        $rejected->admin_number = $admin_number;
        $rejected->position_id = $position;
        $rejected->description = $reason;
        $rejected->save();
        $this->remove_from_pending($admin_number);
        return redirect()->back()->with('message', 'Operation performed successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function disqualified()
    {
        $rejects = FailedCandidates::with('details.class', 'position_details')->get();
        $person = array();
        foreach ($rejects as $reject) {
            $details = array(
                'name' => $reject->details->first_name . " " . $reject->details->last_name,
                'class' => $reject->details->class->class_name,
                'position' => $reject->position_details->position_name,
                'reason' => $this->sentenceCase($reject->description)
            );
            array_push($person, $details);
        }
        $person = json_encode($person);
        return view('candidate.rejected')->with('candidates', $person);
    }

    public function sentenceCase($string)
    {
        $sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $newString = '';
        foreach ($sentences as $key => $sentence) {
            $newString .= ($key & 1) == 0 ?
                ucfirst(strtolower(trim($sentence))) :
                $sentence . ' ';
        }
        return trim($newString);
    }

    public function approved()
    {
        $candidates = Candidates::with('proposers.details.class', 'seconders.details.class', 'info.class', 'position.level')->get();

        $contestant_info = array();
        foreach ($candidates as $candidate) {
            $name = $candidate->info->first_name . " " . $candidate->info->last_name;
            $class = $candidate->info->class->class_name;
            $position = $candidate->position->position_name;
            $position_level = $candidate->position->level->level_name;
            $proposer_name = $candidate->proposers->details->first_name . " " . $candidate->proposers->details->last_name . " (" . $candidate->proposers->details->class_id . ")";
            //seconder details
            $seconder_details = array();
            foreach ($candidate->seconders as $seconder) {
                $details = array(
                    'name' => $seconder->details->first_name . " " . $seconder->details->last_name . " (" . $seconder->details->class_id . ")",
                );
                array_push($seconder_details, $details);

            }
            //format data as array
            $to_array = array(
                'name' => $name,
                'class' => $class,
                'position' => $position,
                'level' => $position_level,
                'proposer' => $proposer_name,
                'seconders' => $seconder_details
            );
            array_push($contestant_info, $to_array);

        }

        //encode to json
        $contestant_info = json_encode($contestant_info);
//        $contestant_info = json_decode($contestant_info,FALSE);
        return view('candidate.approved')->with('candidates', $contestant_info);
    }
}
