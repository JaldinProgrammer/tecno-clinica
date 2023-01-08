<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;
use Illuminate\Support\Facades\Auth;

class DiseaseController extends Controller
{
    
    private Disease $diseaseModel;
    public function __construct( Disease $entityDisease)
    {
        $this->diseaseModel = $entityDisease;
    }

    public function create(){
        return view('diseases.create');
    }

    public function store(Request $request){
        $this->diseaseModel->store($request);
        return redirect()->route('disease.show');
    }

    public function index(){
        $diseases = $this->diseaseModel->getAll();
        return view('diseases.index', compact('diseases'));
    }

    // public function show($id){
    //     $diseases = $this->diseaseModel->getdiseasebyid($id);
    //     return view('diseases.index', compact('diseases'));
    // }
    public function show(){
        $diseases = $this->diseaseModel->getAll();
        return view('diseases.index', compact('diseases'));
    }

    public function delete($id){
        $diseaseId = $this->diseaseModel->deleteDisease($id);
        return redirect()->route('disease.show');
    }
}
