<?php

include "db.php";


$id =
    (int)($_POST['id'] ?? 0);


if ($id < 1)
{

    echo
        "<span style='color:red'>" .
        "Invalid student ID." .
        "</span>";

    exit;

}


$stmt =
    $conn->prepare(
        "DELETE FROM students
         WHERE id = ?"
    );


$stmt->bind_param(
    "i",
    $id
);


if ($stmt->execute())
{

    echo
        "<span style='color:green'>" .
        "Student deleted successfully." .
        "</span>";

}
else
{

    echo
        "<span style='color:red'>" .
        "Error deleting student." .
        "</span>";

}

?>