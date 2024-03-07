<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'token',
        'doctor_id',
        'patient_id',
        'appointment_date',
        'status',
        'notes'
    ];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

}
