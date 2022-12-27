<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'description',
        'time',
        'user_id',
        'reservation_id',
        'diagnostic_id',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function diagnostic(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(Diagnostic::class);
    }

    public function reservation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(Reservation::class);
    }
}
