<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'table',
        'route',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function keys(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Key::class);
    }

}
