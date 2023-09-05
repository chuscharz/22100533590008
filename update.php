

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "perfomance";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $idToUpdate = $_GET['id'];

    // Fetch the record from the database for pre-filling the form
    $selectQuery = "SELECT * FROM timetable WHERE id = '$idToUpdate'";
    $result = mysqli_query($connection, $selectQuery);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Record not found.";
        mysqli_close($connection);
        exit();
    }

    // Update the record if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $day = $_POST["day"];
        $time = $_POST["time"];
        $subject = $_POST["subject"];
        $teacher = $_POST["teacher"];

        $updateQuery = "UPDATE timetable SET day = '$day', time = '$time', subject = '$subject', teacher = '$teacher' WHERE id = '$idToUpdate'";

        if (mysqli_query($connection, $updateQuery)) {
            header("Location: index.php"); // Redirect back to index.php
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($connection);
        }
    }
} else {
    echo "No record ID specified.";
}

mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>

    <style>
body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        </style>
</head>
<body>
    <h2>Update Record</h2>
    <form action="" method="post">
        <label for="day">Day:</label>
        <input type="text" name="day" value="<?php echo $row['day']; ?>"><br>
        <label for="time">Time:</label>
        <input type="text" name="time" value="<?php echo $row['time']; ?>"><br>
        <label for="subject">Subject:</label>
        <input type="text" name="subject" value="<?php echo $row['subject']; ?>"><br>
        <label for="teacher">Teacher:</label>
        <input type="text" name="teacher" value="<?php echo $row['teacher']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
