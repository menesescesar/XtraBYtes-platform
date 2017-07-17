<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Activation;
use Alert;
use App\Role;

class ActivationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function activate($activationCode)
    {
        $activation = Activation::whereToken($activationCode)->first();
        $user = User::whereId($activation->user_id)->first();

        if(!isset($user) || !($user->id>0)) {
            alert()->error('Error', trans('auth.BAD_USER'))->autoclose(3000);
            return redirect('/login');
        }

        if(!isset($activation)){
            alert()->error('Error', trans('auth.BAD_CODE'))->autoclose(3000);
            return redirect('/login');
        }

        if($activation->completed_at != null){
            alert()->error('Error', trans('auth.EXPIRED_CODE'))->autoclose(3000);
            return redirect('/login');
        }

        $activation->completed_at = Carbon::now();
        $user->active = true;
        $user->activated = true;
        $user->save();
        $activation->save();

        $role = Role::where('name','User')->first();
        $user->syncRoles($role);

        alert()->success('Success', trans('auth.ACTIVATED'))->autoclose(3000);

        return redirect('/login')->with(['email'=>$user->email]);
    }
}
