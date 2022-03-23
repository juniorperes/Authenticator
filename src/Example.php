<?php

namespace Authenticator;


class Example
{
    public static function test() {
        $ga = new Authenticator();
        $secret = $ga->createSecret();
        echo "Secret is: ".$secret."\n\n";
        echo '<hr>';
        $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
        echo 'Google Charts URL for the QR-Code: <img src="'.$qrCodeUrl.'">';
        echo '<hr>';
        $oneCode = $ga->getCode($secret);
        echo "Checking Code '$oneCode' and Secret '$secret':\n";
        echo '<hr>';
        $checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
        if($checkResult) {
            echo 'OK';
        } else {
            echo 'FAILED';
        }
    }
}