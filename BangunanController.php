<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bangunan;

class BangunanController extends Controller
{
    public function index()
    {
        $bangunan = Bangunan::orderBy('id', 'desc')->get();

        return view('bangunan.index', compact('bangunan'));
    }

    public function create()
    {
        return view('bangunan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'luas_kamar' => 'required|numeric|min:0',
            'jenis_kamar' => 'required|in:campuran,putra,putri',
            'is_full' => 'sometimes|boolean',
            'harga' => 'required|integer|min:0',
        ]);

        $validated['is_full'] = $request->boolean('is_full');
        Bangunan::create($validated);

        return redirect()->route('bangunan.index')->with('success', 'Data bangunan berhasil ditambahkan.');
    }

    public function show(Bangunan $bangunan)
    {
        return view('bangunan.show', compact('bangunan'));
    }

    public function edit(Bangunan $bangunan)
    {
        return view('bangunan.edit', compact('bangunan'));
    }

    public function update(Request $request, Bangunan $bangunan)
    {
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'luas_kamar' => 'required|numeric|min:0',
            'jenis_kamar' => 'required|in:campuran,putra,putri',
            'is_full' => 'sometimes|boolean',
            'harga' => 'required|integer|min:0',
        ]);

        $validated['is_full'] = $request->boolean('is_full');
        $bangunan->update($validated);

        return redirect()->route('bangunan.index')->with('success', 'Data bangunan berhasil diupdate.');
    }

    public function destroy(Bangunan $bangunan)
    {
        $bangunan->delete();

        return redirect()->route('bangunan.index')->with('success', 'Data bangunan berhasil dihapus.');
    }
}
