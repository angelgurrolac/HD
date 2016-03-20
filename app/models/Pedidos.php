<?php

class Pedidos extends Eloquent
{
	protected $table = "pedidos";


	public function scopeEnvios()
	{
		$pedido = DB::table('pedidos as p')

		->select('p.id_restaurante')

		->where('p.estatus','=','pagada');

		return $pedido;

	}

}