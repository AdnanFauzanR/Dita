<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'username' => 'adnanadnan',
                'name' => 'Adnan',
                'kecamatan' => 'Bengo',
                'role_id' => 1,
                'password' => 'abcdf12345'
            ],
        ];

        foreach ($data as $value) {
            User::insert([
                'username' => $value['username'],
                'name' => $value['name'],
                'kecamatan' => $value['kecamatan'],
                'role_id' => $value['role_id'],
                'password' => Hash::make($value['password']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
