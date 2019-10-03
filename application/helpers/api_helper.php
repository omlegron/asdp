<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function notifyOrder($order_store, $status) {
    $model = get_instance();
    $model->load->model('m_model');
    $checkOrderStore = $model->m_model->selectas('id', $order_store, 'orders_store');
    if (count($checkOrderStore) > 0) {
        $checkOrders = $model->m_model->selectas('id', $checkOrderStore[0]->orders, 'orders');
        if (count($checkOrders) > 0) {
            $checkOrderDetail = $model->m_model->selectas('orders_store', $checkOrderStore[0]->id, 'orders_detail');
            if (count($checkOrderDetail) > 0) {
            //------

                $getSupplier = $model->m_model->selectas('id', $checkOrderStore[0]->store, 'store');
                $getMarketer = $model->m_model->selectas('id', $checkOrderDetail[0]->agent, 'store');

                switch ($status) {
                    case '0':
                        $paramSupplier = array(
                            'user' => $getSupplier[0]->user, 
                            'global_id' => $order_store, 
                            'global_type' => 'order_store', 
                            'notify' => 'New Order #'.$checkOrders[0]->ref, 
                            'link' => 'supplier?detail='.$order_store, 
                            'date' => date('Y-m-d h:i:s')
                        );
                        $model->m_model->create($paramSupplier, 'user_notify');

                        if (count($getMarketer) > 0) {
                            $paramCustomer = array(
                                'user' => $getMarketer[0]->user, 
                                'global_id' => $order_store, 
                                'global_type' => 'order_store', 
                                'notify' => 'New Order #'.$checkOrders[0]->ref, 
                                'link' => 'marketer', 
                                'date' => date('Y-m-d h:i:s')
                            );
                            $model->m_model->create($paramCustomer, 'user_notify');
                        }
                        break;

                    case '1':
                        $paramCustomer = array(
                            'user' => $checkOrders[0]->user, 
                            'global_id' => $order_store, 
                            'global_type' => 'order_store', 
                            'notify' => 'Order was processed #'.$checkOrders[0]->ref, 
                            'link' => 'member/order/'.$order_store, 
                            'date' => date('Y-m-d h:i:s')
                        );
                        $model->m_model->create($paramCustomer, 'user_notify');

                        if (count($getMarketer) > 0) {
                            $paramCustomer = array(
                                'user' => $getMarketer[0]->user, 
                                'global_id' => $order_store, 
                                'global_type' => 'order_store', 
                                'notify' => 'Order was processed #'.$checkOrders[0]->ref, 
                                'link' => 'marketer', 
                                'date' => date('Y-m-d h:i:s')
                            );
                            $model->m_model->create($paramCustomer, 'user_notify');
                        }
                        break;

                    case '2':
                        $paramCustomer = array(
                            'user' => $checkOrders[0]->user, 
                            'global_id' => $order_store, 
                            'global_type' => 'order_store', 
                            'notify' => 'Order was shipped #'.$checkOrders[0]->ref, 
                            'link' => 'member/order/'.$order_store, 
                            'date' => date('Y-m-d h:i:s')
                        );
                        $model->m_model->create($paramCustomer, 'user_notify');

                        if (count($getMarketer) > 0) {
                            $paramCustomer = array(
                                'user' => $getMarketer[0]->user, 
                                'global_id' => $order_store, 
                                'global_type' => 'order_store', 
                                'notify' => 'Order was shipped #'.$checkOrders[0]->ref, 
                                'link' => 'marketer', 
                                'date' => date('Y-m-d h:i:s')
                            );
                            $model->m_model->create($paramCustomer, 'user_notify');
                        }
                        break;

                    case '3':
                        $paramSupplier = array(
                            'user' => $getSupplier[0]->user, 
                            'global_id' => $order_store, 
                            'global_type' => 'order_store', 
                            'notify' => 'Order Complete #'.$checkOrders[0]->ref, 
                            'link' => 'supplier?detail='.$order_store, 
                            'date' => date('Y-m-d h:i:s')
                        );

                        $model->m_model->create($paramSupplier, 'user_notify');
                        break;

                    case '4':
                        $paramCustomer = array(
                            'user' => $checkOrders[0]->user, 
                            'global_id' => $order_store, 
                            'global_type' => 'order_store', 
                            'notify' => 'Order was cancelled #'.$checkOrders[0]->ref, 
                            'link' => 'member/order/'.$order_store, 
                            'date' => date('Y-m-d h:i:s')
                        );
                        $model->m_model->create($paramCustomer, 'user_notify');

                        if (count($getMarketer) > 0) {
                            $paramCustomer = array(
                                'user' => $getMarketer[0]->user, 
                                'global_id' => $order_store, 
                                'global_type' => 'order_store', 
                                'notify' => 'Order was cancelled #'.$checkOrders[0]->ref, 
                                'link' => 'marketer', 
                                'date' => date('Y-m-d h:i:s')
                            );
                            $model->m_model->create($paramCustomer, 'user_notify');
                        }
                        break;

                    default:
                        # code...
                        break;
                }

            //-----
            }
        }
    }
}

function confirmOrder($order_store, $customer) {
    $model = get_instance();
    $model->load->model('m_model');
    $checkOrderStore = $model->m_model->selectas('id', $order_store, 'orders_store');
    if (count($checkOrderStore) > 0) {
        $checkOrders = $model->m_model->selectas('id', $checkOrderStore[0]->orders, 'orders');
        if (count($checkOrders) > 0) {
            if ($checkOrders[0]->user == $customer) {
                $checkOrderDetail = $model->m_model->selectas('orders_store', $checkOrderStore[0]->id, 'orders_detail');
                $FeeService = 0;
                if (count($checkOrderDetail) > 0) {
                    $wallet = 0;
                    foreach ($checkOrderDetail as $key => $valueDetail) {
                        $getProductStore = $model->m_model->selectas('id', $valueDetail->product_store, 'product_store');
                        if (count($getProductStore) > 0) {
                            //check harga apakah lebih dari 50.000.000 rupiah atau tidak
                            //jika iya makan ada potongan dana yang akan diterima oleh supplier
                            if ($getProductStore[0]->store_type == '1') {
                                $priceProductOrder=$valueDetail->price_basic * $valueDetail->quantity;
                                $FeeService=checkFeeForProduct($priceProductOrder);
                            	//-- comission marketer
                                $getMarketer = $model->m_model->selectas2('id', $valueDetail->agent, 'marketer', '1', 'store');
                                if (count($getMarketer) > 0) {
                                    $getUserMarketer = $model->m_model->selectas('id', $getMarketer[0]->user, 'user');
                                    if (count($getUserMarketer) > 0) {
                                        $KomisiMkt=($valueDetail->price - $valueDetail->price_basic) * $valueDetail->quantity;
                                        //komisi marketer akan di potong dulu dengan function DiscKomisi($komisi, $Disc%)
                                        $potonganKomisi=DiscKomisi($KomisiMkt, 20);
                                        $KomisiMkt=$KomisiMkt-$potonganKomisi['potongan'];

                                        //hitung wallet marketer
                                        $wallet = $KomisiMkt + $getUserMarketer[0]->wallet;

                                        //add wallet perusahaan hasil dari potongan komisi markter
                                        updateWalletCompany($potonganKomisi['potongan']);


                                        $model->m_model->updateas('id', $getUserMarketer[0]->id, array('wallet' => $wallet), 'user');
                                    }
                                }
                                //-- commision supplier
                                $getSupplier = $model->m_model->selectas('id', $checkOrderStore[0]->store, 'store');
                                if (count($getSupplier) > 0) {
                                    $getUserSupplier = $model->m_model->selectas('id', $getSupplier[0]->user, 'user');
                                    if (count($getUserSupplier) > 0) {
                                        $subtotalHPP=($valueDetail->price_basic * $valueDetail->quantity);
                                        // check business creator dulu untuk mengurus fee
                                        $wallet = ($subtotalHPP - $FeeService) + $getUserSupplier[0]->wallet;
                                        $model->m_model->updateas('id', $getUserSupplier[0]->id, array('wallet' => $wallet), 'user');
                                        //setalah update wallet toko berhasil
                                        //sekarang update wallet admin untuk penambahan fee yang didapat
                                        updateWalletCompany($FeeService);
                                    }
                                }
                            } else {
                                $priceProductOrder=$valueDetail->price_basic * $valueDetail->quantity;
                                $FeeService=checkFeeForProduct($priceProductOrder);
                                //-- commision supplier
                                $getSupplier = $model->m_model->selectas('id', $checkOrderStore[0]->store, 'store');
                                 // get komisi bussines creator
                                $queryBC="select *
                                            from business_creator
                                            where product_store_id='".$valueDetail->product_store."' && status='1' && start<='".date('Y-m-d')."' && end>='".date('Y-m-d')."'";
                                $getBC=$model->m_model->selectcustom($queryBC);
                                $feeBC=0;
                                $agent_user_id=0;
                                if(count($getBC)){
                                    $feeBC=feeBC($priceProductOrder, $getBC[0]->fee);
                                    $agent_user_id=$getBC[0]->user_id_agent;
                                }
                                if (count($getSupplier) > 0) {
                                    $getUserSupplier = $model->m_model->selectas('id', $getSupplier[0]->user, 'user');
                                    if (count($getUserSupplier) > 0) {
                                        //hitung potongan komisi supplier
                                        $KomisiSupplier=($valueDetail->price - $valueDetail->price_basic) * $valueDetail->quantity ;
                                        //komisi marketer akan di potong dulu dengan function DiscKomisi($komisi, $Disc%)
                                        $potonganKomisiSupplier=DiscKomisi($KomisiSupplier, 20);
                                        //ini feeBC di potong 20% udah karena untuk masuk ke komisi layanan BZP
                                        $potonganFeeBC=DiscKomisi($feeBC['potongan'], 20);
                                        //echo $feeBC['potongan']."<br>";
                                        //echo $potonganKomisiSupplier['potongan']."<br>";
                                        //echo $valueDetail->price * $valueDetail->quantity."<br>";

                                        $wallet = (($valueDetail->price * $valueDetail->quantity) - $FeeService - $potonganKomisiSupplier['potongan'] - $feeBC['potongan']) + $getUserSupplier[0]->wallet;
                                       // echo $wallet."<br>";
                                        //echo $FeeService + $potonganKomisiSupplier['potongan'];
                                        $model->m_model->updateas('id', $getUserSupplier[0]->id, array('wallet' => $wallet), 'user');
                                        //setalah update wallet toko berhasil
                                        //sekarang update wallet admin untuk penambahan fee yang didapat
                                        updateWalletCompany($FeeService + $potonganKomisiSupplier['potongan']+$potonganFeeBC['potongan']);
                                        updateAgentWallet($agent_user_id, $feeBC['potongan']-$potonganFeeBC['potongan']);
                                    }
                                }
                            }
                            $getProduct = $model->m_model->selectas('id', $getProductStore[0]->product, 'product');
                            if (count($getProduct) > 0) {
                                $qty = $getProduct[0]->quantity - $valueDetail->quantity;
                                $model->m_model->updateas('id', $getProduct[0]->id, array('quantity' => $qty), 'product');
                            }
                        }
                    }
                }
                $model->m_model->updateas('id', $order_store, array('orders_status' => 3), 'orders_store');
            }
        }
        //-- Add fund shipping cost to supplier
        $getSupplier = $model->m_model->selectas('id', $checkOrderStore[0]->store, 'store');
        if (count($getSupplier) > 0) {
        	$getUserSupplier = $model->m_model->selectas('id', $getSupplier[0]->user, 'user');
        	if (count($getUserSupplier) > 0) {
        		$wallet = $checkOrderStore[0]->shipping_cost + $getUserSupplier[0]->wallet;
        		$model->m_model->updateas('id', $getUserSupplier[0]->id, array('wallet' => $wallet), 'user');
        	}
        }
    }
}

function checkFeeForProduct($priceProduct=null){
    $Fee=0;
    if($priceProduct!=null){
        if($priceProduct >=50000000){
            $Fee=$priceProduct*1/100;
        }
        else{
            $Fee=0;
        }
    }
    return $Fee;
}

function DiscKomisi($komisi=0, $disc=0){
    //$disc dalam bentuk persentasi 20=20%, 30=30%, 75=75%
    $r=array();
    $r['potongan']= $komisi*$disc/100;
    return $r;
}

function feeBC($penjualan=0, $komisi=0){
    //$komisi dalam bentuk persentasi 20=20%, 30=30%, 75=75%
    //$penjualan nilai penjualan qty*price_basic
    $r=array();
    $r['potongan']= $penjualan*$komisi/100;
    return $r;
}

function updateWalletCompany($value=0){
    //$value itu nilai yang dipakai untuk memotong hasil komisi marketer jadi nilai potongan itu masuk
    //ke wallet perusahaan
    $model = get_instance();
    //check wallet perusahaan dulu
    $data = $model->m_model->selectas('name_company', 'Bazaarplace', 'wallet_admin');
    if(count($data)>0){
        $walletCompany=$data[0]->wallet+$value;
        $update_status = $model->m_model->updateas('id', $data[0]->id, array('wallet'=>$walletCompany), 'wallet_admin');
    }
    else{
        $walletCompany=$value;
        $paramWallet=array(
                        'name_company'=>'Bazaarplace',
                        'wallet'=>$walletCompany
                    );
        $model->m_model->create($paramWallet, 'wallet_admin');
    }

    return TRUE;    
}

function FeeBCreator($store_supplier, $product_store_id, $subtotal=0){
    $model = get_instance();
    //check apakah ada business cretornya atau tidak
    $BCreator=$model->m_model->selectas2('store_id_supplier', $store_supplier,'product_store_id', $$product_store_id, 'business_creator');
    $komisi=0;
    if(count($BCreator)>0){
        foreach ($BCreator as $keyBCreator => $valueBCreator) {
            # code...
            $fee=$valueBCreator->fee; //ini dalam bentuk %
            $komisi= ($subtotal * $fee/100);
        }
    }
    else{
        $komisi=0;
    }
    return $komisi;   
}

function updateAgentWallet($agent_user_id, $value){
    $model = get_instance();
    $query="update user set wallet=wallet+".$value." where id ='".$agent_user_id."'";
    $model->m_model->querycustom($query);  
}

function categories() {
    $model = get_instance();
    $model->load->model('m_model');
    $sql="select * from category_parent ORDER BY order_nav ASC, id ASC";
	$data = $model->m_model->selectcustom($sql);
	return $data;
}

function categories_store($categories_store=null) {
    $model = get_instance();
    $model->load->model('m_model');
    if($categories_store!=null){
        $where = "id in (".$categories_store.")";
    }
    else{
        $where = "";
    }
    $sql="select * from category_parent where ".$where." ORDER BY order_nav ASC, id ASC";
    $data = $model->m_model->selectcustom($sql);
    return $data;
}

function categoryParentName($id, $lang=null) {
    $model = get_instance();
    $model->load->model('m_model');
	$data = $model->m_model->selectas('id', $id, 'category_parent');
	if (count($data) > 0) {
        if($lang==null || $lang=='bahasa'){
		  return $data[0]->name_id;
        }
        else{
          return $data[0]->name;
        }
	}
}

function categoryParentSEO($id) {
    $model = get_instance();
    $model->load->model('m_model');
    $data = $model->m_model->selectas('id', $id, 'category_parent');
    if (count($data) > 0) {
        return $data[0]->seo;
    }
}

function categorySubName($id, $lang=null) {
    $model = get_instance();
    $model->load->model('m_model');
	$data = $model->m_model->selectas('id', $id, 'category_sub');
	if (count($data) > 0) {
        if($lang==null || $lang=='bahasa'){
          return $data[0]->name_id;
        }
        else{
          return $data[0]->name;
        }
	}
}

function categoryChildName($id, $lang=null) {
    $model = get_instance();
    $model->load->model('m_model');
	$data = $model->m_model->selectas('id', $id, 'category_child');
	if (count($data) > 0) {
        if($lang==null || $lang=='bahasa'){
          return $data[0]->name_id;
        }
        else{
          return $data[0]->name;
        }
	}
}

function categorySubList($id) {
    $model = get_instance();
    $model->load->model('m_model');
	$data = $model->m_model->selectas('id', $id, 'category_sub');
	if (count($data) > 0) {
		return $data[0]->name;
	}
}

function membership($id=null) {
    $model = get_instance();
    $model->load->model('m_model');
    $data = $model->m_model->select('membership');
    return $data;
}

function membershipDetail($id=null) {
    $model = get_instance();
    $model->load->model('m_model');
    $query_custom="select A.*, B.type, B.badge
                    from membership_detail A 
                    join membership B on (B.id = A.membership_id)
                    where A.price>0
                    order by A.membership_id, A.period ASC";
    $data = $model->m_model->selectcustom($query_custom);
    return $data;
}

function checkmembership($user_id=null) {
    $model = get_instance();
    $model->load->model('m_model');
    $date_current=date('Y-m-d');
    $query_custom="select A.*
                    from invoices_membership A 
                    where A.status=1 && A.status_payment=2 && A.user_id=".$user_id."
                    limit 1";
    $data['data'] = $model->m_model->selectcustom($query_custom);
    if(count($data['data'])>0){
        //count sisa harganya
        $arr_date_expired=explode('-', $data['data'][0]->date_expired);
        $date_expired=date("Y-m-d", mktime( 0, 0, 0, $arr_date_expired[1], $arr_date_expired[2], $arr_date_expired[0]));
        if(strtotime($date_expired)>= strtotime($date_current)){
            $data['status']="1";
        }
        else{
            $data['status']="2";
            $update_status = $model->m_model->updateas('id', $data['data'][0]->id, array('status'=>$data['status']), 'invoices_membership');
            $update_badge = $model->m_model->updateas('user', $user_id, array('badge'=>NULL), 'store');
        }
    }
    else{
        $data['status']=0;
    }
    return $data;
}
//----------------

function check_img($path=null) {
    stream_context_set_default( [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    $data=array();
    if($path==null){
        $data['path']=base_url('images/images.jpeg');
        
        return $data;
    }

    $path_arr=explode('/', $path);
    $num_path_arr=count($path_arr);
    $i=1;
    $new_path="";
    foreach ($path_arr as $value) {
        if($i == $num_path_arr){
            $value=rawurlencode($value) ;
            $new_path.=$value;
        }
        else{
            $new_path.=$value."/";
        }
        $i++;
    }
    // print_r($new_path);
    $headers = base_url($new_path);
    // print('cekkkss'.$headers);
    $id_header=substr($headers[0], 9, 3);
    // print_r('array_intersect_assoc(array1, array2)'.$id_header);
    if($headers){
        //connection OK 
        $data['path']=base_url($new_path);
    }
    else{
        //connection NOT FOUND
        $data['path']=base_url('images/images.jpeg');
    }
    // print_r($data);
    return $data;
}

function convert_tgl_MdY($time) {
    $strtime=strtotime($time);
    $tgl=date('M d Y', $strtime);
    return $tgl;
}

function convert_time_HiMdY($time) {
    $strtime=strtotime($time);
    $tgl=date('H:i | M d Y', $strtime);
    return $tgl;
}
function convert_time_NdMYHis($time) {
    $strtime=strtotime($time);
    $tgl=date('l, d F Y H:i:s', $strtime);
    return $tgl;
}

function convert_time_dmy($time, $type_date='date') {
    if($time==null || $time=='0000-00-00'){
        return '';
    }
    if($type_date=='date'){
        $arr_date=explode('-', $time);
        $time=date("d-m-Y", mktime(0, 0, 0, $arr_date[1], $arr_date[2], $arr_date[0]));
    }
    //$strtime=strtotime($time);
    $tgl=$time;
    return $tgl;
}

function convert_time_ymd($time, $type_date='date') {
    if($time==null || $time=='0000-00-00'){
        return '';
    }
    if($type_date=='date'){
        $arr_date=explode('-', $time);
        $time=date("Y-m-d", mktime(0, 0, 0, $arr_date[1], $arr_date[0], $arr_date[2]));
    }
    //$strtime=strtotime($time);
    $tgl=$time;
    return $tgl;
}

function get_month() {
  $MonthArray = array(
    "1" => "January", "2" => "February", "3" => "March", "4" => "April",
    "5" => "May", "6" => "June", "7" => "July", "8" => "August",
    "9" => "September", "10" => "October", "11" => "November", "12" => "December",
  );
    return $MonthArray;
}

function getChannelPayment() {
    $MerchantId="32451";
    $UserId="bot32451";
    $password="hT5chpSv";
    $Signature=sha1(md5(($UserId.$password)));
    //json get_channel
    $jsonGetChannel='{"request":"Daftar Payment Channel","merchant_id":"'.$MerchantId.'", "merchant":"Indo Bazaar", "signature":"'.$Signature.'"}';
  // end param get channel payment
    $curl = curl_init();
    curl_setopt_array($curl, array(
        //CURLOPT_URL => "https://dev.faspay.co.id/cvr/100001/10", //development
        CURLOPT_URL => "https://web.faspay.co.id/cvr/100001/10", //production
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $jsonGetChannel,
        CURLOPT_SSL_VERIFYHOST=> false,
        CURLOPT_SSL_VERIFYPEER=> false
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        return 0;
    }
    else {
        //print_r($response);
        $data = json_decode($response, true);
        return $data;
    }
}


function getVirtualAcc($data_invoice) {
    $MerchantId="32451";
    $UserId="bot32451";
    $password="hT5chpSv";
    $bill_no=$data_invoice['data_orders']['ref'];
    $Signature=sha1(md5(($UserId.$password.$bill_no)));
    $payment_channel=$data_invoice['data_orders']['payment'];
    $expired_payment=$data_invoice['data_orders']['expired_payment'];
    $created=$data_invoice['data_orders']['created'];
    $user=$data_invoice['data_orders']['user'];
    $user_name=$data_invoice['user_data']->name;
    $email=$data_invoice['user_data']->email;
    $phone_number=$data_invoice['user_data']->phone;
    $total_amount=$data_invoice['total_amount'];
    //json get_channel
    $jsonGetVA='{
                      "request":"Transmisi Info Detil Pembelian",
                      "merchant_id":"'.$MerchantId.'",
                      "merchant":"Indo Bazaar",
                      "bill_no":"'.$bill_no.'",
                      "bill_reff":"'.$bill_no.'",
                      "bill_date":"'.$created.'",
                      "bill_expired":"'.$expired_payment.'",
                      "bill_desc":"Pembayaran #'.$bill_no.'",
                      "bill_currency":"IDR",
                      "bill_gross":"0",
                      "bill_miscfee":"0",
                      "bill_total":"'.$total_amount.'",
                      "cust_no":"'.$user.'",
                      "cust_name":"'.$user_name.'",
                      "payment_channel":"'.$payment_channel.'",
                      "pay_type":"1",
                      "bank_userid":"",
                      "msisdn":"'.$phone_number.'",
                      "email":"'.$email.'",
                      "terminal":"10",
                      "billing_name":"0",
                      "billing_lastname":"0",
                      "billing_address":"",
                      "billing_address_city":"",
                      "billing_address_region":"",
                      "billing_address_state":"",
                      "billing_address_poscode":"",
                      "billing_msisdn":"",
                      "billing_address_country_code":"ID",
                      "receiver_name_for_shipping":"",
                      "shipping_lastname":"",
                      "shipping_address":"",
                      "shipping_address_city":"",
                      "shipping_address_region":"",
                      "shipping_address_state":"",
                      "shipping_address_poscode":"",
                      "shipping_msisdn":"",
                      "shipping_address_country_code":"ID",
                      "item":[
                        {
                          "product":"'.$bill_no.'",
                          "qty":"1",
                          "amount":"'.$total_amount.'",
                          "payment_plan":"01",
                          "merchant_id":"'.$MerchantId.'",
                          "tenor":"00"
                        }
                      ],
                      "reserve1":"",
                      "reserve2":"",
                      "signature":"'.$Signature.'"
                    }';
  // end param get channel payment
    $curl = curl_init();
    curl_setopt_array($curl, array(
        //CURLOPT_URL => "https://dev.faspay.co.id/cvr/300011/10", //development
        CURLOPT_URL => "https://web.faspay.co.id/cvr/300011/10", //production
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $jsonGetVA,
        CURLOPT_SSL_VERIFYHOST=> false,
        CURLOPT_SSL_VERIFYPEER=> false
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    //print_r($response);
    //echo "<br>";
    //echo $err;
    //die();
    curl_close($curl);
    if ($err) {
        return 0;
    }
    else {
        //print_r($response);
        $data = json_decode($response, true);
        return $data;
    }
}

function redirect_faspay($url) {
    echo $url;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST=> false,
        CURLOPT_SSL_VERIFYPEER=> false
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if (!empty($response)) {
        return FALSE;
    }
    else {
        return TRUE;
    }
}


function dapatkanDate($day) {
    //$day should be -day or +day
    //is just string
    $theDate=date('Y-m-d H:i:s', strtotime($day.' day'));
    return $theDate;
}

function TotalOfProduct($sql) {
    $model = get_instance();
    $model->load->model('m_model');
    $query=$model->m_model->selectcustom($sql);
    $numAll=count($query);
    return $numAll;
}

function TotalOfPage($numAll, $numLimit) {
    $page=floor($numAll/$numLimit);
    $restItem=$numAll%$numLimit;
    if($restItem>0){
        $page++;
    }
    return $page;
}

function clean_string($string)
{
    # code...
    $ord=preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', nl2br($string));
    
    return $ord;
}

function pagingnation($totalProduct, $limit, $page_active, $param, $links=4){ 
    $last       = ceil( $totalProduct / $limit );
 
    $start      = ( ( $page_active - $links ) > 0 ) ? $page_active - $links : 1;
    $end        = ( ( $page_active + $links ) < $last ) ? $page_active + $links : $last;
 
    $html       = '<nav class="pagination">
                      <div class="column">
                        <ul class="pages pull-right">';
 
    $class      = ( $page_active == 1 ) ? "disabled" : "";
    if($page_active == 1){
        $html       .= '<li class="' . $class . '"><a href="#">&laquo;</a></li>';
    }
    else{
        $html       .= '<li class="' . $class . '"><a href="'.$param.'page=' . ( $page_active - 1 ) . '">&laquo;</a></li>';   
    }
 
    if ( $start > 1 ) {
        $html   .= '<li class="page-link"><a href="'.$param.'page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $page_active == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="'.$param.'page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="active disabled"><span>...</span></li>';
        $html   .= '<li class="page-link"><a href="'.$param.'page=' . $last . '">' . $last . '</a></li>';
    }
 
    $class      = ( $page_active == $last ) ? "disabled" : "";
    if($page_active == $last){
        $html       .= '<li class="' . $class . '"><a href="#">&raquo;</a></li>';
    }
    else{
        $html       .= '<li class="' . $class . '"><a href="'.$param.'page=' . ( $page_active + 1 ) . '">&raquo;</a></li>';
    }
 
    $html       .= '</ul></div></nav>';
 
    return $html;
}

function create_folder_store($combine2=null, $combine1=null){
    // Desired folder structure
    //$structure = './depth1/depth2/depth3/';
    if($combine2 == null || $combine1 == null){
        return array('status'=>FALSE);
    }
    else{
        $name_folder = $combine1.'-'.$combine2;
        $structure = FCPATH.'/images/product/'.$name_folder;
        // To create the nested structure, the $recursive parameter 
        // to mkdir() must be specified.

        if (mkdir($structure, 0777, true)) {
            return array('status'=>TRUE, 'name_directory'=>$name_folder);
        }
        else{
            return array('status'=>FALSE);
        }
    }
}

function clearText($value){
    if($value!=null){
        $value = trim($value);
        $value = filter_var($value, FILTER_SANITIZE_MAGIC_QUOTES);
    }
    return $value;
}

function notifyApproval($productStore_tmp=null, $status='approved') {
    if($productStore_tmp == null){
        return false;
    }
    $model = get_instance();
    $model->load->model('m_model');
    //getlang product
    $lang_product=$model->m_model->selectas('product', $productStore_tmp[0]->product,'product_lang');
    $storeMkt=$productStore_tmp[0]->store;
    $userMkt=$productStore_tmp[0]->user;
    $productStore=$model->m_model->selectas2('product', $productStore_tmp[0]->product, 'store', $storeMkt,'product_store');
    switch ($status) {
        case 'approved':
            $paramNotify = array(
                'user' => $userMkt, 
                'global_id' => $userMkt.$productStore[0]->id, 
                'global_type' => 'userMKTproduct_store', 
                'notify' => 'New Product Approved #'.$lang_product[0]->title, 
                //'link' => 'marketer/readNotif/'.$userMkt.$productStore[0]->id.'?link=product/detail/'.$productStore[0]->id.'/'.$lang_product[0]->seo, 
                'link' => 'marketer/readNotif/'.$userMkt.$productStore[0]->id.'?link=marketer/product/', 
                'date' => date('Y-m-d h:i:s')
            );
            $model->m_model->create($paramNotify, 'user_notify');
            break;
        case 'unapproved':
            $paramNotify = array(
                'user' => $userMkt, 
                'global_id' => $userMkt.$productStore[0]->id, 
                'global_type' => 'userMKTproduct_store', 
                'notify' => 'New Product Unapproved #'.$lang_product[0]->title, 
                //'link' => 'marketer/readNotif/'.$userMkt.$productStore[0]->id, 
                'link' => 'marketer/readNotif/'.$userMkt.$productStore[0]->id.'?link=marketer/product/', 
                'date' => date('Y-m-d h:i:s')
            );
            $model->m_model->create($paramNotify, 'user_notify');
            break;
    }
}


/*------------------------------------ASDP-----------------------------------*/
function cabangs() {
    $model = get_instance();
    $model->load->model('m_model');
    $sql="select * from cabangs where deleted_at IS NULL && status=1 ORDER BY id ASC";
    $data = $model->m_model->selectcustom($sql);
    return $data;
}

function pelabuhan() {
    $model = get_instance();
    $model->load->model('m_model');
    $sql="select * from pelabuhans ORDER BY id ASC";
    $data = $model->m_model->selectcustom($sql);
    return $data;
}