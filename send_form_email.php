<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@prevue.co.za";
    $email_subject = "PRE-VUE Online Contact Form";
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
    
  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

    
  $email_message = "Form details below.\n\n";
  $email_message .= "First Name: ".clean_string($first_name)."\n";
  $email_message .= "Last Name: ".clean_string($last_name)."\n";
  $email_message .= "Email: ".clean_string($email_from)."\n";
  $email_message .= "Telephone: ".clean_string($telephone)."\n";
  $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

if(! strlen($error_message) > 0) { 
  @mail($email_to, $email_subject, $email_message, $headers);  
}
?>
 
<!-- include your own success html here -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Pre-vue map and contact form.">
	<meta name="keywords" content="contact, pretoria, gauteng">
	<meta name="author" content="Lisa Kirkland">
	<title>PRE-VUE | Contact Us</title>
	<link rel="icon" href="favicon.png" type="image/png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,700">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,700">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
	<header>
		<nav id="header-nav" class="navbar navbar-expand-md navbar-light fixed-top p-0">
			<!-- logo -->
			<a class="navbar-brand m-sm-0 p-sm-2 pt-4" href="index.html">
				<img src="header.png" width="400px" height="150px" alt="Logo" class="align-top d-none d-sm-block">
				<img src="header.png" width="267px" height="100px" alt="Logo" class="d-block d-sm-none">
			</a>
			<!-- dropdown button for mobile -->
			<button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#collapsible-nav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- icon menu list-->
			<div id="collapsible-nav" class="collapse navbar-collapse">
				<ul id="nav-list" class="navbar-nav ml-auto">
					<li class="nav-item"> 
						<a class="nav-link" href="index.html">
							<i class="fas fa-info-circle"></i>
							<br/>About</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="funds.html">
							<i class="fas fa-file"></i>
							<br/>Funds</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="admin.html">
							<i class="fas fa-inbox"></i>
							<br/>Admin</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="books.html">
							<i class="fas fa-book-open"></i>
							<br/>Books</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="it.html">
							<i class="fas fa-laptop"></i>
							<br>IT</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="contact.html">
							<i class="fas fa-envelope"></i>
							<br>Contact</a>
					</li>
				</ul><!-- #nav-list -->
			</div><!-- #collapsible-nav -->
		</nav> <!-- #header-nav -->
	</header>


	<div id="contact-content" class="container-fluid">
		<div class="topspace"></div>
		<div id="contact-tiles" class="row justify-content-center content1">
			<div class="col-lg-12">
				<h1 class="font-weight-bold">Contact Us</h1>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div id="contact-info">
					<div><span class="font-italic">Tel:</span><a href="tel:+27861114662"> +27 86 111 4662</a></div>
					<div><span class="font-italic">Fax:</span><span> +27 86 692 4245</span></div>
					<div><span class="font-italic">Email:</span><a href="mailto:info@prevue.co.za"> info@prevue.co.za</a></div>
					<div class="font-italic">Physical address:</div>
					<p>Unit B3</p>
					<p>The Willows Office Park</p>
					<p>559 Farm Road</p>
					<p>Die Wilgers, 0184</p>
					<div class="font-italic">Postal address:</div>
					<p>PO Box 72117</p>
					<p>Lynnwood Ridge, 0040</p>
				</div>
				<hr class="d-sm-none">
			</div>
			<div id="hours-cont" class="col-12 d-block d-sm-none">
				<span>Hours:</span>
				<br>Mon-Thurs: 7:30am - 4:30pm
				<br>Fri: 8:00am - 1:00pm
				<br>Sat, Sun: Closed
				<hr class="d-sm-none">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div id="contact-form" class="container">
          <br class="d-block d-sm-none">
          
          <?php
            if(strlen($error_message) > 0) { 
          ?>
            <div class="alert alert-success"><strong>Please double check your info: <br /></strong><?php echo $error_message; ?></div>
          <?php 
            }
          ?>
          <div class="alert alert-success"><strong>Thank you!</strong> We will be in touch with you shortly.</div>
				</div>		
				<hr class="d-sm-none">
			</div>
			<div class="col-sm-6 col-xs-12">
				<br class="d-block d-sm-block d-md-none">
				<div id="map-tile" class="map-responsive">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1796.58515549752!2d28.320745927401287!3d-25.764937568115492!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e955e38dd5894d5%3A0x2fed84911895ca9d!2sPre-Vue+Accounting+Services+and+IT!5e0!3m2!1sen!2sza!4v1548408277702" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<div class="bottomspace"></div>
	</div> <!-- .container -->
		
	<footer class="panel-footer">
		<div class="container-fluid">
			<hr/>
      		<div class="row">
        		<div id="hours" class="col-sm-4 d-none d-sm-block">
          			<span>Hours:</span>
					<br>Mon-Thurs: 7:30am - 4:30pm
					<br>Fri: 8:00am - 1:00pm
					<br>Sat, Sun: Closed
					<hr class="d-sm-none">
        		</div>
        		<div id="contact-links" class="col-sm-4">
					<a href="tel:+27861114662">
						<i class="fas fa-phone"></i></a>
					<a href="mailto:info@prevue.co.za">
						<i class="fas fa-envelope"></i></a>		
					<a href="https://www.facebook.com/prevuegroup">
						<i class="fab fa-facebook"></i></a>
					<a href="https://twitter.com/PrevueGroup">
						<i class="fab fa-twitter"></i></a>
					<br/>
					<span><a href="contact.html">Contact Us</a></span>
				</div>
        		<div id="address" class="col-sm-4 d-none d-sm-block">
          			<span>Address:</span>
					<br>Unit B3, The Willows Office Park
					<br>559 Farm Road, Die Wilgers
					<br>0184
        		</div>
      		</div>
    	</div>
	</footer>	

	<script src="script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>


<?php
 
}
?>