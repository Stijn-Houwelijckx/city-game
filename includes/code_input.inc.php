<?php

require_once 'config_session.inc.php';

if (isset($_SESSION["group_id"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $inputCode = $_POST["input_code"];

        try {
            require_once 'dbh.inc.php';
            require_once 'code_input_model.inc.php';
            require_once 'code_input_contr.inc.php';

            // ERROR HANDLERS
            $errors = [];

            if (is_input_empty($inputCode)) {
                $errors["empty_input"] = "Fill in all fields!";
            } else if (is_code_invalid($inputCode)) {
                $errors["invalid_code"] = "Only numbers allowed!";
            }
            
            $result = get_code_of_current_question($pdo, $_SESSION["group_id"]);

            if (is_code_wrong($result["code"], $inputCode) && !$errors) {
                $errors["group_incorrect"] = "Code does not match!";
            }

            if ($errors) {
                $_SESSION["errors_code_input"] = $errors;
                header("Location: ../codeInput.php");

                die();
            }

            $_SESSION["location_found"] = true; // Set the source session

            header("Location: get_question.inc.php?code=correct");

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