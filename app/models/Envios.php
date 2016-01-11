<?php

class Envios extends Eloquent
{
	protected $table = "envios";

	

	public function scopereportes($envios)
	{
		 $envios =DB::table('envios as e')

		 ->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 
		 ->leftjoin('detalles_pedidos as p1',function($join){
							$join->on('p1.id_pedido','=', 'p.id');
					}) 

		 ->leftjoin('productos as a',function($join){
							$join->on('p1.id_producto','=', 'a.id');
					}) 

		 ->leftjoin('restaurantes as r',function($join){
							$join->on('e.id_restaurante','=', 'r.id');
					})

		 ->groupBy('e.id')
		 ->where('r.nombre','=','HD')



		 ->select('e.id as numero','p1.cantidad as cantidad','a.nombre as nombre',
		 	'r.RFC as RFC','e.id_restaurante as restaurante','r.nombre as nombreR',
		 	'p.total as total',
		 	DB::raw('LEFT(e.created_at,10) as creado'),
		 	DB::raw('(total + 17.4) as final'));


		return $envios;

	}

	public function scopereportes2($envios)
	{
		 $envios =DB::table('envios as e')

		 ->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 
		 ->leftjoin('detalles_pedidos as p1',function($join){
							$join->on('p1.id_pedido','=', 'p.id');
					}) 

		 ->leftjoin('productos as a',function($join){
							$join->on('p1.id_producto','=', 'a.id');
					}) 

		 ->leftjoin('restaurantes as r',function($join){
							$join->on('e.id_restaurante','=', 'r.id');
					})

		 ->groupBy('e.id')
		 ->where('r.nombre','!=','HD')



		 ->select('e.id as numero','p1.cantidad as cantidad','a.nombre as nombre',
		 	'r.RFC as RFC','e.id_restaurante as restaurante','r.nombre as nombreR',
		 	'p.total as total',
		 	DB::raw('LEFT(e.created_at,10) as creado'),
		 	DB::raw('(total + 17.4) as final'));


		return $envios;

	}

	public function scopeenviados($enviadas)
	{
		$enviadas=DB::table('envios as e')

		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 

		->leftjoin('users as u',function($join){
							$join->on('u.id','=', 'p.id_usuario');
					}) 

		->select('e.id as numero', 'p.total as total', 
			'e.estatus as estado', 'u.username as nombre', 'u.direccion as direccion',
			DB::raw('LEFT(e.created_at,10) as creado'));

		return $enviadas;


	}



	public function scopeenvioscubiertos($enviadas)
	{
		$enviadas=DB::table('envios as e')

		->leftjoin('usershd as h',function($join){
							$join->on('e.id_usuariohd','=', 'h.id');
					}) 
		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 
		// ->where('p.tipo','=','tarjeta')

		->groupBy('h.id')
		->orderBy('total','desc')

		->select('h.username as nombre', 
			DB::raw('AVG(p.total) as total'), 
			DB::raw('count(p.tipo="tarjeta") -1 as enviosTarjeta'), 
			DB::raw('SUM(p.total) as cantidad_ventas'), 
			DB::raw('( (sum( e.id_usuariohd = h.id) * 15) - ( (count(p.tipo="tarjeta") -1) * 9) ) as pago'), 
			DB::raw('SUM(e.id_usuariohd = h.id) as envios_totales'));



		return $enviadas;

	}


	public function scopetarjeta($enviadas)
	{
		$enviadas=DB::table('envios as e')




		->leftjoin('usershd as h',function($join){
							$join->on('e.id_usuariohd','=', 'h.id');
					}) 

		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 

		->where('p.tipo','=','tarjeta')

		->groupBy('h.id')

		->select('h.username', 
		DB::raw('SUM( e.id_usuariohd = h.id) as envios'));


		return $enviadas;




	}

}