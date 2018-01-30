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
    /*
    $data = [
        'data' => null
    ];
    */

    //  $categy = Common::geTdata( 'category' , 'GET', $data );
    //  $categy = json_decode($categy);
    //  var_dump($categy->response[0]->subcategory);

    /* The Usage */
    $data = [
        'data' => null
    ];

    $reason = Common::geTdata( 'reason' , 'GET', $data );
    $reason = json_decode($reason);
    //  var_dump($reason->response);

?>

<hr class="afx">

<div class="row" style="margin-bottom: 1.8rem;">
    <div class="col-md-12" id="registration_process" style="margin-top: 10px;">

        <div class="bd-example bd-example-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">CALL ME BACK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false">LIST OF CALL REQUEST!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="uchambuzi-tab" data-toggle="tab" href="#uchambuzi" role="tab" aria-controls="uchambuzi" aria-expanded="false">STATISTIC!</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab" aria-expanded="true">
                    <?php
                        $pg = __DIR__ .'/forms/callme.php';
                        if(file_exists($pg)){
                            require $pg;
                        }
                    ?>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                    <?php
                        $pg = __DIR__ .'/forms/callrequest.php';
                        if(file_exists($pg)){
                            require $pg;
                        }
                    ?>
                </div>
                <div class="tab-pane fade" id="uchambuzi" role="tabpanel" aria-labelledby="uchambuzi-tab" aria-expanded="false">
                    <?php
                        $pg = __DIR__ .'/forms/uchambuzi.php';
                        if(file_exists($pg)){
                            require $pg;
                        }
                    ?>
                </div>

            </div>
        </div>


    </div>
</div>

<script type="text/javascript">
    function createCalls(idforms, imgloader, showresponce){
        //  start initiate the process of capturing data from
        //  the form
        var form = new FormData();

        /*
            get data
        */
        form.append("fname",        $("#fname").val());
        form.append("lname",        $("#lname").val());
        form.append("mobile",       $("#mobile").val());
        form.append("email",        $("#email").val());
        form.append("region_id",    $("#region_id").val());
        form.append("district_id",  $("#district").val());

        /*
        form.append("category_id",      $("#category").val());
        form.append("sub_category_id",      $("#sub_category").val());
        form.append("plan_id",         $("#plans_id").val());
        */

        form.append("reason_id",    $("#reason_id").val());
        form.append("policy_number",    $("#policy_number").val());
        form.append("message",      $("#message").val());

        /*
            get token
        */
        console.log(form);
        var token = "<?php echo ((isset($_SESSION[APPS_SESSION]['jwt_token']))? $_SESSION[APPS_SESSION]['jwt_token'] : null ); ?>";
        var jpost = ajaxPost('create/call', token, form, "POST", imgloader, showresponce);
        //  var jpost = ajaXurl('create/call', form, "POST", imgloader, showresponce, true, 'html', false, null)

        return null;
    }

</script>
<script type="text/javascript">
    function searchInstitute(){

        //  start initiate the process of capturing data from
        //  the form
        var form = new FormData();

        /*
         get data
         */
        form.append("keyword",     $("#kwajina").val());
        form.append("region_id",   $("#mkoa").val());
        form.append("district_id", $("#wilaya").val());
        form.append("type_id",     $("#types").val());

        return ajaxCall('usage/search_institution', form, 'POST', '#pg-loads', '#get-institutes-search', false, '');
    }

    function filterWilaya(mkoa){
        return ajPost('public/district/', { region_id: mkoa }, 'GET', '#_regionrequest', '#wilaya', true, '#tmp-select-district', 'json');
    }

</script>

