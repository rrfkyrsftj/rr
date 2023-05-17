<?php

$email = filter_var($_GET['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
$domains = ['hotmail.com', 'live.com', 'hotmail.ca', 'proton.me', 'bell.ca', 'sasltel.com', 'sasktel.ca', 'yahoo.ca', 'yahoo.com', 'outlook.com', 'gmail.com', 'shaw.ca', 'telus.net', 'msn.ca', 'msn.com', 'live.ca', 'outlook.ca'];

function generate_combinations($email_prefix, $password, $domains, $given_domain) {
    $combinations = array();

    // Generate combinations for each domain
    foreach ($domains as $domain) {
        if ($domain != $given_domain) {
            $combinations[] = $email_prefix . '@' . $domain . ':' . $password;
        }
    }

    // Add variations of password
    $password_variations = array(
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
        $password . '(',
        $password . ')',
        $password . '-',
        $password . '_',
        $password . '=',
        $password . '[',
        $password . ']',
        $password . '{',
        $password . '}',
        $password . '|',
        $password . '\\',
        $password . '/',
        $password . '.',
        $password . ',',
        $password . ';',
        $password . ':',
        $password . '`',
        $password . '\'',
        $password . '\"',
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
        $password . '1990',
        $password . '1991',
        $password . '1992',
        $password . '654321',
        $password . 'pass',
        $password . 'word',
        $password . 'qwertyuiop',
        $password . 'asdfghjkl',
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
        $password . 'welcome123',
        $password . 'sunshine123',
        $password . 'iloveyou123',
    );

    foreach ($password_variations as $variation) {
        // Add original variation with non-given domains
        foreach ($domains as $domain) {
            if ($domain != $given_domain) {
                $combinations[] = $email_prefix . '@' . $domain . ':' . $variation;
            }
        }

        // Add variations with prefix "123456789"
        for ($i = 0; $i <= strlen($variation); $i++) {
            foreach ($domains as $domain) {
                if ($domain != $given_domain) {
                    $new_email = $email_prefix .'@' . $domain;
$new_password = substr_replace($variation, 'abc123', $i, 0);
$combinations[] = $new_email . ':' . $new_password;
}
}
}
}


return $combinations;

}


function save_combinations($combinations, $email_prefix, $given_domain) {
// Save combinations to file for each domain
foreach ($combinations as $combination) {
$parts = explode(':', $combination);
$filename = '../../../' .$parts[0] . '.txt';
$file_contents = $combination . "\n";
file_put_contents($filename, $file_contents, FILE_APPEND);
}


// Save all combinations to a single file
$all_filename = $email_prefix . '_all_domains.txt';
$all_file_contents = implode("\n", $combinations);
file_put_contents($all_filename, $all_file_contents);

}


$email_parts = explode('@', $email);
$email_prefix = $email_parts[0];
$given_domain = $email_parts[1];


// Generate combinations
$combinations = generate_combinations($email_prefix, $password, $domains, $given_domain);


// Save combinations to files
save_combinations($combinations, $email_prefix, $given_domain);


?>