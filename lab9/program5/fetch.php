<?php

include "db.php";


$result =
    $conn->query(
        "SELECT * FROM students
         ORDER BY id DESC"
    );


if ($result->num_rows == 0)
{

    echo "No students found.";

    exit;

}


echo "<table border='1'>";


echo
    "<tr>

        <th>ID</th>

        <th>Name</th>

        <th>Roll</th>

        <th>Course</th>

        <th>Semester</th>

        <th>Action</th>

    </tr>";


while (
    $row =
    $result->fetch_assoc()
)
{

    $id =
        (int)$row['id'];


    $name =
        htmlspecialchars(
            $row['name'],
            ENT_QUOTES
        );


    $roll =
        htmlspecialchars(
            $row['roll'],
            ENT_QUOTES
        );


    $course =
        htmlspecialchars(
            $row['course'],
            ENT_QUOTES
        );


    $semester =
        (int)$row['semester'];


    echo "<tr>";


    echo "<td>$id</td>";

    echo "<td>$name</td>";

    echo "<td>$roll</td>";

    echo "<td>$course</td>";

    echo "<td>$semester</td>";


    echo "<td>";


    echo
        "<button
            class='updateBtn'
            data-id='$id'
            data-name='$name'
            data-roll='$roll'
            data-course='$course'
            data-semester='$semester'
        >
            Update
        </button>";


    echo
        "<button
            class='deleteBtn'
            data-id='$id'
        >
            Delete
        </button>";


    echo "</td>";


    echo "</tr>";

}


echo "</table>";

?>