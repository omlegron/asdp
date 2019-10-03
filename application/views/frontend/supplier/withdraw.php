<?php $this->load->view('frontend/layout/header'); ?>

	<div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php //include 'sidebar.php'; 
             $this->load->view('frontend/member/member-sidebar');
          ?>
          <div class="col-lg-9">

          <div class="padding-top-2x mt-2 hidden-lg-up"></div>

<?php $userdata = $this->m_model->selectas('id', $this->session->userdata('user'), 'user');
if (count($userdata) > 0) {
  foreach ($userdata as $key => $user_data) {
?>

      <?php if ($this->input->get('payout')) { ?>
        <div class="row">

          <div class="col-lg-8">
            <form action="" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?=$this->lang->line('Bank Name');?></label>
                      <select name="bank" class="form-control">
                        <?php
                        $bank = $this->m_model->selectas('user', $user_data->id, 'user_bank');
                        if (count($bank) > 0) {
                          foreach ($bank as $key => $valueBank) {
                            $selected="";
                            if($key==0){
                              $selected='selected="selected"';
                            }
                        ?>
                        <option value="<?= $valueBank->id; ?>" <?=$selected;?>><?= $valueBank->account_name; ?> - <?= $valueBank->bank; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?=$this->lang->line('Withdrawal Amount');?></label>
                      <input name="payout" class="form-control" type="number" required="" value="<?= $user_data->wallet; ?>" placeholder="<?=$this->lang->line('Withdrawal Amount');?>" min=250000 max=<?=$user_data->wallet;?>>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="mt-4">
                        <?php
                          if($user_data->wallet>=250000){
                        ?>
                        <input type="submit" value="<?=$this->lang->line('Send Request');?>" name="requestpayout" class="btn btn-success margin-right-none">
                        <?php
                          }
                          ?>
                      </div>
                    </div>
                  </div>

                </div>
              </form>
          </div>

            <div class="col-lg-4 margin-top-1x">
              <div class="card text-center margin-bottom-1x">
                <div class="card-header">
                  <h5 class="card-title"><?=$this->lang->line('Your Wallet');?></h5>
                </div>
                <div class="card-body">
                  <h4 style="color: green;"><?= 'Rp '.number_format($user_data->wallet); ?></h4>
                </div>
              </div>
            </div>
        </div>
      <?php } ?>

      <?php if ($this->input->get('addbank')) { ?>
        <div class="row">
          <div class="col-lg-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Nama (Sesuai KTP)');?>*</label>
                      <input name="nama_ktp" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Nama (Sesuai KTP)');?>">
                    </div>
                    <div class="form-group">
                      <label><?=$this->lang->line('No KTP');?>*</label>
                      <input name="no_ktp" class="form-control" type="number" required="" placeholder="Nomor KTP">
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="form-group">
                      <label class="form-label"><?=$this->lang->line('Foto KTP');?>*</label>
                      <br>
                      <div class="upload-wrap">
                        <div class="uploadpreview 01" style="background-image: url();"><i class="icon-image"></i></div>
                        <input name="foto_ktp" id="01" type="file" accept="image/*">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="form-group">
                      <label class="form-label"><?=$this->lang->line('Foto Buku Tabung');?>*</label>
                      <br>
                      <div class="upload-wrap">
                        <div class="uploadpreview 02" style="background-image: url();"><i class="icon-image"></i></div>
                        <input name="foto_buku_tabungan" id="02" type="file" accept="image/*">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?=$this->lang->line('Bank Name');?></label>
                      <input name="bank" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Bank Name');?> Ex: BRI">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Rek Name');?></label>
                      <input name="account_name" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Rek Name');?>">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Rek Number');?></label>
                      <input name="account_number" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Rek Number');?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="mt-4">
                        <input type="submit" value="<?=$this->lang->line('Save');?>" name="addbank" class="btn btn-primary margin-right-none">
                      </div>
                    </div>
                  </div>

                </div>
              </form>
          </div>
        </div>
      <?php } ?>

      <?php if ($this->input->get('editbank')) {
        $checkBank = $this->m_model->selectas2('id', $this->input->get('editbank'), 'user', $user_data->id, 'user_bank');
        if (count($checkBank) > 0) {
          $img_ktp=check_img($checkBank[0]->foto_ktp);
          $img_buku_tabungan=check_img($checkBank[0]->foto_buku_tabungan);
      ?>
        <div class="row">
          <div class="col-lg-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Nama (Sesuai KTP)');?>*</label>
                      <input name="nama_ktp" class="form-control" type="text" required="" value="<?= $checkBank[0]->nama_ktp; ?>" placeholder="Nama sesuai KTP">
                    </div>
                    <div class="form-group">
                      <label><?=$this->lang->line('No KTP');?>*</label>
                      <input name="no_ktp" class="form-control" type="number" required="" value="<?= $checkBank[0]->no_ktp; ?>" placeholder="<?=$this->lang->line('Nomor KTP');?>">
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="form-group">
                      <label class="form-label"><?=$this->lang->line('Foto KTP');?>*</label>
                      <br>
                      <div class="upload-wrap">
                        <div class="uploadpreview 01" style="background-image: url('<?= $img_ktp['path']; ?>');"><i class="icon-image"></i></div>
                        <input name="foto_ktp" id="01" type="file" accept="image/*">
                        <input name="foto_ktp_old" type="hidden" value="<?= $checkBank[0]->foto_ktp; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="form-group">
                      <label class="form-label"><?=$this->lang->line('Foto Buku Tabung');?>*</label>
                      <br>
                      <div class="upload-wrap">
                        <div class="uploadpreview 02" style="background-image: url('<?= $img_buku_tabungan['path']; ?>');"><i class="icon-image"></i></div>
                        <input name="foto_buku_tabungan" id="02" type="file" accept="image/*">
                        <input name="foto_buku_tabungan_old" type="hidden" value="<?= $checkBank[0]->foto_buku_tabungan; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?=$this->lang->line('Bank Name');?></label>
                      <input name="userbank" type="hidden" value="<?= $checkBank[0]->id; ?>">
                      <input name="bank" class="form-control" type="text" required="" value="<?= $checkBank[0]->bank; ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Rek Name');?></label>
                      <input name="account_name" class="form-control" type="text" required="" value="<?= $checkBank[0]->account_name; ?>">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Rek Number');?></label>
                      <input name="account_number" class="form-control" type="number" required="" value="<?= $checkBank[0]->account_number; ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="mt-4">
                        <input type="submit" value="<?=$this->lang->line('Save');?>" name="editbank" class="btn btn-primary margin-right-none">
                      </div>
                    </div>
                  </div>

                </div>
              </form>
          </div>
        </div>
      <?php } } ?>

      <?php if (!$this->input->get('addbank') && !$this->input->get('editbank') && !$this->input->get('payout')) { ?>
        <div class="row">
          <div class="col-lg-8">

                <h5 class="card-title"><?=$this->lang->line('History');?></h5>
                <?php
                $withdraw = $this->m_model->selectas('user', $user_data->id, 'withdraw');
                if (count($withdraw) > 0) {
                ?>
                <table class="table table-hover margin-bottom-none">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?=$this->lang->line('Bank Name');?></th>
                      <th><?=$this->lang->line('Nama Pemilik');?></th>
                      <th><?=$this->lang->line('Rek Number');?></th>
                      <th><?=$this->lang->line('Withdrawal');?></th>
                      <th><?=$this->lang->line('Status');?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($withdraw as $key => $valueWithdraw) { ?>
                    <tr>
                      <td><?= $key + 1; ?></td>
                      <td><?= $valueWithdraw->bank; ?></td>
                      <td><?= $valueWithdraw->account_name; ?></td>
                      <td><span style="color: green;"><?= $valueWithdraw->account_number; ?>
                    </span></td>
                      <td><?= 'Rp.'.number_format($valueWithdraw->payout); ?></td>
                      <td>
                    <?php
                    switch ($valueWithdraw->status) {
                      case '0':
                        echo '<span class="badge badge-default badge-pill">'.$this->lang->line('Pending').'</span>';
                        break;
                      case '1':
                        echo '<span class="badge badge-info badge-pill">'.$this->lang->line('Process').'</span>';
                        break;
                      case '2':
                        echo '<span class="badge badge-primary badge-pill">'.$this->lang->line('Complete').'</span>';
                        break;             
                      case '3':
                        echo '<span class="badge badge-warning badge-pill">'.$this->lang->line('Rejected').'</span>';
                        break;
                      default:
                        # code...
                        break;
                    }
                    ?>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <?php } else {
                  echo "<div class='padding-bottom-2x text-center'>".$this->lang->line('msg_no_History')."</div><hr class='margin-bottom-2x'>";
                } ?>


              <?php
              $bank = $this->m_model->selectas('user', $user_data->id, 'user_bank');
              if (count($bank) > 0) {
              ?>
              <div class="table-responsive">
                <table class="table table-hover margin-bottom-none">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?=$this->lang->line('Bank Name');?></th>
                      <th><?=$this->lang->line('Nama Pemilik');?></th>
                      <th><?=$this->lang->line('Rek Number');?></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($bank as $key => $valueBank) { ?>
                    <tr>
                      <td><?= $key + 1; ?></td>
                      <td><?= $valueBank->bank; ?></td>
                      <td><?= $valueBank->account_name; ?></td>
                      <td><?= $valueBank->account_number; ?></td>
                      <td>
                        <a href="<?= site_url('supplier/withdraw?editbank=').$valueBank->id; ?>" style="text-decoration: none;" class="badge badge-primary badge-pill"><?=$this->lang->line('Edit');?></a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php } else { ?>
                <div class="col-lg-12 text-center">
                <a href="<?= site_url('supplier/withdraw?addbank=true'); ?>" class="btn btn-info"><?=$this->lang->line('Add Bank Account');?></a>
                <p><?=$this->lang->line('msg_add_bank');?></p>
                </div>
              <?php } ?>

            </div>
            <div class="col-lg-4 text-center">
              <div class="card text-center margin-bottom-1x">
                <div class="card-header">
                  <h5 class="card-title"><?=$this->lang->line('Your Wallet');?> </h5>
                </div>
                <div class="card-body">
                  <h4 style="color: green;"><?= 'Rp '.number_format($user_data->wallet); ?></h4>
                </div>
              </div>

              <?php if ($user_data->wallet >= 250000) { ?>
                <a href="<?= site_url('supplier/withdraw?payout=true'); ?>" class="btn btn-success"><?=$this->lang->line('Request Withdrawal');?></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php } ?>


<?php } } ?>

          </div>
        </div>
      </div>
      
      
    </div>

    <script>
      $('.upload-wrap input[type=file]').change(function(){
          var id = $(this).attr("id");
          var newimage = new FileReader();
          newimage.readAsDataURL(this.files[0]);
          newimage.onload = function(e){
            $('.uploadpreview.' + id ).css('background-image', 'url(' + e.target.result + ')' );
          }
        });
      $('.upload-wraps input[type=file]').change(function(){
          var id = $(this).attr("id");
          var newimage = new FileReader();
          newimage.readAsDataURL(this.files[0]);
          newimage.onload = function(e){
            $('.uploadpreviews.' + id ).css('background-image', 'url(' + e.target.result + ')' );
          }
        });
      </script>

<?php $this->load->view('frontend/layout/footer'); ?>