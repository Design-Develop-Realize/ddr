<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?>
<!--#include file="connection.php" -->

<p align="center">
<a title="Cyber Nations, an online nation simulation game" href="default.php" name="pagetop">
<img border="0" src="images/cybernationslogo.jpg" alt="Cyber Nations, an online nation simulation game"></a></p>
<p></p>
<p></p>
<p></p>
<p>&nbsp;</p>
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
//--></script><!--webbot BOT="GeneratedScript" endspan --><form action="search2_blank.php" method="get" name="FrontPage_Form1" id="dirsearch" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
	<tr>
		<td width="50%">
		<p align="right">Search For A Unique Nation Name:</td>
		<td width="50%"><div align="left"><font size="1"> 
			&nbsp;<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-allow-digits="TRUE" b-allow-whitespace="TRUE" --><input name="search" class="displayFieldIE" id="search" size="27" style="float: left">
</font></div><input name="imageField" type="image" id="imageField" src="assets/go.gif" width="21" height="14" border="0"></td>
		</td>
	</tr>
</table>
</form>



<? 
$objConn->Close();
$objConn=null;

?>
