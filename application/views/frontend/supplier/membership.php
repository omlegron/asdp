<?php $this->load->view('frontend/layout/header'); ?>

<style>
  .icon-home::before {
    content: "\e021";
  }
</style>

    <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php //include 'sidebar.php'; 
             $this->load->view('frontend/member/member-sidebar');
          ?>
          <div class="col-lg-9">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>

      <?php if ($this->input->get('confirm')) {
        $invoice_id=$this->input->get('idInvoice');
        $no_invoice=$this->input->get('noInvoice');
        $invoices_membership=$this->m_model->selectas2('no_invoice', $no_invoice, 'id', $invoice_id ,'invoices_membership');
        if(count($invoices_membership)>0){
          foreach ($invoices_membership as $key => $value) {
            # code...
      ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="col-lg-12 col-md-8 order-md-2">
            <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Confirm');?></h6>
            <hr class="margin-bottom-1x">

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Images');?></label>
                <div class="col-3">
                  <div class="upload-wrap">
                    <div class="uploadpreview 01" style=""><i class="icon-image"></i></div>
                    <input name="file1" id="01" type="file" accept="image/*" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('membership');?></label>
                <div class="col-9">
                  <input name="id" type="hidden" value="<?= $invoice_id; ?>">
                  <input name="no_invoice" type="hidden" value="<?= $no_invoice; ?>">
                  <input name="membership" class="form-control" type="text" value="<?= $value->membership." - ".$value->period." ".$this->lang->line('bulan')." - Rp: ".number_format($value->price); ?>" disabled>
                </div>
              </div>

              <?php
                //get membership_detail_fitur
                switch ($this->session->userdata('language')) {
                  case 'bahasa':
                    # code...
                    $colom="title";
                    break;
                  case 'english':
                    # code...
                    $colom="title_eng";
                    break;
                  
                  default:
                    # code...
                    $colom="title";
                    break;
                }
                $query="select A.*, A.".$colom." as deskripsi
                      from invoices_membership_fitur A 
                      where A.invoices_membership_id='".$invoice_id."'";
                $membership_fitur=$this->m_model->selectcustom($query);
              if(count($membership_fitur)>0 && $membership_fitur!=""){
            ?>
            <div class="form-group row" id="div_fitur">
              <div class="col-3">
              </div>
              <div class="col-9">
                <div class="card" style="margin-bottom: 0.5em;">
                  <div class="card-body" id="summary_fitur">
                      <ul>
                        <?php
                          foreach ($membership_fitur as $key => $value_membership_fitur) {
                            # code...
                            switch (strtolower($value_membership_fitur->note)) {
                              case 'no':
                                # code...
                                $val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
                                break;
                              case 'yes':
                                # code...
                                $val_note='<span class="text-success"><i class="icon-check-circle"></i></span>';
                                break;
                              case '':
                                # code...
                                $val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
                                break;
                              case '0':
                                # code...
                                $val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
                                break;
                              default:
                                # code...
                                $val_note='<span class="tickblue">'.$membership_fitur[0]->note.'<span class="tickblue">';
                                break;
                            }
                        ?>
                            <li>
                                <?=$value_membership_fitur->deskripsi;?>
                                &nbsp;<strong><?= $val_note;?></strong>
                            </li>
                        <?php
                          }
                        ?>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php
                  }
            ?>

              <div class="form-group row">
                <div class="col-9">

                </div>
                <div class="col-3">
                  <input id="btn_save" type="submit" name="confirm" value="<?=$this->lang->line('Confirm');?>" class="btn btn-primary">
                </div>
              </div>

            </div>
          </form>
        <?php
          }
        }
      }
      ?>

      <?php if ($this->input->get('add')) {
        $invoices_membership = $this->m_model->selectas2('user_id',$user_data->id, 'status_payment IN (0,1)',null,'invoices_membership', 'id', 'DESC');
        //jika ada invoice yang belum dibayar dia tidak bisa melakukan pembelian baru
        //supplier harus melakukan rejecting order membership
        if(count($invoices_membership)>0){
          redirect("supplier/membership");
        }
        $membershipDetail_id="";
        $membership_fitur="";
        if($this->input->get('membershipDetail') && $this->input->get('membershipDetail')>0){
            $membershipDetail_id=$this->input->get('membershipDetail');
            //get membership_detail_fitur
            switch ($this->session->userdata('language')) {
              case 'bahasa':
                # code...
                $colom="title";
                break;
              case 'english':
                # code...
                $colom="title_eng";
                break;
              
              default:
                # code...
                $colom="title";
                break;
            }
            $query="select A.*, B.".$colom." as deskripsi
                    from membership_detail_fitur A 
                    join membership_desc B on (B.id = A.membership_desc_id)
                    where A.membership_detail_id='".$this->input->get("membershipDetail")."'";
            $membership_fitur=$this->m_model->selectcustom($query);
        }
      ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="col-lg-12 col-md-8 order-md-2">
            <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('subscribe')." ".$this->lang->line('membership');?></h6>
            <hr class="margin-bottom-1x">
            <div class="form-group row">
              <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('membership');?></label>
              <div class="col-9">
                <select name="membership_detail" id="membership" class="form-control" required="">
                  <option value=""><?=$this->lang->line('Select');?></option>
                  <?php
                  if (count(membershipDetail()) > 0) {
                    foreach (membershipDetail() as $key => $value) {
                      $selected='';
                      if($value->id ==$membershipDetail_id){
                        $selected='selected="selected"';
                      }
                      echo '<option value="'.$value->id.';'.$value->type.';'.$value->price.';'.$value->period.';'.$value->badge.'" '.$selected.' price="Rp. '.number_format($value->price).'">'.$value->type.' - '.$value->period." ".$this->lang->line('bulan').' - Rp.'.number_format($value->price).'</option>';
                    }
                  } ?>
                </select>
              </div>
            </div>
            <?php if(count($membership_fitur)>0 && $membership_fitur!=""){
            ?>
            <div class="form-group row" id="div_fitur">
              <div class="col-3">
              </div>
              <div class="col-9">
                <div class="card" style="margin-bottom: 0.5em;">
                  <div class="card-body" id="summary_fitur">
                      <ul>
                        <?php
                          foreach ($membership_fitur as $key => $value_membership_fitur) {
                            # code...
                            switch (strtolower($value_membership_fitur->note)) {
                              case 'no':
                                # code...
                                $val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
                                break;
                              case 'yes':
                                # code...
                                $val_note='<span class="text-success"><i class="icon-check-circle"></i></span>';
                                break;
                              case '':
                                # code...
                                $val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
                                break;
                              case '0':
                                # code...
                                $val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
                                break;
                              default:
                                # code...
                                $val_note='<span class="tickblue">'.$value_membership_fitur->note.'<span class="tickblue">';
                                break;
                            }
                        ?>
                            <li>
                                <?=$value_membership_fitur->deskripsi;?>
                                &nbsp;<strong><?= $val_note;?></strong>
                            </li>
                        <?php
                          }
                        ?>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php
                  }
            ?>
            <div class="form-group row">
              <div class="col-3">
                <strong>Transfer</strong>
              </div>
              <div class="col-9">
                <div class="card">
                  <div class="card-body">
                    <p>BCA 0285938125 a/n PT Indo Bazaar Utama</p>
                    <!--<div class="custom-control custom-checkbox d-block">
                      <input name="payment" value="Bypass" checked="" class="custom-control-input" type="radio">-->
                      <label class="">* <?=$this->lang->line('Payment by Bank Transfer');?></label>
                    <!--</div>-->
                  </div>
                </div>
              </div>

            </div>
            <div class="form-group row">
              <div class="col-9">

              </div>
              <div class="col-3">
                <input id="btn_save" type="submit" name="subscribe" value="<?=$this->lang->line('subscribe');?>" class="btn btn-primary">
              </div>
            </div>
          </div>
        </form>
        <script type="text/javascript">
          $(document).on('change', '[id=membership]', function(e){
            base_url="<?=base_url();?>"
            dataMap={};
            dataMap['membershipDetail']=$(this).val();
            $.post(base_url+'ajax/get_membership_fitur', dataMap, function(data){
              $('#div_fitur').show();
              $('#summary_fitur').html(data);
              if(data == '' || data == '<ul></ul>'){
                $('#div_fitur').hide();
              }

            })
          })
        </script>
        <?php } ?>


        <?php if (!$this->input->get('add') && !$this->input->get('confirm')) { ?>
        <div class="row">
          <div class="col-lg-8">
            <h5 class="card-title"><?=$this->lang->line('History');?> Membership</h5>
            <?php
            //selectasmax($max, $where, $dbase, $key_order=null, $type_order=null) ;
            $invoices_membership = $this->m_model->selectasmax(10, 'user_id='.$user_data->id,'invoices_membership', 'id', 'DESC');
              $membership_latest=array();
            if (count($invoices_membership) > 0) {
            ?>
            <table class="table table-hover margin-bottom-none">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center"><?=$this->lang->line('Membership');?></th>
                  <th class="text-center"><?=$this->lang->line('Price');?></th>
                  <th class="text-center"><?=$this->lang->line('Period')." (".$this->lang->line('bulan').")";?></th>
                  <th class="text-center"><?=$this->lang->line('Status');?></th>
                </tr>
              </thead>
              <tbody>
              <?php 
              foreach ($invoices_membership as $key => $valueinvoices_membership) {
                  if($key==0 && $valueinvoices_membership->status_payment!=4 && $valueinvoices_membership->status_payment!=3){
                    //inisiasi  value for membership on sidebar-right
                    $membership_latest[$key]=$valueinvoices_membership;
                  }
                ?>
                <tr>
                  <td class="text-center"><?= $key + 1; ?></td>
                  <td class="text-left"><?= $valueinvoices_membership->membership; ?></td>
                  <td class="text-right"><?= 'Rp. '.number_format($valueinvoices_membership->price); ?></td>
                  <td class="text-center"><?= $valueinvoices_membership->period; ?></td>
                  <td class="text-center">
                <?php
                switch ($valueinvoices_membership->status_payment) {
                  case '0':
                    echo '<a  href="'.base_url().'supplier/membership?confirm=true&noInvoice='.$valueinvoices_membership->no_invoice.'&idInvoice='.$valueinvoices_membership->id.'" class="badge badge-default badge-pill">'.$this->lang->line('Unpaid').'</a>';
                    echo '<br><a id="btn_cancle" href="'.base_url().'supplier/membership?cancle=true&noInvoice='.$valueinvoices_membership->no_invoice.'&idInvoice='.$valueinvoices_membership->id.'" class="badge badge-danger badge-pill">'.$this->lang->line('Cancle').'</a>';
                    break;
                  case '1':
                    echo '<span class="badge badge-info badge-pill">'.$this->lang->line('Process').'</span>';
                    echo '<br><a id="btn_cancle" href="'.base_url().'supplier/membership?cancle=true&noInvoice='.$valueinvoices_membership->no_invoice.'&idInvoice='.$valueinvoices_membership->id.'" class="badge badge-danger badge-pill">'.$this->lang->line('Cancle').'</a>';
                    break;
                  case '2':
                    echo '<span class="badge badge-primary badge-pill">'.$this->lang->line('Complete').'</span>';
                    break;             
                  case '3':
                    echo '<span class="badge badge-warning badge-pill">'.$this->lang->line('Rejected').'</span>';
                    break;
                  default:
                    echo '<span class="badge badge-danger badge-pill">'.$this->lang->line('Canceled').'</span>';
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
              echo "<div class='padding-bottom-2x text-center'>".$this->lang->line('msg_no_History_membership')."</div><hr class='margin-bottom-2x'>";
            } ?>
            </div>
            <div class="col-lg-4 text-center">
              <div class="card text-center margin-bottom-1x">
                <div class="card-header">
                  <h5 class="card-title">Membership</h5>
                </div>
            <?php
              $status_actived=-1;
              $maketime_date_actived='-';
              $maketime_date_exp='-';
              if(count($membership_latest)>0){
                foreach ($membership_latest as $key => $value) {
                  # code...
                  if($value->date_expired!= null && $value->date_expired!=''){
                    $arr_date_exp=explode('-', $value->date_expired);
                    $maketime_date_exp=date("Y, M d", mktime( 0, 0, 0, $arr_date_exp[1], $arr_date_exp[2], $arr_date_exp[0]));
                  }
                  if($value->date_actived!= null && $value->date_actived!=''){
                    $arr_date_actived=explode('-', $value->date_actived);
                    $maketime_date_actived=date("Y, M d", mktime( 0, 0, 0, $arr_date_actived[1], $arr_date_actived[2], $arr_date_actived[0]));
                  }
                  $status_actived=$value->status;
                  switch ($value->status) {
                   case '0':
                      $status= '<span class="badge badge-warning badge-pill">'.$this->lang->line('Unactived').'</span>';
                      break;
                    case '1':
                      $status='<span class="badge badge-success badge-pill">'.$this->lang->line('Actived').'</span>';
                      $status.= '<br><span class="float-left">'.$this->lang->line('Actived').': <strong>'.$maketime_date_actived.'</strong></span>';
                      $status.= '<br><span class="float-left">'.$this->lang->line('Expired').': <strong>'.$maketime_date_exp.'</strong></span>';
                      break;
                    case '2':
                      $status= '<span class="badge badge-danger badge-pill">'.$this->lang->line('Expired').'</span>';
                       $status.= '<br><span class="float-left">'.$this->lang->line('Actived').': <strong>'.$maketime_date_actived.'</strong></span>';
                      $status.= '<br><span class="float-left">'.$this->lang->line('Expired').': <strong>'.$maketime_date_exp.'</strong></span>';
                      break;
                    default:
                      # code...
                      break;  
                      $status= '<span class="badge badge-warning badge-pill">'.$this->lang->line('Unactived').'</span>';
                  }
                  if($value->status_payment == 0){
                    $status.= '<br><a href="'.base_url().'supplier/membership?confirm=true&noInvoice='.$value->no_invoice.'&idInvoice='.$value->id.'" class="badge badge-default badge-pill">'.$this->lang->line('Confirm').'</a>';
                  }
              ?>
                  <div class="card-body">
                    <h2><?=$value->membership;?> </h2>
                    <h4 style="color: green;"><?= 'Rp '.number_format($value->price); ?></h4>
                    <?= $status;?>
                  </div>
              <?php
                }
              }
              else{
            ?>
                  <div class="card-body">
                    <h3>Supplier Reguler</h3>
                    <h4 style="color: green;"><?= $this->lang->line('free');?></h4>
                  </div>
            <?php
              }
            ?>
              </div>
              <?php if ($status_actived == 2 || $status_actived==-1) { //-1 artinya belum pernah jadi membership
                ?>
                <a href="<?= site_url('suppliers/membership_seller'); ?>" class="btn btn-success"><?=$this->lang->line('membership');?></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php } ?>

            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $('.upload-wrap input[type=file]').change(function(){
          var id = $(this).attr("id");
          var newimage = new FileReader();
          newimage.readAsDataURL(this.files[0]);
          newimage.onload = function(e){
            $('.uploadpreview.' + id ).css('background-image', 'url(' + e.target.result + ')' );
          }
        });

        $(document).on('click', '[id=btn_cancle]' ,function(e){
          e.preventDefault();
          link=$(this).attr('href');
          cancle=confirm("Do you want to cancel your order?");
          if(cancle == true){
            window.location.href =  link;
          }
        })
      </script>
<?php $this->load->view('frontend/layout/footer'); ?>