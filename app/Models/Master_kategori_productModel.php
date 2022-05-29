<?php

namespace App\Models;

use CodeIgniter\Model;

class Master_kategori_productModel extends Model
{
    protected $table = 'Master_kategori_product';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['id_kategori', 'kategori_product'];

    // public function getIdkategori($id_kategori)
    // {
    //     return $this->find();
    // }
}
