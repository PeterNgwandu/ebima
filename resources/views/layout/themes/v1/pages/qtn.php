<div class="bw">
    <div class="di">

        <?php
        $pg = __DIR__ .'/default/nav_menu.php';
        if(file_exists($pg)){
            require $pg;
        }
        ?>

        <?php
        $qp = [
            'pgnames' => 'Dashboard',
            'pgtitle' => 'qtn',
        ];
        ?>


        <div class="es bsk" id="pg-show-content">

            <?php
            $pg = __DIR__ .'/qtn/qtn.php';
            if(file_exists($pg)){
                require $pg;
            }
            ?>

        </div>


    </div>
</div>



