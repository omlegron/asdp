<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        //if (!$this->session->userdata('mask')) { redirect('mask'); }
    }

    public function index() {
        $bahasa=$this->input->post('ls_lang');
        if(!$this->input->post('ls_lang')){
            $bahasa=$this->input->post('ls_lang_mobile');
        }
        $this->session->unset_userdata('language');
        $this->session->set_userdata('language', $bahasa);
        if ($this->agent->referrer() != null)
        {
            redirect($this->agent->referrer());
        }
        else{

        }

    }

//---------------
}
