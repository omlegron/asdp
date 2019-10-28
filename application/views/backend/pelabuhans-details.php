<?php include 'header.php'; ?>

 <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Pelabuhan</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->getOne($this->input->get('details'), 'pelabuhans');
                        if (count($val)) {
                            $img=check_img($val['foto']);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val['id']; ?>">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="name">Nama Pelabuhan</label>
                                        <input type="text" class="form-control" id="name" placeholder="Muara Karang" name="name" required value="<?=$val['name'];?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?=$val['deskripsi'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">    
                                    <label>Cabang</label>
                                    <?php 
                                        if(($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                                    ?>
                                        <input type="text" readonly="" class="form-control" value="<?php echo $this->m_model->getOne($this->session->userdata('admin_data')->id_cabang, 'cabangs')['name'] ?>">
                                        <input type="hidden" name="cabang" class="form-control" value="<?php echo $this->session->userdata('admin_data')->id_cabang; ?>">
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                    <select name="cabang" class="form-control show-tick" required>
                                            <option value="">Pilih</option>
                                        <?php
                                            foreach ($this->m_model->all('cabangs') as $keycabangs => $valuecabangs) {
                                                # code...
                                        ?>
                                                <option value="<?=$valuecabangs->id;?>" <?php ($valuecabangs->id==$val['cabang_id']) ? "selected" : '';?>><?=$valuecabangs->name;?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <?php
                                            }
                                        ?>
                                </div>
                                <div class="col-lg-6">
                                    <img src="<?=$img['path'];?>" class="img-fluid" style="max-height: 300px;">
                                    <div class="clearfix"></div>
                                    <label>Foto Pelabuhan (cover)</label>
                                    <label>*click below to browse file</label>
                                    <input name="cover" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
                                </div>
                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-lg-2">
                                    <input name="save" type="submit" value="Save" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>

                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>

<?php include 'footer.php'; ?>