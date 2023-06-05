<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "lisa@prevue.co.za";
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
/*	
	if(isset($_POST['g-recaptcha-response'])){
		$captcha=$_POST['g-recaptcha-response'];
	}
	else
		$captcha = false;

	if(!$captcha){
		$error_message .= 'Recaptcha response error.<br />';
	}
	else{
		$secret = '6Lf8prYUAAAAACG05VsU46JbGG5ZLFTxB9kdLjjb';
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		if($response.success==false)
		{
			$error_message .= 'Recaptcha success error.<br />';
		}
	}
*/
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
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Pre-vue map and contact form.">
	<meta name="keywords" content="contact, pretoria, gauteng">
	<meta name="author" content="Lisa Kirkland">
	<title>PRE-VUE | Contact Us</title>
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@PrevueGroup" />
	<meta name="twitter:creator" content="@RiotGrrlLisa" />
	<meta name="twitter:description" content="Accounting, Consulting, Pension Fund Front Office, Administration & IT Services."/>
	<meta name="twitter:url" content="http://www.prevue.co.za" />
	<meta name="twitter:title" content="PRE-VUE"/>
	<meta name="twitter:image" content="http://www.prevue.co.za/images/share-image.jpg"/>
	<meta property="og:title" content="PRE-VUE" />
	<meta property="og:url" content="http://www.prevue.co.za" />
	<meta property="og:description" content="Front Office, Administration, Accounting, Consulting & IT Services"/>
	<meta property="og:image" content="http://www.prevue.co.za/images/share-image.jpg"/>
	<meta property="og:image" content="http://www.prevue.co.za/images/logo.png"/>
	<link rel="shortcut icon" href="images/favicon/favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="favicon.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="images/favicon/favicon-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="images/favicon/favicon-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="images/favicon/favicon-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16.png">
	<link rel="icon" type="image/png" href="images/favicon/favicon.png">
	<link rel="apple-touch-icon" href="images/favicon/favicon-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/favicon-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/favicon-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/favicon-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/favicon-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/favicon-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/favicon-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/favicon-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/favicon-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="images/favicon/favicon-144.png">
	<meta name="msapplication-config" content="browserconfig.xml">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,700">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
	<header class="sticky-top">

		<nav id="header-nav" class="navbar navbar-expand-lg navbar-light p-0">
			<!-- logo -->
			<a class="navbar-brand" href="index.html">
				<img src="images/header.jpg" width="264px" height="80px" alt="Logo">
			</a>
			<!-- dropdown button for mobile -->
			<button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#collapsible-nav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- icon menu list-->
			<div id="collapsible-nav" class="collapse navbar-collapse">
				<ul id="nav-list" class="navbar-nav ml-auto">
					<li class="nav-item active"> 
						<a class="nav-link" href="index.html">
							<i class="fas fa-info-circle"></i>
							<br/>About</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="accounting.html">
							<i class="fas fa-book-open"></i>
							<br/>Accounting</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="frontoffice.html">
							<i class="fas fa-file"></i>
							<br/>Front Office</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link" href="admin.html">
							<i class="fas fa-inbox"></i>
							<br/>Admin</a>
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
					<li class="nav-item dropdown d-none d-lg-block">
						<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
							<i class="fas fa-share-alt"></i>
							<br>Share</a>	
						<div class="dropdown-menu">
							<!-- Facebook -->
							<a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u=http://www.prevue.co.za" onClick="window.open(this.href, 'mywin', 'left=20,top=20, width=580, height=580, toolbar=1,resizable=0'); return false;">
								<i class="fab fa-facebook-square"></i></a> 
							<!-- Twitter -->
							<a class="dropdown-item twitter" href="https://twitter.com/intent/tweet?url=http://www.prevue.co.za&text=Make use of services offered by Prevue to help sustain and grow your business&hashtags=frontoffice, administration, accounting, consulting, computers&via=PrevueGroup">
								<i class="fab fa-twitter-square"></i></a>
							<!-- LinkedIn -->
							<a class="dropdown-item" href="http://www.linkedin.com/shareArticle?mini=true&url=http://www.prevue.co.za&description=Pre-vue offers pension fund front office services, administration services, accounting and consulting services as well as IT sales and support." onClick="window.open(this.href, 'mywin', 'left=20,top=20, width=580, height=580, toolbar=1,resizable=0'); return false;">
								<i class="fab fa-linkedin"></i></a>
							<!-- Pinterest -->
							<a class="dropdown-item" data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/?url=http://www.prevue.co.za&media=http://www.prevue.co.za/logo.jpg&description=Admin%2C%20accounting%2C%20consulting%20and%20IT" onClick="window.open(this.href, 'mywin', 'left=20,top=20, width=580, height=580, toolbar=1,resizable=0'); return false;">
								<i class="fab fa-pinterest-square"></i></a>
							<!-- Whatsapp -->
							<a class="dropdown-item" href="https://api.whatsapp.com/send?text=Make use of services offered by Pre-vue to help sustain and grow your business, visit http://www.prevue.co.za" data-action="share/whatsapp/share" onClick="window.open(this.href, 'mywin', 'left=20,top=20, width=580, height=580, toolbar=1,resizable=0'); return false;">
								<i class="fab fa-whatsapp-square"></i></a>
							<!-- Email -->
							<a class="dropdown-item" href="mailto:?subject=PRE-VUE&amp;body=Pre-vue offers pension fund front office services, administration services, accounting and consulting services as well as IT sales and support. Check out their website http://www.prevue.co.za" title="Share by Email">
								<i class="fas fa-envelope-square"></i></a>
						</div>
					</li>
				</ul><!-- #nav-list -->
			</div><!-- #collapsible-nav -->
		</nav> <!-- #header-nav -->
	</header>


	<div id="contact-content" class="container-fluid">

		<div class="row midspace"></div>
		<div id="contact-tiles" class="row justify-content-center content1"  >
			<div class="col-lg-12">
				<h1 class="font-weight-bold">Contact Us</h1>
			</div>
			<div class="col-lg-4 col-sm-7 col-xs-12">
				<div id="contact-info"  >
					<div><span class="font-italic">Tel:</span><a href="tel:+27861114662"> +27 86 111 4662</a></div>
					<div><span class="font-italic">Whatsapp Pre-vue:</span> +27 76 638 7235</div>
					<div><span class="font-italic">Whatsapp HBSI Pension:</span> +27 72 858 9786</div>
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
				<hr class="d-md-none">
			
			<div id="hours-cont" class="d-block d-sm-block d-md-none">
				<span>Hours:</span>
				<br>Mon-Thurs: 08:30 - 16:00
				<br>Fri: 08:30 - 13:00
			<br>Sat, Sun: Closed
				<hr class="d-sm-none">
			</div>
		</div>
			<div class="col-lg-3 col-sm-5 col-xs-12">
				<div id="contact-form" class="container">
					<br class="d-block d-sm-none">
					<form name="contactform" style="font-weight: 600" method="POST" action="form_mailer.php">
						<label style="text-align: left" for="first_name">First Name *</label>
						<br/>
						<input type="text" id="first_name" name="first_name"  required>
						<br/>
						<label for="last_name" style="margin-top: 0.5rem">Last Name *</label>
						<br/>
						<input type="text" id="last_name" name="last_name"  required>
						<br/>
						<label for="email" style="margin-top: 0.5rem">Email Address *</label>
						<br/>
						<input type="email" id="email" name="email" required>
						<br/>
						<label for="telephone" style="margin-top: 0.5rem">Telephone Number</label>
						<br/>
						<input type="text" id="telephone" name="telephone" >
						<br/>
						<label for="comments" style="margin-top: 0.5rem">Message *</label>
						<br/>
						<textarea id="comments" name="comments" style="height:100px;" required></textarea>
						<br/>
						<input type="submit" value="Submit">
					</form>
				</div>		

          <?php
            if(strlen($error_message) > 0) { 
          ?>
            <div class="alert alert-success"><strong>Please double check your info: <br /></strong><?php echo $error_message; ?></div>
          <?php 
            }
          ?>
		  <div class="alert alert-success"><strong>Thank you!</strong> We will be in touch with you shortly.</div>
		  
		  <hr class="d-sm-none">
			</div>
			<div class="col-lg-5 col-md-12">
				<br class="d-block d-sm-block d-lg-none">
				<div id="map-tile" class="map-responsive">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1796.58515549752!2d28.320745927401287!3d-25.764937568115492!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e955e38dd5894d5%3A0x2fed84911895ca9d!2sPre-Vue+Accounting+Services+and+IT!5e0!3m2!1sen!2sza!4v1548408277702" width="600" height="450" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<div class="row midspace"></div>

	</div> <!-- .container -->
		
	<footer class="panel-footer">
		<div class="container-fluid">
			<hr/>
      		<div class="row" style="padding-bottom: 10px;">
        		<div id="hours" class="col-md-4 d-none d-md-block">
          			<span>Hours:</span>
					  <br>Mon-Thurs: 08:30 - 16:00
					  <br>Fri: 08:30 - 13:00
					  <br>Sat, Sun: Closed
        		</div>
        		<div class="col-md-4 contact-links">
					<a href="tel:+27861114662">
						<i class="fas fa-phone"></i></a>
					<a href="mailto:info@prevue.co.za">
						<i class="fas fa-envelope"></i></a>		
					<a href="https://www.facebook.com/prevuegroup" target="_blank">
						<i class="fab fa-facebook-f"></i></a> 
					<br/>
					<span><a id="ft_contact" href="contact.html">Contact Us</a></span>
					<br/>
					<span><a id="ft_privacy" href="privacy.html">Privacy Policy</a></span>
				</div>
        		<div id="address" class="col-md-4 d-none d-md-block">
          			<span>Address:</span>
					<br>Unit B3, Willows Office Park
					<br>559 Farm Road, Die Wilgers
					<br>0184
        		</div>
      		</div>
    	</div>
	</footer>	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://platform.twitter.com/widgets.js"></script>
</body>
</html>

<?php
 
}
?>