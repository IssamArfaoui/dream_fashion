


<?php   

    require_once "required/configue.php";

    $select = "SELECT * FROM `products`;";
    $pdo = $connect ->query($select);
    $user = $pdo ->fetchAll();

?>
<?php require_once "required/header.php"; ?>
<title>Products</title>

<section>
    <div class="sec_shop">
        <div class="overlay">
            <div class="content">
                <div class="text">
                    <h6>Dream Fashion</h6>
                    <h1>find your Unique Style</h1>
                    <a href="#shop"><button>SHOP NOW <i class="fa-solid fa-arrow-down"></i></button></a>
                </div>
            </div>
        </div>
    </div>
    <div id="shop" class="product p-4 mb-5">
        <h1 class="text-center pt-5 p-3 m-3">All Products</h1>
            <form method='post' class="row row-cols-1 row-cols-md-3 g-4 m-2 ms-0 me-0">
                <?php
                    require_once "required/configue.php";

                    $select = "SELECT * FROM `products`";
                    $pdo = $connect ->query($select);
                    $user = $pdo ->fetchAll();

                    foreach($user as $value) {
                ?>
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <div class="popular text-center">
                        <div class="select">
                            <a href="cart.php?id=<?php echo $value['id'] ?>" class="cadr">
                                <img src="fileimage/<?php echo $value['image'] ?>" class="w-75 card-img-top" alt="">
                            </a>
                            <div class="bag_shopping">
                                <a href="cart.php?id=<?php echo $value['id'] ?>"><img src="images/shopping-bag.png" alt=""></a>
                            </div>
                        </div>
                        <div class="text p-2">
                            <span><?php echo $value['name'] ?></span>
                            <a href="cart.php?id=<?php echo $value['id'] ?>" class="m-1"><?php echo $value['title'] ?></a>
                            <span class='price fs-6'>$<?php echo $value['price'] ?>.00</span>
                        </div>   
                    </div>       
                </div> 
                <?php }?>
            </form>
        </div>
</section>

<?php require_once "required/footer.php"; ?>
    
