<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'from',
        'to',
        'status',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function getAll(){
        return Promotion::where('status',1)->get();
    }
 //comment 1
    public function getspromotionbyid($id){
        return Promotion::findOrFail($id);
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required'],
            'description' => ['required', 'string', 'max:255'],
            'dateini' => ['required'],
            'datefin' => ['required']
        ]);

        Promotion::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'from' => $request['dateini'],
            'to' => $request['datefin'],
        ]);
    }

    public function deletepromotion($id) {
        $promotion = Promotion::findOrFail($id);
        $promotion->status = 0;
        $promotion->update();
        return $promotion;
    }
}
