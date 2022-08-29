<?php

include_once __DIR__ . '/../auth_functions.php';
include_once __DIR__ . '/../functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header style="padding: 15px; background-color: lightgrey;">
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <?php if (is_authed()): ?>
            <li>
                <a href="/logout.php">Logout</a>
            </li>
        <?php endif; ?>
    </ul>
</header>
