<? 
$Application->Lock;
$Application["ActiveDBConn"]=$Application["ActiveDBConn"]-1;
$Application->UnLock;
?>
