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
      top: -100px;
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
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%;
    }

    .row {
      border: #c0c5c7 1px dashed;
      margin: auto;
      margin-right: 0px;
      margin-left: 0px;
      margin-top: auto;
    }
    .col-sm-4 {
        width: 33.33333333%;
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
      width: 33.33%;
      padding: 10px;
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

    <table class="ui table bordered">
      <tr>
        <td class="center aligned" width="30%"><img src="<?= base_url('images/logo2.png'); ?>"></td>
        <td class="center aligned">
            <div style="background-color:#ffd0a1;width: 30px;height: 80px;-webkit-transform:skew(60deg);-moz-transform:skew(60deg);-o-transform:skew(-20deg);transform:skew(-20deg);margin-right: 5px;position: relative;top: 25px;left:30px"></div>
            
            <div style="background-color:#4a599f;width: 30px;height: 60px; -webkit-transform:skew(60deg);-moz-transform:skew(60deg);-o-transform:skew(-20deg);transform:skew(-20deg);margin-right: 5px;position: relative;left: 65px;top: -45px;">
            </div>
            <div style="background-color:#dbdeec;width: 40px;height: 20px; -webkit-transform:skew(-21deg);-moz-transform:skew(-21deg);-o-transform:skew(-20deg);transform:skew(-20deg);vertical-align: center;position:relative;top: -27px;">
                <h5>Form Laporan <?= $data['judul']; ?></h5>
            </div>
        </td>
        <!-- <td colspan="" rowspan="" headers="">
            <div style="background-color:#4a599f;width: 30px;height: 20px;position:relative;top: 7px; -webkit-transform:skew(60deg);-moz-transform:skew(60deg);-o-transform:skew(-20deg);transform:skew(-20deg);margin-right: 5px;position: relative;left: 10px">
            </div> -->
            <!-- <div style="background-color:#dbdeec;width: 600px;height: 20px;position:relative;top: 7px; -webkit-transform:skew(-21deg);-moz-transform:skew(-21deg);-o-transform:skew(-20deg);transform:skew(-20deg);vertical-align: center;">
                <h5>Form Laporan <?= $data['judul']; ?></h5>
            </div> -->
        <!-- </td> -->
      </tr>
      <tr>
        <td class="center aligned" colspan="2"><?= $data['record']->name; ?></td>
      </tr>
    </table>
  </header>



  <style type="text/css">

  </style>

  <?php
  $img=check_img($data['record']->url_canvas);
  ?>
  <center><img src="<?= $img['path']; ?>"></center>
  <br>
  <br>
  <br>
  <br>
  <?php
  $dataPlbhHsl = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." group by id_jenis_aspek");
  if(count($dataPlbhHsl) > 0){
    foreach ($dataPlbhHsl as $k => $value) {
      $jenisAspek = $this->m_model->selectOne('id',$value->id_jenis_aspek,'jenis_aspeks');
      ?>
      <table class="ui table bordered" style="font-size: 13px;width: 100%;">
        <tbody>
          <tr>
            <td colspan="" rowspan="" headers="" style="background-color: #4a599f;color: white;">
              <label ><span class="" style="color: #fff !important;margin-right: .25rem !important;border-radius: 50%;background-color: #f0ad4e !important;padding: 5px 8px;"><?= $k+1; ?>.</span> <?= $jenisAspek->nama_aspek; ?></label>
            </td>
          </tr>
        </tbody>
      </table>
      <?php
      $subAspek = $this->m_model->selectas('jenis_aspek_id',$jenisAspek->id,'sub_aspeks');
      if(count($subAspek) > 0){
        foreach ($subAspek as $k1 => $value1) {
          ?>
          <table class="ui table bordered" style="font-size: 13px;width: 100%;">
            <tbody>
              <tr>
                <td colspan="" rowspan="" headers="" style="background-color: #ffd0a1;color: black;">
                  <label><?= $value1->name; ?></label>
                </td>
              </tr>
            </tbody>
          </table>
          <?php
          $checkPbHslTrue = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." and id_jenis_aspek=".$jenisAspek->id." and id_sub_jenis_aspek=".$value1->id." group by icon_id");
          if(count($checkPbHslTrue) > 0){
            foreach ($checkPbHslTrue as $k2 => $value2) {
              $getIcon = $this->m_model->selectOne('id',$value2->icon_id,'icon');
              $checkPbHslALL = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." and id_jenis_aspek=".$jenisAspek->id." and id_sub_jenis_aspek=".$value1->id." and icon_id=".$value2->icon_id."");
              ?>
              <table class="ui table bordered" style="font-size: 13px;width: 100%;">
                <tbody>
                  <tr>
                    <td colspan="" rowspan="" headers="" style="background-color: #ebecec;">
                      <h4><?= $getIcon->name; ?></h4>
                    </td>
                  </tr>
                </tbody>
              <?php
              if(count($checkPbHslALL) > 0){
                foreach ($checkPbHslALL as $k3 => $value3) {
                  ?>
                    <tbody>
                      <tr>
                        <td colspan="" rowspan="" headers="" style="background-color: white;">
                          <ul>
                            <li>
                            <div class="row" style="background-color: #ebecec">
                              Nama : <?= $value3->nama; ?><br>
                              Nomor : <?= $value3->nomor; ?><br>
                              Kondisi : <?= $value3->kondisi; ?><br>
                              Posisi : <?= $value3->posisi; ?><br>
                              Tahun Pengadaan : <?= $value3->tahun; ?><br>
                              Lampiran Foto :<br>
                              <?php
                                $cekFiless = $this->m_model->selectas('trans_id',$value3->id,'trans_pelabuhans_hasil_foto');
                                if(count($cekFiless) > 0){
                                  foreach ($cekFiless as $k4 => $value4) {
                                    ?>
                                      <img src="<?= base_url($value4->fileurl); ?>" width="150px">
                                    <?php
                                  }
                                }
                              ?>
                            </div>
                            </li>
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="" rowspan="" headers="" style="background-color: #ebecec;">
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
            <table class="ui table bordered" style="font-size: 13px;width: 100%;">
              <tbody>
                <tr>
                  <td colspan="" rowspan="" headers="" style="background-color: #ebecec;">
                    <div style="background-color: white;color: red;">
                      <center>Belum Tersedia</center>
                    </div>
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

  <hr>
  <?php
  if(count($dataPlbhHsl) > 0){
    $ampasNo = 0;
    $colspanNo = 0;
    foreach ($dataPlbhHsl as $k => $value) {
      $jenisAspek = $this->m_model->selectOne('id',$value->id_jenis_aspek,'jenis_aspeks');
      $subAspek = $this->m_model->selectas('jenis_aspek_id',$jenisAspek->id,'sub_aspeks');
      ?>
      <table class="ui table bordered" style="font-size: 13px;width: 100%;">
        <tbody>
          <tr>
            <td colspan="" rowspan="" headers="">
              <div class="row" style="background-color: #ebecec">
                <ul style="list-style:square;">
                  <li>
                    <b><label><?= $jenisAspek->nama_aspek;   ?></label></b>
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
                                <li>Posisi :</li>
                                <li>Jumlah :</li>
                                <li>Unit   :</li>
                                <li>Tahun Pengadaan :</li>
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
                  </li>
                </ul>
              </div>
            </td>
        </tbody>
      </table>
      <?php
    }
  }
  ?>
  <!-- <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br><br>
  <br>
  <br>
  <br><br>
  <br>
  <br>
  <br>
  <hr>
  <table class="ui table bordered" style="font-size: 13px;width: 100%;">
    <tbody>
      <tr>
        <td colspan="" rowspan="" headers="" style="width: 152px">
          Aspek
        </td>
        <td colspan="" rowspan="" headers="" style="width: 204px">
          Sub Aspek
        </td>
        <td colspan="" rowspan="" headers="" style="width: 250px">
          Uraian
        </td>
        <td colspan="" rowspan="" headers="" style="width: 150px">
          Posisi
        </td>
        <td colspan="" rowspan="" headers="" style="width: 150px">
          Jumlah
        </td>
        <td colspan="" rowspan="" headers="" style="width: 150px">
          Unit
        </td>
        <td colspan="" rowspan="" headers="" style="width: 150px">
          Tahun Pengadaan
        </td>
      </tr>
    </tbody>
  </table>
  <?php
  if(count($dataPlbhHsl) > 0){
    $ampasNo = 0;
    $colspanNo = 0;
    foreach ($dataPlbhHsl as $k => $value) {
      $jenisAspek = $this->m_model->selectOne('id',$value->id_jenis_aspek,'jenis_aspeks');
      $subAspek = $this->m_model->selectas('jenis_aspek_id',$jenisAspek->id,'sub_aspeks');
      if(count($subAspek) > 0){
        foreach ($subAspek as $t => $tt) {
          $checkPbHslTrue = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." and id_jenis_aspek=".$jenisAspek->id." and id_sub_jenis_aspek=".$tt->id." group by icon_id");
          $ampasNo += count($checkPbHslTrue); 
        }
      }
      $rowspan = count($subAspek)+$ampasNo+2;
      ?>
      <table class="ui table bordered" style="font-size: 13px;width: 100%;border-collapse: collapse;border:2px solid black !important">
        <tbody >
          <tr>
            <td colspan="" rowspan="<?= $rowspan; ?>" headers="">
              <?= $jenisAspek->nama_aspek;   ?></td>
          <?php
          if(count($subAspek) > 0){
            foreach ($subAspek as $k1 => $value1) {
                $checkPbHslTrue = $this->m_model->selectcustom("select * from trans_pelabuhans_hasil where id_pelabuhan=".$data['record']->id." and id_jenis_aspek=".$jenisAspek->id." and id_sub_jenis_aspek=".$value1->id." group by icon_id");
                ?>
                <tr>
                  
                  <td colspan="" rowspan="<?= count($checkPbHslTrue)+1; ?>" headers="" style="width: 200px"><?= $value1->name; ?></td>
                </tr>
                <?php
                if(count($checkPbHslTrue) > 0){
                  ?>
                  <?php
                  foreach ($checkPbHslTrue as $k2 => $value2) {
                    $getIcon = $this->m_model->selectOne('id',$value2->icon_id,'icon');
                    ?>
                    <tr>
                      <td colspan="" rowspan="" headers="" style="width: 250px"><?= $getIcon->name; ?></td>
                      <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
                      <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
                      <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
                      <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
                    </tr>
                    <?php
                  }
                  ?>
                  <?php
                }
              ?>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
      <?php
    }
  }
  ?> -->
<!--   <table class="" style="font-size: 13px;width: 100%;border-collapse: collapse;border:1px solid black !important">
    <tbody>
      <tr>
        <td colspan="" rowspan="12" headers="">
        Keamanan</td>


      </tr><tr>
        <td colspan="" rowspan="1" headers="" style="width: 200px">hmmmmm</td>

      </tr>
      <tr>
        <td colspan="" rowspan="1" headers="" style="width: 200px"></td>

      </tr>
      <tr>
        <td colspan="" rowspan="1" headers="" style="width: 200px"></td>

      </tr>
      <tr>
        <td colspan="" rowspan="1" headers="" style="width: 200px"></td>

      </tr>
      <tr>
        <td colspan="" rowspan="2" headers="" style="width: 200px">SUB</td>

      </tr>
      <tr>
        <td colspan="" rowspan="" headers="" style="width: 250px">Cek</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
      </tr>
      <tr>
        <td colspan="" rowspan="1" headers="" style="width: 200px">CEK LAGI</td>

      </tr>
      <tr>
        <td colspan="" rowspan="6" headers="" style="width: 200px">Informasi</td>

      </tr>
      <tr>
        <td colspan="" rowspan="" headers="" style="width: 250px">3. Informasi Pelayan</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
      </tr>
      <tr>
        <td colspan="" rowspan="" headers="" style="width: 250px">3. Informasi Pelayan</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
      </tr>
      <tr>
        <td colspan="" rowspan="" headers="" style="width: 250px">4. Informasi Ganggua</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
      </tr>
      <tr>
        <td colspan="" rowspan="" headers="" style="width: 250px">Cek</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
        <td colspan="" rowspan="" headers="" style="width: 150px">aa</td>
      </tr>
    </tbody>
  </table> -->
</body>
</html>
