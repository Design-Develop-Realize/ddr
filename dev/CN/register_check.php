<!--#include file="Connection.php" -->
<? 
$trimname=trim(str_replace("%20"," ",$_GET["U_ID"]));
$trimname=str_replace("'","''",$trimname);
// $rsCheckUser is of type "ADODB.Recordset"

$rsCheckUserSQL="SELECT * FROM Users WHERE U_ID = '".$trimname."' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsCheckUserSQL);
if (($rsCheckUser_BOF==1) && ($rsCheckUser==0))
{

?>
<p align="center"><font color="#008000">The user name <?   echo $trimname; ?> is available. You may proceed.</font>
</p>
<p align="center">
<IMG src="images/green_check.gif">
<? }
  else
{
?>
<p align="center">
<font color=red>The user name <?   echo $trimname; ?> is not available. Please try again.</font></p>
<p align="center">
<img border="0" src="images/warning2.gif" width="33" height="33"></p>
<? } ?>
<form>
<p align="center">
<input type=button value="Close Window" onClick="javascript:window.close();">
</p>
</form>
<? 

$rsCheckUser=null;

$objConn->Close();
$objConn=null;

?>
