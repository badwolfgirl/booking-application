<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request for Proposal Step 1</title>

<link rel="stylesheet" href="js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script src="js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="js/jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"></script>

<link href="eventBooking.css" rel="stylesheet" type="text/css" />

<script>
	$(function() {
		$( ".datePick" ).datepicker();
	});
	</script>

</head>

<body>
<div id="eventBooking">
  <div id="sty2Left"><img src="images/brochure_table_half.jpg" width="315" height="430"></div>
  <div id="sty2Right">
  	<div class="header">Request for Proposal: <?php echo $_SESSION['step1']['roomHid'] ?></div>
  	<div class="description">Please fill out the following details to submit your request for a <strong><?php echo $_SESSION['step1']['eventHid'].'</strong> for <strong>'.$_SESSION['step1']['peopleHid'].' Attendees</strong> in the <strong>'.$_SESSION['step1']['roomHid'].'</strong> with a <strong>'.$_SESSION['step1']['setupHid']; ?></strong> seating arrangement <a href="index.php">(change)</a>. Cindy White, Sales Coordinator, is also happy to hear from you by phone at (555) 123-456 or by email at <a href="mailto:info@msharmonydesigns.com">info@msharmonydesigns.com </a></div>
  	<div class="subHead">Additional Event Details / Amenities:</div>
  	<div class="form"><form name="finalSteps" id="finalSteps" action="proposal.php" method="POST">
    	<table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tr>
          <td width="200px" valign="top"><div class="formTxt">When does your event take place?</div></td>
          <td><input type="text" name="arriveDate" id="arriveDate" class="datePick" size="12" value="<?php echo $_SESSION['step2']['arriveDate']  ?>" /> at 
              <input type="text" name="arriveTime" id="arriveTime" size="4" value="<?php echo $_SESSION['step2']['arriveTime']  ?>" />&nbsp;&nbsp;to&nbsp;&nbsp;
              <input type="text" name="departDate" id="departDate" class="datePick" size="12" value="<?php echo $_SESSION['step2']['departDate']  ?>"  /> at
              <input type="text" name="departTime" id="departTime" size="4" value="<?php echo $_SESSION['step2']['departTime']  ?>" />
          </td>
        </tr>
        <tr>
          <td valign="top"><div class="formTxt">Are your dates flexible?</div></td>
          <td><input type="radio" name="flexibleDates" value="Yes" id="flexibleDates_0" <?php 
						if($_SESSION['step2']['flexibleDates'] == "Yes") echo 'checked="checked" ';  ?> />&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="flexibleDates" value="No" id="flexibleDates_1" <?php 
						if($_SESSION['step2']['flexibleDates'] == "No") echo 'checked="checked" ';  ?> />&nbsp;No</td>
        </tr>
        <tr>
          <td valign="top"><div class="formTxt">If your dates are flexible, please provide detais on how:</div></td>
          <td><textarea name="flexDetails" rows="1" id="flexDetails" style="width:98%;"> <?php echo $_SESSION['step2']['flexDetails']  ?></textarea></td>
        </tr>
        <tr>
          <td valign="top"><div class="formTxt">Which hotel facilities do you require?</div></td>
          <td><input type="radio" name="facilities" value="Function Space" id="facilities_0" <?php 
						if($_SESSION['step2']['facilities'] == "Function Space") echo 'checked="checked" ';  ?> />&nbsp;Function Space&nbsp;&nbsp;
              <input type="radio" name="facilities" value="Guest Rooms" id="facilities_1" <?php 
						if($_SESSION['step2']['facilities'] == "Guest Rooms") echo 'checked="checked" ';  ?> />&nbsp;Guest Rooms&nbsp;&nbsp;
          <input type="radio" name="facilities" value="Function Space & Guest Rooms" id="facilities_2" <?php 
						if($_SESSION['step2']['facilities'] == "Function Space & Guest Rooms") echo 'checked="checked" ';  ?> />&nbsp;Both</td>
        </tr>
        <tr>
          <td valign="top"><div class="formTxt">What audio-visual equipment or technology will your event require?</div></td>
          <td><textarea name="technologyEquip" rows="1" id="technologyEquip" style="width:98%;"> <?php echo $_SESSION['step2']['technologyEquip']  ?></textarea></td>
        </tr>
        <tr>
          <td valign="top"><div class="formTxt">Which food and beverage services will your event require?</div></td>
          <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td width="20"><input type="checkbox" name="services[0]" value="AM Break" id="services_0" <?php 
						if($_SESSION['step2']['services'][0] == "AM Break") echo 'checked="checked" ';  ?> /></td>
              <td>AM Break</td>
              <td width="20"><input type="checkbox" name="services[1]" value="Continental Breakfast" id="services_1" <?php 
						if($_SESSION['step2']['services'][1] == "Continental Breakfast") echo 'checked="checked" ';  ?> /></td>
              <td>Continental Breakfast</td>
              <td width="20"><input type="checkbox" name="services[2]" value="Dinner" id="services_2" <?php 
						if($_SESSION['step2']['services'][2] == "Dinner") echo 'checked="checked" ';  ?> /></td>
              <td>Dinner</td>
            </tr>
            <tr>
              <td><input type="checkbox" name="services[3]" value="PM Break" id="services_3" <?php 
						if($_SESSION['step2']['services'][0] == "PM Break") echo 'checked="checked" ';  ?> /></td>
              <td>PM Break</td>
              <td><input type="checkbox" name="services[4]" value="Plated Lunch" id="services_4" <?php 
						if($_SESSION['step2']['services'][0] == "Plated Lunch") echo 'checked="checked" ';  ?> /></td>
              <td>Plated Lunch</td>
              <td><input type="checkbox" name="services[5]" value="Reception" id="services_5" <?php 
						if($_SESSION['step2']['services'][0] == "Reception") echo 'checked="checked" ';  ?> /></td>
              <td>Reception</td>
            </tr>
            <tr>
              <td><input type="checkbox" name="services[6]" value="Hot Breakfast" id="services_6" <?php 
						if($_SESSION['step2']['services'][0] == "Hot Breakfast") echo 'checked="checked" ';  ?> /></td>
              <td>Hot Breakfast</td>
              <td><input type="checkbox" name="services[7]" value="Working Lunch Buffet" id="services_7" <?php 
						if($_SESSION['step2']['services'][0] == "Working Lunch Buffet") echo 'checked="checked" ';  ?> /></td>
              <td>Working Lunch Buffet</td>
              <td><input type="checkbox" name="services[8]" value="Other" id="services_8" <?php 
						if($_SESSION['step2']['services'][0] == "Other") echo 'checked="checked" ';  ?> /></td>
              <td>Other</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><input name="startover" class="button" type="button" value="Start Over" onclick="location.href='index.php'" />
          &nbsp;&nbsp;&nbsp;<input name="reset" class="button" type="reset" value="Reset Form" /></td>
          <td align="right"><input name="submit" class="button" type="submit" value="Next" /></td>
        </tr>
      </table>

      <input type="hidden" name="MM_Submit" id="MM_Submit" value="step2" />
    </form></div>
  </div>
  <div style="clear:both"></div>
  <div style="text-align:right; margin:10px">Back to <a href="http://msharmonydesigns.com/wp/digital/">msharmonydesigns.com</a></div>
</div>
</body>
</html>
