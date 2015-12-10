<? 
ob_start();
$On$Error$Resume$Next;

$tradewithinteam=0;

if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Cattle")
{
  $cattle=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Pigs")
{
  $pigs=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Fish")
{
  $fish=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Water")
{
  $water=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Uranium")
{
  $uranium=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Gold")
{
  $gold=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Gems")
{
  $gems=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Iron")
{
  $iron=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Coal")
{
  $coal=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Oil")
{
  $oil=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Rubber")
{
  $rubber=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Lumber")
{
  $lumber=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Aluminum")
{
  $Aluminum=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Wine")
{
  $Wine=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Spices")
{
  $Spices=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Furs")
{
  $Furs=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Sugar")
{
  $Sugar=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Marble")
{
  $Marble=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Silver")
{
  $Silver=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Wheat")
{
  $Wheat=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource1"]$Value)=="Lead")
{
  $Lead=1;
}
;
} 

if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Cattle")
{
  $cattle=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Pigs")
{
  $pigs=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Fish")
{
  $fish=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Water")
{
  $water=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Uranium")
{
  $uranium=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Gold")
{
  $gold=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Gems")
{
  $gems=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Iron")
{
  $iron=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Coal")
{
  $coal=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Oil")
{
  $oil=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Rubber")
{
  $rubber=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Lumber")
{
  $lumber=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Aluminum")
{
  $Aluminum=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Wine")
{
  $Wine=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Spices")
{
  $Spices=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Furs")
{
  $Furs=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Sugar")
{
  $Sugar=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Marble")
{
  $Marble=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Silver")
{
  $Silver=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Wheat")
{
  $Wheat=1;
}
;
} 
if (($rsGuestbook->Fields$Item["Resource2"]$Value)=="Lead")
{
  $Lead=1;
}
;
} 

$traderecord=$rsGuestbook["Nation_ID"];
// $rsTrade is of type "ADODB.Recordset"

echo $MM_conn_STRING_Trade;
echo "SELECT Resource_Sent_1,Resource_Sent_2,Resource_Receive_1,Resource_Receive_2,Trade_Within_Team FROM Trade WHERE Trade.Trade_Cancled = 1 AND (Trade.Receiving_Nation_ID = ".$traderecord."  OR Trade.Declaring_Nation_ID = ".$traderecord.")";
echo 0;
echo 2;
echo 3;
$rs=mysql_query();


if (($rsTrade_BOF==1) && ($rsTrade==0))
{

  $arrayb=null;
}
  else
{

  $arrayb=();

  
  $rsTrade=null;


  $tradecounter=0;
  for ($lnLoopCounter=0; $lnLoopCounter<=count($arrayb); $lnLoopCounter=$lnLoopCounter+1)
  {

    if ($arrayb[0][$lnLoopCounter]><$rsGuestbook["Resource1"])
    {

      if ($arrayb[0][$lnLoopCounter]=="Cattle")
      {
        $cattle=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Pigs")
      {
        $pigs=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Fish")
      {
        $fish=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Water")
      {
        $water=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Uranium")
      {
        $uranium=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Gold")
      {
        $gold=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Gems")
      {
        $gems=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Iron")
      {
        $iron=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Coal")
      {
        $coal=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Oil")
      {
        $oil=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Rubber")
      {
        $rubber=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Lumber")
      {
        $lumber=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Aluminum")
      {
        $Aluminum=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Wine")
      {
        $Wine=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Spices")
      {
        $Spices=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Furs")
      {
        $Furs=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Sugar")
      {
        $Sugar=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Marble")
      {
        $Marble=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Silver")
      {
        $Silver=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Wheat")
      {
        $Wheat=1;
      }
;
      } 
      if ($arrayb[0][$lnLoopCounter]=="Lead")
      {
        $Lead=1;
      }
;
      } 
    } 

    if ($arrayb[1][$lnLoopCounter]><$rsGuestbook["Resource2"])
    {

      if ($arrayb[1][$lnLoopCounter]=="Cattle")
      {
        $cattle=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Pigs")
      {
        $pigs=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Fish")
      {
        $fish=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Water")
      {
        $water=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Uranium")
      {
        $uranium=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Gold")
      {
        $gold=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Gems")
      {
        $gems=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Iron")
      {
        $iron=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Coal")
      {
        $coal=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Oil")
      {
        $oil=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Rubber")
      {
        $rubber=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Lumber")
      {
        $lumber=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Aluminum")
      {
        $Aluminum=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Wine")
      {
        $Wine=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Spices")
      {
        $Spices=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Furs")
      {
        $Furs=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Sugar")
      {
        $Sugar=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Marble")
      {
        $Marble=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Silver")
      {
        $Silver=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Wheat")
      {
        $Wheat=1;
      }
;
      } 
      if ($arrayb[1][$lnLoopCounter]=="Lead")
      {
        $Lead=1;
      }
;
      } 
    } 

    if ($arrayb[2][$lnLoopCounter]><$rsGuestbook["Resource1"])
    {

      if ($arrayb[2][$lnLoopCounter]=="Cattle")
      {
        $cattle=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Pigs")
      {
        $pigs=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Fish")
      {
        $fish=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Water")
      {
        $water=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Uranium")
      {
        $uranium=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Gold")
      {
        $gold=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Gems")
      {
        $gems=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Iron")
      {
        $iron=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Coal")
      {
        $coal=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Oil")
      {
        $oil=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Rubber")
      {
        $rubber=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Lumber")
      {
        $lumber=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Aluminum")
      {
        $Aluminum=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Wine")
      {
        $Wine=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Spices")
      {
        $Spices=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Furs")
      {
        $Furs=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Sugar")
      {
        $Sugar=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Marble")
      {
        $Marble=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Silver")
      {
        $Silver=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Wheat")
      {
        $Wheat=1;
      }
;
      } 
      if ($arrayb[2][$lnLoopCounter]=="Lead")
      {
        $Lead=1;
      }
;
      } 
    } 

    if ($arrayb[3][$lnLoopCounter]><$rsGuestbook["Resource2"])
    {

      if ($arrayb[3][$lnLoopCounter]=="Cattle")
      {
        $cattle=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Pigs")
      {
        $pigs=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Fish")
      {
        $fish=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Water")
      {
        $water=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Uranium")
      {
        $uranium=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Gold")
      {
        $gold=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Gems")
      {
        $gems=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Iron")
      {
        $iron=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Coal")
      {
        $coal=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Oil")
      {
        $oil=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Rubber")
      {
        $rubber=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Lumber")
      {
        $lumber=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Aluminum")
      {
        $Aluminum=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Wine")
      {
        $Wine=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Spices")
      {
        $Spices=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Furs")
      {
        $Furs=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Sugar")
      {
        $Sugar=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Marble")
      {
        $Marble=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Silver")
      {
        $Silver=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Wheat")
      {
        $Wheat=1;
      }
;
      } 
      if ($arrayb[3][$lnLoopCounter]=="Lead")
      {
        $Lead=1;
      }
;
      } 
    } 


    if ($arrayb[4][$lnLoopCounter]==1)
    {

      $tradewithinteam=$tradewithinteam+1;
    } 


    $tradecounter=$tradecounter+1;


  } 

} 

$rsTrade->Close;
$rsTrade=null;

?>
