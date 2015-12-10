<? 
// $rsWonder is of type "ADODB.Recordset"

if (!((strpos($_SERVER["Path_Info"],"nation_drill_display.asp") ? strpos($_SERVER["Path_Info"],"nation_drill_display.asp")+1 : 0)>0) && !((strpos($_SERVER["Path_Info"],"nation_drill_display_guest.asp") ? strpos($_SERVER["Path_Info"],"nation_drill_display_guest.asp")+1 : 0)>0))
{

  $rsWonderSQL="SELECT * FROM National_Wonders WHERE Nation_ID='".$rsGuestbookHead["Nation_ID"]."'  ";
}
  else
{

  $rsWonderSQL="SELECT * FROM National_Wonders WHERE Nation_ID='".intval($_GET["Nation_ID"])."'  ";
} 

echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsWonderSQL);
$InternetWonder=0;
$SpaceWonder=0;
$MonumentWonder=0;
$MovieWonder=0;
$UniversityWonder=0;
$ResearchWonder=0;
$SocialWonder=0;
$DisasterWonder=0;
$InterstateWonder=0;
$TempleWonder=0;
$MemorialWonder=0;
$StockWonder=0;

if ((!($rsWonder_BOF==1)) && (!($rsWonder==0)))
{

  $InternetWonder=$rsWonder["Internet"];
  $SpaceWonder=$rsWonder["Space_Program"];
  $MonumentWonder=$rsWonder["Great_Monument"];
  $MovieWonder=$rsWonder["Movie_Industry"];
  $UniversityWonder=$rsWonder["Great_University"];
  $ResearchWonder=$rsWonder["Research_Lab"];
  $SocialWonder=$rsWonder["Social_Security"];
  $DisasterWonder=$rsWonder["Disaster_Relief"];
  $InterstateWonder=$rsWonder["Interstate_System"];
  $TempleWonder=$rsWonder["Great_Temple"];
  $MemorialWonder=$rsWonder["War_Memorial"];
  $StockWonder=$rsWonder["Stock_Market"];
} 



$rsWonder=null;

?>
