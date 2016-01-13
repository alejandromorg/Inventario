<?php
 
class ProveedorSeeder  extends DatabaseSeeder
{
	private $table = "inv_proveedor";
  public function run()
  {
		
		$object = [
		[
			"NOMBRE" => "PROVEEDOR1",
			"RANKING" => "55",
			"DESCRIPCION"    => "DIRECCION: Tr 12 # 15-12, TEL 2355555, EMAIL: al55@gmail.de ",
		],
		[
			"NOMBRE" => "PROVEEDOR2",
			"RANKING" => "12",
			"DESCRIPCION"    => "DIRECCION: Tr 25 # 15-25, TEL 2252525, EMAIL: qwe25@gmail.de ",
		],
		[
			"NOMBRE" => "PROVEEDOR25",
			"RANKING" => "65",
			"DESCRIPCION"    => "1DIRECCION: Tr 34 # 15, TEL 2324456, EMAIL: wer5@gmail.de ",
		],
		[
			"NOMBRE" => "PROVEEDOR40",
			"RANKING" => "99",
			"DESCRIPCION"    => "1DIRECCION: Tr 34 # 15, TEL 2324456, EMAIL: dfg56l@gmail.de ",
		],
	  
    ];

	DB::unprepared('ALTER TABLE '.$this->table.' AUTO_INCREMENT = 1');
	
	
    foreach ($object as $detail) {
		Proveedor::create($detail);		
    }
  }
}
		