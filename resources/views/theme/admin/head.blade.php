<link href="{{asset('assets/images/Logo/logo1.png')}}" rel="icon">
<title>{{config('app.name') . ': ' . $title ?? config('app.name')}}</title>
<link href="{{asset('assets/user/css/bootstrap.min.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<!-- General CSS Files -->
<link href="{{asset('assets/user/css/styleadmin1.css')}}" rel="stylesheet">
<link href="{{asset('assets/user/css/components.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/toastr.css')}}">
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
<link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
