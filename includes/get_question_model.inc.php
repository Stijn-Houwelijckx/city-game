<?php

declare(strict_types=1);

function get_current_question(object $pdo, int $group_id) {
    $query = "  SELECT question.question_text, question.id
                FROM question, group_progress
                WHERE group_progress.group_id = :fellow_group_id
                AND group_progress.current_question_id = question.id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_question_answers(object $pdo, int $group_id) {
    $query = "  SELECT answer.answer_text, answer.id
                FROM answer, group_progress
                WHERE group_progress.group_id = :fellow_group_id
                AND answer.question_id = group_progress.current_question_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    return $result;
}

?>