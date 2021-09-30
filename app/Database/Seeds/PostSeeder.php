<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
	public function run()
	{
			$model = model('PostModel');

			$model->insert([
					'judul'      => static::faker()->email,
					'ip_address' => static::faker()->ipv4,
			]);
	}
}
