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
              <h3 class="panel-title"><i class="fa fa-fw fa-motorcycle"></i> Editar repartidor</h3>
            </div>    
            <div class="panel-body">
              {{Form::open(array('url'=>'/admin/savehd','files'=>'true'))}}
              <div class="col-md-4">
                <br>
                <!-- aqui una imagen de perfil porfis -->
                <img id="blah" style="width:100%;" src="" alt="your image" />
                <input type="file" name="imgFile" id="imgFile" value="">
              </div>
              <br>
              <div class="col-md-4">
                <label>Usuario</label>
                <!-- estos son sus datos generales -->
                <input class="form-control" type="text" name="username" value="{{$usershd->username}}" required >
                <label>Nombre</label>
                <input class="form-control" type="text" name="nombre" value="{{$usershd->nombre}}" required >
                <label>Apellidos</label>
                <input class="form-control" type="text" name="apellidos" value="{{$usershd->apellidos}}" required >
                <label>Correo electrónico</label>
                <input class="form-control" type="email" name="correo" value="{{$usershd->correo}}" required >
                <br>
                




              </div>
              <div class="col-md-4 precios">
                <label>Dirección</label>
                <input class="form-control" type="text" name="direccion" value="{{$usershd->direccion}}" required >
                <label>Código postal</label>
                <input class="form-control" type="text" name="codigo_postal" value="{{$usershd->codigo_postal}}">
                <label>Modelo motocicleta</label>
                <input class="form-control" type="text" name="motocicleta" value="{{$usershd->motocicleta}}">
                <label>Año motocicleta</label>
                <input class="form-control" type="number" name="anio_moto" value="{{$usershd->anio_moto}}">
                <br>

                <br>


              </div>
              <!-- este boton asi queda porfis -->
              <div class="col-md-4"></div>
              <div class="col-md-8">
               <fieldset>
                <legend align= "center">Documentación entregada</legend>
                <div class="acomodo-doc">
                  <label> IFE</label>
                  <input type="checkbox">
                </div>
                <div class="acomodo-doc">
                  <label> Licencia de conducir</label>
                  <input type="checkbox">
                </div>
                <div class="acomodo-doc">
                  <label> Examen médico</label>
                  <input type="checkbox"></div>

                </fieldset>
              </div>
              <br>
              <div class="col-md-10"></div>


              <div class="col-md-2"> <input type="hidden" name="id" value="{{$usershd->id}}">
               {{Form::submit('Guardar cambios',array('class'=>'btn btn-lg btn-primary'))}}</div>

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