<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExplorerController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('explorer.index');
    }
}
