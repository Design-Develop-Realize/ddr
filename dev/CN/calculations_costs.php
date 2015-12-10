<? 

if ($rsGuestbook["Land_Purchased"]>$nationsizelimit)
{
  $infrastructurecost=$infrastructurecost*2;
}
; // Make infrastructure expensive if they are maxed out on land
;
} 
if ($lumber==1)
{

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.06);
} 

if ($aluminum==1)
{

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.07);
} 

if ($iron==1)
{

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.05);
} 

if ($governmenteffectinfrastructure==1)
{

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.05);
} 

if ($Marble==1)
{

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.10);
} 

if ($Rubber==1)
{

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.03);
} 

if ($Coal==1)
{

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.04);
} 

$infrastructurecost=$infrastructurecost-($infrastructurecost*($factories*.08));
if ($coal==1 && $iron==1)
{
//Steel

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.02);
} 

if ($aluminum==1 && $lumber==1 && $iron==1 && $marble==1 && $rsGuestbook["Technology_Purchased"]>5)
{
//Construction

  $infrastructurecost=$infrastructurecost-($infrastructurecost*.05);
} 

if ($InterstateWonder==1)
{
  $infrastructurecost=$infrastructurecost-($infrastructurecost*.08);
}
;
} 


$infrastructurecost2=($FormatNumber[150][0]);

$dailybuildingcost=20.00;
if ($rsGuestbook["Infrastructure_Purchased"]>=20 && $rsGuestbook["Infrastructure_Purchased"]<30)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.00);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=30 && $rsGuestbook["Infrastructure_Purchased"]<40)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.01);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=40 && $rsGuestbook["Infrastructure_Purchased"]<60)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.02);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=60 && $rsGuestbook["Infrastructure_Purchased"]<80)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.03);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=80 && $rsGuestbook["Infrastructure_Purchased"]<140)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.04);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=140 && $rsGuestbook["Infrastructure_Purchased"]<200)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.05);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=200 && $rsGuestbook["Infrastructure_Purchased"]<300)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.06);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=300 && $rsGuestbook["Infrastructure_Purchased"]<500)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.07);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=500 && $rsGuestbook["Infrastructure_Purchased"]<700)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.08);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=700 && $rsGuestbook["Infrastructure_Purchased"]<1000)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.09);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=1000 && $rsGuestbook["Infrastructure_Purchased"]<2000)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.11);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=2000 && $rsGuestbook["Infrastructure_Purchased"]<3000)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.13);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=3000 && $rsGuestbook["Infrastructure_Purchased"]<4000)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.15);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=4000 && $rsGuestbook["Infrastructure_Purchased"]<5000)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.17);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=5000 && $rsGuestbook["Infrastructure_Purchased"]<8000)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.19);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=8000 && $rsGuestbook["Infrastructure_Purchased"]<15000)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.20);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=15000 && $rsGuestbook["Infrastructure_Purchased"]<20000)
{

  $dailybuildingcost=$dailybuildingcost+($rsGuestbook["Infrastructure_Purchased"]*0.21);
} 

if ($rsGuestbook["Infrastructure_Purchased"]>=20000)
{

  $dailybuildingcost=$dailybuildingcost*2;
} 

if ($lumber==1)
{
  $dailybuildingcost=$dailybuildingcost-($dailybuildingcost*.08);
}
;
} 
if ($Iron==1)
{
  $dailybuildingcost=$dailybuildingcost-($dailybuildingcost*.10);
}
;
} 
if ($Construction==1 && $Oil==1 && $Rubber==1)
{
//Asphalt

  $dailybuildingcost=$dailybuildingcost-($dailybuildingcost*.05);
} 

if ($Uranium==1)
{

  $dailybuildingcost=$dailybuildingcost-($dailybuildingcost*.03);
} 

$dailybuildingcost=$dailybuildingcost-($dailybuildingcost*($labor_camps*.10));
if ($InterstateWonder==1)
{
  $dailybuildingcost=$dailybuildingcost-($dailybuildingcost*.08);
}
;
} 
$techmodifyer=($rsGuestbook["Technology_Purchased"]*2)/$rsGuestbook["Strength"];
if ($techmodifyer>010)
{
  $techmodifyer=0.10;
}
;
} 
$dailybuildingcost=$dailybuildingcost-($dailybuildingcost*$techmodifyer);


$landcostpermile=($FormatNumber[(400)][0]);
if ($rsGuestbook["Land_Purchased"]>=20 && $rsGuestbook["Land_Purchased"]<30)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*1.5);
} 

if ($rsGuestbook["Land_Purchased"]>=30 && $rsGuestbook["Land_Purchased"]<60)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*2.0);
} 

if ($rsGuestbook["Land_Purchased"]>=60 && $rsGuestbook["Land_Purchased"]<100)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*2.5);
} 

if ($rsGuestbook["Land_Purchased"]>=100 && $rsGuestbook["Land_Purchased"]<150)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*3.0);
} 

if ($rsGuestbook["Land_Purchased"]>=150 && $rsGuestbook["Land_Purchased"]<200)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*3.5);
} 

if ($rsGuestbook["Land_Purchased"]>=200 && $rsGuestbook["Land_Purchased"]<250)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*5.0);
} 

if ($rsGuestbook["Land_Purchased"]>=250 && $rsGuestbook["Land_Purchased"]<300)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*10.0);
} 

if ($rsGuestbook["Land_Purchased"]>=300 && $rsGuestbook["Land_Purchased"]<400)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*15.0);
} 

if ($rsGuestbook["Land_Purchased"]>=400 && $rsGuestbook["Land_Purchased"]<500)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*20.0);
} 

if ($rsGuestbook["Land_Purchased"]>=500 && $rsGuestbook["Land_Purchased"]<800)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*25.0);
} 

if ($rsGuestbook["Land_Purchased"]>=800 && $rsGuestbook["Land_Purchased"]<1200)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*30.0);
} 

if ($rsGuestbook["Land_Purchased"]>=1200 && $rsGuestbook["Land_Purchased"]<2000)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*35.0);
} 

if ($rsGuestbook["Land_Purchased"]>=2000 && $rsGuestbook["Land_Purchased"]<3000)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*40.0);
} 

if ($rsGuestbook["Land_Purchased"]>=3000 && $rsGuestbook["Land_Purchased"]<4000)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*45.0);
} 

if ($rsGuestbook["Land_Purchased"]>=4000)
{

  $landcostpermile=$landcostpermile+($rsGuestbook["Land_Purchased"]*50.0);
} 

if ($cattle==1)
{
  $landcostpermile=$landcostpermile-($landcostpermile*.10);
}
;
} 
if ($fish==1)
{
  $landcostpermile=$landcostpermile-($landcostpermile*.05);
}
;
} 
if ($rubber==1)
{
  $landcostpermile=$landcostpermile-($landcostpermile*.10);
}
;
} 

$landcostpermile2=($FormatNumber[(100)][0]);
if ($Rubber==1)
{

  $landcostpermile2=$landcostpermile2*3;
} 


$militarycost=($FormatNumber[(10)][2]);
if ($iron==1)
{
  $militarycost=$militarycost-3;
}
;
} 
if ($oil==1)
{
  $militarycost=$militarycost-3;
}
;
} 
if (($rsGuestbook["DEFCON"]$Value)==5)
{
  $militarycost=$militarycost+($militarycost*.20);
}
;
} 
if (($rsGuestbook["DEFCON"]$Value)==4)
{
  $militarycost=$militarycost+($militarycost*.10);
}
;
} 
if (($rsGuestbook["DEFCON"]$Value)==2)
{
  $militarycost=$militarycost-($militarycost*.10);
}
;
} 
if (($rsGuestbook["DEFCON"]$Value)==1)
{
  $militarycost=$militarycost-($militarycost*.20);
}
;
} 

if ($pigs==1 || $lead==1)
{

  $dailysoldiercost=1.50;
}
  else
{

  $dailysoldiercost=2.00;
} 

$dailysoldiercost=$dailysoldiercost-($dailysoldiercost*($guerilla_camps*.10));
$dailysoldiercost=$dailysoldiercost-($dailysoldiercost*($barracks*.10));

$tankcost=$militarycost*40;
$tankcost=$tankcost-($tankcost*($factories*.10));
if ($Lead==1)
{

  $tankcost=$tankcost-($tankcost*.08);
} 


$dailytankcost=40;
if ($iron==1)
{

  $dailytankcost=$dailytankcost-($dailytankcost*.05);
} 

if ($oil==1)
{

  $dailytankcost=$dailytankcost-($dailytankcost*.05);
} 

if ($Lead==1)
{

  $dailytankcost=$dailytankcost-($dailytankcost*.08);
} 

if ($numberoftanks>($actualmilitary*10))
{
  $dailytankcost=$dailytankcost*3;
}
;
} 
if ($actualmilitary>($citizens*90))
{
  $dailysoldiercost=$dailysoldiercost*3;
}
;
} 


$technologycost=($FormatNumber[(10000)][2]);
if ($rsGuestbook["Technology_Purchased"]<5)
{

  $technologycost=$technologycost;
} 

if ($rsGuestbook["Technology_Purchased"]>=5 && $rsGuestbook["Technology_Purchased"]<8)
{

  $technologycost=$technologycost+($technologycost*.20)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=8 && $rsGuestbook["Technology_Purchased"]<10)
{

  $technologycost=$technologycost+($technologycost*.30)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=10 && $rsGuestbook["Technology_Purchased"]<15)
{

  $technologycost=$technologycost+($technologycost*.40)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=15 && $rsGuestbook["Technology_Purchased"]<30)
{

  $technologycost=$technologycost+($technologycost*.60)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=30 && $rsGuestbook["Technology_Purchased"]<50)
{

  $technologycost=$technologycost+($technologycost*.80)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=50 && $rsGuestbook["Technology_Purchased"]<75)
{

  $technologycost=$technologycost+($technologycost*1.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=75 && $rsGuestbook["Technology_Purchased"]<100)
{

  $technologycost=$technologycost+($technologycost*1.20)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=100 && $rsGuestbook["Technology_Purchased"]<150)
{

  $technologycost=$technologycost+($technologycost*1.40)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=150 && $rsGuestbook["Technology_Purchased"]<200)
{

  $technologycost=$technologycost+($technologycost*1.60)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=200 && $rsGuestbook["Technology_Purchased"]<250)
{

  $technologycost=$technologycost+($technologycost*2.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=250 && $rsGuestbook["Technology_Purchased"]<300)
{

  $technologycost=$technologycost+($technologycost*3.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=300 && $rsGuestbook["Technology_Purchased"]<400)
{

  $technologycost=$technologycost+($technologycost*4.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=400 && $rsGuestbook["Technology_Purchased"]<500)
{

  $technologycost=$technologycost+($technologycost*5.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=500 && $rsGuestbook["Technology_Purchased"]<600)
{

  $technologycost=$technologycost+($technologycost*6.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=600 && $rsGuestbook["Technology_Purchased"]<700)
{

  $technologycost=$technologycost+($technologycost*7.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=700 && $rsGuestbook["Technology_Purchased"]<1000)
{

  $technologycost=$technologycost+($technologycost*10.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=1000 && $rsGuestbook["Technology_Purchased"]<2000)
{

  $technologycost=$technologycost+($technologycost*15.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=2000 && $rsGuestbook["Technology_Purchased"]<3000)
{

  $technologycost=$technologycost+($technologycost*20.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=3000 && $rsGuestbook["Technology_Purchased"]<4000)
{

  $technologycost=$technologycost+($technologycost*25.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=4000 && $rsGuestbook["Technology_Purchased"]<5000)
{

  $technologycost=$technologycost+($technologycost*30.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=5000 && $rsGuestbook["Technology_Purchased"]<6000)
{

  $technologycost=$technologycost+($technologycost*35.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=6000 && $rsGuestbook["Technology_Purchased"]<7000)
{

  $technologycost=$technologycost+($technologycost*40.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=7000 && $rsGuestbook["Technology_Purchased"]<8000)
{

  $technologycost=$technologycost+($technologycost*45.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=8000 && $rsGuestbook["Technology_Purchased"]<9000)
{

  $technologycost=$technologycost+($technologycost*50.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=9000 && $rsGuestbook["Technology_Purchased"]<10000)
{

  $technologycost=$technologycost+($technologycost*55.00)+$rsGuestbook["Technology_Purchased"]*100;
} 

if ($rsGuestbook["Technology_Purchased"]>=10000)
{

  $technologycost=$technologycost*2;
} 

if ($Gold==1)
{

  $technologycost=$technologycost-($technologycost*.05);
} 

$technologycost=$technologycost-($technologycost*($universities*.10));
if ($gold==1 && $lead==1 && $oil==1 && $rsGuestbook["Technology_Purchased"]>10)
{
//Microchips

  $technologycost=$technologycost-($technologycost*.08);
} 

if ($SpaceWonder==1)
{

  $technologycost=$technologycost-($technologycost*.03);
} 

if ($UniversityWonder==1)
{

  $technologycost=$technologycost-($technologycost*.10);
} 

if ($ResearchWonder==1)
{

  $technologycost=$technologycost-($technologycost*.03);
} 



$nuclearcost=200000.00;
if ($Lead==1)
{

  $nuclearcost=$nuclearcost-($nuclearcost*.20);
} 

if ($rsGuestbook["Nuclear_Purchased"]>1)
{
  $nuclearcost=$nuclearcost+($nuclearcost*(($rsGuestbook["Nuclear_Purchased"]-1)*.1));
}
;
} 

$dailynuclearcost=2000.00;
if ($rsGuestbook["Nuclear_Purchased"]>1)
{
  $dailynuclearcost=$dailynuclearcost+($dailynuclearcost*(($rsGuestbook["Nuclear_Purchased"]-1)*.1));
}
;
} 
if ($Lead==1)
{

  $dailynuclearcost=$dailynuclearcost-($dailynuclearcost*.20);
} 


$cruisecost=4000.00;
if ($Lead==1)
{

  $cruisecost=$cruisecost-($cruisecost*.20);
} 

$cruisecost=$cruisecost-($cruisecost*($factories*.05));
$dailycruisecost=150.00;
if ($rsGuestbook["Cruise_Purchased"]>50)
{
  $dailycruisecost=$dailycruisecost*3;
}
;
} 
if ($Lead==1)
{

  $dailycruisecost=$dailycruisecost-($dailycruisecost*.20);
} 

?>	

<!--#include file="calculations_costs_aircraft.php" -->

<? 
if ($Aluminum==1)
{

  $f1=$f1-($f1*.08);
  $f2=$f2-($f2*.08);
  $f3=$f3-($f3*.08);
  $f4=$f4-($f4*.08);
  $f5=$f5-($f5*.08);
  $f6=$f6-($f6*.08);
  $f7=$f7-($f7*.08);
  $f8=$f8-($f8*.08);
  $f9=$f9-($f9*.08);

  $b1=$b1-($b1*.08);
  $b2=$b2-($b2*.08);
  $b3=$b3-($b3*.08);
  $b4=$b4-($b4*.08);
  $b5=$b5-($b5*.08);
  $b6=$b6-($b6*.08);
  $b7=$b7-($b7*.08);
  $b8=$b8-($b8*.08);
  $b9=$b9-($b9*.08);
} 

if ($Rubber==1)
{

  $f1=$f1-($f1*.04);
  $f2=$f2-($f2*.04);
  $f3=$f3-($f3*.04);
  $f4=$f4-($f4*.04);
  $f5=$f5-($f5*.04);
  $f6=$f6-($f6*.04);
  $f7=$f7-($f7*.04);
  $f8=$f8-($f8*.04);
  $f9=$f9-($f9*.04);

  $b1=$b1-($b1*.04);
  $b2=$b2-($b2*.04);
  $b3=$b3-($b3*.04);
  $b4=$b4-($b4*.04);
  $b5=$b5-($b5*.04);
  $b6=$b6-($b6*.04);
  $b7=$b7-($b7*.04);
  $b8=$b8-($b8*.04);
  $b9=$b9-($b9*.04);
} 

if ($Oil==1)
{

  $f1=$f1-($f1*.04);
  $f2=$f2-($f2*.04);
  $f3=$f3-($f3*.04);
  $f4=$f4-($f4*.04);
  $f5=$f5-($f5*.04);
  $f6=$f6-($f6*.04);
  $f7=$f7-($f7*.04);
  $f8=$f8-($f8*.04);
  $f9=$f9-($f9*.04);

  $b1=$b1-($b1*.04);
  $b2=$b2-($b2*.04);
  $b3=$b3-($b3*.04);
  $b4=$b4-($b4*.04);
  $b5=$b5-($b5*.04);
  $b6=$b6-($b6*.04);
  $b7=$b7-($b7*.04);
  $b8=$b8-($b8*.04);
  $b9=$b9-($b9*.04);
} 

if ($SpaceWonder==1)
{

  $f1=$f1-($f1*.05);
  $f2=$f2-($f2*.05);
  $f3=$f3-($f3*.05);
  $f4=$f4-($f4*.05);
  $f5=$f5-($f5*.05);
  $f6=$f6-($f6*.05);
  $f7=$f7-($f7*.05);
  $f8=$f8-($f8*.05);
  $f9=$f9-($f9*.05);

  $b1=$b1-($b1*.05);
  $b2=$b2-($b2*.05);
  $b3=$b3-($b3*.05);
  $b4=$b4-($b4*.05);
  $b5=$b5-($b5*.05);
  $b6=$b6-($b6*.05);
  $b7=$b7-($b7*.05);
  $b8=$b8-($b8*.05);
  $b9=$b9-($b9*.05);
} 


if ($Construction==1)
{

  $aircraftlimit=60;
}
  else
{

  $aircraftlimit=50;
} 

?>

