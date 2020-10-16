<?php 

namespace App\Models;
use CodeIgniter\Model;

class User_M extends Model
{
    protected $table = 'tbluser';
    protected $primaryKey = 'iduser';
    protected $allowedFields = ['user', 'email','password','level','aktif'];
  
    protected $validationRules    = [
        'user' => 'alpha_numeric_space|min_length[3]|is_unique[tbluser.user]',
        'email' => 'valid_email'
    ];
    protected $validationMessages = [
        'user'        => [
            'is_unique' => 'Maaf. User sudah digunakan mohon buat user yang lain.',
            'alpha_numeric_space' => 'Maaf. Tidak boleh menggunakan symbol.',
            'min_length' => 'Maaf. Minimal Pengisian 3 huruf.'
        ],
        'email'        => [
            'valid_email' => 'Email Salah',
        
        ],

    ];
    

}





?>