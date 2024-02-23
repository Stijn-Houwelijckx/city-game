<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $groupname = $_POST["groupname"];

    try {
        require_once 'dbh.inc.php';
        require_once 'create_group_model.inc.php';
        require_once 'create_group_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($groupname)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        else if (is_groupname_invalid($groupname)) {
            $errors["invalid_groupname"] = "Invalid groupname!";
        }
        else if (is_groupname_too_short($groupname)) {
            $errors["groupname_short"] = "Groupname is too short! (min. 3 characters)";
        }
        else if (is_groupname_too_long($groupname)) {
            $errors["groupname_long"] = "Groupname is too long! (max. 50 characters)";
        }
        if (is_groupname_taken($pdo, $groupname)) {
            $errors["groupname_taken"] = "Groupname already taken!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_create_group"] = $errors;
            header("Location: ../createGroup.php");

            die();
        }

        create_group($pdo, $groupname);

        // =====

       $result = get_group($pdo, $groupname);

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["group_id"] = $result["id"];
        $_SESSION["group_groupname"] = htmlspecialchars($result["groupname"]);

        $_SESSION["last_regeneration"] = time(); 

        // =====

        header("Location: ../addFellows.php?create=success");

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

?>