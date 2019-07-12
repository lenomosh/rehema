@extends('layouts.front')
@section('content')

    <style>
        div.error-page{
            padding-top: 10%;
        }
    </style>
        <div class="error-page">
            <h2 class="headline text-red">403</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i> Access Denied.</h3>

                <p>
                    You are not allowed to view this page. <a href="{{route('auth.show.login.form')}}">Login</a> to continue. If problem persists, Contact the Admin ASAP
                </p>

            </div>
        </div>
@endsection