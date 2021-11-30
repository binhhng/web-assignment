<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content=" initial-scale=1, maximum-scale=1, minimum-scale=1, width=320, height=device-height, target-densitydpi=medium-dpi" />
    <title>Shopee</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    <?php
    // require functions.php file
    require ('functions.php');
    session_start();
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
</head>
<body>
<!-- start #header -->
<header id="header" >
    <div class="overlay "></div>
    <form class="form " id="form-1">
      <h3 class="heading">Đăng ký thành viên</h3>
      <p class="desc">Mua sắm thả ga tại Mobile Shopee ❤️</p>

      <div class="spacer"></div>

      <div class="form-group">
        <label for="fullname" class="form-label">Tên đầy đủ</label>
        <input id="fullname" name="fullname" type="text" placeholder="VD: Vũ Phan" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="register-email" class="form-label">Email</label>
        <input id="register-email" name="register-email" type="text" placeholder="VD: email@domain.com" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="register-password" class="form-label">Mật khẩu</label>
        <input id="register-password" name="register-password" type="password" placeholder="Nhập mật khẩu" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
        <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
        <span class="form-message"></span>
      </div>

      <button id= "register-submit" type="submit" class="form-submit">Đăng ký</button>
    </form>

    <form class="form " id="form-2">
      <h3 class="heading">Đăng nhập</h3>
      <p class="desc">Mua sắm thả ga tại Mobile Shopee ❤️</p>

      <div class="spacer"></div>

      <div class="form-group">
        <label for="login-email" class="form-label">Email</label>
        <input id="login-email" name="login-email" type="text" placeholder="VD: email@domain.com" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="login-password" class="form-label">Mật khẩu</label>
        <input id="login-password" name="login-password" type="password" placeholder="Nhập mật khẩu" class="form-control">
        <span class="form-message"></span>
      </div>
      
      <button id= "login-submit" type="submit" class="form-submit">Đăng nhập</button>
    </form>
<!-- !Primary Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="index.php"><span><i class="fas fa-home"></i></span> Home Page</a>
        <form class="form-inline" id="search-form">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" onkeyup="showResult(this.value)" style="width: 200px;" id="search">
            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
          <div id="livesearch"></div>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik" id="menu-site">
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
                <li class="nav-item">
                <?php
                if(isset($_SESSION['fullname'])):?>
                  <a class="nav-link" href="cart.php">
                        Cart
                        <span class="px-3 py-2 rounded-pill text-dark bg-light" <?php if (!count($product->getData('cart'))) echo 'style="display:none;"';?> ><?php echo count($product->getData('cart')); ?></span>
                      </a>
                <?php else:?>
                <a href="#" class="nav-link" id="cartLogin">Cart</a>
                <?php endif; ?>
                    <!--<a class="nav-link" href="cart.php">
                      Cart
                      <span class="px-3 py-2 rounded-pill text-dark bg-light" <?php if (!count($product->getData('cart'))) echo 'style="display:none;"';?> ><?php echo count($product->getData('cart')); ?></span>
                    </a>-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog_list.php">Blogs</a>
                </li>
            </ul>
            
            <div class="username px-3 border-right"><?php if (isset($_SESSION['fullname'])) {
                                echo $_SESSION['fullname'];}
                                else {
                                  echo "";
                                }
            ?></div>
            <?php
            if(isset($_SESSION['fullname'])):?>

            <button href="#" class="logout btn btn-info"><i class="fas fa-sign-out-alt"style="margin-right: 2px;"></i>Logout</button>
            <?php    
            else:?>

            <button href="#" class="login btn btn-info"><i class="fas fa-sign-in-alt" style="margin-right: 2px;"></i>Login</button>
            <button href="#" class="register btn btn-info"><i class="fas fa-user"style="margin-right: 2px;"></i>Sign Up</button>

            <?php endif; ?>
            
            
        </div>
    </nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
  Validator({
    form: '#form-1',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    rules: [
      Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
      Validator.isRequired('#register-email'),
      Validator.isEmail('#register-email'),
      Validator.minLength('#register-password', 6),
      Validator.isRequired('#password_confirmation'),
      Validator.isConfirmed('#password_confirmation', function () {
        return document.querySelector('#form-1 #register-password').value;
      }, 'Mật khẩu nhập lại không chính xác')
    ],
    onSubmit: function (data) {
            
        var email = data["register-email"];
        var fullname = data["fullname"];
        var password = data["register-password"];
        $.ajax({
            type: 'POST',
            url: 'register.php',
            dataType: "json",
            data: { "register-email": email, "fullname": fullname, "register-password": password },
            success: function(data) {
                //validating data output from server
                if (data.code == '200') {
                    alert(data.alert);
                    $('#fullname').val('');
                    $('#register-email').val('');
                    $('#register-password').val('');
                    $('#password_confirmation').val('');
                    if (form_1.classList.contains('visible')) {
                        form_1.classList.remove('visible');
                    }
                    if (overlay.classList.contains('visible')) {
                        overlay.classList.remove('visible');
                    }
                }
                else {
                      alert(data.alert);
                    }

            }
        });
          }
    
  });


  Validator({
    form: '#form-2',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    rules: [
      Validator.isRequired('#login-email'),
      Validator.isEmail('#login-email'),
      Validator.minLength('#login-password', 6),
    ],
    onSubmit: function (data) {
            var email = data["login-email"];
            var password = data["login-password"];
            $.ajax({
                type: 'POST',
                url: 'login.php',
                dataType: "json",
                data: { "login-email": email, "login-password": password },
                success: function(data) {
                    //validating data output from server
                    if (data.code == '200') {
                        alert(data.alert);
                        $('#login-email').val('');
                        $('#login-password').val('');
                        if (form_2.classList.contains('visible')) {
                            form_2.classList.remove('visible');
                        }
                        if (overlay.classList.contains('visible')) {
                            overlay.classList.remove('visible');
                        }
                        if(data.admin==1)
                        {
                          window.location.href="/web-assignment/admin.php";
                        }
                        else {
                          window.location.reload();

                        }
                        
                    }
                    else {
                      alert(data.alert);
                    }

                
                }
            });
              }
  });
});
function showResult(str){
  var livesearch = document.getElementById("livesearch");
    if (str.length==0) {
      livesearch.innerHTML="";
      livesearch.style.border="0px";
      return;
    }
    $.ajax({
      type: 'GET',
      url: 'livesearch.php',
      dataType: 'json',
      data: {"str":str},
      success: function(data){
          livesearch.innerHTML=data.hint;
          livesearch.style.border="1px solid #A5ACB2";
      }
    });
  }
  var btnLogout = document.querySelector(".logout");
  if(btnLogout) {
    btnLogout.onclick = function() {
    $.ajax({
        type: 'POST',
        url: 'logout.php',
        dataType: "json",
        data: {},
        success: function(data) {
            //validating data output from server
            if (data.code == '200') {
                alert(data.alert);
                window.location.reload();

            }

        }
    });
  }
  }
  $("#search").bind("mouseover",function() {
    $("#livesearch").show();
  }).bind("mouseout",function() {
    $("#livesearch").hide();
  });

  $("#livesearch").bind("mouseover",function() {
    $("#livesearch").show();
  }).bind("mouseout",function() {
    $("#livesearch").hide();
  });

</script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="validator.js"></script>
<script src="process_form.js"></script>
</header>
<!-- !start #header -->
<!-- start #main-site -->
<main id="main-site">
