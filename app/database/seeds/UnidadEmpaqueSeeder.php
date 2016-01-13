<?php
 
class UnidadEmpaqueSeeder  extends DatabaseSeeder
{
  public function run()
  {
	  $table = "aux_unidadempaque";
	  
	  
	  $object = [
      [
        "UNIDAD_EMPAQUE" => "1",
      ],
	  [
       "UNIDAD_EMPAQUE" => "3",
     ],
	  [
       "UNIDAD_EMPAQUE" => "6",
      ],
	  [
       "UNIDAD_EMPAQUE" => "12",
      ],
	  	  [
       "UNIDAD_EMPAQUE" => "24",
      ],
    ];

	DB::unprepared('ALTER TABLE '.$table.' AUTO_INCREMENT = 1');
	
	
    foreach ($object as $detail) {
		UnidadEmpaque::create($detail);		
    }
  }
}
		