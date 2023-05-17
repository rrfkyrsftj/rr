
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		nav {
			background-color: #333;
			color: #fff;
			display: flex;
			flex-direction: row;
			align-items: center;
			padding: 10px;
		}

		nav a {
			color: #fff;
			text-decoration: none;
			font-size: 18px;
			margin-right: 20px;
			padding: 10px;
		}

		nav a:hover {
			background-color: #555;
		}

		form {
			display: flex;
			flex-direction: row;
			align-items: center;
			margin-left: auto;
			margin-right: 20px;
		}

		input[type="text"] {
			border: none;
			background-color: #444;
			color: #fff;
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			box-shadow: 2px 2px #000;
			margin-right: 10px;
		}

		input[type="submit"] {
			background-color: #04c2c9;
			color: #fff;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
			box-shadow: 2px 2px #000;
		}

		input[type="submit"]:hover {
			background-color: #048ba8;
		}
	</style>
</head>
<body>
	<nav>
		<a href="#" onclick="window.history.back(); return false;">Back</a>
		<form method="get">
			<input type="text" name="search" placeholder="Search...">
			<input type="submit" value="Go">
		</form>
	</nav>


	<?php
	if (isset($_GET["search"])) {
	    // Get the search query from the URL parameter
	    $query = $_GET["search"];

	    // Search for the query within the page content and highlight it
	    $content = ob_get_clean();
	    $highlighted = preg_replace("/\b($query)\b/i", "<mark>$1</mark>", $content);
	    echo $highlighted;
	} else {
	    // Display the original page content
	    echo $content;
	}
	?>
</body>

		table {
			border-collapse: collapse;
			width: 100%;
			max-width: 800px;
			margin: auto;
			margin-top: 20px;
			margin-bottom: 20px;
		}
	th, td {
		padding: 10px;
		text-align: left;
		vertical-align: top;
		border: 1px solid #ccc;
	}
	
	th {
		background-color: #f2f2f2;
		font-weight: bold;
	}

	h1 {
		text-align: center;
		margin-top: 40px;
		margin-bottom: 20px;
	}

	form {
		display: flex;
		flex-direction: row;
		align-items: center;
		margin: auto;
		max-width: 600px;
		margin-top: 20px;
		margin-bottom: 20px;
	}

	label {
		margin-right: 10px;
		font-weight: bold;
		font-size: 16px;
		width: 80px;
	}

	input[type="text"] {
		flex-grow: 1;
		margin-right: 10px;
		font-size: 16px;
	}

	input[type="submit"] {
		font-size: 16px;
		padding: 10px 20px;
		background-color: #4CAF50;
		color: white;
		border: none;
		border-radius: 5px;
		cursor: pointer;
	}

	input[type="submit"]:hover {
		background-color: #3e8e41;
	}
</style>

</head>
<body>
	<h1>CSV Viewer</h1>
<form method="post">
	<label for="filename">CSV file name (including extension):</label>
	<input type="text" name="filename" id="filename" value="data.csv">
	<input type="submit" name="submit" value="View">
</form><?php
if (isset($_POST["submit"])) {
    // Get the filename from the form input field
    $filename = $_POST["filename"];

    // Create the full path to the CSV file
    $folder = "csv-files/";
    $file = $folder . $filename;

    // Check if the file exists
    if (!file_exists($file)) {
        die("File not found.");
    }

    // Open the file for reading
    $handle = fopen($file, "r");

    // Start a table to display the data
    echo "<table>";

    // Loop through each row of the CSV file and print the data as a table row
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo "<tr>";
        foreach ($data as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }

    // Close the table
    echo "</table>";

    // Close the file handle
    fclose($handle);
}
?>

</body>
</html>