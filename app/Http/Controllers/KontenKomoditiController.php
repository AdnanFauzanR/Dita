<?php

namespace App\Http\Controllers;

use App\Models\KontenKomoditi;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class KontenKomoditiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konten_komoditi = KontenKomoditi::all();
        return response()->json($konten_komoditi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|string|max:100',
            'sektor' => 'required|string|max:50',
            'gambar' => 'required|image|max:4096',
            'isi' => 'required|string|max:5000'
        ]);

        $image = $request->file('gambar');
        $gambarPath = $image->getClientOriginalName();
        $image->storeAs('Konten Komoditi', $gambarPath, 'public');
        $validateData['gambar'] = $gambarPath;

        $user = JWTAuth::parseToken()->authenticate();

        $konten_komoditi = new KontenKomoditi($validateData);
        $konten_komoditi->id = uniqid();
        $konten_komoditi->user_id = $user->id;
        $konten_komoditi->save();

        if($konten_komoditi) {
            return response()->json([
                'success' => true,
                'message' => 'Konten Komoditi berhasil ditambahkan',
                'konten_komoditi' => $konten_komoditi
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Gagal ditambahkan'
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
