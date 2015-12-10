<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<? 
$lngRecordNo=intval($_GET["Nation_ID"]);
$lngRecordNo=str_replace("'","''",$lngRecordNo);
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID=".$lngRecordNo;
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);

if (($rsGuestbook_BOF==1) && ($rsGuestbook==0))
{

  header("Location: "."failed_noexist.asp");
} 

?>
<!--#include file="trade_connections.php" -->	
<!--#include file="calculations.php" -->

<table border="1" width="100%" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080">


<tr>
<td width="70%" bgcolor="#000080" colspan="2"><b>
<font color="#000080"><a name="info">_</a></font><font color="#FFFFFF">:. 
Nation Information</font></b></b></td>
</tr>
<tr>
<td width="70%" bgcolor="#FFFFFF" colspan="2">
<? echo $rsGuestbook["Nation_Name"]; ?> is a 
<? if ($nationsize<10)
{
?> small <? } ?>
<? if ($nationsize>=10 && $nationsize<20)
{
?> small but growing <? } ?>
<? if ($nationsize>=20 && $nationsize<35)
{
?> sizeable <? } ?>
<? if ($nationsize>=35 && $nationsize<50)
{
?> large <? } ?>
<? if ($nationsize>=50)
{
?> very large <? } ?>
and 

<? if ($nationage<30)
{
?> new nation<? }
  else
{
?> older nation<? } ?> at <? echo $iDaysDifference; ?> days old 
with citizens primarily of
<? echo $rsGuestbook["Ethnic_Group"]; ?> ethnicity 

<? if ($rsGuestbook["Religion"]="None"$then; )
{
  $who$follow$no$religion->
<$%else$if$rsGuestbook["Religion"]="Mixed"$then; ; } ?>who follow mixed religions.
<? }
  else
{
?>whose religion is <? echo $rsGuestbook["Religion"]; ?>.
<? ><? if ($%end$if)
{


  $then; ?> It is a backwards nation when it comes to technology 
and many refer to it unkindly as a 'Third World Nation'. <? } ?>
<? if ($literacy>55 && $literacy<65)
{
?> Its technology is progressing 
moderately and its citizens enjoy an average amount of technological improvements within the nation. <? } ?>
<? if ($literacy>65 && $literacy<85)
{
?> Its technology is advancing rapidly. 
Its citizens enjoy a wealth of technology within their nation. <? } ?>
<? if ($literacy>85)
{
?> Its technology is first rate and its citizens marvel at the astonishing 
advancements within their nation. <? } ?>

<? if ($rsGuestbook["Tax_Rate"]<17)
{
?> Its citizens enjoy freedom from high taxation and as a result tend to earn more money. <? } ?>
<? if ($rsGuestbook["Tax_Rate"]>=17 && $rsGuestbook["Tax_Rate"]<22)
{
?> Its citizens pay 
moderately high tax rates and they are somewhat unhappy in their work environments as a result. <? } ?>
<? if ($rsGuestbook["Tax_Rate"]>=22 && $rsGuestbook["Tax_Rate"]<25)
{
?> Its citizens pay high taxes and constantly express grievances about their government and work environments. <? } ?>
<? if ($rsGuestbook["Tax_Rate"]>=25)
{
?> Its citizens pay extremely high taxes 
and many despise their government as a result. <? } ?>


The citizens of <? echo $rsGuestbook["Nation_Name"]; ?> work diligently to produce <? echo $rsGuestbook["Resource1"]; ?> and <? echo $rsGuestbook["Resource2"]; ?>
as tradable resources for their nation.


<? if ($rsGuestbook["Foreign"]=0$then; )
{
  $The$government$has$no$definite$position$on$foreign$affairs$at$this->.<$%end$if; } ?>
<? if ($rsGuestbook["Foreign"]=1$then; )
{
  $It$is$a$very$passive$country$when$it$comes} 
$foreign$affairs&$has$no$interests$in$war-><$%end$if; ?>
<? if ($rsGuestbook["Foreign"]=2$then; )
{
  $It$is$a$mostly$neutral$country$when$it$comes} 
$foreign$affairs->It$will$usually$only$attack$another$nation$if$attacked$first-><$%end$if; ?>
<? if ($rsGuestbook["Foreign"]=3$then; )
{
  $It$is$an$aggressive$country$that$some$say$has$an$itch$for$war-><$%end$if; } ?>

<? if ($rsGuestbook["Nuclear"]=0$then; )
{
} 
$nbsp;When$it$comes$nuclear$weapons<$%=$rsGuestbook["Nation_Name"]; ?> has no definite position 
and is therefore considered opposed to them.<? >
<? if ($%if$rsGuestbook["Nuclear"]=1$then; )
{
} 
$nbsp;When$it$comes$nuclear$weapons<$%=$rsGuestbook["Nation_Name"]; ?> 
will not research or develop nuclear weapons. <? >
<? if ($%if$rsGuestbook["Nuclear"]=2$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> is currently researching nuclear 
technology for the use of nuclear power plants but believes nuclear weapons should be banned.<? >
<? if ($%if$rsGuestbook["Nuclear"]=3$then; )
{
} 
$nbsp;It$believes$nuclear$weapons$are$necessary$for$the$security$of$its$people-><$%end$if; ?>			

<? if ($rsGuestbook["Drugs"]=0$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> has no definite position on drug use in the country at this time.<? >
<? if ($%if$rsGuestbook["Drugs"]=1$then; )
{
} 
$nbsp;The<$%=$rsGuestbook["Nation_Name"]; ?> nation leaders are aware of the situation of drug use in the country but are too addicted to drugs themselves to do anything about it.<? >
<? if ($%if$rsGuestbook["Drugs"]=2$then; )
{
} 
$nbsp;Plans$are$on$the$way$within<$%=$rsGuestbook["Nation_Name"]; ?> to open new rehabilitation centers across the nation and educate its citizens of the dangers of drug use.<? >
<? if ($%if$rsGuestbook["Drugs"]=3$then; )
{
} 
$nbsp;The$military$of<$%=$rsGuestbook["Nation_Name"]; ?> has been positioned at all border crossings and is arresting all drug traffickers.<? >	

<? if ($%if$rsGuestbook["Domestic"]=0$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> has no definite position on domestic issues concerning government protests in the country at this time.<? >
<? if ($%if$rsGuestbook["Domestic"]=1$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> allows its citizens to openly protest their government, even if it means violence.<? >
<? if ($%if$rsGuestbook["Domestic"]=2$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> allows its citizens to protest their government but uses a strong police force to monitor things and arrest lawbreakers.<? >
<? if ($%if$rsGuestbook["Domestic"]=3$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> does not allow any form of government protests. Its armed police forces work quickly at "dissolving" any and all government protests.<? >	

<? if ($%if$rsGuestbook["Immigration"]=0$then; )
{
} 
$nbsp;It$has$no$definite$position$onnew immigration(.<$%end$if); ?>
<? if ($rsGuestbook["Immigration"]=1$then; )
{
} 
$nbsp;It$welcomes$allnew immigrants($with$open$borders-><$%end$if); ?>
<? if ($rsGuestbook["Immigration"]=2$then; )
{
} 
$nbsp;It$has$an$open$border$policy$but$in$order$for$immigrants->remain$in$the$country$they$will$have$become$citizens$first-><$%end$if; ?>
<? if ($rsGuestbook["Immigration"]=3$then; )
{
} 
$nbsp;It's$borders$are$closed$all$forms$of$immigration-><$%end$if; ?>	

<? if ($rsGuestbook["Speech"]=0$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> has no definite position on free speech.<? >
<? if ($%if$rsGuestbook["Speech"]=1$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> believes in the freedom of speech and feels that it is every citizens right to speak freely about their government.<? >
<? if ($%if$rsGuestbook["Speech"]=2$then; )
{
} 
$nbsp;Free$speech$is$considered$taboo$in<$%=$rsGuestbook["Nation_Name"]; ?>.<? >
<? if ($%if$rsGuestbook["Speech"]=3$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> detains individuals who participated in the slanderous comments about the government.<? >	

<? if ($%if$rsGuestbook["Disaster"]=0$then; )
{
} 
$nbsp;<$%=$rsGuestbook["Nation_Name"]; ?> has no definite foreign aid at this time.<? >
<? if ($%if$rsGuestbook["Disaster"]=1$then; )
{
} 
$nbsp;The$government$gives$whatever$is$necessary$help$others$out$in$times$of$crisis$even$it;
//en-us"></span>means hurting its own economy.<%end if?>
<? 
