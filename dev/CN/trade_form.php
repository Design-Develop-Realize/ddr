<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("U_ID_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<? if ($_POST["Trade_Issued_By_User"]=="")
{
?>
<!--#include file="connection.php" -->

<? //end if

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
  $lngRecordNo1=intval($_GET["bynation"]);
// $rsUsers is of type "ADODB.Recordset"

  $rsUsersSQL="SELECT Nation_Name,Poster,Nation_ID,Resource1,Resource2,Nation_Team FROM Nation WHERE Nation_ID=".$lngRecordNo1;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsUsersSQL);
?>

<? 
  $lngRecordNo2=intval($_GET["Nation_ID"]);
// $rsDetail is of type "ADODB.Recordset"

  $rsDetailSQL="SELECT Nation_Name,Poster,Nation_ID,Resource1,Resource2,Nation_Team FROM Nation WHERE Nation_ID=".$lngRecordNo2;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsDetailSQL);
?>
<? 
  $rsSent__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsSent__MMColParam=$MM_Username_session;
  } ?>
<? 
// $rsSent2 is of type "ADODB.Recordset"

    echo $MM_conn_STRING_Trade;
    echo "SELECT Trade_Cancled FROM Trade WHERE (Receiving_Nation_ID=".$lngRecordNo1."AND Declaring_Nation_ID=".$lngRecordNo2.") OR (Declaring_Nation_ID=".$lngRecordNo1."AND Receiving_Nation_ID=".$lngRecordNo2.")";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
?>

<? 
// $rsSent3 is of type "ADODB.Recordset"

    echo $MM_conn_STRING_Trade;
    echo "SELECT Count(ID) AS TradeCNTRA FROM Trade WHERE (Receiving_Nation_ID=".$lngRecordNo2." OR Declaring_Nation_ID=".$lngRecordNo2.") AND (Trade.Trade_Cancled = 1 OR Trade.Trade_Cancled = 0)";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $activetrades=$rsSent3["TradeCNTRA"];
  
  $rsSent3=null;

?>


<? 
// $rsSent4 is of type "ADODB.Recordset"

    echo $MM_conn_STRING_Trade;
    echo "SELECT Count(ID) AS TradeCNTRB FROM Trade WHERE (Receiving_Nation_ID=".$lngRecordNo1."OR Declaring_Nation_ID=".$lngRecordNo1.") AND (Trade.Trade_Cancled = 1 OR Trade.Trade_Cancled = 0)";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $theiractivetrades=$rsSent4["TradeCNTRB"];
  
  $rsSent4=null;

?>
<? 
  $lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

  $rsGuestbookSQL="SELECT * FROM Nation,Users WHERE Nation_ID=".$lngRecordNo;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbookSQL);

  if (($rsGuestbook_BOF==1) && ($rsGuestbook==0))
  {

    header("Location: "."failed_noexist.asp");
  } 

?>
<!--#include file="inc_header.php" -->

<? 
// $rsSanction is of type "ADODB.Recordset"

  $rsSanctionSQL="SELECT Nation_ID FROM Sanctions WHERE (Nation_ID='".intval($_GET["bynation"])."' OR Nation_ID= '".intval($_GET["Nation_ID"])."' ) AND Sanction_Trade = 1 AND (Sanction_Team = '".$rsDetail["Nation_Team"]."' OR Sanction_Team = '".$rsUsers["Nation_Team"]."') ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSanctionSQL);

  $sanctions=0;
  if (!($rsSanction_BOF==1) && !($rsSanction==0))
  {

    $sanctions=1;
  } 


  
  $rsSanction=null;

?>

<!--#include file="calculations.php" -->
<? 
  if (!($rsSent2_BOF==1) && !($rsSent2==0))
  {

//Loop through the recordset

    $counters=0;
    $counters2=0;
    while((!($rsSent2==0)))
    {

      if (($Item["Trade_Cancled"]$Value)==0)
      {

        $counters=$counters+1;
      } 

      if (($Item["Trade_Cancled"]$Value)==1)
      {

        $counters=$counters2+1;
      } 

      $rsSent2=mysql_fetch_array($rsSent2_query);
      $rsSent2_BOF=0;

    } 
  } 

  
  $rsSent2=null;

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

<?     if (strtoupper(.$Item["Nation_Name"].$Value)==strtoupper(.$Item["Nation_Name"].$Value))
    {
?>
<font color="#FF0000">You shouldn't play with yourself like that.</font>
<?     }
      else
    {
?>

<?       if ($activetrades>=$tradeslots)
      {
?>

<p></p>You cannot offer any new trade agreements because your nation is currently involved in <?         echo $activetrades; ?> active trades or trade proposals. You must
reduce this number to below <?         echo $tradeslots; ?> in order to submit new trade proposals.
 <?       }
        else
      {
?>

<?         if ($counters>0)
        {
?>
<p></p>A trade offer has already been submitted between you and <?           echo (.$Item["Nation_Name"].$Value); ?> (<?           echo (.$Item["Poster"].$Value); ?>).
<?         }
          else
        {
?>

<?           if ($counters2>0)
          {
?>
<p></p>You are already trading with <?             echo (.$Item["Nation_Name"].$Value); ?> (<?             echo (.$Item["Poster"].$Value); ?>).
<?           }
            else
          {
?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<div align="center">
<table width="100%" border="0" cellspacing="0">
<tr> 
<td height="278" valign="top"> <div align="center"> 
<p align="left"><b>

This will allow you to offer a trade agreement with <?             echo (.$Item["Poster"].$Value); ?> the ruler of 
<?             echo (.$Item["Nation_Name"].$Value); ?>. Once <?             echo (.$Item["Poster"].$Value); ?> 
accepts your trade offer you will gain access to <?             echo (.$Item["Nation_Name"].$Value); ?>'s resources and they will 
gain access to yours. Your nation is currently involved in <?             echo $activetrades; ?> of <?             echo $tradeslots; ?> active trades or trade proposals.</b></p>
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Trade_Reason.value == "")
  {
    alert("Please enter a value for the \"Trade Reason\" field.");
    theForm.Trade_Reason.focus();
    return (false);
  }

  if (theForm.Trade_Reason.value.length > 30)
  {
    alert("Please enter at most 30 characters in the \"Trade Reason\" field.");
    theForm.Trade_Reason.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'.\",:;*-+!()?/_=’`$&@ \t\r\n\f";
  var checkStr = theForm.Trade_Reason.value;
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
    alert("Please enter only letter, digit, whitespace and \"'.\",:;*-+!()?/_=’`$&@\" characters in the \"Trade Reason\" field.");
    theForm.Trade_Reason.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form name="FrontPage_Form1" method="post" action="trade_form_code.php" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">      

<input name="Trade_Issued_By_User" type="hidden" value="<?             echo (.$Item["Poster"].$Value); ?>">
<input name="Declaring_Nation_ID" type="hidden" value="<?             echo (.$Item["Nation_ID"].$Value); ?>">
<input name="Declaring_Nation" type="hidden" value="<?             echo (.$Item["Nation_Name"].$Value); ?>">
<input name="Declaring_Nation_Team" type="hidden" value="<?             echo (.$Item["Nation_Team"].$Value); ?>">

<input name="Trade_Issued_On_User" type="hidden" value="<?             echo (.$Item["Poster"].$Value); ?>">
<input name="Receiving_Nation_ID" type="hidden" value="<?             echo (.$Item["Nation_ID"].$Value); ?>">
<input name="Receiving_Nation" type="hidden" value="<?             echo (.$Item["Nation_Name"].$Value); ?>">
<input name="Receiving_Nation_Team" type="hidden" value="<?             echo (.$Item["Nation_Team"].$Value); ?>">

<input name="Resource_Sent_1" type="hidden" value="<?             echo (.$Item["Resource1"].$Value); ?>">
<input name="Resource_Sent_2" type="hidden" value="<?             echo (.$Item["Resource2"].$Value); ?>">
<input name="Resource_Receive_1" type="hidden" value="<?             echo (.$Item["Resource1"].$Value); ?>">
<input name="Resource_Receive_2" type="hidden" value="<?             echo (.$Item["Resource2"].$Value); ?>">

<?             if (($Item["Nation_Team"]$Value)==($Item["Nation_Team"]$Value) && ($Item["Nation_Team"]$Value)!="None")
            {
?>
<input name="Trade_Within_Team" type="hidden" value="1">
<?             } ?>


<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=2 bgcolor="#000080">
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. Offer A Trade Proposal With <?             echo (.$Item["Nation_Name"].$Value); ?> (<?             echo (.$Item["Poster"].$Value); ?>) </b></font></td>
</tr>

<tr>
<td align=right width="50%" height="39"><font 
class=textsize9> Reason For Trade Proposal:</font></td>
<td width="50%" height="39">

<!--webbot bot="Validation" s-display-name="Trade Reason" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" s-allow-other-chars="'.&quot;,:;*-+!()?/_=’`$&amp;@" b-value-required="TRUE" i-maximum-length="30" --><input type="text" name="Trade_Reason" size="30" maxlength="30" value="Improved Foreign Relations">

</td>
</tr>

<tr>
<td align=right width="50%" height="37" bgcolor="#FFFFCC">
<font 
class=textsize9>Trade Offered By:</font></td>
<td width="50%" height="37" bgcolor="#FFFFCC"><font class=textsize9> 

<?             if ($rsUser["Color_Blind"]!=1)
            {
?>
<img border="0" src="images/teams/team_<?               echo $rsDetail["Nation_Team"]; ?>.gif" width="14" height="13" title="Team: <?               echo $rsDetail["Nation_Team"]; ?>">&nbsp;

<?             }
              else
            {
?>
Team: <?               echo $rsDetail["Nation_Team"]; ?> - 
<?             } ?>

<a href="nation_drill_display.asp?Nation_ID=<?             echo $rsDetail["Nation_ID"]; ?>"><?             echo $rsDetail["Nation_Name"]; ?></a> - <?             echo (.$Item["Poster"].$Value); ?>



</font></td>
</tr>


<tr>
<td align=right width="50%" height="47" bgcolor="#FFFFCC">My Resources:</td>
<td width="50%" height="47" bgcolor="#FFFFCC">

<? 
            if ($rsDetail["Resource1"]="Aluminum"|$rsDetail["Resource2"]="Aluminum"$then;
$Response->Write("<img src='images/resources/Aluminum.GIF' title='Aluminum'>");
;
          }
)
            {
              if ($rsDetail["Resource1"]="Cattle"|$rsDetail["Resource2"]="Cattle"$then;
$Response->Write("<img src='images/resources/cattle.GIF' title='Cattle'>");
;
            }
)
              {
                if ($rsDetail["Resource1"]="Coal"|$rsDetail["Resource2"]="Coal"$then;
$Response->Write("<img src='images/resources/Coal.GIF' title='Coal'>");
;
              }
)
                {
                  if ($rsDetail["Resource1"]="Fish"|$rsDetail["Resource2"]="Fish"$then;
$Response->Write("<img src='images/resources/Fish.GIF' title='Fish'>");
;
                }
)
                  {
                    if ($rsDetail["Resource1"]="Furs"|$rsDetail["Resource2"]="Furs"$then;
$Response->Write("<img src='images/resources/Furs.GIF' title='Furs'>");
;
                  }
)
                    {
                      if ($rsDetail["Resource1"]="Gold"|$rsDetail["Resource2"]="Gold"$then;
$Response->Write("<img src='images/resources/Gold.GIF' title='Gold'>");
;
                    }
)
                      {
                        if ($rsDetail["Resource1"]="Gems"|$rsDetail["Resource2"]="Gems"$then;
$Response->Write("<img src='images/resources/Gems.GIF' title='Gems'>");
;
                      }
)
                        {
                          if ($rsDetail["Resource1"]="Iron"|$rsDetail["Resource2"]="Iron"$then;
$Response->Write("<img src='images/resources/Iron.GIF' title='Iron'>");
;
                        }
)
                          {
                            if ($rsDetail["Resource1"]="Lead"|$rsDetail["Resource2"]="Lead"$then;
$Response->Write("<img src='images/resources/Lead.GIF' title='Lead'>");
;
                          }
)
                            {
                              if ($rsDetail["Resource1"]="Lumber"|$rsDetail["Resource2"]="Lumber"$then;
$Response->Write("<img src='images/resources/Lumber.GIF' title='Lumber'>");
;
                            }
)
                              {
                                if ($rsDetail["Resource1"]="Marble"|$rsDetail["Resource2"]="Marble"$then;
$Response->Write("<img src='images/resources/Marble.GIF' title='Marble'>");
;
                              }
)
                                {
                                  if ($rsDetail["Resource1"]="Oil"|$rsDetail["Resource2"]="Oil"$then;
$Response->Write("<img src='images/resources/Oil.GIF' title='Oil'>");
;
                                }
)
                                  {
                                    if ($rsDetail["Resource1"]="Pigs"|$rsDetail["Resource2"]="Pigs"$then;
$Response->Write("<img src='images/resources/Pigs.GIF' title='Pigs'>");
;
                                  }
)
                                    {
                                      if ($rsDetail["Resource1"]="Rubber"|$rsDetail["Resource2"]="Rubber"$then;
$Response->Write("<img src='images/resources/Rubber.GIF' title='Rubber'>");
;
                                    }
)
                                      {
                                        if ($rsDetail["Resource1"]="Silver"|$rsDetail["Resource2"]="Silver"$then;
$Response->Write("<img src='images/resources/Silver.GIF' title='Silver'>");
;
                                      }
)
                                        {
                                          if ($rsDetail["Resource1"]="Spices"|$rsDetail["Resource2"]="Spices"$then;
$Response->Write("<img src='images/resources/Spices.GIF' title='Spices'>");
;
                                        }
)
                                          {
                                            if ($rsDetail["Resource1"]="Sugar"|$rsDetail["Resource2"]="Sugar"$then;
$Response->Write("<img src='images/resources/Sugar.GIF' title='Sugar'>");
;
                                          }
)
                                            {
                                              if ($rsDetail["Resource1"]="Uranium"|$rsDetail["Resource2"]="Uranium"$then;
$Response->Write("<img src='images/resources/Uranium.GIF' title='Uranium'>");
;
                                            }
)
                                              {
                                                if ($rsDetail["Resource1"]="Water"|$rsDetail["Resource2"]="Water"$then;
$Response->Write("<img src='images/resources/Water.GIF' title='Water'>");
;
                                              }
)
                                                {
                                                  if ($rsDetail["Resource1"]="Wheat"|$rsDetail["Resource2"]="Wheat"$then;
$Response->Write("<img src='images/resources/Wheat.GIF' title='Wheat'>");
;
                                                }
)
                                                  {
                                                    if ($rsDetail["Resource1"]="Wine"|$rsDetail["Resource2"]="Wine"$then;
$Response->Write("<img src='images/resources/Wine.GIF' title='Wine'>");
;
                                                  }
)
                                                    {
?>

</td>
</tr>
<tr>
<td align=right width="50%">
<font 
class=textsize9>&nbsp;Trade Offered To:</font></td>
<td width="50%"><font class=textsize9> 

<?                                                       if ($rsUser["Color_Blind"]!=1)
                                                      {
?>
<img border="0" src="images/teams/team_<?                                                         echo $rsUsers["Nation_Team"]; ?>.gif" width="14" height="13" title="Team: <?                                                         echo $rsUsers["Nation_Team"]; ?>">&nbsp; 
<?                                                       }
                                                        else
                                                      {
?>
Team: <?                                                         echo $rsUsers["Nation_Team"]; ?> - 
<?                                                       } ?>


<a href="nation_drill_display.asp?Nation_ID=<?                                                       echo $rsUsers["Nation_ID"]; ?>"><?                                                       echo (.$Item["Nation_Name"].$Value); ?></a> - <?                                                       echo (.$Item["Poster"].$Value); ?>

<br>&nbsp;</font></td>
</tr>


<tr>
<td align=right width="50%" height="43">Their Resources:</td>
<td width="50%" height="43">
<? 
                                                      if ($rsUsers["Resource1"]="Aluminum"|$rsUsers["Resource2"]="Aluminum"$then;
$Response->Write("<img src='images/resources/Aluminum.GIF' title='Aluminum'>");
;
                                                    }
)
                                                      {
                                                        if ($rsUsers["Resource1"]="Cattle"|$rsUsers["Resource2"]="Cattle"$then;
$Response->Write("<img src='images/resources/cattle.GIF' title='Cattle'>");
;
                                                      }
)
                                                        {
                                                          if ($rsUsers["Resource1"]="Coal"|$rsUsers["Resource2"]="Coal"$then;
$Response->Write("<img src='images/resources/Coal.GIF' title='Coal'>");
;
                                                        }
)
                                                          {
                                                            if ($rsUsers["Resource1"]="Fish"|$rsUsers["Resource2"]="Fish"$then;
$Response->Write("<img src='images/resources/Fish.GIF' title='Fish'>");
;
                                                          }
)
                                                            {
                                                              if ($rsUsers["Resource1"]="Furs"|$rsUsers["Resource2"]="Furs"$then;
$Response->Write("<img src='images/resources/Furs.GIF' title='Furs'>");
;
                                                            }
)
                                                              {
                                                                if ($rsUsers["Resource1"]="Gold"|$rsUsers["Resource2"]="Gold"$then;
$Response->Write("<img src='images/resources/Gold.GIF' title='Gold'>");
;
                                                              }
)
                                                                {
                                                                  if ($rsUsers["Resource1"]="Gems"|$rsUsers["Resource2"]="Gems"$then;
$Response->Write("<img src='images/resources/Gems.GIF' title='Gems'>");
;
                                                                }
)
                                                                  {
                                                                    if ($rsUsers["Resource1"]="Iron"|$rsUsers["Resource2"]="Iron"$then;
$Response->Write("<img src='images/resources/Iron.GIF' title='Iron'>");
;
                                                                  }
)
                                                                    {
                                                                      if ($rsUsers["Resource1"]="Lead"|$rsUsers["Resource2"]="Lead"$then;
$Response->Write("<img src='images/resources/Lead.GIF' title='Lead'>");
;
                                                                    }
)
                                                                      {
                                                                        if ($rsUsers["Resource1"]="Lumber"|$rsUsers["Resource2"]="Lumber"$then;
$Response->Write("<img src='images/resources/Lumber.GIF' title='Lumber'>");
;
                                                                      }
)
                                                                        {
                                                                          if ($rsUsers["Resource1"]="Marble"|$rsUsers["Resource2"]="Marble"$then;
$Response->Write("<img src='images/resources/Marble.GIF' title='Marble'>");
;
                                                                        }
)
                                                                          {
                                                                            if ($rsUsers["Resource1"]="Oil"|$rsUsers["Resource2"]="Oil"$then;
$Response->Write("<img src='images/resources/Oil.GIF' title='Oil'>");
;
                                                                          }
)
                                                                            {
                                                                              if ($rsUsers["Resource1"]="Pigs"|$rsUsers["Resource2"]="Pigs"$then;
$Response->Write("<img src='images/resources/Pigs.GIF' title='Pigs'>");
;
                                                                            }
)
                                                                              {
                                                                                if ($rsUsers["Resource1"]="Rubber"|$rsUsers["Resource2"]="Rubber"$then;
$Response->Write("<img src='images/resources/Rubber.GIF' title='Rubber'>");
;
                                                                              }
)
                                                                                {
                                                                                  if ($rsUsers["Resource1"]="Silver"|$rsUsers["Resource2"]="Silver"$then;
$Response->Write("<img src='images/resources/Silver.GIF' title='Silver'>");
;
                                                                                }
)
                                                                                  {
                                                                                    if ($rsUsers["Resource1"]="Spices"|$rsUsers["Resource2"]="Spices"$then;
$Response->Write("<img src='images/resources/Spices.GIF' title='Spices'>");
;
                                                                                  }
)
                                                                                    {
                                                                                      if ($rsUsers["Resource1"]="Sugar"|$rsUsers["Resource2"]="Sugar"$then;
$Response->Write("<img src='images/resources/Sugar.GIF' title='Sugar'>");
;
                                                                                    }
)
                                                                                      {
                                                                                        if ($rsUsers["Resource1"]="Uranium"|$rsUsers["Resource2"]="Uranium"$then;
$Response->Write("<img src='images/resources/Uranium.GIF' title='Uranium'>");
;
                                                                     