<?php

namespace App\Http\Controllers;

use App\Models\doctor_specialities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorSpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =array(
            'list'=>DB::table('doctor_specialities')->get()
        );
        return view('DoctorSpecialities.index',$data);
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
        $request->validate([
            'user_id'=>'required',
            'speciality_id'=>'required',
            'status'=>'required'
        ]);

        $query = DB::table('doctor_specialities')->insert([
            'user_id'=>$request->input('user_id'),
            'speciality_id'=>$request->input('speciality_id'),
            'status'=>$request->input('status'), 
        ]);
        if($query){
            return back()->with('success','Doctor speciality inserted correctly');
        }else{
            return back()->with('fail','something went wrong');
        }
    }
    public function delete($id)
    {
        $delete = DB::table('doctor_specialities')
                        ->where('id',$id)
                        ->delete();
        return redirect('indexdoc');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\doctor_specialities  $doctor_specialities
     * @return \Illuminate\Http\Response
     */
    public function show(doctor_specialities $doctor_specialities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctor_specialities  $doctor_specialities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('doctor_specialities')
                    ->where('id',$id)
                    ->first();
        $data = [
            'Info'=>$row,
            'Title'=>'Edit'
        ];
        return view('DoctorSpecialities.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doctor_specialities  $doctor_specialities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctor_specialities $doctor_specialities)
    {
        $request->validate([
            'user_id'=>'required',
            'speciality_id'=>'required',
            'status'=>'required'
        ]);
        $updating= DB::table('doctor_specialities')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'user_id'=>$request->input('user_id'),
                        'speciality_id'=>$request->input('speciality_id'),
                        'status'=>$request->input('status')
                    
                    ]);
        return redirect('indexdoc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctor_specialities  $doctor_specialities
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctor_specialities $doctor_specialities)
    {
        //
    }
}
