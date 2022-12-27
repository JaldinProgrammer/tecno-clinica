<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'description',
        'time',
        'user_id',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(User::class);
    }
    public function dates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Date::class);
    }
}
