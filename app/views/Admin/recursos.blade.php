<!doctype html>
<html  lang="en" class="no-js"> 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' > -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/sb-admin.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/morris.css') }}">
  <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" >
  <link rel="stylesheet" href="{{ URL::asset('assets/pnotify.css') }}">
  <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ URL::asset('assets/pnotify.js') }}"></script>

  
<!-- jQuery -->
  <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
</head>

@if (Session::has('message'))
<script>
  $(function(){
    new PNotify({
      title: '{{ Session::get("message") }}',
      type: 'success'
    });
  });
</script>
@endif
<?php  $var = $errors->all()?> 
@if(!empty($var))

@foreach ($errors->all() as $error)
<script>
  $(function(){
    new PNotify({
      text: '{{$error}}',
      type: 'error'
    });
  });

</script>
@endforeach
@endif


<body>
   
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                 <a class="navbar-brand" href="{{URL::to('/admin/publicidad') }}"><p style="display:inline-block; padding:2px; color:#F6A507;">Happy Delivery</p></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Session::get('nombre') }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
             <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav" style="overflow-y:hidden;">
          <br>
          <li>
            <a href="{{URL::to('/admin/publicidad') }}"><i class="fa fa-fw fa-bookmark"></i> Publicidad</a>
          </li>
          <li>
            <a href="{{URL::to('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Salir</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
        </nav>
    </div>
    <!-- /#wrapper -->
 
</body>

</html>

