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
World
		Improvement Statistics</b></font></td>
	</tr>
	<tr>
		<td valign="top" width="50%">
		<table border="0" width="100%" id="table6" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="top" align="left">
				<p align="left">
<u><b>World Improvements:</b></u><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Banks) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Banks <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Barracks) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Barracks <br> 
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Border_Walls) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Border Walls <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Churches) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Churches<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Clinics) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Clinics<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Factories) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Factories <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Foreign_Ministries) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Foreign Ministries<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Guerilla_Camps) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Guerilla Camps<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Harbors) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Harbors<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Hospitals) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Hospitals<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Intelligence_Agencies) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Intelligence Agencies<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Labor_Camps) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Labor Camps<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Missile_Defenses) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Missile Defenses<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Police_Headquarters) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Police Headquarters<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Schools) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Schools<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Stadiums) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Stadiums<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Satellites) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Satellites<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Universities) AS Building FROM Improvements ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Building"]][0]; ?> Universities<br>
---------------------<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(banks+barracks+border_walls+churches+clinics+factories+foreign_ministries+guerilla_camps+harbors+hospitals+intelligence_agencies+labor_camps+missile_defenses+police_headquarters+satellites+schools+stadiums+universities) AS Building FROM Improvements ";
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
