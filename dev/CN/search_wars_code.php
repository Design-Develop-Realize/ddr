<? if (!$rsAds->EOF || !$rsAds->BOF)
{
?> 



<table width='100%' border='0' cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
     <tr>
     <td bgcolor="#000080" align="center">
		<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
		<b>War Declaration 
		Date</b></font></td>
    <td bgcolor="#000080" align="center">
	<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
	<b>War End Date</b></font></td>



     <td bgcolor="#000080" align="center">
		<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
		<b>War Declared By</b></font></td>

     <td bgcolor="#000080" align="center">
		<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
		<b>War Declared On</b></font></td>
     
     <td bgcolor="#000080" align="center">
		<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
		<b>Reason</b></font></td>

     <td bgcolor="#000080" align="center">
		<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
		<b>Outcome</b></font></td>

     </tr>



<? 
  $recordcounter=0;
  while((($Repeat1__numRows!=0) && (!$rsAds->EOF)))
  {

?> 

                                        <tr align="center" valign="middle"bgcolor=
	<? 
    $RecordCounter=$RecordCounter+1;
    if ($RecordCounter$Mod2==1)
    {

      print "#E6e6e6";
    }
      else
    {

      print "#ffffff";
    } 

?> > 
<td align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?     echo ($rsAds->Fields.$Item["War_Declaration_Date"].$Value); ?></font>
<?     if (($rsAds->Fields$Item["War_End_Date"]$Value)<time()())
    {
?>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1"><b>
<font color="#FF0000">*Expired*</font></b></font>
<?     } ?>

</td>

<td align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?     echo $FormatDateTime[$rsAds["War_End_Date"]+1][2]; ?>


</font></td>
<td align="left">
	<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0">
	<tr>
	<td>
	<p align="center">
	<?     if ($rsUser["Color_Blind"]!=1)
    {
?>
	<img border="0" src="images/teams/team_<?       echo $rsAds["Declaring_Team"]; ?>.gif" width="14" height="13" title="Team: <?       echo $rsAds["Declaring_Team"]; ?>"></td>
	<?     }
      else
    {
?>
	<?       echo $rsAds["Declaring_Team"]; ?> Team
	<?     } ?>
	</tr>
	</table>


<a href="nation_drill_display.asp?Nation_ID=<?     echo ($rsAds->Fields.$Item["Declaring_Nation_ID"].$Value); ?>"><?     echo ($rsAds->Fields.$Item["Declaring_Nation"].$Value); ?></a> 
<br>(<?     echo $rsAds->Fields.$Item["War_Declared_By_User"].$Value; ?>)
</td>

<td align="left">

	<table border="0" width="100%" id="table3" cellspacing="0" cellpadding="0">
	<tr>
	<td>
	<p align="center">
	<?     if ($rsUser["Color_Blind"]!=1)
    {
?>
	<img border="0" src="images/teams/team_<?       echo $rsAds["Receiving_Team"]; ?>.gif" width="14" height="13" title="Team: <?       echo $rsAds["Receiving_Team"]; ?>"></td>
	<?     }
      else
    {
?>
	<?       echo $rsAds["Receiving_Team"]; ?> Team
	<?     } ?>
	</tr>
	</table>
<a href="nation_drill_display.asp?Nation_ID=<?     echo ($rsAds->Fields.$Item["Receiving_Nation_ID"].$Value); ?>"><?     echo ($rsAds->Fields.$Item["Receiving_Nation"].$Value); ?></a>
<br>(<?     echo $rsAds->Fields.$Item["War_Declared_On_User"].$Value; ?>)
</td>

<td align="left"> 
<div class = "links"> 
<div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">

<?     echo ($rsAds->Fields.$Item["War_Reason"].$Value); ?></font></div>
</div></td>
<td align="left"> 
<div class = "links"> 
<div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">
<?     if (($rsAds->Fields$Item["Receiving_Nation_Peace"]$Value)==1 && ($rsAds->Fields$Item["Declaring_Nation_Peace"]$Value)==1)
    {
?>
Peace Declared
<?     }
      else
    {
?>
	<?       if (($rsAds->Fields$Item["Nation_Deleted"]$Value)==1)
      {
?>
	Nation Destroyed
	<?       } ?>
	<?       if (($rsAds->Fields$Item["War_Declaration_Date"]$Value)>=time()()-7 && ($rsAds->Fields$Item["Nation_Deleted"]$Value)==0)
      {
?>
		<font color="#FF0000">Currently Fighting
	</font>
	<?       } ?>
	<?       if (($rsAds->Fields$Item["War_Declaration_Date"]$Value)<time()()-7 && ($rsAds->Fields$Item["Nation_Deleted"]$Value)==0)
      {
?>
	War Expired
	<?       } ?>
<?     } ?>
</font></div>
</div></td>
</tr>

 <? 
    $Repeat1__index=$Repeat1__index+1;
    $Repeat1__numRows=$Repeat1__numRows-1;
$rsAds->MoveNext();
  } 
?><? } 
// end Not rsAds.EOF Or NOT rsAds.BOF  
