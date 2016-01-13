<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePUNITARIOSTOCKBITrigger extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		

         DB::unprepared('
            CREATE TRIGGER tr_PUNITARIOSTOCKBI BEFORE INSERT ON `tra_compra` FOR EACH ROW
			BEGIN
			SET NEW.PRECIO_UNITARIO = NEW.PRECIO_TOTAL /( NEW.CANTIDAD * ( SELECT UNIDAD_EMPAQUE FROM aux_unidadempaque WHERE ID = NEW.ID_UNIDAD_EMPAQUE));
			UPDATE `inv_stock` SET CANTIDAD = CANTIDAD + NEW.CANTIDAD * (SELECT UNIDAD_EMPAQUE FROM aux_unidadempaque WHERE ID = NEW.ID_UNIDAD_EMPAQUE) WHERE ID_PRODUCTO = NEW.ID_PRODUCTO;
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
		DB::unprepared('DROP TRIGGER `tr_PUNITARIOSTOCKBI`');
	}

}
