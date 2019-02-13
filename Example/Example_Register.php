<!-- Example code of how Register.php works -->
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
    
    $sql = "INSERT INTO Student_Info (Student_Name, Student_ID, Card_ID, Class) VALUES ('$StudentName','$StudentID','$CardID','$Class')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
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