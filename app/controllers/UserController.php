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



      public function reparar()
    {
        $envios = Envios::find(Input::get('id'));
        $envios->estatus = 'accidente';
        $envios->coordenadas_accidente = Input::get('coordenadas_accidente');
        $envios->save();
        return Response::json('success');
    }

       public function entregado()
    {
        $envios = Envios::find(Input::get('id'));
        $envios->estatus = 'entregado';
        $envios->save();
        return Response::json('success');
    }


      public function actual()
    {
        $envios = Envios::find(Input::get('id'));
        $envios->coordenadas_actuales = Input::get('coordenadas_actuales');
        $envios->save();
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

    public function getPubli()
    {	
    	
    	$publicidad = Publicidad::actual()->get();
    	return Response::json($publicidad);
    	
    }






}