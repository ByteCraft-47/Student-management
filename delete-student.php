<?php

$conn = mysqli_connect("localhost","root","","r_app");

$id = $_GET['id'];

$sql = "DELETE FROM student_data WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location: index.php");
    exit();
}
else
{
    echo "Delete Failed";
}

?>