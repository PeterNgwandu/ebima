<?php
    use Api\Common\Common as Common;

    $pg = __DIR__ .'/../default/pgtitle.php';
    if(file_exists($pg)){
        require $pg;
    }

    $reqt = (isset($_GET['q']) and $_GET['q'] > 0)? ($_GET['q']) : "" ;
    /* The Usage */
    $data = [
        'data' => $reqt
    ];

    $inst = Common::geTdata( 'institute/'. $reqt , 'GET', $data );
    $inst = json_decode($inst);
    //  var_dump($inst);

    $rejion = Common::geTdata( 'region/'. 219 , 'GET', $data );
    $rejion = json_decode($rejion);
    //  var_dump($rejion);

?>

<hr class="afx">

<div class="row" style="margin-bottom: 1.8rem;">
    <?php
        $pg = __DIR__ .'/forms/update_institution.php';
        if(file_exists($pg)){
            $start_edit = true ;
            require $pg;
        }
    ?>
</div>
