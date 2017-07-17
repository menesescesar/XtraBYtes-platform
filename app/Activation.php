<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Activation extends Model
{
    protected $table = 'user_activations';

    protected $fillable = [
        'user_id','token'
    ];

    protected $hidden = [

    ];

    protected $dates = [
      'completed_at',
    ];

    public function getCompletedAtAttribute($value)
    {
        if(($user = Auth::user()) && isset($value) && $value!=NULL)
            return Carbon::createFromFormat('Y-m-d H:i:s',$value)->setTimezone($user->timezone)->toDateTimeString();
        else
            return $value;
    }

    public function getUpdatedAtAttribute($value)
    {
        if($user = Auth::user())
            return Carbon::createFromFormat('Y-m-d H:i:s',$value)->setTimezone($user->timezone)->toDateTimeString();
        else
            return $value;
    }

    public function getCreatedAtAttribute($value)
    {
        if($user = Auth::user())
            return Carbon::createFromFormat('Y-m-d H:i:s',$value)->setTimezone($user->timezone)->toDateTimeString();
        else
            return $value;
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
