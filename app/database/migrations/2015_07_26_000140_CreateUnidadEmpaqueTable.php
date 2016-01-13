<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadEmpaqueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	private $tabledb = "aux_unidadempaque";
	 
	public function up()
	{
		
		Schema::create($this->tabledb, function(Blueprint $table)
		{

			$table->increments('ID');
			$table->Integer('UNIDAD_EMPAQUE')->unsigned();
	
		
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
