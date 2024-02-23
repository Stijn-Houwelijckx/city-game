<?php

declare(strict_types=1);

function is_input_empty(string $input_code) {
    if (empty($input_code)) {
        return true;
    } else {
        return false;
    }
}

function is_code_invalid(string $input_code) {
    $reValid = '/^[0-9]+$/';

    if(!preg_match($reValid, $input_code)) {
        return true;
    } else {
        return false;
    }
}

function is_code_wrong(string $question_code, string $input_code) {
    if(strcmp($question_code, $input_code)) {
        return true;
    } else {
        return false;
    }
}

?>