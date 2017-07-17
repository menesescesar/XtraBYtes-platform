<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketTokenStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_token_stats', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('token_id')->unsigned()->nullable();
            $table->integer('rank')->nullable();
            $table->double('price_usd')->nullable();
            $table->double('price_btc')->nullable();
            $table->bigInteger('volume_24h_usd')->nullable();
            $table->bigInteger('marketcap_usd')->nullable();
            $table->bigInteger('available_supply')->nullable();
            $table->float('percent_change24h')->nullable();
            $table->float('percent_change1h')->nullable();
            $table->float('percent_change7d')->nullable();

            $table->index(["token_id"]);
            $table->foreign('token_id')->references('id')->on('tokens');

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
        Schema::dropIfExists('market_token_stats');
    }
}
