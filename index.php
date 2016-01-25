<?php
if(isset($_GET['pg']))
	include('tmpls/'.$_GET['pg'].'.php');
else
	include('tmpls/step1.php')

?>