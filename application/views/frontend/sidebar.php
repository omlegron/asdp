              <section class="widget widget-categories">
                <a href="<?=site_url();?>product" style="text-decoration: none;">
                  <h3 class="widget-title">
                    <?=$this->lang->line('Product Catalog');?>
                  </h3>
                </a>
                <ul>
                <?php
                $categories = categories();
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
                  <?php } else { ?>
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
                  <?php } } ?>
                  </ul>
                  <?php } ?>
                </li>
                <?php } } ?>
                </ul>
              </section>