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
$lngRecordNo=intval($rsGuestbookHead["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);

if (time()()-$rsGuestbook["Last_Bills_Paid"]>=3)
{

  $denyreason_session="You must pay your bills before making this purchase.";
  header("Location: "."activity_denied.asp");
} 


if ($_POST["Nation_ID"]-$rsGuestbook["Nation_ID"]!=0)
{

  $denyreason_session="Nation ID does not match in the database. Please login and try again.";
  header("Location: "."activity_denied.asp");
} 


if ($rsGuestbook["Technology_Purchased"]<75 || $rsGuestbook["Infrastructure_Purchased"]<1000)
{

  $denyreason_session="Either you do not have enough technology or infrastructure to purchase nuclear missiles at this time.";
  header("Location: "."activity_denied.asp");
} 

?>
<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->
<!--#include file="calculations_costs.php" -->

<? 
if ($uranium==0)
{

  $denyreason_session="You are not connected to a source of uranium to purchase nuclear weapons at this time.";
  header("Location: "."activity_denied.asp");
} 


if ($rsGuestbook["Nuclear_Purchased"]>=20)
{

  $denyreason_session="You have 20 or more nuclear missiles and cannot purchase any more at this time.";
  header("Location: "."activity_denied.asp");
} 


if ($rsGuestbook["Nuclear_Purchased_Date"]=time()()$then;
$denyreason_session=="You have already purchased nuclear weapons today. Your scientists are exhausted and demand a day of rest. Come back tomorrow.")
{
  header("Location: "."activity_denied.asp");} 


if rsGuestbook("Nuclear") <> 3 then
Session ("denyreason") = "Your government position on nuclear weapons does not allow you to develop them at this time."
Response.Redirect "activity_denied.asp"
end if

if totalmoneyavailable - nuclearcost <= 0 then
Session ("denyreason") = "You do not have enough money to purchase nuclear weapons."
Response.Redirect "activity_denied.asp"
end if


' Calculate the maximum they can buy
dim maximumbuy
maximumbuy = 0
if totalmoneyavailable > 0 AND (totalmoneyavailable - nuclearcost) >= 0 then
maximumbuy = (totalmoneyavailable / nuclearcost) - 1
end if
' Now calculate 4 numbers to go with this for the option box
dim buy1
buy1 = 1


	dim formsubmit,newpurchase
	formsubmit = Request.form("newpurchase")
	Select Case formsubmit
		Case 1
		newpurchase = buy1
		Case 2
		newpurchase = buy2
		Case 3
		newpurchase = buy3
		Case 4
		newpurchase = buy4
		Case 5
		newpurchase = buy5
		Case 6
		newpurchase = buy6
		Case 7
		newpurchase = buy7
		Case 8
		newpurchase = buy8
	End Select



'Update the record in the recordset
rsGuestbook.Fields("Nuclear_Purchased") = newpurchase + rsGuestbook("Nuclear_Purchased")
rsGuestbook.Fields("Nuclear_Purchased_Date") = date()
rsGuestbook.Fields("Money_Spent") = (newpurchase * nuclearcost) + rsGuestbook("Money_Spent")
rsGuestbook.Fields("Number_Of_Purchases") = (rsGuestbook("Number_Of_Purchases") +1)



'Write the updated recordset to the database
rsGuestbook.Update
%>
<!--#include file="database_nationstrength.php" -->
<? if ()
{

//Reset server objects


  
  $rsGuestbook=null;

$objConn->Close();
  $objConn=null;


//Return to the update select page in case another record needs deleting

  header("Location: "."nation_drill_display.asp?Nation_ID=".$lngRecordNo);
?>  } 

