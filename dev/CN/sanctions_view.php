<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>
<!--#include file="connection.php" -->
<? //end if

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
$rsSanctions__MMColParam="0";
if (($MM_Username_session!=""))
{
  $rsSanctions__MMColParam=$MM_Username_session;
} ?>

<!--#include file="inc_header.php" -->
<!--#include file="election_code.php" -->
<? 
// $rsSanctions is of type "ADODB.Recordset"

$rsSanctionsSQL="SELECT * FROM Sanctions Where Sanction_Team = '".$rsGuestbookHead["Nation_Team"]."' ORDER BY Sanction_Date DESC";
echo 3;
echo 2;
echo 0;
$rs=mysql_query($rsSanctionsSQL);
?>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT COUNT(*) AS CADS FROM Sanctions Where Sanction_Team = '".$rsGuestbookHead["Nation_Team"]."'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();


$RecordCounter=0;

$repeat8__numRows=10;
$repeat8__index=0;
$rsSanctions_numRows=$rsSanctions_numRows+$repeat8__numRows;

//  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables



// set the record count

$rsSanctions_total=mysql_num_rows($rsSanctions_query);

// set the number of rows displayed on this page

if (($rsSanctions_numRows<0))
{

  $rsSanctions_numRows=$rsSanctions_total;
}
  else
if (($rsSanctions_numRows==0))
{

  $rsSanctions_numRows=1;
} 


// set the first and last displayed record

$rsSanctions_first=1;
$rsSanctions_last=$rsSanctions_first+$rsSanctions_numRows-1;

// if we have the correct record count, check the other stats

if (($rsSanctions_total!=-1))
{

  if (($rsSanctions_first>$rsSanctions_total))
  {

    $rsSanctions_first=$rsSanctions_total;
  } 

  if (($rsSanctions_last>$rsSanctions_total))
  {

    $rsSanctions_last=$rsSanctions_total;
  } 

  if (($rsSanctions_numRows>$rsSanctions_total))
  {

    $rsSanctions_numRows=$rsSanctions_total;
  } 

} 

?>
<? 
// *** Recordset Stats: if we don't know the record count, manually count them
if (($rsSanctions_total==-1))
{




  $rsSanctions_total=$FormatNumber[$rsAllUsers["CADS"]][0];

  if (($rsSanctions_numRows<0 || $rsSanctions_numRows>$rsSanctions_total))
  {

    $rsSanctions_numRows=$rsSanctions_total;
  } 


// set the first and last displayed record

  $rsSanctions_first=1;
  $rsSanctions_last=$rsSanctions_first+$rsSanctions_numRows-1;

  if (($rsSanctions_first>$rsSanctions_total))
  {

    $rsSanctions_first=$rsSanctions_total;
  } 

  if (($rsSanctions_last>$rsSanctions_total))
  {

    $rsSanctions_last=$rsSanctions_total;
  } 


} 

?>

<? 
// *** Move To Record and Go To Record: declare variables




$MM_rs=$MM_rsCount=$rsSanctions_total;
$MM_size=$rsSanctions_numRows;
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

$rsSanctions_first=$MM_offset+1;
$rsSanctions_last=$MM_offset+$MM_size;

if (($MM_rsCount!=-1))
{

  if (($rsSanctions_first>$MM_rsCount))
  {

    $rsSanctions_first=$MM_rsCount;
  } 

  if (($rsSanctions_last>$MM_rsCount))
  {

    $rsSanctions_last=$MM_rsCount;
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
$access=0;
while(!$rsSent10->BOF && !$rsSent10->EOF)
{

  if ($rsGuestbookHead["Nation_ID"]==$rsSent10["Nation_ID"])
  {
    $access=1;
  }
;
  } 
$rsSent10->MoveNext;
} 
?>   

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="90%" height="0" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="221" align="left" valign="top"> 
                       <? if (!$rsUser->EOF || !$rsUser->BOF)
{
?>
            <br>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="0" align="left" valign="middle">
                              <p align="center"><b>All Sanctions Placed By The <?   echo $rsGuestbookHead["Nation_Team"]; ?> Team</b>
                              <br>
		<img border="0" src="images/information.gif" width="17" height="16">
								<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=29560">Information About Sanctions</a>
                              
                              </p>
                              <?   if (!($rsSanctions==0) || !($rsSanctions_BOF==1))
  {
?>
                              <table width="90%" border="0">
                                <tr> 
                                  <td width="62%">
                                  
Serving <?     echo ($rsSanctions_first); ?> to <?     echo ($rsSanctions_last); ?> of 
                         
<?     echo $FormatNumber[$rsAllUsers["CADS"]][0]; ?> Sanctions
<? 
    
    $rsAllUsers=null;

?>
 </td>
                                  <td width="38%">&nbsp; <table border="0" width="100%" align="center">
                                      <tr> 
                                        <td width="23%" align="center"> <?     if ($MM_offset!=0)
    {
?>
                                          <a href="<?       echo $MM_moveFirst; ?>"><img src="assets/First.gif" border=0></a> 
                                          <?     } 
// end MM_offset <> 0  

//31%" align="center"> <% If MM_offset <> 0 Then ?>  } 

//<%=MM_movePrev%>"><img src="assets/Previous.gif" border=0></a> // end MM_offset <> 0  ?> 
                                        </td>
                                        <td width="23%" align="center"> <?   if (!$MM_atTotal)
  {
?>
                                          <a href="<?     echo $MM_moveNext; ?>"><img src="assets/Next.gif" border=0></a> 
                                          <?   } 
// end Not MM_atTotal  

//23%" align="center"> <% If Not MM_atTotal Then ?>} 

//<%=MM_moveLast%>"><img src="assets/Last.gif" border=0></a> // end Not MM_atTotal  ?> 
                                        </td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table>
                              <? ' end Not rsSanctions.EOF Or NOT rsSanctions.BOF %> 
                            </td>
                          </tr>
                          <tr> 
                            <td align="left" valign="top"> <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td width="100%" height="150">
                                      <? 
