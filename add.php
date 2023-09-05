<?php
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$id = $_POST['id'];

//creating a connection 
$conn = new mysqli("localhost","root","","students");

//checking if connection was initiated successfully
if($conn){
 
}
else {
    echo "your connection was interrupted";
}

$query = "insert into students_details values('".$id."','".$name."','".$email."','".$age."')";
$result = $conn->query($query);

if($result){
    echo "data inserted successfull";
} else {
    echo " <br>There was a problem with data insertion";
}

?>