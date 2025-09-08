

<?php require_once "required/header.php";?>

<title>Checkout</title>
<style>
        header {
            background: black;
            position: relative;
        }
        .row input:focus, .row textarea:focus {
            outline: none;
            box-shadow: none;
            border: 1px solid black;
        }
        table img {
            width: 45px;
        }
</style>

<?php

    if ($sql) { 

    if ($_POST) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $image = $_POST['hd_image'];
        $titles = $_POST['hd_title'];
        $sizes = $_POST['hd_size'];
        $price = $_POST['hd_price'];
        $quantities = $_POST['hd_quantity'];

        $insert = "INSERT INTO `checkout`(`name`, `email`, `number`, `address`,`image`, `title`, `size`, `price`, `quantity`) 
        VALUES (?, ?, ?, ?, ?, ?, ? , ? , ?)";
        $sql = $connect->prepare($insert);

        for ($i = 0; $i < count($titles); $i++) {
            $sql->execute([$name, $email, $phone, $address, $image[$i], $titles[$i], $sizes[$i],$price[$i],$quantities[$i]]);
        }
        $delete = "DELETE FROM `panel_cart`";
        $supr = $connect ->prepare($delete);
        $supr->execute(); 
        
        header('location: confirmed.php');

    }
?>

    <div class="container checkout mt-5 p-5">
        <h1 class="text-dark mb-4"> CHECKOUT</h1>
        <form method='post' class='row'>
            <div class='col-lg-7'>
                <div class="form-group d-flex justify-content-between gap-3">
                    <input type="text" class="form-control w-50 rounded-0 p-3 my-3" name="name" placeholder="Enter your name" required>
                    <input type="tel" class="form-control rounded-0 w-50 my-3" name="phone" placeholder="Enter your phone" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control rounded-0 p-3 my-3" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-0 p-3 my-3" name="address" placeholder="Enter your address" required>
                </div>
                <button type="submit" class="fs-6 p-3 pe-5 ps-5 text-center rounded-0 mt-2 my-2" name='place'>PLACE ORDER</button>
            </div>
            <div class="col-lg-5 card p-0">
                <div class="card-header">
                    <h1 class='text-dark text-center'>Your Orders</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th colspan=4 class='text-body-tertiary'>Products</th>
                            <th class='text-body-tertiary'>Total</th>
                        </tr>
                        <?php
                            $select = "SELECT * FROM `panel_cart`";
                            $pdo = $connect->query($select);
                            $user = $pdo->fetchAll();
                            $subtotal = 0;
                            foreach($user as $order) {
                        ?>           
                        <tr>
                            <input type="hidden" name='hd_image[]' value='<?php echo $order['image'] ?>'>
                            <input type="hidden" name='hd_title[]' value='<?php echo $order['title'] ?>'>
                            <input type="hidden" name='hd_size[]' value='<?php echo $order['size'] ?>'>
                            <input type="hidden" name='hd_price[]' value='<?php echo $order['price'] ?>'>
                            <input type="hidden" name='hd_quantity[]' value='<?php echo $order['quantity'] ?>'>

                            <td class="align-middle"><img src="fileimage/<?php echo $order['image'] ?>" alt=""></td>
                            <td class="align-middle text-body-tertiary">
                                <?php echo $order['title'] ?>
                                <p>Size : <span class='text-dark'><?php echo $order['size'] ?></span></p>
                            </td>
                            <td class="align-middle">$<?php echo $order['price'] ?></td>
                            <td class="align-middle">x<?php echo $order['quantity'] ?></td>
                            <td class="align-middle">$<?php echo number_format(floatval($order['quantity']) * floatval($order['price']), 0) ?></td>
                        </tr>
                        <?php 
                            $subtotal += floatval($order['quantity']) * floatval($order['price']);
                            } 
                        ?>
                    </table>
                </div>
                <div class='bg- card-footer'>
                    <p class='d-flex justify-content-between ms-2 me-2'><span class='text-body-tertiary'>Subtotal :</span> $<?php echo number_format($subtotal, 2) ?></p>
                </div>
            </div>
        </form>
    <?php  
    } else {

        echo 
        "<div class='bg-body-secondary p-3 m-3'>
        <h6 class='text-body-secondary'>Your cart is currently empty.</h6>
        </div>";
        echo "<a href='products.php' class='btn btn-outline-dark rounded-0 m-3 p-2 ps-3 pe-3'>RETURN TO SHOP</a>";
    }
    ?>
    </div>
    


<?php require_once "required/footer.php"; ?>
