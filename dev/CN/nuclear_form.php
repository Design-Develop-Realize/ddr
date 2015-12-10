<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("U_ID_session");
  session_register("GoForLaunch_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<? if ($_POST["attackingnation"]=="")
{
?>
<!--#include file="connection.php" -->

<html>
<head>

</head>

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

<? 
  $rsUsers__MMColParam="1";
  if (($U_ID_session!=""))
  {

    $rsUsers__MMColParam=$U_ID_session;
  } 

?> 

<? 
//Dimension variables


//Read in the record number to be updated

  $lngRecordNo=intval($_GET["Nation_ID"]);

//Create an ADO connection object 

// $adoCon is of type "ADODB.Connection"


//Set an active connection to the Connection object using a DSN-less connection 

  $a2p_connstr==$MM_conn_STRING;
  $a2p_uid=strstr($a2p_connstr,'uid');
  $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_pwd=strstr($a2p_connstr,'pwd');
  $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_database=strstr($a2p_connstr,'dsn');
  $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
  mysql_select_db($a2p_database,$adoCon);

//Set an active connection to the Connection object using DSN connection 

//adoCon.Open "DSN=guestbook" 


//Create an ADO recordset object 

// $rsGuestbook is of type "ADODB.Recordset"


//Initialise the strSQL variable with an SQL statement to query the database 

  $strSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;

//Open the recordset with the SQL query 

  $rs=mysql_query($strSQL);?>  


<? 
  $lngRecordNo1=intval($_GET["Nation_ID"]);
// $rsUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo1;
    echo 0;
    echo 2;
    echo 1;
  $rs=mysql_query();



  $rsUsers_numRows=0;
?>

<? 

  $lngRecordNo2=intval($_GET["bynation"]);

// $rsDetail is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT *  FROM Nation, USERS WHERE Nation.POSTER = USERS.U_ID AND Nation_ID=".$lngRecordNo2;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsDetail_numRows=0;
?>

<? 
  $rsSent__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsSent__MMColParam=$MM_Username_session;
  } ?>
<? 
// $rsSent is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT *  FROM WAR  WHERE War_Declared_By_User = '"+str_replace("'","''",$rsSent__MMColParam)+"' OR War_Declared_ON_User = '"+str_replace("'","''",$rsSent__MMColParam)+"'  ORDER BY War_Declaration_Date DESC";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsSent_numRows=0;
?>

<?   $GoForLaunch_session=0;
?>

<!--#include file="inc_header.php" -->

<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
  {
?>
Please stop trying to cheat. 
<?   }
    else
  {
?>

<? 
    $theyareatwar=0;
    while((!($rsSent_BOF==1)) && (!($rsSent==0)))
    {

      if (strtoupper($rsSent["Declaring_Nation"])==strtoupper($rsUsers["Nation_Name"]) || strtoupper($rsSent["Receiving_Nation"])==strtoupper($rsUsers["Nation_Name"]))
      {

        $theyareatwar=1;
        $wartime=$DateDiff["h"][$rsSent["War_Declaration_Date"]][strftime("%m/%d/%Y %H:%M:%S %p")()];
      } 

      $rsSent=mysql_fetch_array($rsSent_query);
      $rsSent_BOF=0;

    } 
?>

<?     if ($theyareatwar==0)
    {
?>
Please stop trying to cheat. 
<?     }
      else
    {
?>
<p align="center">
<?       if (!isset($rsUsers["Flag"]) || $rsUsers["Flag"]="images/flags/None.jpg"|!isset($rsDetail["Flag"])|$rsDetail["Flag"]="images/flags/None.jpg"$then;
;
    }
      else
    {


<img src="<? )
    {
      echo $rsDetail["Flag"];     } ?>"> vs. <img src="<?     echo $rsUsers["Flag"]; ?>">
<?   } ?>
<?   $GoForLaunch_session=1;
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<div align="center">
<table width="100%" border="0" cellspacing="0">
<tr> 
<td height="278" valign="top"> <div align="center"> 
<p align="left"><br>
<b>Nuclear Weapons will be launched immediately after pressing 
the Launch Attack button below. </b> </p>

<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Password.value == "")
  {
    alert("Please enter a value for the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length < 7)
  {
    alert("Please enter at least 7 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length > 40)
  {
    alert("Please enter at most 40 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="nuclear_form_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">      

<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=2 bgcolor="#000080">
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. 
Launch Nuclear Attack On <?   echo (.$Item["Nation_Name"].$Value); ?></b></font></td>
</tr>

<tr>
<td align=right width="31%" bgcolor="#FFFF99">

Attacking Nation<font 
class=textsize9>:</font></td>
<td width="69%" bgcolor="#FFFF99"><font class=textsize9> 
<?   echo (.$Item["Nation_Name"].$Value); ?> (<?   echo (.$Item["Poster"].$Value); ?>)


&nbsp; 
</font></td>
</tr>
<tr>
<td align=right width="31%" bgcolor="#FFFF99">
Number of<font 
class=textsize9> Nuclear Weapons:</font></td>
<td width="69%" bgcolor="#FFFF99"><font class=textsize9> 
<?   echo (.$Item["Nuclear_Purchased"].$Value); ?>


</font></td>
</tr>
<tr>
<td align=right width="31%">
Defending Nation<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<?   echo (.$Item["Nation_Name"].$Value); ?> (<?   echo (.$Item["Poster"].$Value); ?>)
</font></td>
</tr>

<tr>
<td align=right width="31%">
Infrastructure<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<?   echo $FormatNumber[$rsUsers["Infrastructure_Purchased"]][2]; ?>
</font></td>
</tr>


<tr>
<td align=right width="31%">
Land Area<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<?   echo $FormatNumber[$rsUsers["Land_Purchased"]][3]; ?>
</font></td>
</tr>

<tr>
<td align=right width="31%">
Defending Soldiers<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9>
<?   $soldierkills=$rsUsers["Military_Purchased"]-$rsUsers["Military_Defending_Casualties"]-$rsUsers["Military_Attacking_Casualties"]-$rsUsers["Military_Deployed"];
  $soldierkills=$FormatNumber[$soldierkills][0];
?>
<?   echo $soldierkills; ?>
</font></td>
</tr>

<tr>
<td align=right width="31%">
Defending Tanks<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<?   echo (.$Item["Tanks_Defending"].$Value); ?>
</font></td>
</tr>
<tr>
<td align=right width="31%">
Cruise Missiles<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<?   echo (.$Item["Cruise_Purchased"].$Value); ?>
</font></td>
</tr>


<tr>
<td align=right width="29%" height="43" valign="top">My Password:<br>
<i>(For validation purposes)</i>
</td>
<td width="68%" height="43" valign="top">
<!--webbot bot="Validation" S-Display-Name="Password" B-Value-Required="TRUE" I-Minimum-Length="7" I-Maximum-Length="40" --><input type="password" name="Password" size="30" maxlength="40"></td>
</tr>


<tr class=colorformfields> 
<td colspan=2><div align="center"><font class=textsize9> 


<p align="left"> 








<input name="attackingnation" type="hidden" value="<?   echo (.$Item["Nation_Name"].$Value); ?>">
<input name="bynation" type="hidden" value="<?   echo (.$Item["Nation_ID"].$Value); ?>">

<input name="defendingnation" type="hidden" value="<?   echo (.$Item["Nation_Name"].$Value); ?>">
<input name="receivingnation" type="hidden" value="<?   echo (.$Item["Nation_ID"].$Value); ?>">


<input name="receivinguser" type="hidden" value="<?   echo (.$Item["Poster"].$Value); ?>">
<input name="attackinguser" type="hidden" value="<?   echo (.$Item["Poster"].$Value); ?>">



<p><br><br><b><font color="#FF0000">


<?   if (($Item["Nuclear_Purchased"]$Value)<1)
  {
?>
You have no nuclear weapons at this time.
<?   }
    else
  {
?>

</p>
<p></p>


	<?     if ($rsUsers["Nuclear_Attacked"]>=time()())
    {
?>
	The nation of <?       echo $rsUsers["Nation_Name"]; ?> was attacked with nuclear weapons on <?       echo $rsUsers["Nuclear_Attacked"]; ?>. You cannot launch your nuclear weapons against them again until <?       echo $rsUsers["Nuclear_Attacked"]+1; ?>.
	<?     }
      else
    {
?>
		<?       if ($wartime<=24)
      {
?>
		You must wait 24 hours after declaring war before launching nuclear weapons.
		<?       }
        else
      {
?>
		<!--#include file="activitycheck.php" -->
		<input name=submit2 class="LaunchButton" type=submit class=LaunchButton id=submit2 value="Launch Attack"><br>
		</font>
		<?       } ?>
	<?     } ?>

<?   } ?>

<br>
&nbsp;
</b><font color="#FF0000">


<b></div>



</td>
</tr>
</tbody>
</table>
<p align="left">



</font>

</div>
</form>
<p>











<font face="Arial" color="#0000a0">
<img height="222" alt="ICBM Launches - Minuteman III" src="http://cybernations.net/images/nukelaunch.JPG" width="276"></font></p>
<p>&nbsp;</p>
</div></td>
</tr>
</table>
</div>
<p>&nbsp; </p> <br>

</td>
</tr>
</table>
<? } ?><? } ?>
<!--#include file="inc_footer.php" -->


<? 

$rsUsers=null;


$rsSent=null;


$rsDetail=null;


$rsGuestbook=null;

$objConn->Close();
$objConn=null;

?><? >
