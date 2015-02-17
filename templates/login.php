<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include_http_metas(); ?>
        <?php include_metas(); ?>
        <?php include_title(); ?>
        <?php include_stylesheets(); ?>
        <?php include_javascripts(); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 main">
                    <?php echo $sf_content ?>
                </div>
            </div>
            <?php include_partial('theme/footer'); ?>
        </div>


    </body>
</html>
