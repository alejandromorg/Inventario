
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 private $tabledb = "inv_stock";
	public function up()
	{
		
		Schema::create($this->tabledb, function(Blueprint $table)
		{

			$table->increments('ID');
			$table->Integer('ID_PRODUCTO')->unsigned();
			$table->Integer('ID_BODEGA')->unsigned();
			$table->Integer('CANTIDAD')->unsigned();
			$table->timestamps();

			$table->foreign("ID_PRODUCTO")->references("ID_VENTA")->on("inv_producto")->onDelete("no action")->onUpdate("Cascade");	
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
