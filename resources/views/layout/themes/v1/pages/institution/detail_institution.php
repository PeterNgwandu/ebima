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

?>

<hr class="afx">

<div class="row" style="margin-bottom: 1.8rem;">
<?php
    if(isset($inst->response[0]->institution_id)){
        $inst = $inst->response[0];
        //  var_dump($inst);
    ?>
    <div class="col-md-7">
        <table class="table" style="margin-top: 2.0rem;">
            <tr style="">
                <td style="padding-left: 0.1rem; width: 60%;">
                    <span style="font-weight: bold;">Institution name :</span><br />
                    <?php echo (isset($inst->name))? $inst->name : '' ; ?>
                </td>
                <td style="padding-left: 0.1rem; width: 40%;">
                    <span style="font-weight: bold;">Institution type :</span><br />
                    <?php echo (isset($inst->types->name))? $inst->types->name : '' ; ?>
                </td>
            </tr>
            <tr style="">
                <td style="padding-left: 0.1rem;">
                    <span style="font-weight: bold;">Mobile :</span><br />
                    <?php echo (isset($inst->mobile))? $inst->mobile : '' ; ?>
                </td>
                <td style="padding-left: 0.1rem;">
                    <span style="font-weight: bold;">E-mail :</span><br />
                    <?php echo (isset($inst->email))? $inst->email : '' ; ?>
                </td>
            </tr>
            <tr style="">
                <td style="padding-left: 0.1rem;">
                    <span style="font-weight: bold;">Region :</span><br />
                    <?php echo (isset($inst->region->names))? $inst->region->names : '' ; ?>
                </td>
                <td style="padding-left: 0.1rem;">
                    <span style="font-weight: bold;">District :</span><br />
                    <?php echo (isset($inst->district->names))? $inst->district->names : '' ; ?>
                </td>
            </tr>
            <tr style="">
                <td style="padding-left: 0.1rem;">
                    <span style="font-weight: bold;">Ward :</span><br />
                    <?php echo (isset($inst->ward->names))? $inst->ward->names : '' ; ?>
                </td>
                <td style="padding-left: 0.1rem;">
                    <span style="font-weight: bold;">Street Location :</span><br />
                    <?php echo (isset($inst->location))? $inst->location : '' ; ?>
                </td>
            </tr>
        </table>

        <a href="https://www.google.com/maps/search/<?php echo (isset($inst->lat))? $inst->lat : '' ; ?>,<?php echo (isset($inst->lon))? $inst->lon : '' ; ?>/@<?php echo (isset($inst->lat))? $inst->lat : '' ; ?>,<?php echo (isset($inst->lon))? $inst->lon : '' ; ?>,13z" target="_blank" class="btn btn-primary btn-sm" style="margin-top: 1.0rem; padding-right: 2.8rem;">
            <i class="fa fa-globe" style="padding-right: 0.3rem; padding-left: 0.3rem;"></i> view google map
        </a>
        <?php
            if(isset($_SESSION[ APPS_SESSION ])){
                ?>
                <a href="./update_institution?q=<?php echo (isset($inst->institution_id))? $inst->institution_id : '' ; ?>" class="btn btn-primary btn-sm" style="margin-top: 1.0rem; padding-right: 1.8rem;">
                    <i class="fa fa-pencil" style="padding-right: 0.3rem; padding-left: 0.3rem;"></i> edit
                </a>
                <?php
            }
        ?>
    </div>
    <div class="col-md-5">
        <h5 class="alert-heading" style="margin-top: 2.0rem;">Institution Map!</h5>
        <div id="gmaps" style="">

        </div>
    </div>
    <?php
} else {
    ?>
    <div class="alert alert-danger col-md-12" role="alert">
        <!--h5>searching response :-</h5-->
        <p style="">
            Sorry, Institution you are looking is not available!
        </p>
    </div>
    <?php
}
?>
</div>

<script type="text/javascript">
</script>
