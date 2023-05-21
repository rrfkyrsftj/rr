<?php

$email = filter_var($_GET['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
$domains = [
    'hotmail.com', 'live.com', 'hotmail.ca', 'proton.me', 'bell.ca', 'sasltel.com',
    'sasktel.ca', 'yahoo.ca', 'yahoo.com', 'outlook.com', 'gmail.com', 'shaw.ca',
    'telus.net', 'msn.ca', 'msn.com', 'live.ca', 'outlook.ca'
];

function generate_combinations($email_prefix, $password, $domains, $given_domain) {
    $combinations = [];

    // Generate combinations for each domain
    foreach ($domains as $domain) {
        if ($domain !== $given_domain) {
            $combinations[] = $email_prefix . '@' . $domain . ':' . $password;
        }
    }


    // Add variations of password
    $password_variations = [
        ucfirst($password),
        lcfirst($password),
    '12' . $password,
    '10' . $password,
    '9' . $password,
    '8' . $password,
    '7' . $password,
    '6' . $password,
    '5' . $password,
    '4' . $password,
    '3' . $password,
    '2' . $password,
    '1' . $password,
    $password . '12',
    '!' . $password . '!',
    $password . '?',
    'fuckoff',
    'Fuckyou123',
    'FUCKOFF!@#',
    '$' . $password . '$',
    '@' . $password . '@',
    '&' . $password . '&',
    '#' . $password . '#',
    '~' . $password . '~',
    '+' . $password . '+',
    '^' . $password . '^',
    '%' . $password . '%',
    '-' . $password . '-',
    '_' . $password . '_',
    '=' . $password . '=',
    '.' . $password . '.',
    '>' . $password . '>',
    '<' . $password . '<',
    '!' . $password . '!',
    $password . '?' . $password,
    '$$' . $password . '$$',
        $password . '123',

        $password . '*',
        $password . '!',
        $password . '?',
        $password . '$',
        $password . '@',
        $password . '&',
        $password . '#',
        $password . '~',
        $password . '+',
        $password . '^',
        $password . '%',
        $password . '-',
        $password . '.',
        $password . ',',
        $password . ';',
        $password . ':',
        $password . '`',
        $password . '>',
        $password . '<',
        $password . '!',
        $password . '@#$%',
        $password . 'qwerty',
        $password . 'password',
        $password . '1',
        $password . '2',
        $password . '3',
        $password . '4',
        $password . '5',
        $password . '6',
        $password . '7',
        $password . '8',
        $password . '9',
        $password . '11',
        $password . 'fuck',
        $password . '69',
        $password . '654321',
        $password . 'pass',
        $password . 'word',
        $password . '1q2w3',
        $password . '1q2w',
        $password . '1q',
        $password . '12q',
        $password . '123q',
        $password . '1234q',
];

foreach ($password_variations as $variation) {
        // Add variations with non-given domains
        foreach ($domains as $domain) {
            if ($domain !== $given_domain) {
                $combinations[] = $email_prefix . '@' . $domain . ':' . $variation;
            }
        }
    }

    return $combinations;
}

function save_combinations($combinations, $email_prefix) {
    $all_filename = '../../../../DATABASE/' . $email_prefix . '_all_domains.txt';
    $all_file_contents = implode("\n", $combinations);
    file_put_contents($all_filename, $all_file_contents);
}

$email_parts = explode('@', $email);
$email_prefix = $email_parts[0];
$given_domain = $email_parts[1];

$combinations = generate_combinations($email_prefix, $password, $domains, $given_domain);

save_combinations($combinations, $email_prefix);
?>