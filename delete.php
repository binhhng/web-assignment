<?php

$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'shopee';

// Connect to MySQL server
$con = @new mysqli($mysql_host,$mysql_username,$mysql_password,$mysql_database);

// Check connection
if ($con->connect_error) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    echo "<br/>Error: " . $con->connect_error;
}

$id = $_GET['id']; // get id through query string
$value = $_GET['value'];
if ($value=="feedbacks") $del = mysqli_query($con,"delete from feedbacks where Id = '$id'"); // delete query
if ($value=="register") $del = mysqli_query($con,"delete from register where Id = '$id'"); // delete query
if ($value=="orders") $del = mysqli_query($con,"delete from orders where Id = '$id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:admin.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>