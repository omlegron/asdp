<!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5d3d6ec46d808312283a6055/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->
<script>
$(document).ready(function(){
  $('#sorting').val("<?= $this->input->get('sort');?>".toUpperCase());
  if("<?= $this->session->userdata('language'); ?>" == ''){
    $('[id=ls_lang]').val("bahasa");
  }else{
    $('[id=ls_lang]').val("<?= $this->session->userdata('language'); ?>");
  }
  $('#sorting').on('change', function(e) {
    var sorting= $(this).val();
    var sort_actived= "<?= $this->input->get('sort');?>".toUpperCase();
    url_active=window.location.href.split('?');
    if(url_active.length > 1 && url_active[1]!=undefined){
      param=url_active[1].replace("sort="+sort_actived, "");
      if(url_active[1].indexOf('sort')<0){// ini kalau param sort di temukan
        sorting+="&"
      }
      window.location.replace(url_active[0]+'?'+'sort='+sorting+param);
    }
    else{
      window.location.replace(url_active[0]+'?sort='+sorting);
    }
  });

  $('[id=ls_lang]').on('change', function(e) {
     $(this).parents('form').submit();
  });

    make_space_navbar();
    function make_space_navbar(){
      height_navbar=$("header").height();
      $("#div_space_navbar").css("height", height_navbar+"px");

    }
    $(document).on('change', '#province', function() {
      $.post("<?php echo base_url('cart/city/'); ?>"+$('#province').val(),function(obj){
        $('#city').html(obj);
        $('#district').html("<option value=''>Select</option>");
      });
    });

    $(document).on('change', '#city', function() {
      $.post("<?php echo base_url('cart/district/'); ?>"+$('#city').val(),function(obj){
        $('#district').html(obj);
      });
    });

<?php if ($this->session->userdata('user_role') != 'supplier' && $this->session->userdata('user_role') != 'marketer') { ?>
  function loadCart(){
    $('.loadCart').load('<?= site_url('cart/loadCart'); ?>');
  }

  function loadBadge(){
    $('.loadBadge').load('<?= site_url('cart/loadBadgeCart'); ?>');
  }

  loadBadge();
  loadCart();

  $('.wishlists').on('click', function(e) {
      selector_product = this;
      var product = $(this).data("id");
      dataString = {product: product};
      $.ajax({
        type: "POST",
        url: "<?= site_url('cart/addWishlist'); ?>",
        cache: false,
        data: dataString,
        success: function(response) {
          json=$.parseJSON(response);
          $(selector_product).attr("data-toast-iteration", json.status);
        }
      });
  });

  $('.carts').on('click', function(e) {
      var product = $(this).data("id");
      var qty = $(this).parents('div').closest('div').find('.qty').val();
      var note = '';
      if($(this).parents('div').closest('div').find('.note').val() != undefined){
        var note = $(this).parents('div').closest('div').find('.note').val();
      }
      else{
        var note = '';
      }
      dataString = {product: product, qty: qty, note: note};
      $.ajax({
        type: "POST",
        url: "<?= site_url('cart/add'); ?>",
        cache: false,
        data: dataString,
        success: function(response) {
          loadCart();
          loadBadge();
        }
      });
  });

  $('.updateCarts').on('click', function(e) {
    var data = $('form').serializeArray();
      dataString = {product: data};
      $.ajax({
        type: "POST",
        url: "<?= site_url('cart/update'); ?>",
        cache: false,
        data: data,
        success: function(response) {
          location.reload();
        }
      });
  });
<?php } ?>
  //-----

  $(document).on('click', '[id=btn_cancel_voucher]', function(e){
    baseurl='<?= base_url();?>'
    $(this).removeAttr('id');
    dataMap={}
    dataMap['cartId']=$(this).attr('cartId');
    $.post(baseurl+'cart/CancleVoucher', dataMap, function(data){
      json=$.parseJSON(data);
      if(json.success == 1){
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('removed_voucher');?>',
            position: "topRight",
            class: "iziToast-info",
        });
        location.reload();
      }
      else{
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('failed_remove_voucher');?>',
            position: "topRight",
            class: "iziToast-error",
        });
      }
    })
  })

  $(document).on('click', '[id=btn_delet_product_tmp]', function(e){
    msg=$(this).attr('msg');
    href=$(this).attr('href');
    var notif = confirm(msg);
    if (notif == false) {
      return;
    } 
    baseurl=$(this).attr('url');
    $(this).removeAttr('id');
    dataMap={}
    dataMap['id']=$(this).attr('data-id');
    dataMap['delete']=true;
    $.post(baseurl, dataMap, function(data){
      json=$.parseJSON(data);
      if(json.success == 1){
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('delete_product');?>',
            position: "topRight",
            class: "iziToast-info",
        });
        location.reload();
      }
      else{
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('delete_product');?>',
            position: "topRight",
            class: "iziToast-error",
        });
      }
    })
  })
});
</script>
<div id="loading" class="row" style="display: none;">
  <div class="col s12 center" style="position: fixed; background:rgba(238, 238, 238, 0.6); z-index:1051; width:100%; height:100%; left:0; top:0; text-align:center;">
      <i class="fa fa-spinner fa-pulse fa-5x" style="margin-top:20%; color:" aria-hidden="true"></i>
  </div>
</div>
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title"><?=$this->lang->line('Customer Services');?></h3>
                <ul>
                  <li><a href="<?= site_url('page/p/contact-us') ?>"><?=$this->lang->line('Contact Us');?></a></li>
                </ul>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title"><?=$this->lang->line('About Us');?></h3>
                <ul>
                  <li><a href="<?= site_url('page/p/about-us') ?>"><?=$this->lang->line('About');?> Bazaarplace</a></li>
                  <li><a href="<?= site_url('page/p/term-and-condition') ?>"><?=$this->lang->line('Terms & Conditions');?></a></li>
                </ul>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title"><?=$this->lang->line('User Guide');?></h3>
                <ul>
                  <li>
                    <a href="<?= site_url('page/p/user-guide-buyer') ?>">
                      <?=$this->lang->line('As Buyer');?> 
                    </a>
                  </li>
                  <li>
                    <a href="<?= site_url('page/p/user-guide-supplier') ?>">
                      <?=$this->lang->line('As Supplier');?> 
                    </a>
                  </li>
                  <li>
                    <a href="<?= site_url('page/p/user-guide-marketer') ?>">
                      <?=$this->lang->line('As Marketer');?> 
                    </a>
                  </li>
                </ul>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title"><?=$this->lang->line('Buy on');?> Bazaarplace</h3>
                <ul>
                  <li><a href="#"><?=$this->lang->line('All Categories');?></a></li>
                </ul>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
            <section class="widget widget-light-skin">
              <h3 class="widget-title"><?=$this->lang->line('Get In Touch With Us');?></h3>
              <a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
            </section>
            </div>
          </div>
          <hr class="hr-light mt-2">
          <p class="footer-copyright" style="text-align: center;">
             © 2018 bazaarplace.com. All rights reserved. 
          </p>
        </div>
      </footer>
    <a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <div class="site-backdrop"></div>
    <script src="<?= site_url('assets/frontend/js/vendor.min.js'); ?>"></script>
    <!--<script src="<?= site_url('assets/frontend/js/scripts.min.js'); ?>"></script>-->
    <script src="<?= site_url('assets/frontend/js/scripts-v3.min.js'); ?>"></script>

  </body>
</html>