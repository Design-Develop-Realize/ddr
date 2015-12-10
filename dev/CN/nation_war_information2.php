<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>
<!--#include file="connection.php" -->
<? ' *** Restrict Access To Page: Grant or deny access to this page
MM_authorizedUsers=""
MM_authFailedURL="login.asp?login=1"
MM_grantAccess=false
If Session("MM_Username") <> "" Then
  If (true Or CStr(Session("MM_UserAuthorization"))="") Or _
         (InStr(1,MM_authorizedUsers,Session("MM_UserAuthorization"))>=1) Then
    MM_grantAccess = true
  End If
End If
If Not MM_grantAccess Then
  MM_qsChar = "?"
  If (InStr(1,MM_authFailedURL,"?") >= 1) Then MM_qsChar = "&"
  MM_referrer = Request.ServerVariables("URL")
  if (Len(Request.QueryString()) > 0) Then MM_referrer = MM_referrer & "?" & Request.QueryString()
  MM_authFailedURL = MM_authFailedURL & MM_qsChar & "accessdenied=" & Server.URLEncode(MM_referrer)
  Response.Redirect(MM_authFailedURL)
End If
%>
<? if ()
{

  $rsSent__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsSent__MMColParam=$MM_Username_session;
  } ?>
<? 
// $rsSent is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT *  FROM WAR WHERE War.War_Declared_By_User = '"+str_replace("'","''",$rsSent__MMColParam)+"' OR War.War_Declared_ON_User = '"+str_replace("'","''",$rsSent__MMColParam)+"' ORDER BY War.War_Declaration_Date DESC";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsSent_numRows=0;
?>
<? 

  $RecordCounter=0;
?>
<? 
  $repeat8__numRows=9;
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




$MM_rs=  $MM_rsCount=$rsSent_total;
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
// create the Form + URL string and remove the intial '&' from each of the strings  $MM_keepBoth=$MM_keepURL.$MM_keepForm;
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

// if the page has a repeated region, remove 'offset' from the maintained parameters  if (($MM_size>1))
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
  function DoTrimProperly($str,$nNamedFormat,$properly,$pointed,$points)
  {
    extract($GLOBALS);


    $strRet=htmlspecialchars($str);
    $strRet=str_replace("\r\n","",$strRet);
    $strRet=str_replace("\t","",$strRet);
    if ((strlen($strRet)>$nNamedFormat))
    {

      $strRet=substr($strRet,0,$nNamedFormat);
      if (($properly==1))
      {

        $TempArray=$split[$strRet][" "];
        $strRet="";
        for ($n=0; $n<=count($TempArray)-1; $n=$n+1)
        {

          $strRet=$strRet." ".$TempArray[$n];

        } 

      } 

      if (($pointed==1))
      {

        $strRet=$strRet.$points;
      } 

    } 

    $DoTrimProperly=$strRet;
    return $function_ret;
  } 



<script language="JavaScript" type="text/JavaScript">
<!--
function GP_popupConfirmMsg(msg) { //v1.0
  document.MM_returnValue = confirm(msg);
}
//-->
</script>
<SCRIPT LANGUAGE="JavaScript">
<!--
<!-- Begin
var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "Uncheck All"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "Check All"; }
}
//  End -->

</script>
<? 


  $lngRecordNo2=intval($_GET["Nation_ID"]);

// $rsDetail is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT *  FROM Nation, USERS WHERE Nation.POSTER = USERS.U_ID AND Nation_ID=".$lngRecordNo2;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsDetail_numRows=0;
?>
<? 
  $rsAds__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsAds__MMColParam=$MM_Username_session;
  } ?>
<? 
// $rsAds is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT *  FROM Nation  WHERE POSTER = '"+str_replace("'","''",$rsAds__MMColParam)+"'  ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsAds_numRows=0;
?>
<? 
//Dimension variables


//Read in the record number to be updated

  $lngRecordNo=intval($_GET["Nation_ID"]);

//Create an ADO connection object 

// $adoCon is of type "ADODB.Connection"


//Set an active connection to the Connection object using a DSN-less connection 

  $a2p_connstr==$MM_conn_STRING;
  $a2p_uid=strstr($a2p_connstr,'uid');
  $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_pwd=strstr($a2p_connstr,'pwd');
  $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_database=strstr($a2p_connstr,'dsn');
  $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
  mysql_select_db($a2p_database,$adoCon);

//Set an active connection to the Connection object using DSN connection 

//adoCon.Open "DSN=guestbook" 


//Create an ADO recordset object 

// $rsGuestbook is of type "ADODB.Recordset"


//Initialise the strSQL variable with an SQL statement to query the database 

  $strSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;

//Open the recordset with the SQL query 

  $rs=mysql_query($strSQL);?>  

<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

  $rsGuestbook0SQL="SELECT Nation_ID FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbook0SQL);
?>
<!--#include file="calculations.php" --> 

<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
  {
?>
<font color="#FF0000">Please do not attempt to cheat.</font>
<?   }
    else
  {
?>   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="0" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td height="221" align="left" valign="top"> <?     if ($rsUser->EOF && $rsUser->BOF)
    {
?>
                        <?     } 
// end rsUser.EOF And rsUser.BOF  $rsUser->EOF|$Not$rsUser->BOF$Then; ?>
                                                      
                              
                              
                           
                        <p>&nbsp;</p>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td height="0" align="left" valign="middle">
                              <p align="center"><b>War Declarations for <?     echo (.$Item["Nation_Name"].$Value); ?>
                              
                              <br>
                              
                              </b><i><br>
								Wars automatically expire after 7 days</i></p>
                              
                              
                              
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


//left" valign="top"> <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">//100%" height="150">($rsSent==0)$Or$Not($rsSent_BOF==1)$Then; ?>
                                      <div align="center">
                                      <table width="100%" border="0" cellpadding="5" cellspacing="0">
                                        <tr align="center" valign="middle"> 
                                          <td bgcolor="#000080"><strong>
											<font size="1" color="#FFFFFF">War Declaration Date</font></strong></td>
                                          <td bgcolor="#000080"><strong>
											<font size="1" color="#FFFFFF">War End Date</font></strong></td>
                                          <td bgcolor="#000080"><strong>
											<font size="1" color="#FFFFFF">War Declared By</font></strong></td>
                                          <td bgcolor="#000080"><strong>
											<font size="1" color="#FFFFFF">War Declared On</font></strong></td>

                                          <td bgcolor="#000080" colspan="2"><b>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">
											Actions</font></b></td>
 <td bgcolor="#000080"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">Delete</font></b></td>   
   </tr>
                                        <? 

while((($repeat8__numRows!=0) && (!($rsSent==0))))
{

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
<td valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?     echo (.$Item["War_Declaration_Date"].$Value); ?>
<br>
"<?     echo (.$Item["War_Reason"].$Value); ?>"

</font></td>
<td valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><?     echo $FormatDateTime[$rsSent["War_End_Date"]+1][2]; ?>
<?     if (($Item["War_End_Date"]$Value)<time()())
    {
?>
<b><font color="#FF0000">*Expired*</font></b>
<?     } ?>

</font></td>
<td align="left" valign="top">
<a href="nation_drill_display.asp?Nation_ID=<?     echo (.$Item["Declaring_Nation_ID"].$Value); ?>"><?     echo (.$Item["Declaring_Nation"].$Value); ?></a> (<?     echo .$Item["War_Declared_By_User"].$Value; ?>)<br><?     if ($rsSent["Declaring_Team"]="None"|!isset($rsSent["Declaring_Team"])$then; )
    {
      $No$Team$Info<$%else;     } ?><font color="<?     echo $rsSent["Declaring_Team"]; ?>"><?     echo $rsSent["Declaring_Team"]; ?> Team</font><?   } ?> 
</td>

<td align="left" valign="top">
<a href="nation_drill_display.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>"><?   echo (.$Item["Receiving_Nation"].$Value); ?></a> (<?   echo .$Item["War_Declared_On_User"].$Value; ?>)<br><?   if ($rsSent["Receiving_Team"]="None"|!isset($rsSent["Receiving_Team"])$then; )
  {
    $No$Team$Info<$%else;   } ?><font color="<?   echo $rsSent["Receiving_Team"]; ?>"><?   echo $rsSent["Receiving_Team"]; ?> Team</font><? } if ()
{



//left" valign="top" colspan="2"> 


//center"> $rsSent["Receiving_Nation_Peace"]=1&$rsSent["Declaring_Nation_Peace"]=1)|($rsSent["War_End_Date"]<time()())|($rsSent["Nation_Deleted"]=1)$then;
$if$rsSent["Receiving_Nation_Peace"]=1&$rsSent["Declaring_Nation_Peace"]=1$then;
$Response->Write("Peace Declared");
;
}
;
$if$rsSent["War_End_Date"]<time()()$then;
    print "War Expired";
} 

if ($rsSent["Nation_Deleted"]=1$then;
$Response->Write("Nation Deleted"))
{
} 

}
  else
{

?>

<p align="center">


	<? if (strtoupper($rsSent["War_Declared_By_User"])==strtoupper($rsUser["U_ID"]))
{
?>
	<script>

function nav<?   echo $rsSent["ID"]; ?>()
   {
   var w = document.myform<?   echo $rsSent["ID"]; ?>.mylist<?   echo $rsSent["ID"]; ?>.selectedIndex;
   var url_add = document.myform<?   echo $rsSent["ID"]; ?>.mylist<?   echo $rsSent["ID"]; ?>.options[w].value;
   window.location.href = url_add;
   }
</script>
<FORM NAME="myform<?   echo $rsSent["ID"]; ?>" style="display: inline; margin: 0;">

	<SELECT NAME="mylist<?   echo $rsSent["ID"]; ?>" onChange="nav<?   echo $rsSent["ID"]; ?>()">
	<OPTION VALUE="nation_drill_display.asp?Nation_ID=<?   echo $rsSent["Receiving_Nation_ID"]; ?>&type=Cautious_Ground">Select An Action...</OPTION>
	<OPTGROUP LABEL="Personel Options">
	<OPTION VALUE="military_purchase.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">Purchase Military</OPTION>
	<OPTION VALUE="militarydeploy.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">Deploy Military</OPTION>
	</OPTGROUP>
	<OPTGROUP LABEL="Ground Attack">
	<OPTION VALUE="battle_form.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&type=Cautious_Ground">Cautious Attack</OPTION>
	<OPTION VALUE="battle_form.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&type=Standard_Ground">Standard Attack</OPTION>
	<OPTION VALUE="battle_form.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&type=Planned_Ground">Planned Attack</OPTION>
	<OPTION VALUE="battle_form.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&type=Aggressive_Ground">Aggressive Attack</OPTION>
	</OPTGROUP>
	<OPTGROUP LABEL="Air Options">
	<OPTION VALUE="aircraft_attack.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>">Aircraft Attack</OPTION>
	</OPTGROUP>
	<OPTGROUP LABEL="Missile Attack">
	<OPTION VALUE="cruise_form.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>">Cruise Missile</OPTION>
	<OPTION VALUE="nuclear_form.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>">Nuclear Missile</OPTION>
	</OPTGROUP>
	<OPTGROUP LABEL="Peace Options">
	<OPTION VALUE="declare_peace_form.asp?Nation_ID=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&warid=<?   echo (.$Item["ID"].$Value); ?>">Declare Peace</OPTION>
	</OPTGROUP>
	</SELECT>
	</FORM>
	<? } ?>
	<? if (strtoupper($rsSent["War_Declared_On_User"])==strtoupper($rsUser["U_ID"]))
{
?>
	<script>

function nav<?   echo $rsSent["ID"]; ?>()
   {
   var w = document.myform<?   echo $rsSent["ID"]; ?>.mylist<?   echo $rsSent["ID"]; ?>.selectedIndex;
   var url_add = document.myform<?   echo $rsSent["ID"]; ?>.mylist<?   echo $rsSent["ID"]; ?>.options[w].value;
   window.location.href = url_add;
   }
</script>
<FORM NAME="myform<?   echo $rsSent["ID"]; ?>" style="display: inline; margin: 0;">

	<SELECT NAME="mylist<?   echo $rsSent["ID"]; ?>" onChange="nav<?   echo $rsSent["ID"]; ?>()">
	<OPTION VALUE="nation_drill_display.asp?Nation_ID=<?   echo $rsSent["Receiving_Nation_ID"]; ?>&type=Cautious_Ground">Select An Action...</OPTION>
	<OPTGROUP LABEL="Personel Options">
	<OPTION VALUE="military_purchase.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">Purchase Military</OPTION>
	<OPTION VALUE="militarydeploy.asp?Nation_ID=<?   echo $rsGuestbookHead["Nation_ID"]; ?>">Deploy Military</OPTION>
	</OPTGROUP>
	<OPTGROUP LABEL="Ground Attack">
	<OPTION VALUE="battle_form.asp?Nation_ID=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&type=Cautious_Ground">Cautious Attack</OPTION>
	<OPTION VALUE="battle_form.asp?Nation_ID=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&type=Standard_Ground">Standard Attack</OPTION>
	<OPTION VALUE="battle_form.asp?Nation_ID=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&type=Planned_Ground">Planned Attack</OPTION>
	<OPTION VALUE="battle_form.asp?Nation_ID=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&type=Aggressive_Ground">Aggressive Attack</OPTION>
	</OPTGROUP>
	<OPTGROUP LABEL="Air Options">
	<OPTION VALUE="aircraft_attack.asp?Nation_ID=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>">Aircraft Attack</OPTION>
	</OPTGROUP>
	<OPTGROUP LABEL="Missile Attack">
	<OPTION VALUE="cruise_form.asp?Nation_ID=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>">Cruise Missile</OPTION>
	<OPTION VALUE="cruise_form.asp?Nation_ID=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>">Nuclear Missile</OPTION>
	</OPTGROUP>
	<OPTGROUP LABEL="Peace Options">
	<OPTION VALUE="declare_peace_form.asp?Nation_ID=<?   echo (.$Item["Declaring_Nation_ID"].$Value); ?>&bynation=<?   echo (.$Item["Receiving_Nation_ID"].$Value); ?>&warid=<?   echo (.$Item["ID"].$Value); ?>">Declare Peace</OPTION>
	</OPTGROUP>
	</SELECT>
	</FORM>
	<? } ?>

</p>

<? >
</td>



<td valign="top">

	<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
<? 
