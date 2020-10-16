<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo "<h1>Kategori</h1>";
	}

	public function read()
	{
		$pager = \Config\Services::pager();
		$model = new Kategori_M();


		$judul = 'DATA KATEGORI';


		$data = [
			'judul' => $judul,
			'kategori' => $model->paginate(5, 'page'),
			'pager' => $model->pager
		];

		echo view("kategori/select", $data);
	}

	public function selectWhere($id = null)
	{
		echo "<h1>Menampilkan Data yang dipilih $id</h1>";
	}

	public function create()
	{

		echo view("kategori/insert");
	}

	public function insert()
	{

		$model = new Kategori_M();


		if ($model->insert($_POST) === false) {
			$error = $model->errors();
			//echo $error['kategori'];
			session()->setFlashdata('info',$error['kategori']);
			return redirect()->to(base_url('/admin/kategori/create'));
		} else {
			return redirect()->to(base_url('/admin/kategori'));
		}
	}
	public function find($id = null)
	{

		$model = new Kategori_M();
		$kategori = $model->find($id);
		$judul = 'UPDATE DATA';

		$data = [
			'judul' => $judul,
			'kategori' => $kategori
		];

		return view('kategori/update', $data);
	}

	public function update()
	{
		$model = new Kategori_M();
		$id = $_POST['idkategori'];

		if ($model->save($_POST) === false) {
			$error = $model->errors();
			//echo $error['kategori'];
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url('/admin/kategori/find/'.$id));
		} else {
			return redirect()->to(base_url('/admin/kategori'));
		}
	}

	public function delete($id = null)
	{
		$model = new Kategori_M();
		$model->delete($id);
		return redirect()->to(base_url('/admin/kategori'));
	}

	//--------------------------------------------------------------------

}
