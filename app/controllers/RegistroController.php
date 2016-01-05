<?php

class RegistroController extends BaseController {

	public function registrar()
	{
		$username = Input::get('correo');
		$usuarios = User::where('username','=',$username)->get();
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
		$user = New User();
		$user->username = $username;
		$user->password = Hash::make(Input::get('password'));
		$user->id_nivel = 3;
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
	public function registrarM()
	{
		$codigo = Input::get('codigo_postal');
		if ($codigo > 34398 || $codigo < 34000)
		{
			return Response::json('0');		
		}else{


		$reg_id = Input::get('reg_id');
		$user = New User();
		$user->username = Input::get('correo');
		$user->password = Hash::make(Input::get('password'));
		$user->id_nivel = 4;
		$user->nombre = Input::get('nombre');
		$user->apellidos = Input::get('apellidos');		
		$user->correo = Input::get('correo');
		$user->edad = Input::get('edad');
		$user->sexo = Input::get('sexo');
		$user->reg_id = $reg_id;
		$user->codigo_postal = Input::get('codigo_postal');
		$user->save();
		return Response::json('1',$user->username);		
		}
	}
	public function index()
	{
		return View::make('prospectos');

	}
	
	
}