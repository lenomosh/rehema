<?php

namespace App\Http\Controllers;
use App\Http\Resources\LiveVotingResource;
use Illuminate\Http\Request;
use App\LiveVoting;
use App;
use Illuminate\Support\Facades\Artisan;
use function MongoDB\BSON\toJSON;
use phpDocumentor\Reflection\Types\Array_;
class LiveVotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $votes = LiveVoting::all();
       header('Content-Type: text/event-stream');
       header('Cache-Control: no-cache');
       $return = new LiveVotingResource($votes);
       return $return;
       // return $results;
     }
     public function candidates()
     {
       $res = $this->candidates_and_votes_garnered();

       return view('front.live_results')->with('categories', json_encode($res));

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
                     'title' => 'Games Captains',
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
         return $res;
         // return view('reports.garnered_for_each_post')->with('categories', $res);
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
             $id = $value->candidate_id;
             $res = array(
                 'name' => $name,
                 'class' => $class,
                 'position' => $position,
                 'votes' => $votes,
                 'id'=>$id
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
             $id = $value->candidate_id;
             $d = array(
                 'name' => $name,
                 'class' => $class,
                 'position' => $position,
                 'votes' => $votes,
                 'id'=>$id
             );
             array_push($candidates, $d);
         }
         return $candidates;
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
