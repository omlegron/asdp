<?php
/*
$stringBefore = 'The#String';
$getStringBefore = substr($stringBefore, 0, strpos($stringBefore, '#'));
echo $getStringBefore;

$stringAfter = "123#String";    
$getStringAfter = substr($stringAfter, strpos($stringAfter, "#") + 1);    
echo $getStringAfter;
*/

$user_data = $this->session->userdata('user_data');
$user_role = $this->session->userdata('user_role');

if (!$this->session->userdata('user') && !$this->session->userdata('guest')) {
  $uniqueId = uniqid(rand(10000, 1000000), TRUE);
  $this->session->set_userdata("guest", md5($uniqueId));
}

//echo $this->session->userdata('guest');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bazaarplace
    </title>
    <meta name="description" content="Bazaarplace.com">
    <meta name="keywords" content="bazaarplace">
    <meta name="author" content="JWS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--<link rel="stylesheet" media="screen" href="<?= site_url('assets/frontend/css/vendor.min.css'); ?>">-->
    <link type="text/css" rel="stylesheet" media="screen" href="<?= site_url('assets/frontend/css/vendor-v3.min.css'); ?>">
    <link type="text/css" rel="stylesheet" media="screen" href="<?= site_url('assets/frontend/css/styles-v3.css?version=5'); ?>">
    <link type="text/css" rel="stylesheet" media="screen" href="<?= site_url('assets/frontend/css/date-picker.css'); ?>">
    <link type="text/css" rel="stylesheet" media="screen" href="<?= site_url('assets/frontend/css/custom.css'); ?>">
    <link type="text/css" rel="stylesheet" media="screen" href="<?= site_url('assets/frontend/css/chat.css'); ?>">
    <link type="text/css" rel="stylesheet" media="screen" href="<?= site_url('assets/frontend/css/cm-style.css'); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="<?= site_url('assets/frontend/iziToast-master/dist/css/iziToast.min.css'); ?>" rel="stylesheet">
    <script src="<?= site_url('assets/frontend/js/jquery.js'); ?>"></script>
    <script src="<?= site_url('assets/frontend/js/date-picker.js'); ?>"></script>
    <script src="<?= site_url('assets/frontend/js/modernizr.min.js'); ?>"></script>
    <script src="<?= site_url('assets/frontend/iziToast-master/dist/js/iziToast.js'); ?>"></script>
  </head>
  <style>
.badgeUser {
    display: block;
    position: absolute;
    top: -6px;
    right: 25px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background-color: orange;
    color: #ffffff;
    font-size: 11px;
    line-height: 18px;
}
.uploadpreview i {
  margin: 40%;
  float: left;
  font-size: 30px;
  color: #CCC;
}

.uploadpreview {
  background: #fafafa;
  width:150px;
  height:150px;
  display:block;
  border:1px solid #ddd;
  margin:0 auto 15px;
  background-size:100% auto;
  background-repeat:no-repeat;
  background-position:center;
  border-radius: 4px;
}

.upload-wrap{
  float:left;
}

.uploadpreviews i {
  margin: 35%;
  float: left;
  font-size: 14px;
  color: #CCC;
}

.uploadpreviews{
  background: #fafafa;
  width:50px;
  height:50px;
  display:block;
  border:1px solid #ddd;
  margin:15px auto 15px;
  background-size:100% auto;
  background-repeat:no-repeat;
  background-position:center;
  border-radius: 4px;
}

.upload-wraps{
}

input[type="file"] {
    color: transparent;
    width: 80px;
    margin: 0 auto;
    display: block;
}


    .sep {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .sepText {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      flex:1;
    }

    .sepText::before,
    .sepText::after{
      content: '';
      flex:1;
      width: 1px;
      background: currentColor;
      margin: .25em;
    }
    .flex {
      display: flex;
    }
    .c-bimage {
      width: 150px;
      height: 150px;
      border-width: 5px;
      border-color: #DDD;
      border-style:double;
      border-radius: 80px;
      margin: 0 auto;
      padding: 30px;
      cursor: pointer;
    }
    .c-bimage:hover {
      border-color: #0da9ef;
      border-style: solid;
    }
    .c-bimage img {
      max-width: 100%;
    }

/*review*/
.rating{overflow:hidden;display:inline-block;font-size:0;position:relative;float:left;}
.rating-input{float:right;width:30px;height:30px;padding:0;margin:0 0 0 -30px;opacity:0;}
.rating:hover .rating-star:hover,
.rating:hover .rating-star:hover ~ .rating-star,
.rating-input:checked ~ .rating-star{background-position:0 -28px;}
.rating-star,
.rating:hover .rating-star{position:relative;float:right;display:block;width:30px;height:28px;margin-right: -26px;background:url('<?= site_url('assets/frontend/img/stars.png'); ?>') 0 0 no-repeat;}
.reviewform, .testiform{display:none;}

input[type=checkbox], input[type=radio] {
    margin: 4px 0 0;
    margin-top: 1px\9;
    line-height: normal;
}


.ratings-container {
  position: relative;
  width: 90px;
  background-image: url(<?= site_url('assets/frontend/img/ratings-bg.png'); ?>)
}

.ratings-container,
.ratings-container .ratings {
  display: inline-block;
  height: 14px
}

.ratings-container .ratings {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  overflow: hidden;
  background-image: url(<?= site_url('assets/frontend/img/ratings.png'); ?>);
  text-indent: -9999px;
}

.product-meta .ratings-container {
  float: right
}
.shadow {
    -webkit-box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
  -moz-box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
  box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
}
.f-white{
  color:#fff !important;
}

.hover-red:hover {
  color:#f10000 !important;
}

  </style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135017026-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135017026-1');
</script>
  <body>

  <?php
    $categories = categories();
  ?>

    <header class="site-header navbar-sticky" style="position: fixed; width: 100% !important; top:-1px;">
      <div class="topbar d-flex justify-content-between" style=" background:#f10000 /*background:rgba(179, 176, 170,1)*/ /*background: linear-gradient(45deg, #ffc100, #ffe700);*/">
        <div class="site-branding d-flex">
          <a class="site-logo align-self-center" href="<?= site_url('/'); ?>">
            <img src="<?= site_url('images/bzaarplace-06.png'); ?>" alt="bazaarplace">
          </a>
        </div>



        <form class="search-box-wrap d-flex" method="get" action="<?= site_url('search'); ?>">
          <div class="search-box-inner align-self-center">
            <div class="search-box d-flex">

              <div class="btn-group categories-btn">
                <nav class="site-menu" >
                  <ul>
                    <li class="has-submenu">
                      <a href="#" class="f-white hover-red" ><?=$this->lang->line('Categories');?></a>
                      <ul class="sub-menu">

                        <?php
                        if (count($categories) > 0) {
                          foreach ($categories as $key => $value) {
                            $sub = $this->m_model->selectas('category_parent', $value->id, 'category_sub');
                        ?>
                          <?php if (count($sub) > 0) { ?>
                            <li class="has-children">
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
                              <ul class="sub-menu">
                          <?php foreach ($sub as $keySub => $valueSub) { ?>
                                <li>
                                  <a href="<?= site_url('product/').$valueSub->seo; ?>" >
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
                          <?php } ?>
                              </ul>
                            </li>
                          <?php } else { ?>
                            <li>
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
                            </li>
                          <?php } ?>
                        <?php } } ?>

                      </ul>
                    </li>

                  </ul>
                </nav>
              </div>

              <div class="btn-group categories-btn">
                <div class="btn2 btn-transparent dropdown-toggle" data-toggle="dropdown"style="background: white;"><?=$this->lang->line('Search');?> </div>
                <div class="dropdown-menu mega-dropdown">
                  <div class="row">
                    <div class="col-sm-12" >
                      <span class="d-block navi-link text-left"style="padding-left:5%;">
                        <div class="checkbox">
                          <label>
                            <input name="cat" type="radio" value="product" checked="checked"> <span class="pl5"><?=$this->lang->line('Products');?></span>
                          </label>
                        </div>
                      </span>
                      <span class="d-block navi-link text-left" style="padding-left:5%;">
                        <div class="checkbox">
                          <label>
                            <input name="cat" type="radio" value="supplier"> <span class="pl5"><?=$this->lang->line('Suppliers');?></span>
                          </label>
                        </div>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="submit" id="search_general"><i class="icon-search"></i></button>
                </span>
                <input class="form-control" name="key" type="search" placeholder="<?=$this->lang->line('msg_search');?>" required style="background: #fff !important;">
              </div>
            
            </div>
          </div>
        </form>

        <div class="toolbar d-flex">
          <div class="toolbar-item visible-on-mobile mobile-menu-toggle">
            <a href="#">
              <div>
                <i class="icon-menu"></i>
                <span class="text-label">
                  <?=$this->lang->line('Menu');?>
                </span>
              </div>
            </a>
          </div>

          
          <div class="toolbar-item hidden-on-mobile" style=" /*background:rgba(179, 176, 170,1)*/ background:#f10000;">
            <a href="#" class="f-white">
              <div><i class="flag-icon">
                <img src="<?= site_url($this->lang->line('link_img_flag')); ?>" alt="lang"></i>
                <span class="text-label"><?=$this->lang->line('cap_flag');?></span>
              </div>
            </a>
            <ul class="toolbar-dropdown lang-dropdown">
              <li class="px-3 pt-1 pb-2">
                <form action="<?= base_url();?>language/" method="post">
                  <select id="ls_lang" name="ls_lang" class="form-control form-control-sm">
                    <option value="bahasa"><?=$this->lang->line('lang_id');?></option>
                    <option value="english"><?=$this->lang->line('lang_en');?></option>
                  </select>
                </form>
              </li>
            </ul>
          </div>

          <div class="toolbar-item hidden-on-mobile">
              <?php if($user_role == 'customer') { ?>
              <a href="<?= site_url('member/profile'); ?>" class="f-white hover-red">
                <div>
                  <i class="icon-user"></i>
                   <span class="text-label">
                    <?=ucfirst(substr($this->session->userdata('user_data')->name, 0, 7))//$this->lang->line('Profile');?>
                  </span >
                  <?php
                    $checkNotify = $this->m_model->selectasmax(5, 'user='.$this->session->userdata('user').' AND status =0', 'user_notify', 'id', 'DESC');
                    if (count($checkNotify) > 0) {
                      echo '<span class="badgeUser">'.count($checkNotify).'</span>';
                    }
                  ?>
                </div>
              </a>
              <ul class="toolbar-dropdown w25">
                <li class="sub-menu-user">
                  <div class="user-ava"><img src="<?php if($user_data->image == '') { echo site_url('assets/frontend/img/profile.png');  } else { echo $user_data->image; } ?>" alt="Hary">
                  </div>
                  <div class="user-info">
                    <h6 class="user-name"><?= ucfirst($user_data->name); ?></h6>
                    <span class="text-xs text-muted"><?= $user_data->created; ?></span>
                  </div>
                </li>
                <?php
                if (count($checkNotify) > 0) {
                  foreach ($checkNotify as $key => $valueNotify) { ?>
                    <li><a href="<?= site_url('/').$valueNotify->link; ?>"><?= $valueNotify->notify; ?></a></li>
                <?php
                  }
                  echo '<li class="sub-menu-separator"></li>';
                }
                ?>
                  <li><a href="<?= site_url('member/profile'); ?>"><?=$this->lang->line('My Profile');?></a></li>
                  <li><a href="<?= site_url('member'); ?>"><?=$this->lang->line('Orders List');?></a></li>
                  <li><a href="<?= site_url('member/wishlist'); ?>"><?=$this->lang->line('Wishlist');?></a></li>
                  <li><a href="<?= site_url('member/inbox'); ?>"><?=$this->lang->line('Chat');?></a></li>
                <li class="sub-menu-separator"></li>
                <li>
                  <a href="<?= site_url('member/logout'); ?>">
                    <i class="icon-unlock"></i>
                    <?=$this->lang->line('Logout');?>
                  </a>
                </li>
              </ul>
              <?php } else if ($user_role == 'supplier' || $user_role == 'marketer') { ?>

            <?php if ($user_role == 'supplier') { ?>
              <a href="<?= site_url('supplier/profile'); ?>" class="f-white hover-red">
                <div>
                  <i class="icon-user"></i>
                  <span class="text-label">
                    <?=$this->lang->line('Profile');?>
                  </span >
                  <?php
                    $checkNotify = $this->m_model->selectasmax(5, 'user='.$this->session->userdata('user').' AND status =0', 'user_notify');
                    if (count($checkNotify) > 0) {
                      echo '<span class="badgeUser">'.count($checkNotify).'</span>';
                    }
                  ?>
                </div>
              </a>
              <ul class="toolbar-dropdown w25">
                <li class="sub-menu-user">
                  <div class="user-ava"><img src="<?php if($user_data->image == '') { echo site_url('assets/frontend/img/profile.png');  } else { echo $user_data->image; } ?>" alt="bazaarplace">
                  </div>
                  <div class="user-info">
                    <h6 class="user-name"><?= $user_data->name; ?></h6>
                    <span class="text-xs text-muted"><?= $user_data->created; ?></span>
                  </div>
                </li>
                <?php
                if (count($checkNotify) > 0) {
                  foreach ($checkNotify as $key => $valueNotify) { ?>
                    <li><a href="<?= site_url('/').$valueNotify->link; ?>"><?= $valueNotify->notify; ?></a></li>
                <?php
                  }
                  echo '<li class="sub-menu-separator"></li>';
                }
                ?>
                  <li><a href="<?= site_url('supplier/'); ?>"><?=$this->lang->line('Orders');?></a></li>
                  <li><a href="<?= site_url('supplier/profile'); ?>"><?=$this->lang->line('My Profile');?></a></li>
                  <li><a href="<?= site_url('supplier/inbox'); ?>"><?=$this->lang->line('Chat');?></a></li>
                <li class="sub-menu-separator"></li>
                <li><a href="<?= site_url('supplier/logout'); ?>"> <i class="icon-unlock"></i><?=$this->lang->line('Logout');?></a></li>
              </ul>
            <?php } ?>

            <?php if ($user_role == 'marketer') { ?>
              <a href="<?= site_url('marketer/profile'); ?>" class="f-white hover-red">
                <div>
                  <i class="icon-user"></i>
                   <span class="text-label">
                    <?=$this->lang->line('Profile');?>
                  </span >
                </div>
              </a>
              <?php
                $checkNotify = $this->m_model->selectasmax(5, 'user='.$this->session->userdata('user').' AND status =0', 'user_notify');
                if (count($checkNotify) > 0) {
                  echo '<span class="badgeUser">'.count($checkNotify).'</span>';
                }
              ?>
              <ul class="toolbar-dropdown w25">
                <li class="sub-menu-user">
                  <div class="user-ava"><img src="<?php if($user_data->image == '') { echo site_url('assets/frontend/img/profile.png');  } else { echo $user_data->image; } ?>" alt="Hary">
                  </div>
                  <div class="user-info">
                    <h6 class="user-name"><?= $user_data->name; ?></h6>
                    <span class="text-xs text-muted"><?= $user_data->created; ?></span>
                  </div>
                </li>
                <?php
                if (count($checkNotify) > 0) {
                  foreach ($checkNotify as $key => $valueNotify) { ?>
                    <li><a href="<?= site_url('/').$valueNotify->link; ?>"><?= $valueNotify->notify; ?></a></li>
                <?php
                  }
                  echo '<li class="sub-menu-separator"></li>';
                }
                ?>
                  <li><a href="<?= site_url('marketer/'); ?>"><?=$this->lang->line('Orders');?></a></li>
                  <li><a href="<?= site_url('marketer/profile'); ?>"><?=$this->lang->line('My Profile');?></a></li>
                  <li><a href="<?= site_url('marketer/inbox'); ?>"><?=$this->lang->line('Chat');?></a></li>
                <li class="sub-menu-separator"></li>
                <li><a href="<?= site_url('marketer/logout'); ?>"> <i class="icon-unlock"></i><?=$this->lang->line('Logout');?></a></li>
              </ul>
            <?php } ?>

            <?php } else { ?>
            <a href="<?= site_url('page/login'); ?>" class="f-white hover-red">
              <div>
                <i class="icon-user"></i>
                <span class="text-label">
                  <?=$this->lang->line('Sign In / Up');?>
                </span>
              </div>
            </a>
            <div class="toolbar-dropdown w25 text-center px-3">
              <p class="text-xs mb-3 pt-2"><?=$this->lang->line('msg_sign_in');?></p>
              <a class="btn btn-primary btn-sm btn-block" href="<?= site_url('page/login'); ?>"><?=$this->lang->line('Sign In');?></a>
              <p class="text-xs text-muted mb-2"><?=$this->lang->line('New customer');?>?&nbsp;<a href="<?= site_url('page/login'); ?>"><?=$this->lang->line('Register');?></a></p>
            </div>
            <?php } ?>


          </div>

            <?php if($user_role != 'supplier' && $user_role != 'marketer') { ?>
            <div class="toolbar-item">
              <a href="#" class="f-white hover-red">
                  <div>
                    <span class="cart-icon">
                    <i class="icon-shopping-cart"></i>
                    <span class="loadBadge"></span>
                  </span>
                  <span class="text-label"><?=$this->lang->line('Cart');?></span>
                </div>
              </a>
              <div class="loadCart toolbar-dropdown cart-dropdown widget-cart" style="max-height: 400px; overflow-y: auto;">
                <div class="text-center px-3">
                  <p class="text-xs mb-3 pt-2"><?=$this->lang->line('msg_cart');?></p>
                  <a class="btn btn-info btn-sm btn-block" href="<?= site_url('product'); ?>"><?=$this->lang->line('Shop');?></a>
                </div>
              </div>
            </div>
            <?php } else { ?>
              <!--<a href="#">
                <div>
                  <span class="cart-icon">
                    <i class="icon-shopping-cart"></i>
                  </span>
                  <span class="text-label"></span>
                </div>
              </a>-->
            <?php } ?>


        </div><!-- toolbar hide on mobile -->

        <div class="mobile-menu">

          <div class="mobile-search">
            <form class="input-group" method="get" action="<?= site_url('search'); ?>">
              <span class="input-group-btn">
                <button type="submit"><i class="icon-search"></i></button>
              </span>
              <input class="form-control" name="key" type="search" placeholder="<?=$this->lang->line('msg_search_mobile');?>" style="background: #fff !important;">
            </form>
          </div>

          <div class="toolbar" >
            <div class="toolbar-item">
              <a href="#">
                <div>
                  <i class="flag-icon">
                    <img src="<?= site_url($this->lang->line('link_img_flag')); ?>" alt="lang">
                  </i>
                  <span class="text-label"><?=$this->lang->line('cap_flag');?></span>
                </div>
              </a>
              <ul class="toolbar-dropdown lang-dropdown w-100">
                <li class="px-3 pt-1 pb-2">
                  <form action="<?= base_url();?>language/" method="post">
                    <select id="ls_lang" name="ls_lang_mobile" class="form-control form-control-sm">
                      <option value="bahasa"><?=$this->lang->line('lang_id');?></option>
                      <option value="english"><?=$this->lang->line('lang_en');?></option>
                    </select>
                  </form>
                </li>
              </ul>
            </div>
            <?php
              if(!$this->session->userdata('user')){
            ?>
            <div class="toolbar-item">
              <a href="<?= site_url('page/login'); ?>">
                <div>
                  <i class="icon-user"></i>
                  <span class="text-label"><?=$this->lang->line('Sign In / Up');?></span>
                </div>
              </a>
            </div>
            <?php
              }
              else{
                switch (strtolower($user_role)) {
                  case 'customer':
                    # code...
            ?>
                    <div class="toolbar-item">
                      <a href="<?= site_url('member/profile'); ?>">
                        <div>
                          <i class="icon-user"></i>
                          <span class="text-label"><?=$this->lang->line('My Profile');?></span>
                        </div>
                      </a>
                    </div>
                    <div class="toolbar-item">
                      <a href="<?= site_url('member/logout'); ?>">
                        <div>
                          <i class="icon-user"></i>
                          <span class="text-label"><?=$this->lang->line('Logout');?></span>
                        </div>
                      </a>
                    </div>
            <?php
                    break;
                  case 'supplier':
                    # code...
            ?>      <div class="toolbar-item">
                      <a href="<?= site_url('member/profile'); ?>">
                        <div>
                          <i class="icon-user"></i>
                          <span class="text-label"><?=$this->lang->line('My Profile');?></span>
                        </div>
                      </a>
                    </div>
                    <div class="toolbar-item">
                      <a href="<?= site_url('member/logout'); ?>">
                        <div>
                          <i class="icon-user"></i>
                          <span class="text-label"><?=$this->lang->line('Logout');?></span>
                        </div>
                      </a>
                    </div>
            <?php
                    break;
                  case 'marketer':
                    # code...
            ?>
                  <div class="toolbar-item">
                    <a href="<?= site_url('marketer/profile'); ?>">
                      <div>
                        <i class="icon-user"></i>
                        <span class="text-label"><?=$this->lang->line('My Profile');?></span>
                      </div>
                    </a>
                  </div>
                  <div class="toolbar-item">
                    <a href="<?= site_url('marketer/logout'); ?>">
                      <div>
                        <i class="icon-user"></i>
                        <span class="text-label"><?=$this->lang->line('Logout');?></span>
                      </div>
                    </a>
                  </div>
            <?php
                }
              }
            ?>
          </div>
          <div>
            <nav class="slideable-menu" >
              <ul class="menu" data-initial-height="385" >
                <li class="active">
                  <span>
                    <a href="<?=base_url();?>">Home</a>
                  </span>
                </li>
                <li class="has-children">
                  <span>
                    <a href="#">
                      <?=$this->lang->line('Categories');?>
                    </a>
                    <span class="sub-menu-toggle"></span>
                  </span>
                  <ul class="slideable-submenu" >
                    <?php
                      if (count($categories) > 0) {
                        foreach ($categories as $key => $value) {
                          $sub = $this->m_model->selectas('category_parent', $value->id, 'category_sub');
                          if (count($sub) > 0) {
                    ?>
                            <li class="has-children">
                              <span>
                                <a href="<?= base_url('product/').$value->seo; ?>">
                                  <?php
                                    if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                                      echo  $value->name_id; 
                                    }
                                    else{
                                      echo  $value->name; 
                                    }
                                  ?>
                                </a>
                                <span class="sub-menu-toggle"></span>
                              </span>
                              <ul class="slideable-submenu">
                    <?php 
                                foreach ($sub as $keySub => $valueSub) {
                    ?>
                                  <li>
                                    <a href="<?= base_url('product/').$valueSub->seo; ?>">
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
                    <?php      
                                }
                    ?>
                              </ul>
                            </li>
                    <?php 
                          }
                          else{
                    ?>
                            <li>
                              <a href="<?= base_url('product/').$value->seo; ?>">
                                <?php
                                  if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                                    echo  $value->name_id; 
                                  }
                                  else{
                                    echo  $value->name; 
                                  }
                                ?>
                              </a>
                            </li>
                    <?php 
                          }
                        }
                      }
                    ?>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>   
    <div id="div_space_navbar" style="width: 100%;">
    </div>