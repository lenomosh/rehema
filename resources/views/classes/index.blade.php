@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Add New Class
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Classes</li>
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
    @if (session('message'))
        <div class="alert alert-success alert-dismissable">
            {{session('message')}}
        </div>
    @endif
    @if (session('response'))
            <div class="alert alert-success alert-dismissable">
                {{session('response')}}
            </div>
    @endif
    <form class="form" method="post" action="{{route('classes.store')}}">
        @csrf
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Classes</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="class_id">ClassID</label>
                            <input type="text" id="class_id" name="class_id" class="form-control" placeholder="Enter Class ID">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="class_name">Class Name</label>
                            <input type="text" id="class_name" name="class_name" class="form-control" placeholder="Class Name">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="class_teacher">Class Teacher</label>
                            <select id="class_teacher" name="class_teacher" class="form-control">
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->teacher_id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classes as $class )
                            <tr>

                                <td>{{$class->class_id}}</td>
                                <td>{{$class->class_name}}</td>
                                <td>
                                    @if (!is_null($class->class_teacher))
                                        {{$class->class_teacher->first_name}} {{$class->class_teacher->last_name}}
                                    @endif</td>
                                <td>{{count($class->students)}}</td>
                                <td><a class="btn btn-primary" href="{{route('classes.show',$class->class_id)}}">Edit</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Class ID</th>
                            <th>Class Name</th>
                            <th>Class Teacher</th>
                            <th>Total Students</th>
                            <th>Action</th>
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