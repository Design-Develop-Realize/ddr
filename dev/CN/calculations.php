<?
  session_start();
?>
<!--#include file="calculations_government_effect.php" -->
<!--#include file="improvements_code.php" -->
<!--#include file="national_wonders_code.php" -->
<!--#include file="reset_sessions.php" -->
<? 
// Count the number of nukes this month and also test the connection to the database

// $rsMonthNukes is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT GlobalRadiation FROM Month_Nukes Where ID = 1";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
if (($rsMonthNukes_BOF==1) && ($rsMonthNukes==0))
{

  header("Location: "."http://busy.cybernations.net/");
}
  else
{

  $globalradiation=$rsMonthNukes["GlobalRadiation"];
} 


$rsMonthNukes=null;


if ($globalradiation>5)
{
  $globalradiation=5;
}
;
} 

$nationage=time()()-$rsGuestbook["Nation_Dated"]+1;

$nationsize=$rsGuestbook["Land_Purchased"];

if ($rubber==1)
{

  $nationsize=$nationsize+($nationsize*.20);
} 

if ($coal==1)
{

  $nationsize=$nationsize+($nationsize*.15);
} 

if ($Furs==1)
{

  $nationsize=$nationsize+($nationsize*.10);
} 

if ($Spices==1)
{

  $nationsize=$nationsize+($nationsize*.10);
} 

if ($Sugar==1)
{

  $nationsize=$nationsize+($nationsize*.05);
} 

if ($Wheat==1)
{

  $nationsize=$nationsize+($nationsize*.05);
} 

if ($governmenteffectsize==1)
{

  $nationsize=($governmenteffectsize*.05)+$nationsize;
} 



$adjustednationsize=$nationsize;
$nationnaturalgrowth=(round(($nationage/2),3));
$nationsize=$nationsize+$nationnaturalgrowth;

$nationsizelimit=4000;
if ($nationsize>$nationsizelimit)
{

  $nationsize=$nationsizelimit;
} 


if ($nationsize<0)
{

  $adjustednationsize=$adjustednationsize-$nationsize;
  $nationsize=0;

} 



$actualmilitary=$rsGuestbook["Military_Purchased"]-$rsGuestbook["Military_Defending_Casualties"]-$rsGuestbook["Military_Attacking_Casualties"];

if ($actualmilitary>0)
{

  if ($governmenteffectmilitary==1 || $coal==1)
  {

    $actualmilitary=($actualmilitary*.08)+$actualmilitary;
  } 

  if ($Aluminum==1)
  {

    $actualmilitary=($actualmilitary*.20)+$actualmilitary;
  } 

  if ($Pigs==1)
  {

    $actualmilitary=($actualmilitary*.15)+$actualmilitary;
  } 

  if ($oil==1)
  {

    $actualmilitary=($actualmilitary*.10)+$actualmilitary;
  } 

  $actualmilitary=$actualmilitary+($actualmilitary*($barracks*.10));
  $actualmilitary=$actualmilitary+($actualmilitary*($guerilla_camps*.35));
  if ($MemorialWonder==1)
  {

    $actualmilitary=($actualmilitary*.10)+$actualmilitary;
  } 

} 


$actualdeployed=$rsGuestbook["Military_Deployed"];
// Calculate the actual number of defending troops after casualties

$actualdefend=$actualmilitary-$actualdeployed;

$population=(round(($nationage/2)+($rsGuestbook["Land_Purchased"]*0.20)+($rsGuestbook["Infrastructure_Purchased"]*7.5)+50,0));
if ($fish==1)
{

  $population=$population+($population*.08);
} 

if ($cattle==1)
{

  $population=$population+($population*.05);
} 

if ($Wheat==1)
{

  $population=$population+($population*.08);
} 

if ($sugar==1)
{

  $population=$population+($population*.03);
} 

if ($pigs==1)
{

  $population=$population+($population*.03);
} 

$population=$population-($population*($border_walls*.02));
$population=$population+($population*($clinics*.02));
$population=$population+($population*($hospitals*.06));
if ($ResearchWonder==1)
{

  $population=$population+($population*.05);
} 

if ($DisasterWonder==1)
{

  $population=$population+($population*.03);
} 


$population=$population+$actualmilitary;

$mimpopulationpermile=2;

$populationpermile=($FormatNumber[$population/($nationsize)][2]);


$citizens=$FormatNumber[$population-$actualmilitary][0];


$literacyequation=($rsGuestbook["Technology_Purchased"].$Value)+.5;
$literacy=100-((1000/$literacyequation)*4);
if ($literacy<20)
{
  $literacy=20;
}
;
} 

$environment=1;

if ($actualmilitary>=($citizens*60))
{
  $environment=$environment+1;
}
;
} 
if (($rsGuestbook["Infrastructure_Purchased"]$Value)>($nationsize*2))
{
  $environment=$environment+1;
}
;
} 
if (($rsGuestbook["Government_Type"]$Value)=="Anarchy" || ($rsGuestbook["Government_Type"]$Value)=="Transitional" || ($rsGuestbook["Government_Type"]$Value)=="Dictatorship")
{
  $environment=$environment+1;
}
;
} 
if ($rsGuestbook["Resource1"]!="Coal" && $rsGuestbook["Resource2"]!="Coal")
{

  if ($coal==1)
  {
    $environment=$environment+1;
  }
;
  } 
} 

if ($rsGuestbook["Resource1"]!="Oil" && $rsGuestbook["Resource2"]!="Oil")
{

  if ($Oil==1)
  {
    $environment=$environment+1;
  }
;
  } 
} 

if ($rsGuestbook["Resource1"]!="Uranium" && $rsGuestbook["Resource2"]!="Uranium")
{

  if ($Uranium==1)
  {
    $environment=$environment+1;
  }
;
  } 
} 

if ($literacy<70)
{
  $environment=$environment+1;
}
;
} 
if ($rsGuestbook["Nuclear_Purchased"]>0)
{
  $environment=$environment+1;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)<=6)
{
  $environment=$environment+1;
}
;
} 
if ($nationsize<$nationage/3)
{
  $environment=$environment+1;
}
;
} 
if ($rsGuestbook["Drugs"]==0 || $rsGuestbook["Drugs"]==1)
{
  $environment=$environment+1;
}
;
} 
if ($rsGuestbook["Immigration"]==0 || $rsGuestbook["Immigration"]==1)
{
  $environment=$environment+1;
}
;
} 
if ($rsGuestbook["Nuclear"]==2 || $rsGuestbook["Nuclear"]==3)
{
  $environment=$environment+1;
}
;
} 
if ($environment>1)
{

  if ($water==1)
  {
    $environment=$environment-1;
  }
;
  } 
} 

if ($environment>1)
{

  if (($rsGuestbook["Government_Type"]$Value)=="Democracy" || ($rsGuestbook["Government_Type"]$Value)=="Republic" || ($rsGuestbook["Government_Type"]$Value)=="Monarchy" || ($rsGuestbook["Government_Type"]$Value)=="Capitalist")
  {
    $environment=$environment-1;
  }
;
  } 
} 

if ($environment>1)
{

  $environment=$environment-($border_walls*1);
} 

if ($environment<1)
{
  $environment=1;
}
;
} 
if ($coal==1 && $iron==1)
{

  $steel=1;
} 

if ($aluminum==1 && $lumber==1 && $iron==1 && $marble==1 && $rsGuestbook["Technology_Purchased"]>5)
{
//Construction

  $construction=1;
} 

if ($gold==1 && $lead==1 && $oil==1 && $rsGuestbook["Technology_Purchased"]>10)
{

  $microchip=1;
} 

if ($Construction==1 && $Oil==1 && $Rubber==1)
{
//Asphalt

  $Asphalt=1;
} 

if ($construction==1 && $microchip==1 && $steel==1 && $rsGuestbook["Technology_Purchased"]>15)
{

  $radiationcleanup=1;
  $globalradiation=$globalradiation-($globalradiation*.5);
} 

$environment=$environment+$globalradiation;
$population=$population+((12/$environment)*6);
$citizens=$citizens+((12/$environment)*6);

if (!isset($rsGuestbook["Tanks_Deployed"]))
{

  $deployedtanks=0;
}
  else
{

  $deployedtanks=$rsGuestbook["Tanks_Deployed"];
} 


if (!isset($rsGuestbook["Tanks_Defending"]))
{

  $defendingtanks=0;
}
  else
{

  $defendingtanks=$rsGuestbook["Tanks_Defending"];
} 


$numberoftanks=$defendingtanks+$deployedtanks;

if (!isset($rsGuestbook["Cruise_Purchased"]))
{

  $cruisemissles=0;
}
  else
{

  $cruisemissles=$rsGuestbook["Cruise_Purchased"];
} 


if (!isset($rsGuestbook["Strength"]))
{

  $nationstrength=0;
}
  else
{

  $nationstrength=$rsGuestbook["Strength"];
} 


$taxmod=0;

$populationhappiness=0;


if (!$rsGuestbook->BOF && !$rsGuestbook->EOF)
{

// $rsEvent is of type "ADODB.Recordset"

  $rsEventSQL="SELECT National_Event_Number,National_Event_Response,National_Event_Date,National_Event_Receiver_Ruler From National_Events where National_Event_Receiver = '".$rsGuestbook["Nation_ID"]."' AND National_Event_Date >= getdate()-30 Order By National_Event_Date desc";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsEventSQL);
} 


if (($rsEvent_BOF==1) && ($rsEvent==0))
{

  $arraya=null;
}
  else
{

  $arraya=();

  
  $rsEvent=null;



  $newevents=0;
  for ($lnLoopCounter=0; $lnLoopCounter<=count($arraya); $lnLoopCounter=$lnLoopCounter+1)
  {

    if ($arraya[1][$lnLoopCounter]==0 && $arraya[2][$lnLoopCounter]>time()()-5)
    {

      $newevents=$newevents+1;
      $neweventsruler=$arraya[3][$lnLoopCounter];
    } 

?>
		<!--#include file="event_code_effects.php" -->
		<? 

  } 

} 



$populationpermile=($FormatNumber[$population/($nationsize)][2]);

if (($rsGuestbook["Desired_Religion"])==($rsGuestbook["Religion"]) || $TempleWonder>0)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if (($rsGuestbook["Desired_Government"])==($rsGuestbook["Government_Type"]) || $MonumentWonder>0)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if ($oil==1)
{
  $populationhappiness=$populationhappiness+1.5;
}
;
} 
if ($gems==1)
{
  $populationhappiness=$populationhappiness+2.5;
}
;
} 
if ($water==1)
{

  if ($populationpermile>120)
  {
    $populationhappiness=$populationhappiness-1;
  }
;
  } 
} 

if ($water!=1)
{

  if ($populationpermile>70)
  {
    $populationhappiness=$populationhappiness-1;
  }
;
  } 
} 

if ($actualmilitary>($citizens*20) && $actualmilitary<($citizens*80))
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if ($actualmilitary>($citizens*80))
{
  $populationhappiness=$populationhappiness-5;
}
;
} 
if ($actualmilitary>($citizens*85))
{
  $populationhappiness=$populationhappiness-5;
}
;
} 
if ($actualmilitary>($citizens*90))
{
  $populationhappiness=$populationhappiness-5;
}
;
} 
if ($actualmilitary>($citizens*95))
{
  $populationhappiness=$populationhappiness-5;
}
;
} 
if ($actualmilitary>($citizens*10))
{
  $populationhappiness=$populationhappiness-5;
}
;
} 
if ($actualmilitary<($citizens*20) && (time()()-$rsGuestbook["Nation_Dated"]$Value>2))
{
  $populationhappiness=$populationhappiness-5;
}
;
} 
if ($actualmilitary<($citizens*10) && (time()()-$rsGuestbook["Nation_Dated"]$Value>2))
{
  $populationhappiness=$populationhappiness-9;
}
;
} 
if (($rsGuestbook["Military_Deployed"]$Value)>($actualmilitary/175))
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if (($rsGuestbook["Infrastructure_Purchased"]$Value)>($nationsize/10))
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if (($rsGuestbook["Tax_Rate"]$Value)>=10 && ($rsGuestbook["Tax_Rate"]$Value)<=16)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if (($rsGuestbook["Tax_Rate"]$Value)>16 && ($rsGuestbook["Tax_Rate"]$Value)<=20)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if (($rsGuestbook["Tax_Rate"]$Value)>20 && ($rsGuestbook["Tax_Rate"]$Value)<=23)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if (($rsGuestbook["Tax_Rate"]$Value)>23 && ($rsGuestbook["Tax_Rate"]$Value)<=25)
{
  $populationhappiness=$populationhappiness-3;
}
;
} 
if (($rsGuestbook["Tax_Rate"]$Value)>23 && ($rsGuestbook["Tax_Rate"]$Value)<=25)
{
  $populationhappiness=$populationhappiness+($intelligence_agencies*1);
}
;
} 
if (($rsGuestbook["Tax_Rate"]$Value)>25 && ($rsGuestbook["Tax_Rate"]$Value)<=35)
{
  $populationhappiness=$populationhappiness-5;
}
;
} 
if (($rsGuestbook["Tax_Rate"]$Value)>25 && ($rsGuestbook["Tax_Rate"]$Value)<=35)
{
  $populationhappiness=$populationhappiness+($intelligence_agencies*1);
}
;
} 
if (($rsGuestbook["Nation_Dated"]$Value)>time()()-15)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if ($actualdeployed<($actualmilitary/3))
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if ($nationsize>$nationage/3)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if ($governmenteffecthappiness==1)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)==0)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)>0 && ($rsGuestbook["Technology_Purchased"]$Value)<=5)
{
  $populationhappiness=$populationhappiness+0;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)>5 && ($rsGuestbook["Technology_Purchased"]$Value)<=1)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)>1 && ($rsGuestbook["Technology_Purchased"]$Value)<=3)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)>3 && ($rsGuestbook["Technology_Purchased"]$Value)<=6)
{
  $populationhappiness=$populationhappiness+3;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)>6 && ($rsGuestbook["Technology_Purchased"]$Value)<=10)
{
  $populationhappiness=$populationhappiness+4;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)>10 && ($rsGuestbook["Technology_Purchased"]$Value)<=15)
{
  $populationhappiness=$populationhappiness+5;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)>15 && ($rsGuestbook["Technology_Purchased"]$Value)<=200)
{
  $populationhappiness=$populationhappiness+5+($rsGuestbook["Technology_Purchased"]*.02);
}
;
} 
if (($rsGuestbook["Technology_Purchased"]$Value)>200)
{
  $populationhappiness=$populationhappiness+9;
}
;
} 
if ($tradewithinteam>0)
{
  $populationhappiness=$populationhappiness+$tradewithinteam;
}
;
} 
if ($FormatNumber[$rsGuestbook["Nation_Dated"]+7-time()()][0]==0)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if ($FormatNumber[$rsGuestbook["Nation_Dated"]+14-time()()][0]==0)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if ($FormatNumber[$rsGuestbook["Nation_Dated"]+30-time()()][0]==0)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if ($FormatNumber[$rsGuestbook["Nation_Dated"]+60-time()()][0]==0)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if ($FormatNumber[$rsGuestbook["Nation_Dated"]+90-time()()][0]==0)
{
  $populationhappiness=$populationhappiness+3;
}
;
} 
if ($FormatNumber[$rsGuestbook["Nation_Dated"]+180-time()()][0]==0)
{
  $populationhappiness=$populationhappiness+4;
}
;
} 
if ($FormatNumber[$rsGuestbook["Nation_Dated"]+365-time()()][0]==0)
{
  $populationhappiness=$populationhappiness+5;
}
;
} 
if (($rsGuestbook["DEFCON"]$Value)==5)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if (($rsGuestbook["DEFCON"]$Value)==4)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if (($rsGuestbook["DEFCON"]$Value)==2)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if (($rsGuestbook["DEFCON"]$Value)==1)
{
  $populationhappiness=$populationhappiness-2;
}
;
} 
if (time()()-($rsGuestbook["Nuclear_Attacked"])<4 && $populationhappiness<0)
{
  $populationhappiness=$populationhappiness-10;
}
;
} 
if ($water==1)
{
  $populationhappiness=$populationhappiness+2.5;
}
;
} 
if ($Silver==1)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if ($Wine==1)
{
  $populationhappiness=$populationhappiness+3;
}
;
} 
if ($Spices==1)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if ($Sugar==1)
{
  $populationhappiness=$populationhappiness+1;
}
;
} 
if ($rsGuestbook["Nuclear"]==2 && $uranium==1)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if ($rsGuestbook["Nation_Peace"]==1 && time()()-$rsGuestbook["Nation_Peace_Date"]>3 && time()()-$rsGuestbook["Nation_Dated"]<=7)
{
  $populationhappiness=$populationhappiness-5;
}
;
} 
if ($rsGuestbook["Nation_Peace"]==1 && time()()-$rsGuestbook["Nation_Peace_Date"]>5 && time()()-$rsGuestbook["Nation_Dated"]<=7)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if ($rsGuestbook["Nation_Peace"]==1 && time()()-$rsGuestbook["Nation_Peace_Date"]>7)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if ($rsGuestbook["Nation_Peace"]==1 && time()()-$rsGuestbook["Nation_Peace_Date"]>9)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if ($rsGuestbook["Nation_Peace"]==1 && time()()-$rsGuestbook["Nation_Peace_Date"]>11)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
if ($rsGuestbook["Nation_Peace"]==1 && time()()-$rsGuestbook["Nation_Peace_Date"]>13)
{
  $populationhappiness=$populationhappiness-1;
}
;
} 
$populationhappiness=$populationhappiness+($border_walls*2);
$populationhappiness=$populationhappiness+$churches;
$populationhappiness=$populationhappiness-$labor_camps;
$populationhappiness=$populationhappiness+($police_headquarters*2);
$populationhappiness=$populationhappiness+($stadiums*3);
$populationhappiness=$populationhappiness-($environment*.40);
if ($globalradiation<=2)
{
  $populationhappiness=$populationhappiness+1;
} 
if ($Asphalt==1 && $Steel==1)
{

  $automobile=1;
  $populationhappiness=$populationhappiness+2.5;
} 

if ($gold==1 && $silver==1 && $gems==1 && $coal==1)
{

  $jewelry=1;
  $populationhappiness=$populationhappiness+1.5;
} 

if ($jewelry==1 && $fish==1 && $furs==1 && $wine==1)
{

  $affluent=1;
  $populationhappiness=$populationhappiness+2;
} 

if ($water==1 && $wheat==1 && $aluminum==1 && $lumber==1)
{

  $beer=1;
  $populationhappiness=$populationhappiness+2;
} 

if ($cattle==1 && $sugar==1 && $spices==1 && $pigs==1)
{

  $fastfood=1;
  $populationhappiness=$populationhappiness+2;
} 

if ($microchip==1)
{
  $populationhappiness=$populationhappiness+2;
}
;
} 
if ($InternetWonder==1)
{
  $populationhappiness=$populationhappiness+5;
}
;
} 
if ($SpaceWonder==1)
{
  $populationhappiness=$populationhappiness+3;
}
;
} 
if ($MonumentWonder==1)
{
  $populationhappiness=$populationhappiness+4;
}
;
} 
if ($MovieWonder==1)
{
  $populationhappiness=$populationhappiness+3;
}
;
} 
if ($TempleWonder==1)
{
  $populationhappiness=$populationhappiness+5;
}
;
} 
if ($MemorialWonder==1)
{
  $populationhappiness=$populationhappiness+3;
}
;
} 
if (($rsGuestbook["Technology_Purchased"]>200 && $rsGuestbook["Technology_Purchased"]<=3000 && $UniversityWonder==1))
{
  $populationhappiness=$populationhappiness+(($rsGuestbook["Technology_Purchased"]-200)*.002);
}
;
} 
if (($rsGuestbook["Technology_Purchased"]>3000 && $UniversityWonder==1))
{
  $populationhappiness=$populationhappiness+5.6;
}
;
} 

if ($rsGuestbook["Nation_Peace"]==1 && time()()-$rsGuestbook["Nation_Peace_Date"]>5 && $rsGuestbook["Nation_Dated"]-time()()<7)
{

  if ($gold==1)
  {

    $dailypopulationincome=($FormatNumber[($rsGuestbook["Infrastructure_Purchased"]/($citizens/40))+18+($populationhappiness*1)][2]);
  }
    else
  {

    $dailypopulationincome=($FormatNumber[($rsGuestbook["Infrastructure_Purchased"]/($citizens/40))+15+($populationhappiness*1)][2]);
  } 

}
  else
{

  if ($actualdefend<($population/20) || $actualdefend<$actualmilitary*024)
  {

    if ($gold==1)
    {

      $dailypopulationincome=($FormatNumber[($rsGuestbook["Infrastructure_Purchased"]/($citizens/40))+13+($populationhappiness*2)][2]);
    }
      else
    {

      $dailypopulationincome=($FormatNumber[($rsGuestbook["Infrastructure_Purchased"]/($citizens/40))+10+($populationhappiness*2)][2]);
    } 

  }
    else
  {

    if ($gold==1)
    {

      $dailypopulationincome=($FormatNumber[($rsGuestbook["Infrastructure_Purchased"]/($citizens/40))+33+($populationhappiness*2)][2]);
    }
      else
    {

      $dailypopulationincome=($FormatNumber[($rsGuestbook["Infrastructure_Purchased"]/($citizens/40))+30+($populationhappiness*2)][2]);
    } 

  } 

} 


if ($Furs==1)
{

  $dailypopulationincome=$dailypopulationincome+3.00;
} 

if ($Furs==1)
{

  $dailypopulationincome=$dailypopulationincome+2.00;
} 

if ($Gems==1)
{

  $dailypopulationincome=$dailypopulationincome+1.50;
} 

if ($StockWonder==1)
{

  $dailypopulationincome=$dailypopulationincome+10.00;
} 

if ($lumber==1 && $lead==1 && $literacy>=90)
{

  $Scholar=1;
  $dailypopulationincome=$dailypopulationincome+3.00;
} 


if ($rsGuestbook["Military_Depleated"]>=time()()-3)
{
  $dailypopulationincome=($FormatNumber[($dailypopulationincome*.60)][2]);
}
;
} 

if ($rsGuestbook["Nuclear"]==2 && $uranium==1)
{

  $techpower=$rsGuestbook["Technology_Purchased"];
  if ($techpower>30)
  {

    $techpower=30;
  } 

  $dailypopulationincome=$dailypopulationincome+3+($techpower*.20);
  $dailypopulationincome=$FormatNumber[$dailypopulationincome][2];
} 


if (time()()-($rsGuestbook["Nuclear_Attacked"])<4)
{

  $dailypopulationincome=$dailypopulationincome*.15;
} 


// change the income based on the random events

$dailypopulationincome=$dailypopulationincome+$taxmod;

if ($dailypopulationincome<10)
{

  $dailypopulationincome=10;
} 

$dailypopulationincome=$dailypopulationincome+($dailypopulationincome*($banks*.07));
$dailypopulationincome=$dailypopulationincome+($dailypopulationincome*($foreign_ministries*.05));
$dailypopulationincome=$dailypopulationincome-($dailypopulationincome*($guerilla_camps*.08));
$dailypopulationincome=$dailypopulationincome+($dailypopulationincome*($harbors*.01));
$dailypopulationincome=$dailypopulationincome+($dailypopulationincome*($schools*.05));
$dailypopulationincome=$dailypopulationincome+($dailypopulationincome*($universities*.08));

if ($dailypopulationincome<15)
{
  $populationincomehealth="(A very weak economy)";
}
;
} 
if ($dailypopulationincome>=15 && $populationincome<30)
{
  $populationincomehealth="(A weak economy)";
}
;
} 
if ($dailypopulationincome>=30 && $populationincome<70)
{
  $populationincomehealth="(An average economy)";
}
;
} 
if ($dailypopulationincome>=70 && $populationincome<120)
{
  $populationincomehealth="(A strong economy)";
}
;
} 
if ($dailypopulationincome>=120 && $populationincome<200)
{
  $populationincomehealth="(A solid economy)";
}
;
} 
if ($dailypopulationincome>=200)
{
  $populationincomehealth="(A very solid economy)";
}
;
} 

$netdailypopulationincome=($FormatNumber[$dailypopulationincome-($dailypopulationincome*($rsGuestbook["Tax_Rate"]/100))][2]);

$dailypopulationtaxes=($FormatNumber[$dailypopulationincome-$netdailypopulationincome][2]);

$dailygovernmentincome=($FormatNumber[($dailypopulationtaxes*$citizens)][2]);

$totalmoneyspent=$FormatNumber[$rsGuestbook["Money_Spent"]+$rsGuestbook["Government_Bills"]][2];

$totalmoneyavailable=($FormatNumber[($rsGuestbook["Money_Earned"]-$totalmoneyspent)][2]);

$dtNow=time()();
$dtCreated=$rsGuestbook["Nation_Dated"];
$iDaysDifference=$DateDiff["d"][$dtCreated][$dtNow];

$aidslots=4;
$tradeslots=4;
$aidslots=$aidslots+$foreign_ministries;
if ($DisasterWonder==1)
{
  $aidslots=$aidslots+1;
}
;
} 

$tradeslots=$tradeslots+$harbors;

?>
