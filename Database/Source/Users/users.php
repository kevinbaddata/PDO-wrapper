<?php


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

function logged_in()
{
    return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username)
{
    $username = sanitize($username);
    return (DB::GetRowCount('users', "username = '$username'")) ? true : false;
}

function email_exists($email)
{
    $email = sanitize($email);
    return (DB::GetRowCount('users', "email = '$email'")) ? true : false;
}

function user_active($username)
{
    $username = sanitize($username);
    return (DB::GetRowCount('users', "username = '$username' AND active = 1")) ? true : false;
}

function user_id_from_username($username)
{
    $username = sanitize($username);
    return DB::Select('users', "username = '$username'", 'id');
}


function csrfTokenGenerator()
{
    $token = base64_encode(openssl_random_pseudo_bytes(32));
    $_SESSION['csrf_token'] = $token;
    return $token;
}

function csrf_token_is_valid()
{
    $token = $_POST['csrf_token'] ?? '';
    if ($token === $_SESSION['csrf_token']) {
        unset($_SESSION['csrf_token']);
        return true;
        echo 'true';
    }
    return false;
}

function csrf_token_tag()
{
    return '<input type="hidden" name="csrf_token" value="' . csrfTokenGenerator() . '">';
}

echo csrf_token_is_valid();


?>



