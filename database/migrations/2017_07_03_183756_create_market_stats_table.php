<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_stats', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('total_marketcap_usd');
            $table->bigInteger('total_24h_volume_usd');
            $table->float('btc_percent_marketcap');
            $table->integer('active_currencies');
            $table->integer('active_assets');
            $table->integer('active_markets');

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
        Schema::dropIfExists('market_stats');
    }
}
