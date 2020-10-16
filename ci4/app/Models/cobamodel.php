<?php 

namespace App\Models;
use CodeIgniter\Model;

class Cobamodel extends Model
{
     public function conection()
     {
         return $db= \Config\Database::connect();
     }
}

?>