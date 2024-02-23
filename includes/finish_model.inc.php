<?php

declare(strict_types=1);

function get_question_count(object $pdo, int $group_id) {
    $query = "  SELECT COUNT(id) AS total_question_count
                FROM question;";

    $stmt = $pdo->prepare($query);
    // $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_right_answer_count(object $pdo, int $group_id) {
    $query = "  SELECT COUNT(group_answer.id) AS right_answer_count
                FROM group_answer, answer
                WHERE group_answer.group_id = :fellow_group_id
                AND answer.id = group_answer.answer_id
                AND answer.is_correct = 1;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

?>