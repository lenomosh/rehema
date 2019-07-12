@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Add New Student
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Students</li>
    </ol>
@endsection
{{--box skeleton layoute
<div class=" box box-success">
    <div class="box-header">
        <h3 class="box-title">Add  New Student</h3>
    </div>
    <div class="box-body">

    </div>
    <div class="box-footer">

    </div>
</div>--}}
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
    <div class=" box box-success">
        <div class="box-header">
            <h3 class="box-title">Add New Student</h3>
        </div>
        <form method="post" action="{{route('students.store')}}">
            @csrf
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="first_name" placeholder="First Name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" class="form-control" name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="class_id">Class Name</label>
                                <select id="class_id" class="form-control" name="class_id">
                                    @foreach( $classes as $class)
                                        <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-success" value="Register Student">

            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Voters</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Adm No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th></th>
                        </thead>
                        <tbody>
                        @foreach($students as $student )
                            <tr>

                                <td>{{$student->admin_number}}</td>
                                <td>{{$student->first_name}}</td>
                                <td>{{$student->last_name}}</td>
                                <td>@if ($student->gender == 'M')
                                        Male
                                    @else
                                        Female
                                    @endif</td>
                                <td>{{$student->class_id}}</td>
                                <td>
                                    <a class="btn btn-info pull-left"
                                       href="{{route('students.edit',$student->admin_number)}}">Edit</a>

                                    <a class="btn btn-warning pull-right"
                                       href="{{route('students.show',$student->admin_number)}}">View</a>
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Adm No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th></th>
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