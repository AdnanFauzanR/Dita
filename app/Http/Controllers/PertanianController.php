<?php

namespace App\Http\Controllers;

use App\Models\Pertanian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PertanianController extends Controller implements FromCollection, WithHeadings
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $kecamatan = $request->query('kecamatan');
    $bidang = $request->query('bidang');

    if ($kecamatan && $bidang) {
        $pertanian = Pertanian::where('kecamatan', $kecamatan)
                              ->where('bidang', $bidang)
                              ->get();
        return response()->json($pertanian);
    } elseif ($kecamatan) {
        $pertanian = Pertanian::where('kecamatan', $kecamatan)->get();
        return response()->json($pertanian);
    } elseif ($bidang) {
        $pertanian = Pertanian::where('bidang', $bidang)->get();
        return response()->json($pertanian);
    }

    $pertanian = Pertanian::all();
    return response()->json($pertanian);
}


    public function indexByUser(Request $request) {
        $bidang = $request->query('bidang');
        $user = JWTAuth::parseToken()->authenticate();
        if ($bidang) {
            $pertanian = Pertanian::where('kecamatan', $user->kecamatan)
                                    ->where('bidang', $bidang)
                                    ->get();
            return response()->json($pertanian);
        }
        $pertanian = Pertanian::where('kecamatan', $user->kecamatan)->get();
        return response()->json($pertanian);
    }

    public function indexByKecamatan($komoditi) {
        $data = Pertanian::where('komoditi', $komoditi)
                            ->select('kecamatan',
                                DB::raw('SUM(luas_lahan) as total_luas_lahan'),
                                DB::raw('SUM(produksi) as total_produksi'),
                                DB::raw('SUM(produktivitas) as total_produktitas')
                            )->groupBy('kecamatan')
                            ->get();
        return response()->json($data);
    }

    public function indexByYear($year) {
        $data = Pertanian::whereYear('updated_at', $year)
                        ->select('komoditi','bidang','kecamatan',
                        DB::raw('SUM(luas_lahan) as total_luas_lahan'),
                        DB::raw('SUM(produksi) as total_produksi'),
                        DB::raw('SUM(produktivitas) as total_produktivitas')
                    )
                        ->groupBy('komoditi', 'bidang', 'kecamatan')
                        ->get();

        return response()->json($data);
    }

    protected $komoditi;

    public function downloadExcel($komoditi) {
        $filename = $komoditi . '_data.xlsx';
        return Excel::download($this, $filename);
    }

    public function collection() {
        return Pertanian::where('komoditi', $this->komoditi)
        ->select('kecamatan',
            DB::raw('SUM(luas_lahan) as total_luas_lahan'),
            DB::raw('SUM(produksi) as total_produksi'),
            DB::raw('SUM(produktivitas) as total_produktitas')
        )->groupBy('kecamatan')
        ->get();
    }

    public function headings():array {
        return [
            'Kecamatan',
            'Luas Lahan',
            'Produksi',
            'Produktivitas'
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'bidang' => 'required|string|max:50',
            'komoditi' => 'required|string|max:50',
            'luas_lahan' => 'required|numeric|between:0,999999999.99',
            'produksi' => 'required|numeric|between:0,999999999.99',
            'produktivitas' => 'required|numeric|between:0,999999999.99'
        ]);

        $user = JWTAuth::parseToken()->authenticate();

        $pertanian = new Pertanian();
        $pertanian->id = uniqid();
        $pertanian->user_id = $user->id;
        $pertanian->kecamatan = $user->kecamatan;
        $pertanian->bidang = $validateData['bidang'];
        $pertanian->komoditi = $validateData['komoditi'];
        $pertanian->luas_lahan = $validateData['luas_lahan'];
        $pertanian->produksi = $validateData['produksi'];
        $pertanian->produktivitas = $validateData['produktivitas'];
        $pertanian->save();

        return response()->json([
            'message' => 'Data pertanian berhasil ditambahkan',
            'pertanian' => $pertanian
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pertanian = Pertanian::find($id);
        if ($pertanian) {
            return response()->json([
                'success' => true,
                'pertanian' => $pertanian
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Pertanian tidak ditemukan'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validator = Validator::make($request->all(), [
        'bidang' => 'required|string|max:50',
        'komoditi' => 'required|string|max:50',
        'luas_lahan' => 'required|numeric|between:0,999999999.99',
        'produksi' => 'required|numeric|between:0,999999999.99',
        'produktivitas' => 'required|numeric|between:0,999999999.99'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => $validator->errors(),
        ], 422);
    }

    $pertanian = Pertanian::findOrFail($id);
    $pertanian->bidang = $request->input('bidang');
    $pertanian->komoditi = $request->input('komoditi');
    $pertanian->luas_lahan = $request->input('luas_lahan');
    $pertanian->produksi = $request->input('produksi');
    $pertanian->produktivitas = $request->input('produktivitas');
    $pertanian->save();

    return response()->json([
        'message' => 'Data pertanian berhasil diubah',
        'pertanian' => $pertanian
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pertanian = Pertanian::findOrFail($id);
        $pertanian->delete();

        return response()->json([
            'message' => 'Data pertanian berhasil dihapus'
        ]);
    }
}
