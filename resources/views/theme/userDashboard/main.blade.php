<!DOCTYPE html>
<html lang="en">
@include('theme.userDashboard.head')
<body>
    @if(!request()->is('login') && !request()->is('penjual/login'))
        @include('theme.userDashboard.header')
    @endif
    {{$slot}}
@include('theme.userDashboard.js')
@if(!request()->is('login') && !request()->is('penjual/login'))
    @include('theme.userDashboard.footer')
@endif
@yield('custom_js')
</body>
</html>