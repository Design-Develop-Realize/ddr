<?
  session_start();
?>
<? 
// Determine the attacking nation

$attackingsoldiers=$rsAttack["Military_Deployed"];

if (!isset($rsAttack["Tanks_Deployed"]))
{

  $attackingtanks=0;
}
  else
{

  $attackingtanks=$rsAttack["Tanks_Deployed"];
} 

$attackingtankstrenght=($attackingtanks*18);
if ($rsAttack["Technology_Purchased"]<=100)
{

  $attackingtankstrenghttechmod=$rsAttack["Technology_Purchased"]/50;
}
  else
{

  $attackingtankstrenghttechmod=1;
} 

$attackingtankstrenght=$attackingtankstrenght+($attackingtankstrenght*$attackingtankstrenghttechmod);


$attackingstrength=$attackingsoldiers*1+$attackingtankstrenght;

$attackingnationage=time()()-$rsAttack["Nation_Dated"]+1;
$attackingnationsize=(round(($attackingnationage/2),3))+$rsAttack["Land_Purchased"];
if (!isset($rsAttack["DEFCON"]))
{

  $attackingdefcon=5;
}
  else
{

  $attackingdefcon=$rsAttack["DEFCON"];
} 

$attackingdefconmod=($attackingstrength/$attackingdefcon)*.10;
$attackingtechmod=($rsAttack["Technology_Purchased"])*10;
$attackingstrenghtcalculated=$attackingstrength+($attackingdefconmod+$attackingtechmod*.1);
$attackingmoney=$rsAttack["Money_Earned"]-($rsAttack["Money_Spent"]+$rsAttack["Government_Bills"]);
if ($attackingmoney<0)
{

  $attackingmoney=0;
} 





?>

<? 

$defendingsoldierstest=$rsDefend["Military_Purchased"]-$rsDefend["Military_Defending_Casualties"]-$rsDefend["Military_Attacking_Casualties"]-$rsDefend["Military_Deployed"];
$defendingnationagetest=time()()-$rsDefend["Nation_Dated"]+1;
$defendingnationsizetest=(round(($defendingnationagetest/2),3))+$rsDefend["Land_Purchased"];

if ($defendingsoldierstest<10 || $attackingnationsize>($defendingnationsizetest*50) && $rsDefend["Military_Deployed"]>0)
{

  $rsDefend["Military_Deployed"]=0;
  $rsDefend["Tanks_Defending"]=$rsDefend["Tanks_Deployed"]+$rsDefend["Tanks_Defending"];
  $rsDefend["Tanks_Deployed"]=0;
$rsDefend->Update;
} 

?>


<? 
// Determine the defending nation



// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID=".$lngRecordNo1;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;
?>
<!--#include file="trade_connections.php" -->	
<!--#include file="calculations.php" -->

<? 


$defendingsoldiers=$actualdefend;

if (!isset($rsDefend["Tanks_Defending"]))
{

  $defendingtanks=0;
}
  else
{

  $defendingtanks=$rsDefend["Tanks_Defending"];
} 


$defendingtankstrenght=($defendingtanks*20);
if ($rsDefend["Technology_Purchased"]<=100)
{

  $defendingtankstrenghttechmod=$rsDefend["Technology_Purchased"]/50;
}
  else
{

  $defendingtankstrenghttechmod=1;
} 

$defendingtankstrenght=$defendingtankstrenght+($defendingtankstrenght*$defendingtankstrenghttechmod);

$defendingstrength=($defendingsoldiers*1)+$defendingtankstrenght;
$defendingnationage=time()()-$rsDefend["Nation_Dated"]+1;
$defendingnationsize=(round(($defendingnationage/2),3))+$rsDefend["Land_Purchased"];

if (!isset($rsDefend["DEFCON"]))
{

  $defendingdefcon=5;
}
  else
{

  $defendingdefcon=$rsDefend["DEFCON"];
} 

$defendingdefconmod=($defendingstrength/$defendingdefcon)*.10;
$defendingtechmod=($rsDefend["Technology_Purchased"])*10;

$defendinginfrasmodloss=($attackingtanks/100);
if ($defendinginfrasmodloss>50)
{
  $defendinginfrasmodloss=.50;
}
;
} 
$defendinginfrasmod=($rsDefend["Infrastructure_Purchased"])*2;
if ($defendinginfrasmod>1000)
{
  $defendinginfrasmod=1000;
}
;
} 
$defendinginfrasmod=$defendinginfrasmod-($defendinginfrasmod*$defendinginfrasmodloss);

$defendingstrenghtcalculated=$defendingstrength+($defendingdefconmod+$defendingtechmod+$defendinginfrasmod*.1);

if ($defendingtanks<1 && $defendingsoldiers<1)
{
  $defendingstrenghtcalculated=0;
}
;
} 
if ($attackingtanks<1 && $attackingsoldiers<1)
{
  $attackingstrenghtcalculated=0;
}
;
} 
$defendingmoney=$rsDefend["Money_Earned"]-($rsDefend["Money_Spent"]+$rsDefend["Government_Bills"]);
if ($defendingmoney<0)
{

  $defendingmoney=0;
} 



// Determine the battle odds for each nation

$battlepoints=$attackingstrenghtcalculated+$defendingstrenghtcalculated;
$attackingchance=$FormatNumber[($attackingstrenghtcalculated/$battlepoints*100)][0];
$defendingchance=$FormatNumber[($defendingstrenghtcalculated/$battlepoints*100)][0];


// Determine the losses for each nation

// determine attacking

$lowestNumber=1;
$highestNumber=$attackingchance;
mt_srand((double)microtime()*1000000);
$attackingrndodds=intval((mt_rand(0,10000000)/10000000))+1;
$clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;
// determine defending

$lowestNumber=1;
$highestNumber=$defendingchance;
mt_srand((double)microtime()*1000000);
$defendingrndodds=intval((mt_rand(0,10000000)/10000000))+1;
$clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;

if ($attackingrndodds>$defendingrndodds)
{
// Victory for attacker

// Determine soldier losses

  $lowestNumber=$attackingsoldiers*.01;
  $sample1=$defendingsoldiers*2.5;
  $sample2=$attackingsoldiers*.30;
  if ($sample1<$sample2 && $sample1!=0)
  {

    $highestNumber=$sample1;
  }
    else
  {

    $highestNumber=$sample2;
  } 

  mt_srand((double)microtime()*1000000);
  $attackingsoldiercasualties=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;

  $lowestNumber=$defendingsoldiers*.40;
  $highestNumber=$defendingsoldiers*.98;
  mt_srand((double)microtime()*1000000);
  $defendingsoldiercasualties=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;


// Determine tank losses

  $lowestNumber=$attackingtanks*.01;
  $sample1=$defendingtanks*2.5;
  $sample2=($attackingtanks*.30);
  if ($sample1<$sample2 && $sample1!=0)
  {

    $highestNumber=$sample1;
  }
    else
  {

    $highestNumber=$sample2;
  } 

  mt_srand((double)microtime()*1000000);
  $attackingtankcasualties=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;

  $lowestNumber=$defendingtanks*.30;
  $highestNumber=$defendingtanks*.98;
  mt_srand((double)microtime()*1000000);
  $defendingtankcasualties=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;
// Perform < 0 check because lowestNumber above * .01

  $defendingtankcasualties=$FormatNumber[$defendingtankcasualties][0];
  $attackingtankcasualties=$FormatNumber[$attackingtankcasualties][0];
  if ($defendingtankcasualties<0)
  {
    $defendingtankcasualties=0;
  }
;
  } 
  if ($attackingtankcasualties<0)
  {
    $attackingtankcasualties=0;
  }
;
  } 
  if ($defendingsoldiercasualties<0)
  {
    $defendingsoldiercasualties=0;
  }
;
  } 
  if ($attackingsoldiercasualties<0)
  {
    $attackingsoldiercasualties=0;
  }
;
  } 
} 








if ($attackingrndodds<$defendingrndodds)
{
// Victory for defender

// Determine soldier losses

  $lowestNumber=$attackingsoldiers*.30;
  $sample1=$defendingsoldiers*3;
  $sample2=$attackingsoldiers*.40;
  if ($sample1<$sample2 && $sample1!=0)
  {

    $highestNumber=$sample1;
  }
    else
  {

    $highestNumber=$sample2;
  } 

  mt_srand((double)microtime()*1000000);
  $attackingsoldiercasualties=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;

  $lowestNumber=$defendingsoldiers*.03;
  $highestNumber=$defendingsoldiers*.35;
  mt_srand((double)microtime()*1000000);
  $defendingsoldiercasualties=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;


// Determine tank losses

  $lowestNumber=$attackingtanks*.30;
  $sample1=$defendingtanks*4;
  $sample2=$attackingtanks*.90;
  if ($sample1<$sample2 && $sample1!=0)
  {

    $highestNumber=$sample1;
  }
    else
  {

    $highestNumber=$sample2;
  } 

  mt_srand((double)microtime()*1000000);
  $attackingtankcasualties=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;

  $lowestNumber=$defendingtanks*.01;
  $highestNumber=$defendingtanks*.30;
  mt_srand((double)microtime()*1000000);
  $defendingtankcasualties=intval(($highestNumber-$lowestNumber+1)*(mt_rand(0,10000000)/10000000));
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;
// Perform < 0 check because lowestNumber above * .01

  if ($defendingtankcasualties<0)
  {
    $defendingtankcasualties=0;
  }
;
  } 
  if ($attackingtankcasualties<0)
  {
    $attackingtankcasualties=0;
  }
;
  } 
  if ($defendingsoldiercasualties<0)
  {
    $defendingsoldiercasualties=0;
  }
;
  } 
  if ($attackingsoldiercasualties<0)
  {
    $attackingsoldiercasualties=0;
  }
;
  } 
} 



if ($_POST["type"]!="")
{

  switch ($_POST["type"])
  {
    case "Cautious Ground Attack":
      $defendingtankcasualties=$defendingtankcasualties*.75;
      $attackingtankcasualties=$attackingtankcasualties*.75;
      $defendingsoldiercasualties=$defendingsoldiercasualties*.75;
      $attackingsoldiercasualties=$attackingsoldiercasualties*.75;
      if ($attackingsoldiercasualties>$defendingsoldiercasualties*20)
      {
        $attackingsoldiercasualties=$defendingsoldiercasualties*2.0;
      } 
      if ($defendingsoldiercasualties>$attackingsoldiercasualties*20)
      {
        $defendingsoldiercasualties=$attackingsoldiercasualties*2.0;
      } 
      break;
    case "Standard Ground Attack":
      $defendingtankcasualties=$defendingtankcasualties*1;
      $attackingtankcasualties=$attackingtankcasualties*1;
      $defendingsoldiercasualties=$defendingsoldiercasualties*1;
      $attackingsoldiercasualties=$attackingsoldiercasualties*1;
      if ($attackingsoldiercasualties>$defendingsoldiercasualties*30)
      {
        $attackingsoldiercasualties=$defendingsoldiercasualties*3.0;
      } 
      if ($defendingsoldiercasualties>$attackingsoldiercasualties*30)
      {
        $defendingsoldiercasualties=$attackingsoldiercasualties*3.0;
      } 
      break;
    case "Planned Ground Attack":
      $defendingtankcasualties=$defendingtankcasualties*1.25;
      $attackingtankcasualties=$attackingtankcasualties*1.25;
      $defendingsoldiercasualties=$defendingsoldiercasualties*1.25;
      $attackingsoldiercasualties=$attackingsoldiercasualties*1.25;
      if ($attackingsoldiercasualties>$defendingsoldiercasualties*40)
      {
        $attackingsoldiercasualties=$defendingsoldiercasualties*4.0;
      } 
      if ($defendingsoldiercasualties>$attackingsoldiercasualties*40)
      {
        $defendingsoldiercasualties=$attackingsoldiercasualties*4.0;
      } 
      break;
    case "Aggressive Ground Attack":
      $defendingtankcasualties=$defendingtankcasualties*1.5;
      $attackingtankcasualties=$attackingtankcasualties*1.5;
      $defendingsoldiercasualties=$defendingsoldiercasualties*1.5;
      $attackingsoldiercasualties=$attackingsoldiercasualties*1.5;
      if ($attackingsoldiercasualties>$defendingsoldiercasualties*50)
      {
        $attackingsoldiercasualties=$defendingsoldiercasualties*5.0;
      } 
      if ($defendingsoldiercasualties>$attackingsoldiercasualties*50)
      {
        $defendingsoldiercasualties=$attackingsoldiercasualties*5.0;
      } 
      break;
  } 
} 


$attackingsoldiercasualties=$FormatNumber[$attackingsoldiercasualties][0];
$defendingsoldiercasualties=$FormatNumber[$defendingsoldiercasualties][0];
$attackingtankcasualties=$FormatNumber[$attackingtankcasualties][0];
$defendingtankcasualties=$FormatNumber[$defendingtankcasualties][0];


if ($attackingsoldiers-$attackingsoldiercasualties<0)
{
  $attackingsoldiercasualties=$attackingsoldiers;
}
;
} 
if ($actualdefend-$defendingsoldiercasualties<0)
{
  $defendingsoldiercasualties=$actualdefend;
}
;
} 
if ($defendingtanks-$attackingtankcasualties<0)
{
  $attackingtankcasualties=$defendingtanks;
}
;
} 
if ($attackingtanks-$defendingtankcasualties<0)
{
  $defendingtankcasualties=$attackingtanks;
}
;
} 

mt_srand((double)microtime()*1000000);
$randomcashnumber=intval((mt_rand(0,10000000)/10000000));
$passedattackingmoney=$attackingmoney*($randomcashnumber*.01);
if ($passedattackingmoney>1000000)
{
  $passedattackingmoney=1000000;
}
;
} 
$passeddefendingmoney=$defendingmoney*($randomcashnumber*.01);
if ($passeddefendingmoney>1000000)
{
  $passeddefendingmoney=1000000;
}
;
} ?>
