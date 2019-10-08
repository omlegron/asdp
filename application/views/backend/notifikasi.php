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

                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example" id="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Module</th>                             
                                            <th>User</th>                             
                                            <th>Status</th>                             
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($record) > 0) {
                                            foreach ($record as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?= $key + 1; ?></td>
                                                    <td>
                                                        <?= $value->form_type; ?>
                                                    </td>
                                                    <td>
                                                        <?= $this->m_model->selectOne('id',$value->user_id,'users')->username; ?>
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
                                                        <?php
                                                            if($value->status == 'On Process'){
                                                        ?>
                                                            <a class="confirm badge badge-danger" msg="You Want Approve This Data?" href="<?= site_url('backend/notifikasi/approve/').$value->id; ?>">Approve</a>
                                                        <?php
                                                            }else{
                                                        ?>
                                                            
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php 
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