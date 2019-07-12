@extends('layouts.front')
@section('content')
    <div id="header" class="container-fluid">
        <div class="well">
            <h1 style="display: block; text-align: center; font-style: oblique; color: darkorange">Rehema School Prefects Electoral System</h1>
            <h2 style="text-align: center;font-style: italic;font-weight: bold; color: dodgerblue">Live Results</h2>
        </div>
    </div>
    <div class="row">
    @foreach(json_decode($categories,FALSE) as $category)
        <!-- /.col -->
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$category->title}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
                                    <td id="{{$detail->id}}"></td>

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
