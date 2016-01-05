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
		$publicidad = Publicidad::where('dia','>=',$fecha)->get();
		return View::make('Admin.publicidad',compact('publicidad'));
		//return View::make('Admin.publicidad');
	}

	
	public function usuarios()
	{
		$usuarios = Usuarios::where('id_nivel', '!=', 1)->get();
		$numero = Usuarios::where('id_nivel', '!=', 1)->count();
		$pedidos = Pedidos::UserMas()->get();
		return View::make('Admin.usuarios',compact('usuarios','numero','pedidos'));
	}


	
	public function publicar()
	{
		$publicidad = new Publicidad;
		$image = Input::file('imagen');
		if($image!=null){
			
				$name_image = $image -> getClientOriginalName();	
				$image_final = 'publicidad/' .$name_image;
				$publicidad->imagen = $image_final;
				$image -> move('publicidad', $name_image );
			}
		$date = DateTime::createFromFormat('d/m/Y', Input::get('date'));
		$date=$date->format('Y-m-d');
		
		$publicidad->descripcion = Input::get('descripcion');
		$publicidad->dia = $date;
		$publicidad->hora_inicio = Input::get('hora_inicio');
		$publicidad->hora_fin = Input::get('hora_fin');
		$publicidad->save();
		return Redirect::back()->with('message','Publicidad subida correctamente');
	}
	

	public function editar(){

		if(Input::has('Editar'))
		{	
			$publicidad = Publicidad::find(Input::get('publicidad_id'));
		    return View::make('Admin.publicidad2',compact('publicidad'));

		}
		if(Input::has('Eliminar'))
		{	
		$publicidad=Publicidad::where('id','=',Input::get('publicidad_id'))->get();
			$publicidad[0]->delete();
			return Redirect::to('admin/publicidad')->with('message','Publicidad eliminada con éxito');
        }

	
	}

	public function savechanges(){
		$publicidad = Publicidad::find(Input::get('id'));
		// $date1 = DateTime::createFromFormat('d/m/Y', Input::get('date'));
		// $date1=$date1->format('Y-m-d');
		
		$publicidad->descripcion = Input::get('descripcion');
		// $publicidad->dia = $date1;
		$publicidad->hora_inicio = Input::get('hora_inicio');
		$publicidad->hora_fin = Input::get('hora_fin');
		$publicidad->save();

		return Redirect::to('admin/publicidad')->with('message','Cambios con éxito');
			
	}





}
