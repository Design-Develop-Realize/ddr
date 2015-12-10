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
<? 
// $rsNuked is of type "ADODB.Recordset"

$rsNukedSQL="SELECT Top 50 Poster,Nuclear_Attacked,Nation_Name,Nation_ID,Nation_Team FROM Nation Where (Nuclear_Attacked > getdate() - 7) Order By Nuclear_Attacked Desc";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsNukedSQL);
$rsNuked_numRows=0;
?>


<? 
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Top 50 Poster,Nuclear_Purchased_Date,Nation_Name,Nation_ID,Nation_Team FROM Nation Where (Nuclear_Purchased_Date > getdate() - 5)  Order By Nuclear_Purchased_Date Desc";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;
?>

<!--#include file="inc_header.php" -->

<table border="1" width="100%" id="table3" cellspacing="0" cellpadding="5" bordercolor="#000080">
<tr>
<td valign="top" width="61%" bgcolor="#000080">







<font color="#FFFFFF"><b>:.
Recent World News Reports</b></font></td>
</tr>
<tr>
<td valign="top" width="61%">
<p align="center"><a href="#Nuclear_Attacks">Nuclear Attacks</a> | 
<a href="#Nuclear_Purchases">Nuclear Purchases</a></td>
</tr>
<tr>
<td valign="top" width="61%" bgcolor="#C0C0C0">
<p align="left"><b><a name="Nuclear_Attacks">Nuclear Attacks</a></b></td>
</tr>
<tr>
<td valign="top" width="61%">








<table border="0" width="100%" id="table4" cellpadding="3">
<? while(!($rsNuked==0))
{
?>
<tr>
<td width="20">
<img border="0" src="assets/nuke_attacked.gif" width="20" height="19"></td>
<td>
<a href="nation_drill_display.asp?Nation_ID=<?   echo $rsNuked["Nation_ID"]; ?>">
<?   echo $rsNuked["Nation_Name"]; ?>
</a> (<?   echo $rsNuked["Poster"]; ?>) of 
<?   if ($rsNuked["Nation_Team"]="None"$then; )
  {
    $no;
  } 
  $the<$%=$rsNuked["Nation_Team"]; ?> <? } if ()
{
  $team} 
$was$attacked$with$a$nuclear$weapon$on<$%=$rsNuked["Nuclear_Attacked"]; ?>.</li></font><br> 
</td>
</tr>
<? $rsNuked=mysql_fetch_array($rsNuked_query);
$rsNuked_BOF=0;

>
<? $%$If($rsNuked_BOF==1)&($rsNuked_BOF==1)$Then; ?>
No additional nuclear attack news reports at this time.
<? >
</table>






</td>
</tr>
<tr>
<td valign="top" width="61%" bgcolor="#C0C0C0">
<p align="left"><b><a name="Nuclear_Purchases">Nuclear 
Purchases</a></b></td>
</tr>
<tr>
<td>






<table border="0" width="100%" id="table4" cellpadding="3">
<? if ($%)
{
  } 

while(!($rsGuestbook==0))
{
?>
<tr>
<td width="19">
<img src="assets/nuke.gif"></td>
<td>

<a href="nation_drill_display.asp?Nation_ID=<?   echo $rsGuestbook["Nation_ID"]; ?>">
<?   echo $rsGuestbook["Nation_Name"]; ?></a>&nbsp;(<?   echo $rsGuestbook["Poster"]; ?>) of 
<?   if ($rsGuestbook["Nation_Team"]="None"$then; )
  {

    $no;
    $the<$%=$rsGuestbook["Nation_Team"]; ?> <?   } ?> team,
purchased a nuclear weapon on <?   echo $rsGuestbook["Nuclear_Purchased_Date"]; ?>.</font>
<br>
</td>
</tr>
<?   $rsGuestbook=mysql_fetch_array($rsGuestbook_query);
  $rsGuestbook_BOF=0;

} ?>
<? if (($rsGuestbook_BOF==1))
{
?>
No additional nuclear purchase news reports at this time.
<? } ?>
</table>






</td>
</tr>
</table>

</p>



<p>


<p></p>

<p></p>

<p align="center">
<b><a href="stats.php">Main World Statistics Screen</a></b></p>
<p align="center">
&nbsp;</p>
<p align="center">
<!--#include file="search_include.php" --></p>

<p></p>
<!--#include file="inc_footer.php" -->


<? 

$rsGuestbook=null;


$rsGuestbook2->Close();
$rsGuestbook2=null;


$objConn->Close();
$objConn=null;

?>
