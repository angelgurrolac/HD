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

		 ->groupBy('h.id')
		 ->orderBy('enviados', 'desc')




		->select('e.id','h.username','h.nombre','h.apellidos','h.estatus_u','h.celular','h.edad',
			DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'));
		
		 
		


		return $usuarios;
	}
}