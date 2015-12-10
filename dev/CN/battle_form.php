<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<? 
if ($_POST["attackingnation"]=="")
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

<!--#include file="inc_header.php" -->
<? 
  $rsSent__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsSent__MMColParam=$MM_Username_session;
  } ?>

<? 
  $lngRecordNo1=intval($_GET["Nation_ID"]);
  $lngRecordNo1=str_replace("'","''",$lngRecordNo1);
// $rsDefend is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT * FROM Nation WHERE Nation_ID='".$lngRecordNo1."' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  if (($rsDefend_BOF==1) && ($rsDefend==0))
  {

    header("Location: "."failed_noexist.asp");
  } 



// $rsAttack is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT * FROM Nation WHERE Upper(Poster)='".strtoupper($rsUser["U_ID"])."'  ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $lngRecordNo2=$rsAttack["Nation_ID"];

// $rsSent is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT * FROM WAR WHERE (Receiving_Nation_ID = '".$rsAttack["Nation_ID"]."' OR Receiving_Nation_ID = '".$rsDefend["Nation_ID"]."') AND (Declaring_Nation_ID = '".$rsAttack["Nation_ID"]."' OR Declaring_Nation_ID = '".$rsDefend["Nation_ID"]."') AND (Nation_Deleted = 0) AND (Receiving_Nation_Peace + Declaring_Nation_Peace <> 2) AND (getdate() - War_Declaration_Date < 8)  ORDER BY War.War_Declaration_Date DESC";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();

  $activewars=0;
  if (!($rsSent_BOF==1) && !($rsSent==0))
  {

    $activewars=1;
  } 



  switch ($_GET["type"])
  {
    case "Cautious_Ground":
      $attackType="Cautious Ground Attack";
      break;
    case "Standard_Ground":
      $attackType="Standard Ground Attack";
      break;
    case "Planned_Ground":
      $attackType="Planned Ground Attack";
      break;
    case "Aggressive_Ground":
      $attackType="Aggressive Ground Attack";
      break;
    default:

      $denyreason_session="You must select a valid ground attack type.";
      header("Location: "."activity_denied.asp");
      break;
  } 
?>


<!--#include file="battle_form_calculation.php" -->




<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
  {
?>
Please stop trying to cheat. 
<?   }
    else
  {
?>


<?     if ($activewars==0)
    {
?><p></p>	
You are not at war with that nation. Please stop trying to cheat.
<?     }
      else
    {
?>
<p align="center">
<?       if (!isset($rsDefend["Flag"]) || $rsDefend["Flag"]="images/flags/None.jpg"|!isset($rsAttack["Flag"])|$rsAttack["Flag"]="images/flags/None.jpg"$then;
;
    }
      else
    {


<img src="<? )
    {
      echo $rsAttack["Flag"];     } ?>"> vs. <img src="<?     echo $rsDefend["Flag"]; ?>">
<?   } ?>
<? 
  $declaring=0;
  $receiving=0;
  $cleartobattle=0;
  if ($rsSent["Declaring_Nation_ID"]=$rsAttack["Nation_ID"]$then$declaring=1;
}
;
$if$rsSent["Receiving_Nation_ID"]=$rsAttack["Nation_ID"]$then$receiving=1;
}
;
)
  {


    $AND$rsSent["Declaring_Attack_Date2"]=time()()$then; ; ?>
<p></p>You have been involved in two ground battles today against <?     echo $rsDefend["Nation_Name"]; ?>. Your forces in this region are exhausted 
and cannot battle <?     echo $rsDefend["Nation_Name"]; ?> at this time.
<?   }
    else
  {
    if ($declaring==1 && $rsSent["Declaring_Attack_Date1"]=time()()$then;
$cleartobattle==1)
    {
?>
<p></p>You have been involved in one ground battle today against <?       echo $rsDefend["Nation_Name"]; ?>. You have
one more ground battle attack left.
<?     }
      else
    {
      if ($declaring==1)
      {

        $cleartobattle=1;
?>
<p></p>This will be your first ground battle against <?         echo $rsDefend["Nation_Name"]; ?> today. You
will be able to carry out a total of two ground battle attacks against <?         echo $rsDefend["Nation_Name"]; ?> today.
<?       } ?><?     } ?><?   } ?>


<?   if ($receiving==1 && $rsSent["Receiving_Attack_Date2"]=time()()$then; )
  {

    $p>$You$have$been$involved$in$two$ground$battles$today$against<$%=$rsDefend["Nation_Name"]; ?>. Your forces in this region are exhausted 
and cannot battle <?     echo $rsDefend["Nation_Name"]; ?> at this time.
<?   }
    else
  {
    if ($receiving==1 && $rsSent["Receiving_Attack_Date1"]=time()()$then;
$cleartobattle==1)
    {
?>
<p></p>You have been involved in one ground battle today against <?       echo $rsDefend["Nation_Name"]; ?>. You have
one more ground battle attack left.
<?     }
      else
    {
      if ($receiving==1)
      {

        $cleartobattle=1;
?>
<p></p>This will be your first ground battle against <?         echo $rsDefend["Nation_Name"]; ?> today. You
will be able to carry out a total of two ground battle attacks against <?         echo $rsDefend["Nation_Name"]; ?> today.
<?       } ?>
<?     } ?>




<?     if ($cleartobattle==1)
    {
?>




<br>
&nbsp;<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<div align="center">
<table width="100%" border="0" cellspacing="0">
<tr> 
<td height="278" valign="top"> <div align="center"> 

<form name="FrontPage_Form1" method="post" action="battle_form_code.php">      

<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=4 bgcolor="#000080">
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. <?       echo $attackType; ?> </b></font></td>
</tr>
<tr>
<td align=left width="49%" bgcolor="#FFFFCC" colspan="2" height="28">

<p align="center"><b><a href="nation_drill_display.asp?Nation_ID=<?       echo $rsAttack["Nation_ID"]; ?>">
<?       echo (.$Item["Nation_Name"].$Value); ?></a> </b></td>

<td align=left width="49%" colspan="2" height="28">
<p align="center"><b><a href="nation_drill_display.asp?Nation_ID=<?       echo $rsDefend["Nation_ID"]; ?>">
<?       echo (.$Item["Nation_Name"].$Value); ?></a> </b></td>
</tr>
<tr>
<td align=left width="21%" bgcolor="#FFFFCC">

Attacking Ruler<font 
class=textsize9>:</font></td>
<td width="28%" bgcolor="#FFFFCC"><font class=textsize9> 
 <?       echo (.$Item["Poster"].$Value); ?>
</font></td>

<td align=left width="21%">
Defending Ruler<font 
class=textsize9>:</font></td>
<td width="28%"><font class=textsize9> 
 
<?       echo (.$Item["Poster"].$Value); ?>

</font></td>
</tr>
<tr>
<td align=left width="21%" bgcolor="#FFFFCC">
Deployed Soldiers<font 
class=textsize9>:</font></td>
<td width="28%" bgcolor="#FFFFCC"><font class=textsize9> 
<?       echo $attackingsoldiers; ?> 


</font></td>
<td align=left width="21%">
Defending Soldiers<font 
class=textsize9>:</font></td>
<td width="28%"><font class=textsize9> 
<?       echo $FormatNumber[$defendingsoldiers][0]; ?>
</font></td>
</tr>
<tr>
<td align=left width="21%" bgcolor="#FFFFCC">
Deployed<font 
class=textsize9> Tanks:</font></td>
<td width="28%" bgcolor="#FFFFCC"><font class=textsize9> 
<?       echo $attackingtanks; ?></font></td>
<td align=left width="21%">
Defending Tanks<font 
class=textsize9>:</font></td>
<td width="28%"><font class=textsize9> 
<?       echo $defendingtanks; ?>


</font></td>
</tr>
<tr>
<td align=left width="21%" bgcolor="#FFFFCC">
<font 
class=textsize9>Attacking Technology:</font></td>
<td width="28%" bgcolor="#FFFFCC"><font class=textsize9> 
<?       echo $FormatNumber[(.$Item["Technology_Purchased"].$Value)][2]; ?></font></td>
<td align=left width="21%">
<font 
class=textsize9>Defending Technology:</font></td>
<td width="28%"><font class=textsize9> 
<?       echo $FormatNumber[(.$Item["Technology_Purchased"].$Value)][2]; ?>


</font></td>
</tr>
<tr>
<td align=left width="21%" bgcolor="#FFFFCC">
Attacking Infrastructure:</td>
<td width="28%" bgcolor="#FFFFCC"><?       echo $FormatNumber[$rsAttack["Infrastructure_Purchased"]][2]; ?></td>
<td align=left width="21%">
<font 
class=textsize9>Defending Infrastructure:</font></td>
<td width="28%"><font class=textsize9> 
<?       echo $FormatNumber[(.$Item["Infrastructure_Purchased"].$Value)][2]; ?>


</font></td>
</tr>
<tr>
<td align=left width="21%" bgcolor="#FFFFCC">
<font 
class=textsize9>Attacking Land Area:</font></td>
<td width="28%" bgcolor="#FFFFCC"><font class=textsize9> 


<?       echo ($FormatNumber[$attackingnationsize][3]); ?></font></td>
<td align=left width="21%">
<font 
class=textsize9>Defending Land Area:</font></td>
<td width="28%"><font class=textsize9> 
<?       echo ($FormatNumber[$defendingnationsize][3]); ?>


</font></td>
</tr>
<tr>
<td align=left width="21%" bgcolor="#FFFFCC">
<font 
class=textsize9>Attacking DEFCON:</font></td>
<td width="28%" bgcolor="#FFFFCC"><font class=textsize9> 
<?       if ($attackingdefcon==5)
      {
?>
<img src="images/DEFCON/DEFCON5.gif" title="DEFCON 5 - Normal peacetime military readiness.">
<?       } ?>
<?       if ($attackingdefcon==4)
      {
?>
<img src="images/DEFCON/DEFCON4.gif" title="DEFCON 4 - Normal military readiness, increased intelligence and strengthened security measures.">
<?       } ?>
<?       if ($attackingdefcon==3)
      {
?>
<img src="images/DEFCON/DEFCON3.gif" title="DEFCON 3 - Increased military readiness above normal readiness.">
<?       } ?>
<?       if ($attackingdefcon==2)
      {
?>
<img src="images/DEFCON/DEFCON2.gif" title="DEFCON 2 - Increased military readiness, but less than maximum readiness.">
<?       } ?>
<?       if ($attackingdefcon==1)
      {
?>
<img src="images/DEFCON/DEFCON1.gif" title="DEFCON 1 - Maximum military readiness.">
<?       } ?>
</font></td>
<td align=left width="21%">
<font 
class=textsize9>Defending DEFCON:</font></td>
<td width="28%"><font class=textsize9> 
<?       if ($defendingdefcon==5)
      {
?>
<img src="images/DEFCON/DEFCON5.gif" title="DEFCON 5 - Normal peacetime military readiness.">
<?       } ?>
<?       if ($defendingdefcon==4)
      {
?>
<img src="images/DEFCON/DEFCON4.gif" title="DEFCON 4 - Normal military readiness, increased intelligence and strengthened security measures.">
<?       } ?>
<?       if ($defendingdefcon==3)
      {
?>
<img src="images/DEFCON/DEFCON3.gif" title="DEFCON 3 - Increased military readiness above normal readiness.">
<?       } ?>
<?       if ($defendingdefcon==2)
      {
?>
<img src="images/DEFCON/DEFCON2.gif" title="DEFCON 2 - Increased military readiness, but less than maximum readiness.">
<?       } ?>
<?       if ($defendingdefcon==1)
      {
?>
<img src="images/DEFCON/DEFCON1.gif" title="DEFCON 1 - Maximum military readiness.">
<?       } ?>
</font></td>
</tr>
<tr>
<td align=left width="21%" bgcolor="#FFFFCC">
<font 
class=textsize9>Attacking Money:</font></td>
<td width="28%" bgcolor="#FFFFCC"><font class=textsize9> 


$<?       echo ($FormatNumber[$attackingmoney][2]); ?></font></td>
<td align=left width="21%">
<font 
class=textsize9>Defending Money:</font></td>
<td width="28%"><font class=textsize9> 

$<?       echo ($FormatNumber[$defendingmoney][2]); ?>

</font></td>
</tr>
<tr>

<td align=left width="21%" bgcolor="#FFFFCC">
Battle Odds<font 
class=textsize9>:</font></td>
<td width="28%" bgcolor="#FFFFCC"><font class=textsize9> 
<?       echo $attackingchance; ?>% Chance of Victory</font></td>
<td align=left width="21%">
Battle Odds<font 
class=textsize9>:</font></td>
<td width="28%"><font class=textsize9> 
<?       echo $defendingchance; ?>% Chance of Victory</font></td>
</tr>
<tr class=colorformfields> 
<td colspan=4><div align="center"><font class=textsize9> 


<p align="left"> 






<input name="attackingnation" type="hidden" value="<?       echo (.$Item["Nation_Name"].$Value); ?>">
<input name="bynation" type="hidden" value="<?       echo (.$Item["Nation_ID"].$Value); ?>">
<input name="defendingnation" type="hidden" value="<?       echo (.$Item["Nation_Name"].$Value); ?>">
<input name="receivingnation" type="hidden" value="<?       echo (.$Item["Nation_ID"].$Value); ?>">
<input name="receivinguser" type="hidden" value="<?       echo (.$Item["Poster"].$Value); ?>">
<input name="attackinguser" type="hidden" value="<?       echo (.$Item["Poster"].$Value); ?>">
<input name="goforlaunch" type="hidden" value="1">


<p align="left"><br><br><b><font color="#FF0000">


<?       if ($attackingchance<10)
      {
?>


You cannot attack at this time. Your attacking odds are currently at <?         echo $attackingchance; ?>% and are not high enough to battle <?         echo (.$Item["Nation_Name"].$Value); ?> at this time. You must have at least a 10% chance of victory in order to battle.<br>


<?       }
        else
      {
        if ($defendingchance<10)
        {
?>
<p align="left">You cannot attack <?           echo (.$Item["Nation_Name"].$Value); ?> at this time because their battle odds are at <?           echo $defendingchance; ?>% and are not high enough to fight your forces. The government of <?           echo (.$Item["Nation_Name"].$Value); ?> has 
just been sent into Anarchy due to their lack of security forces. Riots engulf the nation of <?           echo (.$Item["Nation_Name"].$Value); ?>
as your soldiers relax and enjoy their victory.

<? 
          if (!isset(("Military_Depleated")) || ("Military_Depleated")!=time()())
          {


            //Military_Depleated") = date()            //Government_Type") = "Anarchy"            //Government_Changed") = date()            //Tanks_Defending") = 0            //Tanks_Deployed") = 0
            $techdefeat=("Technology_Purchased")*.05;
            if ($techdefeat>5)
            {
              $techdefeat=5;
            }
;
            } 
            //Technology_Purchased") = rsDefend.Fields("Technology_Purchased") - techdefeat
            $infrasdefeat=("Infrastructure_Purchased")*.20;
            if ($infrasdefeat>20)
            {
              $infrasdefeat=20;
            }
;
            } 
            //Infrastructure_Purchased") = rsDefend.Fields("Infrastructure_Purchased") - infrasdefeat             





// Send the defender a message telling them what happened.

// $adoCon is of type "ADODB.Connection"

            $a2p_connstr==$MM_conn_STRING_Messages;
            $a2p_uid=strstr($a2p_connstr,'uid');
            $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
            $a2p_pwd=strstr($a2p_connstr,'pwd');
            $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
            $a2p_database=strstr($a2p_connstr,'dsn');
            $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
            $adoCon=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
            mysql_select_db($a2p_database,$adoCon);
// $rsAddComments is of type "ADODB.Recordset"

            $strSQL="EMESSAGES";
                        echo 2;
                        echo 3;
            $rs=mysql_query($strSQL);

//Add a new record to the recordset

            //U_ID") = (rsDefend.Fields.Item("Poster").Value)             //MESS_FROM") =  (rsAttack.Fields.Item("Poster").Value)             //MESSAGE") = "Your nation has been defeated in battle. You do not have enough troops to defend your nation and your government has been thrown into Anarchy. You have lost all of your tanks, " & FormatNumber(infrasdefeat,2) & " infrastructure has been destroyed, and " & FormatNumber(techdefeat,2) & " technology was lost due to the invasion and resulting riots. What troops you did have deployed have also been returned home."            //SUBJECT") = "Defeat Alert"            //MESS_READ") = "False"


//Write the updated recordset to the database

            
?>
Your raiding party has destroyed all defending tanks within <?             echo (.$Item["Nation_Name"].$Value); ?> and destroyed
<?             echo $FormatNumber[$techdefeat][2]; ?> technology and <?             echo $FormatNumber[$infrasdefeat][2]; ?> infrastructure. 

<? 
          } 

?>

<?         }
          else
        {
?>
</p>
<p></p>

	<p>

	<!--#include file="activitycheck.php" -->	
	<input name="type" type="hidden" value="<?           echo $attackType; ?>">
	<input name=submit2 type=submit class="Buttons" id=submit2 value="<?           echo $attackType; ?>"></font>
	

<?         } ?><?       } ?>



</b><font color="#FF0000">


<b><br>
&nbsp;</div>

<br>

</td>
</tr>
</tbody>
</table>
<p align="left">



</font>

</div>
</form>
<p><img border="0" src="http://cybernations.net/images/battle1.jpg"></p>
<p>&nbsp;</p>
</div></td>
</tr>
</table>
</div>



</td>
</tr>
</table>

<?     } ?>
<?     if ($activewars==0)
    {
?>	
<br>
Please stop trying to cheat.
<?     } ?><?   } ?><? } ?><? } ?><!--#include file="inc_footer.php" --><? 

$rsSent=null;


$rsAttack=null;


$rsDefend=null;

$objConn->Close;
$objConn=null;

?><? >
