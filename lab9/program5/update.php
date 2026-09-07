<?php

include "db.php";


$id =
    (int)($_POST['id'] ?? 0);


$name =
    trim($_POST['name'] ?? '');


$roll =
    trim($_POST['roll'] ?? '');


$course =
    trim($_POST['course'] ?? '');


$semester =
    (int)($_POST['semester'] ?? 0);


if (
    $id < 1 ||
    $name == '' ||
    $roll == '' ||
    $course == '' ||
    $semester < 1
)
{

    echo
        "<span style='color:red'>" .
        "All fields are required." .
        "</span>";

    exit;

}


$stmt =
    $conn->prepare(
        "UPDATE students
         SET name = ?,
             roll = ?,
             course = ?,
             semester = ?
         WHERE id = ?"
    );


$stmt->bind_param(
    "sssii",
    $name,
    $roll,
    $course,
    $semester,
    $id
);


if ($stmt->execute())
{

    echo
        "<span style='color:green'>" .
        "Student updated successfully." .
        "</span>";

}
else
{

    echo
        "<span style='color:red'>" .
        "Error updating student." .
        "</span>";

}

?>