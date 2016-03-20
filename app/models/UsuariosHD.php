<?php

class UsuariosHD extends Eloquent
{
	protected $table = "usershd";


	public function scopeusuarioshd($usuarios)
	{

		$usuarios =DB::table('usershd as h')

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					}) 
		// ->where('e.estatus','=','recibido')

 		 ->where('h.estatus','=', 1)
 		 ->where('h.id_nivel2','=',0)
		 ->groupBy('h.id')
		 ->orderBy('id', 'desc')




		->select('h.id as id', 'e.id as numero','h.username as nombre','h.nombre as nombre2','h.apellidos as apellidos',
			'h.estatus_u as estatus','h.celular as celular','h.edad as edad',
			'h.motocicleta as moto','h.anio_moto as año',
			DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'));
		
		 
		


		return $usuarios;
	}

	public function scopeinfo($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})
				

		
		// ->where('e.estatus','=','recibido')

		->select('h.id','h.nombre','h.apellidos','h.imagen','h.motocicleta','h.fecha_reparacion')

		->groupBy('h.id');

		// ->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('CURDATE()'));



		return $usuarios;

	}

	public function scopeinfo2($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})

	
			->select(DB::raw('SUM(e.id_usuarioHD = h.id) as enviadoshoy'),
			DB::raw('(SUM(e.id_usuarioHD = h.id) * 15) as promediohoy'))

			->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('CURDATE()'));


			return $usuarios;

	}

	public function scopedia1($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})

			->select('e.id','e.id_usuarioHD',DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'),
			DB::raw('(SUM(e.id_usuarioHD = h.id) * 15) as promedio'))

			->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('CURDATE()'));

		return $usuarios;
	}

	public function scopedia2($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})
		
			->select('e.id','e.id_usuarioHD',DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'),
			DB::raw('(SUM(e.id_usuarioHD = h.id) * 15) as promedio'))

			// ->where(DB::raw('LEFT(e.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 1 DAY)'));
			->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 1 DAY)'));

		return $usuarios;
	}

	public function scopedia3($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})
		
			->select('e.id','e.id_usuarioHD',DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'),
			DB::raw('(SUM(e.id_usuarioHD = h.id) * 15) as promedio'))

			->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 2 DAY)'));

		return $usuarios;
	}

	public function scopedia4($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})
		
			->select('e.id','e.id_usuarioHD',DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'),
			DB::raw('(SUM(e.id_usuarioHD = h.id) * 15) as promedio'))

			->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 3 DAY)'));

		return $usuarios;
	}

	public function scopedia5($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})
		
			->select('e.id','e.id_usuarioHD',DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'),
			DB::raw('(SUM(e.id_usuarioHD = h.id) * 15) as promedio'))

			->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 4 DAY)'));

		return $usuarios;
	}

	public function scopedia6($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})
		
			->select('e.id','e.id_usuarioHD',DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'),
			DB::raw('(SUM(e.id_usuarioHD = h.id) * 15) as promedio'))

			->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 5 DAY)'));

		return $usuarios;
	}
	public function scopedia7($usuarios)
	{
		$usuarios =DB::table('usershd as h')

		// ->where('h.id','=',$username)

		->leftjoin('envios as e',function($join){
							$join->on('e.id_usuarioHD','=', 'h.id');
					})
		->leftjoin('users as u',function($join){
							$join->on('h.id','=', 'u.username');
					})
		
			->select('e.id','e.id_usuarioHD',DB::raw('SUM(e.id_usuarioHD = h.id) as enviados'),
			DB::raw('(SUM(e.id_usuarioHD = h.id) * 15) as promedio'))

			->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 6 DAY)'));

		return $usuarios;
	}


}