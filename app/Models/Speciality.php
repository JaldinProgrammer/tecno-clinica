<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getAll(){
        return Speciality::where('status',1)->get();
    }
 //comment 1
    public function getspecialitybyid($id){
        return Speciality::findOrFail($id);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Speciality::create([
            'name' => $request['name'],
        ]);
    }

    public function deleteSpeciality($id) {
        $speciality = Speciality::findOrFail($id);
        $speciality->status = 0;
        $speciality->update();
        return $speciality;
    }
}
