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

?>

<hr class="afx">

<div class="row" style="margin-bottom: 1.8rem;">
    <div class="col-md-12" id="registration_process" style="margin-top: 10px;">

        <div class="bd-example bd-example-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Custom Mails</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab" aria-expanded="true">
                    <form action="" class="form-horizontal" style="margin-top: 20px;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="" class="form-control" placeholder="Sender">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="" class="form-control" placeholder="Sender Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="" class="form-control" placeholder="Sende To">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="" id="" cols="30" rows="10" placeholder="Message" style="resize: none;" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-info"> Send Mail </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
