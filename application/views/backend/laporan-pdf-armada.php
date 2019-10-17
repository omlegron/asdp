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
  </style>



</head>
<body>
  <script type="text/php">

  </script>

  <header>

    <table class="ui table bordered">
      <tr>
        <td class="center aligned" width="30%"><img src="<?= base_url('images/logo2.png'); ?>"></td>
        <td class="center aligned" width="60%"><h5>Form Laporan <?= $data['judul']; ?></h5></td>
      </tr>
      <tr>
        <td class="center aligned" colspan="2"><?= $data['record']->name; ?></td>
      </tr>
    </table>
  </header>



  <style type="text/css">

  </style>

  <?php
  $img=check_img($data['record']->foto);
  ?>
  <center><img src="<?= $img['path']; ?>" style=""></center>
  <hr>
  <?php

  $dataArmadaElment = $this->m_model->selectcustom("select armada.id as armada_id, armada.name as armada_name, armada.cabang_id, armada.pelabuhan_id, armada_elements.id as armada_elments_id, armada_elements.url_canvas, armada_elements.name from armada inner join armada_elements on armada.id=armada_elements.armada_id where armada.id=".$data['record']->id."");
  // print_r($dataArmadaElment);
  // die();
  if(count($dataArmadaElment) > 0){
    foreach ($dataArmadaElment as $k => $value) {
      ?>
      <table class="ui table bordered" style="font-size: 13px;width: 100%;">
        <tbody>
          <tr>
             <td colspan="" rowspan="" headers="">
              <center><?= $value->name; ?></center>
            </td>
          </tr>
          <tr>
            <td colspan="" rowspan="" headers="">
              <?php
                $imgCanvas=check_img($value->url_canvas);
              ?>
              <center><img src="<?= $imgCanvas['path'] ?>" alt=""  style="width: 700px;height: 500px;"></center>
            </td>
          </tr>
        </tbody>
      </table>
      <?php
      $jenisAspek = $this->m_model->selectas('status','Armada','jenis_aspeks');
      if(count($jenisAspek)){
        foreach ($jenisAspek as $k1 => $value1) {
          ?>
            <table class="ui table bordered" style="font-size: 13px;width: 100%;">
              <tbody>
                <tr>
                  <td colspan="" rowspan="" headers="" style="background-color: #4a599f;color: white;">
                    <label ><span class="" style="color: #fff !important;margin-right: .25rem !important;border-radius: 50%;background-color: #f0ad4e !important;padding: 5px 8px;"><?= $k1+1; ?>.</span> <?= $value1->nama_aspek; ?></label>
                  </td>
                </tr>
              </tbody>
              <?php
                $subAspek = $this->m_model->selectas('jenis_aspek_id',$value1->id,'sub_aspeks');
                if(count($subAspek) > 0){
                  foreach ($subAspek as $k2 => $value2) {
              ?>
                <tbody>
                  <tr>
                    <td colspan="" rowspan="" headers="" style="background-color: #ffd0a1;color: black;">
                      <label><?= $value2->name; ?></label>
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
                          <td colspan="" rowspan="" headers="" style="background-color: #ebecec;">
                            <h4><?= $getIcon->name; ?></h4>
                          </td>
                        </tr>
                      </tbody>
                    
                    <?php
                    if(count($HslArmdAll) > 0){
                      foreach ($HslArmdAll as $k4 => $value4) {
                        ?>
                    
                          <tbody>
                            <tr>
                              <td colspan="" rowspan="" headers="" style="background-color: white;">
                                <ul>
                                  <li>
                                    <div class="row" style="background-color: #ebecec">
                                      Nama : <?= $value4->nama; ?><br>
                                      Nomor : <?= $value4->nomor; ?><br>
                                      Kondisi : <?= $value4->kondisi; ?><br>
                                      Posisi : <?= $value4->posisi; ?><br>
                                      Tahun Pengadaan : <?= $value4->tahun; ?><br>
                                      Lampiran Foto :<br>

                                    </div>
                                  </li>
                                </ul>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="" rowspan="" headers="" style="background-color: white;">
                                <?php
                                $cekFiless = $this->m_model->selectas('trans_id',$value4->id,'trans_armada_hasil_foto');
                                if(count($cekFiless) > 0){
                                ?>
                                  <ul style="list-style: none">
                                    <?php
                                      foreach ($cekFiless as $k5 => $value5) {
                                        $imgFILES = check_img($value5->fileurl);
                                    ?>
                                      <li>
                                        <div class="row" style="background-color: #ebecec">
                                          <img src="<?= $imgFILES['path']; ?>" width="150px">
                                        </div>
                                      </li>
                                    <?php
                                    }
                                    ?>
                                  </ul>
                                <?php 
                                }
                                ?>
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
            <td colspan="" rowspan="" headers="">
              <div class="row" style="background-color: #ebecec">
                <ul style="list-style:square;">
                  <li>
                    <b><label><?= $value->name; ?></label></b>
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
                                                foreach ($HslArmdAll as $k4 => $value4) {
                                              ?>
                                                <li>Nama : <?= $value4->nama; ?></li>
                                                <li>Nomor : <?= $value4->nomor; ?></li>
                                                <li>Kondisi : <?= $value4->kondisi; ?></li>
                                                <li>Posisi : <?= $value4->posisi; ?></li>
                                                <li>Tahun Pengadaan : <?= $value4->tahun; ?></li>
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
          </tr>
        </tbody>
      </table>
      <?php
    }
  }
  ?>
</body>
</html>
