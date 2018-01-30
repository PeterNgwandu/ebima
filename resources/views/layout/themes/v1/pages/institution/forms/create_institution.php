<div class="col-md-12" id="showresponce">
    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label">Select Ward</label>
            <select class="form-control" id="type_id" name="type_id">
                <option value="0">Institute Type</option>
                <option value="1">Brokers</option>
                <option value="2">Hospital</option>
                <option value="3">Agents</option>
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
                            <option value="<?php echo (isset($mkoa->region_id))? $mkoa->region_id : ''; ?>"><?php echo (isset($mkoa->names))? $mkoa->names : ''; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label">District</label>
            <select class="form-control" id="district" name="district" onchange='Javascript: getKata(this.value);'>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label">Select Ward</label>
            <select class="form-control" id="ward" name="ward">
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
                    type_id: $("#type_id").val()
            };

            return ajaXurl('create/institute', form, 'POST', imgloader, showresponce, true, 'json', false, '');
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
