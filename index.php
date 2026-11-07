<?php

// Database settings come from the environment when set, so real credentials stay out of the code.
$conn = mysqli_connect(
   getenv('DB_HOST') ?: 'localhost',
   getenv('DB_USER') ?: 'root',
   getenv('DB_PASS') ?: '',
   getenv('DB_NAME') ?: 'contact_db'
) or die('connection failed');

if(isset($_POST['submit'])){

   $name = trim($_POST['name'] ?? '');
   $email = trim($_POST['email'] ?? '');
   $number = preg_replace('/[^0-9+]/', '', $_POST['number'] ?? '');
   $date = $_POST['date'] ?? '';
   $when = DateTime::createFromFormat('Y-m-d\TH:i', $date);

   if($name === '' || strlen($name) > 100 || strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($number) < 6 || strlen($number) > 16 || !$when){
      $message[] = 'Please check your name, email, phone number and date.';
   }else{
      // A prepared statement: every value is sent as data, never as part of the SQL.
      $insert = mysqli_prepare($conn, "INSERT INTO `contact_form`(name, email, number, date) VALUES(?, ?, ?, ?)");
      $sqlDate = $when->format('Y-m-d H:i:s');
      mysqli_stmt_bind_param($insert, 'ssss', $name, $email, $number, $sqlDate);

      if(mysqli_stmt_execute($insert)){
         $message[] = 'Thank you. Your request is in, and we will call you to confirm the time.';
      }else{
         $message[] = 'Sorry, we could not save your request. Please try again or call us.';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dental Care · Family dental clinic</title>
   <meta name="description" content="A family dental clinic: check-ups, cleaning, aligners, root canals and implants. Book an appointment online.">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">dental<span>Care.</span></a>

         <nav class="nav" id="main-nav" aria-label="Main">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#expect">What to expect</a>
            <a href="#contact">Contact</a>
         </nav>

         <a href="#contact" class="link-btn">Book an appointment</a>

         <button type="button" id="menu-btn" class="fas fa-bars" aria-label="Open menu" aria-expanded="false" aria-controls="main-nav"></button>

      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h1>Let us brighten your smile</h1>
            <p>Check-ups, cleaning, braces and implants in one calm, family clinic. Book online and we will call you to confirm.</p>
            <a href="#contact" class="link-btn">Book an appointment</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/about-img.jpg" class="w-100 mb-5 mb-md-0" alt="A dentist examining a patient's teeth in a bright treatment room">
         </div>

         <div class="col-md-6 content">
            <span>About us</span>
            <h2>Care for the whole family</h2>
            <p>Four dentists and a hygienist look after children, parents and grandparents under one roof. We explain each treatment and its price before we start, and we keep to your appointment time.</p>
            <a href="#contact" class="link-btn">Book an appointment</a>
         </div>

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h2 class="heading">Our services</h2>

   <div class="box-container container">

      <div class="box">
         <img src="images/icon-1.svg" alt="">
         <h3>Braces and aligners</h3>
         <p>Clear aligners or braces to straighten teeth, with a check every six weeks.</p>
      </div>

      <div class="box">
         <img src="images/icon-2.svg" alt="">
         <h3>Cosmetic dentistry</h3>
         <p>Whitening, veneers and bonding to fix chips and even out the colour of your teeth.</p>
      </div>

      <div class="box">
         <img src="images/icon-3.svg" alt="">
         <h3>Cleaning and hygiene</h3>
         <p>A scale and polish with our hygienist, and simple advice to use at home.</p>
      </div>

      <div class="box">
         <img src="images/icon-4.svg" alt="">
         <h3>Root canal treatment</h3>
         <p>Saves an infected tooth under local anaesthetic, usually in two visits.</p>
      </div>

      <div class="box">
         <img src="images/icon-5.svg" alt="">
         <h3>Same-day advice</h3>
         <p>Not sure if it is urgent? Call us and a dentist will advise you the same day.</p>
      </div>

      <div class="box">
         <img src="images/icon-6.svg" alt="">
         <h3>Check-ups and X-rays</h3>
         <p>A full check with digital X-rays to find decay early, before it hurts.</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- process section starts  -->

<section class="process">

   <h2 class="heading">Treatment for every age</h2>

   <div class="box-container container">

      <div class="box">
         <img src="images/process-1.png" alt="Illustration: a dentist showing a patient an X-ray on a screen">
         <h3>Adults</h3>
         <p>Check-ups, fillings and whitening, with your X-rays shown and explained on screen.</p>
      </div>

      <div class="box">
         <img src="images/process-2.png" alt="Illustration: a dentist and an assistant treating a child">
         <h3>Children</h3>
         <p>Short, friendly visits from age three, so children learn that the dentist is nothing to fear.</p>
      </div>

      <div class="box">
         <img src="images/process-3.png" alt="Illustration: a dentist treating a reclining patient">
         <h3>Implants and crowns</h3>
         <p>Replace missing or broken teeth with implants and crowns made to match your own.</p>
      </div>

   </div>

</section>

<!-- process section ends -->

<!-- what to expect section starts  -->

<section class="expect" id="expect">

   <h2 class="heading">What to expect</h2>

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-file-invoice" aria-hidden="true"></i>
         <h3>The price before we start</h3>
         <p>After your check-up you get a written plan with the cost of each treatment. Nothing is added without asking you first.</p>
      </div>

      <div class="box">
         <i class="fas fa-clock" aria-hidden="true"></i>
         <h3>Appointments that run on time</h3>
         <p>We book enough time for each visit, so you are not left in the waiting room. We call you if we are running late.</p>
      </div>

      <div class="box">
         <i class="fas fa-hand-paper" aria-hidden="true"></i>
         <h3>Gentle with nervous patients</h3>
         <p>Tell us if you feel anxious. We explain each step before we do it, and you can raise a hand to stop at any time.</p>
      </div>

   </div>

</section>

<!-- what to expect section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h2 class="heading">Book an appointment</h2>

   <form action="" method="post">
      <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message" role="status">'.htmlspecialchars($message).'</p>';
            }
         }
      ?>
      <label for="name">Full name</label>
      <input type="text" id="name" name="name" autocomplete="name" maxlength="100" class="box" required>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" autocomplete="email" maxlength="100" class="box" required>
      <label for="number">Phone number</label>
      <input type="tel" id="number" name="number" autocomplete="tel" placeholder="+212 6 00 00 00 00" class="box" required>
      <label for="date">Preferred date and time</label>
      <input type="datetime-local" id="date" name="date" class="box" required>
      <input type="submit" value="Request appointment" name="submit" class="link-btn">
   </form>  

</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone" aria-hidden="true"></i>
         <h3>Phone</h3>
         <p>+212 522 000 000</p>
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
         <h3>Address</h3>
         <p>12 Example Street, Casablanca</p>
      </div>

      <div class="box">
         <i class="fas fa-clock" aria-hidden="true"></i>
         <h3>Opening hours</h3>
         <p>Monday to Saturday, 9:00 to 19:00</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope" aria-hidden="true"></i>
         <h3>Email</h3>
         <p>hello@dentalcare.example</p>
      </div>

   </div>

   <p class="credit">&copy; <?php echo date('Y'); ?> Dental Care, a sample clinic. Built by <a href="https://iliasjf.github.io/">Ilias Jafaoui</a>.</p>

</section>

<!-- footer section ends -->










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>