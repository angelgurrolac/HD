@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Repartidores candidatos</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-users"></i> Candidatos</h3>
            </div>
            <div class="panel-body">

							        
							@foreach($candidatos as $value)
							
							
             {{ Form::open(array('url' => '/admin/validar','id'=>'nueva','files'=>'true')) }}
						 <div class="col-sm-6">
                <div class="panel panel-green">
                  <div class="panel-heading">
                    <h3 class="panel-title">Candidato: {{$value->nombre}} {{$value->apellidos}}</h3>
                  </div>
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">
                      <div class="caption" style="margin-left:1em;">
                        <b>Correo electrónico:</b>
                        <p>{{$value->correo}}</p>
                        <b>Dirección:</b>
                        <p>{{$value->direccion}}</p>
                        <b>Edad:</b>
                        <p>{{$value->edad}}</p>
                        <b>Sexo:</b>
                        <p>{{$value->sexo}}</p>
                        <b>Celular:</b>
                        <p>{{$value->celular}}</p>
                        <b>Motocicleta:</b>
                        <p>{{$value->motocicleta}}</p>
                        <b>Año:</b>
                        <p>{{$value->anio_moto}}</p>
                        {{Form::hidden('id',$value->id)}}
                       {{ Form::submit('Validar', array('class' => 'btn btn-primary','style'=>'display:inline-block;')) }}
		       {{ Form::close() }}

		       {{form::open(array('url' => 'admin/borrar_candidato','style'=>'display:inline-block;')) }}
					{{Form::hidden('id',$value->id)}}
		      <!--  <a style="display:inline-block;" class="btn btn-danger " name="Eliminar" >Eliminar</a> -->
          {{ Form::submit('Eliminar', array('class' => 'btn btn-danger','style'=>'display:inline-block;')) }}
		         {{ Form::close() }}
                      </div>

                   
                    </div>
                  </div>
                 

                </div>
              </div>
            </div>
             @endforeach
  </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
</div>
</body>
</html>


<script>
	$('#imgFile').change(function(){
		$('#blah')[0].src = window.URL.createObjectURL(this.files[0])
	});

	$('.btn-danger').click(function(){
			(new PNotify({
				    title: 'Confirmar',
				    text: '¿Esta seguro que desea eliminar este candidato?',
				    icon: 'glyphicon glyphicon-question-sign',
				    hide: false,
				     confirm: {
		                confirm: true
		            },
		            buttons: {
		                closer: false,
		                sticker: false
		            },
		            history: {
		                history: false
		            }
		          })).get().on('pnotify.confirm', function() {
		              $("#delete").submit();
		          }).on('pnotify.cancel', function() {
		              return false;
				});
	
	});
</script>

