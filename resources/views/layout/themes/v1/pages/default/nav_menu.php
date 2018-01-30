        <div class="em brh">
            <nav class="bro">
                <div class="bri">
                    <button class="bqe bqg brj" type="button" data-toggle="collapse" data-target="#nav-toggleable-md">
                        <span class="aep">Toggle nav</span>
                    </button>
                    <a class="brk bsi" href="./">
                        <!--span class="bv bik brl"></span-->
                        <img src="<?php echo './themes/'. THE_THEMES .'/'; ?>assets/img/logo.png" style="width: 50px; height: 50px;">
                    </a>
                </div>
                <div class="collapse bql" id="nav-toggleable-md">
                    <form class="brm">
                        <input class="form-control" type="text" placeholder="Search...">
                        <button type="submit" class="po">
                            <span class="bv bje"></span>
                        </button>
                    </form>
                    <ul class="nav qq nav-stacked xx">
                        <!--li class="ayx">Dashboard</li-->
                        <li class="qp">
                            <a class="qn" href="./">Homepage</a>
                        </li>
                        <li class="qp">
                            <a class="qn " href="./callme">Call me back</a>
                        </li>
                        <li class="qp">
                            <a class="qn active" href="./institution">Agent/ Hospital/ Brokers</a>
                        </li>
                        <li class="qp">
                            <a class="qn " href="./getquote">Get quote</a>
                        </li>
                        <li class="qp">
                            <a class="qn " href="./manage_quote">Manage quote</a>
                        </li>
                        <li class="qp">
                            <a class="qn " href="./mails">Custom Mails</a>
                        </li>
                        <li class="qp">
                            <a class="qn " href="./claims">Claims</a>
                        </li>
                        <!--li class="qp">
                            <a class="qn " href="./institution?type=agent">Agent</a>
                        </li>
                        <li class="qp">
                            <a class="qn " href="./institution?type=hospital">Hospital</a>
                        </li>
                        <li class="qp">
                            <a class="qn " href="./institution?type=broker">Brokers</a>
                        </li-->
                    </ul>
                    <hr class="bsj afx">
                    <ul class="nav qq nav-stacked xx">
                        <li class="qp">
                            <?php
                                if(!isset($_SESSION[ APPS_SESSION ])){
                                    ?>
                                    <a class="ce ayr ph" href="./login">Login</a> |
                                    <a class="ce ayr po" href="./register">Create Account</a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="ce ayr ph" href="./logout">Logout</a>
                                    <?php
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
