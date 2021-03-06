<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','SessionController@index');
Route::get('/login','SessionController@index');
Route::post('/login','SessionController@getSession');
Route::get('/logout','SessionController@logout');
Route::post('/registro','RegistroController@registrar');
Route::post('/registroM','RegistroController@registrarM');
Route::get('/prospectos','RegistroController@index');
Route::post('/prospectos','RegistroController@create');

Route::post('users/login', function()
{
	$remember = Input::get('remember');
	$reg_id = Input::get('reg_id');
		
	$credentials = array(
		'username' => Input::get('username'), 
		'password' => Input::get('password')
		
	);

	
	if (Auth::attempt( $credentials ))
	{



		$usuario = User::where('username','=',Input::get('username'))->first();
		// $data = UsuariosHD::data($usuario->username)->get();
		// $usuario->estatus = 1;
		$usuario->estatus_u = 'disponible';
		$usuario->reg_id = $reg_id;
		$usuario->save();
		return Response::json([$usuario->id,$usuario->id_restaurante,$usuario->estatus_u]);
	 	
	}else{
		return Response::json('Error logging in');
		
    }
});





Route::post('/users/chaPass','UserController@chaPass');
Route::post('/users/confirmar','UserController@confirmar');
Route::post('/users/confirmar2','UserController@confirmar2');
Route::post('/users/reparar','UserController@reparar');
Route::post('/users/reparar2','UserController@reparar2');
Route::post('/users/actual','UserController@actual');
Route::post('/users/entregado','UserController@entregado');
Route::post('/users/registro','UserController@registrar');
Route::post('/users/con_publicidad','UserController@aumentarP');
Route::post('/users/EnviosDis','UserController@EnviosDis');
Route::post('/users/EnviosDisC','UserController@EnviosDisC');
Route::post('/users/ultEnv','UserController@ultEnv');
Route::get('/users/infouser','UserController@infouser');
Route::get('/users/reportes','UserController@reportes');
Route::resource('/users/publicidad', 'UserController@getPubli');
Route::post('/users/estado','UserController@estado');
Route::post('/users/changestatus','UserController@changestatus');
Route::post('/users/web','UserController@web');
Route::post('/users/envioConfirmado','UserController@envioConfirmado');




Route::group(array('before' => array('auth', 'admin')), function()
{
Route::get('/admin/usuarios','AdminController@usuarios');
Route::get('/admin/publicidad','AdminController@publicidad');
Route::post('/admin/validar','AdminController@validar');
Route::post('/admin/publicidad','AdminController@publicar');
Route::post('/admin/editar','AdminController@editar');
Route::post('/admin/saveChanges','AdminController@saveChanges');
Route::get('/admin/reportes','AdminController@reportes');
Route::get('/admin/usershd','AdminController@usershd');
Route::get('/admin/envios','AdminController@envios');
Route::get('/admin/enviosC','AdminController@enviosC');
Route::get('/admin/Etarjeta','AdminController@Etarjeta');
Route::get('/admin/informes','AdminController@informes');
Route::post('/admin/savehd','AdminController@savehd');
Route::post('/admin/editarHD','AdminController@editarHD');
Route::get('/admin/candidatos','AdminController@candidatos');
Route::post('/admin/validar','AdminController@validar');
Route::post('/admin/borrar_candidato','AdminController@borrar_candidato');

});
