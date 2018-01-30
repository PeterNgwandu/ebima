<?php
    use Api\Common\Common as Common;

    $pg = __DIR__ .'/../default/pgtitle.php';
    if(file_exists($pg)){
        require $pg;
    }

    /* The Usage */
    $data = [
        'data' => null
    ];

    $rejion = Common::geTdata( 'region/'. 219 , 'GET', $data );
    $rejion = json_decode($rejion);
    //  var_dump($rejion);

?>

<hr class="afx">

<div class="row" style="margin-bottom: 1.8rem;">
    <?php
        $pg = __DIR__ .'/forms/create_institution.php';
        if(file_exists($pg)){
            require $pg;
        }
    ?>
</div>
