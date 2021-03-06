<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("resource", function(Blueprint $table)
		{
		    $table->increments("id");
		    $table->string("name",100);
		    $table->string("pattern",100);
			$table->string("target",100);
			$table->tinyInteger("secure");
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::dropIfExists("resource");
	}

}
