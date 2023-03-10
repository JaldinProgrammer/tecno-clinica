<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    //protected $fillable = [];
    protected $dates = ['created_at', 'updated_at'];

    public function bookSession(){
        return Log::create([]);
    }

    public static function showViews(){
        return Log::all()->count();
    }


}
