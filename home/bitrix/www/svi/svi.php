<?php
//$key должен быть сгенерирован заранее криптографически безопасным образом
// например, с помощью openssl_random_pseudo_bytes
$key = "PasswordPassword";
echo '$key = '.$key.'<br>';
$plaintext = 'HwlloWorld';
$plaintext = base64_encode($plaintext);
echo '$plaintext = '.$plaintext.'<br>';
$ivlen = openssl_cipher_iv_length($cipher="AES-256-CBC");
//$iv = '1234567890123456';
//$iv = openssl_random_pseudo_bytes($ivlen);
$iv = hextobin('100, 49, 56, 99, 100, 48, 98, 97, 100, 48, 98, 48, 100, 48, 98, 97, 100, 48, 98, 48, 100, 49, 56, 102, 100, 49, 56, 50, 100, 48, 98, 101');
echo '$iv = '.$iv.'<br>';
echo '$iv = '.base64_encode($iv).'<br>';
$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA,$iv);
echo '$ciphertext_raw = '.$ciphertext_raw.'<br>';
$ciphertext = base64_encode($ciphertext_raw );
echo '$ciphertext = '.$ciphertext.'<br>';
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA,$iv);
echo '$original_plaintext = '.$original_plaintext.'<br>';
echo base64_decode($original_plaintext).'<br>';


        function hextobin($hexstr)
    {
        $n = strlen($hexstr);
        $sbin="";   
        $i=0;
        while($i<$n)
        {       
            $a =substr($hexstr,$i,2);           
            $c = pack("H*",$a);
            if ($i==0){$sbin=$c;}
            else {$sbin.=$c;}
            $i+=2;
        }
        return $sbin;
    }
?>