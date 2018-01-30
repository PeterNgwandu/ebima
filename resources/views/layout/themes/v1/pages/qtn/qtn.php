<?php

$pg = __DIR__ .'/../default/pgtitle.php';
if(file_exists($pg)){
    require $pg;
}

?>

<hr class="afx">
<script type="text/javascript">
    function peter() {
        var _form = {
            'form': null
        };
        var _url = 'http://127.0.0.1/insurance/samples';

        ajaXurl(_url, _form, 'GET', '-', '#sample', false, 'html');
    }
</script>

<div class="row" style="margin-bottom: 1.8rem;">
    <div class="col-md-12" id="registration_process" style="margin-top: 10px;">
        <a href='Javascript: peter();'>ghgfhg</a>
        <div id="sample">

        </div>


    </div>
</div>



