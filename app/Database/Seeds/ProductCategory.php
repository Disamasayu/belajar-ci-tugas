<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategory extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name' => 'Elektronik',
                'description'   => 'Perangkat elektronik seperti TV, HP, dan laptop',
            ],
            [
                'category_name' => 'Pakaian',
                'description'   => 'Semua jenis pakaian dan aksesorisnya',
            ],
            [
                'category_name' => 'Makanan',
                'description'   => 'Produk makanan dan minuman',
            ],
        ];

        $this->db->table('product_category')->insertBatch($data);
    }
}
