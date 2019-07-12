@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Report on Winners
        <small>Rehema Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Reports</a></li>
        <li class="active">Winners per post</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        @php
            $winners = json_decode($winners,FALSE);
            $school=$winners->school_level;
            $form = $winners->form_level;
            $class = $winners->class_level;
        @endphp
        {{--//school winners--}}
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$school->title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Votes Garnered</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($school->details as $detail)
                            <tr>
                                <td>{{$detail->details->name}}</td>
                                <td>{{$detail->details->class}}</td>
                                <td>{{$detail->details->position}}</td>
                                <td>{{$detail->details->votes}}</td>
                            </tr>

                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Votes Garnered</th>
                        </tr>
                        </tfoot>
                    </table>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$form->title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Votes Garnered</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($form->details->details as $detail)
                            <tr>
                                <td>{{$detail->name}}</td>
                                <td>{{$detail->class}}</td>
                                <td>{{$detail->title." CAPTAIN"}} </td>
                                <td>{{$detail->votes}}</td>
                            </tr>

                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Votes Garnered</th>
                        </tr>
                        </tfoot>
                    </table>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$class->title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Votes Garnered</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($class->details->details as $detail)
                            <tr>
                                <td>{{$detail->name}}</td>
                                <td>{{$detail->class}}</td>
                                <td>{{$detail->title." PREFECT"}} </td>
                                <td>{{$detail->votes}}</td>
                            </tr>

                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Votes Garnered</th>
                        </tr>
                        </tfoot>
                    </table>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


    </div>

@endsection
