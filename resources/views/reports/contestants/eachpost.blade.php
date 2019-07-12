@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Contestants for each post
        <small>Rehema Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Classes</a></li>
        <li class="active">Create</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        @foreach($positions as $position)
            <div class="col-md-6">
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$position->position_name}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Adm No</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Proposer</th>
                                <th>Seconders</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@if(session('teachers'))--}}
                            @foreach($position->candidates as $candidate)
                                <tr>
                                    <td>{{$candidate->info->admin_number}}</td>
                                    <td>{{$candidate->info->first_name}} {{$candidate->info->last_name}}</td>
                                    <td>{{$candidate->info->class_id}}</td>
                                    <td>{{$candidate->proposers->details->first_name}} {{$candidate->proposers->details->last_name}}
                                        ({{$candidate->proposers->details->class_id}})
                                    </td>
                                    <td>
                                        @foreach($candidate->seconders as $seconder)
                                            {{$seconder->details->first_name}} {{$seconder->details->last_name}}
                                            ({{$seconder->details->class_id}})<br>
                                        @endforeach
                                    </td>
                                </tr>

                            @endforeach
                            {{--@endif--}}

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>TeacherID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Class Assigned</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        @endforeach

    </div>
    <div class="row">
        <div class="col-xs-12">


            <div class="box box-success collapsed-box">
                <div class="box-header">
                    <h3 class="box-title">All Contestants</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Adm No</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Proposer</th>
                            <th>Seconders</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@if(session('teachers'))--}}
                        @foreach($contestants as $contestant)
                            <tr>
                                <td>{{$contestant->info->admin_number}}</td>
                                <td>{{$contestant->info->first_name}} {{$contestant->info->last_name}}</td>
                                <td>{{$contestant->info->class_id}}</td>
                                <td>{{$contestant->proposers->details->first_name}} {{$contestant->proposers->details->last_name}}
                                    ({{$contestant->proposers->details->class_id}})
                                </td>
                                <td>
                                    @foreach($contestant->seconders as $seconder)
                                        {{$seconder->details->first_name}} {{$seconder->details->last_name}}
                                        ({{$seconder->details->class_id}})<br>
                                    @endforeach
                                </td>
                            </tr>

                        @endforeach
                        {{--@endif--}}

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>TeacherID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Class Assigned</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@endsection