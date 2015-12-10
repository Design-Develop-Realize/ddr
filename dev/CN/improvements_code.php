<? 
$improvenationid=intval($_GET["Nation_ID"]);
// $rsImprove is of type "ADODB.Recordset"

if (!((strpos($_SERVER["Path_Info"],"nation_drill_display.asp") ? strpos($_SERVER["Path_Info"],"nation_drill_display.asp")+1 : 0)>0) && !((strpos($_SERVER["Path_Info"],"nation_drill_display_guest.asp") ? strpos($_SERVER["Path_Info"],"nation_drill_display_guest.asp")+1 : 0)>0))
{

  $rsImproveSQL="SELECT * FROM Improvements WHERE Nation_ID='".$rsGuestbookHead["Nation_ID"]."'  ";
}
  else
{

  $rsImproveSQL="SELECT * FROM Improvements WHERE Nation_ID='".intval($_GET["Nation_ID"])."'  ";
} 

echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsImproveSQL);
$rsImprove_numRows=0;
$banks=0;
$barracks=0;
$border_walls=0;
$churches=0;
$clinics=0;
$factories=0;
$foreign_ministries=0;
$guerilla_camps=0;
$harbors=0;
$hospitals=0;
$intelligence_agencies=0;
$labor_camps=0;
$missile_defenses=0;
$police_headquarters=0;
$satellites=0;
$schools=0;
$stadiums=0;
$universities=0;
if ((!($rsImprove_BOF==1)) && (!($rsImprove==0)))
{

  $banks=$rsImprove["Banks"];
  $barracks=$rsImprove["Barracks"];
  $border_walls=$rsImprove["Border_Walls"];
  $churches=$rsImprove["Churches"];
  $clinics=$rsImprove["Clinics"];
  $factories=$rsImprove["Factories"];
  $foreign_ministries=$rsImprove["Foreign_Ministries"];
  $guerilla_camps=$rsImprove["Guerilla_Camps"];
  $harbors=$rsImprove["Harbors"];
  $hospitals=$rsImprove["Hospitals"];
  $intelligence_agencies=$rsImprove["Intelligence_Agencies"];
  $labor_camps=$rsImprove["Labor_Camps"];
  $missile_defenses=$rsImprove["Missile_Defenses"];
  $police_headquarters=$rsImprove["Police_Headquarters"];
  $schools=$rsImprove["Schools"];
  $stadiums=$rsImprove["Stadiums"];
  $satellites=$rsImprove["Satellites"];
  $universities=$rsImprove["Universities"];
} 



$rsImprove=null;


?>
