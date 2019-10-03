<?php include 'header.php'; ?>
	<?php if ($this->input->get('view')) {?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Membership Detail</h2>
                    </div>
                    <div class="body">
                    <?php
                    $val1 = $this->m_model->selectas('id', $this->input->get('edit'), 'membership_detail');
                    if (count($val1) > 0) {
                    ?>                  
                        <form class="form-horizontal" action="" method="post">
                            <input name="id" type="hidden"  class="form-control" value="<?= $this->input->get('edit'); ?>">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Membership</label>
                                        <select name="membership_id" class="form-control" required>
                                            <option value="">Select</option>
                                            <?php
                                                $membership = $this->m_model->select('membership');
                                                foreach ($membership as $key => $value) {
                                                    # code...
                                                    $selected='';
                                                    if($val1[0]->membership_id == $value->id){
                                                        $selected='selected="selected"';
                                                    }
                                            ?>
                                                <option value="<?= $value->id;?>" <?=$selected;?>><?= $value->type;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Membership Description</label>
                                        <?php
                                            $membership_desc = $this->m_model->select('membership_desc');
                                            foreach ($membership_desc as $key => $value) {
                                                # code...
                                                $note="No";
                                                $membership_fitur = $this->m_model->selectas2('membership_desc_id', $value->id, 'membership_detail_id', $val1[0]->id, 'membership_detail_fitur');
                                                if(count($membership_fitur)>0){
                                                    $note=$membership_fitur[0]->note;
                                                }
                                        ?>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <input name="membership_desc_id_<?= $key;?>" value="<?= $value->id;?>" type="checkbox" id="membership_desc_id_<?= $key;?>" checked="checked">
                                                    <label for="membership_desc_id_<?= $key;?>"><?= $value->title;?></label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input name="note_<?= $key;?>" type="type"  class="form-control" value="<?= $note; ?>">
                                                </div>
                                            </div>
                                        <?php
                                            }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Period (Month) </label>
                                        <input name="period" type="number" class="form-control" placeholder="12" max="12" min="1" value="<?=$val1[0]->period;?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Price (Rp.) </label>
                                        <input name="price" type="number" class="form-control" placeholder="8000000 or 0 for Free" min="0" value="<?=$val1[0]->price;?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Order Display </label>
                                        <input name="order_display" type="number" class="form-control" placeholder="Specify Number 1,2,3,4" min="0" max="4" value="<?=$val1[0]->order_display;?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Best Offering</label>
                                        <?php
                                            $checked0='';
                                            $checked1='';
                                            switch($val1[0]->status_best)
                                            {
                                                case(1):
                                                    $checked1='checked="checked"';
                                                    break;
                                                case(0):
                                                    $checked0='checked="checked"';
                                                    break;
                                            }
                                        ?>
                                        <div style="margin-top: 5px;">
                                            <input name="status_best" value="1" type="radio" id="radio_1" <?=$checked1;?>>
                                            <label for="radio_1" style="padding-right: 15px;">Yes</label>
                                            <input name="status_best" value="0" type="radio" id="radio_2" <?=$checked0;?>>
                                            <label for="radio_2" style="padding-right: 15px;">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Display Offering</label>
                                        <?php
                                            $checked0='';
                                            $checked1='';
                                            switch($val1[0]->status_promotion)
                                            {
                                                case 1:
                                                    $checked1='checked="checked"';
                                                    break;
                                                case 0:
                                                    $checked0='checked="checked"';
                                                    break;
                                            }
                                        ?>
                                        <div style="margin-top: 5px;">
                                            <input name="status_promotion" value="1" type="radio" id="radio_3" <?=$checked1;?>>
                                            <label for="radio_3" style="padding-right: 15px;">Yes</label>
                                            <input name="status_promotion" value="0" type="radio" id="radio_4" <?=$checked0;?>>
                                            <label for="radio_4" style="padding-right: 15px;">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xs-4">
                                    <input name="save" type="submit" value="Save" class="btn btn-block btn-primary">
                                </div>
                            </div>
                            <!-- End content panel -->
                        </form>
                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add') && !$this->input->get('view')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>Membership Description</h2>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Seller</th>
                                    <th>Type</th>
                                    <th>Period (Month)</th>
                                    <th>Price</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $invoices_membership = $this->m_model->select('invoices_membership', 'id', 'DESC');
                            if (count($invoices_membership) > 0) {
                                foreach ($invoices_membership as $key => $value_detail) {
                                	//get user
                            		$user = $this->m_model->selectas('id', $value_detail->user_id,'user');
                            		$store = $this->m_model->selectas('user', $value_detail->user_id,'store');
                                    if(isset($store[0]->brand)){
                                       $brand=$store[0]->brand ;
                                    }
                                    else{
                                       $brand="-" ;
                                    }
                                    if(isset($user[0]->name)){
                                       $name=$user[0]->name ;
                                    }
                                    else{
                                       $name="-" ;
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $brand." (".$name.")"; ?></td>
                                    <td><?= $value_detail->membership; ?></td>
                                    <td><?= $value_detail->period; ?></td>
                                    <td>Rp <?= number_format($value_detail->price); ?></td>
                                    <td>
                                        <?php if($value_detail->confirm_payment !=null && $value_detail->confirm_payment !=''){
                                        ?>
                                            <img id="fullscreen" src="<?= base_url().$value_detail->confirm_payment; ?>" style="width: 50px; height: auto; cursor: pointer;">
                                        <?php
                                        }
                                        else if($value_detail->confirm_payment ==null || $value_detail->confirm_payment ==''){
                                        ?>
                                            -
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                    	<?php
                                    	if($value_detail->status_payment == 1){
                                		?>
                                    	    <a class="badge badge-info" href="<?= site_url('panel/transactionMembership?activating=').$value_detail->id; ?>">Activating</a>
                                        	<a class="badge badge-danger" href="<?= site_url('panel/transactionMembership?reject=').$value_detail->id; ?>">Reject</a>
                            			<?php
                                    	}else if($value_detail->status_payment == 4){
                                    	?>
                                    	    <span class="badge badge-info">Canceled</span>
                                	    <?php
                                    	}else if($value_detail->status_payment == 2){
                                    	?>
                                    	    <span class="badge badge-success">Actived</span>
                                	    <?php
                                    	}else if($value_detail->status_payment == 3){
                                        ?>
                                            <span class="badge badge-danger">Rejected</span>
                                        <?php
                                        }
                                    	?>
                                    </td>
                                </tr>
                            <?php }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script type="text/javascript">
    	$(document).on('click', '[id=fullscreen]', function(e){
 			screenfull.toggle(this);
    	})
    </script>
<?php include 'footer.php'; ?>