<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Eticaret</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">

    <link href="<?=asset();?>public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=asset();?>public/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?=asset();?>public/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?=asset();?>public/assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?=asset('public')?>/assets/css/dataTables.dataTables.min.css">
</head>


<!-- Begin page -->
<div class="accountbg"></div>
<div class="home-btn d-none d-sm-block">
    <a href="index.html" class="text-white"><i class="fas fa-home h2"></i></a>
</div>
<div class="wrapper-page">
    <div class="card card-pages shadow-none">

        <div class="card-body">
            <div class="text-center m-t-0 m-b-15">
                <a href="#" class="logo logo-admin"><img src="<?= asset('public');?>/assets/images/logo-dark.png" alt=""
                        height="24"></a>
            </div>
            <h5 class="font-18 text-center"><?php echo $errorMessage; ?></h5>

            <form class="form-horizontal m-t-30" action="<?= asset('login');?>" method="post">



                <div class="form-group">
                    <div class="col-12">
                        <label>Username</label>
                        <input class="form-control" type="text" required="" name="username" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <label>Password</label>
                        <input class="form-control" type="password" required="" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <div class="checkbox checkbox-primary">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1"> username=deneme şifre:
                                    123456</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log
                            In</button>
                    </div>
                </div>

                <div class="form-group row m-t-30 m-b-0">
                    <div class="col-sm-7">
                        <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot
                            your password?</a>
                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="pages-register.html" class="text-muted">Create an account</a>
                    </div>
                </div>
            </form>


        </div>

    </div>
</div>
<!-- END wrapper -->

<?php include_once 'include/script.php'; ?>
</body>

</html>