
<div class="bs">
    <div class="nu">
        <table class="table" style="margin-bottom: 10rem;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Region & Location</th>
                    <th>Status</th>
                    <th></th>

                </tr>
            </thead>
            <tbody id="get-institutes-search">

            <?php

                if(isset($inst->response[0]->callme_id)){
                    foreach ($inst->response as $opt) {
                        $opt = (array) $opt ;
                ?>
                <tr>
                    <td style="">
                        <a style="text-decoration: none;">
                            <?php echo ((isset($opt['fname'], $opt['lname']))? $opt['fname'] .' '. $opt['lname'] : 'none'); ?><br />
                            <small style="">
                                <?php echo ((isset($opt['mobile']))? '+'. $opt['mobile'] : 'NO MOBILE'); ?>
                            </small>
                        </a>
                    </td>
                    <td style="">
                        <?php echo ((isset($opt['region']->names))? $opt['region']->names : ''); ?> - <?php echo ((isset($opt['district']->names))? $opt['district']->names : ''); ?> <br />
                        <?php
                            if(isset($opt['reason'])){
                                foreach ($opt['reason'] as $rs) {
                                ?>
                                <small style="">
                                    <?php echo ((isset($rs->reason))? $rs->reason : ''); ?>
                                </small><br />
                                <?php
                                }
                            }
                        ?>
                    </td>
                    <td style="width: 25%; text-align: justify;">
                        <div id="msg-min-<?php echo ((isset($opt['callme_id']))? $opt['callme_id'] : '-1'); ?>" style="">
                            <?php echo ((isset($opt['message']))? substr($opt['message'], 0, 60) .' ...' : 'no message'); ?><br />
                            <a href="Javascript: void(0);" class="btn btn-danger btn-sm btn-block" style="font-size: 12px;" onclick='reaDmore("<?php echo (isset($opt['callme_id']))? $opt['callme_id'] : '-1'; ?>");'>
                                read more
                            </a>
                        </div>
                        <div id="msg-lg-<?php echo ((isset($opt['callme_id']))? $opt['callme_id'] : '-1'); ?>" style="display: none;">
                            <?php echo ((isset($opt['message']))? $opt['message'] : 'no message'); ?><br />
                            <a href="Javascript: void(0);" class="btn btn-danger btn-sm btn-block" style="font-size: 12px;" onclick='reaDmore("<?php echo (isset($opt['callme_id']))? $opt['callme_id'] : '-1'; ?>");'>
                                read less
                            </a>
                        </div>
                    </td>
                    <td style="">
                        <?php
                            switch (((isset($opt['calls_status']))? $opt['calls_status'] : '-1')) {
                                case 'OPENED':
                                    $switchs = 'ce ayr pe';
                                break;
                                default:
                                    $switchs = 'ce ayr pf';
                                break;
                            }
                        ?>
                        <a href="Javascript: void(0);" class="<?php echo($switchs); ?>" style="width:70px;">
                            <?php echo ((isset($opt['calls_status']))? $opt['calls_status'] : 'CLOSED'); ?>
                        </a>
                        <!--button href="Javascript: void(0);" class="btn btn-danger btn-sm btn-block" style="font-size: 12px;" onclick='getTmore("<?php echo (isset($opt['callme_id']))? $opt['callme_id'] : '-1'; ?>");'>
                            FEEDBACK
                        </button-->
                    </td>

                </tr>
                <!--tr>
                    <td colspan="3" id="comment_about_<?php echo (isset($opt['institution_id']))? $opt['institution_id'] : '-1'; ?>" style="padding: 0rem; border: none;">

                        <div class="media" style="margin: 2rem auto;">
                            <img class="d-flex mr-3 " src="themes/assets/images/avatar.svg" style="width: 64px; height: 64px;">
                            <div class="media-body" style="font-size: 13px; text-align: justify;">
                                <h6 class="mt-0" style="font-weight: bold;">Staff : John Paul</h6>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                    </td>

                </tr-->
                <?php
                    }
                }
            ?>

            </tbody>
        </table>

        <script type="text/javascript">
            function getTmore(id){
                swal("Thanks, now it is the time to edit!");
            }
        </script>

    </div>
</div>
