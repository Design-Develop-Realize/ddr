<?php
if(isset($_POST['format']) && $_POST['format'] != '')
{
//    echo urldecode($_POST['filter'])."<br /><br /><br />";
	switch($_POST['format'])
	{
		case 'full':
			if(!isset($_POST['brigade']))
			{
				die("No brigade selected!");
			}
			// Set POST vars
			$brigade = $_POST['brigade'];
			$field = 'nationstrength';
			$order = 'desc';
			
			// Init DB connection
			$conn = mysqli_connect("designdeveloprealize.com", "designde_poise", "vindicator", "designde_poise");
			//$conn = mysqli_connect("localhost", "root", "", "npo");
			if (!$conn) {
				die('Could not connect to database: '.mysqli_error());
			}
			// Acquire member info
			$querystr = "SELECT rulername, nation_id, nationstrength, infra, tech, nukes, spies, mp, sdi, pent, wrc, fafb, aadn, hnms, warpeace, tier FROM member_latest";
			if(isset($_POST['filter'])) {
			    $querystr .= urldecode($_POST['filter']);
			}
			/*if(strlen($brigade) > 0) {
				$querystr .= " WHERE brigade='".$brigade."'";
			}*/
			$querystr .= " ORDER BY ".$field." ".$order;
			$result = mysqli_query($conn, $querystr);
				
			if(!$result) {
				die('Error fetching members: '.mysqli_error($conn));
			}
			
			echo "[center][table] [tr][td][center][b]Ruler[/b][/center]" .
			     "[/td][td][center][b]Strength[/b][/center][/td]" .
			     "[td][center][b]Infra[/b][/center][/td][td]" .
			     "[center][b]Tech[/b][/center][/td]" .
			     "[td][center][b]Nukes[/b][/center][/td][td]" .
			     "[center][b]MP[/b][/center][/td]" .
			     "[td][center][b]Spies[/b][/center][/td][td][center][b]SDI[/b][/center][/td][td][center][b]PENT[/b]" .
			     "[/center][/td][td][center][b]WRC[/b][/center][/td][td]" .
			     "[center][b]FAFB[/b][/center][/td][td][center][b]AADN[/b]" .
			     "[/center][/td][td][center][b]HNMS[/b][/center][/td][td][center][b]Mode[/b][/center][/td][td][center][b]Tier[/b][/center][/td][/tr]";

           while($row = $result->fetch_assoc()) {
                echo"[tr]";
                
                foreach(array_keys($row) as $key) {
                    $val = $row[$key];
                    
                if($key == "rulername") {
        						$val = "[url=http://www.cybernations.net/nation_drill_display.asp?Nation_ID=" . $row["nation_id"] . "]" . $val . "[/url]";
        					}
                    if($key == "nation_id") {
                        continue;
                    }
                    if($key == 'infra' || $key == 'tech') {
                    	$val = "[center]" . number_format($val, 2) . "[/center]";
                    }
                    if($key == "nationstrength" || $key == 'nukes' || $key == 'tier') {
                        $val = number_format($val);
                    }
                    if($key == "mp" || $key == "sdi" || $key == "pent" || $key == "wrc" || $key == "fafb" || $key == "aadn" || $key == "hnms") {
                        $val = ($val == 1) ? "[img]http://poise.designdeveloprealize.com/tick.gif[/img]" : "[img]http://poise.designdeveloprealize.com/cross.gif[/img]";
                    }
                    if($key == "warpeace") {
                        $val = ($val == "war") ? "[img]http://poise.designdeveloprealize.com/war.gif[/img]" : "[img]http://poise.designdeveloprealize.com/peace.gif[/img]";
                    }
                    
                    echo "[td]".$val."[/td]";
                }
                
                echo "[/tr]";
                $rowcount++;
            }
            
            echo "[/table]";
            
            $result->close();
            
            // Close connection
            mysqli_close($conn);
			break;
			
			
		case 'short':
			if(!isset($_POST['brigade']))
			{
				die("No brigade selected!");
			}
    		// Set POST vars
			$brigade = $_POST['brigade'];
			$field = 'nationstrength';
			$order = 'desc';

			echo "[center][table] [tr][td][center][b]Ruler[/b][/center]" .
			     "[/td][td][center][b]Strength[/b][/center][/td]" .
			     "[td][center][b]Infra[/b][/center][/td][td] " .
			     "[/td][td][center][b]Tech[/b][/center][/td][td] [/td]" .
			     "[td][center][b]Nukes[/b][/center][/td][td][center]" .
			     "[b]Mode[/b][/center][/td][td][center][b]Tier[/b][/center][/td][/tr]";

			// Init DB connection
			$conn = mysqli_connect("designdeveloprealize.com", "designde_poise", "vindicator", "designde_poise");
			//$conn = mysqli_connect("localhost", "root", "", "npo");
			if (!$conn) {
				die('Could not connect to database: '.mysqli_error());
			}
			// Acquire member info
			$querystr = "SELECT rulername, nation_id, nationstrength, infra, tech, nukes, warpeace, tier FROM member_latest";
			if(isset($_POST['filter'])) {
			    $querystr .= urldecode($_POST['filter']);
			}
			$querystr .= " ORDER BY ".$field." ".$order;
			$result = mysqli_query($conn, $querystr);
			
			if(!$result) {
				die('Error fetching members: '.mysqli_error($conn));
			}
            
			while($row = $result->fetch_assoc()) {
				echo "[tr]";
				foreach(array_keys($row) as $key) {
					$val = $row[$key];
			
					if($key == "rulername") {
						$val = "[url=http://www.cybernations.net/nation_drill_display.asp?Nation_ID=" . $row["nation_id"] . "]" . $val . "[/url]";
					}
					if($key == "nation_id") {
						continue;
					}
					if($key == 'infra' || $key == 'tech') {
						$val = "[center]" . number_format($val, 2) . "[/center][/td][td] ";
					}
					if($key == "nationstrength" || $key == 'nukes' || $key == 'tier') {
						$val = "[center]" . number_format($val) . "[/center]";
					}
					if($key == "warpeace") {
						$val = ($val == "war") ? "[img]http://poise.designdeveloprealize.com/war.gif[/img]" : "[img]http://poise.designdeveloprealize.com/peace.gif[/img]";
					}
			
					echo "[td]".$val."[/td]";
				}
			
				echo "[/tr]";
				$rowcount++;
			}
			
			echo "[/table]";
	    break;
	}
}
?>