<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function setDiagnostic($id, $date){
        $date = Date::findOrFail($date);
        $date->diagnostic_id = $id;
        $date->update();
    }
    public function getByDoctor($id){
//        return Date::where('user_id', $id)->where('status',1)->get();
        return DB::table('dates')
            ->select(
                [
                    'reservations.id as id',
                    'patient.id as patientId',
                    'patient.name as patientName',
                    'doctor.id as doctorId',
                    'doctor.name as doctorName',
                    'reservations.description as description',
                    'reservations.date as date',
                    'reservations.time as time',
                    'dates.diagnostic_id as diagnosticId'
                ])
            ->join('reservations', 'dates.reservation_id', '=', 'reservations.id')
            ->join('users as patient', 'reservations.user_id', '=', 'patient.id')
            ->join('users as doctor', 'dates.user_id', '=', 'doctor.id')
            ->where('dates.user_id', $id)
            ->get();
    }

    public function getByPatient($id){
        return DB::table('dates')
            ->join('reservations', 'dates.reservation_id', '=', 'reservations.id')
            ->join('user', 'reservations.user_id', '=', $id)
            ->get();
    }

    public function getAllDates(){
        return Date::where('status',1)->get();
    }

    public function store(Request $request){
        $request->validate([
            'date' => ['required'],
            'description' => ['required', 'string', 'max:255'],
            'time' => ['required'],
            'user_id' => ['required'],
            'reservation_id' => ['required'],
        ]);

        Date::create([
            'date' => $request['date'],
            'description' => $request['description'],
            'time' => $request['time'],
            'user_id'=> $request['user_id'],
            'reservation_id' => $request['reservation_id'],
        ]);
    }

}
