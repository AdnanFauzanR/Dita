<?php

namespace App\Http\Controllers;

use App\Models\Pariwisata;
use App\Models\Perikanan;
use App\Models\Perindustrian;
use App\Models\Pertanian;
use App\Models\Peternakan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanController extends Controller implements FromCollection, WithHeadings
{
    public function downloadPDF($sektor, $year)
    {
        switch ($sektor){
            case 'Peternakan':
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

                $pdf = PDF::loadView('peternakan.pdf', ['data' => $data, 'year' => $year]);

                $fileName = 'peternakan_data_' . $year . '.pdf';
                return $pdf->download($fileName);

            case 'Pertanian':
                $data = Pertanian::whereYear('updated_at', $year)
                        ->select('komoditi','bidang','kecamatan',
                        DB::raw('SUM(luas_lahan) as total_luas_lahan'),
                        DB::raw('SUM(produksi) as total_produksi'),
                        DB::raw('SUM(produktivitas) as total_produktivitas')
                    )
                        ->groupBy('komoditi', 'bidang', 'kecamatan')
                        ->get();

                $pdf = PDF::loadView('pertanian.pdf', ['data' => $data, 'year' => $year]);

                $fileName = 'pertanian_data_' . $year . '.pdf';
                return $pdf->download($fileName);

            case 'Perikanan':
                $data = Perikanan::whereYear('updated_at', $year)
                        ->select('komoditi','kecamatan',
                        DB::raw('SUM(volume) as total_volume'),
                        DB::raw('SUM(nilai_produksi) as total_nilai_produksi')
                    )
                        ->groupBy('komoditi', 'kecamatan')
                        ->get();

                $pdf = PDF::loadView('perikanan.pdf', ['data' => $data, 'year' => $year]);

                $fileName = 'perikanan_data_' . $year . '.pdf';
                return $pdf->download($fileName);

            case 'Perindustrian':
                $data = Perindustrian::whereYear('updated_at', $year)
                        ->select('komoditi','kecamatan',
                        DB::raw('SUM(potensi_kandungan) as total_potensi_kandungan'),
                    )
                        ->groupBy('komoditi', 'kecamatan')
                        ->get();

                $pdf = PDF::loadView('perindustrian.pdf', ['data' => $data, 'year' => $year]);

                $fileName = 'perindustrian_data_' . $year . '.pdf';
                return $pdf->download($fileName);

            case 'Pariwisata':
                $data = Pariwisata::whereYear('updated_at', $year)
                        ->select('nama_wisata', 'jenis_wisata', 'kecamatan', 'desa',
                        DB::raw('SUM(wisatawan) as total_wisatawan'),
                    )
                        ->groupBy('nama_wisata', 'jenis_wisata','kecamatan', 'desa')
                        ->get();

                $pdf = PDF::loadView('pariwisata.pdf', ['data' => $data, 'year' => $year]);

                $fileName = 'pariwisata_data_' . $year . '.pdf';
                return $pdf->download($fileName);

            default:
                return response()->json([
                    'message' => 'Sektor tidak ditemukan'
                ], 404);
        }
    }

    protected $year;
    protected $sektor;
    public function downloadExcel($sektor, $year)
    {
        $this->year = $year;
        $this->sektor = $sektor;

        switch($this->sektor){
            case 'Pertanian':
                $fileName = 'pertanian_data_' . $year . '.xlsx';
                return Excel::download($this, $fileName);
            case 'Peternakan':
                $fileName = 'peternakan_data_' . $year . '.xlsx';
                return Excel::download($this, $fileName);
            case 'Perikanan':
                $fileName = 'perikanan_data_' . $year . '.xlsx';
                return Excel::download($this, $fileName);
            case 'Perindustrian':
                $fileName = 'perindustrian_data_' . $year . '.xlsx';
                return Excel::download($this, $fileName);
            case 'Pariwisata':
                $fileName = 'pariwisata_data_' . $year . '.xlsx';
                return Excel::download($this, $fileName);
            default:
                return response()->json([
                    'message' => 'Sektor tidak ditemukan'
                ]);
        }


    }

    public function collection()
    {
        switch($this->sektor){
            case 'Pertanian':
                return Pertanian::whereYear('updated_at', $this->year)
                        ->select('komoditi', 'bidang', 'kecamatan',
                        DB::raw('SUM(luas_lahan) as total_luas_lahan'),
                        DB::raw('SUM(produksi) as total_produksi'),
                        DB::raw('SUM(produktivitas) as total_produktivitas')
                    )
                        ->groupBy('komoditi', 'bidang', 'kecamatan')
                        ->get();
            case 'Peternakan':
                return Peternakan::whereYear('updated_at', $this->year)
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
            case 'Perikanan':
                return Perikanan::whereYear('updated_at', $this->year)
                    ->select('komoditi','kecamatan',
                    DB::raw('SUM(volume) as total_volume'),
                    DB::raw('SUM(nilai_produksi) as total_nilai_produksi')
                )
                    ->groupBy('komoditi', 'kecamatan')
                    ->get();
            case 'Perindustrian':
                return Perindustrian::whereYear('updated_at', $this->year)
                    ->select('komoditi','kecamatan',
                    DB::raw('SUM(potensi_kandungan) as total_potensi_kandungan'),
                )
                    ->groupBy('komoditi', 'kecamatan')
                    ->get();
            case 'Pariwisata':
                return Pariwisata::whereYear('updated_at', $this->year)
                        ->select('nama_wisata', 'jenis_wisata', 'kecamatan', 'desa',
                        DB::raw('SUM(wisatawan) as total_wisatawan'),
                    )
                        ->groupBy('nama_wisata', 'jenis_wisata','kecamatan', 'desa')
                        ->get();
        }

    }

    public function headings(): array
    {
        $column_name = [];
        switch($this->sektor){

            case 'Pertanian':
                $column_name = [
                    'Komoditi',
                    'Bidang',
                    'Kecamatan',
                    'Luas Lahan',
                    'Produksi',
                    'Produktivitas',
                ];
                break;
            case 'Peternakan':
                $column_name = [
                    'Komoditi',
                    'Kecamatan',
                    'Total',
                    'Kelahiran',
                    'kematian',
                    'Pemotongan',
                    'Ternak Masuk',
                    'Ternak Keluar',
                    'Populasi',
                ];
                break;
            case 'Perikanan':
                $column_name = [
                    'Komoditi',
                    'Kecamatan',
                    'Volume',
                    'Nilai Produksi',
                ];
                break;
            case 'Perindustrian':
                $column_name = [
                    'Komoditi',
                    'Kecamatan',
                    'Potensi Kandungan',
                ];
                break;
            case 'Pariwisata':
                $column_name = [
                    'Nama Wisata',
                    'Jenis Wisata',
                    'Kecamatan',
                    'Desa',
                    'Wisatawan',
                ];
                break;

        }

        return $column_name;
    }
}
