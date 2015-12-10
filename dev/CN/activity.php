<?
  session_start();
  session_register("MM_Username_session");
  session_register("activity_session");
?>
<? 
ob_start();
$On$Error$Resume$Next;
// $rsUpdateEntry9 is of type "ADODB.Recordset"

echo $MM_conn_STRING;
echo "SELECT Activity,Last_Activity FROM USERS WHERE U_ID = '"+str_replace("'","''",$MM_Username_session)+"'";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();

if ($activity_session=="" || $activity_session==0)
{

  header("Location: "."activity_denied.asp");
}
  else
{

  if (($activity_session)-(("Activity"))<=0)
  {

    $activity_session=0;
    header("Location: "."activity_denied.asp");
  }
    else
  {

    //Activity") = rsUpdateEntry9.Fields("Activity") + 1    
    $activity_session=0;
  } 

} 


if ((strpos($_SERVER["Path_Info"],"collect_taxes_code.asp") ? strpos($_SERVER["Path_Info"],"collect_taxes_code.asp")+1 : 0)>0)
{

  //Last_Activity") = Now()  
} 



$rsUpdateEntry9=null;

?>
