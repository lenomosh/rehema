@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Add New Teacher
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('students.index')}}"><i class="fa fa-users"></i> Students</a></li>
        <li class="active">Edit</li>
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
    <div class=" box box-success">
        <div class="box-header">
            <h3 class="box-title">Edit Student Details</h3>
        </div>
        <form method="post" action="{{route('students.update',$student->admin_number)}}">
            @csrf
            @method('PUT')
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{$student->first_name}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{$student->last_name}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" class="form-control" name="gender">
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
                                <select id="class_id" class="form-control" name="class_id">
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
                <div class="row">
                    <div class="align-content-center">
                        <div class="col-sm-6">
                            <div class="col-sm-3">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                            <div class="col-sm-3">

                            </div>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                                Delete
                            </button>

                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove {{$student->first_name}} from the Election System?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <form method="post" action="{{route('students.destroy',$student->admin_number)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline" value="Yes">
                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection