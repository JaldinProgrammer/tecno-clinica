<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Key;

class KeyController extends Controller
{
    private Key $keyModel;
    private Table $tableModel;
    public function __construct(Key $entityKey, Table $entityTable)
    {
        $this->keyModel = $entityKey;
        $this->tableModel =  $entityTable;
    }

    public function create(){
        
        $tables = $this->tableModel->getAll();
        return view('keysv.create', compact('tables'));
    }

   

    public function store(Request $request){
        // $key = $this->keyModel->store($request);
        // if ($table!=0){
        //     $this->keyModel->setTables($ktable->id, $key);
        // }
        // return redirect()->route('key.index');

        $this->keyModel->store($request);
        return redirect()->route('key.index');
    }

    public function index(){
        $keys = $this->keyModel->getAll();
        return view('keysv.index', compact('keys'));
    }

    public function show($id){
        $this->keyModel->show($id);
    }

    public function delete($id){
        $keyId = $this->keyModel->deleteKey($id);
        return redirect()->route('key.index');
    }
}
