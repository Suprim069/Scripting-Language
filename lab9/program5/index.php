<!DOCTYPE html>

<html>

<head>

    <title>
        Student Management System
    </title>

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js">
    </script>

</head>

<body>

    <h2>
        Student Management System
    </h2>

    <h3>
        Add Student
    </h3>

    <form id="studentForm">

        <input
            type="text"
            id="name"
            placeholder="Name"
            value="Suprim Maharjan"
            required
        >

        <br><br>

        <input
            type="text"
            id="roll"
            placeholder="Roll Number"
            required
        >

        <br><br>

        <input
            type="text"
            id="course"
            placeholder="Course"
            value="BCA"
            required
        >

        <br><br>

        <input
            type="number"
            id="semester"
            placeholder="Semester"
            value="4"
            required
        >

        <br><br>

        <button type="submit">
            Add Student
        </button>

    </form>

    <br>

    <div id="message"></div>

    <hr>

    <h3>
        Search Student
    </h3>

    <input
        type="text"
        id="search"
        placeholder="Search by name"
    >

    <h3>
        Student List
    </h3>

    <div id="studentTable"></div>

    <script>

        $(document).ready(
            function()
            {

                loadStudents();


                $("#studentForm").submit(
                    function(event)
                    {

                        event.preventDefault();


                        $.ajax(
                        {

                            url: "add.php",

                            type: "POST",

                            data:
                            {
                                name:
                                    $("#name").val(),

                                roll:
                                    $("#roll").val(),

                                course:
                                    $("#course").val(),

                                semester:
                                    $("#semester").val()
                            },


                            success:
                            function(response)
                            {

                                $("#message")
                                .html(response);

                                loadStudents();

                            }

                        });

                    }
                );


                $("#search").keyup(
                    function()
                    {

                        let name =
                            $(this).val();


                        if (name == "")
                        {

                            loadStudents();

                            return;

                        }


                        $.ajax(
                        {

                            url: "search.php",

                            type: "POST",

                            data:
                            {
                                name: name
                            },


                            success:
                            function(response)
                            {

                                $("#studentTable")
                                .html(response);

                            }

                        });

                    }
                );


                function loadStudents()
                {

                    $.ajax(
                    {

                        url: "fetch.php",

                        type: "GET",


                        success:
                        function(response)
                        {

                            $("#studentTable")
                            .html(response);

                        }

                    });

                }


                $(document).on(
                    "click",
                    ".deleteBtn",
                    function()
                    {

                        let id =
                            $(this).data("id");


                        if (
                            confirm(
                                "Are you sure you want to delete this student?"
                            )
                        )
                        {

                            $.ajax(
                            {

                                url: "delete.php",

                                type: "POST",

                                data:
                                {
                                    id: id
                                },


                                success:
                                function(response)
                                {

                                    $("#message")
                                    .html(response);

                                    loadStudents();

                                }

                            });

                        }

                    }
                );


                $(document).on(
                    "click",
                    ".updateBtn",
                    function()
                    {

                        let id =
                            $(this).data("id");


                        let name =
                            prompt(
                                "Enter new name:",
                                $(this).data("name")
                            );


                        if (name === null)
                            return;


                        let roll =
                            prompt(
                                "Enter new roll number:",
                                $(this).data("roll")
                            );


                        if (roll === null)
                            return;


                        let course =
                            prompt(
                                "Enter new course:",
                                $(this).data("course")
                            );


                        if (course === null)
                            return;


                        let semester =
                            prompt(
                                "Enter new semester:",
                                $(this).data("semester")
                            );


                        if (semester === null)
                            return;


                        $.ajax(
                        {

                            url: "update.php",

                            type: "POST",

                            data:
                            {
                                id: id,

                                name: name,

                                roll: roll,

                                course: course,

                                semester: semester
                            },


                            success:
                            function(response)
                            {

                                $("#message")
                                .html(response);

                                loadStudents();

                            }

                        });

                    }
                );

            }
        );

    </script>

</body>

</html>