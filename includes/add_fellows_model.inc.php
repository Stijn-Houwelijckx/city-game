<?php

declare(strict_types=1);

function set_fellow(object $pdo, string $fellow_name) {
    $query = "INSERT INTO fellow (fellow_group_id, full_name) VALUES (:fellow_group_id, :fellow);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":fellow_group_id", $_SESSION["group_id"]);
    $stmt->bindParam(":fellow", $fellow_name);
    $stmt->execute();
}

?>