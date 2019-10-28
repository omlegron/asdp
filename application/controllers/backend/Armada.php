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

    public function showEdit($bigId,$id=NULL,$armada){
        if($id == '-'){
            redirect('panel/armada', 'refresh');
        }else{
            $record = $this->load->view('backend/armada-deck-edit',[
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
        $input = $this->input->post('url_canvas');
        $output = 'images/armada/files'.date('YmdHis').'.png';
        file_put_contents($output, file_get_contents($input));

        $cekData = $this->m_model->selectOne('id',$this->input->post('id'),'trans_armada_hasil');
        if($cekData){
            $saveArr = array(
                'id_armada' => $this->input->post('id_armada'),
                'id_armada_elments' => $this->input->post('id_armada_elments'),
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
                'width' => $this->input->post('width'),
                // 'fileurl' => $pathfile,
            );
            $this->m_model->updateas('id', $this->input->post('id'), $saveArr, 'trans_armada_hasil');
            $this->m_model->updateas('id', $this->input->post('id_armada_elments'), ['url_canvas' => $output], 'armada_elements');
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
                    $this->db->insert_batch('trans_armada_hasil_foto',$arr);
                }
                // print_r($pathfile);
                // die();
            }
            return redirect('backend/armada/showDetail/'.$this->input->post('id_jenis_aspek').'/'.$this->input->post('id_armada_elments').'/'.$this->input->post('id_armada'));
        }else{
           
            $saveArr = array(
                'id_armada' => $this->input->post('id_armada'),
                'id_armada_elments' => $this->input->post('id_armada_elments'),
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
                'width' => $this->input->post('width'),
                // 'fileurl' => $pathfile,
            );
            $this->m_model->updateas('id', $this->input->post('id_armada_elments'), ['url_canvas' => $output], 'armada_elements');
            if ($this->m_model->create($saveArr, 'trans_armada_hasil') == 1) {
                $arr = [];
                $pathfile = '';

                if (!empty($_FILES['icon']['name'])) {
                    if(count($_FILES['icon']['name']) > 0){
                        foreach ($_FILES['icon']['name'] as $k => $value) {
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
                            $arr[$k]['trans_id'] = $this->db->insert_id();
                            $arr[$k]['filename'] = $this->upload->data('file_name');

                        }
                        $this->db->insert_batch('trans_armada_hasil_foto',$arr);
                    }
                    // print_r($pathfile);
                    // die();
                }
                return redirect('backend/armada/showDetail/'.$this->input->post('id_jenis_aspek').'/'.$this->input->post('id_armada_elments').'/'.$this->input->post('id_armada'));
            }
        }
    }

    public function delete(){
        $input = $this->input->post('url_canvas');
        $output = 'images/armada/files'.date('YmdHis').'.png';
        file_put_contents($output, file_get_contents($input));
        $this->m_model->updateas('id', $this->input->post('id_armada_elments'), ['url_canvas' => $output], 'armada_elements');

        $this->db->delete('trans_armada_hasil', array('id' => $this->input->post('id')));
        header('Content-Type: application/json');
            echo json_encode([
                'status' => true,
                'message' => 'Sukses Menghapus Data'
        ]);
    }

    public function getData(){
        echo json_encode($this->m_model->selectWhere3('id_armada',$this->input->post('id_armada'),'id_jenis_aspek',$this->input->post('id_jenis_aspek'),'id_armada_elments',$this->input->post('id_armada_elments'),'trans_armada_hasil'));
    }

    public function getDataOne(){
        $record = $this->m_model->selectOneWhere6('id_armada',$this->input->post('id_armada'),'id_jenis_aspek',$this->input->post('id_jenis_aspek'),'id_armada_elments',$this->input->post('id_armada_elments'),'primary_key',$this->input->post('primary_key'),'pointer_x',$this->input->post('pointer_x'),'pointer_y',$this->input->post('pointer_y'),'trans_armada_hasil');
        $record1 = $this->m_model->selectas('trans_id',$record->id,'trans_armada_hasil_foto');
        $data = array(
            'record' => $record,
            'record_file' => $record1
        );
        echo json_encode($data);
    }
}