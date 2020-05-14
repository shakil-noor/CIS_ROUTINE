<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CIS Class Routine Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico')}}">

    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/style.css')}}" rel="stylesheet" type="text/css">

</head>


<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">

        <div class="panel-body">
            <h3 class="text-center m-t-0 m-b-30">
                <span class=""><img src="{{ asset('image/diu1.png')}}" alt="logo" height="32"></span>
            </h3>
            <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>

                @isset($url)
                <form method="POST" class="form-horizontal m-t-20" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                            <form method="POST" class="form-horizontal m-t-20" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @endisset
                @csrf
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" value="{{ old('email') }}" name="email" type="email" required="" placeholder="Email">
                    </div>
                </div>
                {{--error message for email--}}
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="password"  type="password" required="" placeholder="Password">
                    </div>
                </div>
                {{--error massage for passowrd--}}
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

               <br>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-7">
                        <a href="{{ route('home') }}" class="text-muted"><i class="fa fa-arrow-circle-o-left m-r-5"></i> Back to Home</a>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>



<!-- jQuery  -->
<script src="{{ asset('assets/admin/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/app.js')}}"></script>

</body>
</html>
