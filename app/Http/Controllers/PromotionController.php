<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    private Promotion $promotionModel;
    public function __construct( Promotion $entityPromotion)
    {
        $this->promotionModel = $entityPromotion;
    }

    public function create(){
        return view('promotions.create');
    }

    public function store(Request $request){
        // dd($request);
        $this->promotionModel->store($request);
        return redirect()->route('promotion.show');
    }

    public function index(){
        $promotions = $this->promotionModel->getAll();
        return view('promotions.index', compact('promotions'));
    }

    // public function show($id){
    //     $diseases = $this->diseaseModel->getdiseasebyid($id);
    //     return view('diseases.index', compact('diseases'));
    // }
    public function show(){
        $promotions = $this->promotionModel->getAll();
        return view('promotions.index', compact('promotions'));
    }

    public function delete($id){
        $promotionsId = $this->promotionModel->deletePromotion($id);
        return redirect()->route('promotion.show');
    }
}
