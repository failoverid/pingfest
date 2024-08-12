<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
                'status' => 'success',
                'message' => 'Selamat menikmati acara seminar!',
                'name' => $user->name
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan!'
            ]);
        }
    }
}
