@extends('layouts.admin')
@section('breadcrump')
    <h1>
        Contestants and Votes Garnered
        <small>Rehema Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Reports</a></li>
        <li class="active">Contestants and Votes garnered</li>
    </ol>
@endsection
@section('content')
    <div class="row">
    @foreach(json_decode($categories,FALSE) as $category)
        <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$category->title}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Position</th>
                                <th>No. of Votes</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($category->details as $detail)
                                <tr>
                                    <td>{{$detail->name}}</td>
                                    <td>{{$detail->class}}</td>
                                    <td>{{$detail->position}}</td>
                                    <td>{{$detail->votes}}</td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Position</th>
                                <th>No. of Votes</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        @endforeach
    </div>

@endsection
