<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phones';
    protected $fillable = ['code', 'phone', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public $timestamps = false;

    // one to one relation (phone && user)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
