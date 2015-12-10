<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
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

echo $MM_conn_STRING_Trade;
echo "SELECT *  FROM Trade WHERE Declaring_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."' OR Receiving_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."' ORDER BY Trade_Declaration_Date DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
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
$rsGuestbook_numRows=0;
?>


<!--#include file="calculations.php" --> 
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT * FROM Nation WHERE Nation_ID = '".$rsGuestbookHead["Nation_ID"]."'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>

<? if (!($rsSent_BOF==1) && !($rsSent==0))
{
?>
<? 
  
//Loop through the recordset

  $counters=0;
  while((!($rsSent==0)))
  {

    if (($Item["Trade_Cancled"]$Value)==0 || ($Item["Trade_Cancled"]$Value)==1)
    {

      $counters=$counters+1;
//response.write ("-<br>")  

    } 

    $rsSent=mysql_fetch_array($rsSent_query);
    $rsSent_BOF=0;

  } 
  
?>
<? } ?>

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
<p align="center"><b>Trade Summary For <?     echo (.$Item["Nation_Name"].$Value); ?><p align="center">
You have 
<?     if ($counters>$tradeslots)
    {
?>
0
<?     }
      else
    {
?>
<?       echo $tradeslots-$counters; ?>
<?     } ?>
out of <?     echo $tradeslots; ?> Trade Slots Available

</b>
 <p>
 <i><img border="0" src="assets/asterisk_red.gif" width="15" height="12">Reminder: 
	Both active and pending trades count against your open trade slots. If your 
	trade slots are full try canceling your inactive trade agreements until
 you have <?     echo $tradeslots; ?> or less active and pending trade agreements.</i>

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
<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#000080">
<tr align="center" valign="middle"> 
<td bgcolor="#000080"><strong>
<font size="1" color="#FFFFFF">Trade 
Offered By</font></strong></td>
<td bgcolor="#000080"><strong>
<font size="1" color="#FFFFFF">Trade 
Offered To</font></strong></td>
<td bgcolor="#000080"><b>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
My Resources</font></b></td>
<td bgcolor="#000080">&nbsp;</td>
<td bgcolor="#000080"><b>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
Their Resources</font></b></td>

<td bgcolor="#000080"><b>
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
Reason For Trade</font></b></td>

<td bgcolor="#000080" width="143">
<p align="left">
<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Trade Status</b></font></td>

<td bgcolor="#000080" width="143">
<p align="left">
<font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Delete Trade</b></font></td>

</tr>
<? 
while((($repeat8__numRows!=0) && (!($rsSent==0))))
{

  $tradecounter=$tradecounter+1;
?>
<? 
  $IPUSER2=.$Item["Trade_Issued_On_User"].$Value;
// $rsIP2 is of type "ADODB.Recordset"

  $rsIP2SQL="SELECT Last_IP,IPADDRESS,U_PASSWORD_Secure FROM USers Where U_ID = '"+$IPUSER2+"' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsIP2SQL);
  $rsIP2_numRows=0;
?>
<? 
  $IPUSER1=.$Item["Trade_Issued_By_User"].$Value;
// $rsIP1 is of type "ADODB.Recordset"

  $rsIP1SQL="SELECT Last_IP,IPADDRESS,U_PASSWORD_Secure FROM USers Where U_ID = '"+$IPUSER1+"' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsIP1SQL);
  $rsIP1_numRows=0;
?>

<? 
  if ((strtoupper($rsIP1["U_PASSWORD_Secure"])==strtoupper($rsIP2["U_PASSWORD_Secure"]) || ($rsIP1["LAST_IP"]=$rsIP2["LAST_IP"]))&$rsSent["Trade_Cancled"]<>2$then;
$rsSent["Trade_Cancled"]=2;
)
  {
  } 

?>



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
<td valign="top">


<a href="nation_drill_display.asp?Nation_ID=<?     echo (.$Item["Declaring_Nation_ID"].$Value); ?>">
<p align="left"><?     echo (.$Item["Declaring_Nation"].$Value); ?></a> (<?     echo .$Item["Trade_Issued_By_User"].$Value; ?>)<br>
Date: <?     echo (.$Item["Trade_Declaration_Date"].$Value); ?>
</td>

<td valign="top">
<a href="nation_drill_display.asp?Nation_ID=<?     echo (.$Item["Receiving_Nation_ID"].$Value); ?>">
<p align="left"><?     echo (.$Item["Receiving_Nation"].$Value); ?></a> (<?     echo .$Item["Trade_Issued_On_User"].$Value; ?>)</td>
<td valign="top"> 
<div class = "links"> 
<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
<? 
    if ($rsGuestbook0["Resource1"]="Aluminum"|$rsGuestbook0["Resource2"]="Aluminum"$then;
$Response->Write("<img src='images/resources/Aluminum.GIF' title='Aluminum'>");
;
  }
)
    {
      if ($rsGuestbook0["Resource1"]="Cattle"|$rsGuestbook0["Resource2"]="Cattle"$then;
$Response->Write("<img src='images/resources/cattle.GIF' title='Cattle'>");
;
    }
)
      {
        if ($rsGuestbook0["Resource1"]="Coal"|$rsGuestbook0["Resource2"]="Coal"$then;
$Response->Write("<img src='images/resources/Coal.GIF' title='Coal'>");
;
      }
)
        {
          if ($rsGuestbook0["Resource1"]="Fish"|$rsGuestbook0["Resource2"]="Fish"$then;
$Response->Write("<img src='images/resources/Fish.GIF' title='Fish'>");
;
        }
)
          {
            if ($rsGuestbook0["Resource1"]="Furs"|$rsGuestbook0["Resource2"]="Furs"$then;
$Response->Write("<img src='images/resources/Furs.GIF' title='Furs'>");
;
          }
)
            {
              if ($rsGuestbook0["Resource1"]="Gold"|$rsGuestbook0["Resource2"]="Gold"$then;
$Response->Write("<img src='images/resources/Gold.GIF' title='Gold'>");
;
            }
)
              {
                if ($rsGuestbook0["Resource1"]="Gems"|$rsGuestbook0["Resource2"]="Gems"$then;
$Response->Write("<img src='images/resources/Gems.GIF' title='Gems'>");
;
              }
)
                {
                  if ($rsGuestbook0["Resource1"]="Iron"|$rsGuestbook0["Resource2"]="Iron"$then;
$Response->Write("<img src='images/resources/Iron.GIF' title='Iron'>");
;
                }
)
                  {
                    if ($rsGuestbook0["Resource1"]="Lead"|$rsGuestbook0["Resource2"]="Lead"$then;
$Response->Write("<img src='images/resources/Lead.GIF' title='Lead'>");
;
                  }
)
                    {
                      if ($rsGuestbook0["Resource1"]="Lumber"|$rsGuestbook0["Resource2"]="Lumber"$then;
$Response->Write("<img src='images/resources/Lumber.GIF' title='Lumber'>");
;
                    }
)
                      {
                        if ($rsGuestbook0["Resource1"]="Marble"|$rsGuestbook0["Resource2"]="Marble"$then;
$Response->Write("<img src='images/resources/Marble.GIF' title='Marble'>");
;
                      }
)
                        {
                          if ($rsGuestbook0["Resource1"]="Oil"|$rsGuestbook0["Resource2"]="Oil"$then;
$Response->Write("<img src='images/resources/Oil.GIF' title='Oil'>");
;
                        }
)
                          {
                            if ($rsGuestbook0["Resource1"]="Pigs"|$rsGuestbook0["Resource2"]="Pigs"$then;
$Response->Write("<img src='images/resources/Pigs.GIF' title='Pigs'>");
;
                          }
)
                            {
                              if ($rsGuestbook0["Resource1"]="Rubber"|$rsGuestbook0["Resource2"]="Rubber"$then;
$Response->Write("<img src='images/resources/Rubber.GIF' title='Rubber'>");
;
                            }
)
                              {
                                if ($rsGuestbook0["Resource1"]="Silver"|$rsGuestbook0["Resource2"]="Silver"$then;
$Response->Write("<img src='images/resources/Silver.GIF' title='Silver'>");
;
                              }
)
                                {
                                  if ($rsGuestbook0["Resource1"]="Spices"|$rsGuestbook0["Resource2"]="Spices"$then;
$Response->Write("<img src='images/resources/Spices.GIF' title='Spices'>");
;
                                }
)
                                  {
                                    if ($rsGuestbook0["Resource1"]="Sugar"|$rsGuestbook0["Resource2"]="Sugar"$then;
$Response->Write("<img src='images/resources/Sugar.GIF' title='Sugar'>");
;
                                  }
)
                                    {
                                      if ($rsGuestbook0["Resource1"]="Uranium"|$rsGuestbook0["Resource2"]="Uranium"$then;
$Response->Write("<img src='images/resources/Uranium.GIF' title='Uranium'>");
;
                                    }
)
                                      {
                                        if ($rsGuestbook0["Resource1"]="Water"|$rsGuestbook0["Resource2"]="Water"$then;
$Response->Write("<img src='images/resources/Water.GIF' title='Water'>");
;
                                      }
)
                                        {
                                          if ($rsGuestbook0["Resource1"]="Wheat"|$rsGuestbook0["Resource2"]="Wheat"$then;
$Response->Write("<img src='images/resources/Wheat.GIF' title='Wheat'>");
;
                                        }
)
                                          {
                                            if ($rsGuestbook0["Resource1"]="Wine"|$rsGuestbook0["Resource2"]="Wine"$then;
$Response->Write("<img src='images/resources/Wine.GIF' title='Wine'>");
;
                                          }
)
                                            {
?>
</div></td>
<td valign="top"><img border="0" src="images/arrows.gif" width="25" height="10">
<br>
<?                                               if ($rsSent["Trade_Within_Team"]=1$then; )
                                              {

                                                $font$size="1"$color="#008000">$Team$Bonus</$font></$i>;
                                                $font$size="1"$color="#FF0000">$No$Team$Bonus</$font></$i>;


//top"> //links"> //Verdana, Arial, Helvetica, sans-serif" size="1">                                                                                                $Item["Resource_Sent_1"].$Value)><(.$Item["Resource1"].$Value)$then;
                                                if ($rsSent["Resource_Sent_1"]="Aluminum"$then;
$Response->Write("<img src='images/resources/Aluminum.GIF' title='Aluminum'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Cattle"$then;
$Response->Write("<img src='images/resources/cattle.GIF' title='Cattle'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Coal"$then;
$Response->Write("<img src='images/resources/Coal.GIF' title='Coal'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Fish"$then;
$Response->Write("<img src='images/resources/Fish.GIF' title='Fish'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Furs"$then;
$Response->Write("<img src='images/resources/Furs.GIF' title='Furs'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Gold"$then;
$Response->Write("<img src='images/resources/Gold.GIF' title='Gold'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Gems"$then;
$Response->Write("<img src='images/resources/Gems.GIF' title='Gems'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Iron"$then;
$Response->Write("<img src='images/resources/Iron.GIF' title='Iron'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Lead"$then;
$Response->Write("<img src='images/resources/Lead.GIF' title='Lead'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Lumber"$then;
$Response->Write("<img src='images/resources/Lumber.GIF' title='Lumber'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Marble"$then;
$Response->Write("<img src='images/resources/Marble.GIF' title='Marble'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Oil"$then;
$Response->Write("<img src='images/resources/Oil.GIF' title='Oil'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Pigs"$then;
$Response->Write("<img src='images/resources/Pigs.GIF' title='Pigs'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Rubber"$then;
$Response->Write("<img src='images/resources/Rubber.GIF' title='Rubber'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Silver"$then;
$Response->Write("<img src='images/resources/Silver.GIF' title='Silver'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Spices"$then;
$Response->Write("<img src='images/resources/Spices.GIF' title='Spices'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Sugar"$then;
$Response->Write("<img src='images/resources/Sugar.GIF' title='Sugar'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Uranium"$then;
$Response->Write("<img src='images/resources/Uranium.GIF' title='Uranium'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Water"$then;
$Response->Write("<img src='images/resources/Water.GIF' title='Water'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Wheat"$then;
$Response->Write("<img src='images/resources/Wheat.GIF' title='Wheat'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_1"]="Wine"$then;
$Response->Write("<img src='images/resources/Wine.GIF' title='Wine'>"))
                                                {
                                                } 

                                              } 

?>

<? 
                                              if (($Item["Resource_Sent_2"]$Value)><($Item["Resource2"]$Value))
                                              {

                                                if ($rsSent["Resource_Sent_2"]="Aluminum"$then;
$Response->Write("<img src='images/resources/Aluminum.GIF' title='Aluminum'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Cattle"$then;
$Response->Write("<img src='images/resources/cattle.GIF' title='Cattle'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Coal"$then;
$Response->Write("<img src='images/resources/Coal.GIF' title='Coal'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Fish"$then;
$Response->Write("<img src='images/resources/Fish.GIF' title='Fish'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Furs"$then;
$Response->Write("<img src='images/resources/Furs.GIF' title='Furs'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Gold"$then;
$Response->Write("<img src='images/resources/Gold.GIF' title='Gold'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Gems"$then;
$Response->Write("<img src='images/resources/Gems.GIF' title='Gems'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Iron"$then;
$Response->Write("<img src='images/resources/Iron.GIF' title='Iron'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Lead"$then;
$Response->Write("<img src='images/resources/Lead.GIF' title='Lead'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Lumber"$then;
$Response->Write("<img src='images/resources/Lumber.GIF' title='Lumber'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Marble"$then;
$Response->Write("<img src='images/resources/Marble.GIF' title='Marble'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Oil"$then;
$Response->Write("<img src='images/resources/Oil.GIF' title='Oil'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Pigs"$then;
$Response->Write("<img src='images/resources/Pigs.GIF' title='Pigs'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Rubber"$then;
$Response->Write("<img src='images/resources/Rubber.GIF' title='Rubber'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Silver"$then;
$Response->Write("<img src='images/resources/Silver.GIF' title='Silver'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Spices"$then;
$Response->Write("<img src='images/resources/Spices.GIF' title='Spices'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Sugar"$then;
$Response->Write("<img src='images/resources/Sugar.GIF' title='Sugar'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Uranium"$then;
$Response->Write("<img src='images/resources/Uranium.GIF' title='Uranium'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Water"$then;
$Response->Write("<img src='images/resources/Water.GIF' title='Water'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Wheat"$then;
$Response->Write("<img src='images/resources/Wheat.GIF' title='Wheat'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Sent_2"]="Wine"$then;
$Response->Write("<img src='images/resources/Wine.GIF' title='Wine'>"))
                                                {
                                                } 

                                              } 

?>

<? 
                                              if (($Item["Resource_Receive_1"]$Value)><($Item["Resource1"]$Value))
                                              {

                                                if ($rsSent["Resource_Receive_1"]="Aluminum"$then;
$Response->Write("<img src='images/resources/Aluminum.GIF' title='Aluminum'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Cattle"$then;
$Response->Write("<img src='images/resources/cattle.GIF' title='Cattle'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Coal"$then;
$Response->Write("<img src='images/resources/Coal.GIF' title='Coal'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Fish"$then;
$Response->Write("<img src='images/resources/Fish.GIF' title='Fish'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Furs"$then;
$Response->Write("<img src='images/resources/Furs.GIF' title='Furs'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Gold"$then;
$Response->Write("<img src='images/resources/Gold.GIF' title='Gold'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Gems"$then;
$Response->Write("<img src='images/resources/Gems.GIF' title='Gems'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Iron"$then;
$Response->Write("<img src='images/resources/Iron.GIF' title='Iron'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Lead"$then;
$Response->Write("<img src='images/resources/Lead.GIF' title='Lead'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Lumber"$then;
$Response->Write("<img src='images/resources/Lumber.GIF' title='Lumber'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Marble"$then;
$Response->Write("<img src='images/resources/Marble.GIF' title='Marble'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Oil"$then;
$Response->Write("<img src='images/resources/Oil.GIF' title='Oil'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Pigs"$then;
$Response->Write("<img src='images/resources/Pigs.GIF' title='Pigs'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Rubber"$then;
$Response->Write("<img src='images/resources/Rubber.GIF' title='Rubber'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Silver"$then;
$Response->Write("<img src='images/resources/Silver.GIF' title='Silver'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Spices"$then;
$Response->Write("<img src='images/resources/Spices.GIF' title='Spices'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Sugar"$then;
$Response->Write("<img src='images/resources/Sugar.GIF' title='Sugar'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Uranium"$then;
$Response->Write("<img src='images/resources/Uranium.GIF' title='Uranium'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Water"$then;
$Response->Write("<img src='images/resources/Water.GIF' title='Water'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Wheat"$then;
$Response->Write("<img src='images/resources/Wheat.GIF' title='Wheat'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_1"]="Wine"$then;
$Response->Write("<img src='images/resources/Wine.GIF' title='Wine'>"))
                                                {
                                                } 

                                              } 

?>

<? 
                                              if (($Item["Resource_Receive_2"]$Value)><($Item["Resource2"]$Value))
                                              {

                                                if ($rsSent["Resource_Receive_2"]="Aluminum"$then;
$Response->Write("<img src='images/resources/Aluminum.GIF' title='Aluminum'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Cattle"$then;
$Response->Write("<img src='images/resources/cattle.GIF' title='Cattle'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Coal"$then;
$Response->Write("<img src='images/resources/Coal.GIF' title='Coal'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Fish"$then;
$Response->Write("<img src='images/resources/Fish.GIF' title='Fish'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Furs"$then;
$Response->Write("<img src='images/resources/Furs.GIF' title='Furs'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Gold"$then;
$Response->Write("<img src='images/resources/Gold.GIF' title='Gold'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Gems"$then;
$Response->Write("<img src='images/resources/Gems.GIF' title='Gems'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Iron"$then;
$Response->Write("<img src='images/resources/Iron.GIF' title='Iron'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Lead"$then;
$Response->Write("<img src='images/resources/Lead.GIF' title='Lead'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Lumber"$then;
$Response->Write("<img src='images/resources/Lumber.GIF' title='Lumber'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Marble"$then;
$Response->Write("<img src='images/resources/Marble.GIF' title='Marble'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Oil"$then;
$Response->Write("<img src='images/resources/Oil.GIF' title='Oil'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Pigs"$then;
$Response->Write("<img src='images/resources/Pigs.GIF' title='Pigs'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Rubber"$then;
$Response->Write("<img src='images/resources/Rubber.GIF' title='Rubber'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Silver"$then;
$Response->Write("<img src='images/resources/Silver.GIF' title='Silver'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Spices"$then;
$Response->Write("<img src='images/resources/Spices.GIF' title='Spices'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Sugar"$then;
$Response->Write("<img src='images/resources/Sugar.GIF' title='Sugar'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Uranium"$then;
$Response->Write("<img src='images/resources/Uranium.GIF' title='Uranium'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Water"$then;
$Response->Write("<img src='images/resources/Water.GIF' title='Water'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Wheat"$then;
$Response->Write("<img src='images/resources/Wheat.GIF' title='Wheat'>"))
                                                {
                                                } 

                                                if ($rsSent["Resource_Receive_2"]="Wine"$then;
$Response->Write("<img src='images/resources/Wine.GIF' title='Wine'>"))
                                                {
                                                } 

                                              } 

?>




</font>
</div></td>

<td valign="top"> 
<div class = "links"> 
<font face="Verdana, Arial, Helvetica, sans-serif" size="1">

<?                                               echo (.$Item["Trade_Reason"].$Value); ?></font></div></td>




<td valign="top" width="143"> 
	<p align="left"> 
	<?                                               if (($Item["Trade_Cancled"]$Value)==1)
                                              {
?>
	<font color="#008000">Approved</font>
	<?                                               } ?>
	<?                                               if (($Item["Trade_Cancled"]$Value)==2)
                                              {
?>
	<font color="#FF9933">Canceled</font>
	<?                                               } ?>
	




	<?                                               if ($counters<=$tradeslots && ($Item["Declaring_Nation"]$Value)><$rsGuestbook0["Nation_Name"] && ($Item["Trade_Cancled"]$Value)==0)
                                              {
?>
	<!--#include file="activitycheck.php" -->
	<a href="trade_approve.asp?ID=<?                                                 echo $rsSent["ID"]; ?>&Nation_ID=<?                                                 echo $rsGuestbook0["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to approve this trade?');">			
 	<font color="#FF0000">Needs Approval</font></a> - <a href="trade_cancel.asp?ID=<?                                                 echo $rsSent["ID"]; ?>&Nation_ID=<?                                                 echo $rsGuestbook0["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to cancel this trade?');">Cancel</a>
	<?                                               } ?>
	<?                                               if ($counters>$tradeslots && ($Item["Declaring_Nation"]$Value)><$rsGuestbook0["Nation_Name"] && ($Item["Trade_Cancled"]$Value)==0)
                                              {
?>
	Limit Reached - <a href="trade_cancel.asp?ID=<?                                                 echo $rsSent["ID"]; ?>&Nation_ID=<?                                                 echo $rsGuestbook0["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to cancel this trade?');">Cancel</a>
	<?                                               } ?>	
	
	
	<?                                               if (($Item["Declaring_Nation"]$Value)==$rsGuestbook0["Nation_Name"] && ($Item["Trade_Cancled"]$Value)==0)
                                              {
?>
	Awaiting Approval - <a href="trade_cancel.asp?ID=<?                                                 echo $rsSent["ID"]; ?>&Nation_ID=<?                                                 echo $rsGuestbook0["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to cancel this trade?');">Cancel</a>
	<?                                               }
                                                else
                                              {
                                                if (($Item["Trade_Cancled"]$Value)==1)
                                                {
?>
	- <a href="trade_cancel.asp?ID=<?                                                   echo $rsSent["ID"]; ?>&Nation_ID=<?                                                   echo $rsGuestbook0["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to cancel this trade?');">Cancel</a>
	<?                                                 } ?><?                                               } ?>
	
</td>


<td>

	<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
<?                                               if (($Item["Trade_Cancled"]$Value)==2)
                                              {
?>
<a href="trade_delete_code.asp?ID=<?                                                 echo $rsSent["ID"]; ?>&Nation_ID=<?                                                 echo $rsGuestbook0["Nation_ID"]; ?>" onclick="return confirm('Are you sure you want to delete this trade?');">
<img src="assets/delete.gif" width="17" height="17" border="0"><br>Delete</a>
<?                                               }
                                                else
                                              {
?>
<img src="assets/none.gif" title="Delete not an option at this time.">
<?                                               } ?>

<?                                               if ($rsIP1["Last_IP"]=$rsIP2["Last_IP"]|strtoupper($rsIP1["U_PASSWORD_Secure"])=strtoupper($rsIP2["U_PASSWORD_Secure"])$then; )
                                              {


                                                $td$colspan=9$bgcolor="#FFFF00">;
//center">///images/warning2.gif" title="The nations involved in this foreign aid agreement were potentially created by the same player who could be trying to abuse the foreign aid system.">&nbsp;                                                $WARNING</$b>.$nbsp;<$img$src="/images/warning2.gif"$title="The nations involved in this foreign aid agreement were potentially created by the same player who could be trying to abuse the foreign aid system."></$p>;
//left"><b>IMPORTANT: The trade offer above has been marked as a                                                 $potential$cheat;
                                                $rsIP1["U_PASSWORD_Secure"]                                                echo strtoupper($rsIP2["U_PASSWORD_Secure"])|($rsIP1["LAST_IP"]=$rsIP2["LAST_IP"]))&$rsSent["Trade_Cancled"]=2$then; ; ; ?>
		and has been canceled automatically by the system.
		<?                                               }
                                                else
                                              {
?>
		. If you accept this trade offer there is a VERY good chance 
		your nation will be DELETED and your user ID banned, even if you are certain that you are not 
		actually cheating. Please cancel the trade offer above and delete it to 
		prevent your nation from appearing as a cheating nation! 
		<?                                               } ?>
	<?                                             }                                           }                                         }                                       }                                     }                                   }                                 }                               }                             }                           }                         }                       }                     }                   }                 }               }             }           }         }       }     } ?>
</td>
</tr>




<?   } ?>
</td>
</tr>



<? 
  $repeat8__index=$repeat8__index+1;
  $repeat8__numRows=$repeat8__numRows-1;
  $rsSent=mysql_fetch_array($rsSent_query);
  $rsSent_BOF=0;

} 
?>
</table>
</div>

<? ' end Not rsSent.EOF Or NOT rsSent.BOF %>
<p align="center"> 

<? 
