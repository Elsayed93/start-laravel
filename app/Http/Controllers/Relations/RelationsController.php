<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RelationsController extends Controller
{
    public  function oneToOne($id)
    {
        $user = User::with(['phone' => function ($q) {
            $q->select('code', 'phone', 'user_id');
        }])->find($id, ['id','name','email']);

        // $user = User::with('phone')->find($id);

        /////// >>>>>>  join users table and phones table 
        // $user = DB::table('users')->select('name','email','phone')
        //             ->join('phones','users.id','=', 'phones.user_id')->first();

        ############################################

        // dd($user->phone->toArray());
        return response()->json($user, 200);
        return $user->name;
    }

    public function inverseOneToOne($id){
        $phone = Phone::with('user')->find($id);
        // >>> makeVisible && makeHidden
        $phone->makeHidden(['id']);
        return $phone;
    }
}
