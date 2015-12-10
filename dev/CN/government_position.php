<?
  session_start();
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("activity_session");
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
$lngRecordNo=intval($_GET["Nation_ID"]);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
$rsGuestbook_numRows=0;
?>
 
<!--#include file="inc_header.php" -->
<? if (strtoupper($rsUser->Fields.$Item["U_ID"].$Value)><strtoupper(.$Item["POSTER"].$Value))
{
?>
	<font color="#FF0000">Please do not attempt to cheat.</font>
<? }
  else
{
?>

<body bgcolor="white" text="black" style="text-align: left">

   <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">
	<tr>
		<td align="right" colspan="2" bgcolor="#000080">

<form name="FrontPage_Form1" method="post" action="government_position_code.php">
		
		<p align="left"><b><font color="#FFFFFF">
		:. Government
		Scenarios For </font> <a href="nation_drill_display.asp?Nation_ID=<?   echo $rsGuestbook["Nation_ID"]; ?>">
		<font color="#FFFFFF"><?   echo $rsGuestbook["Nation_Name"]; ?></a></b>
		</font> </td>
	</tr>
	<tr>
		<td align="right" width="97%" colspan="2">
		<p align="left">The following situations will help you better define 
		what your nation is all about. Your nation will be reflected by the 
		choices that you make here when others view your nation. </td>
	</tr>
	<tr>
		<td align="right" width="48%">
		<p align="left">
		A foreign 
		nation around the world has begun declaring war on numerous peaceful nations and 
		gobbling up huge swaths of lands. According to your foreign intelligence 
		this nation is declaring war on the premise of ethnic cleansing and 
		rumors have spread about the horrible cruelties experienced by the 
		citizens of the conquered nations. Recently, the war mongering nation 
		has declared war on a close ally of yours who has asked your nation to 
		step in and fight along side them. What is your government’s position? </td>
		<td width="49%"> 
		<p align="left">
		<?   if ($rsGuestbook["Nation_Peace"]=0$then; )
  {

//assets/none.gif" title="Your nation is not a peaceful nation. You cannot select this option.">		//radio" value="1" name="Foreign" <%if rsGuestbook("Foreign") = 1 then?>  } 
  $checked<$%end$if; ?>>
		<? } ?>
		 We have no interest in war, we are a peaceful nation.<br>
		<? if ($rsGuestbook["Nation_Peace"]>0)
{
?>
		 <img src="assets/none.gif" title="Your nation is a peaceful nation. You cannot select this option.">		
		<? }
  else
{
?>  
		<input type="radio" value="2" name="Foreign" <?   if ($rsGuestbook["Foreign"]=2$then; )
  {
    $checked<$%end$if;   } ?>> 
		<? } ?>
		We would like to help, but must remain neutral until we are attacked first.<br>
		<? if ($rsGuestbook["Nation_Peace"]>0)
{
?>
		 <img src="assets/none.gif" title="Your nation is a peaceful nation. You cannot select this option.">		
		<? }
  else
{
?> 
		<input type="radio" value="3" name="Foreign" <?   if ($rsGuestbook["Foreign"]=3$then; )
  {
    $checked<$%end$if;   } ?>>
		<? } ?> Deploy all available military. It's time for war.<br>
		<input type="radio" value="0" name="Foreign" <? if ($rsGuestbook["Foreign"]=0$then; )
{
  $checked<$%end$if; } ?>> No position at this time.	
		</p>	
		</td>
	</tr>
	<tr>
		<td align="right" width="48%">
		<p align="left">
		A foreign 
		nation has asked you to sign a nuclear non-proliferation treaty whereby 
		you will sign off on your option to research and develop nuclear 
		technology including nuclear weapons. What is your government’s position?</td>
		<td width="49%"> 
		<p align="left"> 
		<? if ($rsGuestbook["Nuclear_Purchased"]>0)
{
?>
		 <img src="assets/none.gif" title="You currently have nuclear weapons and cannot select this option.">		
		<? }
  else
{
?>
		<input type="radio" value="1" name="Nuclear" <?   if ($rsGuestbook["Nuclear"]=1$then; )
  {
    $checked<$%end$if;   } ?>> 
		<? } ?>
		We will sign the treaty in order to appease the other nation. We are 
		opposed to all nuclear research and weapons.<br>
		
		<? if ($rsGuestbook["Nuclear_Purchased"]>0)
{
?>
		 <img src="assets/none.gif" title="You currently have nuclear weapons and cannot select this option.">
		<? }
  else
{
?>
		<input type="radio" value="2" name="Nuclear" <?   if ($rsGuestbook["Nuclear"]=2$then; )
  {
    $checked<$%end$if;   } ?>> 
		<? } ?>
		
		Our government will not sign the treaty because our nation believes in 
		the use of nuclear technology to build power plants, however we do not 
		promote the use of nuclear technology for weapons of mass destruction.<br>
		<input type="radio" value="3" name="Nuclear" <? if ($rsGuestbook["Nuclear"]=3$then; )
{
  $checked<$%end$if; } ?>> We will never sign such a treaty. Doing so would endanger our people. 
		Our nation promotes the use and build up of nuclear weapons.<br>
		<? if ($rsGuestbook["Nuclear_Purchased"]>0)
{
?>
		 <img src="assets/none.gif" title="You currently have nuclear weapons and cannot select this option.">
		<? }
  else
{
?>
		<input type="radio" value="0" name="Nuclear" <?   if ($rsGuestbook["Nuclear"]=0$then; )
  {
    $checked<$%end$if;   } ?>> 
		<? } ?>
		No position at this time.	
		</p>	
		</td>
	</tr>
	<tr>
		<td align="right" width="48%">
		<p align="left">
		Drug 
		traffickers are crossing into your borders from all sides bringing with them narcotics 
		and an assortment of recreational drugs. Many of your citizens are becoming addicted and 
		have been unable to hold steady jobs which is both endangering your 
		citizen’s lives and hurting your economy. What is your government’s 
		position?</span></td>
		<td width="49%"> 
		<p align="left"> 
		<input type="radio" value="1" name="Drugs" <? if ($rsGuestbook["Drugs"]=1$then; )
{
  $checked<$%end$if; } ?>> Our leaders are aware of the 
		situation but are too addicted to drugs themselves to do anything about it.<br>
		<input type="radio" value="2" name="Drugs" <? if ($rsGuestbook["Drugs"]=2$then; )
{
  $checked<$%end$if; } ?>> Our nation will open new 
		rehabilitation centers and educate our citizens to the dangers of drugs, 
		but we are not prepared to declare an all out war on drugs.<br>
		<input type="radio" value="3" name="Drugs" <? if ($rsGuestbook["Drugs"]=3$then; )
{
  $checked<$%end$if; } ?>> Our military has been positioned at all border crossings and 
		is arresting all drug traffickers. Drugs are illegal in this nation.<br>
		<input type="radio" value="0" name="Drugs" <? if ($rsGuestbook["Drugs"]=0$then; )
{
  $checked<$%end$if; } ?>> No position at this time.	
		</p>	
		</td>
	</tr>	
	<tr>
		<td align="right" width="48%">
		<p align="left">
		Rioters 
		are outside your capital city protesting your government. The riots have 
		been going on for 7 days and the angry mob is teetering on the edge of 
		violence. What is your government’s position?</td>
		<td width="49%"> 
		<p align="left"> 
		<input type="radio" value="1" name="Domestic" <? if ($rsGuestbook["Domestic"]=1$then; )
{
  $checked<$%end$if; } ?>> We will allow the protest to continue regardless of the consequences 
		Freedom of speech is that important to us.<br>
		<input type="radio" value="2" name="Domestic" <? if ($rsGuestbook["Domestic"]=2$then; )
{
  $checked<$%end$if; } ?>> We will bring in a police force to monitor the protest and arrest law breakers.<br>
		<input type="radio" value="3" name="Domestic" <? if ($rsGuestbook["Domestic"]=3$then; )
{
  $checked<$%end$if; } ?>> We will not allow any form of government protest in our nation. Our armed police force is dissolving the protest as we speak.<br>
		<input type="radio" value="0" name="Domestic" <? if ($rsGuestbook["Domestic"]=0$then; )
{
  $checked<$%end$if; } ?>> No position at this time.	
		</p>	
		</td>
	</tr>
	<tr>
		<td align="right" width="48%">
		<p align="left">
		The nation 
		closest to your northern borders has experienced a disastrous economic 
		failure. Hordes of immigrants cross over onto your borders seeking new 
		jobs and opportunities. This new wave of job seekers could bring a 
		similar devastation to your own economy. What is your government’s 
		position?</td>
		<td width="49%"> 
		<p align="left"> 
		<input type="radio" value="1" name="Immigration" <? if ($rsGuestbook["Immigration"]=1$then; )
{
  $checked<$%end$if; } ?>> 
		We welcome all immigration with open borders. They may come and go as 
		they like.<br>
		<input type="radio" value="2" name="Immigration" <? if ($rsGuestbook["Immigration"]=2$then; )
{
  $checked<$%end$if; } ?>> We have an open border policy, but in order for the immigrants to remain in the country they will have to become citizens first.<br>
		<input type="radio" value="3" name="Immigration" <? if ($rsGuestbook["Immigration"]=3$then; )
{
  $checked<$%end$if; } ?>> What? Immigrants? Did our border guards fall asleep? Our nation's borders are closed to all immigrants.<br>
		<input type="radio" value="0" name="Immigration" <? if ($rsGuestbook["Immigration"]=0$then; )
{
  $checked<$%end$if; } ?>> No position at this time.	
		</p>	
		</td>
	</tr>				
	<tr>
		<td align="right" width="48%">
		<p align="left">
		Computers 
		are now at a 1:1 ratio to the number of citizens in your country. With that 
		comes great knowledge and information as well as issues to your 
		nation such as Internet viruses, security threats, pornography, and 
		un-moderated message boards. One message board in particular has been the site of 
		some very terrible remarks made about your nation and the way it is ruled. 
		What is your government’s position?</td>
		<td width="49%"> 
		<p align="left"> 
		<input type="radio" value="1" name="Speech" <? if ($rsGuestbook["Speech"]=1$then; )
{
  $checked<$%end$if; } ?>> We believe in freedom of speech and believe that it is the citizens right to speak freely about their government.<br>
		<input type="radio" value="2" name="Speech" <? if ($rsGuestbook["Speech"]=2$then; )
{
  $checked<$%end$if; } ?>> We will allow the discussions for now, but this form of free speech is considered taboo in our country.<br>
		<input type="radio" value="3" name="Speech" <? if ($rsGuestbook["Speech"]=3$then; )
{
  $checked<$%end$if; } ?>> We will shut down the website that hosts these message boards and detain the individuals who participated in the slanderous comments 
		about the government.<br>
		<input type="radio" value="0" name="Speech" <? if ($rsGuestbook["Speech"]=0$then; )
{
  $checked<$%end$if; } ?>> No position at this time.	
		</p>	
		</td>
	</tr>
	<tr>
		<td align="right" width="48%">
		<p align="left">
		A foreign 
		nation has asked for monetary assistance from your nation after a 
		tsunami struck their capital city. The money will go towards rebuilding 
		the foreign nation’s devastated capital and setting up shelters for the victims. 
		Your budget is very tight, but this is a chance to help others as well as an 
		opportunity for a strong public relations 
		boost for your nation in the eyes of the nations of the world. What is 
		your government’s position?</td>
		<td width="49%"> 
		<p align="left"> 
		<input type="radio" value="1" name="Disaster" <? if ($rsGuestbook["Disaster"]=1$then; )
{
  $checked<$%end$if; } ?>> We 
		will give whatever is necessary to help the victims of the 
		tsunami. If that means we'll be running a deficit we'll make cuts in other areas of 
		our government.<br>
		<input type="radio" value="2" name="Disaster" <? if ($rsGuestbook["Disaster"]=2$then; )
{
  $checked<$%end$if; } ?>> We are able to help some, but our pockets are not very deep at this time.<br>
		<input type="radio" value="3" name="Disaster" <? if ($rsGuestbook["Disaster"]=3$then; )
{
  $checked<$%end$if; } ?>> We will not help the "victims" of the 
		tsunami. They shouldn't have build their capital so close to the sea.<br>
		<input type="radio" value="0" name="Disaster" <? if ($rsGuestbook["Disaster"]=0$then; )
{
  $checked<$%end$if; } ?>> No position at this time.	
		</p>	
		</td>
	</tr>
	<tr>
		<td align="right" width="48%">
		<p align="left">
		A foreign 
		nation which is known around the world for its terrible treatment of its 
		citizens and for poor inhuman actions against others has asked that you open your 
		borders to trade with them. While this could bring new products to your 
		markets and help boost your economy it might also look bad in the eyes of 
		the other nations around the world. What is your government’s position?</td>
		<td width="49%"> 
		<p align="left"> 
		<input type="radio" value="1" name="Trade" <? if ($rsGuestbook["Trade"]=1$then; )
{
  $checked<$%end$if; } ?>> 
		We will not open our ports to trade with this nation.<br>
		<input type="radio" value="2" name="Trade" <? if ($rsGuestbook["Trade"]=2$then; )
{
  $checked<$%end$if; } ?>> 
		We are prepared to trade with this nation, but we will do so in secrecy.<br>
		<input type="radio" value="3" name="Trade" <? if ($rsGuestbook["Trade"]=3$then; )
{
  $checked<$%end$if; } ?>> 
		We will trade with this nation openly.<br>
		<input type="radio" value="0" name="Trade" <? if ($rsGuestbook["Trade"]=0$then; )
{
  $checked<$%end$if; } ?>> No position at this time.	
		</p>	
		</td>
	</tr>			
	</table>
	<p align="center">   
   
   
<!--#include file="activitycheck.php" -->   


   <input type="hidden" name="Nation_ID" value="<? echo $rsGuestbook["Nation_ID"]; ?>">
   <input type="submit" class="Buttons" name="Submit" value="Set My Government Position">
</p>
</form>
<!-- End form code -->
</body>
<? >
</html>
<!--#include file="inc_footer.php" -->

<? 
