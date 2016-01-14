@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Informe</title>
</head>
<body>
  <div class="row" style="background-color:white;">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
     <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Informes</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Accidentes</a>
            </li>
            <li><a href="#about">Reparaciones</a>
            </li>
            <li><a href="#contact">Retardos</a>
            </li>

          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </div>




    <div class="container marg">
      <div class="panel panel-default">
       <div class="panel-heading admin"><h4>Informe de hoy: <?php date_default_timezone_set('America/Mexico_City'); $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
?></h4></div>

       <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped users">
          @foreach($enviosHD as $key => $value)
          <tr><td>Envíos HD</td><td>{{$value->HD}}</td></tr>
          @endforeach
          @foreach($enviosT as $key2 => $value2)
          <tr><td>Envíos Tasty</td><td>{{$value2->tasty}}</td></tr>
          @endforeach

          @foreach($enviosAll as $key4 => $value4)
          <tr><td>Envíos totales</td><td>{{$value4->total}}</td>	</tr>
          @endforeach

          @foreach($total as $key3 => $value3)
          <tr><td>Precio promedio del pedido</td><td>{{$value3->promedio}}</td>	</tr>
          <tr><td>IVA</td><td>{{$value3->IVA}}</td>	</tr>
          <tr><td>Ingresos totales</td><td>{{$value3->totales}}</td>   </tr>
          @endforeach


        </table>     
        <div class="panel-footer clearfix admin">

        </div>     
      </div>
    </div>

    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Informe de la ultima semana</h4></div>

     <div class="table-responsive">
       <table class="table table-bordered table-hover table-striped users">


        @foreach($enviosHD2 as $key => $value)
          <tr><td>Envíos HD</td><td>{{$value->HD}}</td></tr>
          @endforeach
          @foreach($enviosT2 as $key2 => $value2)
          <tr><td>Envíos Tasty</td><td>{{$value2->tasty}}</td></tr>
          @endforeach

          @foreach($enviosAll2 as $key4 => $value4)
          <tr><td>Envíos totales</td><td>{{$value4->total}}</td>  </tr>
          @endforeach

          @foreach($total2 as $key3 => $value3)
          <tr><td>Precio promedio del pedido</td><td>{{$value3->promedio}}</td> </tr>
          <tr><td>IVA</td><td>{{$value3->IVA}}</td> </tr>
          <tr><td>Ingresos totales</td><td>{{$value3->totales}}</td>   </tr>
          @endforeach

      </table>     
      <div class="panel-footer clearfix admin">

      </div>     
    </div>
  </div>

  <div class="panel panel-default">
   <div class="panel-heading admin"><h4>Informe del mes de: <?php
  
  $notificacion =  date('Y-m-d h:i:s');



$nuevafecha = strtotime ( '-1 MONTH' , strtotime ( $notificacion ) ) ;
$nuevafecha = date ( 'M' , $nuevafecha );
if ($nuevafecha == 'Dec') {
     $nuevafecha = 'Diciembre';
     echo $nuevafecha;
}
if ($nuevafecha == 'Jan') {
     $nuevafecha = 'Enero';
     echo $nuevafecha;
}
if ($nuevafecha == 'Feb') {
     $nuevafecha = 'Febrero';
     echo $nuevafecha;
}
if ($nuevafecha == 'Mar') {
     $nuevafecha = 'Marzo';
     echo $nuevafecha;
}
if ($nuevafecha == 'Apr') {
     $nuevafecha = 'Abril';
     echo $nuevafecha;
}
if ($nuevafecha == 'May') {
     $nuevafecha = 'Mayo';
     echo $nuevafecha;
}
if ($nuevafecha == 'Jun') {
     $nuevafecha = 'Junio';
     echo $nuevafecha;
}
if ($nuevafecha == 'Jul') {
     $nuevafecha = 'Julio';
     echo $nuevafecha;
}
if ($nuevafecha == 'Aug') {
     $nuevafecha = 'Agosto';
     echo $nuevafecha;
}
if ($nuevafecha == 'Dec') {
     $nuevafecha = 'Diciembre';
     echo $nuevafecha;
}
if ($nuevafecha == 'Dec') {
     $nuevafecha = 'Diciembre';
     echo $nuevafecha;
}
if ($nuevafecha == 'Dec') {
     $nuevafecha = 'Diciembre';
     echo $nuevafecha;
}

 ?></h4></div>

   <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped users">

      
        @foreach($enviosHD3 as $key => $value)
          <tr><td>Envíos HD</td><td>{{$value->HD}}</td></tr>
          @endforeach
          @foreach($enviosT3 as $key2 => $value2)
          <tr><td>Envíos Tasty</td><td>{{$value2->tasty}}</td></tr>
          @endforeach

          @foreach($enviosAll3 as $key4 => $value4)
          <tr><td>Envíos totales</td><td>{{$value4->total}}</td>  </tr>
          @endforeach

          @foreach($total3 as $key3 => $value3)
          <tr><td>Precio promedio del pedido</td><td>{{$value3->promedio}}</td> </tr>
          <tr><td>IVA</td><td>{{$value3->IVA}}</td> </tr>
          <tr><td>Ingresos totales</td><td>{{$value3->totales}}</td>   </tr>
          @endforeach
    </table>     
    <div class="panel-footer clearfix admin">

    </div>     
  </div>
</div>

</div>
</div>     
</div>
</body>
</html>