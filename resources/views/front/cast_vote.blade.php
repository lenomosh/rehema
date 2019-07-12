@extends('layouts.front')

@section('content')
    <style>
        .heading {
            align-content: center;
            text-align: center;
            text-shadow: #0a0a0a;
            text-effect: engrave;
            font-weight: bold;
            margin: 10px;
        }

        #checkbox {
            border-radius: 80%;
            width: 20px;
            height: 20px;
            color: forestgreen;
        }

        div#button {

            align-content: center;
        }
    </style>

    <div class="container">
        <div class="heading">
            <h1>Rehema Prefects Electoral System Vote Cast</h1>
            {{--<small>Choose your leaders wisely. Choose a leader who will bring change to your school.
                A true leader learns from the past, acts now and prepares for tomorrow</small>--}}

        </div>
        <div class="well">
            <blockquote>To vote, click the checkbox that presides the candidate's name
                <ul>
                    <li>Marking more than one checkbox in a given group is a spoilt vote.</li>
                    <li>If you don't want to vote for a certain category, you can leave the category blank.</li>
                </ul>
            </blockquote>

        </div>
        <form action="{{route('vote.cast')}}" id="vote" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Head Boy</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{--Add form for voting--}}
                            @php($positions = json_decode($positions,FALSE))
                            @foreach($positions->head_boys as $hb)

                                <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" name="hb_id[]" value="{{$hb->candidate_id}}" type="checkbox">
                        </span>
                                    <p class="form-control"> {{$hb->info->first_name}} {{$hb->info->last_name}}</p>
                                </div>


                            @endforeach


                            {{--end of voting form--}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Head Girl</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($positions->head_girls as $hg)

                                <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" name="hg_id[]" value="{{$hg->candidate_id}}" type="checkbox">
                        </span>
                                    <p class="form-control"> {{$hg->info->first_name}} {{$hg->info->last_name}}</p>
                                </div>


                            @endforeach
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dinning Hall Captain</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($positions->dinning_hall_captains as $dhc)

                                <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" name="dhc_id[]" value="{{$dhc->candidate_id}}" type="checkbox">
                        </span>
                                    <p class="form-control"> {{$dhc->info->first_name}} {{$dhc->info->last_name}}</p>
                                </div>


                            @endforeach
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Library Captain</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($positions->library_captains as $lc)

                                <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" name="lc_id[]" value="{{$lc->candidate_id}}" type="checkbox">
                        </span>
                                    <p class="form-control"> {{$lc->info->first_name}} {{$lc->info->last_name}}</p>
                                </div>


                            @endforeach
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Games Captain</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($positions->games_captains as $gc)

                                <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" name="gc_id[]" value="{{$gc->candidate_id}}" type="checkbox">
                        </span>
                                    <p class="form-control"> {{$gc->info->first_name}} {{$gc->info->last_name}}</p>
                                </div>


                            @endforeach
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Captain</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($positions->form_captains as $fc)

                                <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" name="fc_id[]" value="{{$fc->candidate_id}}" type="checkbox">
                        </span>
                                    <p class="form-control"> {{$fc->info->first_name}} {{$fc->info->last_name}}</p>
                                </div>


                            @endforeach

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Class Prefect</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($positions->class_prefects as $cp)

                                <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" name="cp_id[]" value="{{$cp->candidate_id}}" type="checkbox">
                        </span>
                                    <p class="form-control"> {{$cp->info->first_name}} {{$cp->info->last_name}}</p>
                                </div>


                            @endforeach
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


            </div>
            <input type="text" name="student_id" value="{{session()->get('student')->admin_number}}" hidden="true">
            <input type="text" name="student_class" value="{{session()->get('student')->class_id}}" hidden="true">

            <div id="button">
                <button id="submit_btn" type="submit" class="btn btn-block btn-xl btn-flat btn-success">Cast Your Vote
                </button>
            </div>

        </form>
    </div>

@endsection

@section('footer')
    <script type="text/javascript">
        window.onload(boxes());

        function boxes() {
            let nav = document.querySelector('header');
            nav.setAttribute('hidden', 'true');
            let boxes = document.getElementsByClassName('box');

            console.dir(boxes);
            for (let i = 0; i < boxes.length; i++) {
                let checkboxes = boxes[i].querySelectorAll('#checkbox');
                console.dir(checkboxes);

                let length = checkboxes.length;
                let checkcount = 0;
                for (let j = 0; j < length; j++) {

                    checkboxes[j].addEventListener('change', function (event) {
                        if (checkboxes[j].checked) {
                            checkcount++;
                            boxes[i].className = "box box-success box-solid";
                        } else {
                            if (checkcount > 0) {
                                checkcount--;
                            }
                            boxes[i].className = "box box-warning box-solid";

                        }
                        switch (checkcount) {
                            case 1:
                                boxes[i].className = "box box-success box-solid";
                                break;
                            case 0:
                                boxes[i].className = "box box-warning box-solid";
                                break;
                            default :
                                boxes[i].className = "box box-danger box-solid";
                        }
                    });
                    let btn = document.getElementById('submit_btn');
                    btn.addEventListener('click', function () {
                        btn.preventDefault();
                        let errors = document.querySelectorAll('.box-danger');
                        if (errors.length !== 0) {
                            alert('You are about to spoil a vote for some categories. If you think we are making a mistake then ignore this message');
                        }
                        document.forms['vote'].submit();
                    })
                }
            }
        }

    </script>

@endsection
