<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model

{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'dob'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function patients(){
        return $this->belongsToMany(Patient::class);
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
