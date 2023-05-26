<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saran = Saran::all();
        return response()->json($saran);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'saran' => 'required|string|max:2000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 422);
        }

        $saran = new Saran();
        $saran->saran = $request->input('saran');
        $saran->save();

        return response()->json([
            'message' => 'Saran berhasil ditambahkan',
            'peternakan' => $saran
        ]);
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
        $saran = Saran::findOrFail($id);
        $saran->delete();

        return response()->json([
            'message' => 'Saran berhasil dihapus'
        ]);
    }
}
