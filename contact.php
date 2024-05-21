<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'message sent already!';
   }else{
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>Get in Touch</h3>
         <input type="text" name="name" required maxlength="50" placeholder="Enter your name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="Enter your email" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="Enter your number" class="box">
         <textarea name="message" placeholder="Enter your message" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="Send Message" name="send" class="btn">
      </form>
   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>How to cancel booking?</span><i class="fas fa-angle-down"></i></h3>
         <p>You can cancel a booking from your account in the 'My Bookings' section.</p>
      </div>

      <div class="box active">
         <h3><span>When will I get the possession?</span><i class="fas fa-angle-down"></i></h3>
         <p>Possession is given after all payments and documentation are completed.</p>
      </div>

      <div class="box">
         <h3><span>Where can I pay the rent?</span><i class="fas fa-angle-down"></i></h3>
         <p>Pay rent through our secure online portal in the 'Payments' section.</p>
      </div>

      <div class="box">
         <h3><span>How to contact with the buyers?</span><i class="fas fa-angle-down"></i></h3>
         <p>Use the messaging feature in your dashboard to contact buyers directly.</p>
      </div>

      <div class="box">
         <h3><span>Why my listing not showing up?</span><i class="fas fa-angle-down"></i></h3>
         <p>Ensure your listing meets our guidelines and is approved. Contact support if issues persist.</p>
      </div>

      <div class="box">
         <h3><span>How to promote my listing?</span><i class="fas fa-angle-down"></i></h3>
         <p>Promote your listing using our premium services available in the 'Promotions' section.</p>
      </div>

   </div>

</section>

<!-- faq section ends -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>
