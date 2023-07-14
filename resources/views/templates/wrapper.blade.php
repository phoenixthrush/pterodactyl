<!DOCTYPE html>
<html>
    <head>
        <title>{{ config('app.name', 'Pterodactyl') }}</title>

        @section('meta')
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="robots" content="noindex">
	    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
	    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
	    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
	    <link rel="manifest" href="/favicons/site.webmanifest">
	    <link rel="shortcut icon" href="/favicons/favicon.ico">
	    <meta name="msapplication-TileColor" content="#da532c">
	    <meta name="msapplication-config" content="/favicons/browserconfig.xml">
	    <meta name="theme-color" content="#ffffff">
        @show

        @section('user-data')
            @if(!is_null(Auth::user()))
                <script>
                    window.PterodactylUser = {!! json_encode(Auth::user()->toVueObject()) !!};
                </script>
            @endif
            @if(!empty($siteConfiguration))
                <script>
                    window.SiteConfiguration = {!! json_encode($siteConfiguration) !!};
                </script>
            @endif
        @show
        <style>
            @import url('//fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap');
            @import url('//fonts.googleapis.com/css?family=IBM+Plex+Mono|IBM+Plex+Sans:500&display=swap');
        </style>

        @yield('assets')

        @include('layouts.scripts')
    </head>
    <body class="{{ $css['body'] ?? 'bg-neutral-50' }}">
        @section('content')
            @yield('above-container')
            @yield('container')
            @yield('below-container')
        @show
        @section('scripts')
            {!! $asset->js('main.js') !!}
        @show
    </body>
</html>
