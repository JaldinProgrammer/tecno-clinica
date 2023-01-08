<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use Illuminate\Support\Facades\Auth;

class SpecialityController extends Controller
{
    private Speciality $specialityModel;
    public function __construct( Speciality $entitySpeciality)
    {
        $this->specialityModel = $entitySpeciality;
    }

    public function create(){
        return view('specialities.create');
    }

    public function store(Request $request){
        $this->specialityModel->store($request);
        return redirect()->route('speciality.show');
    }

    public function index(){
        $specialities = $this->specialityModel->getAll();
        return view('specialities.index', compact('specialities'));
    }

    // public function show($id){
    //     $diseases = $this->diseaseModel->getdiseasebyid($id);
    //     return view('diseases.index', compact('diseases'));
    // }
    public function show(){
        $specialities = $this->specialityModel->getAll();
        return view('specialities.index', compact('specialities'));
    }

    public function delete($id){
        $specialitiesId = $this->specialityModel->deleteSpeciality($id);
        return redirect()->route('speciality.show');
    }
}
