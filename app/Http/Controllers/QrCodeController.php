<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class QrCodeController extends Controller
{
    public function scan()
    {
        return view('scan');
    }

    public function processScan(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            return response()->json([
                'message' => "Silahkan Masuk dan menikmati Acara Seminar!",
                'name' => $user->name
            ]);
        } else {
            return response()->json([
                'message' => "Data Tidak Ditemukan!"
            ]);
        }
    }
}
