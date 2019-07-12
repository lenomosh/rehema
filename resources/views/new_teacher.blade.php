@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Add New Teacher
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Teachers</li>
        <li class="active">Add New Teacher</li>
    </ol>
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissable">
            {{session('message')}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <form class="form" method="post" action="{{route('teachers.store')}}">                @csrf
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Teacher</h3>
                    </div>
                    <div class="box-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="class_assigned">Class Assigned</label>
                                <select id="class_assigned" name="class_assigned" class="form-control">
                                    @foreach($noclassteacher as $classteacher)
                                        <option value="{{$classteacher->class_id}}">{{$classteacher->class_name}}</option>

                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="box-footer">
                        <div class="align-content-center">
                                <input type="submit" class="btn btn-success" value="Create New Teacher">

                        </div>


                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Assign Class Teachers</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Class ID</th>
                                    <th>Class Name</th>
                                    <th>Class Teacher</th>
                                    <th>Total Students</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($classes as $class  )
                                <tr>

                                            <td>{{$class->class_id}}</td>
                                            <td>{{$class->class_name}}</td>
                                            <td>@if (!is_null($class->class_teacher))
                                                    {{$class->class_teacher->first_name}} {{$class->class_teacher->last_name}}
                                            @endif</td>
                                            <td>{{count($class->students)}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Class ID</th>
                                    <th>Class Name</th>
                                    <th>Class Teacher</th>
                                    <th>Total Students</th>
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