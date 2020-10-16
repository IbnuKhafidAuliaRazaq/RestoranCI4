<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Adminpage extends BaseController
{
	public function index()
	{
		return view('template/admin');
	}

	//--------------------------------------------------------------------

}

