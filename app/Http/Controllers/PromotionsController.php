<?php

namespace App\Http\Controllers;

use App\Models\promotions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =array(
            'list'=>DB::table('promotions')->get()
        );
        return view('Promotions.index',$data);
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
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'from'=>'required',
            'to'=>'required'

        ]);

        $query = DB::table('promotions')->insert([
            'title'=>$request->input('title'),
            'status'=>$request->input('status'),
            'description'=>$request->input('description'),
            'from'=>$request->input('from'),
            'to'=>$request->input('to'),

        ]);
        if($query){
            return back()->with('success','promotions inserted correctly');
        }else{
            return back()->with('fail','something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\promotions  $promotions
     * @return \Illuminate\Http\Response
     */
    public function show(promotions $promotions)
    {
        //
    }
    public function delete($id)
    {
        $delete = DB::table('promotions')
                        ->where('id',$id)
                        ->delete();
        return redirect('indexpro');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\promotions  $promotions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('promotions')
                    ->where('id',$id)
                    ->first();
        $data = [
            'Info'=>$row,
            'Title'=>'Edit'
        ];
        return view('Promotions.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\promotions  $promotions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, promotions $promotions)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'from'=>'required',
            'to'=>'required'

        ]);

        $updating= DB::table('promotions')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'title'=>$request->input('title'),
                        'status'=>$request->input('status'),
                        'description'=>$request->input('description'),
                        'from'=>$request->input('from'),
                        'to'=>$request->input('to')
                    
                    ]);
        return redirect('indexpro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\promotions  $promotions
     * @return \Illuminate\Http\Response
     */
    public function destroy(promotions $promotions)
    {
        //
    }
}
