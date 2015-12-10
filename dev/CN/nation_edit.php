<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
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



<? 
$rsSent__MMColParam="0";
if (($MM_Username_session!=""))
{
  $rsSent__MMColParam=$MM_Username_session;
} 

// $rsSent is of type "ADODB.Recordset"

$rsSentSQL="SELECT *  FROM WAR  WHERE (War_Declared_By_User = '"+str_replace("'","''",$rsSent__MMColParam)+"' AND WAR.Nation_Deleted = 0) OR (War_Declared_ON_User = '"+str_replace("'","''",$rsSent__MMColParam)+"' AND WAR.Nation_Deleted = 0)";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSentSQL);
$rsSent_numRows=0;
?>



<script type="text/javascript">
function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>

<script type="text/javascript">
function chkStat(obj,str) {
  if(str=="other") {
    document.getElementById("selbox").style.display="none";
    document.getElementById("txtbox").style.display="block";
   obj.selectedIndex=0;
   document.forms[0].input1.focus();
  }
}

function chkVal(cont) {
  if(cont=="") {
    document.getElementById("selbox").style.display="block";
    document.getElementById("txtbox").style.display="none";
  }
}
</script>



<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID = ".$rsGuestbookHead["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
?>
<!--#include file="calculations.php" -->
<? if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
{
?>
	<font color="#FF0000">Please do not attempt to cheat.</font>
<? }
  else
{
?>

<body bgcolor="white" text="black">
   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Capital_City.value == "")
  {
    alert("Please enter a value for the \"Capital_City\" field.");
    theForm.Capital_City.focus();
    return (false);
  }

  if (theForm.Capital_City.value.length > 20)
  {
    alert("Please enter at most 20 characters in the \"Capital_City\" field.");
    theForm.Capital_City.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789- \t\r\n\f";
  var checkStr = theForm.Capital_City.value;
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
    alert("Please enter only letter, digit and whitespace characters in the \"Capital_City\" field.");
    theForm.Capital_City.focus();
    return (false);
  }

  if (theForm.Nation_Bio.value == "")
  {
    alert("Please enter a value for the \"Nation BIO\" field.");
    theForm.Nation_Bio.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789-'.\",:;*-+!()=_-@? \t\r\n\f";
  var checkStr = theForm.Nation_Bio.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()=_-@?\" characters in the \"Nation BIO\" field.");
    theForm.Nation_Bio.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" id="mygallery" method="post" action="nation_editcode.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
	<tr>
		<td align="right" colspan="2" bgcolor="#000080">
		<p align="left"><b><font color="#FFFFFF">
		Edit </font> <a href="nation_drill_display.asp?Nation_ID=<?   echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><?   echo $rsGuestbook["Nation_Name"]; ?></font></a><font color="#FFFFFF">
		</font></b>
		</font> </td>
	</tr>
	<tr>
		<td align="left" width="35%">Nation Name: </td>
		<td> 
		<b><?   echo $rsGuestbook["Nation_Name"]; ?></b></td>
	</tr>
	<tr>
		<td align="left" width="35%">
Capital City:</td>
		<td> 
	<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" b-value-required="TRUE" i-maximum-length="20" --><input type="text" name="Capital_City" maxlength="20" value="<?   echo $rsGuestbook["Capital_City"]; ?>" size="20"></td>
	</tr>
	<tr>
		<td align="left" width="35%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=26">
Nation Team</a>:<br>
		<span style="font-size: 8pt; font-style: italic">(Team changes set all 
		your senate election votes to zero and removes all team trading bonuses)</span></td>
		<td>
		

<? 
  $last_date=time()()-$rsGuestbook["Last_Vote"];
?>
	<?   if ($last_date<=4)
  {
?>
	<b><font color="<?     echo $rsGuestbook["Nation_Team"]; ?>"><?     echo $rsGuestbook["Nation_Team"]; ?> Team</font></b> - You recently cast a vote for the <?     echo $rsGuestbook["Nation_Team"]; ?> Team on <?     echo $rsGuestbook["Last_Vote"]; ?>. You may not change teams until <?     echo $rsGuestbook["Last_Vote"]+5; ?>.
	</font>
	<?   }
    else
  {
?> 
		<select size="1" name="Nation_Team">
<option value="None" <?     if ($rsGuestbook["Nation_Team"]="None"$then; )
    {
      $selected<$%end$if;     } ?>>No Team</option>
<option value="Aqua" <?     if ($rsGuestbook["Nation_Team"]="Aqua"$then; )
    {
      $selected<$%end$if;     } ?>>Aqua Team</option>
<option value="Black" <?     if ($rsGuestbook["Nation_Team"]="Black"$then; )
    {
      $selected<$%end$if;     } ?>>Black Team</option>
<option value="Blue" <?     if ($rsGuestbook["Nation_Team"]="Blue"$then; )
    {
      $selected<$%end$if;     } ?>>Blue Team</option>
<option value="Brown" <?     if ($rsGuestbook["Nation_Team"]="Brown"$then; )
    {
      $selected<$%end$if;     } ?>>Brown Team</option>
<option value="Green" <?     if ($rsGuestbook["Nation_Team"]="Green"$then; )
    {
      $selected<$%end$if;     } ?>>Green Team</option>
<option value="Maroon" <?     if ($rsGuestbook["Nation_Team"]="Maroon"$then; )
    {
      $selected<$%end$if;     } ?>>Maroon Team</option>
<option value="Orange" <?     if ($rsGuestbook["Nation_Team"]="Orange"$then; )
    {
      $selected<$%end$if;     } ?>>Orange Team</option>
<option value="Pink" <?     if ($rsGuestbook["Nation_Team"]="Pink"$then; )
    {
      $selected<$%end$if;     } ?>>Pink Team</option>
<option value="Purple" <?     if ($rsGuestbook["Nation_Team"]="Purple"$then; )
    {
      $selected<$%end$if;     } ?>>Purple Team</option>
<option value="Red" <?     if ($rsGuestbook["Nation_Team"]="Red"$then; )
    {
      $selected<$%end$if;     } ?>>Red Team</option>
<option value="Yellow" <?     if ($rsGuestbook["Nation_Team"]="Yellow"$then; )
    {
      $selected<$%end$if;     } ?>>Yellow Team</option>
<option value="White" <?     if ($rsGuestbook["Nation_Team"]="White"$then; )
    {
      $selected<$%end$if;     } ?>>White Team</option>
</select>
<?   } ?>
</td>
	</tr>
	<tr>
		<td align="left" width="35%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=26">Alliance Affiliation</a>:<br>
<img border="0" src="http://cybernations.net/images/warning.gif" width="17" height="16">
Select 'None' if you do not officially belong to a player created alliance. </td>
		<td> 
<span id="selbox">
	
<select name="Alliance" onChange="chkStat(this,this.value);">
<?   if (!isset($rsGuestbook["Alliance"]))
  {
?>
<option value="None">None</option>
<?   }
    else
  {
?>
<option value="<?     echo $rsGuestbook["Alliance"]; ?>"><?     echo $rsGuestbook["Alliance"]; ?></option>
<?   } ?>
<?   if (!isset($rsGuestbook["Alliance"]))
  {
?>
<?   }
    else
  {
?>
<option value="None">None</option>
<?   } ?>
<option value="Federation of Armed Nations">Federation of Armed Nations</option>
<option value="Global Alliance and Treaty Organization">Global Alliance and Treaty Organization</option>
<option value="Goon Order Of Neutral Shoving">Goon Order Of Neutral Shoving</option>
<option value="Grand Global Alliance">Grand Global Alliance</option>
<option value="Green Protection Agency">Green Protection Agency</option>
<option value="Independent Republic of Orange Nations">Independent Republic of Orange Nations</option>
<option value="National Alliance of Arctic Countries">National Alliance of Arctic Countries</option>
<option value="New Pacific Order">New Pacific Order</option>
<option value="New Polar Order">New Polar Order</option>
<option value="Orange Defense Network">Orange Defense Network</option>
<option value="The Legion">The Legion</option>
<option value="Viridian Entente">Viridian Entente</option>
<option value="other">Specify Other</option>
</select>
</span>
<span id="txtbox" style="display: none;">
<input type="text" name="input1" onBlur="chkVal(this.value);" />
<br>
&nbsp;</span></td>
	</tr>
<tr>
<td width="35%" valign="top" align="left">







<p>







National Flag:<br>
<br>
<script language="javascript">
function showimage()
{
if (!document.images)
return
document.getElementById("NATIONAL_FLAG_PICTURE").src=
document.getElementById("NATIONAL_FLAG_SELECTION").options[document.getElementById("NATIONAL_FLAG_SELECTION").selectedIndex].value
}
</script>

<select name="picture" id="NATIONAL_FLAG_SELECTION" size="1" onchange="showimage()">
<option <?   if ($rsGuestbook["Flag"]="images/flags/albania.png"|!isset($rsGuestbook["Flag"])$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/albania.png">Albania</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/andorra.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/andorra.png">Andorra</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Angola.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Angola.png">Angola</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Antigua.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Antigua.png">Antigua</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Argentina.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Argentina.png">Argentina</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Armenia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Armenia.png">Armenia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Australia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Australia.png">Australia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Austria.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Austria.png">Austria</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Azerbaijan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Azerbaijan.png">Azerbaijan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Bahamas.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Bahamas.png">Bahamas</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Bahrain.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Bahrain.png">Bahrain</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Bangladesh.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Bangladesh.png">Bangladesh</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Barbados.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Barbados.png">Barbados</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Belarus.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Belarus.png">Belarus</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/belgium.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/belgium.png">Belgium</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Belize.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Belize.png">Belize</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Benin.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Benin.png">Benin</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Bhutan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Bhutan.png">Bhutan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Bolivia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Bolivia.png">Bolivia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Bosnia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Bosnia.png">Bosnia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Botswana.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Botswana.png">Botswana</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/brazil.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/brazil.png">Brazil</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Brunei.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Brunei.png">Brunei</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Bulgaria.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Bulgaria.png">Bulgaria</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Burkina_Faso.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Burkina_Faso.png">Burkina_Faso</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Burundi.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Burundi.png">Burundi</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Cambodia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Cambodia.png">Cambodia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Cameroon.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Cameroon.png">Cameroon</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Canada.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Canada.png">Canada</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Cape_Verde.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Cape_Verde.png">Cape Verde</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Central_African_Republic.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Central_African_Republic.png">Central African Republic</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Chad.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Chad.png">Chad</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Chile.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Chile.png">Chile</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Colombia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Colombia.png">Colombia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Comoros.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Comoros.png">Comoros</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Congo.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Congo.png">Congo</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Costa_Rica.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Costa_Rica.png">Costa Rica</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Croatia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Croatia.png">Croatia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Cuba.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Cuba.png">Cuba</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Cyprus.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Cyprus.png">Cyprus</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Czech_Republic.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Czech_Republic.png">Czech Republic</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Denmark.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Denmark.png">Denmark</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Djibouti.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Djibouti.png">Djibouti</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Dominica.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Dominica.png">Dominica</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Dominican_Republic.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Dominican_Republic.png">Dominican Republic</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/East_Timor.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/East_Timor.png">East Timor</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Ecuador.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Ecuador.png">Ecuador</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Egypt.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Egypt.png">Egypt</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/El_Salvador.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/El_Salvador.png">El Salvador</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Equatorial_Guinea.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Equatorial_Guinea.png">Equatorial Guinea</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Eritrea.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Eritrea.png">Eritrea</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Estonia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Estonia.png">Estonia.</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Ethiopia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Ethiopia.png">Ethiopia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Fiji.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Fiji.png">Fiji</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Finland.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Finland.png">Finland</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/France.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/France.png">France</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Gabon.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Gabon.png">Gabon</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Gambia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Gambia.png">Gambia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Georgia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Georgia.png">Georgia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Germany.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Germany.png">Germany</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Ghana.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Ghana.png">Ghana</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Greece.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Greece.png">Greece</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Grenada.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Grenada.png">Grenada</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Guatemala.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Guatemala.png">Guatemala</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Guinea.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Guinea.png">Guinea</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Guinea-Bissau.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Guinea-Bissau.png">Guinea-Bissau</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Guyana.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Guyana.png">Guyana</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Haiti.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Haiti.png">Haiti</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Honduras.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Honduras.png">Honduras</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Hungary.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Hungary.png">Hungary</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Iceland.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Iceland.png">Iceland</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/India.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/India.png">India</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Indonesia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Indonesia.png">Indonesia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Iran.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Iran.png">Iran</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Iraq.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Iraq.png">Iraq</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Ireland.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Ireland.png">Ireland</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Israel.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Israel.png">Israel</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Italy.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Italy.png">Italy</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Ivoire.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Ivoire.png">Ivoire</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Jamaica.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Jamaica.png">Jamaica</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Japan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Japan.png">Japan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Jordan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Jordan.png">Jordan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Kazakhstan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Kazakhstan.png">Kazakhstan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Kenya.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Kenya.png">Kenya</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Kiribati.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Kiribati.png">Kiribati</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Kuwait.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Kuwait.png">Kuwait</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Kyrgyzstan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Kyrgyzstan.png">Kyrgyzstan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Laos.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Laos.png">Laos</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Latvia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Latvia.png">Latvia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Lebanon.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Lebanon.png">Lebanon</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Lesotho.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Lesotho.png">Lesotho</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Liberia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Liberia.png">Liberia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Libya.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Libya.png">Libya</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Liechtenstein.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Liechtenstein.png">Liechtenstein</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Lithuania.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Lithuania.png">Lithuania</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Luxembourg.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Luxembourg.png">Luxembourg</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Macedonia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Macedonia.png">Macedonia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Madagascar.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Madagascar.png">Madagascar</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Malawi.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Malawi.png">Malawi</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Malaysia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Malaysia.png">Malaysia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Maldives.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Maldives.png">Maldives</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Mali.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Mali.png">Mali</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Malta.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Malta.png">Malta</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Marshall_Islands.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Marshall_Islands.png">Marshall Islands</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Mauritania.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Mauritania.png">Mauritania</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Mauritius.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Mauritius.png">Mauritius</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Mexico.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Mexico.png">Mexico</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Micronesia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Micronesia.png">Micronesia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Moldova.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Moldova.png">Moldova</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Monaco.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Monaco.png">Monaco</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Mongolia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Mongolia.png">Mongolia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Montenegro.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Montenegro.png">Montenegro</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Morocco.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Morocco.png">Morocco</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Mozambique.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Mozambique.png">Mozambique</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Myanmar.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Myanmar.png">Myanmar</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Nagorno-Karabakh.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Nagorno-Karabakh.png">Nagorno Karabakh</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Namibia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Namibia.png">Namibia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Nauru.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Nauru.png">Nauru</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Nepal.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Nepal.png">Nepal</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Netherlands.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Netherlands.png">Netherlands</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/New_Zealand.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/New_Zealand.png">New Zealand</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Nicaragua.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Nicaragua.png">Nicaragua</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Niger.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Niger.png">Niger</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Nigeria.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Nigeria.png">Nigeria</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/North_Korea.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/North_Korea.png">North Korea</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Norway.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Norway.png">Norway</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Oman.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Oman.png">Oman</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Pakistan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Pakistan.png">Pakistan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Palau.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Palau.png">Palau</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Palestine.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Palestine.png">Palestine</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Panama.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Panama.png">Panama</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Papua_New_Guinea.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Papua_New_Guinea.png">Papua New Guinea</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Paraguay.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Paraguay.png">Paraguay</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Peoples_Republic_of_China.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Peoples_Republic_of_China.png">Peoples Republic of China</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Peru.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Peru.png">Peru</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Philippines.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Philippines.png">Philippines</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Poland.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Poland.png">Poland</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Portugal.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Portugal.png">Portugal</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Qatar.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Qatar.png">Qatar</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Republic_of_China.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Republic_of_China.png">Republic of China</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Republic_of_the_Congo.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Republic_of_the_Congo.png">Republic of the Congo</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Romania.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Romania.png">Romania</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Russia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Russia.png">Russia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Rwanda.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Rwanda.png">Rwanda</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Saint_Kitts.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Saint_Kitts.png">Saint Kitts</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Saint_Lucia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Saint_Lucia.png">Saint Lucia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Saint_Vincent.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Saint_Vincent.png">Saint Vincent</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Samoa.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Samoa.png">Samoa</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/San_Marino.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/San_Marino.png">San Marino</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Sao_Tome.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Sao_Tome.png">Sao Tome</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Saudi_Arabia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Saudi_Arabia.png">Saudi Arabia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Senegal.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Senegal.png">Senegalg</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Serbia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Serbia.png">Serbia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Seychelles.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Seychelles.png">Seychelles</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Sierra_Leone.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Sierra_Leone.png">Sierra Leone</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Singapore.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Singapore.png">Singapore</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Slovakia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Slovakia.png">Slovakia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Slovenia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Slovenia.png">Slovenia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Solomon_Islands.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Solomon_Islands.png">Solomon Islands</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Somalia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Somalia.png">Somalia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Somalilana.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Somalilana.png">Somalilana</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/South_Africa.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/South_Africa.png">South Africa</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/South_Korea.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/South_Korea.png">South Korea</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Soviet_Union.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Soviet_Union.png">Soviet Union</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Spain.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Spain.png">Spain</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Sri_Lanka.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Sri_Lanka.png">Sri Lanka</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Sudan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Sudan.png">Sudan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Suriname.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Suriname.png">Suriname</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Swaziland.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Swaziland.png">Swaziland</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Sweden.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Sweden.png">Sweden</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Switzerland.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Switzerland.png">Switzerland</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Syria.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Syria.png">Syria</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Tajikistan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Tajikistan.png">Tajikistan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Tanzania.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Tanzania.png">Tanzania</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Thailand.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Thailand.png">Thailand</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Togo.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Togo.png">Togo</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Tonga.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Tonga.png">Tonga</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Transnistria.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Transnistria.png">Transnistria</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Trinidad_and_Tobago.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Trinidad_and_Tobago.png">Trinidad and Tobago</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Tunisia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Tunisia.png">Tunisia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Turkey.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Turkey.png">Turkey</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Turkmenistan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Turkmenistan.png">Turkmenistan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Tuvalu.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Tuvalu.png">Tuvalu</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Uganda.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Uganda.png">Uganda</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Ukraine.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Ukraine.png">Ukraine</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/United_Arab_Emirates.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/United_Arab_Emirates.png">United Arab Emirates</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/United_Kingdom.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/United_Kingdom.png">United Kingdom</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/United_States.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/United_States.png">United States</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Uruguay.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Uruguay.png">Uruguay</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Uzbekistan.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Uzbekistan.png">Uzbekistan</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Vanuatu.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Vanuatu.png">Vanuatu</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Vatican_City.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Vatican_City.png">Vatican City</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Venezuela.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Venezuela.png">Venezuela</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Vietnam.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Vietnam.png">Vietnam</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Western_Sahara.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Western_Sahara.png">Western Sahara</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Yemen.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Yemen.png">Yemen</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Yugoslavia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Yugoslavia.png">Yugoslavia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Zambia.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Zambia.png">Zambia</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Zimbabwe.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Zimbabwe.png">Zimbabwe</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom1.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom1.jpg">Custom 1</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom2.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom2.jpg">Custom 2</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom3.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom3.jpg">Custom 3</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom4.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom4.jpg">Custom 4</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom5.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom5.jpg">Custom 5</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom6.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom6.png">Custom 6</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom7.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom7.png">Custom 7</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom8.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom8.png">Custom 8</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom9.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom9.png">Custom 9</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom10.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom10.png">Custom 10</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom11.gif"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom11.gif">Custom 11</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom12.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom12.png">Custom 12</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom13.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom13.png">Custom 13</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom14.jpeg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom14.jpeg">Custom 14</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom15.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom15.png">Custom 15</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom16.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom16.jpg">Custom 16</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom17.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom17.jpg">Custom 17</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom18.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom18.jpg">Custom 18</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom19.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom19.jpg">Custom 19</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom20.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom20.png">Custom 20</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom21.jpeg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom21.jpeg">Custom 21</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom22.gif"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom22.gif">Custom 22</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom23.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom23.jpg">Custom 23</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom24.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom24.jpg">Custom 24</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom25.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom25.jpg">Custom 25</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom26.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom26.jpg">Custom 26</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom27.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom27.jpg">Custom 27</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom28.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom28.jpg">Custom 28</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom29.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom29.jpg">Custom 29</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom30.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom30.jpg">Custom 30</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom31.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom31.png">Custom 31</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom32.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom32.png">Custom 32</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom33.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom33.png">Custom 33</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom34.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom34.jpg">Custom 34</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom35.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom35.jpg">Custom 35</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom36.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom36.jpg">Custom 36</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom37.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom37.jpg">Custom 37</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom38.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom38.png">Custom 38</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom39.gif"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom39.gif">Custom 39</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom40.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom40.jpg">Custom 40</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom41.gif"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom41.gif">Custom 41</option>
<option <?   if ($rsGuestbook["Flag"]="images/flags/Custom42.png"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/Custom42.png">Custom 42</option>



<option <?   if ($rsGuestbook["Flag"]="images/flags/None.jpg"$then; )
  {
    $selected<$%end$if;   } ?> value="images/flags/None.jpg">None</option>


</select></p>
</p></td>
<td width="62%" bordercolor="#C0C0C0" bgcolor="#E1E1E1"><p align="center">
<img src="<?   if (!isset($rsGuestbook["Flag"]))
  {
?>images/flags/albania.png<?   }
    else
  {
?><?     echo $rsGuestbook["Flag"]; ?><?   } ?>" name="pictures" id="NATIONAL_FLAG_PICTURE" border=0 align="left">

	<tr>
		<td align="left" width="35%">
		<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=19">Government Type</a>:<br>
		<i>You may change your Government Type once every 3 days.</i>
 </td>
		<td> 
		
		
<?   if ($rsGuestbook["Government_Changed"]<time()()-2)
  {
?>
<select size="1" name="Government_Type">
<?     if ($rsGuestbook["Government_Type"]="Anarchy"$then; )
    {

//Anarchy" <%if rsGuestbook("Government_Type") = "Anarchy" then?>    } 
    $selected<$%end$if; ?>>Anarchy</option>
<?   } ?>
<option value="Capitalist" <?   if ($rsGuestbook["Government_Type"]="Capitalist"$then; )
  {
    $selected<$%end$if;   } ?>>Capitalist</option>
<option value="Communist" <?   if ($rsGuestbook["Government_Type"]="Communist"$then; )
  {
    $selected<$%end$if;   } ?>>Communist</option>
<option value="Democracy" <?   if ($rsGuestbook["Government_Type"]="Democracy"$then; )
  {
    $selected<$%end$if;   } ?>>Democracy</option>
<option value="Dictatorship" <?   if ($rsGuestbook["Government_Type"]="Dictatorship"$then; )
  {
    $selected<$%end$if;   } ?>>Dictatorship</option>
<option value="Federal Government" <?   if ($rsGuestbook["Government_Type"]="Federal Government"$then; )
  {
    $selected<$%end$if;   } ?>>Federal Government</option>
<option value="Monarchy" <?   if ($rsGuestbook["Government_Type"]="Monarchy"$then; )
  {
    $selected<$%end$if;   } ?>>Monarchy</option>
<option value="Republic" <?   if ($rsGuestbook["Government_Type"]="Republic"$then; )
  {
    $selected<$%end$if;   } ?>>Republic</option>
<option value="Revolutionary Government" <?   if ($rsGuestbook["Government_Type"]="Revolutionary Government"$then; )
  {
    $selected<$%end$if;   } ?>>Revolutionary Government</option>
<option value="Totalitarian State" <?   if ($rsGuestbook["Government_Type"]="Totalitarian State"$then; )
  {
    $selected<$%end$if;   } ?>>Totalitarian State</option>
<option value="Transitional" <?   if ($rsGuestbook["Government_Type"]="Transitional"$then; )
  {
    $selected<$%end$if;   } ?>>Transitional</option>
</select></td>

<input type=hidden name="Government_Changed" value="<?   echo time()(); ?>">


<? }
  else
{
?>
<?   echo $rsGuestbook["Government_Type"]; ?> - Your government was recently changed and you must wait until <?   echo $rsGuestbook["Government_Changed"]+3; ?>
before changing your government again.
<input type=hidden name="Government_Type" value="<?   echo $rsGuestbook["Government_Type"]; ?>">
<input type=hidden name="Government_Changed" value="<?   echo $rsGuestbook["Government_Changed"]; ?>">
<? } ?>

	</tr>
	<tr>
<td align="left" width="35%">Currency Type:</td>
<td> 

<select size="1" name="Currency_Type">
<option value="Afghani" <? if ($rsGuestbook["Currency_Type"]="Afghani"$then; )
{
  $selected<$%end$if; } ?>>Afghani</option>
<option value="Austral" <? if ($rsGuestbook["Currency_Type"]="Austral"$then; )
{
  $selected<$%end$if; } ?>>Austral</option>
<option value="Baht" <? if ($rsGuestbook["Currency_Type"]="Baht"$then; )
{
  $selected<$%end$if; } ?>>Baht</option>
<option value="Canadian" <? if ($rsGuestbook["Currency_Type"]="Canadian"$then; )
{
  $selected<$%end$if; } ?>>Canadian</option>
<option value="Dinar" <? if ($rsGuestbook["Currency_Type"]="Dinar"$then; )
{
  $selected<$%end$if; } ?>>Dinar</option>
<option value="Dollar" <? if ($rsGuestbook["Currency_Type"]="Dollar"$then; )
{
  $selected<$%end$if; } ?>>Dollar</option>
<option value="Dong" <? if ($rsGuestbook["Currency_Type"]="Dong"$then; )
{
  $selected<$%end$if; } ?>>Dong</option>
<option value="Euro" <? if ($rsGuestbook["Currency_Type"]="Euro"$then; )
{
  $selected<$%end$if; } ?>>Euro</option>
<option value="Florin" <? if ($rsGuestbook["Currency_Type"]="Florin"$then; )
{
  $selected<$%end$if; } ?>>Florin</option>
<option value="Franc" <? if ($rsGuestbook["Currency_Type"]="Franc"$then; )
{
  $selected<$%end$if; } ?>>Franc</option>
<option value="Kwacha" <? if ($rsGuestbook["Currency_Type"]="Kwacha"$then; )
{
  $selected<$%end$if; } ?>>Kwacha</option>
<option value="Kwanza" <? if ($rsGuestbook["Currency_Type"]="Kwanza"$then; )
{
  $selected<$%end$if; } ?>>Kwanza</option>
<option value="Kyat" <? if ($rsGuestbook["Currency_Type"]="Kyat"$then; )
{
  $selected<$%end$if; } ?>>Kyat</option>
<option value="Lari" <? if ($rsGuestbook["Currency_Type"]="Lari"$then; )
{
  $selected<$%end$if; } ?>>Lari</option>
<option value="Mark" <? if ($rsGuestbook["Currency_Type"]="Mark"$then; )
{
  $selected<$%end$if; } ?>>Mark</option>
<option value="Peso" <? if ($rsGuestbook["Currency_Type"]="Peso"$then; )
{
  $selected<$%end$if; } ?>>Peso</option>
<option value="Pound" <? if ($rsGuestbook["Currency_Type"]="Pound"$then; )
{
  $selected<$%end$if; } ?>>Pound</option>
<option value="Riyal" <? if ($rsGuestbook["Currency_Type"]="Riyal"$then; )
{
  $selected<$%end$if; } ?>>Riyal</option>
<option value="Rouble" <? if ($rsGuestbook["Currency_Type"]="Rouble"$then; )
{
  $selected<$%end$if; } ?>>Rouble</option>
<option value="Rupee" <? if ($rsGuestbook["Currency_Type"]="Rupee"$then; )
{
  $selected<$%end$if; } ?>>Rupee</option>
<option value="Shilling" <? if ($rsGuestbook["Currency_Type"]="Shilling"$then; )
{
  $selected<$%end$if; } ?>>Shilling</option>
<option value="Won" <? if ($rsGuestbook["Currency_Type"]="Won"$then; )
{
  $selected<$%end$if; } ?>>Won</option>
<option value="Yen" <? if ($rsGuestbook["Currency_Type"]="Yen"$then; )
{
  $selected<$%end$if; } ?>>Yen</option>
</select>
</td>
	</tr>
	<tr>
<td align="left" width="35%">

<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=375">DEFCON Level</a>:<br>
<i>You may change your DEFCON level once per day.</i></td>
<td> 


<? if (!isset($rsGuestbook["DEFCON_DATE"]) || $rsGuestbook["DEFCON_DATE"]<time()())
{
?>
<select size="1" name="DEFCON">
<option value="5" <?   if ($rsGuestbook["DEFCON"]="5"$then; )
  {
    $selected<$%end$if;   } ?>>5 - Peacetime Readiness</option>
<option value="4" <?   if ($rsGuestbook["DEFCON"]="4"$then; )
  {
    $selected<$%end$if;   } ?>>4 - Normal Readiness</option>
<option value="3" <?   if ($rsGuestbook["DEFCON"]="3"$then; )
  {
    $selected<$%end$if;   } ?>>3 - Increased Readiness</option>
<option value="2" <?   if ($rsGuestbook["DEFCON"]="2"$then; )
  {
    $selected<$%end$if;   } ?>>2 - Hightened Readiness</option>
<option value="1" <?   if ($rsGuestbook["DEFCON"]="1"$then; )
  {
    $selected<$%end$if;   } ?>>1 - Maximum Readiness</option>
</select>
<input type=hidden name="DEFCON_DATE" value="<?   echo time()(); ?>">
<? }
  else
{
?>
<?   echo $rsGuestbook["DEFCON"]; ?> - You recently changed your DEFCON level on <?   echo $rsGuestbook["DEFCON_DATE"]; ?> and must wait until <?   echo time()()+1; ?>
before changing your DEFCON level again.
<input type=hidden name="DEFCON" value="<?   echo $rsGuestbook["DEFCON"]; ?>">
<input type=hidden name="DEFCON_DATE" value="<?   echo $rsGuestbook["DEFCON_DATE"]; ?>">
<? } ?>
</td>
	</tr>
	<tr>
		<td align="left" width="35%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=23">Tax Rate</a>:</td>
		<td> 
<select size="1" name="Tax_Rate">
<option value="10" <? if ($rsGuestbook["Tax_Rate"]="10"$then; )
{
  $selected<$%end$if; } ?>>10%</option>
<option value="11" <? if ($rsGuestbook["Tax_Rate"]="11"$then; )
{
  $selected<$%end$if; } ?>>11%</option>
<option value="12" <? if ($rsGuestbook["Tax_Rate"]="12"$then; )
{
  $selected<$%end$if; } ?>>12%</option>
<option value="13" <? if ($rsGuestbook["Tax_Rate"]="13"$then; )
{
  $selected<$%end$if; } ?>>13%</option>
<option value="14" <? if ($rsGuestbook["Tax_Rate"]="14"$then; )
{
  $selected<$%end$if; } ?>>14%</option>
<option value="15" <? if ($rsGuestbook["Tax_Rate"]="15"$then; )
{
  $selected<$%end$if; } ?>>15%</option>
<option value="16" <? if ($rsGuestbook["Tax_Rate"]="16"$then; )
{
  $selected<$%end$if; } ?>>16%</option>
<option value="17" <? if ($rsGuestbook["Tax_Rate"]="17"$then; )
{
  $selected<$%end$if; } ?>>17%</option>
<option value="18" <? if ($rsGuestbook["Tax_Rate"]="18"$then; )
{
  $selected<$%end$if; } ?>>18%</option>
<option value="19" <? if ($rsGuestbook["Tax_Rate"]="19"$then; )
{
  $selected<$%end$if; } ?>>19%</option>
<option value="20" <? if ($rsGuestbook["Tax_Rate"]="20"$then; )
{
  $selected<$%end$if; } ?>>20%</option>
<option value="21" <? if ($rsGuestbook["Tax_Rate"]="21"$then; )
{
  $selected<$%end$if; } ?>>21%</option>
<option value="22" <? if ($rsGuestbook["Tax_Rate"]="22"$then; )
{
  $selected<$%end$if; } ?>>22%</option>
<option value="23" <? if ($rsGuestbook["Tax_Rate"]="23"$then; )
{
  $selected<$%end$if; } ?>>23%</option>
<option value="24" <? if ($rsGuestbook["Tax_Rate"]="24"$then; )
{
  $selected<$%end$if; } ?>>24%</option>
<option value="25" <? if ($rsGuestbook["Tax_Rate"]="25"$then; )
{
  $selected<$%end$if; } ?>>25%</option>
<option value="26" <? if ($rsGuestbook["Tax_Rate"]="26"$then; )
{
  $selected<$%end$if; } ?>>26%</option>
<option value="27" <? if ($rsGuestbook["Tax_Rate"]="27"$then; )
{
  $selected<$%end$if; } ?>>27%</option>
<option value="28" <? if ($rsGuestbook["Tax_Rate"]="28"$then; )
{
  $selected<$%end$if; } ?>>28%</option>
<? if ($SocialWonder==1)
{
?>
<option value="29" <?   if ($rsGuestbook["Tax_Rate"]="29"$then; )
  {
    $selected<$%end$if;   } ?>>29%</option>
<option value="30" <?   if ($rsGuestbook["Tax_Rate"]="30"$then; )
  {
    $selected<$%end$if;   } ?>>30%</option>
<? } ?>
</select></td>
	</tr>
	<tr>
<td align="left" width="35%">Primary Ethnic Group:</td>
<td align="left" width="62%"> 



<select size="1" name="Ethnic_Group">
<option value="<? echo $rsGuestbook["Ethnic_Group"]; ?>"><? echo $rsGuestbook["Ethnic_Group"]; ?></option>
<option value="African" <? if ($rsGuestbook["Ethnic_Group"]="African"$then; )
{
  $selected<$%end$if; } ?>>African</option>
<option value="Albanian" <? if ($rsGuestbook["Ethnic_Group"]="Albanian"$then; )
{
  $selected<$%end$if; } ?>>Albanian</option>
<option value="Amerindian" <? if ($rsGuestbook["Ethnic_Group"]="Amerindian"$then; )
{
  $selected<$%end$if; } ?>>Amerindian</option>
<option value="Arab" <? if ($rsGuestbook["Ethnic_Group"]="Arab"$then; )
{
  $selected<$%end$if; } ?>>Arab</option>
<option value="Arab-Berber" <? if ($rsGuestbook["Ethnic_Group"]="Arab-Berber"$then; )
{
  $selected<$%end$if; } ?>>Arab-Berber</option>
<option value="Armenian" <? if ($rsGuestbook["Ethnic_Group"]="Armenian"$then; )
{
  $selected<$%end$if; } ?>>Armenian</option>
<option value="Black" <? if ($rsGuestbook["Ethnic_Group"]="Black"$then; )
{
  $selected<$%end$if; } ?>>Black</option>
<option value="British" <? if ($rsGuestbook["Ethnic_Group"]="British"$then; )
{
  $selected<$%end$if; } ?>>British</option>
<option value="Bulgarian" <? if ($rsGuestbook["Ethnic_Group"]="Bulgarian"$then; )
{
  $selected<$%end$if; } ?>>Bulgarian</option>
<option value="Burman" <? if ($rsGuestbook["Ethnic_Group"]="Burman"$then; )
{
  $selected<$%end$if; } ?>>Burman</option>
<option value="Caucasian" <? if ($rsGuestbook["Ethnic_Group"]="Caucasian"$then; )
{
  $selected<$%end$if; } ?>>Caucasian</option>
<option value="Celtic" <? if ($rsGuestbook["Ethnic_Group"]="Celtic"$then; )
{
  $selected<$%end$if; } ?>>Celtic</option>
<option value="Chinese" <? if ($rsGuestbook["Ethnic_Group"]="Chinese"$then; )
{
  $selected<$%end$if; } ?>>Chinese</option>
<option value="Creole" <? if ($rsGuestbook["Ethnic_Group"]="Creole"$then; )
{
  $selected<$%end$if; } ?>>Creole</option>
<option value="Croat" <? if ($rsGuestbook["Ethnic_Group"]="Croat"$then; )
{
  $selected<$%end$if; } ?>>Croat</option>
<option value="Czech" <? if ($rsGuestbook["Ethnic_Group"]="Czech"$then; )
{
  $selected<$%end$if; } ?>>Czech</option>
<option value="Dutch" <? if ($rsGuestbook["Ethnic_Group"]="Dutch"$then; )
{
  $selected<$%end$if; } ?>>Dutch</option>
<option value="Estonian" <? if ($rsGuestbook["Ethnic_Group"]="Estonian"$then; )
{
  $selected<$%end$if; } ?>>Estonian</option>
<option value="French" <? if ($rsGuestbook["Ethnic_Group"]="French"$then; )
{
  $selected<$%end$if; } ?>>French</option>
<option value="German" <? if ($rsGuestbook["Ethnic_Group"]="German"$then; )
{
  $selected<$%end$if; } ?>>German</option>
<option value="Greek" <? if ($rsGuestbook["Ethnic_Group"]="Greek"$then; )
{
  $selected<$%end$if; } ?>>Greek</option>
<option value="Han Chinese" <? if ($rsGuestbook["Ethnic_Group"]="Han Chinese"$then; )
{
  $selected<$%end$if; } ?>>Han Chinese</option>
<option value="Italian" <? if ($rsGuestbook["Ethnic_Group"]="Italian"$then; )
{
  $selected<$%end$if; } ?>>Italian</option>
<option value="Indian" <? if ($rsGuestbook["Ethnic_Group"]="Indian"$then; )
{
  $selected<$%end$if; } ?>>Indian</option>
<option value="Japanese" <? if ($rsGuestbook["Ethnic_Group"]="Japanese"$then; )
{
  $selected<$%end$if; } ?>>Japanese</option>
<option value="Jewish" <? if ($rsGuestbook["Ethnic_Group"]="Jewish"$then; )
{
  $selected<$%end$if; } ?>>Jewish</option>
<option value="Korean" <? if ($rsGuestbook["Ethnic_Group"]="Korean"$then; )
{
  $selected<$%end$if; } ?>>Korean</option>
<option value="Mestizo" <? if ($rsGuestbook["Ethnic_Group"]="Mestizo"$then; )
{
  $selected<$%end$if; } ?>>Mestizo</option>
<option value="Mexican" <? if ($rsGuestbook["Ethnic_Group"]="Mexican"$then; )
{
  $selected<$%end$if; } ?>>Mexican</option>
<option value="Mixed" <? if ($rsGuestbook["Ethnic_Group"]="Mixed"$then; )
{
  $selected<$%end$if; } ?>>Mixed</option>
<option value="Norwegian" <? if ($rsGuestbook["Ethnic_Group"]="Norwegian"$then; )
{
  $selected<$%end$if; } ?>>Norwegian</option>
<option value="Pacific Islander" <? if ($rsGuestbook["Ethnic_Group"]="Pacific Islander"$then; )
{
  $selected<$%end$if; } ?>>Pacific Islander</option>
<option value="Pashtun" <? if ($rsGuestbook["Ethnic_Group"]="Pashtun"$then; )
{
  $selected<$%end$if; } ?>>Pashtun</option>
<option value="Persian" <? if ($rsGuestbook["Ethnic_Group"]="Persian"$then; )
{
  $selected<$%end$if; } ?>>Persian</option>
<option value="Russian" <? if ($rsGuestbook["Ethnic_Group"]="Russian"$then; )
{
  $selected<$%end$if; } ?>>Russian</option>
<option value="Scandinavian" <? if ($rsGuestbook["Ethnic_Group"]="Scandinavian"$then; )
{
  $selected<$%end$if; } ?>>Scandinavian</option>
<option value="Serb" <? if ($rsGuestbook["Ethnic_Group"]="Serb"$then; )
{
  $selected<$%end$if; } ?>>Serb</option>
<option value="Somali" <? if ($rsGuestbook["Ethnic_Group"]="Somali"$then; )
{
  $selected<$%end$if; } ?>>Somali</option>
<option value="Spanish" <? if ($rsGuestbook["Ethnic_Group"]="Spanish"$then; )
{
  $selected<$%end$if; } ?>>Spanish</option>
<option value="Thai" <? if ($rsGuestbook["Ethnic_Group"]="Thai"$then; )
{
  $selected<$%end$if; } ?>>Thai</option>
<option value="Turk" <? if ($rsGuestbook["Ethnic_Group"]="Turk"$then; )
{
  $selected<$%end$if; } ?>>Turk</option>
</select>

</td>
	</tr>
	<tr>
<td align="left" width="35%">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=18">National Religion</a>:<br>
<i>You may change your National Religion once every 3 days.</i></td>
<td align="left" width="62%"> 


<? if ($rsGuestbook["Religion_Changed"]<time()()-2)
{
?>
<select size="1" name="Religion">
<option value="None" <?   if ($rsGuestbook["Religion"]="None"$then; )
  {
    $selected<$%end$if;   } ?>>None</option>
<option value="Mixed" <?   if ($rsGuestbook["Religion"]="Mixed"$then; )
  {
    $selected<$%end$if;   } ?>>Mixed</option>
<option value="Baha'i Faith" <?   if ($rsGuestbook["Religion"]="Baha'i Faith"$then; )
  {
    $selected<$%end$if;   } ?>>Baha'i Faith</option>
<option value="Buddhism" <?   if ($rsGuestbook["Religion"]="Buddhism"$then; )
  {
    $selected<$%end$if;   } ?>>Buddhism </option>
<option value="Christianity" <?   if ($rsGuestbook["Religion"]="Christianity"$then; )
  {
    $selected<$%end$if;   } ?>>Christianity</option>
<option value="Confucianism" <?   if ($rsGuestbook["Religion"]="Confucianism"$then; )
  {
    $selected<$%end$if;   } ?>>Confucianism</option>
<option value="Hinduism" <?   if ($rsGuestbook["Religion"]="Hinduism"$then; )
  {
    $selected<$%end$if;   } ?>>Hinduism</option>
<option value="Islam" <?   if ($rsGuestbook["Religion"]="Islam"$then; )
  {
    $selected<$%end$if;   } ?>>Islam</option>
<option value="Jainism" <?   if ($rsGuestbook["Religion"]="Jainism"$then; )
  {
    $selected<$%end$if;   } ?>>Jainism</option>
<option value="Judaism" <?   if ($rsGuestbook["Religion"]="Judaism"$then; )
  {
    $selected<$%end$if;   } ?>>Judaism</option>
<option value="Norse" <?   if ($rsGuestbook["Religion"]="Norse"$then; )
  {
    $selected<$%end$if;   } ?>>Norse</option>
<option value="Shinto" <?   if ($rsGuestbook["Religion"]="Shinto"$then; )
  {
    $selected<$%end$if;   } ?>>Shinto</option>
<option value="Sikhism" <?   if ($rsGuestbook["Religion"]="Sikhism"$then; )
  {
    $selected<$%end$if;   } ?>>Sikhism</option>
<option value="Taoism" <?   if ($rsGuestbook["Religion"]="Taoism"$then; )
  {
    $selected<$%end$if;   } ?>>Taoism</option>
<option value="Voodoo" <?   if ($rsGuestbook["Religion"]="Voodoo"$then; )
  {
    $selected<$%end$if;   } ?>>Voodoo</option>
</select>
<input type=hidden name="Religion_Changed" value="<?   echo time()(); ?>">


<? }
  else
{
?>
<?   echo $rsGuestbook["Religion"]; ?> - You recently changed your national religion and must wait until <?   echo $rsGuestbook["Religion_Changed"]+3; ?>
before changing your religion again.
<input type=hidden name="Religion" value="<?   echo $rsGuestbook["Religion"]; ?>">
<input type=hidden name="Religion_Changed" value="<?   echo $rsGuestbook["Religion_Changed"]; ?>">
<? } ?>




	
	

	
	
</td>
	</tr>
	<tr>
		<td align="left" width="35%" valign="top">
		<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=9">War/Peace Preference</a>:<br>
		<i>You may change your War/Peace Preference once every 5 days.</i></td>
		<td> 

<? 
$activewars=0;
?>
<? 
while(!($rsSent==0))
{
?>


<? 
  if ($rsSent["Receiving_Nation_Peace"]+$rsSent["Declaring_Nation_Peace"]!=2)
  {

    if ((strtoupper($rsSent["War_Declared_By_User"])==strtoupper($rsUser["U_ID"]) && $rsSent["Nation_Deleted"]=0)|(strtoupper($rsSent["War_Declared_On_User"])=strtoupper($rsUser["U_ID"])&$rsSent["Nation_Deleted"]=0)$then;
$if$rsSent["War_Declaration_Date"]>=(time()()-7)$then;
) // The nation is at war
    {

      $activewars=$activewars+1;
    } 

  } 

} if ()
{

  $rsSent=mysql_fetch_array($rsSent_query);
  $rsSent_BOF=0;

} 

?>

<? 
$last_date=$DateDiff["d"][$rsGuestbook["Last_Tax_Collection"]][time()()];
if ($rsGuestbook["Nation_Peace"]=1&$last_date>=1$then;
)
{

  $Your$nation$is$in$peace$mode&$you$must$collect$taxes$before$changing$your$war/$peace$preference->
<$%else; ?>
	<?   if (time()()-$rsGuestbook["Nation_Peace_Date"]>=5)
  {
?>
		<?     if ($activewars==0)
    {
?>			
		<select size="1" name="Nation_Peace">
		
			<?       if ($rsGuestbook["Nation_Peace"]=0|!isset($rsGuestbook["Nation_Peace"])$then; )
      {

//0">War is an option.</option>//1">I do not want to be attacked.</option>//Nation_Peace") = 1 then?>      } 

//1">I do not want to be attacked.</option>//0">War is an option.</option>


      $hidden$value="<%=date()%>"$name="Nation_Peace_Date">;
      $Your$nation$is$currently$at$war->You$cannot$change$this->at$this->.;
      $hidden$value="<%=rsGuestbook("$Nation_Peace"); ?>" name="Nation_Peace">
		<input type=hidden value="<?       echo $rsGuestbook["Nation_Peace_Date"]; ?>" name="Nation_Peace_Date">
		<?     } ?>
	<?   }
    else
  {
?>
	You recently changed your war/peace preference on <?     echo $rsGuestbook["Nation_Peace_Date"]; ?> and must wait
	until <?     echo $rsGuestbook["Nation_Peace_Date"]+5; ?> before you can change it again.
	<input type=hidden value="<?     echo $rsGuestbook["Nation_Peace"]; ?>" name="Nation_Peace">
	<input type=hidden value="<?     echo $rsGuestbook["Nation_Peace_Date"]; ?>" name="Nation_Peace_Date">
	<?   } ?>
<? } ?>
</td>
	</tr>
		
	<tr>
		<td align="left" width="35%" valign="top">Nation Bio:<br>
		<i>(Do not use profanity or offensive language in your BIO! Your nation 
		will be deleted if profanity or offensive language is discovered.)</i></td>
		<td> 
 <!--webbot bot="Validation" s-display-name="Nation BIO" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()=_-@?" b-value-required="TRUE" --><textarea maxlength="250" onkeyup="return ismaxlength(this)" rows="6" name="Nation_Bio" cols="27"><? echo $rsGuestbook["Nation_BIO"]; ?></textarea>
</td>
	</tr>
		
	</table>
	<p align="center">   
   
<!--#include file="activitycheck.php" -->


	<input type="hidden" name="Nation_ID" value="<? echo $rsGuestbook["Nation_ID"]; ?>">
	<input type="submit" class="Buttons" name="Submit" value="Edit My Nation"> </p>
</form>
<!-- End form code -->








</body>
<? ></html><!--#include file="inc_footer.php" --><? 
