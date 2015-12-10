<? if (!$rsAds->EOF || !$rsAds->BOF)
{
?> 



<table width='100%' border='1' cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
     <tr>
     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Nation</font></td>
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

?> 

<tr>
<td align="left"><a href="nation_drill_display.asp?Nation_ID=<?     echo $rsAds["Nation_ID"]; ?>"><?     echo $rsAds["Nation_Name"]; ?></a>
</td>
<td align="left">
	<a href="compose2.asp?Nation_ID=<?     echo $rsAds["Nation_ID"]; ?>">
	<?     echo $rsAds["Poster"]; ?> </a>

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
<font color="<?     echo $rsAds["Nation_Team"]; ?>"><?     echo $rsAds["Nation_Team"]; ?></font>
</td>








<td align="center">
     	 <?     echo $rsAds["Resource1"]; ?>,<br><?     echo $rsAds["Resource2"]; ?>
      
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
