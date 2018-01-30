<?php
$qp = [
    'pgnames' => 'Dashboard',
    'pgtitle' => 'Details of the Vehicle',
];

$pg = __DIR__ .'/../../default/pgtitle.php';
if(file_exists($pg)){
    require $pg;
}
?>

<hr class="afx">

<div class="di bsl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bd-example bd-example-tabs">
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item">
                            <a href="#vehicle_details" class="nav-link active" id="home-tab" data-toggle="tab" aria-controls="" aria-expanded="false">
                               Vehicle Details Form
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#cover_details" class="nav-link" id="cover-tab" data-toggle="tab" aria-controls="" aria-expanded="false">
                                Cover Details Form
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#motor_proposal" class="nav-link" id="home-tab" data-toggle="tab" aria-controls="" aria-expanded="false">
                                Motor Proposal Form
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabsContent" style="margin-top: 10px;">
                    <div class="tab-pane fade active show" id="vehicle_details" role="tabpanel" aria-labelledby="v-tab" aria-expanded="true">
                        <?php
                        $pg = __DIR__ .'/motor/vehicle_details.php';
                        if(file_exists($pg)){
                            require $pg;
                        }
                        ?>
                    </div>

                    <div class="tab-pane fade" id="cover_details" role="tabpanel" aria-labelledby="cover-tab" aria-expanded="false">
                        <?php
                        $pg = __DIR__ .'/motor/cover_details.php';
                        if(file_exists($pg)){
                            require $pg;
                        }
                        ?>
                    </div>

                    <div class="tab-pane fade" id="motor_proposal" role="tabpanel" aria-labelledby="cover-tab" aria-expanded="false">
                        <?php
                        $pg = __DIR__ .'/motor/motor_proposal.php';
                        if(file_exists($pg)){
                            require $pg;
                        }
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



