<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ASDP | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?=base_url();?>assets/login/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/login/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/login/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/login/css/hello.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="<?=base_url();?>assets/login/images/logo-dark.png" alt="" height="50"></span>
                                    </a>
                                </div><br>

                                <center><h3>Please Signup</h3></center>
                                <p>
                                    <center>
                                         <?php 
                                            $data=$this->session->flashdata('sukses');
                                            if($data!=""){ ?>
                                            <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
                                            <?php } ?>
                                            <?php 
                                            $data2=$this->session->flashdata('error');
                                            if($data2!=""){ ?>
                                            <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
                                        <?php } ?>
                                    </center>
                                </p>
                                <form action="" style="padding-top: 30px;" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Username</label>
                                        <input name="username" type="text" required="" class="form-control" placeholder="Username">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email</label>
                                        <input name="email" type="text" required="" class="form-control" placeholder="Email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" required="" class="form-control" placeholder="Password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" disabled="">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Submit </button>
                                        <a class="btn btn-success btn-block" href="<?php base_url(); ?>login"> Login </a>
                                    </div>
                                </form>
                                <?php
                                    if($this->session->userdata('status') == 'failedLogin'){
                                ?>
                                        <div class="alert alert-danger">
                                            <strong>Ooopss</strong>&nbsp;Username dan Password yang anda masukan tidak sesuai.
                                        </div>
                                <?php
                                        $this->session->unset_userdata('status');
                                    }
                                ?>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->


                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        

        <!-- Vendor js -->
        <script src="<?=base_url();?>assets/login/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?=base_url();?>assets/login/js/app.min.js"></script>
        
    </body>
</html>