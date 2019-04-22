<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

    @stack('before-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/backend.css')) }}"/>
    @stack('after-styles')

</head>

<body>
<div class="{{ config('backend.body_classes') }}">

    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            <ol class="breadcrumb">
                @yield('breadcrumb')

                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        @yield('toolbar')
                    </div>
                </li>
            </ol>
            
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div>
                    @include('includes.partials.messages')
                    @yield('content')
                </div>
            </div>
        </main>
        @include('backend.includes.aside')
    </div><!--app-body-->

    @include('backend.includes.footer')
</div>
<!-- Scripts -->
@stack('before-scripts')
<script src="{!! asset(mix('js/manifest.js')) !!}" ></script>
<script src="{!! asset(mix('js/vendor.js')) !!}"></script>
<script src="{!! asset(mix('js/backend.js')) !!}"></script>
@stack('after-scripts')
</body>
</html>
