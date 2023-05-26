<?php

namespace App\Http\Controllers;

use App\Models\Komoditi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class KomoditiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $komoditi = Komoditi::all();
        return response()->json($komoditi);
    }

    public function indexParticular(Request $request) {
        $sektor = $request->query('sektor');
        $bidang = $request->query('bidang');
        $kecamatan = $request->query('kecamatan');
        $komoditi = [];

        if ($sektor && $bidang && $kecamatan) {
            $komoditi = Komoditi::where('sektor', $sektor)
                                ->where('bidang', $bidang)
                                ->where('kecamatan', $kecamatan)
                                ->get();
        } elseif ($sektor && $bidang) {
            $komoditi = Komoditi::where('sektor', $sektor)
                                ->where('bidang', $bidang)
                                ->get();
        } elseif($sektor) {
            $komoditi = Komoditi::where('sektor', $sektor)->get();
        } elseif($bidang){
            $komoditi = Komoditi::where('bidang', $bidang)->get();
        }

        return response()->json($komoditi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100|unique:komoditi',
            'sektor' => 'required|string|max:50',
            'bidang' => 'max:25',
            'kecamatan' => 'max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 422);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $komoditi = new Komoditi();
        $komoditi->id = uniqid();
        $komoditi->user_id = $user->id;
        $komoditi->sektor = $request->input('sektor');
        $komoditi->nama = $request->input('nama');
        $komoditi->bidang = $request->input('bidang');
        $komoditi->kecamatan = $request->input('kecamatan');
        $komoditi->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Komoditi berhasil ditambahkan',
            'komoditi' => $komoditi
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $komoditi = Komoditi::find($id);
        if($komoditi) {
            return response()->json([
                'success' => true,
                'komoditi' => $komoditi
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Komoditi tidak ditemukan'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'sektor' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 422);
        }

        $komoditi = Komoditi::find($id);
        $komoditi->sektor = $request->input('sektor');
        $komoditi->nama = $request->input('nama');
        $komoditi->bidang = $request->input('bidang');
        $komoditi->save();

        return response()->json([
            'success' => 'Data Komoditi berhasil diubah',
            'komoditi' => $komoditi
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komoditi = Komoditi::findOrFail($id);
        $komoditi->delete();

        return response()->json([
            'message' => 'Data Komoditi berhasil dihapus'
        ]);
    }
}
