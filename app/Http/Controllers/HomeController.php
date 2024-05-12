<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('auth.login');
    }


    public function index()
    {
        if (Auth::check()) {
            
            return view('welcome');

        }else{

            return view('auth.login');
        }
    }
}
