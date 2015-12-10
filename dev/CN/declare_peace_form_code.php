<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
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
<!--#include file="activity.php" -->
<!--#include file="inc_header.php" -->

<? 
$lngRecordNo1=$_POST["lngRecordNo1"];
$lngRecordNo1=str_replace("'","''",$lngRecordNo1);
if ($_POST["disregard"]==1 && ($_POST["Receiving_Nation_Peace"]==0 || $_POST["Declaring_Nation_Peace"]==0))
{

  header("Location: "."allNations_display.asp");

}
  else
{
  if ($_POST["Receiving_Nation_Peace"]==0 && $_POST["Declaring_Nation_Peace"]==0)
  {

    header("Location: "."allNations_display.asp");
  }
    else
  {


?>


<? 
    $warid=intval($_POST["warid"]);
    $lngRecordNo=intval($_POST["Declaring_Nation_ID"]);
    $lngRecordNo=str_replace("'","''",$lngRecordNo);
    $lngRecordNo1=intval($_POST["lngRecordNo1"]);
    $lngRecordNo1=str_replace("'","''",$lngRecordNo1);
    $lngRecordNo2=intval($_POST["lngRecordNo2"]);
    $lngRecordNo2=str_replace("'","''",$lngRecordNo2);
// $rsAddComments is of type "ADODB.Recordset"

    $rsAddCommentsSQL="SELECT WAR.* FROM WAR WHERE ID =".$warid;
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsAddCommentsSQL);
    $rsAddComments_numRows=0;


//Add a new record to the recordset

    //Declaring_Nation_Peace") = CLng(Request.Form("Declaring_Nation_Peace"))    //Receiving_Nation_Peace") = CLng(Request.Form("Receiving_Nation_Peace"))    //Peace_Declared_Date") = date()
//Write the updated recordset to the database

    
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

    if ($_POST["byuser"]==$rsUser["U_ID"])
    {

//Add a new record to the recordset

      //U_ID") = Request.Form("onuser")      //MESS_FROM") =  Request.Form("byuser")       //MESSAGE") = "A peace offer has been submitted by " & Request.Form("byuser") & " to end the bloodshed between your nations. As soon as both nations accept peace, the war will end."       //SUBJECT") = "Peace Offer"      //MESS_READ") = "False"    }
      else
    {

//Add a new record to the recordset

      //U_ID") = Request.Form("byuser")      //MESS_FROM") =  Request.Form("onuser")       //MESSAGE") = "A peace offer has been submitted by " & Request.Form("onuser") & "  to end the bloodshed between your nations. As soon as both nations propose peace, the war will end."       //SUBJECT") = "Peace Offer"      //MESS_READ") = "False"    } 



//Write the updated recordset to the database

    


?>

<? 
//Reset server objects

$rsUser->Close;
    $rsUser=null;

    
    $rsAddComments=null;

$objConn->Close;
    $objConn=null;

?>

<? 
//Redirect to the guestbook.asp page

    header("Location: "."nation_war_information.asp?Nation_ID=".$lngRecordNo);
  } 

} 


?>

 


