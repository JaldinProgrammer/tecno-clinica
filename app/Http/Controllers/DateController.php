<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateController extends Controller
{
    private User $userModel;
    private Reservation $reservationModel;
    private Date $dateModel;
    public function __construct(User $entityUser, Reservation $entityReservation, Date $entityDate)
    {
        $this->userModel = $entityUser;
        $this->reservationModel = $entityReservation;
        $this->dateModel = $entityDate;
    }

    public function index($id){ //doctor
        try {
            $dates = $this->dateModel->getByDoctor($id);
//            dd($dates);
            return view('dates.index', compact('dates'));
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function show($id){ //patient
        try {
            $dates = $this->dateModel->getByPatient($id);
            dd($dates);
            return view('date.index', compact('dates'));
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function create($id){
        try {
            $reservation = $this->reservationModel->getReservation($id);
            return view('dates.create', compact('reservation'));
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function store(Request $request){
        $this->dateModel->store($request);
        return redirect()->route('date.index', Auth::user()->id);
    }
}
