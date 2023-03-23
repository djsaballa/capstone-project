<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="asset {{ 'dist/images/logo.svg" rel="shortcut icon' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
    <script src="{{ asset('js/script.js') }}"></script>    
    <title>ADDFII PROFILING</title>

    <!-- BEGIN: CSS Assets-->
    @vite('resources/css/app.css')
    <!-- END: CSS Assets-->
</head>

<!-- END: Head -->

<body class="py-5">
    <div class="flex mt-[4.7rem] md:mt-0">

        @include('components.side-menu')

        <div class="content">
            @include('components.top-bar-nav')
            @yield('content')
        </div>

        @vite('resources/js/app.js')
    </div>
</body>

</html>
