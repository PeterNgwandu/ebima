<?php
    $reqt = (isset($_GET['q']) and $_GET['q'] > 0)? ($_GET['q']) : "" ;
    /* The Usage */
    $data = [
        'data' => null
    ];

    $region = Common::geTdata( 'region/'. 219 , 'GET', $data );
    $region = json_decode($region);
    //  var_dump($region);
?>
