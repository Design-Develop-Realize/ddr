<?php
echo "<html>";
echo "<style type='text/css'>.nobrtable br { display: none }</style>";
echo "<div class='nobrtable'>";
echo "<title>TestPage</title>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";

echo "<body>";

// Init DB connection
			$conn = mysqli_connect("designdeveloprealize.com", "designde_poise", "vindicator", "designde_poise");
			//$conn = mysqli_connect("localhost", "root", "", "npo");
			if (!$conn) {
				die('Could not connect to database: '.mysqli_error());
			}
			// Acquire member info
			$querystr = "SELECT rulername, nation_id, nationstrength, warchest, brigade, infra, tech, nukes, spies, mp, sdi, pent, wrc, fafb, aadn, hnms, warpeace, wc_compliance, tier FROM member";
			$result = mysqli_query($conn, $querystr);
			
			
						if(!$result) {
				die('Error fetching members: '.mysqli_error($conn));
			}
$ccolour = "Black";
$myrowcount = 5;

$myrowcount = mysqli_num_rows($result);
$i=0;
echo "<table border='1'>";
echo "<td>rulername</td>";
echo "<td>nation_id</td>";
echo "<td>nationstrength</td>";
echo "<td>warchest</td>";
echo "<td>wonders</td>";
echo "<td>mp</td>";
echo "<td>sdi</td>";
echo "<td>pent</td>";
echo "<td>wrc</td>";
echo "<td>fafb</td>";
echo "<td>aadn</td>";
echo "<td>hnms</td>";
echo "<td>spies</td>";
echo "<td>warpeace</td>";
echo "<td>brigade</td>";
echo "<td>infra</td>";
echo "<td>tech</td>";
echo "<td>nukes</td>";
echo "<td>tier</td>";
echo "<td>wc_compliance</td></tr>";
echo "<br>";

while ($row = $result->fetch_assoc())
{
	$wcarrey[0][$i] = $row["rulername"];
	$wcarrey[1][$i] = $row["nation_id"];
	$wcarrey[2][$i] = $row["nationstrength"];
	$wcarrey[3][$i] = $row["warchest"];
	$wcarrey[4][$i] = $row["wonders"];
	$wcarrey[5][$i] = $row["mp"];
	$wcarrey[6][$i] = $row["sdi"];
	$wcarrey[7][$i] = $row["pent"];
	$wcarrey[8][$i] = $row["wrc"];
	$wcarrey[9][$i] = $row["fafb"];
	$wcarrey[10][$i] = $row["aadn"];
	$wcarrey[11][$i] = $row["hnms"];
	$wcarrey[12][$i] = $row["spies"];
	$wcarrey[13][$i] = $row["warpeace"];
	$wcarrey[14][$i] = $row["brigade"];
	$wcarrey[15][$i] = $row["infra"];
	$wcarrey[16][$i] = $row["tech"];
	$wcarrey[17][$i] = $row["nukes"];
	$wcarrey[18][$i] = $row["tier"];
	$wcarrey[19][$i] = $row["wc_compliance"];


	echo "<td>".$wcarrey[0][$i]."</td>";
	echo "<td>".$wcarrey[1][$i]."</td>";
	echo "<td>".$wcarrey[2][$i]."</td>";
	echo "<td>".$wcarrey[3][$i]."</td>";
	echo "<td>".$wcarrey[4][$i]."</td>";
	echo "<td>".$wcarrey[5][$i]."</td>";
	echo "<td>".$wcarrey[6][$i]."</td>";
	echo "<td>".$wcarrey[7][$i]."</td>";
	echo "<td>".$wcarrey[8][$i]."</td>";
	echo "<td>".$wcarrey[9][$i]."</td>";
	echo "<td>".$wcarrey[10][$i]."</td>";
	echo "<td>".$wcarrey[11][$i]."</td>";
	echo "<td>".$wcarrey[12][$i]."</td>";
	echo "<td>".$wcarrey[13][$i]."</td>";
	echo "<td>".$wcarrey[14][$i]."</td>";
	echo "<td>".$wcarrey[15][$i]."</td>";
	echo "<td>".$wcarrey[16][$i]."</td>";
	echo "<td>".$wcarrey[17][$i]."</td>";
	echo "<td>".$wcarrey[18][$i]."</td>";
	echo "<td>".$wcarrey[19][$i]."</td>";
	echo "<td>".$wcarrey[20][$i]."</td></tr>";
	echo "<br>";

	$i++;
}
echo "</table>";
echo "</body>";
echo "</div>";
echo "</html>";
?> 

