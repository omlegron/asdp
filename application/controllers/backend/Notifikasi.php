<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_model');
    }

    public function index(){
        if ($this->session->userdata('admin')) {
            if($this->session->userdata('admin_data')->roles == 3){
                $cekAdm = $this->session->userdata('admin_data')->id_cabang;
                $trueAdm = 'benar';
                // $record = $this->m_model->selectcustom("select trans_approval.id,
                //     trans_approval.form_type,
                //     trans_approval.form_id,
                //     trans_approval.deskripsi,
                //     trans_approval.created_at,
                //     trans_approval.status,
                //     trans_approval.user_id,
                //     users.id,
                //     users.username,
                //     users.id_cabang
                //     from trans_approval 
                //     inner join users 
                //     on trans_approval.user_id=users.id where users.id_cabang=".$cekAdm."");
                $record = $this->m_model->all('trans_approval');


            }else{
                $trueAdm = 'salah';

                $record = $this->m_model->all('trans_approval');
            }
            $this->load->view('backend/notifikasi',[
                'title' => 'Notifikasi',
                'bcrumb' => 'Notifikasi',
                'record' => $record,
                'trueAdm' => $trueAdm,
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function approve($id){
        $data = array(
            'status'    => 'Approved',
        );

        $transApprove = $this->m_model->selectOne('id',$id,'trans_approval');
        $usrId = $this->m_model->selectOne('id',$transApprove->user_id,'users');
        $cab = $this->m_model->selectOne('id',$usrId->id_cabang,'cabangs');
        $dataJ = '{
            "PIC Peminta" : "'.$usrId->username.'",
            "email" : "'.$usrId->email.'",
            "Cabang" : "'.$cab->name.'",
            "Tipe Permintaan" : "'.$transApprove->form_type.'",
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
                    "Tipe Permintaan" : "'.$transApprove->form_type.'",
                    "Status" : "Approved",
                    "pesan" : "Ada Approval Terbaru Untuk Anda"
                }';
                sendsMaiils($dataJ);
            }
        }

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

        $transApprove = $this->m_model->selectOne('id',$id,'trans_approval');
        $usrId = $this->m_model->selectOne('id',$transApprove->user_id,'users');
        $cab = $this->m_model->selectOne('id',$usrId->id_cabang,'cabangs');
        $dataJ = '{
            "PIC Peminta" : "'.$usrId->username.'",
            "email" : "'.$usrId->email.'",
            "Cabang" : "'.$cab->name.'",
            "Tipe Permintaan" : "'.$transApprove->form_type.'",
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
                    "Tipe Permintaan" : "'.$transApprove->form_type.'",
                    "Status" : "Approved",
                    "Keterangan" : "'.$transApprove->deskripsi.'",
                    "pesan" : "Ada Approval Yang Di Reject"
                }';
                sendsMaiils($dataJ);
            }
        }

        $create = $this->m_model->updateas('id', $id, $data, 'trans_approval');
        if ($create == 1) {
            redirect('backend/notifikasi', 'refresh');
        }else{
            redirect('backend/notifikasi', 'refresh');
        }
    }

    public function delete($id){
        $this->m_model->destroy($id,'trans_approval');
        redirect('backend/notifikasi', 'refresh');
    }
}