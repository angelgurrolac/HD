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

	public function reportes()
	{
		$envios=Envios::reportes()->get();


		//return json_encode($envios);	
		return View::make('Admin.reportes',compact('envios'));
	}

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
		//return json_encode($envios);
		return View::make('Admin.resultados',compact('envios'));
	}

	public function Etarjeta()
	{
		$envios=Envios::tarjeta()->get();
		return json_encode($envios);
	}


	public function usuarios()
	{
		$usuarios=Usuarios::usuarios()->get();
		// return json_encode($usuarios);
		return View::make('Admin.usuarios',compact('usuarios'));
	

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


      public function actual()
    {
        $envios = Envios::find(Input::get('id'));
        $envios->coordenadas_actuales = Input::get('coordenadas_actuales');
        $envios->save();
        return Response::json('success');
    }






}
