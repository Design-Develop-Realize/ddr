<? if (!$rsAds->EOF || !$rsAds->BOF)
{
?> 
Click the ruler name link below to insert that user into the carbon copy field.


<table width='100%' border='0' cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
     <tr>
    <td bgcolor="#000080" align="center">
	<p align="center"><font color="#FFFFFF">Ruler</font></td>



     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Nation</font></td>



     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Created</font></td>

     <td bgcolor="#000080" align="center"><font color="#FFFFFF">Team</font></td>

     </tr>



<? 

  while((($Repeat1__numRows!=0) && (!$rsAds->EOF)))
  {

    $RecordCounter=$RecordCounter+1;
?>
<? 

    if ($RecordCounter$Mod2==1)
    {

      print "<tr bgcolor='#E6E6E6'>";
    }
      else
    {

      print "<tr bgcolor='#ffffff'>";
    } 

?>


<td align="left">

<a href="javascript:InsertRulerName('<?     echo $rsAds["Poster"]; ?>')"><?     echo $rsAds["Poster"]; ?></a>

</td>


<td align="left"><?     echo $rsAds["Nation_Name"]; ?>
</td>
<td align="left">
<?     echo $rsAds["Nation_Dated"]; ?>
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
