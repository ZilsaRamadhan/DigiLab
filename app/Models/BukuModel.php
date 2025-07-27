<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    
    protected $table            = 'buku';

    protected $primaryKey       = 'id_buku';
    
    protected $allowedFields    = ['judul', 'penulis', 'penerbit', 'tahun_terbit', 'sinopsis', 'cover_buku'];


    public function search($keyword)
    {

        return $this->table('buku')->like('judul', $keyword)->orLike('penulis', $keyword);
    }
}