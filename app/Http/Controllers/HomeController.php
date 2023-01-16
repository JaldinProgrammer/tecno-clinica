<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private User $userModel;
    private Table $tableModel;
    private Reservation $reservationModel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $userEntity, Table $tableEntity, Reservation $reservationEntity)
    {
        $this->userModel = $userEntity;
        $this->tableModel = $tableEntity;
        $this->reservationModel = $reservationEntity;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function unauthorized(){
        return view('unauthorized');
    }

    public function report1(){
        $data = $this->userModel->getUsersQuantity();
        return view('reports.1', compact('data'));
    }

    public function report2(){
        $data = $this->tableModel->keysQuantityPerTable();
        return view('reports.2', compact('data'));
    }

    public function report3(){
        $reservations = $this->reservationModel->getReportOfReservationsByTime();
        $labels = [];
        $data = [];
        foreach ($reservations as $item){
            $labels[] = $item->time;
        }
        foreach ($reservations as $item){
            $data[] = $item->count;
        }

        return view('reports.3', compact('data'), compact('labels'));
    }

    public function report4(){
        return view('reports.4');
    }

    public function report5(){
        return view('reports.5');
    }

}
