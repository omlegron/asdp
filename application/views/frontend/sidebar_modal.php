<!-- Shop Filters Modal-->
<div class="modal fade" id="modalShopFilters" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a href="<?=site_url();?>product" style="text-decoration: none;">
          <h4 class="modal-title">
            <?=$this->lang->line('Product Catalog');?>
          </h4>
        </a>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <!-- Widget Categories-->
        <section class="widget widget-categories">
          <!--<h3 class="widget-title">Shop Categories</h3>-->
          <ul>
            <?php
            $categories = categories();
            if (count($categories) > 0) {
              foreach ($categories as $key => $value) {
                $sub = $this->m_model->selectas('category_parent', $value->id, 'category_sub');
            ?>
                <li class="has-children expanded">
                  <a href="<?= site_url('product/').$value->seo; ?>">
                    <?php
                      if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                        echo  $value->name_id; 
                      }
                      else{
                        echo  $value->name; 
                      }
                    ?>
                  </a>
            <?php if (count($sub) > 0) { ?>
              <?php foreach ($sub as $keySub => $valueSub) {
                      $child = $this->m_model->selectas('category_sub', $valueSub->id, 'category_child');
                      if (count($child) > 0) {
              ?>
                        <li class="has-children expanded">
                          <a href="<?= site_url('product/').$valueSub->seo; ?>">
                            <?php
                              if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                                echo  $valueSub->name_id; 
                              }
                              else{
                                echo  $valueSub->name; 
                              }
                            ?>
                          </a>
                          <ul>
                            <?php foreach ($child as $keyChild => $valueChild) { ?>
                            <li>
                              <a href="<?= site_url('product/').$valueChild->seo; ?>">
                                <?php
                                  if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                                    echo  $valueChild->name_id; 
                                  }
                                  else{
                                    echo  $valueChild->name; 
                                  }
                                ?>
                              </a>
                            </li>
                            <?php } ?>
                          </ul>
                        </li>
            <?php
                    }
                    else {
            ?>
                    <ul>
                      <li>
                        <a href="<?= site_url('product/').$valueSub->seo; ?>">
                          <?php
                            if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                              echo  $valueSub->name_id; 
                            }
                            else{
                              echo  $valueSub->name; 
                            }
                          ?>
                        </a>
                      </li>
                    </ul>
              <?php } 
                  }
                } 
          ?>
                </li>
          <?php
              }
            }
            ?>
          </ul>
        </section>
    </div>
  </div>
</div>
</div>