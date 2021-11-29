<?php
    ob_start();
    // include header.php file
    include ('header_admin.php');
?>


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
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
   
   <title>Document</title>
</head>
<body>
   <center><h1>Xin chào Admin!!!</h1></center>
   <div class="container-fluid">
   <center><h2>Bảng Feedbacks</h2></center>
   <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="col-2"scope="col">Mail</th>
      <th class="col-8">Nội dung</th>
      <th class="col-2">Xóa</th>
    </tr>
  </thead>
  <tbody>
  <?php
//define new data variables
    
    $sql ="SELECT * FROM feedbacks";;
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    
   while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['email'] . "</td><td>" . $row['content'] ."</td><td>".'<a href="delete.php?value=feedbacks&id='. $row['Id'].'">Delete</a>'."</td></tr>";
  }
    
// $con->close();
?>
  </tbody>
</table>

<center><h2>Bảng Users</h2></center>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="col-1"scope="col">Id</th>
      <th class="col-3" scope="col">Họ Tên</th>
      <th class="col-4" scope="col">Email</th>
      <th class="col-3" scope="col">Pass word</th>
      <th class="col-3">Xóa</th>
    </tr>
  </thead>
  <tbody>
  <?php
//define new data variables
    
    $sql ="SELECT * FROM register";
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    
   while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['FULL_NAME'] . "</td><td>". $row['EMAIL'] . "</td><td>". $row['PASS_WORD'] . 
      "</td><td>".'<a href="delete.php?value=register&id='. $row['ID'].'">Delete</a>'."</td></tr>";
  }
    
// $con->close();
?>
  </tbody>
</table>

<center><h2>Bảng Orders</h2></center>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="col-1"scope="col">Id</th>
      <th class="col-1" scope="col">Họ tên</th>
      <th class="col-2" scope="col">Email</th>
      <th class="col-1" scope="col">Item_id</th>
      <th class="col-1" scope="col">Số lượng</th>
      <th class="col-1" scope="col">Sđt</th>
      <th class="col-2" scope="col">Địa chỉ</th>
      <th class="col-2" scope="col">Ngày mua</th>
      <th class="col-1">Xóa</th>
    </tr>
  </thead>
  <tbody>
  <?php
//define new data variables
    
    $sql ="SELECT * FROM orders";;
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    
   while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['Id'] . "</td><td>" . $row['fullname'] . "</td><td>". $row['email'] . "</td><td>". $row['item_id'] . "</td><td>". $row['so_luong'] . "</td><td>". $row['phone_number'] . "</td><td>". $row['diachi'] . "</td><td>". $row['ngay_mua'] . 
      "</td><td>".'<a href="delete.php?value=orders&id='. $row['Id'].'">Delete</a>'."</td><td>";
  }
    
$con->close();
?>
  </tbody>
</table>

</div>

</body>
</html>

