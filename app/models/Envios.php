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
		 ->where('e.estatus','=','recibido')

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
		 ->where('e.estatus','=','recibido')

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



	public function scopeenvioscubiertosT($enviadas)
	{
		$enviadas=DB::table('envios as e')

		->leftjoin('usershd as h',function($join){
							$join->on('e.id_usuariohd','=', 'h.id');
					}) 
		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 
	
	    ->where('e.id_restaurante','=', 0)
	    ->where('e.estatus','=','recibido')

		->groupBy('h.id')
		->orderBy('total','desc')

		->select('h.username as nombre','h.correo as correo' ,
			DB::raw('AVG(p.total) as total'), 
			DB::raw('count(p.tipo="tarjeta") -1 as enviosTarjeta'), 
			DB::raw('SUM(p.total) as cantidad_ventas'), 
			DB::raw('( (sum( e.id_usuariohd = h.id) * 15) - ( (count(p.tipo="tarjeta") -1) * 9) ) as pago'), 
			DB::raw('SUM(e.id_usuariohd = h.id) as envios_totales'));



		return $enviadas;

	}
	public function scopeenvioscubiertosHD($enviadas)
	{
		$enviadas=DB::table('envios as e')

		->leftjoin('usershd as h',function($join){
							$join->on('e.id_usuariohd','=', 'h.id');
					}) 
		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 
		->where('e.id_restaurante','=', 0)
		->where('e.estatus','=','recibido')

		->groupBy('h.id')
		// ->orderBy('total','desc')

		->select('h.username as nombre','h.correo as correo' ,
			// DB::raw('AVG(p.total) as total'), 
			DB::raw('count(p.tipo="tarjeta") -1 as enviosTarjeta'), 
			DB::raw('SUM(p.total) as cantidad_ventas'), 
			DB::raw('( (sum( e.id_usuariohd = h.id) * 15) - ( (count(p.tipo="tarjeta") -1) * 9) ) as pago'), 
			DB::raw('SUM(e.id_usuariohd = h.id) as envios_totales'))

		->orderBy('envios_totales','desc');



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
		->where('e.estatus','=','recibido')

		->groupBy('h.id')
		// ->orderBy('total','desc')

		->select('h.username as nombre', 'h.correo as correo' ,
			DB::raw('ROUND(AVG(p.total),2) as total'), 
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
		->where('e.estatus','=','recibido')

		->groupBy('h.id')

		->select('h.username', 
		DB::raw('SUM( e.id_usuariohd = h.id) as envios'));


		return $enviadas;




	}


	public function scopeinformes($informes)
	{
		$informes=DB::table('envios as e')

		->where('e.id_restaurante','=', 0)
		->where('e.estatus','=','recibido')
		

		->select(DB::raw('count(e.id_restaurante=0) as HD'))

		->where(DB::raw('LEFT(created_at,10)'), '=', DB::raw('CURDATE()'));


		return $informes;
	}


		public function scopeinformesSemana($informes)
	{
		$informes=DB::table('envios as e')

		->where('e.id_restaurante','=', 0)
		->where('e.estatus','=','recibido')
		

		->select(DB::raw('count(e.id_restaurante=0) as HD'))

		->where('e.created_at' , 'BETWEEN' ,  
			DB::raw('CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY AND 
			CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY ')
			);


		return $informes;
	}

		public function scopeinformesMes($informes)
	{
		$informes=DB::table('envios as e')

		->where('e.id_restaurante','=', 0)
		->where('e.estatus','=','recibido')
		

		->select(DB::raw('count(e.id_restaurante=0) as HD'))

		->where('e.created_at' , 'BETWEEN' ,  
			DB::raw('DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, "%Y-%m-01") AND 
			LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH) ')
			);


		return $informes;
	}

	public function scopeinformes2($informes)
	{
		$informes=DB::table('envios as e')

		->where('e.id_restaurante','!=', 0)
		->where('e.estatus','=','recibido')

		->select(DB::raw('count(e.id_restaurante != 0) as tasty'))

		->where(DB::raw('LEFT(created_at,10)'), '=', DB::raw('CURDATE()'));

		return $informes;
	}

		public function scopeinformes2Semana($informes)
	{
		$informes=DB::table('envios as e')

		->where('e.id_restaurante','!=', 0)
		->where('e.estatus','=','recibido')

		->select(DB::raw('count(e.id_restaurante != 0) as tasty'))

		->where('e.created_at' , 'BETWEEN' ,  
			DB::raw('CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY AND 
			CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY ')
			);

		return $informes;
	}

		public function scopeinformes2Mes($informes)
	{
		$informes=DB::table('envios as e')

		->where('e.id_restaurante','!=', 0)
		->where('e.estatus','=','recibido')

		->select(DB::raw('count(e.id_restaurante != 0) as tasty'))

		->where('e.created_at' , 'BETWEEN' ,  
			DB::raw('DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, "%Y-%m-01") AND 
			LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH) ')
			);

		return $informes;
	}

	public function scopeinformes3($totales)
	{
		$totales=DB::table('envios as e')

		// ->leftjoin('pedidos as p',function($join){
		// 					$join->on('e.id_pedido','=', 'p.id');
		// 			}) 
		// ->where('p.estatus','=','entregado')

		->where('e.estatus','=','recibido')


		->select(DB::raw('COUNT(e.estatus="recibido") as total'))
		->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('CURDATE()'));

		return $totales;


	}

	public function scopeinformes3Semana($totales)
	{
		$totales=DB::table('envios as e')

		// ->leftjoin('pedidos as p',function($join){
		// 					$join->on('e.id_pedido','=', 'p.id');
		// 			}) 
		// ->where('p.estatus','=','entregado')

		->where('e.estatus','=','recibido')


		->select(DB::raw('COUNT(e.estatus="recibido") as total'))
		->where('e.created_at' , 'BETWEEN' ,  
			DB::raw('CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY AND 
			CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY ')
			);

		return $totales;


	}

	public function scopeinformes3Mes($totales)
	{
		$totales=DB::table('envios as e')

		// ->leftjoin('pedidos as p',function($join){
		// 					$join->on('e.id_pedido','=', 'p.id');
		// 			}) 
		// ->where('p.estatus','=','entregado')

		->where('e.estatus','=','recibido')


		->select(DB::raw('COUNT(e.estatus="recibido") as total'))
		->where('e.created_at' , 'BETWEEN' ,  
			DB::raw('DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, "%Y-%m-01") AND 
			LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH) ')
			);

		return $totales;


	}



	public function scopetotales($totales)
	{
		$totales=DB::table('envios as e')

		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 
		->where('p.estatus','=','pagada')
		->where('e.estatus','=','entregado')

		->select(DB::raw('ROUND(AVG(p.total),2) as promedio'),
			DB::raw('(SUM(p.total)  * .16) +  SUM(p.total) as totales'),
			DB::raw('SUM(p.total)  * .16 as IVA'))

		->where(DB::raw('LEFT(e.created_at,10)'), '=', DB::raw('CURDATE()'));




		return $totales;

	}

		public function scopetotalesSemana($totales)
	{
		$totales=DB::table('envios as e')

		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 
		->where('p.estatus','=','pagada')
		->where('e.estatus','=','entregado')

		->select(DB::raw('ROUND(AVG(p.total),2) as promedio'),
			DB::raw('(SUM(p.total)  * .16) +  SUM(p.total) as totales'),
			DB::raw('SUM(p.total)  * .16 as IVA'))

		->where('e.created_at' , 'BETWEEN' ,  
			DB::raw('CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY AND 
			CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY ')
			);




		return $totales;

	}

		public function scopetotalesMes($totales)
	{
		$totales=DB::table('envios as e')

		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					}) 
		->where('p.estatus','=','pagada')
		->where('e.estatus','=','entregado')

		->select(DB::raw('ROUND(AVG(p.total),2) as promedio'),
			DB::raw('(SUM(p.total)  * .16) +  SUM(p.total) as totales'),
			DB::raw('SUM(p.total)  * .16 as IVA'))

		->where('e.created_at' , 'BETWEEN' ,  
			DB::raw('DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, "%Y-%m-01") AND 
			LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH) ')
			);




		return $totales;

	}



	public function scopeEnviosDis($envios,$usuarios)
	{
		$envios = DB::table('envios as e')

		->where('e.estatus','=','pendiente')
		->where('p.estatus','=','pagada')
		->where('p.id_restaurante','=', DB::raw('"'.$usuarios.'"'))


		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					})
		->leftjoin('restaurantes as r',function($join)  use($usuarios){
							$join->on('r.id','=', DB::raw('"'.$usuarios.'"'));
					})
		->leftjoin('users as u',function($join){
							$join->on('u.id','=', 'p.id_usuario');
					})
		->leftjoin('detalles_pedidos as dp',function($join){
							$join->on('dp.id_pedido','=', 'p.id');
					})
		->leftjoin('productos as a',function($join){
										$join->on('dp.id_producto','=', 'a.id');
					})

		->groupBy('e.id')
		->orderBy('p.id','DESC')
		
		
		->select(DB::raw('GROUP_CONCAT(a.nombre SEPARATOR", " ) as alimentos'),
			'e.id','e.foto','e.estatus','e.id_pedido','e.id_restaurante',
			'p.total','p.domicilio','p.caracteristica','p.coordenadas','r.nombre',
			'r.direccion','r.coordenadas as coordenadas_accidente','u.nombre','u.apellidos','u.reg_id');

		return $envios;
	}

	public function scopeEnviosDishd($envios,$usuarios,$valor)
	{
		$envios = DB::table('envios as e')

		->where('e.estatus','=','pendiente')
		->where('p.estatus','=','pagada')
		->where('p.id_restaurante','=', DB::raw('"'.$usuarios.'"'))


		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					})
		->leftjoin('usershd as h',function($join) use($usuarios,$valor){
							$join->on('h.id_restaurante','=', DB::raw('"'.$usuarios.'"'))->orOn('h.id_restaurante','=', DB::raw('"'.$valor.'"'));
					})
		->leftjoin('restaurantes as r',function($join)  use($usuarios){
							$join->on('r.id','=', DB::raw('"'.$usuarios.'"'));
					})
		->leftjoin('users as u',function($join){
							$join->on('u.id','=', 'p.id_usuario');
					})
		->leftjoin('detalles_pedidos as dp',function($join){
							$join->on('dp.id_pedido','=', 'p.id');
					})
		->leftjoin('productos as a',function($join){
										$join->on('dp.id_producto','=', 'a.id');
					})

		->groupBy('e.id')
		->orderBy('p.id','DESC')
		
		
		->select(DB::raw('GROUP_CONCAT(a.nombre SEPARATOR", " ) as alimentos'),
			'e.id','e.foto','e.estatus','e.id_pedido','e.id_restaurante',
			'p.total','p.domicilio','p.caracteristica','p.coordenadas','r.nombre',
			'r.direccion','r.coordenadas as coordenadas_accidente','u.nombre','u.apellidos','u.reg_id');

		return $envios;
	}

	public function scopeEnviosDis2($envios,$usuarios)
	{
		$envios = DB::table('envios as e')

		->where('e.estatus','=','confirmado')
		->where('p.estatus','=','pagada')
		->where('p.id_restaurante','=', DB::raw('"'.$usuarios.'"'))


		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					})
		->leftjoin('usershd as h',function($join) use($usuarios){
							$join->on('h.id_restaurante','=', DB::raw('"'.$usuarios.'"'));
					})
		->leftjoin('restaurantes as r',function($join)  use($usuarios){
							$join->on('r.id','=', DB::raw('"'.$usuarios.'"'));
					})
		->leftjoin('users as u',function($join){
							$join->on('u.id','=', 'p.id_usuario');
					})
		->leftjoin('detalles_pedidos as dp',function($join){
							$join->on('dp.id_pedido','=', 'p.id');
					})
		->leftjoin('productos as a',function($join){
							$join->on('dp.id_producto','=', 'a.id');
					})

		->groupBy('e.id')
		->orderBy('p.id','DESC')
		
		
		->select(DB::raw('GROUP_CONCAT(a.nombre SEPARATOR", " ) as alimentos'),
			'e.id','e.foto','e.estatus','e.id_pedido','e.id_restaurante',
			'e.coordenadas_accidente as coordenadas_accidente',
			'p.total','p.domicilio','p.caracteristica','p.coordenadas',
			'p.tipo','r.nombre as nombre_restaurante','r.direccion','r.coordenadas as coordenadas_restaurante','u.nombre','u.apellidos','u.reg_id');

		return $envios;
	}


	public function scopeEnviosDis2hd($envios,$usuarios,$usuarios2)
	{
		$envios = DB::table('envios as e')

		->where('e.estatus','=','confirmado')
		->where('p.estatus','=','pagada')
		->where('e.id_restaurante','=', DB::raw('"'.$usuarios.'"'))
		->whereIn('h.id_restaurante', array(DB::raw('"'.$usuarios2.'"'),DB::raw('"'.$usuarios.'"')),'or',
			'h.id_restaurante2', array(DB::raw('"'.$usuarios2.'"'),DB::raw('"'.$usuarios.'"')))


		->leftjoin('pedidos as p',function($join){
							$join->on('e.id_pedido','=', 'p.id');
					})
		->leftjoin('restaurantes as r',function($join){
							$join->on('r.id','	=', 'e.id_restaurante');
					})
		->leftjoin('users as u',function($join){
							$join->on('u.id','=', 'p.id_usuario');
					})
		->leftjoin('detalles_pedidos as dp',function($join){
							$join->on('dp.id_pedido','=', 'p.id');
					})
		->leftjoin('productos as a',function($join){
							$join->on('dp.id_producto','=', 'a.id');
					})
		->leftjoin('usershd as h',function($join){
							$join->on('h.id','=', 'e.id_usuarioHD');
					})

		->groupBy('id')
		->orderBy('p.id','DESC')
		
		
		->select(DB::raw('GROUP_CONCAT(dp.cantidad," ", a.nombre SEPARATOR  ", " ) as alimentos'),
			'e.id','e.foto','e.estatus','e.id_pedido','e.id_restaurante','e.coordenadas_accidente','dp.id as id_detalles_pedido',
			'p.id as id_pedido','p.total','p.domicilio','p.caracteristica','p.coordenadas','r.nombre as nombre_restaurante',
			'r.direccion','r.coordenadas as coordenadas_restaurante','u.nombre','u.apellidos','u.reg_id',
			'p.tipo');

		return $envios;
	}


	public function scopeultimoenvio($envios)
	{
		$envios = DB::table('envios as e')

		->leftjoin('usershd as h',	function($join){
							$join->on('e.id_usuarioHD','=','h.id');
					}) 
		->leftjoin('pedidos as p',	function($join){
							$join->on('e.id_pedido','=','p.id');
					}) 
		->leftjoin('detalles_pedidos as dp',	function($join){
							$join->on('p.id','=','dp.id_pedido');
					}) 
		->leftjoin('productos as ps',	function($join){
							$join->on('dp.id_producto','=','ps.id');
					}) 
		->leftjoin('restaurantes as r',	function($join){
							$join->on('p.id_restaurante','=','r.id');
					}) 
		->leftjoin('users as u',	function($join){
							$join->on('p.id_usuario','=','u.id');
					}) 
		->where('h.id_restaurante', '=', 'r.id')
		->where('e.estatus', '=', 'pendiente')

		->select(DB::raw('GROUP_CONCAT(ps.nombre SEPARATOR", " )'),
		'e.id', 'e.foto', 'e.estatus', 'e.id_pedido', 'ps.nombre',
		 'r.nombre', 'r.direccion', 'r.coordenadas', 'p.domicilio', 'p.caracteristica',
		 'p.coordenadas', 'u.nombre', 'u.apellidos')

		->orderBy('p.id','DESC');



		return $envios;


	}

	public function scopeenviosConfirmados($envios,$id)
	{

		$envios = DB::table('envios as e')

		->leftjoin('usershd as h',	function($join){
							$join->on('e.id_usuarioHD','=','h.id');
					})
		->where('h.estatus_u','=','noatendida')

		->where('e.estatus','=','confirmado')

		->where('h.id','=', DB::raw('"'.$id.'"'))

		->orderBy('e.id','desc')

		->select('e.id as envios_id','e.id_restaurante');

		return $envios;
	}


	

}