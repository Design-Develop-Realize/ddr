<? if ($rsGuestbook->BOF && $rsGuestbook->EOF)
{

}
  else
{

// $rsEvent is of type "ADODB.Recordset"

  $rsEventSQL="SELECT National_Event_Number,National_Event_Response,National_Event_Date,National_Event_Receiver_Ruler From National_Events where National_Event_Receiver = '".$rsGuestbook["Nation_ID"]."' AND National_Event_Date >= getdate()-30 Order By National_Event_Date desc";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsEventSQL);
  $rsEvent_numRows=0;
} ?>
