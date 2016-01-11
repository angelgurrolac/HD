<?php

class Usuarios extends Eloquent
{
	protected $table = "users";


	public function scopeusuarios3($usuarios)
	{
		$usuarios=DB::table('users as u')

		->leftjoin('pedidos as p',function($join){
							$join->on('p.id_usuario','=', 'u.id');
					}) 

		->leftjoin('envios as e',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 

		->leftjoin('restaurantes as r',function($join){
							$join->on('r.id','=', 'e.id_restaurante');
					}) 

		

		->select('u.id as id', 'u.edad as edad', 'u.username as username', 'u.nombre as nombre',
		 'u.apellidos as apellido','u.direccion as direccion', 'u.codigo_postal as codigo', 'r.nombre as nombreR',
			DB::raw('COUNT(e.id_restaurante = 0) as contadorhd'),
			DB::raw('COUNT(e.id_restaurante = r.id) as totales'),
			DB::raw('AVG(p.total) as promedio')
			)
		->groupBy('u.id')
		->orderBy('u.created_at','DESC');

		return $usuarios;
	}


	public function scopeusuarios($usuarios)
	{
		$usuarios=DB::table('users as u')

		->leftjoin('pedidos as p',function($join){
							$join->on('p.id_usuario','=', 'u.id');
					}) 

		->leftjoin('envios as e',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 

		->leftjoin('restaurantes as r',function($join){
							$join->on('r.id','=', 'e.id_restaurante');
					}) 
		->where('e.id_restaurante','=','0')

		

		->select('u.id as id', 'u.edad as edad', 'u.username as username', 'u.nombre as nombre',
		 'u.apellidos as apellido','u.direccion as direccion', 'u.codigo_postal as codigo', 'r.nombre as nombreR',
			DB::raw('COUNT(e.id_restaurante = 0) as contadorhd'),
			DB::raw('COUNT(e.id_restaurante = r.id) as totales'),
			DB::raw('AVG(p.total) as promedio')
			)
		->groupBy('u.id');

		return $usuarios;
	}

	public function scopeusuarios2($usuarios)
	{
		$usuarios=DB::table('users as u')

		->leftjoin('pedidos as p',function($join){
							$join->on('p.id_usuario','=', 'u.id');
					}) 

		->leftjoin('envios as e',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 

		->leftjoin('restaurantes as r',function($join){
							$join->on('r.id','=', 'e.id_restaurante');
					}) 
		->where('e.id_restaurante','!=','0')

		

		->select('u.id as id', 'u.edad as edad', 'u.username as username', 'u.nombre as nombre',
		 'u.apellidos as apellido','u.direccion as direccion', 'u.codigo_postal as codigo', 'r.nombre as nombreR',
			DB::raw('COUNT(e.id_restaurante != 0) as contadorhd'),
			DB::raw('COUNT(e.id_restaurante = r.id) as totales'),
			DB::raw('AVG(p.total) as promedio')
			)
		->groupBy('u.id');

		return $usuarios;
	}

	
	
}