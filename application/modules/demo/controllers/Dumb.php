<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Dumb extends RestController {

	public function index_get()
	{
		$users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
		];
		
		$this->response( [
			'data' => $users,
			'status' => 'OK!'
		], 200);
	}
}
