<?php

session_start();

include 'config.php';
include 'functions.php';
include 'strings.php';

$_SESSION['errors'] = [];
$email    = $_POST['email'];
$password = $_POST['password'];

// Email validation
if (! $email) {
    $_SESSION['errors']['email'] = 'email.missing';
}
if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors']['email'] = 'email.wrong_format';
}

// Password validation
if (! $password) {
    $_SESSION['errors']['password'] = 'password.missing';
}

// Pretend database check for credentials
if (empty($_SESSION['errors'])) {
    if ($config['test_user']['email'] !== $email || ! password_matches($password, $config['test_user'])) {
        $_SESSION['errors']['mismatch'] = 'credentials_mismatch';
    }
}


// Log in
if (empty($_SESSION['errors'])) {
    $_SESSION['auth'] = [
        'email' => $email,
    ];
}

session_commit();

// Redirect back
header('Location: /');
exit();
