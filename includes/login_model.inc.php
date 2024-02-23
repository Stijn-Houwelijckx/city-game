<?php

declare(strict_types=1);

function get_group(object $pdo, string $groupname) {
    $query = "SELECT * FROM fellow_group WHERE groupname = :groupname;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":groupname", $groupname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

?>