<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function show(){
        return 'home page';
    }
    public function show1(){
        return 'home page1';
    }
    public function show2(){
        return 'home page2';
    }
    public function show3(){
        return 'home page3';
    }
}
