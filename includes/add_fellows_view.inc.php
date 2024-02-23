<?php

declare(strict_types=1);

function check_add_fellows_errors() {
    if (isset($_SESSION['errors_add_fellows'])) {
        $errors = $_SESSION['errors_add_fellows'];

        foreach ($errors as $error) {
            // echo '<br>';
            echo $error;
        }

        unset($_SESSION['errors_add_fellows']);
    }
}

?>