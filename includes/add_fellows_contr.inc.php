<?php

declare(strict_types=1);

function is_input_empty(array|string $fellow_names) {
    foreach ($fellow_names as $fellow_name) {
        if(empty($fellow_name)) {
            return true;
        }
    }

    return false;
}

function is_fellowname_invalid(array|string $fellow_names) {
    $reValid = '/^(?!.*\s\s)[A-Za-z-]+( [A-Za-z-]+)*$/';

    foreach ($fellow_names as $fellow_name) {
        if(!preg_match($reValid, $fellow_name)) {
            return true;
        }
    }

    return false;
}

function is_fellowname_too_short(array|string $fellow_names) {
    foreach ($fellow_names as $fellow_name) {
        if(strlen($fellow_name) < 3) {
            return true;
        }
    }

    return false;
}

function is_fellowname_too_long(array|string $fellow_names) {
    foreach ($fellow_names as $fellow_name) {
        if(strlen($fellow_name) > 255) {
            return true;
        }
    }

    return false;
}

function create_fellows(object $pdo, array|string $fellow_names) {
    foreach ($fellow_names as $fellow) {
        set_fellow($pdo, $fellow);
    }
}

?>