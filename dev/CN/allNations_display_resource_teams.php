<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>
<!--#include file="connection.php" -->
<? 
// *** Restrict Access To Page: Grant or deny access to this page

$MM_authorizedUsers="";
$MM_authFailedURL="login.asp";
$MM_grantAccess=false;
if ($MM_Username_session!="")
{

  if ((false || $MM_UserAuthorization_session=="") || 
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
<!--#include file="inc_header.php" -->
<? 
$lngRecordNo=$_GET["Team"];


$tfm_orderby="Nation_Dated";
$tfm_order="DESC";
if (($_GET["tfm_orderby"]!=""))
{

  $tfm_orderby=$_GET["tfm_orderby"];
} 

if (($_GET["tfm_order"]!=""))
{

  $tfm_order=$_GET["tfm_order"];
} 


$sql_orderby=" ".$tfm_orderby." ".$tfm_order;
?>


<body bgcolor="white" text="black">


<p align="center">



<? 
$rsGuestbook__sql_orderby="Nation_Dated";
if (($sql_orderby!=""))
{

  $rsGuestbook__sql_orderby=$sql_orderby;
} 

?>

<? 
$rsGuestbook__MMColParam="0";
if (($MM_Username_session!=""))
{
  $rsGuestbook__MMColParam=$MM_Username_session;
} ?>





<? 
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Top 300 Last_Tax_Collection,Poster,Nation_Name,Nation_ID,Nation_Dated,Nation_Team,Resource1,Resource2 FROM Nation Where Nation_Team = '"+$lngRecordNo+"' "+$tfm_SQLstr+" ORDER BY "+str_replace("'","''",$rsGuestbook__sql_orderby)+"";
echo 3;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;
?>




<? 

$RecordCounter=0;
?>
<? 
$repeat8__numRows=10;
$repeat8__index=0;
$rsGuestbook_numRows=$rsGuestbook_numRows+$repeat8__numRows;
?>
<? 
//  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables



// set the record count

$rsGuestbook_total=mysql_num_rows($rsGuestbook_query);

// set the number of rows displayed on this page

if (($rsGuestbook_numRows<0))
{

  $rsGuestbook_numRows=$rsGuestbook_total;
}
  else
if (($rsGuestbook_numRows==0))
{

  $rsGuestbook_numRows=1;
} 


// set the first and last displayed record

$rsGuestbook_first=1;
$rsGuestbook_last=$rsGuestbook_first+$rsGuestbook_numRows-1;

// if we have the correct record count, check the other stats

if (($rsGuestbook_total!=-1))
{

  if (($rsGuestbook_first>$rsGuestbook_total))
  {

    $rsGuestbook_first=$rsGuestbook_total;
  } 

  if (($rsGuestbook_last>$rsGuestbook_total))
  {

    $rsGuestbook_last=$rsGuestbook_total;
  } 

  if (($rsGuestbook_numRows>$rsGuestbook_total))
  {

    $rsGuestbook_numRows=$rsGuestbook_total;
  } 

} 

?>
<? 
// *** Recordset Stats: if we don't know the record count, manually count them
if (($rsGuestbook_total==-1))
{


// count the total records by iterating through the recordset

  $rsGuestbook_total=100;
//While (Not rsGuestbook.EOF)

//  rsGuestbook_total = rsGuestbook_total + 1

//  rsGuestbook.MoveNext

//Wend


// reset the cursor to the beginning

//If (rsGuestbook.CursorType > 0) Then

//  rsGuestbook.MoveFirst

//Else

// rsGuestbook.Requery

//End If


// set the number of rows displayed on this page

  if (($rsGuestbook_numRows<0 || $rsGuestbook_numRows>$rsGuestbook_total))
  {

    $rsGuestbook_numRows=$rsGuestbook_total;
  } 


// set the first and last displayed record

  $rsGuestbook_first=1;
  $rsGuestbook_last=$rsGuestbook_first+$rsGuestbook_numRows-1;

  if (($rsGuestbook_first>$rsGuestbook_total))
  {

    $rsGuestbook_first=$rsGuestbook_total;
  } 

  if (($rsGuestbook_last>$rsGuestbook_total))
  {

    $rsGuestbook_last=$rsGuestbook_total;
  } 


} 

?>

<? 
// *** Move To Record and Go To Record: declare variables




$MM_rs=$MM_rsCount=$rsGuestbook_total;
$MM_size=$rsGuestbook_numRows;
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

$rsGuestbook_first=$MM_offset+1;
$rsGuestbook_last=$MM_offset+$MM_size;

if (($MM_rsCount!=-1))
{

  if (($rsGuestbook_first>$MM_rsCount))
  {

    $rsGuestbook_first=$MM_rsCount;
  } 

  if (($rsGuestbook_last>$MM_rsCount))
  {

    $rsGuestbook_last=$MM_rsCount;
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
//sort column headers for rsProducts

$tfm_saveParams="";
$tfm_keepParams="";
if ($tfm_order=="ASC")
{

  $tfm_order="DESC";
}
  else
{

  $tfm_order="ASC";
} 


if ($tfm_saveParams!="")
{

  $tfm_params=$Split[$tfm_saveParams][","];
  for ($i=0; $i<=count($tfm_params); $i=$i+1)
  {

    if (${$tfm_params[$i]}!="")
    {

      $tfm_keepParams=$tfm_keepParams.strtolower($tfm_params[$i])."=".rawurlencode(${$tfm_params[$i]})."&";
    } 


  } 

} 

$tfm_orderbyURL=$_SERVER["URL"]."?"."Team=".$lngRecordNo."&".$tfm_keepParams."tfm_order=".$tfm_order."&tfm_orderby=";
?>



                             <? if (!($rsGuestbook==0) || !($rsGuestbook_BOF==1))
{
?>
 <b>All Nations Resources By 
<?   if ($lngRecordNo=="None")
  {
?>
No<?   }
    else
  {
?><?     echo $lngRecordNo; ?>
<?   } ?> Team</b></p></b>
                                                            <p align="center">
<img border="0" src="images/magnify.gif" width="16" height="16"> 
View By Team:
<a href="allNations_display_resource_teams.php?Team=Aqua">Aqua</a>| 
<a href="allNations_display_resource_teams.php?Team=Black">Black</a> |
<a href="allNations_display_resource_teams.php?Team=Blue">Blue</a>| 
<a href="allNations_display_resource_teams.php?Team=Brown">Brown</a> |
<a href="allNations_display_resource_teams.php?Team=Green">Green</a> |  
<a href="allNations_display_resource_teams.php?Team=Maroon">Maroon</a>
<br> 
<a href="allNations_display_resource_teams.php?Team=Orange">Orange</a> |
<a href="allNations_display_resource_teams.php?Team=Pink">Pink</a> |
<a href="allNations_display_resource_teams.php?Team=Purple">Purple</a> | 
<a href="allNations_display_resource_teams.php?Team=Red">Red</a> | 
<a href="allNations_display_resource_teams.php?Team=Yellow">Yellow</a> |
<a href="allNations_display_resource_teams.php?Team=White">White</a> |
<a href="allNations_display_resource_teams.php?Team=None">No Team</a>
</p>
                              <table width="100%" border="0">
                                <tr> 
                                  <td width="62%">Serving <?   echo ($rsGuestbook_first); ?> to <?   echo ($rsGuestbook_last); ?> of 
                                  
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT COUNT(Nation_ID) AS CADS FROM Nation Where Nation_Team = '"+$lngRecordNo+"'";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAllUsers_numRows=0;
  $nationsbefore=$rsAllUsers["CADS"];
  
  $rsAllUsers=null;

?>
<?   echo $FormatNumber[$rsAllUsers["CADS"]][0]; ?>&nbsp;<?   if ($lngRecordNo=="None")
  {
?>No
<?   }
    else
  {
?><?     echo $lngRecordNo; ?>
<?   } ?>
Team Nations
<? 
$rsAllUsers->Close;
  $rsAllUsers=null;

?>
</td>
                                  <td width="38%"><table border="0" width="100%" align="center">
                                      <tr> 
                                        <td width="23%" align="center"> <?   if ($MM_offset!=0)
  {
?>
                                          <a href="<?     echo $MM_moveFirst; ?>">
										<img src="assets/First.gif" border=0 alt="First"></a> 
                                          <?   } 
// end MM_offset <> 0  

//31%" align="center"> <% If MM_offset <> 0 Then ?>} 

//<%=MM_movePrev%>">//assets/Previous.gif" border=0 alt="Previous"></a> // end MM_offset <> 0  ?> 
                                        </td>
                                        <td width="23%" align="center"> <? if (!$MM_atTotal)
{
?>
                                          <a href="<?   echo $MM_moveNext; ?>">
										<img src="assets/Next.gif" border=0 alt="Next"></a> 
                                          <? } 
// end Not MM_atTotal  

//23%" align="center"> <% If Not MM_atTotal Then ?>
                                          <a href="<? 
