<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'table',
        'route',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function keys(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return  $this->hasMany(Key::class);
    }

    public function search(Request $request){
        //$request['date']

//        dd($request['search']);
        return DB::table('keys')
            ->join('tables', 'tables.id', '=', 'keys.table_id')
            ->where('keys.key', 'LIKE', '%'.$request['search'].'%')
            ->get();
    }

}
