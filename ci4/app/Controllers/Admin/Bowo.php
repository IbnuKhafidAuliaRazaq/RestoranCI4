<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Cobamodel;


class Bowo extends BaseController
{
    // protected $db;
    // public function __construct()
    // {
    //     $this->db= \Config\Database::connect();
    // }

	public function index()
	{
        $db = new Cobamodel();
        $bowo = $db->conection();


        $builder = $bowo->table('tblkategori');
        $query   = $builder->get(); 
        $data = [
            'kategori' => $query->getResult()
        ];
        
        echo view('kategori/coba',$data);
        $this->okky();
        
    }
    
    public function okky()
    {
        $db = new Cobamodel();
        $bowo = $db->conection();
        $builder = $bowo->table('tblmenu');
        $query   = $builder->get(); 
        
        foreach ($query->getResult() as $row)
        {
                echo $row->menu;
                echo '<br>';
        }

    }



	//--------------------------------------------------------------------

}
