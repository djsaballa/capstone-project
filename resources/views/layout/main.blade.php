@extends('../layout/base')

@section('body')
    <body class="py-5">
        @yield('content')
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        @vite('resources/js/app.js')
        <!-- END: JS Assets-->

        @yield('script')
    </body>
@endsection
