<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_model');
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
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/home');
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function shipment() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/shipment');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $param = array(
                'name'          => $this->input->post('name'),
                'shipment'      => $this->input->post('shipment'),
                'description'   => $this->input->post('description')
            );
            if ($this->m_model->create($param, 'shipment') == 1) {
                redirect('panel/shipment', 'refresh');
            }
        }

        if ($this->input->post('save')) {
            $param = array(
                'name'          => $this->input->post('name'),
                'shipment'      => $this->input->post('shipment'),
                'description'   => $this->input->post('description')
            );
            if ($this->m_model->updateas('id', $this->input->post('id'), $param, 'shipment') == 1) {
                redirect('panel/shipment', 'refresh');
            }
        }

        //---
        if ($this->input->get('remove')) {
            $this->db->delete('shipment', array('id' => $this->input->get('remove')));
            redirect('panel/shipment', 'refresh');
        }
    }

    public function transactionMembership() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/transactionMembership');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->get('reject')) {
            //get invoices
            $invoices_membership = $this->m_model->selectas('id', $this->input->get('reject'), 'invoices_membership');
            foreach ($invoices_membership as $key => $value) {
                # code...
                $date_current=date('Y-m-d');
                $next_date=date('Y-m-d', strtotime(' +'.$value->period.' month'));
                $user_id=$value->user_id;
            }
            $param = array(
                'status_payment'        => 3,
                'status'                => 0,
            );
            if ($this->m_model->updateas('id', $this->input->get('reject'), $param, 'invoices_membership')) {
                redirect('panel/transactionMembership', 'refresh');
            }
        }

        if ($this->input->get('activating')) {
            //get invoices
            $invoices_membership = $this->m_model->selectas('id', $this->input->get('activating'), 'invoices_membership');
            foreach ($invoices_membership as $key => $value) {
                # code...
                $date_current=date('Y-m-d');
                $next_date=date('Y-m-d', strtotime(' +'.$value->period.' month'));
                $badge=$value->badge;
                $user_id=$value->user_id;
            }
            $param = array(
                'status_payment'        => 2,
                'status'                => 1,
                'date_actived'          => $date_current,
                'date_expired'          => $next_date,
            );
            if ($this->m_model->updateas('id', $this->input->get('activating'), $param, 'invoices_membership')) {
                $param_store['badge']=$badge;
                $this->m_model->updateas('user',  $user_id, $param_store, 'store');
                redirect('panel/transactionMembership', 'refresh');
            }
        }

        if ($this->input->post('save')) {
            $param = array(
                'type'          => $this->input->post('type'),
            );
            if ($this->m_model->updateas('id', $this->input->post('id'), $param, 'membership') == 1) {
                redirect('panel/membership', 'refresh');
            }
        }

        //---
        if ($this->input->get('remove')) {
            $this->db->delete('membership', array('id' => $this->input->get('remove')));
            redirect('panel/membership', 'refresh');
        }
    }

    public function membership() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/membership');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $param = array(
                'type'          => $this->input->post('type'),
            );
            if ($this->m_model->create($param, 'membership') == 1) {
                redirect('panel/membership', 'refresh');
            }
        }

        if ($this->input->post('save')) {
            $param = array(
                'type'          => $this->input->post('type'),
            );
            if ($this->m_model->updateas('id', $this->input->post('id'), $param, 'membership') == 1) {
                redirect('panel/membership', 'refresh');
            }
        }

        //---
        if ($this->input->get('remove')) {
            $this->db->delete('membership', array('id' => $this->input->get('remove')));
            redirect('panel/membership', 'refresh');
        }
    }

    public function membership_desc() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/membership_desc');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $param = array(
                'title'          => $this->input->post('title'),
                'title_eng'          => $this->input->post('title_eng'),
            );
            if ($this->m_model->create($param, 'membership_desc') == 1) {
                redirect('panel/membership_desc', 'refresh');
            }
        }

        if ($this->input->post('save')) {
            $param = array(
                'title'          => $this->input->post('title'),
                'title_eng'          => $this->input->post('title_eng'),
            );
            if ($this->m_model->updateas('id', $this->input->post('id'), $param, 'membership_desc') == 1) {
                redirect('panel/membership_desc', 'refresh');
            }
        }

        //---
        if ($this->input->get('remove')) {
            $this->db->delete('membership_desc', array('id' => $this->input->get('remove')));
            redirect('panel/membership_desc', 'refresh');
        }
    }

    public function membership_detail() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/membership_detail');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $param = array(
                'membership_id'          => $this->input->post('membership_id'),
                'period'          => $this->input->post('period'),
                'price'          => $this->input->post('price'),
                'status_best'          => $this->input->post('status_best'),
                'order_display'          => $this->input->post('order_display'),
                'status_promotion'          => $this->input->post('status_promotion')
            );
            $membership_detail_id=$this->m_model->insertgetid($param, 'membership_detail');
            if ($membership_detail_id>0) {
                // membership_detail_fitur akan diinput satu persatu berdasarkan jumlah membership_desc
                $membership_desc = $this->m_model->select('membership_desc');
                $done_membership_detail_fitur=0;
                foreach ($membership_desc as $key_fitur => $value_membership_desc) {
                    $note='No';
                    if($this->input->post('membership_desc_id_'.$key_fitur)){
                        $note=$this->input->post('note_'.$key_fitur);
                    }
                    $param_fitur= array(
                            'membership_detail_id'          => $membership_detail_id,
                            'membership_desc_id'          => $value_membership_desc->id,
                            'note'          => $note
                        );
                    if($this->m_model->create($param_fitur, 'membership_detail_fitur')){
                        $done_membership_detail_fitur++;
                    }
                }
                redirect('panel/membership_detail', 'refresh');
            }
        }

        if ($this->input->post('save')) {
             $param = array(
                'membership_id'          => $this->input->post('membership_id'),
                'period'          => $this->input->post('period'),
                'price'          => $this->input->post('price'),
                'status_best'          => $this->input->post('status_best'),
                'order_display'          => $this->input->post('order_display'),
                'status_promotion'          => $this->input->post('status_promotion')
            );
            if ($this->m_model->updateas('id', $this->input->post('id'), $param, 'membership_detail') == 1) {
                // membership_detail_fitur akan diinput satu persatu berdasarkan jumlah membership_desc
                $membership_desc = $this->m_model->select('membership_desc');
                $done_membership_detail_fitur=0;
                foreach ($membership_desc as $key_fitur => $value_membership_desc) {
                    $note='No';
                    if($this->input->post('membership_desc_id_'.$key_fitur)){
                        $note=$this->input->post('note_'.$key_fitur);
                    }
                    $check_membership_fitur=$this->m_model->selectas2('membership_detail_id', $this->input->post('id'), 'membership_desc_id', $value_membership_desc->id, 'membership_detail_fitur');
                    //kalau suda ada maka akan otomatis ke update
                    if(count($check_membership_fitur)>0){
                        $param_fitur= array(
                            'note'          => $note
                        );
                        if($this->m_model->updateas2('membership_detail_id', $this->input->post('id'), 'membership_desc_id', $value_membership_desc->id, $param_fitur, 'membership_detail_fitur')){
                            $done_membership_detail_fitur++;
                        }
                    }
                    else{
                    //kalau belum ada maka akan otomatis ke insert baru
                        $param_fitur= array(
                            'membership_detail_id'          => $this->input->post('id'),
                            'membership_desc_id'          => $value_membership_desc->id,
                            'note'          => $note
                        );
                        if($this->m_model->create($param_fitur, 'membership_detail_fitur')){
                            $done_membership_detail_fitur++;
                        }

                    }
                }
                redirect('panel/membership_detail', 'refresh');
            }
        }

        //---
        if ($this->input->get('remove')) {
            $this->db->delete('membership_detail', array('id' => $this->input->get('remove')));
            redirect('panel/membership_detail', 'refresh');
        }
    }

    public function payment() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/payment');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $param = array(
                'name'          => $this->input->post('name'),
                'account'      => $this->input->post('account'),
                'description'   => $this->input->post('description')
            );
            if ($this->m_model->create($param, 'payment') == 1) {
                redirect('panel/payment', 'refresh');
            }
        }

        if ($this->input->post('save')) {
            $param = array(
                'name'          => $this->input->post('name'),
                'account'      => $this->input->post('account'),
                'description'   => $this->input->post('description')
            );
            if ($this->m_model->updateas('id', $this->input->post('id'), $param, 'payment') == 1) {
                redirect('panel/payment', 'refresh');
            }
        }

        //---
        if ($this->input->get('remove')) {
            $this->db->delete('payment', array('id' => $this->input->get('remove')));
            redirect('panel/payment', 'refresh');
        }
    }

    public function pages() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/pages');
        } else {
            redirect('panel/login', 'refresh');
        }

        //---
        if ($this->input->post('add')) {
            //$ref = rand(10000, 1000000000);
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('eng_title'))))));

            $eng = array(
              //  'ref'         => $ref,
                'lang'        => 'eng',
                'title'       => $this->input->post('eng_title'),
                'seo'         => $seo,
                'description' => $this->input->post('eng_desc'),
                'created'     => date('Y-m-d h:i:s'),
            );

            $id = array(
                //'ref'         => $ref,
                'lang'        => 'id',
                'title'       => $this->input->post('id_title'),
                'seo'         => $seo,
                'description' => $this->input->post('id_desc'),
                'created'     => date('Y-m-d h:i:s'),
            );

            if ($this->m_model->create($eng, 'pages') == 1
                && $this->m_model->create($id, 'pages') == 1
            ) {
                redirect('panel/pages', 'refresh');
            }
        }
        //---
        if ($this->input->post('save')) {
            $ref = $this->input->post('ref');
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('eng_title'))))));

            $eng = array(
                'lang'        => 'eng',
                'title'       => $this->input->post('eng_title'),
                'seo'         => $seo,
                'description' => $this->input->post('eng_desc'),
            );

            $id = array(
                'lang'        => 'id',
                'title'       => $this->input->post('id_title'),
                'seo'         => $seo,
                'description' => $this->input->post('id_desc'),
            );

            if ($this->m_model->updateas2('seo', $this->input->post('ref'), 'lang', 'id', $id,
                    'pages') == 1
                && $this->m_model->updateas2('seo', $this->input->post('ref'), 'lang', 'eng', $eng,
                    'pages') == 1
            ) {
                redirect('panel/pages', 'refresh');
            }
        }
        //---
    }

    public function orders() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/orders');
        } else {
            redirect('panel/login', 'refresh');
        }

        //---
        if ($this->input->post('confirm')) {
        $update = $this->m_model->updateas('id', $this->input->post('order'), array('orders_status' => 3), 'orders_store');
            if ($update == 1) {
                notifyOrder($this->input->post('order'), 3);
                redirect($_SERVER['REQUEST_URI'], 'refresh');
            }
        }

        if ($this->input->post('cancel')) {
        $update = $this->m_model->updateas('id', $this->input->post('order'), array('orders_status' => 4), 'orders_store');
            if ($update == 1) {
                notifyOrder($this->input->post('order'), 4);
                redirect($_SERVER['REQUEST_URI'], 'refresh');
            }
        }
    }

    public function products() {
        if (!$this->session->userdata('admin')) {
            redirect('panel/login', 'refresh');
        } 
        $data=array();
        //print_r($this->input->post());
        //die();
        if($this->input->get('update')!=null && $this->input->get('product_featured')!=null) {
            $update=false;
            if($this->input->get('product_featured') == 1){
                //status sedang actived
                //diubah menjadi deactived
                $data=array(
                        "product_featured"=>0
                        );
                $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'product_store');
            }
            else if($this->input->get('product_featured') == 0){
                //status sedang deactived
                //diubah menjadi actived
                $data=array(
                        "product_featured"=>1
                        );
                //check produk feature karena harusnya cuma ada 4
                $num_pro_feat=$this->m_model->selectcustom('select count(id) as sum_of from product_store where product_featured=1');
                if($num_pro_feat[0]->sum_of<4){
                    $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'product_store');
                }
                else{
                    $data['err']="product_featured_over_limit";
                }
            }

            if($update==1){
                redirect('panel/products', 'refresh');
            }
            else if($update==0){
                $data['err']="failed_update_product_featured";
            }
        }

        if($this->input->get('update')!=null && $this->input->get('flash_sale')!=null) {
            $update=false;
            if($this->input->get('flash_sale') == 1){
                //status sedang actived
                //diubah menjadi deactived
                $data=array(
                        "flash_sale"=>0
                        );
                $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'product_store');
            }
            else if($this->input->get('flash_sale') == 0){
                //status sedang deactived
                //diubah menjadi actived
                $data=array(
                        "flash_sale"=>1
                        );
                //check produk feature karena harusnya cuma ada 4
                $num_pro_feat=$this->m_model->selectcustom('select count(id) as sum_of from product_store where flash_sale=1');
                if($num_pro_feat[0]->sum_of<4){
                    $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'product_store');
                }
                else{
                    $data['err']="flash_sale_over_limit";
                }
            }

            if($update==1){
                redirect('panel/products', 'refresh');
            }
            else if($update==0){
                $data['err']="failed_update_flash_sale";
            }
        }

        if($this->input->get('update')!=null && $this->input->get('best_seller')!=null) {
            $update=false;
            if($this->input->get('best_seller') == 1){
                //status sedang actived
                //diubah menjadi deactived
                $data=array(
                        "best_seller"=>0
                        );
                $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'product_store');
            }
            else if($this->input->get('best_seller') == 0){
                //status sedang deactived
                //diubah menjadi actived
                $data=array(
                        "best_seller"=>1
                        );
                //check best seller karena harusnya cuma ada 4
                $num_pro_feat=$this->m_model->selectcustom('select count(id) as sum_of from product_store where best_seller=1');
                if($num_pro_feat[0]->sum_of<4){
                    $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'product_store');
                }
                else{
                    $data['err']="best_seller_over_limit";
                }
            }

            if($update==1){
                redirect('panel/products', 'refresh');
            }
            else if($update==0){
                $data['err']="failed_update_best_seller";
            }
        }
        if($this->input->get('update')!=null && $this->input->get('most_popular')!=null) {
            $update=false;
            if($this->input->get('most_popular') == 1){
                //status sedang actived
                //diubah menjadi deactived
                $data=array(
                        "most_popular"=>0
                        );
                $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'product_store');
            }
            else if($this->input->get('most_popular') == 0){
                //status sedang deactived
                //diubah menjadi actived
                $data=array(
                        "most_popular"=>1
                        );
                //check most popular karena harusnya cuma ada 4
                $num_pro_feat=$this->m_model->selectcustom('select count(id) as sum_of from product_store where most_popular=1');
                if($num_pro_feat[0]->sum_of<4){
                    $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'product_store');
                }
                else{
                    $data['err']="most_popular_over_limit";
                }
            }

            if($update==1){
                redirect('panel/products', 'refresh');
            }
            else if($update==0){
                $data['err']="failed_update_most_popular";
            }
        }
        print_r($this->input->post('save'));
        if($this->input->post('save')){
            $param=array('category_parent'=>$this->input->post('category_parent'),
                        'category_sub'=>$this->input->post('category_sub'),
                        'category_child'=>$this->input->post('category_child'));
            if($this->m_model->updateas('id', $this->input->post('product_id'), $param, 'product')){
                redirect(base_url().'panel/products');
            }
            else{
                redirect(base_url().'panel/products?edit='.$this->input->get('edit'));
            }
        }

        if($this->input->post('upload_product')!=null) {
            $data=array();
            $this->load->library('Getcsv');
            $update=false;
            $csv_path="";
            if (!empty($_FILES['cvs_product']['name'])) {
                $config['upload_path']   = FCPATH.'/uploads/csv_product/';
                $config['allowed_types'] = 'csv';
                $config['max_size'] = 300000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('cvs_product')){
                    $csv_path='uploads/csv_product/'.$this->upload->data('file_name');
                }
                $data = $this->getcsv->set_file_path($csv_path)->get_csv_array();
            }

            $data_insert=null;
            if(isset($data['delimiter']) && $data['delimiter']==';'){
                $i = 0;
                //print_r($data);
                foreach ($data['data'] as $key => $value) {
                    # code...
                    if($key>0){
                        //this is data
                        foreach ($value as $key_data => $value_data) {
                            $data_insert[$key][$colom[$key_data]]=$value_data;
                        }
                    }
                    else{
                        //this is colom when index on 0
                        foreach ($value as $key_colom => $value_colom) {
                            # code...
                            $colom[]=strtolower($value_colom);
                        }
                    }
                }
            }
            /*print_r($data['data']['565']);
            echo "<br>";
            print_r($data['data']['566']);
            echo "<br>";
            print_r($data['data']['567']);
            echo "<br>";*/
            //print_r($data_insert);
            //$desc=clean_string($data_insert[9]['desc']);
            //echo "<Br><Br>".$desc;
            //die();
            //split data cvs
            //data for product
            if(count($data_insert)>0){
                foreach ($data_insert as $key_insert => $value_insert) {
                    if(!isset($value_insert['store'])){
                        continue;
                    }
                    # code...
                    $product_insertId=0;
                    $name_folder=$value_insert['user']."-".$value_insert['store'];
                    $product=array(
                                "store"=>$value_insert['store'],
                                "quantity"=>$value_insert['quantity'],
                                "weight"=>$value_insert['weight'],
                                "sku"=>$value_insert['sku'],
                                "category_parent"=>$value_insert['category_parent'],
                                "category_sub"=>$value_insert['category_sub'],
                                "category_child"=>$value_insert['category_child']);
                    $product_insertId=$this->m_model->insertgetid($product, 'product');
                    if ($product_insertId > 0) {
                        $product_store=array(
                                    "product"=>$product_insertId,
                                    "store"=>$value_insert['store'],
                                    "user"=>$value_insert['user'],
                                    "price"=>$value_insert['price'],
                                    "price_basic"=>$value_insert['price_basic']);

                        $product_store_insert=$this->m_model->create($product_store, 'product_store');


                        $product_lang=array(
                                    "product"=>$product_insertId,
                                    "lang"=>$value_insert['lang'],
                                    "title"=>$value_insert['title'],
                                    "seo"=>rand(0,100).$value_insert['store'].'-'.url_title(strtolower($value_insert['title'])),
                                    "description"=>clean_string($value_insert['description']));

                        $product_lang_insert=$this->m_model->create($product_lang, 'product_lang');

                        $file_info=pathinfo(clean_string($value_insert['image']));
                        $product_image=array(
                                    "product"=>$product_insertId,
                                    "thumbnail"=>$name_folder."/".clean_string($file_info['filename'].'_thumb.'.$file_info['extension']),
                                    "small"=>$name_folder."/".clean_string($value_insert['image']),
                                    "large"=>$name_folder."/".clean_string($value_insert['image']),
                                    "main"=>'');
                        $product_image_insert=$this->m_model->create($product_image, 'product_image');

                        for($i=1; $i<=3; $i++){
                            # code...
                            $product_image="";
                            $file_info='';
                            if(isset($value_insert['image'.$i]) && !empty($value_insert['image'.$i])){
                                $file_info=pathinfo(clean_string($value_insert['image'.$i]));
                                $product_image=array(
                                        "product"=>$product_insertId,
                                        "thumbnail"=>$name_folder."/".clean_string($file_info['filename'].'_thumb.'.$file_info['extension']),
                                        "small"=>$name_folder."/".clean_string($value_insert['image'.$i]),
                                        "large"=>$name_folder."/".clean_string($value_insert['image'.$i]),
                                        "main"=>'');

                                $product_image_insert=$this->m_model->create($product_image, 'product_image');
                            }
                        }
                    }
                }
                //remove file from server after done for all
                unlink($csv_path);
                redirect('panel/products', 'refresh');
            }
            else{
                //remove file from server after done for all
                if($csv_path !=null){
                    unlink($csv_path);
                }
                if(isset($data['delimiter']) && $data['delimiter']!=';'){
                    $data['err']="Delimiter invalid should use ; (semicolon)";
                }
                else{
                    $data['err']="CSV is NULL";
                }
            }
        }

        if($this->session->userdata('admin')) {
            $this->load->view('backend/products', $data);
        }
    }

    public function categories() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/categories');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data = array(
                'name' => $this->input->post('name'),
                'name_id' => $this->input->post('name_id'),
                'seo' => $seo
            );
            
            if (!empty($_FILES['main_thumbnail']['name'])) {
                $config['upload_path']   = FCPATH.'/images/category/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 300000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('main_thumbnail')){
                    $data['main_thumbnail']='images/category/'.$this->upload->data('file_name');
                }
            }
            if (!empty($_FILES['thumbnail1']['name'])) {
                $config1['upload_path']   = FCPATH.'/images/category/';
                $config1['allowed_types'] = 'jpg|png|jpeg';
                $config1['max_size'] = 300000;
                $config1['file_name'] = uniqid();
                $this->load->library('upload',$config1);
                $this->upload->initialize($config1);
                if ($this->upload->do_upload('thumbnail1')){
                    $data['thumbnail1']='images/category/'.$this->upload->data('file_name');
                }
            }
            if (!empty($_FILES['thumbnail2']['name'])) {
                $config2['upload_path']   = FCPATH.'/images/category/';
                $config2['allowed_types'] = 'jpg|png|jpeg';
                $config2['max_size'] = 300000;
                $config2['file_name'] = uniqid();
                $this->load->library('upload',$config2);
                $this->upload->initialize($config2);
                if ($this->upload->do_upload('thumbnail2')){
                    $data['thumbnail2']='images/category/'.$this->upload->data('file_name');
                }
            }

            if ($this->m_model->create($data, 'category_parent') == 1) {
                redirect('panel/categories', 'refresh');
            } else {
                redirect('panel/categories', 'refresh');
            }
        }
        if ($this->input->post('save')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data   = array(
                'name' => $this->input->post('name'),
                'name_id' => $this->input->post('name_id'),
                'seo' => $seo
            );
            if (!empty($_FILES['main_thumbnail']['name'])) {
                $config['upload_path']   = FCPATH.'/images/category/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 300000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('main_thumbnail')){
                    $data['main_thumbnail']='images/category/'.$this->upload->data('file_name');
                }
            }
            if (!empty($_FILES['thumbnail1']['name'])) {
                $config1['upload_path']   = FCPATH.'/images/category/';
                $config1['allowed_types'] = 'jpg|png|jpeg';
                $config1['max_size'] = 300000;
                $config1['file_name'] = uniqid();
                $this->load->library('upload',$config1);
                $this->upload->initialize($config1);
                if ($this->upload->do_upload('thumbnail1')){
                    $data['thumbnail1']='images/category/'.$this->upload->data('file_name');
                }
            }
            if (!empty($_FILES['thumbnail2']['name'])) {
                $config2['upload_path']   = FCPATH.'/images/category/';
                $config2['allowed_types'] = 'jpg|png|jpeg';
                $config2['max_size'] = 300000;
                $config2['file_name'] = uniqid();
                $this->load->library('upload',$config2);
                $this->upload->initialize($config2);
                if ($this->upload->do_upload('thumbnail2')){
                    $data['thumbnail2']='images/category/'.$this->upload->data('file_name');
                }
            }

            $update = $this->m_model->updateas('id', $this->input->post('id'), $data,
                'category_parent');
            if ($update == 1) {
                redirect('panel/categories', 'refresh');
            } else {
                redirect('panel/categories', 'refresh');
            }
        }
        if ($this->input->post('save_order_nav')) {
            $category = $this->m_model->select('category_parent');
            $num_category=count($category);
            //$update_success=0;
            if (count($category) > 0) {
                foreach ($category as $key => $value) {
                    $data   = array(
                        'order_nav' => $this->input->post('order_navbar_'.$value->id)
                    );
                    $update = $this->m_model->updateas('id', $this->input->post('id_'.$value->id), $data, 'category_parent');
                }
            }

            redirect('panel/categories', 'refresh');
        }

        if($this->input->get('update')!=null && $this->input->get('top_category')!=null) {
            $update=false;
            if($this->input->get('top_category') == 1){
                //status sedang actived
                //diubah menjadi deactived
                $data=array(
                        "top_category"=>0
                        );
                $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'category_parent');
            }
            else if($this->input->get('top_category') == 0){
                //status sedang deactived
                //diubah menjadi actived
                $data=array(
                        "top_category"=>1
                        );
                //check top category karena harusnya cuma ada 4
                $num_pro_feat=$this->m_model->selectcustom('select count(id) as sum_of from category_parent where top_category=1');
                if($num_pro_feat[0]->sum_of<4){
                    $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'category_parent');
                }
                else{
                    $data['err']="top_category_over_limit";
                }
            }

            if($update==1){
                redirect('panel/categories', 'refresh');
            }
            else if($update==0){
                $data['err']="failed_update_top_category";
            }
        }
        if ($this->input->get('remove')) {
            $this->db->delete('category_parent', array('id' => $this->input->get('remove')));
            redirect('panel/categories', 'refresh');
        }
        //---
        if ($this->input->post('addsub')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data = array(
                'category_parent' => $this->input->post('category_parent'),
                'name'            => $this->input->post('name'),
                'name_id' => $this->input->post('name_id'),
                'seo' => $seo
            );
            if ($this->m_model->create($data, 'category_sub') == 1) {
                redirect('panel/categories', 'refresh');
            } else {
                redirect('panel/categories', 'refresh');
            }
        }
        if ($this->input->post('savesub')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data   = array(
                'category_parent' => $this->input->post('category_parent'),
                'name'            => $this->input->post('name'),
                'name_id' => $this->input->post('name_id'),
                'seo' => $seo
            );
            $update = $this->m_model->updateas('id', $this->input->post('id'), $data,
                'category_sub');
            if ($update == 1) {
                redirect('panel/categories', 'refresh');
            } else {
                redirect('panel/categories', 'refresh');
            }
        }
        if ($this->input->get('removesub')) {
            $this->db->delete('category_sub', array('id' => $this->input->get('removesub')));
            redirect('panel/categories', 'refresh');
        }
        //---
        if ($this->input->post('addchild')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data = array(
                'category_sub' => $this->input->post('category_sub'),
                'name'         => $this->input->post('name'),
                'name_id' => $this->input->post('name_id'),
                'seo' => $seo
            );
            if ($this->m_model->create($data, 'category_child') == 1) {
                redirect('panel/categories', 'refresh');
            } else {
                redirect('panel/categories', 'refresh');
            }
        }
        if ($this->input->post('savechild')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data   = array(
                'category_sub' => $this->input->post('category_sub'),
                'name'         => $this->input->post('name'),
                'name_id' => $this->input->post('name_id'),
                'seo' => $seo
            );
            $update = $this->m_model->updateas('id', $this->input->post('id'), $data,
                'category_child');
            if ($update == 1) {
                redirect('panel/categories', 'refresh');
            } else {
                redirect('panel/categories', 'refresh');
            }
        }
        if ($this->input->get('removechild')) {
            $this->db->delete('category_child', array('id' => $this->input->get('removechild')));
            redirect('panel/categories', 'refresh');
        }
    }

    public function brands() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/brands');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data = array(
                'name' => $this->input->post('name'),
                'seo' => $seo
            );
            
            if (!empty($_FILES['logo']['name'])) {
                $config['upload_path']   = FCPATH.'/assets/frontend/img/brands/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 100;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('logo')){
                    $data['logo']='assets/frontend/img/brands/'.$this->upload->data('file_name');

                    $config_kompres['image_library'] = 'gd2';
                    $config_kompres['source_image'] = $this->upload->data('full_path');
                    $config_kompres['new_image'] = FCPATH.'assets/frontend/img/brands/compress_'.$this->upload->data('file_name');
                    $config_kompres['maintain_ratio'] = TRUE;
                    $config_kompres['width']         = 110;

                    $this->load->library('image_lib', $config_kompres);
                    if($this->image_lib->resize()){
                        $data['thumbnail_logo']='assets/frontend/img/brands/compress_'.$this->upload->data('file_name');
                    }
                }
            }
            if ($this->m_model->create($data, 'brands') == 1) {
                redirect('panel/brands', 'refresh');
            } else {
                redirect('panel/brands', 'refresh');
            }
        }

        if ($this->input->post('save')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data   = array(
                'name' => $this->input->post('name'),
                'seo' => $seo
            );
            if (!empty($_FILES['logo']['name'])) {
                $config['upload_path']   = FCPATH.'/assets/frontend/img/brands/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 100;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('logo')){
                    $data['logo']='assets/frontend/img/brands/'.$this->upload->data('file_name');

                    $config_kompres['image_library'] = 'gd2';
                    $config_kompres['source_image'] = $this->upload->data('full_path');
                    $config_kompres['new_image'] = FCPATH.'assets/frontend/img/brands/compress_'.$this->upload->data('file_name');
                    $config_kompres['maintain_ratio'] = TRUE;
                    $config_kompres['width']         = 110;

                    $this->load->library('image_lib', $config_kompres);
                    if($this->image_lib->resize()){
                        $data['thumbnail_logo']='assets/frontend/img/brands/compress_'.$this->upload->data('file_name');
                        if($this->input->post('old_logo')!=null){
                            unlink(FCPATH.$this->input->post('old_logo'));
                        }
                        if($this->input->post('old_thumbnail_logo')!=null){
                            unlink(FCPATH.$this->input->post('old_thumbnail_logo'));
                        }
                    }
                }
            }

            $update = $this->m_model->updateas('id', $this->input->post('id'), $data,
                'brands');
            if ($update == 1) {
                redirect('panel/brands', 'refresh');
            } else {
                redirect('panel/brands', 'refresh');
            }
        }

        if($this->input->get('update')!=null && $this->input->get('popular_brand')!=null) {
            $update=false;
            if($this->input->get('popular_brand') == 1){
                //status sedang actived
                //diubah menjadi deactived
                $data=array(
                        "popular_brand"=>0
                        );
                $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'brands');
            }
            else if($this->input->get('popular_brand') == 0){
                //status sedang deactived
                //diubah menjadi actived
                $data=array(
                        "popular_brand"=>1
                        );
                $update = $this->m_model->updateas('id', $this->input->get('update'), $data, 'brands');
            }

            if($update==1){
                redirect('panel/brands', 'refresh');
            }
            else if($update==0){
                $data['err']="failed_update_popular_brand";
            }
        }
        if ($this->input->get('remove')) {
            $this->db->delete('brands', array('id' => $this->input->get('remove')));
            redirect('panel/brands', 'refresh');
        }
    }

    public function voucher() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/voucher');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $products = '';
            $shipping = '0';
            if($this->input->post('shipping') != null){
                $shipping = $this->input->post('shipping');
            }
            $voucher = array(
                'name'     => $this->input->post('name'),
                'variant'  => $this->input->post('type'),
                'coupon'   => $this->input->post('code'),
                'minimal'  => $this->input->post('min'),
                'shipping' => $shipping,
                'value'    => $this->input->post('value'),
                'status'   => $this->input->post('status'),
                'kuota'   => $this->input->post('kuota'),
                'started'  => date("Y-m-d", strtotime($this->input->post('start'))),
                'ended'    => date("Y-m-d", strtotime($this->input->post('end'))),
                'created'  => date('Y-m-d h:i:s'),
            );
            $create_voucher=$this->m_model->insertgetid($voucher, 'voucher');
            if ($create_voucher > 0) {
                //jika input voucher berhasil, next buat data voucher_detail 
                if ($this->input->post('product') != '') {
                    foreach ($this->input->post('product') as $products) {
                        $voucher_detail=array(
                            'voucher'=>$create_voucher,
                            'product'=>$products
                                        );
                        print_r($voucher_detail);
                        //die();
                        if($this->m_model->create($voucher_detail, 'voucher_detail'));
                    }
                }
                else{
                    //jika voucher berlaku semua produk (All)
                    $products=$this->input->post('product_all');
                    $voucher_detail=array(
                            'voucher'=>$create_voucher,
                            'product'=>$products
                                        );
                    if($this->m_model->create($voucher_detail, 'voucher_detail'));
                }
                redirect('panel/voucher', 'refresh');
            }
        }
        //---
        if ($this->input->post('save')) {
            $products = '';
            $shipping = '0';
            if($this->input->post('shipping') != null){
                $shipping = $this->input->post('shipping');
            }
            $voucher = array(
                'name'     => $this->input->post('name'),
                'variant'  => $this->input->post('type'),
                'coupon'   => $this->input->post('code'),
                'minimal'  => $this->input->post('min'),
                'shipping' => $shipping,
                'value'    => $this->input->post('value'),
                'status'   => $this->input->post('status'),
                'kuota'   => $this->input->post('kuota'),
                'started'  => date("Y-m-d", strtotime($this->input->post('start'))),
                'ended'    => date("Y-m-d", strtotime($this->input->post('end'))),
            );
            if ($this->m_model->updateas('id', $this->input->post('id'), $voucher, 'voucher')
                == 1
            ) {
                //delete_detail untuk create ulang voucher_detail
                $detele_detail=$this->m_model->deleteas('voucher', $this->input->post('id'), 'voucher_detail');
                if ($detele_detail==1){
                    //jika input voucher berhasil, next buat data voucher_detail 
                    if ($this->input->post('product') != '') {
                        foreach ($this->input->post('product') as $products) {
                            $voucher_detail=array(
                                'voucher'=>$this->input->post('id'),
                                'product'=>$products
                                            );
                            if($this->m_model->create($voucher_detail, 'voucher_detail'));
                        }
                    }
                    else{
                        //jika voucher berlaku semua produk (All)
                        $products=$this->input->post('product_all');
                        $voucher_detail=array(
                                'voucher'=>$this->input->post('id'),
                                'product'=>$products
                                            );
                        if($this->m_model->create($voucher_detail, 'voucher_detail'));
                    }
                }
                redirect('panel/voucher', 'refresh');
            }
        }
        //---
        if ($this->input->get('remove')) {
            $this->db->delete('voucher', array('id' => $this->input->get('remove')));
            redirect('panel/voucher', 'refresh');
        }
    }

    public function customer() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/customer');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $data   = array(
                'name' => $this->input->post('name'),
                'email'    => $this->input->post('email'),
                'phone'    => $this->input->post('phone'),
                'gender'   => $this->input->post('gender')
            );
            $update = $this->m_model->updateas('id', $this->input->post('id'), $data, 'user');
            if ($update == 1) {
                redirect('panel/customer', 'refresh');
            } else {
                redirect('panel/customer', 'refresh');
            }
        }
        //---
        if ($this->input->get('remove')) {
            redirect('panel/customer', 'refresh');
        }
    }

    public function supplier() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/supplier');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $data   = array(
                'name' => $this->input->post('name'),
                'email'    => $this->input->post('email'),
                'phone'    => $this->input->post('phone'),
                'gender'   => $this->input->post('gender')
            );
            $update = $this->m_model->updateas('id', $this->input->post('id'), $data, 'user');
            if ($update == 1) {
                redirect('panel/supplier', 'refresh');
            } else {
                redirect('panel/supplier', 'refresh');
            }
        }
        //---
        if ($this->input->get('remove')) {
            redirect('panel/supplier', 'refresh');
        }
    }

    public function marketer() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/marketer');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $data   = array(
                'name' => $this->input->post('name'),
                'email'    => $this->input->post('email'),
                'phone'    => $this->input->post('phone'),
                'gender'   => $this->input->post('gender'),
            );
            $update = $this->m_model->updateas('id', $this->input->post('id'), $data, 'user');
            if ($update == 1) {
                redirect('panel/marketer', 'refresh');
            } else {
                redirect('panel/marketer', 'refresh');
            }
        }
        //---
        if ($this->input->get('remove')) {
            redirect('panel/marketer', 'refresh');
        }
    }

    public function withdraw() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/withdraw');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->get('status')) {
            $allow_status=array(0,1,2,3); //0=pending; 1=proses; 2=completed; 3=rejected
            $data=array();
            $status=base64_decode($this->input->get('status'));
            $update_saldo_wallet=TRUE;
            if(in_array($status, $allow_status)){
                $data   = array(
                    'status' => $status,
                );
                $update = $this->m_model->updateas('id', $this->input->get('id'), $data, 'withdraw');
                if($status == 2){
                    //tidak ada proses pengurangan saldo lagi, karena pengurangan saldo terjadi saat seller request payout/withdraw
                    //ini request terakhir saat UAT
                }
                else if($status == 3){
                    //3=rejected sehingga perlu pengembalian saldo wallet pada user sesuai nilai withdraw yang direquest
                    //check nilai withdraw yang di reuqest
                    $withdraw = $this->m_model->selectas('id',$this->input->get('id'), 'withdraw');
                    if(count($withdraw)>0){
                        $req_withdraw=$withdraw[0]->payout;
                        $req_user=$withdraw[0]->user;

                        $update_saldo_wallet = $this->m_model->querycustom("update user set wallet=wallet+".$req_withdraw." where id=".$req_user);
                    }
                }

                if ($update == 1 && $update_saldo_wallet == TRUE) {
                    redirect('panel/withdraw?err=no_err', 'refresh');
                }
                else if ($update == 1 && $update_saldo_wallet == FALSE) {
                    redirect('panel/withdraw?err=err_update_saldo', 'refresh');
                }
                else {
                    redirect('panel/withdraw?err=err_update', 'refresh');
                }
            }
            else{
                redirect('panel/withdraw?err=status_invalid', 'refresh');
            }
        }
        //---
        if ($this->input->get('remove')) {
            redirect('panel/marketer', 'refresh');
        }
    }

    public function slider() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/slider');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            if (!empty($_FILES['userfile']['name'])) {
                $config['upload_path']   = FCPATH.'/images/slider/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload',$config);
                if ($this->upload->do_upload('userfile')){
                    $param = array(
                        'image'     => $this->upload->data('file_name'),
                        'title'     => $this->input->post('title'),
                        'caption'   => $this->input->post('caption'),
                        'link'      => $this->input->post('link')
                    );
                    if ($this->m_model->create($param, 'slider') == 1) {
                        redirect('panel/slider', 'refresh');
                    }
                }
            }
        }

        if ($this->input->post('save')) {
            if (!empty($_FILES['userfile']['name'])) {
                $config['upload_path']   = FCPATH.'/images/slider/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload',$config);
                if ($this->upload->do_upload('userfile')){
                    $param = array(
                        'image'     => $this->upload->data('file_name'),
                        'title'     => $this->input->post('title'),
                        'caption'   => $this->input->post('caption'),
                        'link'      => $this->input->post('link')
                    );
                    if ($this->m_model->updateas('id', $this->input->post('id'), $param, 'slider') == 1) {
                        redirect('panel/slider', 'refresh');
                    }
                }
            } else {
                $param = array(
                    'title'     => $this->input->post('title'),
                    'caption'   => $this->input->post('caption'),
                    'link'      => $this->input->post('link')
                );
                if ($this->m_model->updateas('id', $this->input->post('id'), $param, 'slider') == 1) {
                    redirect('panel/slider', 'refresh');
                }
            }
        }

        //---
        if ($this->input->get('remove')) {
            $this->db->delete('slider', array('id' => $this->input->get('remove')));
            redirect('panel/slider', 'refresh');
        }
    }

    public function notify() {
        if ($this->session->userdata('admin')) {
            $data['notify'] = $this->m_model->select('notification');
            $this->load->view('backend/notify', $data);
        } else {
            redirect('panel/login', 'refresh');
        }

        //----
    }

    public function login() {
        if ($this->session->userdata('admin')) {
            redirect('panel', 'refresh');
        } else {
            $this->load->view('backend/login');
        }

        if ($this->input->post('email') && $this->input->post('password')) {
            $data = array(
                'email'    => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            if ($this->m_model->loginadmin($data) == 1) {
                redirect('panel', 'refresh');
            }
            else{
                $sess_data = array(
                'status' => 'failedLogin'
                );
                $this->session->set_userdata($sess_data);
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('admin_data');
        redirect('panel/login', 'refresh');
    }

// ---------------

    public function business_creator() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/business_creator');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $business_creator = array(
                'store_id_supplier'     => $this->input->post('supplier'),
                'user_id_agent'  => $this->input->post('user_agent'),
                'fee'   => $this->input->post('fee'),
                'product_store_id'   => $this->input->post('product_store'),
                'keterangan'  => $this->input->post('keterangan'),
                'start'  => convert_time_ymd($this->input->post('start')),
                'end'  => convert_time_ymd($this->input->post('end')),
                'status' => $this->input->post('status')
            );
            $create_business_creator=$this->m_model->insertgetid($business_creator, 'business_creator');
            redirect('panel/business_creator', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $business_creator = array(
                'store_id_supplier'     => $this->input->post('supplier'),
                'user_id_agent'  => $this->input->post('user_agent'),
                'fee'   => $this->input->post('fee'),
                'product_store_id'   => $this->input->post('product_store'),
                'keterangan'  => $this->input->post('keterangan'),
                'start'  => convert_time_ymd($this->input->post('start')),
                'end'  => convert_time_ymd($this->input->post('end')),
                'status' => $this->input->post('status')
            );
            $this->m_model->updateas('id', $this->input->post('id'), $business_creator, 'business_creator');
            redirect('panel/business_creator', 'refresh');
        }
        //---
        if ($this->input->get('remove')) {
            $this->db->delete('business_creator', array('id' => $this->input->get('remove')));
            redirect('panel/business_creator', 'refresh');
        }
    }

    public function confirmPayment(){
        $param = array(
                'payment_status' => '1'
            );
        $update = $this->m_model->updateas('id', $this->uri->segment(3), $param, 'orders');
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function subcategory(){
        $data=$this->m_model->selectas('category_parent', $this->input->post('category_parent'), 'category_sub');
        echo '<option value="">Pilih</option>';
        foreach ($data as $key => $value) {
            # code...
            echo '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
    }

    public function childcategory(){
        $data=$this->m_model->selectas('category_sub', $this->input->post('category_sub'), 'category_child');
        echo '<option value="">Pilih</option>';
        foreach ($data as $key => $value) {
            # code...
            echo '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
    }

/*---------------------------------------------------------------ASDP----------------------------*/
    public function users() {
        if ($this->session->userdata('admin') &&  $this->session->userdata('admin_data')->roles==5) {
            $this->load->view('backend/users');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'roles' => $this->input->post('roles'),
            );
            
            /*if (!empty($_FILES['logo']['name'])) {
                $config['upload_path']   = FCPATH.'/assets/frontend/img/users/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 100;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('logo')){
                    $data['logo']='assets/frontend/img/users/'.$this->upload->data('file_name');

                    $config_kompres['image_library'] = 'gd2';
                    $config_kompres['source_image'] = $this->upload->data('full_path');
                    $config_kompres['new_image'] = FCPATH.'assets/frontend/img/brands/compress_'.$this->upload->data('file_name');
                    $config_kompres['maintain_ratio'] = TRUE;
                    $config_kompres['width']         = 110;

                    $this->load->library('image_lib', $config_kompres);
                    if($this->image_lib->resize()){
                        $data['thumbnail_logo']='assets/frontend/img/brands/compress_'.$this->upload->data('file_name');
                    }
                }
            }*/
            if ($this->m_model->create($data, 'users') == 1) {
                redirect('panel/users', 'refresh');
            } else {
                redirect('panel/users', 'refresh');
            }
        }

        if ($this->input->post('save')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            if($this->input->post('password')){
                $data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'roles' => $this->input->post('roles'),
                );
            }else{
                $data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'roles' => $this->input->post('roles'),
                );
            }
            
            /*if (!empty($_FILES['logo']['name'])) {
                $config['upload_path']   = FCPATH.'/assets/frontend/img/brands/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 100;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('logo')){
                    $data['logo']='assets/frontend/img/brands/'.$this->upload->data('file_name');

                    $config_kompres['image_library'] = 'gd2';
                    $config_kompres['source_image'] = $this->upload->data('full_path');
                    $config_kompres['new_image'] = FCPATH.'assets/frontend/img/brands/compress_'.$this->upload->data('file_name');
                    $config_kompres['maintain_ratio'] = TRUE;
                    $config_kompres['width']         = 110;

                    $this->load->library('image_lib', $config_kompres);
                    if($this->image_lib->resize()){
                        $data['thumbnail_logo']='assets/frontend/img/brands/compress_'.$this->upload->data('file_name');
                        if($this->input->post('old_logo')!=null){
                            unlink(FCPATH.$this->input->post('old_logo'));
                        }
                        if($this->input->post('old_thumbnail_logo')!=null){
                            unlink(FCPATH.$this->input->post('old_thumbnail_logo'));
                        }
                    }
                }
            }*/

            $update = $this->m_model->updateas('id', $this->input->post('id'), $data,
                'users');
            if ($update == 1) {
                redirect('panel/users', 'refresh');
            } else {
                redirect('panel/users', 'refresh');
            }
        }
        if ($this->input->get('remove')) {
            $this->db->delete('users', array('id' => $this->input->get('remove')));
            redirect('panel/users', 'refresh');
        }
    }

    public function pelabuhan() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/pelabuhan');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $pathfile="";
            if (!empty($_FILES['cover']['name'])) {
                $config['upload_path']   = FCPATH.'/images/pelabuhan/cover/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('cover');
                $pathfile='images/pelabuhan/cover/'.$this->upload->data('file_name');
            }

            $param = array(
                'cabang_id'  => cleartext($this->input->post('cabang')),
                'name'     => cleartext($this->input->post('name')),
                'deskripsi'  => cleartext($this->input->post('deskripsi')),
                'foto'   => $pathfile,
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $create=$this->m_model->insertgetid($param, 'pelabuhans');
            redirect('panel/pelabuhan', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $pathfile="";
            if (!empty($_FILES['cover']['name'])) {
                $config['upload_path']   = FCPATH.'/images/pelabuhan/cover/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('cover');
                $pathfile='images/pelabuhan/cover/'.$this->upload->data('file_name');
                $param = array(
                    'cabang_id'  => cleartext($this->input->post('cabang')),
                    'name'     => cleartext($this->input->post('name')),
                    'deskripsi'  => cleartext($this->input->post('deskripsi')),
                    'foto'   => $pathfile,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'created_user'   => cleartext($this->session->userdata('admin_data')->username),
                );
            }
            else{
                $param = array(
                    'cabang_id'  => cleartext($this->input->post('cabang')),
                    'name'     => cleartext($this->input->post('name')),
                    'deskripsi'  => cleartext($this->input->post('deskripsi')),
                    'created_at'   => date('Y-m-d H:i:s'),
                    'created_user'   => cleartext($this->session->userdata('admin_data')->username),
                );
            }
            $this->m_model->updateas('id', $this->input->post('id'), $param, 'pelabuhans');
            redirect('panel/pelabuhan', 'refresh');
        }
        //---
        if ($this->input->get('remove')) {
            $param = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('remove')), $param, 'pelabuhans');
            redirect('panel/pelabuhan', 'refresh');
        }
    }

    public function armada() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/armada');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            if (!empty($_FILES['cover']['name'])) {
                $config['upload_path']   = FCPATH.'/images/armada/cover/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('cover');
                $pathfile='images/armada/cover/'.$this->upload->data('file_name');
            }

            $param = array(
                'cabang_id'  => cleartext($this->input->post('cabang_id')),
                'name'     => cleartext($this->input->post('name')),
                'deskripsi'  => cleartext($this->input->post('deskripsi_armada')),
                'foto'   => $pathfile,
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $create_armada=$this->m_model->insertgetid($param, 'armada');
            $i=0;
            foreach ($_FILES as $key => $value) {
                if( $key!='cover'){
                    $pathfile="";
                    # code...
                    $config[$i]['upload_path']   = FCPATH.'/images/armada/deck/';
                    $config[$i]['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config[$i]['max_size'] = 3000000;
                    $config[$i]['file_name'] = uniqid();
                    $this->load->library('upload',$config[$i]);
                    $this->upload->initialize($config[$i]);
                    $this->upload->do_upload($key);
                    $pathfile='images/armada/deck/'.$this->upload->data('file_name');
                    $paramDeck = array(
                        'armada_id'  =>$create_armada,
                        'name'     => cleartext($this->input->post('deck')[$i]),
                        'deskripsi'     => cleartext($this->input->post('deskripsi')[$i]),
                        'path_file'   => $pathfile,
                        'created_at'   => date('Y-m-d H:i:s'),
                        'created_user'   => cleartext($this->session->userdata('admin_data')->username),
                    );
                    $i++;
                    $create=$this->m_model->create($paramDeck, 'armada_elements');
                }
            }

            redirect('panel/armada', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
#            print_r($_FILES);
 #           echo "<br><br>". COUNT($_FILES);
  #          die();
            $pathfile="";
            if (!empty($_FILES['cover']['name'])) {
                $config['upload_path']   = FCPATH.'/images/armada/cover/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('cover');
                $pathfile='images/armada/cover/'.$this->upload->data('file_name');
                $param = array(
                    'cabang_id'  => cleartext($this->input->post('cabang_id')),
                    'name'     => cleartext($this->input->post('name')),
                    'deskripsi'  => cleartext($this->input->post('deskripsi_armada')),
                    'foto'   => $pathfile,
                    'updated_at'   => date('Y-m-d H:i:s'),
                    'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
                );
            }else{
                $param = array(
                    'cabang_id'  => cleartext($this->input->post('cabang_id')),
                    'name'     => cleartext($this->input->post('name')),
                    'deskripsi'  => cleartext($this->input->post('deskripsi_armada')),
                    'updated_at'   => date('Y-m-d H:i:s'),
                    'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
                );
            }

            $this->m_model->updateas('id', cleartext($this->input->post('id')), $param, 'armada');
            $i=0;
            foreach ($_FILES as $key => $value) {
                if( $key!='cover'){
                    if(!empty($_FILES[$key]['name'])){
                        $pathfile="";
                        # code...
                        $config[$i]['upload_path']   = FCPATH.'/images/armada/deck/';
                            
                        $config[$i]['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config[$i]['max_size'] = 3000000;
                        $config[$i]['file_name'] = uniqid();
                        $this->load->library('upload',$config[$i]);
                        $this->upload->initialize($config[$i]);
                        $this->upload->do_upload($key);
                        $pathfile='images/armada/deck/'.$this->upload->data('file_name');
                        $paramDeck = array(
                            'name'     => cleartext($this->input->post('deck')[$i]),
                            'deskripsi'     => cleartext($this->input->post('deskripsi')[$i]),
                            'path_file'   => $pathfile,
                            'created_at'   => date('Y-m-d H:i:s'),
                            'created_user'   => cleartext($this->session->userdata('admin_data')->username),
                        );
                    }
                    else{
                        $paramDeck = array(
                            'name'     => cleartext($this->input->post('deck')[$i]),
                            'deskripsi'     => cleartext($this->input->post('deskripsi')[$i]),
                            'created_at'   => date('Y-m-d H:i:s'),
                            'created_user'   => cleartext($this->session->userdata('admin_data')->username),
                        );
                    }
                    if(!isset($_POST['deck_id'][$i])){
                        $paramDeck['armada_id']=cleartext($this->input->post('id'));
                        $create=$this->m_model->create($paramDeck, 'armada_elements');
                    }
                    else{
                        $update=$this->m_model->updateas('id', $this->input->post('deck_id')[$i], $paramDeck, 'armada_elements');
                    }
                    $i++;
                }
            }

            redirect('panel/armada', 'refresh');
        }
        //---
        if ($this->input->get('remove')) {
            $param = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('remove')), $param, 'armada');
            redirect('panel/armada', 'refresh');
        }

        if ($this->input->get('removeElement')) {
            $param = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('removeElement')), $param, 'armada_elements');
            redirect($this->agent->referrer(), 'refresh');
        }
    }

    public function photo() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/foto');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $pathfile="";
            if (!empty($_FILES['photo']['name'])) {
                $config['upload_path']   = FCPATH.'/images/pelabuhan/photo/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('photo');
                $pathfile='images/pelabuhan/photo/'.$this->upload->data('file_name');
            }

            $param = array(
                'cabang_id'  => cleartext($this->input->post('cabang_id')),
                'deskripsi'  => cleartext($this->input->post('deskripsi')),
                'path_file'   => $pathfile,
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $create=$this->m_model->insertgetid($param, 'photo');
            redirect('panel/photo', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            if (!empty($_FILES['photo']['name'])) {
                $config['upload_path']   = FCPATH.'/images/pelabuhan/photo/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('photo');
                $pathfile='images/pelabuhan/photo/'.$this->upload->data('file_name');

                $param = array(
                    'cabang_id'  => cleartext($this->input->post('cabang_id')),
                    'deskripsi'  => cleartext($this->input->post('deskripsi')),
                    'path_file'   => $pathfile,
                    'updated_at'   => date('Y-m-d H:i:s'),
                    'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
                );
            }
            else{
                $param = array(
                    'cabang_id'  => cleartext($this->input->post('cabang_id')),
                    'deskripsi'  => cleartext($this->input->post('deskripsi')),
                    'updated_at'   => date('Y-m-d H:i:s'),
                    'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
                );
            }
            $this->m_model->updateas('id', $this->input->post('id'), $param, 'photo');
            redirect('panel/photo', 'refresh');
        }
        //---
        if ($this->input->get('remove')) {
             $createdata = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('remove')), $createdata, 'photo');
            redirect('panel/photo', 'refresh');
        }
    }

    public function cabang() {
        if (!$this->session->userdata('admin')) {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $createdata = array(
                'name'     => cleartext($this->input->post('name')),
                'status'  => cleartext($this->input->post('status')),
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $createdata=$this->m_model->insertgetid($createdata, 'cabangs');
            redirect('panel/cabang', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $createdata = array(
                'name'     => cleartext($this->input->post('name')),
                'status'  => cleartext($this->input->post('status')),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', $this->input->post('id'), $createdata, 'cabangs');
            redirect('panel/cabang', 'refresh');
        }

        if ($this->input->get('id') && $this->input->get('status')) {
            switch (strtolower($this->input->get('status'))) {
                case 'active':
                    # code...
                    $status=1;
                    break;
                case 'unactive':
                    # code...
                    $status=0;
                    break;
                
                default:
                    # code...
                    redirect('panel/cabang', 'refresh');
                    break;
            }

            $createdata = array(
                'status'  => $status,
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('id')), $createdata, 'cabangs');
            redirect('panel/cabang', 'refresh');
        }
        //---
        if ($this->input->get('remove')) {
            $createdata = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('remove')), $createdata, 'cabangs');
            redirect('panel/cabang', 'refresh');
        }

        if ($this->session->userdata('admin')) {
            $this->load->view('backend/cabang');
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function jenis_aspeks() {
        if (!$this->session->userdata('admin')) {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $param = array(
                'nama_aspek' => cleartext($this->input->post('nama_aspek')),
                'deskripsi'     => cleartext($this->input->post('deskripsi')),
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $createdata=$this->m_model->insertgetid($param, 'jenis_aspeks');
            redirect('panel/jenis_aspeks', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $param = array(
                'nama_aspek' => cleartext($this->input->post('nama_aspek')),
                'deskripsi'     => cleartext($this->input->post('deskripsi')),
                'updated_at'   => date('Y-m-d H:i:s'),
                'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', $this->input->post('id'), $param, 'jenis_aspeks');
            redirect('panel/jenis_aspeks', 'refresh');
        }

        //---
        if ($this->input->get('remove')) {
            $createdata = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('remove')), $createdata, 'jenis_aspeks');
            redirect('panel/jenis_aspeks', 'refresh');
        }

        if ($this->session->userdata('admin')) {
            $this->load->view('backend/jenis_aspeks');
        } else {
            redirect('panel/login', 'refresh');
        }
    }

    public function video() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/video');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $param = array(
                'cabang_id'  => cleartext($this->input->post('cabang_id')),
                'deskripsi'  => cleartext($this->input->post('deskripsi')),
                'path_file'   => cleartext($this->input->post('link')),
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $create=$this->m_model->insertgetid($param, 'video');
            redirect('panel/video', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $param = array(
                'cabang_id'  => cleartext($this->input->post('cabang_id')),
                'deskripsi'  => cleartext($this->input->post('link')),
                'path_file'   => $pathfile,
                'updated_at'   => date('Y-m-d H:i:s'),
                'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
           
            $this->m_model->updateas('id', $this->input->post('id'), $param, 'video');
            redirect('panel/video', 'refresh');
        }
        //---
        if ($this->input->get('remove')) {
             $createdata = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('remove')), $createdata, 'video');
            redirect('panel/video', 'refresh');
        }
    }

    public function deck() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/armada');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            if (!empty($_FILES['cover']['name'])) {
                $config['upload_path']   = FCPATH.'/images/armada/cover/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('cover');
                $pathfile='images/armada/cover/'.$this->upload->data('file_name');
            }

            $param = array(
                'cabang_id'  => cleartext($this->input->post('cabang_id')),
                'name'     => cleartext($this->input->post('name')),
                'deskripsi'  => cleartext($this->input->post('deskripsi')),
                'foto'   => $pathfile,
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $create=$this->m_model->insertgetid($param, 'armada');
            redirect('panel/armada', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $business_creator = array(
                'store_id_supplier'     => $this->input->post('supplier'),
                'user_id_agent'  => $this->input->post('user_agent'),
                'fee'   => $this->input->post('fee'),
                'product_store_id'   => $this->input->post('product_store'),
                'keterangan'  => $this->input->post('keterangan'),
                'start'  => convert_time_ymd($this->input->post('start')),
                'end'  => convert_time_ymd($this->input->post('end')),
                'status' => $this->input->post('status')
            );
            $this->m_model->updateas('id', $this->input->post('id'), $business_creator, 'armada');
            redirect('panel/armada', 'refresh');
        }
        //---
        if ($this->input->get('remove')) {
            $this->db->delete('armada', array('id' => $this->input->get('remove')));
            redirect('panel/armada', 'refresh');
        }
    }

    public function aspek() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/aspek');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $param = array(
                'nama_aspek' => cleartext($this->input->post('nama_aspek')),
                'deskripsi'     => cleartext($this->input->post('deskripsi')),
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $createdata=$this->m_model->insertgetid($param, 'jenis_aspeks');
            redirect('panel/aspek', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            $param = array(
                'nama_aspek' => cleartext($this->input->post('nama_aspek')),
                'deskripsi'     => cleartext($this->input->post('deskripsi')),
                'updated_at'   => date('Y-m-d H:i:s'),
                'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', $this->input->post('id'), $param, 'jenis_aspeks');
            redirect('panel/aspek', 'refresh');
        }

        //---
        if ($this->input->get('remove')) {
            $createdata = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('remove')), $createdata, 'jenis_aspeks');
            redirect('panel/aspek', 'refresh');
        }
        //---
        if ($this->input->post('addsubaspek')) {
            $data = array(
                'jenis_aspek_id' => cleartext($this->input->post('jenis_aspeks')),
                'name'            => cleartext($this->input->post('sub_aspek')),
                'created_at' => date('Y-m-d H:i:s'),
                'created_user' => cleartext($this->session->userdata('admin_data')->username),
            );
            if ($this->m_model->create($data, 'sub_aspeks') == 1) {
                redirect('panel/aspek', 'refresh');
            } else {
                redirect('panel/aspek', 'refresh');
            }
        }
        if ($this->input->post('savesub')) {
           $data = array(
                'jenis_aspek_id' => cleartext($this->input->post('jenis_aspeks')),
                'name'            => cleartext($this->input->post('sub_aspek')),
                'update_at' => date('Y-m-d H:i:s'),
            );
            $update = $this->m_model->updateas('id', $this->input->post('id'), $data,
                'sub_aspeks');
            if ($update == 1) {
                redirect('panel/aspek', 'refresh');
            } else {
                redirect('panel/aspek', 'refresh');
            }
        }
        if ($this->input->get('removesub')) {
            $createdata = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('removesub')), $createdata, 'sub_aspeks');
            redirect('panel/aspek', 'refresh');
        }
        //---
        if ($this->input->post('addchild')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data = array(
                'category_sub' => $this->input->post('category_sub'),
                'name'         => $this->input->post('name'),
                'name_id' => $this->input->post('name_id'),
                'seo' => $seo
            );
            if ($this->m_model->create($data, 'category_child') == 1) {
                redirect('panel/aspek', 'refresh');
            } else {
                redirect('panel/aspek', 'refresh');
            }
        }
        if ($this->input->post('savechild')) {
            $seo = str_replace('--', '-', str_replace('--', '-', strtolower(str_replace(' ', '-',
                preg_replace('/[^A-Za-z0-9\-]/', ' ', $this->input->post('name'))))));
            $data   = array(
                'category_sub' => $this->input->post('category_sub'),
                'name'         => $this->input->post('name'),
                'name_id' => $this->input->post('name_id'),
                'seo' => $seo
            );
            $update = $this->m_model->updateas('id', $this->input->post('id'), $data,
                'category_child');
            if ($update == 1) {
                redirect('panel/aspek', 'refresh');
            } else {
                redirect('panel/aspek', 'refresh');
            }
        }
        if ($this->input->get('removechild')) {
            $this->db->delete('category_child', array('id' => $this->input->get('removechild')));
            redirect('panel/aspek', 'refresh');
        }
    }

    public function icon() {
        if ($this->session->userdata('admin')) {
            $this->load->view('backend/icon');
        } else {
            redirect('panel/login', 'refresh');
        }
        //---
        if ($this->input->post('add')) {
            $pathfile="";
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path']   = FCPATH.'/images/icon/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('icon');
                $pathfile='images/icon/'.$this->upload->data('file_name');
            }

            $param = array(
                'name'  => cleartext($this->input->post('name')),
                'deskripsi'  => cleartext($this->input->post('deskripsi')),
                'path_file'   => $pathfile,
                'created_at'   => date('Y-m-d H:i:s'),
                'created_user'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $create=$this->m_model->insertgetid($param, 'icon');
            redirect('panel/icon', 'refresh');
        }
        //---
        if ($this->input->post('save')) {
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path']   = FCPATH.'/images/icon/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3000000;
                $config['file_name'] = uniqid();
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                $this->upload->do_upload('icon');
                $pathfile='images/icon/'.$this->upload->data('file_name');

                $param = array(
                    'name'  => cleartext($this->input->post('name')),
                    'deskripsi'  => cleartext($this->input->post('deskripsi')),
                    'path_file'   => $pathfile,
                    'updated_at'   => date('Y-m-d H:i:s'),
                    'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
                );
            }
            else{
                $param = array(
                    'name'  => cleartext($this->input->post('name')),
                    'deskripsi'  => cleartext($this->input->post('deskripsi')),
                    'updated_at'   => date('Y-m-d H:i:s'),
                    'updated_by'   => cleartext($this->session->userdata('admin_data')->username),
                );
            }
            $this->m_model->updateas('id', $this->input->post('id'), $param, 'icon');
            redirect('panel/icon', 'refresh');
        }
        //---
        if ($this->input->get('remove')) {
             $createdata = array(
                'deleted_at'  => date('Y-m-d H:i:s'),
                'deleted_by'   => cleartext($this->session->userdata('admin_data')->username),
            );
            $this->m_model->updateas('id', cleartext($this->input->get('remove')), $createdata, 'icon');
            redirect('panel/icon', 'refresh');
        }
    }
}