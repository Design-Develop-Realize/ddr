<html>
<head>
<title>NpO Warchest Form</title>
</head>
<body>
<style>
    body {
        text-align: center;
    }
</style>
<div align="right">
    [<a href="log.php">Log In</a>]
</div>
<form action="#" method="POST">
    Please paste <strong>HTML source code</strong>:<br />
    <textarea name="source" rows="20" cols="100"></textarea><br />
    Select Brigade: <select name="brigade">
        <option value="">Select Brigade</option>
        <option value="Amber">Amber</option>
        <option value="Black Marsh">Black Marsh</option>
        <option value="Tyga">Tyga</option>
        <option value="Unistrut">Unistrut</option>
    </select>
    <br />
    Do you also want a mini-audit? This is not the same as a full audit on the forums!
    <input type="checkbox" name="audit" />
    <br />
    <input type="hidden" name="sekrit" />
    <input type="submit" value="Submit" />
</form>
<?php
include_once('include.php');
    if(!isset($_POST['sekrit'])) {
        show_instruction();
        exit(0);
    }

    function showHTML($code) {
        echo "<textarea rows=25 cols=100>".$code."</textarea><br />";
    }
    
    function findField($string, $name) {
        $pos = strpos($string, "\">", strpos($string, $name)) + 2;
        $length = strpos($string, "<", $pos) - $pos;
        return trim(substr($string, $pos, $length));
    }
    
    function removecommas($str) {
        return str_replace(",", "", $str);
    }
    
    function parseGovDesire($desire) {
        switch($desire) {
            case "They desire a government that will invest heavily in business ventures.":
                return "Capitalist";
                break;
            case "They desire a government that supports common ownership of all national possessions.":
                return "Communist";
                break;
            case "They desire a government that makes decisions based on fair elective processes.":
                return "Democracy";
                break;
            case "They desire a supreme ruler who is in charge of all national matters.":
                return "Dictatorship";
                break;
            case "They desire a government of strong central powers that will reside over issues such as national defense, disaster relief, and foreign affairs.":
                return "Federal Government";
                break;
            case "They wish to be ruled by a royal family.":
                return "Monarchy";
                break;
            case "They wish to be ruled by the people themselves and more specifically do not want to be ruled by a royal family.":
                return "Republic";
                break;
            case "They desire a government that is based on radical change.":
                return "Revolutionary Government";
                break;
            case "They desire a government that exercises total control over its subjects.":
                return "Totalitarian State";
                break;
            case "They do not desire a permanent government but instead prefer something more temporary.":
                return "Transitional";
                break;
            default:
                return "Unknown";
                break;
        }
    }
    
    function parseRelDesire($desire) {
        switch($desire) {
            case "Perhaps they do not desire a religion.":
                return "None";
                break;
            case "There is no dominant religion among your population at this time but instead a variety of various teachings and followings.":
                return "Mixed";
                break;
            case "They desire a modern middle eastern religion that focuses on monotheism.":
                return "Baha'i faith";
                break;
            case "They desire to follow a religion that seeks freedom from greed, hatred and delusion, and enlightenment through realizing the Four Noble Truths and following the Eightfold Path.":
                return "Buddhism";
                break;
            case "They desire a monotheistic system of beliefs and practices based on the Old Testament and the teachings of Jesus Christ as embodied in the New Testament.":
                return "Christianity";
                break;
            case "They desire a Far Eastern philosophical religion emphasizing love for humanity, high value given to learning and to devotion to family and ancestors, peace, justice, and respect for traditional culture.":
                return "Confucianism";
                break;
            case "They believe in reincarnation and karma and desire a religion that supports this philosophy.":
                return "Hinduism";
                break;
            case "They wish to worship a supreme being called Allah and follow the teaching of a prophet recorded in their sacred text called the Quran.":
                return "Islam";
                break;
            case "They are primarily non-materialistic and wish for a national religion that supports atheism and that teaches that every single living thing is an individual and eternal soul, called Jiva, which is responsible for its own actions.":
                return "Jainism";
                break;
            case "They desire a religion that follows divine scriptures with ethical principles embodied chiefly in the Torah and in the Talmud.":
                return "Judaism";
                break;
            case "They wish to follow an ancient religion followed by Germanic tribes living in Nordic countries under pre-Christian period.":
                return "Norse";
                break;
            case "They believe that god is present in all walks of life, both in living and non-living things.":
                return "Shinto";
                break;
            case "They desire a belief system which blends Hindu traditions with Islamic monotheistic traditions, the belief in one God and the teachings of the Ten Gurus.":
                return "Sikhism";
                break;
            case "They do not believe in a single God but instead believe in oneness and freedom from personal desires.":
                return "Taoism";
                break;
            case "They believe in the conjuring of dead spirits and desire a national religion that supports this.":
                return "Voodoo";
                break;
            default:
                return "Unknown";
                break;
        }
    }
    
    $source = $_POST['source'];
    $brigade = $_POST['brigade'];
    
    if(strlen($source) == 0) {
        echo "<h1>Please enter the source code!</h1>";
        exit(1);
    }
    if(strlen($brigade) == 0) {
        echo "<h1>Please select a Brigade from the dropdown!</h1>";
        exit(1);
    }
    if(strpos($source, "<html>") === false) {
        echo "<h1>Please enter HTML source code, not your nation info!</h1>";
        exit(1);
    }
    
    $html = substr($source, strpos($source, "<body"));
    $nationhtml = substr($html, strpos($html, "#info"));
    
    
    // Brigade
    //echo "Brigade: ".$brigade."<br>";
    
    // Nation ID
    $pos = strpos($nationhtml, "Nation_ID=")+10;
    $length = strpos($nationhtml, "\"", $pos) - $pos;
    //echo "Length: ".$length."<br>";
    $nationid = trim(substr($nationhtml, $pos, $length), "\\\"");
    //echo "Nation ID: ".$nationid."<br>";
        
    // Ruler name
    $rulername = findField($nationhtml, "Ruler:");
    //echo "Ruler name: ".$rulername."<br>";
    
    // Tech
    $tech = removecommas(findField($nationhtml, "Technology</a>:"));
    //echo "Tech: ".$tech."<br>";
    
    // Infra
    $infra = removecommas(findField($nationhtml, "Infrastructure</a>:"));
    //echo "Infra: ".$infra."<br>";
    
    // War/Peace mode
    // Custom because the <img> tag opener gets in the way
    $pos = strpos($nationhtml, "\">", strpos($nationhtml, "War/Peace Preference")) + 2;
    $length = strpos($nationhtml, "\">", $pos) - $pos;
    $field = trim(substr($nationhtml, $pos, $length));
    $warpeace = trim(substr($field, strpos($field, "images/")+7, 5), ".g");
    //echo "War/Peace mode: ".$warpeace."<br>";
    
    // Wonders
    // Custom because wonders are apparently special enough to warrant a table within a table *cringe*
    $pos = strpos($nationhtml, "\">", strpos($nationhtml, "National Wonders")) + 2;
    $length = strpos($nationhtml, "</table>", $pos) - $pos;
    $field = trim(substr($nationhtml, $pos, $length));
    $listpos = strpos($field, "<td>", strpos($field, "<td>")) + 4;
    $listlength = strpos($field, "</td>", $listpos) - $listpos;
    $wonders = trim(substr($field, $listpos, $listlength));
    $mp = (strpos($wonders, "Manhattan Project") !== false) ? 1 : 0;
    $sdi = (strpos($wonders, "Strategic Defense Initiative") !== false) ? 1 : 0;
    $pent = (strpos($wonders, "Pentagon") !== false) ? 1 : 0;
    $wrc = (strpos($wonders, "Weapons Research Complex") !== false) ? 1 : 0;
    $fafb = (strpos($wonders, "Foreign Air Force Base") !== false) ? 1 : 0;
    $aadn = (strpos($wonders, "Anti-Air Defense Network") !== false) ? 1 : 0;
    $hnms = (strpos($wonders, "Hidden Nuclear Missile Silo") !== false) ? 1 : 0;
    //echo "National Wonders: ".$wonders."<br>";
    
    // Nation Strength
    $nationstrength = removecommas(findField($nationhtml, "Nation Strength</a>:"));
    //echo "Nation Strength: ".$nationstrength."<br>";
    
    // Nuke count
    $nukes = findField($nationhtml, "Nuclear Weapons</a>:");
    //echo "Nukes: ".$nukes."<br>";
    
    // Spy count
    $spies = findField($nationhtml, "Number of Spies");
    //echo "Spies: ".$spies."<br>";
    
    // Warchest
    // Custom because fancy colors SHOULD DIE
    $pos = strpos($nationhtml, "\">", strpos($nationhtml, "Available:")) + 2;
    $length = strpos($nationhtml, "</td>", $pos) - $pos;
    $field = trim(substr($nationhtml, $pos, $length));
    $start = strpos($field, "$") + 1;
    $warchest = removecommas(trim(substr($field, $start, strpos($field, "&", $start) - $start)));
    //echo "Warchest: ".$warchest."<br>";
    
    // Warchest-compliant?
    $rebuildcost = rebuild_calc($infra, $tech);

    if($nationstrength <= 10000) {
        $wctarget = 10000000;
    }
    elseif($nationstrength <= 20000) {
        $wctarget = (($mp) ? (90000000) : (50000000)) + $rebuildcost;
    }
    elseif($nationstrength <= 30000) {
        $wctarget = 300000000 + $rebuildcost;
    }
    elseif($nationstrength <= 45000) {
        $wctarget = 400000000 + $rebuildcost;
    }
    elseif($nationstrength <= 60000) {
        $wctarget = 600000000 + $rebuildcost;
    }
    elseif($nationstrength <= 75000) {
        $wctarget = 800000000 + $rebuildcost;
    }
    else {
        $wctarget = 1000000000 + $rebuildcost;
    }

    //Are they fully compliant?
    if($warchest >= $wctarget)
    {
        $warchestcompliant = 2;
    } else {
        //minimum compliant?
        if($warchest >= ($wctarget - $rebuildcost))
        {
            $warchestcompliant = 1;
        } else {
            //uh oh
            $warchestcompliant = 0;
        }
    }
    
    // Tier
    // No parsing, just calculations (by which I mean a lot of ifs)
    if($infra < 4000) {
        $tier = 1;
    }
    elseif(strpos($wonders, "Stock Market") === false
    || strpos($wonders, "Social Security System") === false) {
        $tier = 1;
    }
    elseif($warchest < $wctarget + 30000000) {
        $tier = 1;
    }
    
    elseif($tech < 500) {
        $tier = 2;
    }
    elseif (strpos($wonders, "Federal Aid Commission") === false
    || strpos($wonders, "Pentagon") === false
    || strpos($wonders, "Great Temple") === false
    || strpos($wonders, "National Research Lab") === false
    || strpos($wonders, "Strategic Defense Initiative") === false) {
        $tier = 2;
    }
    elseif($warchest < $wctarget + (max($infra-5000, 0) * 100000)) {
        $tier = 2;
    }
    elseif($nukes < (($hnms) ? 25 : 20)) {
        $tier = 2;
    }
    
    elseif($infra < 8500) {
        $tier = 3;
    }
    elseif($tech < 2000) {
        $tier = 3;
    }
    elseif(strpos($wonders, "Interstate System") === false
    || strpos($wonders, "Internet") === false
    || strpos($wonders, "Great Monument") === false
    || strpos($wonders, "Great University") === false
    || strpos($wonders, "Central Intelligence Agency") === false
    || strpos($wonders, "Weapons Research Complex") === false) {
        $tier = 3;
    }
    
    else {
        $tier = 4;
    }
    
    
    if($_POST['audit'])
    {
        //echo "Sooooon...";
        //exit;
        $audit = "<h3>Your audit results:</h3>";

        // Nation positions
        $pos = strpos($nationhtml, "<td width", strpos($nationhtml, "Nation Information")) + 1;
        $length = strpos($nationhtml, "<", $pos) - $pos;
        $nationpos = trim(substr($nationhtml, $pos, $length));
        
        $govpos = "";
        // Nuclear pos
        if($mp) {
            if(strpos($nationpos, "nuclear weapons are necessary") === false) {
                $govpos .= "Please set your Nuclear Policy to promote the use and build up of nuclear weapons. ";
            }
        }
        elseif(strpos($nationpos, "use of nuclear power plants") === false) {
            $govpos .= "Please set your Nuclear Policy to using nuclear energy for power plants. ";
        }
        // Drugs
        if(strpos($nationpos, "open new rehabilitation centers") === false
        && strpos($nationpos, "arresting all drug traffickers") === false) {
            $govpos .= "Please set your Drug Policy to either \"open new rehabilitation centers\" or \"arresting all drug traffickers\". ";
        }
        // Borders
        if(strpos($nationpos, "have to become citizens first") === false
        && strpos($nationpos, "closed to all forms of immigration") === false) {
            $govpos .= "Please set your Border Policy to either \"have to become citizens first\" or \"closed to all forms of immigration\". ";
        }
        // Combine
        $audit .= "<strong>Government positions: </strong>";
        $audit .= ((strlen($govpos) == 0) ? ("<img src=\"tick.gif\" alt=\"correct\" />") : ("</strong><img src=\"cross.gif\" alt=\"wrong\" /> " . $govpos)) . "<br />";
        
        // Government type
        $audit .= "<strong>Government Type: </strong>";
        $pos = strpos($nationhtml, "<i>", strpos($nationhtml, "Government Type")) + 3;
        $length = strpos($nationhtml, "</i>", $pos) - $pos;
        $govttype = trim(substr($nationhtml, $pos, $length));
        $govtsplit = explode(" - ", $govttype);
        $currgovt = trim($govtsplit[0]);
        $periodpos = strpos($govtsplit[1], ".") + 1;
        $like = strpos(substr($govtsplit[1], 0, $periodpos), "Your people are happy with this government") !== false;
        $desire = trim(substr($govtsplit[1], $periodpos));
        $govtlist = "Revolutionary Government, Monarchy, Capitalist, Republic, Democracy, Totalitarian State, Federal Government";
        
        if($like) {
            if(strpos($govtlist, $currgovt) !== false) {
                $audit .= "<img src=\"tick.gif\" alt=\"correct\" /><br />";
            }
            else {
                $desiredgovt = parseGovDesire($desire);
                $audit .= "<img src=\"cross.gif\" alt=\"wrong\" /> Please change your Government Type to " . ((strpos($govtlist, $desiredgovt) !== false) ? ($desiredgovt) : ("Revolutionary Government")) . ".<br />";
            }
        }
        else {
            if($currgovt == "Revolutionary Government") { // Meh, just undesired Revolutionary is good enough
                $audit .= "<img src=\"tick.gif\" alt=\"correct\" /><br />";
            }
            else {
                $desiredgovt = parseGovDesire($desire);
                $audit .= "<img src=\"cross.gif\" alt=\"wrong\" /> Please change your Government Type to " . ((strpos($govtlist, $desiredgovt) !== false) ? ($desiredgovt) : ("Revolutionary Government")) . ".<br />";
            }
        }
        
        // Religion
        $audit .= "<strong>Religion: </strong>";
        $pos = strpos($nationhtml, "<i>", strpos($nationhtml, "National Religion")) + 3;
        $length = strpos($nationhtml, "</i>", $pos) - $pos;
        $religion = trim(substr($nationhtml, $pos, $length));
        if(strpos($religion, "Your people are happy with this religion.") !== false) {
            $audit .= "<img src=\"tick.gif\" alt=\"correct\" /><br />";
        }
        else {
            $pos = strpos($religion, ".") + 1;
            $length = strpos($religion, "(", $pos) - $pos;
            $desire = trim(substr($religion, $pos, $length));
            $audit .= "<img src=\"cross.gif\" alt=\"wrong\" /> Please change your Religion to " . parseRelDesire($desire) . ".<br />";
        }
        
        //tech/infra ratio
        //war/peace, must be war
        if($warpeace == "war")
        {
            $audit .= "<strong>War/Peace Mode: </strong><img src=\"tick.gif\" alt=\"correct\" /><br />";
        } else {
            $audit .= "<strong>War/Peace Mode: </strong><img src=\"cross.gif\" alt=\"wrong\" /> Unless you've been explicitly ordered or allowed into Peace Mode, you should be in War mode.<br />";
        }

        // DefCon/Threat levels
        $pos = strpos($nationhtml, "title", strpos($nationhtml, "DEFCON Level"));
        $length = strpos($nationhtml, "\">", $pos) - $pos;
        $defcon = trim(substr($nationhtml, $pos, $length));
        
        $pos = strpos($nationhtml, "title", strpos($nationhtml, "Threat Level"));
        $length = strpos($nationhtml, "\">", $pos) - $pos;
        $threat = trim(substr($nationhtml, $pos, $length));
        
        $audit .= "<strong>DefCon Level: </strong>" . ((strpos($defcon, "5") !== false) ? "<img src=\"tick.gif\" alt=\"correct\" />" : "<img src=\"cross.gif\" alt=\"wrong\" /> Unless you're at war or a ruthless backcollector, there is no reason for you not to have DefCon 5. ") . "<br />";
        $audit .= "<strong>Threat Level: </strong>" . ((strpos($threat,"Low") !== false) ? "<img src=\"tick.gif\" alt=\"correct\" />" : "<img src=\"cross.gif\" alt=\"wrong\" /> Unless you're at war or a ruthless backcollector, there is no reason for you not to have a Low Threat Level. ") . "<br />";
        
        // Improvements
        $pos = strpos($nationhtml, "</td>", strpos($nationhtml, "Improvements</a>:") + 22) + 13; // Skip stuff
        $length = strpos($nationhtml, "</td>", $pos) - $pos;
        $improvements = trim(substr($nationhtml, $pos, $length));
        $improvementsplosion = explode(", ", $improvements);
        $improvementsArr = array();
        foreach($improvementsplosion as $imp) {
            $implosion = explode(": ", $imp);
            $improvementsArr[$implosion[0]] = $implosion[1];
        }
        
        $audit .= "<strong>Improvements: </strong>" . ((strpos($improvements, "Guerilla Camps") === false) ? ("<img src=\"tick.gif\" alt=\"correct\" />") : ("<img src=\"cross.gif\" alt=\"wrong\" /> Unless you're at war or a ruthless backcollector, there is no reason for you to have <strong>Guerilla Camps</strong>. ")) . "<br />";
    
        // Military
        $soldiersEff = findField($nationhtml, "Number of Soldiers:");
        $soldiers = removeCommas(substr($soldiersEff, 0, strpos($soldiersEff, " ")));
        $population = findField($nationhtml, "Total Population:");
        $pop = removeCommas(substr($population, 0, strpos($population, " ")));
        $citizens = $pop - $soldiers;
        $mil = "";
        if($soldiers * 5 < $citizens) { // Simplifying mathemagic to avoid dividing stuff!
            $mil .= "Your <strong>Soldier count</strong> is too low, always make sure to have a soldier count that is at least 20% of your citizen count (in this case " . ($citizens/5 + 1) . "). ";
        }
        $tanks = findField($nationhtml, "Number of Tanks</a>:");
        if($tanks > 0) {
            $mil .= "<strong>Tanks</strong> will increase your bills. Unless you're at war, are going to war, or simply don't care, you should decommission them. ";
        }
        $planes = findField($nationhtml, "Aircraft</a>:");
        if($planes > 0) {
            $mil .= "<strong>Aircraft</strong> will increase your bills. Unless you're at war, are going to war, have level 9 planes, or simply don't care, you should decommission them. ";
        }
        $cms = findField($nationhtml, "Cruise Missiles</a>:");
        if($cms > 0) {
            $mil .= "<strong>Cruise Missiles</strong> will increase your bills. You should really never have these. Buy them when you need them (as in, right before you will use them). No sense in keeping them on hand. ";
        }
        if($mp && $nukes < (($hnms) ? 25 : 20)) {
            $mil .= "Your <strong>Nuke count</strong> is not at the maximum. It's likely that you're aware of this, but this is a friendly reminder that you should keep buying nukes up to your maximum of " . ($hnms ? 25 : 20) . ". ";
        }
        $iacount = $improvementsArr["Intelligence Agencies"];
        $maxspies = ($iacount * 100) + 50;
        if(strpos($wonders, "Central Intelligence Agency") !== false) {
            $maxspies += 250;
        }
        if($spies < $maxspies) {
            $mil .= "Your <strong>Spy count</strong> is not at the maximum. It's likely that you're aware of this, but this is a friendly reminder that you should keep buying spies (when your warchest permits it) up to your maximum of " . $maxspies . ". ";
        }

        $audit .= "<strong>Military compliance: </strong>";
        $audit .= ((strlen($mil) == 0) ? ("<img src=\"tick.gif\" alt=\"correct\" />") : ("<img src=\"cross.gif\" alt=\"wrong\" /> " . $mil)) . "<br />";
        
        // Warchest compliance
        if($warchestcompliant == 2)
        {
        	$audit .= "<strong>Warchest Compliance: </strong><img src=\"tick.gif\" alt=\"correct\" /><br />";
        }
        elseif ($warchestcompliant == 1) {
            $audit .= "<strong>Warchest Compliance: </strong><img src=\"cross.gif\" alt=\"wrong\" /> (you're already compliant with the base requirement, but still missing the rebuild cost. Aim for " . number_format($wctarget) . ")<br />";
        } 
        else {
            $audit .= "<strong>Warchest Compliance: </strong><img src=\"cross.gif\" alt=\"wrong\" /> (aim for " . number_format($wctarget) . ")<br />";
        }
        
        echo $audit;
        //notes
    }
    
    
    // DATABASE ENTRY SHIZZLE
    //////////////////////////

    // Init connection to DB
    $conn = mysqli_connect("designdeveloprealize.com", "designde_poise", "vindicator", "designde_poise");
    if (!$conn) {
        die('Could not connect to database: '.mysqli_error());
    }

    $querystr = "INSERT INTO member (rulername, nation_id, nationstrength, warchest, wonders, mp, sdi, pent, wrc, fafb, aadn, hnms, spies, warpeace, brigade, infra, tech, nukes, tier, wc_compliance) VALUES ('".$rulername."',".$nationid.",".$nationstrength.",".$warchest.",'".$wonders."',".$mp.",".$sdi.",".$pent.",".$wrc.",".$fafb.",".$aadn.",".$hnms.",".$spies.",'".$warpeace."','".$brigade."',".$infra.",".$tech.",".$nukes.",".$tier.",".$warchestcompliant.")";
//    echo $querystr."<br />";
    $result = mysqli_query($conn, $querystr);
    if(!$result) {
        die("Error: ".mysqli_error($conn)."<br />");
    }
        
    // Close connection
    mysqli_close($conn);
    
    echo "<h2>Your nation information has been succesfully entered!</h2>";

 ?>

</body>
</html>