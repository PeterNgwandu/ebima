<div class="col-md-12" id="cover_details" style="margin-top: 20px">
<!--    <h5 style="margin-top: 2rem; margin-bottom: 1rem;"> Vehicle Cover Details </h5>-->

    <form action="" method="post" id="cover_ddetails" class="form-horizontal" style="min-height: 300px" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <h6> What Type of Cover Required </h6>
                </div>
                <div class="col-md-3">
                    <div class="checkbox">
                        <h6> Comprehensive
                            <input type="checkbox" name="comprehensive" class="checkbox">
                        </h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkbox">
                        <h6> Third Party,Fire&Theft
                            <input type="checkbox" name="other" class="checkbox">
                        </h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="checkbox">
                        <h6> Third Party Only
                            <input type="checkbox" name="third_party" class="checkbox">
                        </h6>
                    </div>
                </div>
            </div>
            <hr>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <h6> Are you at present or in the past been insured for the risk proposed? </h6>
                </div>
                <div class="col-md-4">
                    Yes <input type="radio" name="insured" class="radio">
                    No <input type="radio" name="insured" class="radio">
                </div>
            </div>
            <hr>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="company" class="form-control" placeholder="Name of the Company">
                </div>
                <div class="col-md-4">
                    <input type="number" name="period" class="form-control" placeholder="Period">
                </div>
                <div class="col-md-4">
                    <input type="number" name="policy_number" class="form-control" placeholder="Policy Number">
                </div>
            </div>
            <hr>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                   <h6> Are you entitled to a No. claim bonus? &nbsp;
                      Yes <input type="radio" name="claim_bonus" class="radio">&nbsp;&nbsp;
                       No <input type="radio" name="claim_bonus" class="radio">
                   </h6>
                </div>
                <div class="col-md-4">
                    <label for="certificate"> Attach Certificate
                        <input type="file" class="form-control-file form-control">
                    </label>
                </div>
            </div>
            <hr>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <h6> Has any proposal or renewal been : </h6>
                </div>
                <br>
                <div class="col-md-12">
                    <h6> Declined ? &nbsp;&nbsp;
                        Yes <input type="radio" name="declined" class="radio">
                         No <input type="radio" name="declined" class="radio">
                    </h6>
                </div>
                <br>
                <div class="col-md-12">
                    <h6> Withdrawn ? &nbsp;&nbsp;
                        Yes <input type="radio" name="withdrawn" class="radio">
                         No <input type="radio" name="withdrawn" class="radio">
                    </h6>
                </div>
                <br>
                <div class="col-md-12">
                    <h6> Charged an increased rate ? &nbsp;&nbsp;
                        Yes <input type="radio" name="increased_rate" class="radio">
                         No <input type="radio" name="increased_rate" class="radio">
                    </h6>
                </div>
                <br>
                <div class="col-md-12">
                    <h6> Required special restrictions ? &nbsp;&nbsp;
                        Yes <input type="radio" name="special_restrictions" class="radio">
                         No <input type="radio" name="special_restrictions" class="radio">
                    </h6>
                </div>
            </div>
            <hr>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <h6> Who is the principal owner of this vehicle(s) , If not insured </h6>
                </div>
                <div class="col-md-6">
                    <input type="text" name="owner_name" class="form-control" placeholder="Owner Name">
                </div>
                <div class="col-md-6">
                    <input type="number" name="how_long" class="form-control" placeholder="How Long Driving">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <input type="number" name="age" class="form-control" placeholder="Age">
                </div>
                <div class="col-md-4">
                    <input type="text" name="date_licensed" data-provide="datepicker" class="form-control" placeholder="Date Licensed">
                </div>
                <div class="col-md-4">
                    <input type="number" name="license_number" class="form-control" placeholder="Licence Number">
                </div>
            </div>
            <hr>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <h6> Give particulars of all accidents or losses over the past 3 years involving you
                        or any other person who to your knowledge will be driving the vehicle
                    </h6>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <select name="claim_type" id="" class="form-control">
                        <option value="Claim Type"> Claim Type </option>
                        <option value="Own Damage"> Own Damage </option>
                        <option value="Third party,Fire or Theft"> Third party,Fire or Theft </option>
                        <option value="Third party only"> Third party only </option>
                        <option value="Any other loss"> Any other loss </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="number" class="form-control" placeholder="Number">
                </div>
                <div class="col-md-3">
                    <input type="number" name="amount" class="form-control" placeholder="Amount">
                </div>
                <div class="col-md-3">
                    <input type="number" name="year" class="form-control" placeholder="Year of Loss/Claim">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <select name="claim_type" id="" class="form-control">
                        <option value="Claim Type"> Claim Type </option>
                        <option value="Own Damage"> Own Damage </option>
                        <option value="Third party,Fire or Theft"> Third party,Fire or Theft </option>
                        <option value="Third party only"> Third party only </option>
                        <option value="Any other loss"> Any other loss </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="number" class="form-control" placeholder="Number">
                </div>
                <div class="col-md-3">
                    <input type="number" name="amount" class="form-control" placeholder="Amount">
                </div>
                <div class="col-md-3">
                    <input type="number" name="year" class="form-control" placeholder="Year of Loss/Claim">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <select name="claim_type" id="" class="form-control">
                        <option value="Claim Type"> Claim Type </option>
                        <option value="Own Damage"> Own Damage </option>
                        <option value="Third party,Fire or Theft"> Third party,Fire or Theft </option>
                        <option value="Third party only"> Third party only </option>
                        <option value="Any other loss"> Any other loss </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="number" class="form-control" placeholder="Number">
                </div>
                <div class="col-md-3">
                    <input type="number" name="amount" class="form-control" placeholder="Amount">
                </div>
                <div class="col-md-3">
                    <input type="number" name="year" class="form-control" placeholder="Year of Loss/Claim">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info btn-lg"> Save </button>
    </form>
</div>