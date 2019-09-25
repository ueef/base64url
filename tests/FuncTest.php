<?php

use Ueef\Base64Url;
use PHPUnit\Framework\TestCase;

class FuncTest extends TestCase
{
    public function testEncode()
    {
        $randomValue = openssl_random_pseudo_bytes(1024);

        $encodedValue = Base64Url\encode($randomValue);
        $encodedValue = strtr($encodedValue, '-_', '+/');
        $exceptedEncodedValue = base64_encode($randomValue);

        $this->assertEquals($exceptedEncodedValue, $encodedValue);
        $this->assertEquals($randomValue, base64_decode($encodedValue));
    }

    public function testDecode()
    {
        $randomValue = openssl_random_pseudo_bytes(1024);

        $encodedValue = base64_encode($randomValue);
        $encodedValue = strtr($encodedValue, '+/', '-_');
        $decodedValue = Base64Url\decode($encodedValue);

        $this->assertEquals($randomValue, $decodedValue);
    }
}