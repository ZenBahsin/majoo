<?php

namespace App\Models;

use CodeIgniter\Model;

class Master_data_productModel extends Model
{
    protected $table = 'master_data_product';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_product', 'deskripsi_product', 'harga_product', 'kategori', 'gambar'];
}
