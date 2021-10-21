<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminPostsController extends BaseController
{
	public function index()
	{
		$PostModel = model("PostModel");
		$data = [
			'post' => $PostModel->findAll()
		];
		return view("post/index",$data);
	}

	public function create()
	{
		session();
		$data = [
			'validation' => \Config\Services::validation(),
		];
		return view("post/create", $data);
	}

	public function store()
	{
		$valid = $this->validate([
			"judul" => [
				"label" => "Judul",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!"
				]
			],
			"slug" => [
				"label" => "Slug",
				"rules" => "required|is_unique[post.slug]",
				"errors" => [
					"required" => "{field} Harus Diisi!",
					"is_unique" => "{filed} sudah ada!"
				]
			],
			"kategori" => [
				"label" => "Kategori",
				"rules" => "required",
				"errors" => [
					"{field} Harus Diisi!"
				]
			],
			"author" => [
				"label" => "Author",
				"rules" => "required",
				"errors" => [
					"{field} Harus Diisi!"
				]
			],
			"deskripsi" => [
				"label" => "Deskripsi",
				"rules" => "required",
				"errors" => [
					"{field} Harus Diisi!"
				]
			]
		]);

		if ($valid) {
			$data = [
				'judul' => $this->request->getVar('judul'),
				'slug' => $this->request->getVar('slug'),
				'kategori' => $this->request->getVar('kategori'),
				'author' => $this->request->getVar('author'),
				'deskripsi' => $this->request->getVar('deskripsi'),
			];

			$PostModel = model("PostModel");
			$PostModel-> insert($data);
			return redirect()->to(base_url('/admin/post/'));
		} else {
			return redirect()->to(base_url('/admin/post/create'))->withInput()->with('validation', $this->validator);
		}
		// return view("post/store");
	}

}

