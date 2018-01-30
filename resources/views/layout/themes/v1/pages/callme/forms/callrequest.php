<?php
    use Api\Common\Common as Common;

    $reqt = (isset($_GET['q']) and $_GET['q'] > 0)? ($_GET['q']) : "" ;
    /* The Usage */
    $data = [
        'data' => $reqt
    ];

    $inst = Common::geTdata( 'call' , 'GET', $data );
    $inst = json_decode($inst);
    //  var_dump($inst);

?>

<div class="row" style="margin-top: 10px;">
    <div class="col-md-4">
        <select class="form-control" id="mkoa" name="mkoa" style="margin-left: 0.5rem;" onchange='Javascript: filterWilaya(this.value);'>
            <option value="0">City/Region</option>
            <?php
                if(isset($rejion->response[0]->region_id)){
                    foreach ($rejion->response as $mkoa) {
                        ?>
                        <option value="<?php echo (isset($mkoa->region_id))? $mkoa->region_id : ''; ?>"><?php echo (isset($mkoa->names))? $mkoa->names : ''; ?></option>
                        <?php
                    }
                }
            ?>
        </select>
    </div>
    <div class="col-md-4">
        <select class="form-control" id="wilaya" name="wilaya" style="margin-left: 0.5rem;">
            <option value="0">Select District</option>
        </select>
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary btn-block">
            Search Request
        </button>
    </div>
</div>
<div class="row" style="margin-top: 10px;">
    <div class="col-md-12" id="list_of_call" style="margin-top: 10px;">
        <?php
            $pg = __DIR__ .'/request/listrequest.php';
            if(file_exists($pg)){
                require $pg;
            }
        ?>
    </div>

</div>

