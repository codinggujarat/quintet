<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<h1
    style=" margin-top: 100px;  text-align: center;font-weight: 400;color: #000;  font-family: 'Raleway',sans-serif ;  ">
    SHOES'S</h1>
<style>
.productslider {
    width: 300px !important;
    margin-top: 10px;
}
</style>

<div class="swiper mySwiper2 ">
    <div class="swiper-wrapper ">
        <?php
        $ret = mysqli_query($con, "SELECT * FROM products WHERE category=10 and subcategory=21 ORDER BY RAND()  ");
        while ($row = mysqli_fetch_array($ret)) {
            # code...
        ?>

        <div class="swiper-slide">
            <div class="productslider ">
                <div class="product-image" style="border-radius: 10px !important ;">
                    <div class="image" style="background:transparent !important;width: 300px; height: 100%; ">
                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                            <img src=" admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                width=" 100%" height="100%" alt="" style="border-radius: 10px !important ;"></a>
                    </div><!-- /.image -->


                </div><!-- /.product-image -->


                <div class="product-info text-left"
                    style="width:250px !important; margin-top:5px !important;padding: 0 !important;">
                    <h3 class="name" style="text-align: center;"><a
                            style="text-align: center; background: transparent !important ; font-family:'Raleway',sans-serif
                                                !important;font-size:11px;font-weight:700 !important ; text-transform: uppercase; color: #000; "
                            href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                    </h3>

                    <div class=" product-price" style="margin-top: -10px; text-align: center;">
                        <span class="price" style="color:#333;font-family: sans-serif, ' Poppins'
                                                !important;font-weight:500;font-size: 13px; ">
                            &#8377;&nbsp;<?php echo htmlentities($row['productPrice']); ?>.00
                        </span>
                    </div><!-- /.product-price -->
                </div><!-- /.product-info -->

            </div><!-- /.product -->
        </div>
        <?php } ?>
        <!-- </div> -->
        <!-- <div class="swiper-pagination"></div> -->
    </div>
</div>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->

<script>
var swiper = new Swiper(".mySwiper2", {
    slidesPerView: 3,
    spaceBetween: 0,
    loop: true,
    fade: "true",
    grabCursor: "true",
    freeMode: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        700: {
            slidesPerView: 2,
        },
        868: {
            slidesPerView: 2,
        },
        1400: {
            slidesPerView: 4,
        },
    },
});
</script>