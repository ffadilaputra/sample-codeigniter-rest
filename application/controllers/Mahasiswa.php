<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Mahasiswa extends REST_Controller {

  function __construct($config = 'rest'){
      parent::__construct($config);
      $this->load->database();
  }

  function index_get(){
    $id = $this->get('nim');
    if ($id == '') {
        $contact = $this->db->get('mhs')->result();

    }else{
        $this->db->where('nim',$id);
        $contact = $this->db->get('mhs')->result();
    }
    $this->response($contact,200);
  }

   function index_post(){
    $data = array(
            'nim'   => $this->post('nim'),
            'nama' => $this->post('nama'),
            'id_jurusan' => $this->post('id_jurusan'),
            'alamat' => $this->post('alamat')
            
    );
    $insert = $this->db->insert('mhs',$data);
    if ($insert) {
        $this->response($data,200);
    }else{
         $this->response(array('status' => 'fail',502));
    }
  }

  function index_put(){
      $id = $this->put('nim');
      $data = array(
            'nim'  => $this->put('nim'),
            'nama' => $this->put('nama'),
            'id_jurusan' => $this->put('id_jurusan'),
            'alamat' => $this->put('alamat')
      );
      $this->db->where('nim',$id);
      $update = $this->db->update('mhs',$data);

      if ($update) {
        $this->response($data,200);
      }else{
        $this->response(array('status' => 'fail',502));
      }
  }

  function index_delete(){
      $id = $this->delete('nim');
      $this->db->where('nim',$id);
      $delete = $this->db->delete('mhs');

      if ($delete) {
        $this->response(array('status' => 'success'),201);
      }else {
        $this->response(array('status' => 'fail'),502);
      }

  }
}
