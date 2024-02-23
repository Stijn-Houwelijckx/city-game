<?php

declare(strict_types=1);

function is_input_empty($input_answer) {
    if (empty($input_answer)) {
        return true;
    } else {
        return false;
    }
}

function is_wrong_answer(object $pdo, int $group_id, $input_answer) {
    $result = get_right_answer($pdo, $group_id);
    
    if (strcmp($input_answer, $result["answer_text"])) {
        return true;
    } else {
        return false;
    }
}

function give_right_answer(object $pdo, int $group_id) {
    $result = get_right_answer($pdo, $group_id);

    return $result;
}

function is_question_answered(object $pdo, int $group_id) {
    if(get_question_answerd($pdo, $group_id)) {
        return true;
    } else {
        return false;
    }
}

?>