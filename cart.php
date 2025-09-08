
<?php 
    require_once "required/configue.php";
    require_once "required/header.php";

    $id = $_GET['id'];
    
    $select = "SELECT * FROM `products` WHERE `id`=?";
    $sql = $connect ->prepare($select);
    $sql ->execute([$id]);
    $list = $sql ->fetch();

    if (isset($_POST['submit'])) {

        header("location: cart.php?id=" . $list['id']);
        ob_end_flush();
        
    }
    if ($_POST) {

        $image = $_POST['image'];
        $name = $_POST['name'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];

        // Check if the product already exists in the cart
        $checkQuery = "SELECT * FROM `panel_cart` WHERE `title`=? AND `size`=?";
        $checkStmt = $connect->prepare($checkQuery);
        $checkStmt->execute([$title, $size]);
        $existingProduct = $checkStmt->fetch();

        if ($existingProduct) {
            // If product exists, update the quantity
            $newQuantity = $existingProduct['quantity'] + $quantity;
            $updateQuery = "UPDATE `panel_cart` SET `quantity`=? WHERE `id`=?";
            $updateStmt = $connect->prepare($updateQuery);
            $updateStmt->execute([$newQuantity, $existingProduct['id']]);
        } else {
            // If product does not exist, insert new product
            $insertQuery = "INSERT INTO `panel_cart`(`image`, `name`, `title`, `price`, `size`, `quantity`) 
                VALUES (?,?,?,?,?,?)";
            $insertStmt = $connect->prepare($insertQuery);
            $insertStmt->execute([$image, $name, $title, $price, $size, $quantity]);
        }
    }

?>
<title>Cart</title>
<style>
    header {
        background: black;
        position: relative;
    }
    
    input[type="number"]  
    {
        font-family: sans-serif;
    }
    .form-select:focus {
        box-shadow: none;
    }
    @media (max-width: 767px) {
        .product h1 {
            font-size: 40px;
        }
    }
</style>
<div> 
    <form action="cart.php?id=<?php echo $list['id']; ?>" method='post' class="cart p-5">
        <div class="row">
            <div class='col-xl-6 col-12'>
                <img src="fileimage/<?php echo $list['image'] ?>" class="card-img-top" alt="">
                <input type="hidden" name='image' value='<?php echo $list['image'] ?>'>
            </div>
            <div class='col-xl-6 col-12'>
                <div class="text p-4">
                    <h5 class="pt-2"><?php echo $list['name'] ?></h5>
                    <input type="hidden" name='name' value='<?php echo $list['name']  ?>'>
                    <h4 class="pt-1"><?php echo $list['title'] ?></h4>
                    <input type="hidden" name='title' value='<?php echo $list['title']  ?>'>
                    <h3 class="pt-1 text-secondary">$<?php echo $list['price'] ?>.00<span>  & Free Shipping</span></h3>
                    <input type="hidden" class="pt-1" name='price' value='<?php echo $list['price'] ?>'>
                    <span class="pt-2">
                    Elevate your everyday style with our Classic Comfort Cotton T-Shirt. Crafted from 100% premium cotton, 
                    this T-shirt offers unparalleled softness and breathability, making it the perfect choice for any casual occasion.
                    </span>
                    <select name="size" class="form-select mt-2 w-50 rounded-0 border-dark" aria-label="Default select example">
                        <option value="M">SIZE-M</option>
                        <option value="S">SIZE-S</option>
                        <option value="L">SIZE-L</option>
                        <option value="XL">SIZE-XL</option>
                        <option value="XXL">SIZE-XXL</option>
                    </select>
                    <hr>
                    <label for=""><h4>Quantity : </h4></label>
                    <input type="number" name='quantity' class="text-center" min=1 max=20 value=1>
                    <br><button type="submit" name='submit' class="btn mt-4 pe-4 ps-4 btn-outline-dark rounded-0"> Add Cart</button>
                    <hr>
                    <label for="">Description : </label>
                    <p>
                    Make a bold statement in the corporate world with our product, the epitome of executive elegance. Meticulously tailored, this blazer is a harmonious 
                    blend of classic design and contemporary flair, featuring a timeless pinstripe pattern that exudes confidence and sophistication. Whether you’re leading a meeting or attending a formal event, the structured silhouette and refined details of our Professional Pinstripe Blazer will elevate your style, leaving an indelible mark of professionalism and grace.
                    </p>
                </div>
            </div>              
        </div>
    </form>
</div>
<div class="product p-5">
    <h1 class="text-dark text-center">Related Products</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-2 ms-0 me-0 justify-content-center ">
        <?php
        
        $select = "SELECT * FROM `products` ORDER BY RAND() limit 2 ";
        $pdo = $connect ->query($select);
        $user = $pdo ->fetchAll();

        foreach($user as $value) { ?>  
        <div class="col-6 col-md-4 col-lg-3 text-center">
            <div class="popular text-center">
                <div class="select">
                    <a href="cart.php?id=<?php echo $value['id'] ?>" class="cadr">
                        <img src="fileimage/<?php echo $value['image'] ?>" class=" w-75 card-img-top" alt="">
                    </a>
                    <div class="bag_shopping">
                        <a href="cart.php?id=<?php echo $value['id'] ?>"><img src="images/shopping-bag.png" alt=""></a>
                    </div>
                </div>
                <div class="text">
                    <span><?php echo $value['name'] ?></span>
                    <a href="cart.php?id=<?php echo $value['id'] ?>" class="m-1"><?php echo $value['title'] ?></a>
                    <span class='price fs-6'>$<?php echo $value['price'] ?></span>
                </div>
            </div>
        </div>        
        <?php } ?>
    </div>
</div>

<?php require_once "required/footer.php"; ?>
