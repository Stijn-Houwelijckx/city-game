<?php

require_once 'config_session.inc.php';

if (isset($_SESSION["group_id"])) {
    if (isset($_SESSION["finished"])) {
        $answer_value = $_POST["answer"];

        try {
            require_once 'dbh.inc.php';
            require_once 'finish_model.inc.php';
            require_once 'finish_contr.inc.php';

            // unset($_SESSION["question_text"]);
            // unset($_SESSION["question_id"]);

            // unset($_SESSION["answer1"]);
            // unset($_SESSION["answer2"]);
            // unset($_SESSION["answer3"]);

            // unset($_SESSION["location_found"]);

            $result = get_question_count($pdo, $_SESSION["group_id"]);

            $_SESSION["total_question_count"] = $result["total_question_count"];

            $result = get_right_answer_count($pdo, $_SESSION["group_id"]);

            $_SESSION["right_answer_count"] = $result["right_answer_count"];

            header("Location: ../finish.php?finish=success");

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