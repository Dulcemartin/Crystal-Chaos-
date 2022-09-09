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

 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="contact.css">
    <style>
    body{
      background-image: url("/Dulce/Assets/pexels-olha-ruskykh-6954558.jpg");
      color:white;
    }



    </style>
    </head>

    <!-- BODY -->
    
    <body>
        <section class="showcase">
          <header>
            <nav class="navbar">
              <div class="container-fluid ">
                <a class="navbar-brand p-2" href="#"><img src="/Dulce/Assets/logo1.png" alt="logo" height="150"></a>
                <ul class=" nav mx-auto">
                  <li class="nav-item">
                    <a class="nav-link active text-black-50" aria-current="page" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-black-50 " aria-current="page" href="about.html">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-black-50" aria-current="page" href="library.html">Library</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-black-50" aria-current="page" href="form.php">Contact</a>
                </ul>
              </div>
            </nav>
          
        

        </header>
    

  <header id="headercontact">

    <br /><br /><br />

    <div>
    <h3>Thank you for Visiting Crystal Chaos! <br>
    Please fill out the form below to get in touch with me!</h3>
            </div><br>

            <?php
		$name = $email = $contBack = $comment = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = cleanInput($_POST["name"]);
			$email = cleanInput($_POST["email"]);
			$contBack = cleanInput($_POST["contact-back"]);
			$comment = cleanInput($_POST["comments"]);
		}

        function cleanInput($data) {
			//POSSIBLE SOLUTION FOR STEP 2
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			//SOLUTION FOR STEP 3
			return $data;
		}
	?>

       
            
 <div>
 <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST">
<form style="text-align: center;" >
    <label>Name:</label>
    <input type="text" name="name"> <br><br>

<label>Email:</label>
<input required type="email" name="email"><br><br>

<label for ="Comments">Comments:</label><br>
    <textarea id="comments"
            name="comments"
            cols="40"
            rows="4"
            maxlengt="250"></textarea>
       
        <br><br>

        May I contact you back?<br>
        <br>

        <input type="radio" id="Yes" name="Contactback">
        <label for ="yes">Yes</label>
        <input type="radio" id="No" name="Contactback">
        <label for ="no">No</label><br>
<br>
        <div>

           <input type ="submit" value="Submit">

        </div>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
	
	<section id="results" style="background-color: lightsteelblue;">
		<div class="container py-2" >
			<div class="row ">
				<h1>Form Entries:</h1>
			</div>
			<div class="row">				
				<ul>
					<?php
					if ($name !== "") { echo "<li>NAME: $name </li>"; } 
					if ($email !== "") { echo "<li>EMAIL: $email </li>"; }
					if ($contBack !== "") { echo "<li>CONTACT BACK: $contBack </li>"; }
					if ($comment !== "") { echo "<li>COMMENT: $comment </li>"; }
					?>
				</ul>		
			</div>
		</div>
</form>
<?php } ?>
</div>

<br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>