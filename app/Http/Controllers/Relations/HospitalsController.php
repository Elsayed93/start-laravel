<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalsController extends Controller
{
    public function allDoctors($hospital_id)
    {
        $hospital = Hospital::with('doctors')->find($hospital_id);
        // dd($hospital->toArray());

        // return $hospital;
        // return $hospital->doctors;

        // foreach ($hospital->doctors as $key => $value) {
        //     echo $value->specialist . '<br>';
        // }

        $doctorHospital = $hospital->name;
        $doctors = $hospital->doctors;


        // $doctors = Doctor::with('hospital')->where('hospital_id', $hospital_id)->get();
        // $doctorHospital = $hospital->name;
        // $doctorHospital = $doctors->hospital;
        // return $doctorHospital;
        // return $doctors;

        // foreach ($doctors as $key => $value) {
        //     echo $value->hospital->name . '<br>';
        // }

        return view('hospitals.allDoctors', compact('doctors', 'doctorHospital'));
        // return view('hospitals.allDoctors', compact('doctors'));
    }



    public function allHospitals()
    {
        $hospitals =  Hospital::get();

        return view('hospitals.allHospitals', compact('hospitals'));
    }

    // deleteHospital
    public function deleteHospital($hospital_id)
    {

        // $hospital = Hospital::find($hospital_id);

        // if(!$hospital){
        //     return 'hospital not found';
        // }

        // $hospital->delete();  //because of foreign key constrain >>> doctors in this hospital will be deleted
        Hospital::find($hospital_id)->delete() ?
            session()->flash('success', 'deleted succesfuly')
            :
            session()->flash('not-success', 'not found');

        return redirect()->back();

        // if($hospital){
        //     // session()->flash('success', 'Yu deleted your obj succesfuly');
        //     // $successfullyDeleted = 'successfullyDeleted';
        //     return view('hospitals.allHospitals',compact('successfullyDeleted'));
        // }
    }
}
