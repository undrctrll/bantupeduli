<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Orphanage;
use Illuminate\Http\Request;
use App\Models\Donation;

class HomeController extends Controller
{
    public function index()
    {
        return view('static.home', [
            'posts' => Post::latest()->take(3)->get(),
            'orphanages' => Orphanage::latest()->take(3)->get(),
            'donations' => Donation::latest()->take(6)->get(), // ← Tambahkan ini
        ]);
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function home()
    {
        $posts = \App\Models\Post::with(['orphanage', 'donations'])->latest()->take(6)->get();
        foreach ($posts as $post) {
            $post->total_donasi = $post->donations->sum('jumlah');
            $post->daysLeft = $post->batas_waktu ? \Carbon\Carbon::now()->diffInDays($post->batas_waktu, false) : null;
        }
        $stat = [
            'total_donasi' => \App\Models\Donation::sum('jumlah'),
            'total_transaksi' => \App\Models\Donation::count(),
            'total_user' => \App\Models\User::count(),
            'total_campaign' => \App\Models\Post::count(),
        ];
        return view('static.home', compact('posts', 'stat'));
    }
}
