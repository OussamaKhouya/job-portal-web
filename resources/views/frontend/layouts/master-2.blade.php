<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Oficiona</title>

    @notifyCss

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

    <!-- External Css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/themify-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/et-line.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plyr.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/flag.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery.nstSlider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/html5-simple-date-input-polyfill.css')}}"/>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/dashboard/css/dashboard.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.jpg">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.jpg">


    <!--[if lt IE 9]>
    <script src="{{asset('frontend/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>


@include('frontend.layouts.header-2')

@yield('contents')

@include('frontend.layouts.footer')



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/feather.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.nstSlider.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/visible.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset('frontend/assets/js/chart.js')}}"></script>
<script src="{{asset('frontend/assets/js/plyr.js')}}"></script>
<script src="{{asset('frontend/assets/js/tinymce.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/html5-simple-date-input-polyfill.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="{{asset('frontend/js/custom.js')}}"></script>
<script src="{{asset('frontend/dashboard/js/dashboard.js')}}"></script>
<script src="{{asset('frontend/dashboard/js/datePicker.js')}}"></script>
<script src="{{asset('frontend/dashboard/js/upload-input.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="{{asset('frontend/js/map.js')}}"></script>

{{--Custom Js--}}

<x-notify::notify />
@notifyJs

<script>
    /* select2 */
    $('.mselect2').select2({
        closeOnSelect: false
    });


</script>
</body>
</html>
