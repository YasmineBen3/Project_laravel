<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DoctorAvailability extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['doctor_id', 'day', 'start_time', 'end_time'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
