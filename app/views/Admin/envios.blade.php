@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Envíos</title>
  <script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>

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
              <h3 class="panel-title"><i class="fa fa-fw fa-paper-plane-o"></i> Envíos</h3>
            </div>
            <div class="panel-body"  >

             <div class="table-responsive">
              <table class="  table-hover table-striped" style=" border-spacing: 0; max-height: 40vh; overflow-y: auto; overflow-x: hidden; table-layout: fixed; width: 80vw; 
    border:1px solid gray;" >
               <thead class="at" style="border:1px solid gray;">
                <tr>
                 <th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">Orden</th>
                 <th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">Importe</th>
                 <th style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">Confirmación</th>
                 <th style="max-width: 18.5vw; min-width: 18.5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">Enviar a</th>
                 <th style="max-width: 33vw; min-width: 33vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">Dirección</th>
               </tr>
             </thead>
             <tbody class="at acomodo-tabla" >
               @if(count($envios)>0)

               @foreach($envios as $key => $value)

               <tr>
                <td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">{{$value->creado}}-{{$value->numero}}</td>
                <td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">${{$value->total}}</td>
                <td style="max-width: 10vw; min-width: 10vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">{{$value->estado}}</td>
                <td style="max-width: 18.5vw; min-width: 18.5vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">{{$value->nombre}}</td>
                <td style="max-width: 33vw; min-width: 33vw; word-wrap: break-word; height: 3.5vh !important; padding: 4px; font-weight: normal;
     font-size: 14px;">{{$value->direccion}}</td>
              </tr>
                 @endforeach
                         @endif

            </tbody>
          </table>
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
</body>
</html>