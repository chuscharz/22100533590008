<?php
//creating a connection 
$conn = new mysqli("localhost","root","","students");

//checking if connection was initiated successfully
if($conn){
 
}
else {
    echo "your connection was interrupted";
}


$query1 = "select * from students_details";
$result1 = $conn->query($query1);

$num_results = $result1->num_rows;


if ( $num_results > 0) {
    echo '<style>';
    echo 'table { border-collapse: collapse; width: 100%; margin-top: 20px; }';
    echo 'th, td { padding: 10px; text-align: center; }';
    echo 'th { background-color: #3498db; color: white; }';
    echo 'tr:nth-child(even) { background-color: #f2f2f2; }';
    echo 'tr:hover { background-color: #e0e0e0; }';
    echo '</style>';

    echo '<table>';
    echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th></tr>';

    for ($i = 0; $i < $num_results; $i++) {
        $row = $result1->fetch_assoc();
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "<br>No students found in the database.";
}

?>


<form action="updating.php" method="post">
<table>
<tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th></tr>
<tr>
    <td><input type="number" placeholder = "id" name = "id"></td>
    <td><input type="text" placeholder = "name" name = "name"></td>
    <td><input type="email" placeholder="email" name = "email"></td>
    <td><input type="number" placeholder="age" name = "age"></td>
   
</tr>

</table>
<br>
<center><input type="submit" class="button" value="ADD A STUDENT TO DATABASE"></center>

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
 if(isset($id) || isset($name) || isset($email) || isset($age) ){
        echo "Fill in all the provided spaces accurately";    
 } else{

$query = "insert into students_details values('".$id."','".$name."','".$email."','".$age."')";
$result = $conn->query($query);
 }

?>
</form>

<style>
input{
    border-top: none;
    border-bottom: 1px solid black;
    border-right: none;
    border-left: none;
    outline: none;
    background: transparent;
    font-family: verdana;
    text-align: center;
    font-weight: bolder;
}
.button{
    background: lightblue;
    padding: 20px;
    font-family: Times New Roman;
    font-size: 20px;
    border: none;
    border-radius: 20px;
    

}

.button:hover{
    background: orangered;
    transition-duration: 1s;
}
    </style>

