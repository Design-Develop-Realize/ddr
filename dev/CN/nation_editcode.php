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
<!--#include file="inc_header.php" -->
<? 
// $rsGuestbook is of type "ADODB.Recordset"

$rsGuestbookSQL="SELECT * FROM Nation WHERE Nation_ID = ".$rsGuestbookHead["Nation_ID"];
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsGuestbookSQL);
?>
<!--#include file="activity.php" -->
<!--#include file="calculations.php" -->
<? 
if (((strpos($_POST["Nation_Bio"],"<") ? strpos($_POST["Nation_Bio"],"<")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in your BIO.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos($_POST["Nation_Bio"],">") ? strpos($_POST["Nation_Bio"],">")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in your BIO.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos($_POST["Nation_Bio"],"#") ? strpos($_POST["Nation_Bio"],"#")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in your BIO.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos($_POST["Nation_Bio"],"%") ? strpos($_POST["Nation_Bio"],"%")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in in your BIO.";
  header("Location: "."activity_denied.asp");
} 


if (((strpos(strtoupper($_POST["Nation_Bio"]),"FUCK") ? strpos(strtoupper($_POST["Nation_Bio"]),"FUCK")+1 : 0)>0))
{

  $denyreason_session="Do not use offensive language in in your BIO.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos(strtoupper($_POST["Nation_Bio"]),"NIGGER") ? strpos(strtoupper($_POST["Nation_Bio"]),"NIGGER")+1 : 0)>0))
{

  $denyreason_session="Do not use offensive language in in your BIO.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos(strtoupper($_POST["Nation_Bio"]),"SHIT") ? strpos(strtoupper($_POST["Nation_Bio"]),"SHIT")+1 : 0)>0))
{

  $denyreason_session="Do not use offensive language in in your BIO.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos(strtoupper($_POST["Nation_Bio"]),"PUSSY") ? strpos(strtoupper($_POST["Nation_Bio"]),"PUSSY")+1 : 0)>0))
{

  $denyreason_session="Do not use offensive language in in your BIO.";
  header("Location: "."activity_denied.asp");
} 


if (((strpos(strtoupper($_POST["Capital_City"]),"FUCK") ? strpos(strtoupper($_POST["Capital_City"]),"FUCK")+1 : 0)>0))
{

  $denyreason_session="Do not use offensive language in in your capital city name.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos(strtoupper($_POST["Capital_City"]),"NIGGER") ? strpos(strtoupper($_POST["Capital_City"]),"NIGGER")+1 : 0)>0))
{

  $denyreason_session="Do not use offensive language in in your capital city name.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos(strtoupper($_POST["Capital_City"]),"SHIT") ? strpos(strtoupper($_POST["Capital_City"]),"SHIT")+1 : 0)>0))
{

  $denyreason_session="Do not use offensive language in in your capital city name.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos(strtoupper($_POST["Capital_City"]),"PUSSY") ? strpos(strtoupper($_POST["Capital_City"]),"PUSSY")+1 : 0)>0))
{

  $denyreason_session="Do not use offensive language in in your capital city name.";
  header("Location: "."activity_denied.asp");
} 


if (((strpos($_POST["input1"],"<") ? strpos($_POST["input1"],"<")+1 : 0)>0) || ((strpos($_POST["Alliance"],"<") ? strpos($_POST["Alliance"],"<")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in your alliance affiliation.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos($_POST["input1"],">") ? strpos($_POST["input1"],">")+1 : 0)>0) || ((strpos($_POST["Alliance"],">") ? strpos($_POST["Alliance"],">")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in your alliance affiliation.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos($_POST["input1"],"#") ? strpos($_POST["input1"],"#")+1 : 0)>0) || ((strpos($_POST["Alliance"],"#") ? strpos($_POST["Alliance"],"#")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in your alliance affiliation.";
  header("Location: "."activity_denied.asp");
} 

if (((strpos($_POST["input1"],"%") ? strpos($_POST["input1"],"%")+1 : 0)>0) || ((strpos($_POST["Alliance"],"%") ? strpos($_POST["Alliance"],"%")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in in your alliance affiliation.";
  header("Location: "."activity_denied.asp");
} 



$lngRecordNo=intval($_POST["Nation_ID"]);
?>
<? 
// $rsSent is of type "ADODB.Recordset"

$rsSentSQL="SELECT Count(ID) AS WARCNTR FROM WAR WHERE Receiving_Nation_Peace + Declaring_Nation_Peace <> 2 AND Nation_Deleted = 0 AND War_Declaration_Date >= getdate()-7 AND ((War_Declared_By_User = '".$rsUser["U_ID"]."' AND WAR.Nation_Deleted = 0) OR (War.War_Declared_ON_User = '".$rsUser["U_ID"]."'))";
echo 0;
echo 2;
echo 3;
$rs=mysql_query($rsSentSQL);
$activewars=$rsSent["WARCNTR"];

$rsSent=null;

?>
<? 
if ($_POST["Nation_Team"]!="")
{

  if (time()()-$rsGuestbook["Last_Vote"]>4)
  {

    if ($_POST["Nation_Team"]><("Nation_Team"))
    {

      switch ($_POST["Nation_Team"])
      {
        case "Red":
          //Nation_Team") = "Red"          break;
        case "Green":
          //Nation_Team") = "Green"          break;
        case "Brown":
          //Nation_Team") = "Brown"          break;
        case "Blue":
          //Nation_Team") = "Blue"          break;
        case "Purple":
          //Nation_Team") = "Purple"          break;
        case "Orange":
          //Nation_Team") = "Orange"          break;
        case "None":
          //Nation_Team") = "None"          break;
        case "Yellow":
          //Nation_Team") = "Yellow"          break;
        case "Pink":
          //Nation_Team") = "Pink"          break;
        case "Maroon":
          //Nation_Team") = "Maroon"          break;
        case "Black":
          //Nation_Team") = "Black"          break;
        case "White":
          //Nation_Team") = "White"          break;
        case "Aqua":
          //Nation_Team") = "Aqua"          break;
        default:

          //Nation_Team") = "None"          break;
      } 

      //Princeps") = 0      //Praetor") = 0      //Counslus") = 0      //Votes") = 0
// Stop the nations trade within team agreements

// $rsTrade is of type "ADODB.Recordset"

            echo $MM_conn_STRING_Trade;
            echo "Update Trade Set Trade_Within_Team = 0 Where Trade_Within_Team = 1 AND (Trade.Receiving_Nation_ID = ".$rsGuestbook["Nation_ID"]."  OR Trade.Declaring_Nation_ID = ".$rsGuestbook["Nation_ID"].")";
            echo 0;
            echo 2;
            echo 3;
      $rs=mysql_query();
      
      $rsTrade=null;

    } 

  } 

} 


if (("Fill_Color")!="Black")
{

  //Fill_Color") = "Black"} 


if ($_POST["input1"]=="")
{

  //Alliance") = Replace(Request.Form("Alliance"), "'", "''")}
  else
{

  //Alliance") = Replace(Request.Form("input1"), "'", "''")} 


if (((strpos($_POST["Capital_City"],"%") ? strpos($_POST["Capital_City"],"%")+1 : 0)>0) || ((strpos($_POST["Capital_City"],"<") ? strpos($_POST["Capital_City"],"<")+1 : 0)>0) || ((strpos($_POST["Capital_City"],">") ? strpos($_POST["Capital_City"],">")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in in your capital city name.";
  header("Location: "."activity_denied.asp");
} 


if (!isset(("Capital_City")) || ("Capital_City")!=$_POST["Capital_City"])
{

  //Capital_City") = Server.HTMLEncode(Request.Form("Capital_City"))} 


if (!isset(("Currency_Type")) || ("Currency_Type")!=$_POST["Currency_Type"])
{

  switch ($_POST["Currency_Type"])
  {
    case "Afghani":
      //Currency_Type") = "Afghani"      break;
    case "Austral":
      //Currency_Type") = "Austral"      break;
    case "Baht":
      //Currency_Type") = "Baht"      break;
    case "Canadian":
      //Currency_Type") = "Canadian"      break;
    case "Dinar":
      //Currency_Type") = "Dinar"      break;
    case "Dollar":
      //Currency_Type") = "Dollar"      break;
    case "Dong":
      //Currency_Type") = "Dong"      break;
    case "Euro":
      //Currency_Type") = "Euro"      break;
    case "Florin":
      //Currency_Type") = "Florin"      break;
    case "Franc":
      //Currency_Type") = "Franc"      break;
    case "Kwacha":
      //Currency_Type") = "Kwacha"      break;
    case "Kwanza":
      //Currency_Type") = "Kwanza"      break;
    case "Kyat":
      //Currency_Type") = "Kyat"      break;
    case "Lari":
      //Currency_Type") = "Lari"      break;
    case "Mark":
      //Currency_Type") = "Mark"      break;
    case "Peso":
      //Currency_Type") = "Peso"      break;
    case "Pound":
      //Currency_Type") = "Pound"      break;
    case "Riyal":
      //Currency_Type") = "Riyal"      break;
    case "Rouble":
      //Currency_Type") = "Rouble"      break;
    case "Rupee":
      //Currency_Type") = "Rupee"      break;
    case "Shilling":
      //Currency_Type") = "Shilling"      break;
    case "Won":
      //Currency_Type") = "Won"      break;
    case "Yen":
      //Currency_Type") = "Yen"      break;
    default:

      //Currency_Type") = "Dollar"      break;
  } 
} 


if (((strpos($_POST["DEFCON"],"%") ? strpos($_POST["DEFCON"],"%")+1 : 0)>0) || ((strpos($_POST["DEFCON"],"<") ? strpos($_POST["DEFCON"],"<")+1 : 0)>0) || ((strpos($_POST["DEFCON"],">") ? strpos($_POST["DEFCON"],">")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in in your DEFCON setting.";
  header("Location: "."activity_denied.asp");
} 

if ($_POST["DEFCON"]!="")
{

  if (!isset($rsGuestbook["DEFCON_DATE"]) || $rsGuestbook["DEFCON_DATE"]<time()())
  {

    if ($_POST["DEFCON"]-("DEFCON")!=0 || !isset(("DEFCON")))
    {

      if ($_POST["DEFCON"]<1 || $_POST["DEFCON"]>5)
      {

        //DEFCON") = 5      }
        else
      {

        //DEFCON") = Server.HTMLEncode(Replace(Request.Form("DEFCON"), "'", "''"))      } 

      //DEFCON_DATE") = date()    } 

  } 

} 


$taxlimit=28;
if ($SocialWonder==1)
{

  $taxlimit=30;
} 


if (((strpos($_POST["Tax_Rate"],"%") ? strpos($_POST["Tax_Rate"],"%")+1 : 0)>0) || ((strpos($_POST["Tax_Rate"],"<") ? strpos($_POST["Tax_Rate"],"<")+1 : 0)>0) || ((strpos($_POST["Tax_Rate"],">") ? strpos($_POST["Tax_Rate"],">")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in in your tax rate setting.";
  header("Location: "."activity_denied.asp");
} 

if ($_POST["Tax_Rate"]<10 || $_POST["Tax_Rate"]-$taxlimit>0)
{

  //Tax_Rate") = 20}
  else
{

  //Tax_Rate") = Replace(Request.Form("Tax_Rate"), "'", "''")} 


if (((strpos($_POST["picture"],"%") ? strpos($_POST["picture"],"%")+1 : 0)>0) || ((strpos($_POST["picture"],"<") ? strpos($_POST["picture"],"<")+1 : 0)>0) || ((strpos($_POST["picture"],">") ? strpos($_POST["picture"],">")+1 : 0)>0))
{

  $denyreason_session="Do not use invalid characters in in your national flag.";
  header("Location: "."activity_denied.asp");
} 

if (("Flag")!=$_POST["picture"] || !isset(("Flag")))
{

  $iLoc=0;
  $iLoc=(strpos($_POST["picture"],"images/flags/") ? strpos($_POST["picture"],"images/flags/")+1 : 0);
  if ($iLoc==0)
  {

    $denyreason_session="The flag you selected does not match in the system.";
    header("Location: "."activity_denied.asp");
  }
    else
  {

    //Flag") = Replace(Request.Form("picture"), "'", "''")  } 

} 


if (!isset(("Nation_BIO")) || ("Nation_BIO")!=$_POST["Nation_BIO"])
{

  if (strlen($_POST["Nation_BIO"])<=250)
  {

    //Nation_BIO") = Server.HTMLEncode(Request.Form("Nation_BIO"))  } 

} 


if ($_POST["Ethnic_Group"]!=$rsGuestbook["Ethnic_Group"])
{

  switch ($_POST["Ethnic_Group"])
  {
    case "African":
      //Ethnic_Group") = "African"      break;
    case "Albanian":
      //Ethnic_Group") = "Albanian"      break;
    case "Amerindian":
      //Ethnic_Group") = "Amerindian"      break;
    case "Arab":
      //Ethnic_Group") = "Arab"      break;
    case "Arab-Berber":
      //Ethnic_Group") = "Arab-Berber"      break;
    case "Armenian":
      //Ethnic_Group") = "Armenian"      break;
    case "Black":
      //Ethnic_Group") = "Black"      break;
    case "British":
      //Ethnic_Group") = "British"      break;
    case "Bulgarian":
      //Ethnic_Group") = "Bulgarian"      break;
    case "Burman":
      //Ethnic_Group") = "Burman"      break;
    case "Caucasian":
      //Ethnic_Group") = "Caucasian"      break;
    case "Celtic":
      //Ethnic_Group") = "Celtic"      break;
    case "Chinese":
      //Ethnic_Group") = "Chinese"      break;
    case "Creole":
      //Ethnic_Group") = "Creole"      break;
    case "Croat":
      //Ethnic_Group") = "Croat"      break;
    case "Czech":
      //Ethnic_Group") = "Czech"      break;
    case "Dutch":
      //Ethnic_Group") = "Dutch"      break;
    case "Estonian":
      //Ethnic_Group") = "Estonian"      break;
    case "French":
      //Ethnic_Group") = "French"      break;
    case "German":
      //Ethnic_Group") = "German"      break;
    case "Greek":
      //Ethnic_Group") = "Greek"      break;
    case "Han Chinese":
      //Ethnic_Group") = "Han Chinese"      break;
    case "Italian":
      //Ethnic_Group") = "Italian"      break;
    case "Indian":
      //Ethnic_Group") = "Indian"      break;
    case "Japanese":
      //Ethnic_Group") = "Japanese"      break;
    case "Jewish":
      //Ethnic_Group") = "Jewish"      break;
    case "Korean":
      //Ethnic_Group") = "Korean"      break;
    case "Mestizo":
      //Ethnic_Group") = "Mestizo"      break;
    case "Mexican":
      //Ethnic_Group") = "Mexican"      break;
    case "Mixed":
      //Ethnic_Group") = "Mixed"      break;
    case "Norwegian":
      //Ethnic_Group") = "Norwegian"      break;
    case "Pacific Islander":
      //Ethnic_Group") = "Pacific Islander"      break;
    case "Pashtun":
      //Ethnic_Group") = "Pashtun"      break;
    case "Persian":
      //Ethnic_Group") = "Persian"      break;
    case "Russian":
      //Ethnic_Group") = "Russian"      break;
    case "Scandinavian":
      //Ethnic_Group") = "Scandinavian"      break;
    case "Serb":
      //Ethnic_Group") = "Serb"      break;
    case "Somali":
      //Ethnic_Group") = "Somali"      break;
    case "Spanish":
      //Ethnic_Group") = "Spanish"      break;
    case "Thai":
      //Ethnic_Group") = "Thai"      break;
    case "Turk":
      //Ethnic_Group") = "Turk"      break;
  } 
} 


if (("Religion")!=$_POST["Religion"] || !isset($_POST["Religion"]))
{

  if ($rsGuestbook["Religion_Changed"]<time()()-2)
  {

    switch ($_POST["Religion"])
    {
      case "None":
        //Religion") = "None"        //Religion_Changed") = date()        break;
      case "Mixed":
        //Religion") = "Mixed"        //Religion_Changed") = date()        break;
      case "Baha'i Faith":
        //Religion") = "Baha'i Faith"        //Religion_Changed") = date()        break;
      case "Buddhism":
        //Religion") = "Buddhism"        //Religion_Changed") = date()        break;
      case "Christianity":
        //Religion") = "Christianity"        //Religion_Changed") = date()        break;
      case "Confucianism":
        //Religion") = "Confucianism"        //Religion_Changed") = date()        break;
      case "Hinduism":
        //Religion") = "Hinduism"        //Religion_Changed") = date()        break;
      case "Islam":
        //Religion") = "Islam"        //Religion_Changed") = date()        break;
      case "Jainism":
        //Religion") = "Jainism"        //Religion_Changed") = date()        break;
      case "Judaism":
        //Religion") = "Judaism"        //Religion_Changed") = date()        break;
      case "Norse":
        //Religion") = "Norse"        //Religion_Changed") = date()        break;
      case "Shinto":
        //Religion") = "Shinto"        //Religion_Changed") = date()        break;
      case "Sikhism":
        //Religion") = "Sikhism"        //Religion_Changed") = date()        break;
      case "Taoism":
        //Religion") = "Taoism"        //Religion_Changed") = date()        break;
      case "Voodoo":
        //Religion") = "Voodoo"        //Religion_Changed") = date()        break;
    } 
  } 

} 


if (!isset(("Government_Type")) || ("Government_Type")!=$_POST["Government_Type"])
{

  if ($rsGuestbook["Government_Changed"]<time()()-2)
  {

    switch ($_POST["Government_Type"])
    {
      case "Capitalist":
        //Government_Type") = "Capitalist"        //Government_Changed") = date()        break;
      case "Communist":
        //Government_Type") = "Communist"        //Government_Changed") = date()        break;
      case "Democracy":
        //Government_Type") = "Democracy"        //Government_Changed") = date()        break;
      case "Dictatorship":
        //Government_Type") = "Dictatorship"        //Government_Changed") = date()        break;
      case "Federal Government":
        //Government_Type") = "Federal Government"        //Government_Changed") = date()        break;
      case "Monarchy":
        //Government_Type") = "Monarchy"        //Government_Changed") = date()        break;
      case "Republic":
        //Government_Type") = "Republic"        //Government_Changed") = date()        break;
      case "Revolutionary Government":
        //Government_Type") = "Revolutionary Government"        //Government_Changed") = date()        break;
      case "Totalitarian State":
        //Government_Type") = "Totalitarian State"        //Government_Changed") = date()        break;
      case "Transitional":
        //Government_Type") = "Transitional"        //Government_Changed") = date()        break;
    } 
  } 

} 


if ($_POST["Nation_Peace"]!="" && ("Nation_Peace")-$_POST["Nation_Peace"]!=0)
{


  if (((strpos($_POST["Nation_Peace"],"%") ? strpos($_POST["Nation_Peace"],"%")+1 : 0)>0) || ((strpos($_POST["Nation_Peace"],"<") ? strpos($_POST["Nation_Peace"],"<")+1 : 0)>0) || ((strpos($_POST["Nation_Peace"],">") ? strpos($_POST["Nation_Peace"],">")+1 : 0)>0))
  {

    $denyreason_session="Do not use invalid characters in in your nation peace setting.";
    header("Location: "."activity_denied.asp");
  } 


  $last_date=$DateDiff["d"][$rsGuestbook["Last_Tax_Collection"]][time()()];
  if ($rsGuestbook["Nation_Peace"]=1&$last_date>=1$then;
$denyreason_session=="Your nation is in peace mode and you must collect taxes before changing your war/peace preference.")
  {
    header("Location: "."activity_denied.asp");  } 

} 


if ($activewars!=0 && $_POST["Nation_Peace"]==1)
{

  $denyreason_session="Nation peace setting while a war problem.";
  header("Location: "."activity_denied.asp");
}
  else
{

  //Nation_Peace") = Replace(Request.Form("Nation_Peace"), "'", "''")  //Nation_Peace_Date") = date()} 


'Write the updated recordset to the database
rsGuestbook.Update

'Reset server objects
rsGuestbook.Close
Set rsGuestbook = Nothing
objConn.Close()
Set objConn = Nothing

'Return to the update select page in case another record needs deleting
Response.Redirect "nation_drill_display.asp?Nation_ID="& lngRecordNo
%> 
