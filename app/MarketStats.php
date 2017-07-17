<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class MarketStats extends Model
{
    protected $fillable = [	'total_marketcap_usd',
        'total_24h_volume_usd',
        'btc_percent_marketcap',
        'active_currencies',
        'active_assets',
        'active_markets'];
    protected $guarded = ['id'];
    protected $table = 'market_stats';


}