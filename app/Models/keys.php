<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keys extends Model
{
    use HasFactory;
    protected $table = 'keys';
    protected $primaryKey = 'id';
    protected $fillable = ['table_id', 'key','status'];
}
