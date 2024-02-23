<?php

require_once 'config_session.inc.php';

if (isset($_SESSION["group_id"])) {
    if (isset($_SESSION["source"])) {
        try {
            require_once 'dbh.inc.php';
            require_once 'get_location_model.inc.php';
            require_once 'get_location_contr.inc.php';

            // =====

            unset($_SESSION["question_text"]);
            unset($_SESSION["question_id"]);

            unset($_SESSION["answer1"]);
            unset($_SESSION["answer2"]);
            unset($_SESSION["answer3"]);

            unset($_SESSION["location_found"]);

            // =====
            
            // require_once 'config_session.inc.php';

            if(answered_all_questions($pdo, $_SESSION["group_id"])) {
                $_SESSION["finished"] = "finished";

                header("Location: finish.inc.php?finish=success");

                $pdo = null;
                $stmt = null;

                die();
            }

            if (has_question_progress($pdo, $_SESSION["group_id"])) {
                if (is_question_answered($pdo, $_SESSION["group_id"])) {
                    set_next_question($pdo, $_SESSION["group_id"]);
                }
            }
            else {
                set_begin_question($pdo, $_SESSION["group_id"]);
            }

            $result = get_question_location($pdo, $_SESSION["group_id"]);

            $_SESSION["location_lat"] = htmlspecialchars($result["latitude"]);
            $_SESSION["location_lon"] = htmlspecialchars($result["longitude"]);
            $_SESSION["location_image"] = $result["image_url"];

            header("Location: ../codeInput.php?location=success");

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