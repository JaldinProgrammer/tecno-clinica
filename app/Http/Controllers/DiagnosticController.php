<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    private Diagnostic $diagnosticModel;

    public function __construct(Diagnostic $entity)
    {
        $this->diagnosticModel = $entity;
    }

    public function create(Request $request){
        try {
            return view('diagnostic.create');
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function store(Request $request){
        try {
            $this->diagnosticModel->store($request);
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function index(){
        try {
            $diagnostics = $this->diagnosticModel->index();
            return view('diagnostics.index', compact('diagnostics'));
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function show($id){
        try {
            $this->diagnosticModel->show($id);
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
