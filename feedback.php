<?php
// Connect database
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'username';
// MySQL password
$mysql_password = 'password';
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
$email = $emailErr = $content = $code = $alert= "";

if (empty($_POST["email"])){
    $emailErr = "Please type your email first";
    $code = '404';
}
else{
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    else{
        $content = empty($_POST['content'])? "":$_POST['content'];
        if ($content){
            $sql = "INSERT INTO feedbacks (email, content)
                VALUES ('$email', '$content')";
            if ($con->query($sql) === TRUE) {
                $alert = "Your feedback has been sent";
                $code = '200';
            } 
            else {
                $alert = "Error sending feedback: " . $con->error;
            }
        }
    }
}

echo json_encode(['code'=>$code,'emailErr'=>$emailErr, 'alert'=>$alert, 'email'=>$email]);
$con->close();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
