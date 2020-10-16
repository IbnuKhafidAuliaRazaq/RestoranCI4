<?php 

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;


class Menu extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new Menu_M();


		$judul = 'DATA MENU';


		$data = [
			'judul' => $judul,
			'menu' => $model->paginate(5, 'page'),
			'pager' => $model->pager
		];

		echo view("menu/select", $data);
    }
    
    
    public function read()
    {
		$pager = \Config\Services::pager();
        if (isset($_GET['idkategori'])) {
            $id = $_GET['idkategori'];
			$model = new Menu_M();
			$jumlah = $model->where('idkategori',$id)->findAll();
			$count = count($jumlah);
			
			$tampil = 4;
			$mulai = 0;
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$mulai = ($tampil * $page) - $tampil;
			}

			

			$menu = $model->where('idkategori',$id)->findAll($tampil,$mulai);

			$judul = 'DATA PENCARIAN MENU';
			$data = [
				'judul' => $judul,
				'menu' => $menu,
				'pager' => $pager,
				'tampil' => $tampil,
				'total' => $count
			];
	
			return view("menu/cari", $data);
        }
	}
	public function create()
	{
		$model = new Kategori_M();
		$kategori = $model->findAll();

		$data = [
			'kategori' => $kategori
		];

		echo view("menu/insert",$data);
	}
	public function insert()
	{
		$request = \Config\Services::request();
		$file = $request->getFile('gambar');
		$name = $file->getName();
		$data = [
			'idkategori' => $request->getPost('idkategori'),
			'menu' => $request->getPost('menu'),
			'gambar' => $name,
			'harga' => $request->getPost('harga')
		];
		$model = new Menu_M();
		
		if ($model->insert($data)===true) {
			$file->move('./uploud');	
			return redirect()->to(base_url('/admin/menu'));
		} else {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url('/admin/menu/create'));
		}
		
		
		
	
	}
	public function option()
	{
		$model = new Kategori_M();
		$kategori = $model->findAll();

		$data = [
			'kategori' => $kategori
		];
		return view('template/option',$data);
	}
	
	public function update()
	{
		$model = new Menu_M();
		$request = \Config\Services::request();
		$id = $request->getPost('idmenu');
		$file = $request->getFile('gambar');
		$name = $file->getName();


		if (empty($name)) {
			$name = $this->request->getPost('gambar');
		} else {
			$file->move('./uploud');	
		}
		


		$data = [
			'idkategori' => $this->request->getPost('idkategori'),
			'menu' => $this->request->getPost('menu'),
			'gambar' => $name,
			'harga' => $this->request->getPost('harga'),
			
		];

		
		
		

		if ($model->update($id,$data) === true	) {
			return redirect()->to(base_url('/admin/menu'));
		} else {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url('/admin/menu/find/'.$id));
		}
	
		
	}
	public function find($id = null)
	{

		$model = new Menu_M();
		$menu = $model->find($id);

		$modelkat = new Kategori_M();
		$kategori = $modelkat->findAll();



		$judul = 'UPDATE DATA';

		$data = [
			'judul' => $judul,
			'menu' => $menu,
			'kategori' => $kategori
		];

		return view('menu/update', $data);
	}
	public function delete($id = null)
	{
		$model = new Menu_M();
		$model->delete($id);
		return redirect()->to(base_url('/admin/menu'));
	}

	

}
