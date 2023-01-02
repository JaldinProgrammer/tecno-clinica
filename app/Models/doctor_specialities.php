<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_specialities extends Model
{
    use HasFactory;
    protected $table = 'doctor_specialities';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'speciality_id','status'];
}
