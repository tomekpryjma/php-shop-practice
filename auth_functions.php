<?php

session_start();

function is_authed() {
    return isset($_SESSION['auth']);
}

function auth_check() {
    if (! is_authed()) {
        header('HTTP/1.0 403 Forbidden');
        echo "You must login to view this page.";
        exit();
    }
}

function logout() {
    if (is_authed()) {
        unset($_SESSION['auth']);
    }
    header('Location: /');
    exit();
}
