<?php 
  session_start();
  $_SESSION=array();
  session_destroy();
  $code = '200';
  $alert="Đăng xuất thành công";
  echo json_encode(['code'=>$code,'alert'=>$alert ]);
  header("Refresh:0");
?>