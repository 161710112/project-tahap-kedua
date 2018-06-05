<?php

namespace App\Http\Controllers;

use App\Perusahaan;
use Illuminate\Http\Request;
use App\User;
use Session;
class PerusahaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $p = Perusahaan::with('User')->get();
        return view('perusahaan.index',compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $o = User::all();
        return view('perusahaan.create',compact('o'));
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
            'logo' => 'required|',
            'deskripsi' => 'required|',
            'kategori' => 'required|',
            'subkategori' => 'required|',
            'judul' => 'required|',
            'gaji' => 'required|',
            'tgl_mulai' => 'required|',
            'email' => 'required|unique:perusahaans',
            'telepon' => 'required|',
            'user_id' => 'required|'
        ]);
        $p = new Perusahaan;
        $p->logo = $request->logo;
        $p->deskripsi = $request->deskripsi;
        $p->kategori = $request->kategori;
        $p->subkategori = $request->subkategori;
        $p->judul = $request->judul;
        $p->gaji = $request->gaji;
        $p->tgl_mulai = $request->tgl_mulai;
        $p->email = $request->email;
        $p->telepon = $request->telepon;
        $p->user_id = $request->user_id;
        
        $p->save();
        // attach fungsinya untuk melampirkan data,yang dilampirkan disini ialah data dari method Pesanan
        //  yang ada di model pengantin
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$p->logo</b>"
        ]);
        return redirect()->route('perusahaan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $p = Perusahaan::findOrFail($id);
        return view('perusahaan.show',compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\perusahaan  $pengantin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Perusahaan::findOrFail($id);
        $o = User::all();
        $selectedo = Perusahaan::findOrFail($id)->user_id;
        // dd($selected);
        return view('perusahaan.edit',compact('p','o','selectedo'));
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
            'logo' => 'required|',
            'deskripsi' => 'required|',
            'kategori' => 'required|',
            'subkategori' => 'required|',
            'judul' => 'required|',
            'gaji' => 'required|',
            'tgl_mulai' => 'required|',
            'email' => 'required|',
            'telepon' => 'required|',
            'user_id' => 'required|'
        ]);
        $p = Perusahaan::findOrFail($id);
        $p->logo = $request->logo;
        $p->deskripsi = $request->deskripsi;
        $p->kategori = $request->kategori;
        $p->subkategori = $request->subkategori;
        $p->judul = $request->judul;
        $p->gaji = $request->gaji;
        $p->tgl_mulai = $request->tgl_mulai;
        $p->email = $request->email;
        $p->telepon = $request->telepon;
        $p->user_id = $request->user_id;
        $p->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$p->logo</b>"
        ]);
        return redirect()->route('perusahaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Perusahaan::findOrFail($id);
        $p->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('perusahaan.index');
    }
}
