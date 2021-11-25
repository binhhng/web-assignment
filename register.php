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
    $email = $fullname = $password = $alert= $code= "";
    $email = $_POST["register-email"];
    $fullname = $_POST["fullname"];
    $password = $_POST["register-password"];
    $sql ="SELECT * FROM register WHERE EMAIL='$email'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    {
         $alert = "Email đã được sử dụng !!!"; 
    } 
    else {
      $sql = "INSERT INTO register (FULL_NAME, EMAIL, PASSWORD)
      VALUES ('$fullname','$email', '$password')";
              if ($con->query($sql) === TRUE) {
                  $alert = "Đăng ký thành công, đăng nhập ngay thôi nào !!!";
                  $code = '200';
              }else {
                 $alert = "Đăng ký thất bại: " . $con->error;
              } 
   }
echo json_encode(['code'=>$code,'fullname'=>$fullname,'password'=>$password, 'alert'=>$alert, 'email'=>$email]);
$con->close();
?>
