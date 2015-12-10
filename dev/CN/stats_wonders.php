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

<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td valign="top" width="50%" bgcolor="#000080">
		<font color="#FFFFFF"><b>:.
		National Wonder Statistics</b></font></td>
	</tr>
	<tr>
		<td valign="top" width="50%">
		<table border="0" width="100%" id="table6" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="top" align="left">
				<p align="left">
<u><b>National Wonders Around the World:</b></u><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Internet) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Internet Systems<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Space_Program) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Space Programs <br> 
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Great_Monument) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Great Monuments <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Movie_Industry) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Movie Industries<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Great_University) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Great Universities<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Research_Lab) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Research Labs <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Social_Security) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Social Security Systems<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Disaster_Relief) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Disaster Relief Agencies<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Interstate_System) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Interstate Systems<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Great_Temple) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Great Temples<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(War_Memorial) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> National War Memorials<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Stock_Market) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Stock Markets<br>
---------------------<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Internet+Space_Program+Great_Monument+Movie_Industry+Great_University+Research_Lab+Social_Security+Disaster_Relief+Interstate_System+Great_Temple+War_Memorial+Stock_Market) AS Building FROM National_Wonders";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Total<br>

				</td>
				
			</tr>

			</table>
</td>
	</tr>
	</table>

</p>



<p>


<p></p>

<p></p>



<p></p>
<p align="center">
<b><a href="stats.php">Main World Statistics Screen</a></b></p>
<!--#include file="inc_footer.php" -->


<? 
$rsGuestbook->Close();
$rsGuestbook=null;


$rsGuestbook2->Close();
$rsGuestbook2=null;


$rsSent2->Close();
$rsSent2=null;


$objConn->Close();
$objConn=null;

?>
