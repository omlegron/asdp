<?php $this->load->view('frontend/layout/header'); ?>

    <div class="offcanvas-wrapper">
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1><?=$this->lang->line('Categories');?></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="#"><?=$this->lang->line('Home');?></a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><?=$this->lang->line('Categories');?></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <div class="col-xl-9 col-lg-8 order-lg-2">
            <div class="shop-toolbar padding-bottom-1x mb-2">
              <div class="column">
                <div class="shop-sorting">
                  <!--<label for="sorting">Sort by:</label>
                  <select class="form-control" id="sorting">
                    <option>Popularity</option>
                    <option>Low - High Price</option>
                    <option>High - Low Price</option>
                    <option>Avarage Rating</option>
                    <option>A - Z Order</option>
                    <option>Z - A Order</option>
                  </select>-->
                  <?php if (count($store) > 0) { ?>
                    <span class="text-muted"><?=$this->lang->line('Showing');?>:&nbsp;</span><span><?= count($store); ?> <?=$this->lang->line('items');?></span>
                  <?php } else { ?>
                    <span class="text-muted"><?=$this->lang->line('Showing');?>:&nbsp;</span><span>0 <?=$this->lang->line('items');?></span>
                  <?php }?>
                </div>
              </div>
              <div class="column">
              </div>
            </div>


          <?php
          //print_r($store);
          if (count($store) > 0) { 
          foreach ($store as $key => $value) {
            $store = $this->m_model->selectas('user', $value->id, 'store');
            $key = $key + 1;
          ?>
            <!-- Product-->
            <div class="product-card product-list">
              <a class="product-thumb" href="<?= site_url('m/').$value->url; ?>">
                <img src="<?= site_url('images/store/').$value->logo; ?>" alt="Product">
              </a>
              <div class="product-info">
                <h3 class="product-title"><a href="<?= site_url('m/').$value->url; ?>"><?= $value->brand; ?></a></h3>
                <p class="hidden-xs-down"><?= $value->description; ?></p>
                <div class="product-buttons">
                  <a href="<?= site_url('m/').$value->url; ?>" class="btn btn-outline-primary btn-sm"><?=$this->lang->line('Details');?></a>
                </div>
              </div>
            </div>
            <!-- Product-->
          <?php } } ?>

        <!--
            <nav class="pagination">
              <div class="column">
                <ul class="pages">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li>...</li>
                  <li><a href="#">12</a></li>
                </ul>
              </div>
              <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
            </nav>
          -->
          </div>

          <div class="col-xl-3 col-lg-4 order-lg-1">
            <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
            <aside class="sidebar sidebar-offcanvas">
              <?php $this->load->view('frontend/sidebar'); ?>

            </aside>
          </div>
        </div>
      </div>

  </div>
<?php $this->load->view('frontend/layout/footer'); ?>