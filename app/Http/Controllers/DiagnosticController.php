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
        try {
            $user = $this->userModel->getById($id);
            $diseases = $this->diseaseModel->getAll();
            return view('diagnostics.create', compact('diseases'), compact('user'));
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function createFromDate($id, $date){
        try {
            $user = $this->userModel->getById($id);
            $diseases = $this->diseaseModel->getAll();
            //$this->dateModel->setDiagnostic($id, $date);
            return view('diagnostics.create', compact('diseases'), compact('user'))->with("date",$date);
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function store(Request $request, $date=0){
        try {
            $diagnostic = $this->diagnosticModel->store($request);
            if ($date!=0){
                $this->dateModel->setDiagnostic($diagnostic->id, $date);
            }
            return redirect()->route('diagnostic.index');
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function index(){
        try {
            $diagnostics = $this->diagnosticModel->index();
            return view('diagnostics.index', compact('diagnostics'));
        } catch (\Exception $e) {
            return view('error', compact('e'));
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
