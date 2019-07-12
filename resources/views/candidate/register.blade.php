@extends('layouts.front')
@section('content')
    @if ($errors->any())

        <div class="alert alert-danger alert-dismissable">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>


    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            {{session('error')}}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success alert-dismissable">
            {{session('message')}}
        </div>
    @endif


    <body class="hold-transition register-page">

    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>Rehema School</b> Candidate Registration</a>
        </div>
        @php
            $student = session('student');
            $positions = session('positions');
        @endphp
        <div class="register-box-body">
            <div class="row">
                <div class="col-sm-3">
                    <b>Name:</b>
                </div>
                <div class="col-sm-9">
                    {{$student->first_name.' '.$student->last_name}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <b>Gender:</b>
                </div>
                <div class="col-sm-9">
                    {{$student->gender}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <b>Class:</b>
                </div>
                <div class="col-sm-9">
                    {{$student->class->class_name}}

                </div>
            </div>

        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Candidate Information</p>


            <form action="{{route('register.store')}}" method="post">
                @csrf
                <input type="number" name="admin_number" value="{{$student->admin_number}}" hidden>
                <div class="form-group has-feedback">
                    <label for="position">Which post are you vying for?</label>
                    <select id="position" class="form-control" name="position_id">
                        @if (session()->has('positions'))
                            @foreach($positions as $position)
                                <option value="{{$position->position_id}}">{{$position->position_name}}</option>
                            @endforeach
                        @else {{dd('internal error')}}
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label for="proposer">Proposer's Admission Number</label>
                    <input id="proposer" type="number" class="form-control"
                           onkeypress="isNumberKey(event);if(this.value.length==5) return false;" name="proposer_id"
                           placeholder="Proposer's Admission Number" required>
                </div>
                <label for="seconder">Seconder's Admission Number(s)</label>
                <div class="form-group">
                    <input id="seconder" type="number" class="form-control"
                           onkeypress="isNumberKey(event);if(this.value.length==5) return false;" name="seconder_id[]">
                </div>
                <div class="form-group">
                    <input id="seconder" type="number" class="form-control"
                           onkeypress="isNumberKey(event);if(this.value.length==5) return false;" name="seconder_id[]">
                </div>
                <div class="form-group">
                    <input id="seconder" type="number" class="form-control"
                           onkeypress="isNumberKey(event);if(this.value.length==5) return false;" name="seconder_id[]">
                </div>
                <div class="form-group">
                    <input id="seconder" type="number" class="form-control"
                           onkeypress="isNumberKey(event);if(this.value.length==5) return false;" name="seconder_id[]">
                </div>
                <div class="form-group">
                    <input id="seconder" type="number" class="form-control"
                           onkeypress="isNumberKey(event);if(this.value.length==5) return false;" name="seconder_id[]">
                </div>

                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>

    </body>


@stop
@section('footer')
    <script>

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        };
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
@stop
