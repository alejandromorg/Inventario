
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 private $tabledb = "tra_compra";
	public function up()
	{
		
		Schema::create($this->tabledb, function(Blueprint $table)
		{

			$table->increments('ID');
			$table->string('NUMERO_FACTURA',15);
			$table->Integer('ID_PROVEEDOR')->unsigned();
			$table->Integer('ID_PRODUCTO')->unsigned();
			$table->Integer('CANTIDAD')->unsigned();
			$table->Integer('ID_UNIDAD_EMPAQUE')->unsigned();
			$table->double('PRECIO_TOTAL');
			$table->double('PRECIO_UNITARIO');
			$table->date('FECHA_COMPRA');
			$table->timestamps();

			$table->foreign("ID_PRODUCTO")->references("ID_VENTA")->on("inv_producto")->onDelete("no action")->onUpdate("Cascade");
			$table->foreign("ID_PROVEEDOR")->references("ID")->on("inv_proveedor")->onDelete("no action")->onUpdate("Cascade");
			$table->foreign("ID_UNIDAD_EMPAQUE")->references("ID")->on("aux_unidadempaque")->onDelete("no action")->onUpdate("Cascade");
	
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
