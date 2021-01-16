<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class StartController extends Controller
{
    public function start(){
        return view('start');
    }
}
