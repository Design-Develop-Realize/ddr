<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
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

<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Nation_Name FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);
?>
<p></p>
<? 
$proceeddenied=0;
?>



<? 
if (strtoupper($_POST["U_ID"])!=strtoupper($rsUser["U_ID"]))
{

  $proceeddenied=1;
?>
You attempted to post with a user ID that does not belong to you
<? } ?>

<? 
// $rsTHUSER is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT U_ID,IPADDRESS,U_PASSWORD FROM Users Where UPPER(U_ID) ='".$_POST["THEIR_USER"]."'";
echo 0;
echo 2;
echo 1;
$rs=mysql_query();
$rsTHUSER_numRows=0;
if (($rsTHUSER_BOF==1) && ($rsTHUSER==0))
{

  $proceeddenied=1;
?>
Your friend's user ID was not found in the system.
<? } ?>
<? 
// $rsTHNATION is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Nation_NAME  FROM Nation Where UPPER(Nation_Name) ='".strtoupper($_POST["THEIR_NATION"])."'";
echo 0;
echo 2;
echo 1;
$rs=mysql_query();
$rsTHNATION_numRows=0;
if (($rsTHNATION_BOF==1) && ($rsTHNATION==0))
{

  $proceeddenied=1;
?>
Your friends nation name was not found in the system.
<? } ?>

<? if ($rsUser["U_PASSWORD"]==$rsTHUSER["U_PASSWORD"])
{
?>
Your request has been denied.
<? 
  $proceeddenied=1;
} ?><? 
$theirnation=strtoupper($_POST["THEIR_NATION"]);
$mynation=strtoupper($rsGuestbook0["Nation_Name"]);
$strFileName=$DOCUMENT_ROOT."moderation/assets/donotdelete.txt";
// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"r");
$iLoc=0;
$found=0;
while(!feof($file))
{

  $Line=fgets($file);;
  $iLoc=(strpos(strtoupper($Line),$theirnation) ? strpos(strtoupper($Line),$theirnation)+1 : 0);
  if ($iLoc!=0)
  {

    $found=1;
    $iLoc=0;
  } 

  $iLoc2=(strpos(strtoupper($Line),$mynation) ? strpos(strtoupper($Line),$mynation)+1 : 0);
  if ($iLoc!=0)
  {

    $found2=$found2+1;
    $iLoc=0;
  } 

} 
if ($found==1)
{

  $proceeddenied=1;
  print "That user has already been reported in the system.";
} 

if ($found2>2)
{

  $proceeddenied=1;
  print "You have already submitted too many multi users to the system.";
} 

?><? 
if ($proceeddenied==0)
{

  $strFileName=$DOCUMENT_ROOT."moderation/assets/donotdelete.txt";
// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"a");

  fputs($file,$rsUser["U_ID"]);
  fputs($file," - ");
  fputs($file,$rsGuestbook0["Nation_NAME"]);
  fputs($file," - ");
  fputs($file,$rsUser["IPADDRESS"]);
  fputs($file," | ");
  fputs($file,$rsTHUSER["U_ID"]);
  fputs($file," - ");
  fputs($file,$rsTHNATION["Nation_NAME"]);
  fputs($file," - ");
  fputs($file,$rsTHUSER["IPADDRESS"]."\n");
  fclose($file);
  $file=null;

  $fso=null;

  print "Your multiple user request has been received. Your request is subject to denial without notification.";
} 

?><!--#include file="inc_footer.php" --><? 
$rsMYUSER->Close;
$rsMYUSER=null;

$rsMYNATION->Close;
$rsMYNATION=null;


$rsTHUSER=null;


$rsTHNATION=null;

$objConn->Close();
$objConn=null;

?>
