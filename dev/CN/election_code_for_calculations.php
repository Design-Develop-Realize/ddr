<? 
if ($rsGuestbookHead->BOF && $rsGuestbookHead->EOF)
{

}
  else
{

// $rsElection1 is of type "ADODB.Recordset"

  $rsElection1SQL="SELECT Top 5 Poster,Princeps,Nation_Name,Nation_ID,Nation_Team FROM Nation where Nation_Team = '"+$rsGuestbookHead["Nation_Team"]+"'  Order By Princeps desc";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsElection1SQL);
  $rsElection1_numRows=0;

// $rsElection2 is of type "ADODB.Recordset"

  $rsElection2SQL="SELECT Top 5 Poster,Praetor,Nation_Name,Nation_ID,Nation_Team FROM Nation where Nation_Team = '"+$rsGuestbookHead["Nation_Team"]+"'  Order By Praetor desc";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsElection2SQL);
  $rsElection2_numRows=0;
  if ($rsElection2["Nation_Name"]=$rsElection1["Nation_Name"]$then;
$rsElection2=mysql_fetch_array($rsElection2_query);
  $rsElection2_BOF=0;
())
  {
  } 


// $rsElection3 is of type "ADODB.Recordset"

  $rsElection3SQL="SELECT Top 5 Poster,Counslus,Nation_Name,Nation_ID,Nation_Team FROM Nation where Nation_Team = '"+$rsGuestbookHead["Nation_Team"]+"'  Order By Counslus desc";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsElection3SQL);
  $rsElection3_numRows=0;
  if ($rsElection3["Nation_Name"]=$rsElection1["Nation_Name"]$then;
$rsElection3=mysql_fetch_array($rsElection3_query);
  $rsElection3_BOF=0;
())
  {
  } 

  if ($rsElection3["Nation_Name"]=$rsElection2["Nation_Name"]$then;
$rsElection3=mysql_fetch_array($rsElection3_query);
  $rsElection3_BOF=0;
())
  {
  } 

  if ($rsElection3["Nation_Name"]=$rsElection1["Nation_Name"]$then;
$rsElection3=mysql_fetch_array($rsElection3_query);
  $rsElection3_BOF=0;
())
  {
  } 




  $Princeps=0;
  $Praetor=0;
  $Counslus=0;

  if ($rsElection1["Princeps"]><0 && $rsElection2["Praetor"]><0)
  {

    $Princeps_Elected=$rsElection1["Poster"];
    $Praetor_Elected=$rsElection2["Poster"];


    if ($rsElection1["Nation_Name"]=$rsGuestbook["Nation_Name"]$then;
$Princeps==1)
    {
    } 

    if ($rsElection2["Nation_Name"]=$rsGuestbook["Nation_Name"]$then;
$Praetor==1)
    {
    } 

    if ($rsElection3["Nation_Name"]=$rsGuestbook["Nation_Name"]$then;
$Counslus==1)
    {
    } 

  } 


  
  $rsElection1=null;

  
  $rsElection2=null;

  
  $rsElection3=null;

} 

?>
