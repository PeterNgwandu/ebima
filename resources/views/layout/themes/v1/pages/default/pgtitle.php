<div class="brv">
    <div class="brw">
        <h6 class="bry"><?php echo ((isset($qp['pgnames']))? $qp['pgnames'] : "Dashboard"); ?></h6>
        <h4 class="brx"><?php echo ((isset($qp['pgtitle']))? $qp['pgtitle'] : "Overview"); ?></h4>
    </div>
    <div class="qb brz">
        <div class="ayt brg">
            <?php if(!isset($qp['notdate']) or ($qp['notdate'] != 'notdate')){ ?>
                <input type="text" id="search_dates" name="search_dates" value="2001-05-01" class="form-control" data-provide="datepicker">
                <span class="bv bck"></span>
            <?php } ?>
        </div>
    </div>
</div>
