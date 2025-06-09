<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function sendOtp(Request $request)
    {
        $user = auth()->user();
        $otp = rand(100000, 999999);

        UserOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(5),
        ]);

        // Kirim OTP via WhatsApp atau SMS API
        // Contoh:
        // Http::post('https://api.whatsapp.com/send', [...]);

        return back()->with('success', 'Kode OTP telah dikirim ke WhatsApp Anda.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required']);

        $user = auth()->user();

        $otpRecord = UserOtp::where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>=', now())
            ->first();

        if ($otpRecord) {
            $user->update(['no_hp_verified' => true]);
            $otpRecord->delete();
            return back()->with('success', 'Nomor HP berhasil diverifikasi.');
        }

        return back()->withErrors(['otp' => 'OTP tidak valid atau sudah kedaluwarsa.']);
    }

    public function sendOtpApi(Request $request)
    {
        $user = $request->user();
        $otp = rand(100000, 999999);

        \App\Models\UserOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(5),
        ]);

        // Kirim OTP via WhatsApp/SMS API di sini jika ada
        // Contoh: Http::post('https://api.whatsapp.com/send', [...]);

        return response()->json(['message' => 'Kode OTP telah dikirim ke nomor Anda.']);
    }

    public function verifyOtpApi(Request $request)
    {
        $request->validate(['otp' => 'required']);
        $user = $request->user();
        $otpRecord = \App\Models\UserOtp::where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>=', now())
            ->first();
        if ($otpRecord) {
            $user->update(['no_hp_verified' => true]);
            $otpRecord->delete();
            return response()->json(['message' => 'Nomor HP berhasil diverifikasi.']);
        }
        return response()->json(['message' => 'OTP tidak valid atau sudah kedaluwarsa.'], 422);
    }

}
