<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shopee</title>

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
    ?>

</head>
<body>
<!-- start #header -->
<header id="header">
    <div class="strip d-flex justify-content-end px-4 py-1 bg-light">
        <!-- <p class="font-rale font-size-12 text-black-50 m-0">Jordan Calderon 430-985 Eleifend St. Duluth Washington 92611 (427) 930-5255</p> -->
        <div style="display:flex" class="font-rale font-size-14">
          <div class="username px-3 border-right"></div>
          <button href="#" class="login px-3 border-right text-dark">Login</button>
          <button href="#" class="register px-3 border-right border-left text-dark">Sign up</button>
          <button href="#" class="logout px-3 border-right border-left text-dark">Logout</button>
          <!-- <a href="#"  class="px-3 border-right text-dark">Whishlist (0)</a> -->
        </div>
    </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="validator.js"></script>
<script src="process_form.js"></script>
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
                        var btnRegis = document.querySelector(".register");
                        var btnLogin = document.querySelector(".login");
                        var btnLogout = document.querySelector(".logout");
                        var btnUser = document.querySelector(".username");
                        btnRegis.classList.remove('visible');
                        btnLogin.classList.remove('visible');
                        btnRegis.classList.add('hide');
                        btnLogin.classList.add('hide');
                        btnLogout.classList.add('visible');
                        btnUser.innerText= data.fullname;
                       
                    }
                    else {
                      alert(data.alert);
                    }

                
                }
            });
              }
   
  });
});

</script>
    <!-- Primary Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="#">Mobile Shopee</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">
                <li class="nav-item active">
                    <a class="nav-link" href="#">On Sale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products <i class="fas fa-chevron-down"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Coming Soon</a>
                </li>
            </ul>
            <form action="#" class="font-size-14 font-rale">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
                </a>
            </form>
        </div>
    </nav>
    <!-- !Primary Navigation -->

</header>
<!-- !start #header -->
<!-- start #main-site -->
<main id="main-site">
