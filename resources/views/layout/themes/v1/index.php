<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>mrbima ! one insurance</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/css/toolkit-light.css" rel="stylesheet">
    <link href="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/css/application.css" rel="stylesheet">
    <link href="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/css/sweetalert.css" rel="stylesheet">
    <link href="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="./themes/assets/js/sweetmodal/min/jquery.sweet-modal.min.css" />

    <script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/tether.min.js"></script>

    <script src="./themes/assets/js/mustache/mustache.js"></script>
    <script src="./themes/assets/js/sweetmodal/min/jquery.sweet-modal.min.js"></script>
    <script src="./themes/assets/js/plupload.min.js"></script>

    <style>
        /* note: this is a hack for ios iframe for bootstrap themes shopify page */
        /* this chunk of css is not part of the toolkit :) */
        body {
            width: 1px;
            min-width: 100%;
            *width: 100%;
        }
    </style>
</head>
<body>
    <?php
        $sdk = __DIR__ .'/assets/sdk/facebook.php' ;
        if(file_exists($sdk)){
    		//    require $sdk ;
    	}
    ?>

    <?php
        $pg = __DIR__ .'/pages/'. ((isset($args['name']))? $args['name'] : "contents") .'.php';

    	if(file_exists($pg)){
    		require $pg ;
    	} else {
            require __DIR__ .'/pages/notfound.php' ;
        }
    ?>

<script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/chart.js"></script>
<script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/tablesorter.min.js"></script>
<script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/toolkit.js"></script>
<script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/application.js"></script>
<script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/Script.js"></script>

<script>
    // execute/clear BS loaders for docs
    $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
</script>
</body>

<?php
    $template = __DIR__ .'/assets/tmp/template.inc' ;
    if(file_exists($template)){
        require $template ;
    }
?>
</html>
