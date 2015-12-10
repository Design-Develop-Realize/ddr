<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
  session_register("GoForLaunch_session");
?>
<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?>

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
if ($_POST["Password"]=="")
{

  $denyreason_session="You did not enter anything in the password validation field. Please try again.";
  header("Location: "."activity_denied.asp");
} 


$sDigest=sha256($_POST["Password"]);
if ($sDigest!=$rsUser["U_Password_Secure"])
{

  $denyreason_session="The password that you entered did not match in the system. Please try again.";
  header("Location: "."activity_denied.asp");
} 



$rsWarCheck__MMColParam="0";
if (($MM_Username_session!=""))
{
  $rsWarCheck__MMColParam=$MM_Username_session;
} 
// $rsWarCheck is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT War_Declaration_Date,Receiving_Nation_ID,Declaring_Nation_ID,Receiving_Nation_Peace,Declaring_Nation_Peace FROM WAR WHERE Nation_Deleted = 0 AND War_Declaration_Date >= getdate() - 7 AND War.War_Declared_By_User = '"+str_replace("'","''",$rsWarCheck__MMColParam)+"' OR War.War_Declared_ON_User = '"+str_replace("'","''",$rsWarCheck__MMColParam)+"' ORDER BY War.War_Declaration_Date DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

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
        $wartime=$DateDiff["h"][$rsWarCheck["War_Declaration_Date"]][strftime("%m/%d/%Y %H:%M:%S %p")()];
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



if ($wartime<24)
{

  $denyreason_session="You must wait 24 hours after declaring war before launching nuclear weapons.";
  header("Location: "."activity_denied.asp");
} 



$rsWarCheck=null;

?>

<!--#include file="activity.php" -->


<? if ($GoForLaunch_session!=1)
{

  $GoForLaunch_session=null;
  $denyreason_session="You may not launch nuclear weapons against a nation that you are not at war against.";
  header("Location: "."activity_denied.asp");
}
  else
{

  $GoForLaunch_session="";
} 

?>


<? 
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

$strSQL="SELECT Government_Changed,Government_Type,Military_Depleated,Nuclear_Attacked,Cruise_Purchased,Tanks_Defending,Infrastructure_Purchased,Land_Purchased,Nuclear_Attacked,Military_Purchased,Military_Defending_Casualties,Military_Attacking_Casualties,Military_Deployed FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 2;
echo 3;
$rs=mysql_query($strSQL);
if ($rsUpdateEntry["Nuclear_Attacked"]>=time()())
{

  $denyreason_session="That nation has already been attacked with nuclear weapons today.";
  header("Location: "."activity_denied.asp");
} 


$nuclearkills=("Military_Purchased")-("Military_Defending_Casualties")-("Military_Attacking_Casualties")-("Military_Deployed");
if ($nuclearkills<0)
{
  $nuclearkills=0;
}
;
} 
if (("Land_Purchased")>0)
{

  $nuclearland=("Land_Purchased")*.35;
}
  else
{

  $nuclearland=0;
} 

if ($nuclearland>150)
{
  $nuclearland=150;
}
;
} 
$nuclearinfrastructure=("Infrastructure_Purchased")*.35;
if ($nuclearinfrastructure>150)
{
  $nuclearinfrastructure=150;
}
;
} 

//Military_Defending_Casualties") = rsUpdateEntry.Fields("Military_Defending_Casualties") + nuclearkills//Land_Purchased") = rsUpdateEntry.Fields("Land_Purchased") - nuclearland//Infrastructure_Purchased") = rsUpdateEntry.Fields("Infrastructure_Purchased") - nuclearinfrastructure

if (!isset(("Tanks_Defending")))
{

  $numtanksdefending=0;
}
  else
{

  $numtanksdefending=("Tanks_Defending");
} 

$nucleartanks=$numtanksdefending*.35;
$nucleartanks=$FormatNumber[$nucleartanks][0];
//Tanks_Defending") = rsUpdateEntry.Fields("Tanks_Defending") - nucleartanks 

if (!isset(("Cruise_Purchased")))
{

  $numcruisemissiles=0;
}
  else
{

  $numcruisemissiles=("Cruise_Purchased");
} 

$cruisemissiles=$numcruisemissiles*.35;
$cruisemissiles=$FormatNumber[$cruisemissiles][0];
//Cruise_Purchased") = rsUpdateEntry.Fields("Cruise_Purchased") - cruisemissiles

//Nuclear_Attacked") = now()//Military_Depleated") = date()//Government_Type") = "Anarchy"//Government_Changed") = date()
//Write the updated recordset to the database


?>
<? 
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

$strSQL="Update Aircraft Set [Yakovlev Yak-9] = [Yakovlev Yak-9] * .75, [P-51 Mustang] = [P-51 Mustang] *.75, [F-86 Sabre] = [F-86 Sabre] *.75, [Mikoyan-Gurevich MiG-15] = [Mikoyan-Gurevich MiG-15] * .75, [F-100 Super Sabre] = [F-100 Super Sabre] *.75, [F-35 Lightning II] = [F-35 Lightning II] *.75, [F-15 Eagle] = [F-15 Eagle] *.75, [Su-30 MKI] = [Su-30 MKI] *.75, [F-22 Raptor] = [F-22 Raptor] *.75, [AH-1 Cobra] = [AH-1 Cobra] *.75, [AH-64 Apache] = [AH-64 Apache] *.75, [Bristol Blenheim] = [Bristol Blenheim] *.75, [B-25 Mitchell] = [B-25 Mitchell] *.75, [B-17G Flying Fortress] = [B-17G Flying Fortress] *.75, [B-52 Stratofortress] = [B-52 Stratofortress] *.75, [B-2 Spirit] = [B-2 Spirit] *.75, [B-1B Lancer] = [B-1B Lancer] *.75, [Tupolev Tu-160] = [Tupolev Tu-160] *.75 WHERE Nation_ID=".intval($_POST["receivingnation"]);
echo 0;
echo 2;
echo 3;
$rs=mysql_query($strSQL);?> 
<? 
$lngRecordNo2=intval($_POST["bynation"]);
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

$strSQL="SELECT Nuclear_Purchased,Nuclear_IP FROM Nation WHERE Nation_ID=".$lngRecordNo2;
echo 2;
echo 3;
$rs=mysql_query($strSQL);
if (("Nuclear_Purchased")-1<0)
{

  $denyreason_session="You do not have any nuclear weapons to launch.";
  header("Location: "."activity_denied.asp");
}
  else
{

  //Nuclear_Purchased") = rsUpdateEntry.Fields("Nuclear_Purchased") - 1  //Nuclear_IP") = Request.ServerVariables("remote_addr")} 




$rsUpdateEntry=null;

?>


<? 
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


//Add a new record to the recordset

//U_ID") = Request.Form("receivinguser")//MESS_FROM") =  Request.Form("attackinguser") //MESSAGE") = "Your nation has been attacked with nuclear weapons by " & Request.Form("attackinguser")  & ". You lost " & nuclearkills &  " soldiers, " & nucleartanks & " defending tanks, " & cruisemissiles & " cruise missiles, " & FormatNumber(nuclearland,3) &  " miles of land, "  & FormatNumber(nuclearinfrastructure,3)&  " infrastructure, and 1/4 of your aircraft force. In addition to these losses your nation will experience many days of economic devastation."//SUBJECT") = "Nuclear Attack"//MESS_READ") = "False"


//Write the updated recordset to the database



//Reset server objects


$rsAddComments=null;

$adoCon=null;

?>


<body>


<table border="1" width="100%" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080" id="table1">
	
	
		<tr>
			<td width="50%">
			<p align="center">
			<img border="0" src="http://cybernations.net/assets/nuclear_fire.jpg" width="250" height="207"></p>
			<p>Your nuclear attack against <? echo $_POST["defendingnation"]; ?> was a success. <? echo $_POST["defendingnation"]; ?> lost 
			<? echo $nuclearkills; ?> defending soldiers, <? echo $nucleartanks; ?> defending tanks, 
			<? echo $cruisemissiles; ?> cruise missiles, 
			<? echo $FormatNumber[$nuclearland][3]; ?> miles of land, <? echo $FormatNumber[$nuclearinfrastructure][2]; ?>
			infrastructure, and 1/4 of their aircraft force. In addition to these losses <? echo $_POST["defendingnation"]; ?> will experience many days of economic 
			devastation in their nation.
			</td>
		</tr>
		
		</table>

<p align="center"> <a href="nation_war_information.asp?Nation_ID=<? echo $_POST["bynation"]; ?>">Back to your nation's War 
&amp; Battles Page</a></p>

</body></html>
<!--#include file="inc_footer.php" -->
<? $objConn->Close();
$objConn=null;
?>
