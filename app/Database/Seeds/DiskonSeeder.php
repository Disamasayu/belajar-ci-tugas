<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $tanggalAwal = date('Y-m-d');

        $nominals = [100000,200000,300000,100000,300000,100000,200000,200000,100000];

        for ($i = 0; $i < 10; $i++){
            $tanggal = date('Y-m-d', strtotime("+$i days", strtotime($tanggalAwal)));

            $data = [
                'tanggal'    => $tanggal,
                'nominal'    => $nominals[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('TambahDiskon')->insert($data);
        }
    }
}
