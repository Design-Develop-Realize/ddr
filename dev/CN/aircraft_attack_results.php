<?
  session_start();
  session_register("MM_Username_session");
  session_register("activity_session");
  session_register("denyreason_session");
?>
<!--#include file="activity.php" -->
<? 
$declaring=0;
$receiving=0;
if (strtoupper($rsSent["Declaring_Nation_ID"])==strtoupper($rsAttack["Nation_ID"]))
{
  $declaring=1;
}
;
} 
if (strtoupper($rsSent["Receiving_Nation_ID"])==strtoupper($rsAttack["Nation_ID"]))
{
  $receiving=1;
}
;
} 

if ($receiving==0 && $declaring==0)
{

  $denyreason_session="There was an error in your form submission.";
  header("Location: "."activity_denied.asp");
} 


if ($receiving==1)
{

  if ($rsSent["Receiving_Aircraft_Date2"]==time()())
  {

    $denyreason_session="You have already launched two aircraft attacks today and cannot launch another aircraft attack again until tomorrow.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    if ($rsSent["Receiving_Aircraft_Date1"]==time()())
    {

      $rsSent["Receiving_Aircraft_Date2"]=time()();
    }
      else
    {

      $rsSent["Receiving_Aircraft_Date1"]=time()();
    } 

  } 

} 

if ($declaring==1)
{

  if ($rsSent["Declaring_Aircraft_Date2"]==time()())
  {

    $denyreason_session="You have already launched two aircraft attacks today and cannot launch another aircraft attack again until tomorrow.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    if ($rsSent["Declaring_Aircraft_Date1"]==time()())
    {

      $rsSent["Declaring_Aircraft_Date2"]=time()();
    }
      else
    {

      $rsSent["Declaring_Aircraft_Date1"]=time()();
    } 

  } 

} 

//Write the updated recordset to the database

$rsSent->Update;
$rsSent->Close;
$rsSent=null;




// First validate the form input

$f1=intval($_POST["f1"]);
if ($f1>$rsAircraft["Yakovlev Yak-9"] || $f1<0)
{

  $denyreason_session="Yakovlev Yak-9 aircraft error.".$rsAircraft["Yakovlev Yak-9"].$f1;
  header("Location: "."activity_denied.asp");
} 

$f2=intval($_POST["f2"]);
if ($f2>$rsAircraft["P-51 Mustang"] || $f2<0)
{

  $denyreason_session="P-51 Mustang aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$f3=intval($_POST["f3"]);
if ($f3>$rsAircraft["F-86 Sabre"] || $f3<0)
{

  $denyreason_session="F-86 Sabre aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$f4=intval($_POST["f4"]);
if ($f4>$rsAircraft["Mikoyan-Gurevich MiG-15"] || $f4<0)
{

  $denyreason_session="Mikoyan-Gurevich MiG-15 aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$f5=intval($_POST["f5"]);
if ($f5>$rsAircraft["F-100 Super Sabre"] || $f5<0)
{

  $denyreason_session="F-100 Super Sabre aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$f6=intval($_POST["f6"]);
if ($f6>$rsAircraft["F-35 Lightning II"] || $f6<0)
{

  $denyreason_session="F-35 Lightning II aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$f7=intval($_POST["f7"]);
if ($f7>$rsAircraft["F-15 Eagle"] || $f7<0)
{

  $denyreason_session="F-15 Eagle aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$f8=intval($_POST["f8"]);
if ($f8>$rsAircraft["Su-30 MKI"] || $f8<0)
{

  $denyreason_session="Su-30 MKI aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$f9=intval($_POST["f9"]);
if ($f9>$rsAircraft["F-22 Raptor"] || $f9<0)
{

  $denyreason_session="F-22 Raptor aircraft error.";
  header("Location: "."activity_denied.asp");
} 


$b1=intval($_POST["b1"]);
if ($b1>$rsAircraft["AH-1 Cobra"] || $b1<0)
{

  $denyreason_session="AH-1 Cobra aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$b2=intval($_POST["b2"]);
if ($b2>$rsAircraft["AH-64 Apache"] || $b2<0)
{

  $denyreason_session="AH-64 Apache aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$b3=intval($_POST["b3"]);
if ($b3>$rsAircraft["Bristol Blenheim"] || $b3<0)
{

  $denyreason_session="Bristol Blenheim aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$b4=intval($_POST["b4"]);
if ($b4>$rsAircraft["B-25 Mitchell"] || $b4<0)
{

  $denyreason_session="B-25 Mitchell aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$b5=intval($_POST["b5"]);
if ($b5>$rsAircraft["B-17G Flying Fortress"] || $b5<0)
{

  $denyreason_session="B-17G Flying Fortress aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$b6=intval($_POST["b6"]);
if ($b6>$rsAircraft["B-52 Stratofortress"] || $b6<0)
{

  $denyreason_session="B-52 Stratofortress aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$b7=intval($_POST["b7"]);
if ($b7>$rsAircraft["B-2 Spirit"] || $b7<0)
{

  $denyreason_session="B-2 Spirit aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$b8=intval($_POST["b8"]);
if ($b8>$rsAircraft["B-1B Lancer"] || $b8<0)
{

  $denyreason_session="B-1B Lancer aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$b9=intval($_POST["b9"]);
if ($b9>$rsAircraft["Tupolev Tu-160"] || $b9<0)
{

  $denyreason_session="Tupolev Tu-160 aircraft error.";
  header("Location: "."activity_denied.asp");
} 

$attacking_fighters=($f1)+($f2)+($f3)+($f4)+($f5)+($f6)+($f7)+($f8)+($f9);
$attacking_bombers=($b1)+($b2)+($b3)+($b4)+($b5)+($b6)+($b7)+($b8)+($b9);
$attacking_total=$attacking_fighters_strength+$attacking_bombers_strength;

$attacking_fighters_strength=($f1*1)+($f2*2)+($f3*3)+($f4*4)+($f5*5)+($f6*6)+($f7*7)+($f8*8)+($f9*9);
$attacking_bombers_strength=($b1*1)+($b2*2)+($b3*3)+($b4*4)+($b5*5)+($b6*6)+($b7*7)+($b8*8)+($b9*9);
$attacking_total_strength=$attacking_fighters_strength+$attacking_bombers_strength;

if ($total>$aircraftlimit || $total<0)
{

  $denyreason_session="Total number of aircraft error.";
  header("Location: "."activity_denied.asp");
} 


//Later on put SAM and AAA modifyers here and add it to defending_fighters_strength below


mt_srand((double)microtime()*1000000);
$randomnumber=intval((mt_rand(0,10000000)/10000000))+0;
$defending_fighters_random=$randomnumber;


mt_srand((double)microtime()*1000000);
$randomnumber=intval((mt_rand(0,10000000)/10000000))+0;
$attacking_fighters_random=$randomnumber;


mt_srand((double)microtime()*1000000);
$randomnumber=intval((mt_rand(0,10000000)/10000000))+0;
$attacking_bombers_random=$randomnumber;



//Calculate battle results

//----------------------------------------------------------------------------------------------------

//Calculate bombers

if ($attacking_bombers_random>0)
{


//Determine the defenders strength


  $defending_fighters_accuracy=$defending_fighters_random-$attacking_fighters_random;
  if ($defending_fighters_accuracy<0)
  {
    $defending_fighters_accuracy=0;
  } 

//Reduce their accuracy based on defender fighters presence

  if ($defending_fighters_accuracy>0)
  {

    $attacking_bombers_accuracy=$attacking_bombers_random-$defending_fighters_accuracy;
  }
    else
  {

    $attacking_bombers_accuracy=$attacking_bombers_random;
  } 


//Determine if the attackers bombers are better than the defenders fighters

  if ($attacking_bombers_accuracy>0)
  {


    mt_srand((double)microtime()*1000000);
    $randomnumber=intval((mt_rand(0,10000000)/10000000))+1;
    $result=$randomnumber;
    $result=$result*.01;

//destroy the infrastructure, tanks, and cruise missiles

    $infrastructure_destroyed=($rsDefend["Infrastructure_Purchased"]*$result);
    if ($infrastructure_destroyed>20)
    {
      $infrastructure_destroyed=20;
    }
;
    } 
    if ($infrastructure_destroyed<0)
    {
      $infrastructure_destroyed=0;
    }
;
    } 
    $rsDefend["Infrastructure_Purchased"]=$rsDefend["Infrastructure_Purchased"]-$infrastructure_destroyed;

    $tanks_destroyed=($rsDefend["Tanks_Defending"]*$result);
    if ($tanks_destroyed>20)
    {
      $tanks_destroyed=20;
    }
;
    } 
    if ($tanks_destroyed<0)
    {
      $tanks_destroyed=0;
    }
;
    } 
    $rsDefend["Tanks_Defending"]=$rsDefend["Tanks_Defending"]-$tanks_destroyed;

    $cruise_destroyed=($rsDefend["Cruise_Purchased"]*$result);
    if ($cruise_destroyed>5)
    {
      $cruise_destroyed=5;
    }
;
    } 
    if ($cruise_destroyed<0)
    {
      $cruise_destroyed=0;
    }
;
    } 
    $rsDefend["Cruise_Purchased"]=$rsDefend["Cruise_Purchased"]-$cruise_destroyed;

$rsDefend->Update;

  }
    else
  {

//Destroy attacking bombers

    mt_srand((double)microtime()*1000000);
    $randomnumber=intval((mt_rand(0,10000000)/10000000))+0;
    $bombers_destroyed=$randomnumber;
    if ($bombers_destroyed<0)
    {
      $bombers_destroyed=0;
    }
;
    } 

    $destroyed=0;
    $counter=0;
    while($counter<$bombers_destroyed)
    {

      if ($b1>0 && $rsAircraft["AH-1 Cobra"]>0 && $destroyed==0 && ($b1*1>$counter))
      {

        $rsAircraft["AH-1 Cobra"]=$rsAircraft["AH-1 Cobra"]-1;
        $destroyed=1;
        $b1_killed=$b1_killed+1;
        $counter=$counter+1;
      } 

      if ($b2>0 && $rsAircraft["AH-64 Apache"]>0 && $destroyed==0 && ($b2*2>$counter))
      {

        $rsAircraft["AH-64 Apache"]=$rsAircraft["AH-64 Apache"]-1;
        $destroyed=1;
        $b2_killed=$b2_killed+1;
        $counter=$counter+2;
      } 

      if ($b3>0 && $rsAircraft["Bristol Blenheim"]>0 && $destroyed==0 && ($b3*3>$counter))
      {

        $rsAircraft["Bristol Blenheim"]=$rsAircraft["Bristol Blenheim"]-1;
        $destroyed=1;
        $b3_killed=$b3_killed+1;
        $counter=$counter+3;
      } 

      if ($b4>0 && $rsAircraft["B-25 Mitchell"]>0 && $destroyed==0 && ($b4*4>$counter))
      {

        $rsAircraft["B-25 Mitchell"]=$rsAircraft["B-25 Mitchell"]-1;
        $destroyed=1;
        $b4_killed=$b4_killed+1;
        $counter=$counter+4;
      } 

      if ($b5>0 && $rsAircraft["B-17G Flying Fortress"]>0 && $destroyed==0 && ($b5*5>$counter))
      {

        $rsAircraft["B-17G Flying Fortress"]=$rsAircraft["B-17G Flying Fortress"]-1;
        $destroyed=1;
        $b5_killed=$b5_killed+1;
        $counter=$counter+5;
      } 

      if ($b6>0 && $rsAircraft["B-52 Stratofortress"]>0 && $destroyed==0 && ($b6*6>$counter))
      {

        $rsAircraft["B-52 Stratofortress"]=$rsAircraft["B-52 Stratofortress"]-1;
        $destroyed=1;
        $b6_killed=$b6_killed+1;
        $counter=$counter+6;
      } 

      if ($b7>0 && $rsAircraft["B-2 Spirit"]>0 && $destroyed==0 && ($b7*7>$counter))
      {

        $rsAircraft["B-2 Spirit"]=$rsAircraft["B-2 Spirit"]-1;
        $destroyed=1;
        $b7_killed=$b7_killed+1;
        $counter=$counter+7;
      } 

      if ($b8>0 && $rsAircraft["B-1B Lancer"]>0 && $destroyed==0 && ($b8*8>$counter))
      {

        $rsAircraft["B-1B Lancer"]=$rsAircraft["B-1B Lancer"]-1;
        $destroyed=1;
        $b8_killed=$b8_killed+1;
        $counter=$counter+8;
      } 

      if ($b9>0 && $rsAircraft["Tupolev Tu-160"]>0 && $destroyed==0 && ($b9*9>$counter))
      {

        $rsAircraft["Tupolev Tu-160"]=$rsAircraft["Tupolev Tu-160"]-1;
        $destroyed=1;
        $b9_killed=$b9_killed+1;
        $counter=$counter+9;
      } 


      if ($destroyed==0)
      {

        $counter=$bombers_destroyed+1;
      }
        else
      {

        $destroyed=0;
      } 

$rsAircraft->Update;
    } 
  } 

} 


//Calculate dog fight fighters

if ($attacking_fighters_random>0)
{


  if ($defending_fighters_random-$attacking_fighters_random>0 && $attacking_fighters_random>0)
  {

//the defending is stronger and will win the fight

    $attacking_fighters_random=$attacking_fighters_random*.3;
  } 

  if ($attacking_fighters_random-$defending_fighters_random>0 && $defending_fighters_random>0)
  {

//the attacker is stronger and will win the fight

    $defending_fighters_random=$defending_fighters_random*.3;
  } 


//Destroy attacking fighters first

  mt_srand((double)microtime()*1000000);
  $randomnumber=intval((mt_rand(0,10000000)/10000000))+0;
  $fighters_destroyed=$randomnumber;
  if ($defending_fighters_strength==0)
  {
    $fighters_destroyed=0;
  }
;
  } 

  $destroyed=0;
  $counter=0;
  while($counter<$fighters_destroyed)
  {

    if ($f1>0 && $rsAircraft["Yakovlev Yak-9"]>0 && $destroyed==0 && ($f1*1>$counter))
    {

      $rsAircraft["Yakovlev Yak-9"]=$rsAircraft["Yakovlev Yak-9"]-1;
      $destroyed=1;
      $f1_killed=$f1_killed+1;
      $counter=$counter+1;
    } 

    if ($f2>0 && $rsAircraft["P-51 Mustang"]>0 && $destroyed==0 && ($f2*2>$counter))
    {

      $rsAircraft["P-51 Mustang"]=$rsAircraft["P-51 Mustang"]-1;
      $destroyed=1;
      $f2_killed=$f2_killed+1;
      $counter=$counter+2;
    } 

    if ($f3>0 && $rsAircraft["F-86 Sabre"]>0 && $destroyed==0 && ($f3*3>$counter))
    {

      $rsAircraft["F-86 Sabre"]=$rsAircraft["F-86 Sabre"]-1;
      $destroyed=1;
      $f3_killed=$f3_killed+1;
      $counter=$counter+3;
    } 

    if ($f4>0 && $rsAircraft["Mikoyan-Gurevich MiG-15"]>0 && $destroyed==0 && ($f4*4>$counter))
    {

      $rsAircraft["Mikoyan-Gurevich MiG-15"]=$rsAircraft["Mikoyan-Gurevich MiG-15"]-1;
      $destroyed=1;
      $f4_killed=$f4_killed+1;
      $counter=$counter+4;
    } 

    if ($f5>0 && $rsAircraft["F-100 Super Sabre"]>0 && $destroyed==0 && ($f5*5>$counter))
    {

      $rsAircraft["F-100 Super Sabre"]=$rsAircraft["F-100 Super Sabre"]-1;
      $destroyed=1;
      $f5_killed=$f5_killed+1;
      $counter=$counter+5;
    } 

    if ($f6>0 && $rsAircraft["F-35 Lightning II"]>0 && $destroyed==0 && ($f6*6>$counter))
    {

      $rsAircraft["F-35 Lightning II"]=$rsAircraft["F-35 Lightning II"]-1;
      $destroyed=1;
      $f6_killed=$f6_killed+1;
      $counter=$counter+6;
    } 

    if ($f7>0 && $rsAircraft["F-15 Eagle"]>0 && $destroyed==0 && ($f7*7>$counter))
    {

      $rsAircraft["F-15 Eagle"]=$rsAircraft["F-15 Eagle"]-1;
      $destroyed=1;
      $f7_killed=$f7_killed+1;
      $counter=$counter+7;
    } 

    if ($f8>0 && $rsAircraft["Su-30 MKI"]>0 && $destroyed==0 && ($f8*8>$counter))
    {

      $rsAircraft["Su-30 MKI"]=$rsAircraft["Su-30 MKI"]-1;
      $destroyed=1;
      $f8_killed=$f8_killed+1;
      $counter=$counter+8;
    } 

    if ($f9>0 && $rsAircraft["F-22 Raptor"]>0 && $destroyed==0 && ($f9*9>$counter))
    {

      $rsAircraft["F-22 Raptor"]=$rsAircraft["F-22 Raptor"]-1;
      $destroyed=1;
      $f9_killed=$f9_killed+1;
      $counter=$counter+9;
    } 


    if ($destroyed==0)
    {

      $counter=$fighters_destroyed+1;
    }
      else
    {

      $destroyed=0;
    } 

$rsAircraft->Update;
  } 

//Destroy defending fighters second

  mt_srand((double)microtime()*1000000);
  $randomnumber=intval((mt_rand(0,10000000)/10000000))+0;
  $fighters_destroyed=$randomnumber;
  if ($defending_fighters_strength==0)
  {
    $fighters_destroyed=0;
  }
;
  } 

  $destroyed=0;
  $counter=0;
  if ($rsDAircraft->BOF && $rsDAircraft->EOF)
  {
    $counter=$fighters_destroyed+1;
  }
;
  } 
  while($counter<$fighters_destroyed)
  {

    if ($rsDAircraft["Yakovlev Yak-9"]>0 && $destroyed==0 && ($rsDAircraft["Yakovlev Yak-9"]*1>$counter))
    {

      $rsDAircraft["Yakovlev Yak-9"]=$rsDAircraft["Yakovlev Yak-9"]-1;
      $destroyed=1;
      $f1_destroyed=$f1_destroyed+1;
      $counter=$counter+1;
    } 

    if ($rsDAircraft["P-51 Mustang"]>0 && $destroyed==0 && ($rsDAircraft["P-51 Mustang"]*2>$counter))
    {

      $rsDAircraft["P-51 Mustang"]=$rsDAircraft["P-51 Mustang"]-1;
      $destroyed=1;
      $f2_destroyed=$f2_destroyed+1;
      $counter=$counter+2;
    } 

    if ($rsDAircraft["F-86 Sabre"]>0 && $destroyed==0 && ($rsDAircraft["F-86 Sabre"]*3>$counter))
    {

      $rsDAircraft["F-86 Sabre"]=$rsDAircraft["F-86 Sabre"]-1;
      $destroyed=1;
      $f3_destroyed=$f3_destroyed+1;
      $counter=$counter+3;
    } 

    if ($rsDAircraft["Mikoyan-Gurevich MiG-15"]>0 && $destroyed==0 && ($rsDAircraft["Mikoyan-Gurevich MiG-15"]*4>$counter))
    {

      $rsDAircraft["Mikoyan-Gurevich MiG-15"]=$rsDAircraft["Mikoyan-Gurevich MiG-15"]-1;
      $destroyed=1;
      $f4_destroyed=$f4_destroyed+1;
      $counter=$counter+4;
    } 

    if ($rsDAircraft["F-100 Super Sabre"]>0 && $destroyed==0 && ($rsDAircraft["F-100 Super Sabre"]*5>$counter))
    {

      $rsDAircraft["F-100 Super Sabre"]=$rsDAircraft["F-100 Super Sabre"]-1;
      $destroyed=1;
      $f5_destroyed=$f5_destroyed+1;
      $counter=$counter+5;
    } 

    if ($rsDAircraft["F-35 Lightning II"]>0 && $destroyed==0 && ($rsDAircraft["F-35 Lightning II"]*6>$counter))
    {

      $rsDAircraft["F-35 Lightning II"]=$rsDAircraft["F-35 Lightning II"]-1;
      $destroyed=1;
      $f6_destroyed=$f6_destroyed+1;
      $counter=$counter+6;
    } 

    if ($rsDAircraft["F-15 Eagle"]>0 && $destroyed==0 && ($rsDAircraft["F-15 Eagle"]*7>$counter))
    {

      $rsDAircraft["F-15 Eagle"]=$rsDAircraft["F-15 Eagle"]-1;
      $destroyed=1;
      $f7_destroyed=$f7_destroyed+1;
      $counter=$counter+7;
    } 

    if ($rsDAircraft["Su-30 MKI"]>0 && $destroyed==0 && ($rsDAircraft["Su-30 MKI"]*8>$counter))
    {

      $rsDAircraft["Su-30 MKI"]=$rsDAircraft["Su-30 MKI"]-1;
      $destroyed=1;
      $f8_destroyed=$f8_destroyed+1;
      $counter=$counter+8;
    } 

    if ($rsDAircraft["F-22 Raptor"]>0 && $destroyed==0 && ($rsDAircraft["F-22 Raptor"]*9>$counter))
    {

      $rsDAircraft["F-22 Raptor"]=$rsDAircraft["F-22 Raptor"]-1;
      $destroyed=1;
      $f9_destroyed=$f9_destroyed+1;
      $counter=$counter+9;
    } 


    if ($destroyed==0)
    {

      $counter=$fighters_destroyed+1;
    }
      else
    {

      $destroyed=0;
    } 

$rsDAircraft->Update;
  } 

} 


$abombers_destroyed=$b1_killed+$b2_killed+$b3_killed+$b4_killed+$b5_killed+$b6_killed+$b7_killed+$b8_killed+$b9_killed;
$afighters_destroyed=$f1_killed+$f2_killed+$f3_killed+$f4_killed+$f5_killed+$f6_killed+$f7_killed+$f8_killed+$f9_killed;
$dfighters_destroyed=$f1_destroyed+$f2_destroyed+$f3_destroyed+$f4_destroyed+$f5_destroyed+$f6_destroyed+$f7_destroyed+$f8_destroyed+$f9_destroyed;

$infrastructure_destroyed=$FormatNumber[$infrastructure_destroyed][2];
$tanks_destroyed=$FormatNumber[$tanks_destroyed][0];
$cruise_destroyed=$FormatNumber[$cruise_destroyed][0];
$abombers_destroyed=$FormatNumber[$abombers_destroyed][0];
$afighters_destroyed=$FormatNumber[$afighters_destroyed][0];
$dfighters_destroyed=$FormatNumber[$dfighters_destroyed][0];


if ($attacking_bombers_strength>0 && $attacking_fighters_strength<=0)
{

//Send a message to the defender about the attack

// $adoCon is of type "ADODB.Connection"

  $a2p_connstr==$MM_conn_STRING_Messages;
  $a2p_uid=strstr($a2p_connstr,'uid');
  $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_pwd=strstr($a2p_connstr,'pwd');
  $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_database=strstr($a2p_connstr,'dsn');
  $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
  mysql_select_db($a2p_database,$adoCon);
// $rsAddComments is of type "ADODB.Recordset"

  $strSQL="EMESSAGES";
    echo 2;
    echo 3;
  $rs=mysql_query($strSQL);
  //U_ID") = rsDefend("Poster")  //MESS_FROM") =  rsAttack("Poster")   //MESSAGE") = "An unescorted aircraft bombing run has been launched against your nation by " & rsAttack("Poster")  & ". In the attack you lost " & FormatNumber(tanks_destroyed,0) & " defending tanks, " & FormatNumber(cruise_destroyed,0) & " cruise missiles, and "  & FormatNumber(infrastructure_destroyed,2)&  " infrastructure. You destroyed "  & FormatNumber(abombers_destroyed,0)&  " attacking bombers."  //SUBJECT") = "Unescorted Bombing Attack Report"  //MESS_READ") = "False"  
  
  $rsAddComments=null;

} 


if ($attacking_bombers_strength>0 && $attacking_fighters_strength>0)
{

//Send a message to the defender about the attack

// $adoCon is of type "ADODB.Connection"

  $a2p_connstr==$MM_conn_STRING_Messages;
  $a2p_uid=strstr($a2p_connstr,'uid');
  $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_pwd=strstr($a2p_connstr,'pwd');
  $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_database=strstr($a2p_connstr,'dsn');
  $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
  mysql_select_db($a2p_database,$adoCon);
// $rsAddComments is of type "ADODB.Recordset"

  $strSQL="EMESSAGES";
    echo 2;
    echo 3;
  $rs=mysql_query($strSQL);
  //U_ID") = rsDefend("Poster")  //MESS_FROM") =  rsAttack("Poster")   //MESSAGE") = "A fighter escorted bombing run has been launched against your nation by " & rsAttack("Poster")  & ". In the attack you lost " & FormatNumber(tanks_destroyed,0) & " defending tanks, " & FormatNumber(cruise_destroyed,0) & " cruise missiles, and "  & FormatNumber(infrastructure_destroyed,2)&  " infrastructure. You destroyed "  & FormatNumber(abombers_destroyed,0)&  " attacking bombers. You lost " & FormatNumber(dfighters_destroyed,0) & " fighter aircraft and destroyed " & FormatNumber(afighters_destroyed,0)&  " fighter aircraft launched by " & rsAttack("Poster")  & "."  //SUBJECT") = "Escorted Bombing Attack Report"  //MESS_READ") = "False"  
//Reset server objects

  
  $rsAddComments=null;

  $adoCon=null;

} 


if ($attacking_bombers_strength<=0 && $attacking_fighters_strength>0)
{

//Send a message to the defender about the attack

// $adoCon is of type "ADODB.Connection"

  $a2p_connstr==$MM_conn_STRING_Messages;
  $a2p_uid=strstr($a2p_connstr,'uid');
  $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_pwd=strstr($a2p_connstr,'pwd');
  $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_database=strstr($a2p_connstr,'dsn');
  $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
  mysql_select_db($a2p_database,$adoCon);
// $rsAddComments is of type "ADODB.Recordset"

  $strSQL="EMESSAGES";
    echo 2;
    echo 3;
  $rs=mysql_query($strSQL);
  //U_ID") = rsDefend("Poster")  //MESS_FROM") =  rsAttack("Poster")   //MESSAGE") = "A fighter aircraft dog fight has just occured against your nation by " & rsAttack("Poster")  & ". In the attack you lost " & FormatNumber(dfighters_destroyed,0) & " fighter aircraft and destroyed " & FormatNumber(afighters_destroyed,0)&  " fighter aircraft launched by " & rsAttack("Poster")  & "."  //SUBJECT") = "Aircraft Dog Fight Report"  //MESS_READ") = "False"  //From_System") = 1  
//Reset server objects

  
  $rsAddComments=null;

  $adoCon=null;

} 



//----------------------------------------------------------------------------------------------------

?>
<center>
<? 
if ($attacking_bombers_strength==0 && $attacking_fighters_strength>0)
{

  print "<img border='0' src='images/dog_fight.jpg'>";
} 

if ($attacking_bombers_strength>0 && $attacking_fighters_strength>0)
{

  print "<img border='0' src='images/bomber_escort.jpg'>";
} 

if ($attacking_bombers_strength>0 && $attacking_fighters_strength==0)
{

  print "<img border='0' src='images/bombing_run.jpg'>";
} 

?>
<br>
&nbsp;</center>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bordercolor="#000080">
<tr>
<td bgcolor="#FFFFFF">

<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
<tr>
<td valign="top" colspan="2" bgcolor="#000080">
<b><font color="#FFFFFF">:.
Aircraft Attack Report



</font></b>



</td>
</tr>
<tr>
<td width="250" valign="top">Attack Type:</td>
<td valign="top"><? if ($attacking_bombers_strength>0)
{
?>
Bombing Campaign
<? }
  else
{
?>
Dog Fight
<? } ?></td>
</tr>
<? if ($attacking_bombers_strength>0)
{
?>
<tr>
<td align=right width="31%">
<p align="left">Defending Nation<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<a href="nation_drill_display.asp?Nation_ID=<?   echo ($rsDefend->Fields.$Item["Nation_ID"].$Value); ?>">
<?   echo ($rsDefend->Fields.$Item["Nation_Name"].$Value); ?></a> (<?   echo ($rsDefend->Fields.$Item["Poster"].$Value); ?>)


</font></td>
</tr>
<tr>
<td width="250" valign="top">Defender Infrastructure Destroyed:</td>
<td valign="top"> <?   echo $FormatNumber[$infrastructure_destroyed][2]; ?><br>
 </td>
</tr>
<tr>
<td width="250" valign="top">Defender Tanks Destroyed:</td>
<td valign="top"><?   echo $FormatNumber[$tanks_destroyed][0]; ?></td>
</tr>
<tr>
<td width="250" valign="top">Cruise Missiles Destroyed:</td>
<td valign="top"><?   echo $FormatNumber[$cruise_destroyed][0]; ?></td>
</tr>

<tr>
<td width="250" valign="top">Attacker Bombers Lost:</td>
<td valign="top">
	<?   if ($b1>0)
  {
?>
	AH-1 Cobra Lost: <?     echo $FormatNumber[$b1_killed][0]; ?><br>
	<?   } ?>
	<?   if ($b2>0)
  {
?>
	AH-64 Apache Lost: <?     echo $FormatNumber[$b2_killed][0]; ?><br>
	<?   } ?>
	<?   if ($b3>0)
  {
?>
	Bristol Blenheim Lost: <?     echo $FormatNumber[$b3_killed][0]; ?><br>
	<?   } ?>
	<?   if ($b4>0)
  {
?>
	B-25 Mitchell Lost: <?     echo $FormatNumber[$b4_killed][0]; ?><br>
	<?   } ?>
	<?   if ($b5>0)
  {
?>
	B-17G Flying Fortress Lost: <?     echo $FormatNumber[$b5_killed][0]; ?><br>
	<?   } ?>
	<?   if ($b6>0)
  {
?>
	B-52 Stratofortress Lost: <?     echo $FormatNumber[$b6_killed][0]; ?><br>
	<?   } ?>
	<?   if ($b7>0)
  {
?>
	B-2 Spirit Lost: <?     echo $FormatNumber[$b7_killed][0]; ?><br>
	<?   } ?>
	<?   if ($b8>0)
  {
?>
	B-1B Lancer Lost: <?     echo $FormatNumber[$b8_killed][0]; ?><br>
	<?   } ?>
	<?   if ($b9>0)
  {
?>
	Tupolev Tu-160 Lost: <?     echo $FormatNumber[$b9_killed][0]; ?>
	<?   } ?>
</td>
</tr>
<? } ?>
<? if ($attacking_fighters_strength>0)
{
?>
<tr>
<td width="250" valign="top">Attacker Fighters Lost:</td>
<td valign="top">
	<?   if ($f1>0)
  {
?>
	Yakovlev Yak-9 Lost: <?     echo $FormatNumber[$f1_killed][0]; ?><br>
	<?   } ?>
	<?   if ($f2>0)
  {
?>
	P-51 Mustang Lost: <?     echo $FormatNumber[$f2_killed][0]; ?><br>
	<?   } ?>
	<?   if ($f3>0)
  {
?>
	F-86 Sabre Lost: <?     echo $FormatNumber[$f3_killed][0]; ?><br>
	<?   } ?>
	<?   if ($f4>0)
  {
?>
	Mikoyan-Gurevich MiG-15 Lost: <?     echo $FormatNumber[$f4_killed][0]; ?><br>
	<?   } ?>
	<?   if ($f5>0)
  {
?>
	F-100 Super Sabre Lost: <?     echo $FormatNumber[$f5_killed][0]; ?><br>
	<?   } ?>
	<?   if ($f6>0)
  {
?>
	F-35 Lightning II Lost: <?     echo $FormatNumber[$f6_killed][0]; ?><br>
	<?   } ?>
	<?   if ($f7>0)
  {
?>
	F-15 Eagle Lost: <?     echo $FormatNumber[$f7_killed][0]; ?><br>
	<?   } ?>
	<?   if ($f8>0)
  {
?>
	Su-30 MKI Lost: <?     echo $FormatNumber[$f8_killed][0]; ?><br>
	<?   } ?>
	<?   if ($f9>0)
  {
?>
	F-22 Raptor Lost: <?     echo $FormatNumber[$f9_killed][0]; ?>
	<?   } ?>

</td>
</tr>
<? } ?>
<? if ($attacking_fighters_strength>0)
{
?>
<tr>
<td width="250" valign="top">Defender Fighters Killed:</td>
<td valign="top">
<?   echo $FormatNumber[$dfighters_destroyed][0]; ?>
</td>
</tr>
<? } ?>
</table>
</td>
</tr>
</table>




<p align="center"><a href="aircraft_attack.asp?Nation_ID=<? echo $rsDefend["Nation_ID"]; ?>">Return to Aircraft Attack Screen</a></p>






