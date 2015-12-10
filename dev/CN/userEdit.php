<?
  session_start();
  session_register("MM_Username_session");
?>
<? // asp2php (vbscript) converted
?>
<!--#include file="connection.php" -->
<? 
$MM_authFailedURL="default.asp?lf=1";
if ($MM_Username_session!="admin")
{

  header("Location: ".$MM_authFailedURL);
} 

?>
<? 
// *** Edit Operations: declare variables


$MM_editAction=${"URL"};
if (($_GET!=""))
{

  $MM_editAction=$MM_editAction."?".$_GET;
} 


// boolean to abort record edit

$MM_abortEdit=false;

// query string to execute

$MM_editQuery="";
?>
<? 
// *** Update Record: set variables


if ((${"MM_update"}!="" && ${"MM_recordId"}!=""))
{


  $MM_editConnection=$MM_conn_STRING;
  $MM_editTable="USERS";
  $MM_editColumn="U_ID";
  $MM_recordId="'"+$_POST["MM_recordId"]+"'";
  $MM_editRedirectUrl="activity.asp";
  $MM_fieldsStr="U_Password|value|U_Password_Secure|value|U_EMAIL|value|BANNED|value|IPADDRESS|value|Last_IP|value";
  $MM_columnsStr="U_Password|',none,''|U_Password_Secure|',none,''|U_EMAIL|',none,''|BANNED|',none,''|IPADDRESS|',none,''|Last_IP|',none,''";

// create the MM_fields and MM_columns arrays

  $MM_fields=$Split[$MM_fieldsStr]["|"];
  $MM_columns=$Split[$MM_columnsStr]["|"];

// set the form values

  for ($i=0; $i<=count($MM_fields); $i=$i+2)
  {
    $MM_fields[$i+1]=$_POST[$MM_fields[$i]];

  } 


// append the query string to the redirect URL

  if (($MM_editRedirectUrl!="" && $_POST!=""))
  {

    if (((strpos(1,$MM_editRedirectUrl,"?",$vbTextCompare) ? strpos(1,$MM_editRedirectUrl,"?",$vbTextCompare)+1 : 0)==0 && $_POST!=""))
    {

      $MM_editRedirectUrl=$MM_editRedirectUrl."?".$_POST;
    }
      else
    {

      $MM_editRedirectUrl=$MM_editRedirectUrl."&".$_POST;
    } 

  } 


} 

?>
<? 
// *** Update Record: construct a sql update statement and execute it


if ((${"MM_update"}!="" && ${"MM_recordId"}!=""))
{


// create the sql update statement

  $MM_editQuery="update ".$MM_editTable." set ";
  for ($i=0; $i<=count($MM_fields); $i=$i+2)
  {
    $FormVal=$MM_fields[$i+1];
    $MM_typeArray=$Split[$MM_columns[$i+1]][","];
    $Delim=$MM_typeArray[0];
    if (($Delim=="none"))
    {
      $Delim="";
    } 
    $AltVal=$MM_typeArray[1];
    if (($AltVal=="none"))
    {
      $AltVal="";
    } 
    $EmptyVal=$MM_typeArray[2];
    if (($EmptyVal=="none"))
    {
      $EmptyVal="";
    } 
    if (($FormVal==""))
    {

      $FormVal=$EmptyVal;
    }
      else
    {

      if (($AltVal!=""))
      {

        $FormVal=$AltVal;
      }
        else
      if (($Delim=="'"))
      {
// escape quotes

        $FormVal="'".str_replace("'","''",$FormVal)."'";
      }
        else
      {

        $FormVal=$Delim+$FormVal+$Delim;
      } 

    } 

    if (($i!=0))
    {

      $MM_editQuery=$MM_editQuery.",";
    } 

    $MM_editQuery=$MM_editQuery.$MM_columns[$i]." = ".$FormVal;

  } 

  $MM_editQuery=$MM_editQuery." where ".$MM_editColumn." = ".$MM_recordId;

  if ((!$MM_abortEdit))
  {

// execute the update

// $MM_editCmd is of type "ADODB.Command"

    $MM_editCmd_ActiveConnection=$MM_editConnection;
        $MM_editCmd_CommandText=$MM_editQuery;
        $MM_editCmd_Execute=    $MM_editCmd_ActiveConnection=$Close;
;
        if (($MM_editRedirectUrl!=""))
    {

      header("Location: ".$MM_editRedirectUrl);
    } 

  } 


} 

?>
<? 
$rsAllUsers__MMColParam="1";
if (($_GET["id"]!=""))
{
  $rsAllUsers__MMColParam=$_GET["id"];
} ?>
<? 
// $rsAllUsers is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT *FROM USERS  WHERE U_ID = '"+str_replace("'","''",$rsAllUsers__MMColParam)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();
$rsAllUsers_numRows=0;
?>
<? 
$Repeat1__numRows=15;
$Repeat1__index=0;
$rsAllUsers_numRows=$rsAllUsers_numRows+$Repeat1__numRows;
?>
<!--#include file="inc_header2.php" -->

<p>&nbsp;</p><table width="98%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#003366">
  <tr> 
    <td height="169" valign="top" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <form name="SEARCH" method="post" action="../search.php">
        </form>
        <tr> 
          <td height="18" align="center" valign="middle" class="shellBackground"><div align="left"><strong>USER 
                    INFO </strong></div></td>
        </tr>
      </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td width="769" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr valign="middle" align="center"> 
              <td height="30"> <form method="POST" action="<? echo $MM_editAction; ?>" name="form1">
                    <table width="100%" height="342" align="center">
                      <tr valign="baseline"> 
                        <td width="64" align="left" valign="middle" nowrap><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1">USER 
                          ID:</font></b></td>
                        <td width="887" valign="middle"> <? echo (.$Item["U_ID"].$Value); ?> 
                          </td>
                      </tr>
                      <tr valign="baseline"> 
                        <td nowrap align="left" valign="middle"><b>
						<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
						Temp Password:</font></b></td>
                        <td valign="middle"> 
						<input name="U_Password" type="text" class="inputFieldIE" value="<? echo (.$Item["U_Password"].$Value); ?>" size="35"> 
                        </td>
                      </tr>
                      <tr valign="baseline"> 
                        <td nowrap align="left" valign="middle"><b>
						<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
						Secure Password:</font></b></td>
                        <td valign="middle"> 
						CN6712: 
						f1d3946cfedd7ef11751a1240c910ebecc891d8a8f2e493fb98dabf94ca28b0f<br>
						<input name="U_Password_Secure" type="text" class="inputFieldIE" value="<? echo (.$Item["U_Password_Secure"].$Value); ?>" size="35"> 
                        </td>
                      </tr>
                      <tr>
                        <td nowrap align="left" valign="middle"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1">EMAIL:</font></b></td>
                        <td valign="middle"> 
						<input name="U_EMAIL" type="text" class="inputFieldIE" value="<? echo (.$Item["U_EMAIL"].$Value); ?>" size="35"> 
                        </td>
                      </tr>
                      <tr>
                        <td nowrap align="left" valign="middle"><b>
						<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
						IP Address:</font></b></td>
                        <td valign="middle"> 
						<input name="IPADDRESS" type="text" class="inputFieldIE" value="<? echo (.$Item["IPADDRESS"].$Value); ?>" size="35"> 
                        </td>
                      </tr>
                      <tr>
                        <td nowrap align="left" valign="middle"><b>
						<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
						Last IP:</font></b></td>
                        <td valign="middle"> 
						<input name="LAST_IP" type="text" class="inputFieldIE" value="<? echo (.$Item["Last_IP"].$Value); ?>" size="35"> 
                        </td>
                      </tr>
                      <tr valign="baseline"> 
                        <td nowrap align="left" valign="middle"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1">BANNED 
						<br>
						(0-NO , 1-YES, 
						2-No Delete):</font></b></td>
                        <td valign="middle"> <input name="BANNED" type="text" class="inputFieldIE" value="<? echo (.$Item["BANNED"].$Value); ?>" size="35"> 
                        </td>
                      </tr>
                      <tr valign="baseline"> 
                        <td nowrap align="center" valign="middle" colspan="2"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"></font></b> 
                          <input name="submit" type="submit" class="inputFieldIE" value="Save Changes"> 
                        </td>
                      </tr>
                    </table>
                    <input type="hidden" name="MM_update" value="form1">
                    <input type="hidden" name="MM_recordId" value="<? echo .$Item["U_ID"].$Value; ?>">
                  </form>
                <font face="Verdana, Arial, Helvetica, sans-serif"><font size="2"> 
                </font> </font> </td>
            </tr>
            <tr align="left"> 
              <td valign="top" align="center"> <div class = "links"> </div></td>
            </tr>
          </table></td>
  </tr>
</table>

<!--#include file="inc_footer.php" -->

<? 

?>
