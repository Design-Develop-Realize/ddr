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

<? if ($_POST["Tanks_Deployed"]=="" || $_POST["Military_Deployed"]=="")
{

  $denyreason_session="You must complete the entire deploy military form in order to deploy your forces.";
  header("Location: "."activity_denied.asp");
} 

?>

<? 
//Dim lngRecordNo    'Holds the record number to be updated$lngRecordNo=intval($_POST["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;

?>

<!--#include file="inc_header.php" -->
<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->

<? 

//Update the record in the recordset


if (($actualmilitary-$_POST["Military_Deployed"])<=($actualmilitary*35))
{

  //Military_Depleated") = date()  //Government_Type") = "Anarchy"  //Government_Changed") = date()} 



if (!isset(("Tanks_Defending")))
{

  $numtanksdefending=0;
}
  else
{

  $numtanksdefending=("Tanks_Defending");
} 


if (!isset(("Tanks_Deployed")))
{

  $numtanksdeployed=0;
}
  else
{

  $numtanksdeployed=("Tanks_Deployed");
} 


$sendingaway=0;
$amountsending=0;
$amountsending=$numtanksdeployed-$_POST["Tanks_Deployed"];
if ($_POST["Tanks_Deployed"]>=$numtanksdeployed)
{

  $sendingaway=1;
  $numtanksdefending=$numtanksdefending+$amountsending;
}
  else
{

  $numtanksdefending=$numtanksdefending-$amountsending;
} 


if ($sendingaway==1)
{

  $numtanksdeployed=$numtanksdeployed-$amountsending;
}
  else
{

  $numtanksdeployed=$numtanksdeployed+$amountsending;
} 




//Tanks_Defending") = numtanksdefending //Tanks_Deployed") = numtanksdeployed 


//Military_Deployed") = (Request.form("Military_Deployed"))//Military_Deployed_Date") = date()
//Write the updated recordset to the database




//Reset server objects


$rsGuestbook=null;

$objConn->Close();
$objConn=null;


//Return to the update select page in case another record needs deleting

header("Location: "."nation_drill_display.asp?Nation_ID=".$lngRecordNo);
?>  

 
