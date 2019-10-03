<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Membership Detail</h2>
                    </div>                    
                    <div class="body">
                        <form class="form-horizontal" action="" method="post">
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
                                            ?>
                                                <option value="<?= $value->id;?>"><?= $value->type;?></option>
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
                                        ?>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <input name="membership_desc_id_<?= $key;?>" value="<?= $value->id;?>" type="checkbox" id="membership_desc_id_<?= $key;?>" checked="checked">
                                                    <label for="membership_desc_id_<?= $key;?>"><?= $value->title;?></label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input name="note_<?= $key;?>" type="type"  class="form-control" placeholder="Yes/No or Specify Number">
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
                                        <input name="period" type="number" class="form-control" placeholder="12" max="12" min="1">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Price (Rp.) </label>
                                        <input name="price" type="number" class="form-control" placeholder="8000000 or 0 for Free">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Order Display </label>
                                        <input name="order_display" type="number" class="form-control" placeholder="Specify Number 1,2,3,4" min="0" max="4">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Best Offering</label>
                                        <div style="margin-top: 5px;">
                                            <input name="status_best" value="1" type="radio" id="radio_1" checked="">
                                            <label for="radio_1" style="padding-right: 15px;">Yes</label>
                                            <input name="status_best" value="0" type="radio" id="radio_2" checked="">
                                            <label for="radio_2" style="padding-right: 15px;">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Display Offering</label>
                                        <div style="margin-top: 5px;">
                                            <input name="status_promotion" value="1" type="radio" id="radio_3" checked="">
                                            <label for="radio_3" style="padding-right: 15px;">Yes</label>
                                            <input name="status_promotion" value="0" type="radio" id="radio_4" checked="">
                                            <label for="radio_4" style="padding-right: 15px;">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xs-4">
                                    <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                </div>
                            </div>
                            <!-- End content panel -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('edit')) {?>
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

    <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>Membership Description</h2>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-primary" href="<?= site_url('panel/membership_detail?add=true'); ?>">Add Page</a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Period (Month)</th>
                                    <th>Price</th>
                                    <th>Best</th>
                                    <th>Display</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $membership_detail = $this->m_model->select('membership_detail');
                            if (count($membership_detail) > 0) {
                                foreach ($membership_detail as $key => $value_detail) {
                                    $type="-";
                                    $membership= $this->m_model->selectas('id', $value_detail->membership_id, 'membership');
                                    if(count($membership)){
                                        $type=$membership[0]->type;
                                    }
                                    if($value_detail->status_best ==1){
                                        $best="Yes";
                                    }else{
                                        $best="No";
                                    }
                                    if($value_detail->status_promotion ==1){
                                        $status_promotion="Yes";
                                    }else{
                                        $status_promotion="No";
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $type; ?></td>
                                    <td><?= $value_detail->period; ?></td>
                                    <td>Rp <?= number_format($value_detail->price); ?></td>
                                    <td><?= $best; ?></td>
                                    <td><?= $status_promotion; ?></td>
                                    <td><?= $value_detail->order_display; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/membership_detail?edit=').$value_detail->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/membership_detail?remove=').$value_detail->id; ?>">Delete</a>
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

<?php include 'footer.php'; ?>