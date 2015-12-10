<?php
include_once('include.php');


    function findField($string, $name) {
        $pos = strpos($string, "\">", strpos($string, $name)) + 2;
        $length = strpos($string, "<", $pos) - $pos;
        return trim(substr($string, $pos, $length));
    }
    
    function removecommas($str) {
        return str_replace(",", "", $str);
    }
    
    $source = $_POST['source'];

    $nationhtml = substr($source, strpos($source, "#info"));

    // Nation ID
    $pos = strpos($nationhtml, "Nation_ID=")+10;
    
    $length = strpos($nationhtml, "\"", $pos) - $pos;
  
    $nationid = trim(substr($nationhtml, $pos, $length), "\\\"");

    // Ruler name
    $rulername = findField($nationhtml, "Ruler:");

    
    // Tech
    $tech = removecommas(findField($nationhtml, "Technology</a>:"));

    
    // Infra
    $infra = removecommas(findField($nationhtml, "Infrastructure</a>:"));

    
    // War/Peace mode
    // Custom because the <img> tag opener gets in the way
    $pos = strpos($nationhtml, "\">", strpos($nationhtml, "War/Peace Preference")) + 2;
    $length = strpos($nationhtml, "\">", $pos) - $pos;
    $field = trim(substr($nationhtml, $pos, $length));
    $warpeace = trim(substr($field, strpos($field, "images/")+7, 5), ".g");

    
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

    
    // Nation Strength
    $nationstrength = removecommas(findField($nationhtml, "Nation Strength</a>:"));

    
    // Nuke count
    $nukes = findField($nationhtml, "Nuclear Weapons</a>:");
    
    // Spy count
    $spies = findField($nationhtml, "Number of Spies");

    
    // Warchest
    // Custom because fancy colors SHOULD DIE
    $pos = strpos($nationhtml, "\">", strpos($nationhtml, "Available:")) + 2;
    $length = strpos($nationhtml, "</td>", $pos) - $pos;
    $field = trim(substr($nationhtml, $pos, $length));
    $start = strpos($field, "$") + 1;
    $warchest = removecommas(trim(substr($field, $start, strpos($field, "&", $start) - $start)));
    
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
    
    
    // DATABASE ENTRY SHIZZLE
    //////////////////////////

    // Init connection to DB
    $conn = mysqli_connect("designdeveloprealize.com", "designde_poise", "vindicator", "designde_poise");
    if (!$conn) {
        die('Could not connect to database: '.mysqli_error());
    }

    $querystr = "INSERT INTO member (rulername, nation_id, nationstrength, warchest, wonders, mp, sdi, pent, wrc, fafb, aadn, hnms, spies, warpeace, brigade, infra, tech, nukes, tier, wc_compliance) VALUES ('".$rulername."',".$nationid.",".$nationstrength.",".$warchest.",'".$wonders."',".$mp.",".$sdi.",".$pent.",".$wrc.",".$fafb.",".$aadn.",".$hnms.",".$spies.",'".$warpeace."', COALESCE((SELECT M.brigade FROM member_latest M WHERE M.nation_id = $nationid LIMIT 1), 'Unknown'),".$infra.",".$tech.",".$nukes.",".$tier.",".$warchestcompliant.")";
	//echo $querystr;
	//    echo $querystr."<br />";
    $result = mysqli_query($conn, $querystr);
    if(!$result) {
        die("Error: ".mysqli_error($conn)."<br />");
    }
        
    // Close connection
    mysqli_close($conn);
 ?>