<?php

$conn = new mysqli(
    "localhost",
    "root",
    "Suprim@3349",
    "student_db"
);

if ($conn->connect_error)
{

    die(
        "Database connection failed: " .
        $conn->connect_error
    );

}

?>