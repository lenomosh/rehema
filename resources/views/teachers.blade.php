@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Teachers
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Teachers</li>
    </ol>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Rehema School Class Teachers List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>TeacherID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Class Assigned</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@if(session('teachers'))--}}
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{$teacher->teacher_id}}</td>
                                    <td>{{$teacher->first_name}}</td>
                                    <td>{{$teacher->last_name}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>@if (@isset($teacher->class_assigned))
                                            {{$teacher->class_assigned->class_name}}
                                        @endif</td>
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

