<?php
// Connect database
// MySQL host
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

if(!empty($_GET["str"])){
    $q = $_GET["str"];
    $hint = '';
    $sql = "SELECT * FROM product";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()){ 
        if (stristr($row['item_name'],$q)){
            if ($hint==""){
                $hint="<a href='" . 'product.php?item_id='. $row['item_id']. "' target='_blank'>". $row['item_name'] ."</a>";
            } 
            else {
                $hint=$hint . "<br /><a href='" . 'product.php?item_id='. $row['item_id']. "' target='_blank'>" .$row['item_name']."</a>";
            }
        }
    }
}
if ($hint=="") {
    $response= "no suggestion";
} 
else {
    $response=$hint;
}

//output the response
echo json_encode(['hint'=>$hint]);
// close connection
$con->close();
?>

