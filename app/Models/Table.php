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

    public function getAll(){
        return Table::where('status',1)->get();
    }

    public function search(Request $request){
        //$request['date']

//        dd($request['search']);
        return DB::table('keys')
            ->join('tables', 'tables.id', '=', 'keys.table_id')
            ->where('keys.key', 'LIKE', '%'.$request['search'].'%')
            ->get();
    }

    public function keysQuantityPerTable() {

        $reservaciones = Key::where('table_id',1)->count();
        $diagnosticos = Key::where('table_id',2)->count();
        $citas = Key::where('table_id',3)->count();
        $usuarios = Key::where('table_id',4)->count();
        $especialidades = Key::where('table_id',5)->count();
        $promociones = Key::where('table_id',6)->count();
        $llaves = Key::where('table_id',7)->count();
        $especialiadesDocs = Key::where('table_id',8)->count();
        return [
            $reservaciones,
            $diagnosticos,
            $citas,
            $usuarios,
            $especialidades,
            $promociones,
            $llaves,
            $especialiadesDocs,
        ];
    }

}
