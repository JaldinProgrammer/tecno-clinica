<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function diagnostics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Diagnostic::class);
    }

    public function getAll(){
        return Disease::where('status',1)->get();
    }
 //comment 1
}
