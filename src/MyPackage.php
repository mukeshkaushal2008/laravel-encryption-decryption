<?php

namespace MyVendor\MyPackage;

class MyPackage
{
    // Build wonderful things
    public function encrypt($string, $action = 'e')
    {
        // you may change these values to your own
        $secret_key = 'APPLICATION-SALT-KEY';
        $secret_iv = 'APPLICATION-SALT-SECRET';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else if ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    public function decrypt($string, $action = 'd')
    {
        // you may change these values to your own
        $secret_key = 'APPLICATION-SALT-KEY';
        $secret_iv = 'APPLICATION-SALT-SECRET';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else if ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}