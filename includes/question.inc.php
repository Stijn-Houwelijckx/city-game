<?php

require_once 'config_session.inc.php';

if (isset($_SESSION["group_id"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $answer_value = $_POST["answer"];

        try {
            require_once 'dbh.inc.php';
            require_once 'question_model.inc.php';
            require_once 'question_contr.inc.php';

            if (is_question_answered($pdo, $_SESSION["group_id"])) {
                header("Location: get_location.inc.php");

                die();
            }

            // ERROR HANDLERS
            $errors = [];

            if (is_input_empty($answer_value)) {
                $errors["empty_input"] = "Choose an answer!";
            }

            if ($errors) {
                $_SESSION["errors_answer_input"] = $errors;
                header("Location: ../question.php");

                die();
            }

            save_answer($pdo, $_SESSION["group_id"], $answer_value);

            if(is_wrong_answer($pdo, $_SESSION["group_id"], $answer_value)) {
                $result = give_right_answer($pdo, $_SESSION["group_id"]);

                $_SESSION["right_answer"] = "Wrong! The right answer is: " . htmlspecialchars($result["answer_text"]);
            } else {
                $_SESSION["right_answer"] = "Correct answer! Welldone";
            }

            // unset($_SESSION["question_text"]);
            // unset($_SESSION["question_id"]);

            // unset($_SESSION["answer1"]);
            // unset($_SESSION["answer2"]);
            // unset($_SESSION["answer3"]);

            // unset($_SESSION["location_found"]);

            // header("Location: get_location.inc.php?answer=success");
            header("Location: ../answer.php?answer=given");

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