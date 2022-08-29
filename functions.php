<?php

include_once 'config.php';
include_once 'strings.php';

/**
 * Retrieves error message based on index.
 * Allows for dot notation.
 * 
 * @param string $index
 * @return mixed
 */
function get_validation_error($key) {
    global $strings;

    if (! $key) {
        return '';
    }

    $indexes = explode('.', $key);
    $indexes_count = count($indexes);
    $array_current = $strings['errors'];

    if ($indexes_count === 1) {
        if (! isset($array_current[$key])) {
            return null;
        }
        elseif (is_array($array_current[$key])) {
            return '';
        }
        else {
            return $array_current[$key];
        }
    }

    $last_index = $indexes[$indexes_count - 1];

    foreach ($indexes as $index) {
        if (! isset($array_current[$index])) {
            return '';
        }

        if ($index !== $last_index) {
            $array_current = $array_current[$index];

            if (! is_array($array_current)) {
                return null;
            }

            continue;
        } else {
            return $array_current[$index];
        }
    }
}

/**
 * Checks whether the supplied password matches
 * the one in the "database".
 * 
 * @param string $password
 * @param array $existing_credentials
 * @return bool
 */
function password_matches($password, $existing_credentials) {
    global $config;

    return hash($config['hash_algo'], $password) === $existing_credentials['password'];
}
