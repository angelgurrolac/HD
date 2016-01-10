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
								<h3 class="panel-title"><i class="fa fa-fw fa-users"></i> Usuarios</h3>
							</div>
							<div class="panel-body">
								<ul class="nav nav-tabs">

									<li ><a class="diseno-tabs" href="{{URL::to('/admin/vistos2') }}">Número total</a></li>
									<li><a class="diseno-tabs" href="{{URL::to('/admin/maspedidos2') }}">Nuevos usuarios</a></li>
									<li><a class="diseno-tabs" href="{{URL::to('/admin/precios2') }}">Gasto promedio</a></li>
									<li><a class="diseno-tabs" href="{{URL::to('/admin/porcategoria2') }}">Porcentaje ha ordenado</a></li>

								</ul>
								<br>

								<div class="row" style="background-color:white;">
									<div class="col-lg-12">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
													<h3 >Usuarios Tasty</h3>
													<h3 >Nuevos usuarios </h3>
													<h3 >Gasto promedio</h3>
													<h3 >Porcentajes de orden</h3>
													<div class="panel-body"  >
														<div class="table-responsive">
															<table class="table table-bordered table-hover table-striped" >
																<thead class="at">
																	<tr>
																		<th width="50" heigth="50">Edad</th>
																		<th width="20" heigth="200">Nombre</th>
																		<th width="250" heigth="250">Dirección</th>
																		<th width="50" heigth="50">Código Postal</th>
																		<th width="50" heigth="50">Envíos Tasty</th>
																		<th width="50" heigth="50">Envíos HD</th>
																		<th width="50" heigth="50">Envíos totales</th>
																		<!-- <th width="50" heigth="50">Porcentaje de ordenes</th>
																		<th width="50" heigth="50">Gasto promedio</th> -->
																	</tr>
																</thead>
																<tbody class="at acomodo-tabla" >
																	<tr>
																		<td width="50" heigth="50">21 </td>
																		<td width="200" heigth="200">Angel Ernesto Gurrola Candia</td>
																		<td width="250" heigth="250">Fraccionamiento: San José, Calle: San Francisco #150</td>
																		<td width="50" heigth="50">34204</td>
																		<td width="50" heigth="50">15</td>
																		<td width="50" heigth="50">30</td>
																		<td width="50" heigth="50">15</td>
																		<!-- <td width="50" heigth="50">3</td>
																		<td width="50" heigth="50">1</td> -->
																	
																	</tr>
																</tbody>
															</table>

															<div id="visitas"><h3 >Total de usuarios</h3>
																<h5>Número total de usuarios: </h5>

															</div>



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