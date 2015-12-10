<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
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
switch ($_POST["type"])
{
  case "Cautious Ground Attack":
    break;
  case "Standard Ground Attack":
    break;
  case "Planned Ground Attack":
    break;
  case "Aggressive Ground Attack":
    break;
  default:

    $denyreason_session="You must select a valid ground attack type.";
    header("Location: "."activity_denied.asp");
    break;
} 
?>
<? 
// $rsGuestbook0 is of type "ADODB.Recordset"

$rsGuestbook0SQL="SELECT Nation_ID FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbook0SQL);

$lngRecordNo1=intval($_POST["receivingnation"]);
$lngRecordNo1=str_replace("'","''",$lngRecordNo1);
// $rsDefend is of type "ADODB.Recordset"

$rsDefendSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo1;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsDefendSQL);
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
if (($rsSent_BOF==1) && ($rsSent==0))
{

  $denyreason_session="You may not attack a nation that you are not at war against.";
  header("Location: "."activity_denied.asp");
} 


$rsSent=null;

?>

<!--#include file="activity.php" -->

<!--#include file="battle_form_calculation.php" -->


<? if ($_POST["goforlaunch"]!=1)
{

  $denyreason_session="You may not attack a nation that you are not at war against.";
  header("Location: "."activity_denied.asp");
} 

?>


<? if ($defendingsoldiercasualties=="" || $defendingtankcasualties=="" || $attackingsoldiercasualties=="" || $attackingtankcasualties=="")
{

  $denyreason_session="There was a system error during the battle. Please try again.";
  header("Location: "."activity_denied.asp");
} 

?>




<? 
// Determine battle outcome for the defender

if ($attackingrndodds<$defendingrndodds)
{

  $battleoutcome="Defeat";
}
  else
{
  if ($attackingrndodds==$defendingrndodds)
  {

    $battleoutcome="Draw";
  }
    else
  {

    $battleoutcome="Victory";
  } 

} 

?>


<? 
// defending nation first

// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo1;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);
$rsUpdateEntry_numRows=0;

if (($actualdefend-$defendingsoldiercasualties)<=($actualdefend*30) || ($actualdefend-$defendingsoldiercasualties)<=($defendingcitizens/15))
{

  //Military_Depleated") = date()  //Government_Type") = "Anarchy"  //Government_Changed") = date()} 


if (intval($defendingsoldiercasualties)>intval($attackingsoldiercasualties*1.50))
{

  $landsgained=("Land_Purchased")*.04;
  if ($landsgained>75)
  {
    $landsgained=75;
  }
;
  } 
  if ($landsgained>0)
  {

    //Land_Purchased") = rsUpdateEntry.Fields("Land_Purchased")-landsgained  } 


  if (("Infrastructure_Purchased")>2)
  {

    $infrastructuredestroyed=("Infrastructure_Purchased")*.04;
    if ($infrastructuredestroyed>20)
    {
      $infrastructuredestroyed=20;
    }
;
    } 
    //Infrastructure_Purchased") = rsUpdateEntry.Fields("Infrastructure_Purchased")-infrastructuredestroyed  } 


  $techdestroyed=0;
  if (("Technology_Purchased")>10)
  {

    $techdestroyed=("Technology_Purchased")*.05;
    if ($techdestroyed>5)
    {
      $techdestroyed=5;
    }
;
    } 
    //Technology_Purchased") = rsUpdateEntry.Fields("Technology_Purchased")-techdestroyed   } 

} 




if ($battleoutcome=="Victory")
{
//Defeat for defender

  //Money_Spent") = rsUpdateEntry.Fields("Money_Spent") + passeddefendingmoney  $defendmoneylost=$passeddefendingmoney;
} 

if ($battleoutcome=="Defeat")
{
//Victory for defender

  //Money_Earned") = rsUpdateEntry.Fields("Money_Earned") + passedattackingmoney   $defendmoneygained=$passedattackingmoney;


} 



//Military_Defending_Casualties") = rsUpdateEntry.Fields("Military_Defending_Casualties") + defendingsoldiercasualties
if (!isset(("Tanks_Defending")))
{

  $numtanksdefending=0;
}
  else
{

  $numtanksdefending=("Tanks_Defending");
} 

//Tanks_Defending") = numtanksdefending - defendingtankcasualties



?>
 

<? 
// attacking nation second

//Dim rsUpdateEntry

//Dim rsUpdateEntrySQL

$lngRecordNo2=intval($_POST["bynation"]);
// $rsUpdateEntry is of type "ADODB.Recordset"

$rsUpdateEntrySQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo2;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsUpdateEntrySQL);
$rsUpdateEntry_numRows=0;


if ($landsgained>0)
{

  //Land_Purchased") = rsUpdateEntry.Fields("Land_Purchased") + landsgained} 

if ($techdestroyed>0)
{

  //Technology_Purchased") = rsUpdateEntry.Fields("Technology_Purchased") + techdestroyed} 


//Military_Attacking_Casualties") = rsUpdateEntry.Fields("Military_Attacking_Casualties") + attackingsoldiercasualties//Military_Deployed") = rsUpdateEntry.Fields("Military_Deployed") - attackingsoldiercasualties




if (!isset(("Tanks_Deployed")))
{

  $numtanksdeployed=0;
}
  else
{

  $numtanksdeployed=("Tanks_Deployed");
} 

//Tanks_Deployed") = numtanksdeployed - attackingtankcasualties





if ($battleoutcome=="Victory")
{
//Victory for the attacker

  //Money_Earned") = rsUpdateEntry.Fields("Money_Earned") + passeddefendingmoney  $attackmoneygained=$passeddefendingmoney;


} 

if ($battleoutcome=="Defeat")
{
//Defeat for the attacker

  //Money_Spent") = rsUpdateEntry.Fields("Money_Spent") + passedattackingmoney  $attackmoneylost=$passedattackingmoney;
} 



//Write the updated recordset to the database








//Update the battle dates in the war table


$rsAttack=null;

$lngRecordNo=intval($_POST["receivingnation"]);
$lngRecordNo2=intval($_POST["bynation"]);
// $rsAttack is of type "ADODB.Recordset"

$rsAttackSQL="SELECT Receiving_Nation_ID,Declaring_Nation_ID,Receiving_Attack_Date2,Receiving_Attack_Date1,Declaring_Attack_Date2,Declaring_Attack_Date1 FROM WAR WHERE (Receiving_Nation_ID = '".$lngRecordNo."' OR Declaring_Nation_ID = '".$lngRecordNo."') AND (Receiving_Nation_ID = '".$lngRecordNo2."' OR Declaring_Nation_ID = '".$lngRecordNo2."') AND (Nation_Deleted = 0) AND (Receiving_Nation_Peace + Declaring_Nation_Peace <> 2) AND (getdate() - War_Declaration_Date < 8)  ORDER BY War.War_Declaration_Date DESC";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsAttackSQL);

$receivingattack=0;
$declaringattack=0;
if ($rsAttack["Receiving_Nation_ID"]=$lngRecordNo2$then$receivingattack=1;
}
;
$if$rsAttack["Declaring_Nation_ID"]=$lngRecordNo2$then$declaringattack=1;
}
;
)
{
  if ($receivingattack==0 && $declaringattack==0)
  {

    $denyreason_session="There was an error in your form submission.";
    header("Location: "."activity_denied.asp");
  } 
} 



if ($receivingattack==1)
{

  if (("Receiving_Attack_Date2")==time()())
  {

    $denyreason_session="You have already been involved in two ground attacks today and cannot ground attack again until tomorrow.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    if (("Receiving_Attack_Date1")==time()())
    {

      //Receiving_Attack_Date2") = date()    }
      else
    {

      //Receiving_Attack_Date1") = date()    } 

  } 

} 

if ($declaringattack==1)
{

  if (("Declaring_Attack_Date2")==time()())
  {

    $denyreason_session="You have already been involved in two ground attacks today and cannot ground attack again until tomorrow.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    if (("Declaring_Attack_Date1")==time()())
    {

      //Declaring_Attack_Date2") = date()    }
      else
    {

      //Declaring_Attack_Date1") = date()    } 

  } 

} 


//Write the updated recordset to the database



$rsAttack=null;



if ($battleoutcome=="Defeat")
{
  $messagebattle="Victory";
}
;
} 
if ($battleoutcome=="Victory")
{
  $messagebattle="Defeat";
}
;
} 
if ($battleoutcome=="Draw")
{
  $messagebattle="Draw";
}
;
} 

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

//U_ID") = Request.Form("receivinguser")//MESS_FROM") =  Request.Form("attackinguser") //MESSAGE") = "You have been attacked by " & Request.Form("attackinguser")  & ". You lost " & defendingsoldiercasualties &  " soldiers and " & defendingtankcasualties &" tanks. You killed " & attackingsoldiercasualties & " soldiers and " & attackingtankcasualties &" tanks. Their forces razed " & FormatNumber(landsgained,3) & " miles of your land, stole " & FormatNumber(techdestroyed,3) &" technology, and destroyed " & FormatNumber(infrastructuredestroyed,3) & " infrastructure. Their forces looted $" & FormatNumber(attackmoneygained,2) &" from you and you gained $"& FormatNumber(defendmoneygained,2) &" in your enemy's abandoned equipment. In the end the battle was a " & messagebattle & "."//SUBJECT") = "Battle Report"//MESS_READ") = "False"//From_System") = 1


//Write the updated recordset to the database





//Reset server objects


$rsUpdateEntry=null;


$rsAddComments=null;


?>




<body>

<table border="1" width="100%" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080" id="table1">
	
	
		<tr>
			<td width="100%" colspan="2" bgcolor="#000080">
			<b><font color="#FFFFFF">:. Battle Results</font></b></td>
		</tr>
	
	
		<tr>
			<td width="50%">
			Battle Type:</td>
			<td width="50%">
<? echo $_POST["type"]; ?></td>
		</tr>
	
	
		<tr>
			<td width="50%">
			Battle Outcome:</td>
			<td width="50%">
<? $outcome=$defendingrndodds-$attackingrndodds;
?>			
	<? echo $battleoutcome; ?>			
			
			</td>
		</tr>
		<tr>
			<td width="50%">
			<? echo $_POST["attackingnation"]; ?> Casualties:</td>
			<td width="50%">
			<? echo $attackingsoldiercasualties; ?> soldiers<br>
			<? echo $attackingtankcasualties; ?> tanks
			</td>
		</tr>
		<tr>
			<td width="50%">
			<? echo $_POST["defendingnation"]; ?>
			Casualties:</td>
			<td width="50%">
			
			<? echo $defendingsoldiercasualties; ?> soldiers<br>
			<? echo $defendingtankcasualties; ?> tanks		
			
			</td>
		</tr>
<tr>
<td width="50%" valign="top">

Battle Details:</td>
<td width="50%">
<? if ($attackingsoldiercasualties==$defendingsoldiercasualties && $outcome<0)
{
?>
The battle was a draw in the number of lives lost, but overall at the end of the battle your army was victorious.
<? } ?>
<? if ($attackingsoldiercasualties==$defendingsoldiercasualties && $outcome>0)
{
?>
The battle was a draw in the number of lives lost, but overall at the end of the battle your army was defeated.
<? } ?>
<? if ($attackingsoldiercasualties<$defendingsoldiercasualties && $outcome<0)
{
?>
Your soldiers were triumphant and decisively defeated your enemy in this battle. Your soldiers owe their lives to your hard work as 
their leader.
<? } ?>
<? if ($attackingsoldiercasualties-$defendingsoldiercasualties<=0 && $outcome>0)
{
?>
Your soldiers fought bravely and killed many enemy soldiers but were forced to retreat and were 
ultimately defeated in battle.
<? } ?>
<? if ($attackingsoldiercasualties-$defendingsoldiercasualties>=0 && $outcome<0)
{
?>
Many of your soldiers lives were lost in this battle, even more than your enemy, but at the end of the battle 
your army was victorious.
<? } ?>
<? if ($attackingsoldiercasualties>$defendingsoldiercasualties && $outcome>0)
{
?>
Your forces fought bravely but were decisively defeated in battle.
<? } ?>


<? if ($landsgained>0)
{
?>
			<?   if ($outcome<0)
  {
?>
			In your victory your forces captured 
			<?   }
    else
  {
    if ($outcome>0)
    {
?>
			In your defeat your forces were still able to capture 
			<?     }
      else
    {
      if ($outcome==0)
      {
?>
			The battle was a draw and your forces captured 
			<?       } ?><?     } ?><?   } ?>
	 <?   echo $FormatNumber[$landsgained][3]; ?> miles of land from <?   echo $_POST["defendingnation"]; ?>.
	<? }
  else
{
?>
	There were no land spoils of war captured in this battle.
<? } ?>


<? if ($infrastructuredestroyed>0)
{
?>
			<?   if ($outcome<0)
  {
?>
			They also destroyed
			<?   }
    else
  {
    if ($outcome>0)
    {
?>
			They also destroyed
			<?     }
      else
    {
      if ($outcome==0)
      {
?>
			They also destroyed
			<?       } ?><?     } ?><?   } ?>
	 <?   echo $FormatNumber[$infrastructuredestroyed][3]; ?> infrastructure within <?   echo $_POST["defendingnation"]; ?>.

	<? }
  else
{
?>
	There was no infrastructure destroyed in this battle.
<? } ?>

<? if ($techdestroyed>0)
{
?>
			<?   if ($outcome<0)
  {
?>
			They also stole
			<?   }
    else
  {
    if ($outcome>0)
    {
?>
			They also stole
			<?     }
      else
    {
      if ($outcome==0)
      {
?>
			They also stole
			<?       } ?><?     } ?><?   } ?>
	 <?   echo $FormatNumber[$techdestroyed][3]; ?> technology from <?   echo $_POST["defendingnation"]; ?>.

	<? }
  else
{
?>
	There was no technology stolen in this battle.
<? } ?>

The value of your equipment abandoned in the battle was $<? echo $FormatNumber[$defendmoneygained][2]; ?>. 
Your forces looted $<? echo $FormatNumber[$attackmoneygained][2]; ?> from the nation of <? echo $_POST["defendingnation"]; ?>.


</td>
</tr>
		
		</table>

<p align="center"> <a href="nation_war_information.asp?Nation_ID=<? echo $_POST["bynation"]; ?>">Back to your nation's War 
&amp; Battles Page</a></p>


</body>

<!--#include file="inc_footer.php" -->
</html>
<? 

$rsGuestbook0=null;

$rsWarCheck->Close;
$rsWarCheck=null;

$rsSent2->Close;
$rsSent2=null;

$objConn->Close();
$objConn=null;

?>
