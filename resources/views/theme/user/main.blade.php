<!DOCTYPE html>
<html lang="en">
@include('theme.user.head')
<body>
    @include('theme.user.header')
    {{$slot}}
@include('theme.user.js')
@yield('custom_js')
</body>
</html>