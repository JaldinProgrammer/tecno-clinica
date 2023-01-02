<?php

namespace App\Http\Controllers;

use App\Models\keys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeysController extends Controller
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
            'list'=>DB::table('keys')->get()
        );
        return view('Keys.index',$data);
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
            'table_id'=>'required',
            'key'=>'required',
            'status'=>'required'
        ]);

        $query = DB::table('keys')->insert([
            'table_id'=>$request->input('table_id'),
            'key'=>$request->input('key'),
            'status'=>$request->input('status'), 
        ]);
        if($query){
            return back()->with('success','key inserted correctly');
        }else{
            return back()->with('fail','something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function show(keys $keys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('keys')
        ->where('id',$id)
        ->first();
            $data = [
                'Info'=>$row,
                'Title'=>'Edit'
            ];
        return view('Keys.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, keys $keys)
    {
        $request->validate([
            'table_id'=>'required',
            'key'=>'required',
            'status'=>'required'
        ]);
        $updating= DB::table('keys')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'table_id'=>$request->input('table_id'),
                        'key'=>$request->input('key'),
                        'status'=>$request->input('status')
                    
                    ]);
        return redirect('indexkey');
    }

    public function delete($id)
    {
        $delete = DB::table('keys')
                        ->where('id',$id)
                        ->delete();
        return redirect('indexkey');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\keys  $keys
     * @return \Illuminate\Http\Response
     */
    public function destroy(keys $keys)
    {
        //
    }
}
