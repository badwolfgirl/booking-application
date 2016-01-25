<?php 

  session_start();
  include('includes/dbConnect.php');
  include('includes/dbClass.php');


  $db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
  $db->connect(true); 
	
	function genList($var){
		$list			= "<ul>";
		foreach($var as $item){
			$list		.= "<li>".$item."</li>";
		}
		$list			.= "</ul>";
		return $list;
	}
	function isValidEmail($email){
		return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
	}
	function sendHTMLemail($m,$f,$t,$s){
		$hdrs  = 'MIME-Version: 1.0' . "\r\n";
		$hdrs .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$hdrs .= 'From: '.$f."\r\n";
		
		if(mail($t,$s,$m,$hdrs)){
			return true;
		}else{
			return false;
		}
	}


	if($_POST['MM_Submit']){
		
		switch($_POST['MM_Submit']){
			case 'step1':
				$_SESSION['step1'] = $_POST;
				header("Location: index.php?pg=step2");
			break;
			case 'step2':
				$_SESSION['step2'] = $_POST;
				if($_POST['services'])
					$_SESSION['step2']['servs'] = genList($_SESSION['step2']['services']);
				else
					$_SESSION['step2']['servs'] = 'No Food or Beverages Selected';
					
				
				header("Location: index.php?pg=step3");
			break;
			case 'step3':
			
				$_SESSION['step3'] = $_POST;
				
				if($_POST['firstNm'] == '' || $_POST['lastNm'] == '' || $_POST['email'] == '' || $_POST['phone'] == ''){
					$_SESSION['note']										= 'Please fill out the required fields to continue!';
					header("Location: index.php?pg=step3");
					
				}else{
			
				
					$_SESSION['note']										= '';
					
					if($_SESSION['step3']['email'] && isValidEmail($_SESSION['step3']['email'])){
						$from = $_SESSION['step3']['email'];
					}else{
						$from = 'eventbooking@lordnelsonhotels.com';
					}
					include('tmpls/emailTmp.php');
				
					//$to = 'eventbooking@lordnelsonhotels.com';
					$to = 'michele@msharmonydesigns.com';
				
				
					if(sendHTMLemail($msg,$from,$to,$subj)){
						unset($_SESSION);
						header("Location: index.php?pg=confirmation");
					}
				}
				
			break;
		}
			
			
		
	}

	

?>