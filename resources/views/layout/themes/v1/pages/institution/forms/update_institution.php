<?php
use Api\Common\Common as Common;

if(isset($inst->response[0]->institution_id)){
    $inst = $inst->response[0];
    //  var_dump($inst);

    $wilaya = Common::geTdata( 'district/'. $inst->region_id , 'GET', $data );
    $wilaya = json_decode($wilaya);
    //  var_dump($wilaya);

    $katani = Common::geTdata( 'wards/'. $inst->district_id , 'GET', $data );
    $katani = json_decode($katani);
    //  var_dump($katani);

?>
<div class="col-md-12" id="showresponce">
    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label">Select Ward</label>
            <select class="form-control" id="type_id" name="type_id">
                <option value="0">Institute Type</option>
                <option <?php echo (isset($inst->type_id) and $inst->type_id == 1)? 'selected' : '' ; ?> value="1">Brokers</option>
                <option <?php echo (isset($inst->type_id) and $inst->type_id == 2)? 'selected' : '' ; ?> value="2">Hospital</option>
                <option <?php echo (isset($inst->type_id) and $inst->type_id == 3)? 'selected' : '' ; ?> value="3">Agents</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label">Name of institute</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($inst->name))? $inst->name : '' ; ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo (isset($inst->mobile))? $inst->mobile : '' ; ?>">
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo (isset($inst->email))? $inst->email : '' ; ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label">City/Region</label>
            <select class="form-control" id="region_id" name="region_id" onchange='Javascript: getWilaya(this.value);'>
                <option value="">City/Region</option>
                <?php
                    if(isset($rejion->response[0]->region_id)){
                        foreach ($rejion->response as $mkoa) {
                            ?>
                            <option <?php echo (isset($inst->region_id) and $inst->region_id == $mkoa->region_id)? 'selected' : '' ; ?> value="<?php echo (isset($mkoa->region_id))? $mkoa->region_id : ''; ?>"><?php echo (isset($mkoa->names))? $mkoa->names : ''; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label">District</label>
            <select class="form-control" id="district" name="district" onchange='Javascript: getKata(this.value);'>
                <?php
                    if(isset($wilaya->response[0]->district_id)){
                        foreach ($wilaya->response as $mkoa) {
                            ?>
                            <option <?php echo (isset($inst->district_id) and $inst->district_id == $mkoa->district_id)? 'selected' : '' ; ?> value="<?php echo (isset($mkoa->district_id))? $mkoa->district_id : ''; ?>"><?php echo (isset($mkoa->names))? $mkoa->names : ''; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label">Select Ward</label>
            <select class="form-control" id="ward" name="ward">
                <?php
                    if(isset($katani->response[0]->ward_id)){
                        foreach ($katani->response as $mkoa) {
                            ?>
                            <option <?php echo (isset($inst->ward_id) and $inst->ward_id == $mkoa->ward_id)? 'selected' : '' ; ?> value="<?php echo (isset($mkoa->ward_id))? $mkoa->ward_id : ''; ?>"><?php echo (isset($mkoa->names))? $mkoa->names : ''; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label">Street Location</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php echo (isset($inst->location))? $inst->location : '' ; ?>">
        </div>
    </div>

    <hr class="afx">

    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label">Latitude</label>
            <input type="text" class="form-control" id="lat" name="lat" value="<?php echo (isset($inst->lat))? $inst->lat : '' ; ?>">
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label">Longtude</label>
            <input type="text" class="form-control" id="lon" name="lon" value="<?php echo (isset($inst->lon))? $inst->lon : '' ; ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">

            <input type="hidden" class="form-control" id="user_id" name="user_id">
            <input type="hidden" class="form-control" id="institution_id" name="institution_id" value="<?php echo (isset($inst->institution_id))? $inst->institution_id : '-1' ; ?>">

            <button type="button" class="btn btn-outline-primary btn-lg" onclick='createInstitute("#institute_forms", "#jx-loading", "#showresponce");' style="font-size: 28px; margin-top: 0.9rem;">
                <span class="bv bmc"></span>
                <span><?php echo ($start_edit)? 'UPDATE' : 'SAVE' ?></span>
                <img src="./themes/assets/images/load.gif" id="jx-loading" style="visibility: hidden;" />
            </button>
        </div>
    </div>


    <script type="text/javascript">
        function createInstitute(idforms, imgloader, showresponce){
            //  start initiate the process of capturing data from
            //  the form
            var form = {
                    name: $("#name").val(),
                    mobile: $("#mobile").val(),
                    email: $("#email").val(),
                    country_id: 219,
                    region_id: $("#region_id").val(),
                    district_id: $("#district").val(),
                    ward_id: $("#ward").val(),
                    location: $("#location").val(),
                    lat: $("#lat").val(),
                    lon: $("#lon").val(),
                    user_id: $("#user_id").val(),
                    institution_id: $("#institution_id").val(),
                    type_id: $("#type_id").val()
            };

            return ajaXurl('update/institute', form, 'PUT', imgloader, showresponce, true, 'json', false, '');
        }

        function getWilaya(mkoa){
            $('#ward').html('');
            return ajaXurl('district/'+ mkoa, { q: mkoa }, 'GET', '#pg-loads', '#district', true, 'json', true, '#tmp-select-district');
        }

        function getKata(wilaya){
            return ajaXurl('wards/'+ wilaya, { q: wilaya }, 'GET', '#pg-loads', '#ward', true, 'json', true, '#tmp-select-wards');
        }
    </script>

</div>
<?php
} else {
?>
<div class="alert alert-danger col-md-12" role="alert">
    <!--h5>searching response :-</h5-->
    <p style="">
        Sorry, Institution you are looking is not available!
    </p>
</div>
<?php
}
?>
