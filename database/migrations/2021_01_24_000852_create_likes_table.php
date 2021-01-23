<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLikesTable.
 */
class CreateLikesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Illuminate\Support\Facades\Schema::create('likes', function(Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("user_id");
            $table->uuid("likeable_id");
            $table->string("likeable_type", 20);
            $table->tinyInteger("type");
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
		Schema::drop('likes');
	}
}
