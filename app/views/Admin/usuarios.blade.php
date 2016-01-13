@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	<script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('.usuarios').fadeIn();
			$('.tasty').fadeOut();
			$('.hd').fadeOut();
			$('.numero_total').fadeOut();

			$('#envt').click(function(){
				$('.usuarios').fadeOut();
				$('.tasty').fadeIn();
				$('.hd').fadeOut();
				$('.numero_total').fadeOut();

			}); 
			$('#envh').click(function(){
				$('.usuarios').fadeOut();
				$('.tasty').fadeOut();
				$('.hd').fadeIn();
				$('.numero_total').fadeOut();

			});    
			$('#total').click(function(){
				$('.usuarios').fadeOut();
				$('.tasty').fadeOut();
				$('.hd').fadeOut();
				$('.numero_total').fadeIn();

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
								<h3 class="panel-title"><i class="fa fa-fw fa-users"></i> Usuarios</h3>
							</div>
							<div class="panel-body">
								<ul class="nav nav-tabs">

									<li ><a id="envt" class="diseno-tabs" href="#">Envíos con Tasty</a></li>
									<li><a id="envh" class="diseno-tabs" href="#">Envíos con Happy Delivery</a></li>
									<li><a id="total" class="diseno-tabs" href="#">Total de usuarios</a></li>

								</ul>
								<br>

								<div class="row" style="background-color:white;">
									<div class="col-lg-12">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
													<div class="panel-body"  >
														<div class="table-responsive">


															<table class="table-hover table-striped hd" style=" border-spacing: 0; max-height: 40vh; overflow-y: auto; overflow-x: hidden; table-layout: fixed; width: 74vw; 
															border:1px solid gray;" >
															<caption> <h3>Envíos con Happy Delivery</h3> </caption>
															<thead class="at" style="border:1px solid gray;">
																<tr>
																	<th style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Edad</th>
																	<th style="max-width: 15vw; min-width: 15vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Nombre</th>
																	<th style="max-width: 20vw; min-width: 20vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Dirección</th>
																	<th style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Código Postal</th>
																	<th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Envíos con HD</th>
																	<th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Envíos totales</th>
																	<th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Gasto promedio</th>

																</tr>
															</thead>
															@if(count($usuarios)>0)

															@foreach($usuarios as $key => $value)
															<tbody class="at acomodo-tabla" >


																<tr>
																	<td style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value->edad}}</td>
																	<td style="max-width: 15vw; min-width: 15vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value->nombre}} {{$value->apellido}}</td>
																	<td style="max-width: 20vw; min-width: 20vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value->direccion}}</td>
																	<td style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value->codigo}}</td>
																	<td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value->contadorhd}}</td>
																	<td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value->totales}}</td>
																	<td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value->promedio}}</td>
																		<!-- <td width="50" heigth="50">3</td>
																		<td width="50" heigth="50">1</td> -->
																		
																		@endforeach
																		@endif

																	</tr>
																</tbody>
															</table>



															<table class=" table-hover table-striped tasty" style=" border-spacing: 0; max-height: 40vh; overflow-y: auto; overflow-x: hidden; table-layout: fixed; width: 74vw; 
															border:1px solid gray;">
															<caption> <h3>Envíos con TastyFoods</h3> </caption>
															<thead class="at" style="border:1px solid gray;">
																
																<tr>
																	<th style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Edad</th>
																	<th style="max-width: 15vw; min-width: 15vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Nombre</th>
																	<th style="max-width: 20vw; min-width: 20vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Dirección</th>
																	<th style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Código Postal</th>
																	<th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Envíos con Tasty</th>
																	<th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Envíos totales</th>
																	<th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Gasto promedio</th>
																		<!-- <th width="50" heigth="50">Porcentaje de ordenes</th>
																		<th width="50" heigth="50">Gasto promedio</th> -->
																	</tr>
																</thead>
																<tbody class="at acomodo-tabla" >
																	@if(count($usuarios2)>0)

																	@foreach($usuarios2 as $key2 => $value)
																	<tr>
																		<td style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																		font-size: 14px;">{{$value->edad}}</td>
																		<td style="max-width: 15vw; min-width: 15vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																		font-size: 14px;">{{$value->nombre}} {{$value->apellido}}</td>
																		<td style="max-width: 20vw; min-width: 20vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																		font-size: 14px;">{{$value->direccion}}</td>
																		<td style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																		font-size: 14px;">{{$value->codigo}}</td>
																		<td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																		font-size: 14px;">{{$value->contadorhd}}</td>
																		<td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																		font-size: 14px;">{{$value->totales}}</td>
																		<td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																		font-size: 14px;">{{$value->promedio}}</td>
																		<!-- <td width="50" heigth="50">3</td>
																		<td width="50" heigth="50">1</td> -->
																		@endforeach
																		@endif

																	</tr>
																</tbody>
															</table>




															<table class=" table-hover table-striped usuarios" style=" border-spacing: 0; max-height: 40vh; overflow-y: auto; overflow-x: hidden; table-layout: fixed; width: 60vw; 
															border:1px solid gray;">
															<caption> <h3>Usuarios</h3> </caption>
															<thead class="at" style="border:1px solid gray;">
																<tr>
																	<th style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Edad</th>
																	<th style="max-width: 15vw; min-width: 15vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Nombre</th>
																	<th style="max-width: 30vw; min-width: 30vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Dirección</th>
																	<th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">Código Postal</th>
																	
																	
																</tr>
															</thead>
															<tbody class="at acomodo-tabla" >
																@if(count($usuarios3)>0)

																@foreach($usuarios3 as $key3 => $value3)

																<tr>
																	<td style="max-width: 5vw; min-width: 5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value3->edad}}</td>
																	<td style="max-width: 15vw; min-width: 15vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value3->nombre}} {{$value3->apellido}}</td>
																	<td style="max-width: 30vw; min-width: 30vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value3->direccion}}</td>
																	<td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
																	font-size: 14px;">{{$value3->codigo}}</td>
																	
																	
																	@endforeach
																	@endif

																</tr>
															</tbody>
														</table>



														<div class="numero_total"><h3 >Total de usuarios</h3>
															<h5>Número total de usuarios: {{$usertotal}} </h5>

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