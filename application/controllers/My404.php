<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My404 extends CI_Controller {
    function __construct() {
        parent::__construct();
        if($this->session->userdata('language') !=null){
            $lang_active=$this->session->userdata('language');
            $this->lang->load('caption', $lang_active);
        }
        else{
            $this->lang->load('caption', 'bahasa');
        }
        //if (!$this->session->userdata('mask')) { redirect('mask'); }
    }

    public function index() {
        //$this->m_model->updateall(array('active' => 1), 'user');
        $data = array(
            'title' =>'404',
            'message' => 'Oooopsss.... Page not found!',
            'user_role' => $this->session->userdata('user_role'),
            'user_data' => $this->session->userdata('user_data')
        );
        $this->output->set_status_header('404'); 
        $this->load->view('errors/html/error_404',$data);
    }
}