<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="icon" href="<?= site_url('images/ico.jpg') ?>" sizes="192x192">
  <title>ASDP</title>
  <style>

    @page {
      margin: 100px 0px;
    }


    body {
      margin-top: 2cm;
      margin-left: 0cm;
      margin-right: 0cm;
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
      top: -135px;
      left: 0px;
      right: 0px;
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

    main p {
      margin-left: 5px;
      margin-right: 5px;
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

    <table class="ui table" style="width: 100%">
      <tr>
        <td class="" style="width: 400px">
            <center style="position:relative;top:45px;"><img src="<?= base_url('images/logo-r.png'); ?>" style="width: 350px;"></center>
            <div style="font-size: 8px;position: relative;left:80px;top: 30px"><b>PT. ASDP Indonesia Ferry (Persero)</b><span style="margin-left: 50px">https://www.indonesiaferry.co.id</span></div>
            <div style="font-size: 8px;position: relative;left:80px;top: 10px;">Jl. Jend. Ahmad Yani Kav. 52 A <span style="margin-left: 70px">pelanggan@indonesiaferry.co.id</span></div>
            <div style="font-size: 8px;position: relative;left:80px;top: -10px;">Cempaka Putih Timur,Kota Jakarta Pusat <span style="margin-left: 40px">(021) 191</span></div>

        </td>
        <td class="center aligned">
            <div class="row">
                <div class="column" style="background-color:#ffd0a1;width: 20px;height: 100px;-webkit-transform:skew(60deg);-moz-transform:skew(60deg);-o-transform:skew(-20deg);transform:skew(-20deg);margin-right: 5px;position: relative;left:30px;top: 30px;"></div>
                
                <div class="column" style="background-color:#4a599f;width: 20px;height: 60px; -webkit-transform:skew(60deg);-moz-transform:skew(60deg);-o-transform:skew(-20deg);transform:skew(-20deg);margin-right: 5px;position: relative;left: 65px;top: 52px;">
                </div>
                <div class="column" style="background-color:#dbdeec;width: 430px;height: 60px; -webkit-transform:skew(-21deg);-moz-transform:skew(-21deg);-o-transform:skew(-20deg);transform:skew(-20deg);position:relative;top: 52px;">
                    <center><h3 style="position: relative;top: -15px;color: #6f7176">FORM LAPORAN <?= $data['judul']; ?></h3></center>
                </div>
            </div>
        </td>
      </tr>
      <tr>
          <td colspan="2" rowspan="" headers="" style="background-color: #ffd0a1;"></td>
      </tr>
      <tr>
        <td class="" colspan="2" style="background-color: #dbdeec;">
            <center><?= $data['record']->name; ?></center>
        </td>
      </tr>
      <tr>
          <td colspan="2" rowspan="" headers="" style="background-color: #ffd0a1;"></td>
      </tr>
    </table>
  </header>
<br>
  <?php
  $img=check_img($data['record']->url_canvas);
  ?>
  <center><img src="<?= $img['path']; ?>"></center>

  <div style="margin-top: 15px">

  <?php
  $dataPlbhHsl = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." group by id_jenis_aspek");
  if(count($dataPlbhHsl) > 0){
    foreach ($dataPlbhHsl as $k => $value) {
      $jenisAspek = $this->m_model->selectOne('id',$value->id_jenis_aspek,'jenis_aspeks');
      ?>
      <table class="ui table" style="font-size: 14px;width: 100%;">
        <tbody>
          <tr>
            <td colspan="" rowspan="" headers="" style="color: white;height: 40px;vertical-align: center;">
                <div style="border-bottom: 25px solid #4a599f;border-right: 50px solid transparent;height: 0;width: 500px;">
                    <span style="">&nbsp;&nbsp;<?= $k+1; ?>. <?= $jenisAspek->nama_aspek; ?></span>
                </div>
            </td>
          </tr>
        </tbody>
      <?php
      $subAspek = $this->m_model->selectas('jenis_aspek_id',$jenisAspek->id,'sub_aspeks');
      if(count($subAspek) > 0){
        foreach ($subAspek as $k1 => $value1) {
          ?>
          <table class="" style="font-size: 13px;width: 100%;border-collapse: collapse;">
            <tbody>
              <tr>
                <td colspan="" rowspan="" headers="" style="width: 10px">
                  <label></label>
                </td>
                <td colspan="2" rowspan="" headers="" style="background-color: #ebecec;color: black;">
                    <div style="border-bottom: 25px solid #ffd0a1;border-right: 50px solid transparent;height: 0;width: 500px;">
                        <span style="">&nbsp;&nbsp;<?= $value1->name; ?></span>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                </td>
              </tr>
            </tbody>
          <?php
          $checkPbHslTrue = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." and id_jenis_aspek=".$jenisAspek->id." and id_sub_jenis_aspek=".$value1->id." group by icon_id");
          if(count($checkPbHslTrue) > 0){
            foreach ($checkPbHslTrue as $k2 => $value2) {
              $getIcon = $this->m_model->selectOne('id',$value2->icon_id,'icon');
              $checkPbHslALL = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." and id_jenis_aspek=".$jenisAspek->id." and id_sub_jenis_aspek=".$value1->id." and icon_id=".$value2->icon_id."");
              ?>
              
                <tbody>
                  <tr>
                    <td colspan="" rowspan="" headers="" style="width: 10px">
                      <label></label>
                    </td>
                    <td colspan="2" rowspan="" headers="" style="background-color: #ebecec;">
                      <?= $getIcon->name; ?>
                    </td>
                  </tr>
                </tbody>

              <?php
              if(count($checkPbHslALL) > 0){
                $split = 4;
                $checkPbHslALL1 = array_chunk($checkPbHslALL, $split);
                   foreach ($checkPbHslALL1 as $k3 => $value3) {
                  ?>
                    <tbody>
                      <tr>
                        <td colspan="" rowspan="" headers="">
                            
                        </td>
                        <td colspan="2" rowspan="" headers="" style="background-color: #ebecec;">
                            <div style="background-color: white;">
                              <div class="row" style="position: relative;left: 15px">
                                <?php
                                    foreach ($value3 as $k4 => $value4) {
                                        
                                ?>
                                  <div class="col-sm-2" style="background-color: #ebecec;margin-bottom: 10px;top:10px;margin-right: 10px;">
                                      Nama : <?= $value4->nama; ?><br>
                                      Nomor : <?= $value4->nomor; ?><br>
                                      Kondisi : <?= $value4->kondisi; ?><br>
                                      Posisi : <?= $value4->posisi; ?><br>
                                      Tahun Pengadaan : <?= $value4->tahun; ?><br>
                                      Lampiran Foto :<br>
                                      <?php
                                        $cekFiless = $this->m_model->selectas('trans_id',$value4->id,'trans_pelabuhans_hasil_foto');
                                            if(count($cekFiless) > 0){
                                            $imgFf=check_img($cekFiless[0]->fileurl);
                                        ?>
                                            <img src="<?= $imgFf['path']; ?>" width="95px" height="75px" style="position: relative;margin-left: -11px;">
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
                ?>
              </table>
              <?php
            }
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
      <?php
    }
  }
  ?>
    
  </div>

  <hr>
  <?php
  if(count($dataPlbhHsl) > 0){
    $ampasNo = 0;
    $colspanNo = 0;
    ?> 
      <table class="ui table bordered" style="font-size: 13px;width: 100%;">
        <?php
        foreach ($dataPlbhHsl as $k => $value) {
          $jenisAspek = $this->m_model->selectOne('id',$value->id_jenis_aspek,'jenis_aspeks');
          $subAspek = $this->m_model->selectas('jenis_aspek_id',$jenisAspek->id,'sub_aspeks');
        ?>
        <tbody>
          <tr>
            <td colspan="" rowspan="" headers="" style="width: 80px;background-color: #ffe5d3;">
                <center><b><label><?= $jenisAspek->nama_aspek;   ?></label></b></center>
            </td>
            <td colspan="" rowspan="" headers="">
                <ul style="list-style: square;">
                      <?php
                      if(count($subAspek) > 0){
                      foreach ($subAspek as $k1 => $value1) {
                          $checkPbHslTrue = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." and id_jenis_aspek=".$jenisAspek->id." and id_sub_jenis_aspek=".$value1->id." group by icon_id");
                      ?>
                      <li>
                        <?= $value1->name; ?>
                        <ul>
                          <?php
                          if(count($checkPbHslTrue) > 0){
                            foreach ($checkPbHslTrue as $k2 => $value2) {
                              $getIcon = $this->m_model->selectOne('id',$value2->icon_id,'icon');
                              $checkPbHslALL = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." and id_jenis_aspek=".$jenisAspek->id." and id_sub_jenis_aspek=".$value1->id." and icon_id=".$value2->icon_id."");
                          ?>
                            <li>
                              <?= $getIcon->name; ?>
                              <ul style="list-style-type: lower-alpha;">
                                <li>Jumlah :<?= count($checkPbHslALL) ?></li>
                                <li>Unit   : -</li>
                              </ul>    
                            </li>
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
        <?php
        }
        ?>
      </table>
    <?php
  }
  ?>

</body>
</html>
