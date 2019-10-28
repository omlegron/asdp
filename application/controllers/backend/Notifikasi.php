<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_model');
    }

    public function index(){
        if ($this->session->userdata('admin')) {
            $array = [];
            
            // print_r($this->session->userdata('admin_data')->roles);
            // die();
            if(($this->session->userdata('admin_data')->roles == 1) || ($this->session->userdata('admin_data')->roles == 2)){
                $trueAdm = 'salah';
                $photo = $this->m_model->all('photo_log');
                if(count($photo) > 0){
                    foreach ($photo as $k => $value) {
                        array_push($array,$value);
                    }
                }

                $video = $this->m_model->all('video_log');
                if(count($video) > 0){
                    foreach ($video as $k => $value) {
                        array_push($array,$value);   
                    }
                }

                $armada = $this->m_model->all('armada_log');
                if(count($video) > 0){
                    foreach ($video as $k => $value) {
                        array_push($array,$value);   
                    }
                }

                $pelabuhan = $this->m_model->all('pelabuhans_log');
                if(count($pelabuhan) > 0){
                    foreach ($pelabuhan as $k => $value) {
                        array_push($array,$value);   
                    }
                }
            }else{
                $trueAdm = 'benar';
                $photo = $this->m_model->selectwhere('cabang_id',$this->session->userdata('admin_data')->id_cabang,'photo_log');
                if(count($photo) > 0){
                    foreach ($photo as $k => $value) {
                        array_push($array,$value);
                    }
                }

                $video = $this->m_model->selectwhere('cabang_id',$this->session->userdata('admin_data')->id_cabang,'video_log');
                if(count($video) > 0){
                    foreach ($video as $k => $value) {
                        array_push($array,$value);   
                    }
                }

                $armada = $this->m_model->selectwhere('cabang_id',$this->session->userdata('admin_data')->id_cabang,'armada_log');
                if(count($video) > 0){
                    foreach ($video as $k => $value) {
                        array_push($array,$value);   
                    }
                }

                $pelabuhan = $this->m_model->selectwhere('cabang_id',$this->session->userdata('admin_data')->id_cabang,'pelabuhans_log');
                if(count($pelabuhan) > 0){
                    foreach ($pelabuhan as $k => $value) {
                        array_push($array,$value);   
                    }
                }
            }
            $this->load->view('backend/notifikasi',[
                'title' => 'Notifikasi',
                'bcrumb' => 'Notifikasi',
                'record' => $array,
                'trueAdm' => $trueAdm,
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function approve($id,$form,$flag){
        $data = array(
            'status'    => 3,
        );

        if($form == 'Photo'){
            $create = $this->m_model->updateas('id', $id, $data, 'photo_log');
            $selectOnes = $this->m_model->selectOne('id', $id,'photo_log');
            $dataUp = array(
                'item' => $selectOnes->item,
                'status' => $selectOnes->status,
                'cabang_id' => $selectOnes->cabang_id,
                'deskripsi' => $selectOnes->deskripsi,
                'path_file' => $selectOnes->path_file,
            );
            $createUp = $this->m_model->updateas('id', $selectOnes->trans_id, $dataUp, 'photo');
        }elseif($form == 'Video'){
            $create = $this->m_model->updateas('id', $id, $data, 'video_log');
            $selectOnes = $this->m_model->selectOne('id', $id,'video_log');
            $dataUp = array(
                'filename' => $selectOnes->filename,
                'item' => $selectOnes->item,
                'status' => $selectOnes->status,
                'cabang_id' => $selectOnes->cabang_id,
                'deskripsi' => $selectOnes->deskripsi,
                'path_file' => $selectOnes->path_file,
            );
            $createUp = $this->m_model->updateas('id', $selectOnes->trans_id, $dataUp, 'video');
        }elseif($form == 'Pelabuhan'){
            $create = $this->m_model->updateas('id', $id, $data, 'pelabuhans_log');
            $selectOnes = $this->m_model->selectOne('id', $id,'pelabuhans_log');

            $dataUp = array(
                'name' => $selectOnes->item,
                'status' => $selectOnes->status,
                'cabang_id' => $selectOnes->cabang_id,
                'deskripsi' => $selectOnes->deskripsi,
                'foto' => $selectOnes->path_file,
            );
            $createUp = $this->m_model->updateas('id', $selectOnes->trans_id, $dataUp, 'pelabuhans');

        }elseif($form == 'Armada'){
            $create = $this->m_model->updateas('id', $id, $data, 'armada_log');
            $selectOnes = $this->m_model->selectOne('id', $id,'armada_log');

            $dataUp = array(
                'name' => $selectOnes->item,
                'status' => $selectOnes->status,
                'cabang_id' => $selectOnes->cabang_id,
                'deskripsi' => $selectOnes->deskripsi,
                'foto' => $selectOnes->path_file,
            );
            $createUp = $this->m_model->updateas('id', $selectOnes->trans_id, $dataUp, 'armada');
        }
        
        // $transApprove = $this->m_model->selectOne('id',$id,'trans_approval');
        $usrId = $this->m_model->selectOne('id',$selectOnes->created_by,'users');
        $cab = $this->m_model->selectOne('id',$usrId->id_cabang,'cabangs');
        $dataJ = '{
            "PIC Peminta" : "'.$usrId->username.'",
            "email" : "'.$usrId->email.'",
            "Cabang" : "'.$cab->name.'",
            "Tipe Permintaan" : "'.$selectOnes->form_type.'",
            "Status" : "Approved",
            "pesan" : "Ada Approval Terbaru Untuk Anda"
        }';
        sendsMaiils($dataJ);
        $admSuper = $this->m_model->selectOne('roles','1','users');
        $admCab = $this->m_model->selectOne('roles','2','users');
        $collAdm = [$admSuper->email,$admCab->email];
        if(count($collAdm) > 0){
            foreach ($collAdm as $value) {
                $dataJ = '{
                    "PIC Peminta" : "'.$usrId->username.'",
                    "email" : "'.$value.'",
                    "Cabang" : "'.$cab->name.'",
                    "Tipe Permintaan" : "'.$selectOnes->form_type.'",
                    "Status" : "Approved",
                    "pesan" : "Ada Approval Terbaru Untuk Anda"
                }';
                sendsMaiils($dataJ);
            }
        }

        if ($create == 1) {
            redirect('backend/notifikasi', 'refresh');
        }else{
            // $this->session->set_flashdata('gagal', 'Kesalahan Approve');
            redirect('backend/notifikasi', 'refresh');
        }
    }

    public function reject($id,$form,$flag){
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/notifikasi-reject',[
                'title' => 'Notifikasi',
                'bcrumb' => 'Notifikasi',
                'id' => $id,
                'form' => $form,
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function saveReject(){
        $data = array(
            'status'    => 4,
            'noted'    => $this->input->post('deskripsi'),
        );

        if($this->input->post('form') == 'Photo'){
            $create = $this->m_model->updateas('id', $this->input->post('id'), $data, 'photo_log');
            $selectOnes = $this->m_model->selectOne('id', $this->input->post('id'),'photo_log');
        }elseif($this->input->post('form') == 'Video'){
            $create = $this->m_model->updateas('id', $this->input->post('id'), $data, 'video_log');
            $selectOnes = $this->m_model->selectOne('id', $this->input->post('id'),'video_log');
        }elseif($this->input->post('form') == 'Pelabuhan'){
            $create = $this->m_model->updateas('id', $this->input->post('id'), $data, 'pelabuhans_log');
            $selectOnes = $this->m_model->selectOne('id', $this->input->post('id'),'pelabuhans_log');
        }elseif($this->input->post('form') == 'Armada'){
            $create = $this->m_model->updateas('id', $this->input->post('id'), $data, 'armada_log');
            $selectOnes = $this->m_model->selectOne('id', $this->input->post('id'),'armada_log');
        }

        $transApprove = $this->m_model->selectOne('id',$id,'trans_approval');
        $usrId = $this->m_model->selectOne('id',$selectOnes->created_by,'users');
        $cab = $this->m_model->selectOne('id',$usrId->id_cabang,'cabangs');
        $dataJ = '{
            "PIC Peminta" : "'.$usrId->username.'",
            "email" : "'.$usrId->email.'",
            "Cabang" : "'.$cab->name.'",
            "Tipe Permintaan" : "'.$selectOnes->form_type.'",
            "Status" : "Rejected",
            "Keterangan" : "'.$transApprove->deskripsi.'",
            "pesan" : "Ada Approval Yang Di Reject"
        }';
        sendsMaiils($dataJ);
        $admSuper = $this->m_model->selectOne('roles','1','users');
        $admCab = $this->m_model->selectOne('roles','2','users');
        $collAdm = [$admSuper->email,$admCab->email];
        if(count($collAdm) > 0){
            foreach ($collAdm as $value) {
                $dataJ = '{
                    "PIC Peminta" : "'.$usrId->username.'",
                    "email" : "'.$value.'",
                    "Cabang" : "'.$cab->name.'",
                    "Tipe Permintaan" : "'.$selectOnes->form_type.'",
                    "Status" : "Approved",
                    "Keterangan" : "'.$transApprove->deskripsi.'",
                    "pesan" : "Ada Approval Yang Di Reject"
                }';
                sendsMaiils($dataJ);
            }
        }

        // $create = $this->m_model->updateas('id', $id, $data, 'trans_approval');
        if ($create == 1) {
            redirect('backend/notifikasi', 'refresh');
        }else{
            redirect('backend/notifikasi', 'refresh');
        }
    }

    public function delete($id,$form,$flag){
        if($form == 'Photo'){
            $create = $this->m_model->destroy($id,'photo_log');
        }elseif($form == 'Video'){
            $create = $this->m_model->destroy($id,'video_log');
        }elseif($form == 'Pelabuhan'){
            $create = $this->m_model->destroy($id,'pelabuhans_log');
        }elseif($form == 'Armada'){
            $create = $this->m_model->destroy($id,'armada_log');
        }
        // $this->m_model->destroy($id,'trans_approval');
        redirect('backend/notifikasi', 'refresh');
    }
}