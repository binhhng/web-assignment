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
$sql = "DELETE FROM cart";
  if ($con->query($sql) === TRUE) {
    $alert = "Table deleted successfully";
    $code = '1';
} 
  else {
    $alert = "Error deleting table: " . $con->error;
}
  session_start();
  $_SESSION=array();
  session_destroy();
  $code = '200';
  $alert="Đăng xuất thành công";
  echo json_encode(['code'=>$code,'alert'=>$alert ]);
  // header("Refresh:0");

?>