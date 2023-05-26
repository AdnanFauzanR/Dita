<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kecamatan' => 'Ajangale'],
            ['kecamatan' => 'Amali'],
            ['kecamatan' => 'Awangpone'],
            ['kecamatan' => 'Barebbo'],
            ['kecamatan' => 'Bengo'],
            ['kecamatan' => 'Bontocani'],
            ['kecamatan' => 'Cenrana'],
            ['kecamatan' => 'Cina'],
            ['kecamatan' => 'Dua Boccoe'],
            ['kecamatan' => 'Kahu'],
            ['kecamatan' => 'Kajuara'],
            ['kecamatan' => 'Lamuru'],
            ['kecamatan' => 'Lapparija'],
            ['kecamatan' => 'Libureng'],
            ['kecamatan' => 'Mare'],
            ['kecamatan' => 'Palakka'],
            ['kecamatan' => 'Patimpeng'],
            ['kecamatan' => 'Ponre'],
            ['kecamatan' => 'Salomekko'],
            ['kecamatan' => 'Sibulue'],
            ['kecamatan' => 'Tanete Riattang'],
            ['kecamatan' => 'Tanete Riattang Barat'],
            ['kecamatan' => 'Tanete Riattang Timur'],
            ['kecamatan' => 'Tellu Limpoe'],
            ['kecamatan' => 'Tellu Siattinge'],
            ['kecamatan' => 'Tonra'],
            ['kecamatan' => 'Ulaweng'],
        ];

        foreach ($data as $value) {
            Kecamatan::insert([
                'kecamatan' => $value['kecamatan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
