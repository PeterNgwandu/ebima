<div class="col-md-12" id="registration_process" style="margin-top: 10px;">
    <h5 style="margin-top: 3rem; margin-bottom: 1rem;">Personal Information</h5>
    <form id="_frm_login" class="form-horizontal" method="post" style="min-height: 300px;">

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Firstname"/>
                </div>
                <div class="col-md-6">
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Lastname"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="Mobile Eg: 255 752 512411"/>
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
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
                        <span class="input-group-addon" id="basic-addon2">
                            <img id="_regionrequest" src="./themes/assets/images/load.gif" style="width: 16px; visibility: hidden;">
                        </span>
                    </div>
                    <script type="text/javascript">

                        function getWilaya(mkoa){
                            return ajPost('public/district/', { region_id: mkoa }, 'GET', '#_regionrequest', '#district', true, '#tmp-select-district', 'json');
                        }

                    </script>
                </div>
                <div class="col-md-6">
                    <select class="form-control" id="district" name="district">
                        <option value="0">Select District</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h5 style="margin-top: 3rem; margin-bottom: 1rem;">Call me regarding?</h5>
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control" name="category" id="category" onchange='Javascript: getSubCategory(this.value);'>
                            <?php
                                if(isset($categy->response[0]->category_id)){
                                    foreach ($categy->response as $mkoa) {
                                        ?>
                                        <option value="<?php echo (isset($mkoa->category_id))? $mkoa->category_id : ''; ?>"><?php echo (isset($mkoa->names))? $mkoa->names : ''; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <span class="input-group-addon" id="basic-addon2">
                            <img id="_sub_categoryrequest" src="./themes/assets/images/load.gif" style="width: 16px; visibility: hidden;">
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control" name="sub_category" id="sub_category" onchange='Javascript: getPlans(this.value);'>
                            <option value="">Select Category</option>
                            <?php
                                if(isset($categy->response[0]->subcategory)){
                                    foreach ($categy->response[0]->subcategory as $mk) {
                                        ?>
                                        <option value="<?php echo (isset($mk->sub_category_id))? $mk->sub_category_id : ''; ?>"><?php echo (isset($mk->names))? $mk->names : ''; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <span class="input-group-addon" id="basic-addon2">
                            <img id="_plansrequest" src="./themes/assets/images/load.gif" style="width: 16px; visibility: hidden;">
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control" name="plans_id" id="plans_id" >
                            <option value="">Select Plan</option>
                            <?php
                                if(isset($categy->response[0]->subcategory[0]->plans[0]->plan_id)){
                                    foreach ($categy->response[0]->subcategory[0]->plans as $mk) {
                                        ?>
                                        <option value="<?php echo (isset($mk->plan_id))? $mk->plan_id : ''; ?>"><?php echo (isset($mk->names))? $mk->names : ''; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <span class="input-group-addon" id="basic-addon2">
                            <img id="_regionrequest" src="./themes/assets/images/load.gif" style="width: 16px; visibility: hidden;">
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>

            <script type="text/javascript">

                function getSubCategory(mkoa){
                    $("#plans_id").html('');
                    return ajPost('public/subcategory', { category_id: mkoa }, 'GET', '#_sub_categoryrequest', '#sub_category', true, '#tmp-select-subcategory', 'json');
                }

                function getPlans(mkoa){
                    return ajPost('public/plan', { sub_category_id: mkoa }, 'GET', '#_plansrequest', '#plans_id', true, '#tmp-select-plans', 'json');
                }

            </script>
        </div>

        <h5 style="margin-top: 3rem; margin-bottom: 1rem;">Reason for call back</h5>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control" name="reason_id" id="reason_id" onchange=';'>
                            <?php
                                if(isset($reason->response[0]->reason_id)){
                                    foreach ($reason->response as $mk) {
                                        ?>
                                        <option value="<?php echo (isset($mk->reason_id))? $mk->reason_id : ''; ?>"><?php echo (isset($mk->reason))? $mk->reason : ''; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <span class="input-group-addon" id="basic-addon2">
                            <img id="_reason_request" src="./themes/assets/images/load.gif" style="width: 16px; visibility: hidden;">
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <input class="form-control" name="policy_number" id="policy_number" placeholder="Enter policy number" />
                    <small>If you are a client, do you know your policy number? Please add it here</small>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <textarea class="form-control" name="message" id="message" style="min-height: 160px; resize: vertical;" placeholder="Please enter a message"></textarea>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin: 30px auto;">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-info" onclick='createCalls("#_frm_id", "#_action_process", "#_frm_login");'>
                        <img id="_action_process" src="./themes/assets/images/load.gif" style="width: 16px; margin-right: 5px;"> SUBMIT
                        <img src="./themes/assets/images/load.gif" style="width: 16px; margin-left: 5px; visibility: hidden;">
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group" style="margin: 30px auto;">
        </div>
    </form>
</div>
