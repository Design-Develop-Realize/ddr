<?
  session_start();
  session_register("MM_Username_session");
?>
<? 
$strFileName=$DOCUMENT_ROOT."assets/login_log.txt";
//Const ForReading = 1, ForWriting = 2, ForAppending = 8

// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"a");
fputs($file,$MM_Username_session);
fputs($file,", ");
$IPlog=$_SERVER["remote_addr"];
fputs($file,$IPlog);
fputs($file,", ");
fputs($file,session_id());
fputs($file,", ");
fputs($file,$Application["ActiveUsers"]);
fputs($file,", ");
fputs($file,strftime("%m/%d/%Y %H:%M:%S %p"));
$strURL=strtolower($_SERVER["HTTP_REFERER"]);
fputs($file,", ");
fputs($file,$strURL);
fputs($file,."\n");
fclose($file);
$file=null;

$fso=null;

?>
