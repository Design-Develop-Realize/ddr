<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
?>
<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?> 
<!--#include file="Connection.php" -->
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


<? 
//VBScript version of DWTeam Dynamic Search SQL

//for rsAds

$tfm_andor="AND";
$tfm_exact="false";
//if any words option

if (${"anyallexact"}!="" && ${"anyallexact"}=="any")
{

  $tfm_andor="OR";
} 

//if exact phrase option

if (${"anyallexact"}!="" && ${"anyallexact"}=="exact")
{

  $tfm_exact="true";
} 

if (${"search"}!="")
{

  $tfm_SQLstr=" WHERE ((";
  $tfm_searchField=strtolower(${"search"});
  $tfm_databaseFields=$Split["Nation_Name"][","];
  $bellChar=chr(7);
  if ((strpos($tfm_searchField,chr(34)) ? strpos($tfm_searchField,chr(34))+1 : 0) || $tfm_exact=="true")
  {

    $tfm_searchField=str_replace(chr(34),"",$tfm_searchField);
    $tfm_andor="OR";
  }
    else
  if ((strpos(strtolower($tfm_searchField)," or ") ? strpos(strtolower($tfm_searchField)," or ")+1 : 0))
  {

    $tfm_searchField=str_replace(" or ",$bellChar,$tfm_searchField);
    $tfm_andor="OR";
  }
    else
  if ((strpos($tfm_searchField,",") ? strpos($tfm_searchField,",")+1 : 0) || (strpos($tfm_searchField," ") ? strpos($tfm_searchField," ")+1 : 0) || (strpos(strtolower($tfm_searchField)," and ") ? strpos(strtolower($tfm_searchField)," and ")+1 : 0))
  {

    $tfm_searchField=str_replace(" and ",$bellChar,$tfm_searchField);
    $tfm_searchField=str_replace(",",$bellChar,$tfm_searchField);
    $tfm_searchField=str_replace(" ",$bellChar,$tfm_searchField);
  } 

  $splitField=$Split[$tfm_searchField][$bellChar];
  for ($i=0; $i<=count($splitField); $i=$i+1)
  {

    for ($j=0; $j<=count($tfm_databaseFields); $j=$j+1)
    {

      $tfm_SQLstr=$tfm_SQLstr."(".$tfm_databaseFields[$j]." LIKE '%".str_replace("'","''",$splitField[$i])."%')";
      if ($j<count($tfm_databaseFields))
      {
        $tfm_SQLstr=$tfm_SQLstr." OR ";
      } 

    } 

    if ($i<count($splitField))
    {
      $tfm_SQLstr=$tfm_SQLstr.") ".$tfm_andor." (";
    } 

  } 

  $tfm_SQLstr=$tfm_SQLstr."))";
}
  else
{

  $tfm_SQLstr=" WHERE 1=0 ";
} 

?>
<? 
// $rsAds is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT *  FROM Nation "+$tfm_SQLstr+" ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAds_numRows=0;
?>

<? 
$Repeat1__numRows=-1;
$Repeat1__index=0;
$rsAds_numRows=$rsAds_numRows+$Repeat1__numRows;
?>
<? 
//  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables



// set the record count

$rsAds_total=mysql_num_rows($rsAds_query);

// set the number of rows displayed on this page

if (($rsAds_numRows<0))
{

  $rsAds_numRows=$rsAds_total;
}
  else
if (($rsAds_numRows==0))
{

  $rsAds_numRows=1;
} 


// set the first and last displayed record

$rsAds_first=1;
$rsAds_last=$rsAds_first+$rsAds_numRows-1;

// if we have the correct record count, check the other stats

if (($rsAds_total!=-1))
{

  if (($rsAds_first>$rsAds_total))
  {

    $rsAds_first=$rsAds_total;
  } 

  if (($rsAds_last>$rsAds_total))
  {

    $rsAds_last=$rsAds_total;
  } 

  if (($rsAds_numRows>$rsAds_total))
  {

    $rsAds_numRows=$rsAds_total;
  } 

} 

?>

<? 
// *** Move To Record and Go To Record: declare variables




$MM_rs=$MM_rsCount=$rsAds_total;
$MM_size=$rsAds_numRows;
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

$rsAds_first=$MM_offset+1;
$rsAds_last=$MM_offset+$MM_size;

if (($MM_rsCount!=-1))
{

  if (($rsAds_first>$MM_rsCount))
  {

    $rsAds_first=$MM_rsCount;
  } 

  if (($rsAds_last>$MM_rsCount))
  {

    $rsAds_last=$MM_rsCount;
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

//header begins

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

?> <? 
ob_start();
// *** Validate request to log in to this site.

$MM_LoginAction=$_SERVER["URL"];
if ($_GET!="")
{
  $MM_LoginAction=$MM_LoginAction+"?"+$_GET;
} 
$MM_valUsername=$_POST["Username"];
if ($MM_valUsername!="")
{

  $MM_fldUserAuthorization="";
  $MM_redirectLoginSuccess=$MM_LoginAction;
  $MM_redirectLoginFailed="register.asp";
  $MM_flag="ADODB.Recordset";
// $MM_rsUser is of type MM_flag

$MM_rsUser->ActiveConnection=$MM_conn_STRING;
$MM_rsUser->Source="SELECT U_ID, U_PASSWORD";
  if ($MM_fldUserAuthorization!="")
  {
$MM_rsUser->Source=$MM_rsUser->Source.",".$MM_fldUserAuthorization;
  } 
$MM_rsUser->Source=$MM_rsUser->Source." FROM USERS WHERE U_ID='".str_replace("'","''",$MM_valUsername)."' AND U_PASSWORD='".str_replace("'","''",$_POST["Password"])."'";
$MM_rsUser->CursorType=0;
$MM_rsUser->CursorLocation=2;
$MM_rsUser->LockType=3;
$MM_rsUser->Open;
  if (!$MM_rsUser->EOF || !$MM_rsUser->BOF)
  {

// username and password match - this is a valid user

    $MM_Username_session=$MM_valUsername;
    if (($MM_fldUserAuthorization!=""))
    {

      $MM_UserAuthorization_session=$MM_rsUser->Fields.$Item[$MM_fldUserAuthorization].$Value;
    }
      else
    {

      $MM_UserAuthorization_session="";
    } 

    if ($_GET["accessdenied"]!="" && true)
    {

      $MM_redirectLoginSuccess=$_GET["accessdenied"];
    } 

$MM_rsUser->Close;
    header("Location: ".$MM_redirectLoginSuccess);
  } 

$MM_rsUser->Close;
  header("Location: ".$MM_redirectLoginFailed);
} 

?><? 
$rsUser__MMColParam="xalsp";
if (($MM_Username_session!=""))
{
  $rsUser__MMColParam=$MM_Username_session;
} ?><? 
// $rsUser is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT *, (SELECT COUNT(*) FROM Nation WHERE Poster = U_ID) AS AD_COUNT FROM USERS  WHERE U_ID = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsUser_numRows=0;
?>


<? 
$rsAllUsers__sql_orderby="U_date";
if (($sql_orderby!=""))
{

  $rsAllUsers__sql_orderby=$sql_orderby;
} 

?>
<? 
$RecordCounter=0;
?>
<? 
// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT *, (SELECT COUNT(*) FROM Nation WHERE POSTER = U_ID) AS CADS   FROM USERS WHERE U_ID = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? 
$Repeat8__numRows=40;
$Repeat8__index=0;
$rsAllUsers_numRows=$rsAllUsers_numRows+$Repeat8__numRows;
?>
<? 
?>
<? 
//  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables


// set the record count

$rsAllUsers_total=mysql_num_rows($rsAllUsers_query);

// set the number of rows displayed on this page

if (($rsAllUsers_numRows<0))
{

  $rsAllUsers_numRows=$rsAllUsers_total;
}
  else
if (($rsAllUsers_numRows==0))
{

  $rsAllUsers_numRows=1;
} 


// set the first and last displayed record

$rsAllUsers_first=1;
$rsAllUsers_last=$rsAllUsers_first+$rsAllUsers_numRows-1;

// if we have the correct record count, check the other stats

if (($rsAllUsers_total!=-1))
{

  if (($rsAllUsers_first>$rsAllUsers_total))
  {
    $rsAllUsers_first=$rsAllUsers_total;
  } 
  if (($rsAllUsers_last>$rsAllUsers_total))
  {
    $rsAllUsers_last=$rsAllUsers_total;
  } 
  if (($rsAllUsers_numRows>$rsAllUsers_total))
  {
    $rsAllUsers_numRows=$rsAllUsers_total;
  } 
} 

?>

<? 
// *** Recordset Stats: if we don't know the record count, manually count them
if (($rsAllUsers_total==-1))
{


// count the total records by iterating through the recordset

  $rsAllUsers_total=0;
  while((!($rsAllUsers==0)))
  {

    $rsAllUsers_total=$rsAllUsers_total+1;
    $rsAllUsers=mysql_fetch_array($rsAllUsers_query);
    $rsAllUsers_BOF=0;

  } 

// reset the cursor to the beginning

  if ((>0))
  {

    
  }
    else
  {

    
  } 


// set the number of rows displayed on this page

  if (($rsAllUsers_numRows<0 || $rsAllUsers_numRows>$rsAllUsers_total))
  {

    $rsAllUsers_numRows=$rsAllUsers_total;
  } 


// set the first and last displayed record

  $rsAllUsers_first=1;
  $rsAllUsers_last=$rsAllUsers_first+$rsAllUsers_numRows-1;
  if (($rsAllUsers_first>$rsAllUsers_total))
  {
    $rsAllUsers_first=$rsAllUsers_total;
  } 
  if (($rsAllUsers_last>$rsAllUsers_total))
  {
    $rsAllUsers_last=$rsAllUsers_total;
  } 

} 

?>

<? 
//Dimension variables


//Create an ADO connection object 

// $adoCon0 is of type "ADODB.Connection"


//Set an active connection to the Connection object using a DSN-less connection 

$a2p_connstr=$MM_conn_STRING;
$a2p_uid=strstr($a2p_connstr,'uid');
$a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_pwd=strstr($a2p_connstr,'pwd');
$a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$a2p_database=strstr($a2p_connstr,'dsn');
$a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
$adoCon0=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
mysql_select_db($a2p_database,$adoCon0);

//Create an ADO recordset object 

// $rsGuestbook0 is of type "ADODB.Recordset"


//Initialise the strSQL variable with an SQL statement to query the database 

$strSQL0="SELECT * FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";


//Open the recordset with the SQL query 

$rs=mysql_query($strSQL0);?> 
<? 
$rsMessages__MMColParam="1";
if ((${"MM_EmptyValue"}!=""))
{

  $rsMessages__MMColParam=${"MM_EmptyValue"};
} 

?><? 
// $rsMessages is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT * FROM EMessages WHERE U_ID = '".$MM_Username_session."' and MESS_READ <> "+str_replace("'","''",$rsMessages__MMColParam)+"";
echo 0;
echo 2;
echo 1;
$rs=mysql_query();
$rsMessages_numRows=0;
?><? 
//  *** Recordset Stats, Move To Record, and Go To Record: declare stats variables

// set the record count

$rsMessages_total=mysql_num_rows($rsMessages_query);
// set the number of rows displayed on this page

if (($rsMessages_numRows<0))
{

  $rsMessages_numRows=$rsMessages_total;
}
  else
if (($rsMessages_numRows==0))
{

  $rsMessages_numRows=1;
} 

// set the first and last displayed record

$rsMessages_first=1;
$rsMessages_last=$rsMessages_first+$rsMessages_numRows-1;
// if we have the correct record count, check the other stats

if (($rsMessages_total!=-1))
{

  if (($rsMessages_first>$rsMessages_total))
  {

    $rsMessages_first=$rsMessages_total;
  } 

  if (($rsMessages_last>$rsMessages_total))
  {

    $rsMessages_last=$rsMessages_total;
  } 

  if (($rsMessages_numRows>$rsMessages_total))
  {

    $rsMessages_numRows=$rsMessages_total;
  } 

} 

?><? 
// *** Recordset Stats: if we don't know the record count, manually count them
if (($rsMessages_total==-1))
{


// count the total records by iterating through the recordset

  $rsMessages_total=0;
  while((!($rsMessages==0)))
  {

    $rsMessages_total=$rsMessages_total+1;
    $rsMessages=mysql_fetch_array($rsMessages_query);
    $rsMessages_BOF=0;

  } 

// reset the cursor to the beginning

  if ((>0))
  {

    
  }
    else
  {

    
  } 


// set the number of rows displayed on this page

  if (($rsMessages_numRows<0 || $rsMessages_numRows>$rsMessages_total))
  {

    $rsMessages_numRows=$rsMessages_total;
  } 


// set the first and last displayed record

  $rsMessages_first=1;
  $rsMessages_last=$rsMessages_first+$rsMessages_numRows-1;

  if (($rsMessages_first>$rsMessages_total))
  {

    $rsMessages_first=$rsMessages_total;
  } 

  if (($rsMessages_last>$rsMessages_total))
  {

    $rsMessages_last=$rsMessages_total;
  } 


} 

?>

            <p align="center">
<a title="Cyber Nations, an online nation simulation game" href="default.php" name="pagetop">
<img border="0" src="images/cybernationslogo.jpg" alt="Cyber Nations, an online nation simulation game"></a></p>

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="100%" height="0" valign="top"> <table width="97%" height="0" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top"> <div align="left"> 
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <tr> 
                              <td align="center" valign="middle" height="2">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#003366">
                                  <tr> 
                                    <td valign="top" bgcolor="#FFFFFF"> 
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr align="center"> 
                                          <td width="99%" valign="top">
                                           <table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF">
                           
                                               
                                                   
                                                    <? if (($rsAds==0) && ($rsAds_BOF==1))
{
?>
                                                                       <tr> 
                                                <td align="left" valign="top" height="44"> 
                                                    <font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><font color="#FF0000">
                                                     <p align="center">
                                                    <br> 
                                                 </font>No names were found. You 
													may proceed. </b></font></td>
                                                </tr>
                                                    <? } 
// end rsAds.EOF And rsAds.BOF  

($rsAds==0)$Or$Not($rsAds_BOF==1)$Then; ?>
                                              <tr>
                                                <td align="left" valign="top"> 
                                            <center>
                                            		<font size="4">
                                            <strong>
													<br>
											</strong></font>
											<font face="Verdana, Arial, Helvetica, sans-serif" size="2">
											<b>Nation names must be unique. If 
											your nation name appears below you 
											must revise it.</b></font></center>
											</p>
											<!--#include file="search2_blank_code.php" -->
                                                 <br> <table border="0" width="30%" align="center">
                                                    <tr> 
                                                      <td width="23%" align="center"> 
                                                        <? if ($MM_offset!=0)
{
?>
                                                        <a title="First" href="<?   echo $MM_moveFirst; ?>"><img src="assets/First.gif" border=0></a>                                                         <? } 
// end MM_offset <> 0  
//31%" align="center"> $Then; ?>
                                                        <a title="Previous" href="<? echo $MM_movePrev; ?>"><img src="assets/Previous.gif" border=0></a> 
                                                        <? ' end MM_offset <> 0 %> </td>
                                                      <td width="23%" align="center"> 
                                                        <? if ($If!$MM_atTotal)
{
?>
                                                        <a title="Next" href="<?   echo $MM_moveNext; ?>"><img src="assets/Next.gif" border=0></a> 
                                                        <? } 
// end Not MM_atTotal  
//23%" align="center"> $MM_atTotal$Then; ?>
                                                        <a title="Last" href="<? echo $MM_moveLast; ?>"><img src="assets/Last.gif" border=0></a> 
                                                        <? ' end Not MM_atTotal %> </td>
                                                    </tr>
                                                  </table></td>
                                              	</tr>
                                              <tr> 
                                                <td align="left" valign="top"> 
                                                  <? if ($If!($rsAds==0) || !($rsAds_BOF==1))
{
?>
                                                  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#333333">
                                                    <tr align="center" bgcolor="#FFFFFF"> 
                                                      <td align="center" valign="top">
                                                        &nbsp;</td>
                                                    </tr>
                                                    <? 
  while((($Repeat1__numRows!=0) && (!($rsAds==0))))
  {

?>
                                                    <? 
    $Repeat1__index=$Repeat1__index+1;
    $Repeat1__numRows=$Repeat1__numRows-1;
    $rsAds=mysql_fetch_array($rsAds_query);
    $rsAds_BOF=0;

  } 
?>
                                                  
                                                    <? } 
// end Not rsAds.EOF Or NOT rsAds.BOF  

// end Not rsAds.EOF Or NOT rsAds.BOF  ?> </td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <tr align="center"> 
                                          <td valign="top">&nbsp; </td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table>
                                </td>
                            </tr>
                            <tr> 
                              <td align="center" valign="middle"></td>
                            </tr>
                          </table>
                        </div></td>
                    </tr>
                  </table></td>
                <td width="2" valign="top">
                  
                  </td>
              </tr>
            </table> 
           

<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789- \t\r\n\f";
  var checkStr = theForm.search.value;
  var allValid = true;
  var validGroups = true;
  for (i = 0;  i < checkStr.length;  i++)
  {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length)
    {
      allValid = false;
      break;
    }
  }
  if (!allValid)
  {
    alert("Please enter only letter, digit and whitespace characters in the \"search\" field.");
    theForm.search.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form action="search2_blank.php" method="get" name="FrontPage_Form1" id="dirsearch" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="50%">
		<p align="right">Search For Nations &amp; Rulers:</td>
		<td width="50%"><div align="left"><font size="1"> 
			&nbsp;<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" --><input name="search" class="displayFieldIE" id="search" size="27" style="float: left">
</font></div><input name="imageField" type="image" id="imageField" src="assets/go.gif" width="21" height="14" border="0"></td>
		</td>
	</tr>
</table>
</form>

<? 

?>

<? 
$objConn->Close();
$objConn=null;

?>
