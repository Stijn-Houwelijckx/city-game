<?php

declare(strict_types=1);

function is_input_empty(string $groupname) {
    if (empty($groupname)) {
        return true;
    } else {
        return false;
    }
}

function group_not_found(bool|array $result) {
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

?>