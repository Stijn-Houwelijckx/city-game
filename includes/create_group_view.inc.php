<?php

declare(strict_types=1);

function check_create_group_errors() {
    if (isset($_SESSION['errors_create_group'])) {
        $errors = $_SESSION['errors_create_group'];

        foreach ($errors as $error) {
            // echo '<br>';
            echo $error;
        }

        unset($_SESSION['errors_create_group']);
    }
}

?>