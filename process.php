<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "perfomance";

$connection = new mysqli($host, $username , $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST["id"];
$day = $_POST["day"];
$time = $_POST["time"];
$subject = $_POST["subject"];
$teacher = $_POST["teacher"];

$query = "INSERT INTO timetable (id, day, time, subject, teacher) VALUES ('$id', '$day', '$time', '$subject', '$teacher')";

if (mysqli_query($connection, $query)) {
    // Store the inserted data in a session variable
    session_start();
    $_SESSION['inserted_data'] = [
        'id' => $id,
        'day' => $day,
        'time' => $time,
        'subject' => $subject,
        'teacher' => $teacher
    ];
    
    // Redirect back to index.php
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
