<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'nama' => 'Sugiarto, ST',
                'nip' => '197203172005011012',
                'gender' => 'L',
                'alamat' => 'Klaten',
                'kontak' => '+6285643188811',
                'email' => 'mrantazy68@gmail.com'
            ],
            [
                'nama' => 'Yunianto Hermawan, S.Kom',
                'nip' => '197306202006041005',
                'gender' => 'L',
                'alamat' => 'Klaten',
                'kontak' => '+6281548734649',
                'email' => 'yuniantohermawan@gmail.com'
            ],
            [
                'nama' => 'Eka Nur Ahmad Romadhoni, S.Pd.',
                'nip' => '199303012019031011',
                'gender' => 'L',
                'alamat' => 'Klaten',
                'kontak' => '+6285895780078',
                'email' => 'eka.html@gmail.com'
            ],
            [
                'nama' => 'M. Endah Titisari, ST',
                'nip' => '197403022006042008',
                'gender' => 'P',
                'alamat' => 'Pokoh, Maguwo',
                'kontak' => '+6285608990027',
                'email' => 'mareta.susend@gmail.com'
            ],
            [
                'nama' => 'Rr. Retna Trimantaraningsih, ST',
                'nip' => '197006272021212002',
                'gender' => 'P',
                'alamat' => 'Denggung',
                'kontak' => '+62856436402427',
                'email' => 'rereningsihlarose@gmail.com'
            ],
            [
                'nama' => 'Ratna Yunita Sari, ST',
                'nip' => '197107082022211003',
                'gender' => 'P',
                'alamat' => 'Gendeng Kidul',
                'kontak' => '+6285228771506',
                'email' => 'ratnayu2014@gmail.com'
            ],
        ];
        foreach ($rows as $row) {
            Guru::create($row);
        }
    }
}
