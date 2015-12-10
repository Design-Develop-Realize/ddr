<? // Option $Explicit; ?>
<? ob_start();
?>
<!--#include file="common.inc" -->
<? 
//****************************************************************************************

//**  Copyright Notice    

//**

//**  Web Wiz Guide ASP Weekly Poll

//**                                                              

//**  Copyright 2001-2002 Bruce Corkhill All Rights Reserved.                                

//**

//**  This program is free software; you can modify (at your own risk) any part of it 

//**  under the terms of the License that accompanies this software and use it both 

//**  privately and commercially.

//**

//**  All copyright notices must remain in tacked in the scripts and the 

//**  outputted HTML.

//**

//**  You may use parts of this program in your own private work, but you may NOT

//**  redistribute, repackage, or sell the whole or any part of this program even 

//**  if it is modified or reverse engineered in whole or in part without express 

//**  permission from the author.

//**

//**  You may not pass the whole or any part of this application off as your own work.

//**   

//**  All links to Web Wiz Guide and powered by logo's must remain unchanged and in place//**  and must remain visible when the pages are viewed unless permission is first granted

//**  by the copyright holder.

//**

//**  This program is distributed in the hope that it will be useful,

//**  but WITHOUT ANY WARRANTY; without even the implied warranty of

//**  MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR ANY OTHER 

//**  WARRANTIES WHETHER EXPRESSED OR IMPLIED.

//**

//**  You should have received a copy of the License along with this program; 

//**  if not, write to:- Web Wiz Guide, PO Box 4982, Bournemouth, BH8 8XP, United Kingdom.

//**    

//**

//**  No official support is available for this program but you may post support questions at: -

//**  http://www.webwizguide.info/forum

//**

//**  Support questions are NOT answered by e-mail ever!

//**

//**  For correspondence or non support questions contact: -

//**  info@webwizguide.com

//**

//**  or at: -

//**

//**  Web Wiz Guide, PO Box 4982, Bournemouth, BH8 8XP, United Kingdom

//**

//****************************************************************************************



//Dimension variables



//Initialise variables

$intPollIDNum=0;
$intToatalPollVotes=0;
$blnSaveVote=true;

//If this is not a previous poll to be displayed then read in the details from the form and save the choice

if ($_GET["PollID"]=="")
{


//Read in the Poll ID Number

  $intPollIDNum=intval($_POST["id"]);

//Read in the Poll Vote user choice

  $strPollVote=$_POST["PollVote"];


//If a vote has been cast then record the vote

  if (!$strPollVote=="")
  {


//Call the Save Poll Votes Function (This must be called before any HTML is written as it sets a Cookie)

    $blnSaveVote=SavePollVotes($strPollVote,$intPollIDNum);

  } 


//Else this is a previous poll to display so show get the poll id number to display

}
  else
{


//Read in the Poll ID Number of the previous poll to display

  $intPollIDNum=intval($_GET["PollID"]);

} 

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Weekly Poll Results</title>

<!-- The Web Wiz Guide Weekly Poll is written and produced by Bruce Corkhill ©2001
     	If you want your own Weekly Poll then goto http://www.webwizguide.info -->

<style type="text/css">
<!--
.text {font-family: <? echo $strTextType; ?>; font-size: <? echo $intTextSize; ?>px; color: <? echo $strTextColour; ?>}
.bold {font-family: <? echo $strTextType; ?>; font-size: <? echo $intTextSize; ?>px; color: <? echo $strTextColour; ?>; font-weight: bold;}
.heading {font-family: <? echo $strTextType; ?>; font-size: 24px; color: <? echo $strTextColour; ?>}
a {font-family: <? echo $strTextType; ?>; font-size: <? echo $intTextSize; ?>px; color: <? echo $strLinkColour; ?>}
a:hover {font-family: <? echo $strTextType; ?>; font-size: <? echo $intTextSize; ?>px; color: <? echo $strHoverLinkColour; ?>}
a:visited {font-family: <? echo $strTextType; ?>; font-size: <? echo $intTextSize; ?>px; color: <? echo $strVisitedLinkColour; ?>}
a:visited:hover {font-family: <? echo $strTextType; ?>; font-size: <? echo $intTextSize; ?>px; color: <? echo $strHoverLinkColour; ?>}
-->
</style>    	
</head>
<body bgcolor="<? echo $strBgColour; ?>" text="<? echo $strTextColour; ?>">
<h2 align="center" class="heading">Cyber Nations Web Poll</h2>
<? 


//Read the Poll results from the database


//Create a connection odject

// $rsWeeklyPoll is of type "ADODB.Recordset"


//Initalise the strSQL variable with an SQL statement to query the database

$strSQL="SELECT * FROM tblPolls ";
if (!$intPollIDNum==0)
{

  $strSQL=$strSQL."WHERE tblPolls.id_no = ".$intPollIDNum;
} 

$strSQL=$strSQL." ORDER By id_no DESC;";

//Query the database

$rs=mysql_query($strSQL);


//Check there is a weekly poll to display

if (($rsWeeklyPoll==0))
{


//If there is no weekly poll to display then display the appropriate message

  print "\r\n"."<div align=\"center\"><span class=\"text\">There is no Weekly Poll to display</span></div>";

//Else there is a weekly poll to write the HTML to display it

}
  else
{


//Read in the polling question from the database

  $strPollQuestion=$rsWeeklyPoll["Question"];

//Read in the polling question ID No from the database

  $intPollIDNum=intval($rsWeeklyPoll["id_no"]);

//Loop round to read in the number of votes cast

  for ($intReadInVotesLoopCounter=1; $intReadInVotesLoopCounter<=7; $intReadInVotesLoopCounter=$intReadInVotesLoopCounter+1)
  {


//Read in the total number of votes cast

    $intToatalPollVotes=$intToatalPollVotes+intval($rsWeeklyPoll["Votes_".$intReadInVotesLoopCounter.""]);

  } 




//Display the HTML for the weekly poll	


//If the user has already voted once before in this poll vote then display the approriate message

  if ($blnSaveVote==false)
  {

//If the user has already voted then display an appriorate message

    print "\r\n"."<div align=\"center\"><span class=\"text\">Sorry, you have already voted in this Weeks Poll</span></div><br>";
  } 

?>
	<a href="http://www.webwizguide.info"></a>
<table width="220" border="0" cellspacing="0" cellpadding="1" align="center" bgcolor="<?   echo $strTableBorderColour; ?>">
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="<?   echo $strTableColour; ?>">
        <tr> 
          <td align="center"> 
            <? 

  print "\r\n"."    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";
  print "\r\n"."      <tr>";

//Display the poll question            

  print "\r\n"."            <td align=\"center\" height=\"31\" class=\"bold\">".$strPollQuestion."</td>";

  print "\r\n"."      </tr>";
  print "\r\n"."     </table>";

  print "\r\n"."       <table width=\"215\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\" align=\"center\">";

//Loop to display each of the selection choices for the poll

  for ($intSelectionLoopCounter=1; $intSelectionLoopCounter<=7; $intSelectionLoopCounter=$intSelectionLoopCounter+1)
  {


//If there is a Selection choice then display the HTML to show it

    if (!$rsWeeklyPoll["Selection_".$intSelectionLoopCounter]=""$Then;
)
    {
//If there are no votes yet then format the percent by 0 otherwise the sums corse problems

      if ($intToatalPollVotes==0)
      {

        $dblPollVotePercentage=$FormatPercent[0][0];

      }
        else
      {

//Read in the the percentage of votes cast for the vote choice

        $dblPollVotePercentage=$FormatPercent[($rsWeeklyPoll["Votes_".$intSelectionLoopCounter]/$intToatalPollVotes)][0];
      } 


//Display the selection choice results

      print "\r\n"."  	     <tr>";
      print "\r\n"."  	       <td colspan=\"3\" class=\"text\">".$rsWeeklyPoll["Selection_".$intSelectionLoopCounter]."</td>";
      print "\r\n"."  	     </tr>";
      print "\r\n"."  	     <tr>";
      print "\r\n"."  	     <td width=\"200\"><img src=\"bar_graph_image.gif\" width=\"".$dblPollVotePercentage."\" height=\"15\"></td>";
      print "\r\n"."  	     <td width=\"15\" align=\"right\" class=\"text\">".$dblPollVotePercentage."</td>";
      print "\r\n"."  	     </tr>";

    } 


  } 


  print "\r\n"."	     </table>";

//Display the total votes cast    

  print "\r\n"."		<span class=\"text\">Total Votes: ".$intToatalPollVotes."</span>";

} 



//Reset Server Objects

$adoCon=null;

$strCon=null;


$rsWeeklyPoll=null;

?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center" height="31"><a href="JavaScript:window.close()">Close Window</a></td>
  </tr>
</table>
<br>
<div align="center">
<? 
//***** START WARNING - REMOVAL OR MODIFICATION OF THIS CODE WILL VIOLATE THE LICENSE AGREEMENT ****** 

print "<a href=\"http://www.webwizguide.info\" target=\"_blank\"><img src=\"web_wiz_guide.gif\" width=\"100\" height=\"30\" border=\"0\" alt=\"Web Wiz Guide!\"></a><br>";
//***** END WARNING - REMOVAL OR MODIFICATION OF THIS CODE WILL VIOLATE THE LICENSE AGREEMENT ****** 

?>
</div>
</body>
</html>
<? 

//Sub function to save the users Poll Vote Choice

function SavePollVotes($ByRef$strPollVoteChoice,$ByRef$intPollIDNum)
{
  extract($GLOBALS);



//Dimension variables



//Intialise variables

  $SavePollVotes=true;


//Check the user has not already voted by reading in a cookie from there system

//Read in the Poll ID number of the last poll the user has voted in

  $intVotedIDNo=intval($_COOKIE["Poll"]("PollID"));

//Check to see if the user has voted in this poll

  if ($intVotedIDNo==$intPollIDNum)
  {


//If the user has already voted then return flase

    $SavePollVotes=false;

//Else if the user has not already voted so increment the vote choice total and set a cookie on the users system

  }
    else
  {


//Read in the vote choice numbers from the database

//Create a recordset odject

// $rsSavePollVotes is of type "ADODB.Recordset"


//First we need to read in the present vote number so we can add 1 to it

//Initalise the strSQL variable with an SQL statement to query the database

    $strSQL="SELECT * FROM tblPolls ";
    $strSQL=$strSQL." WHERE id_no =".intval($intPollIDNum);

//Set the cursor type property of the recordset to Dynamic so we can navigate through the record set

        echo 2;

//Set the Lock Type for the records so that the recordset is only locked when it is updated

        echo 3;

//Query the database

    $rs=mysql_query($strSQL);


//Read in the value of the vote choice selected form the database	

    $intVoteChoiceCount=intval($rsSavePollVotes[$strPollVoteChoice]);

//Increment the vote choice by 1

    $intVoteChoiceCount=$intVoteChoiceCount+1;


//Update the database with the new poll results	

        $strPollVote)=intval($intVoteChoiceCount);
    

//Re-run the query to read in the updated recordset from the database for the poll results

    


//Reset Server Objects 

    $adoCon=null;

    
    $rsSavePollVotes=null;


//If multiple votes for a poll are not allowed then save a cookie on the users system

    if ($blnMultipleVotes==false)
    {

//Write a cookie with the Poll ID number so the user cannot keep voting on this poll		

//Write the cookie with the name Poll containing the value PollID

      //PollID") = intPollIDNum
//Set the expiry date for 1 year

      // Unsupported: Response.Cookie. Expires = Now ( ) + 360
    } 


  } 


  return $function_ret;
} 

?>
