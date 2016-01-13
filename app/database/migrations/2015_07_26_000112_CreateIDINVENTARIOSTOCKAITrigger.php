
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIDINVENTARIOSTOCKAITrigger extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		

         DB::unprepared('
		 
              CREATE TRIGGER tr_ID_INVENTARIOSTOCKAI AFTER INSERT ON `inv_producto` FOR EACH ROW
					BEGIN 
						IF ((SELECT COUNT(*) FROM inv_stock
							WHERE   ID_PRODUCTO = NEW.ID_VENTA) =0)
						THEN
							INSERT INTO `inv_stock` (ID, ID_PRODUCTO, ID_BODEGA, CANTIDAD,created_at,updated_at) 
							VALUES (NULL, NEW.ID_VENTA, 1, 0,NOW() ,NOW());
						END IF;
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
		DB::unprepared('DROP TRIGGER `tr_ID_INVENTARIOSTOCKAI`');
	}

}
