<?php include 'header.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="btn-group">
                            <a href="<?=base_url();?>panel/pelabuhan"  class="btn btn-primary btn-sm" style="color: #fff">Kembali</a>
                        </div>
                    </div>

                </div>

                <h3><?= $record->nama_aspek;  ?></h3>

                <div class="row clearfix">
                    <div class="row">
                        <br>
                        <ul>
                          <li>Parent</li>
                          <li>Parent
                            <ul>
                              <li>Child
                                <ul>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                </ul>
                              </li> 
                              <li>Child
                                <ul>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                </ul>
                              </li> 
                              <li>Child
                                <ul>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <li>Parent
                            <ul>
                              <li>Child</li>
                              <li>Child</li>
                              <li>Child</li>
                            </ul>
                          </li>
                          <li>Parent
                            <ul>
                              <li>Child</li>
                              <li>Child</li>
                              <li>Child</li>
                            </ul>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>