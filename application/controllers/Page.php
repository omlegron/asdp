<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Mailgun\Mailgun;
class Page extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
        if($this->session->userdata('language') !=null){
            $lang_active=$this->session->userdata('language');
            $this->lang->load('caption', $lang_active);
        }
        else{
            $this->lang->load('caption', 'bahasa');
        }
        //if (!$this->session->userdata('mask')) { redirect('mask'); }
    }

    public function lab() {
        //$this->m_model->updateall(array('active' => 1), 'user');
    }

    public function index() {
        $sliders = $this->m_model->select('slider');
        $data['sliders'] = $sliders;
        $this->load->view('frontend/pages/home', $data);
    }
    public function p($seo) {
       // selectas('id', $login[0]->user_role, 'user_role');
        if($this->session->userdata('language') !=null){
            switch (strtolower($this->session->userdata('language'))) {
                case 'bahasa':
                  $colom='id';
                  break;
                case 'english':
                  $colom='eng';
                  break;
            }
        }
        else{
            $colom='id';
        }
        $content = $this->m_model->selectas2('seo', $seo,'lang', $colom, 'pages');
        $data['content'] = $content;
        $this->load->view('frontend/pages/cms', $data);
    }

    public function login() {
        /*if(isset($_COOKIE['user_login'])  && $_COOKIE['user_login'] != null) {
           unset($_COOKIE['user_login']);
        }
        if(isset($_COOKIE['userpassword'])  && $_COOKIE['userpassword'] != null) {
           unset($_COOKIE['userpassword']);
        }
        if(isset($_COOKIE['user_role'])  && $_COOKIE['user_role'] != null) {
           unset($_COOKIE['user_role']);
        }*/
        /*setcookie('user_login', null, -1, '/', base_url());
        setcookie('userpassword', null, -1,'/', base_url());
        setcookie('user_role', null, -1, '/', base_url());*/
        switch ($this->session->userdata('user_role')) {
            case 'customer':
                redirect(base_url(), 'refresh');
                break;
            case 'supplier':
                redirect(base_url(), 'refresh');
                break;
            case 'marketer':
                redirect(base_url(), 'refresh');
            default:
                $this->load->view('frontend/pages/login');
                break;
        }
        //--------
        if ($this->input->post('login')) {
            $param        = array(
                'email'    => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'user_role' => $this->input->post('jasdk')//1=buyer, 2=supplier, 3=marketer
            );
            $category_login="member";
            switch ($this->input->post('jasdk')) {
                case '1':
                    # code...
                    $category_login="member";
                    break;
                case '2':
                    # code...
                    $category_login="supplier";
                    break;
                case '3':
                    # code...
                    $category_login="marketer";
                    break;
            }

            $loginSession = $this->m_model->loginSession($param);
            $login        = $this->m_model->loginData($param);
            if ($loginSession == 1 && count($login) > 0) {
                if($this->input->post('remember_me')){
                    $status=TRUE;
                    $remember_me = $this->set_remember_me($status, $param);
                    $this->session->set_userdata(array('remember_me'=>$status));
                }
                else{
                    $status=FALSE;
                    $remember_me = $this->set_remember_me($status, $param);
                    $this->session->set_userdata(array('remember_me'=>$status));
                }
                $role = $this->m_model->selectas('id', $login[0]->user_role, 'user_role');
                if (count($role) > 0) {
                    $login_session = array(
                        'user'      => $login[0]->id,
                        'user_role' => $role[0]->slug,
                    );
                    $this->session->set_userdata($login_session);
                    $this->updateSessionCart();

                    switch ($role[0]->slug) {
                        case 'customer':
                            redirect(base_url(), 'refresh');
                            break;
                        case 'supplier':
                            redirect(base_url(), 'refresh');
                            break;
                        case 'marketer':
                            redirect(base_url(), 'refresh');
                            break;
                    }
                }
            } else {
                redirect('page/login?cat='.$category_login.'&&note=err', 'refresh');
            }
        }
        elseif ($this->input->post('regBuyer')) {
            if ($this->input->post('password') == $this->input->post('repassword')) {
                $data = [
                    "email"     => $this->input->post('email'),
                    'user_role' => '1',
                ];

                $emailexist = $this->m_model->exist($data, "user");
                if ($emailexist) {
                    redirect('page/login?cat=supplier&&note=err', 'refresh');
                }
                $param    = array(
                    'name'      => $this->input->post('name'),
                    'email'     => $this->input->post('email'),
                    'password'  => md5($this->input->post('password')),
                    'user_role' => '1',
                    'register'  => date('d-m-Y'),
                    'activation_code' => rand(1000, 1000000)
                );
                $register = $this->m_model->insertgetid($param, 'user');
                if (is_numeric($register)) {
                    $this->mailVerification($register);
                    redirect('page/verify', 'refresh');
                } else {
                    redirect('page/login?cat=member&&note=err', 'refresh');
                }
            } else {
                redirect('page/login?cat=member&&note=err', 'refresh');
            }
        } elseif ($this->input->post('regSupplier')) {
            if ($this->input->post('password') == $this->input->post('repassword')) {

                $data = [
                    "email"     => $this->input->post('email'),
                    'user_role' => '2',
                ];

                $emailexist = $this->m_model->exist($data, "user");
                if ($emailexist) {
                    redirect('page/login?cat=supplier&&note=err', 'refresh');
                }
                $param    = array(
                    'name'      => $this->input->post('name'),
                    'email'     => $this->input->post('email'),
                    'password'  => md5($this->input->post('password')),
                    'user_role' => '2',
                    'register'  => date('d-m-Y'),
                    'activation_code' => rand(1000, 1000000)
                );
                $register = $this->m_model->insertgetid($param, 'user');
                if (is_numeric($register)) {
                    //$this->mailWellcome($register);
                    $this->mailVerification($register);
                    redirect('page/verify', 'refresh');
                } else {
                    redirect('page/login?cat=supplier&&note=err', 'refresh');
                }
            } else {
                redirect('page/login?cat=supplier&&note=err', 'refresh');
            }
        } elseif ($this->input->post('regMarketer')) {
            if ($this->input->post('password') == $this->input->post('repassword')) {
                $data = [
                    "email"     => $this->input->post('email'),
                    'user_role' => '3',
                ];

                $emailexist = $this->m_model->exist($data, "user");
                if ($emailexist) {
                    redirect('page/login?cat=supplier&&note=err', 'refresh');
                }
                $param    = array(
                    'name'      => $this->input->post('name'),
                    'email'     => $this->input->post('email'),
                    'password'  => md5($this->input->post('password')),
                    'user_role' => '3',
                    'register'  => date('d-m-Y'),
                    'activation_code' => rand(1000, 1000000)
                );
                $register = $this->m_model->insertgetid($param, 'user');
                if (is_numeric($register)) {
                    //$this->mailWellcome($register);
                    $this->mailVerification($register);
                    redirect('page/verify', 'refresh');
                } else {
                    redirect('page/login?cat=marketer&&note=err', 'refresh');
                }
            } else {
                redirect('page/login?cat=marketer&&note=err', 'refresh');
            }
        }
        //----------
    }

    public function verify() {
        $this->load->view('frontend/pages/verify');
        if ($this->input->post('code')) {
            $check = $this->m_model->selectas('activation_code', $this->input->post('code'), 'user');
            if (count($check) > 0) {
                $this->m_model->updateas('id', $check[0]->id, array('active' => '1', 'activation_code' => rand(1000, 1000000)), 'user');
                $this->mailWellcome($check[0]->id);
                $this->session->set_userdata(array('verify'=>true));
                redirect('page/verify?i='.$check[0]->email, 'refresh');
                //redirect('page/login', 'refresh');
            }
        }
    }

    public function mailWellcome($userId) {
        $user = $this->m_model->selectas('id', $userId, 'user');
        if (count($user) > 0) {
            foreach ($user as $key => $value) {
                //-----------
                $this->load->library('email');
                $config = [
                   'mailtype'  => 'html',
                   'charset'   => 'utf-8',
                   'protocol'  => 'smtp',
                   'smtp_host' => 'ssl://smtp.googlemail.com',
                   'smtp_user' => 'noreply.bazaarplace@gmail.com',    // Ganti dengan email gmail kamu
                   'smtp_pass' => 'amdm!@34',      // Password gmail kamu
                   'smtp_port' => 465,
                   'crlf'      => "\r\n",
                   'newline'   => "\r\n",
                   'wordwrap'  => TRUE
               ];
                /*$config['protocol'] = "smtp";
                $config['smtp_host'] = 'ssl://bazaarplace.com';
                $config['smtp_port'] = '465';
                $config['smtp_user'] = 'system@bazaarplace.com';
                $config['smtp_pass'] = '@Bazaarplace';
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['wordwrap'] = TRUE;*/
                //------------
                $subject = "Welcome to Bazaarplace!";
                $data = array(
                    'name' => $value->name
                );
                $message = $this->load->view('frontend/mail/wellcome', $data, true);
                //------------
                $this->email->initialize($config);
                $this->email->from('system@bazaarplace.com', 'Bazaarplace');
                $this->email->to($value->email);
                $this->email->cc('system@bazaarplace.com');
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
            }
        }
    }

    public function mailVerification($userId) {
        $user = $this->m_model->selectas('id', $userId, 'user');
        if (count($user) > 0) {
            foreach ($user as $key => $value) {
                //-----------
                $this->load->library('email');
                // Konfigurasi email
                $config = [
                   'mailtype'  => 'html',
                   'charset'   => 'utf-8',
                   'protocol'  => 'smtp',
                   'smtp_host' => 'ssl://smtp.gmail.com',
                   'smtp_user' => 'noreply.bazaarplace@gmail.com',    // Ganti dengan email gmail kamu
                   'smtp_pass' => 'amdm!@34',      // Password gmail kamu
                   'smtp_port' => 465,
                   'crlf'      => "\r\n",
                   'newline'   => "\r\n",
                   'wordwrap'  => TRUE
               ];
                /*$config['protocol'] = "smtp";
                $config['smtp_host'] = 'ssl://bazaarplace.com';
                $config['smtp_port'] = '465';
                $config['smtp_user'] = 'system@bazaarplace.com';
                $config['smtp_pass'] = '@Bazaarplace';
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['wordwrap'] = TRUE;*/
                //------------
                $subject = "Bazaarplace activation account!";
                $data = array(
                    'name' => $value->name,
                    'code' => $value->activation_code
                );
                $message = $this->load->view('frontend/mail/verify', $data, true);
                //------------
                $this->email->initialize($config);
                $this->email->from('noreply.bazaarplace@gmail.com', 'Bazaarplace');
                $this->email->to($value->email);
                $this->email->cc('system@bazaarplace.com');
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
            }
        }
    }

    public function updateSessionCart() {
        $cekCart = $this->m_model->selectas('user', $this->session->userdata('guest'), 'cart');
        if (count($cekCart) > 0) {
            $cekCartDetail = $this->m_model->selectas('cart', $cekCart[0]->id, 'cart_detail');
            $cekCartUser = $this->m_model->selectas('user', $this->session->userdata('user'), 'cart');
            if (count($cekCartDetail) > 0) {
                if (count($cekCartUser) > 0) {
                    $cekCartUserDetail = $this->m_model->selectas('cart', $cekCartUser[0]->id, 'cart_detail');
                    if (count($cekCartUserDetail) > 0) {
                        foreach ($cekCartDetail as $key => $value) {
                            $getDetailLoop = $this->m_model->selectas2('product_store', $cekCartDetail[0]->product_store, 'cart', $cekCartUser[0]->id, 'cart_detail');
                            if (count($getDetailLoop) > 0) {
                                $qty = $value->quantity + $getDetailLoop[0]->quantity;
                                $this->m_model->updateas('id', $getDetailLoop[0]->id, array('quantity' => $qty), 'cart_detail');
                            } else {
                                $this->m_model->updateas('id', $value->id, array('cart' => $cekCartUser[0]->id), 'cart_detail');
                            }
                        }
                        $this->db->delete('cart', array('user' => $this->session->userdata('guest')));
                        $this->db->delete('cart_detail', array('cart' => $cekCart[0]->id));
                    } else {
                        $this->m_model->updateas('user', $this->session->userdata('guest'), array('user' => $this->session->userdata('user')), 'cart');
                        $this->db->delete('cart', array('user' => $this->session->userdata('user')));
                    }
                } else {
                    $this->m_model->updateas('user', $this->session->userdata('guest'), array('user' => $this->session->userdata('user')), 'cart');
                }
            } else {
                $this->db->delete('cart', array('user' => $this->session->userdata('guest')));
            }
        }
    }

    public function forgetpassword()
    {
        if(!$this->input->post('btn_recovery') && !$this->input->get('sent') && !$this->input->get('note') && !$this->input->get('token')){
            $this->load->view('frontend/pages/recovery');
        }

        if($this->input->post('btn_recovery')){
            $generate_token="";
            $email=$this->input->post('email-for-pass');
            $verify_email=$this->m_model->selectas('email', $email, 'user');
            if(count($verify_email)>0){
                $id_user=$verify_email[0]->id;
                $base_of_date=time();
                $valid_time=$this->get_next_day('+2',$base_of_date);
                $name=$verify_email[0]->name;
                $token_reset= $this->generate_token_reset($verify_email[0]->email, $verify_email[0]->id);
                //verify true
                //-----------
                $this->load->library('email');
                $config = [
                   'mailtype'  => 'html',
                   'charset'   => 'utf-8',
                   'protocol'  => 'smtp',
                   'smtp_host' => 'ssl://smtp.gmail.com',
                   'smtp_user' => 'noreply.bazaarplace@gmail.com',    // Ganti dengan email gmail kamu
                   'smtp_pass' => 'amdm!@34',      // Password gmail kamu
                   'smtp_port' => 465,
                   'crlf'      => "\r\n",
                   'newline'   => "\r\n",
                   'wordwrap'  => TRUE
               ];
                /*$config['protocol'] = "smtp";
                $config['smtp_host'] = 'ssl://bazaarplace.com';
                $config['smtp_port'] = '465';
                $config['smtp_user'] = 'system@bazaarplace.com';
                $config['smtp_pass'] = '@Bazaarplace';
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['wordwrap'] = TRUE;*/
                //------------
                $subject = "Bazaarplace Reset Password Account!";
                $data = array(
                    'name' => $name,
                    'token_reset_password' => $token_reset,
                    'valid_date_reset' => $valid_time
                );
                $data_update = array(
                    'token_reset_password' => $token_reset,
                    'valid_date_reset' => $valid_time
                );
                $message=$this->load->view('frontend/mail/reset_password', $data, true);
                //------------
                $this->email->initialize($config);
                $this->email->from('system@bazaarplace.com', 'Bazaarplace');
                $this->email->to($email);
                $this->email->cc('system@bazaarplace.com');
                $this->email->subject($subject);
                $this->email->message($message);

                if($this->email->send()){
                    $update=$this->m_model->updateas('id', $id_user, $data_update, 'user');
                    redirect('page/forgetpassword?sent=done&&note=no_err', 'refresh');
                }
                else{
                    redirect('page/forgetpassword?sent=failed&&note=err', 'refresh');
                }

            }
            else{
                    redirect('page/forgetpassword?sent=failed&&note=not_registered', 'refresh');
            }
        }

        if($this->input->get('sent')){
            $data = array(
                'status' => $this->input->get('sent'),
                'note' => $this->input->get('note')
            );
            $this->load->view('frontend/pages/response_reset_password', $data);
            return;
        }

        if($this->input->get('token')){
            $token=$this->input->get('token');
            if(!$this->input->post('updatePassword')){
                //saat user akses pertama dan ingin melakukan isi password baru
                $date_now=date('Y-m-d H:m:s');
                $verify_token=$this->m_model->selectas2('token_reset_password', $token, 'valid_date_reset >=', $date_now, 'user');
                if(count($verify_token)>0){
                    $data=array(
                            'user_id' => $verify_token[0]->id,
                            'email' => $verify_token[0]->email,
                            'status_token' => 1
                            );
                    $this->load->view('frontend/pages/from_newpassword', $data);
                }
                else{
                    $data=array(
                            'status_token' => 0
                            );
                    $this->load->view('frontend/pages/from_newpassword', $data);
                }
                return;
            }
            else if($this->input->post('updatePassword')){
                //setelah user  melakukan isi password baru, proses pengupdate-an
                $email=$this->input->post('email');
                $newpassword=$this->input->post('newPassword');
                $re_newpassword=$this->input->post('rePassword');
                if($newpassword == $re_newpassword){                
                    $verify_token_with_email=$this->m_model->selectas2('token_reset_password', $token, 'email', $email, 'user');
                    if(count($verify_token_with_email) > 0){
                        //verify berhasil
                        $user_id=$verify_token_with_email[0]->id;
                        $data_update=array(
                                        'token_reset_password'=>NULL,
                                        'valid_date_reset'=> NULL,
                                        'password'=> md5($newpassword)
                                    );
                        $update=$this->m_model->updateas('id', $user_id, $data_update, 'user');
                        if($update == 1){
                            $data=array(
                                    'status'=>'password changed',
                                    'note'=>'password has been changed!'
                                    );
                            header("refresh:5;url=".site_url('page/login') );
                            $this->load->view('frontend/pages/response_reset_password', $data);
                        }
                        else{
                            $data=array(
                                    'status'=>'password failed',
                                    'note'=>'something wrong!'
                                    );
                            header("refresh:5;url=".base_url());
                        }
                    }
                }
                else{
                    redirect($_SERVER['HTTP_REFERER']."&&err=not_match_password");
                }
                return;
            }
        }
    }
    public function generate_token_reset($email, $id){
        $random_code=rand(1000, 100000000);
        $random_code=md5($random_code."-".$email."-".$id);
        return $random_code;
    }

    public function get_next_day($next_day, $base_of_date){
        $date = strtotime($next_day." day", $base_of_date);
        $date = date('Y-m-d H:m:s', $date);
        return $date;
    }

    public function set_remember_me($status=FALSE, $param){
        if($status) {
            setcookie ("user_login", $param['email'], time()+ (10 * 365 * 24 * 60 * 60), '/', 'localhost');
            setcookie ("userpassword", base64_encode($param['password']), time()+ (10 * 365 * 24 * 60 * 60), '/','localhost');
            setcookie ("user_role", $param['user_role'], time()+ (10 * 365 * 24 * 60 * 60), '/', 'localhost');
        }else {
            if(isset($_COOKIE['user_login'])) {
                unset($_COOKIE['user_login']);
                setcookie('user_login', null, -1, '/', base_url());
            }
            if(isset($_COOKIE['userpassword'])) {
               unset($_COOKIE['userpassword']);
               setcookie('userpassword', null, -1,'/', base_url());
            }
            if(isset($_COOKIE['user_role'])) {
               unset($_COOKIE['user_role']);
               setcookie('user_role', null, -1, '/', base_url());
            }
        }
    }
// ---------------
}