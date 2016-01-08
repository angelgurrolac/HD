<?php

class Usuarios extends Eloquent
{
	protected $table = "users";



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

		

		->select('u.id', 'u.edad', 'u.username', 'u.nombre', 'u.direccion', 'u.codigo_postal', 'r.nombre')
		->groupBy('u.id');

		return $usuarios;
	}
	
}