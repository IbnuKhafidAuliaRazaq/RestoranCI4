<?php 

namespace App\Models;
use CodeIgniter\Model;

class Menu_M extends Model
{
    protected $table = 'tblmenu';
    protected $primaryKey = 'idmenu';
    protected $allowedFields = ['idkategori', 'menu','gambar','harga'];

    protected $validationRules    = [
        'menu' => 'alpha_numeric_space|min_length[3]|is_unique[tblmenu.menu]',
        'harga' => 'numeric'
    ];
    protected $validationMessages = [
        'menu'        => [
            'is_unique' => 'Maaf. Menu sudah digunakan mohon buat menu yang lain.',
            'alpha_numeric_space' => 'Maaf. Tidak boleh menggunakan symbol.',
            'min_length' => 'Maaf. Minimal Pengisian 3 huruf.'
        ],
        'harga'        => [
            'numeric' => 'Harus angka'
        ],

    ];
    
   
}


















?>