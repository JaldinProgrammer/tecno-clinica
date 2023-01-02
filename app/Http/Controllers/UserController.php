<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private User $userModel;

    public function __construct(User $entity)
    {
        $this->userModel = $entity;
    }

    public function index(){
        $users = $this->userModel->getAll();
        return view('users.index', compact('users'));
    }

}
