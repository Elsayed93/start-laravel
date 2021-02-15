<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalsController extends Controller
{
    public function allDoctors($hospital_id)
    {
        $hospital = Hospital::with('doctors')->first();
        // dd($hospital);

        // return $hospital;
        // return $hospital->doctors;

        // foreach ($hospital->doctors as $key => $value) {
        //     echo $value->specialist . '<br>';
        // }

        $hospital = Hospital::find($hospital_id);
        // dd($hospital);
        $doctorHospital = $hospital->name;
        $doctors = $hospital->doctors;
        return view('hospitals.allDoctors', compact('doctors', 'doctorHospital'));
    }



    public function allHospitals()
    {
        $hospitals =  Hospital::get();

        return view('hospitals.allHospitals', compact('hospitals'));
    }
}
