<?php

declare(strict_types=1);

function check_code_input_errors() {
    if (isset($_SESSION['errors_answer_input'])) {
        $errors = $_SESSION['errors_answer_input'];

        foreach ($errors as $error) {
            // echo '<br>';
            echo $error;
        }

        unset($_SESSION['errors_answer_input']);
    }
}

// function show_right_answer() {
//     if (isset($_SESSION['right_answer'])) {

//         echo "<p>";
//         echo $_SESSION['right_answer'];
//         echo "</p>";

//         unset($_SESSION['right_answer']);
//     }
// }

// function show_answer() {
//     if(isset($_SESSION["answered_question"])) {
//         echo $_SESSION["answered_question"];
//     } else {
//         echo "error answer";
//     }
// }

?>