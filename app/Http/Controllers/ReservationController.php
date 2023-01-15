<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//. 
class ReservationController extends Controller
{
    private User $userModel;
    private Reservation $reservationModel;
    public function __construct(User $entityUser, Reservation $entityReservation)
    {
        $this->userModel = $entityUser;
        $this->reservationModel = $entityReservation;
    }

    public function create(){
        return view('reservations.create');
    }

    public function store(Request $request){
        $this->reservationModel->store($request);
        return redirect()->route('reservation.show', Auth::user()->id);
    }

    public function index(){
        $reservations = $this->reservationModel->getAllReservation();
        return view('reservations.index', compact('reservations'));
    }

    public function show($id){
        $reservations = $this->reservationModel->getByUser($id);
        return view('reservations.index', compact('reservations'));
    }

    public function delete($id){
        $userId = $this->reservationModel->deleteReservation($id);
        return redirect()->route('reservation.show',$userId);
    }
}
