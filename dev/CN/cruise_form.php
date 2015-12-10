<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("U_ID_session");
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

<? 
  $rsUsers__MMColParam="1";
  if (($U_ID_session!=""))
  {

    $rsUsers__MMColParam=$U_ID_session;
  } 

?> 

<? 
//Dimension variables


//Read in the record number to be updated

  $lngRecordNo=intval($_GET["Nation_ID"]);
//, "''")//Create an ADO connection object 

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


<? 
  $lngRecordNo1=intval($_GET["Nation_ID"]);
// $rsUsers is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT * FROM Nation WHERE Nation_ID=".$lngRecordNo1;
    echo 0;
    echo 2;
    echo 1;
  $rs=mysql_query();

  if (($rsUsers_BOF==1) && ($rsUsers==0))
  {

    header("Location: "."failed_noexist.asp");
  } 


  $rsUsers_numRows=0;
?>

<? 

  $lngRecordNo2=intval($_GET["bynation"]);

// $rsDetail is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT *  FROM Nation WHERE Nation_ID=".$lngRecordNo2;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsDetail_numRows=0;

  if (($rsDetail_BOF==1) && ($rsDetail==0))
  {

    header("Location: "."failed_noexist.asp");
  } 

?>

<? 
  $rsSent__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsSent__MMColParam=$MM_Username_session;
  } ?>
<? 
// $rsSent is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT * FROM WAR WHERE (Receiving_Nation_ID = '".$lngRecordNo."' OR Declaring_Nation_ID = '".$lngRecordNo."') AND (Receiving_Nation_ID = '".$lngRecordNo2."' OR Declaring_Nation_ID = '".$lngRecordNo2."') AND (Nation_Deleted = 0) AND (Receiving_Nation_Peace + Declaring_Nation_Peace <> 2) AND ('".time()()."' - War_Declaration_Date <= 7)  ORDER BY War.War_Declaration_Date DESC";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsSent_numRows=0;
?>



<!--#include file="inc_header.php" -->


<? 
  $improvenationidatt=$lngRecordNo2;
// $rsImproveAttack is of type "ADODB.Recordset"

  $rsImproveAttackSQL="SELECT Improvements.Satellites FROM Improvements WHERE Nation_ID=".$improvenationidatt;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsImproveAttackSQL);
  $rsImproveAttack_numRows=0;
  $satellites=0;
  if ((!($rsImproveAttack_BOF==1)) && (!($rsImproveAttack==0)))
  {

    $satellites=$rsImproveAttack["Satellites"];
  } 

?>

<? 
  $improvenationiddef=$lngRecordNo;
// $rsImproveDefend is of type "ADODB.Recordset"

  $rsImproveDefendSQL="SELECT Improvements.Missile_Defenses FROM Improvements WHERE Nation_ID=".$improvenationiddef;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsImproveDefendSQL);
  $rsImproveDefend_numRows=0;
  $missile_defenses=0;
  if ((!($rsImproveDefend_BOF==1)) && (!($rsImproveDefend==0)))
  {

    $missile_defenses=$rsImproveDefend["Missile_Defenses"];
  } 

?>


<?   if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
  {
?>
Please stop trying to cheat. 
<?   }
    else
  {
?>

<? 
    $theyareatwar=0;
    while((!($rsSent_BOF==1)) && (!($rsSent==0)))
    {

      if (strtoupper($rsSent["Declaring_Nation"])==strtoupper($rsUsers["Nation_Name"]) || strtoupper($rsSent["Receiving_Nation"])==strtoupper($rsUsers["Nation_Name"]))
      {

        $theyareatwar=1;
      } 

      $rsSent=mysql_fetch_array($rsSent_query);
      $rsSent_BOF=0;

    } 
    
?>

<?     if ($theyareatwar==0)
    {
?>
Please stop trying to cheat. 
<?     }
      else
    {
?>

<?       if (($rsSent_BOF==1) && ($rsSent==0))
      {
?>
You are not at war with that nation.
<?       }
        else
      {
?>
<p align="center">
<?         if (!isset($rsUsers["Flag"]) || $rsUsers["Flag"]="images/flags/None.jpg"|!isset($rsDetail["Flag"])|$rsDetail["Flag"]="images/flags/None.jpg"$then;
;
      }
        else
      {


<img src="<? )
      {
        echo $rsDetail["Flag"];       } ?>"> vs. <img src="<?       echo $rsUsers["Flag"]; ?>">
<?     } ?>
<? 
    $declaring=0;
    $receiving=0;
    $cleartobattle=0;
    if (strtoupper($rsSent["Declaring_Nation_ID"])==strtoupper($rsDetail["Nation_ID"]))
    {
      $declaring=1;
    }
;
    } 
    if (strtoupper($rsSent["Receiving_Nation_ID"])==strtoupper($rsDetail["Nation_ID"]))
    {
      $receiving=1;
    }
;
    } ?>

<?     if ($declaring==1 && $rsSent["Declaring_Cruise_Date2"]=time()()$then; )
    {

      $p>$You$have$already$launched$cruise$missiles$twice$today$against<$%=$rsUsers["Nation_Name"]; ?>. Your missile silos are not prepared to launch 
against <?       echo $rsUsers["Nation_Name"]; ?> at this time. (cruise missile attacks do not count against standard battle attacks)

<?     }
      else
    {
      if ($declaring==1 && $rsSent["Declaring_Cruise_Date1"]=time()()$then;
$cleartobattle==1)
      {
?>
<p></p>You have already launched a cruise missiles once today against <?         echo $rsUsers["Nation_Name"]; ?>. You have
one more cruise missile attack left. (cruise missile attacks do not count against standard battle attacks)
<?       }
        else
      {
        if ($declaring==1)
        {

          $cleartobattle=1;
?>
<p></p>This will be your first cruise missile attack against <?           echo $rsUsers["Nation_Name"]; ?> today. You
will be able to carry out a total of 2 cruise missile attacks against <?           echo $rsUsers["Nation_Name"]; ?> today. (cruise missile attacks do not count against standard battle attacks)
<?         } ?><?       } ?><?     } ?>



<?     if ($receiving==1 && $rsSent["Receiving_Cruise_Date2"]=time()()$then; )
    {

      $p>$You$have$already$launched$cruise$missiles$twice$today$against<$%=$rsUsers["Nation_Name"]; ?>. Your missile silos are not prepared to launch 
against <?       echo $rsUsers["Nation_Name"]; ?> at this time. (cruise missile attacks do not count against standard battle attacks)
<?     }
      else
    {
      if ($receiving==1 && $rsSent["Receiving_Cruise_Date1"]=time()()$then;
$cleartobattle==1)
      {
?>
<p></p>You have already launched a cruise missiles once today against <?         echo $rsUsers["Nation_Name"]; ?>. You have
one more cruise missile attack left. (cruise missile attacks do not count against standard battle attacks)
<?       }
        else
      {
        if ($receiving==1)
        {

          $cleartobattle=1;
?>
<p></p>This will be your first cruise missile attack against <?           echo $rsUsers["Nation_Name"]; ?> today. You
will be able to carry out a total of 2 cruise missile attacks against <?           echo $rsUsers["Nation_Name"]; ?> today. (cruise missile attacks do not count against standard battle attacks)
<?         } ?><?       } ?><?     } ?>




<?     if ($cleartobattle==1)
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
Cruise Missiles destroy defending tanks and infrastructure based on your 
technology level. The higher your technology level the greater impact your 
cruise missile will have against your enemy. One cruise missile will be launched immediately after pressing 
the <font color="#FF0000">Launch Attack</font> button below.<b> </b> </p>
<form name="FrontPage_Form1" method="post" action="cruise_form_code.php">      

<div align="center">
<table width="100%" 
border=1 cellpadding=5 cellspacing=0 colspan="2" bordercolor="#000080">
<tbody>
<tr bgcolor="5E6C50" class=colorformheader> 
<td colspan=2 bgcolor="#000080">
<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0">
	<tr>
		<td>
<p align="left">
<font class=textsize9 color="#FFFFFF"><b>&nbsp;:. Launch Cruise Missile Attack On <?       echo (.$Item["Nation_Name"].$Value); ?></b></font></td>
		<td>
		<p align="right">
		<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=2752">
		<font color="#FFFFFF">About Cruise Missiles</font></a></td>
	</tr>
</table>
</td>
</tr>

<tr>
<td align=right width="31%" bgcolor="#FFFF99">

Attacking Nation<font 
class=textsize9>:</font></td>
<td width="69%" bgcolor="#FFFF99"><font class=textsize9> 
<?       echo (.$Item["Nation_Name"].$Value); ?> (<?       echo (.$Item["Poster"].$Value); ?>)


&nbsp; 
</font></td>
</tr>
<?       if ($Satellites>0)
      {
?>
<tr>
<td align=right width="31%" bgcolor="#FFFF99">
Number of<font 
class=textsize9> Satellites:</font></td>
<td width="69%" bgcolor="#FFFF99"><font class=textsize9> 
<?         echo $Satellites; ?> <i>(Increases effectiveness of your cruise missiles +10%.)</i>
</font></td>
</tr>
<?       } ?>
<tr>
<td align=right width="31%" bgcolor="#FFFF99">
Number of<font 
class=textsize9> Cruise Missiles:</font></td>
<td width="69%" bgcolor="#FFFF99"><font class=textsize9> 
<?       echo (.$Item["Cruise_Purchased"].$Value); ?>
</font></td>
</tr>



<tr>
<td align=right width="31%">
Defending Nation<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<?       echo (.$Item["Nation_Name"].$Value); ?> (<?       echo (.$Item["Poster"].$Value); ?>)


</font></td>
</tr>

<?       if ($Missile_Defenses>0)
      {
?>
<tr>
<td align=right width="31%">
Number of<font 
class=textsize9> Missile Defenses:</font></td>
<td width="69%"><font class=textsize9> 
<?         echo $Missile_Defenses; ?> <i>(Reduces effectiveness of your cruise missiles -10%.)</i>
</font></td>
</tr>
<?       } ?>

<tr>
<td align=right width="31%">
Defending Tanks<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<? 
      if (!isset(("Tanks_Defending")))
      {

        $numtanksdefending=0;
      }
        else
      {

        $numtanksdefending=("Tanks_Defending");
      } 

?>
<?       echo $numtanksdefending; ?>


</font></td>
</tr>
<tr>
<td align=right width="31%">
Defending Infrastructure<font 
class=textsize9>:</font></td>
<td width="69%"><font class=textsize9> 
<?       echo $FormatNumber[$rsUsers["Infrastructure_Purchased"]][2]; ?>


</font></td>
</tr>
<tr class=colorformfields> 
<td colspan=2><div align="center"><font class=textsize9> 


<p align="left"> 








<input name="attackingnation" type="hidden" value="<?       echo (.$Item["Nation_Name"].$Value); ?>">
<input name="bynation" type="hidden" value="<?       echo (.$Item["Nation_ID"].$Value); ?>">

<input name="defendingnation" type="hidden" value="<?       echo (.$Item["Nation_Name"].$Value); ?>">
<input name="receivingnation" type="hidden" value="<?       echo (.$Item["Nation_ID"].$Value); ?>">


<input name="receivinguser" type="hidden" value="<?       echo (.$Item["Poster"].$Value); ?>">
<input name="attackinguser" type="hidden" value="<?       echo (.$Item["Poster"].$Value); ?>">



<p><br><br><b><font color="#FF0000">


<?       if (($Item["Cruise_Purchased"]$Value)<1)
      {
?>
You have no cruise missiles at this time.
<?       }
        else
      {
?>

</p>
<p></p>
	<?         if (time()()-$rsDetail["Last_Bills_Paid"]<=2)
        {
?>
	<!--#include file="activitycheck.php" -->
	<input name=submit2 class="LaunchButton" type=submit class=LaunchButton id=submit2 value="Launch Cruise Missiles"><br>
	</font>
	&nbsp;<?         }
          else
        {
?>
	<font color="#FF0000"><p></p>You must <a href="pay_bills.asp?Nation_ID=<?           echo $rsDetail["Nation_ID"]; ?>">pay your bills</a>
	 before you can launch cruise missiles.
	<?         } ?>

<?       } ?>



</b><font color="#FF0000">


<b><br>
&nbsp;</div>



</td>
</tr>
</tbody>
</table>
<p align="left">



</font>

</div>
</form>
<p>
<img src="http://cybernations.net/images/cruiselaunch.jpg"></p>
<p>&nbsp;</p>
</div></td>
</tr>
</table>
</div>
<p>&nbsp; </p> <br>

</td>
</tr>
</table>
<?     } ?><?   } ?><? } ?><? } ?>
<!--#include file="inc_footer.php" -->


<? 

$rsUsers=null;


$rsSent=null;


$rsDetail=null;


$rsGuestbook=null;

$objConn->Close();
$objConn=null;

?>
<? >
