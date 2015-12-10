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
// Count the number of nations in the system

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Nations FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$totalnations=$rsAllUsers["Nations"];

$rsAllUsers=null;

?>
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

<table border="1" width="100%" id="table6" cellspacing="0" cellpadding="5" bordercolor="#000080">
<form method="get">
	<tr>
		<td bgcolor="#000080" colspan="2"><font color="#FFFFFF"><b>:. 
Real Time Alliance Query</b></font></td>
	</tr>
	<tr>
		<td colspan="2">Use this tool to search for alliance statistics in real time. 
		Select an alliance from the drop down or type your own custom alliance 
		to pull statistics for.</td>
	</tr>
	<tr>
		<td align="left" width="24%">
<b>

<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=26">
Alliance Affiliation</a>:</td>
		<td width="73%"> 
<span id="selbox">
	
<select name="Alliance" onChange="chkStat(this,this.value);">
<? 
if ($_GET["Alliance"]!="" || $_GET["input1"]!="")
{

  if ($_GET["input1"]=="")
  {

    $customalliance=str_replace("'","''",$_GET["Alliance"]);
  }
    else
  {

    $customalliance=str_replace("'","''",$_GET["input1"]);
  } 

?>
<option value="<?   echo $customalliance; ?>" selected><?   echo $customalliance; ?></option>
<? } ?>
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
</table>
<p align="center">
<input type="submit" class="Buttons" value="Retrieve Statistics"> 
</p>
<p>&nbsp;</p>

</form>







<? 
if ($_GET["Alliance"]!="" || $_GET["input1"]!="")
{

  $customalliance="None";
  if ($_GET["input1"]=="")
  {

    $customalliance=str_replace("'","''",$_GET["Alliance"]);
  }
    else
  {

    $customalliance=str_replace("'","''",$_GET["input1"]);
  } 

  $customalliance=htmlspecialchars($customalliance);
  if (strtoupper($customalliance)=="NONE")
  {
    $customalliance="No Alliance";
  }
;
  } 

// $rsGuestbook is of type "ADODB.Recordset"

  $rsGuestbookSQL="SELECT Strength,Last_Tax_Collection,Nuclear_Purchased FROM Nation Where Alliance = '".$customalliance."' ";
    echo 3;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbookSQL);
  $rsGuestbook_numRows=0;


  while((!($rsGuestbook==0)))
  {


    $customcntr=$customcntr+1;
    $custompowermeter=$custompowermeter+$rsGuestbook["Strength"];
    $customcntrnuke=$customcntrnuke+$rsGuestbook["Nuclear_Purchased"];
    if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
    {

      $customactive=$customactive+1;
    } 


    $rsGuestbook=mysql_fetch_array($rsGuestbook_query);
    $rsGuestbook_BOF=0;

  } 

  $custompercentactive=$customactive/$customcntr*100;
  $custompaveragestrength=$custompowermeter/$customcntr;



  
  $rsGuestbook=null;

?>

<table border="0" width="100%" id="table4" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top" width="100%">
<table border="1" width="100%" id="table5" cellspacing="0" cellpadding="4" bordercolor="#000080" height="89">
<tr>
<td width="110%" bgcolor="#000080" colspan="8"><font color="#FFFFFF"><b>:. 
Alliance Query Results</b></font></td>
</tr>




<tr>
<td width="16%" bgcolor="#C0C0C0"><b>Alliance Name</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Total Nations</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Active Nations</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Percent Active</b></td>
<td width="14%" align="center" bgcolor="#C0C0C0"><b>Strength</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Avg. Strength</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Nukes</b></td>
<td width="16%" align="center" bgcolor="#C0C0C0"><b>Score</b></td>
</tr>





<tr>
<td width="16%" height="50">
<a href="stats_ranking_alliances.asp?Alliance=<?   echo $customalliance; ?>">
<?   echo $customalliance; ?></a>
</td>
<td width="16%" align="center" height="20">
<?   echo $FormatNumber[$customcntr][0]; ?>
</td>
<td width="16%" align="center" height="20">
<?   echo $FormatNumber[$customactive][0]; ?>
</td>
<td width="16%" align="center" height="20">
<?   echo $FormatNumber[$custompercentactive][0]; ?>%
</td>
<td width="16%" align="center" height="20">
<?   echo $FormatNumber[$custompowermeter][0]; ?>
</td>
<td width="14%" align="center" height="20">
<?   echo $FormatNumber[$custompaveragestrength][0]; ?>
</td>
<td width="16%" align="center" height="20">
<?   echo $FormatNumber[$customcntrnuke][0]; ?>
</td>
<td width="16%" align="center" height="20">
<? 
  $score1=$customcntr/$totalnations*1000;
  $score2=$custompowermeter/100000;
  $score3=$custompaveragestrength/100;
  $score=($score1+$score2+$score3)/3;
  print $FormatNumber[$score][2];
?>
</td>
</tr>

</table>
		</td>
	</tr>
	</table>

<? } ?>
<p align="center">
<b>
<img border="0" src="images/information.gif" width="17" height="16"> 
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=26">
Alliance Information</a> | <a href="stats.php">Main World Statistics Screen</a></b></p>
<!--#include file="inc_footer.php" -->
