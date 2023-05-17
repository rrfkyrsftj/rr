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

    $password_variations = [
        ucfirst($password),
        lcfirst($password),
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
        $password . '_',
        $password . '=',
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
        $password . '1990',
        $password . '1991',
        $password . '1992',
        $password . '654321',
        $password . 'pass',
        $password . 'word',
        $password . 'fucker',
        $password . 'fuckyou',
        $password . 'zxcvbnm',
        $password . 'abcdefg',
        $password . '123qwe',
        $password . 'qweasd',
        $password . 'qazwsx',
        $password . '1qaz2wsx',
        $password . '1q2w3e4r',
        $password . '1q2w3e',
        $password . '1q2w3',
        $password . '1q2w',
        $password . '1q',
        $password . '12q',
        $password . '123q',
        $password . '1234q',
        $password . '1998',
        $password . '1997',
        $password . '1996',
        $password . '1995',
        $password . '1994',
        $password . '1993',
        $password . 'fuckoff',
        $password . 'sunshine123',
        $password . 'iloveyou123",
    ];

    foreach ($domains as $domain) {
        if ($domain != $given_domain) {
            $combinations[] = $email_prefix . '@' . $domain . ':' . $password;
        }
    }

    foreach ($password_variations as $variation) {
        if ($variation !== $password) {
            foreach ($domains as $domain) {
                if ($domain != $given_domain) {
                    $combinations[] = $email_prefix . '@' . $domain . ':' . $variation;
                }
            }
        }

        for ($i = 0; $i <= strlen($variation); $i++) {
            foreach ($domains as $domain) {
                if ($domain != $given_domain) {
                    $new_email = $email_prefix . '@' . $domain;
                    $new_password = substr_replace($variation, 'abc123', $i, 0);
                    $combinations[] = $new_email . ':' . $new_password;
                }
            }
        }
    }

    return $combinations;
}

function save_combinations($combinations, $email_prefix) {
    $filename = $email_prefix . '_combinations.txt';
    $file_contents = implode("\n", $combinations);
    file_put_contents($filename, $file_contents);
}

$email_parts = explode('@', $email);
$email_prefix = $email_parts[0];
$given_domain = $email_parts[1];

$combinations = generate_combinations($email_prefix, $password, $domains, $given_domain);

save_combinations($combinations, $email_prefix);
?>