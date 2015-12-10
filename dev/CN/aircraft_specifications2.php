<!--#include file="calculations_costs.php" -->
<table width=450 border="1" bordercolor="#C0C0C0" cellspacing="0" cellpadding="2">
<? if ($_GET["aircraft_specifications"]!="")
{
?>
		
	<tr>
		<td width="108%" align="right" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="4" bgcolor="#E9E9E9">
		<p align="left">
		<table border="1" id="table5" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" width="100%">
			<tr>
				<td width="100%"><b>
				<p align="left"><?   echo $_GET["aircraft_specifications"]; ?> 
				Aircraft Specifications</b></td>
			</tr>
		</table>
		</td>
		</tr>
	<tr>
		<td width="108%" align="left" style="font-family: Verdana, Tahoma, Arial, sans-serif; font-size: 10px; color: #000" colspan="4" bgcolor="#FFFFFF">
		<p align="center">
		
		
		<? 
  switch ($_GET["aircraft_specifications"])
  {
    case "Yakovlev Yak-9":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_01.JPG' title='Yakovlev Yak-9'>";
      print "<p> Maximum speed: 417 mph at altitude (672 km/h)";
      print "<br> Armament: 1x 20 mm ShVAK cannon, 120 rounds of ammunition, 2x 12.7 mm UBS machine guns, 170 rounds of ammunition each";
      print "<br> Requirments: ".$f1_infras." infrastructure, ".$f1_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f1][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 1";
      break;
    case "P-51 Mustang":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_02.JPG' title='P-51 Mustang'>";
      print "<p> Maximum speed: 487 mph (784 km/h) at 25,000 ft (7,620 m)";
      print "<br> Armament: 6x 0.50 in (12.7 mm) machine guns with 1,880 rounds/gun, or 4 guns with 1,600 rounds/gun ";
      print "<br> Requirments: ".$f2_infras." infrastructure, ".$f2_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f2][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 2";
      break;
    case "F-86 Sabre":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_03.JPG' title='F-86 Sabre'>";
      print "<p> Maximum speed: 685 mph (1,100 km/h) ";
      print "<br> Armament: Six 0.50 cal (12.7 mm) machine guns ";
      print "<br> Requirments: ".$f3_infras." infrastructure, ".$f3_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f3][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 3";
      break;
    case "Mikoyan-Gurevich MiG-15":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_04.JPG' title='Mikoyan-Gurevich MiG-15'>";
      print "<p> Maximum speed: 778 mph (1,075 km/h)";
      print "<br> Armament: 2x 23 mm Nudelman-Rikhter NR-23KM cannons (80 rounds per gun, 160 rounds total), and 1x 37 mm NL-37D cannon";
      print "<br> Requirments: ".$f4_infras." infrastructure, ".$f4_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f4][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 4";
      break;
    case "F-100 Super Sabre":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_05.JPG' title='F-100 Super Sabre'>";
      print "<p> Maximum speed: 864 mph (1,390 km/h) ";
      print "<br> Armament: 4 x 20 mm M39 cannons 4x AIM-9 Sidewinder or GAM-83 Bullpup missiles";
      print "<br> Requirments: ".$f5_infras." infrastructure, ".$f5_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f5][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 5";
      break;
    case "F-35 Lightning II":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_06.JPG' title='F-35 Lightning II'>";
      print "<p> Maximum speed: Mach 1.8 (1,200 mph, 1930 km/h)";
      print "<br> Armament: Up to four AIM-120 AMRAAM, AIM-9X Sidewinder or AIM-132 ASRAAM internally or two air-to-air and two air-to-ground weapons";
      print "<br> Requirments: ".$f6_infras." infrastructure, ".$f6_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f6][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 6";
      break;
    case "F-15 Eagle":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_07.JPG' title='F-15 Eagle'>";
      print "<p> Maximum speed: Mach 2.5, 1,650 mph at high altitude";
      print "<br> Armament: Internally mounted M-61A1 20-mm six-barrel cannon, external AIM-7F Sparrows, AIM-120 AMRAAMs, and AIM-9 Sidewinders.";
      print "<br> Requirments: ".$f7_infras." infrastructure, ".$f7_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f7][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 7";
      break;
    case "Su-30 MKI":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_08.JPG' title='Su-30 MKI'>";
      print "<p> Maximum speed: Mach 2+, 1,330+ mph at high altitude";
      print "<br> Armament: The Su-30MKI combat load is mounted on 12 stations. The maximum advertised combat load is 8000 kg (17,600 lbs)";
      print "<br> Requirments: ".$f8_infras." infrastructure, ".$f8_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f8][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 8";
      break;
    case "F-22 Raptor":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/fighter_09.JPG' title='F-22 Raptor'>";
      print "<p> Maximum speed: 2.42, ~1,600 mph at high altitude";
      print "<br> Armament: 6× AIM-120 AMRAAM, 2× AIM-9 Sidewinder";
      print "<br> Requirments: ".$f9_infras." infrastructure, ".$f9_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$f9][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 9";

      break;
    case "AH-1 Cobra":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_01.JPG' title='AH-1 Cobra'>";
      print "<p> Maximum speed: 120 mph (104 knots, 195 km/h) ";
      print "<br> Ordnance: TOW Missiles - 4 to 8 missiles mounted in two-missile launchers on each hardpoint.";
      print "<br> Requirments: ".$f1_infras." infrastructure, ".$f1_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b1][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 1";
      break;
    case "AH-64 Apache":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_02.JPG' title='AH-64 Apache'>";
      print "<p> Maximum speed: 182 mph (158 knots, 293 km/h)";
      print "<br> Ordnance: Combination of AGM-114 Hellfire, AIM-92 Stinger, AIM-9 Sidewinder, Hydra 70 FFA Rockets.";
      print "<br> Requirments: ".$f2_infras." infrastructure, ".$f2_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b2][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 2";
      break;
    case "Bristol Blenheim":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_03.JPG' title='Bristol Blenheim'>";
      print "<p> Maximum speed: 266 mph (231 knots, 428 km/h)";
      print "<br> Ordnance: 2× 500 lb (230 kg) bombs ";
      print "<br> Requirments: ".$f3_infras." infrastructure, ".$f3_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b3][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 3";
      break;
    case "B-25 Mitchell":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_04.JPG' title='B-25 Mitchell'>";
      print "<p> Maximum speed: 275 mph (239 knots, 442 km/h) ";
      print "<br> Ordnance: 6,000 lb (2,700 kg) bombs";
      print "<br> Requirments: ".$f4_infras." infrastructure, ".$f4_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b4][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 4";
      break;
    case "B-17G Flying Fortress":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_05.JPG' title='B-17G Flying Fortress'>";
      print "<p> Maximum speed: 287 mph (249 knots, 462 km/h) ";
      print "<br> Ordnance: 4,500 lb (2,000 kg) on long-range missions";
      print "<br> Requirments: ".$f5_infras." infrastructure, ".$f5_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b5][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 5";
      break;
    case "B-52 Stratofortress":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_06.JPG' title='B-52 Stratofortress'>";
      print "<p> Maximum speed: 650 mph (560 knots, 1,000 km/h)";
      print "<br> Ordnance: Up to 60,000 lb (27,200 kg) bombs, missiles, and mines, in various configurations ";
      print "<br> Requirments: ".$f6_infras." infrastructure, ".$f6_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b6][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 6";
      break;
    case "B-2 Spirit":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_07.JPG' title='B-2 Spirit'>";
      print "<p> Maximum speed: 475 mph (410 knots, 764 km/h)";
      print "<br> Ordnance: 40,000 lb (18,000 kg) of Bomb Rack Assembly mounted 500 lb class bombs (Mk82) (total carriage quantity: 80)";
      print "<br> Requirments: ".$f7_infras." infrastructure, ".$f7_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b7][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 7";
      break;
    case "B-1B Lancer":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_08.JPG' title='B-1B Lancer'>";
      print "<p> Maximum speed: Mach 1.25 (950 mph, 1,330 km/h) ";
      print "<br> Ordnance: Up to 75,000 lb (34,000 kg) bombs, missiles, and mines, in various configurations";
      print "<br> Requirments: ".$f8_infras." infrastructure, ".$f8_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b8][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 8";
      break;
    case "Tupolev Tu-160":
      print "<img src='http://images.cybernations.net/images/aircraft/aircraft_large/bomber_09.JPG' title='Tupolev Tu-160'>";
      print "<p> Maximum speed: Mach 2.05 (1,380 mph, 2,220 km/h)";
      print "<br> Ordnance: 40,000 kg (88,200 lb) of ordnance";
      print "<br> Requirments: ".$f9_infras." infrastructure, ".$f9_tech." technology";
      print "<br> Base Purchase Cost: $".$FormatNumber[$b9][0];
      print "<br> Daily Maintenance: $".$FormatNumber[$dailyaircraftcost][0];
      print "<br> Strength: 9";
      break;
  } 
?></td></tr>
	<? }
  else
{
?>
	You must select a valid aircraft to preview.
	<? } ?>
	</table>
