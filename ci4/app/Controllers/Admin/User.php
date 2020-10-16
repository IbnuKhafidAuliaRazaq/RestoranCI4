<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

class User extends BaseController
{

	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new User_M();


		$judul = 'DATA USER';


		$data = [
			'judul' => $judul,
			'user' => $model->paginate(5, 'page'),
			'pager' => $model->pager
		];

		echo view("user/select", $data);
	}

	public function create()
	{
		$data = [
			'level' => ['Admin', 'Koki', 'Kasir', 'Gudang']
		];

		echo view("user/insert", $data);
	}

	public function insert()
	{
		if (isset($_POST['password'])) {
			$data = [
				'user' => $_POST['user'],
				'email' => $_POST['email'],
				'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
				'level' => $_POST['level'],
				'aktif' => 1

			];
			$model = new User_M();
			if ($model->insert($data) === false) {
				$error = $model->errors();
				session()->setFlashdata('info', $error['kategori']);
				return redirect()->to(base_url('/admin/kategori/create'));
			} else {
				return redirect()->to(base_url('/admin/kategori'));
			}
		}
	}

	public function delete($id = null)
	{
		$model = new User_M();
		$model->delete($id);
		return redirect()->to(base_url('/admin/user'));
	}

	public function update($id = null, $isi = 1)
	{
		$model = new User_M();

		if ($isi == 0) {
			$isi = 1;
		} else {
			$isi = 0;
		}

		$data = [
			'aktif' => $isi
		];

		$model->update($id, $data);
		return redirect()->to(base_url('/admin/user'));
	}

	public function find($id = null)
	{

		$model = new User_M();
		$user = $model->find($id);
		$judul = 'UPDATE DATA';

		$data = [
			'judul' => $judul,
			'user' => $user,
			'level' => ['Admin', 'Koki', 'Kasir', 'Gudang']
		];

		return view('user/update', $data);
	}

	public function ubah()
	{
		$id = $_POST['iduser'];
		$model = new User_M();

		$data = [
			'email' => $_POST['email'],
			'level' => $_POST['level']
		];

		$model->update($id, $data);
		return redirect()->to(base_url('/admin/user'));

	}

}
