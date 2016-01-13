
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoRutaView extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

			 DB::statement('CREATE VIEW view_producto_ruta AS 
				(SELECT `ID_INVENTARIO`, `ID_VENTA`, (SELECT CONCAT(DCLINEA.VALOR,\' / \',DCLASE.VALOR)
																				FROM `inv_codigo_clasificacion` CC
																				INNER JOIN `inv_detalle_codigo_clasificacion` DCLASE
																				ON CC.ID_CLASE = DCLASE.ID
																				INNER JOIN `inv_detalle_codigo_clasificacion` DCLINEA
																				ON CC.ID_LINEA = DCLINEA.ID
																				WHERE CC.ID=PROD.ID_RUTA) AS ID_RUTA,  `NOMBRE_PRODUCTO`, `DISPONIBLE` 
				FROM `inv_producto` PROD)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("DROP VIEW  `view_producto_ruta`");
	}

}
