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
	        echo "<p>CLICK TO COPY: " . $url . "</p>";
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
		<p>For educational purposes only | SARAH HACKSWELL</p>
	</footer>
</body>
</html>