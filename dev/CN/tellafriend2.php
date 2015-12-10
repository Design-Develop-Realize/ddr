<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<? // asp2php (vbscript) converted
$CODEPAGE="1252"; ?>
<!--#include file="connection.php" -->
<!--#include file="checkfromserver.php" -->
<? 
// *** Logout the current user.

$MM_Logout=$_SERVER["URL"]."?MM_Logoutnow=1";
if ((${"MM_Logoutnow"}=="1"))
{


  $MM_logoutRedirectPage="default.asp";
// redirect with URL parameters (remove the "MM_Logoutnow" query param).

  if (($MM_logoutRedirectPage==""))
  {
    $MM_logoutRedirectPage=$_SERVER["URL"];
  } 
  if (((strpos(1,$UC_redirectPage,"?",$vbTextCompare) ? strpos(1,$UC_redirectPage,"?",$vbTextCompare)+1 : 0)==0 && $_GET!=""))
  {

    $MM_newQS="?";
foreach ($_GET as $Item)
    {

      if (($Item!="MM_Logoutnow"))
      {

        if ((strlen($MM_newQS)>1))
        {
          $MM_newQS=$MM_newQS."&";
        } 
        $MM_newQS=$MM_newQS.$Item."=".rawurlencode($_GET[$Item]);
      } 

    }     if ((strlen($MM_newQS)>1))
    {
      $MM_logoutRedirectPage=$MM_logoutRedirectPage.$MM_newQS;
    } 
  } 

  header("Location: ".$MM_logoutRedirectPage);
} 

?>
<? 

// $RSBODY is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT *  FROM SETTINGS";
echo 0;
echo 2;
echo 1;
$rs=mysql_query();

$RSBODY_numRows=0;
?>
<? $URL="http://www.cybernations.net";

?>

<!--METADATA TYPE="typelib"
UUID="CD000000-8B95-11D1-82DB-00C04FB1625D"
NAME="CDO for Windows 2000 Library" -->
<!--METADATA TYPE="typelib"
UUID="00000205-0000-0010-8000-00AA006D2EA4"
NAME="ADODB Type Library" -->
<? 
// $objMail is of type "CDO.Message"

// $objConfig is of type "CDO.Configuration"

//Configuration:

$objConfig->Fields($cdoSendUsingMethod)=$cdoSendUsingPort;
$objConfig->Fields($cdoSMTPServer)="cybernations.net";
$objConfig->Fields($cdoSMTPServerPort)=25;
$objConfig->Fields($cdoSMTPAuthenticate)=$cdoBasic;
$objConfig->Fields($cdoSendUserName)="webmaster@cybernations.net";
$objConfig->Fields($cdoSendPassword)="chevy$%^79!mail";
//Update configuration

$objConfig->Fields.$Update;
$objMail=$Configurationecho $objConfig;


$objMail->From=$_POST["EMAIL"];
$objMail->To=$_POST["FRIEND_EMAIL"];
$objMail->Subject="Cyber Nations - cool site, check it out";
$objMail->TextBody="Hey there.".$Response->Write("<p>")." I thought you might be interested in this website that I found called Cyber Nations located at www.cybernations.net. Cyber Nations is an online nation simulation game that allows you to create your own nation, manage and rule it however you want. Create your nation anywhere in the world, decide how you will rule your people by choosing a government type, a national religion, ethnicity, tax rate, currency type, and more. Build your empire by purchasing infrastructure to support your citizens, land to expand your borders, and military to defend your nation. Declare war on other nations and deploy troops to support your attacks. It's all free so go check it out.";
$objMail->Send;
if ($Err->Number==0)
{

//Response.Write("A message has been sent to your friend.")

}
  else
{

//Response.Write("Error sending mail. Code: " & Err.Number)

$Err->Clear;
} 

$objMail=null;

$objConfig=null;

?>









<!--#include file="inc_header.php" -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="100%" height="0" valign="top"> 
				<table width="97%" height="0" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top"> 
						<div align="left"> 
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr> 
                              <td align="center" valign="middle" height="2">
								<table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="0">
                                  <tr> 
                                    <td valign="top"> 
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr align="center"> 
                                          <td width="" valign="top"> 
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr> 
                                                <td height="1" align="center" valign="middle">&nbsp;</td>
                                              </tr>
                                              <tr> 
                                                <td align="center" valign="middle">&nbsp;</td>
                                              </tr>
                                              <tr> 
                                                <td align="left" valign="top"><div align="center"> 
                                                    <p><font color="#FF0000" size="2"><strong> 
                                                      
                                                      Your Tell A Friend message has been sent. 
                                                     
                                                   
                                                      </strong></font></p>
                                                    <p><strong><a href="javascript:history.go(-1)">&lt;&lt;Go 
                                                      back</a></strong></p>
                                                  </div></td>
                                              </tr>
                                              <tr> 
                                                <td align="left" valign="middle">&nbsp;</td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table>
                                <b><font color="#CC6633" size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
                                </font></b></td>
                            </tr>
                            <tr> 
                              <td align="center" valign="middle"> <p>&nbsp;</p></td>
                            </tr>
                          </table>
                        </div></td>
                    </tr>
                  </table></td>
                <td width="15">
             
                </td>
              </tr>
            </table> 
            <!--#include file="inc_footer.php" -->

<? 

$RSBODY=null;

$objConn->Close();
$objConn=null;

?>
