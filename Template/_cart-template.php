<!-- Shopping cart section  -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id']);
        }

        // save for later
        if (isset($_POST['wishlist-submit'])){
            $Cart->saveForLater($_POST['item_id']);
        }
    }
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
                    <form class="form" id="form-3">
                    <h3 class="heading">Điền thông tin khách hàng</h3>
                    <p class="desc">Đảm bảo dịch vụ tốt nhất ❤️</p>

                    <div class="spacer"></div>

                    <div class="form-group">
                    <label for="phone-number" class="form-label">Số điện thoại:</label>
                    <input class="form-control" type="tel" id="phone-number" name="phone-number" placeholder="VD:0359999999" pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input id="address" name="address" type="text" placeholder="Địa chỉ của bạn" class="form-control">
                        <span class="form-message"></span>
                    </div>
      
                    <button id= "buy-submit" type="submit" class="form-submit">Hoàn thành</button>
                    <button id= "btnCancel" type="submit" class="form-submit">Hủy</button>
                </form>
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 style="margin-top:50px" class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($product->getData('cart') as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                <input style="text-align:center" type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                            </form>


                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                            return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
            </div>
            
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        <button id="btn-buy" class=" btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
                
            </div>
            
            <script src="validator.js"></script>
            
            <script>
document.addEventListener('DOMContentLoaded', function () {
  


  Validator({
    form: '#form-3',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    rules: [
      Validator.isRequired('#address'),
      Validator.isRequired('#phone-number'),
    ],
    onSubmit: function (data) {
            var phoneNumber = data["phone-number"];
            var address = data["address"];
            var date = new Date();
            $.ajax({
                type: 'POST',
                url: 'process_buy.php',
                dataType: "json",
                data: { "phoneNumber": phoneNumber, "address": address, "date":date},
                success: function(data) {
                    //validating data output from server
                    if (data.code =='404') {
                        if (form_3.classList.contains('visible')) {
                            form_3.classList.remove('visible');
                        }
                        if (overlay.classList.contains('visible')) {
                            overlay.classList.remove('visible');
                        }
                    }
                    if (data.code == '200') {
                        $('#phone-number').val('');
                        $('#address').val('');
                        alert(data.alert);
                        if (form_3.classList.contains('visible')) {
                            form_3.classList.remove('visible');
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
});
var form_3 = document.querySelector("#form-3");
var btnBuy = document.querySelector("#btn-buy");
var btnCancel = document.querySelector("#btnCancel");
var overlay = document.querySelector(".overlay");
btnBuy.onclick = function() {
    form_3.classList.add('visible');
    overlay.classList.add('visible');
}
btnCancel.onclick = function() {
    form_3.classList.remove('visible');
    form_3.classList.add('hide');
    overlay.classList.remove('visible');
}
overlay.onclick = function() {
       if (form_3.classList.contains('visible')) {
            form_3.classList.remove('visible');
            form_3.classList.add('hide');
        };
        
        if (overlay.classList.contains('visible')) {
            overlay.classList.remove('visible');
        }
    }
            </script>

            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
    <script src="process_form.js"></script>
</section>
<!-- !Shopping cart section  -->
</body>
</html>
