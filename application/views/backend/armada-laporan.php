<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="icon" href="<?= site_url('images/ico.jpg') ?>" sizes="192x192">
  <title>ASDP</title>
  <style>
    body {
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif; 
    }

    @page {
      margin: 20px 0px;
    }


    body {
      margin-top: 5cm;
      /*margin-left: 0cm;
      margin-right: 0cm;*/
      font-style: normal;

    }

    .ui.table.bordered {
      border: solid black 2px;
      border-collapse: collapse;
      width: 100%;
    }

    .ui.table.bordered td {
      border: solid black 1px;
      border-collapse: collapse;
      /*padding:10px;*/
    }

    .ui.table.bordered td img {
      padding: 10px;
    }

    .ui.table.bordered td.center.aligned {
      text-align : center;
    }


    header {
      position: fixed;
      top: -55px;
      height: 50px;
      text-align: center;
      line-height: 35px;
    }

    main {
      position: sticky;
      font-size : 12px;
      margin-top : -2px;
      margin-left: 1px;
      margin-right: 1px;
      border: solid black 1.5px;
      border-collapse: collapse;
      width: 100%;
    }

    footer {
      position: fixed;
      bottom: -60px;
      left: 0px;
      right: 0px;
      height: 50px;


      text-align: center;
      line-height: 35px;
      clear: both;
    }
    .footer .page-number:after {
      content: counter(page);
    }

    .col-6 {
      -webkit-box-flex: 0;
      -ms-flex: 20% 20% 50%;
      flex: 20% 20% 50%;
      max-width: 50%;
    }

    .row {
      /*border: #c0c5c7 1px dashed;*/
      margin: auto;
      margin-right: 0px;
      margin-left: 0px;
      margin-top: auto;
    }
    .col-sm-4 {
        width: 63.33333333%;
    }
    .col-sm-3 {
        width: 27%;
    }
    .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
        float: left;
    }
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    /* Create three equal columns that floats next to each other */
    .column {
      float: left;
      
      height: 300px; /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
  </style>



</head>
<body>
  <script type="text/php">

  </script>

  <header>

    <table class="ui table" style="width: 100%;position: relative;">
      <tr>
        <td class="" style="width: 400px">
            <center style="position:relative;top:45px;"><img src="<?= base_url('images/logo-r.png'); ?>" style="width: 350px;"></center>
            <div style="font-size: 8px;position: relative;left:80px;top: 30px;color: #6f7176;"><b>PT. ASDP Indonesia Ferry (Persero)</b><span style="margin-left: 50px">https://www.indonesiaferry.co.id</span></div>
            <div style="font-size: 8px;position: relative;left:80px;top: 10px;color: #6f7176;">Jl. Jend. Ahmad Yani Kav. 52 A <span style="margin-left: 70px">pelanggan@indonesiaferry.co.id</span></div>
            <div style="font-size: 8px;position: relative;left:80px;top: -10px;color: #6f7176;">Cempaka Putih Timur,Kota Jakarta Pusat <span style="margin-left: 40px">(021) 191</span></div>

        </td>
        <td class="center aligned">
            <div class="row">
                <div class="column" style="background-color:#ffd0a1;width: 20px;height: 100px;-webkit-transform:skew(60deg);-moz-transform:skew(60deg);-o-transform:skew(-20deg);transform:skew(-20deg);margin-right: 5px;position: relative;left:30px;top: 30px;"></div>
                
                <div class="column" style="background-color:#4a599f;width: 20px;height: 60px; -webkit-transform:skew(60deg);-moz-transform:skew(60deg);-o-transform:skew(-20deg);transform:skew(-20deg);margin-right: 5px;position: relative;left: 65px;top: 52px;">
                </div>
                <div class="column" style="background-color:#dbdeec;width: 430px;height: 60px; -webkit-transform:skew(-21deg);-moz-transform:skew(-21deg);-o-transform:skew(-20deg);transform:skew(-20deg);position:relative;top: 52px;">
                    <h3 style="position: relative;top: -10px;left:20px;color: #6f7176;">FORM LAPORAN <?= $data['judul']; ?></h3>
                </div>
            </div>
        </td>
      </tr>
      <tr>
          <td colspan="2" rowspan="" headers="" style="background-color: #ffd0a1;"></td>
      </tr>
      <tr>
        <td class="" colspan="2" style="background-color: #dbdeec;color: #6f7176;">
            <center><?= $data['record']->name; ?></center>
        </td>
      </tr>
      <tr>
          <td colspan="2" rowspan="" headers="" style="background-color: #ffd0a1;"></td>
      </tr>
    </table>
  </header>



  <style type="text/css">

  </style>

  <?php
  $img=check_img($data['record']->foto);
  ?>
  
    <center><img src="<?= $img['path']; ?>" style=""></center>
  
  <?php

  $dataArmadaElment = $this->m_model->selectcustom("select armada.id as armada_id, armada.name as armada_name, armada.cabang_id, armada.pelabuhan_id, armada_elements.id as armada_elments_id, armada_elements.url_canvas, armada_elements.name from armada inner join armada_elements on armada.id=armada_elements.armada_id where armada.id=".$data['record']->id."");
  // print_r($dataArmadaElment);
  // die();
  if(count($dataArmadaElment) > 0){
    foreach ($dataArmadaElment as $k => $value) {
      ?>
      <table class="ui table" style="font-size: 14px;width: 100%;">
        <tbody>
          <tr>
            <td colspan="" rowspan="" headers="" style="color: white;height: 40px;vertical-align: center;">
                <div style="border-bottom: 25px solid #0ac8e0;border-right: 50px solid transparent;height: 0;width: 500px;">
                    <span style="">&nbsp;&nbsp;<?= $k+1; ?>. <?= $value->name; ?></span>
                </div>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="ui table" style="font-size: 13px;width: 100%;">
        <tbody>
          <tr>
            <td colspan="" rowspan="" headers="">
              <?php
                
                if(isset($value->url_canvas)){
                  $imgCanvas=check_img($value->url_canvas);  
                  $styles = 'width: 600px;height: 840px';
                }else{
                  $imgCanvas=array(
                    'path' => 'images/no-images.png'
                  );
                  $styles = '';
                }
              ?>
              <center><img src="<?= $imgCanvas['path'] ?>" alt="" style="<?= $styles; ?>"></center>
            </td>
          </tr>
        </tbody>
      </table>
      <?php
      $jenisAspek = $this->m_model->selectas('status','Armada','jenis_aspeks');
      if(count($jenisAspek)){
        foreach ($jenisAspek as $k1 => $value1) {
          ?>
            <table class="ui table" style="font-size: 13px;width: 100%;">
              <tbody>
                <tr>
                   <td colspan="" rowspan="" headers="" style="color: white;height: 40px;vertical-align: center;">
                      <div style="border-bottom: 25px solid #4a599f;border-right: 50px solid transparent;height: 0;width: 500px;">
                          <span style="">&nbsp;&nbsp;<?= $value1->nama_aspek; ?></span>
                      </div>
                  </td>
                </tr>
              </tbody>
            </table>
              <?php
                $subAspek = $this->m_model->selectas('jenis_aspek_id',$value1->id,'sub_aspeks');
                if(count($subAspek) > 0){
                  foreach ($subAspek as $k2 => $value2) {
              ?>
              <table class="" style="font-size: 13px;width: 100%;border-collapse: collapse;">
                <tbody>
                  <tr>
                    <td colspan="" rowspan="" headers="" style="width: 10px">
                      <label></label>
                    </td>
                    <td colspan="2" rowspan="" headers="" style="background-color: #ebecec;color: black;">
                        <div style="border-bottom: 25px solid #ffd0a1;border-right: 50px solid transparent;height: 0;width: 500px;">
                            <span style="">&nbsp;&nbsp;<?= $value2->name; ?></span>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                    </td>
                  </tr>
                </tbody>
                <?php
                $ArmdHsl = $this->m_model->selectcustom("select * from trans_armada_hasil where id_armada=".$data['record']->id." and id_armada_elments=".$value->armada_elments_id." and id_jenis_aspek=".$value1->id." and id_sub_jenis_aspek=".$value2->id." group by icon_id");
                if(count($ArmdHsl) > 0){
                  foreach ($ArmdHsl as $k3 => $value3) {
                    $getIcon = $this->m_model->selectOne('id',$value3->icon_id,'icon');
                    $HslArmdAll = $this->m_model->selectcustom("select * from trans_armada_hasil where id_armada=".$data['record']->id." and id_armada_elments=".$value->armada_elments_id." and id_jenis_aspek=".$value1->id." and id_sub_jenis_aspek=".$value2->id." and icon_id=".$value3->icon_id."");
                    ?>
                    <tbody>
                      <tr>
                        <td colspan="" rowspan="" headers="" style="width: 10px">
                          <label></label>
                        </td>
                        <td colspan="2" rowspan="" headers="" style="background-color: #ebecec;">
                          <ul style="list-style: square">
                            <li>
                              <b>
                                <?= $getIcon->name; ?>
                              </b>  
                            </li>
                          </ul>
                        </td>
                      </tr>
                    </tbody>
                    <?php
                    if(count($HslArmdAll) > 0){
                      $split = 4;
                      $HslArmdAll1 = array_chunk($HslArmdAll, $split);
                         foreach ($HslArmdAll1 as $k4 => $value4) {
                        ?>
                          <tbody>
                            <tr>
                              <td colspan="" rowspan="" headers="">
                                  
                              </td>
                              <td colspan="2" rowspan="" headers="" style="background-color: #ebecec;">
                                  <div style="background-color: white;">
                                    <div class="row" style="position: relative;left: 15px">
                                      <?php
                                          foreach ($value4 as $k5 => $value5) {
                                              
                                      ?>
                                        <div class="col-sm-2" style="background-color: #ebecec;margin-bottom: 10px;top:10px;margin-right: 10px;height: 200px;font-size: 11px;max-width: 150px">
                                      <!-- <p style="max-width: 100px;">Nama : <?= $value4->nama; ?></p><br> -->
                                            Nomor : <?= $value5->nomor; ?><br>
                                            Kondisi : <?= $value5->kondisi; ?><br>
                                            Posisi : <?= $value5->posisi; ?><br>
                                            Tahun Pengadaan : <?= $value5->tahun; ?><br>
                                            Lampiran Foto :<br>
                                            <?php
                                              $cekFiless = $this->m_model->selectas('trans_id',$value5->id,'trans_armada_hasil_foto');
                                                  if(count($cekFiless) > 0){
                                                  $imgFf=check_img($cekFiless[0]->fileurl);
                                              ?>
                                                  <img src="<?= $imgFf['path']; ?>" width="150px" height="85px" style="position: relative;margin-left: -11px;">
                                              <?php
                                                  }
                                              ?>
                                        </div>
                                      <?php
                                          }
                                      ?>
                                    </div>
                                  </div>
                                  
                              </td>
                            </tr>
                            <tr>
                              <td colspan="" rowspan="" headers="" style="width: 10px">
                                <label></label>
                              </td>
                              <td colspan="2" rowspan="" headers="" style="background-color: #ebecec;">
                                  <br>    
                              </td>
                            </tr>
                          </tbody>
                        <?php
                      }
                    }
                  }
                    ?>
                  </table>
                    <?php
                }else{
                  ?>
                  <table class="" style="font-size: 13px;width: 100%;border-collapse: collapse;">
                    <tbody>
                      <tr>
                          <td colspan="" rowspan="" headers="" style="width: 10px">
                            <label></label>
                          </td>
                          <td colspan="" rowspan="" headers="" style="background-color: #ebecec;">
                              <div style="background-color: white;color: red;">
                                <center>Belum Tersedia</center>
                              </div>
                          </td>
                          <td colspan="" rowspan="" headers="" style="width: 10px;background-color: #ebecec;">
                          </td>
                      </tr>
                      <tr>
                          <td colspan="" rowspan="" headers="" style="width: 10px">
                            <label></label>
                          </td>
                          <td colspan="2" rowspan="" headers="" style="background-color: #ebecec;">
                              <br>    
                          </td>
                      </tr>
                    </tbody>
                  </table>
                  <?php
                }
                ?> 
              <?php
                  }
                }
              ?>  
            </table>
          <?php
        }
      }
    }
    }
   ?>
   <hr>
   <!-- BATAS LAPORAN BARU -->
   <?php
  if(count($dataArmadaElment) > 0){
    foreach ($dataArmadaElment as $k => $value) {
      ?>
        <table class="ui table bordered" style="font-size: 13px;width: 100%;">
        <tbody>
          <tr>
            <td colspan="" rowspan="" headers="" style="width: 80px;background-color: #ffe5d3;">
              <center><b><label><?= $value->name; ?></label></b></center>
            </td>
            <td colspan="" rowspan="" headers="">
              <ul>
                    <?php
                      $jenisAspek = $this->m_model->selectas('status','Armada','jenis_aspeks');
                      if(count($jenisAspek)){
                        foreach ($jenisAspek as $k1 => $value1) {
                          ?>
                            <li>
                              <b><label ><?= $k1+1; ?>. <?= $value1->nama_aspek; ?></label></b>
                              <ul>
                                <?php
                                  $subAspek = $this->m_model->selectas('jenis_aspek_id',$value1->id,'sub_aspeks');
                                  if(count($subAspek) > 0){
                                    foreach ($subAspek as $k2 => $value2) {
                                ?>
                                      <li><?= $value2->name; ?></li>
                                      <ul>
                                        <?php
                                        $ArmdHsl = $this->m_model->selectcustom("select * from trans_armada_hasil where id_armada=".$data['record']->id." and id_armada_elments=".$value->armada_elments_id." and id_jenis_aspek=".$value1->id." and id_sub_jenis_aspek=".$value2->id." group by icon_id");
                                        if(count($ArmdHsl) > 0){
                                          foreach ($ArmdHsl as $k3 => $value3) {
                                            $getIcon = $this->m_model->selectOne('id',$value3->icon_id,'icon');
                                            $HslArmdAll = $this->m_model->selectcustom("select * from trans_armada_hasil where id_armada=".$data['record']->id." and id_armada_elments=".$value->armada_elments_id." and id_jenis_aspek=".$value1->id." and id_sub_jenis_aspek=".$value2->id." and icon_id=".$value3->icon_id."");
                                            ?>
                                            <li><?= $getIcon->name; ?></li>
                                            <ul style="list-style-type: lower-alpha;">
                                              <?php
                                              if(count($HslArmdAll) > 0){
                                                // foreach ($HslArmdAll as $k4 => $value4) {
                                              ?>
                                                <li>Jumlah : <?= count($HslArmdAll); ?></li>
                                                <li>Unit : -</li>
                                              <?php
                                                // }
                                              }
                                              ?>
                                            </ul>
                                        <?php
                                          }
                                        }
                                        ?>
                                      </ul>
                                <?php
                                    }
                                  }
                                ?>
                              </ul>
                            </li>
                          <?php
                        }
                      }
                    ?>  
                    </ul>
            </td>
          </tr>
        </tbody>
      </table>
      <?php
    }
  }
  ?>
</body>
</html>
