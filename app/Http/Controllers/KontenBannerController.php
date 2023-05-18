<?php

namespace App\Http\Controllers;

use App\Models\KontenBanner;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class KontenBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konten_banner = KontenBanner::all();

        $response = [];

        foreach ($konten_banner as $item) {
            $bannerUrl = asset('storage/Konten Banner/' . $item->banner);

            $response[] = [
                'id' => $item->id,
                'banner' => $bannerUrl,
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
            'banner' => 'required|image'
        ]);

        $banner = $request->file('banner');
        $bannerPath = $banner->getClientOriginalName();
        $banner->storeAs('Konten Banner', $bannerPath, 'public');
        $validateData['banner'] = $bannerPath;

        $user = JWTAuth::parseToken()->authenticate();

        $konten_banner = new KontenBanner($validateData);
        $konten_banner->id = uniqid();
        $konten_banner->user_id = $user->id;
        $konten_banner->save();

        if($konten_banner) {
            return response()->json([
                'success' => true,
                'message' => 'Konten Banner berhasil ditambahkan',
                'konten_banner' => $konten_banner
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
        $kontenBanner = KontenBanner::find($id);

        if(!$kontenBanner) {
            return response()->json([
                'success' => false,
                'message' => 'Konten Banner tidak ditemukan'
            ], 404);
        }

        $imagePath = public_path('storage/Konten Banner/' . $kontenBanner->banner);

        if(file_exists($imagePath)) {
            unlink($imagePath);
        }

        $kontenBanner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Konten Banner berhasil dihapus'
        ], 201);
    }
}
