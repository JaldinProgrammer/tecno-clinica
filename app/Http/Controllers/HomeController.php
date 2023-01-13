<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private User $userModel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $userEntity)
    {
        $this->userModel = $userEntity;
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
        return view('reports.1');
    }

}
