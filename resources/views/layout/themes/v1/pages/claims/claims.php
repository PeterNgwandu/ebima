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

    /* The Usage */
    $data = [
        'data' => null
    ];

    $categy = Common::geTdata( 'category' , 'GET', $data );
    $categy = json_decode($categy);
    //  var_dump($categy->response[0]->subcategory);

?>

<hr class="afx">

<div class="row" style="margin-bottom: 1.8rem;">
    <div class="col-md-12" id="registration_process" style="margin-top: 10px;">

        <div class="bd-example bd-example-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Claim</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab" aria-expanded="true">
                    <?php
                        $pg = __DIR__ .'/forms/claims.php';
                        if(file_exists($pg)){
                            require $pg;
                        }
                    ?>
                </div>

            </div>
        </div>


    </div>
</div>
