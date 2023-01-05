<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private Table $tableModel;
    public function __construct(Table $entityTable)
    {
        $this->tableModel = $entityTable;
    }
    public function search(Request $request){
        $results = $this->tableModel->search($request);
//        dd($results);
        return view('tables.search', compact('results'));
    }
}
