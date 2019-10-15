<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 

<script type="text/javascript">

</script>
<style type="text/css">

</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<script type="text/javascript">
    $(document).on('change','select[name="deck_id"]',function(){
        var deckId = $(this).val();
        $('.showFind').attr('href','<?php echo site_url(); ?>backend/armada/showDetail/<?= $record->id; ?>/'+deckId+'/<?= $armada->id; ?>');
    });
</script>
<?php include 'header.php'; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#example').dataTable( {
            "paging": false,
            // 'filter': false,
            // processing: true,
        } );
        $('#example_filter').hide()
    });   
    $(document).on('click','.searchs', function () {
        console.log('sad',$('input[name="filter[tanggal]"]').val());   
        var table = $('#example').DataTable();
        table.columns( 2 ).search( $('input[name="filter[cabang]"]').val() ).draw();
        table.columns( 5 ).search( $('input[name="filter[tanggal]"]').val() ).draw();
    } );
    $(document).ready(function(){
        $.fn.dataTable.ext.errMode = 'none';

        $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
        }) ;
    });   

    $(document).on('click','.reset',function(e){
        var table = $('#example').DataTable();
        table.columns( 2 ).search("").draw();
        table.columns( 5 ).search("").draw();
    });
</script>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="container-fluid">
                <div class="row">
                </div>


                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h2>Notifikasi User</h2>
                                    </div>
                                    <div class="col-lg-6 pull-right" style="position: relative;left: 115px;">

                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="col-lg-12" style="position: relative;left: 11px;top: 20px;">
                                    <div class="input-group" >                                               
                                        <input type="text" name="filter[cabang]" class="form-control" placeholder="Cabang" style="border: 1px solid black !important;position: relative;top: 5px;width: 150px;">&nbsp;&nbsp;&nbsp;
                                        <!-- <input type="text" name="filter[user]" placeholder="User" class="form-control" style="border: 1px solid black !important;position: relative;top: 5px;width: 150px;">&nbsp;&nbsp;&nbsp; -->
                                        <input type="date" name="filter[tanggal]" placeholder="Tanggal" class="form-control date" style="border: 1px solid black !important;position: relative;top: 5px;width: 150px;">&nbsp;
                                      
                                      <div class="input-group-btn">
                                        <button type="button" class="btn btn-success searchs" style="position: relative;top: 4px;">Search </button>
                                      </div>
                                      <div class="input-group-btn">
                                          <button type="reset" class="btn btn-primary reset" style="position: relative;top: 4px;">Reset </button>
                                      </div>
                                    </div><!-- /input-group -->
                                </div>  
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Module</th>                             
                                            <th>Cabang</th>                             
                                            <th>User</th>                             
                                            <th>Status</th>  
                                            <th>Tanggal</th>                             

                                            <?php
                                                if($trueAdm == 'salah'){
                                            ?>                           
                                            <th>Action</th>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        if (count($record) > 0) {
                                            $cekCabs = '-';
                                            foreach ($record as $key => $value) {
                                                $userNam = $this->m_model->selectOne('id',$value->user_id,'users'); 
                                                $cekCabs = $this->m_model->selectOne('id',$userNam->id_cabang,'cabangs');
                                                print_r($this->session->userdata('admin_data')->id_cabang);
                                                die();
                                                if($this->session->userdata('admin_data')->id_cabang == $cekCabs->id){
                                                ?>
                                                <tr>
                                                    <td><?= $key + 1; ?></td>
                                                   
                                                    <td>
                                                        <?= $value->form_type; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($userNam){
                                                                echo $cekCabs->name;
                                                            }else{
                                                                echo '-';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $userNam = $this->m_model->selectOne('id',$value->user_id,'users'); 
                                                            if($userNam){
                                                                echo $userNam->username;
                                                            }else{
                                                                echo '-';
                                                            }
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                            if($value->status == 'On Process'){
                                                        ?>
                                                            <span class="badge badge-warning"><?= $value->status; ?></span>
                                                        <?php
                                                            }else{
                                                        ?>
                                                            <span class="badge badge-primary"><?= $value->status; ?></span>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= $value->created_at; ?>
                                                    </td>
                                                    <?php
                                                        if($trueAdm == 'salah'){

                                                    ?>
                                                    <td>
                                                        <?php
                                                            if($value->status == 'On Process'){
                                                        ?>
                                                            <a class="confirm badge badge-success" msg="You Want Approve This Data?" href="<?= site_url('backend/notifikasi/approve/').$value->id; ?>">Approve</a>
                                                            <a class="confirm badge badge-danger" msg="You Want Reject This Data?" href="<?= site_url('backend/notifikasi/reject/').$value->id; ?>">Reject</a>
                                                        <?php
                                                            }else{
                                                        ?>
                                                            <a class="confirm badge badge-danger" msg="You Want Delete This Data?" href="<?= site_url('backend/notifikasi/delete/').$value->id; ?>">Delete</a>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <?php
                                                        }
                                                    ?>
                                                </tr>
                                                <?php 
                                                }else{
                                            ?>
                                                 <tr>
                                                    <td><?= $key + 1; ?></td>
                                                   
                                                    <td>
                                                        <?= $value->form_type; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($userNam){
                                                                echo $cekCabs->name;
                                                            }else{
                                                                echo '-';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $userNam = $this->m_model->selectOne('id',$value->user_id,'users'); 
                                                            if($userNam){
                                                                echo $userNam->username;
                                                            }else{
                                                                echo '-';
                                                            }
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                            if($value->status == 'On Process'){
                                                        ?>
                                                            <span class="badge badge-warning"><?= $value->status; ?></span>
                                                        <?php
                                                            }else{
                                                        ?>
                                                            <span class="badge badge-primary"><?= $value->status; ?></span>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= $value->created_at; ?>
                                                    </td>
                                                    <?php

                                                        if($trueAdm == 'salah'){

                                                    ?>
                                                    <td>
                                                        <?php
                                                            if($value->status == 'On Process'){
                                                        ?>
                                                            <a class="confirm badge badge-success" msg="You Want Approve This Data?" href="<?= site_url('backend/notifikasi/approve/').$value->id; ?>">Approve</a>
                                                            <a class="confirm badge badge-danger" msg="You Want Reject This Data?" href="<?= site_url('backend/notifikasi/reject/').$value->id; ?>">Reject</a>
                                                        <?php
                                                            }else{
                                                        ?>
                                                            <a class="confirm badge badge-danger" msg="You Want Delete This Data?" href="<?= site_url('backend/notifikasi/delete/').$value->id; ?>">Delete</a>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <?php
                                                        }
                                                    ?>
                                                </tr>
                                            <?php
                                        }  
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>