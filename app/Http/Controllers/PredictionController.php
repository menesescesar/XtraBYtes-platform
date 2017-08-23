<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Token;

class PredictionController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

    }

    public function xby_prediction()
    {
        $xby = DB::table('tokens')
                    ->where('symbol', 'XBY')
                    ->join('market_token_stats', 'tokens.id', '=', 'market_token_stats.token_id')
                    ->orderBy('id', 'desc')
                    ->select('market_token_stats.*')
                    ->limit(1)
                    ->first();

        $top3 = DB::select(
                    DB::raw('
                        SELECT T.*
                        FROM
                        (
                            select MTS.id, MTS.rank, MTS.marketcap_usd as marketcap, MTS.price_usd as priceusd, T.symbol, T.name
                            from market_token_stats MTS
                            inner join tokens T on T.id = MTS.token_id
                            WHERE MTS.rank<4
                            order by MTS.id DESC
                            limit 3
                        )T
                        order by T.rank ASC
                    ')
                );

        $market = DB::table('market_stats')
                    ->orderBy('id', 'desc')
                    ->select('market_stats.*')
                    ->limit(1)
                    ->first();

        $xby_market_cap = $xby->marketcap_usd;
        $xby_price_usd = $xby->price_usd;
        $xby_price_btc = $xby->price_btc;
        $xby_supply = $xby->available_supply;

        $crypto_market_cap = $market->total_marketcap_usd;
        $crypto_24h_volume = $market->total_24h_volume_usd;


        return view('price-prediction.xby_prediction',
                compact(
                    [   'xby_market_cap',
                        'xby_price_usd',
                        'xby_price_btc',
                        'xby_supply',
                        'crypto_market_cap',
                        'crypto_24h_volume',
                        'top3'
                    ])
                );
    }
}
