<? if (!$rsAds->EOF || !$rsAds->BOF)
{
?> 



                                      <div align="center">
                                      <table width="100%" border="0" cellpadding="5" cellspacing="0" id="table1">
                                        <tr align="center" valign="middle"> 
                                          <td bgcolor="#000080">
											<b>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
											Sanctioned Nation</font></b></td>
                                          <td bgcolor="#000080">
											<b>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
											Sanction Ordered By</font></b></td>
                                          <td bgcolor="#000080">
											<b>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
											Sanction Date</font></b></td>
<td bgcolor="#000080" align="left" width="16%">
<p align="center"><b>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
Sanction Type</font></b></td>

                                          <td bgcolor="#000080"><b>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
											Reason</font></b></td>
											
											<?   if ($access==1)
  {
?>
                                          <td bgcolor="#000080"><b>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
											Remove Sanctions</font></b></td>
											<?   } ?>
											
											
                                        </tr>
                                        <? 
  $repeat8__numRows=10;
  while((($repeat8__numRows!=0) && (!$rsAds->EOF)))
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
<td align="left">
<a href="nation_drill_display.asp?Nation_ID=<?     echo $rsAds["Nation_ID"]; ?>"><?     echo $rsAds["Nation_Name"]; ?></a> (<?     echo $rsAds["Poster"]; ?>)</td>
</td>

<td align="left">

<a href="nation_drill_display.asp?Nation_ID=<?     echo $rsAds["Sanction_Nation_ID"]; ?>"><?     echo $rsAds["Sanction_Nation_Name"]; ?></a> (<?     echo $rsAds["Sanction_Poster"]; ?>)</td>

</td>

<td align="left">
<?     echo $rsAds["Sanction_Date"]; ?>

</td>

<td valign="top" align="left" width="16%"> 
<? 
    if ($rsAds["Sanction_Trade"]==1)
    {

      print "Trade";
    } 

    if ($rsAds["Sanction_Trade"]==1 && $rsAds["Sanction_Aid"]==1)
    {

      print " & ";
    } 

    if ($rsAds["Sanction_Aid"]==1)
    {

      print "Aid";
    } 

?>
</td>

<td align="left"> 
<?     echo $rsAds["Sanction_Reason"]; ?>
</td>

<?     if ($access==1)
    {
?>
<td valign="middle" width="16%">
	<?       if ($rsSanctions["Sanction_Date"]>time()()-3)
      {
?>
	Not Available
	<?       }
        else
      {
?>
	<a href="sanctions_delete_code.asp?ID=<?         echo $rsSanctions["ID"]; ?>" onclick="return confirm('Are you sure you want to remove the sanctions placed against this nation?');">
	<img src="http://www.cybernations.net/assets/delete.jpg" width="17" height="17" border="0"></a>
	<?       } ?>
</td>
<?     } ?>

</tr>
                                        <? 
    $repeat8__index=$repeat8__index+1;
    $repeat8__numRows=$repeat8__numRows-1;
$rsAds->MoveNext();
  } 
?>
                                      </table>
                                      </div>
                                      


                                      

<? } 
// end Not rsAds.EOF Or NOT rsAds.BOF  
