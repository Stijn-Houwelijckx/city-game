<?php

declare(strict_types=1);

function get_question_progress(object $pdo, int $group_id) {
    $query = "SELECT id FROM group_progress WHERE group_id = :fellow_group_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_question_location(object $pdo, int $group_id) {
    $query = "  SELECT question_location.latitude, question_location.longitude, question_location.image_url
                FROM question_location, group_progress, question
                WHERE group_progress.group_id = :fellow_group_id
                AND group_progress.current_question_id = question.id
                AND question_location.question_id = question.id;";

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

function give_random_question(object $pdo, int $group_id) {
    $query = "  INSERT INTO group_progress (group_id, current_question_id)
                SELECT :fellow_group_id, question.id
                FROM question
                ORDER BY RAND()
                LIMIT 1;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();
}

function update_current_question(object $pdo, int $group_id) {
    $query = "  UPDATE group_progress
                SET current_question_id = (
                    SELECT IFNULL(
                        (SELECT MIN(id)
                        FROM question
                        WHERE id > group_progress.current_question_id),
                        (SELECT MIN(id)
                        FROM question)
                    )
                )
                WHERE group_id = :fellow_group_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();
}

function get_question_count(object $pdo, int $group_id) {
    $query = "  SELECT
                    (
                        SELECT COUNT(answer_id)
                        FROM group_answer
                        WHERE group_id = :fellow_group_id
                    ) AS answered_questions,
                    (
                        SELECT COUNT(id)
                        FROM question
                    ) AS total_questions;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $group_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

?>