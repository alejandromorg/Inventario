
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockFullView extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	private $tabledb = "view_stock_full";
	public function up()
	{

			 DB::statement('CREATE VIEW '.$this->tabledb.' AS 
				( SELECT `IS`.`ID`,`IS`.`ID_PRODUCTO`,`IS`.`CANTIDAD`,`IS`.`created_at`,`IS`.`ID_BODEGA`,`IS`.`updated_at`,`IPROD`.`NOMBRE_PRODUCTO`  from (`inv_stock` `IS` join `inv_producto` `IPROD` on((`IS`.`ID_PRODUCTO` = `IPROD`.`ID_VENTA`))))');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists($this->tabledb);  // verify view deletion
	}

}
