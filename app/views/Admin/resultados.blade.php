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

									<li ><a class="diseno-tabs" href="{{URL::to('/admin/vistos2') }}">Más vistos</a></li>
									<li><a class="diseno-tabs" href="{{URL::to('/admin/maspedidos2') }}">Más ordenes</a></li>
									<li><a class="diseno-tabs" href="{{URL::to('/admin/porcategoria2') }}">Más ventas</a></li>
									<li><a class="diseno-tabs" href="{{URL::to('/admin/porcategoria2') }}">Más productos</a></li>
									<li><a class="diseno-tabs" href="{{URL::to('/admin/porcategoria2') }}">Orden promedio</a></li>



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
																<thead class="at">
																	<tr>
																		<th width="100" heigth="100">Envíos cubiertos </th>
																		<th width="100" heigth="100">Costo promedio</th>
																		<th width="100" heigth="100">No. de transacciones</th>
																		<th width="100" heigth="100">Comisión</th>
																		<th width="100" heigth="100">Total a depositar</th>
																	</tr>
																</thead>
																<tbody class="at acomodo-tabla" >
																	<tr>
																		<td width="100" heigth="100">21 </td>
																		<td width="100" heigth="100">100</td>
																		<td width="100" heigth="100">6</td>
																		<td width="100" heigth="100">342</td>
																		<td width="100" heigth="100">300</td>
																	
																		<!-- <td width="50" heigth="50">3</td>
																		<td width="50" heigth="50">1</td> -->
																	
																	</tr>
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