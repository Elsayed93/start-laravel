<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'details_ar', 'details_en', 'price', 'image'];

    protected $hidden = ['created_at', 'updated_at'];
}
