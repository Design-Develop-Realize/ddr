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
		<font color="#FFFFFF">
		<b>:. World Demographics Provided In Real Time</b></font></td>
	</tr>
	<tr>
		<td valign="top" width="50%">
		<table border="0" width="100%" id="table6" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="top" align="left" rowspan="2"><b><u>World Information:</u> </b><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS CADS FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
$totalnations=$rsAllUsers["CADS"];
?>
<? echo $FormatNumber[$rsAllUsers["CADS"]][0]; ?> current active nations. <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Top 1 Nation_ID FROM Nation Order By Nation_ID DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
$totalalltime=$rsAllUsers["Nation_ID"];
?>
<? echo $FormatNumber[$totalalltime-$totalnations][0]; ?> nations couldn't take the heat. <br>
------<br>

<? echo $FormatNumber[$totalalltime][0]; ?> total nations created all time. <br>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING_Messages;
echo "SELECT Top 1 ID FROM EMessages Order By ID DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
$totalalltime=$rsAllUsers["ID"];
?>
<? echo $FormatNumber[$totalalltime][0]; ?> private messages sent all time. <p>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS CADS FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
$nukecapable=$rsAllUsers["CADS"]*.05;
$nukecapable=$FormatNumber[$nukecapable][0];
?>
<? echo $nukecapable; ?> Nuclear Capable Nations<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS CADS FROM Nation Where Nuclear_Purchased > 0";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $rsAllUsers["CADS"]; ?> Nuclear Armed Nations<br>

<? 
//Count the number of nukes this month and also test the connection to the database

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT GlobalRadiation FROM Month_Nukes Where ID = 1";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$globalradiation=$rsAllUsers["GlobalRadiation"];
if ($globalradiation>5)
{
  $globalradiation=5;
}
;
} ?>
<? echo $FormatNumber[$globalradiation][2]; ?> Global Radiation Level

<p>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Population FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
$worldpopulation=$rsAllUsers["Population"];
?>
<? echo $FormatNumber[$rsAllUsers["Population"]][0]; ?> Total Population<br>




<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum( (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Population FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Population"]][0]; ?> Total Citizens<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) AS Military FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Military"]][0]; ?> Active Military<br>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Military_Defending_Casualties+Military_Attacking_Casualties) AS Killed FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Killed"]][0]; ?> Total Military Killed<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum(Land_Purchased + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Land FROM Nation";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Land"]][0]; ?> Total Miles Of Land <br>


				<p>
<u><b><br>
Nation Religions:</b></u><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS None FROM Nation Where Religion = 'None' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["None"]][0]; ?> No Religion (<? echo ($FormatNumber[($rsAllUsers["None"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Mixed FROM Nation Where Religion = 'Mixed' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Mixed"]][0]; ?> Mixed Religions (<? echo ($FormatNumber[($rsAllUsers["Mixed"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
$faith="Baha'i Faith";
echo "SELECT COUNT(Nation_ID) AS Baha FROM Nation Where Religion = '"+str_replace("'","''",$faith)+"' ";

echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Baha"]][0]; ?> Baha'i Faith (<? echo ($FormatNumber[($rsAllUsers["Baha"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Buddhism FROM Nation Where Religion = 'Buddhism' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Buddhism"]][0]; ?> Buddhism (<? echo ($FormatNumber[($rsAllUsers["Buddhism"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Christianity FROM Nation Where Religion = 'Christianity' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Christianity"]][0]; ?> Christianity (<? echo ($FormatNumber[($rsAllUsers["Christianity"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Confucianism FROM Nation Where Religion = 'Confucianism' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Confucianism"]][0]; ?> Confucianism (<? echo ($FormatNumber[($rsAllUsers["Confucianism"]/$totalnations)*100][2]); ?>%)<br>



<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Hinduism FROM Nation Where Religion = 'Hinduism' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Hinduism"]][0]; ?> Hinduism (<? echo ($FormatNumber[($rsAllUsers["Hinduism"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Islam FROM Nation Where Religion = 'Islam' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Islam"]][0]; ?> Islam (<? echo ($FormatNumber[($rsAllUsers["Islam"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Jainism FROM Nation Where Religion = 'Jainism' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Jainism"]][0]; ?> Jainism (<? echo ($FormatNumber[($rsAllUsers["Jainism"]/$totalnations)*100][2]); ?>%)<br>



<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Judaism FROM Nation Where Religion = 'Judaism' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Judaism"]][0]; ?> Judaism (<? echo ($FormatNumber[($rsAllUsers["Judaism"]/$totalnations)*100][2]); ?>%)<br>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Norse FROM Nation Where Religion = 'Norse' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Norse"]][0]; ?> Norse (<? echo ($FormatNumber[($rsAllUsers["Norse"]/$totalnations)*100][2]); ?>%)<br>



<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Shinto FROM Nation Where Religion = 'Shinto' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Shinto"]][0]; ?> Shinto (<? echo ($FormatNumber[($rsAllUsers["Shinto"]/$totalnations)*100][2]); ?>%)<br>



<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Sikhism FROM Nation Where Religion = 'Sikhism' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Sikhism"]][0]; ?> Sikhism (<? echo ($FormatNumber[($rsAllUsers["Sikhism"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Taoism FROM Nation Where Religion = 'Taoism' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Taoism"]][0]; ?> Taoism (<? echo ($FormatNumber[($rsAllUsers["Taoism"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Voodoo FROM Nation Where Religion = 'Voodoo' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Voodoo"]][0]; ?> Voodoo (<? echo ($FormatNumber[($rsAllUsers["Voodoo"]/$totalnations)*100][2]); ?>%)</p>
				<p align="left">
<u><b>
<br>
Nation Governments:</b></u><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Anarchy FROM Nation Where Government_Type = 'Anarchy' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Anarchy"]][0]; ?> Anarchy Governments (<? echo ($FormatNumber[($rsAllUsers["Anarchy"]/$totalnations)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Capitalist FROM Nation Where Government_Type = 'Capitalist' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Capitalist"]][0]; ?> Capitalist Governments (<? echo ($FormatNumber[($rsAllUsers["Capitalist"]/$totalnations)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Communist FROM Nation Where Government_Type = 'Communist' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Communist"]][0]; ?> Communist Governments (<? echo ($FormatNumber[($rsAllUsers["Communist"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Democracy FROM Nation Where Government_Type = 'Democracy' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Democracy"]][0]; ?> Democracy Governments (<? echo ($FormatNumber[($rsAllUsers["Democracy"]/$totalnations)*100][2]); ?>%)<br>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Dictatorship FROM Nation Where Government_Type = 'Dictatorship' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Dictatorship"]][0]; ?> Dictatorship Governments (<? echo ($FormatNumber[($rsAllUsers["Dictatorship"]/$totalnations)*100][2]); ?>%)<br>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Federal FROM Nation Where Government_Type = 'Federal Government' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Federal"]][0]; ?> Federal Governments (<? echo ($FormatNumber[($rsAllUsers["Federal"]/$totalnations)*100][2]); ?>%)<br>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Monarchy FROM Nation Where Government_Type = 'Monarchy' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Monarchy"]][0]; ?> Monarchy Governments (<? echo ($FormatNumber[($rsAllUsers["Monarchy"]/$totalnations)*100][2]); ?>%)<br>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Republic FROM Nation Where Government_Type = 'Republic' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Republic"]][0]; ?> Republic Governments (<? echo ($FormatNumber[($rsAllUsers["Republic"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Revolutionary FROM Nation Where Government_Type = 'Revolutionary Government' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Revolutionary"]][0]; ?> Revolutionary Governments (<? echo ($FormatNumber[($rsAllUsers["Revolutionary"]/$totalnations)*100][2]); ?>%)<br>


<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Totalitarian FROM Nation Where Government_Type = 'Totalitarian State' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Totalitarian"]][0]; ?> Totalitarian Governments (<? echo ($FormatNumber[($rsAllUsers["Totalitarian"]/$totalnations)*100][2]); ?>%)<br>

<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS Transitional FROM Nation Where Government_Type = 'Transitional' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Transitional"]][0]; ?> Transitional Governments (<? echo ($FormatNumber[($rsAllUsers["Transitional"]/$totalnations)*100][2]); ?>%)<br>
<br>
<br>
<p></p>
<b><u>Other Info:</u></b><br>				
<? 
$dtNow=time()();
$dtY2K=$DateSerial[2006][1][6];
$iDaysDifference=$DateDiff["d"][$dtY2K][$dtNow];
?>
Cyber Nations is <? echo $iDaysDifference; ?> days old today.<br>


 

				</td>
				
				<td valign="top" align="right">
<b><u>Nations Created Per Day:</u></b><br>				
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 0) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>

<? $date_value=time()(); ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()(); ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 1) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? $date_value=time()()-1; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-1; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 2) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? $date_value=time()()-2; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-2; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 3) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>

<? $date_value=time()()-3; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-3; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 4) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>

<? $date_value=time()()-4; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-4; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 5) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>

<? $date_value=time()()-5; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-5; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 6) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>

<? $date_value=time()()-6; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-6; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 7) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>

<? $date_value=time()()-7; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-7; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 8) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
 
<? $date_value=time()()-8; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-8; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(Nation_ID) AS BB FROM Nation Where (DATEDIFF(d,Nation_Dated,current_timestamp) = 9) ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
  
<? $date_value=time()()-9; ?>
<? $dayofweek=$weekday[$date_value]; ?>
<? switch ($dayofweek)
{
  case :
?>
Sunday
<?     break;
  case "2": ?>
Monday
<?     break;
  case "3": ?>
Tuesday
<?     break;
  case "4": ?>
Wednesday
<?     break;
  case "5": ?>
Thursday
<?     break;
  case "6": ?>
Friday
<?     break;
  case "7": ?>
Saturday
<?     break;
} ?>
<? echo time()()-9; ?> - <? echo $FormatNumber[$rsAllUsers["BB"]][0]; ?> <br>
</td>
				
			</tr>

			<tr>
				
				<td valign="top" align="right">
<br>
<br>
<u><b>
Ethnic Groups Population:</b></u><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS African FROM Nation Where Ethnic_Group = 'African' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["African"]][0]; ?> African (<? echo ($FormatNumber[($rsAllUsers["African"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Albanian FROM Nation Where Ethnic_Group = 'Albanian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Albanian"]][0]; ?> Albanian (<? echo ($FormatNumber[($rsAllUsers["Albanian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Amerindian FROM Nation Where Ethnic_Group = 'Amerindian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Amerindian"]][0]; ?> Amerindian (<? echo ($FormatNumber[($rsAllUsers["Amerindian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Arab FROM Nation Where Ethnic_Group = 'Arab' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Arab"]][0]; ?> Arab (<? echo ($FormatNumber[($rsAllUsers["Arab"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Berber FROM Nation Where Ethnic_Group = 'Arab-Berber' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Berber"]][0]; ?> Arab-Berber (<? echo ($FormatNumber[($rsAllUsers["Berber"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Armenian FROM Nation Where Ethnic_Group = 'Armenian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Armenian"]][0]; ?> Armenian (<? echo ($FormatNumber[($rsAllUsers["Armenian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Black FROM Nation Where Ethnic_Group = 'Black' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Black"]][0]; ?> Black (<? echo ($FormatNumber[($rsAllUsers["Black"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS British FROM Nation Where Ethnic_Group = 'British' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["British"]][0]; ?> British (<? echo ($FormatNumber[($rsAllUsers["British"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Bulgarian FROM Nation Where Ethnic_Group = 'Bulgarian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Bulgarian"]][0]; ?> Bulgarian (<? echo ($FormatNumber[($rsAllUsers["Bulgarian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Burman FROM Nation Where Ethnic_Group = 'Burman' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Burman"]][0]; ?> Burman (<? echo ($FormatNumber[($rsAllUsers["Burman"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Caucasian FROM Nation Where Ethnic_Group = 'Caucasian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Caucasian"]][0]; ?> Caucasian (<? echo ($FormatNumber[($rsAllUsers["Caucasian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Celtic FROM Nation Where Ethnic_Group = 'Celtic' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Celtic"]][0]; ?> Celtic (<? echo ($FormatNumber[($rsAllUsers["Celtic"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Chinese FROM Nation Where Ethnic_Group = 'Chinese' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Chinese"]][0]; ?> Chinese (<? echo ($FormatNumber[($rsAllUsers["Chinese"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Creole FROM Nation Where Ethnic_Group = 'Creole' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Creole"]][0]; ?> Creole (<? echo ($FormatNumber[($rsAllUsers["Creole"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Croat FROM Nation Where Ethnic_Group = 'Croat' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Croat"]][0]; ?> Croat (<? echo ($FormatNumber[($rsAllUsers["Croat"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Czech FROM Nation Where Ethnic_Group = 'Czech' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Czech"]][0]; ?> Czech (<? echo ($FormatNumber[($rsAllUsers["Czech"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Dutch FROM Nation Where Ethnic_Group = 'Dutch' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Dutch"]][0]; ?> Dutch (<? echo ($FormatNumber[($rsAllUsers["Dutch"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Estonian FROM Nation Where Ethnic_Group = 'Estonian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Estonian"]][0]; ?> Estonian (<? echo ($FormatNumber[($rsAllUsers["Estonian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS French FROM Nation Where Ethnic_Group = 'French' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["French"]][0]; ?> French (<? echo ($FormatNumber[($rsAllUsers["French"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS German FROM Nation Where Ethnic_Group = 'German' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["German"]][0]; ?> German (<? echo ($FormatNumber[($rsAllUsers["German"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Greek FROM Nation Where Ethnic_Group = 'Greek' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Greek"]][0]; ?> Greek (<? echo ($FormatNumber[($rsAllUsers["Greek"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Han FROM Nation Where Ethnic_Group = 'Han Chinese' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Han"]][0]; ?> Han Chinese (<? echo ($FormatNumber[($rsAllUsers["Han"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Italian FROM Nation Where Ethnic_Group = 'Italian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Italian"]][0]; ?> Italian (<? echo ($FormatNumber[($rsAllUsers["Italian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Indian FROM Nation Where Ethnic_Group = 'Indian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Indian"]][0]; ?> Indian (<? echo ($FormatNumber[($rsAllUsers["Indian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Japanese FROM Nation Where Ethnic_Group = 'Japanese' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Japanese"]][0]; ?> Japanese (<? echo ($FormatNumber[($rsAllUsers["Japanese"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Jewish FROM Nation Where Ethnic_Group = 'Jewish' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Jewish"]][0]; ?> Jewish (<? echo ($FormatNumber[($rsAllUsers["Jewish"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Korean FROM Nation Where Ethnic_Group = 'Korean' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Korean"]][0]; ?> Korean (<? echo ($FormatNumber[($rsAllUsers["Korean"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Mestizo FROM Nation Where Ethnic_Group = 'Mestizo' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Mestizo"]][0]; ?> Mestizo (<? echo ($FormatNumber[($rsAllUsers["Mestizo"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Mexican FROM Nation Where Ethnic_Group = 'Mexican' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Mexican"]][0]; ?> Mexican (<? echo ($FormatNumber[($rsAllUsers["Mexican"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Mixed FROM Nation Where Ethnic_Group = 'Mixed' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Mixed"]][0]; ?> Mixed (<? echo ($FormatNumber[($rsAllUsers["Mixed"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Norwegian FROM Nation Where Ethnic_Group = 'Norwegian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Norwegian"]][0]; ?> Norwegian (<? echo ($FormatNumber[($rsAllUsers["Norwegian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Pacific FROM Nation Where Ethnic_Group = 'Pacific Islander' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Pacific"]][0]; ?> Pacific Islander (<? echo ($FormatNumber[($rsAllUsers["Pacific"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Pashtun FROM Nation Where Ethnic_Group = 'Pashtun' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Pashtun"]][0]; ?> Pashtun (<? echo ($FormatNumber[($rsAllUsers["Pashtun"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Persian FROM Nation Where Ethnic_Group = 'Persian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Persian"]][0]; ?> Persian (<? echo ($FormatNumber[($rsAllUsers["Persian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Russian FROM Nation Where Ethnic_Group = 'Russian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Russian"]][0]; ?> Russian (<? echo ($FormatNumber[($rsAllUsers["Russian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Scandinavian FROM Nation Where Ethnic_Group = 'Scandinavian' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Scandinavian"]][0]; ?> Scandinavian (<? echo ($FormatNumber[($rsAllUsers["Scandinavian"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Serb FROM Nation Where Ethnic_Group = 'Serb' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Serb"]][0]; ?> Serb (<? echo ($FormatNumber[($rsAllUsers["Serb"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Somali FROM Nation Where Ethnic_Group = 'Somali' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Somali"]][0]; ?> Somali (<? echo ($FormatNumber[($rsAllUsers["Somali"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Spanish FROM Nation Where Ethnic_Group = 'Spanish' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Spanish"]][0]; ?> Spanish (<? echo ($FormatNumber[($rsAllUsers["Spanish"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Thai FROM Nation Where Ethnic_Group = 'Thai' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Thai"]][0]; ?> Thai (<? echo ($FormatNumber[($rsAllUsers["Thai"]/$worldpopulation)*100][2]); ?>%)<br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Sum((Military_Purchased-Military_Defending_Casualties-Military_Attacking_Casualties) + (Infrastructure_Purchased*9) + 50 + (DATEDIFF(d,Nation_Dated,current_timestamp)/2) ) AS Turk FROM Nation Where Ethnic_Group = 'Turk' ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? echo $FormatNumber[$rsAllUsers["Turk"]][0]; ?> Turk (<? echo ($FormatNumber[($rsAllUsers["Turk"]/$worldpopulation)*100][2]); ?>%)

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
