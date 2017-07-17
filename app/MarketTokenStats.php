<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class MarketTokenStats extends Model
{
    protected $fillable = [	'rank',
        'token_id',
        'price_usd',
        'price_btc',
        'volume_24h_usd',
        'marketcap_usd',
        'available_supply',
        'percent_change1h',
        'percent_change24h',
        'percent_change7d'];
    protected $guarded = ['id'];
    protected $table = 'market_token_stats';

}
