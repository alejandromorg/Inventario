
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 private $tabledb = "inv_producto";
	public function up()
	{
		
		Schema::create($this->tabledb, function(Blueprint $table)
		{
			
		    $table->string('ID_INVENTARIO',20);
			$table->Integer('ID_VENTA')->unsigned();
			$table->string('ID_PRODUCTO',7);
			$table->Integer('ID_RUTA')->unsigned();
			$table->string('NOMBRE_PRODUCTO',20);
			$table->boolean('DISPONIBLE')->default(1);
			
			
			$table->primary('ID_INVENTARIO');
			
			$table->unique('NOMBRE_PRODUCTO');
			$table->unique('ID_VENTA');
			
			$table->foreign("ID_RUTA")->references("ID")->on("inv_codigo_clasificacion")->onDelete("no action")->onUpdate("Cascade");  
		
		
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists($this->tabledb);
	}

}
