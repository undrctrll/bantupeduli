<?php
namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Midtrans\Config;

class DonationController extends Controller
{
    public function showForm()
    {
        $posts = \App\Models\Post::with(['orphanage', 'donations'])->latest()->get();
        foreach ($posts as $post) {
            $post->total_donasi = $post->donations->sum('jumlah');
            $post->daysLeft = $post->batas_waktu ? \Carbon\Carbon::now()->diffInDays($post->batas_waktu, false) : null;
        }
        return view('donations.form', compact('posts'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:100',
            'email'     => 'required|email',
            'nomor_hp'  => 'required',
            'jumlah'    => 'required|numeric|min:1000',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey    = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized  = config('midtrans.isSanitized');
        Config::$is3ds        = config('midtrans.is3ds');

        // Buat order ID satu kali saja dan konsisten
        $orderId = 'DON-' . strtoupper(Str::random(8));

        $donasi = Donation::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'jumlah' => $request->jumlah,
            'status' => 'pending',
            'order_id' => $orderId,
        ]);

        $params = [
            'transaction_details' => [
                'order_id'      => $orderId, 
                'gross_amount'  => $request->jumlah,
            ],
            'customer_details' => [
                'first_name'    => $request->nama,
                'email'         => $request->email,
                'phone'         => $request->nomor_hp,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('donations.konfirmasi', compact('snapToken', 'donasi'));
    }


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $signature = hash('sha512',
            $request->input('order_id') .
            $request->input('status_code') .
            $request->input('gross_amount') .
            $serverKey
        );

        if ($signature != $request->input('signature_key')) {
            return response()->json(['message' => 'Invalid Signature'], 403);
        }

        $donasi = Donation::where('order_id', $request->input('order_id'))->first();

        if (!$donasi) {
            return response()->json(['message' => 'Donasi tidak ditemukan'], 404);
        }

        // Update status berdasarkan Midtrans
        $donasi->status = $request->input('transaction_status'); // success/pending/failed dll
        $donasi->save();

        return response()->json(['message' => 'Callback diterima'], 200);
    }

    public function thanks()
    {
        return view('donatios.thanks');
    }

    public function index()
    {
        $posts = \App\Models\Post::with(['orphanage', 'donations'])->latest()->get();
        foreach ($posts as $post) {
            $post->total_donasi = $post->donations->sum('jumlah');
            $post->daysLeft = $post->batas_waktu ? \Carbon\Carbon::now()->diffInDays($post->batas_waktu, false) : null;
        }
        return view('donations.form', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'nomor_hp' => 'required|string',
            'jumlah' => 'required|integer|min:1',
        ]);        

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$clientKey = config('midtrans.clientKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $orderId = 'DON-' . strtoupper(\Illuminate\Support\Str::random(8));

        $donasi = Donation::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'nomor_hp'  => $request->nomor_hp,
            'jumlah'    => $request->jumlah,
            'order_id'  => $orderId,
        ]);

        $params = [
            'transaction_details' => [
                'order_id'      => $orderId,
                'gross_amount'  => $request->jumlah,
            ],
            'customer_details'  => [
                'first_name'    => $request->nama,
                'email'         => $request->email,
                'phone'         => $request->nomor_hp,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('donations.konfirmasi', compact('snapToken', 'donasi'));
    }
}