<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SemnasPaymentController extends Controller
{
    public function showForm()
    {
        return view('semnas-payment-form');
    }

    public function uploadPayment(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        $user = Auth::user();
        $path = $request->file('payment_proof')->store('payments');
        $user->PaymentSemnas = $path;
        $user->registeredSemnas = true;

        // Generate QR Code as PNG
        $qrCode = QrCode::format('svg')->size(200)->generate($user->email);
        $qrCodePath = 'qrcodes/' . $user->id . '.svg';
        Storage::put($qrCodePath, $qrCode);
        $user->QRSemnas = $qrCodePath;

        $user->save();

        return redirect()->route('semnas.payment.form')->with('success', 'Payment uploaded and QR code generated!');
    }
}
