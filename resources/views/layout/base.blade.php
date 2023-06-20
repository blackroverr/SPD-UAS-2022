<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/spd_logo.png') }}" rel="shortcut icon"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/basic.min.css" integrity="sha512-8k0lsWpVPSg08/yrT3eSlr/HG5mxRghr8Uh6gkOaj2KOi8chn6nws1ytLlo99CKVzKE6JuCopJHh0RbUfWGMBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- PWA  -->
    {{-- <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
        <!-- Filepond  -->
    

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
    
</head>
<!-- END: Head -->

@yield('body')

</html>
