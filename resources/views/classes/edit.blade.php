@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Add New Teacher
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('classes.index')}}"><i class="fa fa-dashboard"></i> Classes</a></li>
        <li class="active">Edit/li>
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

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Classes</h3>
            </div>
            <form class="form" method="post" action="{{route('classes.update',$class->class_id)}}">
                @method('PUT')
                @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="class_id">ClassID</label>
                            <input type="text" id="class_id" name="class_id" class="form-control" value="{{$class->class_id}}">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="class_name">Class Name</label>
                            <input type="text" id="class_name" name="class_name" class="form-control"  value="{{$class->class_name}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="align-content-center">
                            <input type="submit" class="btn btn-success" value="Update">

                        </div>
                    </div>


                <div class="col-sm-3">
                    <div class="align-content-center">
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
                    <p>Are you sure you want to delete this class?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <form method="post" action="{{route('classes.destroy',$class->class_id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline" value="Delete Class">
                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection