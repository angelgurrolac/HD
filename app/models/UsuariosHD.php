<?php

class UsuariosHD extends Eloquent
{
	protected $table = "usersHD";


	public function scopeusuarioshd($usuarios)
	{

		$usuarios =DB::table('usershd as h')

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					}) 
		->where('e.estatus','=','recibido')

		 ->groupBy('h.id')
		 ->orderBy('enviados', 'desc')




		->select('h.id as id', 'e.id as numero','h.username as nombre','h.nombre as nombre2','h.apellidos as apellidos',
			'h.estatus_u as estatus','h.celular as celular','h.edad as edad',
			'h.motocicleta as moto','h.anio_moto as año',
			DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'));
		
		 
		


		return $usuarios;
	}
}