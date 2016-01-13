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
       <div class="panel-heading admin"><h4>Informe Diario</h4></div>

       <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped users">
          @foreach($enviosHD as $key => $value)
          <tr><td>Envíos HD</td><td>{{$value->HD}}</td></tr>
          @endforeach
          @foreach($enviosT as $key2 => $value2)
          <tr><td>Envíos Tasty</td><td>{{$value2->tasty}}</td></tr>
          @endforeach

          <tr><td>Envíos totales</td><td>{{$enviosAll}}</td>	</tr>
          <tr><td>Porcentaje de cumplimiento</td><td>--</td>	</tr>
          <tr><td>Precio promedio del pedido</td><td>--</td>	</tr>
          <tr><td>IVA</td><td>--</td>	</tr>
          <tr><td>Ingresos totales</td><td>--</td>   </tr>


        </table>     
        <div class="panel-footer clearfix admin">

        </div>     
      </div>
    </div>

    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Informe Semanal</h4></div>

     <div class="table-responsive">
       <table class="table table-bordered table-hover table-striped users">


        <tr><td>Envíos Tasty</td><td>--</td></tr>
        <tr><td>Envíos HD</td><td>--</td></tr>

        <tr><td>Envíos totales</td><td>--</td>  </tr>
        <tr><td>Porcentaje de cumplimiento</td><td>--</td>     </tr>
        <tr><td>Precio promedio del pedido</td><td>--</td>     </tr>
        <tr><td>IVA</td><td>--</td>   </tr>
        <tr><td>Ingresos totales</td><td>--</td>   </tr>

      </table>     
      <div class="panel-footer clearfix admin">

      </div>     
    </div>
  </div>

  <div class="panel panel-default">
   <div class="panel-heading admin"><h4>Informe Mensual</h4></div>

   <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped users">

      <tr><td>Envíos Tasty</td><td>--</td></tr>
      <tr><td>Envíos HD</td><td>--</td></tr>

      <tr><td>Envíos totales</td><td>--</td>  </tr>
      <tr><td>Porcentaje de cumplimiento</td><td>--</td>     </tr>
      <tr><td>Precio promedio del pedido</td><td>--</td>     </tr>
      <tr><td>IVA</td><td>--</td>   </tr>
      <tr><td>Ingresos totales</td><td>--</td>   </tr>
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