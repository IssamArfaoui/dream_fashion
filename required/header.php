<?php
    session_start();

    require_once "required/configue.php";
    $select = "SELECT * FROM `panel_cart`";
    $pdo = $connect->query($select);
    $sql = $pdo->fetchAll();

    // Calculate the subtotal
    $subtotal = 0;
    foreach ($sql as $item) {
        $subtotal += $item['quantity'] * $item['price'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Index</title> -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
        header small {
            font-size: 13px;
            font-weight: bold;
        }
        .offcanvas-footer {
            width: 95%;
        }
    </style>
</head>
<body>
  
   <!-- Start header  -->
   <header class="pe-5 ps-5 d-flex justify-content-between align-items-center z-1 w-100 text-white"> 
        <div class="dream">
            <a href="index.php"><img src="images/Black White Minimalist Brand Fashion Logo (4).png" alt=""></a>
        </div>
       <ul class="p-0">        
           <li><a href="index.php" class="active">Home</a></li>
           <li><a href="products.php">All Products</a></li>
           <li><a href="about.php">About Us</a></li>
           <li><a href="contactUs.php">Contact Us</a></li>
       </ul>
       <div class="d-flex gap-3">
        <div class="position-relative">
            <img id="prevent" src="images/icons/shopping-bag.svg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" alt="">
            <small class="position-absolute bottom-25 bg-white text-dark pe-2 ps-2 rounded-circle translate-middle"> <?php echo $numRows = count($sql); ?></small>
        </div>
        <i class="fa-solid fa-bars fs-3"></i>
       </div>
       <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header p-2">
            <h6 class="offcanvas-title" id="offcanvasRightLabel">Shopping Cart</h6>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr class="mt-0"> 
        <div class="offcanvas-body">
            <?php
            if ($sql) {
                
                foreach($sql as $value)  { 

                if (isset($_POST['submit'])) {

                $id = $_POST['id'];

                $delete = "DELETE FROM `panel_cart` WHERE `id`= ?";
                $supr = $connect ->prepare($delete);
                $supr->execute([$id]);

                header("Refresh: .1; url=");

                // ob_end_flush();
                }
            ?>
            <form method="post" class="panel_cart text-secondary fs-5 d-flex align-items-center gap-2" >
                <img src="fileimage/<?php echo $value['image'] ?>" alt="">
                <div class="d-flex justify-content-between w-100">
                    <div>
                        <p class='m-0'><?php echo $value['title'] ?></p>
                        <p class='m-0'> SIZE : <?php echo $value['size'] ?> </p>
                        <p class='m-0 price fs-6'><?php echo $value['quantity'] ?> x $<?php echo $value['price'] ?></p> 
                    </div>
                </div>  
                <button type="submit" name='submit'>
                    <i class="fs-4 fa-regular fa-circle-xmark d-block text-dark"></i>
                </button>
                <input type="hidden" name='id' value="<?php echo $value['id'] ?>">
            </form>
            <hr>
            <?php } ?>
        </div>
        <div class='offcanvas-footer p-3'>
            <hr>
            <p class="fs-6 price d-flex justify-content-between"><span class='text-start text-dark'>Subtotal: </span>$<?php echo number_format($subtotal, 2); ?></p>
            <hr>
            <a href="shopping.php"><button class='w-100'>View Cart</button></a>
            <a href="checkout.php"><button class='w-100 mt-2'>CheckOut</button></a>
        </div>
        <?php 
        } else { 
            echo "<p class='text-secondary position-absolute top-50 start-50 translate-middle-x'>No products in the cart.</p>";
            echo "<div class='else offcanvas-footer p-3 position-absolute bottom-0 '>
            <a href='products.php' ><button class='w-100'>Continue Shopping</button></a>
            </div>";
        }
        ?>
    </div>
   </header>
</body>
</html>
