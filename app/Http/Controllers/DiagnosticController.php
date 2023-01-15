<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Diagnostic;
use App\Models\Disease;
use App\Models\User;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    private Diagnostic $diagnosticModel;
    private Disease $diseaseModel;
    private User $userModel;
    private Date $dateModel;
    public function __construct(Diagnostic $entityDiagnostic, Disease $entityDisease, User $entityUser, Date $entityDate)
    {
        $this->diagnosticModel = $entityDiagnostic;
        $this->diseaseModel =  $entityDisease;
        $this->userModel = $entityUser;
        $this->dateModel = $entityDate;
    }

    public function create($id){
        $user = $this->userModel->getById($id);
        $diseases = $this->diseaseModel->getAll();
        return view('diagnostics.create', compact('diseases'), compact('user'));
    }

    public function createFromDate($id, $date){
        $user = $this->userModel->getById($id);
        $diseases = $this->diseaseModel->getAll();
        return view('diagnostics.create', compact('diseases'), compact('user'))->with("date",$date);
    }

    public function store(Request $request, $date=0){
        $diagnostic = $this->diagnosticModel->store($request);
        if ($date!=0){
            $this->dateModel->setDiagnostic($diagnostic->id, $date);
        }
        return redirect()->route('diagnostic.index');
    }

    public function index(){
        $diagnostics = $this->diagnosticModel->index();
        return view('diagnostics.index', compact('diagnostics'));
    }

    public function show($id){
        $this->diagnosticModel->show($id);
    }
}
