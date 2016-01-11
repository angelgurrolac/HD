@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reportes</title>
</head>
<body >


	<div class="row" style="background-color:white;">

		<div class="col-lg-2"></div>
		<div class="col-lg-10">

		<div class="container marge">
				<h1>Reportes</h1>


				<div class="panel panel-default">
					<div class="panel-heading admin"><h4><i class="fa fa-fw fa-file-text-o"></i> Envíos de Tasty</h4></div>

					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped users">

							<thead>
								<th>No. de envío</th>
								<th>Cantidad de platillos</th>
								<th>Total</th>
								<th>Costo por transporte</th>               
								<th>IVA</th>
								<th>Costo total</th>          
								<th>RFC</th>
								
							</thead>
							<tbody>
								 @if(count($envios)>0)

               				     @foreach($envios as $key => $value2)

								<tr>

									<td>{{$value2->creado}}-{{$value2->numero}}</td>
									<td>{{$value2->cantidad}}</td>
									<td>${{$value2->total}}</td>
									<td>$15</td>
									<td>$2.4</td>
									<td>${{$value2->final}}</td>
									<!-- <td>{{$value2->nombreR}}</td> -->
									<td>{{$value2->RFC}}</td>
								</tr>

								   @endforeach
           							 @endif

							</tbody>


						</table>     
						<div class="panel-footer clearfix admin">

						</div>     
					</div>
				</div>




				<div class="panel panel-default">
					<div class="panel-heading admin"><h4> <i class="fa fa-fw fa-file-text-o"></i> Envíos HD</h4></div>

					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped users">
							<thead>
								<th>No. de envío</th>
								<th>Cantidad de platillos</th>
								<th>Total</th>
								<th>Costo por transporte</th>               
								<th>IVA</th>
								<th>Costo total</th>          
								<th>RFC</th>
							</thead>
							<tbody>

								<tr>


									 @if(count($envios2)>0)

               				     @foreach($envios2 as $key2 => $value2)

								<tr>

									<td>{{$value2->creado}}-{{$value2->numero}}</td>
									<td>{{$value2->cantidad}}</td>
									<td>${{$value2->total}}</td>
									<td>$15</td>
									<td>$2.4</td>
									<td>${{$value2->final}}</td>
									<!-- <td>{{$value2->nombreR}}</td> -->
									<td>{{$value2->RFC}}</td>
								</tr>

								   @endforeach
           							 @endif
								</tr>

							</tbody>


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