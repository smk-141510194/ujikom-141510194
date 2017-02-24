<?php

namespace App\Http\Controllers;

use Request;
use App\Article;
use Carbon\Carbon;
use App\Jabatan;
use Validator;
class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('Admin');
    }
    public function index()
    {
        //kategori
        $Jabatan = Jabatan::all();
        return view('Jabatan.index',compact('Jabatan'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('Jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {
        
        $Kode_Jabatan = Validator::make($request->all(), [
        'title' => 'required|unique|max:255',
        'body' => 'required',
    ]);

    if ($Kode_Jabatan->fails())
    {
        return redirect()->back()->withErrors($Kode_Jabatan->errors());
    }




        $Jabatan=Request::all();
        Jabatan::create($Jabatan);
        return redirect('Jabatan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Jabatan=Jabatan::find($id);
        return view('Jabatan.edit',compact('Jabatan'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $JabatanUpdate=Request::all();
        $Jabatan=Jabatan::find($id);
        $Jabatan->update($JabatanUpdate);
        return redirect('Jabatan'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Jabatan::find($id)->delete();
        return redirect('Jabatan');
    }
}
