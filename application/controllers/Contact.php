<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Contact extends REST_Controller {

  function __construct($config = 'rest'){
      parent::__construct($config);
      $this->load->database();
  }

  function index_get(){
    $id = $this->get('id');
    if ($id == '') {
        $contact = $this->db->get('telephone')->result();
    }else{
        $this->db->where('id',$id);
        $contact = $this->db->get('telephone')->result();
    }
    $this->response($contact,200);
  }

   function index_post(){
    $data = array(
            'name'   => $this->post('name'),
            'number' => $this->post('number')
    );
    $insert = $this->db->insert('telephone',$data);
    if ($insert) {
        $this->response($data,200);
    }else{
         $this->response(array('status' => 'fail',502));
    }
  }

  function index_put(){
      $id = $this->put('id');
      $data = array(
              'id'     => $this->put('id'),
              'name'   => $this->put('name'),
              'number' => $this->put('number')
      );
      $this->db->where('id',$id);
      $update = $this->db->update('telephone',$data);

      if ($update) {
        $this->response($data,200);
      }else{
        $this->response(array('status' => 'fail',502));
      }
  }

  function index_delete(){
      $id = $this->get('id');
      $this->db->where('id',$id);
      $delete = $this->db->delete('telephone');

      if ($delete) {
        $this->response(array('status' => 'success'),201);
      }else {
        $this->response(array('status' => 'fail'),502);
      }

  }
}
