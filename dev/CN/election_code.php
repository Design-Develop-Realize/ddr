<? 
if (!$rsGuestbookHead->BOF && !$rsGuestbookHead->EOF)
{


// $rsSent10 is of type "ADODB.Recordset"

  $rsSent10SQL="SELECT Top 3 Poster,Votes,Nation_Name,Nation_ID,Nation_Team FROM Nation where Nation_Team = '"+$rsGuestbookHead["Nation_Team"]+"'  Order By Votes desc";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSent10SQL);

} 

?>
