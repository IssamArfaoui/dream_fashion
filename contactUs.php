

<?php
    require_once "required/header.php";

    $text ="<div class='alert alert-success m-4' role='alert'>
     Thanks for contacting us! We will be in touch with you shortly.
     </div>";

    
    if ($_POST) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $insert = "INSERT INTO `inbox`(`name`, `email`, `message`) VALUES (?,?,?)";
        $pdo = $connect->prepare($insert);
        $pdo->execute([$name,$email,$message]);

    }

?>

    <title>Contact Us</title>
    <style>
        .row {
            --bs-gutter-x: 0;
        }
        .row input:focus , .row textarea:focus {
            outline: none;
            box-shadow: none;
            border: 1px solid black;
        }
    </style>

    <section class='contact_all'>
        <div class="contact">
            <div class="overlay">
                <div class="text">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
        <div class='contact_content p-5 d-flex justify-content-center align-items-center'>
            <div class='text w-50 text-center'>
                <p>Get in Touch</p> 
                <h2 class='fs-1'>We value the connection with our community and are here to assist in any way we can.
                Feel free to reach out through the following channels:</h2>
            </div>
        </div>
        <?php
            if (isset($_POST['send'])) {
                echo $text;
            }
             
        ?>
        <div class="row p-2 pt-5 py-5 justify-content-center align-items-cente gap-4">  
            <form action="" method='post' class='col-lg-5'>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control rounded-0" name="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control rounded-0" rows="7" name="message" placeholder="Message" required></textarea>
                </div>
                <button type='submit' name='send'>SEND</button>
            </form>
            <div class='col-lg-5'>
                <div>
                    <h6>Email : </h6>
                    <h2>issamarfaouicb4@gmail.com</h2>
                </div>
                <hr>
                <div>
                    <h6>Phone : </h6>
                    <h2>0798436578</h2>
                </div>
                <hr>
                <div>
                    <h6>Address :</h6>
                    <h2>Morocco, Casablanca</h2>
                </div>
                <hr>
                <div class='d-flex gap-3 align-items-cente'>
                    <h6 class='fs-5'>Follow Us : </h6>
                    <div class='d-flex gap-2'> 
                        <a href="https://web.facebook.com/" class='fs-5 nav-link'><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="mailto:issamarfaouicb4@gmail.com" class='fs-5 nav-link'><i class="fa-brands fa-google"></i></a>
                        <a href="https://x.com/home" class='fs-5 nav-link'><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://www.instagram.com/" class='fs-5 nav-link'><i class="fa-brands fa-instagram"></i></a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>


<?php require_once "required/footer.php" ?>
