<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEmotionsTable.
 */
class CreateEmotionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Illuminate\Support\Facades\Schema::create('emotions', function(Blueprint $table) {
            $table->uuid('id');
            $table->uuid("emotionable_id");
            $table->string('emotion_type', 20);
            $table->uuid("user_id")->nullable();
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
		Schema::drop('emotions');
	}
}
