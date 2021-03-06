@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Repartidores</title>
</head>
<body>
	<div class="row" style="background-color:white;">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<div class="row">

								@if(count($users)>0)

              					 @foreach($users as $key => $value)
              					 {{ Form::open(array('url' => '/admin/editarHD'))}}
								<div class="col-sm-12">
									<div class="panel panel-green">
										<div class="panel-heading">
											<h3 class="panel-title"><i class="fa fa-fw fa-motorcycle"></i> Repartidor: {{$value->nombre2}} {{$value->apellidos}}</h3>
										</div>
										<div class="panel-body">
											<div class="row" >
												<div class="col-md-3">
													<br>
													<img style="height:180px; width:180px;" class="center-block thumbnail img-rounded" src="" alt="">
												</div>
												<div class="col-md-9" >
													<br>
													<p style="display: inline; padding:0.5em;" class="titulos" >Motocicleta:</p> <p style="display: inline; padding:0.5em;" class="resultados">{{$value->moto}}</p> 
													<p style="display: inline;" class="titulos">    Año:</p> <p style="display: inline;" class="resultados">{{$value->año}}</p>


													<div class="table-responsive" style="padding-top:1em;">
														<table class="table table-bordered table-hover table-striped">
															<thead class="ttabla">
																<tr>
																	<th><i class="fa fa-fw fa-sort"></i>Estado</th>
																	<th><i class="fa fa-fw fa-mobile"></i>Celular</th>
																	<th><i class="fa fa-fw fa-clock-o"></i>Horas activo</th>
																	<th><i class="fa fa-fw fa-paper-plane-o"></i>No. de envíos</th>
																	<th><i class="fa fa-fw fa-calendar-o"></i>Edad</th>
																	<th><i class="fa fa-fw fa-line-chart"></i> Meta del día</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>{{$value->estatus}}</td>
																	<td>{{$value->celular}}</td>
																	<td>32.3%</td>
																	<td>{{$value->enviados}}</td>
																	<td>{{$value->edad}}</td>
																	<td>32.3%</td>

																</tr>

															</tbody>
														</table>
														    
														    {{ Form::hidden('userhd_id',$value->id)}}
															{{ Form::submit('Editar', array('name'=> 'Editar','class' => 'btn btn-success')) }}</td>
															{{ Form::submit('Eliminar', array('name'=> 'Eliminar','class' => 'btn btn-danger')) }}</td>													

															{{Form::close()}}
													</div>
												</div>

											</div>
											
										</div>
									</div>
								</div>
								 @endforeach
                         @endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

