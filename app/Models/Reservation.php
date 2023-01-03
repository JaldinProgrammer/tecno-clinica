<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function getReservation($id){
        return Reservation::findOrFail($id);
    }

    public function getByUser($id){
        return Reservation::where('user_id', $id)->where('status',1)->get();
    }

    public function getAllReservation(){
        return Reservation::where('status',1)->get();
    }

    public function store(Request $request){
        $request->validate([
            'date' => ['required'],
            'description' => ['required', 'string', 'max:255'],
            'time' => ['required'],
            'user_id' => ['required']
        ]);

        Reservation::create([
            'date' => $request['date'],
            'description' => $request['description'],
            'time' => $request['time'],
            'user_id'=> $request['user_id'],
        ]);
    }

    public function deleteReservation($id) {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 0;
        $reservation->update();
        return $reservation->user_id;
    }

}
