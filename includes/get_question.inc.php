<?php

require_once 'config_session.inc.php';

if (isset($_SESSION["group_id"])) {
    if (isset($_SESSION["location_found"])) {
        try {
            require_once 'dbh.inc.php';
            require_once 'get_question_model.inc.php';
            require_once 'get_question_contr.inc.php';

            $result = get_current_question($pdo, $_SESSION["group_id"]);

            $_SESSION["question_text"] = htmlspecialchars($result["question_text"]);
            $_SESSION["question_id"] = htmlspecialchars($result["id"]);
            
            $result = get_question_answers($pdo, $_SESSION["group_id"]);

            $_SESSION["answer1"] = htmlspecialchars($result[0]["answer_text"]);
            $_SESSION["answer2"] = htmlspecialchars($result[1]["answer_text"]);
            $_SESSION["answer3"] = htmlspecialchars($result[2]["answer_text"]);

            header("Location: ../question.php?retrieveQuestion=success");

            $pdo = null;
            $stmt = null;

            die();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        header("Location: ../index.php?error=noAccess");
        die();
    }  
} else {
    header("Location: ../index.php?error=notLoggedIn");
    die();
}

?>