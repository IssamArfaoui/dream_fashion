
   
   <?php require_once "required/header.php"; ?>
   <title>Index</title>

   <!-- Start Landing  -->
       
   <section>
        <div class="sec-1">
            <div class="overlay">
                <div class="content">
                    <div class="text">
                        <h6>CASUAL & EVERYDAY</h6>
                        <h1>Effortlessly Blend Comfort & Style!</h1>
                        <p>Easily blend comfort and style with our collection, featuring cozy sweaters, versatile denim,</p>
                        <a href="products.php"><button>VIEW COLLECTION</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product p-4 mb-5">
            <h1 class="text-center pt-5 p-3 m-3">Products</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 m-2 ms-0 me-0">
                <?php
                    require_once "required/configue.php";

                    $select = "SELECT * FROM `products` LIMIT 4   ;";
                    $pdo = $connect ->query($select);
                    $user = $pdo ->fetchAll();

                    foreach($user as $value) {
                ?>
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <div class="popular text-center">
                        <div class="select">
                            <a href="cart.php?id=<?php echo $value['id'] ?>" class="cadr">
                                <img src="fileimage/<?php echo $value['image'] ?>" class="w-75  card-img-top" alt="">
                            </a>
                            <div class="bag_shopping">
                                <a href="cart.php?id=<?php echo $value['id'] ?>"><img src="images/shopping-bag.png" alt=""></a>
                            </div>
                        </div>
                        <div class="text p-2">
                            <span><?php echo $value['name'] ?></span>
                            <a href="cart.php?id=<?php echo $value['id'] ?>" class="m-1"><?php echo $value['title'] ?></a>
                            <span class='price fs-6'>$<?php echo $value['price'] ?></span>
                        </div>
                    </div>  
                </div>

                <?php }?>
            </div>
        </div>
        <div class="sec-2">
            <div class="overlay d-flex justify-content-center align-items-center">
                <div class="prd_man text-center row justify-content-center align-items-center ">
                    <div class="text-white z-1 p-1 col-12 col-xl-7 col-md-6 col-sm-6">
                        <h1 clss="text">The base collection - Ideal every day.</h1>
                        <a href="products.php"><button>Shop Now</button></a>
                    </div>
                    <div class="col col-12 col-xl-4 col-md-6 col-sm-5 text-center">
                        <?php
                        $select = "SELECT * FROM `products` ORDER BY RAND() LIMIT 1   ;";
                        $pdo = $connect ->query($select);
                        $user = $pdo ->fetchAll();

                        foreach($user as $value) {
                        ?>
                        <img src="fileimage/<?php echo $value['image'] ?>" class="w-75  card-img-top" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="sec-3">
            <div class="overlay d-flex justify-content-center align-items-center text-center">
                <div class="text">
                    <span class="text-white">
                    <h1> Be different in your own way! </h1>
                    <h2>Find your unique style.</h2>
                    </span>
                    <a href="products.php"><button class="m-3">View Collection</button></a>
                </div>
            </div>
        </div>
        <div class="sec-4">
            <div class="overlay d-flex justify-content-center align-items-center">
                <div class="prd_woman text-center row justify-content-center align-items-center">
                    <div class="col col-12 col-xl-4 col-md-6 col-sm-5 text-center">
                        <?php
                        $select = "SELECT * FROM `products` ORDER BY RAND() LIMIT 1   ;";
                        $pdo = $connect ->query($select);
                        $user = $pdo ->fetchAll();

                        foreach($user as $value) {
                        ?>
                        <img src="fileimage/<?php echo $value['image'] ?>" class="w-75  card-img-top" alt="">

                        <?php } ?>
                    </div>
                    <div class="text-white p-1 col-12 col-xl-7 col-md-6 col-sm-6">
                        <h1 clss="text-white">Explore Our Exquisite T-shirts Collection Now!</h1>
                        <a href="products.php"><button>Shop Now</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- start Newest -->

        <div class="product p-4 mb-5">
            <h1 class="text-center pt-5 p-3 m-3">Newest Products</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 m-2 ms-0 me-0">
                <?php
                    require_once "required/configue.php";
        
                    $select = "SELECT * FROM `products` ORDER BY `created` DESC LIMIT 4 ;";
                    $pdo = $connect ->query($select);
                    $user = $pdo ->fetchAll();
                    foreach($user as $value)  { 
                ?>
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <div class="popular text-center">
                        <div class="select">
                            <a href="cart.php?id=<?php echo $value['id'] ?>"  class="cadr">
                                <img src="fileimage/<?php echo $value['image'] ?>" class="w-75 card-img-top" alt="">
                            </a>
                            <div class="bag_shopping">
                                <a href="cart.php?id=<?php echo $value['id'] ?>" ><img src="images/shopping-bag.png" alt=""></a>
                            </div>
                        </div>
                        <div class="text p-2">
                            <span><?php echo $value['name'] ?></span>
                            <a href="cart.php?id=<?php echo $value['id'] ?>"  class="m-1"><?php echo $value['title'] ?></a>
                        </div>
                    </div>                  
                </div>
                <?php } ?>
            </div>
        </div>
    <!-- End Newest  -->
        
        <div class="sec-5">
            <div class="overlay d-flex justify-content-center align-items-center">
              <div class="text text-center text-white">
                <p class="py-3 text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </p>
                <h1>
                ”<b>Dream-Fashion</b> Is My fashion Sanctuary! The Curated Collection Effortlessly Blends Chic Trends With Timeless Elegance, Making Every Purchase A Delightful Discovery.
                The Quality Of Their Pieces Is Unmatched, And I Appreciate The Brand's Commitment To Sustainable Fashion. What Truly Sets <b>Dream-Fashion</b> Apart Is Their Customer-Centric Approach.”
               </h1>
              </div>
            </div>
        </div>  
        <div class="sec-6 pt-5 pb-5">
            <div class="row text-center justify-content-center">
                <div class="col col-12 col-md-6 col-lg-3">
                    <i class="fa-solid fa-lock fs-2 pb-2"></i>
                    <h3>Secure Payments</h3>
                    <p class="text-body-tertiary">Shop with confidence knowing that your transactions are safeguarded.</p>
                </div>
                <div class="col col-12 col-md-6 col-lg-3">
                    <i class="fa-solid fa-truck fs-2 pb-2"></i>
                    <h3>Free Shipping</h3>
                    <p class="text-body-tertiary">Shopping with no extra charges - savor the liberty of complimentary shipping on every order.</p>                
                </div>
                <div class="col col-12 col-md-6 col-lg-3">
                    <i class="fa-solid fa-rotate-left fs-2 pb-2"></i>
                    <h3>Easy Returns</h3>
                    <p class="text-body-tertiary">With our hassle-free Easy Returns, changing your mind has never been more convenient.</p>
                </div>
                <div class="col col-12 col-md-6 col-lg-3">
                    <i class="fa-solid fa-location-dot fs-2 pb-2"></i>
                    <h3>Order Tracking</h3>
                    <p class="text-body-tertiary">Stay in the loop with our Order Tracking feature - from checkout to your doorstep.</p>
                </div>
            </div>
        </div> 
   </section>
    <!-- End Landing  -->

    <!-- Start footer  -->
    
<?php require_once "required/footer.php"; ?>