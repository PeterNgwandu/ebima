<div class="row">
    <div class="col-md-4" style="margin: 0.5rem auto;">

        <div class="row" style="margin-top: 1.5rem;">
            <div style="width: 70px; margin: 2rem auto;">
                <a href="./">
                    <img src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/img/logo.png" style="width: 100%; border-radius: 100%;">
                </a>
            </div>
        </div>

        <div class="input-with-icon" style="margin-top: 0.5rem;">
            <input type="text" class="form-control" placeholder="Your E-mail" id="username" name="username">
            <span class="icon icon-calendar"></span>
        </div>
        <div class="input-with-icon" style="margin-top: 0.5rem;">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <span class="icon icon-calendar"></span>
        </div>

        <div id="loginResponse" style="">
        </div>

        <div class="input-with-icon" style="margin-top: 1.5rem;">
            <button type="button" id="btn-login" class="btn btn-danger btn-block">
                Login
            </button>
        </div>
        <div class="row" style="margin-top: 1.5rem; font-size: 14px;">
            <div class="col-md-6 text-left">
                I am not a member : <a href="./register" style="text-decoration: none;">Sign Up</a>
            </div>
            <div class="col-md-6 text-right">
                <a href="./resetpassword" style="text-decoration: none;">Reset Password</a>
            </div>
        </div>

    </div>
</div>

<script src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/js/Authentication.js"></script>
