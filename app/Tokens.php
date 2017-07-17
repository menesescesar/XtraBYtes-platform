<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Tokens extends Model
{
    protected $fillable = [	'name',
        'symbol',
        'total_supply'];
    protected $guarded = ['id'];
    protected $table = 'tokens';


}
