<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orphanage;

class OrphanageController extends Controller
{
    public function index() {
        $orphanages = Orphanage::latest()->paginate(10);
        return view('admin.orphanages.index', compact('orphanages'));
    }
    public function create() {
        return view('admin.orphanages.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:orphanages,slug',
            'address' => 'required',
            'created_by' => 'required|exists:users,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['logo'] = $request->file('photo')->store('orphanage-logos', 'public');
        }
        Orphanage::create($data);
        return redirect()->route('admin.orphanages.index')->with('success', 'Panti asuhan berhasil ditambahkan!');
    }
    public function edit(Orphanage $orphanage) {
        return view('admin.orphanages.edit', compact('orphanage'));
    }
    public function update(Request $request, Orphanage $orphanage) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:orphanages,slug,' . $orphanage->id,
            'address' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['logo'] = $request->file('photo')->store('orphanage-logos', 'public');
        }
        $orphanage->update($data);
        return redirect()->route('admin.orphanages.index')->with('success', 'Panti asuhan berhasil diupdate!');
    }
    public function destroy(Orphanage $orphanage) {
        $orphanage->delete();
        return redirect()->route('admin.orphanages.index')->with('success', 'Panti asuhan berhasil dihapus!');
    }
    public function show(Orphanage $orphanage) {
        return view('admin.orphanages.show', compact('orphanage'));
    }
}

