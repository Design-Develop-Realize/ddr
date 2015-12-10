<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>
<!--#include file="connection.php" -->
<? 
// *** Restrict Access To Page: Grant or deny access to this page

$MM_authorizedUsers="";
$MM_authFailedURL="login.asp";
$MM_grantAccess=false;
if ($MM_Username_session!="")
{

  if ((false || $MM_UserAuthorization_session=="") || 
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
<!--#include file="inc_header.php" -->
<? 
$lngRecordNo=intval($_GET["ID"]);
$lngRecordNo2=intval($rsGuestbookHead["Nation_ID"]);
// $rsUpdateEntry is of type "ADODB.Recordset"

echo $MM_conn_STRING_Trade;
echo "SELECT Declaring_Nation_ID,Receiving_Nation_ID,Trade_Cancled,Trade_Issued_On_User,Trade_Issued_By_User FROM Trade WHERE ID =".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query();


if ($rsUpdateEntry["Declaring_Nation_ID"]!=$rsGuestbookHead["Nation_ID"] && $rsUpdateEntry["Receiving_Nation_ID"]!=$rsGuestbookHead["Nation_ID"])
{

  $denyreason_session="That trade agreement does not belong to you.";
  header("Location: "."activity_denied.asp");
}
  else
{

  //Trade_Cancled") = 2  
} 



// Send a message about the canceled trade agreement

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

if ($rsUpdateEntry["Declaring_Nation_ID"]=$rsGuestbookHead["Nation_ID"]$then;
("U_ID")==$rsUpdateEntry["Trade_Issued_On_User"])
{
  } 
//MESS_FROM") =  rsUpdateEntry("Trade_Issued_By_User") //MESSAGE") = "The trade offer that was submitted to you by "& rsUpdateEntry("Trade_Issued_By_User") &" has been manually canceled by "& rsGuestbookHead("Poster") &"."//SUBJECT") = "Trade Canceled"//MESS_READ") = "False"if rsUpdateEntry("Receiving_Nation_ID") = rsGuestbookHead("Nation_ID") then
	rsAddComments.Fields("U_ID") = rsUpdateEntry("Trade_Issued_By_User")
	rsAddComments.Fields("MESS_FROM") =  rsUpdateEntry("Trade_Issued_On_User") 
	rsAddComments.Fields("MESSAGE") = "The trade offer that was submitted by you to "& rsUpdateEntry("Trade_Issued_On_User") &" has been manually canceled by "& rsGuestbookHead("Poster") &"."
	rsAddComments.Fields("SUBJECT") = "Trade Canceled"
	rsAddComments.Fields("MESS_READ") = "False"
end if

rsAddComments.Update 
 
rsAddComments.Close
Set rsAddComments = Nothing
Set adoCon = Nothing 
rsUpdateEntry.Close
Set rsUpdateEntry= Nothing
objConn.Close()
Set objConn = Nothing

'Return to the delete select page in case another record needs deleting
Response.Redirect "trade_information.asp?Nation_ID="& lngRecordNo2

%>
