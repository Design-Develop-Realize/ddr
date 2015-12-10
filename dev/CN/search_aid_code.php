<? if (!$rsAds->EOF || !$rsAds->BOF)
{
?> 



<table width='100%' border='0' cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
     <tr>
     <td bgcolor="#000080" align="center">
											<font size="1" color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">
		<b>Aid 
											Offer Date</b></font></td>



     <td bgcolor="#000080" align="center">
											<font size="1" color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">
		<b>Aid 
											Offered By</b></font></td>

     <td bgcolor="#000080" align="center">
											<font size="1" color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">
		<b>Aid Offered To</b></font></td>
     
     <td bgcolor="#000080" align="center"><b>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
Aid Offered</font></b></td>

     <td bgcolor="#000080" align="center"><b>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
											Reason</font></b></td>

     <td bgcolor="#000080" align="center"><b>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
											Status</font></b></td>

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
<td align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?     echo ($rsAds->Fields.$Item["Aid_Declaration_Date"].$Value); ?></font>
<?     if (($rsAds->Fields$Item["Aid_Declaration_Date"]$Value)<=time()()-9)
    {
?>
<br> <b><font color="#FF0000">* Expired *
</font></b>
<?     } ?>
</td>

<td align="left">

<a href="nation_drill_display.asp?Nation_ID=<?     echo ($rsAds->Fields.$Item["Declaring_Nation_ID"].$Value); ?>"><?     echo ($rsAds->Fields.$Item["Declaring_Nation"].$Value); ?></a> (<?     echo $rsAds->Fields.$Item["Aid_Issued_By_User"].$Value; ?>)</td>

<td align="left">
<a href="nation_drill_display.asp?Nation_ID=<?     echo ($rsAds->Fields.$Item["Receiving_Nation_ID"].$Value); ?>"><?     echo ($rsAds->Fields.$Item["Receiving_Nation"].$Value); ?></a> (<?     echo $rsAds->Fields.$Item["Aid_Issued_On_User"].$Value; ?>)</td>

<td valign="top" align="left"> 
<div class = "links"> 
<font face="Verdana, Arial, Helvetica, sans-serif" size="1">

$<?     echo $FormatNumber[$rsAds["Resource_Sent_1"]][0]; ?><br>
<?     echo ($rsAds->Fields.$Item["Resource_Sent_2"].$Value); ?> Tech<br>
<?     echo ($rsAds->Fields.$Item["Resource_Sent_3"].$Value); ?> Soldiers

</font></div></td>

<td align="left"> 
<div class = "links"> 
<div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">

<?     echo ($rsAds->Fields.$Item["Aid_Reason"].$Value); ?></font></div>
</div></td>
<td valign="top"> 
	<p> 
		<?     if (($rsAds->Fields$Item["Aid_Cancled"]$Value)==0)
    {
?>
		<font color="#999999">Pending</font><br>
	<?     } ?>
	<?     if (($rsAds->Fields$Item["Aid_Cancled"]$Value)==1)
    {
?>
	<font color="#008000">Approved</font>
	<?     } ?>
	<?     if (($rsAds->Fields$Item["Aid_Cancled"]$Value)==2)
    {
?>
	<font color="#FF9933">Canceled</font><br>
	<?     } ?>
	<?     if (($rsAds->Fields$Item["Aid_Cancled"]$Value)==3)
    {
?>
	<font color="#FF9933">Canceled For Cheating</font><br>
	<?     } ?>

<? 
    $IPUSER2=$rsAds->Fields.$Item["Aid_Issued_On_User"].$Value;
// $rsIP2 is of type "ADODB.Recordset"

    $rsIP2SQL="SELECT IPADDRESS,U_PASSWORD_Secure FROM USers Where U_ID = '"+$IPUSER2+"' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsIP2SQL);
    $rsIP2_numRows=0;
?>
<? 
    $IPUSER1=$rsAds->Fields.$Item["Aid_Issued_By_User"].$Value;
// $rsIP1 is of type "ADODB.Recordset"

    $rsIP1SQL="SELECT IPADDRESS,U_PASSWORD_Secure FROM USers Where U_ID = '"+$IPUSER1+"' ";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsIP1SQL);
    $rsIP1_numRows=0;
?>
<?     if ($rsIP1["IPADDRESS"]=$rsIP2["IPADDRESS"]|strtoupper($rsIP1["U_PASSWORD_Secure"])=strtoupper($rsIP2["U_PASSWORD_Secure"])$then; )
    {

      $img$src="/images/warning.gif"$title="The nations involved in this foreign aid agreement were potentially created by the same player who could be trying to abuse the foreign aid system.">;





      echo $Repeat1__index+1;
      $Repeat1__numRows=$Repeat1__numRows-1;
$rsAds->MoveNext();
    } 

?><?   }   if () // end Not rsAds.EOF Or NOT rsAds.BOF 
  {
  } 
} 

