<?php 
	include('controller.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Step 1 - Choose Event Type</title>


<link href="eventBooking.css" rel="stylesheet" type="text/css" />
<?php 
	include('commonJS.php');
?>
</head>

<body>
<div id="eventBooking">
  <div id="sty1Left">
  	<div class="header">Book Your Event</div>
  	<div class="form"><form name="formSteps" method="post" id="formSteps" action="">
    	<p>What type of event are you having?<br>
      	<select name="event" id="event">
        	<option>-- Select --</option>
<?php 
	if($data['events']){
		foreach($data['events'] as $eVal){
?>
        	<option value="<?php echo $eVal['id']; ?>"><?php echo $eVal['name']; ?></option>
<?php 
		}
	}
?>
        </select></p>
    	<p>How many guests will be attending?<br>
      	<input type="text" name="people" id="people" size="4"></p>
    	<p>Which room would you prefer?<br>
      	<select name="room" id="room">
        	<option>-- Select --</option>
        </select></p>
    	<p>Which available room layout do you want?<br>
      	<select name="setup" id="setup">
        	<option>-- Select --</option>
        </select></p>
        <input type="hidden" name="MM_Submit" id="MM_Submit" value="step" />
    </form></div>
  	<div class="moreinfo">Contact us if you need more<br />information.....</div>
  </div>
  <div id="sty1Right" style="position:relative">
    <div id="first" style="width:680px; position:relative">
    	<div class="header1"></div>
      <div class="imgBox1"><img src="images/ipad_main.jpg" width="680" height="430" id="rightImg"></div>
    </div>
    <div id="second" style="background-color:#eee7d5; width:680px;">
    	<div class="header2"></div>
      <div class="imgBox2" style="height:257px;"><img src="images/rooms/defaultMidSec.jpg" width="680" height="257" id="midImg"></div>
      <div id="btm" style="height:89px; padding:5px 3px 0;"></div>
    </div>
    
    <div id="reviewSide" style="position:relative; width:680px;">
      <div id="roomImg" style="position:relative">
        <img src="images/dining_wh.jpg" width="680" height="430"></div>
      <div class="RgtImgBox" style="position:absolute; width:340px; height:410px; top:0; right:0; background-color:#f9eacd; padding:10px;">
      <form name="finalSteps" id="finalSteps" action="proposal.php" method="POST">
      <table width="100%" border="0" cellspacing="0" cellpadding="5" id="finalChoices">
        <tr>
          <td colspan="2"><h2><div id="fnlRoom"></div><input name="roomHid" id="roomHid" type="hidden" /></h2></td>
        </tr>
        <tr valign="top">
          <td width="150" valign="top"><div id="rmLayout">
          	<img src="" width="150">
          </div></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
          		<td colspan="2"><h3>Room Specifications</h3></td>
            </tr>
            <tr>
              <td>Dimensions:</td>
              <td><div id="rmSize"></div></td>
            </tr>
            <tr>
              <td>Area:</td>
              <td><div id="rmArea"></div></td>
            </tr>
            <tr>
              <td>Ceiling:</td>
              <td><div id="rmCeil"></div></td>
            </tr>
          </table></td>
        </tr>
        <tr>
        	<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
          		<td colspan="2"><h3>Event Details</h3></td>
            </tr>
            <tr>
              <td>Event Type:</td>
              <td><div id="fnlEvent"></div><input name="eventHid" id="eventHid" type="hidden" /></td>
            </tr>
            <tr>
              <td>Attendees:</td>
              <td><div id="fnlPeople"></div><input name="peopleHid" id="peopleHid" type="hidden" /></td>
            </tr>
            <tr>
              <td>Room Setup:</td>
              <td><div id="fnlSetup"></div><input name="setupHid" id="setupHid" type="hidden" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input name="button" type="submit" value="Request Propsal" /></td>
        </tr>
      </table>
      	<input type="hidden" name="MM_Submit" value="step1" />
      </form>
      </div>
    </div>
    
  </div>
  <div style="clear:both"></div>
  <div style="text-align:right; margin:10px">Back to <a href="http://msharmonydesigns.com/wp/digital/">msharmonydesigns.com</a></div>
</div>
</body>
</html>
