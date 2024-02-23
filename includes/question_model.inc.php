<?php

declare(strict_types=1);

function save_answer(object $pdo, int $group_id, string $answer_value) {
    $query = "  INSERT INTO group_answer (group_id, answer_id)
                SELECT :fellow_group_id, answer.id
                FROM answer
                WHERE answer.answer_text = :answer_text;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->bindParam(":answer_text", $answer_value);
    $stmt->execute();
}

// function get_question_answers(object $pdo, int $group_id) {
//     $query = "  SELECT *
//                 FROM answer, group_progress
//                 WHERE group_progress.group_id = :fellow_group_id
//                 AND answer.question_id = group_progress.current_question_id;";

//     $stmt = $pdo->prepare($query);
//     $stmt->bindParam(":fellow_group_id", $group_id);
//     $stmt->execute();

//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
//     return $result;
// }

function get_right_answer(object $pdo, int $group_id) {
    $query = "  SELECT answer.answer_text
                FROM answer, group_progress
                WHERE group_progress.group_id = :fellow_group_id
                AND answer.question_id = group_progress.current_question_id
                AND answer.is_correct = 1;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $result;
}

function get_question_answerd(object $pdo, int $group_id) {
    $query = "  SELECT question.id
                FROM question, group_progress, group_answer, answer
                WHERE group_progress.group_id = :fellow_group_id
                AND group_answer.group_id = :fellow_group_id
                AND group_progress.current_question_id = question.id
                AND group_answer.answer_id = answer.id
                AND answer.question_id = question.id
                ORDER BY group_answer.id DESC
                LIMIT 1;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

?>