<?php

namespace App\Jobs;

use App\MarketStats;
use App\MarketTokenStats;
use App\Tokens;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateMarketStats implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ret = file_get_contents("https://api.coinmarketcap.com/v1/global/");
        $array = (json_decode($ret, true));

        $active_markets = isset($array["active_markets"]) ? $array["active_markets"] : null;
        $active_assets = isset($array["active_assets"]) ? $array["active_assets"] : null;
        $active_currencies = isset($array["active_currencies"]) ? $array["active_currencies"] : null;
        $btc_percent_marketcap = isset($array["bitcoin_percentage_of_market_cap"]) ? $array["bitcoin_percentage_of_market_cap"] : null;
        $total_volume_24h = isset($array["total_24h_volume_usd"]) ? $array["total_24h_volume_usd"] : null;
        $total_marketcap = isset($array["total_market_cap_usd"]) ? $array["total_market_cap_usd"] : null;

        $market = MarketStats::create([
            "active_markets"=>$active_markets,
            "active_assets"=>$active_assets,
            "active_currencies"=>$active_currencies,
            "btc_percent_marketcap"=>$btc_percent_marketcap,
            "total_24h_volume_usd"=>$total_volume_24h,
            "total_marketcap_usd"=>$total_marketcap,
        ]);

        $ret = file_get_contents("https://api.coinmarketcap.com/v1/ticker/");
        $array = (json_decode($ret, true));

        for($i=0;$i<250;$i++) // only check first 250
        {
            $obj = $array[$i];
            $name = isset($obj["name"]) ? $obj["name"] : null;
            $symbol = isset($obj["symbol"]) ? $obj["symbol"] : null;
            $rank = isset($obj["rank"]) ? $obj["rank"] : null;
            $price_usd = isset($obj["price_usd"]) ? $obj["price_usd"] : null;
            $price_btc = isset($obj["price_btc"]) ? $obj["price_btc"] : null;
            $volume_24h_usd = isset($obj["24h_volume_usd"]) ? $obj["24h_volume_usd"] : null;
            $marketcap_usd = isset($obj["market_cap_usd"]) ? $obj["market_cap_usd"] : null;
            $available_supply = isset($obj["available_supply"]) ? $obj["available_supply"] : null;
            $total_supply = isset($obj["total_supply"]) ? $obj["total_supply"] : null;
            $percent_change_1h = isset($obj["percent_change_1h"]) ? $obj["percent_change_1h"] : null;
            $percent_change_24h = isset($obj["percent_change_24h"]) ? $obj["percent_change_24h"] : null;
            $percent_change_7d = isset($obj["percent_change_7d"]) ? $obj["percent_change_7d"] : null;
            $last_updated = isset($obj["last_updated"]) ? $obj["last_updated"] : null;

            //check if token exists
            $token = Tokens::where('symbol',"$symbol")->first();
            if($token)
            {
                $token_id = $token->id;
            }
            else
            {
                //create new
                $new_token = Tokens::create(["name" => $name,"symbol" => $symbol,"total_supply" => $total_supply]);
                $token_id = $new_token->id;
            }

            if($token_id>0)
            {
                $markettokenstats = MarketTokenStats::create([
                    "rank"=>$rank,
                    "price_usd"=>$price_usd,
                    "price_btc"=>$price_btc,
                    "volume_24h_usd"=>$volume_24h_usd,
                    "marketcap_usd"=>$marketcap_usd,
                    "available_supply"=>$available_supply,
                    "percent_change1h"=>$percent_change_1h,
                    "percent_change24h"=>$percent_change_24h,
                    "percent_change7d"=>$percent_change_7d,
                    "token_id"=>$token_id
                ]);
            }
        }
    }
}
