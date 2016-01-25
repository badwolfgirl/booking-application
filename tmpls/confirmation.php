<?php 
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request for Proposal Step 2</title>


<link href="eventBooking.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="eventBooking">
  <div id="sty2Left"><img src="images/brochure_table_half.jpg" width="315" height="430" /></div>
  <div id="sty2Right">
  	<div class="header">Request for Proposal: <?php echo $_SESSION['step1']['roomHid'] ?></div>
  	<div class="description">Please fill out the following details to submit your request for a <strong><?php echo $_SESSION['step1']['eventHid'].'</strong> for <strong>'.$_SESSION['step1']['peopleHid'].' Attendees</strong> in the <strong>'.$_SESSION['step1']['roomHid'].'</strong> with a <strong>'.$_SESSION['step1']['setupHid']; ?></strong> seating arrangement <a href="index.php">(change)</a>. Cindy White, Sales Coordinator, is also happy to hear from you by phone at (555) 123-456 or by email at <a href="mailto:info@msharmonydesigns.com">info@msharmonydesigns.com </a></div>
  	<div class="subHead">Contact Information: <span style="color:#F00"><?php if(isset($_SESSION['note'])) echo $_SESSION['note']; ?></span></div>
  	<div class="subHead">Success! Your propsal has been sent to our offices. We will contact you shortly.</div>
  </div>
  <div style="clear:both"></div>
  <div style="text-align:right; margin:10px">Back to <a href="http://msharmonydesigns.com/wp/digital/">msharmonydesigns.com</a></div>
</div>
</body>
</html>
