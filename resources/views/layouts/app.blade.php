<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen_v1.8.3/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/imgareaselect/css/imgareaselect-animated.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/imgareaselect/css/imgareaselect-default.css') }}">

</head>
<body>   
        @include('shared.nav')

        <div class="container">
            @yield('content')
            @include('flash::message')
            @include('shared.errors_flash')
        </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- Latest compiled and minified JavaScript -->
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- [/] jquery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('plugins/chosen_v1.8.3/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
    <script src="{{ asset('plugins/imgareaselect/js/jquery.imgareaselect.js') }}"></script>
    @yield('js')
</body>
</html>
