<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_model');
    }

    public function show($url,$id,$idSebelum){
        // print_r($url,$id);
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/armada-show',[
                'title' => 'Armada',
                'bcrumb' => 'Master Data > Detail Armada',
                'armada' => $this->m_model->selectOne('id',$idSebelum, 'armada'),
                'record' => $this->m_model->selectOne('id',$id,'jenis_aspeks'),
                'records' => $this->m_model->selectcustom('
                    select jenis_aspeks.id, jenis_aspeks.nama_aspek, sub_aspeks.id,sub_aspeks.name 
                    from jenis_aspeks 
                    inner join sub_aspeks on jenis_aspeks.id = sub_aspeks.jenis_aspek_id 
                    where (jenis_aspeks.id="'.$id.'" AND status="Armada")
                ')
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function showDetail($bigId,$id=NULL,$armada){
        if($id == '-'){
            redirect('panel/armada', 'refresh');
        }else{
            $record = $this->load->view('backend/armada-deck',[
                'armadaElments' => $this->m_model->selectOne('id',$id, 'armada_elements'),
                'armada' => $this->m_model->selectOne('id',$armada, 'armada'),
                'record' => $this->m_model->selectOne('id',$bigId,'jenis_aspeks'),
                'records' => $this->m_model->selectcustom('
                    select jenis_aspeks.id, jenis_aspeks.nama_aspek, sub_aspeks.id,sub_aspeks.name 
                    from jenis_aspeks 
                    inner join sub_aspeks on jenis_aspeks.id = sub_aspeks.jenis_aspek_id 
                    where (jenis_aspeks.id="'.$bigId.'" AND status="Armada")
                ')
            ]);

            return $record;
        }
    }

    public function store(){
        // print_r($_FILES['icon']);
        //     die();
         // print_r($_FILES['icon']['name']);
            // die();
        // print_r($this->input->post());
        // die();
        $cekData = $this->m_model->selectOne('id',$this->input->post('id'),'trans_armada_hasil');
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
                'id_armada' => $this->input->post('id_armada'),
                'id_armada_elments' => $this->input->post('id_armada_elments'),
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
            $this->m_model->updateas('id', $this->input->post('id'), $saveArr, 'trans_armada_hasil');
            echo json_encode([
                'status' => true,
                'message' => 'Sukses Menyimpan Data'
            ]);
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
                'id_armada' => $this->input->post('id_armada'),
                'id_armada_elments' => $this->input->post('id_armada_elments'),
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
            if ($this->m_model->create($saveArr, 'trans_armada_hasil') == 1) {
                return redirect('backend/armada/showDetail/'.$this->input->post('id_jenis_aspek').'/'.$this->input->post('id_armada_elments').'/'.$this->input->post('id_armada'));
            }
        }
    }

    public function delete(){
        header('Content-Type: application/json');
        // $cekData = $this->m_model->selectOne('id',$this->input->post('id_pelabuhans_hasil'),'trans_pelabuhans_hasil');
        // if($cekData){
            $this->db->delete('trans_armada_hasil', array('id' => $this->input->post('id')));
                echo json_encode([
                    'status' => true,
                    'message' => 'Sukses Menghapus Data'
                ]);
        // }
    }

    public function getData(){
        echo json_encode($this->m_model->selectWhere3('id_armada',$this->input->post('id_armada'),'id_jenis_aspek',$this->input->post('id_jenis_aspek'),'id_armada_elments',$this->input->post('id_armada_elments'),'trans_armada_hasil'));
    }

    public function getDataOne(){
        echo json_encode($this->m_model->selectOneWhere4('id_armada',$this->input->post('id_armada'),'id_jenis_aspek',$this->input->post('id_jenis_aspek'),'id_armada_elments',$this->input->post('id_armada_elments'),'primary_key',$this->input->post('primary_key'),'trans_armada_hasil'));
    }
}