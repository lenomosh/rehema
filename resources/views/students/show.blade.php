@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Add New Teacher
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('students.index')}}"><i class="fa fa-dashboard"></i> Students</a></li>
        <li class="active">View</li>
    </ol>
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissable">
            {{session('message')}}
        </div>

    @endif
    <div class=" box box-success">
        <div class="box-header">
            <h3 class="box-title">View Student Details</h3>
        </div>
        <form id="form">
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input disabled type="text" name="first_name" placeholder="First Name" class="form-control" value="{{$student->first_name}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input disabled type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{$student->last_name}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select disabled id="gender" class="form-control" name="gender">
                                <option  value="M" @if ($student->gender == 'M')
                                        selected
                                        @endif>Male</option>
                                <option value="F" @if ($student->gender == 'F')
                                selected
                                        @endif>Female</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="class_id">Class Name</label>
                                <select disabled id="class_id" class="form-control" name="class_id">
                                    @foreach( $classes as $class)
                                        <option value="{{$class->class_id}}" @if ($student->class_id == $class->class_id)
                                                selected
                                                @endif>{{$class->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="box-footer">
                {{--<div class="row">--}}
                    {{--<div class="align-content-center">--}}
                        {{--<div class="col-sm-6">--}}
                            {{--<div class="col-sm-3">--}}
                                {{--<a href="{{route('students.edit',$student->admin_number)}}" type="submit" class="btn btn-success">Edit Details</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-3">--}}

                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


            </div>
        </form>
    </div>
    <div class="row">
                <a class="btn btn-app center-block" href="{{route('students.edit',$student->admin_number)}}">
                    <i class="fa fa-edit"></i> Edit
                </a>
    </div>
@endsection
