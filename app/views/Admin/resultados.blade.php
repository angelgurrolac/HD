@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	  
</head>
<body>
	<div class="row" style="background-color:white;">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
			<br>
			<br>

			<div class="container-fluid">

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading admin">
								<h3 class="panel-title"><i class="fa fa-fw fa-check-circle-o"></i> Resultados</h3>
							</div>
							<div class="panel-body">
								<ul class="nav nav-tabs">

									<li ><a class="diseno-tabs" href="#">Más vistos</a></li>
									<li><a class="diseno-tabs" href="#">Más ordenes</a></li>
									<li><a class="diseno-tabs" href="#">Más ventas</a></li>
									<li><a class="diseno-tabs" href="#">Más productos</a></li>
									<li><a class="diseno-tabs" href="#">Orden promedio</a></li>



								</ul>
								<br>

								<div class="row" style="background-color:white;">
									<div class="col-lg-12">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
											
													<h3 >Resultados</h3>
													<div class="panel-body"  >
														<div class="table-responsive">
															<table class="table table-bordered table-hover table-striped" >
																<thead >
																	<tr>
																		<th width="100" heigth="100">Empleado HD </th>
																		<th width="100" heigth="100">Envíos cubiertos </th>
																		<th width="100" heigth="100">Costo promedio</th>
																		<th width="100" heigth="100">No. de transacciones</th>
																		<th width="100" heigth="100">Comisión</th>
																		<th width="100" heigth="100">Total a depositar</th>
																		<th width="100" heigth="100">Acciones</th>
																	</tr>
																</thead>
																<tbody >
																	 @if(count($envios)>0)

               															@foreach($envios as $key => $value)
																	<tr>

																		<td width="100" heigth="100">{{$value->nombre}}</td>
																		<td width="100" heigth="100">{{$value->envios_totales}}</td>
																		<td width="100" heigth="100">$15</td>
																		<td width="100" heigth="100">{{$value->enviosTarjeta}}</td>
																		<td width="100" heigth="100">$9</td>
																		<td width="100" heigth="100">${{$value->pago}}</td>
																		<td width="100" heigth="100">{{ Form::submit('Pagar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}</td>

																	</tr>

																	 @endforeach
                  												       @endif

																</tbody>
															</table>

															



														</div>
													</div>
												</div>
											</div>
											<!-- /.row -->
										</div>
										<!-- /.container-fluid -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>     
			</div>
		</div>
	</div>

</body>
</html>