@extends('layouts.front')
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

    @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            {{session('error')}}
        </div>
    @endif

    <body class="hold-transition register-page">
    @if (session()->has('passed'))
        <div class="register-box">
            <div class="register-logo">
                <a href="/"><b>Rehema School</b> Candidate Registration</a>
            </div>

            <div class="register-box-body">
                <h3 class="login-box-msg" style="color: green">Message from Admin</h3>
                <p>{{session()->get('passed')}}</p>
                <hr class="rule">
                <br>
                <a href="{{route('homepage')}}" class="btn btn-warning btn-block">Go back to Homepage</a>


            </div>
            <!-- /.form-box -->
        </div>

    @elseif(session('failed'))
        <div class="register-box">
            <div class="register-logo">
                <a href="/"><b>Rehema School</b> Candidate Registration</a>
            </div>

            <div class="register-box-body">
                <h3 class="login-box-msg" style="color: green">Message from Admin</h3>
                <p>{{session('failed')}}</p>
                <hr class="rule">
                <a href="{{route('homepage')}}" class="btn btn-warning btn-block">Go back to Homepage</a>

            </div>
            <!-- /.form-box -->
        </div>
    @else

        <div class="register-box">
            <div class="register-logo">
                <a href="/"><b>Rehema School</b> Candidate Registration</a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Register as a candidate</p>

                <form action="{{route('candidate_check')}}" method="post">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="number" class="form-control"
                               onkeypress="isNumberKey(event);if(this.value.length==5) return false;"
                               name="admin_number" placeholder="Admission Number">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Validate Details</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div>
    @endif


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
@if(session()->has('failed')||session()->has('passed'))
    {{session()->flush()}}
@endif