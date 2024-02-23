<?php

declare(strict_types=1);

function is_input_empty(string $groupname) {
    if (empty($groupname)) {
        return true;
    } else {
        return false;
    }
}

function is_groupname_taken(object $pdo, string $groupname) {
    if (get_groupname($pdo, $groupname)) {
        return true;
    } else {
        return false;
    }
}

function is_groupname_invalid(string $groupname) {
    $reValid = '/^(?!.*\s\s)[A-Za-z0-9-]+( [A-Za-z0-9-]+)*$/';

    if(!preg_match($reValid, $groupname)) {
        return true;
    } else {
        return false;
    }
}

function is_groupname_too_short(string $groupname) {
    if (strlen($groupname) < 3) {
        return true;
    } else {
        return false;
    }
}

function is_groupname_too_long(string $groupname) {
    if (strlen($groupname) > 50) {
        return true;
    } else {
        return false;
    }
}

function create_group(object $pdo, string $groupname) {
    set_group($pdo, $groupname);
}

?>