<style>
/* Styles for the overall layout */
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        /* Styles for the form */
        form {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
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
            align-self: flex-end; /* Align button to the right */
        }

        /* Styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td input[type="text"] {
            width: 100%;
            padding: 5px;
            border: none;
        }

        /* Styles for actions column */
        .actions {
            white-space: nowrap;
        }

        .actions a {
            margin-right: 5px;
            padding: 2px 6px;
            text-decoration: none;
            background-color: #f2f2f2;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
        }

        .actions a:hover {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }
</style>
<!DOCTYPE html>
<html>
<head>
    <title>Timetable System</title>
</head>
<body>
    <h1>Timetable</h1>
    <form action="process.php" method="post">
        <label for="id">Id:</label>
        <input type="text" name="id"><br>
        <label for="day">Day:</label>
        <input type="text" name="day"><br>
        <label for="time">Time:</label>
        <input type="text" name="time"><br>
        <label for="subject">Subject:</label>
        <input type="text" name="subject"><br>
        <label for="teacher">Teacher:</label>
        <input type="text" name="teacher"><br>
        <input type="submit" value="Add">
    </form>

    <h2>Existing Timetable</h2>
    <table>
        <tr>
            <th>id</th>
            <th>Day</th>
            <th>Time</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Actions</th>
        </tr>
        <?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "perfomance";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM timetable";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['day']}</td>";
    echo "<td>{$row['time']}</td>";
    echo "<td>{$row['subject']}</td>";
    echo "<td>{$row['teacher']}</td>";
    echo "<td><a href='update.php?id={$row['id']}'>Update</a> | <a href='delete.php?id={$row['id']}'>Delete</a></td>";
    echo "</tr>";
}

mysqli_close($connection);
        
        
        ?>
    </table>
</body>
</html>
