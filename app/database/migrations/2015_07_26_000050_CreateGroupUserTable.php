<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("group_user", function(Blueprint $table)
		{
		    $table->increments("id");
			$table->integer("user_id")->unsigned();
			$table->foreign("user_id")->references("id")->on("user")->onDelete("Cascade")->onUpdate("Cascade");
		    $table->Integer("group_id")->unsigned();
			$table->foreign("group_id")->references("id")->on("group")->onUpdate("Cascade");
		    $table->timestamps();
			/*
			$table->foreign("group_id")->references("id")->on("group");
			$table->foreign("user_id")->references("id")->on("user");
			*/
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
		Schema::dropIfExists("group_user");
	}

}
