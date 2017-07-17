<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("PermissionMiddleware:view_users,view_roles",['except' => 'index']);
        $this->middleware("PermissionMiddleware:add_users",['only' => 'index']);
    }

    public function index()
    {
        dd("example controller");
    }
}
