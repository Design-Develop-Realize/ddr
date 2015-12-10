<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("U_ID_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<? if ($_POST["War_Declared_By_User"]=="")
{
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

<? 
  $rsUsers__MMColParam="1";
  if (($U_ID_session!=""))
  {

    $rsUsers__MMColParam=$U_ID_session;
  } 

?> 





<? 
  $lngRecordNo1=intval($_GET["Nation_ID"]);
  $lngRecordNo1=str_replace("'","''",$lngRecordNo1);
// $rsUsers is of type "ADODB.Recordset"

  $rsUsersSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo1;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsUsersSQL);
  $rsUsers_numRows=0;
?>





<? 
  $lngRecordNo2=intval($_GET["bynation"]);
  $lngRecordNo2=str_replace("'","''",$lngRecordNo2);
// $rsDetail is of type "ADODB.Recordset"

  $rsDetailSQL="SELECT *  FROM Nation, USERS WHERE Nation.POSTER = USERS.U_ID AND Nation_ID=".$lngRecordNo2;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsDetailSQL);
  $rsDetail_numRows=0;
?>

<? 
  $rsSent__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsSent__MMColParam=$MM_Username_session;
  } ?>


<? 
  $warid=intval($_GET["warid"]);
  $warid=str_replace("'","''",$warid);
// $rsSent is of type "ADODB.Recordset"

  $rsSentSQL="SELECT *  FROM WAR  WHERE ID =".$warid;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSentSQL);
  $rsSent_numRows=0;
?>



<? 
// $rsSent2 is of type "ADODB.Recordset"

  $rsSent2SQL="SELECT *  FROM WAR  WHERE ID =".$warid;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSent2SQL);
  $rsSent2_numRows=0;
?>





<!--#include file="inc_header.php" -->
<?   $alreadyoffered=0;
  $disregard=0;
?>
<br>

<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
  {
?>
<font color="#FF0000">Please do not attempt to cheat.</font>
<?   }
    else
  {
?>



<?     if (($Item["Declaring_Nation"]$value)==($Item["Nation_Name"]$Value) && ($Item["War_End_Date"]$value)>=time()())
    {

      $AlreadyAtWar=1;
    } ?>                      

<?     if (($Item["Receiving_Nation"]$value)==($Item["Nation_Name"]$Value) && ($Item["War_End_Date"]$value)>=time()())
    {

      $AlreadyAtWar=1;
    } ?>  

<?     if ($AlreadyAtWar==1)
    {
?> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<div align="center">
<table width="90%" border="0" cellspacing="0">
<tr> 
<td height="278" valign="top"> <div align="center"> 
<p align="left"><br>
<b>

This will allow you to offer peace with <?       echo (.$Item["Poster"].$Value); ?> the ruler of 
<?       echo (.$Item["Nation_Name"].$Value); ?>. Once <?       echo (.$Item["Poster"].$Value); ?> 
declares peace as well your 
war against one another will end.

</b> </p>
<form name="FrontPage_Form1" method="post" action="declare_peace_form_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">      

<input name="War_Declared_By_User" type="hidden" value="<?       echo (.$Item["Poster"].$Value); ?>">

<input name="Declaring_Nation_ID" type="hidden" value="<?       echo (.$Item["Nation_ID"].$Value); ?>">
<input name="Declaring_Nation" type="hidden" value="<?       echo (.$Item["Nation_Name"].$Value); ?>">

<input name="War_Declared_On_User" type="hidden" value="<?       echo (.$Item["Poster"].$Value); ?>">
<input name="Receiving_Nation_ID" type="hidden" value="<?       echo (.$Item["Nation_ID"].$Value); ?>">
<input name="Receiving_Nation" type="hidden" value="<?       echo (.$Item["Nation_Name"].$Value); ?>">
<input name="warid" type="hidden" value="<?       echo $warid; ?>">

<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=2 bgcolor="#000080">
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. Offer Peace With Another Nation </b></font></td>
</tr>

<tr>
<td align=right width="50%" height="39">Cause Of<font 
class=textsize9> War:</font></td>
<td width="50%" height="39">
<?       echo $rsSent2["War_Reason"]; ?>
<font class=textsize9> 

</font></td>
</tr>

<tr>
<td align=right width="50%" height="37">
<font 
class=textsize9>&nbsp;War Originally Declared By:</font></td>
<td width="50%" height="37"><font class=textsize9> 
<?       echo (.$Item["Declaring_Nation"].$Value); ?> (<?       echo (.$Item["War_Declared_By_User"].$Value); ?>) 


</font></td>
</tr>


<tr>
<td align=right width="50%" height="47"><font class=textsize9>
<?       echo (.$Item["War_Declared_By_User"].$Value); ?> Has Offered Peace:</font></td>
<td width="50%" height="47">
<?       if (strtoupper(.$Item["War_Declared_By_User"].$Value)==strtoupper($rsUser->Fields.$Item["U_ID"].$Value))
      {
?>
	<?         if (($Item["Declaring_Nation_Peace"]$value)==1)
        {
?>Yes<?           $alreadyoffered=1; ?> 
	<?         }
          else
        {
?>
	<input type=radio value="1" name="Declaring_Nation_Peace" <?           if (($Item["Declaring_Nation_Peace"]$value)==1)
          {
?>checked<?           } ?>> Yes
	<input type=radio value="0" name="Declaring_Nation_Peace" <?           if (($Item["Declaring_Nation_Peace"]$value)==0)
          {
?>checked<?           } ?>> No
	<?         } ?>
<?       }
        else
      {
?>


<?         if (($Item["Declaring_Nation_Peace"]$value)==1)
        {
?>Yes
<input type=hidden value="1" name="Declaring_Nation_Peace">
<input type=hidden value="1" name="disregard">
<?         } ?>
<?         if (($Item["Declaring_Nation_Peace"]$value)==0)
        {
?>No
<input type=hidden value="0" name="Declaring_Nation_Peace">
<input type=hidden value="0" name="disregard">
<?         } ?>


<?       } ?>
</td>



</tr>


<tr>
<td align=right width="50%">
<font 
class=textsize9>&nbsp;War Originally Declared On:</font></td>
<td width="50%"><font class=textsize9> 
<?       echo (.$Item["Receiving_Nation"].$Value); ?> (<?       echo (.$Item["War_Declared_On_User"].$Value); ?>)
<br>&nbsp;</font></td>
</tr>


<tr>
<td align=right width="50%" height="43"><font 
class=textsize9><?       echo (.$Item["War_Declared_On_User"].$Value); ?> Has Offered Peace:</font></td>
<td width="50%" height="43">
<?       if (strtoupper(.$Item["War_Declared_On_User"].$Value)==strtoupper($rsUser->Fields.$Item["U_ID"].$Value))
      {
?>
	<?         if (($Item["Receiving_Nation_Peace"]$value)==1)
        {
?>Yes<?           $alreadyoffered=1; ?>
	<?         }
          else
        {
?>
	<input type=radio value="1" name="Receiving_Nation_Peace"  <?           if (($Item["Receiving_Nation_Peace"]$value)==1)
          {
?>checked<?           } ?>> Yes
	<input type=radio value="0" name="Receiving_Nation_Peace"  <?           if (($Item["Receiving_Nation_Peace"]$value)==0)
          {
?>checked<?           } ?>> No
	<?         } ?>
<?       }
        else
      {
?>
<?         if (($Item["Receiving_Nation_Peace"]$value)==1)
        {
?>Yes
<input type=hidden value="1" name="Receiving_Nation_Peace">
<input type=hidden value="1" name="disregard">
<?         } ?>
<?         if (($Item["Receiving_Nation_Peace"]$value)==0)
        {
?>No
<input type=hidden value="0" name="Receiving_Nation_Peace">
<input type=hidden value="0" name="disregard">
<?         } ?>
<?       } ?>
</td>
</tr>

<tr class=colorformfields> 
<td align=right colspan=2><div align="center"><font class=textsize9>
<input type=hidden name="lngRecordNo1" value="<?       echo (.$Item["Receiving_Nation_ID"].$Value); ?>">
<input type=hidden name="lngRecordNo2" value="<?       echo (.$Item["Declaring_Nation_ID"].$Value); ?>">
<input type=hidden name="onuser" value="<?       echo (.$Item["War_Declared_On_User"].$Value); ?>">
<input type=hidden name="byuser" value="<?       echo (.$Item["War_Declared_by_User"].$Value); ?>">


<!--#include file="activitycheck.php" -->


<?       if (strtoupper(.$Item["Poster"].$Value)==strtoupper($rsUser->Fields.$Item["U_ID"].$Value))
      {
?> 
<?       } ?>

<?       if ($alreadyoffered==1)
      {
?>
<font color="#008000">You have already offered peace.</font>
<?       }
        else
      {
?>
<input name=submit2 type=submit class="Buttons" id=submit2 value="Send Peace Offer">
<?       } ?>


<br>
</font></div>



</td>
</tr>
</tbody>
</table>
<p align="left">




</font>

</div>
</form>
<?     }
      else
    {
?>
You are not at war with that nation.

<?     } ?>
</div></td>
</tr>
</table>
</div>
<p>&nbsp; </p> <br>

</td>
</tr>
</table>
<?   } ?>
<!--#include file="inc_footer.php" -->
<? 
  
  $rsUsers=null;

  
  $rsDetail=null;

  
  $rsSent=null;

  
  $rsSent2=null;

$objConn->Close;
  $objConn=null;

?><? } ?>
