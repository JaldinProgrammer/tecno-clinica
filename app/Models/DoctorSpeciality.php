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

    public function store(Request $request){
        $request->validate([
            'speciality_id' => ['required'],
            'user_id' => ['required'],
        ]);

        DoctorSpeciality::create([
            'speciality_id' => $request['key'],
            'user_id' => $request['table_id']
        ]);
    }

    // public function setTables($id, $key){
    //     $key = Key::findOrFail($key);
    //     $key->table_id = $id;
    //     $key->update();
    // }
    
    public function getAll(){
        return DoctorSpeciality::where('status',1)->get();
    }

    public function index(){
        return DoctorSpeciality::all();
    }

    public function show($id){
        return DoctorSpeciality::where('user_id', $id)->get();
    }

    public function deleteDoctorSpeciality($id) {
        $doctorspeciality = DoctorSpeciality::findOrFail($id);
        $doctorspeciality->status = 0;
        $doctorspeciality->update();
        return $doctorspeciality;
    }

}
