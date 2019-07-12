@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Report
        <small>Rehema Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('reports.index')}}"><i class="fa fa-dashboard"></i> Reports</a></li>
        <li class="active">Class</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{$students->class_name}} VOTERS</h3>
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
                        </thead>
                        <tbody>
                        @foreach($students->students as $student )
                            <tr>

                                <td>{{$student->admin_number}}</td>
                                <td>{{$student->first_name}}</td>
                                <td>{{$student->last_name}}</td>
                                <td>@if ($student->gender == 'M')
                                        Male
                                    @else
                                        Female
                                    @endif</td>


                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Adm No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
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