<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar_cp;
use App\Models\Daftar_bot;
use App\Models\Daftar_ml;

class PendaftaranController extends Controller
{
    function submit_cp(Request $request){
        $Daftar_cp = new Daftar_cp();
        $Daftar_cp->nama_tim = $request->nama_tim;
        $Daftar_cp->anggota_1 = $request->nim_1;
        $Daftar_cp->anggota_2 = $request->nim_2;
        $Daftar_cp->anggota_3 = $request->nim_3;
        $Daftar_cp->bukti_bayar = $request->bukti_bayar;
        $Daftar_cp->save();

        $result = $request -> input();
        if($result){
            // return "nambah orang";
            return "berhasil";
        } else {
            return "error";
        }
    }

    function submit_bot(Request $request){
        $Daftar_bot = new Daftar_bot();
        $Daftar_bot->nama_tim = $request->nama_tim;
        $Daftar_bot->anggota_1 = $request->nisn_1;
        $Daftar_bot->anggota_2 = $request->nisn_2;
        $Daftar_bot->anggota_3 = $request->nisn_3;
        $Daftar_bot->bukti_bayar = $request->bukti_bayar;
        $Daftar_bot->save();

        $result = $request -> input();
        if($result){
            // return "nambah orang";
            return "berhasil";
        } else {
            return "error";
        }
    }

    function submit_ml(Request $request){
        $Daftar_ml = new Daftar_ml();
        $Daftar_ml->nama_tim = $request->nama_tim;
        $Daftar_ml->anggota_1 = $request->email_1;
        $Daftar_ml->anggota_2 = $request->email_2;
        $Daftar_ml->anggota_3 = $request->email_3;
        $Daftar_ml->anggota_4 = $request->email_4;
        $Daftar_ml->anggota_5 = $request->email_5;
        $Daftar_ml->bukti_bayar = $request->bukti_bayar;
        $Daftar_ml->save();

        $result = $request -> input();
        if($result){
            // return "nambah orang";
            return "berhasil";
        } else {
            return "error";
        }
    }
}
