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
        $dates = $this->dateModel->getByDoctor($id);
        return view('dates.index', compact('dates'));
    }

    public function show($id){ //patient
        $dates = $this->dateModel->getByPatient($id);
//        dd($dates);
        return view('dates.index', compact('dates'));
    }

    public function create($id){
        $reservation = $this->reservationModel->getReservation($id);
        return view('dates.create', compact('reservation'));
    }

    public function store(Request $request){
        $this->dateModel->store($request);
        return redirect()->route('date.index', Auth::user()->id);
    }
}
