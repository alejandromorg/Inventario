
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodigoClasificacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("inv_codigo_clasificacion", function(Blueprint $table)
		{
			$table->increments("ID");
			$table->Integer('ID_LINEA')->unsigned();	
			$table->foreign("ID_LINEA")->references("ID")->on("inv_detalle_codigo_clasificacion")->onDelete("no action")->onUpdate("Cascade");
		    $table->Integer('ID_CLASE')->unsigned();
			$table->foreign("ID_CLASE")->references("ID")->on("inv_detalle_codigo_clasificacion")->onDelete("no action")->onUpdate("Cascade");
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
		Schema::dropIfExists("inv_codigo_clasificacion");
	}

}
