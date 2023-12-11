<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataPublicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $agency = [
            [
                'name'      =>  "Dinas Komunikasi Dan Informatika",
                'address'   =>  "Sumenep",
            ],
            [
                'name'      =>  "Dinas PUPR",
                'address'   =>  "Sumenep",
            ],
            [
                'name'      =>  "Dinas Peternakan",
                'address'   =>  "Sumenep",
            ],
            [
                'name'      =>  "Dinas Keuangan dan Pendapatan Daerah",
                'address'   =>  "Sumenep",
            ],
            [
                'name'      =>  "Dinas Pertanian",
                'address'   =>  "Sumenep",
            ],
        ];

        foreach ($agency as $instansi) {
            DB::table('agency')->insert($instansi);
        }

        $category = [
            ["name" =>  "pengaduan"],
            ["name" =>  "aspirasi"],
            ["name" =>  "permintaan informasi"],
        ];

        foreach ($category as $kategori) {
            DB::table('category')->insert($kategori);
        }

        $region = [
            ["name" =>  "kecamatan kota sumenep"],
            ["name" =>  "kecamatan batuan"],
            ["name" =>  "kecamatan gapura"],
            ["name" =>  "kecamatan kalianget"],
            ["name" =>  "kecamatan rubaru"],
        ];

        foreach ($region as $wilayah) {
            DB::table('region')->insert($wilayah);
        }

        $users = [
            [
                "nik"           =>  "12345678910123456",
                "username"      =>  "administrator",
                "name"          =>  "administrator",
                "email"         =>  "administrator@gmail.com",
                "phone"         =>  "123",
                "role"          =>  "admin",
                "password"      => Hash::make('password'),
            ],
            [
                "nik"           =>  "123456789101234532",
                "username"      =>  "petugas",
                "name"          =>  "petugas",
                "email"         =>  "petugas@gmail.com",
                "phone"         =>  "1234",
                "role"          =>  "petugas",
                "password"      => Hash::make('password'),
            ],
            [
                "nik"           =>  "123456789101234512",
                "username"      =>  "pimpinan",
                "name"          =>  "pimpinan",
                "email"         =>  "pimpinan@gmail.com",
                "phone"         =>  "1234",
                "role"          =>  "pimpinan",
                "password"      => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }

        DB::commit();
    }
}
