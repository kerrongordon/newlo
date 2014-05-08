<?php

// Set email variables
$email_to = 'kgpsounds.com@gmail.com';
$email_subject = 'Form submission';

// Set required fields
$required_fields = array('fullname','email','comment');

// set error messages
$error_messages = array(
	'fullname' => 'Please enter a Name to proceed.',
	'email' => 'Please enter a valid Email Address to continue.',
	'comment' => 'Please enter your Message to continue.'
);

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();

// check form submittal
if(!empty($_POST)) {
	// Sanitise POST array
	foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));
	
	// Loop into required fields and make sure they match our needs
	foreach($required_fields as $field) {		
		// the field has been submitted?
		if(!array_key_exists($field, $_POST)) array_push($validation, $field);
		
		// check there is information in the field?
		if($_POST[$field] == '') array_push($validation, $field);
		
		// validate the email address supplied
		if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
	}
	
	// basic validation result
	if(count($validation) == 0) {
		// Prepare our content string
		$email_content = 'New Website Comment: ' . "\n\n";
		
		// simple email content
		foreach($_POST as $key => $value) {
			if($key != 'submit') $email_content .= $key . ': ' . $value . "\n";
		}
		
		// if validation passed ok then send the email
		mail($email_to, $email_subject, $email_content);
		
		// Update form switch
		$form_complete = TRUE;
	}
}

function validate_email_address($email = FALSE) {
	return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<!-- Contact Form Designed by James Brand @ dreamweavertutorial.co.uk -->
<!-- Covered under creative commons license - http://dreamweavertutorial.co.uk/permissions/contact-form-permissions.htm -->

	<title>NEWLO: Contact Us</title>
	<link rel="stylesheet" href="css/style.css">
  <!-- end CSS-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
  <link rel="shortcut icon" href="favicon.ico"  />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link href="assets/contactform/contact/css/contact.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript">
		var nameError = '<?php echo $error_messages['fullname']; ?>';
		var emailError = '<?php echo $error_messages['email']; ?>';
		var commentError = '<?php echo $error_messages['comment']; ?>';
	</script>

</head>

<body>
	<div id="wrap">

	<div id="main">
			
			<div id="banner_box">
 <div id="banner"><img src="assets/images/NewLOBanner.jpg" alt="banner" /></div>
        </div><!--end of banner_box-->
	<div id="outter_rapper">
		<div id="inna_rapper">
			<div id="menu">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="Depar.html" class="drop">Departments</a>
						<ul>
							<li><a href="abp.html">Adolescent Development Program</a></li>
							<li><a href="boa.html">Basic Office Administration</a></li>
							<li><a href="bhc.html">Basic Health Care</a></li>
							<li><a href="Carpentry.html">Carpentry</a></li>
							<li><a href="Cosmetology.html">Cosmetology</a></li>
							<li><a href="Electrical.html">Electrical Installation</a></li>
							<li><a href="gser.html">Gardening and Small Engine Repair</a></li>
							<li><a href="Construction.html">Garment Construction</a></li>
							<li><a href="HospitalityArts.html">Hospitality Arts</a></li>
							<li><a href="It.html">Information Technology</a></li>
							<li><a href="Computer Engineering.html">Computer Engineering</a></li>
							<li><a href="Masonry.html">Masonry</a></li>
							<li><a href="Plumbing.html">Plumbing</a></li>
							<li><a href="Rsa.html">Refrigeration and Small Appliances </a></li>
							<li><a href="cyep.html">CYEP</a></li>
							<li><a href="#">St.Andrews Life Center</a></li>
						</ul>  
				</li>
					  <li><a href="NewsandRecent.html" class="log">News and Recent</a></li>
					  <li><a href="Photogallery/Photogallery.html">Photo Gallery</a></li>
					  <li><a href="Staff.html">Staff</a></li>
					  <li><a href="AboutUs.html">About Us</a></li>
					  <li><a href="ContactUs.html" style="background-color: #0058d4">Contact Us</a></li>
				</ul>
			</div><!--end of menu --> 
            </div><!--end of inna_rapper-->
</div><!--end of outter_rapper-->

	<div class="box">
		<div class="box-shadow"></div>
		<div class="box-gradientab">
		
 				<div id="outboxcom"> 
 <table>
  <tr>
    <td>NAME: New Life Organization (NEWLO)</td>
  </tr>
  <tr>
    <td>STATUS: Non-Government Organization (NGO)</td>
  </tr>
  <tr>
    <td>Non-Profit</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ADDRESS: P.O. Box 609</td>
  </tr>
  <tr>
    <td>St. George’s</td>
  </tr>
  <tr>
    <td>Grenada</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mailing Address</td>
  </tr>
  <tr>
    <td>Palmiste</td>
  </tr>
  <tr>
    <td>St. John’s</td>
  </tr>
  <tr>
    <td>Grenada</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>TELEPHONE: 473-444-8532</td>
  </tr>
  <tr>
    <td>MOBILE: 1 473-404-5018</td>
  </tr>
  <tr>
    <td>FAX: 1 473-444-9316</td>
  </tr>
  <tr>
    <td>CONTACT PERSON Executive Director: Sis. Margaret Yamoah, HHCJ</td>
  </tr>
  <tr>
    <td>E-MAIL ADDRESS: smyamoah@newlo.org or newlo@spiceisle.com</td>
  </tr>
</table>

 
 
</div>

	<div id="contactusinput">
	<div id="formWrap">
    <div id="form">
    <?php if($form_complete === FALSE): ?>
    <form action="contact.php" method="post" id="comments_form">
    	<div class="row">
        <div class="label">Your Name</div><!-- end label -->
        <div class="input">
        <input type="text" id="fullname" class="detail" name="fullname" value="<?php echo isset($_POST['fullname'])? $_POST['fullname'] : ''; ?>" /><?php if(in_array('fullname', $validation)): ?><span class="error"><?php echo $error_messages['fullname']; ?></span><?php endif; ?>
        </div><!-- end input -->       
        <div class="context">e.g john smith or jane doe</div><!-- end comtext -->
        </div><!-- end row -->   
        
        <div class="row">
        <div class="label">Your Email address</div><!-- end label -->
        <div class="input">
        <input type="text" id="email" class="detail" name="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : ''; ?>" /><?php if(in_array('email', $validation)): ?><span class="error"><?php echo $error_messages['email']; ?></span><?php endif; ?>
        </div><!-- end input -->       
        <div class="context">we will not ahare your email with anyone orspam you with messages either </div><!-- end comtext -->
        </div><!-- end row -->  
    
    
        <div class="row">
        <div class="label">your Message</div><!-- end label -->
        <div class="input">
        <textarea id="comment" name="comment" class="mess"><?php echo isset($_POST['comment'])? $_POST['comment'] : ''; ?></textarea><?php if(in_array('comment', $validation)): ?><span class="error"><?php echo $error_messages['comment']; ?></span><?php endif; ?>
        </div><!-- end input -->       
        </div><!-- end row -->
        
        <div class="submit">
        	<input type="submit" id="submit" name="submit" value="Send Message" />
        </div><!-- end submit -->
        </form>
        <?php else: ?>
<p style="margin-left: 25px;">Thank you for your Message!</p>
<script type="text/javascript">
setTimeout('ourRedirect()',5000)
function ourRedirect() {
	location.href='http://gordon-tek.juplo.com/newlo/'
}
</script>

<?php endif; ?>
    </div><!-- end form -->    
    </div><!-- end formWrap -->
	</div><!-- contactusinput -->
	
	</div>
	</div>
			
	</div><!--main-->

</div><!--wrap-->

<div id="footer">
		<div id="footer_box">
	<div id="outter_footer">
		<footer>
			<h3>Our Proud Sponsors and Partners</h3>
				<div class="footerbox">
					<div class="Sponsors">
					  <img src="assets/logo/AuthAcademy-4c.jpg" width="80" height="82" alt="comptia" /> 
					  <img src="assets/logo/Microsoft.jpg" width="150" height="99" alt="ms" /> 
                      <img src="assets/logo/IYF_logo.gif" width="116" height="75" alt="IYF" />
					  <img src="assets/logo/gnta.jpg" width="96" height="83" alt="gnta" /> 
					  <img src="assets/logo/Cisco.jpg" width="80" height="75" alt="cisco" />
					  <img src="assets/logo/POETA.jpg" width="100" height="58" alt="po" /> 
					  <img src="assets/logo/Camerhogne.jpg" width="62" height="82" alt="ch" /> 
					  <img src="assets/logo/PearsonLogo.png" width="100" height="52" alt="ch" />
                      <img src="assets/logo/USAID.jpg" width="140" height="100" alt="USAID" /> 
                    </div><!--Sponsors-->
			</div><!--footerbox-->
		</footer>
	</div><!--end of outter_footer-->
    <p class="SiteFooterRow TextSmall">Copyright © 2013 The New Life Organization (NEWLO).  All rights reserved.</p>
  </div><!--end of footer_box-->
</div>


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <!-- end scripts-->

	
  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
</body>
</html>
