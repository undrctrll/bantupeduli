<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        // Tambahkan total_donasi ke setiap post
        foreach ($posts as $post) {
            $post->total_donasi = $post->totalDonasi();
        }
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = \App\Models\Post::with(['orphanage', 'user', 'donations'])->where('slug', $slug)->firstOrFail();
        $post->total_donasi = $post->donations->sum('jumlah');
        $comments = [
            ['name' => 'Muhtadi', 'message' => 'Semoga bantuan ini bisa membantu mereka kembali normal, dan Semoga semua janin yg masih dalam kandungan akan terlahir normal', 'date' => '1 bulan yang lalu'],
            ['name' => 'Leady', 'message' => 'Semoga bermanfaat dan lekas kembali tersenyum semua 🤲🏼🙏🏼', 'date' => '5 bulan yang lalu'],
        ];
        $fundraisers = [
            ['name' => 'Galvan Yudistira', 'total' => 430409, 'count' => 6],
        ];
        return view('post.detail', compact('post', 'comments', 'fundraisers'));
    }

    public function donateForm($slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
        return view('campaign.donate', compact('post'));
    }

    public function donateStore($slug, \Illuminate\Http\Request $request)
    {
        $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
        $request->validate([
            'nominal' => 'required|integer|min:10000',
            'sapaan' => 'required',
            'nama' => 'nullable|string|max:100',
            'sembunyikan_nama' => 'nullable|boolean',
            'metode' => 'required',
        ]);
        $nama = $request->sembunyikan_nama ? 'Hamba Allah' : ($request->nama ?: 'Anonim');
        $order_id = 'ORD-' . uniqid();
        $donasi = \App\Models\Donation::create([
            'nama' => $nama,
            'jumlah' => $request->nominal,
            'status' => 'pending',
            'post_id' => $post->id,
            'order_id' => $order_id,
            'metode' => $request->metode,
            'sapaan' => $request->sapaan,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
        ]);
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $request->nominal,
            ],
            'customer_details' => [
                'first_name' => $nama,
                'email' => $request->email,
                'phone' => $request->nomor_hp,
            ],
        ];
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $donasi->snap_token = $snapToken;
        $donasi->save();
        return redirect()->route('campaign.donate.invoice', $donasi->order_id);
    }

    public function donateInvoice($order_id)
    {
        $donasi = \App\Models\Donation::where('order_id', $order_id)->firstOrFail();
        return view('campaign.invoice', compact('donasi'));
    }

    public function donateCheck($order_id)
    {
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        try {
            $status = \Midtrans\Transaction::status($order_id);
            return response()->json(['status' => $status->transaction_status]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

