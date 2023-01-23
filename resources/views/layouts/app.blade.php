<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('images') }}/logo.svg">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">    
    <link href="{{ asset('css') }}/fonts.css" rel="stylesheet" />
    <!-- CSS Files -->    
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- Custom CSS -->       
    <link href="{{ asset('css') }}/reset.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/color.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/utilities.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css') }}/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('css') }}/owl.theme.css">

    
    {{-- <link href="{{ asset('css') }}/owl.carousel.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/owl.theme.css" rel="stylesheet" /> --}}
    </head>
    <body class="{{ $class ?? '' }}" style="background: #000">
        {{-- @auth() --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    
            @include('layouts.page_templates.auth')
            
            
        {{-- @endauth --}}
        {{-- @guest()
            @include('layouts.page_templates.guest')
        @endguest --}}

        <!--   Core JS Files   -->
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
        
        <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/owl.carousel.js"></script>

        <!--  Notifications Plugin    -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>

        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <!-- <script src="{{ asset('material') }}/demo/demo.js"></script> -->
        
        <script src="{{ asset('material') }}/js/settings.js"></script>
        {{-- <script src="../assets/vendors/highlight.js"></script>
        <script src="../assets/js/app.js"></script> --}}
        @stack('js')
        <script>
            $(document).ready(function(){
                var status = "{{session('status')}}";
                if(status){
                    $.notify({
                    message: status
                    }, {
                    type: "success",
                    background:"green",
                    timer: 3000,
                    placement: {
                        from: "top",
                        align: "right"
                    }
                    })
                }
            })
        </script>
    </body>
</html>