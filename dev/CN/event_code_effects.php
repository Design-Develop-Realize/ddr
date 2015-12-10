<? 
switch ($arraya[0][$lnLoopCounter])
{
  case 1:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $taxmod=$taxmod-8;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $taxmod=$taxmod-5;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $nationsize=$nationsize-($nationsize*.20);
      $adjustednationsize=$nationsize-($nationsize*.10);
      $nationnaturalgrowth=$nationnaturalgrowth-($nationnaturalgrowth*.10);
      $nationsize=$nationsize-($nationsize*.10)+$nationnaturalgrowth;
    } 

    break;
  case 2:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-4;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $populationhappiness=$populationhappiness-2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $actualmilitary=$actualmilitary-($actualmilitary*.10);
      $actualdefend=$actualmilitary-$actualdeployed;
      $population=$population-($actualmilitary*.10);
    } 

    break;
  case 3:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-4;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $populationhappiness=$populationhappiness-2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $population=$population-($actualmilitary*.10);
      $actualmilitary=$actualmilitary-($actualmilitary*.10);
      $actualdefend=$actualmilitary-$actualdeployed;
    } 

    break;
  case 4:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-1;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $populationhappiness=$populationhappiness+2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $taxmod=$taxmod+5;
    } 

    break;
  case 5:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-4;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $population=$population-($actualmilitary*.10);
      $actualmilitary=$actualmilitary-($actualmilitary*.10);
      $actualdefend=$actualmilitary-$actualdeployed;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $populationhappiness=$populationhappiness-2;
    } 

    break;
  case 6:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-4;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $taxmod=$taxmod-5;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $population=$population-($actualmilitary*.10);
      $actualmilitary=$actualmilitary-($actualmilitary*.10);
      $actualdefend=$actualmilitary-$actualdeployed;
    } 

    break;
  case 7:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-4;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $taxmod=$taxmod-5;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $populationhappiness=$populationhappiness+2;
    } 

    break;
  case 8:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-1;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $populationhappiness=$populationhappiness+2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $taxmod=$taxmod+5;
    } 

    break;
  case 9:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-4;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $taxmod=$taxmod-5;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $populationhappiness=$populationhappiness-3;
    } 

    break;
  case 10:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-4;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $taxmod=$taxmod-5;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $populationhappiness=$populationhappiness-3;
    } 

    break;
  case 11:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness+1;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $populationhappiness=$populationhappiness+2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $taxmod=$taxmod-5;
    } 

    break;
  case 12:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-2;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $population=$population+($citizens*.10);
      $citizens=$citizens+($citizens*.10);
      $taxmod=$taxmod-5;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $population=$population-($citizens*.10);
      $citizens=$citizens-($citizens*.10);
      $taxmod=$taxmod+5;
    } 

    break;
  case 13:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness+1;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $populationhappiness=$populationhappiness+3;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $population=$population+($citizens*.15);
      $citizens=$citizens+($citizens*.15);
    } 

    break;
  case 14:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-4;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $population=$population-($citizens*.15);
      $citizens=$citizens-($citizens*.15);
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $populationhappiness=$populationhappiness-3;
    } 

    break;
  case 15:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness+1;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $taxmod=$taxmod-2;
      $populationhappiness=$populationhappiness-2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $populationhappiness=$populationhappiness+3;
    } 

    break;
  case 16:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-3;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $populationhappiness=$populationhappiness-2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $taxmod=$taxmod-3;
      $population=$population-($actualmilitary*.05);
      $actualmilitary=$actualmilitary-($actualmilitary*.05);
      $actualdefend=$actualmilitary-$actualdeployed;
    } 

    break;
  case 17:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness+2;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $taxmod=$taxmod+10;
      $populationhappiness=$populationhappiness-2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $taxmod=$taxmod-10;
      $populationhappiness=$populationhappiness+2;
    } 

    break;
  case 18:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $populationhappiness=$populationhappiness-3;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $population=$population-($actualmilitary*.10);
      $actualmilitary=$actualmilitary-($actualmilitary*.10);
      $actualdefend=$actualmilitary-$actualdeployed;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $taxmod=$taxmod-5;
    } 

    break;
  case 19:
    if ($arraya[1][$lnLoopCounter]==0)
    {

      $taxmod=$taxmod-10;
    } 

    if ($arraya[1][$lnLoopCounter]==1)
    {

      $populationhappiness=$populationhappiness-2;
    } 

    if ($arraya[1][$lnLoopCounter]==2)
    {

      $population=$population-($actualmilitary*.10);
      $actualmilitary=$actualmilitary-($actualmilitary*.10);
      $actualdefend=$actualmilitary-$actualdeployed;
    } 

    break;
} 
?>
