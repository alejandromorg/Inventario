<?php
 
class CodigoClasificacionSeeder  extends DatabaseSeeder
{
  public function run()
  {
	  $tableCodigoClasificacion = "inv_codigo_clasificacion";
	  $CodClas = [
      [
        "ID_LINEA" => "5",
        "ID_CLASE" => "1",
        "DISPONIBLE"    => "1"
      ],
	  [
		 "ID_LINEA" => "5",
        "ID_CLASE" => "2",
        "DISPONIBLE"    => "1"
      ],
	  [
	   "ID_LINEA" => "6",
        "ID_CLASE" => "3",
        "DISPONIBLE"    => "1"
      ],
	  [
	   "ID_LINEA" => "7",
        "ID_CLASE" => "4",
        "DISPONIBLE"    => "0"
      ],
    ];

	DB::unprepared('ALTER TABLE '.$tableCodigoClasificacion.' AUTO_INCREMENT = 1');
	
	
    foreach ($CodClas as $detail) {
		CodigoClasificacion::create($detail);		
    }
  }
}
		