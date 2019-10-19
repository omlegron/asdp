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
                'bcrumb' => 'Master Data > Detail Pelabuhan',
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
        $record = $this->m_model->selectOneWhere5('id_pelabuhan',$this->input->post('id_pelabuhan'),'id_jenis_aspek',$this->input->post('id_jenis_aspek'),'primary_key',$this->input->post('primary_key'),'pointer_x',$this->input->post('pointer_x'),'pointer_y',$this->input->post('pointer_y'),'trans_pelabuhans_hasil');
        $record1 = $this->m_model->selectas('trans_id',$record->id,'trans_pelabuhans_hasil_foto');
        $data = array(
            'record' => $record,
            'record_foto' => $record1
        );
        echo json_encode($data);
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
        $input = $this->input->post('url_canvas');
        $output = 'images/pelabuhan/files'.date('YmdHis').'.png';
        file_put_contents($output, file_get_contents($input));
        // print_r($this->m_model->selectOne('id',$id,'pelabuhans')->url_canvas);
        // die();

        $cekData = $this->m_model->selectOne('id',$this->input->post('id'),'trans_pelabuhans_hasil');
        if($cekData){
            // $pathfile = '';
            // print_r($_FILES['icon']['name']);
            // die();
            // if (!empty($_FILES['icon']['name'])) {
            //     $config['upload_path']   = FCPATH.'/images/icon/';
            //     $config['allowed_types'] = 'jpg|png|jpeg';
            //     $config['max_size'] = 3000000;
            //     $config['file_name'] = uniqid();
            //     $this->load->library('upload',$config);
            //     $this->upload->initialize($config);
            //     $this->upload->do_upload('icon');
            //     $pathfile='images/icon/'.$this->upload->data('file_name');
            //     // print_r($pathfile);
            //     // die();
            // }
            $saveArr = array(
                'id_pelabuhan' => $this->input->post('id_pelabuhan'),
                'id_jenis_aspek' => $this->input->post('id_jenis_aspek'),
                'id_sub_jenis_aspek' => $this->input->post('id_sub_jenis_aspek'),
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
                // 'url_canvas' => $this->input->post('url_canvas'),
                // 'fileurl' => $pathfile,
            );
            $this->m_model->updateas('id', $this->input->post('id'), $saveArr, 'trans_pelabuhans_hasil');
            $this->m_model->updateas('id', $this->input->post('id_pelabuhan'), ['url_canvas' => $output], 'pelabuhans');
            $arr = [];
            $pathfile = '';
            // print_r($_FILES['icon']['name'][0]);
            // die();
            if (!empty($_FILES['icon']['name'])) {
                if(count($_FILES['icon']['name']) > 0){
                    foreach ($_FILES['icon']['name'] as $k => $value) {
            //              print_r($value);
            // die();
                        $_FILES['file']['name']     = $_FILES['icon']['name'][$k];
                        $_FILES['file']['type']     = $_FILES['icon']['type'][$k];
                        $_FILES['file']['tmp_name'] = $_FILES['icon']['tmp_name'][$k];
                        $_FILES['file']['error']     = $_FILES['icon']['error'][$k];
                        $_FILES['file']['size']     = $_FILES['icon']['size'][$k];
                        unset($config);
                        $config['upload_path']   = FCPATH.'/images/icon/';
                        $config['allowed_types'] = 'jpg|png|jpeg|giv|ico';
                        $config['overwrite']     = FALSE;
                        // $config['max_size'] = 3000000;
                        $config['file_name'] = $value;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('file');
                        $pathfile='images/icon/'.$this->upload->data('file_name');
                        $arr[$k]['fileurl'] = $pathfile;
                        $arr[$k]['trans_id'] = $this->input->post('id');
                        $arr[$k]['filename'] = $this->upload->data('file_name');

                    }
                    $this->db->insert_batch('trans_pelabuhans_hasil_foto',$arr);
                }
                // print_r($pathfile);
                // die();
            }
            redirect('backend/pelabuhan/show/show/'.$this->input->post('id_jenis_aspek').'/'.$this->input->post('id_pelabuhan'));
        }else{
            //  $pathfile = '';
            // // print_r($_FILES['icon']['name']);
            // // die();
            // if (!empty($_FILES['icon']['name'])) {
            //     $config['upload_path']   = FCPATH.'/images/icon/';
            //     $config['allowed_types'] = 'jpg|png|jpeg';
            //     $config['max_size'] = 3000000;
            //     $config['file_name'] = uniqid();
            //     $this->load->library('upload',$config);
            //     $this->upload->initialize($config);
            //     $this->upload->do_upload('icon');
            //     $pathfile='images/icon/'.$this->upload->data('file_name');
            //     // print_r($pathfile);
            //     // die();
            // }
            $saveArr = array(
                'id_pelabuhan' => $this->input->post('id_pelabuhan'),
                'id_jenis_aspek' => $this->input->post('id_jenis_aspek'),
                'id_sub_jenis_aspek' => $this->input->post('id_sub_jenis_aspek'),
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
                // 'fileurl' => $pathfile,
            );
            $this->m_model->updateas('id', $this->input->post('id_pelabuhan'), ['url_canvas' => $output], 'pelabuhans');

            if ($this->m_model->create($saveArr, 'trans_pelabuhans_hasil') == 1) {
                $idss = $this->db->insert_id();
                $arr = [];
                $pathfile = '';
                    // print_r($this->input->post());
                    // die();
                if (!empty($_FILES['icon']['name'])) {
                    if(count($_FILES['icon']['name']) > 0){
                        foreach ($_FILES['icon']['name'] as $k => $value) {
                //              print_r($value);
                // die();
                            $_FILES['file']['name']     = $_FILES['icon']['name'][$k];
                            $_FILES['file']['type']     = $_FILES['icon']['type'][$k];
                            $_FILES['file']['tmp_name'] = $_FILES['icon']['tmp_name'][$k];
                            $_FILES['file']['error']     = $_FILES['icon']['error'][$k];
                            $_FILES['file']['size']     = $_FILES['icon']['size'][$k];
                            unset($config);
                            $config['upload_path']   = FCPATH.'/images/icon/';
                            $config['allowed_types'] = 'jpg|png|jpeg|giv|ico';
                            $config['overwrite']     = FALSE;
                            // $config['max_size'] = 3000000;
                            $config['file_name'] = $value;
                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('file');
                            $pathfile='images/icon/'.$this->upload->data('file_name');
                            $arr[$k]['fileurl'] = $pathfile;
                            $arr[$k]['trans_id'] = $idss;
                            $arr[$k]['filename'] = $this->upload->data('file_name');

                        }
                        $this->db->insert_batch('trans_pelabuhans_hasil_foto',$arr);
                    }
                    // print_r($pathfile);
                    // die();
                }
                redirect('backend/pelabuhan/show/show/'.$this->input->post('id_jenis_aspek').'/'.$this->input->post('id_pelabuhan'));
            }
        }
    }

    public function delete(){
        $input = $this->input->post('url_canvas');
        $output = 'images/pelabuhan/files'.date('YmdHis').'.png';
        file_put_contents($output, file_get_contents($input));

            $this->m_model->updateas('id', $this->input->post('id_pelabuhan'), ['url_canvas' => $output], 'pelabuhans');
            $this->db->delete('trans_pelabuhans_hasil', array('id' => $this->input->post('id')));
            header('Content-Type: application/json');
            echo json_encode([
                'status' => true,
                'message' => 'Sukses Menghapus Data'
            ]);
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