

<?php 
    require_once "sidebar.php";
    require_once "../required/configue.php";

    $select = "SELECT * FROM `products`";
    $sql = $connect->query($select);
    $user = $sql->fetchAll(); 
?>

    <title>Products</title>
    <style>
        table img {
            width: 70px;
        }
        table {
            width: 100%;
        }
    </style>
    
        <table class="table m-2">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Title</th>
                <th colspan=2>Price</th>
            </tr>
            <?php foreach($user as $value) {?>
                <tr>
                    <td><img src="../fileimage/<?php echo $value['image'] ?>" alt=""></td>
                    <td class="align-middle"><?php echo $value['name']; ?></td>
                    <td class="align-middle"><?php echo $value['title']; ?></td>
                    <td class="align-middle">$<?php echo $value['price']; ?></td>
                    <td class="align-middle">
                        <a href="delete.php?id=<?php echo $value['id'];?>"><i class="delete text-danger fa-solid fa-trash"></i></a>
                        <br><a href="update.php?id=<?php echo $value['id'];?>"><i class="update fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            <?php }?>
        </table>

<?php require_once "footer.php" ?>