<?php

namespace App\Http\Controllers;

use App\Organizer;
use Illuminate\Http\Request;
use Session;
class OrganizerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $a = Organizer::all();
        return view('organizer.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lamaran.create');
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
            'file_cv' => 'required|',
            'status' => 'required|',
            'user_id' => 'required|',
            'low_id' => 'required|'
        ]);
        $lam = new Lamaran;
        $lam->file_cv = $request->file_cv;
        $lam->status = $request->status;
        $lam->user_id = $request->user_id;
        $lam->low_id = $request->low_id;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$lam->file_cv</b>"
        ]);
        return redirect()->route('lamaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lam = Lamaran::findOrFail($id);
        return view('lamaran.show',compact('lam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lam = Lamaran::findOrFail($id);
        return view('lamaram.edit',compact('lam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'file_cv' => 'required|',
            'status' => 'required|',
            'user_id' => 'required|',
            'low_id' => 'required|'
        ]);
        $lam = Organizer::findOrFail($id);
        $lam->file_cv = $request->file_cv;
        $lam->status = $request->status;
        $lam->user_id = $request->user_id;
        $lam->low_id = $request->low_id;
        $lam->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$lam->file_cv</b>"
        ]);
        return redirect()->route('lamaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $lam = Lamaran::findOrFail($id);
        $lam->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('lamaran.index');
    }
}
