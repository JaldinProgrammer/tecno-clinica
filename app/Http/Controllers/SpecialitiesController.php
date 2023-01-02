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
        $data =array(
            'list'=>DB::table('specialities')->get()
        );
        return view('Specialities.inputspecialities',$data);

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
    public function delete($id)
    {
        $delete = DB::table('specialities')
                        ->where('id',$id)
                        ->delete();
        return redirect('inputspe');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('specialities')
                    ->where('id',$id)
                    ->first();
        $data = [
            'Info'=>$row,
            'Title'=>'Edit'
        ];
        return view('Specialities.edit',$data);
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
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);
        $updating= DB::table('specialities')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'name'=>$request->input('name'),
                        'status'=>$request->input('status')
                    
                    ]);
        return redirect('inputspe');
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
