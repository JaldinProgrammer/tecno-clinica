<?php

namespace App\Http\Controllers;

use App\Models\diseases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DiseasesController extends Controller
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
            'list'=>DB::table('diseases')->get()
        );
        return view('Diseases.index',$data);
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
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);

        $query = DB::table('diseases')->insert([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'), 
        ]);
        if($query){
            return back()->with('success','disease inserted correctly');
        }else{
            return back()->with('fail','something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diseases  $diseases
     * @return \Illuminate\Http\Response
     */
    public function show(diseases $diseases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diseases  $diseases
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('diseases')
        ->where('id',$id)
        ->first();
            $data = [
                'Info'=>$row,
                'Title'=>'Edit'
            ];
        return view('Diseases.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diseases  $diseases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diseases $diseases)
    {
       
            $request->validate([
                'name'=>'required',
                'status'=>'required'
            ]);
            $updating= DB::table('diseases')
                        ->where('id', $request->input('cid'))
                        ->update([
                            'name'=>$request->input('name'),
                            'status'=>$request->input('status')
                        
                        ]);
            return redirect('indexdis');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diseases  $diseases
     * @return \Illuminate\Http\Response
     */
    public function destroy(diseases $diseases)
    {
        //
    }
    public function delete($id)
    {
        $delete = DB::table('diseases')
                        ->where('id',$id)
                        ->delete();
        return redirect('indexdis');
    }
}
