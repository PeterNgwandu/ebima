<?php
    use Api\Common\Common as Common;

    $pg = __DIR__ .'/../default/pgtitle.php';
    if(file_exists($pg)){
        require $pg;
    }

    $reqt = (isset($_GET['q']) and $_GET['q'] > 0)? ($_GET['q']) : "" ;
    /* The Usage */
    $data = [
        'id' => $reqt
    ];

    $inst = Common::geTdata( 'delete/institute/'. $reqt , 'DELETE', $data );
    $inst = json_decode($inst);
    //  var_dump($inst);

?>

<hr class="afx">

<div class="row" style="margin-bottom: 1.8rem;">
<?php
    if ($inst->status == 'success') {
    ?>
    <div class="alert alert-success col-md-12" role="alert">
        <h5 class="alert-heading">Delete Request!</h5>
        <p style="">
            Your request to delete "" completed successfully!<br />
            <a href="./institution" class="btn btn-success btn-sm" style="margin-top: 1.0rem;">
                Institution
            </a>
        </p>
    </div>
    <?php
    }
?>
</div>

<script type="text/javascript">
</script>
