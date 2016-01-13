<?php
 
class CompraSeeder  extends DatabaseSeeder
{
	private $table = "tra_compra";
  public function run()
  {
		
		$object = [
		[
			"NUMERO_FACTURA" 					=> 	"1000000001",
			"ID_PROVEEDOR"	 					=> 	"1",
			"ID_PRODUCTO"    						=> 	"10",
			"CANTIDAD" 								=> 	"1",
			"ID_UNIDAD_EMPAQUE" 				=> 	"3",
			"PRECIO_TOTAL" 						=> 	"12.000",
			"FECHA_COMPRA" 						=> 	"2015-09-08",
		],
		[
			"NUMERO_FACTURA" 					=> 	"1000000002",
			"ID_PROVEEDOR"	 					=> 	"2",
			"ID_PRODUCTO"    						=> 	"20",
			"CANTIDAD" 								=> 	"6",
			"ID_UNIDAD_EMPAQUE" 				=> 	"2",
			"PRECIO_TOTAL" 						=> 	"12.000",
			"FECHA_COMPRA" 						=> 	"2015-09-09",
		],
		[
			"NUMERO_FACTURA" 					=> 	"1000000003",
			"ID_PROVEEDOR"	 					=> 	"3",
			"ID_PRODUCTO"    						=> 	"1",
			"CANTIDAD" 								=> 	"15",
			"ID_UNIDAD_EMPAQUE" 				=> 	"1",
			"PRECIO_TOTAL" 						=> 	"12.000",
			"FECHA_COMPRA" 						=> 	"2015-09-10",
		]	  
    ];

	//DB::unprepared('ALTER TABLE '.$this->table.' AUTO_INCREMENT = 1');
	
	
    foreach ($object as $detail) {
		Compra::create($detail);		
    }
  }
}