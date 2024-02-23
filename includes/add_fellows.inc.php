<?php
require_once 'config_session.inc.php';

if (isset($_SESSION["group_id"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fellow_names = $_POST["fellow"];
    
        try {
            require_once 'dbh.inc.php';
            require_once 'add_fellows_model.inc.php';
            require_once 'add_fellows_contr.inc.php';
    
            // ERROR HANDLERS
            $errors = [];
    
            if (is_input_empty($fellow_names)) {
                $errors["empty_input"] = "Fill in all fields!";
            } else if (is_fellowname_invalid($fellow_names)) {
                $errors["invalid_name"] = "Use valid names!";
            } else if (is_fellowname_too_short($fellow_names)) {
                $errors["fellowname_short"] = "Fellowname is too short! (min. 3 characters)";
            } else if (is_fellowname_too_long($fellow_names)) {
                $errors["fellowname_long"] = "Fellowname is too long! (max. 255 characters)";
            }
            
            if ($errors) {
                $_SESSION["errors_add_fellows"] = $errors;
                header("Location: ../addFellows.php");
    
                die();
            }

            create_fellows($pdo, $fellow_names);

            $_SESSION["source"] = "previous_page"; // Set the source session
    
            header("Location: get_location.inc.php?fellowsCreated=success");
    
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