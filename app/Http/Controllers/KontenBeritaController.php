<?php

namespace App\Http\Controllers;

use App\Models\KontenBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class KontenBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konten_berita = KontenBerita::all();

        $response = [];

        foreach ($konten_berita as $item) {
            $gambarUrl = asset('storage/Konten Berita/' . $item->gambar);

            $response[] = [
                'id' => $item->id,
                'judul' => $item->judul,
                'sektor' => $item->sektor,
                'kecamatan' => $item->kecamatan,
                'gambar' => $gambarUrl,
                'isi' => $item->isi
            ];
        }

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|string|max:100',
            'sektor' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:100',
            'gambar' => 'required|image|',
            'isi' => 'required|string|max:5000'
        ]);

        $image = $request->file('gambar');
        $gambarPath = $image->getClientOriginalName();
        $image->storeAs('Konten Berita', $gambarPath, 'public');
        $validateData['gambar'] = $gambarPath;

        $user = JWTAuth::parseToken()->authenticate();

        $konten_berita = new KontenBerita($validateData);
        $konten_berita->id = uniqid();
        $konten_berita->user_id = $user->id;
        $konten_berita->save();

        if($konten_berita) {
            return response()->json([
                'success' => true,
                'message' => 'Konten Berita berhasil ditambahkan',
                'konten_berita' => $konten_berita
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data gagal ditambahkan'
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $konten_berita = KontenBerita::find($id);
        $gambarUrl = asset('storage/Konten Berita/' . $konten_berita->gambar);
        $konten_berita->gambar = $gambarUrl;
        if ($konten_berita) {
            return response()->json([
                'success' => true,
                'message' => 'Mengambil data pada id ' . $id,
                'konten_berita' => $konten_berita
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validateData = $request->validate([
        'judul' => 'required|string|max:100',
        'sektor' => 'required|string|max:50',
        'kecamatan' => 'required|string|max:100',
        'gambar' => 'image', // Updated validation rule to allow optional image
        'isi' => 'required|string|max:5000'
    ]);

    $konten_berita = KontenBerita::find($id);

    if (!$konten_berita) {
        return response()->json([
            'success' => false,
            'message' => 'Konten Berita tidak ditemukan'
        ], 404);
    }

    $user = JWTAuth::parseToken()->authenticate();

    // Update the fields
    $konten_berita->judul = $validateData['judul'];
    $konten_berita->sektor = $validateData['sektor'];
    $konten_berita->kecamatan = $validateData['kecamatan'];
    $konten_berita->isi = $validateData['isi'];

    // Handle image update or removal
    if ($request->hasFile('gambar')) {
        $image = $request->file('gambar');
        $gambarPath = $image->getClientOriginalName();
        $image->storeAs('Konten Berita', $gambarPath, 'public');
        $validateData['gambar'] = $gambarPath;

        // Delete the previous image if it exists
        if ($konten_berita->gambar) {
            Storage::disk('public')->delete('Konten Berita/' . $konten_berita->gambar);
        }

        $konten_berita->gambar = $gambarPath;
    } elseif ($request->input('remove_image') == true) {
        // Remove the image if requested
        if ($konten_berita->gambar) {
            Storage::disk('public')->delete('Konten Berita/' . $konten_berita->gambar);
        }

        $konten_berita->gambar = null;
    }
    $konten_berita->save();

    return response()->json([
        'success' => true,
        'message' => 'Konten Berita berhasil diperbarui',
        'konten_berita' => $konten_berita
    ], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kontenBerita = KontenBerita::find($id);

        if (!$kontenBerita) {
            return response()->json([
                'success' => false,
                'message' => 'Konten Berita tidak ditemukan'
            ], 404);
        }

        $imagePath = public_path('storage/Konten Berita/' . $kontenBerita->gambar);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $kontenBerita->delete();

        return response()->json([
            'success' => true,
            'message' => 'Konten Berita berhasil dihapus'
        ], 201);
    }
}
