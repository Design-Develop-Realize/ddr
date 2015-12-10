<? if (!$rsAds->EOF || !$rsAds->BOF)
{
?> 



<table width='100%' border='0' cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
     <tr>
     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Sanction Nation</font></td>
    <td bgcolor="#000080" align="center">
	<p align="center"><font color="#FFFFFF">Ruler</font></td>



     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Created</font></td>

     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Last Active</font></td>
     
     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Team</font></td>

     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Resources</font></td>

     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Nuclear</font></td>
     <td bgcolor="#000080" align="center"><font color="#FFFFFF">War</font></td>

     </tr>



<? 

  while((($Repeat1__numRows!=0) && (!$rsAds->EOF)))
  {

    $RecordCounter=$RecordCounter+1;
?>
<? 

    if ($RecordCounter$Mod2==1)
    {


      if ($rsAds["Poster"]==$rsUser["U_ID"])
      {

        print "<tr bgcolor='#ffffcc'>";
      }
        else
      {

        print "<tr bgcolor='#E6E6E6'>";
      } 

    }
      else
    {

      if ($rsAds["Poster"]==$rsUser["U_ID"])
      {

        print "<tr bgcolor='#ffffcc'>";
      }
        else
      {

        print "<tr bgcolor='#ffffff'>";
      } 

    } 

?>


<td align="left"><a href="sanctions.asp?Nation_ID=<?     echo $rsAds["Nation_ID"]; ?>"><?     echo $rsAds["Nation_Name"]; ?></a>
</td>
<td align="left">

	<?     echo $rsAds["Poster"]; ?> 

</td>
<td align="left">
<?     echo $rsAds["Nation_Dated"]; ?>
</td>
<td align="left">
	<? 
    $IPUSER1=strtoupper($rsAds["Poster"]);
// $rsIP1 is of type "ADODB.Recordset"

    $rsIP1SQL="SELECT Last_Activity FROM USers Where U_ID = '"+$IPUSER1+"' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsIP1SQL);
    $rsIP1_numRows=0;
?>
	<?     echo $rsIP1["Last_Activity"]; ?>
	<?     if ($DateDiff["n"][$rsIP1["Last_Activity"]][strftime("%m/%d/%Y %H:%M:%S %p")()]<60)
    {
?>
	<img border="0" src="assets/asterisk.gif" width="15" height="12" title="Online in last 60 minutes">
	<?     } ?>
</td>
<td align="left">
<p align="center">
<?     if ($rsUser["Color_Blind"]!=1)
    {
?>
<img border="0" src="images/teams/team_<?       echo $rsAds["Nation_Team"]; ?>.gif" width="14" height="13" title="Team: <?       echo $rsAds["Nation_Team"]; ?>"> 
<?     }
      else
    {
?>
<?       echo $rsAds["Nation_Team"]; ?>
<?     } ?></td>








<td align="center">
<? 
    if ($rsAds["Resource1"]=="Aluminum" || $rsAds["Resource2"]=="Aluminum")
    {

      print "<img src='images/resources/Aluminum.GIF' title='Aluminum'>";
    } 

    if ($rsAds["Resource1"]=="Cattle" || $rsAds["Resource2"]=="Cattle")
    {

      print "<img src='images/resources/cattle.GIF' title='Cattle'>";
    } 

    if ($rsAds["Resource1"]=="Coal" || $rsAds["Resource2"]=="Coal")
    {

      print "<img src='images/resources/Coal.GIF' title='Coal'>";
    } 

    if ($rsAds["Resource1"]=="Fish" || $rsAds["Resource2"]=="Fish")
    {

      print "<img src='images/resources/Fish.GIF' title='Fish'>";
    } 

    if ($rsAds["Resource1"]=="Furs" || $rsAds["Resource2"]=="Furs")
    {

      print "<img src='images/resources/Furs.GIF' title='Furs'>";
    } 

    if ($rsAds["Resource1"]=="Gold" || $rsAds["Resource2"]=="Gold")
    {

      print "<img src='images/resources/Gold.GIF' title='Gold'>";
    } 

    if ($rsAds["Resource1"]=="Gems" || $rsAds["Resource2"]=="Gems")
    {

      print "<img src='images/resources/Gems.GIF' title='Gems'>";
    } 

    if ($rsAds["Resource1"]=="Iron" || $rsAds["Resource2"]=="Iron")
    {

      print "<img src='images/resources/Iron.GIF' title='Iron'>";
    } 

    if ($rsAds["Resource1"]=="Lead" || $rsAds["Resource2"]=="Lead")
    {

      print "<img src='images/resources/Lead.GIF' title='Lead'>";
    } 

    if ($rsAds["Resource1"]=="Lumber" || $rsAds["Resource2"]=="Lumber")
    {

      print "<img src='images/resources/Lumber.GIF' title='Lumber'>";
    } 

    if ($rsAds["Resource1"]=="Marble" || $rsAds["Resource2"]=="Marble")
    {

      print "<img src='images/resources/Marble.GIF' title='Marble'>";
    } 

    if ($rsAds["Resource1"]=="Oil" || $rsAds["Resource2"]=="Oil")
    {

      print "<img src='images/resources/Oil.GIF' title='Oil'>";
    } 

    if ($rsAds["Resource1"]=="Pigs" || $rsAds["Resource2"]=="Pigs")
    {

      print "<img src='images/resources/Pigs.GIF' title='Pigs'>";
    } 

    if ($rsAds["Resource1"]=="Rubber" || $rsAds["Resource2"]=="Rubber")
    {

      print "<img src='images/resources/Rubber.GIF' title='Rubber'>";
    } 

    if ($rsAds["Resource1"]=="Silver" || $rsAds["Resource2"]=="Silver")
    {

      print "<img src='images/resources/Silver.GIF' title='Silver'>";
    } 

    if ($rsAds["Resource1"]=="Spices" || $rsAds["Resource2"]=="Spices")
    {

      print "<img src='images/resources/Spices.GIF' title='Spices'>";
    } 

    if ($rsAds["Resource1"]=="Sugar" || $rsAds["Resource2"]=="Sugar")
    {

      print "<img src='images/resources/Sugar.GIF' title='Sugar'>";
    } 

    if ($rsAds["Resource1"]=="Uranium" || $rsAds["Resource2"]=="Uranium")
    {

      print "<img src='images/resources/Uranium.GIF' title='Uranium'>";
    } 

    if ($rsAds["Resource1"]=="Water" || $rsAds["Resource2"]=="Water")
    {

      print "<img src='images/resources/Water.GIF' title='Water'>";
    } 

    if ($rsAds["Resource1"]=="Wheat" || $rsAds["Resource2"]=="Wheat")
    {

      print "<img src='images/resources/Wheat.GIF' title='Wheat'>";
    } 

    if ($rsAds["Resource1"]=="Wine" || $rsAds["Resource2"]=="Wine")
    {

      print "<img src='images/resources/Wine.GIF' title='Wine'>";
    } 

?>
<br>


<? 
    $improvenationidsearch=$rsAds["Nation_ID"];
// $rsImproveSearch is of type "ADODB.Recordset"

    $rsImproveSearchSQL="SELECT Improvements.Harbors FROM Improvements WHERE Nation_ID=".$improvenationidsearch;
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsImproveSearchSQL);
    $rsImproveSearch_numRows=0;
    $missile_defenses=0;
    $tradeslots=4;
    if ((!($rsImproveSearch_BOF==1)) && (!($rsImproveSearch==0)))
    {

      $tradeslots=$tradeslots+$rsImproveSearch["Harbors"];
    } 

?>



<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

        echo $MM_conn_STRING_Trade;
        echo "SELECT COUNT(ID) AS Trades FROM Trade Where Trade_Cancled = 1 AND (Declaring_Nation_ID = '".$rsAds["Nation_ID"]."' Or Receiving_Nation_ID = '".$rsAds["Nation_ID"]."') ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
    $numertrades=$rsAllUsers["Trades"];

// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "SELECT COUNT(ID) AS UnTrades FROM Trade Where Trade_Cancled = 0 AND (Declaring_Nation_ID = '".$rsAds["Nation_ID"]."' Or Receiving_Nation_ID = '".$rsAds["Nation_ID"]."') ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query();
    $untrades=$rsAllUsers["UnTrades"];
    if ($numertrades+$untrades>6)
    {

?>
<img border="0" src="images/unavailable.gif" title="This nation has <?       echo $untrades+$numertrades; ?> total trades; <?       echo $numertrades; ?> active trades and <?       echo $untrades; ?> pending trades agreements." width="14" height="14">

<?     }
      else
    {
?>
	<a href="trade_form.asp?Nation_ID=<?       echo $rsGuestbook0["Nation_ID"]; ?>&bynation=<?       echo ($rsAds["Nation_ID"].$Value); ?>"> 
	<img border="0" src="images/available.gif" title="This nation has <?       echo $untrades+$numertrades; ?> total trades; <?       echo $numertrades; ?> active trades and <?       echo $untrades; ?> pending trades agreements.">
	</a>

<?     } ?>       
 </td> 






<td align="center">
     	 <?     if (($rsAds["Nuclear"]$Value)><3)
    {
?>
     	<img src='assets/nukeprohibit.gif' title='Nation does not support nuclear weapons.'>
	      <?     }
      else
    {
      if (($rsAds["Nuclear_Purchased"]$Value)>0)
      {
?>
	     <img src='assets/nuke.gif' title='Nation currently owns nuclear weapons.'>
	      <?       }
        else
      {
?>
	    <img src='assets/none.gif' title='Nation supports nuclear weapons but does not own any.'>
	      <?       } ?>
	      <?     } ?>
</td>
<td align="center">
     <?     if ($rsAds["Nation_Peace"]==1)
    {
?>
     <img src='images/peace.gif' border=0 title='Peaceful Nation'>
	<?     }
      else
    {
?>
	 <img src='images/war.gif' border=0 title='War is an option'>
     <?     } ?>
</td>








</tr>

 <? 
    $Repeat1__index=$Repeat1__index+1;
    $Repeat1__numRows=$Repeat1__numRows-1;
$rsAds->MoveNext();
  } 
?><? } 
// end Not rsAds.EOF Or NOT rsAds.BOF  
