<?php

$conn = mysqli_connect('localhost','root','','chaneldb') or die('connection failed');

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $dname = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($conn, "INSERT INTO `channeltb`(name,dname, email, number, date) VALUES('$name','$dname','$email','$number','$date')") or die('query failed');

   if($insert){
      $message[] = 'appointment made successfully!';
   }else{
      $message[] = 'appointment failed';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/echaneling.css">
    <title>E-Channeling</title>
</head>
<body>
<!-- header -->
<?php

include "navbar.php"

?>


<section class="contact" id="contact">
<br>
<br>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   <?php 
      if(isset($message)){
         foreach($message as $message){
            echo '<p class="message">'.$message.'</p>';
         }
      }
   ?>
   <div class="former">
      <div class="former-header">
         <h1 class="heading" style="color: #0F808C;">E- Channeling</h1>
      </div>
      <div class="form-item">
         <h2>your name         :</h2>
         <input type="text" name="name" placeholder="enter your name" class="box" required>
      </div>

      <div class="form-item">
         <h2>doctor name       :</h2>
         <input type="text" name="dname" placeholder="enter doctor name" class="box" required>
      </div>

      <div class="form-item">
         <h2>your email         :</h2>
         <input type="email" name="email" placeholder="enter your email" class="box" required>
      </div>

      <div class="form-item">
         <h2>your number        :</h2>
         <input type="number" name="number" placeholder="enter your number" class="box" required>
      </div>

      <div class="form-item">
         <h2>appointment date   :</h2>
         <input type="datetime-local" name="date" class="box" required>
      </div>
      
      <div class="submit-button">
         <input type="submit" value="make appointment" name="submit" class="link-btn">
      </div>
   </div>
</form>

    <!--Footer-->
    <?php

    include "footer.php";

    ?>

</body>
</html>