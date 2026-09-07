<?php

$name =
    trim($_POST['name'] ?? '');

$email =
    trim($_POST['email'] ?? '');

$phone =
    trim($_POST['phone'] ?? '');

$password =
    $_POST['password'] ?? '';


if (
    $name == '' ||
    $email == '' ||
    $phone == '' ||
    $password == ''
)
{

    echo
        "<span style='color:red'>" .
        "All fields are required." .
        "</span>";

    exit;

}


if (
    !filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )
)
{

    echo
        "<span style='color:red'>" .
        "Invalid email address." .
        "</span>";

    exit;

}


if (
    !preg_match(
        '/^[0-9]{10}$/',
        $phone
    )
)
{

    echo
        "<span style='color:red'>" .
        "Invalid phone number." .
        "</span>";

    exit;

}


if (
    strlen($password) < 6
)
{

    echo
        "<span style='color:red'>" .
        "Password must contain at least 6 characters." .
        "</span>";

    exit;

}


echo
    "<span style='color:green'>" .
    "Registration successful!" .
    "</span>";

?>