<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<!--#include file="connection.php" -->
<? //end if

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
<!--#include file="election_code.php" -->
<? 
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Poster='".$rsUser["U_ID"]."'  ";
echo 3;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);

$access=0;
while(!$rsSent10->BOF && !$rsSent10->EOF)
{

  if ($rsGuestbookHead["Nation_ID"]==$rsSent10["Nation_ID"])
  {
    $access=1;
  }
;
  } 
$rsSent10->MoveNext;
} 
if ($access==0)
{

  $denyreason_session="You do not have access to view this page.";
  header("Location: "."activity_denied.asp");
} 


// $rsSanctions is of type "ADODB.Recordset"

$rsSanctionsSQL="SELECT * FROM Sanctions WHERE Sanction_Team = '".$rsGuestbook["Nation_Team"]."' AND Nation_ID=".intval($_GET["Nation_ID"]);
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSanctionsSQL);
if (($rsSanctions_BOF==1) && ($rsSanctions==0))
{

  $sanction_record=0;
// $rsSanctions is of type "ADODB.Recordset"

  $rsSanctionsSQL="SELECT * FROM Nation WHERE Nation_ID=".intval($_GET["Nation_ID"]);
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSanctionsSQL);
}
  else
{

  $sanction_record=1;
} 



// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(*) AS CADS FROM Sanctions Where Sanction_Team = '".$rsGuestbookHead["Nation_Team"]."'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();


// Count the number of sanctions by this user

// $rsSanctionCount is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(*) AS USANCTIONS FROM Sanctions Where Upper(Sanction_Poster) = '".strtoupper($rsGuestbookHead["Poster"])."'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

?>


<? 
//======================================================================================================================

if ($_POST["Nation_ID"]!="")
{


  if ($rsSanctionCount["USANCTIONS"]>=5)
  {

    $denyreason_session="You have already placed 5 or more active sanctions and cannot place any more.";
    header("Location: "."activity_denied.asp");
  } 


  if ($rsGuestbook["Votes"]<30)
  {

    $denyreason_session="You do not have enough votes from your team to place sanctions at this time. You need at least 20 votes.";
    header("Location: "."activity_denied.asp");
  } 


  if ($rsAllUsers["CADS"]>15)
  {

    $denyreason_session="Your team already has too many active sanctions. You may not place any more without lifting existing sanctions to reduce this count.";
    header("Location: "."activity_denied.asp");
  } 


  if ($_POST["Sanction_Trade"]!=1 && $_POST["Sanction_Aid"]!=1)
  {

    $denyreason_session="You must select trade or aid sanctions or both.";
    header("Location: "."activity_denied.asp");
  } 


  
  $rsSanctions=null;


// $rsSanction_Nation is of type "ADODB.Recordset"

  $rsSanction_NationSQL="SELECT Poster,Nation_Team,Nation_ID,Nation_Name FROM Nation WHERE Nation_ID='".intval($_POST["Nation_ID"])."'  ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSanction_NationSQL);

  if (($rsSanction_Nation_BOF==1) && ($rsSanction_Nation==0))
  {

    header("Location: "."failed_noexist.asp");
  } 


// $rsSanctions is of type "ADODB.Recordset"

  $rsSanctionsSQL="SELECT * FROM Sanctions";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSanctionsSQL);
  

$rsSanctions["Poster"]=$rsSanction_Nation["Poster"];
  $rsSanctions["Nation_Name"]=$rsSanction_Nation["Nation_Name"];
  $rsSanctions["Nation_ID"]=$rsSanction_Nation["Nation_ID"];
  $rsSanctions["Sanction_Team"]=$rsGuestbook["Nation_Team"];
    if ($_POST["Sanction_Trade"]==1)
  {

$rsSanctions["Sanction_Trade"]=1;
      } 

  if ($_POST["Sanction_Aid"]==1)
  {

$rsSanctions["Sanction_Aid"]=1;
      } 

$rsSanctions["Sanction_Poster"]=$rsGuestbook["Poster"];
  $rsSanctions["Sanction_Nation_Name"]=$rsGuestbook["Nation_Name"];
  $rsSanctions["Sanction_Nation_ID"]=$rsGuestbook["Nation_ID"];
  $rsSanctions["Sanction_Date"]=time()();
  $rsSanctions["Sanction_Reason"]=$_POST["Sanction_Reason"];
  
  

  if (($_POST["Sanction_Trade"]==1) && ($rsSanction_Nation["Nation_Team"]=$rsGuestbook["Nation_Team"])$then;
) // Stop the nations trade within team agreements
  {

// $rsTrade is of type "ADODB.Recordset"

        echo $MM_conn_STRING_Trade;
        echo "Update Trade Set Trade_Cancled = 2 Where  Trade_Within_Team = 1 AND (Trade.Receiving_Nation_ID = ".$rsSanction_Nation["Nation_ID"]."  OR Trade.Declaring_Nation_ID = ".$rsSanction_Nation["Nation_ID"].")";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
    
    $rsTrade=null;

  } 


//Send a message to the receiver of the sanctions

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
  //U_ID") = rsSanction_Nation("Poster")  //MESS_FROM") =  rsGuestbook("Poster")  if ($_POST["Sanction_Trade"]==1 && $_POST["Sanction_Aid"]!=1)
  {

    //MESSAGE") = "Trade sanctions have been setup against your nation by "& rsGuestbook("Poster") &" of the "& rsGuestbook("Nation_Team") &" team. You will no longer be allowed to trade with other member of the "& rsGuestbook("Nation_Team") &" team while these sanctions are active and all existing trades with the "& rsGuestbook("Nation_Team") &" team have been canceled."  } 

  if ($_POST["Sanction_Trade"]!=1 && $_POST["Sanction_Aid"]==1)
  {

    //MESSAGE") = "Foreign Aid sanctions have been setup against your nation by "& rsGuestbook("Poster") &" of the "& rsGuestbook("Nation_Team") &" team. You will no longer be allowed to send or receive foreign aid between members of the "& rsGuestbook("Nation_Team") &" team while these sanctions are active."  } 

  if ($_POST["Sanction_Trade"]==1 && $_POST["Sanction_Aid"]==1)
  {

    //MESSAGE") = "Trade and Foreign Aid sanctions have been setup against your nation by "& rsGuestbook("Poster") &" of the "& rsGuestbook("Nation_Team") &" team. You will no longer be allowed to trade or send/receive foreign aid with other member of the "& rsGuestbook("Nation_Team") &" team while these sanctions are active and all existing trades with the "& rsGuestbook("Nation_Team") &" team have been canceled."  } 

  //SUBJECT") = "Sanctions!"  //MESS_READ") = "False"  
//Reset server objects

  
  $rsAddComments=null;

  $adoCon=null;


  
  $rsGuestbook=null;

  
  $rsSanctions=null;

  
  $rsSanction_Nation=null;



  header("Location: "."sanctions_view.asp");

} 

//======================================================================================================================

?>


<table width="100%" border="0" cellspacing="0">
<tr> 
<td valign="top" width="100%"> <div align="center"> 
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Sanction_Reason.value == "")
  {
    alert("Please enter a value for the \"Aid Reason\" field.");
    theForm.Sanction_Reason.focus();
    return (false);
  }

  if (theForm.Sanction_Reason.value.length > 30)
  {
    alert("Please enter at most 30 characters in the \"Aid Reason\" field.");
    theForm.Sanction_Reason.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_=’`$&@ \t\r\n\f";
  var checkStr = theForm.Sanction_Reason.value;
  var allValid = true;
  var validGroups = true;
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
  }
  if (!allValid)
  {
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$&@\" characters in the \"Aid Reason\" field.");
    theForm.Sanction_Reason.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="sanctions.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">      






<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=2 bgcolor="#000080">
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. Order Sanctions Against <? echo $rsSanctions["Nation_Name"]; ?> (<? echo $rsSanctions["Poster"]; ?>) </b></font></td>
</tr>



<tr>
<td align=right width="50%">
Sanctions Ordered Against <font 
class=textsize9>:</font></td>
<td width="50%"><font class=textsize9> 
<a href="nation_drill_display.asp?Nation_ID=<? echo $rsSanctions["Nation_ID"]; ?>"><? echo $rsSanctions["Nation_Name"]; ?></a> (<? echo $rsSanctions["Poster"]; ?>) -
<? if ($rsSanctions["Nation_Team"]=="None")
{
?>
No Team
<? }
  else
{
?>
<font color="<?   echo $rsSanctions["Nation_Team"]; ?>"><?   echo $rsSanctions["Nation_Team"]; ?> Team
<? } ?>

</font></td>
</tr>


<tr>
<td align=right width="50%">
Sanctions Ordered<font 
class=textsize9> By:</font></td>
<td width="50%" height="37"><font class=textsize9> 

<a href="nation_drill_display.asp?Nation_ID=<? echo $rsGuestbook["Nation_ID"]; ?>"><? echo $rsGuestbook["Nation_Name"]; ?></a> (<? echo $rsGuestbook["Poster"]; ?>) -
<? if ($rsGuestbook["Nation_Team"]=="None")
{
?>
No Team
<? }
  else
{
?>
<font color="<?   echo $rsGuestbook["Nation_Team"]; ?>"><?   echo $rsGuestbook["Nation_Team"]; ?> Team
<? } ?>

</font></td>
</tr>

<tr>
<td align=right width="50%" valign="top">Reason For
<font 
class=textsize9> Sanction:</font></td>
<td width="50%" height="39">
<!--webbot bot="Validation" s-display-name="Aid Reason" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$&amp;@" b-value-required="TRUE" i-maximum-length="30" --><input type="text" name="Sanction_Reason" size="30" maxlength="30">

</td>
</tr>



<tr>
<td align=right width="50%" height="43" valign="top">Trade Sanctions</td>

<td width="50%" height="43">

<input type="checkbox" name="Sanction_Trade" value="1">

</td>
</tr>
<tr>
<td align=right width="50%" height="43" valign="top">Foreign Aid Sanctions</td>
<td width="50%" height="43">

<input type="checkbox" name="Sanction_Aid" value="1">

</td>
</tr>


<tr class=colorformfields> 
<td align=right colspan=2><div align="center"><font class=textsize9>







<? if ($sanction_record==1)
{
?>
<font color="red">Sanctions are already in place against this nation by your team.</font>
<? }
  else
{
?>
	<br>
	<? 
  if ($rsAllUsers["CADS"]>15)
  {

    print "Your team already has ".$rsAllUsers["CADS"]." active sanctions. You may not place any more without lifting existing sanctions to reduce this count.";
  }
    else
  {

?>
		<?     if ($rsGuestbook["Votes"]<30)
    {

      print "You do not have enough votes from your team to place sanctions at this time. You need at least 30 votes.";
    }
      else
    {

?>
			<?       if ($rsSanctionCount["USANCTIONS"]>=5)
      {

        print "You have already placed 5 or more active sanctions and cannot place any more.";
      }
        else
      {
?>
			<!--#include file="activitycheck.php" -->
			<input name="Nation_ID" type="hidden" value="<?         echo intval($_GET["Nation_ID"]); ?>">
			<input name=submit2 type=submit class="Buttons" id=submit2 value="Order Sanctions">
			<?       } ?>
		<?     } ?>
	<?   } ?>
<? } ?>
<br>

<br>
</font></div>



</td>
</tr>
</tbody>
</table>
<p align="left">




</font>

</div>
</form>

</div></td>
</tr>
</table>

<!--#include file="inc_footer.php" -->
<? 
$rsGuestbook->Close;
$rsGuestbook=null;

$rsSanctions->Close;
$rsSanctions=null;

$objConn->Close();
$objConn=null;

?>
