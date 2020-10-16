<?php 

namespace App\Models;
use CodeIgniter\Model;

class Kategori_M extends Model
{
    protected $table = 'tblkategori';
    protected $primaryKey = 'idkategori';
    protected $allowedFields = ['kategori', 'keterangan'];
    
    protected $validationRules    = [
        'kategori' => 'alpha_numeric_space|min_length[3]|is_unique[tblkategori.kategori]'
    ];
    protected $validationMessages = [
        'kategori'        => [
            'is_unique' => 'Maaf. Kategori sudah digunakan mohon buat kategori yang lain.',
            'alpha_numeric_space' => 'Maaf. Tidak menggunakan symbol.',
            'min_length' => 'Maaf. Minimal Pengisian 3 huruf.'
        ]
    ];
}


















?>