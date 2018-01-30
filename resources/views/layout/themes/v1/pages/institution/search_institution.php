<?php
    use Api\Common\Common as Common;

    $data = $request->getParsedBody();
    /* The Usage */
    $data = array(
        'keyword'     => ((isset($data['keyword']))?     $data['keyword'] :     ''),
        'region_id'   => ((isset($data['region_id']))?   $data['region_id'] :   0),
        'district_id' => ((isset($data['district_id']))? $data['district_id'] : 0),
        'type_id'     => ((isset($data['type_id']))?     $data['type_id'] :     0),
    );

    $inst = Common::geTdata( 'search/institute' , 'POST', $data );
    $inst = json_decode($inst);

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
                    <a class="ce ayr pf" href="./delete_institution?q=<?php echo (isset($opt['institution_id']))? $opt['institution_id'] : '-1'; ?>">
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
