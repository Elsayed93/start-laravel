<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'specialist', 'is_consult', 'hospital_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    // many to many relation (doctors && services)
    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service', 'doctor_id', 'service_id');
    }
}
