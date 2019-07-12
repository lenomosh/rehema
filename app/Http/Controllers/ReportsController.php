<?php

namespace App\Http\Controllers;

use App;

class ReportsController extends Controller
{
    public function index()
    {

        $forms = App\Forms::with('class')->get();
        $allvoters = App\Students::all();
        return view('reports.index')->with(['forms' => $forms, 'all_voters' => $allvoters]);


    }

    public function show($id)
    {
        $class = App\Classes::with('students')->find($id);
//        return $class;
        return view('reports.class.show')->with('students', $class);


    }

    public function form($id)
    {
        $form_voters = App\Forms::with('class.students')->find($id);
        foreach ($form_voters->class as $form_voter) {
            $allstudents[] = $form_voter->students;
        }
        $students = array();
        foreach ($allstudents as $key => $values) {
            foreach ($values as $value) {
                $students[] = $value;
            }


        }
        return view('reports.form.show')->with('students', $students);
    }

    public function candidate_for_each_post()
    {
        $positions = App\Positions::with('candidates.proposers.details', 'candidates.seconders.details', 'candidates.info')->get();
        $candidates = App\Candidates::with('info', 'proposers.details', 'seconders.details')->get();
//        return $positions;
        return view('reports.contestants.eachpost')->with(['positions' => $positions, 'contestants' => $candidates]);

    }

    public function class_teachers()
    {
        $class_teachers = App\ClassTeachers::with('class_assigned')->get();
        return view('reports.teachers.show')->with('teachers', $class_teachers);
    }

    public function spoilt_votes()
    {
        $res = App\SpoiltVotes::with('class.form', 'position')->orderByDesc('class_id')->get();
        $f1 = array();
        $f2 = array();
        $f3 = array();
        $f4 = array();
        $details = array();

        foreach ($res as $re) {
            switch ($re->class->form_id) {
                case 1:
                    array_push($f1, $re);
                    break;
                case 2:
                    array_push($f2, $re);
                    break;
                case 3:
                    array_push($f3, $re);
                case 4:
                    array_push($f4, $re);
            }

        }
        $arr = array(
            'f1' => array(
                'title' => 'Form One',
                'details' => $this->sort_spoilt_votes($f1)),
            'f2' => array(
                'title' => 'Form Two',
                'details' => $this->sort_spoilt_votes($f2)),
            'f3' => array(
                'title' => 'Form Three',
                'details' => $this->sort_spoilt_votes($f3)),
            'f4' => array(
                'title' => 'Form Four',
                'details' => $this->sort_spoilt_votes($f4)),
        );
        $arr = json_encode($arr);
        return view('reports.spoilt_votes')->with('spoilt_votes', $arr);
    }

    public function sort_spoilt_votes($array)
    {
        $nosp = 'number_of_votes_spoilt';
        $res = array();
        foreach ($array as $item) {
            $name = $item->class->class_name;
            $position = $item->position->position_name;
            $votes = $item->$nosp;
            $ar = array(
                'name' => $name,
                'position' => $position,
                'votes' => $votes
            );
            array_push($res, $ar);
        }
        return $res;

    }

    public function candidates_and_votes_garnered()
    {
        /*
        100	Head Boy
        101	Head Girl
        102	Dinning Hall Captain
        103	Games Captain
        104	Library Captain
        105	Form Captain
        106	Class Prefect
        */

        $hb = $this->candidates_fetch_and_sort(100);
        $hg = $this->candidates_fetch_and_sort(101);
        $dhc = $this->candidates_fetch_and_sort(102);
        $gc = $this->candidates_fetch_and_sort(103);
        $lc = $this->candidates_fetch_and_sort(104);
        $fc = $this->candidates_for_form_and_class_level(105);
        $cp = $this->candidates_for_form_and_class_level(106);
        $details = array();
        $res = array(
            'hb' =>
                array(
                    'title' => 'Head Boys',
                    'details' => $hb
                ),
            'hg' =>
                array(
                    'title' => 'Head Girls',
                    'details' => $hg
                ),
            'dhc' =>
                array(
                    'title' => 'Dinning Hall Captains',
                    'details' => $dhc
                ),
            'gc' =>
                array(
                    'title' => 'Games Captain',
                    'details' => $gc
                ),
            'lc' =>
                array(
                    'title' => 'Library Captains',
                    'details' => $lc
                ),
            'fc' =>
                array(
                    'title' => 'Form Captains',
                    'details' => $fc
                ),
            'cp' =>
                array(
                    'title' => 'Class Prefects',
                    'details' => $cp
                ),
        );
        $res = json_encode($res, TRUE);
//      return $res;
        return view('reports.garnered_for_each_post')->with('categories', $res);
    }

    public function candidates_fetch_and_sort($position_id)
    {
        $query = App\Candidates::with('info', 'position')->where('position_id', '=', $position_id)->orderBy('votes', 'desc')->get();
        $candidates = array();
        foreach ($query as $key => $value) {
            $name = $value->info->first_name . " " . $value->info->last_name;
            $class = $value->info->class_id;
            $position = $value->position->position_name;
            $votes = $value->votes;
            $res = array(
                'name' => $name,
                'class' => $class,
                'position' => $position,
                'votes' => $votes
            );
            array_push($candidates, $res);

            // code...
        }
        return $candidates;

    }

    public function candidates_for_form_and_class_level($position_id)
    {
        $q = App\Candidates::with(['info' => function ($query) {
            $query->orderBy('class_id');
        }], 'position')->where('position_id', '=', $position_id)->get();
        $candidates = array();
        foreach ($q as $key => $value) {
            $name = $value->info->first_name . " " . $value->info->last_name;
            $class = $value->info->class_id;
            $position = $value->position->position_name;
            $votes = $value->votes;
            $d = array(
                'name' => $name,
                'class' => $class,
                'position' => $position,
                'votes' => $votes
            );
            array_push($candidates, $d);
        }
        return $candidates;
    }

    public function winners()
    {
        /*
100	Head Boy
101	Head Girl
102	Dinning Hall Captain
103	Games Captain
104	Library Captain
105	Form Captain
106	Class Prefect
*/

//        return $this->class_level_winners();
        $hb = array(
            'title' => 'Head Boy',
            'details' => $this->sort_winners(100)
        );
        $res = array(
            'school_level' => array(
                'title' => 'School Level',
                'details' => array(
                    'hb' => array(
                        'title' => 'Head Boy',
                        'details' => $this->sort_winners(100)
                    ),
                    'hg' => array(
                        'title' => 'Head Girl',
                        'details' => $this->sort_winners(101)
                    ),
                    'dhc' => array(
                        'title' => 'Dinning Hall Captain',
                        'details' => $this->sort_winners(102)
                    ),
                    'gc' => array(
                        'title' => 'Games Captain',
                        'details' => $this->sort_winners(103)
                    ),
                    'lc' => array(
                        'title' => 'Library Captain',
                        'details' => $this->sort_winners(104)
                    )
                )

            ),
            'form_level' => array(
                'title' => 'Form Level',
                'details' => array(
                    'title' => 'Form Captains',
                    'details' => $this->form_level_winners()

                )

            ),
            'class_level' => array(
                'title' => 'Class Level',
                'details' => array(
                    'title' => 'Class Prefects',
                    'details' => $this->class_level_winners()

                )

            )
        );
        $res = json_encode($res);
//        return json_decode($res,FALSE)->class_level->details->details;


        return view('reports.winners')->with('winners', $res);
    }

    public function sort_winners($id)
    {

        $item = App\Candidates::with('info.class', 'position')->where('position_id', '=', $id)->orderByDesc('votes')->first();
        $name = $item->info->first_name . " " . $item->info->last_name;
        $class = $item->info->class->class_name;
        $position = $item->position->position_name;
        $votes = $item->votes;
        $res = array(
            'name' => $name,
            'class' => $class,
            'position' => $position,
            'votes' => $votes
        );
//        }
        return $res;
    }

    public function form_level_winners()
    {
        $details = array();
        for ($i = 1; $i < 5; $i++) {
            $winner = App\Candidates::with('info.class.form', 'position')->whereHas('info.class.form', function ($query) use ($i) {
                $query->where('form_id', $i);
            })->whereHas('position', function ($q) {
                $q->where('position_id', 105);
            })->orderByDesc('votes')->first();
            if (!is_null($winner)) {

                $res = array(
                    'title' => $winner->info->class->form->form_name,
                    'name' => $winner->info->first_name . " " . $winner->info->last_name,
                    'class' => $winner->info->class->class_name,
                    'votes' => $winner->votes
                );
                array_push($details, $res);
            }


        }
        return $details;
    }

    public function class_level_winners()
    {
        $classes = App\Classes::all();
        $cl = array();
        foreach ($classes as $class) {
            $id = $class->class_id;
            array_push($cl, $id);
        }
        $details = array();
        for ($i = 0; $i < count($cl); $i++) {
            $winner = App\Candidates::with('info.class', 'position')->whereHas('info.class', function ($query) use ($cl, $i) {
                $query->where('class_id', $cl[$i]);
            })->whereHas('position', function ($q) {
                $q->where('position_id', 106);
            })->orderByDesc('votes')->first();
            if (!is_null($winner)) {

                $res = array(
                    'title' => $winner->info->class->class_name,
                    'name' => $winner->info->first_name . " " . $winner->info->last_name,
                    'class' => $winner->info->class->class_name,
                    'votes' => $winner->votes
                );
                array_push($details, $res);
            }


        }
        return $details;
    }

    public function proposers()
    {
    }

    public function seconders()
    {

    }

}
