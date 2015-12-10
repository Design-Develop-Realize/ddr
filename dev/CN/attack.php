<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
?>
<? if ($_POST["attackingnation"]=="")
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
    case "Air_Ground":
      $attackType="Air To Ground Attack";
      break;
    case "Air_Air":
      $attackType="Air To Air Attack";
      break;
    case "Cruise":
      $attackType="Cruise Missile Attack";
      break;
    case "Nuclear":
      $attackType="Nuclear Missile Attack";
      break;
    default:

      $denyreason_session="You must select a valid attack attackType.";
      header("Location: "."activity_denied.asp");
      break;
  } 
?>


<? 
// $rsDefend is of type "ADODB.Recordset"

  $rsDefendSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".intval($_GET["Nation_ID"]);
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsDefendSQL);
?>
<? 
// $rsAttack is of type "ADODB.Recordset"

  $rsAttackSQL="SELECT * FROM Nation WHERE Upper(Poster)='".strtoupper($rsUser["U_ID"])."' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsAttackSQL);
?>
<? 
// $rsSent is of type "ADODB.Recordset"

  $rsSentSQL="SELECT *  FROM WAR WHERE (Upper(War_Declared_On_User) = '".strtoupper($rsDefend["Poster"])."' AND Upper(War_Declared_By_User) = '".strtoupper($rsAttack["Poster"])."')  OR  (Upper(War_Declared_By_User) = '".strtoupper($rsDefend["Poster"])."' AND Upper(War_Declared_ON_User) = '".strtoupper($rsAttack["Poster"])."') AND (Receiving_Nation_Peace + Declaring_Nation_Peace <> 0) AND (Nation_Deleted <> 0) AND (War_Declaration_Date >= getdate()-7) ORDER BY War_Declaration_Date DESC";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSentSQL);

  $activewars=0;

  if (!($rsSent_BOF==1) && !($rsSent==0))
  {

    $activewars=$activewars+1;


    if ($activewars><0)
    {

?>	
<!--#include file="attack_calculation.php" -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
<td height="0" valign="top">
<div align="center">
<table width="100%" border="0" cellspacing="0">
<tr> 
<td height="278" valign="top"> <div align="center"> 

     

<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=4 bgcolor="#000080">
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. <?       echo $attackType; ?></b></font></td>
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
<td width="28%" bgcolor="#FFFFCC"><?       echo $FormatNumber[(.$Item["Infrastructure_Purchased"].$Value)][2]; ?></td>
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
<?       echo $attackingdefcon; ?></font></td>
<td align=left width="21%">
<font 
class=textsize9>Defending DEFCON:</font></td>
<td width="28%"><font class=textsize9> 


<?       echo $defendingdefcon; ?>

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

<p align="left"><br><br><b><font color="#FF0000">	</p>
<p></p>
<p>

<?       if ($_GET["type"]=="Cautious_Ground" || $_GET["type"]=="Planned_Ground" || $_GET["type"]=="Standard_Ground" || $_GET["type"]=="Aggressive_Ground")
      {
?>
	<?         if ($attackingsoldiers<($defendingsoldiers/10))
        {
?>
	You cannot attack at this time. You do not have enough 
	deployed soldiers. You cannot battle if you have less than 10% of your enemy's defending soldiers.<br>
		<?         }
          else
        {
          if ($defendingsoldiers<10)
          {
?>
		<p align="left">You cannot attack <?             echo (.$Item["Nation_Name"].$Value); ?> at this time because they do 
		not have 
		enough defending soldiers to fight your forces. The government of <?             echo (.$Item["Nation_Name"].$Value); ?> has 
		just been sent into Anarchy due to their lack of security forces. Riots engulf the nation of <?             echo (.$Item["Nation_Name"].$Value); ?>
		as your soldiers relax and enjoy their victory.
		<? 
            if (!isset(("Military_Depleated")) || ("Military_Depleated")!=time()())
            {


              //Military_Depleated") = date()              //Government_Type") = "Anarchy"              //Government_Changed") = date()              //Tanks_Defending") = 0              //Tanks_Deployed") = 0
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

// $rsAddComments is of type "ADODB.Recordset"

              $rsAddCommentsSQL="SELECT * FROM EMESSAGES;";
                            echo 0;
                            echo 2;
                            echo 3;
              $rs=mysql_query($rsAddCommentsSQL);
              $rsAddComments_numRows=0;

              

//Add a new record to the recordset

              //U_ID") = (rsDefend.Fields.Item("Poster").Value)               //MESS_FROM") =  (rsAttack.Fields.Item("Poster").Value)               //MESSAGE") = "Your nation has been defeated in battle. You do not have enough troops to defend your nation and your government has been thrown into Anarchy. You have lost all of your tanks, " & FormatNumber(infrasdefeat,2) & " infrastructure has been destroyed, and " & FormatNumber(techdefeat,2) & " technology was lost due to the invasion and resulting riots."              //SUBJECT") = "Defeat Alert"              //MESS_READ") = "False"
//Write the updated recordset to the database

              
?>
		Your raiding party has destroyed all defending tanks within <?               echo (.$Item["Nation_Name"].$Value); ?> and destroyed
		<?               echo $FormatNumber[$techdefeat][2]; ?> technology and <?               echo $FormatNumber[$infrasdefeat][2]; ?> infrastructure. 
		
		<?             } ?>
	
	<?           }
            else
          {
?>
	<form name="FrontPage_Form1" method="post" action="attack_ground.asp?type=<?             echo $_GET["type"]; ?>"> 
	<input name="attackingnation" type="hidden" value="<?             echo (.$Item["Nation_Name"].$Value); ?>">
	<input name="bynation" type="hidden" value="<?             echo (.$Item["Nation_ID"].$Value); ?>">
	<input name="defendingnation" type="hidden" value="<?             echo (.$Item["Nation_Name"].$Value); ?>">
	<input name="receivingnation" type="hidden" value="<?             echo (.$Item["Nation_ID"].$Value); ?>">
	<input name="receivinguser" type="hidden" value="<?             echo (.$Item["Poster"].$Value); ?>">
	<input name="attackinguser" type="hidden" value="<?             echo (.$Item["Poster"].$Value); ?>">
	<input name="goforlaunch" type="hidden" value="1">
	<!--#include file="activitycheck.php" -->	
	<input name=submit2 type=submit class="Buttons" id=submit2 value="Ground Attack"></font>
	</form>
	<?           } ?>
	<?         } ?>
<?       } ?>


<?       if ($_GET["type"]=="Air_Ground" || $_GET["type"]=="Air_Air")
      {
?>
	<form name="FrontPage_Form2" method="post" action="attack_air.asp?type=<?         echo $_GET["type"]; ?>"> 
	<input name="attackingnation" type="hidden" value="<?         echo (.$Item["Nation_Name"].$Value); ?>">
	<input name="bynation" type="hidden" value="<?         echo (.$Item["Nation_ID"].$Value); ?>">
	<input name="defendingnation" type="hidden" value="<?         echo (.$Item["Nation_Name"].$Value); ?>">
	<input name="receivingnation" type="hidden" value="<?         echo (.$Item["Nation_ID"].$Value); ?>">
	<input name="receivinguser" type="hidden" value="<?         echo (.$Item["Poster"].$Value); ?>">
	<input name="attackinguser" type="hidden" value="<?         echo (.$Item["Poster"].$Value); ?>">
	<input name="goforlaunch" type="hidden" value="1">
	<!--#include file="activitycheck.php" -->	
	<input name=submit2 type=submit class="Buttons" id=submit2 value="Air Attack"></font>
	</form>
<?       } ?>

<?       if ($_GET["type"]=="Cruise")
      {
?>
	<form name="FrontPage_Form3" method="post" action="attack_nuclear.php"> 
	<input name="attackingnation" type="hidden" value="<?         echo (.$Item["Nation_Name"].$Value); ?>">
	<input name="bynation" type="hidden" value="<?         echo (.$Item["Nation_ID"].$Value); ?>">
	<input name="defendingnation" type="hidden" value="<?         echo (.$Item["Nation_Name"].$Value); ?>">
	<input name="receivingnation" type="hidden" value="<?         echo (.$Item["Nation_ID"].$Value); ?>">
	<input name="receivinguser" type="hidden" value="<?         echo (.$Item["Poster"].$Value); ?>">
	<input name="attackinguser" type="hidden" value="<?         echo (.$Item["Poster"].$Value); ?>">
	<input name="goforlaunch" type="hidden" value="1">
	<!--#include file="activitycheck.php" -->	
	<input name=submit2 type=submit class="Buttons" id=submit2 value="Missile Attack"></font>
	</form>
<?       } ?>

<?       if ($_GET["type"]=="Nuclear")
      {
?>
	<form name="FrontPage_Form4" method="post" action="attack_cruise.php"> 
	<input name="attackingnation" type="hidden" value="<?         echo (.$Item["Nation_Name"].$Value); ?>">
	<input name="bynation" type="hidden" value="<?         echo (.$Item["Nation_ID"].$Value); ?>">
	<input name="defendingnation" type="hidden" value="<?         echo (.$Item["Nation_Name"].$Value); ?>">
	<input name="receivingnation" type="hidden" value="<?         echo (.$Item["Nation_ID"].$Value); ?>">
	<input name="receivinguser" type="hidden" value="<?         echo (.$Item["Poster"].$Value); ?>">
	<input name="attackinguser" type="hidden" value="<?         echo (.$Item["Poster"].$Value); ?>">
	<input name="goforlaunch" type="hidden" value="1">
	<!--#include file="activitycheck.php" -->	
	<input name=submit2 type=submit class="Buttons" id=submit2 value="Missile Attack"></font>
	</form>
<?       } ?>




</b><font color="#FF0000">


<b></div>

<br>

</td>
</tr>
</tbody>
</table>
<p align="left">



</font>

</div>

<p>


<? 
      switch ($_GET["type"])
      {
        case "Cautious_Ground":
          print "<img border='0' src='images/attack_cautious.jpg'>";
          break;
        case "Standard_Ground":
          print "<img border='0' src='images/attack_standard.jpg'>";
          break;
        case "Planned_Ground":
          print "<img border='0' src='images/attack_planned.jpg'>";
          break;
        case "Aggressive_Ground":
          print "<img border='0' src='images/attack_agressive.jpg'>";
          break;
        case "Air_Ground":
          print "<img border='0' src='images/attack_ground.jpg'>";
          break;
        case "Air_Air":
          print "<img border='0' src='images/attack_air.jpg'>";
          break;
        case "Cruise":
          print "<img border='0' src='images/attack_cruise.jpg'>";
          break;
        case "Nuclear":
          print "<img border='0' src='images/attack_nuke.jpg'>";
          break;
      } 
?>
</p>
<p>&nbsp;</p>
</div></td>
</tr>
</table>
</div>
<p>&nbsp; </p> <br>

</td>
</tr>
</table>

<?     } ?>
<?     if ($activewars==0)
    {
?>	
<br>
Please stop trying to cheat.
<?     } ?><?   } ?><!--#include file="inc_footer.php" --><? 
  
  $rsSent=null;

  
  $rsAttack=null;

  
  $rsDefend=null;

$objConn->Close;
  $objConn=null;

?><? } ?>
