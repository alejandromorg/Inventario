
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSTOCKADTrigger extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		

         DB::unprepared('
		 
              CREATE TRIGGER tr_STOCKAD AFTER DELETE ON `inv_producto` FOR EACH ROW
					BEGIN 
						DELETE FROM `inv_stock` WHERE ID_PRODUCTO = OLD.ID_VENTA;
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
		DB::unprepared('DROP TRIGGER `tr_STOCKAD`');
	}

}
