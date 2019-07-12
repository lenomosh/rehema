@extends('layouts.admin')
@section('breadcrump')
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
    @endsection
@section('content')
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6" >
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$info->students}}</h3>

                        <p>Students</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people-outline"></i>
                    </div>

                    <a href="{{route('students.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$info->approved}}</h3>

                        <p>Approved Contestants</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-people"></i>
                    </div>
                    <a href="{{route('contestants.approved')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$info->rejected}}</h3>

                        <p>Failed Contestants</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('contestants.disqualified')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$info->teachers}}</h3>

                        <p>Teachers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{route('teachers.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="box box-danger">
                    <div class="box-header">

                        <h3 class="box-title">Message from the wise men of earth</h3>
                        <div class="box-tools pull-right">
                            <button onclick="getquotes();" type="button" class="btn btn-box-tool"> <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div id="quote" class="box-body">
                        <blockquote id="getQuotes"></blockquote>
                        <div class="pull-right">
                            ~ <i class="pull-right" id="quoteAuthor"></i>
                        </div>
                        <b style="color: orangered" id="error-message" hidden = hidden>Ooops, we ran into an error. Please refresh this page</b>

                    </div>
                    <!-- /.box-body -->
                    <!-- Loading (remove the following to stop the loading)-->
                    <div id="spinner" class="overlay" hidden = hidden>
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>

                    <!-- end loading -->
                </div>

                <!-- Custom tabs (Charts with tabs)-->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    {{--<script>--}}
        {{--function load(url) {--}}
            {{--let d = new XMLHttpRequest();--}}
            {{--d.open('GET',url);--}}
            {{--d.onload = function (){--}}
                {{--if (this.status ===200)--}}
                {{--document.open(this.responseURL)--}}
            {{--}--}}
            {{--d.send();--}}

        {{--}--}}
    {{--</script>--}}

  @endsection