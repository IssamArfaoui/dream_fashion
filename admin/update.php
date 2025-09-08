<?php 
    require_once "sidebar.php";
    require_once "../required/configue.php";
    
    $id = $_GET['id'];

    if ($_POST) {
        $name = $_POST['name'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $tmpname = $_FILES['image']['tmp_name'];
            $newfile = $image;
            move_uploaded_file($tmpname, '../fileimage/' . $newfile);
        } else {
            $image = $_POST['existing_image'];
        }

        $Update = "UPDATE `products` SET `name`=?,`title`=?,`price`=?, `image`=? WHERE id = ?";
        $pdo = $connect->prepare($Update);
        $pdo->execute([$name, $title, $price, $image, $id]);

        if (isset($_POST['submit'])) {
            echo "<div class='alert alert-success m-2' role='alert'>
                    <i class='fa-solid fa-check'></i> Product Updated Successfully
            </div>";
        }
    }

    $select = "SELECT * FROM `products` WHERE `id`=?";
    $sql = $connect->prepare($select);
    $sql->execute([$id]);
    $user = $sql->fetch();
?>

    <title>Update</title>
    <style>
        .form-container {
            position: relative;
            left: 28%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }
        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        } 

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            color: rgb(0, 0, 0);
            border: 1px solid rgb(0, 0, 0);
            background-color: transparent;
            font-size: 12px;
            letter-spacing: 3px;
            padding: 12px 20px;
            width: 100%;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(0, 0, 0);
            color: rgb(255, 255, 255);
            transition: .3s;
        }
    </style>

    <div class="form-container m-3">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Product Update</h1>
            <label for="image">Product Image</label>
            <input type="file" id="image" name="image">
            <input type="hidden" name="existing_image" value="<?php echo $user['image']; ?>">

            <label for="name">Product Name</label>
            <input type="text" name="name" value='<?php echo $user['name']; ?>' placeholder="Enter product name" required>

            <label for="title">Product Title</label>
            <input type="text" name="title" value='<?php echo $user['title']; ?>' placeholder="Enter product title" required>

            <label for="price">Product Price</label>
            <input type="number" name="price" value='<?php echo $user['price']; ?>' placeholder="Enter product price" required>
            <button type="submit" name='submit'>Update</button>
        </form>
    </div>
    

<?php require_once "footer.php" ?>