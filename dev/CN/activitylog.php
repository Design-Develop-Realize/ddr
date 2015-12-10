<?
  session_start();
  session_register("denyreason_session");
  session_register("MM_Username_session");
?>
<? 
$ExecuteCodeBlock=false;
if ($ExecuteCodeBlock)
{

  $strFileName=$DOCUMENT_ROOT."assets/log.txt";
//Const ForReading = 1, ForWriting = 2, ForAppending = 8

// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"a");

  $iLoc=0;
  $strSiteURL="cybernations.net";
  $strURL=strtolower($_SERVER["HTTP_REFERER"]);
  $IPlog=$_SERVER["remote_addr"];
  $Pathinfo=$_SERVER["URL"];
  $Denied=$denyreason_session;

  $iLoc=(strpos($strURL,$strSiteURL) ? strpos($strURL,$strSiteURL)+1 : 0);

  fputs($file,$_POST["Username"]);
  fputs($file," - ");
  fputs($file,$_POST["Password"]);
  if (!isset($MM_Username_session))
  {

  }
    else
  {

    fputs($file,$MM_Username_session."\n");
  } 

  fputs($file,$strURL."\n");
  fputs($file,$iLoc."\n");
  fputs($file,$IPlog."\n");
  fputs($file,$Pathinfo."\n");
  fputs($file,$denyreason_session."\n");
  fputs($file,strftime("%m/%d/%Y %H:%M:%S %p")."\n");
  fputs($file,"-_-_-_-_-"."\n");
  fclose($file);
  $file=null;

  $fso=null;

} 

?>
