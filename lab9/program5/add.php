<?php

include "db.php";


$name =
    trim($_POST['name'] ?? '');

$roll =
    trim($_POST['roll'] ?? '');

$course =
    trim($_POST['course'] ?? '');

$semester =
    (int)($_POST['semester'] ?? 0);


if (
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
        "INSERT INTO students
        (name, roll, course, semester)
        VALUES (?, ?, ?, ?)"
    );


$stmt->bind_param(
    "sssi",
    $name,
    $roll,
    $course,
    $semester
);


if ($stmt->execute())
{

    echo
        "<span style='color:green'>" .
        "Student added successfully." .
        "</span>";

}
else
{

    echo
        "<span style='color:red'>" .
        "Error adding student." .
        "</span>";

}

?>
