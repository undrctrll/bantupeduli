<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index() {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }
    public function create() {
        return view('admin.posts.create');
    }
    public function store(Request $request) {
        try {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'orphanage_id' => 'required|exists:orphanages,id',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'target' => 'required|integer|min:1000',
                'batas_waktu' => 'required|date',
            ]);
            $user = auth()->user();
            $slug = Str::slug($request->title) . '-' . uniqid();
            $imagePath = $request->file('image')->store('post-images', 'public');
            $post = Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'orphanage_id' => $request->orphanage_id,
                'user_id' => $user->id,
                'image' => $imagePath,
                'target' => $request->target,
                'batas_waktu' => $request->batas_waktu,
            ]);
            \Log::info('Post created', ['post' => $post]);
            return redirect()->route('admin.posts.index')->with('success', 'Postingan berhasil ditambahkan!');
        } catch (\Exception $e) {
            \Log::error('Gagal simpan postingan: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal simpan postingan: ' . $e->getMessage()])->withInput();
        }
    }
    public function edit(Post $post) {
        return view('admin.posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'orphanage_id' => 'required|exists:orphanages,id',
        ]);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'orphanage_id' => $request->orphanage_id,
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Postingan berhasil diupdate!');
    }
    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Postingan berhasil dihapus!');
    }
} 