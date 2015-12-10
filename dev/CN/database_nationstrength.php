<? 
// $rsStrength is of type "ADODB.Recordset"

$rsStrengthSQL="SELECT Strength,Land_Purchased,Tanks_Deployed,Tanks_Defending,Cruise_Purchased,Nuclear_Purchased,Technology_Purchased,Infrastructure_Purchased,Military_Purchased,Military_Attacking_Casualties,Military_Defending_Casualties FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsStrengthSQL);

// $rsAircraft is of type "ADODB.Recordset"

$rsAircraftSQL="SELECT * FROM Aircraft WHERE Nation_ID=".intval($lngRecordNo);
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAircraftSQL);
if (!($rsAircraft_BOF==1) && !($rsAircraft==0))
{

  $fighter_strength=$rsAircraft["Yakovlev Yak-9"]*1+$rsAircraft["P-51 Mustang"]*2+$rsAircraft["F-86 Sabre"]*3+$rsAircraft["Mikoyan-Gurevich MiG-15"]*4+$rsAircraft["F-100 Super Sabre"]*5+$rsAircraft["F-35 Lightning II"]*6+$rsAircraft["F-15 Eagle"]*7+$rsAircraft["Su-30 MKI"]*8+$rsAircraft["F-22 Raptor"]*9;
  $bomber_strength=$rsAircraft["AH-1 Cobra"]*1+$rsAircraft["AH-64 Apache"]*2+$rsAircraft["Bristol Blenheim"]*3+$rsAircraft["B-25 Mitchell"]*4+$rsAircraft["B-17G Flying Fortress"]*5+$rsAircraft["B-52 Stratofortress"]*6+$rsAircraft["B-2 Spirit"]*7+$rsAircraft["B-1B Lancer"]*8+$rsAircraft["Tupolev Tu-160"]*9;
} 


$rsAircraft=null;

$aircraft_strength=($fighter_strength*5)+($bomber_strength*5);


if (!isset($rsStrength["Land_Purchased"]))
{

  $landstrength=0;
}
  else
{

  $landstrength=$rsStrength["Land_Purchased"];
} 


if (!isset($rsStrength["Tanks_Deployed"]))
{

  $tanksdeploystrength=0;
}
  else
{

  $tanksdeploystrength=$rsStrength["Tanks_Deployed"];
} 


if (!isset($rsStrength["Tanks_Defending"]))
{

  $tanksdefendstregth=0;
}
  else
{

  $tanksdefendstregth=$rsStrength["Tanks_Defending"];
} 


if (!isset($rsStrength["Cruise_Purchased"]))
{

  $cruisestrength=0;
}
  else
{

  $cruisestrength=$rsStrength["Cruise_Purchased"];
} 

if ($cruisestrength>100)
{
  $cruisestrength=100;
}
;
} 

if (!isset($rsStrength["Nuclear_Purchased"]))
{

  $nukestrength=0;
}
  else
{

  $nukestrength=$rsStrength["Nuclear_Purchased"];
} 


if (!isset($rsStrength["Infrastructure_Purchased"]))
{

  $infrasstrength=0;
}
  else
{

  $infrasstrength=$rsStrength["Infrastructure_Purchased"];
} 


if (!isset($rsStrength["Military_Purchased"]))
{

  $milpurstrength=0;
}
  else
{

  $milpurstrength=$rsStrength["Military_Purchased"];
} 


if (!isset($rsStrength["Military_Attacking_Casualties"]))
{

  $milattakstrength=0;
}
  else
{

  $milattakstrength=$rsStrength["Military_Attacking_Casualties"];
} 


if (!isset($rsStrength["Military_Defending_Casualties"]))
{

  $mildefendstrength=0;
}
  else
{

  $mildefendstrength=$rsStrength["Military_Defending_Casualties"];
} 


if (!isset($rsStrength["Technology_Purchased"]))
{

  $techstrength=0;
}
  else
{

  $techstrength=$rsStrength["Technology_Purchased"];
} 


$database_nationstrength=($landstrength*1.5)+($aircraft_strength)+($tanksdeploystrength*.75)+($tanksdefendstregth*1.0)+($cruisestrength*1.5)+($nukestrength*50)+($techstrength*20)+($infrasstrength*3)+(.1*($milpurstrength-$mildefendstrength-$milattakstrength));
if ($database_nationstrength>100000)
{
  $database_nationstrength=100000;
}
;
} 
if ($database_nationstrength<0)
{
  $database_nationstrength=0;
}
;
} 

if ($rsStrength["Strength"]!=$database_nationstrength || !isset($rsStrength["Strength"]))
{

$rsStrength["Strength"]=$database_nationstrength;
    
} 



$rsStrength=null;

?>
