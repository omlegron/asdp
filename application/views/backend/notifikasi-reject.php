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
                <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Jenis Aspek</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="<?= site_url('backend/notifikasi/saveReject'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-12">
                                    <div class="form-line">
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                        <label for="deskripsi">Keterangan</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Keterangan" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-lg-2">
                                    <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>