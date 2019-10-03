<?php
  if(isset($store_id)){
    $query="select B.category_parent from product_store A join product B on (B.id = A.product) where A.store='".$store_id."' group by B.category_parent";
    $cat_parent=$this->m_model->selectcustom($query);
    $arr_cat_parent=array();
    foreach ($cat_parent as $keycat_parent => $valuecat_parent) {
      # code...
      $arr_cat_parent[]=$valuecat_parent->category_parent;
    }
    if(count($cat_parent)>0){
      $arr_cat_parent=implode(',', $arr_cat_parent);
      $categories = categories_store($arr_cat_parent);
    }
    else{
      $categories = array();
    }
  }
  else{
    $categories = categories($list_product);
    
  }
?>
              <section class="widget widget-categories">
                <a href="<?=base_url().$this->uri->segment(1).'/'.$this->uri->segment(2);?>" style="text-decoration: none;">
                  <h3 class="widget-title">
                    <?=$this->lang->line('Product Catalog');?>
                  </h3>
                </a>
                <ul>
                <?php
                if (count($categories) > 0) {
                foreach ($categories as $key => $value) {
                  $sub = $this->m_model->selectas('category_parent', $value->id, 'category_sub');
                ?>
                <li class="has-children">
                  <a href="#<?php //echo  site_url('product/').$value->seo; ?>">
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
                  <ul>
                    <?php foreach ($sub as $keySub => $valueSub) {
                      $child = $this->m_model->selectas('category_sub', $valueSub->id, 'category_child');
                      if (count($child) > 0) {
                    ?>
                    <li>
                      <a href="<?=base_url().$this->uri->segment(1).'/'.$this->uri->segment(2);?>/<?=$valueSub->seo; ?>">
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
                          <a href="<?=base_url().$this->uri->segment(1).'/'.$this->uri->segment(2);?>/<?=$valueChild->seo; ?>">
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
                  <?php } else { ?>
                    <li>
                      <a href="<?=base_url().$this->uri->segment(1).'/'.$this->uri->segment(2);?>/<?= $valueSub->seo; ?>">
                        <?php
                          if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                            echo  $valueSub->name_id; 
                          }
                          else{
                            echo  $valueSub->name; 
                          }
                        ?>
                      </a>
                  <?php } } ?>
                  </ul>
                  <?php } ?>
                </li>
                <?php } } ?>
                </ul>
              </section>