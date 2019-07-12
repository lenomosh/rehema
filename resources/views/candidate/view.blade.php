@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contestants</li>
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
                            <th>Proposer</th>
                            <th rowspan="5">Seconders</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--{{$contestants = json_decode($contestants,FALSE)}}--}}
                        @foreach($contestants as $KEY=>$contestant)
                            <tr>
                                <td>{{$contestant->contestant_details->first_name}} {{$contestant->contestant_details->last_name}}</td>
                                <td>{{$contestant->contestant_details->class->class_name}}</td>
                                <td>{{$contestant->position->position_name}}</td>
                                <td>{{$contestant->proposer_details->first_name}} {{$contestant->proposer_details->last_name}}</td>
                                <td>
                                @foreach($contestant->seconders as $seconder)
                                    {{$seconder->first_name}} {{$seconder->last_name}} <b>Class: </b>{{$seconder->class->class_name}}<br>
                                    @endforeach
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#a{{$contestant->contestant_details->admin_number}}">
                                        Approve
                                    </button>
                                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#r{{$contestant->contestant_details->admin_number}}">
                                        Reject
                                    </button>
                                </td>
                            </tr>
                            {{--Modals--}}

                            <div class="modal modal-success fade" id="a{{$contestant->contestant_details->admin_number}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{$contestant->contestant_details->first_name}}'s application approval</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you want to approve {{$contestant->contestant_details->first_name}} to vie for <b>{{$contestant->position->position_name}}</b> seat?<b>Note</b> that this operation cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <form method="post" action="{{route('contestants.store')}}">
                                                @csrf
                                                <input type="number" name="contestant_id" value="{{$contestant->contestant_details->admin_number}}" hidden>
                                                <input type="number" name="proposer_id" value="{{$contestant->proposer_details->admin_number}}" hidden>
                                                <input type="number" name="position_id" value="{{$contestant->position->position_id}}" hidden>
                                                @foreach($contestant->seconders as $seconder)
                                                    <input type="number" name="seconders[]" value="{{$seconder->admin_number}}" hidden>
                                                    @endforeach
                                                <input type="submit" class="btn btn-success btn-outline" value="Approve">
                                            </form>

                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            <div class="modal modal-danger fade" id="r{{$contestant->contestant_details->admin_number}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('contestants.reject')}}" method="post">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Reject {{$contestant->contestant_details->first_name}}'s Application</h4>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <input name="position_id" value="{{$contestant->position->position_id}}" hidden>
                                            <input name="candidate_id" value="{{$contestant->contestant_details->admin_number}}" hidden>
                                            <div class="form-group">
                                                <label for="reason">Reason for your decision</label>
                                                <textarea onkeypress="if (this.value.length == 150){return false} " name="reason" rows="3" id="reason" class="form-control text-uppercase" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-outline" value="Reject Application">
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Position</th>
                            <th>Proposer</th>
                            <th>Seconders</th>
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