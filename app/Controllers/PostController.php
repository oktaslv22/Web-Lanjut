<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
	public function index()
	{
		$data = [
			'tittle'=> 'Blog - Post'
		];
		echo view('layouts/header',$data);
		echo view('layouts/navbar');
		echo view('v_post');
		echo view('layouts/footer');
	}
}
