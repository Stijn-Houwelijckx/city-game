<?php

declare(strict_types=1);

function get_groupname(object $pdo, string $groupname) {
    $query = "SELECT groupname FROM fellow_group WHERE groupname = :groupname;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":groupname", $groupname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function set_group(object $pdo, string $groupname) {
    $query = "INSERT INTO fellow_group (groupname) VALUES (:groupname);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":groupname", $groupname);
    $stmt->execute();
}

function get_group(object $pdo, string $groupname) {
    $query = "SELECT * FROM fellow_group WHERE groupname = :groupname;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":groupname", $groupname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

?>