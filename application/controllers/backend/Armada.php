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
                    where jenis_aspeks.id="'.$id.'"
                ')
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function showDetail($bigId,$id,$armada){
        $record = $this->load->view('backend/armada-deck',[
            'armadaElments' => $this->m_model->selectOne('id',$id, 'armada_elements'),
            'armada' => $this->m_model->selectOne('id',$armada, 'armada'),
            'record' => $this->m_model->selectOne('id',$bigId,'jenis_aspeks'),
            'records' => $this->m_model->selectcustom('
                select jenis_aspeks.id, jenis_aspeks.nama_aspek, sub_aspeks.id,sub_aspeks.name 
                from jenis_aspeks 
                inner join sub_aspeks on jenis_aspeks.id = sub_aspeks.jenis_aspek_id 
                where jenis_aspeks.id="'.$bigId.'"
            ')
        ]);

        return $record;
    }

}