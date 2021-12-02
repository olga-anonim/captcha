<?php

$f = 'text.txt';

if (isset($_POST['Quantity'])) {
    $forms_hash = $_POST['hash'];
    $handle = fopen($f, "r");
    while (!feof($handle)) {
        $buffer = fgets($handle);
        $res = explode(':', $buffer);
//        print_r($res);
        $hash = $res[0];
        //      print_r($hash);
        $type = $res [1];
        //    print_r($type);
        $kol = (int) $res[2];
        //  print_r($kol);
        if ($forms_hash == $hash) {print('good');
            var_dump($res[2]);
            if ($_POST['kol_figures']==$kol) {
                echo ('true');
            } else  print('false');
        }
    }
    fclose($handle);
}
