

<?php  

    require_once "sidebar.php"; 
    require_once "../required/configue.php";

    $select = "SELECT * FROM `inbox`";
    $sql = $connect->query($select);
    $user = $sql->fetchAll(); 

?>
    <title>Inbox</title>

    <h2 class="m-3">Inbox</h2>
    <table class="table"> 
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        <?php foreach($user as $value) {?>
        <tr>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['message'] ?></td>
        </tr>
        <?php }?>
    </table>

<?php require_once "footer.php" ?>