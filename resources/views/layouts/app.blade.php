<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MA2XM Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- DataTable Css -->
        <link href="{{ asset('argon') }}/vendor/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/datatables/css/buttons.bootstrap4.min.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/datatables/css/select.bootstrap4.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/js.cookie.js"></script>
        <script src="{{ asset('argon') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/jquery.lavalamp.min.js"></script>

        <script src="{{ asset('argon') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/js/buttons.html5.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/js/buttons.flash.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/js/buttons.print.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/form-steps/jquery.backstretch.js"></script>
        <script src="{{ asset('argon') }}/vendor/form-steps/scripts.js"></script>

        @stack('js')
        
        <script src="{{ asset('argon') }}/js/argon.js"></script>
        <!--<script src="{{ asset('argon') }}/vendor/bootstrap-select/bootstrap-select.min.js"></script>-->
        <script src="{{ asset('argon') }}/js/custom.js"></script>
    </body>
</html>