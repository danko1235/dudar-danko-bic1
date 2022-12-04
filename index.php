<?php

$mod = 1; // 1 for cipher, 2 for decipher
$text = 'mikhel';
$key = 'cz';

function vigenere($text, $prekey, $mod)
{
    $len=strlen($text);
    $res="";
    $key="";
    $prelen=strlen($prekey);

    for ($i=0; $i<$len;$i++) {
        $key .= $prekey[$i%$prelen];
    }

    if ($mod === 1) {
        for ($i=0; $i<$len; $i++) {
            $res .= chr((((ord($text[$i])-ord("a"))+(ord($key[$i])-ord("a")))%26)+ord("a"));
        }
    } elseif($mod === 2) {
        for ($i=0; $i<$len; $i++) {
            $res .= chr(mymod(ord($text[$i])-ord($key[$i]))+ord("a"));
        }
    }

    return $res;
}

function mymod($val) {
    return $val < 0 ? $val + 26: $val;
}

if ($mod === 1) {
    echo "Режим: шифрування" . "<br>\n";
    echo "Вихідне значення: " . $text . "<br>\n";
    echo "Зашифроване значення: " . vigenere($text, $key, $mod) . "<br>\n";
}

if ($mod === 2) {
    echo "Режим: дешифрування" . "<br>\n";
    echo "Зашифроване значення: " . $text . "<br>\n";
    echo "Розшифроване значення: " . vigenere($text, $key, $mod) . "<br>\n";
}

?>