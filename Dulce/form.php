<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5da8a93997.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="library.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>

    <!-- BODY -->
    
    <body>
        <section class="showcase">
          <header>
            <nav class="navbar">
              <div class="container-fluid ">
                <a class="navbar-brand p-2" href="#"><img src="Crystalpictures/logo1.png" alt="logo" height="150"></a>
                <ul class=" nav mx-auto">
                  <li class="nav-item">
                    <a class="nav-link active text-black-50" aria-current="page" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-black-50 " aria-current="page" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-black-50" aria-current="page" href="library.html">Library</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-black-50" aria-current="page" href="Contact.html">Contact</a>
                </ul>
              </div>
            </nav>
          
        

        </header>
    

  <header id="headercontact">

    <br /><br /><br />

    <h1 id="contact">Contact</h1>


  </header>
 



    <?php
            // define variables and set to empty values
            $nameErr = $emailErr = $commentsErr = $contactErr = "";
            $name = $email = $comments = $contact = $comments = "";
            $to = $message = $headers = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            }
            }
            
            if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            }
            }
            
            if (empty($_POST["website"])) {
            $website = "";
            } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "Invalid URL";
            }
            }

            if (empty($_POST["comment"])) {
            $comment = "";
            } else {
            $comment = test_input($_POST["comment"]);
            }

            if (empty($_POST["May we Contact you?"])) {
            $superheroErr = "";
            } else {
            $superhero = test_input($_POST["May we contact you?"]);
            }
            }

            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return$data;
            }
?>

    

    <p>
        <span class="error">* required field</span>
    </p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        Name: <input type="text" name="name" value="<?php echo $name;?>">

        <span class="error">* <?php echo $nameErr;?></span>

        <br><br>

        E-mail: <input type="text" name="email" value="<?php echo $email;?>">

        <span class="error">* <?php echo $emailErr;?></span>

        <br><br>


        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>

        <br><br>

       May we contact you?

        <input type="radio" name="contact" <?php if (isset($superhero) && $superhero=="superman") echo "checked";?> value="superman">

       Yes

        <input type="radio" name="Yes" <?php if (isset($superhero) && $superhero=="Yes") echo "checked";?> value="Yes">
        
        No

        <input type="radio" name="No" <?php if (isset($superhero) && $superhero=="No") echo "checked";?> value="No">
        
      

        <span class="error">* <?php echo $superheroErr;?></span>

        <br><br>

        <input type="submit" name="submit" value="Submit">

        

    </form>



    <?php

            echo "<h2>Your Input:</h2>";
            echo $name;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $comment;
            echo "<br>";
            echo $contact;
            echo "<br>";

            if (isset($_POST["submit"])){
            $to = " dulruiz86@gmail.com, dulruiz86@gmail.com ";
            $headers = "From: $email \r\n";
            $headers .= "Reply-To: $email \r\n";
            $headers .= "Cc: dulruiz86@gmail.com\r\n";
            $headers .= "Bcc: dulruiz86@gmail.com \r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            $email_body = "You have received a new message from the $name.\n"."Their name $name.\n"."Their email is $email.\n"."They comment:\n $comment.";

            //mail(param1,param2,param3,param4...)
            mail($to, " Website Request ", $email_body, $headers);
            
            echo "Thank you for contacting us. We will be in touch with you very soon.";
            }
    ?>

</body>

</html>