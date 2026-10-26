<?php

$privateKey = file_get_contents(__DIR__ . '/Certificates/private-key.pem');

$request = $_POST['request'] ?? '';

openssl_sign($request, $signature, $privateKey, OPENSSL_ALGO_SHA512);

echo base64_encode($signature);