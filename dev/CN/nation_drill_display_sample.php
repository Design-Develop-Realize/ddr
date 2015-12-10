<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->

<!--#include file="inc_header.php" -->

<body>

<table borderColor="#000080" cellSpacing="0" cellPadding="5" width="100%" bgColor="#f7f7f7" border="1" id="table8">
	<tr>
		<td width="70%" bgColor="#000080" colSpan="2"><b><font color="#000080">
		<a name="info">_</a></font><font color="#ffffff">:. Nation Information</font></b></td>
	</tr>
	<tr>
		<td width="70%" bgColor="#ffffff" colSpan="2">Marks Nation is a very 
		large and older nation with citizens primarily of 
		Caucasian ethnicity whose religion is Christianity. Its technology is 
		first rate and its citizens marvel at the astonishing advancements 
		within their nation. Its citizens pay moderately high tax rates and they 
		are somewhat unhappy in their work environments as a result. The 
		citizens of Marks Nation work diligently to produce Coal and Iron as 
		tradable resources for their nation. It is a very passive country when 
		it comes to foreign affairs and has no interests in war.&nbsp;It believes 
		nuclear weapons are necessary for the security of its people.&nbsp;Plans are 
		on the way within Marks Nation to open new rehabilitation centers across 
		the nation and educate its citizens of the dangers of drug use.&nbsp;Marks 
		Nation allows its citizens to protest their government but uses a strong 
		police force to monitor things and arrest law breakers.&nbsp;It has an open 
		border policy, but in order for the immigrants to remain in the country 
		they will have to become citizens first.&nbsp;Marks Nation believes in the 
		freedom of speech and feels that it is every citizens right to speak 
		freely about their government.&nbsp;The government gives whatever is 
		necessary to help others out in times of crisis, even it means hurting 
		its own economy.&nbsp;Marks Nation has no definite position on trade 
		relations. </td>
	</tr>
	<tr>
		<td width="70%" bgColor="#000080" colSpan="2"><b><font color="#000080">
		<a name="messages">_</a></font><font color="#ffffff">:. Private Nation 
		Messages</font></b></td>
	</tr>
	<tr>
		<td width="70%" colSpan="2">
		<img height="16" src="http://cybernations.net/images/warning.gif" width="17" border="0">
		<font color="#ff0000">You haven't <a href="default.php">paid your bills 
		today</a>. You last paid your bills on <? echo time()()-1; ?>.</font>
		<p><font color="#ff0000">You have specified in your war/peace preference 
		that you do not want to be attacked. While this is good during the early 
		days of your nation to help protect it until you build up your military 
		forces, over time this will also makes your population lethargic and 
		less active which decreases the amount of income they make. Use this 
		option wisely.</font> Your population density of 18.28 population per 
		mile is at a good level at this time. <font color="#ff0000">The armed 
		forces of Marks Nation are very strong. This is making your population a 
		bit uncomfortable.</font> You have 0 soldiers deployed overseas and 
		5,646 soldiers defending your nation. Your defenses are strong. The 
		infrastructure of Marks Nation is adequate at the time with a level of 
		600.67. 
		</td>
	</tr>
	<tr>
		<td width="70%" bgColor="#000080" colSpan="2"><b><font color="#000080">
		<a name="gov">_</a></font><font color="#ffffff">:. Government 
		Information</font></b></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Nation Name:</td>
		<td bgColor="#ffffff">Marks Nation </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Ruler:</td>
		<td bgColor="#ffffff">admin </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Last Activity:</td>
		<td bgColor="#ffffff"><? echo strftime("%m/%d/%Y %H:%M:%S %p")(); ?> </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">National Flag:</td>
		<td bgColor="#e1e1e1">
		<img src="http://cybernations.net/images/flags/Guinea-Bissau.png"> 
		</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=26">Alliance Affiliation</a>:</td>
		<td bgColor="#ffffff">None </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
				Capital City:</td>
		<td bgColor="#ffffff">Admin Town</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Capital Coordinates:</td>
		<td bgColor="#ffffff">33.11627472754512, -96.10084533691406</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">About Marks Nation:</td>
		<td bgColor="#ffffff">This is admins nation. Don't mess with it.</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=19">Government Type</a>:</td>
		<td bgColor="#ffffff">Anarchy <i>(Next Available Change <? echo time()()+3; ?>)</i>
		<i><br>
		Your people approve of this form of government but the majority of your 
		people would prefer something else. They desire a government that 
		exercises total control over its subjects.</i> </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=18">National Religion</a>:</td>
		<td bgColor="#ffffff">
		<table cellSpacing="0" cellPadding="4" width="100%" border="0" id="table9">
			<tr>
				<td>
				<img title="Christianity" src="http://cybernations.net/images/religion/Christianity.JPG"></td>
				<td width="469"><i>(Next Available Change <? echo time()()+2; ?>)</i> <br>
				<i>Your people approve of this national religion but the 
				majority of your people would prefer something else. They 
				believe in reincarnation and the wish to worship a supreme being 
				that they call Allah. </i></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Currency Type:</td>
		<td bgColor="#ffffff">
		<img title="Dollar" src="http://cybernations.net/images/currency/Dollar.JPG"> 
		</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=26">
Nation Team</a>:</td>
		<td bgColor="#ffffff"><font color="black">Black </font></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Nation Created:</td>
		<td bgColor="#ffffff">2/25/2006 6:07:50 PM</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=25">Infrastructure</a>:</td>
		<td bgColor="#ffffff">600.67</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=11">Technology</a>: </td>
		<td bgColor="#ffffff">120.00 </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Literacy Rate: </td>
		<td bgColor="#ffffff">99.67% </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=23">Tax Rate</a>:</td>
		<td bgColor="#ffffff">21% </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
		Area of Influence:</td>
		<td bgColor="#ffffff">569.236 mile diameter. <br>
		<i>402.708 from purchases/sales/gains, 106.122 from natural growth.</i> 
		</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=9">War/Peace Preference</a>:</td>
		<td bgColor="#ffffff">
		<img height="19" src="http://cybernations.net/images/peace.gif" width="19" border="0"> 
		Marks Nation is a peaceful nation. War is not an option. </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=31">My Resources</a>:</td>
		<td bgColor="#ffffff">
		<img title="Coal" src="http://cybernations.net/images/resources/Coal.GIF"><img title="Iron" src="http://cybernations.net/images/resources/Iron.GIF"> 
		</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Connected Resources:</td>
		<td bgColor="#ffffff">
		<img title="Coal" src="http://cybernations.net/images/resources/Coal.GIF"><img title="Iron" src="http://cybernations.net/images/resources/Iron.GIF"> 
		<img title="Lumber" src="http://cybernations.net/images/resources/Lumber.GIF"><img title="Water" src="http://cybernations.net/images/resources/Water.GIF"> 

		</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=31">Bonus Resources</a>:</td>
		<td bgColor="#ffffff">
		<img title="Steel" src="images/resources/steel.GIF"> 
		</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=4446">Improvements</a>:</td>
		<td bgColor="#ffffff">Banks: 5, Churches: 5, Clinics: 5, Factories: 5, 
		Foreign Ministries: 1, Harbors: 1, Hospitals: 1, Intelligence Agencies: 
		5</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=38839">National Wonders</a>:
</td>
		<td bgColor="#ffffff">Social Security System</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=13001">Global Radiation</a>:</td>
		<td bgColor="#ffffff">0.76</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=1645">Environment</a>:</td>
		<td bgColor="#ffffff">
		<img title="Your nation's environment is decently clean. A clean enviornment leads to increased and happier citizen counts." src="assets/3.5.gif" border="0">
		<font color="white">4.76</font> </td>
	</tr>
	<tr>
		<td bgColor="#000080" colSpan="2"><b><font color="#000080">
		<a name="mil">_</a></font><font color="#ffffff">:. Military Information</font></b></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=28">Nation Strength</a>:</td>
		<td bgColor="#ffffff">5,419.872 </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=3773">Efficiency</a>:</td>
		<td bgColor="#ffffff">25.57 </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">

<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=375">DEFCON Level</a>:</td>
		<td bgColor="#ffffff"><img src="images/DEFCON/DEFCON3.gif" title="DEFCON 3 - Increased military readiness above normal readiness."> </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">

<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=25">Number of Soldiers:</a></td>
		<td bgColor="#ffffff">5,646 </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
		<table id="table10" cellSpacing="0" cellPadding="4" width="100%" border="0">
			<tr>
				<td>&nbsp;</td>
				<td align="left" width="327"><i>Deployed Soldiers:</i></td>
			</tr>
		</table>
		</td>
		<td bgColor="#ffffff">0 </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
		<table id="table11" cellSpacing="0" cellPadding="4" width="100%" border="0">
			<tr>
				<td>&nbsp;</td>
				<td align="left" width="327"><i>Defending Soldiers:</i></td>
			</tr>
		</table>
		</td>
		<td bgColor="#ffffff">5,646&nbsp; </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">

<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=2559">Number of Tanks</a>:</td>
		<td bgColor="#ffffff">16 </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
		<table id="table12" cellSpacing="0" cellPadding="4" width="100%" border="0">
			<tr>
				<td>&nbsp;</td>
				<td align="left" width="327"><i>Deployed Tanks:</i></td>
			</tr>
		</table>
		</td>
		<td bgColor="#ffffff">0 </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
		<table id="table13" cellSpacing="0" cellPadding="4" width="100%" border="0">
			<tr>
				<td>&nbsp;</td>
				<td align="left" width="327"><i>Defending Tanks:</i></td>
			</tr>
		</table>
		</td>
		<td bgColor="#ffffff">16 </td>
	</tr>
	<tr>
<td bgcolor="#FFFFFF" width="18%">

<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=28181">Aircraft</a>:</td>
<td bgcolor="#FFFFFF">
10</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">

<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=2752">Number of Cruise Missiles</a>:</td>
		<td bgColor="#ffffff">50 </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=24">

Number of Nuclear Weapons</a>:</td>
		<td bgColor="#ffffff">0 </td>
	</tr>
	<tr>
		<td bgColor="#000080" colSpan="2"><b><font color="#000080">
		<a name="pop">_</a></font><font color="#ffffff">:. Population 
		Information</font></b></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Total Population:</td>
		<td bgColor="#ffffff">10,403 Supporters </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Primary Ethnic Group:</td>
		<td bgColor="#ffffff">Caucasian</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">
<b>
<img border="0" src="http://cybernations.net/images/information.gif" width="17" height="16"> </b>
<a target="_blank" href="http://z15.invisionfree.com/Cyber_Nations/index.php?showtopic=16">Population Happiness</a>:</td>
		<td bgColor="#ffffff">
		<img title="Your population is furious." height="30" src="http://cybernations.net/images/sad.gif">
		<font color="#ffffff">5.50</font> </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Population Per Mile:</td>
		<td bgColor="#ffffff">18.28 Population Per Mile. </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff" rowSpan="2">
		<table id="table14" cellSpacing="0" cellPadding="4" width="100%" border="0">
			<tr>
				<td>&nbsp;</td>
				<td align="left" width="327"><i>Military Personnel:</i></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left" width="327"><i>Citizens:</i></td>
			</tr>
		</table>
		</td>
		<td bgColor="#ffffff"><i>5,646 Soldiers</i> </td>
	</tr>
	<tr>
		<td bgColor="#ffffff"><i>4,757 Working Citizens</i></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Avg. Gross Income Per Individual Per 
		Day:</td>
		<td bgColor="#ffffff">$10.00
		<img height="16" src="http://cybernations.net/images/warning.gif" width="17" border="0">
		<i>(A very weak economy)</i></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Avg. Individual Income Taxes Paid Per 
		Day</td>
		<td bgColor="#ffffff">$2.10</td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Avg. Net Daily Population Income 
		(After Taxes)</td>
		<td bgColor="#ffffff">$7.90</td>
	</tr>
	<tr>
		<td bgColor="#000080" colSpan="2"><b><font color="#000080">
		<a name="fin">_</a></font><font color="#ffffff">:. Government Financial</font></b></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff">Purchase Transactions</td>
		<td bgColor="#ffffff">90 transactions </td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff"><b>Total Income Taxes Collected:</b></td>
		<td bgColor="#ffffff"><b>$2,623,887.39 </b></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff"><b>Total Expenses Over Time:</b></td>
		<td bgColor="#ffffff"><b>$2,301,616.10 </b></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff" rowSpan="2">
		<table id="table15" cellSpacing="0" cellPadding="4" width="100%" border="0">
			<tr>
				<td>&nbsp;</td>
				<td vAlign="top" align="left" width="326"><b>&nbsp;</b><i>Bills Paid:</i></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left" width="326"><i>Purchases Over Time:</i></td>
			</tr>
		</table>
		</td>
		<td bgColor="#ffffff"><i>$1,978,920.46</i></td>
	</tr>
	<tr>
		<td bgColor="#ffffff"><i>$322,695.64</i></td>
	</tr>
	<tr>
		<td width="18%" bgColor="#ffffff" height="34"><b>Current Dollars 
		Available:</b></td>
		<td bgColor="#ffffff" height="34"><b><font color="green">$322,271.29 &nbsp; 
		(Surplus) </font></b></td>
	</tr>
</table>

</body>
<!--#include file="search_include.php" -->

<!--#include file="inc_footer.php" -->

