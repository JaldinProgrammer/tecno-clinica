<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function getdiseasebyid($id){
        return Disease::findOrFail($id);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Disease::create([
            'name' => $request['name'],
        ]);
    }

    public function deleteDisease($id) {
        $disease = Disease::findOrFail($id);
        $disease->status = 0;
        $disease->update();
        return $disease;
    }
}
