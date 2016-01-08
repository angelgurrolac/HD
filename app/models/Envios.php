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



		 ->select('e.created_at','e.id','p1.cantidad','a.nombre','r.RFC','e.id_restaurante');


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

		->select('e.created_at', 'e.id', 'p.total', 'e.estatus', 'u.username', 'u.correo');

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

		->groupBy('h.id')
		->orderBy('total','desc')

		->select('h.username', 
			DB::raw('AVG(p.total) as total'), 
			DB::raw('SUM( e.id_usuariohd = h.id) as envios_totales'));



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