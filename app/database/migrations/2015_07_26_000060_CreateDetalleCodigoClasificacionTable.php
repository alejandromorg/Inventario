
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCodigoClasificacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("inv_detalle_codigo_clasificacion", function(Blueprint $table)
		{
		    $table->increments("ID");
		    $table->string("ID_DETALLE",10);
			$table->enum('CONCEPTO', array('LINEA', 'CLASE'));	
		    $table->string("VALOR",50);
			$table->unique(array('ID_DETALLE','CONCEPTO','VALOR'),'Uniquecode');
			$table->boolean('DISPONIBLE')->default(1);
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("inv_detalle_codigo_clasificacion");
	}

}
