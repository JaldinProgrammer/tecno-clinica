<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cellphone',
        'is_doctor',
        'is_admin',
        'ci'
    ];
    protected $dates = ['created_at', 'updated_at'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctorSpecialities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(DoctorSpeciality::class);
    }

    public function diagnostics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Diagnostic::class);
    }

    public function reservations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Reservation::class);
    }

    public function dates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Date::class);
    }

    public function getAll(){
        return User::all();
    }

    public function udpate(Request $request, $id){
        $User = User::findOrFail($id);
        $User->name = $request->get('name');
        $User->cellphone = $request->get('cellphone');
        $User->ci = $request->get('ci');
        $User->is_doctor = $request->get('is_doctor');
        $User->is_admin = $request->get('is_admin');
        $User->email = $request->get('email');
        $User->update();
    }

    public function getById($id){
        return User::findOrFail($id);
    }

    public function getAllDoctors(){
        return User::where('is_doctor',1)->get();
    }

    public function getUsersQuantity() {
        $doctors = User::where('is_doctor',1)->count();
        $admins = User::where('is_admin',1)->count();
        $patients = User::where('is_doctor',0)->where('is_admin',0)->count();
        return [$doctors, $admins, $patients];
//        return array(
//            "doctors" => $doctors,
//            "admins" => $admins,
//            "patients" => $patients,
//        );
    }
}
