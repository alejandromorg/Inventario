
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorTable extends Migration { //stub better design in first design

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 
	 private $tabledb = "inv_proveedor";
	  
	public function up()
	{
		
		Schema::create($this->tabledb, function(Blueprint $table)
		{
			$table->increments("ID");
			$table->String('NOMBRE');
			$table->Integer('RANKING')->unsigned();
			$table->String('DESCRIPCION');
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
		Schema::dropIfExists($this->tabledb);
	}

}
