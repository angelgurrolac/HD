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
								<th>Cantidad</th>
								<th>Platillos</th>
								<th>Costo por transporte</th>               
								<th>IVA</th>
								<th>Costo total</th>          
								<th>Razón social</th> 
								<th>RFC</th>
								<th></th>
							</thead>
							<tbody>

								<tr>

									<td>$val->platillos_vendidos</td>
									<td>$val->costo_promedio</td>
									<td>$val->no_ordenes</td>

									<td>$val->consultas</td>
									<td>$val->comision</td>
									<td>$val->total</td>

									<td>$val->fecha</td>
									<td>$val->fecha</td>
								</tr>

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
								<th>Cantidad</th>
								<th>Paquete</th>
								<th>Costo por transporte</th>               
								<th>IVA</th>
								<th>Costo total</th>          
								<th>Razón social</th> 
								<th>RFC</th>
								<th></th>
							</thead>
							<tbody>

								<tr>


									<td></td>

									<td></td>
									<td></td>

									<td>$value->consultas</td>
									<td>$value->comision</td>
									<td>$value->total</td>
									<td>4242424242424242</td>
									<td>$value->fecha</td>
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