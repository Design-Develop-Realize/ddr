<? 
// Calculate the Government Type effect

if (($rsGuestbook["Government_Type"]$Value)=="Anarchy")
{

  $governmenteffecthappiness=0;
  $governmenteffectsize=0;
  $governmenteffectmilitary=0;
  $governmenteffectinfrastructure=0;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Capitalist")
{

  $governmenteffecthappiness=0;
  $governmenteffectsize=1;
  $governmenteffectmilitary=0;
  $governmenteffectinfrastructure=1;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Communist")
{

  $governmenteffecthappiness=0;
  $governmenteffectsize=1;
  $governmenteffectmilitary=1;
  $governmenteffectinfrastructure=0;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Democracy")
{

  $governmenteffecthappiness=1;
  $governmenteffectsize=0;
  $governmenteffectmilitary=1;
  $governmenteffectinfrastructure=0;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Dictatorship")
{

  $governmenteffecthappiness=0;
  $governmenteffectsize=0;
  $governmenteffectmilitary=1;
  $governmenteffectinfrastructure=1;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Federal Government")
{

  $governmenteffecthappiness=0;
  $governmenteffectsize=0;
  $governmenteffectmilitary=1;
  $governmenteffectinfrastructure=1;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Monarchy")
{

  $governmenteffecthappiness=1;
  $governmenteffectsize=0;
  $governmenteffectmilitary=0;
  $governmenteffectinfrastructure=1;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Republic")
{

  $governmenteffecthappiness=0;
  $governmenteffectsize=1;
  $governmenteffectmilitary=0;
  $governmenteffectinfrastructure=1;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Revolutionary Government")
{

  $governmenteffecthappiness=1;
  $governmenteffectsize=0;
  $governmenteffectmilitary=0;
  $governmenteffectinfrastructure=1;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Totalitarian State")
{

  $governmenteffecthappiness=1;
  $governmenteffectsize=1;
  $governmenteffectmilitary=0;
  $governmenteffectinfrastructure=0;
} 


if (($rsGuestbook["Government_Type"]$Value)=="Transitional")
{

  $governmenteffecthappiness=0;
  $governmenteffectsize=1;
  $governmenteffectmilitary=1;
  $governmenteffectinfrastructure=0;
} 

?>
