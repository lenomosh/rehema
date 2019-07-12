<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lennox Omondi| RSPES</title>

    <!-- Font Awesome Icons -->
    <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
          rel='stylesheet' type='text/css'>
{{--Bootstrap--}}
{{--  <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">--}}
<!-- Plugin CSS -->
    <link href="{{asset('creative/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="{{asset('creative/css/creative.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('homepage')}}">Rehema Prefects Electoral System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register.index')}}">Vie for a Seat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('live_voting')}}">Voting Results</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-warning btn-flat" style="height:auto;" href="{{route('vote.index')}}">Vote</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@if (session('message'))
    <div class="alert alert-success alert-dismissable">
        {{session('message')}}
    </div>
@endif
@if (session('response'))
    <div class="alert alert-success alert-dismissable">
        {{session('response')}}
    </div>
@endif

@yield('content')


<!-- Footer -->
<footer class="bg-light py-5">
    <div class="container">
        <div class="small text-center text-muted">Copyright &copy; 2019 - <a href="https://linkedin.com/in/lenomosh">Lennox
                Omondi</a></div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('creative/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('creative/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('creative/js/creative.min.js')}}"></script>

</body>

</html>
