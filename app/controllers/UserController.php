<?php

class UserController extends \BaseController {


		public function chaPass()
    {
    	$usuario = UsuariosHD::where('username','=',Input::get('username'))->first();
    	$antiguo = Input::get('antiguo');
    	$nuevo = Input::get('nuevo');
    	

    	if(Hash::check($antiguo,$usuario->password))
    	{
    		$usuario->password = Hash::make($nuevo);
    		$usuario->save();
    		return Response::json('Password cambiado');
    	}
    	else
    	{
    		return Response::json('El password actual no coincide');
    	}

    }




    public function confirmar()
    {
        $envios = Envios::find(Input::get('id'));
        $envios->estatus = 'confirmado';
        $envios->coordenadas_actuales = Input::get('coordenadas_actuales');
        $envios->id_usuarioHD = Input::get('id_usuarioHD');
        $envios->save();
        return Response::json('success');
    }

     public function confirmar2()
    {
        $envios = Envios::find(Input::get('id'));
        $envios->estatus = 'confirmado2';
        $envios->coordenadas_actuales = Input::get('coordenadas_actuales');
        $envios->id_usuarioHD = Input::get('id_usuarioHD');
        $envios->save();
        return Response::json('success');
    }



      public function reparar()
    {
        $envios = Envios::find(Input::get('id_envio'));
        $usuarios = UsuariosHD::find(Input::get('id_usuarioHD'));
        $envios->estatus = 'pendiente';
        $envios->coordenadas_accidente = Input::get('coordenadas_accidente');
        $envios->save();
        $usuarios->estatus_u = 'descompuesto';  
        $usuarios->save();
        return Response::json('success');
    }

    public function reparar2()
    {
        $envios = Envios::find(Input::get('id_envio'));
        $usuarios = UsuariosHD::find(Input::get('id_usuarioHD'));
        $envios->estatus = 'reparar2';
        $envios->coordenadas_accidente = Input::get('coordenadas_accidente');
        $envios->save();
        $usuarios->estatus_u = 'descompuesto';  
        $usuarios->save();
        return Response::json('success');
    }


       public function entregado()
    {
        $envios = Envios::find(Input::get('id'));
        $usuario = UsuariosHD::where('username','=',Input::get('username'))->first();
        $pedido = Pedidos::where('id','=',Input::get('id_pedido'))->first();
        $usuario->estatus_u = 'ocupado';
        $usuario->save();
        $reg = Input::get('reg_id');
          if($reg != ""){
                $valor = PushNotification::Message('¡Tu pedido ha llegado!',array(
                    'valor' => 2,
                    'sound' => 'example.aiff',
                 'actionLocKey' => 'Action button title!',
    'locKey' => 'localized key',
    'locArgs' => array(
        'localized args',
        'localized args',
    ),
    'launchImage' => 'image.jpg',

    'custom' => array('custom data' => array(
        'we' => 'want', 'send to app'
    ))
));

                PushNotification::app('Tasty')
                ->to($reg)
                ->send($valor);
            }

        $user = User::where('id','=',$pedido->id_usuario)->first();
        $envios->estatus = 'entregado';
        $envios->save();

        
        return Response::json('success');
    }


      public function actual()
    {
        $envios = Envios::find(Input::get('id_envio'));
        $usuarios = UsuariosHD::find(Input::get('id_usuarioHD'));
        $envios->coordenadas_actuales = Input::get('coordenadas_actuales');
        $envios->id_usuarioHD = Input::get('id_usuarioHD');
        $envios->estatus = 'confirmado';
        $envios->save();
        $usuarios->estatus_u = 'ocupado';
        $usuarios->save();
        return Response::json('success');
    }



    public function registrar()
	{
		$username = Input::get('correo');
		$usuarios = UsuariosHD::where('username','=',$username)->get();
		$codigo = Input::get('codigo_postal');
		if ($codigo > 34398 || $codigo < 34000)
		{
			return Response::json('0');		
		}
		if ($usuarios != null) {
			return Response::json('2');
		}
		else{


		$reg_id = Input::get('reg_id');
		$user = New UsuariosHD();
		$user->username = $username;
		$user->password = Hash::make(Input::get('password'));
		$user->nombre = Input::get('nombre');
		$user->apellidos = Input::get('apellidos');		
		$user->correo = $username;
		$user->edad = Input::get('edad');
		$user->sexo = Input::get('sexo');
		$user->reg_id = $reg_id;
		$user->codigo_postal = Input::get('codigo_postal');
		$user->save();
		return Response::json('1');		
		}
	}
 

	    public function aumentarP()
    {
        $publicidad = PublicidadHD::where('id','=',Input::get('id'))->first();
        $publicidad->contador = $publicidad->contador + 1;
        $publicidad->save();
        return Response::json('success');
    }

     public function EnviosDis()
    {
        
        $usuarios = UsuariosHD::where('id','=',Input::get('id'))->first();
        $usuarios1 = UsuariosHD::where('id_restaurante','=',Input::get('id_restaurante'))->first();
        $pedido = Pedidos::All()->last();
        $pedidos = Pedidos::Envios()->get();


        foreach ($pedidos as $key2 => $value2) {
        $validacion = hd::where('id_restaurante','=',$value2->id_restaurante)->get();
        $valor = 0;
        $envios = Envios::EnviosDis($value2->id_restaurante)->get();


        foreach($validacion as $key2 => $info2){

           if ($info2->decision == 0) {

                 if ($usuarios->id_restaurante == $value2->id_restaurante or $usuarios->id_restaurante2 == $value2->id_restaurante) {
                       return Response::json($envios);
                  }
                 
           }

           if ($info2->decision == 1) {
                         if ($usuarios->id_restaurante == $value2->id_restaurante or $usuarios->id_restaurante2 == $value2->id_restaurante
                        or $usuarios->id_restaurante == 0 or $usuarios->id_restaurante2 == 0 ) {
                       return Response::json($envios);
           }
                     
           }

       } 

            

        }

        
    
    return Response::json('ERROR GENERAL');

    }



     public function EnviosDisC()
    {
       $usuarios = UsuariosHD::where('id','=',Input::get('id'))->first();
        $usuarios1 = UsuariosHD::where('id_restaurante','=',Input::get('id_restaurante'))->first();
        $pedido = Pedidos::All()->last();
        $pedidos = Pedidos::Envios()->get();


        foreach ($pedidos as $key2 => $value2) {
        $validacion = hd::where('id_restaurante','=',$value2->id_restaurante)->get();
        $valor = 0;
        $envios = Envios::EnviosDis2($value2->id_restaurante)->get();


        foreach($validacion as $key2 => $info2){

           if ($info2->decision == 0) {

                 if ($usuarios->id_restaurante == $value2->id_restaurante or $usuarios->id_restaurante2 == $value2->id_restaurante) {
                       return Response::json($envios);
                  }
                 
           }

           if ($info2->decision == 1) {
                         if ($usuarios->id_restaurante == $value2->id_restaurante or $usuarios->id_restaurante2 == $value2->id_restaurante
                        or $usuarios->id_restaurante == 0 or $usuarios->id_restaurante2 == 0 ) {
                       return Response::json($envios);
           }
                     
           }

       } 

            

        }

        
    
    return Response::json('ERROR GENERAL');
}

    public function ultEnv()
    {
        // $restaurante = Restaurantes::where('id','=',Input::get('id_restaurante'))->first();
        $usuarios = UsuariosHD::where('id','=',Input::get('id'))->first();
        $envios = Envios::EnviosDis($usuarios->id_restaurante)->take(1)->get();
        return Response::json($envios);
    }

    public function infouser()
    {

        // $usuario = UsuariosHD::where('username','=',Input::get('username'))->first();
        $informacion = UsuariosHD::info()->get();
        $informacion2 = UsuariosHD::info2()->get();
        return json_encode([$informacion,$informacion2]);
    }

    public function reportes()
    {
        // $usuario = UsuariosHD::where('username','=',Input::get('username'))->first();
        $dia_actual = UsuariosHD::dia1()->get();
        $dia_actual1 = UsuariosHD::dia2()->get();
        $dia_actual2 = UsuariosHD::dia3()->get();
        $dia_actual3 = UsuariosHD::dia4()->get();
        $dia_actual4 = UsuariosHD::dia5()->get();
        $dia_actual5 = UsuariosHD::dia6()->get();
        $dia_actual6 = UsuariosHD::dia7()->get();


        return json_encode([$dia_actual,$dia_actual1,$dia_actual2,$dia_actual3,$dia_actual4,$dia_actual5,$dia_actual6]);
    }

     public function getPubli()
    {   
        
        $publicidad = Publicidad::actual()->get();
        return Response::json($publicidad);
        
    }


    public function estado()
    {
       $estado = UsuariosHD::where('id','=',Input::get('id'))->first();
       $estadou = $estado->id_restaurante;
       $estado_u = ($estado->estatus_u);
       return Response::json([$estado_u,$estadou]);
    }

    public function changestatus()
    {

        $estado = UsuariosHD::where('id','=',Input::get('id') )->first();
        $estado->estatus_u = 'disponible';
        $estado->save();
        return Response::json('Cambio Realizado');

    }

     public function web()
    {
        $envios = Envios::find(Input::get('id_envio'));
        $usuarios = UsuariosHD::find(Input::get('id_usuarioHD'));
        $envios->estatus = 'recibido';
        $envios->save();
        $usuarios->estatus_u = 'disponible';  
        $usuarios->save();
        return Response::json('success');
    }

    public function envioConfirmado()
    {
        $usuario = UsuariosHD::where('id','=',Input::get('id'))->first();
        $envios = Envios::EnviosConfirmados($usuario->id)->take(1)->get();
        return Response::json($envios);
    }


}