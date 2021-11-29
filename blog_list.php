<?php
ob_start();
// include header.php file
include ('header.php');
?>

<section id="blogs">
    <div class="container py-4">
        <h4 class="blog-title font-rubik font-size-20">Latest Blogs</h4>
        <hr>

        <div class="owl-carousel owl-theme">
        <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Xiaomi Redmi Note 7</h5>
                    <img src="./assets/blog/blog-1.jpg" alt="cart image" class="card-img-top" width="100" height="150">
                    <p class="card-text font-size-14 text-black-50 py-1">Đánh giá nhanh Xiaomi Redmi Note 7: rất đáng tiền</p>
                    <a href="blog-1.php" class="color-second text-left">More details</a>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Samsung Galaxy S7</h5>
                    <img src="./assets/blog/blog-2.jpg" alt="cart image" class="card-img-top" width="100" height="150">
                    <p class="card-text font-size-14 text-black-50 py-1">Trên tay Samsung Galaxy S7: nhỏ gọn, rất mát và rất mạnh.</p>
                    <a href="blog-2.php" class="color-second text-left">More details</a>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Apple iPhone 7</h5>
                    <img src="./assets/blog/blog-3.jpg" alt="cart image" class="card-img-top" width="100" height="150">
                    <p class="card-text font-size-14 text-black-50 py-1">Trên tay iPhone 7 hồng 256GB: máy đẹp hơn, màn hình đẹp hơn, cam to hơn...</p>
                    <a href="blog-3.php" class="color-second text-left">More details</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// include footer.php file
include ('footer.php');
?>
