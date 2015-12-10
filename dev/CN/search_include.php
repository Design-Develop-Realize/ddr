<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.search.value == "")
  {
    alert("Please enter a value for the \"Search For\" field.");
    theForm.search.focus();
    return (false);
  }

  if (theForm.search.value.length < 3)
  {
    alert("Please enter at least 3 characters in the \"Search For\" field.");
    theForm.search.focus();
    return (false);
  }

  if (theForm.search.value.length > 40)
  {
    alert("Please enter at most 40 characters in the \"Search For\" field.");
    theForm.search.focus();
    return (false);
  }

  var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzƒŠŒšœŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖØÙÚÛÜİŞßàáâãäåæçèéêëìíîïğñòóôõöøùúûüışÿ0123456789-'!@#$%^&*()\":;'-=_.,/ \t\r\n\f";
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
    alert("Please enter only letter, digit, whitespace and \"'!@#$%^&*()\":;'-=_.,/\" characters in the \"Search For\" field.");
    theForm.search.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan --><form action="search.php" method="get" name="FrontPage_Form1" id="dirsearch" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="5" bordercolor="#000080">
<tr>
<td width="50%">
<p align="right">Search 
<select size="1" name="searchstring" class="displayFieldIE">
<option value="All">Everything</option>
<option value="Nation_Name">Nation Name</option>
<option value="Poster">Nation Ruler</option>
<option value="Nation_Team">Nation Team</option>
<option value="Alliance">Alliance</option>
<option value="Alliance,Nation_Team">Alliance + Team</option>
<option value="Resource1,Resource2,Alliance">Alliance + Resources</option>
<option value="Ethnic_Group">Ethnic Group</option>
<option value="Government_Type">Government Type</option>
<option value="Resource1,Resource2">Resources</option>
<option value="Resource1,Resource2,Nation_Team">Team + Resources</option>
</select> For: </td>
<td width="50%"><div align="left"><font size="1"> 
	<!--webbot bot="Validation" S-Display-Name="Search For" S-Data-Type="String" B-Allow-Letters="TRUE" B-Allow-Digits="TRUE" B-Allow-WhiteSpace="TRUE" S-Allow-Other-Chars="'!@#$%^&amp;*()&quot;:;'-=_.,/" B-Value-Required="TRUE" I-Minimum-Length="3" I-Maximum-Length="40" --><input name="search" class="displayFieldIE" id="search" size="27" style="float: left" maxlength="40" value="<? echo ${"search"}; ?>">
</font></div>

<select name="anyallexact" class="displayFieldIE" style="width:120px" >
<option value="all" <? if (${"anyallexact"}=="all")
{
?>selected<? } ?>>All words</option>
<option value="any" <? if (${"anyallexact"}=="any")
{
?>selected<? } ?>>Any words</option>
<option value="exact" <? if (${"anyallexact"}=="exact")
{
?>selected<? } ?>>Exact phrase</option>
</select>

<input name="imageField" type="image" id="imageField" src="assets/go.gif" width="21" height="14" border="0"></td>
</td>
</tr>
</table>
</form>
