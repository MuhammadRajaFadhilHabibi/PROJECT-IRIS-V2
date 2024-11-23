<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Dosen;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menyisipkan data kelas
        $kelas = [
            ['nama_kelas' => 'IF-2022-A', 'tahun_ajaran' => '2022/2023', 'nip_dosen' => '1234567801'],
            ['nama_kelas' => 'IF-2022-B', 'tahun_ajaran' => '2022/2023', 'nip_dosen' => '1234567802'],
            ['nama_kelas' => 'IF-2023-A', 'tahun_ajaran' => '2023/2024', 'nip_dosen' => '1234567803'],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk menyimpan data kelas dengan dosen_id yang benar
        foreach ($kelas as $data) {
            // Mencari id dosen berdasarkan nip
            $dosen = Dosen::where('nip', $data['nip_dosen'])->first();

            // Jika dosen ditemukan, simpan kelas dengan dosen_id
            if ($dosen) {
                Kelas::create([
                    'nama_kelas' => $data['nama_kelas'],
                    'tahun_ajaran' => $data['tahun_ajaran'],
                    'dosen_id' => $dosen->id,  // Menggunakan id dosen yang ditemukan
                ]);
            }
        }
    }
}
