<?php

declare(strict_types=1);

function check_code_input_errors() {
    if (isset($_SESSION['errors_code_input'])) {
        $errors = $_SESSION['errors_code_input'];

        foreach ($errors as $error) {
            // echo '<br>';
            echo $error;
        }

        unset($_SESSION['errors_code_input']);
    }
}

?>