<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once 'autoload.inc.php';
        use Dompdf\Dompdf;
        use Dompdf\Options;
class Laporan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_model');
    }

    protected function ci()
    {
        return get_instance();
    }

    public function index(){
        // print_r(base_url().'/images/logo2.png');
        // die();
        $data = array(
        "dataku" => array(
            "nama" => "Petani Kode",
            "url" => "http://petanikode.com"
        )
        );
        // $options = new Options();
        
        $options = new Options();
        // $options->set('isRemoteEnabled',true);      
        // $options->set('defaultFont', 'Courier');
        $options->set('isRemoteEnabled', TRUE);
        $options->set('debugKeepTemp', TRUE);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf( $options );
        // $this->load->library('pdf',$options);

        $dompdf->setPaper('A4', 'potrait');
        // $dompdf->set_options(['isRemoteEnabled' => true, 'isPhpEnabled'=>true]);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->filename = "laporan.pdf";
        $html = $this->ci()->load->view('backend/laporan', $data, TRUE);
        $dompdf->load_html($html);
        // Render the PDF
        $dompdf->set_base_path(base_url());
        $dompdf->render();

            // Output the generated PDF to Browser
        $dompdf->stream($dompdf->filename, array("Attachment" => false));

        // $_dompdf_show_warnings = true;
        // $_dompdf_warnings = [];

        // $options = new Options();
        // $options->set('defaultFont', 'Courier');
        // $options->set('isRemoteEnabled', TRUE);
        // $options->set('debugKeepTemp', TRUE);
        // $options->set('isHtml5ParserEnabled', true);
        // //$options->set('chroot', '');
        // $dompdf = new Dompdf($options);

        // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        // $dompdf->loadHtmlFile('backend/pdf',$data);


        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // $dompdf->stream();
    }

    public function create(){

        if ($this->input->post('add')) {
            $param = array(
                'roles'  => cleartext($this->input->post('roles')),
            );
            $create=$this->m_model->insertgetid($param, 'roles');
            $this->session->set_flashdata('sukses', 'Data Berhasil Di Buat');
            redirect('backend/test', 'refresh');
        }
    }

}