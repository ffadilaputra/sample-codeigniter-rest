<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');
require(APPPATH . 'libraries/Format.php');

class Karyawan extends REST_Controller {

	public function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        $this->load->model('Karyawan_model');
    }

	public function index_get(){
		$nrp = $this->get('nrp');
		if ($nrp == '') {
			$karyawan = $this->Karyawan_model->getKaryawans();
		}else{
			$karyawan = $this->Karyawan_model->getKaryawanByNrp($nrp);
        }
		$this->response($karyawan,200);
    }

    public function index_post() {
        $payload = array(
            'nrp'  => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'gender' => $this->post('gender'),
            'maritalStatus' => $this->post('maritalStatus'),

        );
        $insert = $this->Karyawan_model->postKaryawan($payload);
        if ($insert) {
             $this->response([
                'status' => true,
                'data' => $payload
             ], 200);
        } else {
             $this->response(array('status' => 'fail', 502));
        }
    }

}
