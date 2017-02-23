<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Jabatan;
use App\Golongan;
use App\User;
use App\KategoriLembur;
use Request;
use Validator;
use Html;
use Input;
class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       {
        if (isset($_GET['search'])) {
            $data = Pegawai::where($_GET['field'],'LIKE','%'.$_GET['search'].'%')->with('user','Jabatan','Golongan')->orderBy($_GET['field'])->paginate(100);
            $search = $_GET['search'];
            $field_old = $_GET['field'];
        }
        else if(isset($_GET['sortBy']))
        {
            $data = Pegawai::with('user','Jabatan','Golongan')->orderBy($_GET['sortBy'])->paginate(5);
        }
        else{
            $data = Pegawai::with('user','Jabatan','Golongan')->orderBy('created_at','DESC')->paginate(5);
        }
        $fields = (['nip']);
        // dd($datas);

        return view('Pegawai.index', compact('data','fields','search','field_old'));
    }

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
    }
}
