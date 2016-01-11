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


															<table class="table table-bordered table-hover table-striped hd" >
																<caption> <h3>Envíos con Happy Delivery</h3> </caption>
																<thead class="at">
																	<tr>
																		<th width="50" heigth="50">Edad</th>
																		<th width="20" heigth="200">Nombre</th>
																		<th width="250" heigth="250">Dirección</th>
																		<th width="50" heigth="50">Código Postal</th>
																		<th width="50" heigth="50">Envíos con HD</th>
																		<th width="50" heigth="50">Envíos totales</th>
																		<th width="50" heigth="50">Gasto promedio</th>
																		
																	</tr>
																</thead>
																 @if(count($usuarios)>0)

               				     									 @foreach($usuarios as $key => $value)
																<tbody class="at acomodo-tabla" >
																	

																	<tr>
																		<td width="50" heigth="50">{{$value->edad}}</td>
																		<td width="200" heigth="200">{{$value->nombre}} {{$value->apellido}}</td>
																		<td width="250" heigth="250">{{$value->direccion}}</td>
																		<td width="50" heigth="50">{{$value->codigo}}</td>
																		<td width="50" heigth="50">{{$value->contadorhd}}</td>
																		<td width="50" heigth="50">{{$value->totales}}</td>
																		<td width="50" heigth="50">{{$value->promedio}}</td>
																		<!-- <td width="50" heigth="50">3</td>
																		<td width="50" heigth="50">1</td> -->
																		
																		@endforeach
																		@endif
																	
																	</tr>
																</tbody>
															</table>



															<table class="table table-bordered table-hover table-striped tasty" >
																<caption> <h3>Envíos con TastyFoods</h3> </caption>
																<thead class="at">
																	
																	<tr>
																		<th width="50" heigth="50">Edad</th>
																		<th width="20" heigth="200">Nombre</th>
																		<th width="250" heigth="250">Dirección</th>
																		<th width="50" heigth="50">Código Postal</th>
																		<th width="50" heigth="50">Envíos con Tasty</th>
																		<th width="50" heigth="50">Envíos totales</th>
																		<th width="50" heigth="50">Gasto promedio</th>
																		<!-- <th width="50" heigth="50">Porcentaje de ordenes</th>
																		<th width="50" heigth="50">Gasto promedio</th> -->
																	</tr>
																</thead>
																<tbody class="at acomodo-tabla" >
																	@if(count($usuarios2)>0)

               				     									 @foreach($usuarios2 as $key2 => $value)
																	<tr>
																		<td width="50" heigth="50">{{$value->edad}}</td>
																		<td width="200" heigth="200">{{$value->nombre}} {{$value->apellido}}</td>
																		<td width="250" heigth="250">{{$value->direccion}}</td>
																		<td width="50" heigth="50">{{$value->codigo}}</td>
																		<td width="50" heigth="50">{{$value->contadorhd}}</td>
																		<td width="50" heigth="50">{{$value->totales}}</td>
																		<td width="50" heigth="50">{{$value->promedio}}</td>
																		<!-- <td width="50" heigth="50">3</td>
																		<td width="50" heigth="50">1</td> -->
																		@endforeach
																		@endif
																	
																	</tr>
																</tbody>
															</table>




															<table class="table table-bordered table-hover table-striped usuarios" >
																<caption> <h3>Usuarios</h3> </caption>
																<thead class="at">
																	<tr>
																		<th width="50" heigth="50">Edad</th>
																		<th width="20" heigth="200">Nombre</th>
																		<th width="250" heigth="250">Dirección</th>
																		<th width="50" heigth="50">Código Postal</th>
																		
																		
																	</tr>
																</thead>
																<tbody class="at acomodo-tabla" >
																	 @if(count($usuarios3)>0)

               				     									 @foreach($usuarios3 as $key3 => $value3)

																	<tr>
																		<td width="50" heigth="50">{{$value3->edad}}</td>
																		<td width="200" heigth="200">{{$value3->nombre}} {{$value3->apellido}}</td>
																		<td width="250" heigth="250">{{$value3->direccion}}</td>
																		<td width="50" heigth="50">{{$value3->codigo}}</td>
																		
																		
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