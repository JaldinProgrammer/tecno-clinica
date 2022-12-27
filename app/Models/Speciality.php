<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function doctorSpecialities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(DoctorSpeciality::class);
    }
}
