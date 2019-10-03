<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getName')) {
    function getName($id, $location) {
      $model = get_instance();
      $model->load->model('m_model');

      $name = '';
      if ($location == 'province') {
        $data = $model->m_model->selectas('id', $id, 'address_province');
        if (count($data) > 0) {
          $name = $data[0]->name;
        }
      }
      if ($location == 'city') {
        $data = $model->m_model->selectas('id', $id, 'address_city');
        if (count($data) > 0) {
          $name = $data[0]->name;
        }
      }
      if ($location == 'district') {
        $data = $model->m_model->selectas('id', $id, 'address_district');
        if (count($data) > 0) {
          $name = $data[0]->name;
        }
      }

      return $name;
    }
}
// -----------------

if (!function_exists('provinsi')) {
    function provinsi() {
    $model = get_instance();
    $model->load->model('m_model');
    $data = $model->m_model->select('address_province');
    if (count($data) > 0) {
      foreach ($data as $key => $value) {
        echo "<option value='".$value->id."'>".$value->name."</option>";
      }
    }
  } 
}

if (!function_exists('getCost')) {
    function getCost($storeLocation, $destination, $weight, $cour, $service) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$storeLocation."&originType=city&destination=".$destination."&destinationType=subdistrict&weight=".$weight."&courier=".$cour."",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: d557a1dce0c6d421605b93b1d294fafd"
            ) ,
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) { return 0; } else {
            $data = json_decode($response, true);
            for ($k = 0; $k < count($data['rajaongkir']['results']); $k++) {
            $courierCode = $data['rajaongkir']['results'][$k]['code'];
            $courierName = $data['rajaongkir']['results'][$k]['name'];
            for ($l = 0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {

            $services = $data['rajaongkir']['results'][$k]['costs'][$l]['service'];
            $cost = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];
            //$etd = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];

            if ($service == $services) {
              return $cost;
            }
            //--
          }
        }
        //--
      }
    }
  }

if (!function_exists('getCour')) {
    function getCour($storeLocation, $destination, $weight, $cour) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$storeLocation."&originType=city&destination=" . $destination . "&destinationType=subdistrict&weight=" . $weight . "&courier=" . $cour . "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: d557a1dce0c6d421605b93b1d294fafd"
            ) ,
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) { } else {
            $data = json_decode($response, true);
          
            $items = array();
            for ($k = 0; $k < count($data['rajaongkir']['results']); $k++) {
            $courierCode = $data['rajaongkir']['results'][$k]['code'];
            $courierName = $data['rajaongkir']['results'][$k]['name'];
            for ($l = 0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {

            $service = $data['rajaongkir']['results'][$k]['costs'][$l]['service'];
            $cost = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];
            $etd = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];

            $items[] = array('service' => $service, 'cost' => $cost, 'etd' => $etd);

          }
        }

        return array(
          'code' => $courierCode,
          'name' => $courierName,
          'items' => $items
        );
      }
    }
  }


//------------------
