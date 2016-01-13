<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("group_resource", function(Blueprint $table)
		{
		    $table->increments("id");
		    $table->Integer("group_id")->unsigned();
			$table->Integer("resource_id")->unsigned();
		    $table->timestamps();
			$table->foreign('group_id')->references('id')->on('group')->onUpdate("Cascade");
			$table->foreign('resource_id')->references('id')->on('resource')->onDelete("Cascade")->onUpdate("Cascade");
			 
			 
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
		Schema::dropIfExists("group_resource");
	}

}
