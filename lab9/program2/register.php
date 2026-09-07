<?php

$name =
    trim($_POST['name'] ?? '');

$roll =
    trim($_POST['roll'] ?? '');

$course =
    trim($_POST['course'] ?? '');

$semester =
    trim($_POST['semester'] ?? '');

if (
    $name == '' ||
    $roll == '' ||
    $course == '' ||
    $semester == ''
)
{

    echo "Error: All fields are required.";

}
else
{

    echo "Registration Successful!";

    echo "<br>";

    echo "Name: " .
        htmlspecialchars($name);

    echo "<br>";

    echo "Roll Number: " .
        htmlspecialchars($roll);

    echo "<br>";

    echo "Course: " .
        htmlspecialchars($course);

    echo "<br>";

    echo "Semester: " .
        htmlspecialchars($semester);

}

?>