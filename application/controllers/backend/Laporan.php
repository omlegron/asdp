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
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/laporan',[
                'title' => 'Laporan Pelabuhan',
                'bcrumb' => 'Laporan > Laporan',
                'record' => $this->m_model->all('pelabuhans'),
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }
    
    public function print($id){
        // $input = $this->m_model->selectOne('id',$id,'pelabuhans')->url_canvas;
        // $output = 'images/files.png';
        // file_put_contents($output, file_get_contents($input));
        // // print_r($this->m_model->selectOne('id',$id,'pelabuhans')->url_canvas);
        // die();
        $data = array(
            "data" => array(
                "judul" => 'PELABUHAN',
                "record" => $this->m_model->selectOne('id',$id,'pelabuhans'),
            )
        );
        
        $options = new Options();
        // $options->set('isRemoteEnabled',true);      
        // $options->set('defaultFont', 'Courier');
        $options->set('isRemoteEnabled', TRUE);
        $options->set('debugKeepTemp', TRUE);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf( $options );

        $dompdf->setPaper('A4', 'potrait');
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->filename = 'laporan'.$this->m_model->selectOne('id',$id,'pelabuhans')->name.".pdf";
        $html = $this->load->view('backend/laporan-pdf', $data, TRUE);
        $dompdf->load_html($html);
        // Render the PDF
        // $dompdf->set_base_path(base_url());
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($dompdf->filename, array("Attachment" => false));
    }

    public function armada(){
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/laporan-armada',[
                'title' => 'Laporan Pelabuhan',
                'bcrumb' => 'Laporan > Laporan',
                'record' => $this->m_model->all('pelabuhans'),
            ]);
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function printarmada($id){
        // $input = $this->m_model->selectOne('id',$id,'pelabuhans')->url_canvas;
        // $output = 'images/files.png';
        // file_put_contents($output, file_get_contents($input));
        // // print_r($this->m_model->selectOne('id',$id,'pelabuhans')->url_canvas);
        // die();
        $data = array(
            "data" => array(
                "judul" => 'ARMADA',
                "record" => $this->m_model->selectOne('id',$id,'armada'),
            )
        );
        
        $options = new Options();
        // $options->set('isRemoteEnabled',true);      
        // $options->set('defaultFont', 'Courier');
        $options->set('isRemoteEnabled', TRUE);
        $options->set('debugKeepTemp', TRUE);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf( $options );

        $dompdf->setPaper('A4', 'potrait');
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->filename = 'laporan'.$this->m_model->selectOne('id',$id,'armada')->name.".pdf";
        $html = $this->load->view('backend/laporan-pdf-armada', $data, TRUE);
        $dompdf->load_html($html);
        // Render the PDF
        // $dompdf->set_base_path(base_url());
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($dompdf->filename, array("Attachment" => false));
    }

}