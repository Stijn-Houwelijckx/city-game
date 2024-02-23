<?php

declare(strict_types=1);

function show_location_lat() {
    if(isset($_SESSION["location_lat"])) {
        echo $_SESSION["location_lat"];
    } else {
        echo "error lat";
    }
}

function show_location_lon() {
    if(isset($_SESSION["location_lon"])) {
        echo $_SESSION["location_lon"];
    } else {
        echo "error lon";
    }
}

?>