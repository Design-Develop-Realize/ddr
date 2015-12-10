<? 

$Search4IP=$_SERVER["remote_addr"];
$inString=0;
$inString=(strpos($Application["BannedIPs"],$Search4IP) ? strpos($Application["BannedIPs"],$Search4IP)+1 : 0);
if ($inString>0)
{

  header("Location: "."http://www.cybernations.net/activity_banned.htm");
} 



//=============================================================================================================================

// Manually site down code

// SiteDown = 1


// Moderator site down code

$strFileName=$DOCUMENT_ROOT."moderation/assets/shutdown.txt";
// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"r");
$iLoc=0;
$Line=fgets($file);;
$iLoc=(strpos($Line,1) ? strpos($Line,1)+1 : 0);

if ($iLoc>0)
{
  $SiteDown=1;
}
 
fclose($file);
$file=null;

$fso=null;

//=============================================================================================================================



if ($SiteDown==1)
{

  header("Location: "."sitedown.asp");
}
  else
{

  //$MM_conn_STRING="Provider=sqloledb;Network Library=DBMSSOCN;Data Source=66.128.49.11,1433;Initial Catalog=cybernations;User ID=webuser;Password=t1?ut*awL6N+";
  //$MM_conn_STRING_Messages="Provider=sqloledb;Network Library=DBMSSOCN;Data Source=66.128.49.124,1433;Initial Catalog=cybernations;User ID=webuser;Password=t1?ut*awL6N+";
  //$MM_conn_STRING_Trade="Provider=sqloledb;Network Library=DBMSSOCN;Data Source=66.128.49.122,1433;Initial Catalog=cybernations_trades;User ID=webuser;Password=t1?ut*awL6N+";


// $objConn is of type "ADODB.Connection"

    echo $MM_conn_STRING;
  $a2p_connstr=1;
  $a2p_uid=strstr($a2p_connstr,'uid');
  $a2p_uid=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_pwd=strstr($a2p_connstr,'pwd');
  $a2p_pwd=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $a2p_database=strstr($a2p_connstr,'dsn');
  $a2p_database=substr($d,strpos($d,'=')+1,strpos($d,';')-strpos($d,'=')-1);
  $objConn=mysql_connect("localhost",$a2p_uid,$a2p_pwd);
  mysql_select_db($a2p_database,$objConn);


} 

?>
