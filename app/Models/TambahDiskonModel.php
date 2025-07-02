<?php

namespace App\Models;

use CodeIgniter\Model;

class TambahDiskonModel extends Model
{
    protected $table          = 'TambahDiskon';
    protected $primaryKey     = 'id';
    protected $allowedFields  = [
        'tanggal','nominal','created_at','updated_at'
    ];
}