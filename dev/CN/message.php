<?
  session_start();
  session_register("MM_UserName_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?>

<!--#include file="connection.php" -->
<? 
// *** Logout the current user.

$MM_Logout=$_SERVER["URL"]."?MM_Logoutnow=1";
if ((${"MM_Logoutnow"}=="1"))
{


  $MM_logoutRedirectPage="default.asp";
// redirect with URL parameters (remove the "MM_Logoutnow" query param).

  if (($MM_logoutRedirectPage==""))
  {
    $MM_logoutRedirectPage=$_SERVER["URL"];
  } 
  if (((strpos(1,$UC_redirectPage,"?",$vbTextCompare) ? strpos(1,$UC_redirectPage,"?",$vbTextCompare)+1 : 0)==0 && $_GET!=""))
  {

    $MM_newQS="?";
foreach ($_GET as $Item)
    {

      if (($Item!="MM_Logoutnow"))
      {

        if ((strlen($MM_newQS)>1))
        {
          $MM_newQS=$MM_newQS."&";
        } 
        $MM_newQS=$MM_newQS.$Item."=".rawurlencode($_GET[$Item]);
      } 

    }     if ((strlen($MM_newQS)>1))
    {
      $MM_logoutRedirectPage=$MM_logoutRedirectPage.$MM_newQS;
    } 
  } 

  header("Location: ".$MM_logoutRedirectPage);
} 

?>

<? 

if (($_GET["ID"]!=""))
{
  $cmClick__varAd=$_GET["id"];
} 

?>

<? $rsSearch11__MMColParam="1";
if (($_GET["ID"]!=""))
{

  $rsSearch11__MMColParam=$_GET["ID"];
} 

?>
<? 
// $rsSearch11 is of type "ADODB.Recordset"

echo $MM_conn_STRING_Messages;
echo "SELECT *  FROM EMESSAGES  WHERE ID = "+str_replace("'","''",$rsSearch11__MMColParam)+"";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsSearch11_numRows=0;
?>

<? 
if (trim(strtoupper($MM_UserName_session))!=trim(strtoupper($rsSearch11["MESS_FROM"])))
{

// $cmClick is of type "ADODB.Command"

  $cmClick_ActiveConnection=$MM_conn_STRING_Messages;
    $cmClick_CommandText="UPDATE EMESSAGES SET MESS_READ = 1  WHERE ID = "+str_replace("'","''",$cmClick__varAd)+" ";
    $cmClick_CommandType=1;
    $cmClick_CommandTimeout=0;
    $cmClick_Prepared=true;
    $cmClick_Execute=);
  } 

?>	


<? 
//  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables



// set the record count

$rsSearch11_total=mysql_num_rows($rsSearch11_query);

// set the number of rows displayed on this page

if (($rsSearch11_numRows<0))
{

  $rsSearch11_numRows=$rsSearch11_total;
}
  else
if (($rsSearch11_numRows==0))
{

  $rsSearch11_numRows=1;
} 


// set the first and last displayed record

$rsSearch11_first=1;
$rsSearch11_last=$rsSearch11_first+$rsSearch11_numRows-1;

// if we have the correct record count, check the other stats

if (($rsSearch11_total!=-1))
{

  if (($rsSearch11_first>$rsSearch11_total))
  {

    $rsSearch11_first=$rsSearch11_total;
  } 

  if (($rsSearch11_last>$rsSearch11_total))
  {

    $rsSearch11_last=$rsSearch11_total;
  } 

  if (($rsSearch11_numRows>$rsSearch11_total))
  {

    $rsSearch11_numRows=$rsSearch11_total;
  } 

} 

?>
<? 
// *** Recordset Stats: if we don't know the record count, manually count them
if (($rsSearch11_total==-1))
{


// count the total records by iterating through the recordset

  $rsSearch11_total=0;
  while((!($rsSearch11==0)))
  {

    $rsSearch11_total=$rsSearch11_total+1;
    $rsSearch11=mysql_fetch_array($rsSearch11_query);
    $rsSearch11_BOF=0;

  } 

// reset the cursor to the beginning

  if ((>0))
  {

    
  }
    else
  {

    
  } 


// set the number of rows displayed on this page

  if (($rsSearch11_numRows<0 || $rsSearch11_numRows>$rsSearch11_total))
  {

    $rsSearch11_numRows=$rsSearch11_total;
  } 


// set the first and last displayed record

  $rsSearch11_first=1;
  $rsSearch11_last=$rsSearch11_first+$rsSearch11_numRows-1;

  if (($rsSearch11_first>$rsSearch11_total))
  {

    $rsSearch11_first=$rsSearch11_total;
  } 

  if (($rsSearch11_last>$rsSearch11_total))
  {

    $rsSearch11_last=$rsSearch11_total;
  } 


} 

?>

<? 
// *** Move To Record and Go To Record: declare variables




$MM_rs=$MM_rsCount=$rsSearch11_total;
$MM_size=$rsSearch11_numRows;
$MM_uniqueCol="ID";
$MM_paramName="id";
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

$rsSearch11_first=$MM_offset+1;
$rsSearch11_last=$MM_offset+$MM_size;

if (($MM_rsCount!=-1))
{

  if (($rsSearch11_first>$MM_rsCount))
  {

    $rsSearch11_first=$MM_rsCount;
  } 

  if (($rsSearch11_last>$MM_rsCount))
  {

    $rsSearch11_last=$MM_rsCount;
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

<!--#include file="inc_header.php" -->


<? if (strtoupper($rsGuestbookHead->Fields.$Item["Poster"].$Value)><trim(strtoupper(.$Item["U_ID"].$Value)) && strtoupper($rsGuestbookHead->Fields.$Item["Poster"].$Value)><trim(strtoupper(.$Item["MESS_FROM"].$Value)))
{
?>
<font color="#FF0000">Sorry but that message does not belong to you.</font>
<? }
  else
{
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td width="90%" height="0" valign="top"><p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td align="left" valign="top"> <font face="Verdana, Arial, Helvetica, sans-serif" size="1">&nbsp;</font> 
<?   if (!($rsSearch11==0) || !($rsSearch11_BOF==1))
  {
?>
Records <?     echo ($rsSearch11_first); ?> to <?     echo ($rsSearch11_last); ?> of <?     echo ($rsSearch11_total); ?> 
<div align="center">
<table width="97%" border="0" cellspacing="0" cellpadding="3" bgcolor="#333333">
<tr align="center" valign="middle" bgcolor="#333333"> 
<td bgcolor="#000080"><b>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
Private Message</font></b></td>
</tr>
<tr align="center" valign="middle" bgcolor="#FFFFFF"> 
<td height="19" align="left"><p><strong>To:</strong>
<? 
// $rsMessageTo is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "SELECT Nation_ID FROM Nation WHERE Poster = '".$rsSearch11["U_ID"]."' ";
        echo 0;
        echo 2;
        echo 1;
    $rs=mysql_query();
    if (!($rsMessageTo_BOF==1) && !($rsMessageTo==0))
    {

?>
<a href="nation_drill_display.asp?Nation_ID=<?       echo $rsMessageTo["Nation_ID"]; ?>"><?       echo (.$Item["U_ID"].$Value); ?></a> &nbsp;&nbsp;
<?     }
      else
    {
?>
<?       echo (.$Item["U_ID"].$Value); ?> &nbsp;&nbsp;
<? 
    } 

    
    $rsMessageTo=null;

?>

<strong>
From:</strong>
<? 
// $rsMessageFrom is of type "ADODB.Recordset"

        echo $MM_conn_STRING;
        echo "SELECT Nation_ID FROM Nation WHERE Poster = '".$rsSearch11["MESS_FROM"]."' ";
        echo 0;
        echo 2;
        echo 1;
    $rs=mysql_query();
    if (!($rsMessageFrom_BOF==1) && !($rsMessageFrom==0))
    {

?>
<a href="nation_drill_display.asp?Nation_ID=<?       echo $rsMessageFrom["Nation_ID"]; ?>"><?       echo (.$Item["MESS_FROM"].$Value); ?></a> &nbsp;&nbsp;
<?     }
      else
    {
?>
<?       echo (.$Item["MESS_FROM"].$Value); ?> &nbsp;&nbsp;
<? 
    } 

    
    $rsMessageFrom=null;

?>



<?     echo (.$Item["MESS_DATE"].$Value); ?>&nbsp;<strong>Subject: </strong><?     echo htmlspecialchars(.$Item["SUBJECT"].$Value); ?><br>
</p>
<p><?     echo (.$Item["MESSAGE"].$Value); ?></p>
<br>
&nbsp;</td>
</tr>
<tr align="center" valign="middle" bgcolor="#FFFFFF"> 
<td height="26" align="left"><div align="center"> 
<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#000080">
<tr>
<?     if ($MM_UserName_session!=($Item["MESS_FROM"]$Value))
    {
?>
<td>
<p align="left">
<img border="0" src="assets/nuke_attacked.gif" width="20" height="19">
<a href="reportMessage.asp?ID=<?       echo .$Item["ID"].$Value; ?>">Report Message</a>
</td>
	<td align="right" width="67">
<a href="replyMessage.asp?<?       echo $MM_keepNone.MM_joinChar($MM_keepNone)."ID="..$Item["ID"].$Value; ?>"><img src="assets/reply.gif" width="22" height="19" border="0"></a>
<a href="replyMessage.asp?<?       echo $MM_keepNone.MM_joinChar($MM_keepNone)."ID="..$Item["ID"].$Value; ?>">Reply</a>
</td>



<td align="right" width="70"><a href="messageDeleting.asp?id=<?       echo (.$Item["ID"].$Value); ?>"><img src="assets/delete.jpg" width="17" height="17" border="0"></a>
<a href="messageDeleting.asp?id=<?       echo (.$Item["ID"].$Value); ?>">Delete</a>
<?     } ?>


</tr>
</table>
</div></td>
</tr>
</table>
</div>
<?   } 
// end Not rsSearch11.EOF Or NOT rsSearch11.BOF  //2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; //0" width="50%" align="center">//23%" align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif">   $Then; ?>
<a href="<?   echo $MM_moveFirst; ?>"><img src="assets/First.gif" border=0></a> 
<? } 
// end MM_offset <> 0  

//31%" align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> $Then; ?>
<a href="<? echo $MM_movePrev; ?>"><img src="assets/Previous.gif" border=0></a> 
<? ' end MM_offset <> 0 %>
</font></td>
<td width="23%" align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<? if ($If!$MM_atTotal)
{
?>
<a href="<?   echo $MM_moveNext; ?>"><img src="assets/Next.gif" border=0></a> 
<? } 
// end Not MM_atTotal  

//23%" align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> $MM_atTotal$Then; ?>
<a href="<? echo $MM_moveLast; ?>"><img src="assets/Last.gif" border=0></a> 
<? ' end Not MM_atTotal %>
</font></td>
</tr>
</table></td>
</tr>
</table>
<p>
<!--#include file="search_include.php" -->
</p></td>
<td align="right" valign="top"> <br>

</td>
</tr>
</table>
<p>&nbsp;</p><? if (;
}
)
{

  $#include$file="inc_footer.asp"-->;

  $Close[];
  $rsSearch11=null;

$objConn->Close();
  $objConn=null;

?>} 

