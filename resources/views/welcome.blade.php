<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Class Routine Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/admin/css/welcome.css') }}" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

<!-- Header -->
<header class="masthead d-flex" style="background-image: url('{{ asset('image/bg-masthead.jpg')}}');">
    <div class="container text-center my-auto">
        <h1 class="mb-1">Welcome</h1>
        <h3 class="mb-5">
            <em>Daffodil International University</em>
        </h3>

        <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('login') }}">Admin</a>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Coordinator</a>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Teacher</a>
        <h4 class="mb-5">
            <em>Powered by Department of CIS</em>
        </h4>
    </div>
    <div class="overlay"></div>
</header>

</body>

</html>
