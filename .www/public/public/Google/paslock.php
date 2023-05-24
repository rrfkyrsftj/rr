<?php
function edit_combos($combos) {
    $edited = array();
    clear_console();
    ascii_art();
    echo "    [" . $cyan . "Please Wait, Editing Combos" . $reset . "]" . PHP_EOL;
    $acc = 0;
    foreach ($combos as $combo) {
        $acc += 1;
        echo "    [" . $cyan . intval(($acc/count($combos))*100) . "%" . $reset . "]\r";
        if (!strpos($combo, ":")) {
            continue;
        }
        list($email, $password) = explode(":", $combo, 2);
        if (!$email || !$password) {
            continue;
        }

        $passwords = array();
        $passwords[] = $password;
        $passwords[] = ucfirst($password);
        $passwords[] = lcfirst($password);
        $passwords[] = ucfirst($password)."1";
        $passwords[] = ucfirst($password)."12";
        $passwords[] = ucfirst($password)."123";
        $passwords[] = ucfirst($password)."1234";
        $passwords[] = ucfirst($password)."12345";
        $passwords[] = ucfirst($password)."*";
        $passwords[] = ucfirst($password)."!";
        $passwords[] = ucfirst($password)."?";
        $passwords[] = ucfirst($password)."@";
        $passwords[] = lcfirst($password)."1";
        $passwords[] = lcfirst($password)."12";
        $passwords[] = lcfirst($password)."123";
        $passwords[] = lcfirst($password)."1234";
        $passwords[] = lcfirst($password)."12345";
        $passwords[] = lcfirst($password)."*";
        $passwords[] = lcfirst($password)."!";
        $passwords[] = lcfirst($password)."?";
        $passwords[] = lcfirst($password)."@";
        $passwords[] = $password."1";
        $passwords[] = $password."12";
        $passwords[] = $password."123";
        $passwords[] = $password."1234";
        $passwords[] = $password."12345";
        $passwords[] = $password."00";
        $passwords[] = $password."*";
        $passwords[] = $password."$";
        $passwords[] = $password."1!";
        $passwords[] = $password."?";
        $passwords[] = $password."!@";
        $passwords[] = $password."!@#";
        $passwords[] = $password."*$@";
        $passwords[] = $password."*$@";
        $passwords[] = $password."%&*";
        $passwords[] = $password."$#@!";
        $passwords[] = "1".$password;
        $passwords[] = "12".$password;
        $passwords[] = "123".$password;
        $passwords[] = "1234".$password;
        $passwords[] = "12345".$password;

        // Add characters to the beginning and middle of the password
        foreach ($passwords as $password) {
            for ($i = 0; $i < strlen($password); $i++) {
                // Add characters to the beginning of the password
                $new_password = "abc123" . substr_replace($password, "", $i, 0);
                $edited[] = $email . ":" . $new_password;

                // Add characters in the middle of the password
                for ($j = 0; $j < 10; $j++) {
                    $new_password = substr_replace($password, "abc123", $i, 0);
                    $edited[] = $email . ":" . $new_password;
                }
            }
        }
    }
    
    // Save the edited combos to a text file named combo.txt
    $output_file = 'combo.txt';
    $output_data = implode("\n",array_unique($edited));
    file_put_contents($output_file, $output_data);
}
?>