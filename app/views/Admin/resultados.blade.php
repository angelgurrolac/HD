@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resultados</title>
	<script type="text/javascript">
	$(document).ready(function(){

		$('.resultados1').fadeIn();
		$('.ventas').fadeOut();
		$('.ordenes').fadeOut();
		$('.ordenesP').fadeOut();

		$('#maso').click(function(){
			$('.resultados1').fadeOut();
			$('.ventas').fadeOut();
			$('.ordenes').fadeIn();
			$('.ordenesP').fadeOut();

		}); 
		$('#res').click(function(){
			$('.resultados1').fadeIn();
			$('.ventas').fadeOut();
			$('.ordenes').fadeOut();
			$('.ordenesP').fadeOut();

		}); 
		$('#masv').click(function(){
			$('.resultados1').fadeOut();
			$('.ventas').fadeIn();
			$('.ordenes').fadeOut();
			$('.ordenesP').fadeOut();
		});    
		$('#op').click(function(){
			$('.resultados1').fadeOut();
			$('.ventas').fadeOut();
			$('.ordenes').fadeOut();
			$('.ordenesP').fadeIn();

		}); 

	});



	</script>
	  
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

									
									<li><a id="res" class="diseno-tabs" href="#">Resultados</a></li>
									<li><a id="maso" class="diseno-tabs" href="#">Más ordenes</a></li>
									<li><a id="masv" class="diseno-tabs" href="#">Más ventas</a></li>
									<li><a id="op" class="diseno-tabs" href="#">Orden promedio</a></li>



								</ul>
								<br>

								<div class="row" style="background-color:white;">
									<div class="col-lg-12">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
											
													
													<div class="panel-body"  >
														<div class="table-responsive">

															<table class="table table-bordered table-hover table-striped resultados resultados1" >
																<caption> <h2>Resultados</h2> </caption>
																<thead >
																	<tr>
																		<th width="100" heigth="100">Repartidor</th>
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





															<table class="table table-bordered table-hover table-striped resultados ventas" >
																<caption> <h2>Ventas</h2> </caption>
																<thead >
																	<tr>
																		<th width="100" heigth="100">Empleado HD</th>
																		<th width="100" heigth="100">Correo</th>
																		<th width="100" heigth="100">Ventas Totales</th>
																	</tr>
																</thead>
																<tbody >
																	 @if(count($envios2)>0)

               															@foreach($envios2 as $key2 => $value2)
																	<tr>

																		<td width="100" heigth="100">{{$value2->nombre}}</td>
																		<td width="100" heigth="100">{{$value2->correo}}</td>
																		<td width="100" heigth="100">${{$value2->cantidad_ventas}}</td>

																	</tr>

																	 @endforeach
                  												       @endif

																</tbody>
															</table>

															<table class="table table-bordered table-hover table-striped resultados ordenes" >
																<caption> <h2>Ordenes</h2> </caption>
																<thead >
																	<tr>
																		<th width="100" heigth="100">Empleado HD</th>
																		<th width="100" heigth="100">Correo</th>
																		<th width="100" heigth="100">Ordenes totales</th>
																	</tr>
																</thead>
																<tbody >
																	 @if(count($envios3)>0)

               															@foreach($envios3 as $key2 => $value3)
																	<tr>

																		<td width="100" heigth="100">{{$value3->nombre}}</td>
																		<td width="100" heigth="100">{{$value3->correo}}</td>
																		<td width="100" heigth="100">{{$value3->envios_totales}}</td>

																	</tr>

																	 @endforeach
                  												       @endif

																</tbody>
															</table>

															<table class="table table-bordered table-hover table-striped resultados ordenesP" >
																<caption> <h2>Ordenes promedio</h2> </caption>
																<thead >
																	<tr>
																		<th width="100" heigth="100">Repartidor</th>
																		<th width="100" heigth="100">Correo</th>
																		<th width="100" heigth="100">Envíos cubiertos</th>
																		<th width="100" heigth="100">Orden promedio</th>
																		
																	</tr>
																</thead>
																<tbody >
																	 @if(count($envios)>0)

               															@foreach($envios as $key => $value)
																	<tr>
												<!-- 						
																		@if($value->nombre == "")
																		<td width="100" heigth="100">asdsad</td>

																		@endif -->
																		<td width="100" heigth="100">{{$value->nombre}}</td>
																		<td width="100" heigth="100">{{$value->correo}}</td>
																		<td width="100" heigth="100">{{$value->envios_totales}}</td>
																		<td width="100" heigth="100">{{$value->total}}</td>
																		

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