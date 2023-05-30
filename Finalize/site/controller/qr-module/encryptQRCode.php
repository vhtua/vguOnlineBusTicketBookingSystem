<?php
  function encrypt($message, $encryption_key){
    $ciphering = "BF-CBC";
    $options = 0;
    $encryption_iv = "vgucse20";

    return openssl_encrypt($message, $ciphering, $encryption_key, $options, $encryption_iv);
  }
  function decrypt($message, $decryption_key){
    $ciphering = "BF-CBC";
    $options = 0;
    $decryption_iv = "vgucse20";

    return openssl_decrypt($message, $ciphering, $decryption_key, $options, $decryption_iv);

  }
?>