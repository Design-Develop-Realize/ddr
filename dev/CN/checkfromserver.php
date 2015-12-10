<? 
//logging stuff

$strFileName=$DOCUMENT_ROOT."assets/log.txt";
$ForReading=1$ForWriting=2$ForAppending=8;
// $fso is of type "Scripting.FileSystemObject"

$file=fopen($strFileName,"r");

$strWWW=$_SERVER["HTTP_HOST"];
if ($strWWW=="u15208247.onlinehome-server.com" || $strWWW=="cybernations.net" || $strWWW=="www.cybernations.net")
{

}
  else
{

  header("Location: "."http://www.cybernations.net/activity_denied.asp");
} 


?>
