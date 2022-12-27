<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality_id',
        'user_id',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function speciality(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(Speciality::class);
    }
}
