@extends('layouts.front')
@section('content')


    <body class="hold-transition register-page">
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
        <div class="container">
            <div class="alert alert-danger alert-dismissable">
                <p>{{session('error')}}</p>
            </div>
        </div>

    @endif
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>Rehema School</b> Voting</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Enter your Admission Number to Proceed</p>

            <form action="{{route('vote.validate')}}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="number" class="form-control"
                           onkeypress="isNumberKey(event);if(this.value.length==5) return false;" name="admin_number"
                           placeholder="Admission Number">
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
