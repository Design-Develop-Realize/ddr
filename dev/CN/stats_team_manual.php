<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->

<? Dim rsGuestbook
Dim rsGuestbookSQL
Set rsGuestbook= Server.CreateObject("ADODB.Recordset") 
rsGuestbookSQL = "SELECT Last_Tax_Collection,Strength,Nation_Team,Nuclear_Purchased,Land_Purchased,Infrastructure_Purchased,Technology_Purchased,Military_Purchased,Military_Attacking_Casualties,Military_Defending_Casualties,Nation_Dated FROM Nation Order By Nation_Dated Desc" 
rsGuestbook.CursorType = 0
rsGuestbook.CursorLocation = 2
rsGuestbook.LockType = 3
rsGuestbook.Open rsGuestbookSQL,objConn
rsGuestbook_numRows = 0
%>


<!--#include file="inc_header.php" -->
  


<? if ()
{

?>

<? 
  while((!$rsGuestbook->EOF))
  {

    if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
    {

      $allactive=$allactive+1;
    } 


    if (!isset($rsGuestbook["Strength"]))
    {

      $nationstrength=0;
    }
      else
    {

      $nationstrength=$rsGuestbook["Strength"];
    } 


    $allstrenght=$allstrenght+$nationstrength;

    if ($rsGuestbook["Nation_Team"]=="Brown")
    {

      $browncntr=$browncntr+1;
      $brownpowermeter=$brownpowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $brownactive=$brownactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Red")
    {

      $redcntr=$redcntr+1;
      $redpowermeter=$redpowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $redactive=$redactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Blue")
    {

      $bluecntr=$bluecntr+1;
      $bluepowermeter=$bluepowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $blueactive=$blueactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Purple")
    {

      $purplecntr=$purplecntr+1;
      $purplepowermeter=$purplepowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $purpleactive=$purpleactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Green")
    {

      $greencntr=$greencntr+1;
      $greenpowermeter=$greenpowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $greenactive=$greenactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Orange")
    {

      $orangecntr=$orangecntr+1;
      $orangepowermeter=$orangepowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $orangeactive=$orangeactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="None")
    {

      $nonecntr=$nonecntr+1;
      $nonepowermeter=$nonepowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $noneactive=$noneactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Black")
    {

      $Blackcntr=$Blackcntr+1;
      $Blackpowermeter=$Blackpowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $Blackactive=$Blackactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Maroon")
    {

      $Marooncntr=$Marooncntr+1;
      $Maroonpowermeter=$Maroonpowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $Maroonactive=$Maroonactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Pink")
    {

      $Pinkcntr=$Pinkcntr+1;
      $Pinkpowermeter=$Pinkpowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $Pinkactive=$Pinkactive+1;
      } 

    } 

    if ($rsGuestbook["Nation_Team"]=="Yellow")
    {

      $Yellowcntr=$Yellowcntr+1;
      $Yellowpowermeter=$Yellowpowermeter+$nationstrength;
      if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
      {

        $Yellowactive=$Yellowactive+1;
      } 

    } 



?>


<? 
$rsGuestbook->MoveNext();
  } 
?>
<p align="center">
<b><br>
Team Statistics Provided In Real Time</b></p>

</p>



<p>


<p></p>

<p></p>



<p></p>
<table border="0" width="100%" id="table4" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top" width="100%">
<table border="1" width="100%" id="table5" cellspacing="0" cellpadding="2" bordercolor="#000080">
<tr>
<td width="16%">Team Name</td>
<td width="16%" align="center">Total Nations</td>
<td width="16%" align="center">Active Nations</td>
<td width="16%" align="center">Percent Active</td>
<td width="14%" align="center">Strength</td>
<td width="16%" align="center">Avg. Strength</td>
<td width="16%" align="center">Nukes</td>
</tr>
<tr>
<td width="16%">
<font color="Brown">Brown Team</font><br>
<font color="Red">Red Team </font><br>
<font color="Green">Green Team </font><br>
<font color="Blue">Blue Team </font><br>
<font color="Orange">Orange Team </font><br>
<font color="Purple">Purple Team </font><br>
<font color="Pink">Pink Team </font><br>
<font color="Maroon">Maroon Team </font><br>
<font color="Black">Black Team </font><br>
<font color="Yellow">Yellow Team </font><br>
<font color="Gray">No Team</font></td>
<td width="16%" align="center">
<font color="Brown"><?   echo $browncntr; ?></font><br>	
<font color="Red"><?   echo $redcntr; ?></font> <br>
<font color="Green"><?   echo $greencntr; ?></font><br>
<font color="Blue"><?   echo $bluecntr; ?></font> <br>
<font color="Orange"><?   echo $Orangecntr; ?></font><br>
<font color="Purple"><?   echo $Purplecntr; ?></font><br>
<font color="Pink"><?   echo $Pinkcntr; ?></font><br>
<font color="Maroon"><?   echo $Marooncntr; ?></font><br>
<font color="Black"><?   echo $Blackcntr; ?></font><br>
<font color="Yellow"><?   echo $Yellowcntr; ?></font><br>
<font color="Gray"><?   echo $nonecntr; ?></font>
</td>
<td width="16%" align="center">
<font color="Brown"><?   echo $brownactive; ?></font><br>
<font color="Red"><?   echo $redactive; ?></font><br>
<font color="Green"><?   echo $greenactive; ?></font><br>
<font color="Blue"><?   echo $blueactive; ?></font><br>
<font color="Orange"><?   echo $Orangeactive; ?></font><br>
<font color="Purple"><?   echo $Purpleactive; ?></font><br>
<font color="Pink"><?   echo $Pinkactive; ?></font><br>
<font color="Maroon"><?   echo $Maroonactive; ?></font><br>
<font color="Black"><?   echo $Blackactive; ?></font><br>
<font color="Yellow"><?   echo $Yellowactive; ?></font><br>
<font color="Gray"><?   echo $noneactive; ?></font></td>
<td width="16%" align="center">
<font color="Brown"><?   echo $FormatNumber[($brownactive/$browncntr)*100][0]; ?>%</font><br>
<font color="Red"><?   echo $FormatNumber[($Redactive/$Redcntr)*100][0]; ?>%</font><br>
<font color="Green"><?   echo $FormatNumber[($Greenactive/$Greencntr)*100][0]; ?>%</font><br>
<font color="Blue"><?   echo $FormatNumber[($Blueactive/$Bluecntr)*100][0]; ?>%</font><br>
<font color="Orange"><?   echo $FormatNumber[($Orangeactive/$Orangecntr)*100][0]; ?>%</font><br>
<font color="Purple"><?   echo $FormatNumber[($Purpleactive/$Purplecntr)*100][0]; ?>%</font><br>
<font color="Pink"><?   echo $FormatNumber[($Pinkactive/$Pinkcntr)*100][0]; ?>%</font><br>
<font color="Maroon"><?   echo $FormatNumber[($Maroonactive/$Marooncntr)*100][0]; ?>%</font><br>
<font color="Black"><?   echo $FormatNumber[($Blackactive/$Blackcntr)*100][0]; ?>%</font><br>
<font color="Yellow"><?   echo $FormatNumber[($Yellowactive/$Yellowcntr)*100][0]; ?>%</font><br>
<font color="Gray"><?   echo $FormatNumber[($noneactive/$nonecntr)*100][0]; ?>%</font></td>
<td width="14%" align="center">
<font color="Brown"><?   echo $FormatNumber[$brownpowermeter][0]; ?></font> <br>
<font color="Red"><?   echo $FormatNumber[$redpowermeter][0]; ?> </font><br>
<font color="Green"><?   echo $FormatNumber[$greenpowermeter][0]; ?> </font><br>
<font color="Blue"><?   echo $FormatNumber[$bluepowermeter][0]; ?></font> <br>
<font color="Orange"><?   echo $FormatNumber[$orangepowermeter][0]; ?></font><br>
<font color="Purple"><?   echo $FormatNumber[$purplepowermeter][0]; ?></font> <br>
<font color="Pink"><?   echo $FormatNumber[$Pinkpowermeter][0]; ?></font> <br>
<font color="Maroon"><?   echo $FormatNumber[$Maroonpowermeter][0]; ?></font> <br>
<font color="Black"><?   echo $FormatNumber[$Blackpowermeter][0]; ?></font> <br>
<font color="Yellow"><?   echo $FormatNumber[$Yellowpowermeter][0]; ?></font> <br>
<font color="Gray"><?   echo $FormatNumber[$nonepowermeter][0]; ?></font></td>
<td width="16%" align="center">
<font color="Brown"><?   echo $FormatNumber[$brownpowermeter/$browncntr][2]; ?></font><br>
<font color="Red"><?   echo $FormatNumber[$redpowermeter/$redcntr][2]; ?></font><br>
<font color="Green"><?   echo $FormatNumber[$greenpowermeter/$greencntr][2]; ?></font><br>
<font color="Blue"><?   echo $FormatNumber[$bluepowermeter/$bluecntr][2]; ?></font><br>
<font color="Orange"><?   echo $FormatNumber[$orangepowermeter/$Orangecntr][2]; ?></font><br>
<font color="Purple"><?   echo $FormatNumber[$purplepowermeter/$Purplecntr][2]; ?></font><br>
<font color="Pink"><?   echo $FormatNumber[$Pinkpowermeter/$Pinkcntr][2]; ?></font><br>
<font color="Maroon"><?   echo $FormatNumber[$Maroonpowermeter/$Marooncntr][2]; ?></font><br>
<font color="Black"><?   echo $FormatNumber[$Blackpowermeter/$Blackcntr][2]; ?></font><br>
<font color="Yellow"><?   echo $FormatNumber[$Yellowpowermeter/$Yellowcntr][2]; ?></font><br>
<font color="Gray"><?   echo $FormatNumber[$nonepowermeter/$nonecntr][2]; ?></font>
</td>
<td width="16%" align="center">
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Brown' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="Brown"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Red' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="red"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Green' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="green"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Blue' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="blue"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Orange' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="orange"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Purple' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="purple"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Pink' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="pink"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Maroon' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="Maroon"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Black' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="Black"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'Yellow' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="Yellow"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font><br>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation Where Nation_Team = 'None' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<font color="gray"><?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?></font>
</td>
</tr>
<tr>
<td width="16%">
Totals</td>
<td width="16%" align="center">
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
<?   echo $totalnations; ?></td>
<td width="16%" align="center">
<?   echo $allactive; ?></td>
<td width="16%" align="center">
<?   echo $FormatNumber[($allactive/$totalnations)*100][0]; ?>%</td>
<td width="14%" align="center">
<?   echo $FormatNumber[$allstrenght][0]; ?></td>
<td width="16%" align="center">
<?   echo $FormatNumber[$allstrenght/$totalnations][2]; ?></td>
<td width="16%" align="center">
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT SUM(Nuclear_Purchased) AS nukes FROM Nation";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
?>
<?   echo $FormatNumber[$rsAllUsers["nukes"]][0]; ?>
</td>
</tr>
</table>
		</td>
	</tr>
	</table>
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

?>} 

