<?php 

  session_start();
  include('includes/dbConnect.php');
  include('includes/dbClass.php');


  $db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
  $db->connect(true); 

  $e = 0;
  $eventRows = $db->query("SELECT * FROM `".events."`"); 
  while ($eventRow = $db->fetch_array($eventRows)) { $e++;  
    $data['events'][$e] = $eventRow;
  }

  switch($_POST['step']){

    case 'event':

      $_SESSION[$_POST['step']] = $_POST[$_POST['step']];
      echo $_SESSION['eventNm'];

      break;
    case 'people':     
      $_SESSION[$_POST['step']] = $_POST[$_POST['step']];		

      $configRooms = $db->query("
      
        SELECT e.id as eID, e.name as eNm, r.id as rID, r.name as rNm, c.min as cMin, c.max as cMax, c.id as cID
        FROM `Config` as c 
        INNER JOIN `".events."` AS e ON c.etId = e.id
        INNER JOIN `".rooms."` AS r ON c.rId = r.id
        WHERE e.id = ".$_SESSION['event']." && (".$_SESSION['people']." <= c.max && ".$_SESSION['people']." >= c.min)
        GROUP BY rID ORDER BY rID
        
      ");
      
      $return[0] 				= '<option>-- Select --</option>';
      while ($configRoom = $db->fetch_array($configRooms)) {
        $return[0]			.= '<option value="'. $configRoom['rID'].'">'.$configRoom['rNm'].'</option>';   
        $return[1]			.= '<div class="thumb"><img src="images/rooms/thmb'.$configRoom['rID'].'.jpg" onmouseover="javascript: imgSwap(\'room\', '.$configRoom['rID'].')" width="106" height="67" onclick="javascript: imgSelect(\'room\', '.$configRoom['rID'].')"></div>';
      }
      $return[1]				.= '<div style="clear:both"></div>';
			
      echo(json_encode($return));


      break;
    case 'room':
      $_SESSION[$_POST['step']] = $_POST[$_POST['step']];
      $configSetups = $db->query("SELECT e.id as eID, e.name as eNm, r.id as rID, r.name as rNm, s.id as sID, s.name as sNm, 
        c.min as cMin, c.max as cMax, c.id as cID
        FROM `Config` as c
        INNER JOIN `".events."` AS e ON c.etId = e.id
        INNER JOIN `".rooms."` AS r ON c.rId = r.id
        INNER JOIN `".setups."` AS s ON c.sId = s.id
        WHERE e.id = ".$_SESSION['event']." && 
        (".$_SESSION['people']." <= c.max && ".$_SESSION['people']." >= c.min) &&
        r.id = ".$_SESSION['room']."
      GROUP BY sID ORDER BY sID"); 

      $return[0] 			= '<option>-- Select --</option>';
      while ($configSetup = $db->fetch_array($configSetups)) {
        $return[0]			.= '<option value="'.$configSetup['sID'].'">'.$configSetup['sNm'].'</option>';   
        $return[1]			.= '<div class="thumb"><img src="images/rooms/'.$configSetup['rID'].'/thumbs/'.$configSetup['sID'].'.jpg" onmouseover="javascript: imgSwap(\'setup\', '.$configSetup['rID'].','.$configSetup['sID'].')" onclick="javascript: imgSelect(\'setup\', '.$configSetup['rID'].','.$configSetup['sID'].')" width="106" height="67"></div>';
      }
      $return[1]			.= '<div style="clear:both"></div>';
      echo(json_encode($return));

      break;
    case 'setup':
      $_SESSION[$_POST['step']] = $_POST[$_POST['step']];

      $configSetups = $db->query("SELECT 
																 	e.id as eID, e.name as eNm, 
																	r.id as rID, r.name as rNm,  r.ceiling as rCeil, r.dimension as rSize, r.area as rArea,
																	s.id as sID, s.name as sNm 
																	FROM `Config` as c
																	INNER JOIN `".events."` AS e ON c.etId = e.id
																	INNER JOIN `".rooms."` AS r ON c.rId = r.id
																	INNER JOIN `".setups."` AS s ON c.sId = s.id
																	WHERE e.id = ".$_POST['event']." && 
																	r.id = ".$_POST['room']." && s.id = ".$_POST['setup']); 

      while ($config = $db->fetch_array($configSetups)) {
				
				$return 			= array("eNm" => $config['eNm'], 
																"rNm" => $config['rNm'],
																"rCeil" => $config['rCeil'],
																"rSize" => $config['rSize'],
																"rArea" => $config['rArea'],
																"sNm" => $config['sNm']
																);
      }
      
      echo(json_encode($return));

      break;
  }



?>