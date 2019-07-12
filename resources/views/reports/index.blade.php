@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Report on Voters
        <small>Rehema Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Reports</a></li>
        <li class="active">Create</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        @foreach($forms as $form)
            <div class="col-md-3">
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$form->form_name}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="btn-group-vertical" style="width: 100%">
                            <a type="button" href="{{route('reports.form',$form->form_id)}}"
                               class="btn btn-warning">All</a><br>
                            @foreach($form->class as $class)
                                <a type="button" href="{{route('reports.show',$class->class_id)}}"
                                   class="btn btn-default">{{$class->class_name}}</a><br>
                            @endforeach
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        @endforeach

    </div>
    <div class="row">
        <div class="col-xs-12">


            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">All Voters</h3>

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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Class</th>
                        </thead>
                        <tbody>
                        @foreach($all_voters as $student )
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