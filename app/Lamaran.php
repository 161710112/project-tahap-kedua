<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
     protected $fillable = ['file_cv','status','low_id','user_id'];
    public $timestamps = true;

    public function Lowongan(){
        return $this->belongsto('App\Lowongan','low_id');
    }
    public function User(){
        return $this->belongstoMany('App\User','user_id');
    }
}

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