<?php

namespace Database\Seeders;

use App\Models\Komoditi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomoditiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Komoditi::truncate();
        $data = [
            [
                'sektor' => 'Pertanian',
                'nama' => 'Padi',
                'bidang' => 'Tanaman Pangan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Jagung',
                'bidang' => 'Tanaman Pangan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Kedelai',
                'bidang' => 'Tanaman Pangan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Kacang Tanah',
                'bidang' => 'Tanaman Pangan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Kacang Hijau',
                'bidang' => 'Tanaman Pangan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Ubi Kayu',
                'bidang' => 'Tanaman Pangan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Ubi Jalar',
                'bidang' => 'Tanaman Pangan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Bawang Merah',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Cabai Rawit',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Cabai Merah Besar',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Jahe',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Kunyit',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Durian',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Sukun',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Mangga',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Pisang',
                'bidang' => 'Hortikultura',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Kelapa',
                'bidang' => 'Perkebunan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Kakao',
                'bidang' => 'Perkebunan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Kopi',
                'bidang' => 'Perkebunan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Cengkeh',
                'bidang' => 'Perkebunan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Tebu',
                'bidang' => 'Perkebunan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pertanian',
                'nama' => 'Tembakau',
                'bidang' => 'Perkebunan',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Peternakan',
                'nama' => 'Sapi',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Peternakan',
                'nama' => 'Kerbau',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Peternakan',
                'nama' => 'Kuda',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Peternakan',
                'nama' => 'Kambing',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Peternakan',
                'nama' => 'Ayam Buras',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Peternakan',
                'nama' => 'Ayam Ras (Pedaging)',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Peternakan',
                'nama' => 'Ayam Ras (Petelur)',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Peternakan',
                'nama' => 'Itik',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perikanan',
                'nama' => 'Ikan Bandeng',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perikanan',
                'nama' => 'Udang Windu',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perikanan',
                'nama' => 'Rumput Laut',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perikanan',
                'nama' => 'Udang Api-Api',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perikanan',
                'nama' => 'Udang Vannamei',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perikanan',
                'nama' => 'Kepiting Bakau',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perikanan',
                'nama' => 'Ikan Mujair',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perikanan',
                'nama' => 'Ikan Belanak',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perindustrian',
                'nama' => 'Biji Besi',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perindustrian',
                'nama' => 'Besi',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perindustrian',
                'nama' => 'Batu Gapur/Gamping/Marmer',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perindustrian',
                'nama' => 'Kalsit/Batu Bintang',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perindustrian',
                'nama' => 'Granit',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perindustrian',
                'nama' => 'Kaolin',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Perindustrian',
                'nama' => 'Pasir Kuarsa/Pasir Silika',
                'bidang' => '',
                'kecamatan' => ''
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Taman Arung Palakka',
                'bidang' => 'Wisata Panorama',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Lapangan Merdeka Watampone',
                'bidang' => 'Wisata Panorama',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Stadion Lapatau Matanna Tikka Watampone',
                'bidang' => 'Wisata Panorama',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Tanjung Pallette',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Tanete Riattang Timur',
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Gua Mampu',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Dua Boccoe'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Bukit Cempalagi',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Awangpone'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Air Terjun Ere\'',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Bontocani'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Gua Uhalie',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Bontocani'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Bendungan Sanrego',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Kahu'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Toae',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Kajuara'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permandian Waetuwo',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Kajuara'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Bendungan Salomekko',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Salomekko'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Pantai Bone Lampe',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Tonra'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Gua Bala Batu',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Mare'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Pantai Ujung Pattiro',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Sibulue'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Gua Jepang',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Palakka'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permandian Tempe-Tempe',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Cina'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Mata Air Panas Saweng',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Ponre'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Air Terjun Ladenring',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Lamuru'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permandian Alam Aling E',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Ulaweng'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Air Terjun Baruttung E',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Ulaweng'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Sumpang Labbu',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Ulaweng'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permandian Alam Siduppa Matae',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Palakka'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Gua Janci',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Awangpone'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permandian Alam Lanca',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permandian Alam Otting',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permandian Mattanempuga',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Lagole',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Rakkala Manurung',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Uttang Menroja',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Tanete Riattang Barat'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Dermaga Bajoe',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Palakka'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permandian Alam Taretta',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Amali'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Gua Lagaroang',
                'bidang' => 'Wisata Alam',
                'kecamatan' => 'Bengo'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kesenian Tradisional Pantai Ancu Lampu Toae',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Kahu'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Makam Datu Salomekko',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Salomekko'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kerajinan Tangan Annemi/Pita',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Barebbo'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Tugu Malamung Patu',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Lamuru'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Makam Raja-Raja Watang Lamuru',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Lamuru'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Maggiri Sarewara',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Lamuru'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kompleks Makam Petta Ponggawae',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Awangpone'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kerajinan Tangan Songko To\'Bone',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Awangpone'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Bubung Assangireng',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Awangpone'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kerajinan Tangan Pandai Besi',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Awangpone'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Makam Laulio Bote\'e',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Makam Petta Makarame',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Makam Lapatau Matanna Tikka',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permainan Rakyat Sijuju Silo',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tellu Siattinge'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kerajinan Tangan Perak/Kuningan',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Ajangale'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kerajinan Baju Bodo',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Ajangale'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kerajinan Tradisional Tenun Sutra',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Ajangale'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Makam Petta Tadangpalie/Petta Buaja',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Ajangale'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Museum Lapawowoi',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Bola Soba',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kompleks Makam Kalokkoe',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Bukit Manurunge Ri Matajang',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Bubung Tellu',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Tanah Bangkalae',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Masjid Tua',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kompleks Makam Masjid Tua Lalebata',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Makam Laummasa',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang Barat'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Kuburan Petta Bettae',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang Barat'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Sungai Jeppe\'E',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang Barat'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Bubung Paranie',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang Barat'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Makam Manurunge Ri Toro',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang Timur'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Perkampungan Suku Bajo',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang Timur'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Ajjongan',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tanete Riattang Timur'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Permainan Rakyat Sere Wara',
                'bidang' => 'Wisata Budaya',
                'kecamatan' => 'Tellu Limpoe'
            ],
            [
                'sektor' => 'Pariwisata',
                'nama' => 'Sumpang Labbu',
                'bidang' => 'Wisata Panorama',
                'kecamatan' => 'Bengo'
            ],
        ];

        foreach ($data as $value) {
            Komoditi::insert([
                'id' => uniqid(),
                'user_id' => 1,
                'sektor' => $value['sektor'],
                'nama' => $value['nama'],
                'bidang' => $value['bidang'],
                'kecamatan' => $value['kecamatan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
