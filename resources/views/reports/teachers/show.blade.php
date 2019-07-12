@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Class Teachers
        <small>Rehema Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Reports</a></li>
        <li class="active">Class Teachers</li>
    </ol>
@endsection
@section('content')
    {{--@dump($teachers)--}}
    <div class="row">
        <div class="col-xs-12">


            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Class Teachers</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Teacher ID</th>
                            <th>Name</th>
                            <th>Class Assigned</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@if(session('teachers'))--}}
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->teacher_id}}</td>
                                <td>{{$teacher->first_name}} {{$teacher->last_name}}</td>
                                <td>@if(is_null($teacher->class_assigned))
                                        None
                                    @else
                                        {{$teacher->class_assigned->class_name}}@endif</td>
                            </tr>

                        @endforeach
                        {{--@endif--}}

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>TeacherID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
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