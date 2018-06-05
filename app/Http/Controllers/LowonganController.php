<?php

namespace App\Http\Controllers;

use App\Perusahaan;
use Illuminate\Http\Request;
use App\Lowongan;
use Session;
class LowonganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
          $l = Lowongan::with('Perusahaan')->get();
        return view('lowongan.index',compact('l'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p = Perusahaan::all();
        
        return view('lowongan.create',compact('p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_low' => 'required|',
            'tgl_mulai' => 'required|',
            'lokasi' => 'required|',
            'gaji' => 'required|',
            'deskripsi_iklan' => 'required|',
            'pers_id' => 'required'
        ]);
        $l = new Lowongan;
        $l->nama_low = $request->nama_low;
        $l->tgl_mulai = $request->tgl_mulai;
        $l->lokasi = $request->lokasi;
        $l->gaji = $request->gaji;
        $l->deskripsi_iklan = $request->deskripsi_iklan;
        $l->pers_id = $request->pers_id;
        $l->save();
        // attach fungsinya untuk melampirkan data,yang dilampirkan disini ialah data dari method Pesanan
        //  yang ada di model pengantin
        
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$l->nama_low</b>"
        ]);
        return redirect()->route('lowongan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $l = Lowongan::findOrFail($id);
        return view('lowongan.show',compact('l'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $l = Lowongan::findOrFail($id);
        $p = Perusahaan::all();
        $selectedo = Lowongan::findOrFail($id)->pers_id;
        
        
        // dd($selected);
        return view('lowongan.edit',compact('l','p','selectedo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_low' => 'required|',
            'tgl_mulai' => 'required|',
            'lokasi' => 'required|',
            'gaji' => 'required|',
            'deskripsi_iklan' => 'required|',
            'pers_id' => 'required'
        ]);
        $l = Lowongan::findOrFail($id);
        $l->nama_low = $request->nama_low;
        $l->tgl_mulai = $request->tgl_mulai;
        $l->lokasi = $request->lokasi;
        $l->gaji = $request->gaji;
        $l->deskripsi_iklan = $request->deskripsi_iklan;
        $l->pers_id = $request->pers_id;
        $l->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$l->nama_low</b>"
        ]);
        return redirect()->route('lowongan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = Lowongan::findOrFail($id);
        $l->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('lowongan.index');
    }
}
