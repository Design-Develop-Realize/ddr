<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<body>



<p align="center">&nbsp;</p>



<p></p>

<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0123456789- \t\r\n\f";
  var checkStr = theForm.search.value;
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
    alert("Please enter only letter, digit and whitespace characters in the \"search\" field.");
    theForm.search.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form action="search.php" method="get" name="FrontPage_Form1" id="dirsearch" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="50%">
		<p align="right">Search For Nations &amp; Rulers:</td>
		<td width="50%"><div align="left"><font size="1"> 
			<!--webbot bot="Validation" S-Data-Type="String" B-Allow-Letters="TRUE" B-Allow-Digits="TRUE" B-Allow-WhiteSpace="TRUE" --> 
<input name="search" class="displayFieldIE" id="search" size="27" style="float: left">
</font></div><input name="imageField" type="image" id="imageField" src="assets/go.gif" width="21" height="14" border="0"></td>
		</td>
	</tr>
</table>
</form>


<!--#include file="inc_footer.php" --> 
<? $objConn->Close();
$objConn=null;
?>
