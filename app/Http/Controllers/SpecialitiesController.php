<?php

namespace App\Http\Controllers;

use App\Models\specialities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Specialities.inputspecialities');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request->input();
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);

        $query = DB::table('specialities')->insert([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'), 
        ]);
        if($query){
            return back()->with('success','speciality inserted correctly');
        }else{
            return back()->with('fail','something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function show(specialities $specialities)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function edit(specialities $specialities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, specialities $specialities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialities $specialities)
    {
        //
    }
}
