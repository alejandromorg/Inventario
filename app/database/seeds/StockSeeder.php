<?php
 
class StockSeeder  extends DatabaseSeeder
{
	private $table = "inv_stock";
  public function run()
  {
		
		$object = [
		[
			"ID_PRODUCTO"    						=> 	"10",
			"CANTIDAD" 								=> 	"101",
			"ID_BODEGA"	 							=> 	"1",

		],
		[
			"ID_PRODUCTO"    						=> 	"20",
			"CANTIDAD" 								=> 	"10",
			"ID_BODEGA"	 							=> 	"1",
			
		],
		[
			"ID_PRODUCTO"    						=> 	"1",
			"CANTIDAD" 								=> 	"55",
			"ID_BODEGA"	 							=> 	"1",
		]	  
    ];

	DB::unprepared('ALTER TABLE '.$this->table.' AUTO_INCREMENT = 1');
	
	
    foreach ($object as $detail) {
		Stock::create($detail);		
    }
  }
}