<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

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
