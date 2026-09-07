<?php

include "db.php";


$name =
    trim($_POST['name'] ?? '');


$stmt =
    $conn->prepare(
        "SELECT * FROM students
         WHERE name LIKE ?
         ORDER BY id DESC"
    );


$search =
    "%" . $name . "%";


$stmt->bind_param(
    "s",
    $search
);


$stmt->execute();


$result =
    $stmt->get_result();


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


    $studentName =
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

    echo "<td>$studentName</td>";

    echo "<td>$roll</td>";

    echo "<td>$course</td>";

    echo "<td>$semester</td>";


    echo "<td>";


    echo
        "<button
            class='updateBtn'
            data-id='$id'
            data-name='$studentName'
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