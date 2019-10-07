<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<script type="text/javascript">
    // $(document).on('click','.showFind',function(){
    //     console.log('asd')
    //     var dekcId = $('select[name="deck_id"]').val();
    //     $.ajax({
    //         url: "<?php echo site_url(); ?>backend/armada/showDetail/<?= $record->id; ?>/"+dekcId,
    //         type: 'GET',
    //     }).done(function(response) {
    //         $('.showAppendArmada').append(response);
    //     })
    //     .fail(function(response) {
    //         $('.showAppendArmada').html('<center>Gagal Meload Data Silahkan Ulangi Kembali</center>');
    //     })
    // });
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
                    <div class="col-lg-8">
                        <div class="btn-group">
                            <a href="<?=base_url();?>panel/armada"  class="btn btn-primary btn-sm" style="color: #fff">Kembali</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                            <!-- <div class="btn-group float-right">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> aspek <span class="caret"></span> </button>
                                <ul class="dropdown-menu">
                                    <li><a href="../aspek.html">Keamanan</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="javascript:void(0);">Separated link</a></li>
                                </ul>
                                <a href="../aspek.html"  class="btn btn-primary btn-sm" style="color: #fff">Edit</a>
                            </div> -->
                        </div>
                    </div>


                    <div class="wrapper content">
                        <div class="container-fluid">

                          <div class="row">
                            <div class="col-md-4">      
                                <div class="form-group">
                                    <div class="input-group" >     

                                        <select name="deck_id" class="form-control show-tick" required>
                                            <option value="">Select One </option>

                                            <?php
                                            if(count($this->m_model->selectwhere('armada_id',$armada->id,'armada_elements')) > 0){
                                                foreach ($this->m_model->selectwhere('armada_id',$armada->id,'armada_elements') as $k => $value) {
                                                    ?>
                                                    <option value="<?=$value->id;?>"><?=$value->name;?></option>
                                                    <?php
                                                }
                                            }else{
                                                echo '<option value="">No Data Found</option>';
                                            }
                                            ?>
                                        </select>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-primary btn-sm showFind" style="color: #fff">Find</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8 " style="text-align: right">
                                <h3><?= $armada->name; ?></h3>
                            </div>
                            <div class="showAppendArmada">

                            </div>
                            <!-- Carousel -->

                            <!-- /Carousel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <?php include 'footer.php'; ?>