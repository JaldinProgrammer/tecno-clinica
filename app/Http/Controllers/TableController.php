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
        dd($this->tableModel->search($request));
        return view('tables.search');
    }
}
