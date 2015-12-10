<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>
<!--#include file="connection.php" -->
<!--#include file="nocache.php" -->
<? 
// *** Restrict Access To Page: Grant or deny access to this page

$MM_authorizedUsers="";
$MM_authFailedURL="login.asp?login=1";
$MM_grantAccess=false;
if ($MM_Username_session!="")
{

  if ((true || $MM_UserAuthorization_session=="") || 
     ((strpos(1,$MM_authorizedUsers,$MM_UserAuthorization_session) ? strpos(1,$MM_authorizedUsers,$MM_UserAuthorization_session)+1 : 0)>=1))
  {

    $MM_grantAccess=true;
  } 

} 

if (!$MM_grantAccess)
{

  $MM_qsChar="?";
  if (((strpos(1,$MM_authFailedURL,"?") ? strpos(1,$MM_authFailedURL,"?")+1 : 0)>=1))
  {
    $MM_qsChar="&";
  } 
  $MM_referrer=$_SERVER["URL"];
  if ((strlen($_GET[])>0))
  {
    $MM_referrer=$MM_referrer."?".$_GET[];
  } 
  $MM_authFailedURL=$MM_authFailedURL.$MM_qsChar."accessdenied=".rawurlencode($MM_referrer);
  header("Location: ".$MM_authFailedURL);
} 

?>
<? 
$rsSent__MMColParam="0";
if (($MM_Username_session!=""))
{
  $rsSent__MMColParam=$MM_Username_session;
} ?>
<!--#include file="inc_header.php" -->


<? 
// $rsSent is of type "ADODB.Recordset"

$rsSentSQL="SELECT *  FROM Aid WHERE Declaring_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."' OR Receiving_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."' ORDER BY Aid_Declaration_Date DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSentSQL);
?>



<? 

$RecordCounter=0;
?>
<? 
$repeat8__numRows=40;
$repeat8__index=0;
$rsSent_numRows=$rsSent_numRows+$repeat8__numRows;
?>
<? 
//  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables



// set the record count

$rsSent_total=mysql_num_rows($rsSent_query);

// set the number of rows displayed on this page

if (($rsSent_numRows<0))
{

  $rsSent_numRows=$rsSent_total;
}
  else
if (($rsSent_numRows==0))
{

  $rsSent_numRows=1;
} 


// set the first and last displayed record

$rsSent_first=1;
$rsSent_last=$rsSent_first+$rsSent_numRows-1;

// if we have the correct record count, check the other stats

if (($rsSent_total!=-1))
{

  if (($rsSent_first>$rsSent_total))
  {

    $rsSent_first=$rsSent_total;
  } 

  if (($rsSent_last>$rsSent_total))
  {

    $rsSent_last=$rsSent_total;
  } 

  if (($rsSent_numRows>$rsSent_total))
  {

    $rsSent_numRows=$rsSent_total;
  } 

} 

?>
<? 
// *** Recordset Stats: if we don't know the record count, manually count them
if (($rsSent_total==-1))
{


// count the total records by iterating through the recordset

  $rsSent_total=0;
  while((!($rsSent==0)))
  {

    $rsSent_total=$rsSent_total+1;
    $rsSent=mysql_fetch_array($rsSent_query);
    $rsSent_BOF=0;

  } 

// reset the cursor to the beginning

  if ((>0))
  {

    
  }
    else
  {

    
  } 


// set the number of rows displayed on this page

  if (($rsSent_numRows<0 || $rsSent_numRows>$rsSent_total))
  {

    $rsSent_numRows=$rsSent_total;
  } 


// set the first and last displayed record

  $rsSent_first=1;
  $rsSent_last=$rsSent_first+$rsSent_numRows-1;

  if (($rsSent_first>$rsSent_total))
  {

    $rsSent_first=$rsSent_total;
  } 

  if (($rsSent_last>$rsSent_total))
  {

    $rsSent_last=$rsSent_total;
  } 


} 

?>

<? 
// *** Move To Record and Go To Record: declare variables




$MM_rs=$MM_rsCount=$rsSent_total;
$MM_size=$rsSent_numRows;
$MM_uniqueCol="";
$MM_paramName="";
$MM_offset=0;
$MM_atTotal=false;
$MM_paramIsDefined=false;
if (($MM_paramName!=""))
{

  $MM_paramIsDefined=($_GET[$MM_paramName]<>"");
} 

?>
<? 
// *** Move To Record: handle 'index' or 'offset' parameter
if ((!$MM_paramIsDefined && $MM_rsCount!=0))
{


// use index parameter if defined, otherwise use offset parameter

  $MM_param=$_GET["index"];
  if (($MM_param==""))
  {

    $MM_param=$_GET["offset"];
  } 

  if (($MM_param!=""))
  {

    $MM_offset=intval($MM_param);
  } 


// if we have a record count, check if we are past the end of the recordset

  if (($MM_rsCount!=-1))
  {

    if (($MM_offset>=$MM_rsCount || $MM_offset==-1))
    {
// past end or move last

      if ((($MM_rsCount$Mod$MM_size)>0))
      {
// last page not a full repeat region

        $MM_offset=$MM_rsCount-($MM_rsCount%$MM_size);
      }
        else
      {

        $MM_offset=$MM_rsCount-$MM_size;
      } 

    } 

  } 


// move the cursor to the selected record

  $MM_index=0;
  while(((!$MM_rs->EOF) && ($MM_index<$MM_offset || $MM_offset==-1)))
  {

$MM_rs->MoveNext;
    $MM_index=$MM_index+1;
  } 
  if (($MM_rs->EOF))
  {

    $MM_offset=$MM_index; // set MM_offset to the last possible record
;
  } 


} 

?>
<? 
// *** Move To Record: if we dont know the record count, check the display range


if (($MM_rsCount==-1))
{


// walk to the end of the display range for this page

  $MM_index=$MM_offset;
  while((!$MM_rs->EOF && ($MM_size<0 || $MM_index<$MM_offset+$MM_size)))
  {

$MM_rs->MoveNext;
    $MM_index=$MM_index+1;
  } 

// if we walked off the end of the recordset, set MM_rsCount and MM_size

  if (($MM_rs->EOF))
  {

    $MM_rsCount=$MM_index;
    if (($MM_size<0 || $MM_size>$MM_rsCount))
    {

      $MM_size=$MM_rsCount;
    } 

  } 


// if we walked off the end, set the offset based on page size

  if (($MM_rs->EOF && !$MM_paramIsDefined))
  {

    if (($MM_offset>$MM_rsCount-$MM_size || $MM_offset==-1))
    {

      if ((($MM_rsCount$Mod$MM_size)>0))
      {

        $MM_offset=$MM_rsCount-($MM_rsCount%$MM_size);
      }
        else
      {

        $MM_offset=$MM_rsCount-$MM_size;
      } 

    } 

  } 


// reset the cursor to the beginning

  if (($MM_rs->CursorType>0))
  {

$MM_rs->MoveFirst;
  }
    else
  {

$MM_rs->Requery;
  } 


// move the cursor to the selected record

  $MM_index=0;
  while((!$MM_rs->EOF && $MM_index<$MM_offset))
  {

$MM_rs->MoveNext;
    $MM_index=$MM_index+1;
  } 
} 

?>
<? 
// *** Move To Record: update recordset stats


// set the first and last displayed record

$rsSent_first=$MM_offset+1;
$rsSent_last=$MM_offset+$MM_size;

if (($MM_rsCount!=-1))
{

  if (($rsSent_first>$MM_rsCount))
  {

    $rsSent_first=$MM_rsCount;
  } 

  if (($rsSent_last>$MM_rsCount))
  {

    $rsSent_last=$MM_rsCount;
  } 

} 


// set the boolean used by hide region to check if we are on the last record

$MM_atTotal=($MM_rsCount<>-1&$MM_offset+$MM_size>=$MM_rsCount);
?>
<? 
// *** Go To Record and Move To Record: create strings for maintaining URL and Form parameters




// create the list of parameters which should not be maintained

$MM_removeList="&index=";
if (($MM_paramName!=""))
{

  $MM_removeList=$MM_removeList."&".$MM_paramName."=";
} 


$MM_keepURL="";
$MM_keepForm="";
$MM_keepBoth="";
$MM_keepNone="";

// add the URL parameters to the MM_keepURL string

foreach ($_GET as $MM_item)
{

  $MM_nextItem="&".$MM_item."=";
  if (((strpos(1,$MM_removeList,$MM_nextItem,1) ? strpos(1,$MM_removeList,$MM_nextItem,1)+1 : 0)==0))
  {

    $MM_keepURL=$MM_keepURL.$MM_nextItem.rawurlencode($_GET[$MM_item]);
  } 

} 
// add the Form variables to the MM_keepForm string

foreach ($_POST as $MM_item)
{

  $MM_nextItem="&".$MM_item."=";
  if (((strpos(1,$MM_removeList,$MM_nextItem,1) ? strpos(1,$MM_removeList,$MM_nextItem,1)+1 : 0)==0))
  {

    $MM_keepForm=$MM_keepForm.$MM_nextItem.rawurlencode($_POST[$MM_item]);
  } 

} 
// create the Form + URL string and remove the intial '&' from each of the strings$MM_keepBoth=$MM_keepURL.$MM_keepForm;
if (($MM_keepBoth!=""))
{

  $MM_keepBoth=substr($MM_keepBoth,strlen($MM_keepBoth)-(strlen($MM_keepBoth)-1));
} 

if (($MM_keepURL!=""))
{

  $MM_keepURL=substr($MM_keepURL,strlen($MM_keepURL)-(strlen($MM_keepURL)-1));
} 

if (($MM_keepForm!=""))
{

  $MM_keepForm=substr($MM_keepForm,strlen($MM_keepForm)-(strlen($MM_keepForm)-1));
} 


// a utility function used for adding additional parameters to these strings

function MM_joinChar($firstItem)
{
  extract($GLOBALS);


  if (($firstItem!=""))
  {

    $MM_joinChar="&";
  }
    else
  {

    $MM_joinChar="";
  } 

  return $function_ret;
} 
?>
<? 
// *** Move To Record: set the strings for the first, last, next, and previous links




$MM_keepMove=$MM_keepBoth;
$MM_moveParam="index";

// if the page has a repeated region, remove 'offset' from the maintained parametersif (($MM_size>1))
{

  $MM_moveParam="offset";
  if (($MM_keepMove!=""))
  {

    $MM_paramList=$Split[$MM_keepMove]["&"];
    $MM_keepMove="";
    for ($MM_paramIndex=0; $MM_paramIndex<=count($MM_paramList); $MM_paramIndex=$MM_paramIndex+1)
    {

      $MM_nextParam=substr($MM_paramList[$MM_paramIndex],0,(strpos($MM_paramList[$MM_paramIndex],"=") ? strpos($MM_paramList[$MM_paramIndex],"=")+1 : 0)-1);
      if ((strcmp($MM_nextParam,$MM_moveParam,1)!=0))
      {

        $MM_keepMove=$MM_keepMove."&".$MM_paramList[$MM_paramIndex];
      } 


    } 

    if (($MM_keepMove!=""))
    {

      $MM_keepMove=substr($MM_keepMove,strlen($MM_keepMove)-(strlen($MM_keepMove)-1));
    } 

  } 

} 


// set the strings for the move to links

if (($MM_keepMove!=""))
{

  $MM_keepMove=$MM_keepMove."&";
} 


$MM_urlStr=$_SERVER["URL"]."?".$MM_keepMove.$MM_moveParam."=";

$MM_moveFirst=$MM_urlStr."0";
$MM_moveLast=$MM_urlStr."-1";
$MM_moveNext=$MM_urlStr.$MM_offset+$MM_size;
if (($MM_offset-$MM_size<0))
{

  $MM_movePrev=$MM_urlStr."0";
}
  else
{

  $MM_movePrev=$MM_urlStr.$MM_offset-$MM_size;
} 

?>

<? 
$HLooper1__numRows=-2;
$HLooper1__index=0;
$rsCat_numRows=$rsCat_numRows+$HLooper1__numRows;
?>



<? 
$lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$rsGuestbookHead["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
?>








<!--#include file="calculations.php" --> 

<? 
if (!($rsSent_BOF==1) && !($rsSent==0))
{

//Loop through the recordset

  $counters=0;
  while((!($rsSent==0)))
  {

    if (($Item["Aid_Cancled"]$Value)==1 && ($Item["Aid_Declaration_Date"]$Value)>=time()()-9)
    {

      $counters=$counters+1;
    } 

    $rsSent=mysql_fetch_array($rsSent_query);
    $rsSent_BOF=0;

  } 
  
} 

?>
<? if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
{
?>
<font color="#FF0000">Please do not attempt to cheat.</font>
<? }
  else
{
?>   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="221" align="left" valign="top">

 <?   if (!$rsUser->EOF || !$rsUser->BOF)
  {
?>




<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" align="left" valign="middle">
<p align="center"><b>Foreign Aid Information For <?     echo (.$Item["Nation_Name"].$Value); ?></b>
<p>
<i>You may only have <?     echo $aidslots; ?> active/pending foreign aid offers every 10 days.</i>

<i>Once an aid offer is accepted it cannot be canceled or deleted. </i>

</p>



<?     if (!($rsSent==0) || !($rsSent_BOF==1))
    {
?>
<table width="90%" border="0">
<tr> 
<td width="62%">&nbsp;</td>
<td width="38%">&nbsp; <table border="0" width="100%" align="center">
<tr> 
<td width="23%" align="center"> <?       if ($MM_offset!=0)
      {
?>
<a href="<?         echo $MM_moveFirst; ?>"><img src="assets/First.gif" border=0></a> 
<?       } 
// end MM_offset <> 0  

//31%" align="center"> <% If MM_offset <> 0 Then ?>    } 

//<%=MM_movePrev%>"><img src="assets/Previous.gif" border=0></a> // end MM_offset <> 0  ?> 
</td>
<td width="23%" align="center"> <?     if (!$MM_atTotal)
    {
?>
<a href="<?       echo $MM_moveNext; ?>"><img src="assets/Next.gif" border=0></a> 
<?     } 
// end Not MM_atTotal  

//23%" align="center"> <% If Not MM_atTotal Then ?>  } 

//<%=MM_moveLast%>"><img src="assets/Last.gif" border=0></a> // end Not MM_atTotal  ?> 
</td>
</tr>
</table></td>
</tr>
</table>
<? } 
// end Not rsSent.EOF Or NOT rsSent.BOF  


//left" valign="top"> <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">//100%" height="150"><form action="messageDeleting2.asp" method="post" name="outbox" id="outbox">($rsSent==0)$Or$Not($rsSent_BOF==1)$Then; ?>
<div align="center">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
<tr align="center" valign="middle"> 
<td bgcolor="#000080" width="16%"><strong><font size="1" color="#FFFFFF">Aid 
Date</font></strong></td>
<td bgcolor="#000080" width="16%"><strong><font size="1" color="#FFFFFF">Offered By</font></strong></td>
<td bgcolor="#000080" width="16%"><strong><font size="1" color="#FFFFFF">Offered To</font></strong></td>
<td bgcolor="#000080" align="left" width="16%">
<p align="center"><b>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
Aid Offered</font></b></td>

<td bgcolor="#000080" width="16%"><b>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">Aid 
Reason</font></b></td>

<td bgcolor="#000080" width="16%">
<p>
<strong><font size="1" color="#FFFFFF">Aid </font></strong>
<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Status</b></font></td>

</tr>
<? 
while((($repeat8__numRows!=0) && (!($rsSent==0))))
{

  $tradecounter=$tradecounter+1;
?>
<? 
  $IPUSER2=.$Item["Aid_Issued_On_User"].$Value;
// $rsIP2 is of type "ADODB.Recordset"

  $rsIP2SQL="SELECT Last_IP,IPADDRESS,U_PASSWORD_Secure FROM USers Where U_ID = '"+$IPUSER2+"' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsIP2SQL);
  $rsIP2_numRows=0;
?>
<? 
  $IPUSER1=.$Item["Aid_Issued_By_User"].$Value;
// $rsIP1 is of type "ADODB.Recordset"

  $rsIP1SQL="SELECT Last_IP,IPADDRESS,U_PASSWORD_Secure FROM USers Where U_ID = '"+$IPUSER1+"' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsIP1SQL);
  $rsIP1_numRows=0;
?>
<?   if ((strtoupper($rsIP1["U_PASSWORD_Secure"])==strtoupper($rsIP2["U_PASSWORD_Secure"]) || ($rsIP1["LAST_IP"]=$rsIP2["LAST_IP"]))&$rsSent["Aid_Cancled"]<>2$then;
$rsSent["Aid_Cancled"]=3;
)
  {
  } ?>


<tr align="center" valign="middle"bgcolor=
<? 
  $RecordCounter=$RecordCounter+1;
  if ($RecordCounter$Mod2==1)
  {

    print "#e8e8e8";
  }
    else
  {

    print "#ffffff";
  } 

?> > 


<?   if (($Item["Nation_ID"]$Value)==($Item["Receiving_Nation_ID"]$Value) || ($Item["Nation_ID"]$Value)==($Item["Declaring_Nation_ID"]$Value))
  {
?>	
<?     $warcounter=$warcounter+1;
?>	
<td valign="top" width="16%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?     echo (.$Item["Aid_Declaration_Date"].$Value); ?>

<?     if ($Item["Aid_Declaration_Date"]$Value<=time()()-9)
    {
?>
<br> <b><font color="#FF0000">* Expired *
</font></b>
<?     } ?>


 
</td>
<td valign="top" width="16%">
<a href="nation_drill_display.asp?Nation_ID=<?     echo (.$Item["Declaring_Nation_ID"].$Value); ?>">
<p align="left"><?     echo (.$Item["Declaring_Nation"].$Value); ?></a> (<?     echo .$Item["Aid_Issued_By_User"].$Value; ?>)</td>

<td valign="top" width="16%">
<a href="nation_drill_display.asp?Nation_ID=<?     echo (.$Item["Receiving_Nation_ID"].$Value); ?>">
<p align="left"><?     echo (.$Item["Receiving_Nation"].$Value); ?></a> (<?     echo .$Item["Aid_Issued_On_User"].$Value; ?>)</td>
<td valign="top" align="left" width="16%"> 
<div class = "links"> 
<font face="Verdana, Arial, Helvetica, sans-serif" size="1">

$<?     echo $FormatNumber[$rsSent["Resource_Sent_1"]][0]; ?><br>
<?     echo (.$Item["Resource_Sent_2"].$Value); ?> Tech<br>
<?     echo (.$Item["Resource_Sent_3"].$Value); ?> Soldiers

</font></div></td>

<td valign="top" width="16%"> 
<div class = "links"> 
<font face="Verdana, Arial, Helvetica, sans-serif" size="1">

<?     echo (.$Item["Aid_Reason"].$Value); ?></font></div></td>




<td valign="top" width="16%"> 
<p>
	

 
<?     if (($Item["Aid_Cancled"]$Value)==1 && $Item["Aid_Declaration_Date"]$Value>time()()-9)
    {
?>
<font color="#008000">Approved</font>
<?     } ?>
	
	
<?     if (($Item["Aid_Cancled"]$Value)==3)
    {
?>
<font color="#FF9933">Canceled for Cheating</font><br>
<?     } ?>
	
	
<?     if (($Item["Aid_Cancled"]$Value)==2 && $Item["Aid_Declaration_Date"]$Value>time()()-9)
    {
?>
<font color="#FF9933">Canceled</font><br>
<a href="aid_delete_code.asp?ID=<?       echo $rsSent["ID"]; ?>&Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to delete this foreign aid offer?');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?     } ?>
	

<?     if ($counters<$aidslots && ($Item["Declaring_Nation"]$Value)><$rsGuestbook["Nation_Name"] && ($Item["Aid_Cancled"]$Value)==0 && $Item["Aid_Declaration_Date"]$Value>time()()-9)
    {
?>
<a href="Aid_approve.asp?id=<?       echo (.$Item["ID"].$Value); ?>&declaring=<?       echo (.$Item["Declaring_Nation_ID"].$Value); ?>&receiving=<?       echo (.$Item["Receiving_Nation_ID"].$Value); ?>" onclick="return confirm('Are you sure you want to approve this foreign aid offer?');">			
<font color="#FF0000">Needs Approval</font></a> - <a href="Aid_cancel.asp?ID=<?       echo $rsSent["ID"]; ?>&Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to cancel this foreign aid offer?');">Cancel</a>
<?     } ?>
	
	
<?     if ($counters>=$aidslots && ($Item["Declaring_Nation"]$Value)><$rsGuestbook["Nation_Name"] && ($Item["Aid_Cancled"]$Value)==0)
    {
?>
Limit Reached - <a href="Aid_cancel.asp?ID=<?       echo $rsSent["ID"]; ?>&Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to cancel this foreign aid offer?');">Cancel</a>
<?     } ?>	
	
	
<?     if (($Item["Declaring_Nation"]$Value)==$rsGuestbook["Nation_Name"] && ($Item["Aid_Cancled"]$Value)==0 && $Item["Aid_Declaration_Date"]$Value>time()()-9)
    {
?>
Awaiting Approval - <a href="Aid_cancel.asp?ID=<?       echo $rsSent["ID"]; ?>&Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to cancel this foreign aid offer?');">Cancel</a>
<?     } ?>
		
<?     if ($Item["Aid_Declaration_Date"]$Value<=time()()-9)
    {
?>
<br>
Expired <a href="aid_delete_code.asp?ID=<?       echo $rsSent["ID"]; ?>&Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to delete this expired foreign aid agreement?');">
<img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<?     } ?>


<?     if ($rsIP1["Last_IP"]=$rsIP2["Last_IP"]|strtoupper($rsIP1["U_PASSWORD_Secure"])=strtoupper($rsIP2["U_PASSWORD_Secure"])$then; )
    {


      $td$colspan=6$bgcolor="#FFFF00">;
//center">///images/warning2.gif" title="The nations involved in this foreign aid agreement were potentially created by the same player who could be trying to abuse the foreign aid system.">&nbsp;      $WARNING</$b>.$nbsp;<$img$src="/images/warning2.gif"$title="The nations involved in this foreign aid agreement were potentially created by the same player who could be trying to abuse the foreign aid system."></$p>;
//left"><b>IMPORTANT: The foreign aid offer above has been marked as a       $potential$cheat;
      $rsIP1["U_PASSWORD_Secure"]      echo strtoupper($rsIP2["U_PASSWORD_Secure"])|($rsIP1["LAST_IP"]=$rsIP2["LAST_IP"]))&$rsSent["Aid_Cancled"]=3$then; ; ; ?>
			and has been canceled automatically by the system.
			<?     }
      else
    {
?>
			. If you accept this aid offer there is a VERY good chance 
			your nation will be DELETED and your user ID banned, even if you are certain that you are not 
			actually cheating. Please cancel the foreign aid offer above and delete it to 
			prevent your nation from appearing as a cheating nation! Once the aid offer 
			is accepted you will not be able to cancel or delete it! 
			<?     } ?>
	<?   } ?>
</td>
</tr>



<? } if ()
{






  echo $repeat8__index+1;
  $repeat8__numRows=$repeat8__numRows-1;
  $rsSent=mysql_fetch_array($rsSent_query);
  $rsSent_BOF=0;

} 

?>
</table>
</div>
<? ' end Not rsSent.EOF Or NOT rsSent.BOF %><p align="center"> 

<? 
