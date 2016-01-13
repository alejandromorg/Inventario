
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIDCODIGOBITrigger extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		

         DB::unprepared('
              CREATE TRIGGER tr_ID_CODIGOBI BEFORE INSERT ON `inv_codigo_clasificacion` FOR EACH ROW
                   BEGIN
						SET NEW.ID_CODIGO = CONCAT((SELECT ID_DETALLE FROM `inv_detalle_codigo_clasificacion` WHERE ID = NEW.ID_LINEA),(SELECT ID_DETALLE FROM `inv_detalle_codigo_clasificacion` WHERE ID = NEW.ID_CLASE));
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
		DB::unprepared('DROP TRIGGER `tr_ID_CODIGOBI`');
	}

}
