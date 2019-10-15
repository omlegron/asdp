<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelabuhan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_model');
    }

    public function show($url,$id,$idSebelum){
        // print_r($url,$id);
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/pelabuhan-show',[
                'title' => 'Pelabuhan',
                'bcrumb' => 'Master Data > Create Pelabuhan',
                'pelabuhan' => $this->m_model->selectOne('id',$idSebelum, 'pelabuhans'),
                'record' => $this->m_model->selectOne('id',$id,'jenis_aspeks'),
                'records' => $this->m_model->selectcustom('
                    select jenis_aspeks.id, jenis_aspeks.nama_aspek, sub_aspeks.id,sub_aspeks.name 
                    from jenis_aspeks 
                    inner join sub_aspeks on jenis_aspeks.id = sub_aspeks.jenis_aspek_id 
                    where (jenis_aspeks.id="'.$id.'" AND status="Pelabuhan") 
                ')
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function edit($url,$id,$idSebelum){
        // print_r($url,$id);
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/pelabuhan-edit',[
                'title' => 'Pelabuhan',
                'bcrumb' => 'Master Data > Edit Pelabuhan',
                // 'pelabuhanDrag' => $this->m_model->selectWhere2('id_pelabuhan',$idSebelum,'id_jenis_aspek',$id,'trans_pelabuhans_hasil'),
                'pelabuhan' => $this->m_model->selectOne('id',$idSebelum, 'pelabuhans'),
                'record' => $this->m_model->selectOne('id',$id,'jenis_aspeks'),
                'records' => $this->m_model->selectcustom('
                    select jenis_aspeks.id, jenis_aspeks.nama_aspek, sub_aspeks.id,sub_aspeks.name 
                    from jenis_aspeks 
                    inner join sub_aspeks on jenis_aspeks.id = sub_aspeks.jenis_aspek_id 
                    where (jenis_aspeks.id="'.$id.'" AND status="Pelabuhan") 
                ')
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function getData(){
        echo json_encode($this->m_model->selectWhere2('id_pelabuhan',$this->input->post('id_pelabuhan'),'id_jenis_aspek',$this->input->post('id_jenis_aspek'),'trans_pelabuhans_hasil'));
    }

    public function getDataOne(){
        echo json_encode($this->m_model->selectOneWhere3('id_pelabuhan',$this->input->post('id_pelabuhan'),'id_jenis_aspek',$this->input->post('id_jenis_aspek'),'primary_key',$this->input->post('primary_key'),'trans_pelabuhans_hasil'));
    }

    public function create(){
        if ($this->input->post('add')) {
            $param = array(
                'roles'  => cleartext($this->input->post('roles')),
            );
            $create=$this->m_model->insertgetid($param, 'roles');
            $this->session->set_flashdata('sukses', 'Data Berhasil Di Buat');
            redirect('backend/pelabuhan', 'refresh');
        }
    }

    public function store(){
        header('Content-Type: application/json');
        // print_r($this->input->post());
        // die();
        $cekData = $this->m_model->selectOne('id',$this->input->post('id'),'trans_pelabuhans_hasil');
        if($cekData){
            $this->m_model->updateas('id', $this->input->post('id'), $this->input->post(), 'trans_pelabuhans_hasil');
            echo json_encode([
                'status' => true,
                'message' => 'Sukses Menyimpan Data'
            ]);
        }else{
            if ($this->m_model->create($this->input->post(), 'trans_pelabuhans_hasil') == 1) {
                echo json_encode([
                    'status' => true,
                    'message' => 'Sukses Menyimpan Data'
                ]);
            }
        }
    }

    public function delete(){
        header('Content-Type: application/json');
        // $cekData = $this->m_model->selectOne('id',$this->input->post('id_pelabuhans_hasil'),'trans_pelabuhans_hasil');
        // if($cekData){
            $this->db->delete('trans_pelabuhans_hasil', array('id' => $this->input->post('id')));
                echo json_encode([
                    'status' => true,
                    'message' => 'Sukses Menghapus Data'
                ]);
        // }
    }
}