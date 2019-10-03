<?php include 'header.php'; ?>

<?php
  switch (strtolower($this->input->get('err'))) {
    case 'err_update':
      # code...
    echo '<div id="notif_lbl" class="alert alert-warning" role="alert">
            <strong>Updating status withdraw failed!</strong></div>';
      break;
    case 'err_update_saldo':
      # code...
    echo '<div id="notif_lbl" class="alert alert-warning" role="alert">
            <strong>Updating Balance of Member\'s wallet failed!</strong></div>';
      break;
    case 'status_invalid':
      # code...
    echo '<div id="notif_lbl" class="alert alert-danger" role="alert">
            <strong>Status withdraw invalid!</strong></div>';
      break;
    case 'no_err':
      # code...
    echo '<div id="notif_lbl" class="alert alert-success" role="alert">
            <strong>Success!</strong></div>';
      break;
    default:
      # code...
      break;
  }
?>

<?php 
  if (!$this->input->get('add') && !$this->input->get('edit')) { 
    $withdraw = $this->m_model->selectcustom('select * from withdraw order by date DESC');
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-10">
                      <h2>History</h2>
                    </div>
                </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Member</th>
                            <th>as</th>
                            <th>Bank</th>
                            <th>Rekening</th>
                            <th>Amount</th>                                
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($withdraw as $key => $valueWithdraw) {
                      $member = $this->m_model->selectas('id', $valueWithdraw->user, 'user');
                      $nama="Not Found";
                      if(count($member)>0){
                        $nama=$member[0]->name;
                        $member_as = $this->m_model->selectas('id', $member[0]->user_role2, 'user_role');
                        $as=lcfirst("member");
                        if(count($member_as)>0){
                          $as=lcfirst($member_as[0]->name);
                        }
                      }
                    ?>
                      <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $as; ?></td>
                        <td><?= $valueWithdraw->bank; ?></td>
                        <td>
                          <span style="color: green;"><?= $valueWithdraw->account_number; ?></span>
                          /
                          <br>
                          <span><?= $valueWithdraw->account_name; ?></span>
                        </td>
                        <td><?= 'Rp.'.number_format($valueWithdraw->payout); ?></td>
                        <td>
                      <?php
                      if($valueWithdraw->status == 0){
                        //saat status  0= pending bearti ada 2 kemungkinan di proses atau di reject
                        echo '<a class="badge badge-info" href="'.site_url()."panel/withdraw?id=".$valueWithdraw->id."&status=".base64_encode(1).'">Process</a>
                        <a class="badge badge-warning" href="'.site_url()."panel/withdraw?id=".$valueWithdraw->id."&status=".base64_encode(3).'">Rejected</a>';
                      }
                      else if($valueWithdraw->status == 1){
                        //saat status  1= proses bearti ada 2 kemungkinan yaitu  completed atau di reject
                        echo '<a class="badge badge-success" href="'.site_url()."panel/withdraw?id=".$valueWithdraw->id."&status=".base64_encode(2).'">Completed</a>
                        <a class="badge badge-warning" href="'.site_url()."panel/withdraw?id=".$valueWithdraw->id."&status=".base64_encode(3).'">Rejected</a>';
                      }
                      else if($valueWithdraw->status == 2){
                        //saat status  2= completed bearti proses withdraw sudah selesai dan berhasil
                        echo '<span class="badge badge-success">Completed</span>';
                      }
                      else if($valueWithdraw->status == 3){
                        //saat status  3= rejected bearti proses withdraw sudah selesai dan ditolak
                        echo '<span class="badge badge-warning">Rejected</span>';
                      }
                      ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script type="text/javascript">
  setTimeout(function() {$('#notif_lbl').hide();}, 7000);
</script>
<?php include 'footer.php'; ?>