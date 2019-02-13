<!DOCTYPE html>
<html>
    <head>
        <title>Test page</title>
    </head>
    <body>
        <form action="Register.php" method="post">
            Card ID:<input type="text" name="CardID" ><br>
            Student Number:<input type="text" name="StudentID" value="D" autofocus><br>
            Student Name: <input type="text" name="StudentName"><br>
            Class: <input type="text" name="Class"><br>
            <input type="submit" name="submit" value="Submit">
            <input type="hidden" value="$previous" />
        </form>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "i-Attendance";

            //Create connection
            $conn = new mysqli($servername,$username,$password,$dbname);

            //Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            //Check if Student Info are inserted or not
            if (!empty($_POST["StudentID"]) && !empty($_POST["CardID"]) && !empty($_POST["StudentName"]) && !empty($_POST["Class"])) {
                //If everything is inserted
                $StudentID = $_POST["StudentID"];
                $CardID = $_POST["CardID"];
                $StudentName = $_POST["StudentName"];
                $Class = $_POST["Class"];
    
                $sql = "INSERT INTO student_info (Student_Name, Student_ID, Card_ID, Class) VALUES ('$StudentName','$StudentID','$CardID','$Class')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                    $_POST = array();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                //If something is not inserted
                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
            }

mysqli_close($conn);
?>
    </body>
</html>
