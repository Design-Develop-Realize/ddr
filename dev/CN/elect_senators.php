<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
  session_register("activity_session");
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
$lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;

$nationteam=$rsGuestbook["Nation_Team"];
?> 





<? 
// $rsSent2 is of type "ADODB.Recordset"

$rsSent2SQL="SELECT Top 100 * FROM Nation Where Nation_Team = '".$rsGuestbook["Nation_Team"]."' ORDER BY Strength DESC ";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSent2SQL);
?>
 





<!--#include file="inc_header.php" -->

<!--#include file="calculations.php" -->




<? if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
{
?>
	<font color="#FF0000">Please do not attempt to cheat.</font>
<? }
  else
{
?>


<body bgcolor="white" text="black">



<?   if ($rsGuestbook["Nation_Team"]="None"$then; )
  {

    $p><$font$color="#FF0000">$You$cannot$elect$leaders$because$you$are$not$a;
    $member$of$a$team$at$this->.$If$you$wish    $join$a$team<$a$href="nation_edit.asp?Nation_ID=<% = rsGuestbook("$Nation_ID"); ?>">edit your nation</a> and specify a team name.
<?   }
    else
  {
?>




<?     $last_date=time()()-$rsGuestbook["Last_Vote"]; ?>



</font>






<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
<tr>
<td colspan="2" bgcolor="#000080">
<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0">
	<tr>
		<td><b><font color="#FFFFFF">:. Senate Elections For The <?     echo $rsGuestbook["Nation_Team"]; ?> Team
</font> </b> </td>
		<td>
		<p align="right"><b><font color="#FFFFFF">
		<a href="elect_senators_results.asp?Nation_ID=<?     echo $rsGuestbookHead["Nation_ID"]; ?>">
		<font color="#FFFFFF">View Results</font></a></font></b></td>
	</tr>
</table>
</td>
</tr> 




<tr>
<td align="right" width="100%" valign="top" colspan="2">

<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Senator.selectedIndex < 0)
  {
    alert("Please select one of the \"Senator\" options.");
    theForm.Senator.focus();
    return (false);
  }

  if (theForm.Senator.selectedIndex == 0)
  {
    alert("The first \"Senator\" option is not a valid selection.  Please choose one of the other options.");
    theForm.Senator.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="elect_senators_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">


<p align="left">A number of nation leaders within the <?     echo $rsGuestbook["Nation_Team"]; ?> 
Team are vying for position and power. They have called upon you to cast your 
vote in the <?     echo $rsGuestbook["Nation_Team"]; ?> Team senate. The available 
candidates have been chosen for their dedication to your team as well as for the 
size and strength of their own nation. (Therefore, not all nations on your team 
are available to choose from.) Senate elections reset every 30 days. The next 
senate election reset is scheduled for 
<? 
// $rsVotes is of type "ADODB.Recordset"

    $rsVotesSQL="SELECT Last_Reset FROM Election_Table";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsVotesSQL);
    print $rsVotes["Last_Reset"]+30;
    
    $rsVotes=null;

?>.



</td>
</tr>




<tr>
<td align="right" width="50%" valign="top">



<p align="left">The top three 
		senate positions will hold a position of great prestige within your 
		team. They will command authority within the <?     echo $rsGuestbook["Nation_Team"]; ?> 
		Team and give its member nations direction. The top three senate 
positions of each team will 
also be responsible for managing <a href="sanctions_view.php">trade and foreign aid sanctions</a> 
and managing <a href="team_messages_information.php">team messages</a>. Senate elections reset every 30 days. The next 
		senate election reset is scheduled for 
<? 
// $rsVotes is of type "ADODB.Recordset"

    $rsVotesSQL="SELECT Last_Reset FROM Election_Table";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsVotesSQL);
    print $rsVotes["Last_Reset"]+30;
    
    $rsVotes=null;

?>.



</td>
<td width="50%"> 



&nbsp;<!--webbot bot="Validation" b-value-required="TRUE" b-disallow-first-item="TRUE" --><select size="1" name="Senator">
<option>Select Senate Position...</option>




<? 
    $canidate_counter=0;
    while(!(($rsSent2==0)) && ($canidate_counter<100))
    {
?>
<?       if ($rsSent2["Nation_Team"]=$rsGuestbook["Nation_Team"]$then; )
      {

?>
<option value="<?         echo $rsSent2["Poster"]; ?>"><?         echo $rsSent2["Poster"]; ?> of <?         echo $rsSent2["Nation_Name"]; ?></option>


<?       } ?>	
<?       $rsSent2=mysql_fetch_array($rsSent2_query);
      $rsSent2_BOF=0;

    } 
    
?>


</select>


</td>
</tr>




</table>
<p align="center">  
 
<!--#include file="activitycheck.php" -->

<input type="hidden" name="Nation_ID" value="<?     echo $rsGuestbook["Nation_ID"]; ?>">
<input type="hidden" name="Poster" value="<?     echo $rsGuestbook["Poster"]; ?>">
<?     if ($canidate_counter==0)
    {
?>
<font color="#FF0000">There are no candidates powerful enough to hold a senate position for the <?       echo $rsGuestbook["Nation_Team"]; ?> Team at this time.</font>
<?     }
      else
    {
?>
	<?       if ($last_date<15)
      {
?>
	<font color="#FF0000">You may only vote once every 15 days.<br>
	You last voted on <?         echo $rsGuestbook["Last_Vote"]; ?>. Please wait until <?         echo $rsGuestbook["Last_Vote"]+15; ?> to vote again.<p align="center">
	</font>
	<?       }
        else
      {
?>
	<input type="submit" class="Buttons" name="Submit" value="Cast My Vote"></p>
<p align="center">  
 


	<?       } ?>
	<img border="0" src="http://cybernations.net/images/senators.jpg" width="414" height="276">
<?     } ?>
</p>
</form>
<!-- End form code -->

<?   } ?>
</body>
<? } ?>
</html>
<!--#include file="inc_footer.php" -->
<? 
//Reset server objects


$rsGuestbook=null;


$rsSent2=null;

$objConn->Close;
$objConn=null;

?>
