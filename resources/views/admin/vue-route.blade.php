<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{asset('admin/css/init.css?v=1')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/main.css?v=524')}}" rel="stylesheet" type="text/css">
    {{--<link rel="stylesheet" href="{{asset('css/app.css')}}" >--}}
</head>

<body>


<div id="app">
    <router-view>

    </router-view>

</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
