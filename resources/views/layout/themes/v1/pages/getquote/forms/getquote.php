<div class="col-md-12" id="registration_process" style="margin-top: 10px;">
    <h5 style="margin-top: 3rem; margin-bottom: 1rem;">Personal Information</h5>
    <form id="_frm_login" action="http://127.0.0.1/insurance/private/create/quote" method="post" style="min-height: 300px;">

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
                    <select class="form-control" id="district" name="district_id">
                        <option value="0">Select District</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h5 style="margin-top: 3rem; margin-bottom: 1rem;">Plan Information</h5>
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control" name="category_id" id="category" onchange='Javascript: getSubCategory(this.value);'>
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
                        <select class="form-control" name="subcategory_id" id="sub_category" onchange='Javascript: getPlans(this.value);'>
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
                <div class="col-md-12">
                    <div class="input-group">
                        <select class="form-control" name="plan_id" id="plan_id" onchange='Javascript: getQuoteform(this.value);' >
                            <option value="0,0">Select Plan</option>
                            <?php
                                if(isset($categy->response[0]->subcategory[0]->plans[0]->plan_id)){
                                    foreach ($categy->response[0]->subcategory[0]->plans as $mk) {
                                        ?>
                                        <option value="<?php echo (isset($mk->plan_id, $mk->quoteform))? $mk->plan_id .','. $mk->quoteform : '0,0'; ?>"><?php echo (isset($mk->names))? $mk->names : ''; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <span class="input-group-addon" id="basic-addon2">
                            <img id="_getformrequest" src="./themes/assets/images/load.gif" style="width: 16px; visibility: hidden;">
                        </span>
                    </div>
                </div>

            </div>

            <script type="text/javascript">

                function getSubCategory(mkoa){
                    $("#plans_id").html('');
                    return ajPost('public/subcategory', { category_id: mkoa }, 'GET', '#_sub_categoryrequest', '#sub_category', true, '#tmp-select-subcategory', 'json');
                }

                function getPlans(mkoa){
                    return ajPost('public/plan', { subcategory_id: mkoa }, 'GET', '#_plansrequest', '#plans_id', true, '#tmp-select-plans-quote', 'json');
                }

                function getQuoteform(str) {
                    var data = str.split(',');
                    console.log(data);
                    //  swal({text: data[1]});
                    var pg = geTform( data[1], "#_getformrequest", "#sm-quote-details");
                }
            </script>

            <!-- QUOTE FORM -->
            <div class="row">
                <div id="sm-quote-details" class="col-md-12" style="margin-top: 1rem;">
                    <?php
                    $pg = __DIR__ .'/quote_details/quote_defaults.php';
                    if(file_exists($pg)){
                        require $pg;
                    }
                    ?>
                </div>
            </div>
            <!-- QUOTE FORM -->

        </div>

        <div class="form-group" style="margin: 30px auto;">
        </div>
    </form>
</div>

<script type="text/javascript">
    function createQuote(formid, imgloader, showresponce){

        var form  = $(formid);
        var _url  = form.attr("action");
        var _form = form.serialize();

        var plan = ajaXurl(_url, _form, 'POST', imgloader, showresponce, false, 'html');

        return null;
    }

    function geTform(pg, imgloader, showresponce){

        var _url  = 'http://127.0.0.1/insurance/usage/getform';
        var _form = {
            'forms': pg,
        };

        var plan = ajaXurl(_url, _form, 'GET', imgloader, showresponce, false, 'html');

        return null;
    }

</script>
