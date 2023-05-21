<!DOCTYPE html>
<html>
<head>
	<title>CSV Viewer - Alien Theme</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body {
			background-color: #0a0a0a;
			color: #fff;
			font-family: 'Lato', sans-serif;
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			font-size: 48px;
			margin-top: 80px;
			margin-bottom: 40px;
			text-shadow: 2px 2px #000;
		}

		form {
			display: flex;
			flex-direction: row;
			align-items: center;
			margin: auto;
			max-width: 600px;
			margin-top: 40px;
			margin-bottom: 40px;
		}

		label {
			margin-right: 10px;
			font-weight: bold;
			font-size: 22px;
			width: 200px;
		}

		input[type="file"] {
			flex-grow: 1;
			margin-right: 10px;
			font-size: 22px;
			background-color: #111;
			color: #fff;
			border: none;
			padding: 10px;
			box-shadow: 2px 2px #000;
			border-radius: 5px;
		}

		input[type="submit"] {
			font-size: 22px;
			padding: 10px 20px;
			background-color: #04c2c9;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			box-shadow: 2px 2px #000;
		}

		input[type="submit"]:hover {
			background-color: #048ba8;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			max-width: 800px;
			margin: auto;
			margin-top: 40px;
			margin-bottom: 40px;
			box-shadow: 2px 2px #000;
		}
		
		th, td {
			padding: 20px;
			text-align: left;
			vertical-align: top;
			border: 1px solid #333;
		}
		
		th {
			background-color: #04c2c9;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h1>CSV Viewer - Alien Theme</h1>

	<form method="post" enctype="multipart/form-data">
		<label for="file">Select a CSV file:</label>
		<input type="file" name="file" id="file" accept=".csv">
		<input type="submit" name="submit" value="View">
	</form>

	<?php
	if (isset($_POST["submit"])) {
	    // Process the uploaded file
	    if ($_FILES["file"]["error"] > 0) {
	        echo "<p>Error: " . $_FILES["file"]["error"] . "</p>";
	    } else {
	        // Open the file and display its contents as an HTML table
	        $filename = $_FILES["file"]["tmp_name"];
	        $handle = fopen($filename, "r");
	        if ($handle !== false) {
	            echo "<table>";
	            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
	                echo "<tr>";
	                foreach ($data as $value) {
	                    echo "<td>" . htmlspecialchars($value) . "</td>";
	                }
	                echo "</tr>";
	            }
	            echo "</table>";
	            fclose($handle);
	        } else {
	            echo "<p>Error: Unable to open file.</p>";
	        }
	    }
	}
	?>

</body>
</html>