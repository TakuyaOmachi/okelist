<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function user_id(){
        $user = int(Auth::user()->id);
    }
}
