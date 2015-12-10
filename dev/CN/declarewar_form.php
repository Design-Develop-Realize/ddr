<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("U_ID_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<? if ($_POST["Declaring_Nation_ID"]=="")
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
// $rsUsers is of type "ADODB.Recordset"

  $rsUsersSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo1;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsUsersSQL);
  $rsUsers_numRows=0;
?>





<? 
  $rsSent__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsSent__MMColParam=$MM_Username_session;
  } ?>
<? 
// $rsSent is of type "ADODB.Recordset"

  $rsSentSQL="SELECT *  FROM WAR  WHERE War_Declared_By_User = '"+str_replace("'","''",$rsSent__MMColParam)+"' AND WAR.Nation_Deleted = 0 OR War_Declared_ON_User = '"+str_replace("'","''",$rsSent__MMColParam)+"' AND WAR.Nation_Deleted = 0";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSentSQL);
?>



<? 
// $rsSent2 is of type "ADODB.Recordset"

  $rsSent2SQL="SELECT WAR.* FROM WAR WHERE Receiving_Nation_ID=".$lngRecordNo1;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSent2SQL);
  $rsSent2_numRows=0;
?>




<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

  $rsGuestbook0SQL="SELECT * FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbook0SQL);
?>


<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value) || strtoupper(.$Item["Poster"].$Value)==strtoupper(.$Item["Poster"].$Value))
  {
?>
<br>
<font color="#FF0000">Please do not attempt to cheat.</font>
<?   }
    else
  {
?>

	<?     if (($Item["Nation_Dated"]$Value)>=time()()-1)
    {
?>
	<br>
	<font color="#FF0000">Your nation is too new to declare war at this time. Your soldiers need time to train and your economy needs time to adjust to your 
	new government. You may officially begin declaring war on <?       echo $FormatDateTime[(.$Item["Nation_Dated"].$Value)+2][2]; ?>. </font>
	<?     }
      else
    {
?>

		<?       if (($Item["Nation_Dated"]$Value)>=time()()-1)
      {
?>
		<br>
		<font color="#FF0000">The nation of <?         echo (.$Item["Nation_Name"].$Value); ?> is too new to declare war 
on at this time. Their soldiers are untrained and the massacre that would ensue 
from a war would reflect badly upon your nation in world opinion. You may officially begin declaring war on <?         echo (.$Item["Nation_Name"].$Value); ?> on <?         echo $FormatDateTime[(.$Item["Nation_Dated"].$Value)+2][2]; ?>.</font>
		<?       }
        else
      {
?>
	
			<?         if (($Item["Nation_Peace"]$Value)!=0)
        {
?>
			<br>
			<font color="#FF0000"><img border="0" src="images/peace.gif"> You cannot declare war because your nation is a peaceful nation.
			</font>
			<?         }
          else
        {
?>
				<?           if (($Item["Nation_Peace"]$Value)!=0)
          {
?>
				<br>
				<font color="#FF0000"><img border="0" src="images/peace.gif"> You cannot declare war on <?             echo (.$Item["Nation_Name"].$Value); ?> because that nation is a peaceful nation.
				</font>
			<?           }
            else
          {
?>
			
			
		
	
			<?             if (($Item["Nation_Peace"]$Value)==0 && ($Item["Nation_Peace"]$Value)==0)
            {
?>


<? 
              $warcounter=0;
              while((!($rsSent2==0)))
              {

?>
<? 
                if (($Item["War_End_Date"]$Value)>time()() && ($Item["Nation_Deleted"]$Value)==0 && !(($Item["Receiving_Nation_Peace"]$Value)==1 && ($Item["Declaring_Nation_Peace"]$Value)==1))
                {

                  $warcounter=$warcounter+1;
                } 


                $rsSent2=mysql_fetch_array($rsSent2_query);
                $rsSent2_BOF=0;

              } 
?>
<?               if ($warcounter>=3)
              {
?>
<br>
<font color="#FF0000">You cannot declare war on <?                 echo (.$Item["Nation_Name"].$Value); ?> because they already have their hands full with numerous (<?                 echo $warcounter; ?>) other wars.
</font>
<?               }
                else
              {
?>






<? 
                $AlreadyAtWar=0;
?>

<? 
                $mywars=0;
                while((!($rsSent==0)))
                {


//Prevent the user from declaring war too many times.

// $rsWarCntr is of type "ADODB.Recordset"

                  $rsWarCntrSQL="SELECT Count(*) as Wars FROM WAR WHERE Declaring_Nation_ID = '".$rsGuestbookHead["Nation_ID"]."'AND WAR.Nation_Deleted = 0 AND (WAR.Receiving_Nation_Peace + WAR.Declaring_Nation_Peace <> 2) AND War_End_Date > '".time()()."' ";
                                    echo 0;
                                    echo 2;
                                    echo 3;
                  $rs=mysql_query($rsWarCntrSQL);
                  $mywars=$rsWarCntr["Wars"];
                  
                  $rsWarCntr=null;




                  if (($Item["Declaring_Nation"]$value)==($Item["Nation_Name"]$Value) && ($Item["War_End_Date"]$value)>time()() && ($Item["Receiving_Nation_Peace"]$value)+($Item["Declaring_Nation_Peace"]$value)!=2)
                  {

                    $AlreadyAtWar=1;
                    $WaitNumberOfDays=(.$Item["War_End_Date"].$value)-time()();
                  } 


                  if (($Item["Receiving_Nation"]$value)==($Item["Nation_Name"]$Value) && ($Item["War_End_Date"]$value)>time()() && ($Item["Receiving_Nation_Peace"]$value)+($Item["Declaring_Nation_Peace"]$value)!=2)
                  {

                    $AlreadyAtWar=1;
                    $WaitNumberOfDays=(.$Item["War_End_Date"].$value)-time()();
                  } 


                  $rsSent=mysql_fetch_array($rsSent_query);
                  $rsSent_BOF=0;

                } 
?> 

<?                 if ($AlreadyAtWar==0)
                {
?> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<div align="center">
<table width="100%" border="0" cellspacing="0">
<tr> 
<td height="278" valign="top"> <div align="center"> 
<p align="left"><br>
<b>
<?                   if (($Item["Nation_Team"]$Value)==($Item["Nation_Team"]$Value))
                  {
?>
<?                     echo (.$Item["Poster"].$Value); ?> is part of the <font color="<?                     echo (.$Item["Nation_Team"].$Value); ?>"><?                     echo (.$Item["Nation_Team"].$Value); ?> Team</font> with you. 
Are you sure you want to declare war?<p align="left">
<?                   } ?>

<?                   if (($Item["Nuclear_Purchased"]$Value)>0)
                  {
?>
<?                     echo (.$Item["Poster"].$Value); ?> has <font color="#CC6600">
<span style="text-transform: uppercase">nuclear weapons</span>!!</font> 
Are you sure you want to declare war?<p align="left">
<?                   } ?>

Have you attempted to <a href="compose2.asp?Nation_ID=<?                   echo $rsUsers["Nation_ID"]; ?>">discuss this issue</a>
with <?                   echo (.$Item["Poster"].$Value); ?> the ruler of <?                   echo (.$Item["Nation_Name"].$Value); ?> before declaring war?

Wars have a very strong impact on your nation and should not be taken lightly. 
You will remain in a state of war for a period of 7 days.
</b> </p>
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.War_Reason.value == "")
  {
    alert("Please enter a value for the \"War Reason\" field.");
    theForm.War_Reason.focus();
    return (false);
  }

  if (theForm.War_Reason.value.length > 30)
  {
    alert("Please enter at most 30 characters in the \"War Reason\" field.");
    theForm.War_Reason.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789- \t\r\n\f";
  var checkStr = theForm.War_Reason.value;
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
    alert("Please enter only letter, digit and whitespace characters in the \"War Reason\" field.");
    theForm.War_Reason.focus();
    return (false);
  }

  if (theForm.Password.value == "")
  {
    alert("Please enter a value for the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length < 7)
  {
    alert("Please enter at least 7 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  if (theForm.Password.value.length > 40)
  {
    alert("Please enter at most 40 characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789- \t\r\n\f";
  var checkStr = theForm.Password.value;
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
    alert("Please enter only letter, digit and whitespace characters in the \"Password\" field.");
    theForm.Password.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="declare_war_form_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">      

<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=2 bgcolor="#000080">
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. Declare War on another nation </b></font></td>
</tr>
	
	
<tr>
<td align=right width="36%" bgcolor="#FFFFCC">

Declaring Nation<font 
class=textsize9>:</font></td>
<td width="61%" bgcolor="#FFFFCC"><font class=textsize9> 
<?                   echo $rsGuestbook0["Nation_Name"]; ?> (<?                   echo (.$Item["Poster"].$Value); ?>)   
</font></td>
</tr>
<tr class=colorformfields> 
<td align=right width="36%" bgcolor="#FFFFCC">
Declaring Nation Strength:</td>


<td valign="top" bgcolor="#FFFFCC">
<?                   echo $FormatNumber[$rsGuestbook0["Strength"]][3]; ?></td>



</tr>

<tr class=colorformfields> 
<td align=right width="36%" bgcolor="#FFFFCC">
Declaring Nation Rank:</td>


<td valign="top" bgcolor="#FFFFCC">
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

                                    echo $MM_conn_STRING;
                                    echo "SELECT COUNT(Nation_ID) AS Rank FROM Nation Where Strength >= '".$rsGuestbook0["Strength"]+1."' ";
                                    echo 0;
                                    echo 2;
                                    echo 3;
                  $rs=mysql_query();
?>
Ranked #<?                   echo $FormatNumber[$rsAllUsers["Rank"]+1][0]; ?> of 
<? 
                  
                  $rsAllUsers=null;

// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

                                    echo $MM_conn_STRING;
                                    echo "SELECT COUNT(Nation_ID) AS Total FROM Nation ";
                                    echo 0;
                                    echo 2;
                                    echo 3;
                  $rs=mysql_query();
?>
<?                   echo $FormatNumber[$rsAllUsers["Total"]][0]; ?> nations
<? 
                  
                  $rsAllUsers=null;

?>
</td>



</tr>

<tr class=colorformfields> 
<td align=right width="36%">
<font 
class=textsize9>Defending Nation:</font></td>


<td valign="top">

<?                   if ($rsUsers["Strength"]>=$rsGuestbook0["Strength"]*5 && $rsUsers["Strength"]<=$rsGuestbook0["Strength"]*2)
                  {
?>

<?                     echo $rsUsers["Nation_Name"]; ?> (<?                     echo (.$Item["Poster"].$Value); ?>) 

<?                   }
                    else
                  {
?>
<?                     echo (.$Item["Nation_Name"].$Value); ?> - You cannot declare war on this nation because they are not within your range of nations to declare war on.
View your <a href="allNations_display_ranking.php"> My Ranking</a> screen to find nations within your range.
<?                   } ?>


	</td>



</tr>
<tr class=colorformfieldsalt> 
<td align=right width="36%">Defending Nation Strength:</td>
<td>
<?                   echo $FormatNumber[$rsUsers["Strength"]][3]; ?></td>
</tr>
<tr class=colorformfieldsalt> 
<td align=right width="36%">Defending Nation Rank:</td>
<td>
<? 
// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

                                    echo $MM_conn_STRING;
                                    echo "SELECT COUNT(Nation_ID) AS Rank FROM Nation Where Strength >= '".$rsUsers["Strength"]+1."' ";
                                    echo 0;
                                    echo 2;
                                    echo 3;
                  $rs=mysql_query();
?>
Ranked #<?                   echo $FormatNumber[$rsAllUsers["Rank"]+1][0]; ?> of 
<? 
                  
                  $rsAllUsers=null;

// Count the number of nations before the deletion

// $rsAllUsers is of type "ADODB.Recordset"

                                    echo $MM_conn_STRING;
                                    echo "SELECT COUNT(Nation_ID) AS Total FROM Nation ";
                                    echo 0;
                                    echo 2;
                                    echo 3;
                  $rs=mysql_query();
?>
<?                   echo $FormatNumber[$rsAllUsers["Total"]][0]; ?> nations
<? 
                  
                  $rsAllUsers=null;

?>
</td>
</tr>
<?                   if (($rsUsers["Strength"]>=$rsGuestbook0["Strength"]*5 && $rsUsers["Strength"]<=$rsGuestbook0["Strength"]*2) || ($rsUsers["Strength"]>=30000 && $rsGuestbook0["Strength"]>=30000))
                  {
?>
	<?                     if ($mywars<3)
                    {
?>
		<?                       if ($rsGuestbook0["Government_Type"]!="Anarchy")
                      {
?>
		<input name="Receiving_Nation" value="<?                         echo (.$Item["Nation_Name"].$Value); ?>" type=hidden size="1">
		<input name="War_Declared_On_User" type="hidden" value="<?                         echo (.$Item["Poster"].$Value); ?>">
		<input name="Receiving_Nation_ID" type="hidden" value="<?                         echo (.$Item["Nation_ID"].$Value); ?>">
		<tr>
		<td align=right width="36%">Reason<font 
		class=textsize9>:</font></td>
		<td>
		<!--webbot bot="Validation" s-display-name="War Reason" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" b-value-required="TRUE" i-maximum-length="30" --><input type="text" name="War_Reason" size="30" value="A general dispute" maxlength="30">
		<font class=textsize9> 
		</font></td>
		</tr>
		<tr class=colorformfieldsalt> 
		<td align=right width="36%">My Password:<br>
		<i>(For validation purposes)</i></td>
		<td>
		<!--webbot bot="Validation" s-display-name="Password" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" b-value-required="TRUE" i-minimum-length="7" i-maximum-length="40" -->
		<input type="password" name="Password" size="30" maxlength="40"></td>
		</tr>
		<tr class=colorformfields> 
		<td align=right colspan=2><div align="center">&nbsp;</div>

		<div align="center"><font class=textsize9>
		<br>
		<!--#include file="activitycheck.php" -->
		<input name="Declaring_Nation" type="hidden" value="<?                         echo (.$Item["Nation_Name"].$Value); ?>">
		<input name="Declaring_Nation_ID" type="hidden" value="<?                         echo (.$Item["Nation_ID"].$Value); ?>">
		<input name="War_Declared_By_User" type="hidden" value="<?                         echo (.$Item["Poster"].$Value); ?>">
		<input name="Declaring_Team" type="hidden" value="<?                         echo (.$Item["Nation_Team"].$Value); ?>">
		<input name=submit2 type=submit class=Buttons id=submit2 value="Declare War">
		</font></div>
		<div align="center"><font class=textsize9>
		&nbsp;</font></div>
		<div align="left"><font class=textsize9>
		</font></div>
		</td>
		</tr>
		<?                       }
                        else
                      {
?>
		<tr><td colspan="2">
		<p align="left">Your government is in Anarchy. You cannot declare war at this time.
		</td></tr>
		<?                       } ?>
	<?                     }
                      else
                    {
?>
	<tr><td colspan="2">
	<p align="left">You have already declared war against <?                       echo $mywars; ?> other nations. Your forces are spread too thin to declare war at this time.
	</td></tr>
	<?                     } ?>
<?                   } ?>
</tbody>
</table>
<p align="left">


<?                 }
                  else
                {
?>
<p></p><font color="#FF0000">You are already at war with <?                   echo (.$Item["Nation_Name"].$Value); ?>. 
Please wait <?                   echo $FormatNumber[$WaitNumberOfDays][0]; ?> days before attempting to declare war again.
<?                 } ?>

</font>

</div>


</form>
<?               } ?><?             } ?><?           } ?><?         } ?><?       } ?><?     } ?>
</div></td>
</tr>
</table>
</div>
<p><p><br><P><!--#include file="search_include.php" --></p> <br>

</td>
</tr>
</table>
<?   } ?>
<!--#include file="inc_footer.php" -->
<? 
  
  $rsUsers=null;

  
  $rsGuestbook0=null;

  
  $rsSent=null;

  
  $rsSent2=null;

$objConn->Close;
  $objConn=null;

?>
<? } ?>
