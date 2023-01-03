<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        try {
            return view('reservations.create');
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function store(Request $request){
        $this->reservationModel->store($request);
        return redirect()->route('reservation.show', Auth::user()->id);
    }

    public function index(){
        try {
            $reservations = $this->reservationModel->getAllReservation();
            return view('reservations.index', compact('reservations'));
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function show($id){
        try {
            $reservations = $this->reservationModel->getByUser($id);
            return view('reservations.index', compact('reservations'));
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }

    public function delete($id){
        try {
            $userId = $this->reservationModel->deleteReservation($id);
            return redirect()->route('reservation.show',$userId);
        } catch (\Exception $e) {
            return view('error', compact('e'));
        }
    }
}
