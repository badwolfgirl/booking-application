<?php 
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request for Proposal Step 2</title>


<link href="eventBooking.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
postState = '<?php echo $_SESSION["step3"]["state"] ?>';
postCountry = '<?php echo $_SESSION["step3"]["postCountry"] ?>';
</script>

<?php 
	include('commonJS.php');
?>
</head>

<body>
<div id="eventBooking">
  <div id="sty2Left"><img src="images/brochure_table_half.jpg" width="315" height="430" /></div>
  <div id="sty2Right">
  	<div class="header">Request for Proposal: <?php echo $_SESSION['step1']['roomHid'] ?></div>
  	<div class="description">Please fill out the following details to submit your request for a <strong><?php echo $_SESSION['step1']['eventHid'].'</strong> for <strong>'.$_SESSION['step1']['peopleHid'].' Attendees</strong> in the <strong>'.$_SESSION['step1']['roomHid'].'</strong> with a <strong>'.$_SESSION['step1']['setupHid']; ?></strong> seating arrangement <a href="index.php">(change)</a>. Cindy White, Sales Coordinator, is also happy to hear from you by phone at (555) 123-456 or by email at <a href="mailto:info@msharmonydesigns.com">info@msharmonydesigns.com </a></div>
  	<div class="subHead">Contact Information: <span style="color:#F00"><?php if(isset($_SESSION['note'])) echo $_SESSION['note']; ?></span></div>
  	<div class="form"><form name="finalSteps" id="finalSteps" action="proposal.php" method="POST">
    	<table width="100%" border="0" cellspacing="6" cellpadding="0">
        <tr>
          <td width="100">First Name:</td>
          <td align="right"><input name="firstNm" type="text" id="firstNm" class="<?php if(isset($_SESSION['step3']['MM_Submit']) && $_SESSION['step3']['firstNm'] == ''){ echo 'blankForm'; }else{ echo ''; } ?>" value="<?php echo $_SESSION['step3']['firstNm'] ?>" size="35" /></td>
          <td width="100">Last Name:</td>
          <td align="right"><input type="text" name="lastNm" id="lastNm" class="<?php if(isset($_SESSION['step3']['MM_Submit']) && $_SESSION['step3']['lastNm'] == ''){ echo 'blankForm'; }else{ echo ''; } ?>" value="<?php echo $_SESSION['step3']['lastNm'] ?>" size="35" /></td>
        </tr>
        <tr>
          <td>Company:</td>
          <td align="right"><input type="text" name="company" id="company" value="<?php echo $_SESSION['step3']['company'] ?>" size="35" /></td>
          <td>Email:</td>
          <td align="right"><input type="text" name="email" id="email" size="35" class="<?php if(isset($_SESSION['step3']['MM_Submit']) && $_SESSION['step3']['email'] == ''){ echo 'blankForm'; }else{ echo ''; } ?>" value="<?php echo $_SESSION['step3']['email'] ?>" /></td>
        </tr>
        <tr>
          <td>Telephone:</td>
          <td align="right"><input type="text" name="phone" id="phone" size="35" class="<?php if(isset($_SESSION['step3']['MM_Submit']) && $_SESSION['step3']['phone'] == ''){ echo 'blankForm'; }else{ echo ''; } ?>" value="<?php echo $_SESSION['step3']['phone'] ?>" /></td>
          <td>Fax:</td>
          <td align="right"><input type="text" name="fax" id="fax" size="35" value="<?php echo $_SESSION['step3']['fax'] ?>" /></td>
        </tr>
        <tr>
          <td>Mailing Address:</td>
          <td colspan="3" align="right"><input type="text" name="address" id="address" value="<?php echo $_SESSION['step3']['address'] ?>" style="width:90%" /></td>
          </tr>
        <tr>
          <td>Country:</td>
          <td align="right"><select id="countrySelect" name="country" onchange="populateState()">
          </select></td>
          <td>City:</td>
          <td align="right"><input type="text" name="city" id="city" value="<?php echo $_SESSION['step3']['city'] ?>" size="35" /></td>
        </tr>
        <tr>
          <td>Providence/State:</td>
          <td align="right">
          	<select id="stateSelect" name="state">
        		</select>
            <script type="text/javascript">initCountry('CA'); </script></td>
          <td nowrap="nowrap">Postal Code:</td>
          <td align="right"><input type="text" name="postalCode" id="postalCode" value="<?php echo $_SESSION['step3']['postalCode'] ?>" /></td>
        </tr>
        <tr>
          <td colspan="2" width="45%">What else do we need to know about the event?</td>
          <td colspan="2" width="55%"><textarea name="addDetails" rows="1" id="addDetails" style="width:98%; height:24px;"><?php echo $_SESSION['step3']['addDetails'] ?></textarea></td>
          </tr>
        <tr>
          <td colspan="2">How did you hear about us?</td>
          <td colspan="2"><textarea name="hearAbout" id="hearAbout" style="width:98%; height:24px;"><?php echo $_SESSION['step3']['hearAbout'] ?></textarea></td>
          </tr>
        <tr>
          <td colspan="2"><input name="startover" class="button" type="button" value="Start Over" onclick="location.href='index.php'" />
          &nbsp;&nbsp;&nbsp;<input name="reset" class="button" type="reset" value="Reset Form" /></td>
          <td colspan="2" align="right">
          	<input name="button" class="button" type="button" value="Previous" onClick="history.go(-1);" />&nbsp;&nbsp;
          	<input name="submit" class="button" type="submit" value="Submit" />
          </td>
        </tr>
      </table>
      <input type="hidden" name="MM_Submit" id="MM_Submit" value="step3" />
    </form></div>
  </div>
  <div style="clear:both"></div>
  <div style="text-align:right; margin:10px">Back to <a href="http://msharmonydesigns.com/wp/digital/">msharmonydesigns.com</a></div>
</div>
</body>
</html>
