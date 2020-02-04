<?php
/**
 * Created by PhpStorm.
 * User: AD
 * Date: 11/18/2017
 * Time: 10:20 PM
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYoutubeAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtube_access_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->text('access_token');
            $table->timestamp('created_at');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('youtube_access_tokens');
    }
}
