<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Order extends BaseController
{
        public function index()
        {
                $pager = \Config\Services::pager();
                $db      = \Config\Database::connect();
                $sql = "SELECT * FROM vorder";
                $result = $db->query($sql);
                $finalresult = $result->getResult('array');
                $total = count($finalresult);
                $tampil = 4;

                if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                       $mulai = ($tampil * $page) - $tampil;
                       $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai,$tampil";
                    } else {
                        $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT 0,$tampil";
                    }

                    $result = $db->query($sql);
                    $finalresult = $result->getResult('array');
                $data = [
                        'judul' => 'DATA ORDER',
                        'order' => $finalresult,
                        'perPage' => $tampil,
                        'total' => $total,
                        'pager' => $pager
                ];



                echo view('order/select', $data);
        }

        public function find($id = null)
        {
                $db      = \Config\Database::connect();
                $sql = "SELECT * FROM vorder WHERE idorder=$id";
                $result = $db->query($sql);
                $order = $result->getResult('array');

                $sql = "SELECT * FROM vorderdetail WHERE idorder=$id";
                $result = $db->query($sql);
                $detail = $result->getResult('array');

                $data = [
                        'judul' => 'PEMBAYARAN ORDER',
                        'order' => $order,
                        'detail' => $detail
                ];

                echo view('order/update',$data);
        }


        public function update()
        {
                $idorder = $_POST['idorder'];
                $total =  $_POST['total'];
                $bayar = $_POST['bayar'];

                if ($bayar < $total) {
                        session()->setFlashdata('info', 'Pembayaran Kurang');
                        $this->find($idorder);
                } else {
                        $kembali =  $bayar - $total;
                        $sql = "UPDATE tblorder SET total=$total,bayar=$bayar,kembali=$kembali,status=1 WHERE idorder=$idorder";
                        $db      = \Config\Database::connect();
                        $db->query($sql);
                        return redirect()->to(base_url('/admin/order'));
                }
                
        }

}
