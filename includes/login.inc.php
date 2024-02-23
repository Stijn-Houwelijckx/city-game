<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $groupname = $_POST["groupname"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($groupname)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        
        $result = get_group($pdo, $groupname);

        if (group_not_found($result) && !is_input_empty($groupname)) {
            $errors["group_incorrect"] = "Group does not exist!";
        }
        
        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../login.php");

            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["group_id"] = $result["id"];
        $_SESSION["group_groupname"] = htmlspecialchars($result["groupname"]);

        $_SESSION["last_regeneration"] = time();

        $_SESSION["source"] = "previous_page"; // Set the source session

        header("Location: get_location.inc.php?login=success");

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