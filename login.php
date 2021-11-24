<?php
//start sesstion
session_start();
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
    $email= $password = $alert= $code= $fullname="";
    $email = $_POST["login-email"];
    $password = $_POST["login-password"];
    $sql ="SELECT FULL_NAME FROM register WHERE EMAIL='$email' AND PASS_WORD='$password'";
    $result = $con->query($sql);

if ($result->num_rows > 0) 
{
   $alert = "Đăng nhập thành công !!!";
   $code = '200';
   while($row = $result->fetch_assoc()) {
      $_SESSION["email"] = $email;
      $_SESSION["fullname"] =$fullname= $row["FULL_NAME"];

  }
} 
else {
   $alert = "Đăng nhập thất bại !!!";
}
echo json_encode(['code'=>$code,'password'=>$password, 'fullname'=>$fullname, 'alert'=>$alert, 'email'=>$email]);
$con->close();
?>
