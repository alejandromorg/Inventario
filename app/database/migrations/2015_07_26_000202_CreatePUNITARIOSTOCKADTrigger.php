<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePUNITARIOSTOCKADTrigger extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		

         DB::unprepared('
              CREATE TRIGGER tr_PUNITARIOSTOCKAD AFTER DELETE ON `tra_compra` FOR EACH ROW
				BEGIN
				UPDATE `inv_stock` SET CANTIDAD = CANTIDAD - OLD.CANTIDAD * (SELECT UNIDAD_EMPAQUE FROM aux_unidadempaque WHERE ID = OLD.ID_UNIDAD_EMPAQUE) WHERE ID_PRODUCTO = OLD.ID_PRODUCTO;
				END');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::unprepared('DROP TRIGGER `tr_PUNITARIOSTOCKAD`');
	}

}
