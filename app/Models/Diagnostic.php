<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Diagnostic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'disease_id'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function disease(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(Disease::class);
    }

    public function dates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Date::class);
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'user_id' => ['required'],
            'disease_id' => ['required']
        ]);

        Diagnostic::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'disease_id' => $request['disease_id'],
            'user_id'=> Auth::user()->id
        ]);
    }

    public function index(){
        return Diagnostic::all();
    }

    public function show($id){
        return Diagnostic::where('user_id', $id)->get();
    }
}
