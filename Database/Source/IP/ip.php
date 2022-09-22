<?php
// Path: IP/ip.php
// Compare this snippet from Users/users.php:


function FNV1($str)
{
    $fnv_prime = 0x811C9DC5;
    $hash = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $hash ^= ord($str[$i]);
        $hash *= $fnv_prime;
    }
    return $hash;
}

function GetIP()
{
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }
}

function ip_banned($ip)
{
    $ip = sanitize($ip);
    return (DB::GetRowCount('banned_ips', "ip = '$ip'")) ? true : false;
}

function ip_exists($ip)
{
    $ip = sanitize($ip);
    return (DB::GetRowCount('ip', "ip = '$ip'")) ? true : false;
}





?>