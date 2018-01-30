<?php
$pg = __DIR__ . '/getquote/forms/quote_details/quote_defaults.php';

$gp = __DIR__ . '/getquote/forms/' . ((isset($_GET['forms']))? $_GET['forms'] : 'quote_details/quote_defaults.php') ;
if(file_exists($gp)){
    $pg = $gp;
}

if(file_exists($pg)){
    require $pg;
}
?>
