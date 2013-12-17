<?php

use Illuminate\Database\Migrations\Migration;

class RemoveUserIdFromVotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('votes', function ($t)
		{
			$t->dropForeign('votes_user_id_foreign');
			$t->dropColumn('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('votes', function ($t)
		{
			$t->integer('user_id')->unsigned()->unique();
			$t->foreign('user_id')->references('id')->on('users');
		});
	}

}