<?php

$config = [
    'hash_algo' => 'sha256',
    'test_user' => [
        'email' => 'user@example.com',
        'password' => hash('sha256', 'secret'),
    ]
];
