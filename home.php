<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>Don't panic, go organice</span>
         <h3>Reach For A Healthier You With Pregnancy...</h3>
         <p>This guide offers a comprehensive overview of pregnancy, covering conception, fetal development, emotional and physical changes, 
            prenatal care tips, and managing discomforts. It empowers expectant parents and those interested in the transformative experience 
            of bringing new life into the world.</p>
         <a href="about.php" class="btn">about us</a>
      </div>

   </section>

</div>

<section class="home-category">

   <h1 class="title">Search By category</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/food-pregnant.png" alt="">
         <h3>Foods</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
         <a href="category.php?category=fruits" class="btn">Foods</a>
      </div>

      <div class="box">
         <img src="images/exercise-pregnant.png" alt="">
         <h3>Exercise</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
         <a href="category.php?category=meat" class="btn">Exercise</a>
      </div>

      <div class="box">
         <img src="images/nutritions-pregnant.png" alt="">
         <h3>Nutritions</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
         <a href="category.php?category=vegitables" class="btn">Nutritions</a>
      </div>

      <div class="box">
         <img src="images/pains-pregnant.jpg" alt="">
         <h3>Pains</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
         <a href="category.php?category=fish" class="btn">Pains</a>
      </div>

   </div>

</section><br><br><br>







<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>