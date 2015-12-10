<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
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
<!--#include file="inc_header.php" -->
<? 

$lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$rsGuestbookHead["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
?>


<!--#include file="trade_connections.php" -->
<!--#include file="calculations.php" -->

<? 
$actualmilitary=$FormatNumber[$actualmilitary][0];
$actualdefend=$FormatNumber[$actualdefend][0];
$actualdeployed=$FormatNumber[$actualdeployed][0];
?>
<? 
//===============================================================================================================

if ($_POST["Military_Deployed"]!="" && $_POST["Tanks_Deployed"]!="")
{

?>
<!--#include file="activity.php" -->
<? 

  if (intval($_POST["Military_Deployed"])<0 || intval($_POST["Tanks_Deployed"])<0)
  {

    $denyreason_session="You cannot specify negative soliders or tanks to deploy.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Military_Deployed"])>$FormatNumber[$actualmilitary][0])
  {

    $denyreason_session="You do not have that many soldiers to deploy.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Tanks_Deployed"])>$FormatNumber[$numberoftanks][0])
  {

    $denyreason_session="You do not have that many tanks to deploy.";
    header("Location: "."activity_denied.asp");
  } 

  if (intval($_POST["Tanks_Deployed"])=="" || !isset($_POST["Tanks_Deployed"]))
  {

    $denyreason_session="There was an error in your deployment.";
    header("Location: "."activity_denied.asp");
  } 



  if (($actualmilitary-intval($_POST["Military_Deployed"]))<($citizens*20))
  {

    //Military_Depleated") = date()    //Government_Type") = "Anarchy"    //Government_Changed") = date()  } 



  if (!isset(("Tanks_Defending")))
  {

    $numtanksdefending=0;
  }
    else
  {

    $numtanksdefending=("Tanks_Defending");
  } 


  if (!isset(("Tanks_Deployed")))
  {

    $numtanksdeployed=0;
  }
    else
  {

    $numtanksdeployed=("Tanks_Deployed");
  } 


  $change=$numtanksdeployed-intval($_POST["Tanks_Deployed"]);

  if ($change<("Tanks_Defending"))
  {

    //Tanks_Defending") = rsGuestbook.Fields("Tanks_Defending") + (numtanksdeployed - INT(Request.form("Tanks_Deployed")))  }
    else
  {

    //Tanks_Defending") = rsGuestbook.Fields("Tanks_Defending") - ( INT(Request.form("Tanks_Deployed")) - numtanksdeployed)  } 


  //Tanks_Deployed") = INT(Request.form("Tanks_Deployed"))

  //Military_Deployed") = INT(Request.form("Military_Deployed"))  //Military_Deployed_Date") = date()


  

  header("Location: "."nation_drill_display.asp?Nation_ID=".$rsGuestbookHead["Nation_ID"]);
} 

//===============================================================================================================

?>
<body bgcolor="white" text="black">
<? if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
{
?>
	<font color="#FF0000">Please do not attempt to cheat.</font>
<? }
  else
{
?>

<?   if (($rsGuestbook["Military_Deployed_Date"]$Value)==time()())
  {
?>
<p></p>You have already deployed troops today. You may only deploy troops once per day. You may deploy troops tomorrow on <?     echo time()()+1; ?>.
<?   }
    else
  {
?>


<?     if (($rsGuestbook["Military_Purchased"]$Value)>0)
    {
?>

<noscript><font color="red"><b>You must have JavaScript enabled to use this page.<p></p></b></font></noscript>

   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" bordercolor="#000080">


<script type="text/javascript">
var submit_ok;
var error_cntr = 0;
function d(){
  var Military_Deployed = parseInt(document.FrontPage_Form1.Military_Deployed.value);
  var Tanks_Deployed = parseInt(document.FrontPage_Form1.Tanks_Deployed.value);
  
    if (Military_Deployed < 0 || Tanks_Deployed < 0) 
	{
	submit_ok = 'No';
	error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You must specify zero or greater for both categories.";
	}
	if (   isNaN(Military_Deployed) || isNaN(Tanks_Deployed)  ) 
	{
	submit_ok = 'No';
	error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You must specify a number of zero or greater in both categories.";
	}
	if (Military_Deployed > <?       echo str_replace(",","",$FormatNumber[$actualmilitary][0]); ?>)
	{
    submit_ok = 'No';
    error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many soldiers to deploy or you are not allowed to send that many troops at this time.";
	}
	if (Tanks_Deployed > <?       echo intval($numberoftanks); ?>)
	{
    submit_ok = 'No';
    error_cntr = 1;
	document.getElementById('results').innerHTML="<font color='#FF0000'>You do not have that many tanks to deploy.";
	}	
		if (error_cntr == 0)
		{
			if (<?       echo intval($actualmilitary); ?> - Military_Deployed <= <?       echo intval($citizens*.20); ?>)
			{
			submit_ok = 'Yes';
		  	document.getElementById('results').innerHTML="<font color='#FF0000'>This deployment is acceptable but will result in Anarchy and a happiness penalty among your population for lack of defending troops. You need at least 20% of your citizen count in defending soldiers to keep your government out of Anarchy. The maximum number of soldiers that you can deploy to prevent this, with your current soldier numbers, is <?       echo intval($actualmilitary-$citizens*.20); ?> soldiers.";
			}
			else
			{
			submit_ok = 'Yes';
			document.getElementById('results').innerHTML="Your military deployment has been validated and is ready to be processed. Once processed you will have "+ Military_Deployed +" deployed soldiers and "+ Tanks_Deployed +" deployed tanks.";
			}
		}
		if (error_cntr == 1)
		{
		error_cntr = 0;
		}
	
}
function submit_form(){
submit_ok = 'No';
 d()
    if (submit_ok == 'Yes') {
  	document.FrontPage_Form1.submit();
    }
}
// End -->
</script>	
			
<form name="FrontPage_Form1" method="post" action="militarydeploy.php">



		

			
	<tr>
		<td width="97%" colspan="2" bgcolor="#000080">
<font color="#FFFFFF"><b>:. Deploy Military</b></font><b><font color="#FFFFFF"> for </font> <a href="nation_drill_display.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><?       echo $rsGuestbook["Nation_Name"]; ?> </font></a><font color="#FFFFFF">
		</font> </b>
		</td>
		</tr>
	<tr>
		<td width="97%" align="right" valign="top" colspan="2">
		<p align="left">Use this screen to deploy troops overseas to fight wars 
		and become available for foreign aid transfers. You may only deploy 
		troops once per day. To deploy soldiers specify the number of soldiers that you want to send overseas. To bring soldiers home, 
		reduce the number of soldiers that you have specified to be deployed.</td>
	</tr>
	<tr>
		<td width="34%" align="right" valign="top"><b>Citizen Population:</b></td>
		<td valign="top" width="63%"><b><?       echo ($FormatNumber[$citizens][0]); ?> Working Citizens</b></td>
	</tr>
	<tr>
		<td width="34%" align="right" valign="top"><b>Number of Soldiers:</b></td>
		<td valign="top" width="63%"><b><?       echo ($FormatNumber[$actualmilitary][0]); ?>&nbsp; 
		</b> </td>
	</tr>
	<tr>
		<td width="34%" align="right" valign="top"><i>Current Defending Soldiers:</i></td>
		<td valign="top" width="63%"><i><?       echo ($FormatNumber[$actualdefend][0]); ?>   </i>   </td>
	</tr>
	<tr>
		<td width="34%" align="right" valign="top"><i>Current Deployed Soldiers:</i></td>
		<td valign="top" width="63%"><i><?       echo ($FormatNumber[$actualdeployed][0]); ?> 
		</i> </td>
	</tr>
	<tr>
<td bgcolor="#FFFFFF" width="34%" align="right"><b>Number of Tanks:</b></td>
<td bgcolor="#FFFFFF" width="63%">
<b>
<?       echo $numberoftanks; ?>
</b>
</td>
	</tr>
	<tr>
<td bgcolor="#FFFFFF" width="34%" align="right"><i>Current Defending Tanks:</i></td>
<td bgcolor="#FFFFFF" width="63%">
<i>
<?       echo $defendingtanks; ?>
</i>
</td>
	</tr>
	<tr>
<td bgcolor="#FFFFFF" width="34%" align="right"><i>Current Deployed Tanks:</i></td>
<td bgcolor="#FFFFFF" width="63%">
<i>
<?       echo $deployedtanks; ?>
</i>
</td>
	</tr>
	<tr>
		<td width="34%">
		<p align="right"><b>Specify Soldier Deployment:</b></td>
		<td width="63%"> 

		<table border="0" width="100%" id="table6" cellspacing="0" cellpadding="0">
			<tr>
				<td>
<input type="text" size="5" name="Military_Deployed" value="<?       echo str_replace(",","",$FormatNumber[$actualdeployed][0]); ?>">




</td>
			</tr>
		</table>


</td>
		
	</tr>


		

			
	<tr>
		<td width="34%">
		<p align="right"><b>Specify Tank Deployment:</b></td>
		<td width="63%"> 

		<table border="0" width="100%" id="table5" cellspacing="0" cellpadding="0">
			<tr>
				<td>

<input type="text" size="5" name="Tanks_Deployed" value="<?       echo $deployedtanks; ?>">

</td>
			</tr>
		</table>


</td>
		
	</tr>
			
	</table>
	<p align="center">   
			<!--#include file="activitycheck.php" -->
			<input type="button" value="Confirm Deployment" onclick="d()">&nbsp; 
			<input type="button" onclick="submit_form()" value="Submit Deployment">
			
			<div align="center">
			
			<table border="0" width="60%" cellspacing="0" cellpadding="10" id="table6">
			<tr>
			<td width="4">&nbsp;</td>
			<td><span id='results'></span></td>
			</tr>
			</table>

   
   </div>

   
</form>


<!-- End form code -->



<?     }
      else
    {
?>
<font color="#FF0000"><p></p>Sorry, you have no troops at this time. 
<a href="militarybuysell.asp?Nation_ID=<?       echo $rsGuestbook["Nation_ID"]; ?>">Please purchase military first</a>.
<?     } ?>


</font>
</body>
<?   } ?><? } ?><!--#include file="inc_footer.php" --></html><? 
//Reset server objects


$rsGuestbook=null;

$objConn->Close();
$objConn=null;

?>
