

<?php
   ob_start();

   try {

      $connect = new PDO('mysql:host=localhost;dbname=e-commerce','root','');
      $connect ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

   } catch (PDOException $error) {
    echo "error : ".$error->getMessage();
   }



