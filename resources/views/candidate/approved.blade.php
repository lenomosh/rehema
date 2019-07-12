@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Dashboard
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
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Contestants</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Level</th>
                            <th>Proposer</th>
                            <th>Seconders</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        {{$candidates = json_decode($candidates,FALSE)}}--}}
                        @foreach(json_decode($candidates) as $candidate)

                            <tr>
                                <td>{{$candidate->name}}</td>
                                <td>{{$candidate->class}}</td>
                                <td>{{$candidate->position}}</td>
                                <td>{{$candidate->level}}</td>
                                <td>{{$candidate->proposer}}</td>
                                <td>@foreach($candidate->seconders as $seconder)
                                {{$seconder->name}}<br>
                                        @endforeach
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Level</th>
                            <th>Proposer</th>
                            <th>Seconders</th>
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

    {{--Modals--}}

    <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Success Modal</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Danger Modal</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection