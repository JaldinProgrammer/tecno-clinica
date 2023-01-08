<?php

namespace App\Http\Controllers;

use App\Models\DoctorSpeciality;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorSpecialityController extends Controller
{
    private DoctorSpeciality $doctorSpecialityModel;
    private User $userModel;
    private Speciality $specialityModel;

    public function __construct(DoctorSpeciality $entityDoctorSpeciality, User $entityUser, Speciality $entitySpeciality)
    {
        $this->doctorSpecialityModel = $entityDoctorSpeciality;
        $this->userModel =  $entityUser;
        $this->specialityModel =  $entitySpeciality;
    }

    public function create(){
        
        $users = $this->userModel->getAllDoctors();
        $specialities = $this->specialityModel->getAll();
        return view('doctorSpecialities.create', compact('users'), compact('specialities'));
    }

   

    public function store(Request $request){
        

        $this->doctorSpecialityModel->store($request);
        return redirect()->route('doctorSpeciality.index');
    }

    public function index(){
        $doctorSpecialities = $this->doctorSpecialityModel->index();
        return view('doctorSpecialities.index', compact('doctorSpecialities'));
    }

    public function show($id){
        $this->doctorSpecialityModel->show($id);
    }
}
