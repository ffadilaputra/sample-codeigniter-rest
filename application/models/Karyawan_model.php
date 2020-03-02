<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{

    protected $table = 'tbl_m_karyawan';
    protected $primaryKey = 'nrp';

    public function getKaryawans()
    {
        $this->db->select('*');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function postKaryawan($payload){
        $this->db->insert($this->table, $payload);
    }

    public function getKaryawanByNrp($nrp)
    {
        $this->db->select('*');
        $this->db->where('nrp', $nrp);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getKaryawanByDept($dept)
    {
        $this->db->select('*');
        $this->db->where('dept', $dept);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
