<!--#include file="Connection.php" -->
<? 
$trimname=trim(str_replace("%20"," ",$_GET["U_ID"]));
$trimname=str_replace("'","''",$trimname);
// $rsCheckNation is of type "ADODB.Recordset"

$rsCheckNationSQL="SELECT * FROM Nation WHERE Nation_Name ='".$trimname."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsCheckNationSQL);
if (($rsCheckNation_BOF==1) && ($rsCheckNation==0))
{

?>
<p align="center"><font color="#008000">That nation name is available. You may proceed.</font>
</p>
<p align="center">
<IMG src="images/green_check.gif">
<? }
  else
{
?>
<p align="center">
<font color=red>That nation name is not available. Please try again.</font></p>
<p align="center">
<img border="0" src="images/warning2.gif" width="33" height="33"></p>
<? } ?>
<form>
<p align="center">
<input type=button value="Close Window" onClick="javascript:window.close();">
</p>
</form>
<? 

$rsCheckNation=null;

$objConn->Close();
$objConn=null;

?>
