<?php

namespace App\Http\Controllers;

use App\Models\Peternakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeternakanController extends Controller implements FromCollection, WithHeadings
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kecamatan = $request->query('kecamatan');
        if ($kecamatan) {
            $peternakan = Peternakan::where('kecamatan', $kecamatan)->get();
            return response()->json($peternakan);
        }
        $peternakan = Peternakan::all();
        return response()->json($peternakan);

    }

    public function indexByUser() {
        $user = JWTAuth::parseToken()->authenticate();
        $peternakan = Peternakan::where('kecamatan', $user->kecamatan)->get();
        return response()->json($peternakan);
    }

    public function indexByKecamatan($komoditi) {
        $data = Peternakan::where('komoditi', $komoditi)
        ->select('kecamatan',
        DB::raw('SUM(total) as total_total'),
        DB::raw('SUM(kelahiran) as total_kelahiran'),
        DB::raw('SUM(kematian) as total_kematian'),
        DB::raw('SUM(pemotongan) as total_pemotongan'),
        DB::raw('SUM(ternak_masuk) as total_ternak_masuk'),
        DB::raw('SUM(ternak_keluar) as total_ternak_keluar'),
        DB::raw('SUM(populasi) as total_populasi'),
    )
        ->groupBy('kecamatan')
        ->get();

        return response()->json($data);
    }

    public function indexByYear($year) {
        $data = Peternakan::whereYear('updated_at', $year)
                        ->select('komoditi','kecamatan',
                        DB::raw('SUM(total) as total_total'),
                        DB::raw('SUM(kelahiran) as total_kelahiran'),
                        DB::raw('SUM(kematian) as total_kematian'),
                        DB::raw('SUM(pemotongan) as total_pemotongan'),
                        DB::raw('SUM(ternak_masuk) as total_ternak_masuk'),
                        DB::raw('SUM(ternak_keluar) as total_ternak_keluar'),
                        DB::raw('SUM(populasi) as total_populasi'),
                    )
                        ->groupBy('komoditi', 'kecamatan')
                        ->get();

        return response()->json($data);
    }

    protected $komoditi;

    public function downloadExcel($komoditi) {
        $filename = $komoditi . '_data.xlsx';
        return Excel::download($this, $filename);
    }

    public function collection() {
        return Peternakan::where('komoditi', $this->komoditi)
        ->select('kecamatan',
        DB::raw('SUM(total) as total_total'),
        DB::raw('SUM(kelahiran) as total_kelahiran'),
        DB::raw('SUM(kematian) as total_kematian'),
        DB::raw('SUM(pemotongan) as total_pemotongan'),
        DB::raw('SUM(ternak_masuk) as total_ternak_masuk'),
        DB::raw('SUM(ternak_keluar) as total_ternak_keluar'),
        DB::raw('SUM(populasi) as total_populasi'),
    )
        ->groupBy('kecamatan')
        ->get();
    }

    public function headings(): array {
        return [
            'Kecamatan',
            'Total',
            'Kelahiran',
            'Kematian',
            'Pemotongan',
            'Ternak Masuk',
            'Ternak Keluar',
            'Populasi'
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'komoditi' => 'required|string|max:50',
            'total' => 'required|integer|min:0|between:0,9999999999',
            'kelahiran' => 'required|integer|min:0|between:0,9999999999',
            'kematian' => 'required|integer|min:0|between:0,9999999999',
            'pemotongan' => 'required|integer|min:0|between:0,9999999999',
            'ternak_masuk' => 'required|integer|min:0|between:0,9999999999',
            'ternak_keluar' => 'required|integer|min:0|between:0,9999999999',
            'populasi' => 'required|integer|min:0|between:0,9999999999',
        ]);

        $user = JWTAuth::parseToken()->authenticate();

        $peternakan = new Peternakan();
        $peternakan->id = uniqid();
        $peternakan->user_id = $user->id;
        $peternakan->kecamatan = $user->kecamatan;
        $peternakan->komoditi = $validateData['komoditi'];
        $peternakan->total = $validateData['total'];
        $peternakan->kelahiran = $validateData['kelahiran'];
        $peternakan->kematian = $validateData['kematian'];
        $peternakan->pemotongan = $validateData['pemotongan'];
        $peternakan->ternak_masuk = $validateData['ternak_masuk'];
        $peternakan->ternak_keluar = $validateData['ternak_keluar'];
        $peternakan->populasi = $validateData['populasi'];
        $peternakan->save();

        return response()->json([
            'message' => 'Data peternakan berhasil ditambahkan',
            'perternakan' => $peternakan
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peternakan = Peternakan::find($id);
        if ($peternakan) {
            return response()->json([
                'success' => true,
                'peternakan' => $peternakan
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Peternakan tidak ditemukan'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'komoditi' => 'required|string|max:50',
            'total' => 'required|integer|min:0|between:0,9999999999',
            'kelahiran' => 'required|integer|min:0|between:0,9999999999',
            'kematian' => 'required|integer|min:0|between:0,9999999999',
            'pemotongan' => 'required|integer|min:0|between:0,9999999999',
            'ternak_masuk' => 'required|integer|min:0|between:0,9999999999',
            'ternak_keluar' => 'required|integer|min:0|between:0,9999999999',
            'populasi' => 'required|integer|min:0|between:0,9999999999',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 422);
        }

        $peternakan = Peternakan::findOrFail($id);
        $peternakan->komoditi = $request->input('komoditi');
        $peternakan->total = $request->input('total');
        $peternakan->kelahiran = $request->input('kelahiran');
        $peternakan->kematian = $request->input('kematian');
        $peternakan->pemotongan = $request->input('pemotongan');
        $peternakan->ternak_masuk = $request->input('ternak_masuk');
        $peternakan->ternak_keluar = $request->input('ternak_keluar');
        $peternakan->populasi = $request->input('populasi');
        $peternakan->save();

        return response()->json([
            'message' => 'Data peternakan berhasil diubah',
            'peternakan' => $peternakan
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peternakan = Peternakan::findOrFail($id);
        $peternakan->delete();

        return response()->json([
            'message' => 'Data peternakan berhasil dihapus'
        ]);
    }
}
