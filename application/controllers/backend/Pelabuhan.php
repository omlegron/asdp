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
        // header('Content-Type: application/json');
        // print_r($this->input->post());
        // die();
        $cekData = $this->m_model->selectOne('id',$this->input->post('id'),'trans_pelabuhans_hasil');
        if($cekData){
            $pathfile = '';
            // print_r($_FILES['icon']['name']);
            // die();
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path']   = FCPATH.'/images/icon/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('icon');
                $pathfile='images/icon/'.$this->upload->data('file_name');
                // print_r($pathfile);
                // die();
            }
            $saveArr = array(
                'id_pelabuhan' => $this->input->post('id_pelabuhan'),
                'id_jenis_aspek' => $this->input->post('id_jenis_aspek'),
                'icon_id' => $this->input->post('icon_id'),
                'url' => $this->input->post('url'),
                'pointer_x' => $this->input->post('pointer_x'),
                'pointer_y' => $this->input->post('pointer_y'),
                'primary_key' => $this->input->post('primary_key'),
                'kategori' => $this->input->post('kategori'),
                'nama' => $this->input->post('nama'),
                'aspek' => $this->input->post('aspek'),
                'nomor' => $this->input->post('nomor'),
                'kondisi' => $this->input->post('kondisi'),
                'posisi' => $this->input->post('posisi'),
                'tahun' => $this->input->post('tahun'),
                'fileurl' => $pathfile,
            );
            $this->m_model->updateas('id', $this->input->post('id'), $saveArr, 'trans_pelabuhans_hasil');
            redirect('backend/pelabuhan/show/show/'.$this->input->post('id_jenis_aspek').'/'.$this->input->post('id_pelabuhan'));
        }else{
             $pathfile = '';
            // print_r($_FILES['icon']['name']);
            // die();
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path']   = FCPATH.'/images/icon/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('icon');
                $pathfile='images/icon/'.$this->upload->data('file_name');
                // print_r($pathfile);
                // die();
            }
            $saveArr = array(
                'id_pelabuhan' => $this->input->post('id_pelabuhan'),
                'id_jenis_aspek' => $this->input->post('id_jenis_aspek'),
                'icon_id' => $this->input->post('icon_id'),
                'url' => $this->input->post('url'),
                'pointer_x' => $this->input->post('pointer_x'),
                'pointer_y' => $this->input->post('pointer_y'),
                'primary_key' => $this->input->post('primary_key'),
                'kategori' => $this->input->post('kategori'),
                'nama' => $this->input->post('nama'),
                'aspek' => $this->input->post('aspek'),
                'nomor' => $this->input->post('nomor'),
                'kondisi' => $this->input->post('kondisi'),
                'posisi' => $this->input->post('posisi'),
                'tahun' => $this->input->post('tahun'),
                'fileurl' => $pathfile,
            );
            if ($this->m_model->create($saveArr, 'trans_pelabuhans_hasil') == 1) {
                redirect('backend/pelabuhan/show/show/'.$this->input->post('id_jenis_aspek').'/'.$this->input->post('id_pelabuhan'));
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

     public function subtitle(){
        $cekData = $this->m_model->selectOneWhere3('id_pelabuhan',$this->input->post('id_pelabuhan'),'id_jenis_aspek',$this->input->post('idaspek'),'id_icon',$this->input->post('id_icon'),'trans_pelabuhans_hasil_sub');
        if($cekData){
            $data = array(
                'id_pelabuhan' => $this->input->post('id_pelabuhan') ,
                'id_jenis_aspek' => $this->input->post('idaspek') ,
                'id_icon' => $this->input->post('id_icon') ,
                'title' => $this->input->post('title')
            );
            $this->m_model->updateas('id', $cekData->id, $data, 'trans_pelabuhans_hasil_sub');
        }else{
            $data = array(
                'id_pelabuhan' => $this->input->post('id_pelabuhan') ,
                'id_jenis_aspek' => $this->input->post('idaspek') ,
                'id_icon' => $this->input->post('id_icon') ,
                'title' => $this->input->post('title')
            );
            $this->m_model->create($data, 'trans_pelabuhans_hasil_sub');
        }
    }

    public function subvalue(){
        $cekData = $this->m_model->selectOneWhere3('id_pelabuhan',$this->input->post('id_pelabuhan'),'id_jenis_aspek',$this->input->post('idaspek'),'id_icon',$this->input->post('id_icon'),'trans_pelabuhans_hasil_sub');
        if($cekData){
            $data = array(
                'id_pelabuhan' => $this->input->post('id_pelabuhan') ,
                'id_jenis_aspek' => $this->input->post('idaspek') ,
                'id_icon' => $this->input->post('id_icon') ,
                'value' => $this->input->post('value')
            );
            $this->m_model->updateas('id', $cekData->id, $data, 'trans_pelabuhans_hasil_sub');
        }else{
            $data = array(
                'id_pelabuhan' => $this->input->post('id_pelabuhan') ,
                'id_jenis_aspek' => $this->input->post('idaspek') ,
                'id_icon' => $this->input->post('id_icon') ,
                'value' => $this->input->post('value')
            );
            $this->m_model->create($data, 'trans_pelabuhans_hasil_sub');
        }
    }
}