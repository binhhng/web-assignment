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
?>

<?php
//define new data variables
    $email= $password = $alert= $code= "";
    $email = $_POST["login-email"];
    $password = $_POST["login-password"];
    $sql ="SELECT * FROM register WHERE EMAIL='$email' AND PASS_WORD='$password'";
    $result = $con->query($sql);

if ($result->num_rows > 0) 
{
   $alert = "Đăng nhập thành công !!!";
   $code = '200';
    
} 
else {
   $alert = "Đăng nhập thất bại !!!";
}
echo json_encode(['code'=>$code,'password'=>$password, 'alert'=>$alert, 'email'=>$email]);
$con->close();
?>
