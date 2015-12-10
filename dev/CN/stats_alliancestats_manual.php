<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
?>
<!--#include file="connection.php" -->
<? ' *** Restrict Access To Page: Grant or deny access to this page
MM_authorizedUsers=""
MM_authFailedURL="login.asp"
MM_grantAccess=false
If Session("MM_Username") <> "" Then
If (false Or CStr(Session("MM_UserAuthorization"))="") Or _
(InStr(1,MM_authorizedUsers,Session("MM_UserAuthorization"))>=1) Then
MM_grantAccess = true
End If
End If
If Not MM_grantAccess Then
MM_qsChar = "?"
If (InStr(1,MM_authFailedURL,"?") >= 1) Then MM_qsChar = "&"
MM_referrer = Request.ServerVariables("URL")
if (Len(Request.QueryString()) > 0) Then MM_referrer = MM_referrer & "?" & Request.QueryString()
MM_authFailedURL = MM_authFailedURL & MM_qsChar & "accessdenied=" & Server.URLEncode(MM_referrer)
Response.Redirect(MM_authFailedURL)
End If
%>

<? if ()
{

// $rsGuestbook is of type "ADODB.Recordset"

  $rsGuestbookSQL="SELECT * FROM Nation Where Alliance = 'National Alliance of Arctic Countries' OR Alliance = 'Coalition of Dark States' OR Alliance = 'Global Alliance and Treaty Organization' OR Alliance = 'Grand Global Alliance' OR Alliance = 'Green Protection Agency' OR Alliance = 'Independent Republic of Orange Nations' OR Alliance = 'New Pacific Order' OR Alliance = 'New Polar Order' OR Alliance = 'Orange Defense Network' OR Alliance = 'The Legion' ";
    echo 3;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbookSQL);
  $rsGuestbook_numRows=0;
?>


<!--#include file="inc_header.php" -->
  


<? 

?>

<? 
  while((!($rsGuestbook==0)))
  {


    if ($rsGuestbook["Number_Of_Purchases"]>time()()-$rsGuestbook["Nation_Dated"])
    {

      $allactive=$allactive+1;
    } 

    $allstrenght=$allstrenght+($rsGuestbook["Land_Purchased"]*1.5)+($rsGuestbook["Nuclear_Purchased"]*50)+($rsGuestbook["Infrastructure_Purchased"]*3)+($rsGuestbook["Technology_Purchased"]*20)+(0.1*($rsGuestbook["Military_Purchased"]-$rsGuestbook["Military_Attacking_Casualties"]-$rsGuestbook["Military_Defending_Casualties"]));




    if ($rsGuestbook["Alliance"]="Global Alliance and Treaty Organization"$then;
$gatocntr==$gatocntr+1)
    {
      $gatopowermeter=$gatopowermeter+($rsGuestbook["Land_Purchased"]*1.5)+($rsGuestbook["Nuclear_Purchased"]*50)+($rsGuestbook["Infrastructure_Purchased"]*3)+($rsGuestbook["Technology_Purchased"]*20)+(0.1*($rsGuestbook["Military_Purchased"]-$rsGuestbook["Military_Attacking_Casualties"]-$rsGuestbook["Military_Defending_Casualties"]));
    } 
    if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
    {

      $gatoactive=$gatoactive+1;
    } 

    $gatocntrnuke=$gatocntrnuke+$rsGuestbook["Nuclear_Purchased"];
  }   if ()
  {

    if ($rsGuestbook["Alliance"]="Grand Global Alliance"$then;
$ggacntr==$ggacntr+1)
    {
      $ggapowermeter=$ggapowermeter+($rsGuestbook["Land_Purchased"]*1.5)+($rsGuestbook["Nuclear_Purchased"]*50)+($rsGuestbook["Infrastructure_Purchased"]*3)+($rsGuestbook["Technology_Purchased"]*20)+(0.1*($rsGuestbook["Military_Purchased"]-$rsGuestbook["Military_Attacking_Casualties"]-$rsGuestbook["Military_Defending_Casualties"]));
    } 
    if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
    {

      $ggaactive=$ggaactive+1;
    } 

    $ggacntrnuke=$ggacntrnuke+$rsGuestbook["Nuclear_Purchased"];
  } 


  if ($rsGuestbook["Alliance"]="The Legion"$then;
$legioncntr==$legioncntr+1)
  {
    $legionpowermeter=$legionpowermeter+($rsGuestbook["Land_Purchased"]*1.5)+($rsGuestbook["Nuclear_Purchased"]*50)+($rsGuestbook["Infrastructure_Purchased"]*3)+($rsGuestbook["Technology_Purchased"]*20)+(0.1*($rsGuestbook["Military_Purchased"]-$rsGuestbook["Military_Attacking_Casualties"]-$rsGuestbook["Military_Defending_Casualties"]));
  } 
  if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
  {

    $legionactive=$legionactive+1;
  } 

  $legioncntrnuke=$legioncntrnuke+$rsGuestbook["Nuclear_Purchased"];
} 


if ($rsGuestbook["Alliance"]="New Pacific Order"$then;
$npocntr==$npocntr+1)
{
  $npopowermeter=$npopowermeter+($rsGuestbook["Land_Purchased"]*1.5)+($rsGuestbook["Nuclear_Purchased"]*50)+($rsGuestbook["Infrastructure_Purchased"]*3)+($rsGuestbook["Technology_Purchased"]*20)+(0.1*($rsGuestbook["Military_Purchased"]-$rsGuestbook["Military_Attacking_Casualties"]-$rsGuestbook["Military_Defending_Casualties"]));
} 
if ($rsGuestbook["Last_Tax_Collection"]>time()()-3)
{

  $npoactive=$npoactive+1;
} 

$npocntrnuke=$npocntrnuke+$rsGuestbook["Nuclear_Purchased"];


if rsGuestbook("Alliance") = "Orange Defense Network" then 
odncntr = odncntr + 1 
odnpowermeter = odnpowermeter  + (rsGuestbook("Land_Purchased")*1.5) + (rsGuestbook("Nuclear_Purchased")*50) + (rsGuestbook("Infrastructure_Purchased")*3) + (rsGuestbook("Technology_Purchased")*20) + (0.1*(rsGuestbook("Military_Purchased")-rsGuestbook("Military_Attacking_Casualties")-rsGuestbook("Military_Defending_Casualties")))
	if rsGuestbook("Last_Tax_Collection") > date()-3 then
	odnactive = odnactive + 1
	end if
odncntrnuke = odncntrnuke + rsGuestbook("Nuclear_Purchased")
end if

if rsGuestbook("Alliance") = "Green Protection Agency" then 
gpacntr = gpacntr + 1 
gpapowermeter = gpapowermeter  + (rsGuestbook("Land_Purchased")*1.5) + (rsGuestbook("Nuclear_Purchased")*50) + (rsGuestbook("Infrastructure_Purchased")*3) + (rsGuestbook("Technology_Purchased")*20) + (0.1*(rsGuestbook("Military_Purchased")-rsGuestbook("Military_Attacking_Casualties")-rsGuestbook("Military_Defending_Casualties")))
	if rsGuestbook("Last_Tax_Collection") > date()-3 then
	gpaactive = gpaactive + 1
	end if
gpacntrnuke = gpacntrnuke + rsGuestbook("Nuclear_Purchased")
end if

if rsGuestbook("Alliance") = "Independent Republic of Orange Nations" then 
ironcntr = ironcntr + 1 
ironpowermeter = ironpowermeter  + (rsGuestbook("Land_Purchased")*1.5) + (rsGuestbook("Nuclear_Purchased")*50) + (rsGuestbook("Infrastructure_Purchased")*3) + (rsGuestbook("Technology_Purchased")*20) + (0.1*(rsGuestbook("Military_Purchased")-rsGuestbook("Military_Attacking_Casualties")-rsGuestbook("Military_Defending_Casualties")))
	if rsGuestbook("Last_Tax_Collection") > date()-3 then
	ironactive = ironactive + 1
	end if
ironcntrnuke = ironcntrnuke + rsGuestbook("Nuclear_Purchased")
end if

if rsGuestbook("Alliance") = "National Alliance of Arctic Countries" then 
naaccntr = naaccntr + 1 
naacpowermeter = naacpowermeter  + (rsGuestbook("Land_Purchased")*1.5) + (rsGuestbook("Nuclear_Purchased")*50) + (rsGuestbook("Infrastructure_Purchased")*3) + (rsGuestbook("Technology_Purchased")*20) + (0.1*(rsGuestbook("Military_Purchased")-rsGuestbook("Military_Attacking_Casualties")-rsGuestbook("Military_Defending_Casualties")))
	if rsGuestbook("Last_Tax_Collection") > date()-3 then
	naacactive = naacactive + 1
	end if
naaccntrnuke = naaccntrnuke + rsGuestbook("Nuclear_Purchased")
end if

if rsGuestbook("Alliance") = "New Polar Order" then 
npo2cntr = npo2cntr + 1 
npo2powermeter = npo2powermeter  + (rsGuestbook("Land_Purchased")*1.5) + (rsGuestbook("Nuclear_Purchased")*50) + (rsGuestbook("Infrastructure_Purchased")*3) + (rsGuestbook("Technology_Purchased")*20) + (0.1*(rsGuestbook("Military_Purchased")-rsGuestbook("Military_Attacking_Casualties")-rsGuestbook("Military_Defending_Casualties")))
	if rsGuestbook("Last_Tax_Collection") > date()-3 then
	npo2active = npo2active + 1
	end if
npo2cntrnuke = npo2cntrnuke + rsGuestbook("Nuclear_Purchased")
end if

if rsGuestbook("Alliance") = "Coalition of Dark States" then 
cdscntr = cdscntr + 1 
cdspowermeter = cdspowermeter  + (rsGuestbook("Land_Purchased")*1.5) + (rsGuestbook("Nuclear_Purchased")*50) + (rsGuestbook("Infrastructure_Purchased")*3) + (rsGuestbook("Technology_Purchased")*20) + (0.1*(rsGuestbook("Military_Purchased")-rsGuestbook("Military_Attacking_Casualties")-rsGuestbook("Military_Defending_Casualties")))
	if rsGuestbook("Last_Tax_Collection") > date()-3 then
	cdsactive = cdsactive + 1
	end if
cdscntrnuke = cdscntrnuke + rsGuestbook("Nuclear_Purchased")
end if

%>

<? if ()
{

  $rsGuestbook=mysql_fetch_array($rsGuestbook_query);
  $rsGuestbook_BOF=0;

} 

?>
<p align="center">
<b><br>
Alliance Statistics Provided In Real Time</b></p>

</p>



<p>


<p></p>

<p></p>



<p></p>
<table border="0" width="100%" id="table4" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top" width="100%">
<table border="1" width="100%" id="table5" cellspacing="0" cellpadding="2" bordercolor="#000080">
<tr>
<td width="16%">Team Name</td>
<td width="16%" align="center">Total Nations</td>
<td width="16%" align="center">Active Nations</td>
<td width="16%" align="center">Percent Active</td>
<td width="14%" align="center">Strength</td>
<td width="16%" align="center">Avg. Strength</td>
<td width="16%" align="center">Nukes</td>
</tr>
<tr>
<td width="16%">
CDS <br>
GATO<br>
GGA <br>
GPA<br>
IRON<br>
Legion <br>
NAAC <br>
NPO <br>
NpO <br>
ODN</td>
<td width="16%" align="center">
<? echo $cdscntr; ?><br>
<? echo $gatocntr; ?><br>	
<? echo $ggacntr; ?> <br>
<? echo $gpacntr; ?> <br>
<? echo $ironcntr; ?> <br>
<? echo $legioncntr; ?><br>
<? echo $naaccntr; ?> <br>
<? echo $npocntr; ?><br>
<? echo $npo2cntr; ?><br>
<? echo $odncntr; ?></td>
<td width="16%" align="center">
<? echo $cdsactive; ?><br>
<? echo $gatoactive; ?><br>
<? echo $ggaactive; ?><br>
<? echo $gpaactive; ?><br>
<? echo $ironactive; ?><br>
<? echo $legionactive; ?><br>
<? echo $naacactive; ?><br>
<? echo $npoactive; ?><br>
<? echo $npo2active; ?><br>
<? echo $odnactive; ?></td>
<td width="16%" align="center">
<? echo $FormatNumber[($cdsactive/$cdscntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($gatoactive/$gatocntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($ggaactive/$ggacntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($gpaactive/$gpacntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($ironactive/$ironcntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($legionactive/$legioncntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($naacactive/$naaccntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($npoactive/$npocntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($npo2active/$npo2cntr)*100][0]; ?>%<br>
<? echo $FormatNumber[($odnactive/$odncntr)*100][0]; ?>%</td>
<td width="14%" align="center">
<? echo $FormatNumber[$cdspowermeter][0]; ?> <br>
<? echo $FormatNumber[$gatopowermeter][0]; ?> <br>
<? echo $FormatNumber[$ggapowermeter][0]; ?> <br>
<? echo $FormatNumber[$gpapowermeter][0]; ?> <br>
<? echo $FormatNumber[$ironpowermeter][0]; ?> <br>
<? echo $FormatNumber[$legionpowermeter][0]; ?> <br>
<? echo $FormatNumber[$naacpowermeter][0]; ?> <br>
<? echo $FormatNumber[$npopowermeter][0]; ?> <br>
<? echo $FormatNumber[$npo2powermeter][0]; ?> <br>
<? echo $FormatNumber[$odnpowermeter][0]; ?></td>
<td width="16%" align="center">
<? echo $FormatNumber[$cdspowermeter/$cdscntr][2]; ?><br>
<? echo $FormatNumber[$gatopowermeter/$gatocntr][2]; ?><br>
<? echo $FormatNumber[$ggapowermeter/$ggacntr][2]; ?><br>
<? echo $FormatNumber[$gpapowermeter/$gpacntr][2]; ?><br>
<? echo $FormatNumber[$ironpowermeter/$ironcntr][2]; ?><br>
<? echo $FormatNumber[$legionpowermeter/$legioncntr][2]; ?><br>
<? echo $FormatNumber[$naacpowermeter/$naaccntr][2]; ?><br>
<? echo $FormatNumber[$npopowermeter/$npocntr][2]; ?><br>
<? echo $FormatNumber[$npo2powermeter/$npo2cntr][2]; ?><br>
<? echo $FormatNumber[$odnpowermeter/$odncntr][2]; ?>
</td>
<td width="16%" align="center">
<? echo $cdscntrnuke; ?><br>
<? echo $gatocntrnuke; ?><br>
<? echo $ggacntrnuke; ?><br>
<? echo $gpacntrnuke; ?><br>
<? echo $ironcntrnuke; ?><br>
<? echo $legioncntrnuke; ?><br>
<? echo $naaccntrnuke; ?><br>
<? echo $npocntrnuke; ?><br>
<? echo $npo2cntrnuke; ?><br>
<? echo $odncntrnuke; ?><br>
</td>
</tr>
</table>
		</td>
	</tr>
	</table>
<p align="center">
<b>
<img border="0" src="images/information.gif" width="17" height="16"> 
<a target="_blank" href="http://s15.invisionfree.com/Cyber_Nations/index.php?showtopic=26&st=0">
Alliance Information</a></b></p>
<p align="center">
<b><a href="stats.php">Main World Statistics Screen</a></b></p>
<!--#include file="inc_footer.php" -->


<? 

$rsGuestbook=null;


$rsGuestbook2->Close();
$rsGuestbook2=null;


$rsSent2->Close();
$rsSent2=null;


$objConn->Close();
$objConn=null;

?>
