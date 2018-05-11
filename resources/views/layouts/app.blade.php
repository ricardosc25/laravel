<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=" {{ asset('plugins/fontawesome/web-fonts-with-css/css/fontawesome-all.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen_v1.8.3/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('plugins/fontawesome/web-fonts-with-css/css/fontawesome-all.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/stylePers.css') }} ">
   

</head>
<body>   
        @include('shared.nav')

        <div class="container">
            @include('flash::message')
            @include('shared.errors_flash')
            @yield('content')
            
        </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- Latest compiled and minified JavaScript -->
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- [/] jquery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('plugins/fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>
    <script src="{{ asset('plugins/chosen_v1.8.3/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
    {{-- <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script> --}}
    @yield('js')
</body>
</html>
