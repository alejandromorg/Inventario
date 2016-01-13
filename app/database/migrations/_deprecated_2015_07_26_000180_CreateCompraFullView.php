
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraFullView extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	private $tabledb = "view_compra_full";
	public function up()
	{

			 DB::statement('CREATE VIEW '.$this->tabledb.' AS 
				( SELECT `TC`.`ID`,`TC`.`NUMERO_FACTURA`,`TC`.`CANTIDAD`,`TC`.`PRECIO_TOTAL`,`TC`.`PRECIO_UNITARIO`,`TC`.`created_at`, `IPROD`.`NOMBRE_PRODUCTO`,`IPROV`.`NOMBRE` AS NOMBRE_PROVEEDOR,`AUE`.`UNIDAD_EMPAQUE`  from (`tra_compra` `TC` join `inv_producto` `IPROD` on((`TC`.`ID_PRODUCTO` = `IPROD`.`ID_VENTA`)) join `inv_proveedor` `IPROV` on((`TC`.`ID_PROVEEDOR` = `IPROV`.`ID`)) join `aux_unidadempaque` `AUE` on((`TC`.`ID_UNIDAD_EMPAQUE` = `AUE`.`ID`)))  )');
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
