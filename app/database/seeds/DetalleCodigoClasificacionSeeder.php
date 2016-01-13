<?php
 
class DetalleCodigoClasificacionSeeder  extends DatabaseSeeder
{
  public function run()
  {
	  $detCodClas = [
      [
	  //1
        "ID_DETALLE" => "001",
        "CONCEPTO" => "CLASE",
        "VALOR"    => "CLASE1",
		 "DISPONIBLE"    => "1"
      ],
	  [
	  //2
		"ID_DETALLE" => "002",
        "CONCEPTO" =>"CLASE",
        "VALOR"    => "CLASE2",
		 "DISPONIBLE"    => "1"
      ],
	   [
	   //3
		"ID_DETALLE" => "003",
        "CONCEPTO" => "CLASE",
        "VALOR"    => "CLASE3",
		 "DISPONIBLE"    => "1"
      ],
	  [
	  //4
		"ID_DETALLE" => "004",
        "CONCEPTO" => "CLASE",
        "VALOR"    => "CLASE4",
		 "DISPONIBLE"    => "1"
      ],
	  [
	  //5
		"ID_DETALLE" => "001",
        "CONCEPTO" => "LINEA",
        "VALOR"    => "LINEA1",
		 "DISPONIBLE"    => "1"
      ],
	  [
	  //6
		"ID_DETALLE" => "002",
        "CONCEPTO" => "LINEA",
        "VALOR"    => "LINEA2",
		 "DISPONIBLE"    => "1"
      ],
	  [
	  //7
		"ID_DETALLE" => "003",
        "CONCEPTO" => "LINEA",
        "VALOR"    => "LINEA3",
		 "DISPONIBLE"    => "1"
      ]
    ];

	
    foreach ($detCodClas as $detail) {
		DetalleCodigoClasificacion::create($detail);
		
    }
  }
}
		