<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    // public function index()
    // {
    //     $data = [
    //         'name' => 'elsayed',
    //         'age' => 28,
    //         'id' => 2,
    //         'hobbies' => ['reading', 'sports']
    //     ];

    //     return view('front-end.home', ['data1' => $data]);
    // }

    public function index(){
        $users = DB::table('users')->get();
        dd($users);
    }
}
