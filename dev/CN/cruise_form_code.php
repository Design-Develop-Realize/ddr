<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
?>
<head>
<bgsound src="assets/Missile.wav" loop="1">
</head>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<? 
// *** Restrict Access To Page: Grant or deny access to this page

$MM_authorizedUsers="";
$MM_authFailedURL="login.asp?login=1";
$MM_grantAccess=false;
if ($MM_Username_session!="")
{

  if ((true || $MM_UserAuthorization_session=="") || 
     ((strpos(1,$MM_authorizedUsers,$MM_UserAuthorization_session) ? strpos(1,$MM_authorizedUsers,$MM_UserAuthorization_session)+1 : 0)>=1))
  {

    $MM_grantAccess=true;
  } 

} 

if (!$MM_grantAccess)
{

  $MM_qsChar="?";
  if (((strpos(1,$MM_authFailedURL,"?") ? strpos(1,$MM_authFailedURL,"?")+1 : 0)>=1))
  {
    $MM_qsChar="&";
  } 
  $MM_referrer=$_SERVER["URL"];
  if ((strlen($_GET[])>0))
  {
    $MM_referrer=$MM_referrer."?".$_GET[];
  } 
  $MM_authFailedURL=$MM_authFailedURL.$MM_qsChar."accessdenied=".rawurlencode($MM_referrer);
  header("Location: ".$MM_authFailedURL);
} 

?>
<? 
$rsWarCheck__MMColParam="0";
if (($MM_Username_session!=""))
{
  $rsWarCheck__MMColParam=$MM_Username_session;
} 
// $rsWarCheck is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Receiving_Nation_ID,Declaring_Nation_ID,Receiving_Nation_Peace,Declaring_Nation_Peace FROM WAR WHERE Nation_Deleted = 0 AND War_Declaration_Date >= getdate() - 8 AND War.War_Declared_By_User = '"+str_replace("'","''",$rsWarCheck__MMColParam)+"' OR War.War_Declared_ON_User = '"+str_replace("'","''",$rsWarCheck__MMColParam)+"' ORDER BY War.War_Declaration_Date DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsWarCheck_numRows=0;
$activewars=0;
if ((!($rsWarCheck_BOF==1)) && (!($rsWarCheck==0)))
{

  while(!($rsWarCheck==0))
  {

    if (($rsWarCheck["Receiving_Nation_ID"]-$_POST["bynation"]==0 && $rsWarCheck["Declaring_Nation_ID"]-$_POST["receivingnation"]==0) || ($rsWarCheck["Receiving_Nation_ID"]-$_POST["receivingnation"]==0 && $rsWarCheck["Declaring_Nation_ID"]-$_POST["bynation"]==0))
    {

      if ($rsWarCheck["Receiving_Nation_Peace"]+$rsWarCheck["Declaring_Nation_Peace"]!=2)
      {

        $activewars=$activewars+1;
      } 

    } 

    $rsWarCheck=mysql_fetch_array($rsWarCheck_query);
    $rsWarCheck_BOF=0;

  } 
} 

if ($activewars==0)
{

  $denyreason_session="You may not attack a nation that you are not at war against.";
  header("Location: "."activity_denied.asp");
} 


$rsWarCheck=null;

?>


<!--#include file="activity.php" -->

<? 

$lngRecordNo2=intval($_POST["bynation"]);
$lngRecordNo2=str_replace("'","''",$lngRecordNo2);
// $adoCon is of type "ADODB.Connection"

$a2p_connstr==$MM_conn_STRING;
$a2p_uid=strstr($a2p_connstr,'uid');
$a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_pwd=strstr($a2p_connstr,'pwd');
$a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_database=strstr($a2p_connstr,'dsn');
$a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
mysql_select_db($a2p_database,$adoCon);
// $rsUpdateEntry is of type "ADODB.Recordset"

$strSQL="SELECT Cruise_Purchased FROM Nation WHERE Nation_ID=".$lngRecordNo2;
echo 2;
echo 3;
$rs=mysql_query($strSQL);
if (("Cruise_Purchased")-1<0)
{

  $denyreason_session="You do not have any cruise missiles to launch.";
  header("Location: "."activity_denied.asp");
}
  else
{

  //Cruise_Purchased") = rsUpdateEntry.Fields("Cruise_Purchased") - 1} 




$lngRecordNo=intval($_POST["receivingnation"]);
// $adoCon is of type "ADODB.Connection"

$a2p_connstr==$MM_conn_STRING;
$a2p_uid=strstr($a2p_connstr,'uid');
$a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_pwd=strstr($a2p_connstr,'pwd');
$a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_database=strstr($a2p_connstr,'dsn');
$a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
mysql_select_db($a2p_database,$adoCon);
// $rsUpdateEntry is of type "ADODB.Recordset"

$strSQL="SELECT Tanks_Defending,Technology_Purchased,Infrastructure_Purchased FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 2;
echo 3;
$rs=mysql_query($strSQL);

if (!isset(("Tanks_Defending")))
{

  $numtanksdefending=0;
}
  else
{

  $numtanksdefending=("Tanks_Defending");
} 


//techmod = (rsUpdateEntry.Fields("Technology_Purchased")/100)

//if techmod > .30 then techmod = .30 end if

$techmod=0;

$improvenationidatt=intval($_POST["bynation"]);
$improvenationidatt=str_replace("'","''",$improvenationidatt);
// $rsImproveAttack is of type "ADODB.Recordset"

$rsImproveAttackSQL="SELECT Satellites FROM Improvements WHERE Nation_ID=".$improvenationidatt;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsImproveAttackSQL);
$rsImproveAttack_numRows=0;
$satellites=0;
if ((!($rsImproveAttack_BOF==1)) && (!($rsImproveAttack==0)))
{

  $satellites=$rsImproveAttack["Satellites"];
} 


$improvenationiddef=intval($_POST["receivingnation"]);
$improvenationiddef=str_replace("'","''",$improvenationiddef);
// $rsImproveDefend is of type "ADODB.Recordset"

$rsImproveDefendSQL="SELECT Missile_Defenses FROM Improvements WHERE Nation_ID=".$improvenationiddef;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsImproveDefendSQL);
$rsImproveDefend_numRows=0;
$missile_defenses=0;
if ((!($rsImproveDefend_BOF==1)) && (!($rsImproveDefend==0)))
{

  $missile_defenses=$rsImproveDefend["Missile_Defenses"];
} 


// Generate random results for tank kills

if ($numtanksdefending==0)
{

  $cruisetanks=0;
}
  else
{

  $highestNumber=($numtanksdefending*.10)+$techmod;
//highestNumber = highestNumber + (highestNumber * (satellites * .10))

//highestNumber = highestNumber - (highestNumber * (missile_defenses * .10))

  mt_srand((double)microtime()*1000000);
  $cruisetanks=intval((mt_rand(0,10000000)/10000000))+1;
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;
  if ($cruisetanks>10)
  {
    $cruisetanks=10;
  }
;
  } 
} 


// Generate random results for infrastructure destroyed

if (("Infrastructure_Purchased")==0)
{

  $cruiseinfrastructure=0;
}
  else
{

  $highestNumber=(("Infrastructure_Purchased")*.10)+$techmod;
//highestNumber = highestNumber + (highestNumber * (satellites * .10))

//highestNumber = highestNumber - (highestNumber * (missile_defenses * .10))

  mt_srand((double)microtime()*1000000);
  $cruiseinfrastructure=intval((mt_rand(0,10000000)/10000000))+1;
  $clear=(mt_rand(0,10000000)/10000000); //clear the random number generator
;
  if ($cruiseinfrastructure>10)
  {
    $cruiseinfrastructure=10;
  }
;
  } 
} 


if ($cruiseinfrastructure>20)
{
  $cruiseinfrastructure=20;
}
;
} 
if ($cruisetanks>20)
{
  $cruisetanks=20;
}
;
} 

$cruiseinfrastructure=$cruiseinfrastructure+($cruiseinfrastructure*($satellites*.10));
$cruiseinfrastructure=$cruiseinfrastructure-($cruiseinfrastructure*($missile_defenses*.10));
$cruisetanks=$cruisetanks+($cruisetanks*($satellites*.10));
$cruisetanks=$cruisetanks-($cruisetanks*($missile_defenses*.10));

if ($cruisetanks>20)
{
  $cruisetanks=20;
}
;
} 
if ($cruiseinfrastructure>20)
{
  $cruiseinfrastructure=20;
}
;
} 
if ($cruisetanks<0)
{
  $cruisetanks=0;
}
;
} 
if ($cruiseinfrastructure<0)
{
  $cruiseinfrastructure=0;
}
;
} 

if (("Tanks_Defending")-$cruisetanks<0)
{

  $cruisetanks=("Tanks_Defending");
} 

//Tanks_Defending") = rsUpdateEntry.Fields("Tanks_Defending") - cruisetanks 
if (("Infrastructure_Purchased")-$cruiseinfrastructure<0)
{

  $cruiseinfrastructure=("Infrastructure_Purchased");
} 

//Infrastructure_Purchased") = rsUpdateEntry.Fields("Infrastructure_Purchased") - cruiseinfrastructure


//Write the updated recordset to the database



$rsUpdateEntry=null;


$lngRecordNo=intval($_POST["receivingnation"]);

$lngRecordNo2=intval($_POST["bynation"]);

// $rsAttack is of type "ADODB.Recordset"

$rsAttackSQL="SELECT Receiving_Nation_ID,Declaring_Nation_ID,Receiving_Cruise_Date2,Receiving_Cruise_Date1,Declaring_Cruise_Date2,Declaring_Cruise_Date1 FROM WAR WHERE (Receiving_Nation_ID = '".$lngRecordNo."' OR Declaring_Nation_ID = '".$lngRecordNo."') AND (Receiving_Nation_ID = '".$lngRecordNo2."' OR Declaring_Nation_ID = '".$lngRecordNo2."') AND (Nation_Deleted = 0) AND (Receiving_Nation_Peace + Declaring_Nation_Peace <> 2) AND (getdate() - War_Declaration_Date < 8)  ORDER BY War.War_Declaration_Date DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAttackSQL);

$receivingattack=0;
$declaringattack=0;
if ($rsAttack["Receiving_Nation_ID"]=$lngRecordNo2$then$receivingattack=1;
}
;
$if$rsAttack["Declaring_Nation_ID"]=$lngRecordNo2$then$declaringattack=1;
}
;
)
{
  if ($receivingattack==0 && $declaringattack==0)
  {

    $denyreason_session="There was an error in your form submission.";
    header("Location: "."activity_denied.asp");
  } 
} 


if ($receivingattack==1)
{

  if (("Receiving_Cruise_Date2")==time()())
  {

    $denyreason_session="You have already launched two cruise missiles today and cannot launch again until tomorrow.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    if (("Receiving_Cruise_Date1")==time()())
    {

      //Receiving_Cruise_Date2") = date()    }
      else
    {

      //Receiving_Cruise_Date1") = date()    } 

  } 

} 

if ($declaringattack==1)
{

  if (("Declaring_Cruise_Date2")==time()())
  {

    $denyreason_session="You have already launched two cruise missiles today and cannot launch again until tomorrow.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    if (("Declaring_Cruise_Date1")==time()())
    {

      //Declaring_Cruise_Date2") = date()    }
      else
    {

      //Declaring_Cruise_Date1") = date()    } 

  } 

} 


//Write the updated recordset to the database



$rsAttack=null;



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

//U_ID") = Request.Form("receivinguser")//MESS_FROM") =  Request.Form("attackinguser") //MESSAGE") = "Your nation has been attacked with a cruise missile by " & Request.Form("attackinguser")  & ". You lost " & FormatNumber(cruisetanks,0) & " defending tanks and "  & FormatNumber(cruiseinfrastructure,2)&  " infrastructure."//SUBJECT") = "Cruise Missile Attack"//MESS_READ") = "False"//From_System") = 1


//Reset server objects


$rsAddComments=null;

$adoCon=null;


?>
<body>

<table border="1" width="100%" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080" id="table1">
	
	
		<tr>
			<td width="50%">
			<p align="center">
			<img border="0" src="http://cybernations.net/images/cruisestrike.jpg" width="570" height="285"></p>
			<p>Your cruise missile attack against <? echo $_POST["defendingnation"]; ?> was a success. <? echo $_POST["defendingnation"]; ?> lost 
			<? echo $FormatNumber[$cruisetanks][0]; ?> defending tanks and <? echo $FormatNumber[$cruiseinfrastructure][2]; ?>
			infrastructure.
			<p>&nbsp;</td>
		</tr>
		
		</table>

<p align="center"> <a href="nation_war_information.asp?Nation_ID=<? echo $_POST["bynation"]; ?>">Back to your nation's War 
&amp; Battles Page</a></p>

</body></html>
<!--#include file="inc_footer.php" -->
<? $objConn->Close();
$objConn=null;
?>
