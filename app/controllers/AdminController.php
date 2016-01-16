<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	
public function publicidad()
	{	
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d');
		$publicidad = Publicidadhd::where('dia','>=',$fecha)->get();
		return View::make('Admin.publicidad',compact('publicidad'));
		//return View::make('Admin.publicidad');
	}

	
	public function publicar()
	{
		$publicidadhd = new Publicidadhd;
		$image = Input::file('imagen');
		if($image!=null){
			
				$name_image = $image -> getClientOriginalName();	
				$image_final = 'publicidad/' .$name_image;
				$publicidadhd->imagen = $image_final;
				$image -> move('publicidad', $name_image );
			}
		// $date = DateTime::createFromFormat('d/m/Y', Input::get('date'));
		// $date=$date->format('Y-m-d');
		
		$publicidadhd->descripcion = Input::get('descripcion');
		$publicidadhd->dia = Input::get('date1');
		$publicidadhd->hora_inicio = Input::get('hora_inicio');
		$publicidadhd->hora_fin = Input::get('hora_fin');
		$publicidadhd->save();
		return Redirect::back()->with('message','Publicidad subida correctamente');
	}
	

	public function editar(){

		if(Input::has('Editar'))
		{	
			$publicidad = Publicidadhd::find(Input::get('publicidad_id'));
		    return View::make('Admin.publicidad2',compact('publicidad'));

		}
		if(Input::has('Eliminar'))
		{	
		$publicidad=Publicidadhd::where('id','=',Input::get('publicidad_id'))->get();
			$publicidad[0]->delete();
			return Redirect::to('admin/publicidad')->with('message','Publicidad eliminada con éxito');
        }

		
	}


	public function editarHD(){

		if(Input::has('Editar'))
		{	
			$usershd = UsuariosHD::find(Input::get('userhd_id'));
		    return View::make('Admin.EditarUHD',compact('usershd'));

		}
		if(Input::has('Eliminar'))
		{	
		    $usershd = UsuariosHD::where('id','=',Input::get('userhd_id'))->get();
			$usershd[0]->delete();
			return Redirect::to('admin/repartidores')->with('message','Empleado eliminado con éxito');
        }

	
	}

	public function savechanges(){
		$publicidadhd = Publicidadhd::find(Input::get('id'));
		// $date1 = DateTime::createFromFormat('d/m/Y', Input::get('date'));
		// $date1=$date1->format('Y-m-d');
		
		$publicidadhd->descripcion = Input::get('descripcion');
		// $publicidad->dia = $date1;
		$publicidadhd->hora_inicio = Input::get('hora_inicio');
		$publicidadhd->hora_fin = Input::get('hora_fin');
		$publicidadhd->save();

		return Redirect::to('admin/publicidad')->with('message','Cambios con éxito');
			
	}


	public function savehd(){
		$usershd = UsuariosHD::find(Input::get('id'));
		
		
		$usershd->username = Input::get('username');
		$usershd->nombre = Input::get('nombre');
		$usershd->apellidos = Input::get('apellidos');
		$usershd->correo = Input::get('correo');
		$usershd->direccion = Input::get('direccion');
		$usershd->codigo_postal = Input::get('codigo_postal');
		$usershd->motocicleta = Input::get('motocicleta');
		$usershd->anio_moto = Input::get('anio_moto');
		$ife = Input::get('ife');
		if ($ife == 1) {
			$usershd->ife = 1;
		}
		else{
			$usershd->ife = 0;
		}
		$licencia = Input::get('licencia');
		if ($licencia == 1) {
			$usershd->licencia = 1;
		}
		else{
			$usershd->licencia = 0;
		}
		$medico = Input::get('medico');
		if ($medico == 1) {
			$usershd->examen_medico = 1;
		}
		else{
			$usershd->examen_medico = 0;
		}
		$usershd->save();

		return Redirect::to('admin/usershd')->with('message','Cambios con éxito');
			
	}

	public function reportes()
	{
		
		$envios=Envios::reportes()->get();
		$envios2=Envios::reportes2()->get();
		return View::make('Admin.reportes',compact('envios','envios2'));
	}
	// public function reportes2()
	// {
		
	// 	$envios2=Envios::reportes2()->get();
	// 	return View::make('Admin.reportes',compact('envios2'));
	// }

	public function usershd()
	{
		$users=UsuariosHD::usuarioshd()->get();
		

		//return json_encode($users);
		return View::make('Admin.repartidores',compact('users'));
	}

	public function envios()
	{
		$envios=Envios::enviados()->get();
		//return json_encode($envios);
		return View::make('Admin.envios',compact('envios'));
	}



	public function enviosC()
	{
		$envios=Envios::envioscubiertos()->get();
		$envios2=Envios::envioscubiertosT()->get();
		$envios3=Envios::envioscubiertosHD()->get();
		// $envios1=Envios::envioscubiertosT()->union($envios)->get();
		//return json_encode($envios);
		return View::make('Admin.resultados',compact('envios','envios2','envios3'));
	}




	public function Etarjeta()
	{
		$envios=Envios::tarjeta()->get();
		return json_encode($envios);
	}


	public function usuarios()
	{
		$usuarios=Usuarios::usuarios()->get();
		$usuarios2=Usuarios::usuarios2()->get();
		$usuarios3=Usuarios::usuarios3()->get();
		$usertotal=UsuariosHD::All()->count();
		// return json_encode($usuarios);
		return View::make('Admin.usuarios',compact('usuarios','usuarios2','usuarios3','usertotal'));
	}


	public function informes()
	{
		$enviosHD=Envios::informes()->get();
		$enviosT=Envios::informes2()->get();
		$enviosAll=Envios::informes3()->get();
		$total=Envios::totales()->get();

		$enviosHD2=Envios::informesSemana()->get();
		$enviosT2=Envios::informes2Semana()->get();
		$enviosAll2=Envios::informes3Semana()->get();
		$total2=Envios::totalesSemana()->get();

		$enviosHD3=Envios::informesMes()->get();
		$enviosT3=Envios::informes2Mes()->get();
		$enviosAll3=Envios::informes3Mes()->get();
		$total3=Envios::totalesMes()->get();


		return View::make('Admin.informe',compact('enviosHD','enviosT','enviosAll','total',
			'enviosHD2','enviosT2','enviosAll2','total2',
			'enviosHD3','enviosT3','enviosAll3','total3'));
	}



	  





}
