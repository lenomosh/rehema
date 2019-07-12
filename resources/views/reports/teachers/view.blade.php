@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Create New Class
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
        <div class="col-xs-12">


            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Class Teachers</h3>

                    >
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
                                <td>{{$teacher->class_assigned->class_name}}</td>
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