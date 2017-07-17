<?php

namespace App\Http\Controllers;

use App\MarketStats;
use App\MarketTokenStats;
use App\Tokens;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("PermissionMiddleware:view_users,view_roles",['except' => 'index']);
    }

    public function index()
    {
        $last_market_stats = MarketStats::orderByDesc('id')->first();

        $last_market_xby_stats = Tokens::where('symbol','xby')
            ->join('market_token_stats', 'market_token_stats.token_id', '=', 'tokens.id')
            ->orderByDesc('market_token_stats.id')
            ->select('market_token_stats.*')
            ->first();

        $last_date_markets_xby = $last_market_xby_stats->created_at;
        $last_date_markets  = $last_market_stats->created_at;

        $date_markets_1day = MarketStats::whereDate( 'created_at', '=', Carbon::parse($last_date_markets)->subDays(1)->format("Y-m-d"))
            ->orderBy('created_at')
            ->first();

        $date_markets_xby_1day = MarketTokenStats::whereDate( 'created_at', '=', Carbon::parse($last_date_markets_xby)->subDays(1)->format("Y-m-d"))
            ->where('token_id', $last_market_xby_stats->token_id)
            ->orderBy('created_at')
            ->first();

        $xby_graph_7d =	DB::select(DB::raw('
									SELECT MTS.* 
									FROM market_token_stats MTS
									WHERE MTS.created_at > '.Carbon::parse($last_date_markets_xby)->subDays(7)->format("Y-m-d").'
									AND MTS.token_id = '.$last_market_xby_stats->token_id.'
									GROUP BY DATE(MTS.created_at) 
									ORDER BY MTS.created_at ASC
									'));

        $spotlight_24h =	DB::select(DB::raw('
									SELECT T.*
									FROM
									(
										SELECT MTS.* , T.symbol, T.name
										FROM market_token_stats MTS, tokens T
										WHERE T.id = MTS.token_id
										ORDER BY MTS.id DESC
										LIMIT 250
									)T
									ORDER BY T.percent_change24h DESC
									LIMIT 6
									'));

        $spotlight_7d =	DB::select(DB::raw('
									SELECT T.*
									FROM
									(
										SELECT MTS.* , T.symbol, T.name
										FROM market_token_stats MTS, tokens T
										WHERE T.id = MTS.token_id
										ORDER BY MTS.id DESC
										LIMIT 250
									)T
									ORDER BY T.percent_change7d DESC
									LIMIT 6
									'));

        $spotlight_volume =	DB::select(DB::raw('
									SELECT T.*
									FROM
									(
										SELECT MTS.* , T.symbol, T.name
										FROM market_token_stats MTS, tokens T
										WHERE T.id = MTS.token_id
										ORDER BY MTS.id DESC
										LIMIT 250
									)T
									ORDER BY T.volume_24h_usd DESC	
									LIMIT 6
									'));

        $arr_xby_price_usd = [];
        $arr_xby_price_btc = [];
        $arr_xby_marketcap = [];
        $arr_days = [];

        foreach ($xby_graph_7d as $point)
        {
            array_push($arr_days, Carbon::parse($point->created_at)->format("Y-m-d H:i"));
            array_push($arr_xby_price_usd, $point->price_usd);
            array_push($arr_xby_price_btc, $point->price_btc);
            array_push($arr_xby_marketcap, $point->marketcap_usd);
        }

        return view('dashboard',
            compact(['last_market_stats',
                'last_market_xby_stats',
                'date_markets_1day',
                'date_markets_xby_1day',
                'spotlight_24h',
                'spotlight_7d',
                'spotlight_volume',
                'arr_days',
                'arr_xby_marketcap',
                'arr_xby_price_usd',
                'arr_xby_price_btc'])
        );
    }
}
