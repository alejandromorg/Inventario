<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePRECIOUNITARIOBITrigger extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		

         DB::unprepared('
              CREATE TRIGGER tr_PRECIOBI BEFORE INSERT ON `tra_compra` FOR EACH ROW
						 SET NEW.PRECIO_UNITARIO = NEW.PRECIO_TOTAL / ( NEW.CANTIDAD * ( SELECT UNIDAD_EMPAQUE FROM aux_unidadempaque WHERE ID = NEW.ID_UNIDAD_EMPAQUE ) )');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::unprepared('DROP TRIGGER `tr_PRECIOBI`');
	}

}
