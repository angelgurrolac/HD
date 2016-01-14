@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Editar Empleado</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-cutlery"></i> Editar</h3>
            </div>    
    <div class="panel-body">
    {{Form::open(array('url'=>'/admin/savehd','files'=>'true'))}}
      <div class="col-md-6">
        <br>
        <!-- aqui una imagen de perfil porfis -->
           <img id="blah" style="width:100%;" src="" alt="your image" />
        <input type="file" name="imgFile" id="imgFile" value="">
          
      </div>
      <br>
      <div class="col-md-3">
      <label>Nombre</label>
      <br>
      <!-- estos son sus datos generales -->
      <input class="form-control" type="text" name="username" value="{{$usershd->username}}">
      <input class="form-control" type="text" name="nombre" value="{{$usershd->nombre}}">
      <input class="form-control" type="text" name="apellidos" value="{{$usershd->apellidos}}">
      <input class="form-control" type="text" name="correo" value="{{$usershd->correo}}">
      <input class="form-control" type="text" name="direccion" value="{{$usershd->direccion}}">
      <input class="form-control" type="text" name="codigo_postal" value="{{$usershd->codigo_postal}}">
      <input class="form-control" type="text" name="motocicleta" value="{{$usershd->motocicleta}}">
      <input class="form-control" type="text" name="anio_moto" value="{{$usershd->anio_moto}}">
      
  <!--     aqui pones unos checkbox que digan 
      entrego IFE ? y el check
      entrego LICENCIA DE CONDUCIR y el check
      entrego EXAMEN MEDICO y el check  -->

      <input type="checkbox">
     
      </div>
      <div class="col-md-3 precios">
    

         <!-- este boton asi queda porfis -->
        <input type="hidden" name="id" value="{{$usershd->id}}">
      {{Form::submit('Guardar cambios',array('class'=>'btn btn-lg btn-primary'))}}
      </div>

    {{Form::close()}}
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
</script>