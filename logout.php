<?php 
  session_start();
  if(!empty($_SESSION))
  {
   session_destroy();
   $code = '200';
   $alert="Đăng xuất thành công";
   echo json_encode(['code'=>$code,'alert'=>$alert ]);
  }
?>