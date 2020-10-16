<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderDetail_M;

class OrderDetail extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new OrderDetail_M();


        $judul = 'DATA RINCIAN ORDER';


        $data = [
            'judul' => $judul,
            'orderdetail' => $model->paginate(5, 'page'),
            'pager' => $model->pager
        ];

        echo view("orderdetail/select", $data);
    }

    public function cari()
    {
        if (isset($_POST['awal'])) {
            $awal = $_POST['awal'];
            $sampai = $_POST['akhir'];

            $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$awal' AND '$sampai' ";
            $db      = \Config\Database::connect();
            $result = $db->query($sql);
            $finalresult = $result->getResult('array');

            $data = [
                'judul' => 'DATA RINCIAN ORDER',
                'orderdetail' =>$finalresult
            ];
    
            echo view("orderdetail/cari", $data);
        }
    }
}
