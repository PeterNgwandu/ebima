<?php
    $pg = __DIR__ .'/../default/pgtitle.php';
    if(file_exists($pg)){
        require $pg;
    }
?>

<hr class="afx">

<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
        <div class="input-with-icon" style="margin-top: 0.5rem;">
            <input type="text" value="Example input" class="form-control">
            <span class="icon icon-calendar"></span>
        </div>
        <div class="input-with-icon" style="margin-top: 0.5rem;">
            <input type="text" value="Example input" class="form-control">
            <span class="icon icon-calendar"></span>
        </div>
    </div>
    <div class="col-md-4">
    </div>
</div>
