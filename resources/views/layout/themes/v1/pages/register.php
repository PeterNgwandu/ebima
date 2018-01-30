<div class="row">
    <div class="col-md-4" style="margin: 0.5rem auto;">

        <div class="row" style="margin-top: 1.5rem;">
            <div style="width: 70px; margin: 2rem auto;">
                <a href="./">
                    <img src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/img/logo.png" style="width: 100%; border-radius: 100%;">
                </a>
            </div>
        </div>

        <div class="row" style="margin-top: 0.8rem;">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Firstname" >
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Lastname" >
            </div>
        </div>
        <div class="row" style="margin-top: 0.8rem;">
            <div class="col-md-6">
                <select class="form-control" id="sex" name="sex">
                    <option value="0">Sex</option>
                    <option value="2">Female</option>
                    <option value="1">Male</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="10/11/1982" data-provide="datepicker" >
            </div>
        </div>
        <div class="row" style="margin-top: 0.8rem;">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="E-mail">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="0714 500 700" >
            </div>
        </div>

        <br /><hr class="afx" style="margin-top: 0.8rem;">

        <div class="row" style="margin-top: 0.8rem;">
            <div class="col-md-6">
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control" placeholder="Confirm Password">
            </div>
        </div>

        <div class="input-with-icon" style="margin-top: 1.5rem;">
            <input type="checkbox" checked id="condition" name="condition" onchange="getButton();" /> Yes, I agree tems of use
        </div>
        <div class="input-with-icon" style="margin-top: 0.8rem;">
            <button type="button" id="btn_register" class="btn btn-danger btn-block">
                Register Me
            </button>
        </div>
        <div class="row" style="margin-top: 1.5rem; font-size: 14px;">
            <div class="col-md-6 text-left">
                I have account : <a href="./login" style="text-decoration: none;">Login</a>
            </div>
            <div class="col-md-6 text-right">
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    function getButton(){
        var condition = document.getElementById('condition').checked;
        if( condition ){
            document.getElementById('btn_register').style.visibility = 'visible';
        } else {
            document.getElementById('btn_register').style.visibility = 'hidden';
        }
    }
</script>
