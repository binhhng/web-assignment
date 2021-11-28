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
    $email = $fullname = $item_id= $phoneNumber =$num =$address = $alert= $code= "";
    if(!empty($_SESSION)){
      $email = $_SESSION["email"];
      $fullname = $_SESSION["fullname"];
      $address = $_POST["address"];
      $phoneNumber = $_POST["phoneNumber"];
      $date = $_POST["date"]; 
      $q ="SELECT item_id FROM cart";
      $result = $con->query($q);
       while($row = $result->fetch_assoc()) {
               $item_id= $item_id.$row["item_id"].",";
       }
      $sql = "INSERT INTO orders (fullname, email,item_id, so_luong, phone_number,diachi,ngay_mua)
        VALUES ('$fullname','$email','$item_id','$num' ,'$phoneNumber','$address','$date')";
                if ($con->query($sql) === TRUE) {
                    $alert = "Đặt mua thành công !!!";
                    $code = '200';
                }else {
                   $alert = "Đặt mua thất bại: " . $con->error;
                } 
     
    }
    else {
      $alert = "Đặt mua thất bại, bạn chưa đăng nhập!!!";
      $code = '404';
    }
    
echo json_encode(['code'=>$code ,'alert'=>$alert]);
$con->close();
?>
