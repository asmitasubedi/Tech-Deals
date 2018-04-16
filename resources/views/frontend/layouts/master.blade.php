<!doctype html>
<html lang="en">
<head>
    <meta charset="">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TechDeals</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop-homepage.css')}}">
    <link rel="stylesheet" href="{{asset('css/portfolio.css')}}">
</head>
<body>

@include('frontend.layouts.nav')

@yield('content')

@include('frontend.layouts.footer')

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/enroll-now.js')}}"></script>

</body>
</html>