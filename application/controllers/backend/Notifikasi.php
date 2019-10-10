<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_model');
    }

    public function index(){
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/notifikasi',[
                'title' => 'Notifikasi',
                'bcrumb' => 'Notifikasi',
                'record' => $this->m_model->all('trans_approval'),
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function approve($id){
        $data = array(
            'status'    => 'Approved',
        );
        $create = $this->m_model->updateas('id', $id, $data, 'trans_approval');
        if ($create == 1) {
            redirect('backend/notifikasi', 'refresh');
        }else{
            // $this->session->set_flashdata('gagal', 'Kesalahan Approve');
            redirect('backend/notifikasi', 'refresh');
        }
    }

    public function reject($id){
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/notifikasi-reject',[
                'title' => 'Notifikasi',
                'bcrumb' => 'Notifikasi',
                'id' => $id,
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function saveReject(){
        $data = array(
            'status'    => 'Rejected',
            'deskripsi'    => $this->input->post('deskripsi'),
        );
        $id = $this->input->post('id');
        $create = $this->m_model->updateas('id', $id, $data, 'trans_approval');
        if ($create == 1) {
            redirect('backend/notifikasi', 'refresh');
        }else{
            redirect('backend/notifikasi', 'refresh');
        }
    }
}