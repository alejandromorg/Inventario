
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIDINVENTARIOSTOCKBITrigger extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		

         DB::unprepared('
		 
              CREATE TRIGGER tr_ID_INVENTARIOSTOCKBI BEFORE INSERT ON `inv_producto` FOR EACH ROW
					BEGIN 
						SET NEW.ID_INVENTARIO = CONCAT(
						(SELECT CONCAT(DCLINEA.ID_DETALLE,DCLASE.ID_DETALLE)
						FROM `inv_codigo_clasificacion` CC
						INNER JOIN `inv_detalle_codigo_clasificacion` DCLASE
						ON CC.ID_CLASE = DCLASE.ID
						INNER JOIN `inv_detalle_codigo_clasificacion` DCLINEA
						ON CC.ID_LINEA = DCLINEA.ID
						WHERE CC.ID=NEW.ID_RUTA), NEW.ID_PRODUCTO) ;

					END
                   ');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::unprepared('DROP TRIGGER `tr_ID_INVENTARIOSTOCKBI`');
	}

}
