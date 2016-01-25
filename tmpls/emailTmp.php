<?php 
$msg = "
<html>
<table width=\"1000\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	<tr>
		<td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" style=\"border:1px solid #996\">
			<tr>
				<td style=\"border-bottom:1px solid #996\" colspan=\"2\"><h3>Event Details / Amenities</h3></td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Event Type</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step1']['eventHid']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Attendees</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step1']['peopleHid']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Room Setup</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step1']['roomHid']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Setup Type</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step1']['setupHid']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Event Dates & Times</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".'Arrival: '.$_SESSION['step2']['arriveDate'].' at '.$_SESSION['step2']['arriveTime'].'
				<br />
				Departure: '.$_SESSION['step2']['departDate'].' at '.$_SESSION['step2']['departTime']."
				</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Dates Flexable</strong>;</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step2']['flexibleDates']."</td>
			</tr>";
if($_SESSION['step2']['flexibleDates'] == "Yes"){
	$msg .= "
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>How Dates are Flexible</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step2']['flexDetails']."</td>
			</tr>";
}
$msg .= "
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Hotel Facilites Required</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step2']['facilities']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Audio-visual equipment or Technology</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step2']['technologyEquip']."</td>
			</tr>
			<tr>
				<td valign=\"top\"><strong>Food and beverage services required</strong>:</td>
				<td>".$_SESSION['step2']['servs'] ."</td>
			</tr>
		</table>
		<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" style=\"border:1px solid #996\">
			<tr>
				<td style=\"border-bottom:1px solid #996\" colspan=\"4\"><h3>Contact Information</h3></td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\" width=\"100\"><strong>First Name</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['firstNm']."</td>
				<td style=\"border-bottom:1px dotted #996\" width=\"100\"><strong>Last Name</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['lastNm']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Company</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['company']."</td>
				<td style=\"border-bottom:1px dotted #996\"><strong>Email</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['email']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Telephone</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['phone']."</td>
				<td style=\"border-bottom:1px dotted #996\"><strong>Fax</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['fax']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Mailing Address</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\" colspan=\"3\">".$_SESSION['step3']['address']."</td>
				</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Country</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['country']."</td>
				<td style=\"border-bottom:1px dotted #996\"><strong>City</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['city']."</td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\"><strong>Providence/State</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['state']."</td>
				<td style=\"border-bottom:1px dotted #996\"><strong>Postal Code</strong>:</td>
				<td style=\"border-bottom:1px dotted #996\">".$_SESSION['step3']['postalCode']."</td>
			</tr>
			<tr>
				<td colspan=\"4\"><strong>Additional Event Details?</strong></td>
			</tr>
			<tr>
				<td style=\"border-bottom:1px dotted #996\" colspan=\"4\">".$_SESSION['step3']['addDetails']."</td>
				</tr>
			<tr>
				<td colspan=\"4\"><strong>Heard of us from</strong>:</td>
			</tr>
			<tr>
				<td colspan=\"4\">".$_SESSION['step3']['hearAbout']."</td>
				</tr>
		</table></td>
	</tr>
</table>";
