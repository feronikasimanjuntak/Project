<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body">
    <div id="app">
        @include('layouts.header')
        <main>
            @yield('content')
        </main>
        <div>
        @include('layouts.footer')
        </div>
    </div>
    @include('layouts.script')
    @yield('custom_js')
</body>
</html>
