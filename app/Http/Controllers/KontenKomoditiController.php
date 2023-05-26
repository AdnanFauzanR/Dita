<?php

namespace App\Http\Controllers;

use App\Models\KontenKomoditi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class KontenKomoditiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sektor = $request->query('sektor');
        $konten_komoditi = [];

        if ($sektor) {
            $konten_komoditi = KontenKomoditi::where('sektor', $sektor)->get();
        } else {
            $konten_komoditi = KontenKomoditi::all();
        }
        
        $response = [];

        foreach ($konten_komoditi as $item) {
            $gambarUrl = asset('storage/Konten Komoditi/' . $item->gambar);

            $response[] = [
                'id' => $item->id,
                'judul' => $item->judul,
                'sektor' => $item->sektor,
                'gambar' => $gambarUrl,
                'isi' => $item->isi,
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
            'gambar' => 'image',
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
            ], 201);
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
        $konten_komoditi = KontenKomoditi::find($id);
        if ($konten_komoditi) {
            $gambarUrl = asset('storage/Konten Komoditi/' . $konten_komoditi->gambar);
            $konten_komoditi->gambar = $gambarUrl;
            return response()->json([
                'success' => true,
                'message' => 'Mengambil data pada id ' . $id,
                'konten_komoditi' => $konten_komoditi
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan',
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'judul' => 'required|string|max:100',
            'sektor' => 'required|string|max:50',
            'gambar' => 'image',
            'isi' => 'required|string|max:5000'
        ]);

        $konten_komoditi = KontenKomoditi::find($id);

        if(!$konten_komoditi) {
            return response()->json([
                'success'=> false,
                'message' => 'Konten Komoditi tidak ditemukan'
            ], 404);
        }

        $konten_komoditi->judul = $validateData['judul'];
        $konten_komoditi->sektor = $validateData['sektor'];
        $konten_komoditi->isi = $validateData['isi'];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $gambarPath = $image->getClientOriginalName();
            $image->storeAs('Konten Komoditi', $gambarPath);
            $validateData['gambar'] = $gambarPath;

            if ($konten_komoditi->gambar) {
                Storage::disk('public')->delete('Konten Komoditi/' . $konten_komoditi->gambar);
            }

            $konten_komoditi->gambar = $gambarPath;
        } elseif ($request->input('remove_image') == true) {
            if ($konten_komoditi->gambar) {
                Storage::disk('public')->delete('Konten Komoditi/' . $konten_komoditi->gambar);
            }

            $konten_komoditi->gambar = null;
        }

        $konten_komoditi->save();

        return response()->json([
            'success' => true,
            'message' => 'Konten Berita berhasil diperbarui',
            'konten_komoditi' => $konten_komoditi,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konten_komoditi = KontenKomoditi::find($id);

        if (!$konten_komoditi) {
            return response()->json([
                'success' => false,
                'message' => 'Konten Berita tidak ditemukan'
            ], 404);
        }

        $imagePath = public_path('storage/Konten Komoditi/' . $konten_komoditi->gambar);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $konten_komoditi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Konten Komoditi berhasil dihapus'
        ], 201);
    }
}
