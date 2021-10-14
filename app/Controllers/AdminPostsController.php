<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminPostsController extends BaseController
{
	public function index()
	{
		return view("post/index");
	}
	public function create()
	{
		return view("post/create");
	}
	public function store()
	{
		//
	}

}

