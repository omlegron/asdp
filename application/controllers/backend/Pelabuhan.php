<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelabuhan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_model');
    }

    public function show($url,$id){
        // print_r($url,$id);
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/pelabuhan-show',[
                'title' => 'Pelabuhan',
                'bcrumb' => 'Master Data > Detail Pelabuhan',
                'record' => $this->m_model->selectOne('id',$id,'jenis_aspeks')
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function create(){
        if ($this->input->post('add')) {
            $param = array(
                'roles'  => cleartext($this->input->post('roles')),
            );
            $create=$this->m_model->insertgetid($param, 'roles');
            $this->session->set_flashdata('sukses', 'Data Berhasil Di Buat');
            redirect('backend/test', 'refresh');
        }
    }

}