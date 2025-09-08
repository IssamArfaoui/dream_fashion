<?php 
    require_once "sidebar.php";
    require_once "../required/configue.php";

    $select = "SELECT * FROM `checkout`";
    $sql = $connect->query($select);
    $orders = $sql->fetchAll(); 

    if ($orders ) {
        $customers = [];
        foreach ($orders as $order) {
            $customerKey = $order['name'] . '|' . $order['email'] . '|' . $order['number'] . '|' . $order['address'];
            if (!isset($customers[$customerKey])) {
                $customers[$customerKey] = [];
            }
            $customers[$customerKey][] = $order;
        }
   

?>

    <title>Orders</title>
    <style>
        table img {
            width: 80px;
        }
        table {
            width: 100%;
        }
        .card {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>

    <?php foreach ($customers as $customerKey => $orders) {
        list($name, $email, $phone, $address) = explode('|', $customerKey);
    ?>
    <h1 class='m-3'> Orders</h1>
    <div class='card'>
        <div class='p-2 my-3'>
            <h5>Name: <?php echo $name ?></h5>
            <h5>Phone: <?php echo $phone ?></h5>
            <h5>Email: <?php echo $email ?></h5>
            <h5>Address: <?php echo $address ?></h5>
        </div>
        <table class='table'>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                <tr>
                    <td class="align-middle"><img src="../fileimage/<?php echo $order['image'] ?>" alt=""></td>
                    <td class="align-middle">
                        <?php echo $order['title'] ?>
                        <p> Size : <?php echo $order['size'] ?></p>
                    </td>
                    <td class="align-middle">$<?php echo $order['price'] ?></td>
                    <td class="align-middle">x<?php echo $order['quantity'] ?></td>
                    <td class="align-middle">
                    <a href="order_delete.php?id=<?php echo $order['id'];?>"><i class="delete text-danger fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>

    <?php
     }else {
        echo "<div class='alert alert-danger m-4'>
            <h1>No orders Now </h1>
        </div>";
        
    } ?>

    <?php require_once "footer.php" ?>
