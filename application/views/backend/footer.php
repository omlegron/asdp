        <!--
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <p class="m-b-0">© 2019 Bazaarplace Admin Panel</p>
                    </div>
                </div>
            </div>
        </div>-->

    </div>
</section>

<!-- Jquery Core Js --> 
<script src="<?=base_url();?>assets/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="<?=base_url();?>assets/backend/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="<?=base_url();?>assets/backend/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="<?=base_url();?>assets/backend/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="<?=base_url();?>assets/backend/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="<?=base_url();?>assets/backend/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->

<script src="<?=base_url();?>assets/backend/bundles/mainscripts.bundle.js"></script>
<script src="<?=base_url();?>assets/backend/js/pages/index.js"></script>
<script src="<?=base_url();?>assets/backend/js/pages/charts/jquery-knob.min.js"></script>
<script src="<?= site_url('assets/backend/bundles/datatablescripts.bundle.js'); ?>"></script>
<script src="<?= site_url('assets/backend/plugins/jquery-datatable/buttons/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= site_url('assets/backend/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= site_url('assets/backend/plugins/jquery-datatable/buttons/buttons.colVis.min.js'); ?>"></script>
<script src="<?= site_url('assets/backend/plugins/jquery-datatable/buttons/buttons.flash.min.js'); ?>"></script>
<script src="<?= site_url('assets/backend/plugins/jquery-datatable/buttons/buttons.html5.min.js'); ?>"></script>
<script src="<?= site_url('assets/backend/plugins/jquery-datatable/buttons/buttons.print.min.js'); ?>"></script>
<script src="<?= site_url('assets/backend/js/pages/tables/jquery-datatable.js'); ?>"></script>


<script type="text/javascript">
    $(document).on('click', '[class^=confirm]', function(e){
        e.preventDefault();
        msg=$(this).attr('msg');
        href=$(this).attr('href');
        var notif = confirm(msg);
        if (notif == true) {
          window.location.href = href;
        } 
    })
</script>




</body>
</html>