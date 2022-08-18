<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="overflow-x:hidden;">
<div class="wrapper" id="app">

<!-- <admin-header></admin-header>

<admin-sidebar></admin-sidebar>




 -->



 <!--- <div class="content-wrapper">--->




    <router-view></router-view>











  <!-- <example-component></example-component> -->


<!-- <admin-footer></admin-footer> -->



</div>


  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
