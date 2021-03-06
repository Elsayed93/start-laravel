<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RelationsController extends Controller
{
    public function oneToOne($id)
    {
        $user = User::with(['phone' => function ($q) {
            $q->select('code', 'phone', 'user_id');
        }])->find($id, ['id', 'name', 'email']);

        // $user = User::with('phone')->find($id);

        /////// >>>>>>  join users table and phones table
        // $user = DB::table('users')->select('name','email','phone')
        //             ->join('phones','users.id','=', 'phones.user_id')->first();

        ############################################

        // dd($user->phone->toArray());
        return response()->json($user, 200);
        return $user->name;
    }

    public function inverseOneToOne($id)
    {
        $phone = Phone::with('user')->find($id);
        // >>> makeVisible && makeHidden
        $phone->makeHidden(['id']);
        return $phone;
    }


    // one to many (hospital and doctors) >>>> one hospital to many doctors
    public function oneToMany(int $id)
    {
        $hospital = Hospital::with('doctors')->find($id);

        return $hospital->doctors;

        foreach ($hospital->doctors as $key => $value) {
            echo $value->name . '<br>';
        }
    }


    // Inverse one to many (hospital and doctors) >>>> one hospital to many doctors
    public function inverseOneToMany(int $id)
    {
        $doctor = Doctor::with('hospital')->find($id);

        return $doctor;
    }


    // many to many (hospital and services)
    public function doctorServices()
    {
        // $doctors = Doctor::with('services')->get();
        // dd($doctors->toArray());

        // foreach ($doctors as $doctor) {
        //     // echo $doctor . '<br>';
        //     foreach ($doctor->services as $service) {
        //         echo $service->name . '<br>';
        //     }
        // }
        // return;

        $doctor = Doctor::with('services')->find(5);
        // dd($doctor->toArray());

        return $doctor->services;

        // foreach ($doctor->services as $service) {
        //     echo $service->name . '<br>';
        // }

        // return Doctor::with('services')->get();
    }
}
