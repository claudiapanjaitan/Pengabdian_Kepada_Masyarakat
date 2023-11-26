<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/images/Logo/logo1.png')}}" rel="icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{config('app.name') . ': ' .$title ?? config('app.name')}}</title>
    <link href="('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap')" rel="stylesheet">
    <link href="{{asset('assets/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/login/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/login/login1.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('css/confirm.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
</head>