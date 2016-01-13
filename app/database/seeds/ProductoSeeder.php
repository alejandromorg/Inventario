<?php
 
class ProductoSeeder  extends DatabaseSeeder
{
  public function run()
  {
	  private $table = "inv_producto";
	  $object = [
      [
        "ID_VENTA" => "1",
        "ID_PRODUCTO" => "001",
        "ID_RUTA"    => "1",
		"NOMBRE_PRODUCTO"    => "PRODUCTO1",
		"DISPONIBLE"    => "1",		
      ],
	  [
       "ID_VENTA" => "2",
        "ID_PRODUCTO" => "002",
        "ID_RUTA"    => "1",
		"NOMBRE_PRODUCTO"    => "PRODUCTO2",
		"DISPONIBLE"    => "1",
     ],
	  [
       "ID_VENTA" => "10",
        "ID_PRODUCTO" => "003",
        "ID_RUTA"    => "2",
		"NOMBRE_PRODUCTO"    => "PRODUCTO3",
		"DISPONIBLE"    => "1",
      ],
	  [
       "ID_VENTA" => "20",
        "ID_PRODUCTO" => "004",
        "ID_RUTA"    => "3",
		"NOMBRE_PRODUCTO"    => "PRODUCTO4",
		"DISPONIBLE"    => "1",
      ],
    ];

	DB::unprepared('ALTER TABLE '.$this->table.' AUTO_INCREMENT = 1');
	
	
    foreach ($object as $detail) {
		Producto::create($detail);		
    }
  }
}
		