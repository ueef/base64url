<?php

namespace Ueef\Base64Url;

/**
 * @param $data
 * @return string
 */
function encode($data)
{
    return strtr(base64_encode($data), '+/', '-_');
}

/**
 * @param mixed $data
 * @return string
 */
function decode($data)
{
    return base64_decode(strtr($data, '-_', '+/'), false);
}