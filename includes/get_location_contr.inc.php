<?php

declare(strict_types=1);

function has_question_progress(object $pdo, int $group_id) {
    if(get_question_progress($pdo, $group_id)) {
        return true;
    } else {
        return false;
    }
}

function is_question_answered(object $pdo, int $group_id) {
    if(get_question_answerd($pdo, $group_id)) {
        return true;
    } else {
        return false;
    }
}

function set_begin_question(object $pdo, int $group_id) {
    give_random_question($pdo, $group_id);
}

function set_next_question(object $pdo, int $group_id) {
    update_current_question($pdo, $group_id);
}

function answered_all_questions(object $pdo, int $group_id) {
    $result = get_question_count($pdo, $group_id);

    if ($result["answered_questions"] >= $result["total_questions"]) {
        return true;
    } else {
        return false;
    }
}

?>