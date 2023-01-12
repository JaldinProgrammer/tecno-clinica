<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'table_id',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function table(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(Table::class);
    }
    
 //comment 1
    

    public function store(Request $request){
        $request->validate([
            'key' => ['required', 'string', 'max:255'],
            'table_id' => ['required'],
        ]);

        Key::create([
            'key' => $request['key'],
            'table_id' => $request['table_id']
        ]);
    }

    // public function setTables($id, $key){
    //     $key = Key::findOrFail($key);
    //     $key->table_id = $id;
    //     $key->update();
    // }
    
    public function getAll(){
        
        $data = Key::where('status',1)->get();
        $data->load('table');
        return $data;
    }

    public function index(){
        return Key::all();
    }

    public function show($id){
        return Key::where('table_id', $id)->get();
    }

    public function deleteKey($id) {
        $key = Key::findOrFail($id);
        $key->status = 0;
        $key->update();
        return $key;
    }

    
    

}
