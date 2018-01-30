<?php
    use Api\Common\Common as Common;

    $pg = __DIR__ .'/../default/pgtitle.php';
    if(file_exists($pg)){
        require $pg;
    }
?>

<hr class="afx">


<div class="bs" style="margin-bottom: 1.8rem;">
    <div class="bpx">
        <div class="bpy bpz">
            <?php
                if(isset($_GET['delete']) and $_GET['delete'] > 0){
                    /*  The Usage  */
                    $data = [
                        'id' => $_GET['delete']
                    ];

                    $dele = Common::geTdata( 'delete/institute/'. $data['id'], 'delete', $data );
                    //  var_dump($dele);
                }
            ?>

            <?php
                $reqt = (isset($_GET['q']) and $_GET['q'] > 0)? ($_GET['q']) : "" ;
                /* The Usage */
                $data = [
                    'data' => $reqt
                ];

                $inst = Common::geTdata( 'institute' , 'GET', $data );
                $inst = json_decode($inst);
                //  var_dump($inst);

                $region = Common::geTdata( 'region/'. 219 , 'GET', $data );
                $region = json_decode($region);
                //  var_dump($region);
            ?>
            <div class="pz">
                <input type="text" class="form-control" id="kwajina" name="kwajina" placeholder="Search name" />
                <select class="form-control" id="mkoa" name="mkoa" style="margin-left: 0.5rem;" onchange='Javascript: getWilaya(this.value);'>
                    <option value="0">City/Region</option>
                    <?php
                        if(isset($region->response[0]->region_id)){
                            foreach ($region->response as $mkoa) {
                                ?>
                                <option value="<?php echo (isset($mkoa->region_id))? $mkoa->region_id : ''; ?>"><?php echo (isset($mkoa->names))? $mkoa->names : ''; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                <select class="form-control" id="wilaya" name="wilaya" style="margin-left: 0.5rem;">
                    <option value="0">Select District</option>
                </select>
                <select class="form-control" id="types" name="types" style="margin-left: 0.5rem;">
                    <option value="">Institute Type</option>
                    <option value="1">Brokers</option>
                    <option value="2">Hospital</option>
                    <option value="3">Agents</option>
                </select>
            </div>
        </div>
        <div class="bpy">
            <div class="pz">
                <a href="Javascript: void(0);" onclick="searchInstitute();" class="ce pi">
                    <span class="bv bje"></span>
                </a>
                <?php
                    if(isset($_SESSION[ APPS_SESSION ])){
                        ?>
                        <a href="./create_institution" class="ce pi">
                            <span class="bv bdf"></span>
                        </a>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>


<div class="bs">
    <div class="nu">
        <table class="table" data-sort="table" style="margin-bottom: 10rem;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Region & Location</th>
                    <th>Type</th>
                    <?php
                        if(isset($_SESSION[ APPS_SESSION ])){
                            ?>
                            <th></th>
                            <?php
                        }
                    ?>

                </tr>
            </thead>
            <tbody id="get-institutes-search">

            <?php

                if(isset($inst->response[0]->institution_id)){
                    foreach ($inst->response as $opt) {
                        $opt = (array) $opt ;
                        //  var_dump($opt);
                ?>
                <tr>
                    <td style="">
                        <a href="./detail_institution?q=<?php echo (isset($opt['institution_id']))? $opt['institution_id'] : '-1'; ?>" style="text-decoration: none;">
                            <?php echo ((isset($opt['name']))? $opt['name'] : '-1'); ?><br />
                            <small style="">
                                <?php echo '+'. ((isset($opt['mobile']))? $opt['mobile'] : 'NO MOBILE'); ?>
                            </small>
                        </a>
                    </td>
                    <td><?php echo ((isset($opt['region']->names))? $opt['region']->names : ''); ?><br /><small><?php echo ((isset($opt['district']->names))? $opt['district']->names : ''); ?> - <?php echo ((isset($opt['ward']->names))? $opt['ward']->names : ''); ?></small></td>
                    <?php
                    switch (((isset($opt['type_id']))? $opt['type_id'] : '-1')) {
                        case '1':
                            $switchs = 'ce ayr pf';
                        break;
                        case '2':
                            $switchs = 'ce ayr pb';
                        break;
                        case '3':
                            $switchs = 'ce ayr pe';
                        break;
                        default:
                            $switchs = 'ce ayr pf';
                        break;
                    }
                    ?>
                    <td><a href="Javascript: void(0);" class="<?php echo($switchs); ?>" style="width:70px;"><?php echo ((isset($opt['types']->name))? $opt['types']->name : ''); ?></a></td>
                    <?php
                        if(isset($_SESSION[ APPS_SESSION ])){
                            ?>
                            <td style="">
                                <a class="ce ayr pf" href="./update_institution?q=<?php echo (isset($opt['institution_id']))? $opt['institution_id'] : '-1'; ?>">
                                    <span class="bv bfk"></span>
                                </a>
                                <a class="ce ayr pf" href="./institution?delete=<?php echo (isset($opt['institution_id']))? $opt['institution_id'] : '-1'; ?>">
                                    <span class="bv bof"></span>
                                </a>
                                <a class="ce ayr pf" href="./detail_institution?q=<?php echo (isset($opt['institution_id']))? $opt['institution_id'] : '-1'; ?>">
                                    <span class="bv bdk"></span>
                                </a>
                            </td>
                            <?php
                        }
                    ?>

                </tr>
                <?php
                    }
                }
            ?>

            </tbody>
        </table>

    </div>
</div>

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

    function getWilaya(mkoa){
        return ajaxCall('public/district/'+ mkoa, { q: mkoa }, 'GET', '#pg-loads', '#wilaya', true, '#tmp-select-district');
    }
</script>
