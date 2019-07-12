@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Rejected Application
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('contestants.index')}}"><i class="fa fa-users"></i>Contestants</a></li>
        <li class="active">Rejected</li>
    </ol>
@endsection
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissable">
            {{session('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Rejected Contestants Application</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Reason for disqualification</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        {{$candidates = json_decode($candidates,FALSE)}}--}}
                        @foreach(json_decode($candidates) as $candidate)

                            <tr>
                                <td>{{$candidate->name}}</td>
                                <td>{{$candidate->class}}</td>
                                <td>{{$candidate->position}}</td>
                                <td>{{$candidate->reason}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Reason for disqualification</th>
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